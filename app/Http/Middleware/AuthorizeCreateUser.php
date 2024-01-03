<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AuthorizeCreateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $usuarios)
    {
        if( User::all()->count() >  $usuarios )
        {
            return redirect('permission_denied');
        }
        return $next($request);
    }
}
