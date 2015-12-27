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
     * Get the creature slug.
     *
     * @return string
     */
    public function slug();

    /**
     * Determinate if hidden or not.
     *
     * @return string
     */
    public function hidden();

    /**
     * Get the creature description.
     *
     * @return string
     */
    public function description();
}
