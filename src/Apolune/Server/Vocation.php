<?php

namespace Apolune\Server;

use Apolune\Contracts\Server\Vocation as Contract;

class Vocation implements Contract
{
    /**
     * Holds the original data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new vocation instance.
     *
     * @param  array  $vocations
     * @return void
     */
    public function __construct(array $vocations)
    {
        $this->data = $vocations;
    }

    /**
     * Get the vocation id.
     *
     * @return integer
     */
    public function id()
    {
        return (integer) $this->data['id'];
    }

    /**
     * Get the vocation name.
     *
     * @return string
     */
    public function name()
    {
        return $this->data['name'];
    }

    /**
     * Check if the vocation is a starter.
     *
     * @return boolean
     */
    public function isStarter()
    {
        return (boolean) $this->data['starter'];
    }
}
