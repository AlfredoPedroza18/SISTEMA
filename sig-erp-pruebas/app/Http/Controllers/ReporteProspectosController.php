<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ReporteProspectosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
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
return view('crm.reportes.crm-reporte_prospectos',["cn"=>$cn_select,"sector"=>$sector_select]);
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
    public function ListadoProspectos(Request $request){
        $clientes;
        $id_cn   = $request->user()->idcn;
        $id_user = $request->user()->id; 


       $fecha_inicio="";
        $fecha_inic="";
            if($request->finicio==''){
            $fecha_inicio=" and clientes.created_at like '%' ";
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
     $fechas=" and clientes.created_at between  DATE_FORMAT('$fecha_inic','%Y-%m-%d') and  DATE_FORMAT('$fecha_fin','%Y-%m-%d')";

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

        $cn="";
            if($request->cn=='%'){
            $cn=" ";
        }
      elseif($request->cn==''){
                  $cn=" ";
            }else{
                $cn= " and clientes.id_cn=$request->cn";            
            }
            
 $query=" ";
 $tipo=" AND clientes.tipo=1";
        $query =    " SELECT ".
                    " IFNULL(clientes.id,'') AS id,".
                    " IFNULL(clientes.nombre_comercial,'') AS nombre_cliente,".
                    " IFNULL(tipos_clientes.nombre,'') AS tipo_cliente,".
                    " CONCAT(IFNULL(centros_negocio.nomenclatura,''),' ',IFNULL(centros_negocio.nombre,'')) AS nombre_cn,".                    
                    //" IFNULL(users.name,'') AS nombre_ejecutivo,".
                 
                    " IFNULL(contactos.nombre_con,'') AS nombre_contacto,".
                    " IFNULL(contactos.apellido_paterno_con,'') AS apellido_paterno,".
                    " IFNULL(contactos.apellido_materno_con,'') AS apellido_materno,".
                    " IFNULL(contactos.correo1,'') AS correo1,".
                    " IFNULL(contactos.telefono1,'') AS telefono1,".
                    " IFNULL(contactos.celular1,'') AS celular1,".
                    " IFNULL(contactos.cargo,'') AS cargo,".
                    " IFNULL(contactos.departamento,'') AS departamento,".
                    " IFNULL(clientes.status,'') AS status,". 
                    " IFNULL(actividad_economica.actividad_economica,'') AS actividad_economica".                        
                    " FROM        clientes".
                    " INNER JOIN cliente_cn_actual ON cliente_cn_actual.id_cliente = clientes.id ".
                    //" LEFT JOIN users       ON users.idcn = clientes.id_cn ".
                    //"                      AND users.id      = clientes.id_user".
                    " LEFT JOIN   centros_negocio ".
                                    "ON cliente_cn_actual.id_cn      = centros_negocio.id  ".                    
                    " LEFT JOIN contactos ON contactos.id = clientes.id_contacto_principal ".
                     " LEFT JOIN actividad_economica ON actividad_economica.id = clientes.actividad_economica ".
                    " LEFT JOIN   tipos_clientes ".
                                    " ON tipos_clientes.id  = clientes.tipo_cliente ";
            if($request->user()->is('admin')){
            $query .= " WHERE 1=1 ".$tipo.$cn.$fecha_inicio.$fechas.$sector;
        }else{
            $query .= " WHERE centros_negocio.id   = $id_cn ".$tipo.$cn.$fecha_inicio.$fechas.$sector;
        }  

        
           $query_con = DB::select($query);
       
            return response()->json($query_con);
                    
    }
}
