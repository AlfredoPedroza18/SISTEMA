<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cotizacion;
use App\CotizacionRYS;
use PDF;
use DB;
use Carbon\Carbon;

use App\Cliente;

/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */

class CotizadorRYSController extends Controller
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
        $lista_num_vacantes     = $request->lista_num_vacantes; 
        $lista_puesto           = $request->lista_puesto; 
        $lista_sueldo_mensual   = $request->lista_sueldo_mensual; 
        $lista_porcentaje       = $request->lista_porcentaje; 
        $lista_total_partida    = $request->lista_total_partida; 

        $arr_num_vacantes   = explode(',',$lista_num_vacantes);
        $arr_puesto         = explode(',',$lista_puesto);
        $arr_sueldo_mensual = explode(',',$lista_sueldo_mensual);
        $arr_porcentaje     = explode(',',$lista_porcentaje);
        $arr_total_partida  = explode(',',$lista_total_partida);
        $num_partidas       = count($arr_total_partida);
        $id_cn_actual       = Cliente::cnActual( $request->id_cliente, $request->user()->idcn  );  

        

        $cotizacion             = Cotizacion::create($request->all());
        $cotizacion->id_cn      = $id_cn_actual;
        $cotizacion->id_usuario = $request->user()->id;
        $cotizacion->save();

        for($i=0; $i < $num_partidas; $i++){
            $cotizacion_rys = new CotizacionRYS;


            $cotizacion_rys->id_cotizacion          = $cotizacion->id;
            $cotizacion_rys->cantidad_vacantes      = $arr_num_vacantes[$i];
            $cotizacion_rys->puesto_requerido       = $arr_puesto[$i];
            $cotizacion_rys->sueldo_mensual         = $arr_sueldo_mensual[$i];
            $cotizacion_rys->porcentaje             = $arr_porcentaje[$i];
            $cotizacion_rys->propuesta_economica    = $arr_total_partida[$i];
            $cotizacion_rys->iva                    = $arr_total_partida[$i] * 0.16;
            $cotizacion_rys->total                  = $arr_total_partida[$i] * 1.16;    
            $cotizacion_rys->garantia_rys           = $request->garantia_rys;        
            $cotizacion_rys->save();
                            
        }

        if($cotizacion_rys and $cotizacion){
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','cotizador')->get();
           $id_SubModulo=SubModulo::where('slug','cotizador.rys')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$cotizacion->id,
            'descripcion'=>'Se genero cotizacion de RYS con ID:'.$cotizacion->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($cotizacion->total, 2, ',', ' ')
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

    public function downloadCotizacionRYS($id){
        $data = [   
                        'nombre'            => '',
                        'nombre_comercial'  => '',
                        'calle'             => '',
                        'cp'                => '',
                        'ciudad'            => '',
                        'estado'            => '',
                        'id_cliente'        => '',
                        'costo'             => '',
                        'fecha'             => '',
                        'direccion'         => ''   
                    ];

        $query=' SELECT  crm_cotizaciones.fecha_cotizacion, '.
                       ' clientes.nombre, '.
                       ' clientes.nombre_comercial, '.
                       ' clientes.df_calle, '.
                       ' clientes.df_cp, '.
                       ' clientes.df_ciudad, '.
                       ' clientes.df_estado, '.
                       ' clientes.id, '.
                        'CONCAT(users.name," ",users.apellido_paterno," ",users.apellido_materno) as name,'.
                       'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_con, '.
                        'crm_cotizaciones_rys.puesto_requerido, '.
                        'crm_cotizaciones_rys.cantidad_vacantes, '.
                        'crm_cotizaciones_rys.sueldo_mensual, '.
                        'crm_cotizaciones_rys.propuesta_economica,'.
                        'crm_cotizaciones_rys.iva,'.
                        'crm_cotizaciones_rys.total, '.
                        'crm_cotizaciones_rys.garantia_rys, '.
                        'crm_cotizaciones.subtotal as subtotal_cotizacion,'.
                        'crm_cotizaciones.iva  as iva_cotizacion,'.
                        'crm_cotizaciones.total  as total_cotizacion,'.
                       ' crm_cotizaciones_rys.total, '.                       
                       'DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
                       ' CONCAT("Estado: ", clientes.df_estado," Municipio: ", '.         
                       '            clientes.df_municipio," CP: ", '.
                       '            clientes.df_cp," Colonia: ", '.
                       '            clientes.df_colonia," Calle: ", '.
                       '            clientes.df_calle," No Ext: ", '.
                       '            clientes.df_num_interior," No Int: ", '.
                       '            clientes.df_num_exterior) AS direccion '.
                ' FROM crm_cotizaciones_rys '.
                ' LEFT JOIN crm_cotizaciones ON crm_cotizaciones_rys.id_cotizacion=crm_cotizaciones.id '.
                ' LEFT JOIN clientes         ON crm_cotizaciones.id_cliente=clientes.id '.
                ' LEFT JOIN centros_negocio  ON crm_cotizaciones.id_cn=centros_negocio.id '.
                ' LEFT JOIN crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id '.
                'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
                'LEFT JOIN users ON  crm_cotizaciones.id_usuario=users.id '.
                ' WHERE crm_cotizaciones.id = ?';
        
        $datos_rys =  DB::select($query,[$id]);
        if($datos_rys){

            $nombre             = $datos_rys[0]->nombre;
            $nombre_comercial   = $datos_rys[0]->nombre_comercial;
            $calle              = $datos_rys[0]->df_calle;
            $cp                 = $datos_rys[0]->df_cp;
            $ciudad             = $datos_rys[0]->df_ciudad;
            $estado             = $datos_rys[0]->df_estado;
            $id_cliente         = $datos_rys[0]->id;
            $costo              = $datos_rys[0]->total;
            $fecha              = $datos_rys[0]->fecha_cotizacion;
            $direccion          = $datos_rys[0]->direccion;

            $data = [   
                        'nombre'            => $nombre,
                        'nombre_comercial'  => $nombre_comercial,
                        'calle'             => $calle,
                        'cp'                => $cp,
                        'ciudad'            => $ciudad,
                        'estado'            => $estado,
                        'id_cliente'        => $id_cliente,
                        'costo'             => $costo,
                        'fecha'             => $fecha,
                        'direccion'         => $direccion
                    ]; 
            
        }

       // dd($datos_rys);

        $pdf = PDF::loadView('crm.cotizador.pdf_cotizaciones.pdf-rys', ["datos_rys"=>$datos_rys]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('reclutamiento-seleccion.pdf');

    }

}


