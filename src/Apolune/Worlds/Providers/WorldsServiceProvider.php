<?php

namespace Apolune\Worlds\Providers;

use Apolune\Worlds;
use Apolune\Core\AggregateServiceProvider;

class WorldsServiceProvider extends AggregateServiceProvider
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $middleware = [
        'world.exists' => Worlds\Http\Middleware\Exist::class,
    ];

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
