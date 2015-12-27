<?php

namespace Apolune\Server;

use Illuminate\Contracts\Foundation\Application;
use Apolune\Contracts\Server\Factory as Contract;

class Factory implements Contract
{
    /**
     * Holds the storage path.
     *
     * @var string
     */
    protected $path;

    /**
     * Holds the server data.
     *
     * @var array
     */
    protected static $data = [];

    /**
     * Holds the application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new Factory instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  string  $path
     * @return void
     */
    public function __construct(Application $app, $path)
    {
        $this->app = $app;
        $this->path = $path;

        $this->load();
    }

    /**
     * Load all of the different data files.
     *
     * @return void
     */
    protected function load()
    {
        $files = ['info', 'creatures', 'genders', 'spells', 'towns', 'vocations', 'worlds', '../countries'];

        foreach ($files as $file) {
            $filepath = sprintf('%s/%s.json', $this->path, $file);

            $identifier = preg_replace('/[^a-z]/i', null, $file);

            static::$data[$identifier] = json_decode($this->app['files']->get($filepath));
        }
    }

    /**
     * Get the server name.
     *
     * @return string
     */
    public function name()
    {
        return static::$data['info']->name;
    }

    /**
     * Get all of the countries.
     *
     * @return \Illuminate\Support\Collection
     */
    public function countries()
    {
        static $collection;

        if (is_null($collection)) {
            $collection = collect(static::$data['countries']);
        }

        return $collection;
    }

    /**
     * Get all creatures.
     *
     * @return \Illuminate\Support\Collection
     */
    public function creatures()
    {
        static $collection;

        if (is_null($collection)) {
            $creatures = static::$data['creatures'];

            array_walk($creatures, function (&$creature) {
                $creature = $this->app->make('server.creature', [(array) $creature]);
            });

            $collection = collect($creatures)->sortBy('name')->sort(function ($a, $b) {
                return $a->name() > $b->name();
            })->filter(function ($item) {
                return ! $item->hidden();
            });
        }

        return $collection;
    }

    /**
     * Get all of the genders.
     *
     * @return \Illuminate\Support\Collection
     */
    public function genders()
    {
        static $collection;

        if (is_null($collection)) {
            $genders = static::$data['genders'];

            array_walk($genders, function (&$gender) {
                $gender = $this->app->make('server.gender', [(array) $gender]);
            });

            $collection = collect($genders);
        }

        return $collection;
    }

    /**
     * Get all spells.
     *
     * @return \Illuminate\Support\Collection
     */
    public function spells()
    {
        static $collection;

        if (is_null($collection)) {
            $types = static::$data['spells'];

            foreach ($types as $type => $spells) {
                array_walk($spells, function (&$spell, $name) use ($type) {
                    $spell = $this->app->make('server.spell', [$name, $type, (array) $spell]);
                });
            }

            $result = [];
            foreach ($types as $type) {
                $result = array_merge($result, (array) $type);
            }

            $collection = collect($result)->sortBy('name')->sort(function ($a, $b) {
                return $a->name() > $b->name();
            })->filter(function ($item) {
                return ! $item->hidden();
            });
        }

        return $collection;
    }

    /**
     * Get all of the towns.
     *
     * @param  boolean  $starter  null
     * @return \Illuminate\Support\Collection
     */
    public function towns($starter = null)
    {
        static $collection;

        if (is_null($collection)) {
            $towns = static::$data['towns'];

            array_walk($towns, function (&$town) {
                $town = $this->app->make('server.town', [(array) $town]);
            });

            $collection = collect($towns)->reject(function ($town) use ($starter) {
                return $starter and ! $town->isStarter();
            });

            $collection = $collection->count() > 0 ? $collection : $collection->push(head($towns));
        }

        return $collection;
    }

    /**
     * Get all of the vocations.
     *
     * @param  boolean  $starter  null
     * @return \Illuminate\Support\Collection
     */
    public function vocations($starter = null)
    {
        static $collection;

        if (is_null($collection)) {
            $vocations = static::$data['vocations'];

            array_walk($vocations, function (&$vocation) {
                $vocation = $this->app->make('server.vocation', [(array) $vocation]);
            });

            $collection = collect($vocations)->reject(function ($vocation) use ($starter) {
                return $starter and ! $vocation->isStarter();
            });

            $collection = $collection->count() > 0 ? $collection : $collection->push(head($vocations));
        }

        return $collection;
    }

    /**
     * Get all of the worlds.
     *
     * @return \Illuminate\Support\Collection
     */
    public function worlds()
    {
        static $collection;

        if (is_null($collection)) {
            $worlds = static::$data['worlds'];

            array_walk($worlds, function (&$world) {
                $world = $this->app->make('server.world', [(array) $world]);
            });

            $collection = collect($worlds);
        }

        return $collection;
    }
}
