<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Estados = MasterConsultas::exeSQL("estados", "READONLY",
            array(
                "IdEstado" => '-1',
                "IdPais" => '-1'
            )
        );


        return view("ESE.catalogos.estadosindex",["estados"=>$Estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view("ESE.catalogos.estadoscreate",["estados"=>$AltaEstados]);
        $Paises = MasterConsultas::exeSQL("master_pais", "READONLY",
            array(
                "IdPais" => '-1',
                "Activo" => '-1'
            )
        );
        foreach ($Paises as $nomP) {
            $nmPaises[$nomP->IdPais] = $nomP->Pais;
        }
        return view("ESE.catalogos.form-catalogoestados")
        ->with('pais', $nmPaises)
        ->with('FK_nombre_estado', null)
        ->with('Codigo', null)
        ->with('Variable', null)
        ->with('Renapo', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $ab=$request->input('FK_nombre_estado');
        // return response()->json($ab);
        $AltaEstados=MasterConsultas::exeSQLStatement("create_catalogo_estados", "UPDATE",
                    array(
                        "IdPais" => $request->input('IdPais'),
                        "Codigo" => $request->input('Codigo'),
                        "NombreEdo" => $request->input('FK_nombre_estado'),
                        "variable" => $request->input('variable'),
                        "renapo" => $request->input('renapo')
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
        $Estado = MasterConsultas::exeSQL("estados", "READONLY",
        array(
            "IdEstado" => $id,
            "IdPais" => '-1'
            )
        );

        foreach ($Estado as  $edo) {
            $IdEstado=$edo->IdEstado;
            $nombre=$edo->nombre_estado;
            $codigo=$edo->Codigo;
            $variable=$edo->variable;
            $renapo=$edo->renapo;
            $IdPais=$edo->IdPais;

        }

        $Paises=DB::table('master_pais')
            ->select('IdPais','FK_Pais')
           ->orderByRaw("FIELD(IdPais, $IdPais) DESC")
            ->get();

        // $Paises = MasterConsultas::exeSQL("master_pais", "READONLY",
        //     array(
        //         "IdPais" => '-1',
        //         "Activo" => '-1'
        //     )
        // );
        foreach ($Paises as $nomP) {
            $nmPaises[$nomP->IdPais] = $nomP->FK_Pais;
        }

              return view("ESE.catalogos.estadosedit")
            //   ->with('Edo', $Estado)
              ->with('IdEstado', $IdEstado)
              ->with('FK_nombre_estado', $nombre)
              ->with('Codigo', $codigo)
              ->with('Variable', $variable)
              ->with('Renapo', $renapo)
              ->with('pais', $nmPaises);

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
        $UpdateEstado=MasterConsultas::exeSQLStatement("update_catalogo_estados", "UPDATE",
                    array(
                        "IdPais" => $request->input('IdPais'),
                        "Codigo" => $request->input('Codigo'),
                        "NombreEdo" => $request->input('FK_nombre_estado'),
                        "variable" => $request->input('variable'),
                        "renapo" => $request->input('renapo'),
                        "IdEstado" => $id
                    )
                );


                return redirect('/CatalogoEstados')
                ->with(['success' =>  $request->input('FK_nombre_estado') . ' se actualizó con éxito',
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
          $DeleteEstado=MasterConsultas::exeSQLStatement("delete_catalogo_estados", "UPDATE",
          array(
              "IdEstado" => $id
          )
          );

        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        } finally {

          return redirect('/CatalogoEstados')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }


    }
}
