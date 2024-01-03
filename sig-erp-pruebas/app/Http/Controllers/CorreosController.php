<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Borrador;
use App\User;
use Carbon\Carbon;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use Mail;
use File;


class CorreosController extends Controller
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
    public function index()
    {


        return view('crm.correos.correos');
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
        
        $borrador = Borrador::create($request->all()); 
        $borrador->id_usuario = $request->user()->id;
        $borrador->save();       
        if($borrador){
            return redirect('listado_borradores');
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
        $borrador          = Borrador::find($id);
        $para              = $borrador->para;
        $lista_destinarios = explode(';', $para);
        $destinatarios      = [];

        foreach($lista_destinarios as $key => $value) {
                    $destinatarios[] = $value;     
        }
        //dd($borrador);
        return view('crm.correos.editar-borrador',['borrador' => $borrador,'destinatarios' => $destinatarios,'id_borrador'=>$id]);
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
                      

            $result  = DB::table('borradores_email')->where('id', '=', $id)->delete();

            
            if ($result){
                return response()->json(['success'=>'true']); 
            }
            else{
                return response()->json(['success'=> 'false']);
            }
      
        }
    }

    public function correosContactos(Request $request){
        $listCorreos    = DB::select("SELECT correo1 FROM contactos WHERE correo1 like '%".$request->correo."%' ");
        $lista_correos  = [];
        foreach ($listCorreos as $correo) {
            $lista_correos[$correo->correo1] = $correo->correo1;
        }

        return response()->json($lista_correos);
    }

    public function listadoBorradores(){
        return view('crm.correos.lista-borradores');
    }

    public function getAllBorradores(Request $request){
        $lista_borradores = Borrador::where('id_usuario', $request->user()->id)->get();

        return response()->json($lista_borradores);
    }

    public function uploadFile(Request $request)
    {

        if ($request->hasFile('imagen'))
        {   
            $usuario            = User::find($request->user()->id);
            $nombre_usuario     = $usuario->name;
            $buscar             = ' ';
            $posicion           = strpos($nombre_usuario, $buscar);
            $substr_nombre      = strtolower(substr($nombre_usuario,0,$posicion));
            $carpeta_usuario    = $usuario->id.'_'.$substr_nombre;
            $ruta_principal     = public_path('file_upload/'.$carpeta_usuario);
            $fecha              = Carbon::today();
            $carpeta_hoy        = $fecha->year.'_'.$fecha->month.'_'.$fecha->day;
            $fecha_hoy          = $fecha->year.'-'.$fecha->month.'-'.($fecha->day < 10 ? '0'.$fecha->day:$fecha->day);
            $ruta_carpeta_hoy   = public_path('file_upload/'.$carpeta_usuario.'/'.$carpeta_hoy);




            $this->carpetaCliente($ruta_principal);
            $this->carpetaCliente($ruta_carpeta_hoy);


            /******************SE SUBE EL ARCHIVO *******************/
            $file   = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            
            
            \Storage::disk('local')->put($carpeta_usuario.'/'.$carpeta_hoy.'/'.$nombre,\File::get($file));


            $archivo = DB::table('upload_file')->insert([
                                    'id_usuario'        => $request->user()->id,
                                    'carpeta_principal' => $carpeta_usuario,
                                    'carpeta_reciente'  => $carpeta_hoy,
                                    'nombre_archivo'    => $nombre
                                    ]);

            if($archivo){
                $query = 'SELECT DISTINCT nombre_archivo as title, concat("http://sistemagent.com:8000/erp/public/file_upload/",carpeta_principal,"/",carpeta_reciente,"/",nombre_archivo) as value FROM upload_file WHERE DATE_FORMAT(fecha_creacion ,"%Y-%m-%d")= DATE_FORMAT(?,"%Y-%m-%d") ';
                $files_upload = DB::select($query, [$fecha_hoy]);
                $lista_files = [];

                return response()->json($files_upload);
            }

           
        }       

       
    }


    public function filesUser(Request $request){

        $fecha              = Carbon::today();
        $fecha_hoy          = $fecha->year.'-'.$fecha->month.'-'.($fecha->day < 10 ? '0'.$fecha->day:$fecha->day);


        $query = 'SELECT DISTINCT nombre_archivo as title, concat("http://sistemagent.com:8000/erp/public/file_upload/",carpeta_principal,"/",carpeta_reciente,"/",nombre_archivo) as value FROM upload_file WHERE DATE_FORMAT(fecha_creacion ,"%Y-%m-%d")= DATE_FORMAT(?,"%Y-%m-%d") ';
        $files_upload = DB::select($query, [$fecha_hoy]);
        
        return response()->json($files_upload);



    }

    public function enviarMail(Request $request){ //pepe
        /*$str_add_img = 'http://sistemagent.com:8000/erp/public/';
        $posicion_src= strpos($request->contenido_email, 'src');
        $posicion_file = strpos($request->contenido_email, 'file_upload');
        $sub_str_src = substr($request->contenido_email,0,$posicion_file);//
        $sub_str_file = substr($request->contenido_email,$posicion_file);//
        //dd($sub_str_src);
        dd($request->contenido_email);s*/


       
        //$this->configuracionMail($this->getDataConfigUser($request->user()));
        $from               = $request->user()->email;
        $destinatarios      = explode(';', $request->para);
        $tamanio            = count($destinatarios);
        $files_attach       = $request->input('files');
        $usuario            = User::find($request->user()->id);
        $nombre_usuario     = $usuario->name;
        $buscar             = ' ';
        $posicion           = strpos($nombre_usuario, $buscar);
        $substr_nombre      = strtolower(substr($nombre_usuario,0,$posicion));
        $carpeta_usuario    = $usuario->id.'_'.$substr_nombre;
        $ruta_principal     = public_path('file_upload_email/'.$carpeta_usuario);
        $fecha              = Carbon::today();
        $carpeta_hoy        = $fecha->year.'_'.$fecha->month.'_'.$fecha->day;
        $fecha_hoy          = $fecha->year.'-'.$fecha->month.'-'.($fecha->day < 10 ? '0'.$fecha->day:$fecha->day);
        $ruta_carpeta_hoy   = public_path('file_upload_email/'.$carpeta_usuario.'/'.$carpeta_hoy);
        $contenido_email    = $request->contenido_email;
        $asunto_aux             = $request->asunto;
        //$from               = $request->user()->

       
        unset($destinatarios[$tamanio-1]);

        if(isset($request->borrador)){
            $id = $request->id_borrador;
            $delete_borrador = Borrador::find($id); 
            $delete_borrador->delete();          
        }

       foreach ($destinatarios as $clave => $destinatario) {                
            $enviado = Mail::queueOn("email","test-email", ['contenido'=>$contenido_email], function($message) use($asunto_aux,$destinatario,$files_attach,$ruta_carpeta_hoy,$from) {
                
                $cantidad_archivos  = count($files_attach);                
                $asunto             = $asunto_aux; 
                $message->from('sig-erp@sistemagent.com',null);
                $message->replyTo($from);
                $message->to($destinatario, null)
                ->subject($asunto);
                for($i=0; $i< $cantidad_archivos; $i++){
                    $message->attach($ruta_carpeta_hoy.'/'.$files_attach[$i]);                            
                }



                $modulo         = Modulo::where('slug','crm')->get();
                $submodulo      = SubModulo::where('slug','crm.correos')->get();
                $accion_kardex  = Accion::where('slug','send.mail')->get();

                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                            "id_usuario"    => $request->user()->id,
                                            "id_modulo"     => $modulo[0]->id,
                                            "id_submodulo"  => $submodulo[0]->id,
                                            "id_accion"     => $accion_kardex[0]->id,
                                            "id_objeto"     => $cliente->id,
                                            "descripcion"   => "Envío de un email de: ". $from ." para: " . $destinatario]);

                \Log::info('Email enviado a: '.$destinatario);
            });


        }

        //return redirect('correos');
        return response()->json(['status_alta'=>'success']);
    }


    public function cantidadBorradores(Request $request){
        $query              = 'SELECT COUNT(id_usuario) AS numero_borradores FROM borradores_email WHERE id_usuario = ? ' ;
        $numero_borradores  = DB::select($query, [$request->user()->id]);

        return response()->json($numero_borradores);
    }


    public function uploadFileEmail(Request $request){
            if ($request->hasFile('file_email'))
            {   
                $usuario            = User::find($request->user()->id);
                $nombre_usuario     = $usuario->name;
                $buscar             = ' ';
                $posicion           = strpos($nombre_usuario, $buscar);
                $substr_nombre      = strtolower(substr($nombre_usuario,0,$posicion));
                $carpeta_usuario    = $usuario->id.'_'.$substr_nombre;
                $ruta_principal     = public_path('file_upload_email/'.$carpeta_usuario);
                $fecha              = Carbon::today();
                $carpeta_hoy        = $fecha->year.'_'.$fecha->month.'_'.$fecha->day;
                $fecha_hoy          = $fecha->year.'-'.$fecha->month.'-'.($fecha->day < 10 ? '0'.$fecha->day:$fecha->day);
                $ruta_carpeta_hoy   = public_path('file_upload_email/'.$carpeta_usuario.'/'.$carpeta_hoy);


                $this->carpetaCliente($ruta_principal);
                $this->carpetaCliente($ruta_carpeta_hoy);


                /******************SE SUBE EL ARCHIVO *******************/
                $file   = $request->file('file_email');
                $nombre = $file->getClientOriginalName();
                \Storage::disk('email')->put($carpeta_usuario.'/'.$carpeta_hoy.'/'.$nombre,\File::get($file));

                $archivo = DB::table('upload_file_emails')->insert([
                                        'id_usuario'        => $request->user()->id,
                                        'carpeta_principal' => $carpeta_usuario,
                                        'carpeta_reciente'  => $carpeta_hoy,
                                        'nombre_archivo'    => $nombre
                                        ]);


                if($archivo){
                    $query = 'SELECT DISTINCT nombre_archivo as title, concat("http://sistemagent.com:8000/erp/public/file_upload/",carpeta_principal,"/",carpeta_reciente,"/",nombre_archivo) as value FROM upload_file_emails WHERE DATE_FORMAT(fecha_creacion ,"%Y-%m-%d")= ? ';
                    $files_upload = DB::select($query, [$fecha_hoy]);
                    $lista_files = [];
                    
                    return response()->json($nombre);
                }

               
            }       
    }

    private function carpetaCliente($carpeta_cliente)
    {
        if(!file_exists($carpeta_cliente)){
            mkdir($carpeta_cliente,0777);
            return true;
        }else{
            return false;
        }

    }

    private function configuracionMail($configuracion){
        config(['mail.driver'   => $configuracion['driver'],
                'mail.port'     => $configuracion['port'],
                'mail.host'     => $configuracion['host'], 
                'mail.username' => $configuracion['username'],
                'mail.password' => $configuracion['password'] ]);
    }

    private function getDataConfigUser($user){      

        return ['driver'    => $user->driver,
                'host'      => $user->host, 
                'port'      => $user->port, 
                'username'  => $user->email,
                'password'  => $user->password_email];
    } 


    private function ponerRutaImagen($contenido)
    {//pelonete


        $numero_apariciones = substr_count($contenido,'src');
        $str_add_img = 'http://sistemagent.com:8000/erp/public/';
        $posicion_src = strpos($request->contenido_email, 'src');
        $posicion_file = strpos($request->contenido_email, 'file_upload');
        $sub_str_src = substr($request->contenido_email,0,$posicion_file);//
        $sub_str_file = substr($request->contenido_email,$posicion_file);//


    }  
}
