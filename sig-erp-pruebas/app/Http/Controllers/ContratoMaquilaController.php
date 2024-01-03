<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ContratoMaquila;
use App\Contrato;
use App\Cotizacion; 
use App\Cliente;
use DB;
use App\facturadora;

/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */
class ContratoMaquilaController extends Controller
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
                    Query para obtener los datos y llenar la tabla de crm_contratos_maquila
        **************************************************************************************************/
        $query       = 'SELECT '.  
                              'crm_cotizaciones.fecha_cotizacion, '.
                              'crm_cotizaciones_maquila.id_paquete, '.
                              'crm_cotizaciones_maquila.num_empleados, '. 
                              'crm_cotizaciones_maquila.costo_unitario, '.
                              'crm_cotizaciones_maquila.subtotal, '.
                              'crm_cotizaciones_maquila.iva, '.
                              'crm_cotizaciones_maquila.total '.
                        'FROM crm_cotizaciones_maquila '.
                        'LEFT JOIN crm_cotizaciones ON crm_cotizaciones_maquila.id_cotizacion=crm_cotizaciones.id '.
                        'LEFT JOIN clientes         ON crm_cotizaciones.id_cliente=clientes.id '.
                        'LEFT JOIN centros_negocio  ON crm_cotizaciones.id_cn=centros_negocio.id '.
                        'LEFT JOIN crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id '.
                        'WHERE crm_cotizaciones.id = ? ';
        try{
                $cotizacion      = DB::select($query,[$request->id_cotizacion]);
                /**************************************************************************************************
                            FIN Query para obtener los datos y llenar la tabla de crm_contratos_maquila
                **************************************************************************************************/

                $cotizacion_contrato = Cotizacion::find($id_cotizacion);
                $cliente             = Cliente::find($id_cliente);

                

                $no_contrato_aux = $this->getNoContrato($request->user()->idcn);        
                $no_contrato     = $no_contrato_aux[0]->no_contrato;           

                
                $contrato               = Contrato::create($request->all());
                $contrato->no_contrato  = $no_contrato;
                $contrato->fecha_inicio = $this->createDate($request->fecha_incio);
                $contrato->fecha_fin    = $this->createDate($request->fecha_fin);
                $id_contrato            = $contrato->id;
                $contrato->save();

                
                if($cotizacion && $contrato){
                    
                    $contratorys    = ContratoMaquila::create([ 'id_contrato'      => $contrato->id,
                                                                'id_paquete'       => $cotizacion[0]->id_paquete,
                                                                'num_empleados'    => $cotizacion[0]->num_empleados,
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

                     /*--- Insercion de movimientos al kardex ----------*/

           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $empresa_facturadora=Facturadora::where('id',$request->id_facturadora)->get();
           $id_modulo=Modulo::where('slug','crm')->get();
           $id_SubModulo=SubModulo::where('slug','contrato.maquila')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$contrato->id,
            'descripcion'=>'Se genero Contrato de Maquila con N°: '.$contrato->no_contrato.' al Cliente: '.$cliente[0]->nombre_comercial.' con Empresa Facturadora: '.$empresa_facturadora[0]->nombre
            ]);
            $Kardex->save();
         
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
        $datos_rys = $this->getNoContrato($id_cn);

        return response()->json($datos_rys);
    }

    public function downloadWord(Request $request,$id_contrato)
    {
       //$no_contrato = $this->getNoContrato($request->user()->idcn);         
       //return view('crm.contratos.pdf-contrato_maquila',['no_contrato' => $no_contrato[0]->no_contrato ]);
        $query_maquila=DB::select("
                    SELECT 
                    crm_contratos.no_contrato,
                    clientes.nombre_comercial,
                    facturadoras.nombre,
                    crm_tc_servicioscotizador.servicio
                    FROM crm_contratos
                    LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id
                    LEFT JOIN facturadoras ON crm_contratos.id_facturadora=facturadoras.id
                    LEFT JOIN crm_tc_servicioscotizador ON crm_contratos.id_servicio=crm_tc_servicioscotizador.id
                    WHERE crm_contratos.id=?",[$id_contrato]);

        //dd($query_rys);
        return view('crm.contratos.pdf-contrato_maquila',['datos_contrato'=>$query_maquila]);
    }


    private function getNoContrato($id_cn){
        
       $query= ' SELECT  '.
                '    "MAQUILA" AS servicio, '.
                '    CONCAT( '.
                '            "MAQ", '.
                '             DATE_FORMAT(NOW(),"%d%m%y"),"CN", '.
                '             IF(centros_negocio.id > 10,centros_negocio.id,CONCAT("0",centros_negocio.id)), '.
                '             IF( (COUNT(crm_contratos_maquila.id) + 1) > 10 , '.
                '             COUNT(crm_contratos_maquila.id) + 1 , CONCAT("0",COUNT(crm_contratos_maquila.id) + 1))) AS no_contrato '.
                '    FROM crm_contratos_maquila '.
                '    LEFT JOIN crm_contratos     ON crm_contratos.id = crm_contratos_maquila.id_contrato '.
                '    LEFT JOIN centros_negocio   ON centros_negocio.id = crm_contratos.id_cn '.
                '    WHERE  centros_negocio.id = ? ';
        
        return  DB::select($query,[$id_cn]);
    }

    private function createDate($str_fecha){
        $date        = new \DateTime($str_fecha);
        $fecha       = $date->format('Y-m-d\TH:i:s');

        return $fecha;
    }


}
