<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CotizadorPsicometricoCatalogo;
use App\Cotizacion;

use DB;
use PDF;

use App\Cliente;
use App\PruebaPsicometrica;

/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */

class CotizadorPsicometricoController extends Controller
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
            $pruebas=DB::table('crm_tc_cotizador_psicometrico_costo_servicio')->get();
            $pruebas_select=['-1'=>'Seleccione una paquete...'];
            foreach ($pruebas as  $prueba) {
                $pruebas_select[$prueba->idtipo]=$prueba->prueba;
            }
            $listaPruebas=$this->listaConfigPsicometrico();
        return view("administrador.servicios.psicometricos.index",["pruebas"=>$pruebas_select]);
        
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
        $cotizacion_psico = null;
        $cotizacion       = null;

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
               

        $cotizacion             = Cotizacion::create($request->all());
        $cotizacion->id_cn      = $id_cn_actual;
        $cotizacion->id_usuario = $request->user()->id;
        $cotizacion->save();


        for($i=0; $i < $num_partidas; $i++){
            $cotizacion_psico = new CotizadorPsicometricoCatalogo;
            
            $cotizacion_psico->id_cotizacion    = $cotizacion->id;
            $cotizacion_psico->tipo_prueba      = $arr_pruebas[$i];
            $cotizacion_psico->pruebas          = $arr_pruebas_select[$i];
            $cotizacion_psico->cantidad         = $arr_cantidad_partida[$i];
            $cotizacion_psico->costo_unitario   = $arr_subtotal[$i];
            $cotizacion_psico->iva              = $arr_iva[$i];
            $cotizacion_psico->total            = $arr_total_partida[$i];
            $cotizacion_psico->save();            

        }   

        if($cotizacion_psico and $cotizacion){
           $cliente=Cliente::where('id',$request->id_cliente)->get();
           $id_modulo=Modulo::where('slug','cotizador')->get();
           $id_SubModulo=SubModulo::where('slug','cotizador.psicometrico')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$cotizacion->id,
            'descripcion'=>'Se genero cotizacion de Pruebas Psicometricas con ID:'.$cotizacion->id.' al Cliente '.$cliente[0]->nombre_comercial.' con un Monto de: $'.number_format($cotizacion->total, 2, ',', ' ')
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
    public function listaCatalogoServicios(Request $request){

        $query="SELECT * ".
               "FROM crm_tc_cotizador_catalogo_psicometrico ";


        $listaCatalogo=DB::select($query);

        if($listaCatalogo)
        return response()->JSON($listaCatalogo);
        else
        return respopnse()->JSON(['status_error'=>'wong']);
      
    }
    public function visualizaCostoPsico(Request $request)
     {
      
       $prueba_psicometrico=$request->prueba_psicometrico;
       $query="SELECT ".
              "* ".
              " FROM crm_tc_cotizador_psicometrico_costo_servicio".
              " WHERE idtipo=? ORDER BY fecha DESC";
             // return $query;
        $psico= DB::select($query,[$prueba_psicometrico]);  
     if($psico)
       return response()->json(['status_alta'=>'success','costo'=>$psico[0]->costo]);
      else
      return response()->json(['status_alta'=>'wrong']);
     }
     public function downloadCotizacionPsico($id){
        $query='SELECT crm_cotizaciones.fecha_cotizacion,'.
                    'crm_cotizaciones_psicometrico.tipo_prueba AS identificador_prueba,'.  
                    'crm_tc_cotizador_psicometrico_costo_servicio.prueba,'.                  
                    'crm_cotizaciones_psicometrico.pruebas,'.
                    'clientes.nombre,'.
                    'clientes.nombre_comercial,'.
                    'clientes.df_calle,'.
                    'clientes.df_cp,'.
                    'clientes.df_ciudad,'.
                    'clientes.df_estado,'.
                    'clientes.id,'.
                    'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_con, '.
                    'users.name ,'.
                    ' catalogo_paquetes.prueba AS tipo_prueba, '.                    
                    /*
                    'CASE crm_cotizaciones_psicometrico.tipo_prueba '.
                    'WHEN  1 THEN "1 Prueba psicometrica" '.
                    'WHEN 2 THEN "1 bateria de pruebas Psicometricas (que incluye 4 pruebas)" '.
                    'WHEN 3 THEN "Prueba MIDOT" '.
                    'WHEN 4 THEN "Otras" END AS tipo_prueba,'.
                    */


                    'crm_cotizaciones_psicometrico.costo_unitario,'.
                    'crm_cotizaciones_psicometrico.cantidad,'.
                    'crm_cotizaciones_psicometrico.iva,'.
                    'crm_cotizaciones_psicometrico.total,'.
                    'crm_cotizaciones.subtotal as subtotal_cotizacion,'.
                    'crm_cotizaciones.iva as iva_cotizacion,'.
                    'crm_cotizaciones.total as total_cotizacion,'.
                    'DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,\'%Y-%m-%d\') AS fecha_cotizacion, '.
                    'CONCAT("Estado: ", clientes.df_estado," Municipio: ",'.         
                                   'clientes.df_municipio," CP: ",'. 
                                   'clientes.df_cp," Colonia: ",'. 
                                   'clientes.df_colonia," Calle: ",'. 
                                   'clientes.df_calle," No Ext: ",'. 
                                   'clientes.df_num_interior," No Int: ", '.
                                   'clientes.df_num_exterior) AS direccion'.
                 ' FROM crm_cotizaciones_psicometrico '.
                 'LEFT JOIN crm_cotizaciones ON  crm_cotizaciones_psicometrico.id_cotizacion=crm_cotizaciones.id '.
                 'left join clientes ON crm_cotizaciones.id_cliente=clientes.id '.
                 'left join centros_negocio ON crm_cotizaciones.id_cn=centros_negocio.id '.
                 'left join crm_tc_servicioscotizador ON .crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id '.
                 'LEFT JOIN contactos ON  clientes.id_contacto_principal=contactos.id '.
                 'LEFT JOIN users ON  crm_cotizaciones.id_usuario=users.id '.
                 'LEFT JOIN crm_tc_cotizador_psicometrico_costo_servicio ON crm_tc_cotizador_psicometrico_costo_servicio.idtipo = crm_cotizaciones_psicometrico.tipo_prueba '.
                 'LEFT JOIN ( '.
                 '   SELECT * FROM crm_tc_cotizador_psicometrico_costo_servicio '.
                 ' ) AS catalogo_paquetes ON catalogo_paquetes.idtipo = crm_cotizaciones_psicometrico.tipo_prueba '.
                 'where crm_cotizaciones_psicometrico.id_cotizacion=?';


         $psicodatos =  DB::select($query,[$id]);

         
         
         $lista_tipo_pruebas = $this->getTipoPruebas($psicodatos);

         $detallePruebas     = $this->getDetalleTipoPrueba( $lista_tipo_pruebas );

         

         



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
        
        $pdf = PDF::loadView('crm.cotizador.pdf_cotizaciones.pdf-psico', ["datos_psico"=>$psicodatos,'detalle_estudio' => $detallePruebas]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('psicometrico.pdf');
    }

      public function listaConfigPsicometrico(){

        $query = 'SELECT '.
        '* FROM crm_tc_cotizador_psicometrico_costo_servicio';
       
        $result   = DB::select($query);
      
         return response()->json(["datos"=>$result]);
        }

        public function editPrueba(Request $request){

         
       $pruebaEdit = DB::table("crm_tc_cotizador_psicometrico_costo_servicio")->where('idtipo',$request->id)->get();
    
        return response()->json(["datos"=>$pruebaEdit]);
              }

public function ConfiguracionCostoPsicometrico(Request $request){
   
$guardarCambios=DB::table('crm_tc_cotizador_psicometrico_costo_servicio')
->where("idtipo",$request->id_paquete)
->update([
        'prueba'=>$request->prueba,
        'costo'=>$request->precio

    ]);
           if($guardarCambios){

           $id_modulo=Modulo::where('slug','cotizadores')->get();
           $id_SubModulo=SubModulo::where('slug','cotizadores.psicometrico')->get();
           $id_accion=Accion::where('slug','modificacion')->get();
          
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$request->id,
            'descripcion'=>'Se Modifico el costo de la prueba: '.$request->prueba.' con un Costo de: $'.number_format($request->precio, 2, ',', ' ')
            ]);
            $Kardex->save();
            return response()->json(["status_alta"=>"success"]);
           }else{
            return response()->json(["status_alta"=>"wrong"]);
           }
        
    }
    public function AltaPaquetePsicometrico(Request $request){

         $validaPaquete=DB::table("crm_tc_cotizador_psicometrico_costo_servicio")->where('prueba',$request->prueba)->get();
         if($validaPaquete){ //VALIDA NOMBRE DE PAQUETE
            return response()->json(["status_alta"=>"existe_nombre"]);

         }else{
          $latestUser = DB::table('crm_tc_cotizador_psicometrico_costo_servicio')->select('idtipo')->orderBy('idtipo', 'DESC')->first();
          $idpaque=(intval($latestUser->idtipo)+1);//ingresa e ultimo idtipo mas uno
          $guardarCambios=DB::table('crm_tc_cotizador_psicometrico_costo_servicio')->insert([
                 'idtipo'=>$idpaque,
                 'prueba'=>$request->prueba,
                 'costo'=>$request->precio,
                 'id_usuario'=>$request->id_usuario,
                 

                ]);

           if($guardarCambios){
           $id_modulo=Modulo::where('slug','cotizadores')->get();
           $id_SubModulo=SubModulo::where('slug','cotizadores.psicometrico')->get();
           $id_accion=Accion::where('slug','alta')->get();

           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$idpaque,
            'descripcion'=>'Se dio de Alta la prueba: '.$request->prueba.' con un Costo de: $'.number_format($request->precio, 2, ',', ' ')
            ]);
            $Kardex->save();

            return response()->json(["status_alta"=>"success"]);
           }else{
            return response()->json(["status_alta"=>"wrong"]);
           }
       }//end else validacion de nombre de paquete
    }

    private function getTipoPruebas($data)
    {
        $array_tipo_pruebas = [];
        foreach( $data as $tipo_prueba)
        {            

            $array_tipo_pruebas[] = [
                                        'id_tipo'           => $tipo_prueba->identificador_prueba,
                                        'nombre_tipo'       => $tipo_prueba->prueba,
                                        'tipos_pruebas'     =>  explode("-", $tipo_prueba->pruebas),
                                        'detalle'           => []                                     
                                    ];            
        }

        return $array_tipo_pruebas;
    }

    private function getDetalleTipoPrueba( $pruebas )
    {

        
        $size = count( $pruebas );
        $pruebas; 
        //foreach ($pruebas as $prueba)
        for( $i=0; $i < $size; $i++ ) 
        {
            $size2 = count( $pruebas[$i]['tipos_pruebas'] );           
            
            for($j = 0; $j < $size2; $j++)
            {

                $pruebas[$i]['detalle'] = $pruebaDetalle = PruebaPsicometrica::find( $pruebas[$i]['tipos_pruebas'] );    
            
            }            
        }

        return $pruebas;
    }


}
