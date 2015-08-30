<?php

namespace Apolune\Server;

use Apolune\Contracts\Server\World as Contract;

class World implements Contract
{
    /**
     * Holds the original data.
     *
     * @var array
     */
    protected $data;

    /**
     * All the world types.
     *
     * @var array
     */
    protected $types = [
        0 => 'Optional PvP',
        1 => 'Open PvP',
        2 => 'Hardcore PvP',
    ];

    /**
     * Create a new world instance.
     *
     * @param  array  $world
     * @return void
     */
    public function __construct(array $world)
    {
        $this->data = $world;
    }

    /**
     * Get the world id.
     *
     * @return integer
     */
    public function id()
    {
        return (integer) $this->data['id'];
    }

    /**
     * Get the world name.
     *
     * @return string
     */
    public function name()
    {
        return $this->data['name'];
    }

    /**
     * Get the world slug.
     *
     * @return string
     */
    public function slug()
    {
        return $this->data['slug'];
    }

    /**
     * Get the world type.
     *
     * @return string
     */
    public function type()
    {
        if (! isset($this->types[$type = $this->typeId()])) {
            return head($this->types);
        }

        return $this->types[$type];
    }

    /**
     * Get the world type id.
     *
     * @return integer
     */
    public function typeId()
    {
        return $this->data['type'];
    }

    /**
     * Get the world flag.
     *
     * @return string
     */
    public function flag()
    {
        if (! isset($this->data['flag'])) {
            return null;
        }

        return $this->data['flag'];
    }

    /**
     * Get all the players that are currently online on the given world.
     *
     * @return \Apolune\Contracts\Account\Player
     */
    public function players()
    {
        return app('player')->fromWorld($this)->online()->get();
    }
}
