<?php

namespace Apolune\Guilds\Traits\Relations;

trait GuildMember
{
    /**
     * Retrieve the related player.
     *
     * @return \Apolune\Contracts\Account\Player
     */
    public function player()
    {
        return $this->belongsTo('player');
    }
}
