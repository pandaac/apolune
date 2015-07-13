<?php

namespace Apolune\News\Providers;

use Apolune\Core\AggregateServiceProvider;

class NewsServiceProvider extends AggregateServiceProvider
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
