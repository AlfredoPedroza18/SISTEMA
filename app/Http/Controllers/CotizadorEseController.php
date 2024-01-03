<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\CotizadorESE;
use App\Cotizacion;
use PDF;
use App\Cliente;

/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */

class CotizadorEseController extends Controller
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
          $id_cn_actual         = Cliente::cnActual( $request->id_cliente, $request->user()->idcn  );       
        

          $cotizacion=Cotizacion::create($request->all());
          $cotizacion->id_cn      = $id_cn_actual;
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

     public function visualizaCostoNormal(Request $request)
     {
       $idcliente    = $request->idcliente;
       $tipo_estudio = $request->idservicio;
       $prioridad  = $request->idprioridad;



       $query=" SELECT * 
                FROM prioridad_tipo_servicio
                WHERE id_prioridad = ? AND id_tipo_servicio = ?
                ORDER BY fecha DESC LIMIT 1";
             // return $query;
        $ese = DB::select($query,[$prioridad, $tipo_estudio]);  

        

        if($ese){
           return response()->json(['status_alta'=>'success','costo'=>$ese[0]->precio]);          
        }

        return response()->json(['status_alta'=>'success','costo'=>0]);
    }

     public function visualizaCostoUrgente(Request $request)
     {
        
       $tipo_estudio=$request->idservicio;
       
       $query="SELECT * ".
              " FROM crm_tc_cotizador_ese_costo_urgente".
              " WHERE id_servicio_ese = ? ORDER BY fecha DESC LIMIT 1";
             // return $query;
        $ese= DB::select($query,[$tipo_estudio]); 

        

          if($ese)
             return response()->json(['status_alta'=>'success','costo'=>$ese[0]->costo]);
          }
           

     public function visualizaCostoReferenciaLaborales(Request $request)
     {
        $num_estudio_ese=$request->num_estudio_ese;
      
        $query= " SELECT * ".
                " FROM crm_tc_cotizador_ese_costo_servicio".
                " WHERE ? BETWEEN inicio and fin ";
             // return $query;
        $ese= DB::select($query,[$num_estudio_ese]);  
    
      
     if($ese)
       return response()->json(['status_alta'=>'success','costo'=>$ese[0]->costo]);

     }
      
      public function downloadCotizacionEse($id){

    $query='SELECT crm_cotizaciones.fecha_cotizacion,'.
          'clientes.nombre,'.
          'clientes.nombre_comercial,'.
          'clientes.df_calle,'.
          'clientes.df_cp,'.
          'clientes.df_ciudad,'.
          'clientes.df_estado,'.
          'clientes.id,'.
          'CONCAT(users.name," ",users.apellido_paterno," ",users.apellido_materno) as name,'.
          'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_con, '.
          'DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
          'CONCAT("Estado: ", clientes.df_estado," Municipio: ",'.
                        'clientes.df_municipio," CP: ", '.
                        'clientes.df_cp," Colonia: ", '.
                        'clientes.df_colonia," Calle: ", '.
                        'clientes.df_calle," No Ext: ", '.
                        'clientes.df_num_interior," No Int: ", '.
                        'clientes.df_num_exterior) AS direccion ,'.
                        'crm_tc_cotizador_ese_costos.tipo_estudio,'.
  'CASE crm_cotizaciones_ese .prioridad '.
              'WHEN 1 THEN "Normal (3 a 5 dias)" '.
              'WHEN 2 THEN "Urgentes (menos de 3 dias)" END AS prioridad ,'.
  'crm_cotizaciones_ese .cantidad as cantidad,'.
  'crm_cotizaciones_ese .costo as costo_ese,'.
              'crm_cotizaciones_ese .subtotal as subtotal_ese,'.
              'crm_cotizaciones_ese .iva as iva_ese,'.
              'crm_cotizaciones_ese .total as total_ese,'.
              'crm_cotizaciones.subtotal as subtotal_cotizacion,'.
              'crm_cotizaciones.iva  as iva_cotizacion,'.
              'crm_cotizaciones.total  as total_cotizacion,'.
              'estados.nombre_estado  as estado '.
      'FROM crm_cotizaciones_ese '.
      'LEFT JOIN crm_cotizaciones ON  crm_cotizaciones_ese.id_cotizacion=crm_cotizaciones.id '.
      'left join clientes ON crm_cotizaciones.id_cliente=clientes.id '.
      'left join centros_negocio ON crm_cotizaciones.id_cn=centros_negocio.id '.
      'left join crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id '.
      'left join crm_tc_cotizador_ese_costos ON crm_tc_cotizador_ese_costos.id_servicio_ese=crm_cotizaciones_ese.id_tipo_estudio '.
      'left join estados ON estados.id=crm_cotizaciones_ese.estado '.
      'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
      'LEFT JOIN users ON  crm_cotizaciones.id_usuario=users.id '.
      'where crm_cotizaciones_ese.id_cotizacion=? ';

 
       $esedatos_query =  DB::select($query,[$id]);

     
/*
        if($esedatos){
            $nombre=$esedatos[0]->nombre;
            $nombre_comercial=$esedatos[0]->nombre_comercial;
            $calle=$esedatos[0]->df_calle;
            $cp=$esedatos[0]->df_cp;
            $ciudad=$esedatos[0]->df_ciudad;
            $estado=$esedatos[0]->df_estado;
            $id_cliente=$esedatos[0]->id;
            $costo=$esedatos[0]->costo;
            $fecha=$esedatos[0]->fecha_cotizacion;
            $direccion=$esedatos[0]->direccion;
            $data = ["nombre"=>$nombre,"nombre_comercial"=>$nombre_comercial,'calle'=>$calle,'cp'=>$cp,'ciudad'=>$ciudad,'estado'=>$estado,'id_cliente'=>$id_cliente,'costo'=>$costo,'fecha_cotizacion'=>$fecha,'direccion'=>$direccion];
        }else{

<<<<<<< .mine
       $data = ["nombre"=>'',"nombre_comercial"=>'','calle'=>'','cp'=>'','ciudad'=>'','estado'=>'','id_cliente'=>'','costo'=>''];
   }
       */       


        
        $pdf = PDF::loadView('crm.cotizador.pdf_cotizaciones.pdf-ese',["datos_ese"=>$esedatos_query]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('ese.pdf');
        
    }

    public function listaEstado()
    {
        $query_estados = 'SELECT id, nombre_estado FROM estados';

        $result = DB::select($query_estados);

        return response()->json($result);


    }

    public function listaTipoServicio(Request $request)
    {
          $tipo_servicio = $request->tipo_servicio;

          $query  = 'SELECT DISTINCT id_servicio_ese,tipo_estudio FROM crm_tc_cotizador_ese_costos ';

          if($tipo_servicio != 0 ) $query .= 'WHERE id_servicio_ese = '.$tipo_servicio;
          
          $result = DB::select($query);

        return response()->json($result);


    }
}
