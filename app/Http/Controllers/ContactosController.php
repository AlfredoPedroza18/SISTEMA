<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Contacto;
class ContactosController extends Controller
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
        //
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
        $contacto       = Contacto::find($id);   
        $resultDelete   = $contacto->delete();
        if($resultDelete){
            return response()->json(['status'=>'true']);
        }
            
        return response()->json(['status'=>'false']);
    }

    public function listaContactos(Request $request){
        $id_cliente = $request->id_cliente;
        $contactos = DB::select('SELECT * FROM contactos WHERE id_cliente = ? order by principal asc',[$id_cliente]);
        
        return response()->json($contactos);

    }


    //Se usa para correos
    public function listaContactosCorreos(){
        $correos_list = [];
        $correos = DB::select('SELECT correo1 AS correo FROM contactos WHERE correo1 IS NOT NULL UNION SELECT correo2 AS correo FROM contactos WHERE correo2 IS NOT NULL' );

        foreach ($correos as $key => $value) {
            $correos_list[] = $value->correo;
        }

        
        return response()->json($correos);

    }
}
