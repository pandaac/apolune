<?php

namespace Apolune\Profile\Providers;

use Apolune\Core\AggregateServiceProvider;

class ProfileServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        ExceptionsServiceProvider::class,
        RouteServiceProvider::class,
    ];
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...
    }
}
