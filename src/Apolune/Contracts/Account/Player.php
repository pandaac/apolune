<?php

namespace Apolune\Contracts\Account;

interface Player
{
    /**
     * Retrieve the associated account.
     *
     * @return \Apolune\Contracts\Account\Account
     */
    public function account();

    /**
     * Retrieve the player gender.
     *
     * @return \Apolune\Contracts\Server\Gender
     */
    public function gender();

    /**
     * Retrieve the player vocation.
     *
     * @return \Apolune\Contracts\Server\Vocation
     */
    public function vocation();
}
