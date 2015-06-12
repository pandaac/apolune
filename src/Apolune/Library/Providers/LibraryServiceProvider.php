<?php

namespace Apolune\Library\Providers;

use Illuminate\Support\ServiceProvider;

class LibraryServiceProvider extends ServiceProvider
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
        //
    }

    /**
     * Bind the required contracts.
     *
     * @return void
     */
    private function bindContracts()
    {
        $this->app->bind('Apolune\Contracts\Server\Library', 'Apolune\Server\Services\Library');
    }
}
