<?php

namespace Apolune\Account\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Registered
{
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $this->auth->check() or ! $this->auth->user()->isRegistered()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/account');
            }
        }

        return $next($request);
    }
}
