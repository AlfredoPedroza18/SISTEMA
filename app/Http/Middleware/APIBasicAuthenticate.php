<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Bussines\MobileLogin;

class APIBasicAuthenticate
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
        if(strpos($request->getPathInfo(), '/api/') !== false)
        {
            $auth = $request->header("Authorization");
            $appId = $request->header("AppId");

            if ( $auth != null)
            {
                $key = explode(' ', $auth);

                $api_auth = base64_encode("DsaiGenTAPIUser:G#:HJLHw4{93>NnjT");
                $appid_gent = base64_decode('GenTMobile');

                if ($key[0] = 'Basic' && $key[1] !== $api_auth && $appid_gent !== $appId )
                {
                    return response()->json(['error' => 'Not authorized.'],401);
                    // return response('Unauthorized.', 401);
                }
            }else{
                return response()->json(['error' => 'Not authorized.'],401);
                //return response('Unauthorized.', 401);
            }
        }

        return $next($request);
    }
}
