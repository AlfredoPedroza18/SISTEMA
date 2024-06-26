<?php

namespace App\Http\Controllers\Encuestas\ControladoresCatalogos;

use Illuminate\Http\Request;

use App\Bussines\MasterConsultas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;


class Tipo_de_PuestoController extends Controller
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
    public function index(Request $request)
    {        
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sqlTipoPuesto = MasterConsultas::exeSQL("ev_tipo_puesto", "READONLY",
            array(
                "IdTipoPuesto" => '-1',
            )
        );

        return view("Encuestas.catalogos.formularios.catalogodetipodepuesto.index",$data,["ListaPuesto"=>$sqlTipoPuesto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTipoPuesto(Request $request){
        $data = null;
        $Activo='Si';

        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }


        return view("Encuestas.catalogos.formularios.catalogodetipodepuesto.create.create",$data);        
    }

    public function store(Request $request){
        
        $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_tipo_de_puesto", "UPDATE",
                    array(
                        "Descripcion" => $request->input('descripcion'),
                        "Activo" => $request->input('Activo')
                    )
                );
            return redirect()->route('catalogo_tipo_puesto')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
            'type'    => 'success']);
        
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
        $editarTipoPuesto=DB::select('select *from ev_tipo_puesto where IdTipoPuesto='.$id);

        foreach ($editarTipoPuesto as  $editCT) {
            $IdTipoPuesto=$editCT->IdTipoPuesto;
            $Descripcion=$editCT->Descripcion;
            $Activo=$editCT->Activo;
        }

            return view("Encuestas.catalogos.formularios.catalogodetipodepuesto.edit.edit")
            ->with('IdTipoPuesto', $IdTipoPuesto)
            ->with('Descripcion', $Descripcion)
            ->with('Activo', $Activo);
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
        $Descripcion=$request->input('descripcion');
        $buscarregistro=DB::select('select * from ev_tipo_puesto where IdTipoPuesto<>'.$id.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('catalogo_tipo_puesto')->with(['success' => ' El puesto '.$request->input('descripcion').' ya existe',
            'type'    => 'danger']);
        }else{

        $actualizarDepartamento = DB::table('ev_tipo_puesto')->where('IdTipoPuesto',$id)->update(
            array(
            'Descripcion'=>$request->input('descripcion'),
            'Activo'=>$request->input('activo')));

        return redirect()->route('catalogo_tipo_puesto')
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
              DB::delete("delete from ev_tipo_puesto WHERE IdTipoPuesto = $id");
          }catch (\Exception $e) {
              if($e->getMessage()){
                  $resultadoError = 'Si';
              }
          }finally{
              if($resultadoError=='Si'){
                  return redirect('/catalogo_encuestas/tipo_puesto')
                  ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                  'type'    => 'danger']);
              }else{
                  return redirect('/catalogo_encuestas/tipo_puesto')
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

    private function initFieldsUser( User $usuario )
    {
        /************************************************************************************************/

        $lista_estudios     = $this->getEstudiosUser( $usuario );
        $estudios           = $this->getEstudiosFilterMonth( $lista_estudios );
        $estudios_cerrados  = $this->getEstudiosFilterMonthClosed( $lista_estudios );
        $estudios_solicitud = $this->getEstudiosFilterMonthRequest( $lista_estudios );
        
        $estudios_procesando  = $estudios->where('id_status',EstudioEse::PROCESO);
        $estudios_facturar    = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status',EstudioEse::SIN_INICIAR);
        $estudios_urgentes    = [];
        $estudios_normales    = [];


        foreach( $estudios as $estudio ) {
                if( $estudio->prioridad_estudio->isUrgente() ) $estudios_urgentes[] = $estudio;
                if( $estudio->prioridad_estudio->isNormal() )  $estudios_normales[]  = $estudio;
        }        

        return ['estudios_cerrados'    => $estudios_cerrados,
                'estudios_facturar'    => $estudios_facturar,
                'estudios_proceso'     => $estudios,
                'estudios_mes'         => $estudios,
                'estudios_solicitados' => $estudios_solicitados,
                'estudios_normales'    => $estudios_normales,
                'estudios_urgentes'    => $estudios_urgentes, ];
    }

    private function getEstudiosUser(User $usuario)
    {
        $cn      = CentroNegocio::with('ordenes_servicio.ordendes_servicio_ese.estudiosEse')->where( 'id', $usuario->idcn )->get()[0];
        $ordenes = $cn->ordenes_servicio;
        $estudios = new Collection();

        foreach( $ordenes as $orden ){
            if( $orden->ordendes_servicio_ese->count() > 0 )
            {
                $ordenes_ese = $orden->ordendes_servicio_ese;
                foreach( $ordenes_ese as $orden_ese ){
                    if( $orden_ese->estudiosEse->count() > 0 )
                    {
                        $estudios = $estudios->merge( $orden_ese->estudiosEse );
                    }
                }               
            }
        }

        return $estudios;
    }

    private function getEstudiosFilterMonth(Collection $lista_estudios)
    {
        $estudios = new Collection();

        $lista_estudios->map(function ($item, $key) use( $estudios ) {

            if( $item->isBetweenMonth() ){                
                $estudios = $estudios->push( $item );
            }   
        });

        return $estudios;
    }

    private function getEstudiosFilterMonthClosed(Collection $lista_estudios)
    {
        $estudios_cerrados = new Collection();

        $lista_estudios->map(function ($item, $key) use( $estudios_cerrados ) {

            if( $item->isClosed() ){                
                $estudios_cerrados = $estudios_cerrados->push( $item );
            }   
        });

        return $estudios_cerrados;
    }

    private function getEstudiosFilterMonthRequest(Collection $lista_estudios)
    {
        $estudios_pedidos = new Collection();

        $lista_estudios->map(function ($item, $key) use( $estudios_pedidos ) {

            if( $item->isRequestMonth() ){                
                $estudios_pedidos = $estudios_pedidos->push( $item );
            }   
        });

        return $estudios_pedidos;
    }
    private function DataDashboard()
    {
        $clientes=DB::select('select IdCliente, CONCAT("Concesión ",Nombre) as Nombre from master_clientes'); 
        $estatus_proceso=DB::select('select Estatus from master_ese_srv_os GROUP BY Estatus');
        $investigadores=DB::select('select 
                                    mee.IdEmpleado,
                                    concat(mee.Nombre," ",
                                                ifnull(mee.SegundoNombre,"")," ",
                                                mee.ApellidoPaterno," ",
                                                ifnull( mee.ApellidoMaterno,"") ) 
                                    as NombreCompleto,
                                    e.FK_nombre_estado  as Estado
                                    from master_ese_empleado as mee
                                    Inner Join users as u ON u.IdEmpleado = mee.IdEmpleado
                                    Inner Join master_ese_mobile_settings as mems ON mems.IdRolInvestigador = u.IdRol
                                    Inner join estados as e on e.IdEstado = mee.IdEstado');
        $tiposClientes=array("Interno","Externo");
        $totalservicios=DB::select('select count(ess.IdServicioEse) TotalServicios
                                    from master_ese_srv_servicio ess');
        $totalporservicio=DB::select('select et.Descripcion,
                                        (select COUNT(ess1.IdServicioEse) as totalReferenciaslaborales
                                            from master_ese_plantilla_cliente epc1
                                            INNER JOIN master_ese_srv_servicio ess1 ON ess1.IdPlantillaCliente = epc1.IdPlantillaCliente
                                            INNER JOIN master_ese_plantilla ep1 ON epc1.IdPlantilla = ep1.IdPlantilla
                                            INNER JOIN master_ese_tiposervicio et1 ON ep1.IdTipoServicio = et1.IdTipoServicio
                                            where et1.IdTipoServicio = et.IdTipoServicio) total
                                        from master_ese_plantilla_cliente epc
                                        INNER JOIN master_ese_srv_servicio ess ON ess.IdCliente = epc.IdCliente
                                        INNER JOIN master_ese_plantilla ep ON epc.IdPlantilla = ep.IdPlantilla
                                        INNER JOIN master_ese_tiposervicio et ON ep.IdTipoServicio = et.IdTipoServicio
                                        GROUP BY et.Descripcion');
        $prioridadservicios=DB::select('SELECT ep.Descripcion,
                                        (SELECT COUNT(ep1.IdPrioridad) as totalprioridadbaja
                                            FROM master_ese_srv_servicio ess1
                                            INNER JOIN master_ese_prioridades ep1 ON ess1.IdPrioridad = ep1.IdPrioridad
                                            where ep1.IdPrioridad=ep.IdPrioridad) as total
                                        FROM master_ese_srv_servicio ess
                                        INNER JOIN master_ese_prioridades ep ON ess.IdPrioridad = ep.IdPrioridad
                                        GROUP BY ep.Descripcion  ORDER BY ep.IdPrioridad ASC');
        $modalidadservicios=DB::select('SELECT em.Descripcion,
                                        (SELECT COUNT(ess1.IdModalidad) TotalPresencial
                                        FROM master_ese_modalidad em1 
                                        INNER JOIN master_ese_srv_servicio ess1
                                        ON ess1.IdModalidad = em1.IdModalidad
                                        WHERE em1.IdModalidad=em.IdModalidad) as total
                                        FROM master_ese_modalidad em 
                                        INNER JOIN master_ese_srv_servicio ess
                                        ON ess.IdModalidad = em.IdModalidad
                                        GROUP BY em.Descripcion');
        

        foreach($totalservicios as $tsrv){
                $Totalservicio = $tsrv->TotalServicios;
        }
        return ["clientes"=>$clientes,
                "estatus_proceso"=>$estatus_proceso,
                "investigadores"=>$investigadores,
                "tiposClientes"=>$tiposClientes,
                "Totalservicio"=>$Totalservicio,
                "totalporservicio"=>$totalporservicio,
                "prioridadservicios"=>$prioridadservicios,
                "modalidadservicios"=>$modalidadservicios
               ];
    }
    //Filtros
    public function getDataChart($Id,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $chart = $objDashboard->GetDataChartDashboard($Id,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($chart);
    }
    public function GetDataByClient($IdCliente,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByClient($IdCliente,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByInvestigator($IdInvestigador,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByInvestigator($IdInvestigador,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByAnalist($IdAnalista,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByAnalist($IdAnalista,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByPeriod($Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByPeriod($Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByTypeClient($TipoCliente,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByTypeClient($TipoCliente,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }

    public function GetDataByStatusProcess($Estatus,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByStatusProcess($Estatus,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    //Limpiar filtros
    public function GetClients()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataClients();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetInvestigators()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataInvestigators();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetAnalists()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataAnalists();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetTypeClients()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataTypeClients();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetStatusProcess()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataStatusProcess();
        unset($objDashboard);
        return response()->json($data);
    }
    function GetBoxHeader(){
        $objDashboard = new Dashboard();
        $initdatadashboad = $objDashboard->initDataDashboard();
        unset($objDashboard);
        return response()->json($initdatadashboad);       
    }
    function GetDataByAll(){

    }

}
