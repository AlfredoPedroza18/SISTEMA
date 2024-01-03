<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\OrdenServicioDetalle;
use App\User;
use DB;
/*--------------- KARDEX GENERAL -----------*/
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
/*--------------- KARDEX GENERAL -----------*/
class OrdenServicioDetalleController extends Controller
{
     public function __construct(){
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
        //
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
  
         $update_status_ese_detalle = OrdenServicioDetalle::findOrFail($id);
         $update_status_ese_detalle->id_status=3;// 3 evento de cancelacion de estudio
         $update_status_ese_detalle->fecha_cancelacion=date('Y-m-d H:i:s');
         $update_status_ese_detalle->save();

         $cancelacion=DB::table('ese_cancelacion_ese')->insert([
            'id_os' =>$request->id_os, 
            'id_detalle' =>$request->id,
            'comentario_cancelacion'=>$request->comentario,
            'id_usuario'=>$request->id_usuario
            ]);
         if($update_status_ese_detalle && $cancelacion){


            $modulo         = Modulo::where('slug','ese')->get();
            $submodulo      = SubModulo::where('slug','ese.osdetalle')->get();
            $accion_kardex  = Accion::where('slug','cancelar')->get();

            $detalle_query="SELECT
                        tipos_estudo_ese.nombre,
                        prioridades.nombre as prioridad,
                        estados.nombre_estado
                        FROM estudio_ese_detalle 
                        LEFT JOIN tipos_estudo_ese ON estudio_ese_detalle.id_tipo_estudio=tipos_estudo_ese.id
                        LEFT JOIN prioridades ON estudio_ese_detalle.prioridad=prioridades.id
                        LEFT JOIN estados ON estudio_ese_detalle.estado=estados.id
                        LEFT JOIN ese_status ON estudio_ese_detalle.id_status=ese_status.id
                        WHERE estudio_ese_detalle.id=".$request->id;
                 
            $detalle=DB::select($detalle_query);
          




            $kardex = Kardex::create(["id_cn"         => $request->user()->idcn,
                                      "id_usuario"    => $request->user()->id,
                                      "id_modulo"     => $modulo[0]->id,
                                      "id_submodulo"  => $submodulo[0]->id,
                                      "id_accion"     => $accion_kardex[0]->id,
                                      "id_objeto"     => $update_status_ese_detalle->id,
                            "descripcion"   => "Cancelación de ".$detalle[0]->nombre." con prioridad ".$detalle[0]->prioridad ." de la Orden de Servicio #ESE".$update_status_ese_detalle->id
                                      ]);

            
            return response()->json(["success"=>"ok"]);

         }
         else{
            return response()->json(["success"=>"wrong"]);
         }

         
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

    public function detalleID($id){

       
          
        $detalle_query="SELECT
                        estudio_ese_detalle.id, 
                        estudio_ese_detalle.id_os,
                        estudio_ese_detalle.id_os_ese,
                        estudio_ese_detalle.costo,
                        estudio_ese_detalle.iva,
                        estudio_ese_detalle.total,
                        estudio_ese_detalle.fecha_ingreso,
                        estudio_ese_detalle.fecha_actualizacion,
                        estudio_ese_detalle.fecha_cierre,
                        estudio_ese_detalle.id_status,
                        estudio_ese_detalle.viaticos,
                        crm_tc_cotizador_ese_costos.tipo_estudio AS nombre,
                        prioridades.nombre as prioridad,
                        estados.nombre_estado,
                        ese_status.nombre as estatus
                        FROM estudio_ese_detalle 
                        LEFT JOIN crm_tc_cotizador_ese_costos ON estudio_ese_detalle.id_tipo_estudio=crm_tc_cotizador_ese_costos.id
                        LEFT JOIN prioridades ON estudio_ese_detalle.prioridad=prioridades.id
                        LEFT JOIN estados ON estudio_ese_detalle.estado=estados.id
                        LEFT JOIN ese_status ON estudio_ese_detalle.id_status=ese_status.id
                        WHERE id_os=".$id;
        $detalle=DB::select($detalle_query);

        $ejecutivos           = User::where('tipo','!=','f')->orderBy('name','asc')->get();
        $ejecutivos_foraneos  = User::where('tipo','f')->orderBy('name','asc')->get();

            $resultados= DB::select("SELECT * FROM ese_resultados");
            
            
            

          if($detalle)
          return view("ESE.OS.detalle",['detalle_os'=>$detalle,'ejecutivos' => $ejecutivos,'btn' => 'false',"resultados"=>$resultados, 'ejecutivos_foraneos' => $ejecutivos_foraneos]);
          else
          return view("ESE.OS.detalle",['detalle_os'=>"ERROR AL MOSTRAR EL DETALLE 1.0"]);

    }

    public function cerrarEse(Request $request){


         $id=$request->id;
         $update_status_ese_detalle_cierre = OrdenServicioDetalle::findOrFail($id);
         $update_status_ese_detalle_cierre->id_status=4;// 4 evento de cerrar el estudio
         $update_status_ese_detalle_cierre->fecha_cierre=date('Y-m-d H:i:s');
         $update_status_ese_detalle_cierre->comentarios_cierre=$request->comentario_cierre;
         $update_status_ese_detalle_cierre->resultado_ese=$request->resultado_ese;
         $update_status_ese_detalle_cierre->ejecutivo_cierre=$request->ejecutivo_cierre;
         $update_status_ese_detalle_cierre->save();

           $detalle_query="SELECT
                        tipos_estudo_ese.nombre,
                        prioridades.nombre as prioridad,
                        estados.nombre_estado
                        FROM estudio_ese_detalle 
                        LEFT JOIN tipos_estudo_ese ON estudio_ese_detalle.id_tipo_estudio=tipos_estudo_ese.id
                        LEFT JOIN prioridades ON estudio_ese_detalle.prioridad=prioridades.id
                        LEFT JOIN estados ON estudio_ese_detalle.estado=estados.id
                        LEFT JOIN ese_status ON estudio_ese_detalle.id_status=ese_status.id
                        WHERE estudio_ese_detalle.id=".$request->id;
                 
            $detalle=DB::select($detalle_query);

            if( $update_status_ese_detalle_cierre && $detalle){
            $modulo         = Modulo::where('slug','ese')->get();
            $submodulo      = SubModulo::where('slug','ese.osdetalle')->get();
            $accion_kardex  = Accion::where('slug','cerrar')->get();
            $accion_usuario_cierre = User::where('id',$request->ejecutivo_cierre)->get();

           
            $kardex = Kardex::create(["id_cn"         => $request->user()->idcn,
                                      "id_usuario"    => $request->user()->id,
                                      "id_modulo"     => $modulo[0]->id,
                                      "id_submodulo"  => $submodulo[0]->id,
                                      "id_accion"     => $accion_kardex[0]->id,
                                      "id_objeto"     => $update_status_ese_detalle_cierre->id,
                            "descripcion"   => "Cierre  de ".$detalle[0]->nombre." con prioridad ".$detalle[0]->prioridad ." de la Orden de Servicio #ESE".$update_status_ese_detalle_cierre->id_os.". El estudio fue cerrado por ".$accion_usuario_cierre[0]->name.' '.$accion_usuario_cierre[0]->apellido_paterno.' '.$accion_usuario_cierre[0]->apellido_materno
                                      ]);
            return response()->json(["success"=>"ok"]);

            }

     }

}