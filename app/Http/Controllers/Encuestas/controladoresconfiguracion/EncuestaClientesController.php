<?php

namespace App\Http\Controllers\Encuestas\controladoresconfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\User;
use App\Facturadora;
// use App\MasterClientes as Cliente;
 // use App\Cliente;
use App\Libs\Curp;
use App\Libs\Rfc;
use App\Contacto;
use App\Banco;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use App\CentroNegocio;
use App\Asignacion\ClienteCN;
use Session;
use App\Cotizacion;

class EncuestaClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {

        $peticion = $request->path();
            $clientes=DB::table('centros_negocio')->get();
            $clientes_select=[''=>'Seleccione un CN...'];
            foreach ($clientes as  $cliente) {
                $clientes_select[$cliente->id]="(".$cliente->nomenclatura.")"."  ".$cliente->nombre;
            }


       return view('Encuestas.configuracion.configuracionsecciones.clientes.index',[ 'peticion' => $peticion,'cn'=>$clientes_select]);

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
