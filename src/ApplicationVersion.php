<?php

namespace HT\ApplicationVersion;

use HT\ApplicationVersion\Strategies\AppStore;
use HT\ApplicationVersion\Strategies\GooglePlay;
use HT\ApplicationVersion\Contracts\VersionInterface;

/**
 * Factory: Version
 * @package HT\ApplicationVersion
 */
class ApplicationVersion implements VersionInterface
{
    /**
     * @param string $bundle_id
     * @return string|null
     */
    public function viaAppStore(string $bundle_id): ?string
    {
        $app_store_strategy = new AppStore();
        return $app_store_strategy->getVersion($bundle_id);
    }

    /**
     * @param string $package_name
     * @return string|null
     */
    public function viaGooglePlay(string $package_name): ?string
    {
        $google_play_strategy = new GooglePlay();
        return $google_play_strategy->getVersion($package_name);
    }
}
