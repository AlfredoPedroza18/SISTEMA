<?php

namespace App\Http\Controllers\OS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OS\OrdenServicio;
use App\OS\OrdenServicioPsicometricos;
use App\Cliente;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use DB;
use PDF;

class OrdenServicioPsicometricosController extends Controller
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
        $orden_servicio_psico = null;
        $orden_servicio       = null;

        $lista_subtotal         = $request->lista_subtotal;
        $lista_iva              = $request->lista_iva;
        $lista_total_partida    = $request->lista_total_partida;
        $lista_pruebas          = $request->lista_pruebas;
        $lista_cantidad_partida = $request->lista_cantidad_partida;
        $lista_pruebas_select   = $request->lista_pruebas_select;

        $arr_subtotal           = explode(',',$lista_subtotal);
        $arr_iva                = explode(',',$lista_iva);
        $arr_total_partida      = explode(',',$lista_total_partida);
        $arr_pruebas            = explode(',',$lista_pruebas);
        $arr_cantidad_partida   = explode(',',$lista_cantidad_partida);
        $arr_pruebas_select     = explode(',',$lista_pruebas_select);
        $num_partidas           = count($arr_total_partida); 
        $id_cn_actual           = Cliente::cnActual( $request->id_cliente, $request->user()->idcn  );  
               

        $orden_servicio             = OrdenServicio::create($request->all());
        $orden_servicio->id_cn      = $id_cn_actual;
        $orden_servicio->id_usuario = $request->user()->id;
        $orden_servicio->save();


        for($i=0; $i < $num_partidas; $i++){
            $orden_servicio_psico = new OrdenServicioPsicometricos;
            
            
            $orden_servicio_psico->tipo_prueba      = $arr_pruebas[$i];
            $orden_servicio_psico->pruebas          = $arr_pruebas_select[$i];
            $orden_servicio_psico->cantidad         = $arr_cantidad_partida[$i];
            $orden_servicio_psico->costo_unitario   = $arr_subtotal[$i];
            $orden_servicio_psico->iva              = $arr_iva[$i];
            $orden_servicio_psico->total            = $arr_total_partida[$i];
            $orden_servicio->ordendes_servicio_psicometricos()->save( $orden_servicio_psico );            

        }   

        if($orden_servicio_psico and $orden_servicio){
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','os')->get();
           $id_SubModulo=SubModulo::where('slug','os.psicometricos')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$orden_servicio->id,
            'descripcion'=>'Se genero la Orden de servicio de Estudios psicometricos con ID:'.$orden_servicio->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($orden_servicio->total, 2, ',', ' ')
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
        dd( $request );
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
                $query='SELECT ordenes_servicio.fecha_cotizacion,'.
                            'clientes.nombre,'.
                            'clientes.nombre_comercial,'.
                            'clientes.df_calle,'.
                            'clientes.df_cp,'.
                            'clientes.df_ciudad,'.
                            'clientes.df_estado,'.
                            'clientes.id,'.
                            'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_con, '.
                            'users.name ,'.
                            'CASE ordenes_servicio_psicometrico.tipo_prueba '.
                            'WHEN  1 THEN "1 Prueba psicometrica" '.
                            'WHEN 2 THEN "1 bateria de pruebas Psicometricas (que incluye 4 pruebas)" '.
                            'WHEN 3 THEN "Prueba MIDOT" '.
                            'WHEN 4 THEN "Otras" END AS tipo_prueba,'.
                            'ordenes_servicio_psicometrico.costo_unitario,'.
                            'ordenes_servicio_psicometrico.cantidad,'.
                            'ordenes_servicio_psicometrico.iva,'.
                            'ordenes_servicio_psicometrico.total,'.
                            'ordenes_servicio.subtotal as subtotal_cotizacion,'.
                            'ordenes_servicio.iva as iva_cotizacion,'.
                            'ordenes_servicio.total as total_cotizacion,'.
                            'DATE_FORMAT(ordenes_servicio.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
                            'CONCAT("Estado: ", clientes.df_estado," Municipio: ",'.         
                                           'clientes.df_municipio," CP: ",'. 
                                           'clientes.df_cp," Colonia: ",'. 
                                           'clientes.df_colonia," Calle: ",'. 
                                           'clientes.df_calle," No Ext: ",'. 
                                           'clientes.df_num_interior," No Int: ", '.
                                           'clientes.df_num_exterior) AS direccion'.
                         ' FROM ordenes_servicio_psicometrico '.
                         'LEFT JOIN ordenes_servicio ON  ordenes_servicio_psicometrico.id_os=ordenes_servicio.id '.
                         'left join clientes ON ordenes_servicio.id_cliente=clientes.id '.
                         'left join centros_negocio ON ordenes_servicio.id_cn=centros_negocio.id '.
                         'left join crm_tc_servicioscotizador ON .ordenes_servicio.id_servicio=crm_tc_servicioscotizador.id '.
                         'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
                         'LEFT JOIN users ON  ordenes_servicio.id_usuario=users.id '.
                         'where ordenes_servicio_psicometrico.id_os=?';
                 $psicodatos =  DB::select($query,[$id]);
            if($psicodatos){
               $nombre=$psicodatos[0]->nombre;
               $nombre_comercial=$psicodatos[0]->nombre_comercial;
               $calle=$psicodatos[0]->df_calle;
               $cp=$psicodatos[0]->df_cp;
               $ciudad=$psicodatos[0]->df_ciudad;
               $estado=$psicodatos[0]->df_estado;
               $id_cliente=$psicodatos[0]->id;
               $costo_unitario=$psicodatos[0]->costo_unitario;
               $fecha=$psicodatos[0]->fecha_cotizacion;
               $direccion=$psicodatos[0]->direccion;
               $tipo_prueba=$psicodatos[0]->tipo_prueba;
            
               $data = ["nombre"=>$nombre,"nombre_comercial"=>$nombre_comercial,'calle'=>$calle,'cp'=>$cp,'ciudad'=>$ciudad,'estado'=>$estado,'id_cliente'=>$id_cliente,'costo'=>$costo_unitario,'fecha'=>$fecha,'direccion'=>$direccion,'tipo_prueba'=>$tipo_prueba];
           }else{

               $data = ["nombre"=>'',"nombre_comercial"=>'','calle'=>'','cp'=>'','ciudad'=>'','estado'=>'','id_cliente'=>'','costo'=>'','fecha'=>'','direccion'=>'','tipo_prueba'=>''];
           }
                
                $pdf = PDF::loadView('ordenes_servicio.pdf.pdf-os-psico', ["datos_psico"=>$psicodatos]);
                $pdf->setPaper('letter', 'portrait');
                return $pdf->download('psicometrico.pdf');
    }
}
