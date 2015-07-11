<?php

namespace Apolune\Server\Providers;

use Apolune\Server\Factory;
use Illuminate\Support\ServiceProvider;

class ServerServiceProvider extends ServiceProvider
{
    /**
     * Holds all of the contracts we want to bind.
     *
     * @var array
     */
    protected $bindings = [
        'server.creature'  => ['Apolune\Contracts\Server\Creature', 'Apolune\Server\Creature'],
        'server.gender'    => ['Apolune\Contracts\Server\Gender', 'Apolune\Server\Gender'],
        'server.vocation'  => ['Apolune\Contracts\Server\Vocation', 'Apolune\Server\Vocation'],
        'server.world'     => ['Apolune\Contracts\Server\World', 'Apolune\Server\World'],
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(['server' => 'Apolune\Contracts\Server\Factory'], function ($app) {
            return new Factory($app, base_path('dummydata.json'));
        });

        foreach ($this->bindings as $alias => $binding) {
            list($abstract, $concrete) = $binding;
            
            $this->app->bind([$alias => $abstract], $concrete);
        }
    }
}
