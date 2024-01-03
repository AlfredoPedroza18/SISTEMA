<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Bussines\MasterConsultas;

class CTiposServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TiposServicio = MasterConsultas::exeSQL("master_ese_tipos", "READONLY",
            array(
                "IdTipos" => '-1'
            )
        );

        return view("ESE.catalogos.ctipossindex",["TiposServicio"=>$TiposServicio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=DB::select("select * from master_ese_tipos");
        $tipoSercivio=DB::select("select * from master_ese_tiposervicio");

        return view("ESE.catalogos.form-ctiposs")
        ->with('Descripcion', null)
        ->with('servicios', null)
        ->with('tipoSercivio', $tipoSercivio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_c_tipos", "UPDATE",
                    array(
                        "Tipos" => $request->input('Descripcion'),
                        "IdServicios" => $request->input('Tipos')
                    )
                );

            return response()->json(['status_alta' => 'success']);
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
        $TipoServicio = MasterConsultas::exeSQL("master_ese_tipos", "READONLY",
        array(
            "IdTipos" => $id

        )
        );

        foreach ($TipoServicio as  $ts) {
            $IdTipoServicio=$ts->IdTipos;
            $Descripcion=$ts->Tipos;
            $servicios=$ts->IdServicios;

        }
        $tipoSercivio=DB::select("select * from master_ese_tiposervicio");

              return view("ESE.catalogos.ctipossedit")
              ->with('IdTipos', $IdTipoServicio)
              ->with('Descripcion', $Descripcion)
              ->with('servicios', $servicios)
              ->with('tipoSercivio', $tipoSercivio);
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
        $UpdateTipoServicio=MasterConsultas::exeSQLStatement("update_c_tipos", "UPDATE",
            array(
                "Tipos" => $request->input('Descripcion'),
                "IdServicios" => $request->input('Tipos'),
                "IdTipos" => $id
            )
        );


        return redirect('/CTiposServicios')
        ->with(['success' =>  $request->input('Descripcion') . ' se actualizó con éxito',
            'type'    => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
          $DeleteTipoServicio=MasterConsultas::exeSQLStatement("delete_c_tipos", "UPDATE",
          array(
              "IdTipos" => $id
          )
          );
        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        }finally{

          return redirect('/CTiposServicios')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }

    }
}
