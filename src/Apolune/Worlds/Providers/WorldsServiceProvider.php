<?php

namespace Apolune\Worlds\Providers;

use Apolune\Core\AggregateServiceProvider;

class WorldsServiceProvider extends AggregateServiceProvider
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
