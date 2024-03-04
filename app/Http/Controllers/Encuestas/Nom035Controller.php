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
use Illuminate\Support\Facades\Auth; 
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;

class Nom035Controller extends Controller
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
        if(Auth::user()->tipo == 'c'){
            $clientes = DB::select("SELECT c.id ,c.nombre_comercial FROM clientes c WHERE tipo=2 AND c.id=".Auth::user()->IdCliente);
        }else{
            $clientes = DB::select("SELECT c.id ,c.nombre_comercial FROM clientes c WHERE tipo=2 ORDER by c.nombre_comercial ASC;");
        }

        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $Id = "N/A";

        return view("Encuestas.nom035.index",
        ["clientes"=>$clientes])->with('Id', $Id);
    }

    public function getPeriodo(Request $request)
    {
        $IdCliente =  $request->IdCliente;
        $periodo = DB::select("SELECT evp.IdPeriodo, evp.Fecha FROM ev_periodos evp WHERE evp.IdCliente = ".$IdCliente." ORDER BY evp.Fecha DESC");
        return response()->json(['data'=>$periodo]);  
    }

    public function getCentros(Request $request)
    {
        $IdCliente =  $request->IdCliente;
        $IdPeriodo =  $request->IdPeriodo;

        $servicioo = DB::select("select * from ev_servicio es where es.IdCliente =".$IdCliente." and es.IdPeriodo = '".$IdPeriodo." '");


        $determinarRiesgo = DB::select("select  sd.IdEncuesta, sc.IdServicio, sc.IdCentro,
        (select Descripcion from ev_centros_trabajo where IdCentro = sc.IdCentro) as CentroTrabajo,
        (select Descripcion from ev_encuesta where IdEncuesta = sd.IdEncuesta) as Encuesta,
        (select sum(CantidadCentro) from ev_servicio_cliente where IdServicio = sc.IdServicio) as TotalSolicitado,
        ((select count(IdPersonal) from ev_servicio_cliente sc1
        inner join ev_servicio_detalle sd1 on (sd1.IdServicio_cliente = sc1.IdServicio_cliente and sd1.Estatus = 'Pendiente' )
        where sc1.IdServicio = sc.IdServicio)/2) as TotalPendiente ,
        (select count(IdPersonal) from ev_servicio_detalle where IdServicio_cliente = sd.IdServicio_cliente and IdEncuesta = sd.IdEncuesta and Estatus = 'Finalizado' ) as TotalFinalizado,
        CantidadCentro,
        (if(CantidadCentro =0, 0,(100/CantidadCentro)) * (select TotalFinalizado)) as Porciento,
        
        (select count(distinct IdPersonal)  from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdAgrupador = 8 and iValor > 0  ) as TR1,
        (select count(distinct IdPersonal) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo  and IdCentro = sc.IdCentro and IdAgrupador = 9 and iValor > 0 ) as TR2,
        (select count(distinct IdPersonal) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo  and IdCentro = sc.IdCentro and IdAgrupador = 10 and iValor > 0 ) as TR3,
        (select count(distinct IdPersonal) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo  and IdCentro = sc.IdCentro and IdAgrupador = 11 and iValor > 0 ) as TR4,
        (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdAgrupador = 8) as SR1,
        (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdAgrupador = 9) as SR2,
        (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdAgrupador = 10) as SR3,
        (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdAgrupador = 11) as SR4,
        (if((select SR1) = 0, 0,(100/CantidadCentro) * (select TR1))) as PorcientoRiesgo
        from ev_servicio_detalle sd
        inner join ev_servicio_cliente sc on (sc.IdServicio_cliente = sd.IdServicio_cliente)
        inner join ev_servicio s on (s.IdServicio = sc.IdServicio)
        where s.IdCliente =".$IdCliente." and s.IdPeriodo = ".$IdPeriodo." group by s.IdCliente, s.IdPeriodo, sc.IdCentro, sd.IdEncuesta;");


        $riesgoxcentro = [];
        $sumariesg = 0;
        $indexriesgo = 0;

        $riesgoentorno = DB::select('select epe.IdCliente,epe.IdEncuesta, epe.IdCentro, epe.IdPeriodo,epe.IdPregunta,epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacion, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
        from ev_personal_encuesta epe
        inner join ev_dimension_pregunta edp
        on edp.IdPregunta = epe.IdPregunta
        inner join ev_dimension evd
        on evd.IdDimension = edp.IdDimension
        inner join ev_dominio ed
        on ed.IdDominio = evd.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = ed.IdCategoria
        where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY epe.IdCentro,edp.IdDimension');

        $riesgoentorno2 = DB::select('select epe.IdCliente,epe.IdEncuesta, epe.IdCentro, epe.IdPeriodo,epe.IdPregunta,epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacion, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
        from ev_personal_encuesta epe
        inner join ev_dimension_pregunta edp
        on edp.IdPregunta = epe.IdPregunta
        inner join ev_dimension evd
        on evd.IdDimension = edp.IdDimension
        inner join ev_dominio ed
        on ed.IdDominio = evd.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = ed.IdCategoria
        where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY epe.IdCentro');
        
        if( count($riesgoentorno2) > 0){
            $variable = $riesgoentorno[0]->IdCentro;
            
            foreach($riesgoentorno as $row){
                $indexriesgo++;
                if($variable != $row->IdCentro){
                    array_push($riesgoxcentro, $sumariesg);
                    $sumariesg = 0;
                    $variable = $row->IdCentro;
                    $sumariesg = $sumariesg + $row->promedio;
                    if($indexriesgo == (count($riesgoentorno))){
                        array_push($riesgoxcentro, $sumariesg);
                    }
                }else{
                    $sumariesg = $sumariesg + $row->promedio;
                    if($indexriesgo == (count($riesgoentorno))){
                        array_push($riesgoxcentro, $sumariesg);
                    }
                }
            }
        }

        $dataGrafica = DB::select("select es.IdCliente, es.IdPeriodo, esd.IdPersonal, ep.Correo,ep.Nombre
        from ev_servicio es
        inner join ev_servicio_cliente esc
        on esc.IdServicio = es.IdServicio
        inner join ev_servicio_detalle esd
        on esd.IdServicio_cliente = esc.IdServicio_cliente
        inner join ev_personal ep
        on ep.IdPersonal = esd.IdPersonal
        where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." group by esd.IdPersonal");

        $sinInformacion = 0;
        $asignados = 0;

        if(count($dataGrafica) > 0){
            foreach($dataGrafica as $row) {
                if($row->Correo != "" || $row->Correo != null){
                    $asignados++;
                }else{
                    $sinInformacion++;
                }
            }
        }

        
        $quejas = DB::select("select es.Comentario
        from ev_sugerencias es 
        where es.IdCliente = ".$IdCliente);

        $numQuejas = count($quejas);
                
        return response()->json(['data'=>$determinarRiesgo,'data2'=>$riesgoentorno2,'data3'=>$riesgoxcentro,'quejas'=>$numQuejas,'sinInformacion'=>$sinInformacion,'asignados'=>$asignados,'servicioo'=>$servicioo]);

    }

    public function getRiesgos(Request $request)
    {
        // $r = 0;
        // $Riesgo = 0;
        // $seccion1 = 0;
        // $seccion2 = 0;
        // $seccion3 = 0;
        // $seccionUno ="";
        // $seccionDos ="";
        // $seccionTres ="";
        // $evento ="";
        // $PersonasRiesgo = [];
        // $counttEnvento = 0;
        // $countt = 0;
        // $IdCentro = $request->IdCentro;

        //     $personalCentro = DB::select('SELECT * FROM ev_servicio_cliente esc INNER JOIN ev_servicio_detalle esd ON esc.IdServicio_cliente = esd.IdServicio_cliente WHERE esc.IdCentro = '.$IdCentro.' AND esd.IdEncuesta = 11 AND esd.Estatus = "Finalizado"');
        //     foreach($personalCentro as $ries){
        //         $riesgoPersonal = DB::select('SELECT * FROM ev_personal_encuesta WHERE IdPersonal ='.$ries->IdPersonal.' AND IdEncuesta = 11');
        //         for($s=1; $s < count($riesgoPersonal);$s++){
        //             //categoria una
        //             if($s <= 3){
        //                 if($riesgoPersonal[$s]->iValor == 1){
        //                     $Riesgo++;
        //                 }
        //             }
        //             //categoría dos
        //             if($s > 3 && $s < 6){
        //                 if($riesgoPersonal[$s]->iValor == 1){
        //                     $seccion1++;
        //                 }
        //             }
        //             //categoria tres
        //             if($s > 5 && $s < 13){
        //                 if($riesgoPersonal[$s]->iValor == 1){
        //                     $seccion2++;
        //                 }
        //             }
        //             //categoria cuatro
        //             if($s > 12 && $s <= 17){
        //                 if($riesgoPersonal[$s]->iValor == 1){
        //                     $seccion3++;
        //                 } 
        //             }
        //         }

        //         if($Riesgo >= 1){
        //             $evento = "SI";
        //         }else{
        //             $evento = "NO";
        //         }
        //         if($seccion1 >= 1){
        //             $seccionUno = "SI";
        //         }else{
        //             $seccionUno = "NO";
        //         }
        //         if($seccion2 >= 3){
        //             $seccionDos = "SI";
        //         }else{
        //             $seccionDos = "NO";
        //         }
        //         if($Riesgo >= 2){
        //             $seccionTres = "SI";
        //         }else{
        //             $seccionTres = "NO";
        //         }

        //         if($evento == "SI"){
        //             $counttEnvento++;
        //         }

        //         if($seccionUno == "SI"){
        //             $countt++;
        //         }

        //         if($seccionDos == "SI"){
        //             $countt++;
        //         }

        //         if($seccionTres == "SI"){
        //             $countt++;
        //         }

        //         if($counttEnvento == 1 && $countt >=1 ){
        //             $PersonasRiesgo[$r]="SI";
        //         }else{
        //             $PersonasRiesgo[$r]="NO"; 
        //         }

        //         $r++;
                
        //     }
      

        // return response()->json(['data'=>$PersonasRiesgo,'data2'=>'SI']);
    }

    public function getGraficas(Request $request)
    {
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $suma = 0;

        $cantidadEncuestas = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo);

        $totalEntorno = DB::select('SELECT 
        es.IdCliente,es.IdPeriodo,COUNT(esd.Estatus) AS TotalFinalizados
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
		INNER JOIN ev_servicio_detalle esd
		ON esd.IdServicio_cliente = esc.IdServicio_cliente
        WHERE es.IdCliente = '.$IdCliente.' and es.IdPeriodo = '.$IdPeriodo.' and esd.IdEncuesta = 12 and esd.Estatus = "Finalizado"');

        
        $totalRiesgo = DB::select('SELECT 
        es.IdCliente,es.IdPeriodo,COUNT(esd.Estatus) AS TotalFinalizados
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_servicio_detalle esd
        ON esd.IdServicio_cliente = esc.IdServicio_cliente
        WHERE es.IdCliente = '.$IdCliente.' and es.IdPeriodo = '.$IdPeriodo.' and esd.IdEncuesta = 11 and esd.Estatus = "Finalizado"');

        foreach($cantidadEncuestas as $row){
            $suma = $suma + $row->CantidadCentro;
        }

        $abiertasR = DB::select("select es.IdCliente, es.IdPeriodo, esd.IdPersonal, ep.Correo,ep.Nombre, esd.Estatus
        from ev_servicio es
        inner join ev_servicio_cliente esc
        on esc.IdServicio = es.IdServicio
        inner join ev_servicio_detalle esd
        on esd.IdServicio_cliente = esc.IdServicio_cliente
        inner join ev_personal ep
        on ep.IdPersonal = esd.IdPersonal
        where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." and esd.Estatus <> 'Finalizado' and ep.Correo <> '' and esd.IdEncuesta = 11 group by esd.IdPersonal");

        $cantR = count($abiertasR);

        $abiertasE = DB::select("select es.IdCliente, es.IdPeriodo, esd.IdPersonal, ep.Correo,ep.Nombre, esd.Estatus
        from ev_servicio es
        inner join ev_servicio_cliente esc
        on esc.IdServicio = es.IdServicio
        inner join ev_servicio_detalle esd
        on esd.IdServicio_cliente = esc.IdServicio_cliente
        inner join ev_personal ep
        on ep.IdPersonal = esd.IdPersonal
        where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." and esd.Estatus <> 'Finalizado' and ep.Correo <> '' and esd.IdEncuesta = 12 group by esd.IdPersonal");
        
       $cantE = count($abiertasE);

        $dataGrafica = DB::select("select es.IdCliente, es.IdPeriodo, esd.IdPersonal, ep.Correo,ep.Nombre
        from ev_servicio es
        inner join ev_servicio_cliente esc
        on esc.IdServicio = es.IdServicio
        inner join ev_servicio_detalle esd
        on esd.IdServicio_cliente = esc.IdServicio_cliente
        inner join ev_personal ep
        on ep.IdPersonal = esd.IdPersonal
        where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." group by esd.IdPersonal");

        $sinInformacion = 0;
        $asignados = 0;

        if(count($dataGrafica) > 0){
            foreach($dataGrafica as $row) {
                if($row->Correo != "" || $row->Correo != null){
                    $asignados++;
                }else{
                    $sinInformacion++;
                }
            }
        }

        return response()->json(['data'=>$suma,'data2'=>$totalEntorno,'data3'=>$totalRiesgo,'data4'=>$sinInformacion,'data5'=>$cantE,'data6'=>$cantR]);
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
