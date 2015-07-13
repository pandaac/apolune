<?php

namespace Apolune\Core;

use Illuminate\Support\AggregateServiceProvider as ServiceProvider;

abstract class AggregateServiceProvider extends ServiceProvider
{
    /**
     * The binding class names & alias.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->instances = [];

        foreach ($this->providers as $provider) {
            $this->instances[] = $this->app->register($provider);
        }
        
        foreach ($this->bindings as $alias => $binding) {
            list($abstract, $concrete) = [key($binding), current($binding)];
            
            $this->app->bind([$alias => $abstract], $concrete);
        }
    }
}
