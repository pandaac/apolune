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
    protected static $locations;

    /**
     * Holds the location temporarily.
     *
     * @var string
     */
    protected $migrate;

    /**
     * Holds the namespace temporarily.
     *
     * @var string
     */
    protected $using;

    /**
     * Create a new instance object.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Support\Collection  $locations
     */
    public function __construct(Application $app, Collection $locations)
    {
        $this->app = $app;
        
        static::$locations = $locations;
    }

    /**
     * Set the migration path.
     *
     * @param  string  $path
     * @return void
     */
    public function migrate($path)
    {
        $this->migrate = $path;

        return $this;
    }

    /**
     * Set the migration namespace.
     *
     * @param  string  $namespace
     * @return void
     */
    public function using($namespace)
    {
        $this->using = $namespace;

        return $this;
    }

    /**
     * Register the location.
     *
     * @return void
     */
    public function register()
    {
        if (empty($this->migrate)) {
            return false;
        }

        static::$locations->push([$this->migrate, $this->using ?: null]);
    }

    /**
     * Get all of the registered locations.
     *
     * @return \Illuminate\Support\Collection
     */
    public function locations()
    {
        return static::$locations;
    }

    /**
     * Get all of the registered locations within a namespace.
     *
     * @param  string  $namespace
     * @return \Illuminate\Support\Collection
     */
    public function findByNamespace($namespace)
    {
        return $this->locations()->filter(function ($location) use ($namespace) {
            return str_contains(trim($location[1], '\\'), trim($namespace, '\\'));
        });
    }
}
