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

class DimensionController extends Controller
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

        $sql = MasterConsultas::exeSQL("ev_dimension", "READONLY",
        array(
            "IdDimension" => '-1'
        )
        );

        return view("Encuestas.configuracion.configuracionsecciones.dimension.index",$data,["listaDimension"=>$sql]);
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

        $ev_dominio =DB::select('SELECT * FROM ev_dominio');

        return view("Encuestas.configuracion.configuracionsecciones.dimension.create.create",$data,["listaDominio"=>$ev_dominio]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $IdDominio=$request->input('dominio');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_dimension WHERE IdDominio='.$IdDominio.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('encuestas/configuracion/dimension')->with(['success' => ' El Dominio  '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_dimension", "UPDATE",
                    array(
                        "IdDominio" => $request->input('dominio'),
                        "Descripcion" => $request->input('descripcion')
                    )
                );
                
            return redirect('encuestas/configuracion/dimension')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $editarDimension=DB::select('SELECT * FROM ev_dimension WHERE IdDimension='.$id);

        foreach ($editarDimension as  $editCT) {
            $IdDimension=$editCT->IdDimension;
            $IdDominio=$editCT->IdDominio;
            $Descripcion=$editCT->Descripcion;
        }

        $nombredelCLI=DB::select('SELECT ed.*, ed.Descripcion AS descripcionDominio FROM ev_dominio ed WHERE IdDominio='.$IdDominio);

        foreach($nombredelCLI as $ncli){
            $descripcionDominio=$ncli->descripcionDominio;
        }

            return view("Encuestas.configuracion.configuracionsecciones.dimension.edit.edit")
            ->with('IdDimension', $IdDimension)
            ->with('IdDominio', $IdDominio)
            ->with('Descripcion', $Descripcion)
            ->with('descripcionDominio', $descripcionDominio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $IdDominio=$request->input('cntC');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_dimension WHERE IdDominio='.$IdDominio.' AND IdDimension<>'.$id.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/dimension')->with(['success' => ' Error al actualizar, el grupo de Encuesta '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{

        $actualizarDepartamento = DB::table('ev_dimension')->where('IdDimension',$id)->update(
            array(
                'Descripcion'=>$request->input('descripcion')
            ));


        return redirect('/encuestas/configuracion/dimension')
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
            DB::delete("delete from ev_dimension WHERE IdDimension = $id");
          }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
          }finally{
            if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/dimension')->with(['success' => ' Ocurrio un error al eliminar registro',
                'type'    => 'danger']);
            }else{
            return redirect('/encuestas/configuracion/dimension')
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
