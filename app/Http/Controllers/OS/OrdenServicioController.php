<?php

namespace App\Http\Controllers\OS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrdenServicioController extends Controller
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
        $lista_os = DB::select( $this->getQueryOS() );

        return view('ordenes_servicio.index',['ordenes' => $lista_os]);
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
         $lista_prioridad        = $request->prioridad;
          $lista_estado           = $request->estado;
          $lista_tipo_estudio     = $request->tipo_estudio;
          $lista_cantidad         = $request->cantidad;
          $lista_costo_unitario   = $request->costo_unitario;
          $lista_sub_total        = $request->sub_total_partida;
          $lista_iva              = $request->iva_partida;
          $lista_total            = $request->total_partida;

          $arr_prioridad        = explode(',',$lista_prioridad);
          $arr_estado           = explode(',',$lista_estado);
          $arr_tipo_estudio     = explode(',',$lista_tipo_estudio);
          $arr_cantidad         = explode(',',$lista_cantidad);
          $arr_costo_unitario   = explode(',',$lista_costo_unitario);
          $arr_sub_total        = explode(',',$lista_sub_total);
          $arr_iva              = explode(',',$lista_iva);
          $arr_total            = explode(',',$lista_total);
          $numero_partidas      = count($arr_total);        
        

          $cotizacion=Cotizacion::create($request->all());
          $cotizacion->id_cn      = $request->user()->idcn;
          $cotizacion->id_usuario = $request->user()->id;
          $cotizacion->save();

          $cotizacion_ese = null;

          for($i=0; $i<$numero_partidas; $i++){

              $cotizacion_ese = new CotizadorESE;
              
              $cotizacion_ese->id_cotizacion    = $cotizacion->id;
              $cotizacion_ese->id_tipo_estudio  = $arr_tipo_estudio[$i];
              $cotizacion_ese->cantidad         = $arr_cantidad[$i];
              $cotizacion_ese->costo            = $arr_costo_unitario[$i];
              $cotizacion_ese->prioridad        = $arr_prioridad[$i];
              $cotizacion_ese->estado           = $arr_estado[$i];
              $cotizacion_ese->subtotal         = $arr_sub_total[$i];
              $cotizacion_ese->iva              = $arr_iva[$i];
              $cotizacion_ese->total            = $arr_total[$i];
              $cotizacion_ese->save();
          }


        
    

        if($cotizacion_ese and $cotizacion){
           
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','cotizador')->get();
           $id_SubModulo=SubModulo::where('slug','cotizador.ese')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$cotizacion->id,
            'descripcion'=>'Se genero cotizacion de ESE con ID:'.$cotizacion->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($cotizacion->total, 2, ',', ' ')
            ]);
            $Kardex->save();
            return response()->json(['status_alta' => 'success']);
          }
        else{
            return response()->json(['status_alta' => 'wrong']);
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

    private function getQueryOS()
    {
        $query = 'SELECT 
                    clientes.nombre_comercial,
                      crm_tc_servicioscotizador.servicio,
                      CONCAT("(",centros_negocio.nomenclatura,") ",centros_negocio.nombre) AS centro_negocio,
                      FORMAT(ordenes_servicio.total,2) AS total,
                      DATE_FORMAT(ordenes_servicio.fecha_cotizacion,\'%d-%m-%Y\') AS fecha_cotizacion,
                      CASE ordenes_servicio.id_servicio      
                        WHEN 0 THEN  CONCAT("download_orden_servicio_ese","/",ordenes_servicio.id)      
                        WHEN 1 THEN  CONCAT("download_orden_servicio_rys","/",ordenes_servicio.id)      
                        WHEN 2 THEN  CONCAT("download_orden_servicio_maquila","/",ordenes_servicio.id)      
                        WHEN 3 THEN  CONCAT("download_orden_servicio_psicometricos","/",ordenes_servicio.id) END AS ruta       
                    
                  FROM ordenes_servicio
                  LEFT JOIN crm_tc_servicioscotizador ON crm_tc_servicioscotizador.id = ordenes_servicio.id_servicio
                  LEFT JOIN clientes      ON clientes.id = ordenes_servicio.id_cliente
                  LEFT JOIN centros_negocio ON centros_negocio.id  = ordenes_servicio.id_cn ';

        return $query;

    }
}
