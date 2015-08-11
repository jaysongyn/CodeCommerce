<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {

        if (!$this->auth->user()->is_admin) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
