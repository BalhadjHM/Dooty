<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
    * Get the path the user should be redirected to when they are not authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return string|null
    */
    public function handle($request, Closure $next)
    {
        if (! $request->user()) {
            return redirect()->route('user.login');
        }

        return $next($request);
    }
}
