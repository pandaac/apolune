<?php

namespace Apolune\Worlds\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Registrar as Router;

class Exist
{
    /**
     * The Router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new filter instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $redirect = '/')
    {
        $world = $this->router->getCurrentRoute()->getParameter('world');

        if (worlds()->count() > 1 and ! $world) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect($redirect);
            }
        }

        return $next($request);
    }
}
