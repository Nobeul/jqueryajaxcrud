<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // dd($request->route()->getPrefix());

        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    // echo "admin route";
                    // exit();
                    return redirect('/admin/getorder');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    // echo "login route";
                    // exit();
                    return redirect('/home');
                }
                break;
        }

        return $next($request);
    }
}
