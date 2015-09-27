<?php

namespace Apolune\Guilds\Traits\Relations;

use Apolune\Contracts\Guilds\GuildRank as GuildRankContract;
use Apolune\Contracts\Guilds\GuildMembership as GuildMembershipContract;
use Apolune\Contracts\Guilds\GuildProperties as GuildPropertiesContract;

trait Guild
{
    /**
     * Retrieve the guild properties.
     *
     * @return \Apolune\Contracts\Guilds\GuildProperties
     */
    public function properties()
    {
        return $this->hasOne(GuildPropertiesContract::class);
    }

    /**
     * Retrieve the associated guild ranks.
     *
     * @return \Illuminate\Support\Collection
     */
    public function ranks()
    {
        return $this->hasMany(GuildRankContract::class);
    }

    /**
     * Retrieve the associated guild memberships.
     *
     * @return \Illuminate\Support\Collection
     */
    public function memberships()
    {
        return $this->hasMany(GuildMembershipContract::class);
    }
}
