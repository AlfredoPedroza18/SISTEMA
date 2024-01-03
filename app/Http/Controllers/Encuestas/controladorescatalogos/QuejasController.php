<?php

namespace App\Http\Controllers\Encuestas\controladorescatalogos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class QuejasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        // $data = null;
        // if( $request->user()->isAdmin() )
        // {
        //     $data = $this->initFieldsAdmin();
        // } 
        // else{
        //     $data = $this->initFieldsUser( $request->user() );
        // }

        $quejas = MasterConsultas::exeSQL("ev_tipo_quejas", "READONLY",
            array(
                "IdTipoQueja" => '-1'
            )
        );
        return view("Encuestas.catalogos.formularios.catalogodequejas.index",["quejas"=>$quejas]);
    }

    public function createTQ(){
        return view("Encuestas.catalogos.formularios.catalogodequejas.create.create");
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
        $descripcion = $request->input('descripcion');
        $activo = $request->input("activo");

        $buscarregistro = DB::select('SELECT * FROM ev_tipo_queja evq WHERE evq.Descripcion ="'.$descripcion.'"');

        $arrayvacio = empty($buscarregistro);

        if($arrayvacio == false){
            return redirect()->route('catalogo_quejas')->with(['success' => ' El tipo de queja '.$request->input('descripcion').' ya existe',
            'type'    => 'danger']);
        }else{
            $AltaTQ = MasterConsultas::exeSQLStatement("create_ev_quejas", "UPDATE",
                array(
                    "Descripcion" => $descripcion,
                    "Activo" => $activo
                )
            );
            return redirect()->route('catalogo_quejas')->with(['success' => ' El registro '.$request->input('descripcion').' se guardó con éxito',
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
        $editar = DB::select('Select * from ev_tipo_queja where IdTipoQueja ='.$id);

        foreach ($editar as $row){
            $IdTipoQueja = $row->IdTipoQueja;
            $Descripcion = $row->Descripcion;
            $Activo = $row->Activo;
        }

        return view("Encuestas.catalogos.formularios.catalogodequejas.edit.edit")
        ->with('IdTipoQueja', $IdTipoQueja)
        ->with('Descripcion', $Descripcion)
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
        $Descripcion = $request->input('descripcion');

        $buscarRegistro = DB::select('select * from ev_tipo_queja where IdTipoQueja<>'.$id.' and Descripcion="'.$Descripcion.'"');

        $arrayvacio = empty($buscarRegistro);

        if($arrayvacio==false){
            return redirect()->route('catalogo_quejas')->with(['success' => ' Error al actualizar, el tipo de queja '.$request->input('descripcion').' ya existe',
            'type'    => 'danger']);
        }else{
            $updateTQ = DB::table('ev_tipo_queja')->where('IdTipoQueja',$id)->update(
                array(
                    'Descripcion'=>$Descripcion,
                    'Activo'=>$request->input('activo')
                )     
            );

            return redirect()->route('catalogo_quejas')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
            'type'    => 'success']);
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
        $resultadoError = null;

        try {
            DB::delete("delete from ev_tipo_queja WHERE IdTipoQueja = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->route('catalogo_quejas')
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect()->route('catalogo_quejas')
                ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
            }
        }  
    }
}
