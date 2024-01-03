<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bussines\MasterConsultas;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;


class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = null;
        if( $request->user()->isAdmin() ){
            $data = $this->initFieldsAdmin();
        }else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sql = MasterConsultas::exeSQL("ev_pregunta", "READONLY",
        array(
            "IdPregunta" => '-1'
        )
        );

        return view("Encuestas.configuracion.configuracionsecciones.preguntas.index",$data,["listaPreguntas"=>$sql]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $data = null;
        $activo = 'Si';

        if( $request->user()->isAdmin() ){
            $data = $this->initFieldsAdmin();
        } else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $ev_encuesta =DB::select('SELECT * FROM ev_agrupador_encuesta WHERE Activo = "'.$activo.'"');
        $ev_respuesta_grupo =DB::select('SELECT * FROM ev_respuesta_grupo');

        return view("Encuestas.configuracion.configuracionsecciones.preguntas.create.create",$data,[
                    "listaEncuesta"=>$ev_encuesta,
                    "listaRespuesta"=>$ev_respuesta_grupo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $IdAgrupador=$request->input('agrupador');
        $IdGrupoRespuesta=$request->input('agrupadorRespuesta');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_pregunta WHERE IdAgrupador='.$IdAgrupador.' AND IdGrupoRespuesta='.$IdGrupoRespuesta.' AND Pregunta="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/preguntas')->with(['success' => ' La pregunta  '.$request->input('descripcion').' no se creó por que ya existe en el mismo grupo',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_pregunta", "UPDATE",
                    array(
                        "IdAgrupador" => $request->input('agrupador'),
                        "Numero" => $request->input('numero'),
                        "Pregunta" => $request->input('descripcion'),
                        "IdGrupoRespuesta" => $request->input('agrupadorRespuesta'),
                        "Activo" => $request->input('activo'),
                        "iOrden" =>$request->input('orden')
                    )
                );
                
            return redirect('/encuestas/configuracion/preguntas')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
    public function edit($id){
        $editarCT=DB::select('SELECT * FROM ev_pregunta WHERE IdPregunta='.$id);

        foreach ($editarCT as  $editCT) {
            $IdPregunta=$editCT->IdPregunta;
            $IdAgrupador=$editCT->IdAgrupador;
            $Numero=$editCT->Numero;
            $Pregunta=$editCT->Pregunta;
            $IdGrupoRespuesta=$editCT->IdGrupoRespuesta;
            $Activo=$editCT->Activo;
            $iOrden=$editCT->iOrden;
        }

        $nombredelCLI=DB::select('SELECT e.*, e.Descripcion AS descripcionEncuesta FROM ev_agrupador_encuesta e WHERE IdAgrupador='.$IdAgrupador);

        foreach($nombredelCLI as $ncli){
            $descripcionEncuesta=$ncli->descripcionEncuesta;
        }

        $respuestaGrupo=DB::select('SELECT g.*, g.Descripcion AS descripcionGrupo FROM ev_respuesta_grupo g WHERE IdGrupoRespuesta='.$IdGrupoRespuesta);

        foreach($respuestaGrupo as $rg){
            $descripcionGrupo=$rg->descripcionGrupo;
        }

        //$verTipoPuesto=DB::select('SELECT *, Descripcion AS DescripcionPuesto FROM ev_tipo_puesto WHERE IdTipoPuesto='.$IdTipoPuesto);
        $verTipoGrupo=DB::select('SELECT *, Descripcion AS DescripcionGrupo FROM ev_respuesta_grupo WHERE IdGrupoRespuesta='.$IdAgrupador);

        foreach($verTipoGrupo as $vTp){
            $DescripcionGrupo=$vTp->DescripcionGrupo;
        }

        // $tipoPuestos = DB::select('SELECT IdTipoPuesto AS Id, Descripcion AS DescripcionTipoPuesto FROM ev_tipo_puesto');
        $tipoDeRespuesta = DB::select('SELECT IdGrupoRespuesta AS Id, Descripcion AS DescripcionRespuestaGrupo FROM ev_respuesta_grupo');

        foreach($tipoDeRespuesta as $vTp){
            $DescripcionRespuestaGrupo=$vTp->DescripcionRespuestaGrupo;
        }

            return view("Encuestas.configuracion.configuracionsecciones.preguntas.edit.edit",["tipoDeRespuesta"=>$tipoDeRespuesta])
            ->with('IdPregunta', $IdPregunta)
            ->with('IdAgrupador', $IdAgrupador)
            ->with('Numero', $Numero)
            ->with('Pregunta', $Pregunta)
            ->with('IdGrupoRespuesta', $IdGrupoRespuesta)
            ->with('Activo', $Activo)
            ->with('descripcionEncuesta', $descripcionEncuesta)
            ->with('descripcionGrupo', $descripcionGrupo)
            ->with('iOrden',$iOrden)
            ->with('DescripcionRespuestaGrupo', $DescripcionRespuestaGrupo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $descripcionEncuesta=$request->input('descripcionEncuesta');
        $descripcionGrupo=$request->input('descripcionGrupo');
        $pregunta=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_pregunta WHERE IdAgrupador='.$descripcionEncuesta.' AND IdPregunta<>'.$id.' AND Pregunta="'.$pregunta.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/preguntas')->with(['success' => ' Error al actualizar, el grupo de Encuesta '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{

        $actualizarDepartamento = DB::table('ev_pregunta')->where('IdPregunta',$id)->update(
            array(
                //'IdAgrupador'=>$request->input('descripcionEncuesta'),
                'Numero'=>$request->input('numero'),
                'Pregunta'=>$request->input('descripcion'),
                'IdGrupoRespuesta'=>$request->input('cnTipoPuesto'),
                'iOrden'=>$request->input('orden'),
                'Activo'=>$request->input('activo')));


        return redirect('/encuestas/configuracion/preguntas')
        ->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
        'type'    => 'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $resultadoError = null;
        
          try {
              DB::delete("delete from ev_pregunta WHERE IdPregunta = $id");
          }catch (\Exception $e) {
              if($e->getMessage()){
                  $resultadoError = 'Si';
              }
          }finally{
              if($resultadoError=='Si'){
                  return redirect('/encuestas/configuracion/preguntas')
                  ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                  'type'    => 'danger']);
              }else{
                  return redirect('/encuestas/configuracion/preguntas')
                  ->with(['success' => ' El registro se eliminó con éxito',
                  'type'    => 'success']);
            }
          }      
    }

    private function initFieldsAdmin()
    {
        $inicio_mes         = Carbon::now()->startOfMonth()->format('Y-m-d');
        $fin_mes            = Carbon::now()->endOfMonth()->format('Y-m-d');
        $estudios           = EstudioEse::whereBetween('fecha_cierre',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();
        $estudios_proceso   = EstudioEse::whereBetween('fecha_actualizacion',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();
        $estudios_solicitud = EstudioEse::whereBetween('fecha_ingreso',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();

        $estudios_cerrados    = $estudios->where('id_status',EstudioEse::CERRADA);
        $estudios_procesando  = $estudios_proceso->where('id_status',EstudioEse::PROCESO);
        $estudios_facturar    = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status',EstudioEse::SIN_INICIAR);
        $estudios_urgentes    = [];
        $estudios_normales    = [];

        foreach( $estudios_proceso as $estudio ) { 
                if( $estudio->prioridad_estudio->isUrgente() ) $estudios_urgentes[] = $estudio;
                if($estudio->prioridad_estudio->isNormal() )  $estudios_normales[]  = $estudio;
        }        

        return ['estudios_cerrados'    => $estudios_cerrados,
                'estudios_facturar'    => $estudios_facturar,
                'estudios_proceso'     => $estudios_procesando,
                'estudios_mes'         => $estudios,
                'estudios_solicitados' => $estudios_solicitados,
                'estudios_normales'    => $estudios_normales,
                'estudios_urgentes'    => $estudios_urgentes, ];
    }
}
