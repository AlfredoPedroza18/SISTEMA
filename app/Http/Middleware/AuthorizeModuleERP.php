<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizeModuleERP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$modulo)
    {
        if( !$request->user()->isAbleEnter( $modulo ) )
        {
            return redirect('permission_denied');
        }

        return $next($request);
        
    }
}
