<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MasterClientes;
use App\Bussines\MasterConsultas;
use App\Http\Controllers\Encuestas\Notificaciones;

//require_once(public_path('assets\plugins\twilio\twilio-php-main\src\Twilio\autoload.php')); 
//use Twilio\Rest\Client; 

use DB;

class DistribucionNom035Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request){ 
        // $encuesta = DB::select("SELECT ee.IdEncuesta, ee.Descripcion FROM ev_encuesta ee;");
        return view("Encuestas.nom035.distribucion");
    }

    public function obtener(Request $reques,$id,$id2){
       $idCliente = $id;
       $idPeriodo = $id2;

       $cc = DB::select("SELECT * 
       FROM master_ese_email_settings mees 
       INNER JOIN master_ese_email_templates meet
       ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
       WHERE mees.Modulo = 'ENVIO-ENCUESTA-USUARIO'");

        $correo = $cc[0]->CuerpoEmail;
        $encuestas = MasterConsultas::exeSQL("ev_encuesta_link", "READONLY",
        array(
            "IdEncuesta" => '-1'
        )
        );

       $clientes = DB::select("SELECT c.id ,c.nombre_comercial FROM clientes c WHERE c.id =".$idCliente.";");
       $periodo = DB::select("SELECT evp.IdPeriodo, evp.Fecha FROM ev_periodos evp WHERE evp.IdPeriodo = ".$idPeriodo.";");

       //Obtenemos el centro de trabajo
       $centros = DB::select("SELECT 
       es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
       FROM ev_servicio es
       INNER JOIN ev_servicio_cliente esc
       ON es.IdServicio = esc.IdServicio
       INNER JOIN ev_centros_trabajo ect
       ON ect.IdCentro = esc.IdCentro
       WHERE es.IdCliente = ".$idCliente." and es.IdPeriodo = ".$idPeriodo);

        $quejas = MasterConsultas::exeSQL("ev_tipo_quejas", "READONLY",
            array(
                "IdTipoQueja" => '-1'
            )
        );

       $i = 1;
       $j = 1;
       $p = 0;
       $contador = 0;
       $arreglo = [];
       $cont = 0;
       $var = 0;

        $abecedario = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $combinacion = [];

        for($s=0; $s<2000; $s++){
            if($s < 27){
                $combinacion[$s] = $abecedario[$s];
            }else{
                $combinacion[$s] = $combinacion[$cont].$abecedario[$p];
                $p++;
                if($p == 27){
                    $p = 0;
                    $cont++;
                }
            }
        }

        // $datos = DB::select("SELECT ep.IdPersonal, ep.IdCliente, ep.Nombre, ep.IdCentroTrabajo, ep.Telefono, ep.Correo FROM ev_personal ep WHERE ep.IdCliente =".$idCliente." ORDER BY ep.IdCentroTrabajo;");
        $datos = DB::select("SELECT ep.IdPersonal, ep.IdCliente, ep.Nombre, ep.IdCentroTrabajo, ep.Telefono, ep.Correo,
        (select esd.lNotifica from ev_servicio_detalle esd where esd.IdPersonal = ep.IdPersonal LIMIT 1) as notificacion
        FROM ev_personal ep 
        WHERE ep.IdCliente =".$idCliente." AND idPeriodo =".$idPeriodo." ORDER BY ep.IdCentroTrabajo;");
        
        $espacios = DB::select("SELECT ep.IdPersonal, ep.IdCliente, ep.Nombre, ep.IdCentroTrabajo, ep.Telefono, ep.Correo, count(ep.IdPersonal) as cantidadPersonal FROM ev_personal ep WHERE ep.IdCliente =".$idCliente." and ep.Correo <> '' and ep.Telefono <> '' GROUP BY ep.IdCentroTrabajo");

        for ($k=0; $k<sizeof($centros); $k++){
            for ($l=0; $l<sizeof($datos); $l++){
                if($centros[$k]->IdCentro === $datos[$l]->IdCentroTrabajo){
                    $contador++;
                }
            }
            $arreglo[$k] = $contador;
            $contador = 0;
        }


        //Obtenemos el tipo de servicio
        $servicio = DB::select("SELECT * FROM ev_servicio es WHERE es.IdCliente = ".$idCliente." AND es.IdPeriodo = ".$idPeriodo);
        //$ev_servicio = DB::select("SELECT * FROM ev_servicio WHERE IdCliente = ".$idCliente." AND IdPeriodo = ".$idPeriodo);
       foreach($servicio as $es){
        $IdServicio=$es->IdServicio;
       }
       $servCliente = DB::select("SELECT * FROM ev_servicio_cliente WHERE IdServicio = ".$IdServicio);
       $servDetalle = DB::select("SELECT * FROM ev_servicio_detalle");

       $totalP=0;
       foreach ($centros as $row){
        foreach ($datos as $row2){
            if ($row->IdCentro == $row2->IdCentroTrabajo){
                
                    $totalP++;
                
            }
        }
    }

    $contta = 0;

        return view("Encuestas.nom035.distribucion",
                [
                    "idCliente"=>$idCliente,
                    "idPeriodo"=>$idPeriodo,
                    "clientes"=>$clientes, 
                    "periodo"=>$periodo,
                    "servicio"=>$servicio,
                    "servCliente"=>$servCliente,
                    "servDetalle"=>$servDetalle,
                    "correo"=>$correo,
                    "encuestas"=>$encuestas,
                    "centros"=>$centros,
                    "i"=>$i,
                    "j"=>$j,
                    "var"=>$var,
                    "contador"=>$contador,
                    "arreglo"=>$arreglo,
                    "combinacion"=>$combinacion,
                    "datos"=>$datos,
                    "quejas"=>$quejas,
                    "totalP"=>$totalP,
                    "espacios"=>$espacios,
                    "contta"=>$contta
                ]);
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
        $idCliente = $request->IdCliente;
        // $idPeriodo = $request->IdPeriodo;
        // $mensaje = $request->mensaje;
        // $comentario = $request->input('mensaje');
        // $cliente = $request->input('idCliente');
        // $periodo = $request->input('idPeriodo');

        $buscarregistro=DB::select('select * from ev_sugerencias es where es.IdCliente ="'.$idCliente.'"');

        $arrayvacio=empty($buscarregistro);

        // if($arrayvacio==false){
            
        // }else{
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("ev_create_sugerencias", "UPDATE",
                    array(
                        "Comentario" => $request->mensaje,
                        "Personal" => "",
                        "Cliente" => $request->IdCliente,
                        "Centro" => $request->IdCentro,
                        "Queja" => $request->IdTipoQueja,
                        "Anonimo" => $request->anonimo,
                        "Nombre" => $request->nombre,
                        "Correo" => $request->correo
                    )
            );
        // }

        return response()->json(['data'=>$buscarregistro]);

    }

    public function validar(Request $request){
        $idCliente = $request->IdCliente;

        $buscarregistro=DB::select('select * from ev_sugerencias es where es.IdCliente ="'.$idCliente.'"');

        return response()->json(['data'=>$buscarregistro]);
    }

    public function updatePersonalCTauto(Request $request){

        $query =  "";
        switch ($request->indice){

            case 1: $xd = $request->personal;

                $query = " UPDATE ev_personal SET Nombre='".html_entity_decode($request->dato, ENT_QUOTES | ENT_HTML401, "UTF-8")."'";
          
                break;

            case 2: $xd = $request->personal;

                $query = " UPDATE ev_personal SET  Correo='".str_replace('"', '', json_encode($request->dato))."'";
          
                break;
            
            case 3: $xd = $request->personal;
                
                $query = " UPDATE ev_personal SET Telefono='".str_replace('"', '', json_encode($request->dato))."'";
          
                break;

        }

        if($query != ""){
            $query .=" where idPersonal = ".$request->personal;
            DB::update($query);
        }
        return response()->json(["mensaje"=>$xd."xd"]);
    }

    public function updatePersonalCT(Request $request){
        // dd($request->updPersonal);
        $query = "";
        foreach ($request->updPersonal as $key) {
            $IdPersonal=json_decode($key['IdPersonal']);
            $name = html_entity_decode($key['Nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8");
            $query .= " UPDATE ev_personal SET Nombre='".$name."', Correo='".str_replace('"', '', json_encode($key['Correo']))."', Telefono='".str_replace('"', '', json_encode($key['Telefono']))."' WHERE IdPersonal=".$IdPersonal.";";
            // $updNombre = DB::table('ev_personal')->where('IdPersonal', $IdPersonal)->update(
            //     array(
            //         'Nombre' => $name,
            //         'Correo' => str_replace('"', '', json_encode($key['Correo'])),
            //         'Telefono' => str_replace('"', '', json_encode($key['Telefono']))
            // ));
            // $updCorreo = DB::table('ev_personal')->where('IdPersonal', $IdPersonal)->update(
            //     array(
            //         'Correo' => str_replace('"', '', json_encode($key['Correo']))
            // ));
            // $updTelefono = DB::table('ev_personal')->where('IdPersonal', $IdPersonal)->update(
            //     array(
            //         'Telefono' => str_replace('"', '', json_encode($key['Telefono']))
            // ));
        }
        DB::update($query);
        return redirect()->back()->with(['success' => 'Datos guardados con éxito',
        'type' => 'success']);
    }
    
    public function sendMail(Request $request){

        $cc = DB::select("SELECT * 
        FROM master_ese_email_settings mees 
        INNER JOIN master_ese_email_templates meet
        ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
        WHERE mees.Modulo = 'ENVIO-ENCUESTA-USUARIO'");


        $direccion = $request->input('correoin');
        $titulo = $cc[0]->TituloEmail;
        $nombre = $request->input('nombrein');
        $mensaje = $request->input('mensajein');
        $IdPersonal = $request->idPersonal;
        $footer = $cc[0]->FooterEmail;

        $updatee = DB::table('ev_servicio_detalle')->where('IdPersonal', $IdPersonal)->update(
            array(
                "lNotifica" => 'Si'
            )     
        );

        $correo = MasterConsultas::exeSQL("ev_conf_mail", "READONLY",
        array(
            "IdMail" => '-1'
        )
        );
        $encuestas = MasterConsultas::exeSQL("ev_encuesta_link", "READONLY",
        array(
            "IdEncuesta" => '-1'
        )
        );
        foreach($correo as $co){
            $desc=$co->Descripcion;
        }
        $descEnc="";
        foreach($encuestas as $en){
            $descEnc=$descEnc.
            "<br><br>
            <strong>".$en->Descripcion.": </strong>".
            $en->Detalle.
            "<br>".$en->Link;
        }
        $contenido = "Hola ".$nombre.".<br>".$mensaje;
        $correo = new Notificaciones;

        $correo = $correo->send_phpMailerEncuesta($direccion,$nombre,$titulo,$contenido,$footer);

        return response()->json(['mensaje'=>"correo enviado"]);
    }
    public function filtrar(Request $request){
        $filtro = $request->input('filtro');
        $idCliente = $request->input('idcliente');
        $idPeriodo = $request->input('idperiodo');

        $centros = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$idCliente." and es.IdPeriodo = ".$idPeriodo);

        if($filtro=='Finalizado' || $filtro=='Pendiente'){
            $datosP=DB::select("SELECT p.IdPersonal, Nombre, Correo, Telefono, IdCentroTrabajo FROM ev_personal p INNER JOIN ev_servicio_detalle sd ON p.IdPersonal=sd.IdPersonal WHERE Estatus='".$filtro."' GROUP BY p.IdPersonal, Estatus HAVING COUNT(*)>1");
        }else{
            $datosP=DB::select("SELECT p.IdPersonal, Nombre, Correo, Telefono, IdCentroTrabajo FROM ev_personal p INNER JOIN ev_servicio_detalle sd ON p.IdPersonal=sd.IdPersonal WHERE Estatus='".$filtro."' GROUP BY p.IdPersonal, Estatus HAVING COUNT(*)>1 
            UNION 
            SELECT p.IdPersonal, Nombre, Correo, Telefono, IdCentroTrabajo FROM ev_personal p INNER JOIN ev_servicio_detalle sd ON p.IdPersonal=sd.IdPersonal WHERE Estatus='Finalizado' OR Estatus='Proceso' GROUP BY p.IdPersonal, Estatus HAVING COUNT(*)=1
            ORDER BY IdPersonal ASC;");
            //$datosP=DB::select("SELECT DISTINCT (p.IdPersonal), Nombre, Correo, Telefono, IdCentroTrabajo FROM ev_personal p INNER JOIN ev_servicio_detalle sd ON p.IdPersonal=sd.IdPersonal WHERE Estatus='".$filtro."';");
        }

        $total=0;
        $datos=array();
        foreach ($centros as $row){
            foreach ($datosP as $row2){
                if ($row->IdCentro == $row2->IdCentroTrabajo){
                    $datos[$total]=$row2;
                    $total++;
                }
            }
        }

        $correo = MasterConsultas::exeSQL("ev_conf_mail", "READONLY",
        array(
            "IdMail" => '-1'
        )
        );
        $encuestas = MasterConsultas::exeSQL("ev_encuesta_link", "READONLY",
        array(
            "IdEncuesta" => '-1'
        )
        );
        $servicio = DB::select("SELECT * FROM ev_servicio es WHERE es.IdCliente = ".$idCliente." AND es.IdPeriodo = ".$idPeriodo);
        foreach($servicio as $es){
            $IdServicio=$es->IdServicio;
        }
        $servCliente = DB::select("SELECT * FROM ev_servicio_cliente WHERE IdServicio = ".$IdServicio);
        $servDetalle = DB::select("SELECT * FROM ev_servicio_detalle");
        
        return response()->json(['datos'=>$datos, 'total'=>$total, 'centros'=>$centros, 'correo'=>$correo, 'encuestas'=>$encuestas,'servCliente'=>$servCliente, 'servDetalle'=>$servDetalle, 'servicio'=>$servicio]);
    }

    public function sendMailGlobal(Request $request){
        /*$direccion = $request->input('correoin');*/

        $cc = DB::select("SELECT * 
        FROM master_ese_email_settings mees 
        INNER JOIN master_ese_email_templates meet
        ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
        WHERE mees.Modulo = 'ENVIO-ENCUESTA-USUARIO'");

        $titulo = $cc[0]->TituloEmail;
        $idCliente = $request->input('idCliente');
        $idPeriodo = $request->input('idPeriodo');
        $IdCentroTrabajo = $request->input('IdCentroTrabajo');
        $footer = $cc[0]->FooterEmail;

        $datos = DB::select("SELECT IdPersonal, Nombre, Correo FROM ev_personal WHERE IdCentroTrabajo = '".$IdCentroTrabajo."';");

        $correo = MasterConsultas::exeSQL("ev_conf_mail", "READONLY",
        array(
            "IdMail" => '-1'
        )
        );
        $encuestas = MasterConsultas::exeSQL("ev_encuesta_link", "READONLY",
        array(
            "IdEncuesta" => '-1'
        )
        );
        $servicio = DB::select("SELECT * FROM ev_servicio WHERE IdCliente = '".$idCliente."' AND IdPeriodo = '".$idPeriodo."';");
        $servCliente = DB::select("SELECT * FROM ev_servicio_cliente WHERE IdServicio = '".$servicio[0]->IdServicio."';");
        $servDetalle = DB::select("SELECT * FROM ev_servicio_detalle");

        $correoSend = new Notificaciones;

        foreach($datos as $row2){
            $nombre=$row2->Nombre;
            $direccion=$row2->Correo;
            $descLink="";

            if($direccion!=""){
            foreach ($servCliente as $sc){
                foreach ($servDetalle as $sd){
                    if ($sd->IdServicio_cliente==$sc->IdServicio_cliente){
                        if ($sd->IdPersonal==$row2->IdPersonal){
                            foreach ($encuestas as $enc){
                                if ($sd->IdEncuesta==$enc->IdEncuesta){
                                    $descLink=$descLink.'<br><b>'.$enc->Descripcion.': </b>'.$enc->Detalle.'<br><a href="'.$sd->Link.'">'.$sd->Link.'</a><br>';
                                }
                            }
                        }
                    }
                }
            }
            $descLink="Hola ".$nombre.".<br>".$cc[0]->CuerpoEmail.'<br>'.$descLink.'<br><br><b>Si llegas a tener un problema o sugerencia en cualquier momento puedes dirigirte al siguiente enlace Buzón de quejas y Sugerencias: </b><br><a href="'.$servicio[0]->LinkSugerencias.'">'.$servicio[0]->LinkSugerencias.'</a>';
            $correoSend->send_phpMailerEncuesta($direccion,$nombre,$titulo,$descLink,$footer,'');
            }
        }

        return response()->json(['mensaje'=>"correo enviado"]);
    }

    public function sendWhats(Request $request){
        $number = $request->input('telefonoV');
        $mensaje = $request->input('mensajeV');
        $sid    = "AC75ac9b5b69cb51b2a06375ddfd245e6d"; 
        $token  = "75599283f584e22b93d8e6ce96eed286"; 
        /*$twilio = new Client($sid, $token); 

        $message = $twilio->messages 
                  ->create("whatsapp:+521".$number, // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => $mensaje 
                           ) 
                  );
        */
        return response()->json(['mensaje'=>"mensaje enviado"]);
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
