<?php

namespace Apolune;

use Illuminate\Support\AggregateServiceProvider;

class ApoluneServiceProvider extends AggregateServiceProvider
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
}
