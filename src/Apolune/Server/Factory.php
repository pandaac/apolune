<?php

namespace Apolune\Server;

use Illuminate\Contracts\Foundation\Application;
use Apolune\Contracts\Server\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * Holds the server data.
     *
     * @var \StdClass
     */
    protected $data;

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
     * @param  string  $file
     * @return void
     */
    public function __construct(Application $app, $file)
    {
        $this->app = $app;
        $this->data = json_decode($app['files']->get($file));
    }

    /**
     * Get all of the countries.
     *
     * @return array
     */
    public function countries()
    {
        $countries = $this->data->countries;

        return collect($countries);
    }

    /**
     * Get all of the genders.
     *
     * @return array
     */
    public function genders()
    {
        $genders = $this->data->genders;

        array_walk($genders, function (&$gender) {
            $gender = $this->app->make('Apolune\Contracts\Server\Gender', [(array) $gender]);
        });

        return collect($genders);
    }

    /**
     * Get all of the vocations.
     *
     * @param  boolean  $starter  null
     * @return array
     */
    public function vocations($starter = null)
    {
        $vocations = $this->data->vocations;

        array_walk($vocations, function (&$vocation) {
            $vocation = $this->app->make('Apolune\Contracts\Server\Vocation', [(array) $vocation]);
        });

        return collect($vocations)->reject(function ($vocation) use ($starter) {
            return $starter and ! $vocation->isStarter();
        });
    }

    /**
     * Get all of the worlds.
     *
     * @return array
     */
    public function worlds()
    {
        $worlds = $this->data->worlds;

        array_walk($worlds, function (&$world) {
            $world = $this->app->make('Apolune\Contracts\Server\World', [(array) $world]);
        });

        return collect($worlds);
    }

    /**
     * Get all creatures.
     *
     * @return array
     */
    public function creatures()
    {
        $creatures = $this->data->creatures;

        array_walk($creatures, function (&$creature) {
            $creature = $this->app->make('Apolune\Contracts\Server\Creature', [(array) $creature]);
        });

        return collect($creatures)->sortBy('name')->sort(function ($a, $b) {
            return $a->name() > $b->name();
        })->filter(function ($item) {
            return ! $item->hidden();
        });
    }
}
