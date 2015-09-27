<?php

namespace Apolune\Guilds\Traits\Scopes;

use Apolune\Contracts\Server\World;
use Illuminate\Database\Eloquent\Builder;

trait Guild
{
    /**
     * Scope a query to only include guilds from a specific world.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Apolune\Contracts\Server\World  $world
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromWorld(Builder $query, World $world = null)
    {
        if ($world and $this->hasColumn('world_id') and worlds()->count() > 1) {
            return $query->where('world_id', $world->id());
        }

        return $query;
    }

    /**
     * Scope a query to only include guilds which are in their formation stages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForming(Builder $query)
    {
        return $query->whereHas('memberships', function ($membership) {
            $membership->whereHas('rank', function ($rank) {
                $rank->where('level', '>', 1);
            });
        }, '<', 4);
    }

    /**
     * Scope a query to only include guilds that are fully formed.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFormed(Builder $query)
    {
        return $query->whereHas('memberships', function ($membership) {
            $membership->whereHas('rank', function ($rank) {
                $rank->where('level', '>', 1);
            });
        }, '>=', 4);
    }
}
