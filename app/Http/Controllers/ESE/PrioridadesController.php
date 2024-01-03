<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class PrioridadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Prioridades = MasterConsultas::exeSQL("master_ese_prioridades", "READONLY",
            array(
                "IdPrioridad" => '-1'
            )
        );


        return view("ESE.catalogos.prioridadesindex",["Prioridades"=>$Prioridades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ESE.catalogos.form-catalogoprioridades")
        ->with('Descripcion', null)
        ->with('Dias', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $AltapRIORIDADES=MasterConsultas::exeSQLStatement("create_catalogo_prioridades", "UPDATE",
                    array(
                        "Descripcion" => $request->input('Descripcion'),
                        "Tiempo" => $request->input('dias')
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
        $Prioridad = MasterConsultas::exeSQL("master_ese_prioridades", "READONLY",
        array(
            "IdPrioridad" => $id

        )
        );

        foreach ($Prioridad as  $pr) {
            $IdPrioridad=$pr->IdPrioridad;
            $Descripcion=$pr->Descripcion;
            $Tiempo=$pr->Tiempo;

        }

              return view("ESE.catalogos.prioridadesedit")
              ->with('IdPrioridad', $IdPrioridad)
              ->with('Dias', $Tiempo)
              ->with('Descripcion', $Descripcion);
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
        $UpdatePrioridad=MasterConsultas::exeSQLStatement("update_catalogo_prioridades", "UPDATE",
        array(
            "Descripcion" => $request->input('Descripcion'),
            "Tiempo" => $request->input('dias'),
            "IdPrioridad" => $id
        )
    );


    return redirect('/CatalogoPrioridades')
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
          $DeletePrioridad=MasterConsultas::exeSQLStatement("delete_catalogo_prioridades", "UPDATE",
          array(
              "IdPrioridad" => $id
          )
          );
        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        }finally{

          return redirect('/CatalogoPrioridades')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }

    }
}
