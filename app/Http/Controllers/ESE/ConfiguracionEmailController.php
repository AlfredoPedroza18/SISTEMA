<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class ConfiguracionEmailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confemail = MasterConsultas::exeSQL("master_ese_mail_settings", "READONLY",
            array(
                "IdConfEmail" => '-1'
            )
        );


          return view("ESE.catalogos.confemailindex",["ConfigEmail"=>$confemail]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $labels = MasterConsultas::exeSQL("master_ese_entrada", "READONLY",
      array(
          "IdEntrada" => '-1'

      )
      );

      $recipients = MasterConsultas::exeSQL("master_ese_email_recipientes", "READONLY",
      array(
          "IdConfEmail" => 0

      )
      );

        return view("ESE.catalogos.form-configuracionemail")
        ->with('IdConfEmail', null)
        ->with('IdPlantillaEmail', null)
        ->with('Modulo', null)
        ->with('Descripcion', null)
        ->with('DescripcionPlantilla', null)
        ->with('TituloEmail', null)
        ->with('CuerpoEmail', null)
        ->with('FooterEmail', null)
        ->with('web', null)
        ->with('correo', null)
        ->with('labels', $labels)
        ->with('recipients', $recipients);
    }

    public function save(Request $request){

      MasterConsultas::exeSQLStatement("master_ese_email_templete_insert", "UPDATE",
      array(
          "DescripcionPlantilla" => $request->input('DescripcionEmail'),
          "TituloEmail" => $request->input('TituloEmail'),
          "CuerpoEmail" => $request->input('CuerpoEmail'),
          "FooterEmail" => $request->input('FooterEmail')
      )
      );

      $sql="select IdPlantillaEmail from master_ese_email_templates ORDER BY IdPlantillaEmail desc limit 1 ";
      $result = DB::select($sql);
      $id='';
      foreach ($result as $r) {
        $id=$r->IdPlantillaEmail;
      }
      MasterConsultas::exeSQLStatement("master_ese_email_settings_insert", "UPDATE",
      array(
          "Modulo" => $request->input('Modulo'),
          "Descripcion" => $request->input('Descripcion'),
          "Notificacion" => $request->input('notweb'),
          "Correo" => $request->input('notCorreo'),
          "IdPlantillaEmail" => $id
      )
      );

      $sql="select IdConfEmail from master_ese_email_settings ORDER BY IdConfEmail desc limit 1 ";
      $result = DB::select($sql);
      $id='';
      foreach ($result as $r) {
        $id=$r->IdConfEmail;
      }

      $ids='0';
      if(isset($_POST['ids'])){
        for ($i=0; $i <count($_POST['ids']); $i++) {

          $result = MasterConsultas::exeSQLStatement("master_ese_email_recipientes_insert", "UPDATE",
          array(
              "IdConfEmail" => $id,
              "Email" => $_POST['Email'][$i],
              "NombreDestinatario" => $_POST['Destinatario'][$i],
              "ModoEnvio" => $_POST['Modo'][$i]
          )
          );

        }
      }



      return redirect('/ConfiguracionEmail')
      ->with(['success' =>  'El registro se guardo con éxito',
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
     public function edit($id)
     {
         $settings = MasterConsultas::exeSQL("master_ese_mail_settings", "READONLY",
         array(
             "IdConfEmail" => $id

         )
         );

         foreach ($settings as  $ts) {
             $IdConfEmail=$ts->IdConfEmail;
             $IdPlantillaEmail=$ts->IdPlantillaEmail;
             $Modulo=$ts->Modulo;
             $Descripcion=$ts->Descripcion;
             $web=$ts->Notificacion;
             $correo=$ts->Correo;

         }

         $temple = MasterConsultas::exeSQL("master_ese_email_temples", "READONLY",
         array(
             "IdPlantillaEmail" => $IdPlantillaEmail

         )
         );

         foreach ($temple as  $t) {
             $DescripcionPlantilla=$t->DescripcionPlantilla;
             $TituloEmail=$t->TituloEmail;
             $CuerpoEmail=$t->CuerpoEmail;
             $FooterEmail=$t->FooterEmail;

         }

         $labels = MasterConsultas::exeSQL("master_ese_entrada", "READONLY",
         array(
             "IdEntrada" => '-1'

         )
         );

         $recipients = MasterConsultas::exeSQL("master_ese_email_recipientes", "READONLY",
         array(
             "IdConfEmail" => $IdConfEmail

         )
         );


               return view("ESE.catalogos.configuracionemailedit")
               ->with('IdConfEmail', $IdConfEmail)
               ->with('IdPlantillaEmail', $IdPlantillaEmail)
               ->with('Modulo', $Modulo)
               ->with('Descripcion', $Descripcion)
               ->with('DescripcionPlantilla', $DescripcionPlantilla)
               ->with('TituloEmail', $TituloEmail)
               ->with('CuerpoEmail', $CuerpoEmail)
               ->with('FooterEmail', $FooterEmail)
               ->with('labels', $labels)
               ->with('web', $web)
               ->with('correo', $correo)
               ->with('recipients', $recipients);

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


    public function save_update(Request $request){

      MasterConsultas::exeSQLStatement("master_ese_email_temple_update", "UPDATE",
      array(
          "DescripcionPlantilla" => $request->input('DescripcionEmail'),
          "TituloEmail" => $request->input('TituloEmail'),
          "CuerpoEmail" => $request->input('CuerpoEmail'),
          "FooterEmail" => $request->input('FooterEmail'),
          "IdPlantillaEmail" => $request->input('IdPlantilla')
      )
      );

      MasterConsultas::exeSQLStatement("master_ese_email_settings_update", "UPDATE",
      array(
          "Modulo" => $request->input('Modulo'),
          "Descripcion" => $request->input('Descripcion'),
          "IdConfEmail" => $request->input('num_id'),
          "Notificacion" => $request->input('notweb'),
          "Correo" => $request->input('notCorreo')
      )
      );

      $ids='0';
      if(isset($_POST['ids'])){
        for ($i=0; $i <count($_POST['ids']); $i++) {
          if($_POST['ids'][$i] != 0){
            MasterConsultas::exeSQLStatement("master_ese_email_recipientes_update", "UPDATE",
            array(
                "IdConfEmail" => $request->input('num_id'),
                "Email" => $_POST['Email'][$i],
                "NombreDestinatario" => $_POST['Destinatario'][$i],
                "ModoEnvio" => $_POST['Modo'][$i],
                "IdRecipient" => $_POST['ids'][$i]
            )
            );
          }
          $ids.=",".$_POST['ids'][$i];
        }


      $ids = str_replace(' ', '', $ids);

      $delete = MasterConsultas::exeSQL("buscar_recipientes", "READONLY",
          array(
              "IdConfEmail" => $request->input('num_id'),
              "ids" => $ids
          )
      );

      foreach ($delete as $d) {

        MasterConsultas::exeSQLStatement("delete_recipientes", "UPDATE",
        array(
            "id" => $d->IdRecipient
        )
        );
      }

      for ($i=0; $i <count($_POST['ids']); $i++) {
        if($_POST['ids'][$i] == 0){
          $result = MasterConsultas::exeSQLStatement("master_ese_email_recipientes_insert", "UPDATE",
          array(
              "IdConfEmail" => $request->input('num_id'),
              "Email" => $_POST['Email'][$i],
              "NombreDestinatario" => $_POST['Destinatario'][$i],
              "ModoEnvio" => $_POST['Modo'][$i]
          )
          );
        }

      }
    }
      return redirect('/ConfiguracionEmail')
      ->with(['success' =>  'El registro se actualizó con éxito',
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
      MasterConsultas::exeSQLStatement("delete_email_recipientes", "UPDATE",
      array(
          "id" => $id
      )
      );


      MasterConsultas::exeSQLStatement("delete_templets", "UPDATE",
      array(
          "id" => $_POST['plantilla']
      )
      );

      MasterConsultas::exeSQLStatement("delete_settings", "UPDATE",
      array(
          "id" => $id
      )
      );

      return redirect('/ConfiguracionEmail')
              ->with(['success' => ' El registro se eliminó con éxito',
                  'type'    => 'success']);
    }
}
