<?php

namespace HT\ApplicationVersion\Providers;

use HT\ApplicationVersion\ApplicationVersion;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Provider: ServiceProvider
 * @package HT\ApplicationVersion\Providers
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ApplicationVersion::class, function () {
            return new ApplicationVersion();
        });
    }
}
