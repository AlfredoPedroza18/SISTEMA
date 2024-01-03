<?php

namespace App\Http\Controllers\Encuestas\controladorescatalogos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;
use mysqli;

class FondoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        // $data = null;
        // if( $request->user()->isAdmin() )
        // {
        //     $data = $this->initFieldsAdmin();
        // } 
        // else{
        //     $data = $this->initFieldsUser( $request->user() );
        // }

        $fondos = MasterConsultas::exeSQL("ev_fondo", "READONLY",
            array(
                "IdImgCliente" => '-1'
            )
        );
        return view("Encuestas.catalogos.formularios.catalogofondoencuesta.index",["fondos"=>$fondos]);
    }

    public function createIF(Request $request){

        $masterclientes=DB::select('SELECT id AS Id,nombre_comercial AS Nombre FROM clientes');
            
        return view("Encuestas.catalogos.formularios.catalogofondoencuesta.create.create",["masterCLI"=>$masterclientes]);
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

        $file= $request->file("archivo");

        $imagen = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));


        $IdCliente=$request->input('cliente');

        $buscarregistro=DB::select('select *from ev_img_cliente where IdCliente='.$IdCliente);

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('catalogo_fondo')->with(['success' => ' La imagen ya existe para el cliente',
            'type'    => 'danger']);
        }else{

            $AltaPC=MasterConsultas::exeSQLStatement("create_ev_fondo", "UPDATE",
                    array(
                        "Cliente" => $request->input('cliente'),
                        "Imagen" => $imagen
                    )
                );
                
            return redirect()->route('catalogo_fondo')->with(['success' => ' La imagen se guardó con éxito',
            'type'    => 'success']);
        }
    }

    
    public function showIMG(Request $request){

        $id= $request->id;

        $img=DB::select('select * from ev_img_cliente where IdImgCliente='.$id);

        foreach($img as $p){
            $archivoimg=$p->Imagen;
        }

        $imagen = base64_encode($archivoimg);

        return response()->json(['img'=>$imagen]);
        
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
    public function edit($id)
    {
        $editarPC=DB::select('select * from ev_img_cliente where IdImgCliente='.$id);

        foreach ($editarPC as  $row) {
            $IdImgCliente=$row->IdImgCliente;
            $IdCliente=$row->IdCliente;
            $Imagen=$row->Imagen;
        }

        $nombredelCLI=DB::select('select nombre_comercial from clientes where id='.$IdCliente);

        foreach($nombredelCLI as $ncli){
            $Cliente=$ncli->nombre_comercial;
        }

            return view("Encuestas.catalogos.formularios.catalogofondoencuesta.edit.edit")
            ->with('IdImgCliente', $IdImgCliente)
            ->with('IdCliente', $IdCliente)
            ->with('Archivo', $Imagen)
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

        try {
            DB::delete("delete from ev_img_cliente WHERE IdImgCliente = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }

        $file= $request->file("archivo");
        $archivopdf=$request->input('archivopdf');

        if($file === null){
            $imagen = $archivopdf;
        }else{
            $imagen = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
        }


        $IdCliente=$request->input('cliente');

        $buscarregistro=DB::select('select *from ev_img_cliente where IdCliente='.$IdCliente);

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect()->route('catalogo_fondo')->with(['success' => ' La imagen ya existe para el cliente',
            'type'    => 'danger']);
        }else{

            $AltaPC=MasterConsultas::exeSQLStatement("create_ev_fondo", "UPDATE",
                    array(
                        "Cliente" => $request->input('cliente'),
                        "Imagen" => $imagen
                    )
                );
                
            return redirect()->route('catalogo_fondo')->with(['success' => ' La imagen se guardó con éxito',
            'type'    => 'success']);
        }
    }

    public function deleteIMGedit($id){

        $deletePDFedit = DB::table('ev_img_cliente')->where('IdImgCliente',$id)->update(
            array('Imagen'=> null));
        
        return redirect()->route('catalogo_fondo',['id'=>$id]);
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
            DB::delete("delete from ev_img_cliente WHERE IdImgCliente = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect()->route('catalogo_fondo')
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect()->route('catalogo_fondo')
                ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
            }
        }
    }
}
