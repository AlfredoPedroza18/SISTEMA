<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ContratoGenerico;
use App\Contrato;
use App\Cotizacion; 
use App\Cliente;
use DB;
use App\facturadora;

class ContratoGenericoController extends Controller
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
        //
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
        $no_contrato    = '';
        $id_cotizacion  = $request->id_cotizacion;
        $id_cliente     = $request->id_cliente;
        $id_contrato    = 0;

        /**************************************************************************************************
                    Query para obtener los datos y llenar la tabla de crm_contratos_gebnericos
        **************************************************************************************************/
        $query       = 'SELECT   '.
                              'crm_cotizaciones.fecha_cotizacion, '.
                              'crm_cotizaciones_generico.id_producto, '.                                 
                              'crm_cotizaciones_generico.cantidad, '. 
                              'crm_cotizaciones_generico.costo_unitario, '.
                              'crm_cotizaciones_generico.subtotal, '.
                              'crm_cotizaciones_generico.iva, '.
                              'crm_cotizaciones_generico.total '.
                        'FROM crm_cotizaciones_generico '.
                        'LEFT JOIN crm_cotizaciones ON crm_cotizaciones_generico.id_cotizacion=crm_cotizaciones.id '.
                        'LEFT JOIN clientes         ON crm_cotizaciones.id_cliente=clientes.id '.
                        'LEFT JOIN centros_negocio  ON crm_cotizaciones.id_cn=centros_negocio.id '.
                        'LEFT JOIN crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id '.
                        'WHERE crm_cotizaciones.id = ? ';
try{
        $cotizacion      = DB::select($query,[$request->id_cotizacion]);
        /**************************************************************************************************
                    FIN Query para obtener los datos y llenar la tabla de crm_contratos_ese
        **************************************************************************************************/
        $cotizacion_contrato = Cotizacion::find($id_cotizacion);
        $cliente             = Cliente::find($id_cliente);

        $query = "
            SELECT   'GENERICA' AS servicio, 
            CONCAT( 
                    'GEN', 
                    DATE_FORMAT(NOW(),'%d%m%y'),'CN', 
                    
                    IF( (COUNT(crm_contratos_genericos.id) + 1) > 10 , 
                    COUNT(crm_contratos_genericos.id) + 1 , CONCAT('0',COUNT(crm_contratos_genericos.id) + 1))) AS no_contrato 
            FROM crm_contratos_genericos 
            LEFT JOIN crm_contratos     ON crm_contratos.id = crm_contratos_genericos.id_contrato 
            LEFT JOIN centros_negocio   ON centros_negocio.id = crm_contratos.id_cn 
            WHERE  centros_negocio.id = ?
        ";
      

        $no_contrato_aux = DB::select($query,[$request->user()->idcn]);        
        $no_contrato     = $no_contrato_aux[0]->no_contrato;      


        $contrato        = Contrato::create($request->all());
        
        if($cotizacion && $contrato){
             $contrato->no_contrato = $no_contrato;
             $contrato->fecha_inicio = $this->createDate($request->fecha_incio);
             $contrato->fecha_fin    = $this->createDate($request->fecha_fin);
             $id_contrato            = $contrato->id;
             $contrato->save();
             $contratorys  = ContratoGenerico::create(['id_contrato'      => $contrato->id,
                                                 'id_producto'  => $cotizacion[0]->id_producto,                                
                                                 'cantidad'         => $cotizacion[0]->cantidad,
                                                 'costo_unitario'   => $cotizacion[0]->costo_unitario,
                                                 'subtotal'         => $cotizacion[0]->subtotal,
                                                 'iva'              => $cotizacion[0]->iva,
                                                 'total'            => $cotizacion[0]->total
                                                  ]);
                    $cotizacion_contrato->contrato = 1;
                    $cotizacion_contrato->save();
                    $cliente->tipo = 2;  //Cambia el estado Prospecto es 1, Cliente es 2
                    $cliente->contrato_a = $request->id_facturadora;
                    $cliente->save();

                    /*--- Insercion de movimientos al kardex ----------

           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $empresa_facturadora=Facturadora::where('id',$request->id_facturadora)->get();
           $id_modulo=Modulo::where('slug','crm')->get();
           $id_SubModulo=SubModulo::where('slug','contrato.ese')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$contrato->id,
            'descripcion'=>'Se genero Contrato de ESE con N° : '.$contrato->no_contrato.' al Cliente: '.$cliente[0]->nombre_comercial.' con Empresa Facturadora: '.$empresa_facturadora[0]->nombre
            ]);
            $Kardex->save();*/
         
                    /*--- end insercion de movimientos al kardex ------*/

        


        } 

        return response()->json(['servicio' => $request->id_servicio,'id_contrato' => $id_contrato]);
         }catch(\Exception $e){
                echo '<strong>Error: '. $e .'</strong>';                
        }
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

    public function preview(Request $request){
        $id_cn = $request->user()->idcn;
        $query = "
            SELECT   'GENERICA' AS servicio, 
            CONCAT( 
                    'GEN', 
                    DATE_FORMAT(NOW(),'%d%m%y'),'CN', 
                    
                    IF( (COUNT(crm_contratos_genericos.id) + 1) > 10 , 
                    COUNT(crm_contratos_genericos.id) + 1 , CONCAT('0',COUNT(crm_contratos_genericos.id) + 1))) AS no_contrato 
            FROM crm_contratos_genericos 
            LEFT JOIN crm_contratos     ON crm_contratos.id = crm_contratos_genericos.id_contrato 
            LEFT JOIN centros_negocio   ON centros_negocio.id = crm_contratos.id_cn 
            WHERE  centros_negocio.id = ?
        ";
      

        $datos_ese = DB::select($query,[$id_cn]);

        return response()->json($datos_ese);


    }

    private function getNoContrato($id_cn){
        
       $query= ' SELECT  '.
                '    "GENERICA" AS servicio, '.
                '    CONCAT( '.
                '            "GEN", '.
                '             DATE_FORMAT(NOW(),"%d%m%y"),"CN", '.
                '             IF(centros_negocio.id > 10,centros_negocio.id,CONCAT("0",centros_negocio.id)), '.
                '             IF( (COUNT(crm_contratos_genericos.id) + 1) > 10 , '.
                '             COUNT(crm_contratos_genericos.id) + 1 , CONCAT("0",COUNT(crm_contratos_genericos.id) + 1))) AS no_contrato '.
                '    FROM crm_contratos_genericos '.
                '    LEFT JOIN crm_contratos     ON crm_contratos.id = crm_contratos_genericos.id_contrato '.
                '    LEFT JOIN centros_negocio   ON centros_negocio.id = crm_contratos.id_cn '.
                '    WHERE  centros_negocio.id = ? ';
        
        return  "DB::select($query,[$id_cn])";
    }
     public function downloadWord(Request $request,$id_contrato)
    {
       //$no_contrato = $this->getNoContrato($request->user()->idcn);         
       //return view('crm.contratos.pdf-contrato_maquila',['no_contrato' => $no_contrato[0]->no_contrato ]);
        $query_ese=DB::select("
            SELECT 
            crm_contratos.no_contrato,
            clientes.nombre_comercial,
            clientes.rfc as rfc_cliente,
            CONCAT (IFNULL(clientes.nombre,''),' ',IFNULL(clientes.apellido_paterno,''),' ', IFNULL(clientes.apellido_materno,'')) AS representante_legal_clientes,
            master_empresa.representantelegal as representante_legal_empresa,
            master_empresa.rfc as rfc_empresa,
            CONCAT(clientes.df_calle,'',clientes.df_colonia,'',clientes.df_cp) AS cliente_domicilio,
            master_empresa.fk_titulo as nombre_facturadora,
            crm_cotizador_servicio.servicio,
            plantillas_contratos.contenido,
            CONCAT(master_empresa.calle,'',master_empresa.colonia,'',master_empresa.cp) AS facturadora_domicilio
            FROM crm_contratos
            LEFT JOIN plantillas_contratos ON crm_contratos.id_plantilla_generica=plantillas_contratos.id
            LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id
            LEFT JOIN master_empresa ON crm_contratos.id_facturadora=master_empresa.idempresa
            LEFT JOIN crm_cotizador_servicio ON crm_contratos.id_servicio= crm_cotizador_servicio.id
            WHERE crm_contratos.id=?",[$id_contrato]);

        $str = $query_ese[0];

        $label = ['[NUM_CONTRATO]','[NOMBRE_EMPRESA]','[DIRECCION_EMPRESA]','[NOMBRE_CLIENTE]','[DIRECCION_CLIENTE]',
        '[REPRESENTANTE_LEGAL_CLIENTES]', '[REPRESENTANTE_LEGAL_EMPRESA]', '[RFC_EMPRESA]', '[RFC_CLIENTE]', '[SERVICIO]'];
        $replace= [$str->no_contrato,$str->nombre_facturadora,$str->facturadora_domicilio,$str->nombre_comercial,$str->cliente_domicilio,$str->representante_legal_clientes,$str->representante_legal_empresa,$str->rfc_empresa,$str->rfc_cliente,$str->servicio];
        

        $contrato_generico = str_replace($label, $replace, $str->contenido);
        
        return view('crm.contratos.pdf-contrato_generico',['datos_contrato'=>$contrato_generico]);
    }

    Private function createDate($str_fecha){
        $date        = new \DateTime($str_fecha);
        $fecha       = $date->format('Y-m-d\TH:i:s');

        return $fecha;
    }

}
