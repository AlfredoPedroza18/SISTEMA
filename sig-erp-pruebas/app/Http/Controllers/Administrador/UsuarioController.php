<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Bican\Roles\Models\Role as Puesto;
use Bican\Roles\Models\Permission as Permisos;
use App\CentroNegocio;
use App\Cliente;
use App\Http\Requests\UsuarioRequest as UsuarioValidacion;
use App\Http\Requests\UsuarioForaneoRequest as UsuarioForaneoValidacion;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

use Crypt;




class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['usuarioForaneo']]);
       $this->middleware('auth.create.users:' . auth()->user()->isAbleCreateUser()->usuarios ,['only' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::all();        
        return view('administrador.usuarios.index',['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos       = Puesto::orderBy('name', 'asc')->get();
        $departamentos = CentroNegocio::all();
        return view('administrador.usuarios.create_user',
                    ['puestos'       => $puestos,
                     'departamentos' => $departamentos,
                     'cn_usuario'    => null,
                     'rol_usuario'   => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioValidacion $request)
    {
        

        $usuario       = new User();
        $passwd        = trim($request->password_aux);
        $puesto        = $request->puesto;
        $departamento  = $request->idcn;  


        $usuario->idcn              = $departamento;
        $usuario->name              = trim($request->name);
        $usuario->apellido_paterno  = trim($request->apellido_paterno);
        $usuario->apellido_materno  = trim($request->apellido_materno);
        $usuario->nick_name         = trim($request->nick_name);
        $usuario->username          = trim($request->username);
        $usuario->email             = trim($request->email);
        $usuario->password          = bcrypt($passwd); 
        $usuario->password_aux      = $passwd; 
        $usuario->telefono_oficina  = trim($request->telefono_oficina);
        $usuario->telefono_movil    = trim($request->telefono_movil);        
        $usuario->save();
        if($usuario){
            $usuario->attachRole($puesto);

            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.usuarios')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();
            $role           = Puesto::find($puesto);

            if( $request->firma )
            {
                $path_firma = 'Firmas\\' . strtolower($usuario->name).'_'. $usuario->id;            
                $path_file  = $this->createPath($path_firma);

                

                $this->addFirma($request->firma, $path_file, $usuario); 
            }
            

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $usuario->id,
                                        "descripcion"   => "Alta Usuario: " . $usuario->name . " con el Puesto " . $role->name]);                    
        
            return redirect()
                    ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                    ->with(['success' => $usuario->name . ' se registro con éxito',
                            'type'    => 'success']);          
        }

        return redirect()
                    ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                    ->with(['success' => ' No se registro el usuario intentelo de nuevo.',
                            'type'    => 'warning']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);

        if($usuario){
            return view('administrador.usuarios.show_user',['usuario' => $usuario]);
        }


        //Se mostrara mensaje de error si el usuario no se encuentra
        return view('errors.503');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario   = User::find($id);


        

        if($usuario){
            
            
            $rol           = ( count( $usuario->getRoles() ) > 0 ) ? $usuario->getRoles()[0] : $this->setPuesto($usuario); 
            $cn_usuario    = $usuario->idcn;
            $puesto        = Puesto::find($rol->id);                        
            $puestos       = Puesto::orderBy('name', 'asc')->get();
            $departamentos = CentroNegocio::all();

            return view('administrador.usuarios.edit_user',
                            ['usuario'       => $usuario,
                             'puestos'       => $puestos,
                             'departamentos' => $departamentos,
                             'cn_usuario'    => $cn_usuario,
                             'rol_usuario'   => $rol->id,
                             'password'      => $usuario->password_aux
                             
                             ]);
        }

        
        return view('errors.503');
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


        $this->validate($request, 
        [    'firma' => 'image',       

        ],[  'firma.image' => 'La firma DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN, los datos del formulario no fueron gurdados, intenta de nuevo.',
        
        ]);
        
        
        
        $user = User::find($id);
        if($user){
            //Elimina el rol asociado al usuario
            $user->detachAllRoles();
            $passwd  = trim($request->password_aux);


            $user->idcn              = $request->idcn;
            $user->name              = trim($request->name);
            $user->apellido_paterno  = trim($request->apellido_paterno);
            $user->apellido_materno  = trim($request->apellido_materno);
            $user->nick_name         = trim($request->nick_name);
            $user->username          = trim($request->username);
            $user->email             = trim($request->email);
            $user->password          = bcrypt($passwd);
            $user->password_aux      = $passwd;
            $user->telefono_oficina  = trim($request->telefono_oficina);
            $user->telefono_movil    = trim($request->telefono_movil);        
            $user->save(); 

            $user->attachRole($request->puesto);
                     
            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.usuarios')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();
            $role           = Puesto::find($request->puesto);

            if( $request->firma )
            {
                $path_firma = 'Firmas\\' . strtolower($user->name).'_'. $user->id;            
                $path_file  = $this->createPath($path_firma);

                

                $this->addFirma($request->firma, $path_file, $user); 
            }


            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $user->id,
                                        "descripcion"   => "Modificación Usuario: " . $user->name . ", puesto asignado " . $role->name]);
        
            return redirect()
                    ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                    ->with(['success' => $user->name . ' actualizado con éxito',
                            'type'    => 'success']);          
        }

        return redirect()
                    ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                    ->with(['success' => $user->name . ' no fue actualizado con éxito',
                            'type'    => 'warning']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $usuario = User::find($id);
        if($usuario){
            $prospectos = Cliente::where('id_user', $id)->get();
            if(count( $prospectos )){
                return redirect()
                        ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                        ->with(['success' => $usuario->name .' NO sepuede eliminar tiene '.count( $prospectos ).' Cliente(s)/Prospecto(s) asociado(s)',
                                'type'    => 'warning']);
            
            }else{


                $modulo         = Modulo::where('slug','administrador')->get();
                $submodulo      = SubModulo::where('slug','administrador.usuarios')->get();
                $accion_kardex  = Accion::where('slug','alta')->get();
                
                

                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                            "id_usuario"    => $request->user()->id,
                                            "id_modulo"     => $modulo[0]->id,
                                            "id_submodulo"  => $submodulo[0]->id,
                                            "id_accion"     => $accion_kardex[0]->id,
                                            "id_objeto"     => $usuario->id,
                                            "descripcion"   => "Eliminación Usuario: " . $usuario->name]);                    

                $usuario->delete();
                return redirect()
                    ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                    ->with(['success' => $usuario->name . ' se elimino con éxito',
                            'type'    => 'success']);
            }
            
            

        }else{
            return redirect()
                    ->route('sig-erp-crm::modulo.administrador.usuarios.index')
                    ->with(['success' => 'No se encuentra ese usuario',
                            'type'    => 'warning']);
        }



    }

    public function setPuesto($user)
    {
        $user->attachRole(1);
        return $user->getRoles()[0];
    }


    public function usuarioForaneo( UsuarioForaneoValidacion $request )
    {
        
        $usuario       = new User();
        $passwd        = trim($request->password);
        $puesto        = $request->puesto;
        $departamento  = $request->cn;  


        $usuario->idcn              = $departamento;
        $usuario->name              = trim($request->name);
        $usuario->apellido_paterno  = trim($request->apellido_paterno);
        $usuario->apellido_materno  = trim($request->apellido_materno);
        $usuario->nick_name         = trim($request->nick_name);
        $usuario->username          = trim($request->username);
        $usuario->email             = trim($request->email);
        $usuario->password          = bcrypt($passwd);
        $usuario->password_aux      = $passwd; 
        $usuario->telefono_oficina  = trim($request->telefono_oficina);
        $usuario->telefono_movil    = trim($request->telefono_movil);        
        $usuario->tipo              = 'f';        
        $usuario->save();

        if( $usuario )
        {

            $foraneo = Puesto::where('slug','investigador.foraneo')->first();
            $usuario->attachRole( $foraneo );
            return back();
        }

    }

    private function createPath($ruta)
    {        
        $path = $ruta; 
        if( !file_exists($path) )
        {
            File::makeDirectory(public_path().'/'.$path,0777,true);
        }

        return $path;
    }

    private function addFirma($file, $path_file, $usuario)
    {
        $strAddFile = '';
        $name_file  = $file->getClientOriginalName();
        $file->move($path_file,$name_file);         
        $usuario->path = $path_file;
        $usuario->file = $name_file;
        $usuario->save();
        

    }
}
