<?php

namespace App\Http\Controllers\OS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OS\OrdenServicio;
use App\OS\OrdenServicioMaquila;
use DB;
use PDF;
use App\Cliente;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

class OrdenServicioMaquilaController extends Controller
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
        
        $lista_sub_total       = $request->lista_sub_total;
        $lista_empleados       = $request->lista_empleados;
        $lista_paquetes        = $request->lista_paquetes;
        $lista_costo_unitario  = $request->lista_costo_unitario;

        $arr_sub_total      = explode(',',$lista_sub_total);
        $arr_empleados      = explode(',',$lista_empleados);
        $arr_paquetes       = explode(',',$lista_paquetes);
        $arr_costo_unitario = explode(',',$lista_costo_unitario);
        $num_partidas       = count($arr_costo_unitario);
        
        

        $orden_servicio = OrdenServicio::create($request->all());

        for($i=0; $i < $num_partidas; $i++){
            $orden_servicio_maquila = new OrdenServicioMaquila;
            
            $orden_servicio_maquila->id_paquete      = $arr_paquetes[$i];
            $orden_servicio_maquila->num_empleados   = $arr_empleados[$i];
            $orden_servicio_maquila->costo_unitario  = $arr_costo_unitario[$i];
            $orden_servicio_maquila->subtotal        = $arr_sub_total[$i];
            $orden_servicio_maquila->iva             = $arr_sub_total[$i] * 0.16;
            $orden_servicio_maquila->total           = $arr_sub_total[$i] * 1.16;
            $orden_servicio->ordendes_servicio_maquila()->save($orden_servicio_maquila);

        }



    
        if($orden_servicio){
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','os')->get();
           $id_SubModulo=SubModulo::where('slug','os.maquila')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$orden_servicio->id,
            'descripcion'=>'Se genero la Orden de servicio de Maquila con ID:'.$orden_servicio->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($orden_servicio->total, 2, ',', ' ')
            ]);
            $Kardex->save();
            return response()->json(['resultado' => 'ok']);
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
            $data = [   
                        'nombre'            => '',
                        'nombre_comercial'  => '',
                        'calle'             => '',
                        'cp'                => '',
                        'ciudad'            => '',
                        'estado'            => '',
                        'id_cliente'        => '',                    
                        'fecha'             => '',
                        'direccion'         => '',
                        'total'             => 0.00                       
                    ];

            $query=' SELECT '.
                           ' clientes.nombre, '.
                           ' clientes.nombre_comercial, '.
                           ' clientes.df_calle, '.
                           ' clientes.df_cp, '.
                           ' clientes.df_ciudad, '.
                           ' clientes.df_estado, '.
                           ' clientes.id, '.
                           'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_con, '.
                            'users.name,'.
                           ' ordenes_servicio_maquila.total, '.
                           'DATE_FORMAT(ordenes_servicio.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
                           ' CONCAT("Estado: ", clientes.df_estado," Municipio: ", '.         
                           '            clientes.df_municipio," CP: ", '.
                           '            clientes.df_cp," Colonia: ", '.
                           '            clientes.df_colonia," Calle: ", '.
                           '            clientes.df_calle," No Ext: ", '.
                           '            clientes.df_num_interior," No Int: ", '.
                           '            clientes.df_num_exterior) AS direccion,'.
                            'crm_tc_servicioscotizador.servicio,'.
                            'ordenes_servicio_maquila .num_empleados,'.
                            'ordenes_servicio_maquila .costo_unitario,'.
                            'ordenes_servicio_maquila .subtotal as subtotal_maquila,'.
                            'ordenes_servicio_maquila .iva as iva_maquila,'.
                            'ordenes_servicio.subtotal as subtotal_cotizacion,'.
                            'ordenes_servicio.iva  as iva_cotizacion,'.
                            'ordenes_servicio.total  as total_cotizacion,'.
                            'ordenes_servicio.id as id_cotizacion,'.
                            'catalogo_paquetes_maquila.nombre as servicio_maquila'.
                    ' FROM ordenes_servicio_maquila '.
                    ' LEFT JOIN ordenes_servicio ON ordenes_servicio_maquila.id_os = ordenes_servicio.id '.
                    ' LEFT JOIN clientes         ON ordenes_servicio.id_cliente=clientes.id '.
                    ' LEFT JOIN centros_negocio  ON ordenes_servicio.id_cn=centros_negocio.id '.
                    ' LEFT JOIN crm_tc_servicioscotizador ON ordenes_servicio.id_servicio=crm_tc_servicioscotizador.id '.
                    ' LEFT JOIN catalogo_paquetes_maquila ON catalogo_paquetes_maquila.id=ordenes_servicio_maquila.id_paquete '.
                    'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
                    'LEFT JOIN users ON  ordenes_servicio.id_usuario=users.id '.
                    ' WHERE ordenes_servicio.id = ? ';

            $datos_maquila =  DB::select($query,[$id]);
            
            if($datos_maquila){

                $nombre             = $datos_maquila[0]->nombre;
                $nombre_comercial   = $datos_maquila[0]->nombre_comercial;
                $calle              = $datos_maquila[0]->df_calle;
                $cp                 = $datos_maquila[0]->df_cp;
                $ciudad             = $datos_maquila[0]->df_ciudad;
                $estado             = $datos_maquila[0]->df_estado;
                $id_cliente         = $datos_maquila[0]->id;
                $total              = $datos_maquila[0]->total;
                $fecha              = $datos_maquila[0]->fecha_cotizacion;
                $direccion          = $datos_maquila[0]->direccion;

                $data = [   
                            'nombre'            => $nombre,
                            'nombre_comercial'  => $nombre_comercial,
                            'calle'             => $calle,
                            'cp'                => $cp,
                            'ciudad'            => $ciudad,
                            'estado'            => $estado,
                            'id_cliente'        => $id_cliente,
                            'total'             => $total,
                            'fecha'             => $fecha,
                            'direccion'         => $direccion
                        ]; 
                
            }



            $pdf = PDF::loadView('ordenes_servicio.pdf.pdf-os-maquila',["datos_maquila"=>$datos_maquila]);
            $pdf->setPaper('letter', 'portrait');
            return $pdf->download('maquila.pdf');
    }
}
