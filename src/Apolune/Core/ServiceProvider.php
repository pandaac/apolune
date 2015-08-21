<?php

namespace Apolune\Core;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

abstract class ServiceProvider extends BaseServiceProvider
{
    /**
     * Holds the Exceptions Handler implementation.
     *
     * @var App\Exceptions\Handler
     */
    protected $exceptions;

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->exceptions = $app['App\Exceptions\Handler'];
    }
}
