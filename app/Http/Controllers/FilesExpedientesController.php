<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FilesExpedientesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
 
	public function showFiles(Request $request){
		return view('expediente.clientes.index');
	}


}
