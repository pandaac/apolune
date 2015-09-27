<?php

namespace Apolune\Guilds\Providers;

use Apolune\Guilds;
use Apolune\Contracts\Guilds as Contracts;
use Apolune\Core\AggregateServiceProvider;

class GuildsServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        MigrationServiceProvider::class,
    ];

    /**
     * Holds all of the contracts we want to bind.
     *
     * @var array
     */
    protected $bindings = [
        'guild'             => [Contracts\Guild::class              => Guilds\Guild::class],
        'guild.properties'  => [Contracts\GuildProperties::class    => Guilds\GuildProperties::class],
        'guild.membership'  => [Contracts\GuildMembership::class    => Guilds\GuildMembership::class],
        'guild.rank'        => [Contracts\GuildRank::class          => Guilds\GuildRank::class],
    ];
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
