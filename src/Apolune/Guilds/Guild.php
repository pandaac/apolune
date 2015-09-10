<?php

namespace Apolune\Guilds;

use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\Guild as Contract;
use Apolune\Guilds\Traits\Scopes\Guild as GuildScopes;
use Apolune\Guilds\Traits\Relations\Guild as GuildRelations;

class Guild extends Model implements Contract
{
    use GuildScopes, GuildRelations;

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
     * Check whether the guild is in a forming state or not.
     *
     * @return boolean
     */
    public function isForming()
    {
        return $this->viceLeaders()->count() < 4;
    }
}
