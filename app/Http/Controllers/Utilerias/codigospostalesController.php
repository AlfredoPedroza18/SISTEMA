<?php



namespace App\Http\Controllers\Utilerias;



use Illuminate\Http\Request;



use App\Http\Requests;

use App\Http\Controllers\Controller;



class codigospostalesController extends Controller

{

    public function index()

    {



        return view("utilerias.codigospostalesindex");

    }

}
