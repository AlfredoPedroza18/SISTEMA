<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Input;

class UploadFileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('crm.clientes.crm-accionXcliente');
    }

    public function uploading(Request $request)
    {
      $file=$request->file('file_source');
      $aleatorio=str_random(6);
      $nombre=$aleatorio.'-'.$file->getClientOriginalName();
      $file->move('crm-accionXcliente',$nombre);   
      return 'ok';

      //dd($file);
      //nombre archivo $file->getClientOriginalName();
      //extension $file->getClientOriginalExtension();
      //aplicacion a abrir $file->getMimeType();
      //tamaño $file->getSize(); $max=10*1024
      //maximo de tamaño a subir  $file->getMaxFileSize();
       //el archivo es valido  y se subio correctamente isValid();
      //tipo de error getError();
      //tipo de error getMessageError();
       //ruta move('ruta','archivos');
     // return $file->getSize();

    }
}
