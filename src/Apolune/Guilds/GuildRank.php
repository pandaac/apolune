<?php

namespace Apolune\Guilds;

use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\GuildRank as Contract;

class GuildRank extends Model implements Contract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guild_ranks';

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

    /**
     * Retrieve the guild members.
     *
     * @return \Apolune\Contracts\Guilds\GuildMember
     */
    public function members()
    {
        return $this->hasMany('guild.member', 'rank_id');
    }

    /**
     * Retrieve the guild rank level.
     *
     * @return integer
     */
    public function level()
    {
        return $this->level;
    }
}
