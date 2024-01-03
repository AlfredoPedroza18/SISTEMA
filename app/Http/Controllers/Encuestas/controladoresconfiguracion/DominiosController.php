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

class DominiosController extends Controller
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
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sql = MasterConsultas::exeSQL("ev_dominio", "READONLY",
        array(
            "IdDominio" => '-1'
        )
        );


    
        return view("Encuestas.configuracion.configuracionsecciones.dominios.index",$data,["listaDeDominios"=>$sql]);

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

        $ev_categorias =DB::select('SELECT * FROM ev_categorias');

        return view("Encuestas.configuracion.configuracionsecciones.dominios.create.create",$data,["listaCategorias"=>$ev_categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $IdCategoria=$request->input('categoria');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_dominio WHERE IdCategoria='.$IdCategoria.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('encuestas/configuracion/dominios')->with(['success' => ' El Grupo  '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{
            $AltaCT=MasterConsultas::exeSQLStatement("create_ev_dominio", "UPDATE",
                    array(
                        "IdCategoria" => $request->input('categoria'),
                        "Descripcion" => $request->input('descripcion')
                    )
                );
                
            return redirect('encuestas/configuracion/dominios')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $editarDominio=DB::select('SELECT * FROM ev_dominio WHERE IdDominio='.$id);

        foreach ($editarDominio as  $editCT) {
            $IdDominio=$editCT->IdDominio;
            $IdCategoria=$editCT->IdCategoria;
            $Descripcion=$editCT->Descripcion;
        }

        $nombredelCLI=DB::select('SELECT ec.*, ec.Descripcion AS descripcionCategoria FROM ev_categorias ec WHERE IdCategoria='.$IdCategoria);

        foreach($nombredelCLI as $ncli){
            $descripcionCategoria=$ncli->descripcionCategoria;
        }

            return view("Encuestas.configuracion.configuracionsecciones.dominios.edit.edit")
            ->with('IdDominio', $IdDominio)
            ->with('IdCategoria', $IdCategoria)
            ->with('Descripcion', $Descripcion)
            ->with('descripcionCategoria', $descripcionCategoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $IdCategoria=$request->input('cntC');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('SELECT * FROM ev_dominio WHERE IdCategoria='.$IdCategoria.' AND IdDominio<>'.$id.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('encuestas/configuracion/dominios')->with(['success' => ' Error al actualizar, el grupo de Encuesta '.$request->input('descripcion').' ya existe para la encuesta',
            'type'    => 'danger']);
        }else{

        $actualizarDepartamento = DB::table('ev_dominio')->where('IdDominio',$id)->update(
            array(
                'Descripcion'=>$request->input('descripcion')
            ));


        return redirect('/encuestas/configuracion/dominios')
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
            DB::delete("delete from ev_dominio WHERE IdDominio = $id");
          }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
          }finally{
            if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/dominios')->with(['success' => ' Error al eliminar el registro, este ya se encuentra relacionado con una dimension',
                'type'    => 'danger']);
            }else{
            return redirect('/encuestas/configuracion/dominios')
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
