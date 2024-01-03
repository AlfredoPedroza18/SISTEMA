<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Paises = MasterConsultas::exeSQL("master_pais", "READONLY",
            array(
                "IdPais" => '-1',
                "Codigo" => '-1',
                "Activo" => '-1'
            )
        );


        return view("ESE.catalogos.paisesindex",["paises"=>$Paises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Activo='Si';

        return view("ESE.catalogos.form-catalogopaises")
        ->with('Codigo', null)
        ->with('FK_Pais', null)
        ->with('Activo', $Activo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $request->input('Activo');


        if ($status == 1) {
            $Activo='Si';
        }else{
            $Activo='No';
        }

        $AltaPaises=MasterConsultas::exeSQLStatement("create_catalogo_paises", "UPDATE",
                    array(
                        "IdPais" => $request->input('IdPais'),
                        "Codigo" => $request->input('Codigo'),
                        "FK_Pais" => $request->input('FK_Pais'),
                        "Activo" => $Activo
                    )
                );
            clearstatcache();
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
        $Pais = MasterConsultas::exeSQL("master_pais", "READONLY",
        array(
            "IdPais" => $id

        )
        );

        foreach ($Pais as  $pai) {
            $IdPais=$pai->IdPais;
            $Codigo=$pai->Codigo;
            $nombre=$pai->Pais;
            $activo=$pai->Activo;


        }

              return view("ESE.catalogos.paisesedit")
              ->with('IdPais', $IdPais)
              ->with('Codigo', $Codigo)
              ->with('FK_Pais', $nombre)
              ->with('Activo', $activo);

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
        $status = $request->input('Activo');


        if ($status == 1) {
            $Activo='Si';
        }else{
            $Activo='No';
        }

        $UpdatePais=MasterConsultas::exeSQLStatement("update_catalogo_paises", "UPDATE",
                    array(
                        "IdPais" => $id,
                        "Codigo" => $request->input('Codigo'),
                        "NombrePais" => $request->input('FK_Pais'),
                        "Activo" => $Activo
                    )
                );


                return redirect('/CatalogoPaises')
                ->with(['success' =>  $request->input('FK_Pais') . ' se actualizó con éxito',
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
          $DeletePais=MasterConsultas::exeSQLStatement("delete_catalogo_paises", "UPDATE",
          array(
              "IdPais" => $id
          )
          );
        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        } finally {
          return redirect('/CatalogoPaises')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }

    }
}
