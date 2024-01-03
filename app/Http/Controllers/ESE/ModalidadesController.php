<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class ModalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Modalidades = MasterConsultas::exeSQL("master_ese_modalidad", "READONLY",
            array(
                "IdModalidad" => '-1'
            )
        );


        return view("ESE.catalogos.modalidadesindex",["modalidades"=>$Modalidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ESE.catalogos.form-catalogomodalidades")
        ->with('Descripcion', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $AltaModalidades=MasterConsultas::exeSQLStatement("create_catalogo_modalidades", "UPDATE",
                    array(
                        "Descripcion" => $request->input('Descripcion')
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
        $Modalidad = MasterConsultas::exeSQL("master_ese_modalidad", "READONLY",
        array(
            "IdModalidad" => $id

        )
        );

        foreach ($Modalidad as  $mod) {
            $IdModalidad=$mod->IdModalidad;
            $Descripcion=$mod->Descripcion;

        }

              return view("ESE.catalogos.modalidadesedit")
              ->with('IdModalidad', $IdModalidad)
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

        $UpdateModalidad=MasterConsultas::exeSQLStatement("update_catalogo_modalidades", "UPDATE",
                    array(
                        "Descripcion" => $request->input('Descripcion'),
                        "IdModalidad" => $id
                    )
                );


                return redirect('/CatalogoModalidades')
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
          $DeleteModalidad=MasterConsultas::exeSQLStatement("delete_catalogo_modalidades", "UPDATE",
          array(
              "IdModalidad" => $id
          )
          );
        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        }finally{

          return redirect('/CatalogoModalidades')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }

    }
}
