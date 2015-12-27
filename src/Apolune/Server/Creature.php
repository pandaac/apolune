<?php

namespace Apolune\Server;

use Apolune\Contracts\Server\Creature as Contract;

class Creature implements Contract
{
    /**
     * Holds the original data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new creature instance.
     *
     * @param  array  $creature
     * @return void
     */
    public function __construct(array $creature)
    {
        $this->data = $creature;
    }

    /**
     * Get the creature name.
     *
     * @return string
     */
    public function name()
    {
        return $this->data['name'];
    }

    /**
     * Get the creature slug.
     *
     * @return string
     */
    public function slug()
    {
        return $this->data['slug'];
    }

    /**
     * Determinate if hidden or not.
     *
     * @return string
     */
    public function hidden()
    {
        return $this->data['hidden'];
    }

    /**
     * Get the creature description.
     *
     * @return string
     */
    public function description()
    {
        return $this->data['description'];
    }
}
