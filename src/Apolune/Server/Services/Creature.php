<?php

namespace Apolune\Server\Services;

use Apolune\Contracts\Server\Creature as CreatureContract;

class Creature implements CreatureContract
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
     * Get the creature image path.
     *
     * @return string
     */
    public function image()
    {
        return $this->data['image'];
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
}
