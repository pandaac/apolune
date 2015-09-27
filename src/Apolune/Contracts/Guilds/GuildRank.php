<?php

namespace Apolune\Contracts\Guilds;

interface GuildRank
{
    /**
     * Retrieve the guild rank id.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the guild id.
     *
     * @return integer
     */
    public function guildId();

    /**
     * Retrieve the guild rank name.
     *
     * @return string
     */
    public function name();

    /**
     * Retrieve the guild rank level.
     *
     * @return integer
     */
    public function level();

    /**
     * Retrieve all the associated players.
     *
     * @return \Illuminate\Support\Collection
     */
    public function players();
}
