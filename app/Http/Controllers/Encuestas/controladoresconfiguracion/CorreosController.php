<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterClientes;
use DB;


class CorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectCO = MasterConsultas::exeSQL("ev_conf_mail", "READONLY",
            array(
                "IdMail" => '-1'
            )
        );

        return view("Encuestas.configuracion.configuracionsecciones.correos.index",["seleccionaCO"=>$selectCO]);
    }

    public function createCO(){

        return view("Encuestas.configuracion.configuracionsecciones.correos.create.create");
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
        $descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('select *from ev_conf_mail where Descripcion="'.$descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('configuracion_correos')->with(['success' => ' El correo '.$request->input('descripcion').' ya existe',
            'type'    => 'danger']);
        }else{
            $AltaTP=MasterConsultas::exeSQLStatement("create_ev_conf_mail", "UPDATE",
                    array(
                        "Descripcion" => $descripcion
                    )
                );
                
            return redirect()->route('configuracion_correos')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
            'type'    => 'success']);
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
        $editarCO=DB::select('select *from ev_conf_mail where IdMail='.$id);

        foreach ($editarCO as  $editCO) {
            $IdMail=$editCO->IdMail;
            $descripcion=$editCO->Descripcion;
            $Activo=$editCO->Activo;
        }

        $nombrededeCO=DB::select('select Descripcion from ev_conf_mail where IdMail='.$id);

            return view("Encuestas.configuracion.configuracionsecciones.correos.edit.edit")
            ->with('IdMail', $IdMail)
            ->with('Descripcion', $descripcion)
            ->with('Activo', $Activo);
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
        $descripcion=$request->input('descripcion');
    
            $buscarregistro=DB::select('select * from ev_conf_mail where IdMail<>'.$id.' AND Descripcion="'.$descripcion.'"');
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->route('configuracion_correos')->with(['success' => ' Error al actualizar, el correo '.$request->input('descripcion').' ya existe',
                'type'    => 'danger']);
            }else{
                $UpdateTP = DB::table('ev_conf_mail')->where('IdMail',$id)->update(
                    array('Descripcion'=>$descripcion,
                    'Activo'=>$request->input('activo')));
                    
                return redirect()->route('configuracion_correos')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
                'type'    => 'success']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
            $resultadoError = null;
        
            try {
                DB::delete("delete from ev_conf_mail WHERE IdMail = $id");
            }catch (\Exception $e) {
                if($e->getMessage()){
                    $resultadoError = 'Si';
                }
            }finally{
                if($resultadoError=='Si'){
                    return redirect()->route('configuracion_correos')
                    ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                    'type'    => 'danger']);
                }else{
                    return redirect()->route('configuracion_correos')
                    ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
              }
            }
    }
}
