<?php

namespace Apolune\Core\Providers;

use Illuminate\Support\AggregateServiceProvider as ServiceProvider;

class AggregateServiceProvider extends ServiceProvider
{
    /**
     * Holds all of the contracts we want to bind.
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
