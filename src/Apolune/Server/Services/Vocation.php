<?php

namespace Apolune\Server\Services;

use Apolune\Contracts\Server\Vocation as VocationContract;

class Vocation implements VocationContract
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
     * @param  array  $vocation
     * @return void
     */
    public function __construct(array $vocation)
    {
        $this->data = $vocation;
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
