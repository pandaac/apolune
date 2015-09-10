<?php

namespace Apolune\Guilds\Providers;

use Apolune\Core\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
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
        $this->app['migration.handler']
            ->migrate(__DIR__.'/../Resources/Migrations')
            ->using('Apolune\Guilds\Resources\Migrations')
            ->register();

        $this->app['seed.handler']->register(
            \Apolune\Guilds\Resources\Seeds\DatabaseSeeder::class
        );
    }
}
