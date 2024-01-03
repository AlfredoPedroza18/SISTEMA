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


class GrupoDeEncuestasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sqlGrupoEncuesta = MasterConsultas::exeSQL("ev_agrupador_encuesta", "READONLY",
        array(
            "IdAgrupador" => '-1'
        )
        );

        

        return view("Encuestas.configuracion.configuracionsecciones.grupodeencuestas.index",$data,["listaGrupoEncuesta"=>$sqlGrupoEncuesta]);

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

        $ev_encuesta =DB::select('SELECT * FROM ev_encuesta WHERE Activo = "'.$activo.'"');

        return view("Encuestas.configuracion.configuracionsecciones.grupodeencuestas.create.create",$data,["listaGrupoEncuesta"=>$ev_encuesta]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $IdEncuesta=$request->input('encuesta');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_agrupador_encuesta WHERE IdEncesta='.$IdEncuesta.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('encuestas/configuracion/grupo_de_encuestas')->with(['success' => ' El Grupo  '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_agrupador_encuesta", "UPDATE",
                    array(
                        "IdEncesta" => $request->input('encuesta'),
                        "Descripcion" => $request->input('descripcion'),
                        "iOrden"=>$request->input('orden'),
                        "Activo" => $request->input('activo')
                    )
                );
                
            return redirect('/encuestas/configuracion/grupo_de_encuestas')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        //Elemento que se va a editar
        $editarCT=DB::select('SELECT * FROM ev_agrupador_encuesta WHERE IdAgrupador='.$id);

        foreach ($editarCT as  $editCT) {
            $IdAgrupador=$editCT->IdAgrupador;
            $IdEncuesta=$editCT->IdEncesta;
            $Descripcion=$editCT->Descripcion;
            $Activo=$editCT->Activo;
            $iOrden=$editCT->iOrden;
        }

        $nombredelCLI=DB::select('SELECT Descripcion AS descripcionEncuesta, ev_encuesta.* FROM ev_encuesta WHERE IdEncuesta='.$IdEncuesta);

        foreach($nombredelCLI as $ncli){
            $descripcionEncuesta=$ncli->descripcionEncuesta;
        }

            return view("Encuestas.configuracion.configuracionsecciones.grupodeencuestas.edit.edit")
            ->with('IdAgrupador', $IdAgrupador)
            ->with('IdEncesta', $IdEncuesta)
            ->with('Descripcion', $Descripcion)
            ->with('Activo', $Activo)
            ->with('iOrden', $iOrden)
            ->with('descripcionEncuesta', $descripcionEncuesta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $IdEncuesta=$request->input('cntC');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_agrupador_encuesta WHERE IdEncesta='.$IdEncuesta.' AND IdAgrupador<>'.$id.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/grupo_de_encuestas')->with(['success' => ' Error al actualizar, el grupo de Encuesta '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{

        $actualizarDepartamento = DB::table('ev_agrupador_encuesta')->where('IdAgrupador',$id)->update(
            array(
                'IdEncesta'=>$request->input('cntC'),
                'Descripcion'=>$request->input('descripcion'),
                'iOrden'=>$request->input('orden'),
                'Activo'=>$request->input('activo')));


        return redirect('/encuestas/configuracion/grupo_de_encuestas')
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
    public function destroy($id){
          $resultadoError = null;
        
          try {
              DB::delete("delete from ev_agrupador_encuesta WHERE IdAgrupador = $id");
          }catch (\Exception $e) {
              if($e->getMessage()){
                  $resultadoError = 'Si';
              }
          }finally{
              if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/grupo_de_encuestas')
                  ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                  'type'    => 'danger']);
              }else{
                return redirect('/encuestas/configuracion/grupo_de_encuestas')
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
