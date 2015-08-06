<?php

namespace Apolune\Core\Providers;

use Illuminate\Routing\Router;
use Apolune\Contracts\Account\Player;
use Apolune\Contracts\Account\Account;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('account', Account::class);
        $router->model('player', Player::class);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        // 
    }
}
