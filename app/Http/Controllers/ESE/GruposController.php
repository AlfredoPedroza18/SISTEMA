<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Grupos = MasterConsultas::exeSQL("master_ese_contenedor", "READONLY",
            array(
                "IdContenedor" => '-1'
            )
        );

        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_contenedor");

        foreach ($query_max as $c) {

            $MaxO = $c->MOrden;
        }
            $Orden= $MaxO+1;

        return view("ESE.catalogos.gruposindex",["grupos"=>$Grupos,"ordengrupoG"=>$Orden]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }



    public function GuardarGrupo(Request $request)
    {
        $etq = $request->nombregrupo;
        $og = $request->ordengrupoG;
        $AltaGrupos=MasterConsultas::exeSQLStatement("create_catalogo_grupo", "UPDATE",
            array(
                "Etiqueta" => $etq,
                "Orden" => $og
                )
        );


        return redirect('/Grupos')
                ->with(['success' =>  ' El registro se agregó con éxito',
                    'type'    => 'success']);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    public function editarG($id)
    {
          $Grupo = MasterConsultas::exeSQL("master_ese_contenedor", "READONLY",
        array(
            "IdContenedor" => $id

        )
        );

        foreach ($Grupo as  $grp) {
            $IdContenedor=$grp->IdContenedor;
            $Etiqueta=$grp->Etiqueta;
            $Orden=$grp->Orden;
        }
        return array($IdContenedor,$Etiqueta,$Orden);

    }

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

    }

    public function reacomodar(Request $request){

      DB::table('master_ese_contenedor')
      ->where('IdContenedor', $request->input('Id'))
      ->update( array('Orden'=>$request->input('Valor')));

      DB::table('master_ese_contenedor')
      ->where('IdContenedor', $request->input('IdDes'))
      ->update( array('Orden'=>$request->input('ValorDes')));

    //   return array($request->input('Id'),$request->input('Valor'),$request->input('IdDes'),$request->input('ValorDes'));
         // echo $request->input('Id').' '.$request->input('Valor').' '.$request->input('IdDes').' '.$request->input('ValorDes');
    }

    public function ActualizarG(Request $request)
    {
        $id = $request->IdContenedor;
        $etq = $request->nombregrupo;
        $UpdateModalidad=MasterConsultas::exeSQLStatement("update_catalogo_contenedor", "UPDATE",
                    array(
                        "Etiqueta" => $etq,
                        "IdContenedor" => $id
                    )
                );


                return redirect('/Grupos')
                ->with(['success' =>  ' El registro se actualizó con éxito',
                    'type'    => 'success']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteSubgrupo=MasterConsultas::exeSQLStatement("delete_catalogo_grupo", "UPDATE",
        array(
            "IdContenedor" => $id
        )
        );
        return redirect('/Grupos')
                ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
    }
}
