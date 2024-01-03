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

class InformacionDeAyudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $selectPC = MasterConsultas::exeSQL("ev_informacion_ayuda", "UPDATE",
            array(
                "IdInformacion " => '-1'
            )
        );
        return view("Encuestas.configuracion.configuracionsecciones.informaciondeayuda.index",$data,["seleccionaPC"=>$selectPC]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $listaFechas=DB::select("SELECT *, CONCAT_WS(' - ',DATE_FORMAT(Fecha, '%d/%m/%Y'), ee.Descripcion) AS FechaNormal FROM ev_encuesta_fecha eef INNER JOIN ev_encuesta ee ON eef.IdEncuesta = ee.IdEncuesta");
            
        return view("Encuestas.configuracion.configuracionsecciones.informaciondeayuda.create.create",$data,["listaFechas"=>$listaFechas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
            
        $file= $request->file("informacion");

        if($file == null){
            $base64= null;
        }else{
            $archivodata= file_get_contents($file);
            $base64= base64_encode($archivodata);
        }

        $documento = $request->file("documento");
        if($documento == null){
            $base64Documento= null;
        }else{
            $documentoData= file_get_contents($documento);
            $base64Documento= base64_encode($documentoData);
        }

        $glosario = $request->file("glosario");
        if($glosario == null){
            $base64Glosario= null;
        }else{
            $glosarioData= file_get_contents($glosario);
            $base64Glosario= base64_encode($glosarioData);
        }

        $IdFechaEncuesta=$request->input('fecha');
        $aplica = $request->input('periodo');

        $buscarregistro=DB::select('SELECT * FROM ev_informacion_ayuda WHERE IdFecha='.$IdFechaEncuesta);
        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/informacion_de_ayuda')->with(['success' => ' La información con fecha '.$request->input('fecha').' ya fue creada anteriormente',
            'type'    => 'danger']);
        }else{

            $AltaPC=MasterConsultas::exeSQLStatement("create_ev_informacion_ayuda", "UPDATE",
                    array(
                        "IdFecha" => $request->input('fecha'),
                        "Informacion" => $base64,
                        "Documento" => $base64Documento,
                        "Glosario" => $base64Glosario,
                        "Aplica" => $aplica
                    )
                );
                
            return redirect('/encuestas/configuracion/informacion_de_ayuda')->with(['success' => ' La información de ayuda de la fecha '.$request->input('fecha').' se guardó con éxito',
            'type'    => 'success']);
        }
    }

    public function showPDF(Request $request){
        $id= $request->input('id');
        $pdf=DB::select('SELECT * FROM ev_informacion_ayuda WHERE IdInformacion='.$id);
        foreach($pdf as $p){
            $archivopdf=$p->Informacion;
        }
        return response()->json(['pdf'=>$archivopdf]);
        
        /*return view('Encuestas.catalogos.formularios.catalogodepoliticasclientes.vistapdf',['pdf'=>$archivopdf]);*/
    }

    public function showPDFDocumento(Request $request){
        $id= $request->input('id');
        $pdf=DB::select('SELECT * FROM ev_informacion_ayuda WHERE IdInformacion='.$id);

        foreach($pdf as $p){
            $archivopdf=$p->Documento;
        }
        return response()->json(['pdf'=>$archivopdf]);
    }


    public function showPDFGlosario(Request $request){
        $id= $request->input('id');
        $pdf=DB::select('SELECT * FROM ev_informacion_ayuda WHERE IdInformacion='.$id);
        foreach($pdf as $p){
            $archivopdf=$p->Glosario;
        }
        return response()->json(['pdf'=>$archivopdf]);
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
    public function edit(Request $request, $id){
        $editarPC=DB::select('select * from ev_informacion_ayuda where IdInformacion='.$id);

        foreach ($editarPC as  $editPC) {
            $IdInformacion=$editPC->IdInformacion;
            $IdFecha=$editPC->IdFecha;
            $Informacion=$editPC->Informacion;
            $Documento=$editPC->Documento;
            $Glosario=$editPC->Glosario;
        }

        $nombredelCLI=DB::select('SELECT CONCAT_WS(" - ", Fecha, ee.Descripcion) AS Fecha FROM ev_encuesta_fecha eef INNER JOIN ev_encuesta ee ON eef.IdEncuesta = ee.IdEncuesta WHERE eef.IdFechaEncuesta='.$IdFecha);

        foreach($nombredelCLI as $ncli){
            $Fecha=$ncli->Fecha;
        }

            return view("Encuestas.configuracion.configuracionsecciones.informaciondeayuda.edit.edit")
            ->with('IdInformacion', $IdInformacion)
            ->with('IdFecha', $IdFecha)
            ->with('Informacion', $Informacion)
            ->with('Documento', $Documento)
            ->with('Glosario', $Glosario)
            ->with('Fecha', $Fecha);
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
        $file = $request->file("archivo");
        $archivopdf = $request->input('archivopdfInformacion');

        if($file == null){
            $base64 = $archivopdf; 
        }else{
            $archivo = file_get_contents($file);
            $base64= base64_encode($archivo);
        }

        $fileDocumento = $request->file("documento");
        $archivopdf2 = $request->input('archivopdfDocumento');

        if($fileDocumento == null){
            $base64Documento = $archivopdf2; 
        }else{
            $archivo = file_get_contents($fileDocumento);
            $base64Documento= base64_encode($archivo);
        }

        $fileGlosario = $request->file("glosario");
        $archivopdf3 = $request->input('archivopdfGlosario');
        
        if($fileGlosario == null){
            $base64Glosario = $archivopdf3; 
        }else{
            $archivo = file_get_contents($fileGlosario);
            $base64Glosario= base64_encode($archivo);
        }


        

        // $periodo = $request->input("periodo");

        $IdFecha = $request->input('cliente');

        $buscarregistro =DB::select("SELECT * FROM ev_informacion_ayuda eva WHERE IdInformacion =".$id." AND eva.IdFecha =".$IdFecha);

        $arrayvacio = empty($buscarregistro);

        // if($arrayvacio==true){
        //     return redirect()->route('configuracion_informacion_de_ayuda')->with(['success' => ' Error al actualizar, la información de Ayuda ',
        //     'type'    => 'danger']);
        // }else{

            $UpdatePC = DB::table('ev_informacion_ayuda')->where('IdInformacion',$id)->update(
                array(
                'Aplica'=>$request->input('periodo'),
                'Informacion'=>$base64,
                'Documento'=>$base64Documento,
                'Glosario'=>$base64Glosario
                )
            );
                
            return redirect()->route('configuracion_informacion_de_ayuda')->with(['success' => ' El registro se actualizó con éxito',
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
        $resultadoError = null;
        try {
            DB::delete("delete from ev_informacion_ayuda WHERE IdInformacion = $id");
          }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
          }finally{
            if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/informacion_de_ayuda')->with(['success' => ' Ocurrio un error al eliminar registro',
                'type'    => 'danger']);
            }else{
            return redirect('/encuestas/configuracion/informacion_de_ayuda')
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
