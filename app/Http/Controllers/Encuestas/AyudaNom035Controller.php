<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class AyudaNom035Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $encuesta = DB::select("SELECT ee.IdEncuesta, ee.Descripcion, eef.Fecha, eef.IdFechaEncuesta, eva.IdFecha, eva.Aplica FROM ev_encuesta ee
        INNER JOIN ev_encuesta_fecha eef
        ON ee.IdEncuesta = eef.IdEncuesta
        INNER JOIN ev_informacion_ayuda eva
        ON eef.IdFechaEncuesta = eva.IdFecha
        WHERE eva.Aplica = 'Si'
        ORDER BY eef.Fecha;");

        return view("Encuestas.nom035.informacion",["encuesta"=>$encuesta]);
    }

    public function getAyuda(Request $request)
    {
        $IdEncuesta = $request->IdEncuesta;

        $infoAyuda = DB::select("SELECT ee.IdEncuesta, evf.IdFechaEncuesta, eva.IdFecha, eva.Informacion, eva.Documento, eva.Glosario
        FROM ev_encuesta ee
        INNER JOIN ev_encuesta_fecha evf
        ON ee.IdEncuesta = evf.IdEncuesta
        INNER JOIN ev_informacion_ayuda eva
        ON evf.IdFechaEncuesta = eva.IdFecha
        WHERE ee.IdEncuesta =".$IdEncuesta);

        return response()->json(['data'=>$infoAyuda]);
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
