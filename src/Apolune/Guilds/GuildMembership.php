<?php

namespace Apolune\Guilds;

use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\GuildMembership as Contract;
use Apolune\Guilds\Traits\Relations\GuildMembership as GuildMembershipRelations;

class GuildMembership extends Model implements Contract
{
    use GuildMembershipRelations;

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

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $this->load('guild');
        
        if (method_exists($this->guild, $method)) {
            return call_user_func_array([$this->guild, $method], $parameters);
        }

        return parent::__call($method, $parameters);
    }
}
