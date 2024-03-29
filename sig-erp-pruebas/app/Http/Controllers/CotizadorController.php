<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use tc_serviciosCotizador;
use App\Facturadora;
use App\CentroNegocio;
use App\Cliente;
use App\Asignacion\ClienteCN;
use App\Utilerias\Plantilla;
use App\Utilerias\PlantillasContratos;

class CotizadorController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tc_servicios=$this->listaServicios();
        $cn=$this->listaCN( $request->user()->idcn, $request->user()->is('admin') );
        //lista paquetes del SERVICIO ESE
        $lista_paquetes=$this->listaPaquete();
         
        //LISTA PRUEBAS DEL SERVISIO PSICOMETRICOS
        $listaPruebas=$this->listaPruebasPsicometricas();
        $catalogoPaquetes=DB::table('catalogo_paquetes_maquila')->get();

        return view("crm.cotizador.crm-cotizador",['listadoServicios'=>$tc_servicios,'listaCN'=>$cn,'paquetes'=>$lista_paquetes[0],"pruebas"=>$listaPruebas[0],"catalogoPaquetes"=>$catalogoPaquetes,"pruebasPsicometricas"=>$listaPruebas[1]]);
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

    public function listaServicios()
    {
        $query='SELECT '.
                'id,'.
                'servicio '.
                'from crm_tc_servicioscotizador';

        return $tc_servicios=DB::select($query);
       // dd($tc_servicios);
     
    }
    public function listaCN($id, $admin )
    { 
        $query ='SELECT '.
                ' clientes.id, '.
                ' clientes.nombre_comercial as nombre_comercial, '.
                ' clientes.tipo '.
                'FROM clientes '.
                'INNER JOIN cliente_cn_actual ON cliente_cn_actual.id_cliente = clientes.id ';
        if(!$admin){ 
            $query .= 'WHERE cliente_cn_actual.id_cn = '. $id .' '; 
        }
         
        $query .= 'ORDER BY clientes.nombre_comercial ASC ';        

        return $cn=DB::select($query);
       // dd($tc_servicios);
     
    }


    public function listadoCotizaciones(Request $request){

       $empresas_facturadoras = Facturadora::all();
       $peticion = $request->path();
       $plantillas = Plantilla::active()->get();
       
       
        return view('crm.cotizador.listado-cotizaciones',['lista_cotizaciones' => [],'facturadoras' => $empresas_facturadoras, 'peticion' => $peticion, 'plantillas' => $plantillas]);

    }

    public function getListaCotizaciones(Request $request){

        $lista_cotizaciones = $this->allCotizaciones( $request );

        $queryMontoCotizaciones = 'SELECT IFNULL(FORMAT(SUM(total),2),"00.00") AS total_cotizaciones FROM crm_cotizaciones WHERE crm_cotizaciones.contrato = 0 ';


        if( !$request->user()->is('admin') ){
            $queryMontoCotizaciones .= ' AND crm_cotizaciones.id_usuario = ' . $request->user()->id . ' AND crm_cotizaciones.id_cn = ' . $request->user()->idcn ;            
        }       

        $total_cotizaciones = DB::select($queryMontoCotizaciones);
        
        return response()->json([$lista_cotizaciones,$total_cotizaciones]);
    }


    private function allCotizaciones( Request $request )
    {
        $lista_cotizaciones = DB::select($this->queryCotizaciones( $request ) );

        if( !$request->user()->is('admin') ){
            $cotizaciones = [];
            foreach ($lista_cotizaciones as $cotizacion ) {
                
                if( Cliente::isCnActual( $cotizacion->id_cliente, $request->user()->idcn ) )
                {
                    $cotizaciones[] = $cotizacion;                
                } 
            }


            $lista_cotizaciones = $cotizaciones;    
        }

        return $lista_cotizaciones;
    } 



    private function queryCotizaciones( Request $request )
    {
        $query_cotizaciones = ' SELECT 
                                    crm_cotizaciones.id_cn,
                                    clientes.id AS id_cliente,     
                                    crm_cotizaciones.id AS id_cotizacion,     
                                    crm_cotizaciones.id_servicio,     
                                    crm_cotizaciones.contrato,     
                                    crm_tc_servicioscotizador.id AS id_servicio_a,      
                                    CASE crm_cotizaciones.id_servicio      
                                            WHEN 0 THEN  CONCAT("descarga_ese","/",crm_cotizaciones.id)      
                                            WHEN 1 THEN  CONCAT("descarga_rys","/",crm_cotizaciones.id)      
                                            WHEN 2 THEN  CONCAT("descarga_maquila","/",crm_cotizaciones.id)      
                                            WHEN 3 THEN  CONCAT("descarga_psicometrico","/",crm_cotizaciones.id) 
                                            WHEN 4 THEN  CONCAT("descarga_generico","/",crm_cotizaciones.id) END AS  ruta,       
                                    CASE crm_cotizaciones.id_servicio      
                                            WHEN 0 THEN  ("contrato_ese_preview")      
                                            WHEN 1 THEN  ("contrato_rys_preview")      
                                            WHEN 2 THEN  ("contrato_maquila_preview")      
                                            WHEN 3 THEN  ("contrato_psicometrico_preview")
                                            WHEN 4 THEN  ("contrato_generico_preview") END AS ruta_contrato,     
                                    IFNULL(clientes.nombre_comercial,"") AS nombre_comercial,     
                                    IFNULL(clientes.nombre,"") AS nombre, 
                                    CONCAT("(",centros_negocio.nomenclatura,") ",centros_negocio.nombre)  AS centro_negocio,   
                                    crm_tc_servicioscotizador.servicio,     
                                    crm_cotizaciones.subtotal,     
                                    crm_cotizaciones.iva,    
                                    crm_cotizaciones.total,    
                                    DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,\'%d-%m-%Y\') AS fecha_cotizacion 
                                FROM crm_cotizaciones 
                                    INNER JOIN centros_negocio               ON centros_negocio.id = crm_cotizaciones.id_cn                    
                                    LEFT JOIN clientes           ON clientes.id     = crm_cotizaciones.id_cliente 
                                    INNER JOIN cliente_cn_actual ON cliente_cn_actual.id_cliente = crm_cotizaciones.id_cliente 
                                    LEFT JOIN asignacion_cn      ON asignacion_cn.id_cliente = crm_cotizaciones.id                             
                                                                AND asignacion_cn.id_cn = crm_cotizaciones.id_cn 
                                    LEFT JOIN users              ON users.id        = crm_cotizaciones.id_usuario                             
                                                                AND users.idcn      = cliente_cn_actual.id_cn 
                                    LEFT JOIN crm_tc_servicioscotizador ON crm_tc_servicioscotizador.id = crm_cotizaciones.id_servicio 
                                WHERE 1=1 AND crm_cotizaciones.contrato = 0 ORDER BY crm_cotizaciones.fecha_cotizacion DESC';                        
        

        return $query_cotizaciones;
    }

      public function listaPaquete(){
            $arrayPaquetes = array();
            $paquetes=DB::table('catalogo_paquetes_maquila')->get();
            $paquetes_select=['-1'=>'Seleccione una paquete...'];
            foreach ($paquetes as  $paquete) {
                $paquetes_select[$paquete->id_maquila]=$paquete->nombre;
            }
            $arrayPaquetes[]=$paquetes_select;
            array_push($arrayPaquetes,$paquetes);

           return $arrayPaquetes;
    }
    public function listaPaqueteMaqDescripcion(Request $request){
         
           
            $paquetes=DB::table('catalogo_paquetes_maquila')->where('id_maquila',$request->id_paquete)->get();
           if($paquetes)
           return response()->json(['status'=>"ok","descripcion"=>$paquetes]);
           else
           return response()->json(['status'=>"false"]);
    }
    public function listaPruebasPsicometricas(){
            $arryCatalogoPaquetes=array();
            $pruebas=DB::table('crm_tc_cotizador_psicometrico_costo_servicio')->get();
            $pruebas_select=['-1'=>'Seleccione una prueba..'];
            foreach ($pruebas as  $prueba) {
                $pruebas_select[$prueba->idtipo]=$prueba->prueba;
            }
            $arryCatalogoPaquetes[]=$pruebas_select;
            array_push($arryCatalogoPaquetes,$pruebas);
             return $arryCatalogoPaquetes;
        }
        public function ListadoPlantillasContratos(){
            $plantillas_contratos=PlantillasContratos::where('status','1')->get();
             return response()->json([$plantillas_contratos]);
         
        }

    

}
