<?php

namespace Apolune\Core\Providers;

use Illuminate\Http\Response;
use Apolune\Core\ServiceProvider;
use Apolune\Core\Exceptions\NotFoundPlayerException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $this->exceptions->handle(NotFoundHttpException::class, function ($e) {
            return new Response(view('theme::404'), 404);
        });

        $this->exceptions->handle(ModelNotFoundException::class, function ($e) {
            return new Response(view('theme::404'), 404);
        });

        $this->exceptions->handle(NotFoundPlayerException::class, function ($e) {
            $player = app('router')->getCurrentRoute()->getParameter('player');

            return redirect('/characters')->with('name', $player);
        });
    }
}
