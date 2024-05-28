<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;
use App\Bussines\MasterConsultas;


class DocumentosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request,$id,$id2,$id3)
    { 
        $IdCentro = $id;
        $IdCliente = $id3;
        $IdPeriodo = $id2;

        $nombreCentro = DB::select('SELECT ect.Descripcion FROM ev_centros_trabajo ect WHERE ect.IdCentro ='.$IdCentro);
        $periodo = DB::select('SELECT ep.Fecha FROM ev_periodos ep WHERE ep.IdPeriodo ='.$IdPeriodo);
        $cliente = DB::select('SELECT c.nombre_comercial FROM clientes c WHERE c.id ='.$IdCliente);

        $documentosCentros = DB::select('SELECT * FROM ev_documentos_detalle WHERE IdCentro = '.$IdCentro);

        $mostrarDocumentos = MasterConsultas::exeSQL("ev_document", "READONLY",
            array(
                "IdCentro" => $IdCentro
            )
        );

        return view("Encuestas.nom035.documentos",['IdCentro'=>$IdCentro,'IdPeriodo'=>$IdPeriodo,'nombreCentro'=>$nombreCentro[0]->Descripcion,'periodo'=>$periodo[0]->Fecha,'IdCliente'=>$IdCliente,'cliente'=>$cliente[0]->nombre_comercial,'documentosCentros'=>$documentosCentros,'mostrarDocumentos'=>$mostrarDocumentos]);
    }

    public function createDoc(Request $request,$id,$id2,$id3)
    {
        $IdCentro = $id;
        $IdCliente = $id3;
        $IdPeriodo = $id2;

        $documentos = DB::select('SELECT * FROM ev_documentos ');

        $nombreCentro = DB::select('SELECT ect.Descripcion FROM ev_centros_trabajo ect WHERE ect.IdCentro ='.$IdCentro);
        $periodo = DB::select('SELECT ep.Fecha FROM ev_periodos ep WHERE ep.IdPeriodo ='.$IdPeriodo);
        $cliente = DB::select('SELECT c.nombre_comercial FROM clientes c WHERE c.id ='.$IdCliente);

        return view("Encuestas.nom035.create.nuevodocumento",['IdCentro'=>$IdCentro,'IdPeriodo'=>$IdPeriodo,'nombreCentro'=>$nombreCentro[0]->Descripcion,'periodo'=>$periodo[0]->Fecha,'IdCliente'=>$IdCliente,'cliente'=>$cliente[0]->nombre_comercial,'documentos'=>$documentos]);
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
        $file = $request->file("archivo");
        $documento = $request->input("documento");
        $centro =$request->input("centro");
        $cliente = $request->input("cliente");
        $periodo = $request->input("periodo");
        $activo = $request->input("activo");

        if($file == null){
            $base64= null;
        }else{
            $archivodata= file_get_contents($file);
            $base64= base64_encode($archivodata);
        }

        // $buscarRegistro = DB::select("Select * from ev_documentos_detalle Where IdDocumento = ".$documento);

        
        $AltaPC=MasterConsultas::exeSQLStatement("create_ev_docs", "UPDATE",
            array(
                "Cliente" => $request->input('cliente'),
                "Centro" => $request->input("centro"),
                "Documento" => $request->input("documento"),
                "Archivo" => $base64
            )
        );
    
        return redirect()->route('documentosNom035',['id'=>$centro,'id2'=>$periodo,'id3'=>$cliente])->with(['success' => ' El documento se guardó con éxito',
        'type'    => 'success']);
    }

    public function showPDF(Request $request){

        $id= $request->input('id');

        $pdf=DB::select('SELECT Archivo FROM ev_documentos_detalle WHERE IdDocumentoDet = '.$id);

        foreach($pdf as $p){
            $archivopdf=$p->Archivo;
        }
        
        return response()->json(['pdf'=>$archivopdf]);
        
        /*return view('Encuestas.catalogos.formularios.catalogodepoliticasclientes.vistapdf',['pdf'=>$archivopdf]);*/
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
        $editarPC=DB::select('select * from ev_documentos_detalle where IdDocumentoDet='.$id);

        foreach ($editarPC as  $editPC) {
            $IdDocumentoDet=$editPC->IdDocumentoDet;
            $IdCliente=$editPC->IdCliente;
            $IdCentro=$editPC->IdCentro;
            $IdDocumento=$editPC->IdDocumento;
            $Archivo=$editPC->Archivo;
        }

        $nombredelCLI=DB::select('select nombre_comercial from clientes where id='.$IdCliente);
        $centro = DB::select('select Descripcion from ev_centros_trabajo where IdCentro ='.$IdCentro);
        $documento = DB::select('select * from ev_documentos where IdDocumento ='.$IdDocumento);

        foreach($nombredelCLI as $ncli){
            $Cliente=$ncli->nombre_comercial;
        }

        foreach($centro as $row){
            $Centro=$row->Descripcion;
        }

        
        foreach($documento as $row){
            $Documento=$row->Descripcion;
        }

            return view("Encuestas.nom035.edit.index",['documentos'=>$documento])
            ->with('IdDocumentoDet', $IdDocumentoDet)
            ->with('IdCliente', $IdCliente)
            ->with('IdPeriodo', $id2)
            ->with('IdDocumento', $IdDocumento)
            ->with('IdCentro', $IdCentro)
            ->with('Documento', $Documento)
            ->with('Archivo', $Archivo)
            ->with('Centro', $Centro)
            ->with('Cliente', $Cliente);
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

        $file= $request->file("archivo");
        $archivopdf=$request->input('archivopdf');

        $IdCentro = $request->input('centro');
        $IdCliente = $request->input('cliente');
        $IdPeriodo = $request->input('periodo');

        if($file == null){
            $base64= $archivopdf;
        }else{
            $archivodata= file_get_contents($file);
            $base64= base64_encode($archivodata);
        }

        $IdCliente=$request->input('cliente');
    
        $buscarregistro=DB::select('select * from ev_documentos_detalle where IdCliente='.$IdCliente.' AND IdDocumentoDet<>'.$id);

        $arrayvacio=empty($buscarregistro);
    
            // if($arrayvacio==false){
            //     return redirect()->route('documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])->with(['success' => ' Error al actualizar, la política ya existe para el cliente',
            //     'type'    => 'danger']);
            // }else{
                    
        $UpdatePC = DB::table('ev_documentos_detalle')->where('IdDocumentoDet',$id)->update(
            array(
            'Archivo'=>$base64,
        ));
            
        return redirect()->route('documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])->with(['success' => ' El registro se actualizó con éxito',
        'type'    => 'success']);
            // }
    }

    public function deletePDFedit($id,$id2){

        $deletePDFedit = DB::table('ev_documentos_detalle')->where('IdDocumentoDet',$id)->update(
            array('Archivo'=> null));
        
        return redirect()->route('documentos_centro_edit',['id'=>$id,'id2'=>$id2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id2)
    {
        $resultadoError = null;

        $documentos = DB::select('select * from ev_documentos_detalle where IdDocumentoDet ='.$id);

        $IdPeriodo = $id2;
        
        foreach ($documentos as  $editPC) {
            $IdCliente=$editPC->IdCliente;
            $IdCentro=$editPC->IdCentro;
        }
        
        try {
            DB::delete("delete from ev_documentos_detalle WHERE IdDocumentoDet = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->route('documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect()->route('documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])
                ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
            }
        }
    }
}
