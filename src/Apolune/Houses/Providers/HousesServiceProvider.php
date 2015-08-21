<?php

namespace Apolune\Houses\Providers;

use Apolune\Core\AggregateServiceProvider;

class HousesServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [];
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
