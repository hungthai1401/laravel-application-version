<?php

namespace HT\ApplicationVersion\Strategies;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;
use HT\ApplicationVersion\Contracts\VersionStrategy;
use HT\ApplicationVersion\Exceptions\MultiApplicationVersionException;

/**
 * Strategy: GooglePlay
 * @package HT\ApplicationVersion\Strategies
 */
class GooglePlay extends VersionStrategy
{
    /**
     * App store endpoint
     */
    private const GOOGLE_PLAY_ENDPOINT = 'https://play.google.com/store/apps/details';

    /**
     * @param string $package_name
     * @return string|null
     */
    public function getVersion(string $package_name): ?string
    {
        try {
            $headers = [
               'User-Agent' => 'Mozilla/5.0 (Windows; U; WindowsNT 5.1; en-US; rv1.8.1.6) Gecko/20070725 Firefox/2.0.0.6',
               'Referer' => 'http://www.google.com'
           ];
            $response = $this->client->get(self::GOOGLE_PLAY_ENDPOINT, [
               'headers' => $headers,
               'query' => [
                   'id' => $package_name,
               ],
           ]);
            $crawler = new Crawler($response->getBody()->getContents());
            $current_version_node = $crawler->filter('div.hAyfc:nth-child(4)')->first();
            $current_version = Str::after($current_version_node->text(), 'Current Version');
            preg_match('/^\d+(\.\d+)*$/m', $current_version, $matches);
            if (!$matches) {
                throw new MultiApplicationVersionException();
            }

            return $current_version;
        } catch (\Throwable $exception) {
            return null;
        }
    }
}
