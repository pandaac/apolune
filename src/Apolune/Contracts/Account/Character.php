<?php

namespace Apolune\Contracts\Account;

interface Character
{
    /**
     * Retrieve the associated account.
     *
     * @return \Apolune\Contracts\Account\Account
     */
    public function account();
}
