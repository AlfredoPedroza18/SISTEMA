<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cotizacion;
use DB;
use App\CotizacionMaquila;

use PDF;

use App\Cliente;

/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */

class CotizadorMaquilaController extends Controller
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
            
            $paquetes=DB::table('catalogo_paquetes_maquila')->get();
            $paquetes_select=['-1'=>'Seleccione una paquete...'];
            foreach ($paquetes as  $paquete) {
                $paquetes_select[$paquete->id_maquila]=$paquete->nombre;
            }
            $listaPrecios=$this->listaConfigMaquila();

            $catalogoPaquetes=DB::table('catalogo_paquetes_maquila')->get();
          
         
return view("administrador.servicios.maquila.index",["paquetes"=>$paquetes_select,"listaPrecios"=>$listaPrecios,"catalogoPaquetes"=>$catalogoPaquetes]);
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
        $id_cn_actual       = Cliente::cnActual( $request->id_cliente, $request->user()->idcn  );  
               

        $cotizacion             = Cotizacion::create($request->all());
        $cotizacion->id_cn      = $id_cn_actual;
        $cotizacion->id_usuario = $request->user()->id;
        $cotizacion->save();


        for($i=0; $i < $num_partidas; $i++){
            $cotizacionMaquila = new CotizacionMaquila;
            $cotizacionMaquila->id_cotizacion   = $cotizacion->id;
            $cotizacionMaquila->id_paquete      = $arr_paquetes[$i];
            $cotizacionMaquila->num_empleados   = $arr_empleados[$i];
            $cotizacionMaquila->costo_unitario  = $arr_costo_unitario[$i];
            $cotizacionMaquila->subtotal        = $arr_sub_total[$i];
            $cotizacionMaquila->iva             = $arr_sub_total[$i] * 0.16;
            $cotizacionMaquila->total           = $arr_sub_total[$i] * 1.16;
            $cotizacionMaquila->save();

        }



    
        if($cotizacionMaquila && $cotizacion){
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','cotizador')->get();
           $id_SubModulo=SubModulo::where('slug','cotizador.maquila')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$cotizacion->id,
            'descripcion'=>'Se genero cotizacion de Maquila con ID:'.$cotizacion->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($cotizacion->total, 2, ',', ' ')
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


    public function cotizacionMaquila(Request $request){
        $tipo_paquete = $request->paquete;
        $cantidad     = $request->num_empleados;
        $costo        = 0.00;
        $subtotal     = 0.00;
        

        
        
        $query = 'SELECT '.
                    'catalogo_paquetes_maquila.id,'.
                    'catalogo_paquetes_maquila.nombre,'.
                    'paquetes_maquila_precios.id_paquete,'.
                    'paquetes_maquila_precios.inicio,'.
                    'paquetes_maquila_precios.fin,'.
                    'paquetes_maquila_precios.precio,'.
                    'paquetes_maquila_precios.fecha_alta '.
                'FROM catalogo_paquetes_maquila '.
                'LEFT JOIN paquetes_maquila_precios ON paquetes_maquila_precios.id_paquete = catalogo_paquetes_maquila.id '.
                'WHERE paquetes_maquila_precios.id_paquete = ? '.
                '       AND ? BETWEEN paquetes_maquila_precios.inicio AND paquetes_maquila_precios.fin '.
                'ORDER BY paquetes_maquila_precios.fecha_alta DESC LIMIT 1';
       
        $result   = DB::select($query,[$tipo_paquete,$cantidad]);
        if($result){
            $costo    = $result[0]->precio;
            $subtotal = $costo * $cantidad;
        } 

        return response()->json(['costo' => $costo,'sub_total' => $subtotal]);
    }

    public function pdfCotizacionMaquila(){


        return view('crm.cotizador.pdf_cotizaciones.pdf-maquila');
    }

   

    public function downloadCotizacionMaquila($id){
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
                       ' crm_cotizaciones_maquila.total, '.
                       'DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
                       ' CONCAT("Estado: ", clientes.df_estado," Municipio: ", '.         
                       '            clientes.df_municipio," CP: ", '.
                       '            clientes.df_cp," Colonia: ", '.
                       '            clientes.df_colonia," Calle: ", '.
                       '            clientes.df_calle," No Ext: ", '.
                       '            clientes.df_num_interior," No Int: ", '.
                       '            clientes.df_num_exterior) AS direccion,'.
                        'crm_tc_servicioscotizador.servicio,'.
                        'crm_cotizaciones_maquila .num_empleados,'.
                        'crm_cotizaciones_maquila .costo_unitario,'.
                        'crm_cotizaciones_maquila .subtotal as subtotal_maquila,'.
                        'crm_cotizaciones_maquila .iva as iva_maquila,'.
                        'crm_cotizaciones.subtotal as subtotal_cotizacion,'.
                        'crm_cotizaciones.iva  as iva_cotizacion,'.
                        'crm_cotizaciones.total  as total_cotizacion,'.
                        'crm_cotizaciones.id as id_cotizacion,'.
                        'catalogo_paquetes_maquila.nombre as servicio_maquila'.
                ' FROM crm_cotizaciones_maquila '.
                ' LEFT JOIN crm_cotizaciones ON crm_cotizaciones_maquila.id_cotizacion=crm_cotizaciones.id '.
                ' LEFT JOIN clientes         ON crm_cotizaciones.id_cliente=clientes.id '.
                ' LEFT JOIN centros_negocio  ON crm_cotizaciones.id_cn=centros_negocio.id '.
                ' LEFT JOIN crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id '.
                ' LEFT JOIN catalogo_paquetes_maquila ON catalogo_paquetes_maquila.id=crm_cotizaciones_maquila.id_paquete '.
                'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
                'LEFT JOIN users ON  crm_cotizaciones.id_usuario=users.id '.
                ' WHERE crm_cotizaciones.id = ? ';

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



        $pdf = PDF::loadView('crm.cotizador.pdf_cotizaciones.pdf-maquila',["datos_maquila"=>$datos_maquila]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('maquila.pdf');
    }

    public function AltConfiguracionPreciosMaquila (Request $request){

        dd($request->all());


    }

    public function listaConfigMaquila(){

        $query = 'SELECT '.
        'catalogo_paquetes_maquila.nombre,'.
                    'catalogo_paquetes_maquila.id,'.
                    'paquetes_maquila_precios.id as idp,'.
                    'paquetes_maquila_precios.id_paquete,'.
                    'paquetes_maquila_precios.inicio,'.
                    'paquetes_maquila_precios.fin,'.
                    'paquetes_maquila_precios.precio,'.
                    'paquetes_maquila_precios.fecha_alta '.
                'FROM catalogo_paquetes_maquila '.
                'LEFT JOIN paquetes_maquila_precios ON paquetes_maquila_precios.id_paquete = catalogo_paquetes_maquila.id '.
                'ORDER BY paquetes_maquila_precios.fecha_alta DESC,catalogo_paquetes_maquila.nombre ASC  ';
       
        $result   = DB::select($query);

        return $result;
    

    
        }
        public function editarConfiguracion(Request $request){

             $query = 'SELECT '.
             'catalogo_paquetes_maquila.nombre,'.
                    'catalogo_paquetes_maquila.id,'.
                    'catalogo_paquetes_maquila.descripcion,'.
                    'paquetes_maquila_precios.id as idp,'.
                    'paquetes_maquila_precios.id_paquete,'.
                    'paquetes_maquila_precios.inicio,'.
                    'paquetes_maquila_precios.fin,'.
                    'paquetes_maquila_precios.precio,'.
                    'paquetes_maquila_precios.fecha_alta '.
                'FROM catalogo_paquetes_maquila '.
                'LEFT JOIN paquetes_maquila_precios ON paquetes_maquila_precios.id_paquete = catalogo_paquetes_maquila.id '.
                'where paquetes_maquila_precios.id='.$request->id.
                ' ORDER BY paquetes_maquila_precios.fecha_alta DESC,catalogo_paquetes_maquila.nombre ASC  ';
       
         $confPrecioMaquila   = DB::select($query);
         
         return response()->json(["datos"=>$confPrecioMaquila]);

        }
        public function MostrarPaquetes(Request $request){
             $query = 'SELECT '.
             'catalogo_paquetes_maquila.nombre,'.
                    'catalogo_paquetes_maquila.id,'.
                    'catalogo_paquetes_maquila.descripcion,'.
                    'paquetes_maquila_precios.id as idp,'.
                    'paquetes_maquila_precios.id_paquete,'.
                    'paquetes_maquila_precios.inicio,'.
                    'paquetes_maquila_precios.fin,'.
                    'paquetes_maquila_precios.precio,'.
                    'paquetes_maquila_precios.fecha_alta '.
                'FROM catalogo_paquetes_maquila '.
                'LEFT JOIN paquetes_maquila_precios ON paquetes_maquila_precios.id_paquete = catalogo_paquetes_maquila.id '.
                'where paquetes_maquila_precios.id_paquete='.$request->id.
                ' ORDER BY paquetes_maquila_precios.fecha_alta DESC,catalogo_paquetes_maquila.nombre ASC';
       
         $MostrarPaquete   = DB::select($query);
      
         return response()->json(["datos"=>$MostrarPaquete]);

        }

        public function ConfiguracionCostoMaquila(Request $request){
           
            if(!empty($request->descripcion)){
            $descripcion=str_replace("\r\n"," " ,$request->descripcion);
            $guardarCambiosDes=DB::table('catalogo_paquetes_maquila')
            ->where("id_maquila",$request->id_paquete)
            ->update([
                    'descripcion'=>$descripcion
                ]);

          
        }
            $guardarCambios=DB::table('paquetes_maquila_precios')->insert([
                 'id_paquete'=>$request->id_paquete,
                 'id_usuario'=>$request->id_usuario,
                 'inicio'=>$request->inicio,
                 'fin'=>$request->fin,
                 'precio'=>$request->precio

                ]);

           

           if($guardarCambios){
           $id_modulo=Modulo::where('slug','cotizadores')->get();
           $id_SubModulo=SubModulo::where('slug','cotizadores.maquila')->get();
           $id_accion=Accion::where('slug','modificacion')->get();
           $latestid = DB::table('paquetes_maquila_precios')->select('id')->orderBy('id', 'DESC')->first();
      
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$latestid->id,
            'descripcion'=>'Se Modifico el costo del paquete '.$request->nombre_paquete.' con un rango de empeados de '.$request->inicio." a ".$request->fin.' con un Costo de: $'.number_format($request->precio, 2, ',', ' ')
            ]);
            $Kardex->save();

            return response()->json(["status_alta"=>"success"]);
        }
           else{
            return response()->json(["status_alta"=>"wrong"]);
        }
    }


 public function ConfiguracionCostoMaquilaAlta(Request $request){

          $inicio_empleado     = $request->inicio;
          $fin_empleado        = $request->fin;


         $queryNombre="SELECT * FROM catalogo_paquetes_maquila where nombre=?";
         $resultNombre   = DB::select($queryNombre,[$request->nombre]);
     

         $id_paquete="";
         if($resultNombre){

         $id_paquete=$resultNombre[0]->id_maquila;
           $query = 'SELECT '.
                    'catalogo_paquetes_maquila.id,'.
                    'catalogo_paquetes_maquila.nombre,'.
                    'paquetes_maquila_precios.id_paquete,'.
                    'paquetes_maquila_precios.inicio,'.
                    'paquetes_maquila_precios.fin,'.
                    'paquetes_maquila_precios.precio,'.
                    'paquetes_maquila_precios.fecha_alta '.
                'FROM catalogo_paquetes_maquila '.
                'LEFT JOIN paquetes_maquila_precios ON paquetes_maquila_precios.id_paquete = catalogo_paquetes_maquila.id '.
                'WHERE (paquetes_maquila_precios.inicio<=? and paquetes_maquila_precios.fin>=? )'.
                'AND  catalogo_paquetes_maquila.id=? '.
                'ORDER BY paquetes_maquila_precios.fecha_alta DESC LIMIT 1';
         $result   = DB::select($query,[$request->inicio,$request->inicio,$id_paquete]);
        
   

         if($result){
            return response()->json(["status_alta"=>"existe","nombre"=>$result[0]->nombre,'inicio'=>$result[0]->inicio,'fin'=>$result[0]->fin]);

         }else{
           
            $guardarCambios=DB::table('paquetes_maquila_precios')->insert([
                 'id_paquete'=>$id_paquete,
                 'id_usuario'=>$request->id_usuario,
                 'inicio'=>$request->inicio,
                 'fin'=>$request->fin,
                 'precio'=>$request->precio

                ]);
           if($guardarCambios){

           $id_modulo=Modulo::where('slug','cotizadores')->get();
           $id_SubModulo=SubModulo::where('slug','cotizadores.maquila')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $latestid = DB::table('paquetes_maquila_precios')->select('id')->orderBy('id', 'DESC')->first();
      
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$latestid->id,
            'descripcion'=>'Se dio de alta un nuevo rango  de '.$request->inicio." a ".$request->fin .'empleados, del paquete '.$request->nombre.' con un Costo de: $'.number_format($request->precio, 2, ',', ' ')
            ]);
            $Kardex->save();
            return response()->json(["status_alta"=>"success"]);
             }
           else
            return response()->json(["status_alta"=>"wrong"]);
         }
     }//end validacion
         else{
            /* saca el ultimo id_paquete  de maquila -- */

          $latestUser = DB::table('catalogo_paquetes_maquila')->select('id_maquila')->orderBy('id_maquila', 'DESC')->first();
         $idpaque=(intval($latestUser->id_maquila)+1);
       
           /* end saca el ultimo id_paquete  de maquila -- */
        
            $paquete=DB::table('catalogo_paquetes_maquila')->insert([
                 "id_maquila"=>$idpaque,
                 "id_usuario"=>$request->id_usuario,
                 "nombre"=>$request->nombre,
                 "descripcion"=>trim($request->descripcion)
                ]);
            $guardarCambios=DB::table('paquetes_maquila_precios')->insert([
                 'id_paquete'=>$idpaque,
                 'id_usuario'=>$request->id_usuario,
                 'inicio'=>$request->inicio,
                 'fin'=>$request->fin,
                 'precio'=>$request->precio

                ]);

           if($guardarCambios && $paquete){
            $id_modulo=Modulo::where('slug','cotizadores')->get();
           $id_SubModulo=SubModulo::where('slug','cotizadores.maquila')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $latestid = DB::table('paquetes_maquila_precios')->select('id')->orderBy('id', 'DESC')->first();
      
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$latestid->id,
            'descripcion'=>'Se dio de Alta el  paquete '.$request->nombre.' con un rango de empeados de '.$request->inicio." a ".$request->fin.' con un Costo de: $'.number_format($request->precio, 2, ',', ' ')
            ]);
            $Kardex->save();
            return response()->json(["status_alta"=>"success"]);
           }else{
            return response()->json(["status_alta"=>"wrong"]);
           }



            
        }
    }

        
        
       
}
