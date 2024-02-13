<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\administrador\CotizadorGeneral;
use App\Http\Requests;
use App\Http\Controllers\Controller;
USE DB;
/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */

class CotizadorGeneralServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
               $servicios=DB::select(" select crm_cotizador_general.*, crm_cotizador_servicio.servicio as tipo from crm_cotizador_general left join crm_cotizador_servicio on crm_cotizador_general.id_servicio = crm_cotizador_servicio.id
               where crm_cotizador_general.status = 1");


               $tipo_servicio = DB::table("crm_cotizador_servicio")->get();
               return view('administrador.servicios.ServiciosGeneral.index',['servicios'=>$servicios,'tipo_servicio'=>$tipo_servicio]);
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
    public function AltaServicios(Request $request){
    

         $validaPaquete=DB::table("crm_cotizador_general")->where('nombre',$request->nombre)->get();
         if($validaPaquete){ //VALIDA NOMBRE DE PAQUETE
            return response()->json(["status_alta"=>"existe_nombre"]);

         }else{

          $guardarCambios=DB::table('crm_cotizador_general')->insert([
                 'nombre'=>$request->nombre,
                 'descripcion'=>$request->descripcion,
                 'costo_unitario'=>$request->costo_unitario,
                 'iva'=>$request->iva,
                 'id_servicio' => $request->servicio_tipo

                ]);
        
           if($guardarCambios){
           $id_modulo=Modulo::where('slug','cotizadores')->get();
           $id_SubModulo=SubModulo::where('slug','cotizadores.general')->get();
           $id_accion=Accion::where('slug','alta')->get();

           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>"",
            'descripcion'=>'Se dio de Alta el servicio: '.$request->nombre.' con un Costo unitario de: $'.number_format($request->costo_unitario, 2, ',', ' ')."y un iva de %".number_format($request->iva, 2, ',', ' ')
            ]);
            $Kardex->save();

            return response()->json(["status_alta"=>"success"]);
           }else{
            return response()->json(["status_alta"=>"wrong"]);
           } 
       }//end else validacion de nombre de paquete
    }
    public function EdicionServicios(Request $request){

          $FindServicio=DB::table("crm_cotizador_general")->where('id',$request->id)->get();
          $servicios = DB::select("select * from crm_cotizador_servicio");

           if($FindServicio){ 
            return response()->json(["servicio"=>$FindServicio,"servicios"=>$servicios]);
          }
    }

    public function UpdateServicios(Request $request)
    {
        $guardarCambios=DB::table('crm_cotizador_general')
            ->where("id",$request->id_edicion)
            ->update([
                     'nombre'=>$request->nombre_editar,
                     'descripcion'=>$request->descripcion_editar,
                     'costo_unitario'=>$request->costo_unitario_editar,
                     'iva'=>$request->iva_editar,
                     "id_servicio" => $request->servicio_tipo2
                ]);
            if($guardarCambios){

               $id_modulo=Modulo::where('slug','cotizadores')->get();
               $id_SubModulo=SubModulo::where('slug','cotizadores.general')->get();
               $id_accion=Accion::where('slug','modificacion')->get();
          
               $Kardex=Kardex::create([
                'id_cn'=>$request->user()->idcn,
                'id_usuario'=>$request->user()->id,
                'id_modulo'=>$id_modulo[0]->id,
                'id_submodulo'=>$id_SubModulo[0]->id,
                'id_accion'=>$id_accion[0]->id,
                'id_objeto'=>"",
                'descripcion'=>'Se Modifico el servicio: '.$request->nombre_editar.' con un Costo unitario de: $'.number_format($request->costo_unitario_editar, 2, ',', ' ')."y un iva de %".number_format($request->iva_editar, 2, ',', ' ')
                ]);
            $Kardex->save();
            return response()->json(["status_alta"=>"success"]);
           }else{
            return response()->json(["status_alta"=>"wrong"]);
           }
    }
    public function EliminarServicios(Request $request){

          $FindServicioEliminar=DB::table("crm_cotizador_general")->where('id',$request->id)->get();

           if($FindServicioEliminar){ 
            return response()->json(["servicio_eliminar"=>$FindServicioEliminar]);
         }
    }
    public function DeleteServicio(Request $request)
    {

        $guardarCambios=DB::update("update crm_cotizador_general set crm_cotizador_general.status = '2' where id= $request->id_eliminar");
            if($guardarCambios){

               $id_modulo=Modulo::where('slug','cotizadores')->get();
               $id_SubModulo=SubModulo::where('slug','cotizadores.general')->get();
               $id_accion=Accion::where('slug','baja')->get();
          
               $Kardex=Kardex::create([
                'id_cn'=>$request->user()->idcn,
                'id_usuario'=>$request->user()->id,
                'id_modulo'=>$id_modulo[0]->id,
                'id_submodulo'=>$id_SubModulo[0]->id,
                'id_accion'=>$id_accion[0]->id,
                'id_objeto'=>"",
                'descripcion'=>'Se dio de baja el servicio: '.$request->nombre_eliminar.' con ID:'.$request->id_eliminar
                ]);
            $Kardex->save();
            return response()->json(["status_alta"=>"success"]);
           }else{
            return response()->json(["status_alta"=>"wrong"]);
           }
    }



   
}
