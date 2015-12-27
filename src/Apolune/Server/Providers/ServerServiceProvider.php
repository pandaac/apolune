<?php

namespace Apolune\Server\Providers;

use Apolune\Server;
use Apolune\Contracts\Server as Contracts;
use Apolune\Core\AggregateServiceProvider;

class ServerServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [];

    /**
     * Holds all of the contracts we want to bind.
     *
     * @var array
     */
    protected $bindings = [
        'server.creature'  => [Contracts\Creature::class => Server\Creature::class],
        'server.gender'    => [Contracts\Gender::class => Server\Gender::class],
        'server.vocation'  => [Contracts\Vocation::class => Server\Vocation::class],
        'server.world'     => [Contracts\World::class => Server\World::class],
        'server.town'      => [Contracts\Town::class => Server\Town::class],
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
        parent::register();

        $this->app->singleton(['server' => Contracts\Factory::class], function ($app) {
            return new Server\Factory($app, storage_path('server'));
        });
    }
}
