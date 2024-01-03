<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

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
use App\Bussines\MasterConsultas;
use Illuminate\Support\Facades\Redirect;


class EncuestasController extends Controller
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
        $listaEncuestas = MasterConsultas::exeSQL("ev_lista_encuestas", "READONLY",
        array(
                "IdServicio" => '-1'
            )
        );

        // $revisiones = DB::select("select a.Descripcion, b.IdCliente, c.nombre_comercial from ev_encuesta as a inner join ev_acciones as b inner join clientes as c on b.IdCliente = c.id where -1;");

        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        return view("Encuestas.encuestas.index",["listaEncuestas"=>$listaEncuestas]);
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
    public function edit($id){
        
        $centroTrabajo = MasterConsultas::exeSQL("ev_obtener_departamentos", "READONLY",
        array(
                "IdServicio" => $id
            )
        );

        $ev_servicio = DB::SELECT('SELECT * FROM ev_servicio WHERE IdServicio = '.$id);
        $departamentos=DB::SELECT('SELECT * FROM ev_departamentos WHERE IdCliente = '.$ev_servicio[0]->IdCliente);

        $ev_puestos=DB::SELECT('SELECT * FROM ev_puestos WHERE IdCliente ='.$ev_servicio[0]->IdCliente);

        return view("Encuestas.encuestas.edit",
                    [
                        "centroTrabajo"=>$centroTrabajo,
                        "departamentos"=>$departamentos,
                        "ev_puestos" => $ev_puestos
                    ]);
    }

    public function eliminarCentroTrabajo($id){
        $resultadoError = null;
        $conocerError;
        try {
            DB::delete("delete from ev_centros_trabajo WHERE IdCentro = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
                $conocerError = $e->getMessage();
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->back()->with(['success' => 'Ocurrió un error al eliminar el registro, contacte al equipo de soporte',
                'type'    => 'danger']);;
            }else{
                return redirect()->back()->with(['success' => 'Centro de trabajo eliminado con éxito',
                'type'    => 'success']);;
            }
        }
    }

    public function eliminarDepartamentos($id){
        $resultadoError = null;
        $conocerError;
        try {
            DB::delete("delete from ev_departamentos WHERE IdDeptoCliente = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
                $conocerError = $e->getMessage();
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->back()->with(['success' => 'Ocurrió un error al eliminar el registro, contacte al equipo de soporte',
                'type'    => 'danger']);;
            }else{
                return redirect()->back()->with(['success' =>'Departamento eliminado con éxito',
                'type'    => 'success']);;
            }
        }
    }

    public function storeCT(Request $request){
        $IdCliente = $request->input('idcliente');
        $idServicio = $request->input('idservicio');

        foreach ($request->addmore as $key) {
            //Consultamos centros de trabajos existentes
            $buscarregistro=DB::select('select * from ev_centros_trabajo where IdCliente='.$IdCliente.' AND Descripcion="'.str_replace('"','',json_encode($key['Descripcion'])).'"');
            $arrayvacio=empty($buscarregistro);

            if($arrayvacio==false){
                return redirect()->back()->with(['success' => 'Este Centro de Trabajo ya existe',
                'type'    => 'danger']);;
            }else{
                $idCentro = DB::table('ev_centros_trabajo')->insertGetId([
                    'IdCliente' => $IdCliente,
                    'Descripcion' => str_replace('"','',json_encode($key['Descripcion']))
            ]);

            //ev_servicio_cliente
            $idServicioCliente = DB::table('ev_servicio_cliente')->insertGetId([
                'IdServicio' => $idServicio,
                'IdCentro' => $idCentro,
                'CantidadCentro' => json_decode($key['Cantidad']) 
            ]);
            }
        }
        return redirect()->back()->with(['success' =>'Centro (s) creado (s) con éxito',
                'type'    => 'success']);;
    }

    public function updateCentroTrabajo(Request $request, $id){
            $IdCliente = $request->input('idcliente');
            $idServicio = $request->input('idservicio');
            $ctDescripcion = $request->input('ctDescripcion');
            $idCT = $request->input('idCT');
            
            $ctCantidad = $request->input('ctCantidad');

            $buscarregistro=DB::select('select * from ev_centros_trabajo where IdCliente='.$IdCliente.' AND IdCentro<>'.$id.' AND Descripcion="'.$ctDescripcion.'"');
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->back()->with(['success' => 'Este departamaento ya existe',
                'type'    => 'danger']);;
            }else{
                $actualizarDescripcionCT = DB::table('ev_centros_trabajo')->where('IdCentro',$id)->update(
                    array(
                        'Descripcion'=>$ctDescripcion
                ));

                $actualizarCantidadCT = DB::table('ev_servicio_cliente')->where('IdCentro',$id)->update(
                    array(
                        'CantidadCentro'=>$ctCantidad
                ));
                    
                return redirect()->back()->with(['success' =>'Centro de trabajo actualizado con éxito',
                'type'    => 'success']);;
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



    public function startEncuesta($IdEncuesta, $IdServicioCliente,$codigoUnico){
        $datosEncuesta = DB::select('select * from ev_encuesta where IdEncuesta='.$IdEncuesta);

        $datosServicioCliente = DB::select('select * from ev_servicio_cliente where IdServicio_cliente='.$IdServicioCliente);

        $datosServicio = DB::select('select * from ev_servicio where IdServicio='.$datosServicioCliente[0]->IdServicio);

        $datosCliente = DB::select('select * from clientes where id='.$datosServicio[0]->IdCliente);

        $datosPeriodo = DB::select('select * from ev_periodos where IdPeriodo='.$datosServicio[0]->IdPeriodo);

        $personal = DB::select('select IdPersonal from ev_servicio_detalle where CodigoUnico="'.$codigoUnico.'"');
        
        foreach($personal as $per){
            $IdPersonal=$per->IdPersonal;
        }
        $datosPersonal=DB::select('select * from ev_personal where IdPersonal='.$IdPersonal);

        
        $IdCliente = $datosCliente[0]->id;
        $IdEncuesta = $IdEncuesta;

        $IdServicioDetalle = DB::select('SELECT * FROM ev_servicio_detalle WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);


        foreach($IdServicioDetalle as $row){
            $Estatus = $row->Estatus;
        }

        $politica = MasterConsultas::exeSQL("ev_politica_cliente", "READONLY",
            array(
                "idCliente" => $IdCliente
            )
        );

        $encuesta = DB::select("SELECT ee.IdEncuesta, ee.Descripcion FROM ev_encuesta ee;");

        if($IdEncuesta == 12){
            $tamanoo = 0;
            $numrespuestas = DB::select('SELECT ep.IdGenero,ep.IdRango,ep.IdEstadoCivil,ep.IdNivelEstudio,ep.IdPuestoCliente,ep.IdTipoPuesto,ep.IdDeptoCliente,ep.IdCentroTrabajo,ep.IdTipoContrato,ep.IdTipoPersonal,ep.IdTipoJornada,ep.IdAntiguedad,ep.IdExperiencia,ep.RolaTurno FROM ev_personal ep WHERE IdPersonal = '.$IdPersonal);
            $row = $numrespuestas;
            foreach($numrespuestas as $row){
                if($row->IdGenero != "" || $row->IdGenero != null){
                    $tamanoo = $tamanoo + 1;
                    if($row->IdRango != "" || $row->IdRango != null){
                        $tamanoo = $tamanoo + 1;
                        if($row->IdEstadoCivil != "" || $row->IdEstadoCivil != null){
                            $tamanoo = $tamanoo + 1;
                            if($row->IdNivelEstudio != "" || $row->IdNivelEstudio != null){
                                $tamanoo = $tamanoo + 1;
                                if($row->IdPuestoCliente != "" || $row->IdPuestoCliente != null){
                                    $tamanoo = $tamanoo + 1;
                                    if($row->IdTipoPuesto != "" || $row->IdTipoPuesto != null){
                                        $tamanoo = $tamanoo + 1;
                                        if($row->IdDeptoCliente != "" || $row->IdDeptoCliente != null){
                                            $tamanoo = $tamanoo + 1;
                                            if($row->IdCentroTrabajo != "" || $row->IdCentroTrabajo != null){
                                                $tamanoo = $tamanoo + 1;
                                                if($row->IdTipoContrato != "" || $row->IdTipoContrato != null){
                                                    $tamanoo = $tamanoo + 1;
                                                    if($row->IdTipoPersonal != "" || $row->IdTipoPersonal != null){
                                                        $tamanoo = $tamanoo + 1;
                                                        if($row->IdTipoJornada != "" || $row->IdTipoJornada != null){
                                                            $tamanoo = $tamanoo + 1;
                                                            if($row->IdAntiguedad != "" || $row->IdAntiguedad != null){
                                                                $tamanoo = $tamanoo + 1;
                                                                if($row->IdExperiencia != "" || $row->IdExperiencia != null){
                                                                    $tamanoo = $tamanoo + 1;
                                                                    if($row->RolaTurno != "" || $row->RolaTurno != null){
                                                                        $tamanoo = $tamanoo + 1;
                                                                    } 
                                                                } 
                                                            } 
                                                        } 
                                                    } 
                                                } 
                                            } 
                                        } 
                                    } 
                                } 
                            } 
                        } 
                    } 
                } 
            }

            if($tamanoo >= 13){
                $numrespuestas = DB::select('SELECT * FROM ev_personal_encuesta WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);
                $tamanoo = $tamanoo + count($numrespuestas);
            }
        }else{
            $numrespuestas = DB::select('SELECT * FROM ev_personal_encuesta WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);
            $tamanoo = count($numrespuestas);
        }


        $img=DB::select('select * from ev_img_cliente where IdCliente='. $IdCliente);

        $arrayvacio=empty($img);

        if($arrayvacio === true){
            $img=DB::select('select * from ev_img_cliente where IdCliente= 8');
        }
        
        foreach($img as $p){
            $archivoimg=$p->Imagen;
        }

        $imagen = base64_encode($archivoimg);

        $background_image_url="url(".$imagen.")";

        
        return view("Encuestas.encuestas.start",
        ["IdEncuesta"=>$IdEncuesta,
        "datosEncuesta"=>$datosEncuesta,
        "datosCliente"=>$datosCliente,
        "datosPeriodo" => $datosPeriodo,
        "codigoUnico"=>$codigoUnico,
        "IdPersonal"=>$IdPersonal,
        "encuesta"=>$encuesta,
        "politica"=>$politica,
        "background_image_url"=>$background_image_url,
        "imagen"=>$imagen,
        "tamano"=>$tamanoo,
        "Estatus"=>$Estatus,
        "IdCliente"=>$IdCliente,
        "datosPersonal"=>$datosPersonal]);
    }

    public function indexSugerencias(){
        return view("Encuestas.sugerencias.index");
    }

    public function getPreguntas(Request $request){
        $IdEncuesta = $request->IdEncuesta;
        $IdPersonal = $request->IdPersonal;

        $preguntas = MasterConsultas::exeSQL("ev_preguntas_encuestas", "READONLY",
            array(
                "IdEncuesta" => $IdEncuesta
            )
        );

        $condicionadas = DB::select('SELECT * FROM ev_personal_encuesta ee WHERE ee.IdEncuesta = '.$IdEncuesta.' AND ee.IdPersonal = '.$IdPersonal);

        $respuesta = DB::select("SELECT
        bbb.IdEncuesta, erd.IdRespuestaDet,
        (SELECT erp.Descripcion FROM ev_respuesta_grupo erp WHERE erp.IdGrupoRespuesta = ep.IdGrupoRespuesta) AS GrupoRespuesta, 
        erd.IdRespuesta, er.Descripcion
        FROM ev_pregunta ep 
        INNER JOIN ev_agrupador_encuesta aaa 
        ON aaa.IdAgrupador = ep.IdAgrupador 
        INNER JOIN ev_encuesta bbb 
        ON bbb.IdEncuesta = aaa.IdEncesta 
        INNER JOIN ev_respuesta_detalle erd
        ON erd.IdGrupoRespuesta = ep.IdGrupoRespuesta 
        INNER JOIN ev_respuesta er
        ON er.IdRespuesta = erd.IdRespuesta
        WHERE bbb.IdEncuesta =".$IdEncuesta." GROUP BY er.Descripcion ORDER BY er.IdRespuesta;");

        return response()->json(['data'=>$preguntas,'data2'=>$respuesta,'data3'=>$condicionadas]);
    }

    public function getRespuestas(Request $request){

        $consulta = $request->Consulta;
        $IdCliente = $request->IdCliente;
        $response = $request->response;
        $i = $request->i;

        if ($consulta === "ev_centro_encuesta" || $consulta === "ev_departamento_encuesta" || $consulta === "ev_puesto_encuesta"){
            $respuestas = MasterConsultas::exeSQL($consulta, "READONLY",
                array(
                    "IdCliente" => $IdCliente
                )
            );
        }else{
            $respuestas = MasterConsultas::exeSQL($consulta, "READONLY",
                array(
                    "" => -1
                )
            );
        }
        return response()->json(['data'=>$respuestas,'data2'=>$response,'i'=>$i]);
    }

    public function getResponses(Request $request){

        $IdGrupoRespuesta = $request->IdGrupoRespuesta;

        $gruporespuestas = DB::select("SELECT er.IdRespuesta, er.Descripcion, erd.IdRespuestaDet, erd.IdGrupoRespuesta, erd.iValor FROM ev_respuesta er INNER JOIN ev_respuesta_detalle erd ON er.IdRespuesta = erd.IdRespuesta WHERE erd.IdGrupoRespuesta =".$IdGrupoRespuesta);
        $response = $request->response;

        return response()->json(['data'=>$gruporespuestas,'data2'=>$response]);
    }

    public function setRespuestas(Request $request){
        $IdGrupoRespuesta = $request->IdGrupoRespuesta;
        $IdCliente = $request->IdCliente;
        $IdPersonal = $request->IdPersonal;
        $campo = $request->campo;
        $IdEncuesta = $request->IdEncuesta;
        $respuesta = $request->respuesta;
        $pregunta = $request->pregunta;


        $buscarRegistro = DB::select('select * from ev_personal where IdPersonal ='.$IdPersonal.' and IdCliente = '.$IdCliente);

        $arrayvacio = empty($buscarRegistro);

        if($arrayvacio==true){
            $respuestass = "No";
        }else{
            $updateTQ = DB::table('ev_personal')->where('IdPersonal',$IdPersonal)->update(
                array(
                    $campo=>$respuesta
                )     
            );
            $respuestass = "Si";
        }

        return response()->json(['data'=>$respuestass]);
    }

    public function setRespuestasNormales(Request $request){
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $IdEncuesta = $request->IdEncuesta;
        $respuesta = $request->respuesta;
        $IdPersonal = $request->IdPersonal;
        $pregunta = $request->pregunta;
        $terminado = $request->terminado;
        $fechaEnvio = $request->fecha;

        $IdServicioDetalle = DB::select('SELECT * FROM ev_servicio_detalle WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);
        
        if($terminado == 3){
            $updat = DB::table('ev_servicio_detalle')->where('IdServicio_detalle', $IdServicioDetalle[0]->IdServicio_detalle)->update(
                array(
                    "Estatus" => "Finalizado",
                    "FechaEnvío" => $fechaEnvio
                )     
            );
        }

        if($terminado == 2){
            $updat = DB::table('ev_servicio_detalle')->where('IdServicio_detalle', $IdServicioDetalle[0]->IdServicio_detalle)->update(
                array(
                    "Estatus" => "Proceso"
                )     
            );
        }

        if($respuesta != null){
            $buscarRegistro = DB::select('SELECT * FROM ev_respuesta_detalle WHERE IdRespuestaDet ='.$respuesta);
            foreach($buscarRegistro as $p){
                $iValor=$p->iValor;
            }

            $AltaTQ = MasterConsultas::exeSQLStatement("create_encuesta_respuestas", "UPDATE",
                array(
                    "IdEncuesta" => $IdEncuesta,
                    "IdCliente" => $IdCliente,
                    "IdPersonal"=>$IdPersonal,
                    "IdPeriodo" => $IdPeriodo,
                    "IdRespuestaDet" => $respuesta,
                    "iValor" => $iValor
                )

            );
        }else{
            $AltaTQ = MasterConsultas::exeSQLStatement("create_encuesta_respuestas", "UPDATE",
                array(
                    "IdEncuesta" => $IdEncuesta,
                    "IdCliente" => $IdCliente,
                    "IdPersonal"=>$IdPersonal,
                    "IdPeriodo" => $IdPeriodo,
                    "IdRespuestaDet" => $respuesta,
                    "iValor" => null
                )

            );
        }


        $respuestass = "Si";

        return response()->json(['data'=>$respuestass]);
    }
}
