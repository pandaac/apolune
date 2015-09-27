<?php

namespace Apolune\Guilds\Traits\Relations;

use Apolune\Contracts\Account\Player as PlayerContract;
use Apolune\Contracts\Guilds\GuildMembership as GuildMembershipContract;

trait GuildRank
{
    /**
     * Retrieve all the associated players.
     *
     * @return \Illuminate\Support\Collection
     */
    public function players()
    {
        return $this->hasManyThrough(PlayerContract::class, GuildMembershipContract::class, 'rank_id', 'id');
    }
}
