<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;

use DB;

class SugerenciasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    { 
        $idServicio = $id;

        $listaEncuestas = MasterConsultas::exeSQL("ev_lista_encuestas", "READONLY",
        array(
                "IdServicio" => $idServicio
            )
        );


        $idCliente = $listaEncuestas[0]->IdCliente;
        $idPeriodo = $listaEncuestas[0]->IdPeriodo;

        // echo "<script>console.log('Console: " . $idCliente . "' );</script>";

        $centros = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$idCliente." and es.IdPeriodo = ".$idPeriodo);

        $comentario=DB::select('select * from ev_sugerencias es where es.IdCliente ="'.$idCliente.'"');

        $quejas = MasterConsultas::exeSQL("ev_tipo_quejas", "READONLY",
            array(
                "IdTipoQueja" => '-1'
            )
        );

        // $sugerencias = MasterConsultas::exeSQL("ev_sugerencias", "READONLY",
        //     array(
        //         "IdSugerencia" => '-1'
        //     )
        // );

        $sugerencias = DB::select("SELECT es.IdSugerencia,es.Comentario,es.Anonimo,es.Nombre,es.Correo, es.Estatus,(SELECT c.nombre_comercial FROM clientes c WHERE c.id = es.IdCliente)AS cliente,(SELECT ect.Descripcion FROM ev_centros_trabajo ect WHERE ect.IdCentro = es.IdCentro) AS centro,(SELECT etq.Descripcion FROM ev_tipo_queja etq WHERE etq.IdTipoQueja = es.IdTipoQueja)AS TipoQueja FROM ev_sugerencias es WHERE es.IdCliente =".$idCliente." ORDER BY es.IdSugerencia DESC;");

        return view("Encuestas.encuestas.sugerencias",['listaEncuestas'=>$listaEncuestas,'comentario'=>$comentario,'centros'=>$centros,'quejas'=>$quejas,'sugerencias'=>$sugerencias,'IdServicio'=> $idServicio]);
    }

    public function getComentario(Request $request){
        $IdCliente = $request->IdCliente;

        $comentario=DB::select('select * from ev_sugerencias es where es.IdCliente ="'.$IdCliente.'"');

        return response()->json(['data'=>$comentario]);
    }

    public function getDatos(Request $request){
        $IdCliente =  $request->IdCliente;
        $IdPeriodo =  $request->IdPeriodo;

        $centros = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo);

                
        return response()->json(['data'=>$centros]);
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

    function regresar(){
        return view("Encuestas.encuestas.sugerencias");
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
    public function edit($id,$id2)
    {
        $IdServicio = $id2;
        $editar = DB::select('Select * from ev_sugerencias where IdSugerencia ='.$id);

        foreach ($editar as $row){
            $IdSugerencia = $row->IdSugerencia;
            $Estatus = $row->Estatus;
            $Comentario = $row->Nota;

            return view("Encuestas.encuestas.editar.editar")
            ->with('IdSugerencia', $IdSugerencia)
            ->with('Estatus', $Estatus)
            ->with('comentario', $Comentario)
            ->with('IdServicio', $IdServicio);
        }
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
        $Estatus = $request->input('estatus');
        $IdServicio = $request->input('servicio');
        $Comentario = $request->input('Informacion');

        $buscarRegistro = DB::select('select * from ev_sugerencias where IdSugerencia<>'.$id.' and Estatus="'.$Estatus.'"');

        $arrayvacio = empty($buscarRegistro);

        // if($arrayvacio==false){
        //     return redirect()->route('sugerencias',['id'=>$IdServicio])->with(['success' => ' Error al actualizar, el tipo de queja '.$request->input('estatus').' ya existe',
        //     'type'    => 'danger']);
        // }else{
            $updateTQ = DB::table('ev_sugerencias')->where('IdSugerencia',$id)->update(
                array(
                    'Estatus'=>$Estatus,
                    'Nota'=>$Comentario
                )     
            );

            return redirect()->route('sugerencias',['id'=>$IdServicio])->with(['success' => ' El registro '.$request->input('estatus').' se actualizó con éxito',
            'type'    => 'success']);
        // }
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
}
