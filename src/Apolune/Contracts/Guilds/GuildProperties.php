<?php

namespace Apolune\Contracts\Guilds;

interface GuildProperties
{
    /**
     * Retrieve the guild description.
     *
     * @return string
     */
    public function description();

    /**
     * Retrieve the guild's creation date.
     *
     * @return \Carbon\Carbon
     */
    public function createdAt();
}
