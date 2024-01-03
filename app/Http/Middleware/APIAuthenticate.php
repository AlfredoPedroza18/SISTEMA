<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Bussines\MobileLogin;

class APIAuthenticate
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
            $user = $request->header("Session");
            $devId = $request->header("DeviceId");
            $devType = $request->header("DeviceType");

            if ($devId == null  || $devType == null)
            {
                //return response('Forbidden.', 403);
                return response()->json(['error' => 'Forbidden'],403);
            }

            if($request->getPathInfo() !== "/api/applogin")
            {
                if ($user == null || $devId == null  || $devType == null)
                {
                    return response()->json(['error' => 'Forbidden'],403);
                    //return response('Forbidden.', 403);
                }

                $api_auth = base64_decode($user);

                if(strpos($api_auth,':') !== false) {
                    $uid = explode(':', $api_auth);
                    $userID = $uid[0];
                    $token = $uid[1];

                    if (MobileLogin::IsAuthenticatedAPI($userID, $token,$devId,$devType) == false)
                        return response()->json(['error' => 'Forbidden'],403);
                        //return response('Forbidden.', 403);
                }else{
                    return response()->json(['error' => 'Forbidden'],403);
                    //return response('Forbidden.', 403);
                }
            }
        }

        return $next($request);
    }
}
