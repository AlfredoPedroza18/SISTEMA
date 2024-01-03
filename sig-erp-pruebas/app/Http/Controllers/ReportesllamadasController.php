<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ReportesllamadasController extends Controller
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
         return view("crm.reportes.crm-reportes_llamadas");
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

    public function reporteLlamadas(Request $request)
    {
        $is_admin                   = ($request->is_admin == 'false') ? false : true;
        $where_fecha_inicio         = $request->where_fecha_inicio;        
        $where_select_cn            = $request->where_select_cn;
        $where_select_sector        = $request->where_select_sector;
        $where_select_servicio      = $request->where_select_servicio;        
        $query                      = $this->getQueryLlamadas();
        $resultado                  = null;

        if($is_admin){

            $query .=' WHERE 1=1  ' . $where_fecha_inicio . $where_select_cn ;
            
            
            $resultado = DB::select($query);
            return response()->json($resultado);


        }else{
            $query .= ' WHERE users.id = ? AND users.idcn = ? ' . $where_fecha_inicio ;
            
            $resultado = DB::select($query,[$request->user()->id,$request->user()->idcn]);
            return response()->json($resultado);
            
        }
    }

    private function getQueryLlamadas()
    {
        $query = 'SELECT '.
                 '   kardex.id AS id, '.
                 '   clientes.nombre_comercial AS nombre_comercial, '.
                 '   centros_negocio.nomenclatura, '.
                 '   kardex.actividad AS actividad, '.
                 '   crm_actividad_accion_por_cliente.nombre_actividad, '.
                 '   kardex.descripcion AS descripcion, '.
                 '   DATE_FORMAT(kardex.hr_fin,"%Y-%m-%d") AS fecha_accion, '.
                 '   kardex.fecha_seguimiento AS fecha_seguimiento, '.
                 '   TIMEDIFF(kardex.hr_fin,kardex.hr_inicio) AS tiempo_accion, '.
                 '   kardex.id_cliente AS id_cliente, '.
                 '  kardex.id_user AS id_cliente, '.
                 '  kardex.ruta AS ruta, '.
                 '   kardex.carpeta_cliente AS carpeta_cliente, '.
                 '   kardex.nombre_archivo AS nombre_archivo, '.
                 '   users.name AS nombre_user, '.
                 '   CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) AS nombre_contacto '.
                'FROM kardex '.
                'LEFT JOIN users ON kardex.id_user=users.id '.
                'LEFT JOIN clientes ON kardex.id_cliente=clientes.id '.
                'LEFT JOIN (SELECT id,id_cliente,(nombre_con) AS nombre_con,telefono1,celular1,apellido_paterno_con,apellido_materno_con FROM contactos   group by id_cliente)contactos '.
                '  ON clientes.id=contactos.id_cliente '.
                'LEFT JOIN crm_actividad_accion_por_cliente ON crm_actividad_accion_por_cliente.id = kardex.actividad '.
                'LEFT JOIN centros_negocio  ON centros_negocio.id = users.idcn';

        return $query;
    }
}
