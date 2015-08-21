<?php

namespace Apolune\Core;

use Illuminate\Support\AggregateServiceProvider as ServiceProvider;

abstract class AggregateServiceProvider extends ServiceProvider
{
    /**
     * Holds the Exceptions Handler implementation.
     *
     * @var App\Exceptions\Handler
     */
    protected $exceptions;

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
     * The binding class names & alias.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->exceptions = $app['App\Exceptions\Handler'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->instances = [];

        $this->registerMiddleware();
        $this->registerProviders();
        $this->registerBindings();
    }

    /**
     * Register middleware.
     *
     * @return void
     */
    protected function registerMiddleware()
    {
        if (! isset($this->middleware)) return;

        foreach ($this->middleware as $key => $middleware) {
            $this->app['router']->middleware($key, $middleware);
        }
    }

    /**
     * Register providers.
     *
     * @return void
     */
    protected function registerProviders()
    {
        if (! isset($this->providers)) return;

        foreach ($this->providers as $provider) {
            $this->instances[] = $this->app->register($provider);
        }
    }

    /**
     * Register bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        if (! isset($this->bindings)) return;

        foreach ($this->bindings as $alias => $binding) {
            list($abstract, $concrete) = [key($binding), current($binding)];
            
            $this->app->bind([$alias => $abstract], $concrete);
        }
    }
}
