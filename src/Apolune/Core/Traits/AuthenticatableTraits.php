<?php

namespace Apolune\Core\Traits;

trait AuthenticatableTraits
{
    /**
     * Get the token value for the "remember me" session.
     *
     * @param  string  $column
     * @return string
     */
    public function getRememberToken($column)
    {
        return $this->{$column};
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $column
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($column, $value)
    {
        $this->{$column} = $value;

        $this->save();
    }
}
