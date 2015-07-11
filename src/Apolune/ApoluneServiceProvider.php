<?php

namespace Apolune;

use Illuminate\Support\ServiceProvider;

class ApoluneServiceProvider extends ServiceProvider
{
    /**
     * Holds all of the service providers we want to register.
     *
     * @var array
     */
    protected $providers = [
        About\Providers\AboutServiceProvider::class,
        Account\Providers\AccountServiceProvider::class,
        Library\Providers\LibraryServiceProvider::class,
        News\Providers\NewsServiceProvider::class,
        Server\Providers\ServerServiceProvider::class,
        Support\Providers\SupportServiceProvider::class,
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
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
