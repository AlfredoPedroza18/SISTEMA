<?php

namespace App\Http\Controllers\Encuestas\controladorescatalogos;

use Illuminate\Http\Request;
use App\Bussines\MasterConsultas;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposServicioEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TiposServicio = MasterConsultas::exeSQL("master_ev_tiposervicio", "READONLY",
            array(
                "IdTipoServicio" => '-1'
            )
        );

        //return view("ESE.catalogos.tiposservicioindex",["TiposServicio"=>$TiposServicio]);
        return view("Encuestas.catalogos.formularios.catalogodeservicios.tiposserviciosencuestaindex",["TiposServicioEncuesta"=>$TiposServicio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Encuestas.catalogos.formularios.catalogodeservicios.form-catalogotiposervicioencuesta")
        ->with('Descripcion', null)
        ->with('Info', null)
        ->with('color', null)
        ->with('tipo', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_catalogo_tiposservicio", "UPDATE",
                    array(
                        "Descripcion" => $request->input('Descripcion'),
                        "info" => $request->input('Informacion'),
                        "Color" => $request->input('color')
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
        $TipoServicio = MasterConsultas::exeSQL("master_ese_tiposervicio", "READONLY",
        array(
            "IdTipoServicio" => $id

        )
        );

        foreach ($TipoServicio as  $ts) {
            $IdTipoServicio=$ts->IdTipoServicio;
            $Descripcion=$ts->Descripcion;
            $info=$ts->DescripcionServicioInfo;
            $color=$ts->Color;
        }
        $tipos=DB::select("select * from master_ese_tipos");

              return view("ESE.catalogos.tiposservicioedit")
              ->with('IdTipoServicio', $IdTipoServicio)
              ->with('Info', $info)
              ->with('color', $color)
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
        $UpdateTipoServicio=MasterConsultas::exeSQLStatement("update_catalogo_tiposservicio", "UPDATE",
            array(
                "Descripcion" => $request->input('Descripcion'),
                "info" => $request->input('Informacion'),
                "Color" => $request->input('color'),
                "IdTipoServicio" => $id
            )
        );


        return redirect('/CatalogoTiposServicio')
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
            $DeleteTipoServicio=MasterConsultas::exeSQLStatement("delete_catalogo_tiposservicio", "UPDATE",
            array(
                "IdTipoServicio" => $id
            )
            );
          } catch (Exception $e) {
            echo "Se ha producion una excepción. Los detalles son los siguientes:";
  
          }finally{
  
            return redirect('/CatalogoTiposServicio')
                    ->with(['success' => ' El registro se eliminó con éxito',
                        'type'    => 'success']);
          }
    }
}
