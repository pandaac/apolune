<?php

namespace Apolune\Core\Providers;

use Exception;
use Apolune\Core\ThemeServiceProvider;
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
        
        if (! ($theme instanceof ThemeServiceProvider)) {
            throw new Exception('Theme Service Provider must extend \Apolune\Core\ThemeServiceProvider.');
        }

        if (! property_exists($theme, 'namespace')) {
            throw new Exception('Theme Service Provider must declare a namespace property.');
        }

        if (! preg_match('/^\b([a-z-]+)\b\/\b([a-z-]+)\b$/i', $theme->getNamespace())) {
            throw new Exception('Theme Service Provider namespace must follow the vendor/package convention (e.g. pandaac/theme-tibia).');
        }

        $this->app->instance('theme.namespace', $theme->getNamespace());
    }
}
