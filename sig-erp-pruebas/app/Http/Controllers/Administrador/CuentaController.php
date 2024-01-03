<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class CuentaController extends Controller
{
    public function index()
    {
    	return view('administrador.index');
    }
}
