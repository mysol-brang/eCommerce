<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /* role_id 1 for supserAdmin
           role_id 2 for User
           role_id 3 for Admin
           role_id 4 for Editor
         */
        
        if(Auth::check())
        {
            if(Auth::user()->role_id != '2')
            {
                return $next($request);
            }else{
                abort(403, 'Unauthorized action.');
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
        
    }
}
