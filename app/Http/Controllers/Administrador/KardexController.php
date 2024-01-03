<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Administrador\Kardex;
use DB;

class KardexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_kardex = DB::select('SELECT 
                                        CONCAT(users.name," ",users.apellido_paterno," ",users.apellido_materno) AS nombre_usuario,
                                        modulos.nombre AS nombre_modulo,
                                        sub_modulos.nombre AS nombre_submodulo,
                                        acciones.nombre AS nombre_accion,
                                        acciones.slug,
                                        kardex_general.descripcion,
                                        kardex_general.id_objeto,
                                        kardex_general.fecha
                                    FROM kardex_general
                                    LEFT JOIN users ON users.id = kardex_general.id_usuario
                                    LEFT JOIN centros_negocio ON centros_negocio.id = kardex_general.id_cn
                                    LEFT JOIN modulos ON modulos.id = kardex_general.id_modulo
                                    LEFT JOIN sub_modulos ON sub_modulos.id = kardex_general.id_submodulo
                                    LEFT JOIN acciones ON acciones.id = kardex_general.id_accion');

        return view('administrador.kardex.index',['lista_kardex' => $lista_kardex]);
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
        //
    }
}
