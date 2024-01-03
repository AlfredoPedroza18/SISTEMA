<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterClientes;
use DB;


class RespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $selectR = MasterConsultas::exeSQL("ev_respuesta", "READONLY",
            array(
                "IdRespuesta" => '-1'
            )
        );

        return view("Encuestas.configuracion.configuracionsecciones.respuestas.index", ["seleccionaR"=>$selectR]);
    }

    public function createRE(){

        return view("Encuestas.configuracion.configuracionsecciones.respuestas.create.create");
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

        $buscarregistro=DB::select('select *from ev_respuesta where Descripcion="'.$descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('configuracion_respuestas')->with(['success' => ' La respuesta '.$request->input('descripcion').' ya existe',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_respuesta", "UPDATE",
                    array(
                        "Descripcion" => $request->input('descripcion'),
                    )
                );
                
            return redirect()->route('configuracion_respuestas')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $editarR=DB::select('select *from ev_respuesta where IdRespuesta='.$id);

        foreach ($editarR as  $editR) {
            $IdRespuesta=$editR->IdRespuesta;
            $descripcion=$editR->Descripcion;
        }

        $nombredelaR=DB::select('select Descripcion from ev_respuesta where IdRespuesta='.$id);

            return view("Encuestas.configuracion.configuracionsecciones.respuestas.edit.edit")
            ->with('IdRespuesta', $IdRespuesta)
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
    
            $buscarregistro=DB::select('select * from ev_respuesta where IdRespuesta<>'.$id.' AND Descripcion="'.$descripcion.'"');
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->route('configuracion_respuestas')->with(['success' => ' Error al actualizar, la respuesta '.$request->input('descripcion').' ya existe',
                'type'    => 'danger']);
            }else{
                $UpdateEC = DB::table('ev_respuesta')->where('IdRespuesta',$id)->update(
                    array('Descripcion'=>$descripcion));
                    
                return redirect()->route('configuracion_respuestas')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
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
                DB::delete("delete from ev_respuesta WHERE IdRespuesta = $id");
            }catch (\Exception $e) {
                if($e->getMessage()){
                    $resultadoError = 'Si';
                }
            }finally{
                if($resultadoError=='Si'){
                    return redirect()->route('configuracion_respuestas')
                    ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                    'type'    => 'danger']);
                }else{
                    return redirect()->route('configuracion_respuestas')
                    ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
              }
            }  
    }
}
