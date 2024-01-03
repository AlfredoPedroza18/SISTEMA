<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\CP;
use App\Cliente;
class CpController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listaCp(Request $request)//funcion para listar respuesta json de cp
    {
       $idcp=$request->id_cp;
        $cp=CP::where('FK_CodigoPostal',$idcp)->get();// se manda a llamar el modelo 
        return response()->json($cp);


    }
    public function listaCodigoPostal(Request $request)
    {
        $cp             = $request->cp;
        $lista_all_cp   = [];
        $result_list    = DB::select('SELECT CONCAT(IF(CHAR_LENGTH(CodigoPostal) < 5,CONCAT(\'0\',CodigoPostal),CodigoPostal),"||",Colonia,"||",Municipio,"||",Estado) AS CodigoPostal FROM codigospostales WHERE CodigoPostal like \'%'. $cp .'%\'');

        foreach ($result_list as $key => $value) {
            $lista_all_cp[] = $value->CodigoPostal; 
        }
        return response()->json($lista_all_cp);
    }
}
