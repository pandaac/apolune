<?php

namespace Apolune\Library\Providers;

use Apolune\Core\Providers\AggregateServiceProvider;

class LibraryServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [];
    
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
