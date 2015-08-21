<?php

namespace Apolune\Core\Providers;

use Apolune\Core\ServiceProvider;
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
            return redirect('/');
        });
    }
}
