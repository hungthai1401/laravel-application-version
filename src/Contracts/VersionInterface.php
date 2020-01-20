<?php

namespace HT\ApplicationVersion\Contracts;

/**
 * Interface VersionInterface
 * @package HT\ApplicationVersion\Contracts
 */
interface VersionInterface
{
    /**
     * @param string $bundle_id
     * @return string|null
     */
    public function viaAppStore(string $bundle_id): ?string;

    /**
     * @param string $package_name
     * @return string|null
     */
    public function viaGooglePlay(string $package_name): ?string;
}
