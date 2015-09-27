<?php

namespace Apolune\Guilds;

use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\GuildRank as Contract;
use Apolune\Guilds\Traits\Relations\GuildRank as GuildRankRelations;

class GuildRank extends Model implements Contract
{
    use GuildRankRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guild_ranks';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Retrieve the guild rank id.
     *
     * @return integer
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Retrieve the guild id.
     *
     * @return integer
     */
    public function guildId()
    {
        return $this->guild_id;
    }

    /**
     * Retrieve the guild rank name.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
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
