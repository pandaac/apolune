<?php

namespace Apolune\Contracts\Server;

use Illuminate\Contracts\Foundation\Application;

interface Factory
{
    /**
     * Create a new Factory instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  string  $file
     * @return void
     */
    public function __construct(Application $app, $file);

    /**
     * Get the server name.
     *
     * @return string
     */
    public function name();

    /**
     * Get all of the countries.
     *
     * @return \Illuminate\Support\Collection
     */
    public function countries();

    /**
     * Get all creatures.
     *
     * @return \Illuminate\Support\Collection
     */
    public function creatures();

    /**
     * Get all of the genders.
     *
     * @return \Illuminate\Support\Collection
     */
    public function genders();

    /**
     * Get all of the towns.
     *
     * @param  boolean  $starter  null
     * @return \Illuminate\Support\Collection
     */
    public function towns($starter = null);

    /**
     * Get all of the vocations.
     *
     * @param  boolean  $starter  null
     * @return \Illuminate\Support\Collection
     */
    public function vocations($starter = null);

    /**
     * Get all of the worlds.
     *
     * @return \Illuminate\Support\Collection
     */
    public function worlds();
}
