<?php

namespace Apolune\Core\Providers;

use Exception;
use Apolune\Core\AggregateServiceProvider;

class CoreServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        MigrationServiceProvider::class,
    ];

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;

        $providers = config('pandaac.config.providers', []);

        $this->providers = array_merge($this->providers, $providers);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_HTTPS')) {
            $this->app['url']->forceSchema('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        
        $theme = $this->app->register(config('pandaac.config.theme'));
        
        if (! property_exists($theme, 'namespace')) {
            throw new Exception('Theme Service Provider must declare a namespace property.');
        }
    }
}
