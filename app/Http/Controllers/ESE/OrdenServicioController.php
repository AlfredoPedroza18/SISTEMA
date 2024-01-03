<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\OS\OrdenServicio;
/*--------------- KARDEX GENERAL -----------*/
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
/*--------------- KARDEX GENERAL -----------*/
class OrdenServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /* Lista las OS DE ESE la tabla ordenes_servicio*/
      $query='SELECT  ordenes_servicio.id,
                      ordenes_servicio.id_status,
                      ese_status.nombre,
                      clientes.nombre_comercial,
                      CONCAT("(",centros_negocio.nomenclatura,") ",centros_negocio.nombre) AS centro_negocio,
                      FORMAT(ordenes_servicio.total,2) AS total,
                      DATE_FORMAT(ordenes_servicio.fecha_cotizacion,\'%d-%m-%Y\') AS fecha_cotizacion
                  FROM ordenes_servicio
                  LEFT JOIN clientes      ON clientes.id = ordenes_servicio.id_cliente
                  LEFT JOIN centros_negocio ON centros_negocio.id  = ordenes_servicio.id_cn
                  LEFT JOIN ese_status ON ordenes_servicio.id_status=ese_status.id
                  where ordenes_servicio.id_servicio=0';


      $res= DB::select($query);

       return view("ESE.OS.index",['os'=>$res]);
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
    public function detalleOs(Request $request){
         $query="SELECT
                    ordenes_servicio_ese.id_os,
                    crm_tc_cotizador_ese_costos.tipo_estudio AS nombre,
                    prioridades.nombre as prioridad,
                    ordenes_servicio_ese.cantidad,
                    estados.nombre_estado,
                    ordenes_servicio_ese.total
                    FROM ordenes_servicio_ese
                    LEFT JOIN crm_tc_cotizador_ese_costos ON ordenes_servicio_ese.id_tipo_estudio=crm_tc_cotizador_ese_costos.id
                    LEFT JOIN prioridades ON ordenes_servicio_ese.prioridad=prioridades.id
                    LEFT JOIN estados ON ordenes_servicio_ese.estado=estados.id
                    where ordenes_servicio_ese.id_os=".$request->id;
      $res= DB::select($query);
      if($res)
        return response()->json(["data"=>$res]);
     else
        return response()->json(["wrong"=>"error"]);

    }

    public function cerrar_os(Request $request){

        $query="SELECT COUNT(*) as num_estudios FROM estudio_ese_detalle where id_os=".$request->id." and id_status=2" ;
        $res_query=DB::select($query);
        if($res_query){
            $num=$res_query[0]->num_estudios;
            if($num>0){
              dd($request->all());
                return response()->json(["success"=>"ok"]);

            }
            else{


                   $update_status_os_ese = OrdenServicio::findOrFail($request->id);

                   $update_status_os_ese->id_status=4;// 4 evento de cerrar estudio
                   $update_status_os_ese->fecha_cierre=date('Y-m-d H:i:s');
                   $update_status_os_ese->save();



                   if($update_status_os_ese){

                        $modulo         = Modulo::where('slug','ese')->get();

                        $submodulo      = SubModulo::where('slug','ese.os')->get();

                        $accion_kardex  = Accion::where('slug','cerrar')->get();



                        $kardex = Kardex::create([
                                     "id_cn"         => $request->user()->idcn,
                                      "id_usuario"    => $request->user()->id,
                                      "id_modulo"     => $modulo[0]->id,
                                      "id_submodulo"  => $submodulo[0]->id,
                                      "id_accion"     => $accion_kardex[0]->id,
                                      "id_objeto"     => $update_status_os_ese->id,
                                      "descripcion"   => "Se cerro  la Orden de Servicio #ESE".$update_status_os_ese->id
                                      ]);

                   return response()->json(["success"=>"update_os"]);
                   }


            }


        }


    }
     public function cancelar_os(Request $request){

        $query="SELECT COUNT(*) as num_estudios FROM estudio_ese_detalle where id_os=".$request->id." and id_status=2" ;

        $res_query=DB::select($query);

        if($res_query){
            $num=$res_query[0]->num_estudios;
            if($num>0){
                return response()->json(["success"=>"ok"]);

            }
            else{
                   $update_status_os_ese = OrdenServicio::findOrFail($request->id);
                   $update_status_os_ese->id_status=3;// 3 evento de cerrar estudio
                   $update_status_os_ese->fecha_cancelacion=date('Y-m-d H:i:s');// 3 evento de cerrar estudio
                   $update_status_os_ese->save();

                   if($update_status_os_ese){

                        $modulo         = Modulo::where('slug','ese')->get();
                        $submodulo      = SubModulo::where('slug','ese.os')->get();
                        $accion_kardex  = Accion::where('slug','cancelar')->get();
                        $kardex = Kardex::create([
                                     "id_cn"         => $request->user()->idcn,
                                      "id_usuario"    => $request->user()->id,
                                      "id_modulo"     => $modulo[0]->id,
                                      "id_submodulo"  => $submodulo[0]->id,
                                      "id_accion"     => $accion_kardex[0]->id,
                                      "id_objeto"     => $update_status_os_ese->id,
                            "descripcion"   => "Cancelación de la Orden de Servicio #ESE".$update_status_os_ese->id
                                      ]);
                   return response()->json(["success"=>"update_os"]);
                   }


            }


        }


    }
}
