<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\ESE\EstudioEse;
use App\User;
use Illuminate\Support\Collection; 



class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //-------------CENTROS DE NEGOCIO
            $query_cn= DB::select("SELECT * FROM centros_negocio");
            $cn_select=['%'=>'Seleccione una CN...',"%"=>'Todos'];
            foreach ($query_cn as  $cn) {
                $cn_select[$cn->id]=$cn->nomenclatura;
            }
       
        //-------------SERVICIOS
            $query_servicios= DB::select("SELECT * FROM tipos_estudo_ese ORDER BY nombre");
            $servicios_select=['%'=>'Seleccione una Servicio...',"%"=>'Todos'];
            foreach ($query_servicios as  $servicios) {
                $servicios_select[$servicios->id]=$servicios->nombre;
            }
        //-------------CLIENTES
            $query_clientes= DB::select("SELECT id,nombre_comercial FROM clientes where tipo=2 ORDER BY nombre_comercial ASC");
            $clientes_select=['%'=>'Seleccione una Servicio...',"%"=>'Todos'];
            foreach ($query_clientes as  $clientes) {
                $clientes_select[$clientes->id]=$clientes->nombre_comercial;
            }
        //-------------localidad
            $query_localidad= DB::select("SELECT IdEstado, FK_nombre_estado FROM estados ORDER BY FK_nombre_estado ASC");
            $localidad_select=['%'=>'Seleccione una Servicio...',"%"=>'Todos'];
            foreach ($query_localidad as  $localidad) {
                $localidad_select[$localidad->IdEstado]=$localidad->FK_nombre_estado;
            }
            //-------------usuarios
            $query_usuarios= DB::select("SELECT id,CONCAT(name,' ',apellido_paterno,' ',apellido_materno) as nombre_candidato FROM users ORDER BY name");
            $usuarios_select=['%'=>'Seleccione una Servicio...',"%"=>'Todos'];
            foreach ($query_usuarios as  $usuarios) {
                $usuarios_select[$usuarios->id]=$usuarios->nombre_candidato;
            }
           
           return view("Ese.reporte.index",["cn"=>$query_cn,"users"=>$query_usuarios,"servicios"=>$query_servicios,"clientes"=>$query_clientes,'localidad'=>$query_localidad,]);
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

    public function EncabezadoReporte(){

     $query="SELECT * FROM ese_reporte ";
     $res_query=DB::select($query);

     if($res_query)
        return $res_query;
    else
        return "Error encabezado reporte";
    }

    public function getReporte(Request $request){


      $cliente=$request->cliente;
      $tipo=$request->tipo;
      $localidad=$request->localidad;
      $candidato=$request->candidato;
      $periodo=$request->periodo;
      $cn=$request->cn;
      $id_cn   = $request->user()->idcn;
      $id_user = $request->user()->id; 
//dd($request->all());
// WHERE PÁRA CLIENTES---------------//
$grafica_cliente="";
$groupby_cliente="";
$cli="";
$query_cliente="";
if($cliente!=''){ 
    foreach ($cliente as $key => $value) {
         $cli.=$value.",";
    }
    $query_cliente.=" and clientes.id IN(".trim($cli,",").")";

                $grafica_cliente="clientes.nombre_comercial AS name ,COUNT(estudio_ese_detalle.id_tipo_estudio) AS y";
                
                $groupby_cliente="GROUP BY clientes.nombre_comercial HAVING COUNT(estudio_ese_detalle.id_tipo_estudio)";
                //$gc=json_encode($grafica_cliente,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
 }else{
                $grafica_cliente="clientes.nombre_comercial AS name,COUNT(estudio_ese_detalle.id_tipo_estudio) AS y";
                
                $groupby_cliente="GROUP BY clientes.nombre_comercial HAVING COUNT(estudio_ese_detalle.id_tipo_estudio)";
              
                //$gc=json_encode($grafica_cliente,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

 }
 // WHERE PÁRA CLIENTES---------------//
 // WHERE PÁRA TIPO DE ESTUDIO---------------//
$grafica_tipo="";
$groupby_tipo="";

$tip="";
$query_tipo="";
if($tipo!=''){ 
    foreach ($tipo as $key => $value) {
         $tip.=$value.",";
    }
    $query_tipo.=" and tipos_estudo_ese.id IN(".trim($tip,",").")";

    $grafica_tipo=" tipos_estudo_ese.nombre AS name,COUNT(estudio_ese_detalle.id_tipo_estudio) AS data";
                    
    $groupby_tipo=" and tipos_estudo_ese.id IN(".trim($tip,",").") GROUP BY tipos_estudo_ese.nombre HAVING count(estudio_ese_detalle.id_tipo_estudio)";
                 
    
 }else{
     $grafica_tipo="tipos_estudo_ese.nombre AS name,COUNT(estudio_ese_detalle.id_tipo_estudio) AS data";
                
     $groupby_tipo  ="GROUP BY tipos_estudo_ese.nombre HAVING count(estudio_ese_detalle.id_tipo_estudio)";
               

    
 }
 // WHERE END TIPO---------------//
 // WHERE PÁRA LOCALIDAD---------------//
$grafica_localidad="";
$groupby_localidad=null;
$loc="";
$query_localidad="";
if($localidad!=''){ 
    foreach ($localidad as $key => $value) {
         $loc.=$value.",";
    }
    $query_localidad.=" and estados.id IN(".trim($loc,",").")";

    $grafica_localidad= " estados.nombre_estado AS name,COUNT(estudio_ese_detalle.estado) as y";
        
    $groupby_localidad  = " GROUP BY estados.nombre_estado HAVING COUNT(estudio_ese_detalle.estado)";
    
 }else{
       $grafica_localidad ="estados.nombre_estado AS name,COUNT(estudio_ese_detalle.estado) as y";
        
       $groupby_localidad=" GROUP BY estados.nombre_estado HAVING COUNT(estudio_ese_detalle.estado)";
        
 }
 // WHERE PÁRA LOCALIDAD---------------//
 // WHERE PÁRA CANDIDATO---------------//
$can="";
$query_candidato="";
$grafica_candidato="";
$groupby_candidato=null;
$grafica_diasEntrega=null;
$groupby_diasEntrega=null;

if($candidato!=''){ 
    foreach ($candidato as $key => $value) {
         $can.=$value.",";
    }
       $query_candidato.=" and users.id IN(".trim($can,",").")";
    //.............. dias que tarda un investigador en empezar estudio-------------------
     
        $grafica_candidato= " IFNULL(users.name,'Sin asignar') AS name,SUM(DATEDIFF(estudio_ese_detalle.fecha_visita,estudio_ese_detalle.fecha_ingreso)) as y,count(*) as drilldown";
        $groupby_candidato  = " GROUP BY users.name ";
          //.............. dias que tarda un investigador en empezar estudio-------------------
        //.............. dias que tarda un investigador en cerrar estudio-------------------
        $grafica_diasEntrega= " IFNULL(users.name,'Sin asignar') AS name,SUM(DATEDIFF(estudio_ese_detalle.fecha_cierre,estudio_ese_detalle.fecha_visita)) as a,count(*) as num_estudios";
        $groupby_diasEntrega  = " GROUP BY users.name ";

           
}else{
    //.............. dias que tarda un investigador en empezar estudio-------------------
       $grafica_candidato= " IFNULL(users.name,'Sin asignar') AS name,SUM(DATEDIFF(estudio_ese_detalle.fecha_visita,estudio_ese_detalle.fecha_ingreso)) as y,count(*) as drilldown";
        $groupby_candidato  = " GROUP BY users.name ";
    //.............. dias que tarda un investigador en empezar estudio-------------------
    //.............. dias que tarda un investigador en cerrar estudio-------------------
         $grafica_diasEntrega= " IFNULL(users.name,'Sin asignar') AS name,SUM(DATEDIFF(estudio_ese_detalle.fecha_cierre,estudio_ese_detalle.fecha_visita)) as a,count(*) as num_estudios";
        $groupby_diasEntrega  = " GROUP BY users.name ";
          
}

  


 // WHERE PÁRA CANDIDATO---------------//
 // WHERE PÁRA FECHAS---------------//
$per="";
$grafica_ese_mes="";
$groupby_ese_mes=null;
$query_periodo="";
if($periodo!=''){ 
     $per=explode("-",$periodo);
      $per_inicial=str_replace( "/", "-",$per[0]);
      $per_final=str_replace( "/", "-",$per[1]);
      $query_periodo=" and estudio_ese_detalle.fecha_ingreso between '$per_inicial 00:00:01' and  '$per_final 23:59:59'";

      $grafica_ese_mes="MONTH(fecha_ingreso) AS name ,COUNT(fecha_ingreso) as y";
                     
      $groupby_ese_mes=" GROUP BY DATE_FORMAT(fecha_ingreso,'%Y-%m') 
                       HAVING COUNT(fecha_ingreso)";
                       
      }else{
         $grafica_ese_mes="MONTH(fecha_ingreso) AS name ,COUNT(fecha_ingreso) as y";
                      
          $groupby_ese_mes  ="GROUP BY DATE_FORMAT(fecha_ingreso,'%Y-%m') 
                       HAVING COUNT(fecha_ingreso)";
                     
      }
 // WHERE PÁRA FECHAS--------------//
 // WHERE PÁRA CN---------------//
$cen="";
$query_cn="";
if($cn!=''){ 
    foreach ($cn as $key => $value) {
         $cen.=$value.",";
    }
  $query_cn.=" and ordenes_servicio.id_cn IN(".trim($cen,",").")";
 }
 // WHERE PÁRA CN---------------//

 $queryReporte="";
 $queryGraficaClientes=null;
 $queryGraficaTipo=null;
 $queryGraficaLocalidad=null;
 $queryGraficaMes=null;
 $queryGraficaTardaInvest=null;
 $queryGraficaCierreInvest=null;
   
        $queryReporte.="SELECT 
                            estudio_ese_detalle.id as consecutivo,
                            clientes.nombre_comercial as cliente,
                            IFNULL(estudio_ese_detalle.codigo_depto_cliente,'Sin código de depto.'),
                            estados.nombre_estado as localidad,
                            tipos_estudo_ese.nombre as nombre_estudio,
                            CONCAT(ese_candidato.nombre,' ',ese_candidato.apellido_paterno,' ',ese_candidato.apellido_materno) as nombre_candidato,
                            estudio_ese_detalle.fecha_ingreso as fecha_solicitud,
                            estudio_ese_detalle.fecha_visita as fecha_realizacion,
                            estudio_ese_detalle.fecha_visita as fecha_cierre,
                            estudio_ese_detalle.fecha_visita as hora,
                            IFNULL(users.name ,'Sin asignar') as nombre_investigador,
                            investigador_cierre.name as invest_cierre,
                            estudio_ese_detalle.viaticos ,
                            estudio_ese_detalle.subtotal ,
                            (estudio_ese_detalle.viaticos+estudio_ese_detalle.total) as total_estudio,
                            ese_resultados.nombre as resultado_estudio,
                            CONCAT('#ESE',estudio_ese_detalle.id_os) as OC,
                            estudio_ese_detalle.comentarios_cierre as comentario,
                            estudio_ese_detalle.solicitado
                            FROM estudio_ese_detalle
                            LEFT JOIN  clientes ON estudio_ese_detalle.id_cliente=clientes.id
                            LEFT JOIN  estados ON estudio_ese_detalle.estado=estados.id
                            LEFT JOIN  ese_candidato ON estudio_ese_detalle.id=ese_candidato.id
                            LEFT JOIN  tipos_estudo_ese ON estudio_ese_detalle.id_tipo_estudio=tipos_estudo_ese.id
                            LEFT JOIN  ese_usuarios ON estudio_ese_detalle.id=ese_usuarios.id_estudio and ese_usuarios.principal=2 
                            LEFT JOIN  users ON ese_usuarios.id_usuario=users.id
                            LEFT JOIN (SELECT * FROM users ) as investigador_cierre on estudio_ese_detalle.ejecutivo_cierre=investigador_cierre.id
                            LEFT JOIN  ordenes_servicio ON estudio_ese_detalle.id_os=ordenes_servicio.id
                            LEFT JOIN  ese_resultados ON estudio_ese_detalle.resultado_ese=ese_resultados.id";

                            $queryReporte.="  where 1=1 ".$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn;

//-----------------GRAFICA CLIENTES -------------------------// 
                            $grafica_cliente_datos=$this->getGrafClientes($queryGraficaClientes,$grafica_cliente,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_cliente);

//-----------------GRAFICA TIPO DE ESTUDIOS -------------------------// 
                            $grafica_tipo_datos=$this->getGrafTipoEse($queryGraficaTipo,$grafica_tipo,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_tipo);
//-----------------GRAFICA LOCALIDAD -------------------------// 
                            $grafica_localidad_datos=$this->getGrafLocalEse($queryGraficaLocalidad,$grafica_localidad,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_localidad);
//---------------- GRAFICA DE ESTUDIOS POR MES---------------------//
                            $grafica_ese_mes_datos=$this->getGrafMes($queryGraficaMes,$grafica_ese_mes,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_ese_mes);
 //-------------  GRAFICA DE ESTUDIOS EN QUE TARDA EL INVESTIGADOR EN REALIZAR EL ESTUDIO------//
                            $grafica_diasTarda_datos=$this->getGrafTardaInvest($queryGraficaTardaInvest,$grafica_candidato,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_candidato);    

                             $grafica_diasCierre_datos=$this->getGrafCierreInvest($queryGraficaCierreInvest,$grafica_diasEntrega,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_diasEntrega);                     

                 #dd($queryReporte);    
                                          

                            $res_query=DB::select($queryReporte);
                            $encabezado=$this->EncabezadoReporte();
                            if($res_query)
                            return response()->json(["exito"=>"ok","success"=>$res_query,"encabezado"=>$encabezado,"grafica_clientes"=>$grafica_cliente_datos,"grafica_localidad"=>$grafica_localidad_datos,"grafica_tipo"=>$grafica_tipo_datos,"graficaXmes"=>$grafica_ese_mes_datos,"grafica_diasTarda"=>$grafica_diasTarda_datos,"grafica_cierreInvest"=>$grafica_diasCierre_datos]);
                            else
                            return response()->json(["exito"=>"error"]);




    }

    public function getLeftJoin(){
    $leftjoin=null;
    $leftjoin.="
                                                FROM estudio_ese_detalle
                                                LEFT JOIN  clientes ON estudio_ese_detalle.id_cliente=clientes.id
                                                LEFT JOIN  estados ON estudio_ese_detalle.estado=estados.id
                                                LEFT JOIN  ese_candidato ON estudio_ese_detalle.id=ese_candidato.id
                                                LEFT JOIN  tipos_estudo_ese ON estudio_ese_detalle.id_tipo_estudio=tipos_estudo_ese.id
                                                LEFT JOIN  ese_usuarios ON estudio_ese_detalle.id=ese_usuarios.id_estudio and ese_usuarios.principal=2 
                                                LEFT JOIN  users ON ese_usuarios.id_usuario=users.id and ese_usuarios.principal=2
                                                LEFT JOIN (SELECT * FROM users ) as investigador_cierre on estudio_ese_detalle.ejecutivo_cierre=investigador_cierre.id
                                                LEFT JOIN  ordenes_servicio ON estudio_ese_detalle.id_os=ordenes_servicio.id
                                                LEFT JOIN  ese_resultados ON estudio_ese_detalle.resultado_ese=ese_resultados.id";
                                                return $leftjoin;
    }

    public function getGrafClientes($queryGraficaClientes,$grafica_cliente,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_cliente){

                    $queryGraficaClientes.="SELECT ";
                    $queryGraficaClientes.=$grafica_cliente;
                    $queryGraficaClientes.=$this->getLeftJoin();
                    $queryGraficaClientes.="  where 1=1  ";
                    $queryGraficaClientes.=$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn;
                    $queryGraficaClientes.=$groupby_cliente;

                    return $res_graf_cliente=DB::select($queryGraficaClientes);
                    #return $queryGraficaClientes;
    }
     public function getGrafTipoEse($queryGraficaTipo,$grafica_tipo,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_tipo){

                    $queryGraficaTipo.="SELECT ";
                    $queryGraficaTipo.=$grafica_tipo;
                    $queryGraficaTipo.=$this->getLeftJoin();
                    $queryGraficaTipo.="  where 1=1  ";
                    $queryGraficaTipo.=$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn;
                    $queryGraficaTipo.=$groupby_tipo;

                    return $res_graf_tipo=DB::select($queryGraficaTipo);
                    #return $queryGraficaTipo;
    }
      public function getGrafLocalEse($queryGraficaLocalidad,$grafica_localidad,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_localidad){

                    $queryGraficaLocalidad.="SELECT ";
                    $queryGraficaLocalidad.=$grafica_localidad;
                    $queryGraficaLocalidad.=$this->getLeftJoin();
                    $queryGraficaLocalidad.="  where 1=1  ";
                    $queryGraficaLocalidad.=$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn;
                    $queryGraficaLocalidad.=$groupby_localidad;

                    return $res_graf_localidad=DB::select($queryGraficaLocalidad);
                    #return $queryGraficaLocalidad;
    }

       public function getGrafMes($queryGraficaMes,$grafica_ese_mes,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_ese_mes){

                    $queryGraficaMes.="SELECT ";
                    $queryGraficaMes.=$grafica_ese_mes;
                    $queryGraficaMes.=$this->getLeftJoin();
                    $queryGraficaMes.="  where 1=1  ";
                    $queryGraficaMes.=$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn;
                    $queryGraficaMes.=$groupby_ese_mes;

                    return $res_graf_mes=DB::select($queryGraficaMes);
                    #return $queryGraficaMes;
    }
public function getGrafTardaInvest($queryGraficaTardaInvest,$grafica_candidato,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_candidato){

                    $queryGraficaTardaInvest.="SELECT ";
                    $queryGraficaTardaInvest.=$grafica_candidato;
                    $queryGraficaTardaInvest.=$this->getLeftJoin();
                    $queryGraficaTardaInvest.="  where 1=1  ";
                    $queryGraficaTardaInvest.=$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn." AND estudio_ese_detalle.fecha_visita <> '0000-00-00 00:00:00'";
                    $queryGraficaTardaInvest.=$groupby_candidato;
                    $res_graf_mes=DB::select($queryGraficaTardaInvest);
                    $contenido =array();
$prom=null;
                    foreach($res_graf_mes as $key=>$value){
                        $prom=round(($value->y/$value->drilldown));
                        $contenido[]=["name"=>$value->name,"y"=>$prom];
                    }

                    return $contenido;           
    }
public function getGrafCierreInvest($queryGraficaCierreInvest,$grafica_diasEntrega,$query_cliente,$query_tipo,$query_localidad,$query_candidato,$query_periodo,$query_cn,$groupby_diasEntrega){

                    $queryGraficaCierreInvest.="SELECT ";
                    $queryGraficaCierreInvest.=$grafica_diasEntrega;
                    $queryGraficaCierreInvest.=$this->getLeftJoin();
                    $queryGraficaCierreInvest.="  where 1=1  ";
                    $queryGraficaCierreInvest.=$query_cliente.$query_tipo.$query_localidad.$query_candidato.$query_periodo.$query_cn." AND estudio_ese_detalle.id_status = 4";
                    $queryGraficaCierreInvest.=$groupby_diasEntrega;
                   # dd($queryGraficaCierreInvest);
                    $res_graf_mes_a=DB::select($queryGraficaCierreInvest);
                    $contenido_a =array();
$proma=null;
                    foreach($res_graf_mes_a as $key=>$value){
                      $proma=round(($value->a/$value->num_estudios));
                      $contenido_a[]=["name"=>$value->name,"y"=>$proma];
                    }
                   // dd($res_graf_mes_a);
                    //dd($contenido_a);
                    return $contenido_a;           
    }


}
