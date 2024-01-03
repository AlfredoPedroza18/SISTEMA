<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use App\OS\OrdenServicioEse;
use App\OS\OrdenServicio;
use App\Cliente;
use App\User;
use App\CentroNegocio;
use App\Prioridad;
use App\TipoServicio;
use App\ESE\Candidato;
use App\ESE\Anexo;
use App\ESE\Imagen;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use Bican\Roles\Models\Role;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use App\ESE\Plantillas\Formato;
use Mail;
use PDF;







class EstudioSocioeconomicoController extends Controller
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
        $estudios = null;
        if( $request->user()->is('admin') ){
            //$estudios = EstudioEse::all();            
            $estudios = EstudioEse::with('candidato','cliente','status','ordenServicioEse.orden_servicio','ejecutivos','cancelacionese','resultado_final_ese')->orderBy("id")->get();            
        }elseif( $request->user()->isForeing() )
        {
            $estudios = $request->user()->estudios_ese;

        }else{

            $estudios = $request->user()->estudios_ese;
        }      

        return view('ESE.index',['estudios' => $estudios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        $id_os       = $request->get('os');
        $id_os_ese   = $request->get('os_ese');
        $id_ese      = $request->get('ese');
        $os          = null;
        $estudio_ese = null;

        if( $id_os && $id_ese ){
            $os = OrdenServicio::find($id_os); 
            $data = null;           
            
            if( $os ){

                $os_estudio_ese      = $os->ordendes_servicio_ese->find($id_os_ese);
                $estudio_ese         = $os_estudio_ese->estudiosEse->find($id_ese);                
                
                $data                = $request->user()->is('admin') ? $this->initViewElements() : $this->initViewElements( $request->user() );
                $data['estudio_ese'] = $estudio_ese;

                //dd( $estudio_ese->fields );
                
                
                return view('ESE.create-estudio-ese',$data);
                //return view('ESE.email-asignacion');
            }
        }


        return back();
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
        $data            = $request->all();      
        $ese             = EstudioEse::find($id);
        $candidato       = null;
        $exist_candidato = true;
        $ese->codigo_depto_cliente = trim( $data['codigo_depto_cliente'] );
        $ese->solicitado = trim($data['solicitado']);
        $ese->comentarios = $data['comentarios'];
        $ese->save();
        if($ese){
            if( $ese->candidato ){
                $candidato = $ese->candidato;
                $candidato->nombre           = $data['nombre'];
                $candidato->apellido_paterno = $data['apellido_paterno'];
                $candidato->apellido_materno = $data['apellido_materno'];
                $candidato->telefono         = $data['telefono'];
                $candidato->telefono_aux     = $data['telefono_aux'];
                $candidato->email            = $data['email'];
                $candidato->sexo             = $data['sexo'];
                $candidato->cp               = $data['cp'];
                $candidato->ciudad           = $data['ciudad'];
                $candidato->delegacion       = $data['delegacion'];
                $candidato->colonia          = $data['colonia'];
                $candidato->calle            = $data['calle'];
                $candidato->numero_exterior  = $data['numero_exterior'];
                $candidato->numero_interior  = $data['numero_interior'];

                $candidato->save();
            }else{                
                $candidato  = new Candidato;
                $candidato->nombre           = $data['nombre'];
                $candidato->apellido_paterno = $data['apellido_paterno'];
                $candidato->apellido_materno = $data['apellido_materno'];
                $candidato->telefono         = $data['telefono'];
                $candidato->telefono_aux     = $data['telefono_aux'];
                $candidato->email            = $data['email'];
                $candidato->sexo             = $data['sexo'];
                $candidato->cp               = $data['cp'];
                $candidato->ciudad           = $data['ciudad'];
                $candidato->delegacion       = $data['delegacion'];
                $candidato->colonia          = $data['colonia'];
                $candidato->calle            = $data['calle'];
                $candidato->numero_exterior  = $data['numero_exterior'];
                $candidato->numero_interior  = $data['numero_interior'];

                $ese->candidato()->save( $candidato );

                $exist_candidato = false;
            }

            
        }
        $accion = $exist_candidato ? 'actualizó':'registro';
        $descripcion = 'Se ' . $accion . ' el candidato: '. 
                        $candidato->nombre . ' ' . 
                        $candidato->apellido_paterno . ' ' . 
                        $candidato->apellido_materno . ' por: ' . 
                        $request->user()->name . ' ' .
                        $request->user()->apellido_paterno . ' ' .
                        $request->user()->apellido_materno;
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $ese );

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function initViewElements( $user = null)
    {
        $clientes             = Cliente::all();
        $ejecutivos           = User::where('tipo','!=','f')->orderBy('name','asc')->get();
        $ejecutivos_foraneos  = User::where('tipo','f')->orderBy('name','asc')->get();
        $prioridades          = Prioridad::all();
        $tipos                = TipoServicio::all();
        $list_kardex          = isset( $user ) ? $user->kardex()->where('id_modulo','6')->get() :  Kardex::where('id_modulo','6')->get();
        $plantillas           = Formato::orderBy('nombre', 'asc')->get();

        return [    'clientes'              => $clientes, 
                    'ejecutivos'            => $ejecutivos, 
                    'ejecutivos_foraneos'   => $ejecutivos_foraneos, 
                    'prioridades'           => $prioridades, 
                    'tipos'                 => $tipos,
                    'lista_kardex'          => $list_kardex,
                    'plantillas'            => $plantillas,
                ];

            /*Cliente,os,ejecutivo,investigador,foraneo,plantilla,prioridad,tipo_estudio,
            fecha_visita,viaticos,*/
    }


    public function guardarFechaVisita( Request $request ){
        
        $fecha       = date($request->fecha_visita . ' H:i:s');
        $estudio_ese = EstudioEse::find( $request->id_ese );
        $estudio_ese->fecha_visita = $fecha;
        $estudio_ese->save(); 

        $descripcion = 'Se asigno fecha de visita: ' . $fecha . ' por: ' . $request->user()->name . ' ' . $request->user()->apellido_paterno . ' ' . $request->user()->apellido_materno;
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio_ese );

        
        return response()->json( ['data' => ['message' => 'Fecha asignada con éxito','accion' => 'Fecha Visita'] ] );
    }

    public function setEjecutivos(Request $request)
    {
        $data        = $request->all();
        $ejecutivo   = null; 
        $estudio     = EstudioEse::find( $data['id_ese_detalle'] ); 
        $descripcion = 'Asignación de ejecutivo(s):  ';
        $usuario     = $request->user();
        $ejecutivos_kardex = '';

        foreach ($data['ejecutivos'] as $clave => $valor ) 
        {
            
                if( $valor != -1) 
                {   
                    $ejecutivo = User::find($valor);
                    $remitente = $request->user();
                    $ejecutivos_kardex .= ',' . $ejecutivo->name . ' ' . $ejecutivo->apellido_paterno;
                    
                    Mail::send('ESE.email-asignacion', ['receptor' => $ejecutivo,'remitente' => $remitente, 'estudio' => $estudio], function ($message) use ($ejecutivo,$remitente, $estudio) {
                        $message->from('sig-erp@sistemagent.com', 'Asignacion Estudio');
                        $message->to($ejecutivo->email)->cc('luisdtgmac@gmail.com');
                        $message->subject('Estudios Socioeconómicos, asignación del estudio ESE' . $estudio->id);
                    });                    
                    $estudio->ejecutivos()->attach( $valor ,['principal' => $data['tipo_ejecutivo'][$clave] ]);
                    
                }   
            
        }
        

        $estudio->id_status = EstudioEse::ASIGNADO;
        $estudio->save();

        $descripcion .= $ejecutivos_kardex;
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $usuario, $estudio );
        
        
        return response()->json(['data' => ['status' => 'success']]);
    }

    public function updateEjecutivos(Request $request)
    {
        //dd($request->all());

        $data               = $request->all();
        $ejecutivo          = null; 
        $estudio            = EstudioEse::find( $data['id_ese_detalle'] );        
        $descripcion        = 'Asignación de ejecutivo(s):  ';
        $descripcion_old    = 'Baja de ejecutivo(s):  ';
        $usuario            = $request->user();
        $ejecutivos_kardex  = '';
        $ejec_old_kardex    = '';
        $size_arrary        = count( $data['ejecutivos_old'] );


        foreach ($estudio->ejecutivos as $ejecutivo) {
            for( $i = 0; $i < $size_arrary; $i++ )
            {
                if( $ejecutivo->id == $data['ejecutivos_old'][$i])
                {
                    $ejecutivo->pivot->status = 0;
                    $ejecutivo->pivot->save();
                    $ejecutivo->estudios_ese()->detach( $ejecutivo->id );                    
                    $ejec_old_kardex .= ',' . $ejecutivo->name . ' ' . $ejecutivo->apellido_paterno;
                }
            }            
        }
        
        
        foreach ($data['ejecutivos'] as $clave => $valor ) 
        {
            
                if( $valor != -1) 
                {
                    $ejecutivo = User::find($valor);
                    $remitente = $request->user();
                    $estudio->ejecutivos()->attach( $valor ,['principal' => $data['tipo_ejecutivo'][$clave] ]);
                    $ejecutivos_kardex .= ',' . $ejecutivo->name . ' ' . $ejecutivo->apellido_paterno;

                    Mail::send('ESE.email-asignacion', ['receptor' => $ejecutivo,'remitente' => $remitente, 'estudio' => $estudio], function ($message) use ($ejecutivo,$remitente, $estudio) {
                        $message->from('sig-erp@sistemagent.com', 'Asignacion Estudio');
                        $message->to($ejecutivo->email)->cc('luisdtgmac@gmail.com');
                        $message->subject('Estudios Socioeconómicos, asignación del estudio ESE' . $estudio->id);
                    });                    
                    
                }   
            
        }
        

        $estudio->id_status = EstudioEse::ASIGNADO;
        $estudio->save();

        $descripcion     .= $ejecutivos_kardex;
        $descripcion_old .= $ejec_old_kardex;
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion_old, $usuario, $estudio );
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $usuario, $estudio );
        
        
        return response()->json(['data' => ['status' => 'success']]);
    }

    public function iniciarEstudio(Request $request)
    {   
        $data                         = $request->all();
        $estudio                      = EstudioEse::find( $data['id_estudio'] );
        $estudio->id_status           = EstudioEse::PROCESO;
        $estudio->fecha_actualizacion = date("Y-m-d H:i:s");
        $estudio->save();
        $descripcion = 'El estudio fue iniciado por : ' . $request->user()->name . ' ' . $request->user()->apellido_paterno . ' ' . $request->user()->apellido_materno;
        
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );

        return back();
        
    } 

    public function cerrarEstudio(Request $request)
    {   

        $data                         = $request->all();
        $estudio                      = EstudioEse::find( $data['id_estudio'] );
        $estudio->id_status           = EstudioEse::CERRADA;
        $estudio->fecha_cierre        = date("Y-m-d H:i:s");
        $estudio->save();
        $descripcion = 'El estudio fue cerrado por : ' . $request->user()->name . ' ' . $request->user()->apellido_paterno . ' ' . $request->user()->apellido_materno;
        
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );

        return redirect('estudio-ese');
        
        
    }

    public function cancelarEstudio(Request $request)
    {   

        
        $data                         = $request->all();
        $estudio                      = EstudioEse::find( $data['id_estudio'] );
        $estudio->id_status           = EstudioEse::CANCELADA;
        $estudio->fecha_cancelacion   = date("Y-m-d H:i:s");
        $estudio->save();
        $descripcion = 'El estudio fue cancelado por : ' . $request->user()->name . ' ' . $request->user()->apellido_paterno . ' ' . $request->user()->apellido_materno;
        
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );

        return redirect('estudio-ese');
        
    }

    public function noIniciarEstudio(Request $request)
    {
        $data = $request->all();
        return redirect('detalleOsEstudio/' . $data['id_os']);
    }

    public function addAnexo(Request $request)
    {

        $this->validate( $request, [
            'file_anexo.*' => 'mimes:doc,docx,xls,xlsx,jpg,jpeg,png,pdf,zip,csv'

        ],[
            'file_anexo.*.mimes' => 'Solo se permiten los archivos: doc,docx,xls,xlsx,jpg,jpeg,png,pdf,zip,csv',
            
        ]);
        
        $data         = $request->all();
        $estudio      = EstudioEse::find($data['id_ese']);
        $seleccionado = $data['seleccionado'];
        $files        = $data['file_anexo'];
        $tipos        = $data['tipo'];
        $root         = 'ESE';
        $path_ese     = 'ESE\\ese' . $data['id_ese'];
        $descripcion  = 'Se subieron los anexos: ';

        $this->createPath($root);
        
        $path_file = $this->createPath($path_ese);

        $descripcion .= $this->addFiles($tipos, $seleccionado, $files, $path_file, $estudio);


        

        $descripcion .= ' por: ' . 
                        $request->user()->name . ' ' . 
                        $request->user()->apellido_paterno . ' ' . 
                        $request->user()->apellido_materno;
        
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );
        
        return back();
    }

    private function addFiles($tipos, $seleccion, $files, $path_file, $estudio)
    {
        $strAddFile = '';
        foreach ( $seleccion as $key => $value ) 
        {
            if($value != 0 )
            {   
                $name_file = $files[$key]->getClientOriginalName();
                $files[$key]->move($path_file,$name_file);         
                $anexo = new Anexo(['tipo' => $tipos[$key] ,'carpeta' => $path_file,'archivo' => $name_file]);
                $estudio->anexos()->save( $anexo ); 
                $strAddFile .= '   Tipo: ' . $tipos[$key] . ' Archivo: ' . $name_file ;
            }
        }

        return $strAddFile;

    }

     public function addImagen(Request $request)
    {    
        

        $this->validate( $request, [
            'file_imagen.*' => 'image',       

        ],[
            'file_imagen.*.image' => 'Solo se permiten imagenes.',
            
        ]);

        $data         = $request->all();
        $estudio      = EstudioEse::find($data['id_ese']);
        $seleccionado = $data['seleccionado'];
        $files        = $data['file_imagen'];
        $tipos        = $data['tipo'];
        $root         = 'ESE';
        $path_ese     = 'ESE\\ese' . $data['id_ese'];
        $descripcion  = 'Se subieron los imagenes: ';

        $this->createPath($root);
        
        $path_file = $this->createPath($path_ese);

        $descripcion .= $this->addImagenes($tipos, $seleccionado, $files, $path_file, $estudio);


        $descripcion .= ' por: ' . 
                        $request->user()->name . ' ' . 
                        $request->user()->apellido_paterno . ' ' . 
                        $request->user()->apellido_materno;
        
        $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );
        
        return back();
    }

    private function addImagenes($tipos, $seleccion, $files, $path_file, $estudio)
    {
        $strAddFile = '';
        foreach ( $seleccion as $key => $value ) 
        {
            if($value != 0 )
            {   
                $name_file = $files[$key]->getClientOriginalName();
                $files[$key]->move($path_file,$name_file);         
                $anexo = new Imagen(['tipo' => $tipos[$key] ,'carpeta' => $path_file,'archivo' => $name_file]);
                $estudio->anexos()->save( $anexo ); 
                $strAddFile .= '   Tipo: ' . $tipos[$key] . ' Archivo: ' . $name_file ;
            }
        }

        return $strAddFile;

    }

    public function createPath($ruta)
    {        
        $path = $ruta; 
        if( !file_exists($path) )
        {
            mkdir($path);            
            chmod($path,  0777);
        }

        return $path;
    }

    public function downloadFileAnexo(Request $request)
    {
        $anexo     = Anexo::find( $request->anexo );
        
        if($anexo)
        {
            $path_file = $anexo->carpeta.'\\'.$anexo->archivo;            

            return response()->download($path_file);
        }

        return back();
    }

    public function downloadFileImagen(Request $request)
    {
        $anexo     = Imagen::find( $request->imagen );
        
        if($anexo)
        {
            $path_file = $anexo->carpeta.'\\'.$anexo->archivo;            

            return response()->download($path_file);
        }

        return back();
    }

    private function kardex( $modulo = 'ese', $submodulo = 'ese.nucleo', $accionKardex = 'modificacion', $descripcion, $usuario, $objeto )
    {       

        $modulo         = Modulo::where('slug',$modulo)->get();
        $submodulo      = SubModulo::where('slug', $submodulo)->get();
        $accion_kardex  = Accion::where('slug',$accionKardex )->get();

        $kardex = Kardex::create([  "id_cn"         => $usuario->idcn,
                                    "id_usuario"    => $usuario->id,
                                    "id_modulo"     => $modulo[0]->id,
                                    "id_submodulo"  => $submodulo[0]->id,
                                    "id_accion"     => $accion_kardex[0]->id,
                                    "id_objeto"     => $objeto->id,
                                    "descripcion"   => $descripcion ]);
    }

    public function listaInvestigadores(Request $request)
    {

        $ejecutivos = null;
        if( $request->user()->is('admin') ){
            //$ejecutivos = User::all();            
            $ejecutivos = User::where('tipo','f')->get();            
        }else{
            $cn = CentroNegocio::find( $request->user()->idcn);
            $ejecutivos = $cn->ejecutivos->where('tipo','f');
        }

        return view('ESE.ejecutivo.index',['ejecutivos' => $ejecutivos]);

    }

    public function asignarPlantilla(Request $request)
    {        
        $estudio = EstudioEse::find( $request->id_ese );

        if( $estudio )
        {
            $estudio->id_plantilla = $request->id_plantilla;
            $estudio->save();

            $descripcion = 'EL ejecutivo: ' . $request->user()->name . ' (' . $request->user()->username . ')' . ', seleccionó la plantilla: ' . $estudio->plantilla->nombre;
    

            $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );

            return response()->json(['data' => [ 'status' => 'true', 'message' => 'Plantilla asignada con éxito','accion' => 'Asignación Plantilla' ]]);

        }

        return response()->json(['data' => [ 'status' => 'false' ]]);
    }


    public function downloadPdfEse( Request $request )
    {
         $estudio = EstudioEse::with('cliente','ejecutivoPrincipal','plantilla.plantilla')->find( $request->estudio );
  
         if( $estudio )
         {
           $plantilla_base = $estudio->plantilla->plantilla;
           
          

            $tipo = $plantilla_base->tipo;

                  
            if($tipo != 'no aplica')
            {


           
                $data = [ 'estudio' => $estudio,
                          'pintar'  => false,
                          'datos'   => []
                 ];

/*
                /*if( $tipo == 'jll' )
                {*/
                    //return view('ESE.pdf-plantillas.pdf-' . $tipo, compact('data'));
                  return view('ESE.pdf-plantillas.pdf-' . $tipo, compact('estudio'));

                /*} 
*/
        switch ( $tipo) {
            case 'hsbc':
                return view('ESE.pdf-plantillas.pdf-' . $tipo, compact('estudio'));
                break;
            case 'metlife':
                    return view('ESE.pdf-plantillas.pdf-' . $tipo, compact('estudio'));
                break;
            case 'jll':
                    return view('ESE.pdf-plantillas.pdf-' . $tipo, compact('estudio'));
                break;
            case 'gnp':
                    return view('ESE.pdf-plantillas.pdf-' . $tipo, compact('estudio'));
                $pdf->setPaper('letter', 'portrait');
                
                return $pdf->download();
                break;
            
            default:
                $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-' . $tipo , compact('data') );
                                  
                break;
           }

              
            } 

            return back();           
            
        }

         return back();
         
    }

    public function deleteFileImagen( Request $request )
    {

        if( $request->has('id_imagen') )
        {
            $imagen = Imagen::find( $request->input('id_imagen') );
            $imagen->delete();            
        }

        return back();
        

    }

    public function guardarViaticos( Request $request )
    {
        $estudio = EstudioEse::find( $request->id_ese );

        if( $estudio )
        {
            $estudio->viaticos = $request->cantidad;
            $estudio->save();

            $descripcion = 'Se asigno viáticos al estudio ESE-' . $estudio->id . ' :' . $request->cantidad . ' por: ' . $request->user()->nombre_ejecutivo;
            $this->kardex( 'ese', 'ese.nucleo', 'modificacion', $descripcion, $request->user(), $estudio );

            
            return response()->json( ['data' => ['message' => 'Asignación de viáticos','accion' => 'viáticos','status' => 'true'] ] );            
        }

        return response()->json( ['data' => ['message' => 'No se asignaron viáticos','accion' => 'viáticos','status' => 'false'] ] );
    }
    public function downloadFileFormatosEse()
    {
        $path_file=public_path('ESE/FormatosEse/ContratacionEmpleado.zip');
        
       
                    

            return response()->download($path_file);


        return back();
    }



}
