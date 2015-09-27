<?php

namespace Apolune\Guilds;

use Illuminate\Support\Str;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\Guild as Contract;
use Apolune\Guilds\Traits\Scopes\Guild as GuildScopes;
use Apolune\Guilds\Traits\Mutators\Guild as GuildMutators;
use Apolune\Guilds\Traits\Relations\Guild as GuildRelations;

class Guild extends Model implements Contract
{
    use GuildRelations, GuildScopes, GuildMutators;

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
     * Retrieve a URL friendly slug.
     *
     * @return string
     */
    public function slug()
    {
        return Str::slug($this->name());
    }

    /**
     * Check whether the guild is in a forming state or not.
     *
     * @return boolean
     */
    public function isForming()
    {
        return $this->ranks->filter(function ($rank) {
            return $rank->level() > 1;
        })->map(function ($rank) {
            return $rank->players;
        })->collapse()->count() < 4;
    }
}
