<?php



namespace App\Http\Controllers\Encuestas;



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



  public  function send_phpMailerEncuesta($recipients, $nombre, $title, $content, $footer, $tipo='') {

      $pie=$footer;

      $mail = new PHPMailer(true);



      try {

        //Server settings

        #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output

        $mail->isSMTP();

        // $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output           

        //$mail->SMTPDebug = 2;                                          // Send using SMTP

        $mail->Host       ="smtp.exchangeadministrado.com"  ;#"smtp.exchangeadministrado.com";                    // Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

        $mail->Username   = "webmail@gen-t.com.mx"  ;#"webmail@gen-t.com.mx";                     // SMTP username

        $mail->Password   = "WM22supervisado";# "WM22supervisado";                               // SMTP password

        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

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

        $mail->setFrom("webmail@gen-t.com.mx" , utf8_decode('NOM035 Notificaciones'));

        $mails = [];

        $mail->addAddress($recipients, $nombre);



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



    public function send_phpMailer($recipients, $title, $content, $footer, $tipo='') {

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

        $mail->Host       ="smtp.exchangeadministrado.com"  ;#"smtp.exchangeadministrado.com";                    // Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

        $mail->Username   = "webmail@gen-t.com.mx"  ;#"webmail@gen-t.com.mx";                     // SMTP username

        $mail->Password   = "WM22supervisado"  ;# "WM22supervisado";                               // SMTP password

        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

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

        $mail->setFrom("webmail@gen-t.com.mx" , utf8_decode('NOM035 Notificaciones'));

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

           $data = json_decode($obj);



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

           $cuerpo         = $this->replaceDataLabels($idServicioEse, $cuerpo);

           $descripcion    = $this->replaceDataLabels($idServicioEse, $descripcion);

          #Despues de reemplazar, enviar el Email



          if($emailSettings["Settings"]->Correo == "Si"){

             $this->send_phpMailer($emailSettings["Recipients"], $titulo, $cuerpo, $footer, $tipo);

          }



          if($emailSettings["Settings"]->Notificacion == "Si"){



              $this->NotificarWeb($emailSettings["Recipients"], $titulo, $descripcion, $id_user,$idServicioEse);

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

  public function notificationRequestService($modulos,$emailCliente,$emailCandidato,$emailLider){

      $isSendEmail = false;

      try {

            $settings = $this->getEmailSettingsForService("notification_ese_email_conf",array(

                                                            "cliente" => $modulos[0],

                                                            "candidato" => $modulos[1],

                                                            "lider" => $modulos[2]

                                                        ));

            $Cliente = "";

            $Candidato = "";

            $email="";

            $candidatos = [];

            foreach($emailCandidato as $key => $candidato){

                array_push($candidatos,$candidato['nombre']);

            }

            foreach($settings['Settings'] as $setting){

                if($setting->Modulo == $modulos[0]){

                    if(count($emailCliente) >0){

                        $Cliente = $emailCliente['nombre'];

                        $contentEmail = $setting->CuerpoEmail;

                        $titleEmail = $setting->TituloEmail;

                        $footerEmail = $setting->FooterEmail;

                        $recipientsEmail = array("nombre" => $emailCliente['nombre'],"email" => $emailCliente['email']);

                        $contentEmail = $this->replaceParameters(array("Cliente" => $emailCliente['nombre'],

                                                                "NombreCandidato" => join(",",$candidatos)

                                                                ),$contentEmail);

                        if($emailCliente['email'] != "" && $emailCliente['email'] != null)

                            $this->send_email([$recipientsEmail],$titleEmail,$contentEmail,$footerEmail,'');                           

                    }        

                }

                if($setting->Modulo == $modulos[1]){

                    $contentEmail = $setting->CuerpoEmail;

                    $titleEmail = $setting->TituloEmail;

                    $footerEmail = $setting->FooterEmail;

                    $Cliente = $emailCliente['nombre'];

                    if(count($emailCandidato) > 0){

                        foreach($emailCandidato as $key => $candidato){

                            $contentEmailForCandidato = $contentEmail;

                            $recipientsEmail = array("nombre" => $candidato['nombre'],"email" => $candidato['email']);

                            $contentEmailForCandidato = $this->replaceParameters(array("NombreCandidato" => $candidato['nombre'],

                                                                                "Cliente" => $Cliente

                                                                                ),$contentEmailForCandidato);

                            $this->send_email([$recipientsEmail],$titleEmail,$contentEmailForCandidato,$footerEmail,'');   

                        }

                    }

                }

                if($setting->Modulo == $modulos[2]){

                    $contentEmail = $setting->CuerpoEmail;

                    $titleEmail = $setting->TituloEmail;

                    $footerEmail = $setting->FooterEmail;

                    $Cliente = $emailCliente['nombre'];

                    if(count($emailLider) > 0){

                        foreach($emailLider as $key => $lider){

                            $contentEmailForLider = $contentEmail;

                            $recipientsEmail = array("nombre" => $lider->nombreuser,"email" => $lider->email);

                            $contentEmailForLider = $this->replaceParameters(array("NombreCandidato" => join(",",$candidatos),

                                                                            "Cliente" => $Cliente,

                                                                            "Lider" => $lider->nombreuser

                                                                            ),$contentEmailForLider);

                            $this->send_email([$recipientsEmail],$titleEmail,$contentEmailForLider,$footerEmail,'');  

                        }

                    }

                }

            }

            $isSendEmail=true;

            return $isSendEmail;

      } catch (\Exception $e) {

        return [$isSendEmail,$e->getMessage(),$e->getLine()];

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

        $mail->Host       = "smtp.exchangeadministrado.com"  ;#"smtp.exchangeadministrado.com";                    // Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

        $mail->Username   = "webmail@gen-t.com.mx"  ;#"webmail@gen-t.com.mx";                     // SMTP username

        $mail->Password   = "WM22supervisado"  ;# "WM22supervisado";                               // SMTP password

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

        $mail->setFrom("webmail@gen-t.com.mx" , utf8_decode('Gen-T ESE Notificaciones'));

        $recipient="";

        foreach($recipients as $value){

            if (filter_var($value['email'], FILTER_VALIDATE_EMAIL)) {

                $mail->addAddress($value['email'], $value['nombre']);

            }

        }

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



    // public function getEmailSettingsEncuestaLider($modulo, $idServicio){

    //     $emailSetting["Settings"] = [];

    //     $emailSetting["Recipients"] = [];

    //     $setting  = MasterConsultas::exeSQL("mob_ese_email_conf", "READONLY",

    //         array(

    //             "Modulo" => $modulo

    //         ));



    //     if(isset($setting) && count($setting) > 0)

    //     {



    //             $emailSetting["Settings"] = $setting[0];

    

    //         $recipientsEncuesta  = MasterConsultas::exeSQL("mob_labels_email_ese_def_encuesta", "READONLY",

    //             array(

    //                 "IdServicio" => $idServicio

    //             ));



    //         if(isset($recipientsEncuesta) && count($recipientsEncuesta) > 0) {

    //             foreach ($recipientsEncuesta as $ar) {

    //                 array_push($emailSetting["Recipients"], $ar);

    //             }

    //         }



    //     }



    //     return $emailSetting;



    // }



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

}

