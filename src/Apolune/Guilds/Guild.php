<?php

namespace Apolune\Guilds;

use Illuminate\Support\Str;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\Guild as Contract;
use Apolune\Guilds\Traits\Scopes\Guild as GuildScopes;
use Apolune\Guilds\Traits\Relations\Guild as GuildRelations;

class Guild extends Model implements Contract
{
    use GuildScopes, GuildRelations;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Retrieve the guild ID.
     *
     * @return integer
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Retrieve the guild name.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Retrieve a URL friendly slug.
     *
     * @return string
     */
    public function slug()
    {
        return Str::slug($this->name());
    }

    /**
     * Retrieve the owner ID.
     *
     * @return integer
     */
    public function ownerId()
    {
        return $this->ownerid;
    }

    /**
     * Retrieve the guild creation data.
     *
     * @return integer
     */
    public function creationData()
    {
        return $this->creation;
    }

    /**
     * Retrieve the guild message of the day.
     *
     * @return string
     */
    public function motd()
    {
        return $this->motd;
    }

    /**
     * Check whether the guild is in a forming state or not.
     *
     * @return boolean
     */
    public function isForming()
    {
        return $this->viceLeaders()->count() < 4;
    }

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
