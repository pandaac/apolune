<?php

namespace Apolune\Forum\Providers;

use Apolune\Forum;
use Apolune\Core\AggregateServiceProvider;

class ForumServiceProvider extends AggregateServiceProvider
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $middleware = [];

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
