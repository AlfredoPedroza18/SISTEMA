<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Encryption\DecryptException;
use Crypt;
use App\Http\Controllers\Encuestas\Notificaciones;

class StartEncuestaController extends Controller
{
    public function startEncuesta($IdEncuesta, $IdServicioCliente,$codigoUnico){
   
        $datosEncuesta = DB::select('select * from ev_encuesta where IdEncuesta='.$IdEncuesta);

        $datosServicioCliente = DB::select('select * from ev_servicio_cliente where IdServicio_cliente='.$IdServicioCliente);

        $datosServicio = DB::select('select * from ev_servicio where IdServicio='.$datosServicioCliente[0]->IdServicio);

        $datosCliente = DB::select('select * from clientes where id='.$datosServicio[0]->IdCliente);

        $datosPeriodo = DB::select('select * from ev_periodos where IdPeriodo='.$datosServicio[0]->IdPeriodo);

        $personal = DB::select('select IdPersonal from ev_servicio_detalle where CodigoUnico="'.$codigoUnico.'"');
        
        foreach($personal as $per){
            $IdPersonal=$per->IdPersonal;
        }

        $centro = DB::select('SELECT * FROM ev_servicio_detalle ed INNER JOIN ev_servicio_cliente ec ON ed.IdServicio_cliente = ec.IdServicio_cliente WHERE IdPersonal ='.$IdPersonal);

        foreach($centro as $cen){
            $IdCentro =$cen->IdCentro;
        }

        $datosPersonal=DB::select('select * from ev_personal where IdPersonal='.$IdPersonal);

        
        $IdCliente = $datosCliente[0]->id;
        $IdEncuesta = $IdEncuesta;

        $IdServicioDetalle = DB::select('SELECT * FROM ev_servicio_detalle WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);

        foreach($IdServicioDetalle as $row){
            $Estatus = $row->Estatus;
        }

        $politica = MasterConsultas::exeSQL("ev_politica_cliente", "READONLY",
            array(
                "idCliente" => $IdCliente
            )
        );

        $encuesta = DB::select("SELECT ee.IdEncuesta, ee.Descripcion FROM ev_encuesta ee;");

        if($IdEncuesta == 12){
            $tamanoo = 0;
            $numrespuestas = DB::select('SELECT ep.IdGenero,ep.IdRango,ep.IdEstadoCivil,ep.IdNivelEstudio,ep.IdPuestoCliente,ep.IdTipoPuesto,ep.IdDeptoCliente,ep.IdCentroTrabajo,ep.IdTipoContrato,ep.IdTipoPersonal,ep.IdTipoJornada,ep.IdAntiguedad,ep.IdExperiencia,ep.RolaTurno FROM ev_personal ep WHERE IdPersonal = '.$IdPersonal);
            $row = $numrespuestas;
            foreach($numrespuestas as $row){
                if($row->IdGenero != "" || $row->IdGenero != null){
                    $tamanoo = $tamanoo + 1;
                    if($row->IdRango != "" || $row->IdRango != null){
                        $tamanoo = $tamanoo + 1;
                        if($row->IdEstadoCivil != "" || $row->IdEstadoCivil != null){
                            $tamanoo = $tamanoo + 1;
                            if($row->IdNivelEstudio != "" || $row->IdNivelEstudio != null){
                                $tamanoo = $tamanoo + 1;
                                if($row->IdPuestoCliente != "" || $row->IdPuestoCliente != null){
                                    $tamanoo = $tamanoo + 1;
                                    if($row->IdTipoPuesto != "" || $row->IdTipoPuesto != null){
                                        $tamanoo = $tamanoo + 1;
                                        if($row->IdDeptoCliente != "" || $row->IdDeptoCliente != null){
                                            $tamanoo = $tamanoo + 1;
                                            if($row->IdCentroTrabajo != "" || $row->IdCentroTrabajo != null){
                                                $tamanoo = $tamanoo + 1;
                                                if($row->IdTipoContrato != "" || $row->IdTipoContrato != null){
                                                    $tamanoo = $tamanoo + 1;
                                                    if($row->IdTipoPersonal != "" || $row->IdTipoPersonal != null){
                                                        $tamanoo = $tamanoo + 1;
                                                        if($row->IdTipoJornada != "" || $row->IdTipoJornada != null){
                                                            $tamanoo = $tamanoo + 1;
                                                            if($row->IdAntiguedad != "" || $row->IdAntiguedad != null){
                                                                $tamanoo = $tamanoo + 1;
                                                                if($row->IdExperiencia != "" || $row->IdExperiencia != null){
                                                                    $tamanoo = $tamanoo + 1;
                                                                    if($row->RolaTurno != "" || $row->RolaTurno != null){
                                                                        $tamanoo = $tamanoo + 1;
                                                                    } 
                                                                } 
                                                            } 
                                                        } 
                                                    } 
                                                } 
                                            } 
                                        } 
                                    } 
                                } 
                            } 
                        } 
                    } 
                } 
            }

            if($tamanoo >= 13){
                $numrespuestas = DB::select('SELECT * FROM ev_personal_encuesta WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);
                $tamanoo = $tamanoo + count($numrespuestas);
            }
        }else{
            $numrespuestas = DB::select('SELECT * FROM ev_personal_encuesta WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);
            $tamanoo = count($numrespuestas);
        }

        $entorno = DB::select('select * from ev_personal_encuesta ep WHERE IdEncuesta = 12 AND IdPersonal = '.$IdPersonal.' AND IdRespuestaDet = 17');

        $cuenta = count($entorno);

        $img=DB::select('select * from ev_img_cliente where IdCliente='. $IdCliente);

        $arrayvacio=empty($img);

        if($arrayvacio === true){
            $img=DB::select('select * from ev_img_cliente where IdCliente= 8');
        }      

        foreach($datosEncuesta as $e){
            $archivobienvenida=$e->ImgBienvenida;
        }

        foreach($img as $p){
            $archivoimg=$p->Imagen;
        }

        $imgbienvenida = $archivobienvenida;

        $imagen = base64_encode($archivoimg);

        $background_image_url="url(".$imagen.")";

        
        return view("Encuestas.encuestas.start",
        ["IdEncuesta"=>$IdEncuesta,
        "datosEncuesta"=>$datosEncuesta,
        "datosCliente"=>$datosCliente,
        "datosPeriodo" => $datosPeriodo,
        "codigoUnico"=>$codigoUnico,
        "IdPersonal"=>$IdPersonal,
        "encuesta"=>$encuesta,
        "politica"=>$politica,
        "background_image_url"=>$background_image_url,
        "imagen"=>$imagen,
        "imgbienvenida"=>$imgbienvenida,
        "tamano"=>$tamanoo,
        "cuenta"=>$cuenta,
        "Estatus"=>$Estatus,
        "IdCliente"=>$IdCliente,
        "IdCentro"=>$IdCentro,
        "datosPersonal"=>$datosPersonal]);
    }

    public function getPreguntas(Request $request){
        $IdEncuesta = $request->IdEncuesta;
        $IdPersonal = $request->IdPersonal;

        $preguntas = MasterConsultas::exeSQL("ev_preguntas_encuestas", "READONLY",
            array(
                "IdEncuesta" => $IdEncuesta
            )
        );

        $condicionadas = DB::select('SELECT * FROM ev_personal_encuesta ee WHERE ee.IdEncuesta = '.$IdEncuesta.' AND ee.IdPersonal = '.$IdPersonal);

        $respuesta = MasterConsultas::exeSQL("ev_grupo_preguntass", "READONLY",
            array(
                "IdEncuesta" => $IdEncuesta
            )
        );

        return response()->json(['data'=>$preguntas,'data2'=>$respuesta,'data3'=>$condicionadas]);
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

        $gruporespuestas = DB::select("SELECT er.IdRespuesta, er.Descripcion, erd.IdRespuestaDet, erd.IdGrupoRespuesta, erd.iValor FROM ev_respuesta er INNER JOIN ev_respuesta_detalle erd ON er.IdRespuesta = erd.IdRespuesta WHERE erd.IdGrupoRespuesta =".$IdGrupoRespuesta);
        $response = $request->response;

        return response()->json(['data'=>$gruporespuestas,'data2'=>$response]);
    }

    public function setRespuestas(Request $request){
        $IdGrupoRespuesta = $request->IdGrupoRespuesta;
        $IdCliente = $request->IdCliente;
        $IdPersonal = $request->IdPersonal;
        $campo = $request->campo;
        $terminado = $request->terminado;
        $IdEncuesta = $request->IdEncuesta;
        $respuesta = $request->respuesta;
        $pregunta = $request->pregunta;
        $proceso = "Proceso";
        $finalizado = "Finalizado";
        $dondeEntre = "";


        $IdServicioDetalle = DB::select('SELECT * FROM ev_servicio_detalle WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);
        
        if($terminado == 2){
            $updatee = DB::table('ev_servicio_detalle')->where('IdServicio_detalle', $IdServicioDetalle[0]->IdServicio_detalle)->update(
                array(
                    "Estatus"=>$proceso
                )     
            );
            $dondeEntre = $proceso;
        }

         
        if($terminado == 3){
            $updatee = DB::table('ev_servicio_detalle')->where('IdServicio_detalle', $IdServicioDetalle[0]->IdServicio_detalle)->update(
                array(
                    "Estatus"=>$finalizado
                )     
            );
            $dondeEntre = $finalizado;

        }

        $buscarRegistro = DB::select('select * from ev_personal where IdPersonal ='.$IdPersonal.' and IdCliente = '.$IdCliente);

        $arrayvacio = empty($buscarRegistro);

        if($arrayvacio==true){
            $respuestass = "No";
        }else{
            $updateTQ = DB::table('ev_personal')->where('IdPersonal',$IdPersonal)->update(
                array(
                    $campo=>$respuesta
                )     
            );
            $respuestass = "Si";
        }

        return response()->json(['data'=>$respuestass,'estatus'=>$dondeEntre]);
    }

    public function setRespuestasNormales(Request $request){
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $IdCentro =$request->IdCentro;
        $IdAgrupador = $request->IdAgrupador;
        $IdEncuesta = $request->IdEncuesta;
        $respuesta = $request->respuesta;
        $IdPersonal = $request->IdPersonal;
        $IdPregunta = $request->pregunta;
        $terminado = $request->terminado;
        $fechaEnvio = $request->fecha;
        $finalizadoo = "Finalizado";
        $proceso = "Proceso";
        $dondeEntre = "";

        $IdServicioDetalle = DB::select('SELECT * FROM ev_servicio_detalle WHERE IdPersonal ='.$IdPersonal.' and IdEncuesta = '.$IdEncuesta);

        $notificacion = new Notificaciones();
        $notificacionCliente = new Notificaciones();
        $notificacionAnalista = new Notificaciones();
        $notificacionFinServicio = new Notificaciones();
        $notificacionFinServicioEvaluado = new Notificaciones();
        
        if($respuesta != null){
            $buscarRegistro = DB::select('SELECT * FROM ev_respuesta_detalle WHERE IdRespuestaDet ='.$respuesta);
            foreach($buscarRegistro as $p){
                $iValor=$p->iValor;
            }

            $AltaTQ = MasterConsultas::exeSQLStatement("create_encuesta_respuestas", "UPDATE",
                array(
                    "IdEncuesta" => $IdEncuesta,
                    "IdCliente" => $IdCliente,
                    "IdCentro" => $IdCentro,
                    "IdPersonal"=>$IdPersonal,
                    "IdAgrupador" => $IdAgrupador,
                    "IdPregunta" =>$IdPregunta,
                    "IdPeriodo" => $IdPeriodo,
                    "IdRespuestaDet" => $respuesta,
                    "iValor" => $iValor
                )

            );
        }
        
        if($terminado == 2){
            $update = DB::table('ev_servicio_detalle')->where('IdServicio_detalle', $IdServicioDetalle[0]->IdServicio_detalle)->update(
                array(
                    "Estatus"=>$proceso
                )     
            );
            $dondeEntre = $proceso;
        }
        
        if($terminado == 3){
            $update2 = DB::table('ev_servicio_detalle')->where('IdServicio_detalle', $IdServicioDetalle[0]->IdServicio_detalle)->update(
                array(            
                    "FechaEnvío"=>$fechaEnvio,
                    "Estatus"=>$finalizadoo
                )     
            );
            $dondeEntre = $finalizadoo;

            $cc = DB::select("SELECT * 
            FROM master_ese_email_settings mees 
            INNER JOIN master_ese_email_templates meet
            ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
            WHERE mees.Modulo = 'FIN-LLENADO-ENCUESTA'");

            $ff = DB::select("SELECT * 
            FROM master_ese_email_settings mees 
            INNER JOIN master_ese_email_templates meet
            ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
            WHERE mees.Modulo = 'FIN-LLENADO-ENCUESTA-ANALISTA'");

            $datosClientes = DB::select("SELECT * FROM users us where us.IdCliente = ".$IdCliente);
            $nombreC = $datosClientes[0]->name;
            $direccionC = $datosClientes[0]->email;
            $cuerpoC = "Hola ".$nombreC.".<br>".$cc[0]->CuerpoEmail;

            $analista = DB::select("select mos.id_ejecutivo from master_ese_srv_os mos where mos.IdCliente = ".$IdCliente." and mos.id_ejecutivo <> ''");
            if(count($analista) > 0){
                $IdAnalista = $analista[0]->id_ejecutivo;

                $datosEjecutivos = DB::select("select u.id, CONCAT(u.`name`,' ',u.apellido_paterno,' ',u.apellido_materno) as nombre, u.email from users u where u.id= ".$IdAnalista); 
                $tituloFSA = $ff[0]->TituloEmail;
                $cuerpoFSA = $ff[0]->CuerpoEmail;
                $direccionFSA = $datosEjecutivos[0]->email;
                $nombreFSA = $datosEjecutivos[0]->nombre;

                $cuerpoFSA = str_replace("<<NOMBRE DEL ANALISTA>>", $datosEjecutivos[0]->nombre, $cuerpoFSA);
                $cuerpoFSA = str_replace("<<OS#>>", "Encuestas NOM 035", $cuerpoFSA);
                $cuerpoFSA = str_replace("<<NOMBRE CLIENTE>>", $nombreC, $cuerpoFSA);
            }

            $encFinalizadas = DB::select("SELECT esd.IdEncuesta,esd.Estatus,esd.IdPersonal from ev_servicio_detalle esd where esd.IdPersonal =".$IdPersonal." and esd.Estatus = 'Finalizado'");
            $dosenc = count($encFinalizadas);

            $datosPersonal = DB::select('select ep.Nombre,ep.Correo from ev_personal ep where ep.IdPersonal = '.$IdPersonal);
            $nombre = $datosPersonal[0]->Nombre;
            $direccion = $datosPersonal[0]->Correo;
            $titulo = $cc[0]->TituloEmail;
            $cuerpo = "Hola ".$nombre.".<br>".$cc[0]->CuerpoEmail;
            $footer = $cc[0]->FooterEmail;

            
            if($dosenc == 2){
                if(count($analista) > 0){
                    $notificacionAnalista = $notificacionAnalista->send_phpMailerEncuesta($direccionFSA,$nombreFSA,$tituloFSA,$cuerpoFSA,$footer,''); 
                }
            
                $notificacion = $notificacion->send_phpMailerEncuesta($direccion,$nombre,$titulo,$cuerpo,$footer,'');

                $notificacionCliente =  $notificacionCliente->send_phpMailerEncuesta($direccionC,$nombreC,$titulo,$cuerpoC,$footer,'');
            }

            
        }


        $respuestass = "Si";

        return response()->json(['data'=>$respuestass,'estatus'=>$dondeEntre]);
    }
}
