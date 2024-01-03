<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ciudades = MasterConsultas::exeSQL("master_ciudad", "READONLY",
            array(
                "IdCiudad" => '-1',
                "IdEstado" => '-1',
                "Codigo" => '-1',
                "Activo" => '-1'
            )
        );


        return view("ESE.catalogos.ciudadesindex",["ciudades"=>$Ciudades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Estados = MasterConsultas::exeSQL("estados", "READONLY",
            array(
                "IdEstado" => '-1',
                "IdPais" => '-1'
            )
        );
        foreach ($Estados as $nomE) {
            $nmEstados[$nomE->IdEstado] = $nomE->nombre_estado;
        }
        $Activo='Si';

        return view("ESE.catalogos.form-catalogociudades")
        ->with('estados', $nmEstados)
        ->with('FK_Ciudad', null)
        ->with('Codigo', null)
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

        $AltaCiudades=MasterConsultas::exeSQLStatement("create_catalogo_ciudades", "UPDATE",
                    array(
                        "IdEstado" => $request->input('IdEstado'),
                        "Codigo" => $request->input('Codigo'),
                        "NombreCiudad" => $request->input('FK_Ciudad'),
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
        $Ciudad = MasterConsultas::exeSQL("master_ciudad", "READONLY",
        array(
            "IdCiudad" => $id,
            "IdEstado" => '-1',
            "Codigo" => '-1',
            "Activo" => '-1'
        )
        );

        foreach ($Ciudad as  $c) {
            $IdCiudad=$c->IdCiudad;
            $nombre=$c->Ciudad;
            $codigo=$c->Codigo;
            $activo=$c->Activo;
            $IdEstado=$c->IdEstado;

        }

        $Estados=DB::table('estados')
            ->select('IdEstado','FK_nombre_estado')
           ->orderByRaw("FIELD(IdEstado, $IdEstado) DESC")
            ->get();

        foreach ($Estados as $nomE) {
            $nmEstados[$nomE->IdEstado] = $nomE->FK_nombre_estado;
        }

              return view("ESE.catalogos.ciudadesedit")
              ->with('IdCiudad', $IdCiudad)
              ->with('FK_Ciudad', $nombre)
              ->with('Codigo', $codigo)
              ->with('Activo', $activo)
              ->with('estados', $nmEstados);
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

        $UpdateCiudad=MasterConsultas::exeSQLStatement("update_catalogo_ciudades", "UPDATE",
                    array(
                        "IdEstado" => $request->input('IdEstado'),
                        "Codigo" => $request->input('Codigo'),
                        "NombreCiudad" => $request->input('FK_Ciudad'),
                        "Activo" => $Activo,
                        "IdCiudad" => $id
                    )
                );


                return redirect('/CatalogoCiudades')
                ->with(['success' =>  $request->input('FK_Ciudad') . ' se actualizó con éxito',
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
          $DeleteCiudad=MasterConsultas::exeSQLStatement("delete_catalogo_ciudades", "UPDATE",
          array(
              "IdCiudad" => $id
          )
          );
        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        } finally {
          return redirect('/CatalogoCiudades')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }


    }
}
