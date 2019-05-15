<?php

namespace DavideCasiraghi\LaravelFormPartials;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DavideCasiraghi\LaravelFormPartials\Skeleton\SkeletonClass
 */
class LaravelFormPartialsFacade extends Facade
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
