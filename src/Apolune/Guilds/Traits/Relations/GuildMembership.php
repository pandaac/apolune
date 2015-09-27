<?php

namespace Apolune\Guilds\Traits\Relations;

use Apolune\Contracts\Guilds\Guild as GuildContract;
use Apolune\Contracts\Guilds\GuildRank as GuildRankContract;

trait GuildMembership
{
    /**
     * Retrieve the associated guild rank.
     *
     * @return \Apolune\Contracts\Guilds\GuildRank
     */
    public function rank()
    {
        return $this->belongsTo(GuildRankContract::class);
    }

    /**
     * Retrieve the associated guild.
     *
     * @return \Apolune\Contracts\Guilds\Guild
     */
    public function guild()
    {
        return $this->belongsTo(GuildContract::class);
    }
}
