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
        switch ($guard) {
        // Proveravam da li je admin logovan
            case 'admin':
                // Ako jeste, nedozvoljavam mu da pristupi login strani
                if (Auth::guard($guard)->check()) {

                    return redirect('admin/home');

                }

                break;
            
            default:
                // Ako nije, redirektujem ga u front deo za korinike, tj naslovnu stranu
                if (Auth::guard($guard)->check()) {

                    return redirect('/home');

                }

                break;
        }
        

        return $next($request);
    }
}
