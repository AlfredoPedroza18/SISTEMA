<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterClientes;
use DB;


class ValoresDeRespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $selectVR = MasterConsultas::exeSQL("ev_respuesta_detalle", "READONLY",
            array(
                "IdRespuestaDet" => '-1'
            )
        );

        return view("Encuestas.configuracion.configuracionsecciones.valoresderespuestas.index",["seleccionaVR"=>$selectVR]);
    }

    public function createVR(){

        $selectGR=DB::select('SELECT IdGrupoRespuesta AS IdGR, Descripcion AS DescripcionGR FROM ev_respuesta_grupo');

        $selectVR=DB::select('SELECT IdRespuesta AS IdVR, Descripcion AS DescripcionVR FROM ev_respuesta');

        return view("Encuestas.configuracion.configuracionsecciones.valoresderespuestas.create.create",["selectGR"=>$selectGR, "selectVR"=>$selectVR]);
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
        $IdGrupoRespuesta=$request->input('gr');
        $IdRespuesta=$request->input('r');
        $iValor=$request->input('ivalor');
        $Activo=$request->input('activo');
        

        $buscarregistro=DB::select('select *from ev_respuesta_detalle where IdGrupoRespuesta="'.$IdGrupoRespuesta.'" AND IdRespuesta ="'.$IdRespuesta.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('configuracion_valores_de_respuestas')->with(['success' => ' El valor de la respuesta ya pertenece al grupo',
            'type'    => 'danger']);
        }else{
            $AltaVR=MasterConsultas::exeSQLStatement("create_ev_respuesta_detalle", "UPDATE",
                    array(
                        "IdGrupoRespuesta" => $IdGrupoRespuesta,
                        "IdRespuesta" => $IdRespuesta,
                        "iValor" => $iValor,
                        "Activo" => $Activo,
                    )
                );
                
            return redirect()->route('configuracion_valores_de_respuestas')->with(['success' => ' El registro se guardó con éxito',
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
        $editarVR=DB::select('select *from ev_respuesta_detalle where IdRespuestaDet='.$id);

        foreach ($editarVR as  $editVR) {
            $IdGrupoRespuesta=$editVR->IdGrupoRespuesta;
            $IdRespuesta=$editVR->IdRespuesta;
            $iValor=$editVR->iValor;
            $Activo=$editVR->Activo;
            $IdRespuestaDet=$editVR->IdRespuestaDet;
        }

        //$nombredelCLI=DB::select('select Empresa from master_clientes where IdCliente='.$IdCliente);

        $selectGR=DB::select('SELECT Descripcion FROM ev_respuesta_grupo WHERE IdGrupoRespuesta ='.$IdGrupoRespuesta);

        $selectVR=DB::select('SELECT Descripcion FROM ev_respuesta WHERE IdRespuesta ='.$IdRespuesta);

        foreach($selectGR as $GR){
            $DescripcionGR=$GR->Descripcion;
        }

        foreach($selectVR as $VR){
            $DescripcionVR=$VR->Descripcion;
        }

            return view("Encuestas.configuracion.configuracionsecciones.valoresderespuestas.edit.edit")
            ->with('IdGrupoRespuesta', $IdGrupoRespuesta)
            ->with('IdRespuesta', $IdRespuesta)
            ->with('iValor', $iValor)
            ->with('Activo', $Activo)
            ->with('DescripcionVR', $DescripcionVR)
            ->with('DescripcionGR', $DescripcionGR)
            ->with('IdRespuestaDet', $IdRespuestaDet);
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
        $IdGrupoRespuesta=$request->input('gr');
        $IdRespuesta=$request->input('r');
        $iValor=$request->input('ivalor');
        $Activo=$request->input('activo');
    
            $buscarregistro=DB::select('select * from ev_respuesta_detalle where IdGrupoRespuesta='.$IdGrupoRespuesta.' AND IdRespuestaDet<>'.$id.' AND IdRespuesta ='.$IdRespuesta);
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->route('configuracion_valores_de_respuestas')->with(['success' => ' No se pudo actualizar, el valor de la respuesta, ya existe para el cliente',
                'type'    => 'danger']);
            }else{
                $UpdateVR = DB::table('ev_respuesta_detalle')->where('IdRespuestaDet',$id)->update(
                    array('IdGrupoRespuesta'=>$IdGrupoRespuesta,
                    'IdRespuesta'=>$IdRespuesta,
                    'iValor'=>$iValor,
                    'Activo'=>$Activo,
                ));
                    
                return redirect()->route('configuracion_valores_de_respuestas')->with(['success' => ' El registro se actualizó con éxito',
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
            DB::delete("delete from ev_respuesta_detalle WHERE IdRespuestaDet = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->route('configuracion_valores_de_respuestas')
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect()->route('configuracion_valores_de_respuestas')
                ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
          }
        }         
    }
}
