<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bussines\MasterConsultas;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;
use mysqli;
use Illuminate\Support\Facades\Input;


class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sqlEncuesta = MasterConsultas::exeSQL("ev_encuesta", "READONLY",
        array(
            "IdEncuesta" => '-1'
        )
        );
        return view("Encuestas.configuracion.configuracionsecciones.encuestas.index",$data,["listaEncuesta"=>$sqlEncuesta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $tiposervicio = MasterConsultas::exeSQL("ev_obtener_tiposervicios", "READONLY",
            array(
                "idTipoServicio" => '-1'
            )
        );

        $data = null;

        if( $request->user()->isAdmin() ){
            $data = $this->initFieldsAdmin();
        } else{
            $data = $this->initFieldsUser( $request->user() );
        }

        return view("Encuestas.configuracion.configuracionsecciones.encuestas.create.create",['data'=>$data,'tiposervicio'=>$tiposervicio]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $file= $request->file("archivo");

        $imagedata = file_get_contents(Input::file('archivo'));
        $base64 = base64_encode($imagedata);

        // $imagen = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));

        $Descripcion=$request->input('descripcion');

        $buscarregistro=DB::select('select * from ev_encuesta where Descripcion="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/encuestas')->with(['success' => ' La encuesta '.$request->input('descripcion').' no se creó por que ya existe',
            'type'    => 'danger']);
        }else{
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_encuesta", "UPDATE",
                    array(
                        "Servicio" => $request->input('Servicio'),
                        "Descripcion" => $request->input('descripcion'),
                        "ImgBienvenida" => $base64,
                        "Activo" => $request->input('Activo'),
                        "Anonima"=> $request->input('Anonima'),
                    )
                );
            return redirect('/encuestas/configuracion/encuestas')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
            'type'    => 'success']);
        }
    }


        public function showIMG(Request $request){

        $id= $request->id;

        $img=DB::select('select * from ev_encuesta where IdEncuesta='.$id);

        foreach($img as $p){
            $archivoimg=$p->ImgBienvenida;
        }

        $imagen = $archivoimg;

        return response()->json(['img'=>$imagen]);
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
        $editarEncuestas=DB::select('select * from ev_encuesta where IdEncuesta='.$id);

        foreach ($editarEncuestas as  $editar) {
            $IdEncuesta=$editar->IdEncuesta;
            $Descripcion=$editar->Descripcion;
            $Imagen=$editar->ImgBienvenida;
            $Activo=$editar->Activo;
            $Anonima=$editar->Anonima;
        }

            return view("Encuestas.configuracion.configuracionsecciones.encuestas.edit.edit")
            ->with('IdEncuesta', $IdEncuesta)
            ->with('Descripcion', $Descripcion)
            ->with('Archivo', $Imagen)
            ->with('Activo', $Activo)
            ->with('Anonima', $Anonima);
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

        // try {
        //     DB::delete("delete ImgBienvenida from ev_encuesta WHERE IdEncuesta =".$id);
        // }catch (\Exception $e) {
        //     if($e->getMessage()){
        //         $resultadoError = 'Si';
        //     }
        // }

        $file= $request->file("archivo");
        $archivopdf=$request->input('archivopdf');

        if($file == null){
            $base64 = $archivopdf;
        }else{
            $imagedata = file_get_contents(Input::file('archivo'));
            $base64 = base64_encode($imagedata);
        }

        $descripcion=$request->input('descripcion');
        $buscarregistro=DB::select('select * from ev_encuesta where IdEncuesta<>'.$id.' AND Descripcion="'.$descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/encuestas')->with(['success' => ' No se actualizó la encuesta '.$request->input('descripcion').' por que ya existe',
            'type'    => 'danger']);
        }else{

        $actualizarEncuesta = DB::table('ev_encuesta')->where('IdEncuesta',$id)->update(
            array(
            'Descripcion'=>$request->input('descripcion'),
            'Activo'=>$request->input('activo'),
            'ImgBienvenida'=>$base64,
            'Anonima'=>$request->input('anonima')
        ));

        return redirect('/encuestas/configuracion/encuestas')
        ->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
        'type'    => 'success']);
        }
    }

    public function deleteIMGedit($id){
        $deletePDFedit = DB::table('ev_encuesta')->where('IdEncuesta',$id)->update(
            array('ImgBienvenida'=> null));
        
        return redirect()->route('editar_configuracion_encuesta',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        
    public function destroy($id){
          $resultadoError = null;
        
          try {
              DB::delete("delete from ev_encuesta WHERE IdEncuesta = $id");
          }catch (\Exception $e) {
              if($e->getMessage()){
                  $resultadoError = 'Si';
              }
          }finally{
              if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/encuestas')
                  ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                  'type'    => 'danger']);
              }else{
                  return redirect('/encuestas/configuracion/encuestas')
                  ->with(['success' => ' El registro se eliminó con éxito',
                  'type'    => 'success']);
            }
          }
    }


    private function initFieldsAdmin()
    {
        $inicio_mes         = Carbon::now()->startOfMonth()->format('Y-m-d');
        $fin_mes            = Carbon::now()->endOfMonth()->format('Y-m-d');
        $estudios           = EstudioEse::whereBetween('fecha_cierre',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();
        $estudios_proceso   = EstudioEse::whereBetween('fecha_actualizacion',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();
        $estudios_solicitud = EstudioEse::whereBetween('fecha_ingreso',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();

        $estudios_cerrados    = $estudios->where('id_status',EstudioEse::CERRADA);
        $estudios_procesando  = $estudios_proceso->where('id_status',EstudioEse::PROCESO);
        $estudios_facturar    = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status',EstudioEse::SIN_INICIAR);
        $estudios_urgentes    = [];
        $estudios_normales    = [];

        foreach( $estudios_proceso as $estudio ) { 
                if( $estudio->prioridad_estudio->isUrgente() ) $estudios_urgentes[] = $estudio;
                if($estudio->prioridad_estudio->isNormal() )  $estudios_normales[]  = $estudio;
        }        

        return ['estudios_cerrados'    => $estudios_cerrados,
                'estudios_facturar'    => $estudios_facturar,
                'estudios_proceso'     => $estudios_procesando,
                'estudios_mes'         => $estudios,
                'estudios_solicitados' => $estudios_solicitados,
                'estudios_normales'    => $estudios_normales,
                'estudios_urgentes'    => $estudios_urgentes, ];
    }
}
