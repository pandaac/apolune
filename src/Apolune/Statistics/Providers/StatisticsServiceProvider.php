<?php

namespace Apolune\Statistics\Providers;

use Apolune\Core\AggregateServiceProvider;

class StatisticsServiceProvider extends AggregateServiceProvider
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
