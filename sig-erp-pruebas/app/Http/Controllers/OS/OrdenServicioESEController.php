<?php

namespace App\Http\Controllers\OS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OS\OrdenServicio;
use App\OS\OrdenServicioEse;
use App\ESE\OrdenServicioDetalle;
use PDF;
use DB;
use App\Cliente;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

class OrdenServicioESEController extends Controller
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

       

         
              

          $orden_servicio             = OrdenServicio::create($request->all());
          $orden_servicio->id_cn      = $request->user()->idcn;
          $orden_servicio->id_usuario = $request->user()->id;
          $orden_servicio->save();


          $orden_servicio_ese = null;
          $id_os_ese=null;
       
                for($i=0; $i<$numero_partidas; $i++){

              $orden_servicio_ese = new OrdenServicioEse();
              
              
              $orden_servicio_ese->id_tipo_estudio  = $arr_tipo_estudio[$i];
              $orden_servicio_ese->cantidad         = $arr_cantidad[$i];
              $orden_servicio_ese->costo            = $arr_costo_unitario[$i];
              $orden_servicio_ese->prioridad        = $arr_prioridad[$i];
              $orden_servicio_ese->estado           = $arr_estado[$i];
              $orden_servicio_ese->subtotal         = $arr_sub_total[$i];
              $orden_servicio_ese->iva              = $arr_iva[$i];
              $orden_servicio_ese->total            = $arr_total[$i];
              
              $id_os_ese=$orden_servicio->ordendes_servicio_ese()->save( $orden_servicio_ese );
              
           }  
          
//________INSERTA EL DETALLE DE CADA ESTUDIO EN LA TABLA ESTUDIOS_ESE_DETALLE______
          foreach($arr_cantidad as $key=>$value){
                         for($a=0; $a<$value;$a++){

                        $iva_unitario=($arr_costo_unitario[$key]*.16);
                        $total_unitario=($iva_unitario+$arr_costo_unitario[$key]);
                        $detalle=OrdenServicioDetalle::create([
                                                 
                              'id_tipo_estudio' => $arr_tipo_estudio[$key],
                              'id_os' => $orden_servicio->id,
                              'costo' => $arr_costo_unitario[$key],
                              'prioridad' => $arr_prioridad[$key],
                              'estado' => $arr_estado[$key],
                              'subtotal' => $arr_costo_unitario[$key],
                              'iva' =>$iva_unitario,
                              'total' =>$total_unitario,
                              'id_cliente' =>$request->id_cliente,
                              'id_os_ese' =>$id_os_ese->id

                            ]);
                              
                         }
                   }
          
//________END INSERTA EL DETALLE DE CADA ESTUDIO EN LA TABLA ESTUDIOS_ESE_DETALLE______


  

     

        
    

        if($orden_servicio){
           $ultimo_os=OrdenServicio::all()->last();
         
           
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','os')->get();
           $id_SubModulo=SubModulo::where('slug','os.ese')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$orden_servicio->id,
            'descripcion'=>'Se genero la Orden de servicio de ESE con ID:'.$orden_servicio->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($orden_servicio->total, 2, ',', ' ')
            ]);
            $Kardex->save();
            return response()->json(['status_alta' => 'success',"ultima_orden"=>$ultimo_os->id]);
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

    public function download( $id )
    {    
      
      $query = 'SELECT         ordenes_servicio.fecha_cotizacion,'.
                              'clientes.nombre,'.
                              'clientes.nombre_comercial,'.
                              'clientes.df_calle,'.
                              'clientes.df_cp,'.
                              'clientes.df_ciudad,'.
                              'clientes.df_estado,'.
                              'clientes.id,'.
                              'users.name,'.
                              'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_con, '.
                              'DATE_FORMAT(ordenes_servicio.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
                              'CONCAT("Estado: ", clientes.df_estado," Municipio: ",'.
                                            'clientes.df_municipio," CP: ", '.
                                            'clientes.df_cp," Colonia: ", '.
                                            'clientes.df_colonia," Calle: ", '.
                                            'clientes.df_calle," No Ext: ", '.
                                            'clientes.df_num_interior," No Int: ", '.
                                            'clientes.df_num_exterior) AS direccion ,'.
                                            'crm_tc_cotizador_ese_costos.tipo_estudio,'.
                      'CASE ordenes_servicio_ese .prioridad '.
                                  'WHEN 1 THEN "Normal (3 a 5 dias)" '.
                                  'WHEN 2 THEN "Urgentes (menos de 3 dias)" END AS prioridad ,'.
                      'ordenes_servicio_ese .cantidad as cantidad,'.
                      'ordenes_servicio_ese .costo as costo_ese,'.
                                  'ordenes_servicio_ese .subtotal as subtotal_ese,'.
                                  'ordenes_servicio_ese .iva as iva_ese,'.
                                  'ordenes_servicio_ese .total as total_ese,'.
                                  'ordenes_servicio.subtotal as subtotal_cotizacion,'.
                                  'ordenes_servicio.iva  as iva_cotizacion,'.
                                  'ordenes_servicio.total  as total_cotizacion,'.
                                  'estados.nombre_estado  as estado '.
                'FROM ordenes_servicio_ese '.
                'LEFT JOIN ordenes_servicio ON  ordenes_servicio_ese.id_os = ordenes_servicio.id '.
                'left join clientes ON ordenes_servicio.id_cliente=clientes.id '.
                'left join centros_negocio ON ordenes_servicio.id_cn=centros_negocio.id '.
                'left join crm_tc_servicioscotizador ON ordenes_servicio.id_servicio=crm_tc_servicioscotizador.id '.
                'left join crm_tc_cotizador_ese_costos ON crm_tc_cotizador_ese_costos.id_servicio_ese=ordenes_servicio_ese.id_tipo_estudio '.
                'left join estados ON estados.id=ordenes_servicio_ese.estado '.
                'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
                'LEFT JOIN users ON  ordenes_servicio.id_usuario=users.id '.
                'where ordenes_servicio_ese.id_os = ? ';

 
        $esedatos_query =  DB::select($query,[$id]);

        
        $pdf = PDF::loadView('ordenes_servicio.pdf.pdf-os-ese',["datos_ese"=>$esedatos_query]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('ese.pdf');}
}
