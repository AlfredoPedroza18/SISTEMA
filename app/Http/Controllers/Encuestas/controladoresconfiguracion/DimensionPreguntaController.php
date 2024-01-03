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

class DimensionPreguntaController extends Controller
{
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

        $sql = MasterConsultas::exeSQL("ev_dimension_pregunta", "READONLY",
        array(
            "IdDimensionPreg" => '-1'
        )
        );
        return view("Encuestas.configuracion.configuracionsecciones.dimensionpregunta.index",$data,["listaDimension"=>$sql]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDP(Request $request){
        $data = null;
        $activo = 'Si';

        if( $request->user()->isAdmin() ){
            $data = $this->initFieldsAdmin();
        } else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $ev_dimension =DB::select('SELECT * FROM ev_dimension');
        $ev_pregunta =DB::select('SELECT * FROM ev_pregunta WHERE Activo = "'.$activo.'"');

        return view("Encuestas.configuracion.configuracionsecciones.dimensionpregunta.create.create",$data,[
            "listaDimension"=>$ev_dimension,
            "listaPregunta"=>$ev_pregunta]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $IdDimension=$request->input('dimension');
        $IdPregunta=$request->input('pregunta');

        $buscarregistro=DB::select('SELECT * FROM ev_dimension_pregunta WHERE IdDimension='.$IdDimension.' AND IdPregunta='.$IdPregunta);

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/dimension_pregunta')->with(['success' => ' La dimensión que intenta crear ya existe',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_dmension_pregunta", "UPDATE",
                    array(
                        "IdDimension" => $request->input('dimension'),
                        "IdPregunta" => $request->input('pregunta')
                    )
                );
                
            return redirect('/encuestas/configuracion/dimension_pregunta')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $activo = 'Si';
        $data = null;
        $editarDimension=DB::select('SELECT * FROM ev_dimension_pregunta WHERE IdDimensionPreg='.$id);

        foreach ($editarDimension as  $editCT) {
            $IdDimensionPreg=$editCT->IdDimensionPreg;
            $IdDimension=$editCT->IdDimension;
            $IdPregunta=$editCT->IdPregunta;
        }

        $nombredelCLI=DB::select('SELECT * FROM ev_dimension ed WHERE IdDimension='.$IdDimension);

        foreach($nombredelCLI as $ncli){
            $Descripcion=$ncli->Descripcion;
        }

        $descPregunta=DB::select('SELECT * FROM ev_pregunta WHERE IdPregunta='.$IdPregunta);

        foreach($descPregunta as $p){
            $Pregunta=$p->Pregunta;
        }

        $ev_pregunta =DB::select('SELECT * FROM ev_pregunta WHERE Activo = "'.$activo.'"');

            return view("Encuestas.configuracion.configuracionsecciones.dimensionpregunta.edit.edit",["listaPregunta"=>$ev_pregunta])
            ->with('IdDimensionPreg', $IdDimensionPreg)
            ->with('IdDimension', $IdDimension)
            ->with('IdPregunta', $IdPregunta)
            ->with('Pregunta', $Pregunta)
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
        //
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
            DB::delete("delete from ev_dimension_pregunta WHERE IdDimensionPreg = $id");
          }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
          }finally{
            if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/dimension_pregunta')->with(['success' => 'Error al eliminar el registro, este esta siendo usado en alguna configuración',
                'type'    => 'danger']);
            }else{
                return redirect('/encuestas/configuracion/dimension_pregunta')
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
