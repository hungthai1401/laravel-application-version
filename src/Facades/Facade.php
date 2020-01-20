<?php

namespace HT\ApplicationVersion\Facades;

use HT\ApplicationVersion\ApplicationVersion;
use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * Facade: ApplicationVersionFacade
 * @package HT\ApplicationVersion\Facades
 */
class Facade extends BaseFacade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ApplicationVersion::class;
    }
}
