<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ReportesCotizacionesController extends Controller
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


        return view("crm.reportes.crm-reportes_cotizaciones");
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

    public function listaReportesCn()
    {
        $lista_cn = DB::select("SELECT id, nomenclatura AS valor FROM centros_negocio");
        
        return response()->json($lista_cn);
            
            
    }

    public function listaReportesServicio()
    {
        $lista_servicios= DB::select("SELECT id, servicio AS valor FROM crm_tc_servicioscotizador");
        
        return response()->json($lista_servicios);
    }
    
    public function listaReportesSector()
    {
        $lista_sector= DB::select("SELECT id, actividad_economica AS valor FROM actividad_economica");

        return response()->json($lista_sector);

    } 

    public function reporteCotizaciones(Request $request)
    {   
        
        $is_admin                   = ($request->is_admin == 'false') ? false : true;
        $where_fecha_inicio         = $request->where_fecha_inicio;        
        $where_select_cn            = $request->where_select_cn;
        $where_select_sector        = $request->where_select_sector;
        $where_select_servicio      = $request->where_select_servicio;        
        $query                      = $this->getQueryCotizaciones();
        $resultado                  = null;
        

        if($is_admin){

            $query .=' WHERE 1=1 AND crm_cotizaciones.contrato = 0 ' . $where_fecha_inicio . $where_select_cn . $where_select_sector . $where_select_servicio;
            
            $resultado = DB::select($query);
            return response()->json($resultado);


        }else{
            $query .= 'WHERE users.id = ? AND users.idcn = ? AND crm_cotizaciones.contrato = 0 ' . $where_fecha_inicio . $where_select_sector . $where_select_servicio . $where_fecha_inicio . $where_select_cn . $where_select_sector . $where_select_servicio;
               
            $resultado = DB::select($query,[$request->user()->id,$request->user()->idcn]);
            return response()->json($resultado);
            
        }
    }


    private function getQueryCotizaciones()
    {
        $query = 'SELECT '.
                    '    clientes.id, '.
                    '    crm_cotizaciones.id AS id_cotizacion, '.
                    '    crm_cotizaciones.id_cliente, '.
                    '    crm_cotizaciones.id_servicio, '.
                    '    users.name, '.
                    '    centros_negocio.nomenclatura, '.
                    '    actividad_economica.actividad_economica, '.
                    '    crm_cotizaciones.contrato, '.
                    '    crm_tc_servicioscotizador.id AS id_servicio, '.
                    '     CASE crm_cotizaciones.id_servicio '.
                    '     WHEN 0 THEN  CONCAT("descarga_ese","/",crm_cotizaciones.id) '.
                    '     WHEN 1 THEN  CONCAT("descarga_rys","/",crm_cotizaciones.id) '.
                    '     WHEN 2 THEN  CONCAT("descarga_maquila","/",crm_cotizaciones.id) '.
                    '     WHEN 3 THEN  CONCAT("descarga_psicometrico","/",crm_cotizaciones.id) END AS ruta,  '.
                    '     CASE crm_cotizaciones.id_servicio '.
                    '     WHEN 0 THEN  ("contrato_ese_preview") '.
                    '     WHEN 1 THEN  ("contrato_rys_preview") '.
                    '     WHEN 2 THEN  ("contrato_maquila_preview") '.
                    '     WHEN 3 THEN  ("contrato_psicometrico_preview") END AS ruta_contrato, '.
                    '    IFNULL(clientes.nombre_comercial,"") AS nombre_comercial, '.
                    '    IFNULL(clientes.nombre,"") AS nombre,'.
                    '    crm_tc_servicioscotizador.servicio AS nombre_servicio, '.
                    '    crm_cotizaciones.subtotal, '.
                    '    crm_cotizaciones.iva, '.
                    '   crm_cotizaciones.total, '.  
                    '   DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,\'%d-%m-%Y\') AS fecha_cotizacion '.
                    'FROM crm_cotizaciones '.
                    'LEFT JOIN clientes          ON clientes.id     = crm_cotizaciones.id_cliente '.
                    '                           AND clientes.id_cn  = crm_cotizaciones.id_cn '.
                    'LEFT JOIN actividad_economica ON actividad_economica.id = clientes.actividad_economica '.
                    'LEFT JOIN users             ON users.id        = crm_cotizaciones.id_usuario '.
                    '                           AND users.idcn      = crm_cotizaciones.id_cn '.
                    'LEFT JOIN centros_negocio   ON centros_negocio.id = crm_cotizaciones.id_cn '.
                    'LEFT JOIN crm_tc_servicioscotizador ON crm_tc_servicioscotizador.id = crm_cotizaciones.id_servicio ';
                    
        return $query;
    }

}


