<?php

namespace Apolune\Core\Handlers;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Foundation\Application;

class MigrationHandler
{
    /**
     * Holds the Application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Holds all of the migration locations.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $locations;

    /**
     * Create a new instance object.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Support\Collection  $locations
     */
    public function __construct(Application $app, Collection $locations)
    {
        $this->app = $app;
        $this->locations = $locations;
    }

    /**
     * Register a migration location.
     *
     * @param  string  $path
     * @return void
     */
    public function register($path)
    {
        $path = realpath($path);

        $this->locations->push($path);
    }

    /**
     * Get all of the registered locations.
     *
     * @return \Illuminate\Support\Collection
     */
    public function locations()
    {
        return $this->locations;
    }
}
