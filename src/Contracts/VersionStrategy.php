<?php

namespace HT\ApplicationVersion\Contracts;

use GuzzleHttp\Client;

/**
 * Strategy: VersionStrategy
 * @package HT\ApplicationVersion\Contracts
 */
abstract class VersionStrategy
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * ApplicationVersionInterface constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $bundle_id
     * @return null|string
     */
    abstract public function getVersion(string $bundle_id): ?string;
}
