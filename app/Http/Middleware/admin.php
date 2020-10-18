<?php

namespace App\Http\Middleware;
use App\User;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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

        if(!Auth::guest())
        {
            if(Auth::user()->code == 1)
            {
                return $next($request);
            }
            else
            {
                return redirect('/home');
            }
        }
        else
        {
            return redirect('/home');
        }
    }
}
