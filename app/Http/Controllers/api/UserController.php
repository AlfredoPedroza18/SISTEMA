<?php

namespace App\Http\Controllers\api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\UserUtils;

class UserController extends Controller
{


    public function changePassword(Request $request)
    {
        $result = Response::JSON(UserUtils::changeMobilePassword(
            $request->input('userId'),
            $request->input('actualpassword'),
            $request->input('nuevopassword')
        ));

        return $result ;
    }

    public function changePhoto(Request $request)
    {
        $result = Response::JSON(UserUtils::changePhoto(
            $request->input('userId'),
            $request->input('photo')
        ));

        return $result ;
    }

}
