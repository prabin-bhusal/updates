<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // if the guard is admin then redirect to admin dashboard
                if ($request->routeIs('admin.*') && Auth::guard('admin')->check()) {
                    return redirect(route('admin.notices.index'));
                }

                // else redirect the logged in user to homepage instead
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
