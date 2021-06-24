<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
class CheckIfAdmin
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
        if ($request->user() && ($request->user()->user_type == 1 || $request->user()->user_type == 2)) { // Check if user is admin
            return $next($request);
        }

        return Redirect::to('/admin')->withErrors("You are not allowed to this section!");
    }
}
