<?php

namespace Apolune\Profile\Providers;

use Apolune\Core\ServiceProvider;
use Apolune\Profile\Exceptions\NotFoundPlayerException;

class ExceptionsServiceProvider extends ServiceProvider
{   
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->exceptions->handle(NotFoundPlayerException::class, function ($e) {
            $player = app('router')->getCurrentRoute()->getParameter('player');

            return redirect('/characters')->with('name', $player);
        });
    }
}
