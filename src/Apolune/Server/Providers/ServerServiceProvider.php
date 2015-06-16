<?php

namespace Apolune\Server\Providers;

use Apolune\Server\Factory;
use Illuminate\Support\ServiceProvider;

class ServerServiceProvider extends ServiceProvider
{
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
        $this->app->singleton('Apolune\Contracts\Server\Factory', function ($app) {
            return new Factory($app, base_path('dummydata.json'));
        });

        $this->app->bind('Apolune\Contracts\Server\Creature', 'Apolune\Server\Services\Creature');
        $this->app->bind('Apolune\Contracts\Server\Gender', 'Apolune\Server\Services\Gender');
        $this->app->bind('Apolune\Contracts\Server\Vocation', 'Apolune\Server\Services\Vocation');
        $this->app->bind('Apolune\Contracts\Server\World', 'Apolune\Server\Services\World');
    }
}
