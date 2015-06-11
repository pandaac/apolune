<?php

namespace Apolune\Contracts\Server;

interface World
{
    /**
     * Create a new world instance.
     *
     * @param  array  $world
     * @return void
     */
    public function __construct(array $world);

    /**
     * Get the world id.
     *
     * @return integer
     */
    public function id();

    /**
     * Get the world name.
     *
     * @return string
     */
    public function name();

    /**
     * Get the world type.
     *
     * @return string
     */
    public function type();

    /**
     * Get the world flag.
     *
     * @return string
     */
    public function flag();
}
