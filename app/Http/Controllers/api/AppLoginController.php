<?php

namespace App\Http\Controllers\api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\Bussines\MobileLogin;

class AppLoginController extends Controller
{


    public function login(Request $request)
    {
        return Response::JSON(MobileLogin::Login(
            $request->input('userId'),
            $request->input('password'),
            $request->header('DeviceType'),
            $request->header('DeviceId')
        ));
    }

    public function Logout(Request $request)
    {
        return Response::JSON(MobileLogin::Logout($request->input('userId')));

    }
}
