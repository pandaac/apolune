<?php

namespace Apolune;

use Illuminate\Support\ServiceProvider;

class ApoluneServiceProvider extends ServiceProvider
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
        $this->app->register('Apolune\Account\Providers\AccountServiceProvider');
        $this->app->register('Apolune\Library\Providers\LibraryServiceProvider');
        $this->app->register('Apolune\News\Providers\NewsServiceProvider');
        $this->app->register('Apolune\Server\Providers\ServerServiceProvider');
        $this->app->register('Apolune\Support\Providers\SupportServiceProvider');
    }
}
