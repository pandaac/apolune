<?php

namespace Apolune\Contracts\Guilds;

use Apolune\Contracts\Server\World;
use Illuminate\Database\Eloquent\Builder;

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
     * Retrieve a URL friendly slug.
     *
     * @return string
     */
    public function slug();

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
     * Retrieve the associated guild ranks.
     *
     * @return \Illuminate\Support\Collection
     */
    public function ranks();

    /**
     * Retrieve the associated guild memberships.
     *
     * @return \Illuminate\Support\Collection
     */
    public function memberships();

    /**
     * Scope a query to only include guilds from a specific world.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Apolune\Contracts\Server\World  $world
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromWorld(Builder $query, World $world = null);

    /**
     * Scope a query to only include guilds which are in their formation stages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForming(Builder $query);

    /**
     * Scope a query to only include guilds that are fully formed.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFormed(Builder $query);
}
