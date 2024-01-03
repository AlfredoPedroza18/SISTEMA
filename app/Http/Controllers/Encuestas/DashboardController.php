<?php

namespace App\Http\Controllers\Encuestas;

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
use Illuminate\Support\Facades\Auth; 

class DashboardController extends Controller
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


        $periodos = MasterConsultas::exeSQL("ev_dashboard_periodo", "READONLY",
        array(
                "IdPeriodo" => '-1'
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );

        

 
        return view("Encuestas.dashboard.index",$data,
        [
      
        "periodos"=>$periodos,
        "tiposencuesta"=>$tiposencuesta,
        "clientes"=>$clientes,
        "totalservicios"=>$totalservicios,
        ]);
    }

    public function indexcliente(Request $request)
    {        
       
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $periodos = MasterConsultas::exeSQL("ev_dashboard_periodo", "READONLY",
        array(
                "IdPeriodo" => '-1'
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

       
        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );

        $tableClient = MasterConsultas::exeSQL("ev_dashboard_tclient", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );
        

        

 
        return view("Encuestas.dashboard.indexcliente",$data,
        [
      
        "periodos"=>$periodos,
        "tiposencuesta"=>$tiposencuesta,
        "clientes"=>$clientes,
        "totalservicios"=>$totalservicios,
        "tableClient"=>$tableClient
        ]);
    }

    public function getDataChart($Id,$YFecha)
    {
        $chart = $this->GetDataChartDashboard($Id,$YFecha);
        return response()->json($chart);
    }

    public function getDataChartClient($Id,$YFecha)
    {
        $chart = $this->GetDataChartDashboardClient($Id,$YFecha);
        return response()->json($chart);
    }


    //Limpiar filtros
    public function GetClients($YFecha)
    {
        $data = $this->GetDataClients($YFecha);
        return response()->json($data);
    }

    public function GetTipoEncuesta($YFecha,$idclientselect)
    {
        $data = $this->GetDataTipoEncuesta($YFecha,$idclientselect);
        return response()->json($data);
    }

    public function GetTipoEncuestaClient($YFecha)
    {
        $data = $this->GetDataTipoEncuestaClient($YFecha);
        return response()->json($data);
    }

    public function GetDataByClient($IdCliente,$YFecha)
    {
        $data = $this->GetDataDashboardByClient($IdCliente,$YFecha);
        return response()->json($data);
    }

    public function GetDataByTipoEncuesta($IdTEncuesta,$YFecha,$idclientselect)
    {
        $data = $this->GetDataDashboardByTipoEncuesta($IdTEncuesta,$YFecha,$idclientselect);
        return response()->json($data);
    }

    public function GetDataByTipoEncuestaClient($IdTEncuesta,$YFecha)
    {
        $data = $this->GetDataDashboardByTipoEncuestaClient($IdTEncuesta,$YFecha);
        return response()->json($data);
    }

    function GetBoxHeader(){
        
        $initdatadashboad = $this->initDataDashboard();
        return response()->json($initdatadashboad);       
    }

    function GetBoxHeaderClient(){
        
        $initdatadashboad = $this->initDataDashboardClient();
        return response()->json($initdatadashboad);       
    }

    public function GetDataByPeriod($YFecha)
    {
        $data = $this->GetDataDashboardByPeriod($YFecha);
        return response()->json($data);
    }

    public function GetDataByPeriodClient($YFecha)
    {
        $data = $this->GetDataDashboardByPeriodClient($YFecha);
        return response()->json($data);
    }


    public function initDataDashboard()
    {
        $periodos = MasterConsultas::exeSQL("ev_dashboard_periodo", "READONLY",
        array(
                "IdPeriodo" => '-1'
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );

        foreach($totalservicios as $tsrv){
                $Totalservicio = $tsrv->TotalServicios;
        }

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => -1,
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );

        return ["periodos"=>$periodos,
                "tiposencuesta"=>$tiposencuesta,
                "clientes"=>$clientes,
                "totalservicios"=>$Totalservicio,
                "totalserviciosmes"=>$totalserviciosmes
               ];
    }

    public function initDataDashboardClient()
    {
        $periodos = MasterConsultas::exeSQL("ev_dashboard_periodo", "READONLY",
        array(
                "IdPeriodo" => '-1'
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo
             ) 
        );

       
        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );

        foreach($totalservicios as $tsrv){
            $Totalservicio = $tsrv->TotalServicios;
        }

        $tableClient = MasterConsultas::exeSQL("ev_dashboard_tclient", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $periodos[0]->Periodo,
                "IdTipoServicio" => -1
             ) 
        );

       
        return ["periodos"=>$periodos,
                "tiposencuesta"=>$tiposencuesta,
                "clientes"=>$clientes,
                "totalservicios"=>$Totalservicio,
                "tableClient"=>$tableClient
               ];
    }

    public function GetDataChartDashboard($Id,$YFecha)
    {
        $periodos = MasterConsultas::exeSQL("ev_dashboard_periodo", "READONLY",
        array(
                "IdPeriodo" => '-1'
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha
             ) 
        );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );


        return [
                "periodos"=>$periodos,
                "tiposencuesta"=>$tiposencuesta,
                "clientes"=>$clientes,
                "totalservicios"=>$totalservicios,
                "totalserviciosmes"=>$totalserviciosmes
               ];
    }

    public function GetDataChartDashboardClient($Id,$YFecha)
    {
        $periodos = MasterConsultas::exeSQL("ev_dashboard_periodo", "READONLY",
        array(
                "IdPeriodo" => '-1'
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha
             ) 
        );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        $tableClient = MasterConsultas::exeSQL("ev_dashboard_tclient", "READONLY",
        array(
                "IdCliente" => $Id,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );


        return [
                "periodos"=>$periodos,
                "tiposencuesta"=>$tiposencuesta,
                "clientes"=>$clientes,
                "totalservicios"=>$totalservicios,
                "totalserviciosmes"=>$totalserviciosmes,
                "tableClient"=>$tableClient
               ];
    }

    public function GetDataDashboardByClient($IdCliente,$YFecha)
    {
        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => $IdCliente,
                "YFecha" => $YFecha
             ) 
        );

        // $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        // array(
        //         "IdCliente" => $Id,
        //         "YFecha" => $YFecha
        //      ) 
        // );

        // $estatus = MasterConsultas::exeSQL("ev_dashboard_estatus_serv", "READONLY",
        // array(
        //         "YFecha" => $YFecha
        //      ) 
        // );

        // $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        // array(
        //         "IdCliente" => $Id,
        //         "YFecha" => $YFecha
        //      ) 
        // );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => $IdCliente,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        foreach($totalservicios as $tsrv){
            $Totalservicio = $tsrv->TotalServicios;
        }

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => $IdCliente,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );


        return [
                "tiposencuesta"=>$tiposencuesta,
                "totalservicios"=>$Totalservicio,
                "totalserviciosmes"=>$totalserviciosmes
               ];
    }

    public function GetDataDashboardByTipoEncuesta($IdTEncuesta,$YFecha,$idclientselect)
    {
        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => $idclientselect,
                "YFecha" => $YFecha,
                "IdTipoServicio" => $IdTEncuesta
             ) 
        );

        foreach($totalservicios as $tsrv){
            $Totalservicio = $tsrv->TotalServicios;
        }

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => $idclientselect,
                "YFecha" => $YFecha,
                "IdTipoServicio" => $IdTEncuesta
             ) 
        );


        return [
                // "tiposencuesta"=>$tiposencuesta,
                "totalservicios"=>$Totalservicio,
                "totalserviciosmes"=>$totalserviciosmes
               ];
    }

    public function GetDataDashboardByPeriod($YFecha)
    {
        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => -1,
                "YFecha" => $YFecha
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => -1,
                "YFecha" => $YFecha
             ) 
        );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => -1,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => -1,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        foreach($totalservicios as $tsrv){
                $Totalservicio = $tsrv->TotalServicios;
        }
        
        return [
            "tiposencuesta"=>$tiposencuesta,
            "clientes"=>$clientes,
            "totalservicios"=>$Totalservicio,
            "totalserviciosmes"=>$totalserviciosmes
               ];

    }

    public function GetDataDashboardByTipoEncuestaClient($IdTEncuesta,$YFecha)
    {

        $tableClient = MasterConsultas::exeSQL("ev_dashboard_tclient", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha,
                "IdTipoServicio" => $IdTEncuesta
             ) 
        );
        
        return [
            "tableClient"=>$tableClient
               ];
    }

    public function GetDataDashboardByPeriodClient($YFecha)
    {
        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha
             ) 
        );

        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha
             ) 
        );

        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        foreach($totalservicios as $tsrv){
                $Totalservicio = $tsrv->TotalServicios;
        }

        $tableClient = MasterConsultas::exeSQL("ev_dashboard_tclient", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );
        
        return [
            "tiposencuesta"=>$tiposencuesta,
            "clientes"=>$clientes,
            "totalservicios"=>$Totalservicio,
            "totalserviciosmes"=>$totalserviciosmes,
            "tableClient"=>$tableClient
               ];

    }

     //Funciones para limpiar filtros
     public function GetDataClients($YFecha){
        $clientes = MasterConsultas::exeSQL("ev_dashboard_clientes", "READONLY",
        array(
                "IdCliente" => '-1',
                "YFecha" => $YFecha
             ) 
        );
        return ["clientes"=>$clientes];
    }

    public function GetDataTipoEncuesta($YFecha,$idclientselect){
        $totalservicios = MasterConsultas::exeSQL("ev_dashboard_totalservicios", "READONLY",
        array(
                "IdCliente" => $idclientselect,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => $idclientselect,
                "YFecha" => $YFecha
             ) 
        );

        foreach($totalservicios as $tsrv){
            $Totalservicio = $tsrv->TotalServicios;
        }

        $totalserviciosmes = MasterConsultas::exeSQL("ev_dashboard_totalserviciosmes", "READONLY",
        array(
                "IdCliente" => $idclientselect,
                "YFecha" => $YFecha,
                "IdTipoServicio" => -1
             ) 
        );

        return ["tiposencuesta"=>$tiposencuesta,"totalservicios"=>$Totalservicio,"totalserviciosmes"=>$totalserviciosmes];
    }

    public function GetDataTipoEncuestaClient($YFecha){
        $tiposencuesta = MasterConsultas::exeSQL("ev_dashboard_tiposencuesta", "READONLY",
        array(
                "IdCliente" => Auth::user()->IdCliente,
                "YFecha" => $YFecha
             ) 
        );
        return ["tiposencuesta"=>$tiposencuesta];
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
        //
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
        //
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
    public function destroy($id)
    {
        //
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


}
