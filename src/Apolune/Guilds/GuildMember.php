<?php

namespace Apolune\Guilds;

use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\GuildMember as Contract;

class GuildMember extends Model implements Contract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guild_membership';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'player_id';

    public function player()
    {
        return $this->belongsTo('player');
    }
}
