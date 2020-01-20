<?php

namespace HT\ApplicationVersion\Strategies;

use Illuminate\Support\Arr;
use HT\ApplicationVersion\Contracts\VersionStrategy;
use HT\ApplicationVersion\Exceptions\ApplicationNotFoundException;

/**
 * Strategy: AppStore
 * @package HT\ApplicationVersion\Strategies
 */
class AppStore extends VersionStrategy
{
    /**
     * App store endpoint
     */
    private const APP_STORE_ENDPOINT = 'http://itunes.apple.com/lookup';

    /**
     * @param string $bundle_id
     * @return string|null
     */
    public function getVersion(string $bundle_id): ?string
    {
        try {
            $response = $this->client->get(self::APP_STORE_ENDPOINT, [
                'query' => [
                    'bundleId' => $bundle_id,
                ],
            ]);
            $content = json_decode($response->getBody()->getContents(), true);
            if ($content['resultCount'] === 0) {
                throw new ApplicationNotFoundException();
            }

            return Arr::get($content, 'results.0.version');
        } catch (\Throwable $exception) {
            return null;
        }
    }
}
