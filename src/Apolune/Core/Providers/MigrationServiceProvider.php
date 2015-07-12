<?php

namespace Apolune\Core\Providers;

use Apolune\Core\Console\Commands\Migrate;
use Apolune\Core\Handlers\MigrationHandler;
use Illuminate\Database\MigrationServiceProvider as ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('migration.handler', function ($app) {
            return new MigrationHandler($app, collect());
        });

        parent::register();
    }

    /**
     * Register the "migrate" migration command.
     *
     * @return void
     */
    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.migrate', function ($app) {
            return new Migrate($app['migrator']);
        });
    }
}
