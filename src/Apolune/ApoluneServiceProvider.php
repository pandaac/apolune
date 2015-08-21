<?php

namespace Apolune;

use Apolune\Core\AggregateServiceProvider;

class ApoluneServiceProvider extends AggregateServiceProvider
{
    /**
     * Holds all of the service providers we want to register.
     *
     * @var array
     */
    protected $providers = [
        About\Providers\AboutServiceProvider::class,
        Account\Providers\AccountServiceProvider::class,
        Guilds\Providers\GuildsServiceProvider::class,
        Highscore\Providers\HighscoreServiceProvider::class,
        Houses\Providers\HousesServiceProvider::class,
        Library\Providers\LibraryServiceProvider::class,
        News\Providers\NewsServiceProvider::class,
        Polls\Providers\PollsServiceProvider::class,
        Profile\Providers\ProfileServiceProvider::class,
        Server\Providers\ServerServiceProvider::class,
        Statistics\Providers\StatisticsServiceProvider::class,
        Support\Providers\SupportServiceProvider::class,
        Worlds\Providers\WorldsServiceProvider::class,
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
