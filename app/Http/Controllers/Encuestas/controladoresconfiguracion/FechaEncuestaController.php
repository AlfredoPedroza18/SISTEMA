<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterClientes;
use DB;

class FechaEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $selectFE = MasterConsultas::exeSQL("ev_encuesta_fecha", "READONLY",
            array(
                "IdFechaEncuesta" => '-1'
            )
        );
        
        return view("Encuestas.configuracion.configuracionsecciones.fechaencuesta.index",["seleccionaFE"=>$selectFE]);
    }

    public function createFE(){

        $encuestas=DB::select('SELECT IdEncuesta AS Id,Descripcion FROM ev_encuesta');

        return view("Encuestas.configuracion.configuracionsecciones.fechaencuesta.create.create",["seleccionaEC"=>$encuestas]);
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
        $IdEncuesta=$request->input('descripcion');
        $Fecha=$request->input('fecha');

        $buscarregistro=DB::select('select *from ev_encuesta_fecha where IdEncuesta='.$IdEncuesta.' AND Fecha="'.$Fecha.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('configuracion_fecha_encuesta')->with(['success' => ' Ya existe la encuesta con la misma fecha',
            'type'    => 'danger']);
        }else{
            $AltaFE=MasterConsultas::exeSQLStatement("create_ev_encuesta_fecha", "UPDATE",
                    array(
                        "IdEncuesta" => $IdEncuesta,
                        "Fecha" => $Fecha
                    )
                );
                
            return redirect()->route('configuracion_fecha_encuesta')->with(['success' => ' El registro se guardó con éxito',
            'type'    => 'success']);
        }
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
        $editarFE=DB::select('select *from ev_encuesta_fecha where IdFechaEncuesta='.$id);

        foreach ($editarFE as  $editFE) {
            $IdFechaEncuesta=$editFE->IdFechaEncuesta;
            $IdEncuesta=$editFE->IdEncuesta;
            $Fecha=$editFE->Fecha;
        }

        $desencuesta=DB::select('select Descripcion from ev_encuesta where IdEncuesta='.$IdEncuesta);

        foreach($desencuesta as $desenc){
            $Descripcion=$desenc->Descripcion;
        }

            return view("Encuestas.configuracion.configuracionsecciones.fechaencuesta.edit.edit")
            ->with('IdFechaEncuesta', $IdFechaEncuesta)
            ->with('IdEncuesta', $IdEncuesta)
            ->with('Fecha', $Fecha)          
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
        $IdEncuesta=$request->input('descripcion');
            $Fecha=$request->input('fecha');
    
            $buscarregistro=DB::select('select * from ev_encuesta_fecha where IdEncuesta='.$IdEncuesta.' AND IdFechaEncuesta<>'.$id.' AND Fecha="'.$Fecha.'"');
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->route('configuracion_fecha_encuesta')->with(['success' => ' Error, registro duplicado',
                'type'    => 'danger']);
            }else{
                $UpdateFE = DB::table('ev_encuesta_fecha')->where('IdFechaEncuesta',$id)->update(
                    array('Fecha'=>$Fecha));
                    
                return redirect()->route('configuracion_fecha_encuesta')->with(['success' => ' El registro se actualizó con éxito',
                'type'    => 'success']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
            $resultadoError = null;
        
            try {
                DB::delete("delete from ev_encuesta_fecha WHERE IdFechaEncuesta = $id");
            }catch (\Exception $e) {
                if($e->getMessage()){
                    $resultadoError = 'Si';
                }
            }finally{
                if($resultadoError=='Si'){
                  return redirect()->route('configuracion_fecha_encuesta')
                    ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                    'type'    => 'danger']);
                }else{
                    return redirect()->route('configuracion_fecha_encuesta')
                    ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
              }
            }
    }
}
