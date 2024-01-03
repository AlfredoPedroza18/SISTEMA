<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterClientes;
use DB;


class GrupoDeRespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $selectGR = MasterConsultas::exeSQL("ev_respuesta_grupo", "READONLY",
            array(
                "IdGrupoRespuesta" => '-1'
            )
        );

        return view("Encuestas.configuracion.configuracionsecciones.grupoderespuestas.index",["seleccionaGR"=>$selectGR]);
    }

    public function createGR(){

        return view("Encuestas.configuracion.configuracionsecciones.grupoderespuestas.create.create");
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
        $descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('select *from ev_respuesta_grupo where Descripcion="'.$descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('configuracion_grupo_de_respuestas')->with(['success' => ' El grupo de respuesta '.$request->input('descripcion').' ya existe',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_respuesta_grupo", "UPDATE",
                    array(
                        "Descripcion" => $request->input('descripcion'),
                    )
                );
                
            return redirect()->route('configuracion_grupo_de_respuestas')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $editarGR=DB::select('select *from ev_respuesta_grupo where IdGrupoRespuesta='.$id);

        foreach ($editarGR as  $editGR) {
            $IdGrupoRespuesta=$editGR->IdGrupoRespuesta;
            $descripcion=$editGR->Descripcion;
        }

        $nombredelGR=DB::select('select Descripcion from ev_respuesta_grupo where IdGrupoRespuesta='.$id);

            return view("Encuestas.configuracion.configuracionsecciones.grupoderespuestas.edit.edit")
            ->with('IdGrupoRespuesta', $IdGrupoRespuesta)
            ->with('descripcion', $descripcion);
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
        $descripcion=$request->input('descripcion');
    
            $buscarregistro=DB::select('select * from ev_respuesta_grupo where IdGrupoRespuesta<>'.$id.' AND Descripcion="'.$descripcion.'"');
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->route('configuracion_grupo_de_respuestas')->with(['success' => ' Error al actualizar, el grupo de respuestas '.$request->input('descripcion').' ya existe',
                'type'    => 'danger']);
            }else{
                $UpdateEC = DB::table('ev_respuesta_grupo')->where('IdGrupoRespuesta',$id)->update(
                    array('Descripcion'=>$descripcion));
                    
                return redirect()->route('configuracion_grupo_de_respuestas')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
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
                DB::delete("delete from ev_respuesta_grupo WHERE IdGrupoRespuesta = $id");
            }catch (\Exception $e) {
                if($e->getMessage()){
                    $resultadoError = 'Si';
                }
            }finally{
                if($resultadoError=='Si'){
                    return redirect()->route('configuracion_grupo_de_respuestas')
                    ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                    'type'    => 'danger']);
                }else{
                    return redirect()->route('configuracion_grupo_de_respuestas')
                    ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
              }
            }
    }
}
