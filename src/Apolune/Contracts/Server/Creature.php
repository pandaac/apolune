<?php

namespace Apolune\Contracts\Server;

interface Creature
{
    /**
     * Create a new creature instance.
     *
     * @param  array  $creature
     * @return void
     */
    public function __construct(array $creature);

    /**
     * Get the creature name.
     *
     * @return string
     */
    public function name();

    /**
     * Get the creature image path.
     *
     * @return string
     */
    public function image();

    /**
     * Determinate if hidden or not.
     *
     * @return string
     */
    public function hidden();
    
}
