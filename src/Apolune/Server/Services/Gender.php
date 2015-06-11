<?php

namespace Apolune\Server\Services;

use Apolune\Contracts\Server\Gender as GenderContract;

class Gender implements GenderContract
{
    /**
     * Holds the original data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new gender instance.
     *
     * @param  array  $gender
     * @return void
     */
    public function __construct(array $gender)
    {
        $this->data = $gender;
    }

    /**
     * Get the gender id.
     *
     * @return integer
     */
    public function id()
    {
        return (integer) $this->data['id'];
    }

    /**
     * Get the gender name.
     *
     * @return string
     */
    public function name()
    {
        return $this->data['name'];
    }
}
