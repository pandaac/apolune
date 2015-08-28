<?php

namespace Apolune\Contracts\Server;

interface Town
{
    /**
     * Create a new towns instance.
     *
     * @param  array  $towns
     * @return void
     */
    public function __construct(array $towns);

    /**
     * Get the town id.
     *
     * @return integer
     */
    public function id();

    /**
     * Get the town name.
     *
     * @return string
     */
    public function name();

    /**
     * Check if the town is a starter town.
     *
     * @return boolean
     */
    public function isStarter();
}
