<?php

namespace Apolune\Server;

use Apolune\Contracts\Server\Town as Contract;

class Town implements Contract
{
    /**
     * Holds the original data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new town instance.
     *
     * @param  array  $towns
     * @return void
     */
    public function __construct(array $towns)
    {
        $this->data = $towns;
    }

    /**
     * Get the town id.
     *
     * @return integer
     */
    public function id()
    {
        return (integer) $this->data['id'];
    }

    /**
     * Get the town name.
     *
     * @return string
     */
    public function name()
    {
        return $this->data['name'];
    }

    /**
     * Check if the town is a starter town.
     *
     * @return boolean
     */
    public function isStarter()
    {
        return (boolean) $this->data['starter'];
    }
}
