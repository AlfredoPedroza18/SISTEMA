<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfiguracionesController extends Controller
{
    public function index()
    {

        return view("ESE.configuracionesindex");
    }
}
