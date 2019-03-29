<?php

namespace App\Http\Middleware;

use Closure;

class SidemenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $attributes['module_name'] = explode(".", $request->route()->getName())['0'];
        $attributes['action_name'] = explode(".", $request->route()->getName())['1'];

        \Illuminate\Support\Facades\View::share('routeName', $attributes['module_name']);
        \Illuminate\Support\Facades\View::share('routeAction', $attributes['action_name']);
        // dd($attributes);
        return $next($request);
    }
}
