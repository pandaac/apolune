<?php

namespace Apolune\Guilds\Traits\Relations;

trait GuildRank
{
    /**
     * Retrieve the guild.
     *
     * @return \Apolune\Contracts\Guilds\Guild
     */
    public function guild()
    {
        return $this->belongsTo('guild');
    }

    /**
     * Retrieve the guild members.
     *
     * @return \Apolune\Contracts\Guilds\GuildMember
     */
    public function members()
    {
        return $this->hasManyThrough('player', 'guild.member', 'rank_id', 'id');
    }
}
