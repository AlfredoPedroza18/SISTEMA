<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Expediente;
use App\Cliente;

use DB;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

class ExpedienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $id_user=$request->id_user;
         $id_cliente=$request->id_cliente;
         $nombre_comercial=$request->nombre_comercial;
         $estado = $request->estado;

         //dd($request);
        return view("crm.expedientes.expediente",["id_user"=> $id_user,'id_cliente'=> $id_cliente,"nombre_comercial"=>$nombre_comercial,'estado'=>$estado]);
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

    $query="SELECT ".
             "count(*) AS numero ".
            "FROM crm_expedientes_clientes ".
             "where id_cliente=?";
    $num_expediente=DB::select($query,[$request->id_cliente]);

       
     

if(!$request->file('file_source')){
    return back()->with("file","warning");
}

if($num_expediente){
    if($num_expediente[0]->numero<30){

      
      $ruta='';
      $nombre='';
      $id_user=$request->id_user;
      $carpeta_cliente=$request->id_cliente."_".str_replace(" ","",$request->nombre_comercial);
      $file=$request->file('file_source');
      $id_expediente = 0;
      $file_name = "**";
        // $aleatorio=str_random(6);
    

       $nombre=$file->getClientOriginalName();
     
        //  $file->move('anexos-accionXcliente'.$request->id_cliente."_".str_replace(" ","",$request->nombre_comercial),$nombre);
        $query1="SELECT ".
             "nombre as nombre ".
            "FROM crm_expedientes_clientes ".
             "where id_cliente=? and nombre=?";
        $nombre_archivo=DB::select($query1,[$request->id_cliente,$nombre]);
    
      $ruta=public_path()."\\expedientes_cliente\\".$request->id_cliente."_".str_replace(" ","",$request->nombre_comercial);    
      //$fichero=mkdir($ruta);

      if (file_exists($ruta))
       $file->move('expedientes_cliente\\'.$carpeta_cliente,$nombre);
        else{
          
                mkdir($ruta);
                $file->move('expedientes_cliente\\'.$carpeta_cliente,$nombre);
            }
           // dd($nombre_archivo);
if($nombre_archivo){
 if($nombre_archivo[0]->nombre==''){
      $expediente=Expediente::create($request->all());
      $expediente->ruta=$ruta."\\".$nombre;
      $expediente->nombre=$nombre;
      $expediente->carpeta_cliente=$carpeta_cliente;
      $expediente->save();
      $id_expediente = $expediente->id;
      $file_name     = $expediente->nombre;
  }
}else{
    $expediente=Expediente::create($request->all());
      $expediente->ruta=$ruta."\\".$nombre;
      $expediente->nombre=$nombre;
      $expediente->carpeta_cliente=$carpeta_cliente;
      $expediente->save();
      $id_expediente = $expediente->id;
      $file_name     = $expediente->nombre;
}

      /*return redirect()->route('sig-erp-crm::expediente.index', ['estado'=>'ok',"id_user"=> $id_user,'id_cliente'=> $request->id_cliente,"nombre_comercial"=>$request->nombre_comercial])->with('alta','success');
      */




    $modulo         = Modulo::where('slug','crm')->get();
    $submodulo      = SubModulo::where('slug','crm.expediente')->get();
    $accion_kardex  = Accion::where('slug','upload')->get();

    $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                "id_usuario"    => $request->user()->id,
                                "id_modulo"     => $modulo[0]->id,
                                "id_submodulo"  => $submodulo[0]->id,
                                "id_accion"     => $accion_kardex[0]->id,
                                "id_objeto"     => $id_expediente,
                                "descripcion"   => "Expediente del cliente " . $request->nombre_comercial . ": Se subió el archivo : " . $file_name ]);
   return back()->with("alta","success");

    }
}
    else{

  /*return redirect()->route('sig-erp-crm::expediente.index', ['estado'=>'mal',"id_user"=> $request->id_user,'id_cliente'=> $request->id_cliente,"nombre_comercial"=>$request->nombre_comercial])->with('alta','warning');*/
  return back()->with("error","warning");;

    }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
    public function destroy(Request $request,$id)
    {
        if ($request->ajax())
        {        
            $expediente     = Expediente::find($id); 
           
            
            if ($expediente){

                $id_expediente  = $expediente->id;
                $file_name      = $expediente->nombre; 
                $nombre_cliente = Cliente::find($expediente->id_cliente); 
                $result         = $expediente->delete();
                $modulo         = Modulo::where('slug','crm')->get();
                $submodulo      = SubModulo::where('slug','crm.expediente')->get();
                $accion_kardex  = Accion::where('slug','baja')->get();

                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                            "id_usuario"    => $request->user()->id,
                                            "id_modulo"     => $modulo[0]->id,
                                            "id_submodulo"  => $submodulo[0]->id,
                                            "id_accion"     => $accion_kardex[0]->id,
                                            "id_objeto"     => $id_expediente,
                                            "descripcion"   => "Expediente del cliente " . $nombre_cliente->nombre_comercial . ": Se elimino el archivo : " . $file_name ]);
                return response()->json(['success'=>'alta']); 
            }
            else{
                return response()->json(['error'=>'warning']);
            }
      
        }
      
    }
   public function RecibirID(Request $request ,$id_user,$idcli,$nombre_comercial)
   {
     $id_user=$id_user;
     $id_cliente=$idcli;
     $nombre_comercial=$nombre_comercial;

     $query="SELECT ".
             "* ".
             "FROM crm_expedientes_clientes ".
             "where id_cliente=?";
         $num_expediente=DB::select($query,[$idcli]);
         //dd($num_expediente);

     return view('crm.expedientes.expediente',["id_user"=>$id_user,"id_cliente"=>$id_cliente,"nombre_comercial"=>$nombre_comercial,"datos"=>$num_expediente]);
   }
      public function download_anexo_cliente($carpetacliente,$pathToFile)
    {
     
        $ruta=public_path("expedientes_cliente\\".$carpetacliente."\\".$pathToFile);

   
        return response()->download($ruta);  
       
    }


 

  
}
