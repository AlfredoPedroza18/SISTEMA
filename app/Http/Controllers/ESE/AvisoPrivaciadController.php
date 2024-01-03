<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class AvisoPrivaciadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $avisopriv = MasterConsultas::exeSQL("master_ese_avisoprivacidad", "READONLY",
          array(
              "IdAvisoPriv" => '-1'
          )
      );


        return view("ESE.catalogos.avisoprivacidadindex",["AvisoPrivacidad"=>$avisopriv]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view("ESE.catalogos.form-avisoprivacidad")
      ->with('Contenido', null)
      ->with('Activo', null);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $activo='';
    ($request->input('Activo')==0)? $activo='Si': $activo='No';

    $avisopriv = MasterConsultas::exeSQL("master_ese_avisoprivacidad", "READONLY",
        array(
            "IdAvisoPriv" => '-1'
        )
    );
    foreach ($avisopriv as $ap) {
      MasterConsultas::exeSQLStatement("update_master_ese_avisoprivacidad", "UPDATE",
      array(
          "Contenido" => $ap->Contenido,
          "Activo" => 'No',
          "IdAvisoPriv" => $ap->IdAvisoPriv
      )
      );
    }

      MasterConsultas::exeSQLStatement("create_master_ese_avisopriv", "UPDATE",
                  array(
                      "Contenido" => $request->input('Contenido'),
                      "Activo" => $activo
                  )
              );

          return response()->json(['status_alta' => 'success']);
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
       $Aviso = MasterConsultas::exeSQL("master_ese_avisoprivacidad", "READONLY",
       array(
           "IdAvisoPriv" => $id

       )
       );

       foreach ($Aviso as  $ts) {
           $IdAvisoPriv=$ts->IdAvisoPriv;
           $Contenido=$ts->Contenido;
           $Activo=$ts->Activo;

       }

             return view("ESE.catalogos.avisoprivacidadedit")
             ->with('IdAvisoPriv', $IdAvisoPriv)
             ->with('Contenido', $Contenido)
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
     $activo='';
     ($request->input('Activo')==0)? $activo='Si': $activo='No';

     if($activo == 'Si'){
       $avisopriv = MasterConsultas::exeSQL("master_ese_avisoprivacidad", "READONLY",
           array(
               "IdAvisoPriv" => '-1'
           )
       );
       foreach ($avisopriv as $ap) {
         MasterConsultas::exeSQLStatement("update_master_ese_avisoprivacidad", "UPDATE",
         array(
             "Contenido" => $ap->Contenido,
             "Activo" => 'No',
             "IdAvisoPriv" => $ap->IdAvisoPriv
         )
         );
       }
     }


       MasterConsultas::exeSQLStatement("update_master_ese_avisoprivacidad", "UPDATE",
       array(
           "Contenido" => $request->input('Contenido'),
           "Activo" => $activo,
           "IdAvisoPriv" => $id
       )
   );

   return redirect('/AvisoPrivacidad')
   ->with(['success' =>  $request->input('Contenido') . ' se actualizó con éxito',
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
    MasterConsultas::exeSQLStatement("detele_master_ese_avisopriv", "UPDATE",
    array(
        "IdAvisoPriv" => $id
    )
    );
    return redirect('/AvisoPrivacidad')
            ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
  }


}
