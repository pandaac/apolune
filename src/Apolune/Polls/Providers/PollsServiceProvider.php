<?php

namespace Apolune\Polls\Providers;

use Apolune\Core\AggregateServiceProvider;

class PollsServiceProvider extends AggregateServiceProvider
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
