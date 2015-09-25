<?php

namespace Apolune\Guilds;

use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\GuildMember as Contract;
use Apolune\Guilds\Traits\Relations\GuildMember as GuildMemberRelations;

class GuildMember extends Model implements Contract
{
    use GuildMemberRelations;
    
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

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;
}
