<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class RegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Regiones = MasterConsultas::exeSQL("master_regiones", "READONLY",
            array(
                "IdRegion" => '-1'
            )
        );


        return view("ESE.catalogos.regionesindex",["regiones"=>$Regiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ESE.catalogos.form-catalogoregiones")
        ->with('Nombre', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $AltaRegiones=MasterConsultas::exeSQLStatement("create_catalogo_regiones", "UPDATE",
                    array(
                        "Nombre" => $request->input('Nombre')
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
        $Region = MasterConsultas::exeSQL("master_regiones", "READONLY",
        array(
            "IdRegion" => $id

        )
        );

        foreach ($Region as  $reg) {
            $IdRegion=$reg->IdRegion;
            $Nombre=$reg->Nombre;

        }

              return view("ESE.catalogos.regionesedit")
              ->with('IdRegion', $IdRegion)
              ->with('Nombre', $Nombre);
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
        $UpdateModalidad=MasterConsultas::exeSQLStatement("update_catalogo_regiones", "UPDATE",
        array(
            "Nombre" => $request->input('Nombre'),
            "IdRegion" => $id
        )
    );


    return redirect('/CatalogoRegiones')
    ->with(['success' =>  $request->input('Nombre') . ' se actualizó con éxito',
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
            $DeleteModalidad=MasterConsultas::exeSQLStatement("delete_catalogo_regiones", "UPDATE",
            array(
                "IdRegion" => $id
            )
            );
          } catch (Exception $e) {
            echo "Se ha producion una excepción. Los detalles son los siguientes:";
  
          }finally{
  
            return redirect('/CatalogoRegiones')
                    ->with(['success' => ' El registro se eliminó con éxito',
                        'type'    => 'success']);
          }
    }
}
