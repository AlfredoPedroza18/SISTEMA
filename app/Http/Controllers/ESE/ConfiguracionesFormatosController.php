<?php



namespace App\Http\Controllers\ESE;



use Illuminate\Http\Request;



use App\Http\Requests;

use App\Http\Controllers\Controller;



class ConfiguracionesFormatosController extends Controller

{

    public function index()

    {



        return view("ESE.configuracionesformatosindex");

    }

}
