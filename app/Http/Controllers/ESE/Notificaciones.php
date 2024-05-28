<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bussines\MasterConsultas;
use App\Exceptions\APIException;
use App\Utils\Log;
use Exception;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class Notificaciones extends Controller
{
  private $mcu;
  private $dbIndex;

  // public function __construct($index)
  // {
  //     $this->dbIndex = $index;
  //     $this->mcu = new MasterConsultasUtil($index);
  // }

  public function getEmailSettings($modulo, $idServicioEse){
      $emailSetting["Settings"] = [];
      $emailSetting["Recipients"] = [];
      $setting  = MasterConsultas::exeSQL("mob_ese_email_conf", "READONLY",
          array(
              "Modulo" => $modulo
          ));

      if(isset($setting) && count($setting) > 0)
      {

        //   $recipients  = MasterConsultas::exeSQL("mob_ese_email_recipients", "READONLY",
        //       array(
        //           "IdConfEmail" => $setting[0]->IdConfEmail
        //       ));
             
        //   if(isset($recipients) && count($recipients) > 0) {
              $emailSetting["Settings"] = $setting[0];
        //       $emailSetting["Recipients"] = $recipients;
 
        //   }
         
          $recipientsEse  = MasterConsultas::exeSQL("mob_labels_email_ese_def", "READONLY",
              array(
                  "IdServicioEse" => $idServicioEse
              ));

          if(isset($recipientsEse) && count($recipientsEse) > 0) {
              foreach ($recipientsEse as $ar) {
                  array_push($emailSetting["Recipients"], $ar);
              }
          }

      }

      return $emailSetting;


  }

  public function getEmailSettingsEncuesta($modulo, $idServicio){
    $emailSetting["Settings"] = [];
    $emailSetting["Recipients"] = [];
    $setting  = MasterConsultas::exeSQL("mob_ese_email_conf", "READONLY",
        array(
            "Modulo" => $modulo
        ));

    if(isset($setting) && count($setting) > 0)
    {

            $emailSetting["Settings"] = $setting[0];
 
        $recipientsEncuesta  = MasterConsultas::exeSQL("mob_labels_email_ese_def_encuesta", "READONLY",
            array(
                "IdServicio" => $idServicio
            ));

        if(isset($recipientsEncuesta) && count($recipientsEncuesta) > 0) {
            foreach ($recipientsEncuesta as $ar) {
                array_push($emailSetting["Recipients"], $ar);
            }
        }

    }

    return $emailSetting;


}

  public function getEmailSettingsUInv($modulo, $idusuario){
    $emailSetting["Settings"] = [];
    $emailSetting["Recipients"] = [];
    $setting  = MasterConsultas::exeSQL("mob_ese_email_conf", "READONLY",
        array(
            "Modulo" => $modulo
        ));

    if(isset($setting) && count($setting) > 0)
    {
       
       
       
        $emailSetting["Settings"] = $setting[0];
        $recipientsEse  = MasterConsultas::exeSQL("mob_labels_email_usuario_inv", "READONLY",
            array(
                "IdEmpleado" => $idusuario
            ));

        if(isset($recipientsEse) && count($recipientsEse) > 0) {
            foreach ($recipientsEse as $ar) {
                array_push($emailSetting["Recipients"], $ar);
            }
        }

    }

    return $emailSetting;


}

  public  function send_phpMailer($recipients,  $title, $content, $footer, $tipo='') {
      $pie=$footer;
      $mail = new PHPMailer(true);

      try {
        //Server settings
        #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();
        // $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
        
      //   $mail->SMTPOptions = array(
      //         'ssl' => array(
      //             'verify_peer' => false,
      //             'verify_peer_name' => false,
      //             'allow_self_signed' => true
      //         )
      //   );
           
        //$mail->SMTPDebug = 2;                                          // Send using SMTP
        $mail->Host       ="smtp.gmail.com"  ;#"smtp.gmail.com";                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = "valkyriefirewind@gmail.com"  ;#"soporte@gen-t.com.mx";                     // SMTP username
        $mail->Password   = "vwgq yvqb mrqk kpxw"  ;# "Gtvalkyrie&14";                               // SMTP password
        // $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;  
        $options = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );
      $mail->smtpConnect($options);                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above       
        //Recipients
        $mail->setFrom("valkyriefirewind@gmail.com" , utf8_decode('Gen-T ESE Notificaciones'));
        $mails = [];
        foreach ($recipients as $arecipient)
        {
          if($arecipient->Tipo == $tipo){
              array_push($mails, $arecipient->Email);
              if(($arecipient->Email != null) && ($arecipient->ModoEnvio == "Normal")) 
                  $mail->addAddress($arecipient->Email, $arecipient->NombreDestinatario);
              if(($arecipient->Email != null) && ($arecipient->ModoEnvio == "CC"))
                  $mail->addCC($arecipient->Email, $arecipient->NombreDestinatario);
              if(($arecipient->Email != null) && ($arecipient->ModoEnvio == "CCO"))
                  $mail->addBCC($arecipient->Email, $arecipient->NombreDestinatario);
          }
        }

      
        
        // Name is optional
      //   $mail->addReplyTo('info@example.com', 'Information');
      //   $mail->addCC('cc@example.com');
      //   $mail->addBCC('bcc@example.com');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  utf8_decode($title);
        $mail->Body    =  utf8_decode($content.'<footer class="page-footer font-small orange pt-4" style="margin-top:1.5rem!important;bottom:0;color: #fff;background-color:#ff9800;font-family:Roboto,sans-serif;font-size:15px;"><div class="container-fluid text-center text-md-left" style="text-align:center!important;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;text-align: center!important;"><div class="row" style="display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;"><div class="col-md-6 mt-md-0 mt-3" style="margin-top: 1rem!important;position: relative;width: 100%;padding-right: 15px;padding-left: 15px;"><h5 class="text-uppercase">INFORMACIÓN CONFIDENCIAL</h5><p>'.$pie.'</p></div></div></div></footer>');
        $mail->AltBody =  utf8_decode($content);

      //   $mail->send();
      if(!$mail->send()){
          Log::insert("No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
          $status="No se pudo enviar el mensaje. ";
      }else{
          Log::insert("Se envio el correo a ".implode($mails));    
          $status=true; 
      }
       return $status;   
    } catch (Exception $e) {
        Log::insert("No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
        throw new APIException( "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
    }
  }

  public function NotificarWeb($recipients,  $title, $content, $id,$idServicioEse){
    $notificacion=DB::select("select (MAX(IdNotificacion) + 1) as id from master_ese_notificaciones_web where IdAnio = year(Now())");
    $idNot=0;
    foreach ($notificacion as $g) {
      $idNot = $g->id;
    }

    $status=MasterConsultas::exeSQLStatement("insert_notificacion_web", "UPDATE",
        array(
            "IdNotificacion" => $idNot,
            "Titulo" => $title,
            "Mensaje" => $content,
            "IdUsuario" => $id,
            "Leido" => 0,
            "Url" => '',
            "IdEse"=>$idServicioEse
            )
    );

    if($status){
        return true;
    }else{
        return false;
    }
  }

  public function replaceDataLabels($idServicioEse, $data){
      $replace_labels = '';

      $response["body"]["data"]["rows"] = [];
 
      $msql = MasterConsultas::exeSQL(
          'mob_labels_email_ese',
          'READONLY',
          array("idServicioEse" => $idServicioEse),
          true
      );
      $nameUserLog=Auth::user()->name." ".Auth::user()->apellido_paterno." ".Auth::user()->apellido_materno;
      $replace_labels = $data;
      $replace_labels = str_replace("{IdServicioEse}","$idServicioEse", $replace_labels);
      $replace_labels = str_replace("{Usuario}","$nameUserLog", $replace_labels);
      if (isset($msql[0]->jsonresult))
      {
           $obj = str_replace("DOBLE_PUNTO",":",$msql[0]->jsonresult);# json_decode($msql[0], TRUE);
          
            $obj = preg_replace("/[\r\n]+/", " ", $obj);
            //$obj = json_encode($obj);
            $data = json_decode($obj,true);
         
       

        $datos = DB::select("SELECT
        ms.*, mc.nombre_comercial AS Cliente,
        mm.descripcion AS Modalidad,
        CONCAT((SELECT
            descripcion
          FROM master_ese_tiposervicio AS tp
          WHERE tp.IdTipoServicio = mp.IdTipoServicio), ' ',
        IFNULL((SELECT
            CONCAT(' - ', tp.Tipos)
          FROM master_ese_tipos AS tp
          WHERE tp.IdTipos = mp.IdTipos), '')
        ) AS servicio,
        (SELECT
            os.IdServicioOS
          FROM master_ese_srv_os AS os
          WHERE os.IdServicioSRV = ms.IdServicioEse) AS os,
        mpr.descripcion AS Prioridad,
        mp.DescripcionPlantilla AS Formato,
        CONCAT((SELECT
            CAST(mese.ValorCargado AS char) AS Candidato
          FROM master_ese_srv_entrada AS mese
          WHERE mese.IdServicioEse = ms.IdServicioEse
          AND mese.IdEntrada = 1), ' ', (SELECT
            CAST(mese.ValorCargado AS char) AS Candidato
          FROM master_ese_srv_entrada AS mese
          WHERE mese.IdServicioEse = ms.IdServicioEse
          AND mese.IdEntrada = 497), ' ', (SELECT
            CAST(mese.ValorCargado AS char) AS Candidato
          FROM master_ese_srv_entrada AS mese
          WHERE mese.IdServicioEse = ms.IdServicioEse
          AND mese.IdEntrada = 498)) AS Candidato,
        a.IdInvestigador,
        mee.IdEmpleado,
        u.id IdUsuario ,
        CONCAT(mee.nombre, ' ', IFNULL(mee.ApellidoPaterno, ''), ' ', IFNULL(mee.ApellidoMaterno, '')) AS Investigador,
        (SELECT
            CONCAT(e.name, ' ', IFNULL(e.apellido_paterno, ''), ' ', IFNULL(e.apellido_materno, ''))
          FROM users AS e
          WHERE e.id = a.IdAnalista) AS Analista,
          (SELECT
            CONCAT(e.name, ' ', IFNULL(e.apellido_paterno, ''), ' ', IFNULL(e.apellido_materno, ''))
          FROM users AS e
          WHERE e.id = a.IdAnalistasec) AS AnalistaSec,
          (SELECT
            CONCAT(e.name, ' ', IFNULL(e.apellido_paterno, ''), ' ', IFNULL(e.apellido_materno, ''))
          FROM users AS e
          WHERE e.id = a.IdLider) AS Lider,
        CONCAT(cn.nombre, ' (', cn.nomenclatura, ')') AS centro_negocio
      FROM master_ese_srv_servicio AS ms
        INNER JOIN clientes mc
          ON mc.id = ms.IdCliente
        INNER JOIN centros_negocio cn
          ON mc.id_cn = cn.id
        INNER JOIN master_ese_plantilla_cliente mcl
          ON mcl.IdPlantillaCliente = ms.IdPlantillaCliente
        INNER JOIN master_ese_plantilla mp
          ON mp.IdPlantilla = mcl.IdPlantilla
        LEFT JOIN master_ese_modalidad mm
          ON mm.IdModalidad = ms.IdModalidad
        LEFT JOIN master_ese_prioridades mpr
          ON mpr.IdPrioridad = ms.IdPrioridad
        LEFT JOIN master_ese_srv_asignacion AS a
          ON a.IdServicioEse = ms.IdServicioEse
        left join master_ese_empleado mee on mee.IdEmpleado = a.IdInvestigador 
        left join users u on u.IdEmpleado = mee.IdEmpleado where ms.IdServicioEse=?",[$idServicioEse]); 
          
          foreach($datos as $value)
          {
                     
                  $replace_labels = str_replace("{Analista}",$value->Analista, $replace_labels);
                  $replace_labels = str_replace("{Investigador}",$value->Investigador, $replace_labels);
                  $replace_labels = str_replace("{AnalistaSec}",$value->AnalistaSec, $replace_labels);
                  $replace_labels = str_replace("{Cliente}",$value->Cliente, $replace_labels);
                  $replace_labels = str_replace("{Lider}",$value->Lider, $replace_labels);
          }
        
          $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? AND mee.Formato NOT LIKE '%Matriz%' AND 
          mee.Formato NOT IN ('PDF', 'JPEG');",[$idServicioEse]);

        foreach($resultActual as $value)
        {
            $replace_labels = str_replace("{".$value->CampoNombre."}",$value->ValorCargado, $replace_labels);
        }
        
        
        $FE = DB::select ("SELECT IF(mesp.FechaEjecucion IS NULL, 'No fecha ejecucion', concat(DATE_FORMAT(mesp.FechaEjecucion, '%d/%m/%Y'),' a las ',time(mesp.FechaEjecucion))) AS FechaEjecucion FROM 
        master_ese_srv_programacion mesp WHERE mesp.IdServicioEse = ?",[$idServicioEse] );

        if(isset($FE[0]->FechaEjecucion))
          $replace_labels = str_replace("{FechaEjecucion}",$FE[0]->FechaEjecucion,$replace_labels);
        
      }

     
      return $replace_labels;

  }

  public function replaceDataLabelsEncuesta($idServicio, $data){
    $replace_labels = '';

    $response["body"]["data"]["rows"] = [];

    // $msql = MasterConsultas::exeSQL("mob_labels_email_encuesta", "READONLY",
    // array(
    //         "idServicio" => $idServicio
    //     )
    // );

    $msql = DB::select('SELECT  
    CONCAT("{",
    CONCAT("""Cliente""","DOBLE_PUNTO","""", IF(mc.nombre_comercial IS NULL, "", mc.nombre_comercial) , """") 
    ,"}")    
    AS jsonresult 
    FROM  
    ev_servicio mess
    INNER JOIN clientes mc ON mess.IdCliente = mc.id      
    WHERE  
        mess.IdServicio = '.$idServicio.'
    GROUP BY mess.IdServicio');

    $replace_labels = $data;

    if (isset($msql[0]->jsonresult))
    {
         $obj = str_replace("DOBLE_PUNTO",":",$msql[0]->jsonresult);# json_decode($msql[0], TRUE);
        //  Log::insert("obj: {$obj}");
          $obj = preg_replace("/[\r\n]+/", " ", $obj);
          //$obj = json_encode($obj);
          $data = json_decode($obj);
        //   Log::insert("data: {$data}");
        //  $data = is_array($data) ? $data : array($data);
        foreach($data as $key => $value)
        {
            $replace_labels = str_replace("{".$key."}","$value", $replace_labels);
        }

    }

   
    return $replace_labels;

}

  public function notificaUsuarios($idServicioEse,$modulo,$tipo,$id_user=''){

      $emailSettings = $this->getEmailSettings($modulo, $idServicioEse);

      if($emailSettings["Settings"] != []) {
          
        
          $titulo      = $emailSettings["Settings"]->TituloEmail;
          $cuerpo      = $emailSettings["Settings"]->CuerpoEmail;
          $descripcion = $emailSettings["Settings"]->DescripcionPlantilla;
          $footer = $emailSettings["Settings"]->FooterEmail;

          #Poner aquí la logica para reemplazar las variables del email y el titulo
           $titulo         = $this->replaceDataLabels($idServicioEse, $titulo);
           $titulo         = $this->replaceDataLabels($idServicioEse, $titulo);
           $cuerpo         = $this->replaceDataLabels($idServicioEse, $cuerpo);
           $descripcion    = $this->replaceDataLabels($idServicioEse, $descripcion);
          
          #Despues de reemplazar, enviar el Email
          if($emailSettings["Settings"]->Notificacion == "Si"){

                        $this->NotificarWeb($emailSettings["Recipients"], $titulo, $descripcion, $id_user,$idServicioEse);
          }

          if($emailSettings["Settings"]->Correo == "Si"){
             $this->send_phpMailer($emailSettings["Recipients"], $titulo, $cuerpo, $footer, $tipo);
          }

          

         
          return array(
              "valido" => true
          );
      }else{
       
          return array(
              "valido" => false
          );
      }
  }

  public function notificaUsuariosInv($idusuario,$modulo,$tipo,$id_user=''){

    $emailSettings = $this->getEmailSettingsUInv($modulo, $idusuario);
    
// return $emailSettings["Settings"]->CuerpoEmail;
    if($emailSettings["Settings"] != []) {
        $titulo      = $emailSettings["Settings"]->TituloEmail;
        $cuerpo      = $emailSettings["Settings"]->CuerpoEmail;
        $descripcion = $emailSettings["Settings"]->DescripcionPlantilla;
        $footer = $emailSettings["Settings"]->FooterEmail;
        

        #Poner aquí la logica para reemplazar las variables del email y el titulo
         $titulo         = $this->replaceDataLabels($idusuario, $titulo);
         $cuerpo         = $this->replaceDataLabels($idusuario, $cuerpo);
         $descripcion    = $this->replaceDataLabels($idusuario, $descripcion);
         $cuerpo = $this->replaceParameters(array("NombreDestinatario" => $emailSettings['Recipients'][0]->NombreDestinatario,
                                                                "username" => $emailSettings['Recipients'][0]->username,
                                                                "password_aux" => $emailSettings['Recipients'][0]->password_aux
                                                                ),$cuerpo);
        #Despues de reemplazar, enviar el Email
      $status='';
        if($emailSettings["Settings"]->Correo == "Si"){
              
            $status=$this->send_phpMailer($emailSettings["Recipients"], $titulo, $cuerpo, $footer, $tipo);
        }


     return $status;  
    }else{
        return false;
    }
}
  //envio de correo para el modulo de Nuevo/Solicitar Servicio
 
 
    //envio de correo para el modulo de Nuevo/Solicitar Servicio Encuesta
    public function notificationRequestServiceEncuesta($idServicio,$modulo,$tipo,$id_user=''){

        $emailSettings = $this->getEmailSettingsEncuesta($modulo, $idServicio);
  
        if($emailSettings["Settings"] != []) {
            $titulo      = $emailSettings["Settings"]->TituloEmail;
            $cuerpo      = $emailSettings["Settings"]->CuerpoEmail;
            $descripcion = $emailSettings["Settings"]->DescripcionPlantilla;
            $footer = $emailSettings["Settings"]->FooterEmail;
            
  
            #Poner aquí la logica para reemplazar las variables del email y el titulo
             $titulo         = $this->replaceDataLabelsEncuesta($idServicio, $titulo);
             $cuerpo         = $this->replaceDataLabelsEncuesta($idServicio, $cuerpo);
             $descripcion    = $this->replaceDataLabelsEncuesta($idServicio, $descripcion);
            #Despues de reemplazar, enviar el Email
            // Log::insert("tituloR: {$titulo}");
        //    var_dump($cuerpo);
            // Log::insert("descripcionR: {$descripcion}");

            if($emailSettings["Settings"]->Correo == "Si"){
               $this->send_phpMailer($emailSettings["Recipients"], $titulo, $cuerpo, $footer, $tipo);
            }
  
            // if($emailSettings["Settings"]->Notificacion == "Si"){
  
            //     $this->NotificarWeb($emailSettings["Recipients"], $titulo, $descripcion, $id_user,$idServicio);
            // }
  
           
            return array(
                "valido" => true
            );
        }else{
         
            return array(
                "valido" => false
            );
        }
    }

   /**
   * @param string $nameSql
   * @param array $parameters
   * @return array
   */
  public function getEmailSettingsForService($nameSql,$parameters){
    $emailSetting["Settings"] = [];
    $setting  = MasterConsultas::exeSQL($nameSql, "READONLY",$parameters);
    $emailSetting["Settings"] = $setting;
    return $emailSetting;
  }
   /**
   * 
   * @param array $replace
   * @param string $content
   * @return string
   */
  public function replaceParameters($replace,$content){
    $result = "";
    foreach ($replace as $key => $value) {
        $content = str_replace('{'.$key.'}',"$value",$content); 
    }
    return $result = $content;
  }
   /**
   * @param array $recipients
   * @param string $title
   * @param string $content
   */
  public  function send_email($recipients,  $title, $content, $footer, $tipo='') {
    $pie=$footer;
    $mail = new PHPMailer(true);

    try {
        //Server settings
        #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
       
        //$mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = "smtp.gmail.com"  ;#"smtp.gmail.com";                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = "valkyriefirewind@gmail.com"  ;#"soporte@gen-t.com.mx";                     // SMTP username
        $mail->Password   = "vwgq yvqb mrqk kpxw"  ;# "Gtvalkyrie&14";                               // SMTP password
        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $options = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->smtpConnect($options); 
        //Recipients
        $mail->setFrom("valkyriefirewind@gmail.com" , utf8_decode('Gen-T ESE Notificaciones'));
        $recipient="";
       
            
             
        
        // $mail->addAddress($recipients['email'], $recipients['nombre']);

        // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  utf8_decode($title);
        $mail->Body    =  utf8_decode($content.'<footer class="page-footer font-small orange pt-4" style="margin-top:1.5rem!important;bottom:0;color: #fff;background-color:#ff9800;font-family:Roboto,sans-serif;font-size:15px;"><div class="container-fluid text-center text-md-left" style="text-align:center!important;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;text-align: center!important;"><div class="row" style="display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;"><div class="col-md-6 mt-md-0 mt-3" style="margin-top: 1rem!important;position: relative;width: 100%;padding-right: 15px;padding-left: 15px;"><h5 class="text-uppercase">INFORMACIÓN CONFIDENCIAL</h5><p>'.$pie.'</p></div></div></div></footer>');
        $mail->AltBody =  utf8_decode($content);

        $mail->send();
        // echo 'Message has been sent';
        return $recipient;
    } catch (Exception $e) {
        throw new APIException( "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
    }
  }
/**
 * @param string $modulo
 * @param array $paramRemplace
 * @param array $recipients
 * @return array
 */
  public function sendNotification($modulo,$paramRemplace,$recipients){
    $response['isSendEmail'] = false;
    $response['message'] = "";
    $contentEmail = "";
    $titleEmail = "";
    $recipient = [];
    try {
        $settings = $this->getEmailSettingsForService("get_settings_email_ese",array("Modulo" => $modulo));
        foreach ($settings as $key => $content) {
            foreach ($content as $key => $value) {
                $contentEmail = $this->replaceParameters($paramRemplace, $value->CuerpoEmail);
                $titleEmail = $value->TituloEmail;
                $footerEmail = $value->FooterEmail;
            }
        }
        foreach ($recipients as $key => $content) {
            foreach ($content as $key => $value) {
                if(gettype($value) == "array")
                    $value = (object)$value;
                array_push($recipient,array("nombre" =>$value->nombre,"email"=>$value->email));
            }
        }
        $email = $this->send_email($recipient,$titleEmail,$contentEmail,$footerEmail);
        $response['isSendEmail'] = true;
        $response['message'] = "Se envió con éxito el correo";
        return $response;
    } catch (\Exception $e) {
        // $response['message'] = "Ocurrió un error en el envio del correo, error: ".$e->getMessage();
        $response['message'] = "No se pudo enviar el mensaje. Intente nuevamente.".$e->getMessage();
        return $response;
    }

  }

  public function notificaUsuariosCred($modulo,$tipo,$id_user){

    $emailSettings = $this->getEmailSettingsCred($modulo,$id_user, $tipo);

    if($emailSettings["Settings"] != []) {
        
      
        $titulo      = $emailSettings["Settings"]->TituloEmail;
        $cuerpo      = $emailSettings["Settings"]->CuerpoEmail;
        $descripcion = $emailSettings["Settings"]->DescripcionPlantilla;
        $footer = $emailSettings["Settings"]->FooterEmail;

        #Poner aquí la logica para reemplazar las variables del email y el titulo
        
        $titulo         = $this->replaceDataLabelsCred($id_user, $titulo);
        $cuerpo         = $this->replaceDataLabelsCred($id_user, $cuerpo);
        $descripcion    = $this->replaceDataLabelsCred($id_user, $descripcion);
        
        #Despues de reemplazar, enviar el Email

        if($emailSettings["Settings"]->Correo == "Si"){
           $this->send_phpMailer($emailSettings["Recipients"], $titulo, $cuerpo, $footer, $tipo);
        }

        return array(
            "valido" => true
        );

    }else{
        return array(
            "valido" => false
        );
    }
} 

public function getEmailSettingsCred($modulo, $id_user, $tipo){
  $emailSetting["Settings"] = [];
  $emailSetting["Recipients"] = [];
  $setting  = MasterConsultas::exeSQL("mob_ese_email_conf", "READONLY",
      array(
          "Modulo" => $modulo
      ));

  if(isset($setting) && count($setting) > 0)
  {

          $emailSetting["Settings"] = $setting[0];
          
          $clt = DB::select("SELECT u.email as Email, 'Cliente' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM users u where u.IdCliente  = $id_user");
          
          

          if($tipo == "Cliente"){
            array_push($emailSetting["Recipients"], $clt[0]);
          }elseif ($tipo == "Ejecutivo"){
            $cliente = DB::select("select * from clientes where id = $id_user");
            $ejecutivo = DB::select("SELECT u.email as Email, 'Ejecutivo' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM users u where  u.id = ".$cliente[0]->id_ejecutivo);
            array_push($emailSetting["Recipients"], $ejecutivo[0]);
          }
  }

  return $emailSetting;


}

public function replaceDataLabelsInci($ids, $data){
  
  $replace_labels = $data;

    $servicio = DB::select("select * from eis_servicios where id= $ids");
    
    $value1 = DB::select("select * from clientes where id = ".$servicio[0]->IdClientes );
    $value2 = DB::select("SELECT u.email as Email, 'Ejecutivo' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM users u where  u.id = ".$servicio[0]->Id_analista);
    $value3 = DB::select("SELECT * from eis_servicio_detalle where IdServicio = $ids" );

 
    $replace_labels = str_replace("{Analista}",$value2[0]->NombreDestinatario, $replace_labels);
    $replace_labels = str_replace("{cliente}",$value1[0]->nombre_comercial, $replace_labels);
    $replace_labels = str_replace("{solicitante}",$value3[0]->Candidato, $replace_labels);
    
    return $replace_labels;
}


public function notificaUsuariosInci($modulo,$tipo,$ids){

  $emailSettings = $this->getEmailSettingsInci($modulo,$ids, $tipo);

  if($emailSettings["Settings"] != []) {
      
    
      $titulo      = $emailSettings["Settings"]->TituloEmail;
      $cuerpo      = $emailSettings["Settings"]->CuerpoEmail;
      $descripcion = $emailSettings["Settings"]->DescripcionPlantilla;
      $footer = $emailSettings["Settings"]->FooterEmail;

      #Poner aquí la logica para reemplazar las variables del email y el titulo
      
      $titulo         = $this->replaceDataLabelsInci($ids, $titulo);
      $cuerpo         = $this->replaceDataLabelsInci($ids, $cuerpo);
      $descripcion    = $this->replaceDataLabelsInci($ids, $descripcion);

      #Despues de reemplazar, enviar el Email

      if($emailSettings["Settings"]->Correo == "Si"){
        $this->send_phpMailer($emailSettings["Recipients"], $titulo, $cuerpo, $footer, $tipo);
      }

      return array(
          "valido" => $emailSettings
      );

  }else{
      return array(
          "valido" => false
      );
  }
} 

public function getEmailSettingsInci($modulo, $ids, $tipo){
$emailSetting["Settings"] = [];
$emailSetting["Recipients"] = [];
$setting  = MasterConsultas::exeSQL("mob_ese_email_conf", "READONLY",
    array(
        "Modulo" => $modulo
    ));

if(isset($setting) && count($setting) > 0)
{

        $emailSetting["Settings"] = $setting[0];
        
        $servicio = DB::select("select * from eis_servicios where id= $ids");
         
        

        if($tipo == "Cliente"){
          $cliente = DB::select("SELECT u.email as Email, 'Cliente' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM users u where u.IdCliente  = ".$servicio[0]->IdClientes);
          array_push($emailSetting["Recipients"], $cliente[0]);
        }elseif ($tipo == "Ejecutivo"){
          $ejecutivo = DB::select("SELECT u.email as Email, 'Ejecutivo' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM users u where u.Id  = ".$servicio[0]->Id_analista);
          array_push($emailSetting["Recipients"], $ejecutivo[0]);
        }
}

return $emailSetting;


}

public function replaceDataLabelsCred($idc, $data){

$replace_labels = $data;

  
  $value1 = DB::select("select * from clientes where id = $idc" );
  $value2 = DB::select("SELECT u.email as Email, 'Ejecutivo' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM users u where  u.id = ".$value1[0]->id_ejecutivo);
          
  $replace_labels = str_replace("{Analista}",$value2[0]->NombreDestinatario, $replace_labels);
  $replace_labels = str_replace("{cliente}",$value1[0]->nombre_comercial, $replace_labels);

  return $replace_labels;
}

public function sendNotificationAccion($cuerpo, $pie, $asunto, $id, $path='', $name ='', $correo){
      $mail = new PHPMailer(true);

      try {
        $mail->isSMTP();
                                             // Send using SMTP
        $mail->Host       ="smtp.gmail.com"  ;#"smtp.gmail.com";                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = "valkyriefirewind@gmail.com"  ;#"soporte@gen-t.com.mx";                     // SMTP username
        $mail->Password   = "vwgq yvqb mrqk kpxw"  ;# "Gtvalkyrie&14";                               // SMTP password
        // $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;  
        $options = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );
      $mail->smtpConnect($options);                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above       
        //Recipients
        $mail->setFrom("valkyriefirewind@gmail.com" , utf8_decode('DSAIX Notificaciones'));
        $mails = [];
        
        $cliente = DB::select("select u.email as Mail, c.nombre_comercial as name from users u inner join clientes c on u.idCliente = c.id where c.id = $id");

        $mail->addAddress($correo, $cliente[0]->name);

        if( ($path != '' && $name != '') && ($path !=NULL && $name != NULL))  
          $mail->AddAttachment( $path, $name);
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  utf8_decode($asunto);
        $mail->Body    =  utf8_decode($cuerpo.'<footer class="page-footer font-small orange pt-4" style="margin-top:1.5rem!important;bottom:0;color: #fff;background-color:#ff9800;font-family:Roboto,sans-serif;font-size:15px;"><div class="container-fluid text-center text-md-left" style="text-align:center!important;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;text-align: center!important;"><div class="row" style="display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;"><div class="col-md-6 mt-md-0 mt-3" style="margin-top: 1rem!important;position: relative;width: 100%;padding-right: 15px;padding-left: 15px;"><h5 class="text-uppercase">INFORMACIÓN CONFIDENCIAL</h5><p>'.$pie.'</p></div></div></div></footer>');
        $mail->AltBody =  utf8_decode($cuerpo);

      //   $mail->send();
      if(!$mail->send()){
          Log::insert("No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
          $status="No se pudo enviar el mensaje. ";
      }else{
          Log::insert("Se envio el correo a ".implode($mails));    
          $status=true; 
      }
       return $status;   
    } catch (Exception $e) {
        Log::insert("No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
        throw new APIException( "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}");
    }
  }
}