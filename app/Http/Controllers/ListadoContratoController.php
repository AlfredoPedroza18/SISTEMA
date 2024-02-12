<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Bussines\MasterConsultas;

class ListadoContratoController extends Controller
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
       /* $query=DB::select("SELECT * 
            FROM crm_contratos 
            where id_usuario=? and id_cn=?",[$request->user()->id,$request->user()->idcn]);*/

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
                $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $TotalCotratos =  MasterConsultas::exeSQL("listado_contratos", "READONLY",
                array(
                    "id_cn"=>$id_cn, 
                )
        );

        $peticion = $request->path();

        $lista_contratos = $this->getContratos( $request );
  
        return view("crm.lista_contratos.lista_contratos",["contratos"=>$lista_contratos ,'peticion' => $peticion, "TotalCotratos"=>$TotalCotratos]);
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

    private function getQueryContratos(Request $request)
    {

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $query = "SELECT DISTINCT
                    crm_contratos.id,
                    crm_contratos.id_servicio,
                    crm_contratos.id_cotizacion,
                    crm_contratos.id_cliente,
                    crm_contratos.no_contrato,
                    DATE_FORMAT(crm_contratos.fecha_inicio,'%d-%m-%Y') AS fecha_inicio,
                    DATE_FORMAT(crm_contratos.fecha_fin,'%d-%m-%Y') AS fecha_fin,
                    CONCAT('(',centros_negocio.nomenclatura,') ',centros_negocio.nombre)  AS centro_negocio,
                    master_empresa.fk_titulo as nombre,
                    clientes.nombre_comercial,
                    crm_cotizador_servicio.servicio,
                    IFNULL(FORMAT(crm_cotizaciones.total,2),'0.00') as total
                FROM crm_contratos 
                    INNER JOIN centros_negocio               ON centros_negocio.id = crm_contratos.id_cn                    
                    LEFT  JOIN asignacion_cn                 ON asignacion_cn.id_cliente = crm_contratos.id_cliente                             
                                                            AND asignacion_cn.id_cn = crm_contratos.id_cn 
                    LEFT JOIN master_empresa                   ON crm_contratos.id_facturadora=master_empresa.idempresa
                    LEFT JOIN clientes                       ON crm_contratos.id_cliente=clientes.id
                    LEFT JOIN crm_cotizador_servicio      ON crm_contratos.id_servicio=crm_cotizador_servicio.id 
                    LEFT JOIN crm_cotizaciones              ON crm_contratos.id_cotizacion = crm_cotizaciones.id
                    where ($id_cn = -1 OR ($id_cn <> -1 AND $id_cn = crm_contratos.id_cn))
                ORDER BY 1";        

        return $query;
    }

    private function getContratos( Request $request )
    {
        $lista_contratos = DB::select($this->getQueryContratos( $request ) );        
        
        if( !$request->user()->is('admin') ){
            $contratos = [];
            foreach ($lista_contratos as $contrato ) {
                
                if( Cliente::isCnActual( $contrato->id_cliente, $request->user()->idcn ) )
                {
                    $contratos[] = $contrato;                
                } 
            }


            //$lista_contratos = $contratos;    
        }

        

        return $lista_contratos;
    } 
}
