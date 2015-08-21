<?php

namespace Apolune\Profile\Providers;

use Illuminate\Routing\Router;
use Apolune\Contracts\Account\Player;
use Apolune\Profile\Exceptions\NotFoundPlayerException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

        $this->registerModels($router);
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

    /**
     * Register route models.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function registerModels(Router $router)
    {
        $router->model('player', Player::class, function ($value) {
            $value = str_replace('-', ' ', urldecode($value));

            if (preg_match('/^[0-9]+$/', $value)) {
                throw new NotFoundHttpException;
            }

            if ($model = app('player')->whereName($value)->first()) {
                return $model;
            }

            throw new NotFoundPlayerException;
        });
    }
}
