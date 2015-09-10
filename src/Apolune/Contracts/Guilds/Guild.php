<?php

namespace Apolune\Contracts\Guilds;

interface Guild
{
    /**
     * Retrieve the guild ID.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the guild name.
     *
     * @return string
     */
    public function name();

    /**
     * Retrieve the owner ID.
     *
     * @return integer
     */
    public function ownerId();

    /**
     * Retrieve the guild creation data.
     *
     * @return integer
     */
    public function creationData();

    /**
     * Retrieve the guild message of the day.
     *
     * @return string
     */
    public function motd();

    /**
     * Check whether the guild is in a forming state or not.
     *
     * @return boolean
     */
    public function isForming();

    /**
     * Retrieve the guild properties.
     *
     * @return \Apolune\Contracts\Guilds\GuildProperties
     */
    public function properties();

    /**
     * Retrieve the guild owner.
     *
     * @return \Apolune\Contracts\Account\Player
     */
    public function owner();

    /**
     * Retrieve all of the guild members.
     *
     * @return \Illuminate\Support\Collection
     */
    public function players();

    /**
     * Retrieve all of the guild leaders.
     *
     * @return \Illuminate\Support\Collection
     */
    public function leaders();

    /**
     * Retrieve all of the guild vice-leaders.
     *
     * @return \Illuminate\Support\Collection
     */
    public function viceLeaders();

    /**
     * Retrieve all of the guild members.
     *
     * @return \Illuminate\Support\Collection
     */
    public function members();

    /**
     * Scope a query to only include guilds from a specific world.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Apolune\Contracts\Server\World  $world
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromWorld($query, $world);
}
