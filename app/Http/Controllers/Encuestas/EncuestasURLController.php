<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class EncuestasURLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id,$id2)
    { 
        $IdCliente = $id;
        $IdEncuesta = $id2;

        $politica = MasterConsultas::exeSQL("ev_politica_cliente", "READONLY",
            array(
                "idCliente" => $IdCliente
            )
        );

        $array = ["Cual es tu nombre?","Cual es tu apellido?"];

        $encuesta = DB::select("SELECT ee.IdEncuesta, ee.Descripcion FROM ev_encuesta ee;");

        $img=DB::select('select * from ev_img_cliente where IdCliente='.$id);

        $arrayvacio=empty($img);

        if($arrayvacio === true){
            $img=DB::select('select * from ev_img_cliente where IdCliente= 8');
        }
        
        foreach($img as $p){
            $archivoimg=$p->Imagen;
        }

        $imagen = base64_encode($archivoimg);

        $background_image_url="url(".$imagen.")";
        return view("Encuestas.nom035.encuesta",["encuesta"=>$encuesta,"politica"=>$politica,"array"=>$array,"IdEncuesta"=>$IdEncuesta,"background_image_url"=>$background_image_url,"imagen"=>$imagen,"IdCliente"=>$IdCliente]);
    }

    public function getPreguntas(Request $request){
        $IdEncuesta = $request->IdEncuesta;

        $preguntas = MasterConsultas::exeSQL("ev_preguntas_encuestas", "READONLY",
            array(
                "IdEncuesta" => $IdEncuesta
            )
        );

        $respuesta = DB::select("SELECT
        bbb.IdEncuesta, erd.IdRespuestaDet,
        (SELECT erp.Descripcion FROM ev_respuesta_grupo erp WHERE erp.IdGrupoRespuesta = ep.IdGrupoRespuesta) AS GrupoRespuesta, 
        erd.IdRespuesta, er.Descripcion
        FROM ev_pregunta ep 
        INNER JOIN ev_agrupador_encuesta aaa 
        ON aaa.IdAgrupador = ep.IdAgrupador 
        INNER JOIN ev_encuesta bbb 
        ON bbb.IdEncuesta = aaa.IdEncesta 
        INNER JOIN ev_respuesta_detalle erd
        ON erd.IdGrupoRespuesta = ep.IdGrupoRespuesta 
        INNER JOIN ev_respuesta er
        ON er.IdRespuesta = erd.IdRespuesta
        WHERE bbb.IdEncuesta =".$IdEncuesta." GROUP BY er.Descripcion ORDER BY er.IdRespuesta;");

        return response()->json(['data'=>$preguntas,'data2'=>$respuesta]);
    }

    public function getRespuestas(Request $request){

        $consulta = $request->Consulta;
        $IdCliente = $request->IdCliente;
        $response = $request->response;
        $i = $request->i;

        if ($consulta === "ev_centro_encuesta" || $consulta === "ev_departamento_encuesta" || $consulta === "ev_puesto_encuesta"){
            $respuestas = MasterConsultas::exeSQL($consulta, "READONLY",
                array(
                    "IdCliente" => $IdCliente
                )
            );
        }else{
            $respuestas = MasterConsultas::exeSQL($consulta, "READONLY",
                array(
                    "" => -1
                )
            );
        }
        return response()->json(['data'=>$respuestas,'data2'=>$response,'i'=>$i]);
    }

    public function getResponses(Request $request){

        $IdGrupoRespuesta = $request->IdGrupoRespuesta;

        $gruporespuestas = DB::select("SELECT * FROM ev_respuesta er INNER JOIN ev_respuesta_detalle erd ON er.IdRespuesta = erd.IdRespuesta WHERE erd.IdGrupoRespuesta =".$IdGrupoRespuesta);
        $response = $request->response;

        return response()->json(['data'=>$gruporespuestas,'data2'=>$response]);
    }

    public function setPreguntas(Request $request){

        // $buscarregistro=DB::select('select * from ev_sugerencias es where es.IdCliente ="'.$idCliente.'"');

        // $arrayvacio=empty($buscarregistro);

        // // if($arrayvacio==false){
            
        // // }else{
        //     $AltaTiposServicio=MasterConsultas::exeSQLStatement("ev_create_sugerencias", "UPDATE",
        //             array(
        //                 "Comentario" => $request->mensaje,
        //                 "Personal" => "",
        //                 "Cliente" => $request->IdCliente,
        //                 "Centro" => $request->IdCentro,
        //                 "Queja" => $request->IdTipoQueja,
        //                 "Anonimo" => $request->anonimo,
        //                 "Nombre" => $request->nombre,
        //                 "Correo" => $request->correo
        //             )
        //     );

        //     return response()->json(['data'=>$buscarregistro]);
    }

    public function setRespuestas(Request $request){
        $IdGrupoRespuesta = $request->IdGrupoRespuesta;
        $IdCliente = $request->IdCliente;
        $campo = $request->campo;
        $IdEncuesta = $request->IdEncuesta;
        $respuesta = $request->respuesta;
        $pregunta = $request->pregunta;


        $buscarRegistro = DB::select('select * from ev_personal where IdPersonal = 1 and IdCliente = 6');

        $arrayvacio = empty($buscarRegistro);

        if($arrayvacio==true){
            $respuestass = "No";
        }else{
            $updateTQ = DB::table('ev_personal')->where('IdPersonal','1')->update(
                array(
                    $campo=>$respuesta
                )     
            );
            $respuestass = "Si";
        }

        return response()->json(['data'=>$respuestass]);
    }

    public function setRespuestasNormales(Request $request){
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $IdEncuesta = $request->IdEncuesta;
        $respuesta = $request->respuesta;
        $pregunta = $request->pregunta;

        $buscarRegistro = DB::select('SELECT * FROM ev_respuesta_detalle WHERE IdRespuestaDet ='.$respuesta);

        foreach($buscarRegistro as $p){
            $iValor=$p->iValor;
        }
        

        $AltaTQ = MasterConsultas::exeSQLStatement("create_encuesta_respuestas", "UPDATE",
            array(
                "IdEncuesta" => $IdEncuesta,
                "IdCliente" => $IdCliente,
                "IdPeriodo" => $IdPeriodo,
                "IdRespuestaDet" => $respuesta,
                "iValor" => $iValor
            )

        );

        $respuestass = "Si";

        return response()->json(['data'=>$respuestass]);
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
}
