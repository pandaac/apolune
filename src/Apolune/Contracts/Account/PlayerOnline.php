<?php

namespace Apolune\Contracts\Account;

interface PlayerOnline
{
    /**
     * Retrieve the player.
     *
     * @return \Apolune\Contracts\Account\Player
     */
    public function player();
}
