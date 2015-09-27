<?php

namespace Apolune\Contracts\Guilds;

interface GuildMembership
{
    /**
     * Retrieve the associated guild rank.
     *
     * @return \Apolune\Contracts\Guilds\GuildRank
     */
    public function rank();

    /**
     * Retrieve the associated guild.
     *
     * @return \Apolune\Contracts\Guilds\Guild
     */
    public function guild();
}
