<?php

namespace Apolune\Highscore\Providers;

use Apolune\Core\AggregateServiceProvider;

class HighscoreServiceProvider extends AggregateServiceProvider
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
