<?php

namespace DavideCasiraghi\LaravelFormPartials\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DavideCasiraghi\LaravelFormPartials\Skeleton\SkeletonClass
 */
class LaravelFormPartials extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-form-partials';
    }
}
