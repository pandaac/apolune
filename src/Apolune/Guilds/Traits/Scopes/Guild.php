<?php

namespace Apolune\Guilds\Traits\Scopes;

trait Guild
{
    /**
     * Scope a query to only include guilds from a specific world.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Apolune\Contracts\Server\World  $world
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromWorld($query, $world)
    {
        if ($world and $this->hasColumn('world_id') and worlds()->count() > 1) {
            return $query->where('world_id', $world->id());
        }

        return $query;
    }
}
