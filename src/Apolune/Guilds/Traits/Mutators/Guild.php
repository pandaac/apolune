<?php

namespace Apolune\Guilds\Traits\Mutators;

trait Guild
{
    /**
     * Set the guilds world id.
     *
     * @param  integer  $value
     * @return void
     */
    public function setWorldIdAttribute($value)
    {
        if (! $this->hasColumn('world_id')) {
            return;
        }

        $this->attributes['world_id'] = $value;
    }
}
