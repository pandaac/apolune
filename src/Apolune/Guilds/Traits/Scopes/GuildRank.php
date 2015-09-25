<?php

namespace Apolune\Guilds\Traits\Scopes;

trait GuildRank
{
    /**
     * Scope a query to only include leaders from a specific guild.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Apolune\Contracts\Guilds\Guild  $guild
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLeaders($query)
    {
        return $query->where('level', 3);
    }
}
