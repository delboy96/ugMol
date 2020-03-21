<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public const ADMINISTRATOR = 'Admin';
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('user')) {
            if (session()->get('user')->role === self::ADMINISTRATOR) {
                return $next($request);
            }
        }
        return redirect(route("index"));
    }
}
