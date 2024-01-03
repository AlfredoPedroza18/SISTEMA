<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ClientesContratosController extends Controller
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
    public function index()
        {

            $query_cn= DB::select("SELECT * FROM centros_negocio");
            $cn_select=['%'=>'Seleccione una CN...',"%"=>'Todos'];
            foreach ($query_cn as  $cn) {
                $cn_select[$cn->id]=$cn->nomenclatura;
            }
            $query_sector= DB::select("SELECT * FROM actividad_economica");
            $sector_select=['%'=>'Seleccione una Sector...',"%"=>'Todos'];
            foreach ($query_sector as  $sector) {
                $sector_select[$sector->id]=$sector->actividad_economica;
            }
            $query_servicios= DB::select("SELECT * FROM crm_tc_servicioscotizador");
            $servicios_select=['%'=>'Seleccione una Servicio...',"%"=>'Todos'];
            foreach ($query_servicios as  $servicios) {
                $servicios_select[$servicios->id]=$servicios->servicio;
            }

            
       return view("crm.reportes.crm-clientes_contrato",["cn"=>$cn_select,"sector"=>$sector_select,"servicios"=>$servicios_select]);
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
    public function listarContratos(Request $request){

      

       $fecha_inicio="";
        $fecha_inic="";
            if($request->finicio==''){
            $fecha_inicio=" and crm_contratos.fecha_inicio like '%' ";
            }
                else{
                   $fechai=explode("/",$request->finicio);
                   $fecha_inic=$fechai[2]."-".$fechai[0]."-".$fechai[1];
               }
        
       $fecha_fin="";
      
        if($request->ffin==''){
            $fecha_fin="";
            }
                    else{
               $fechaf=explode("/",$request->ffin);
               $fecha_fin=$fechaf[2]."-".$fechaf[0]."-".$fechaf[1];
           }
    
    $fechas="";
     if($request->finicio!="" and $request->ffin!=""){
     $fechas=" and crm_contratos.fecha_inicio between  DATE_FORMAT('$fecha_inic','%Y-%m-%d') and  DATE_FORMAT('$fecha_fin','%Y-%m-%d')";

     }

        $sector="";
       
            if($request->sector=='%'){
            $sector=" ";
            }
            elseif($request->sector==''){
                 $sector=" ";
            }else{
                    $sector=" and actividad_economica.id=$request->sector";
            }


        $servicio=" ";
      
            if($request->servicio=='%'){
            $servicio="";
             }
            elseif($request->servicio==''){
              $servicio="";
            }else{
                $servicio=" and crm_tc_servicioscotizador.id=$request->servicio";
            
            }
          

        $cn="";
            if($request->cn=='%'){
            $cn=" ";
        }
      elseif($request->cn==''){
                  $cn=" ";
            }else{
                $cn= " and crm_contratos.id_cn=$request->cn";            
            }
            
          
  
 
         $query="";

         $query="SELECT 
                        crm_contratos.id,
                        crm_contratos.id_servicio,
                        crm_contratos.id_cotizacion,
                        crm_contratos.id_cliente,
                        crm_contratos.no_contrato,
                        IFNULL(crm_cotizaciones.total,0.00) AS total,
                        DATE_FORMAT(crm_contratos.fecha_inicio,'%d-%m-%Y') AS fecha_inicio,
                        DATE_FORMAT(crm_contratos.fecha_fin,'%d-%m-%Y') AS fecha_fin,
                        facturadoras.nombre,
                        clientes.nombre_comercial,
                        crm_tc_servicioscotizador.servicio,
                        actividad_economica.actividad_economica
                        FROM crm_contratos 
                        LEFT JOIN facturadoras ON crm_contratos.id_facturadora=facturadoras.id
                        LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id
                        LEFT JOIN actividad_economica ON clientes.actividad_economica=actividad_economica.id
                        LEFT JOIN crm_tc_servicioscotizador ON crm_contratos.id_servicio=crm_tc_servicioscotizador.id
                        LEFT JOIN crm_cotizaciones ON crm_cotizaciones.id = crm_contratos.id_cotizacion";




      /* $query_con=DB::select($query,[$request->user()->id,$request->user()->idcn]);
      */
      if($request->user()->is('admin')){
      $query.=" where 1=1 ".$cn.$fecha_inicio.$fechas.$sector.$servicio;
      $query_con=DB::select($query);

      }
      else{
      $query.=" where crm_contratos.id_usuario=? and crm_contratos.id_cn=?".$fecha_inicio.$fechas.$sector.$servicio;
      $query_con=DB::select($query,[$request->user()->id,$request->user()->idcn]);
      }
     



     // $query.=" where crm_contratos.id_usuario=? and crm_contratos.id_cn=? and crm_contratos.fecha_inicio between  DATE_FORMAT('$fecha_inicio','%Y-%m-%d') and  DATE_FORMAT('$fecha_fin','%Y-%m-%d') and actividad_economica.id=$sector and crm_tc_servicioscotizador.id=$servicio"   ;

      


//dd($query);

        return response()->json($query_con);

    }
}
