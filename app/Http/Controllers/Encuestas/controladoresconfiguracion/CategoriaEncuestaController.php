<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterClientes;
use DB;


class CategoriaEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $selectCE = MasterConsultas::exeSQL("ev_categorias", "READONLY",
            array(
                "Categoria" => '-1'
            )
        );

        return view("Encuestas.configuracion.configuracionsecciones.categoriaencuesta.index",["seleccionaCE"=>$selectCE]);
    }

    public function createCE(){

        $agrupador=DB::select('SELECT IdAgrupador AS Id,Descripcion AS Agrupador FROM ev_agrupador_encuesta');
            
        return view("Encuestas.configuracion.configuracionsecciones.categoriaencuesta.create.create",["agrupador"=>$agrupador]);
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
        $IdAgrupador=$request->input('agrupador');
        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('select *from ev_categorias where IdAgrupador='.$IdAgrupador.' AND Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('configuracion_categoria_encuesta')->with(['success' => ' La Categoria' .$request->input('descripcion').' ya existe para el agrupador',
            'type'    => 'danger']);
        }else{
            $AltaCE=MasterConsultas::exeSQLStatement("create_ev_categorias", "UPDATE",
                    array(
                        "IdAgrupador" => $IdAgrupador,
                        "Descripcion" => $Descripcion
                    )
                );
                
            return redirect()->route('configuracion_categoria_encuesta')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $editarCE=DB::select('select *from ev_categorias where IdCategoria='.$id);

        foreach ($editarCE as  $editCE) {
            $IdCategoria=$editCE->IdCategoria;
            $IdAgrupador=$editCE->IdAgrupador;
            $Descripcion=$editCE->Descripcion;
        }

        $descagrupador=DB::select('select Descripcion from ev_agrupador_encuesta where IdAgrupador='.$IdAgrupador);

        foreach($descagrupador as $descag){
            $Agrupador=$descag->Descripcion;
        }

            return view("Encuestas.configuracion.configuracionsecciones.categoriaencuesta.edit.edit")
            ->with('IdCategoria', $IdCategoria)
            ->with('IdAgrupador', $IdAgrupador)
            ->with('Descripcion', $Descripcion)
            ->with('Agrupador', $Agrupador);
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
        $IdAgrupador=$request->input('agrupador');
            $Descripcion=$request->input('descripcion');
    
            $buscarregistro=DB::select('select * from ev_categorias where IdAgrupador='.$IdAgrupador.' AND IdCategoria<>'.$id.' AND Descripcion="'.$Descripcion.'"');
    
            $arrayvacio=empty($buscarregistro);
    
            if($arrayvacio==false){
                return redirect()->route('configuracion_categoria_encuesta')->with(['success' => ' Error al actualizar, la categoria '.$request->input('descripcion').' ya existe para el agrupador',
                'type'    => 'danger']);
            }else{
                $UpdateCE = DB::table('ev_categorias')->where('IdCategoria',$id)->update(
                    array('Descripcion'=>$Descripcion));
                    
                return redirect()->route('configuracion_categoria_encuesta')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
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
            DB::delete("delete from ev_categorias WHERE IdCategoria = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->route('configuracion_categoria_encuesta')
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect()->route('configuracion_categoria_encuesta')
                ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
          }
        }
    }
}
