<?php

namespace Apolune\Guilds;

use Carbon\Carbon;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\Guilds\GuildProperties as Contract;

class GuildProperties extends Model implements Contract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '__pandaac_guilds';

    /**
     * Retrieve the guild description.
     *
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    public function createdAt()
    {
        return new Carbon($this->created_at);
    }
}
