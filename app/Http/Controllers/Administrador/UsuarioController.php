<?php



namespace App\Http\Controllers\Administrador;



use Illuminate\Http\Request;

use File;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\User;

use Bican\Roles\Models\Role as Puesto;

use Bican\Roles\Models\Permission as Permisos;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Input;

use App\CentroNegocio;

use App\Cliente;

use App\Asignacion\ClienteCN;

use App\MasterClientes;

use App\Facturadora;

use App\ReciboEmpleado;

use App\MasterPuesto;

use App\ModulosAcceso;

use App\ModulosAccesoUsuarios;

use Illuminate\Support\Facades\Validator;



use App\Http\Requests\UsuarioRequest as UsuarioValidacion;

use App\Http\Requests\UsuarioForaneoRequest as UsuarioForaneoValidacion;

use App\Administrador\Kardex;

use App\Administrador\SubModulo;

use App\Administrador\Modulo;

use App\Administrador\Accion;

use DB;

use Crypt;

use Illuminate\Support\Facades\Auth;







class UsuarioController extends Controller

{



    public function __construct()

    {

        $this->middleware('auth',['except' => ['usuarioForaneo']]);

      // $this->middleware('auth.create.users:' . auth()->user()->isAbleCreateUser()->usuarios ,['only' => ['create','store']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {



        $query="select u.*, mp.Nombre as Puesto, cn.nomenclatura as Departamento

        from users u

        left join master_puesto mp on mp.IdPuesto = u.IdPuesto

        left join centros_negocio cn on cn.id = u.idcn

        where u.tipo = 's' and u.idrol != 4" ;



        $usuarios=DB::select($query);



        return view('administrador.usuarios.index',

        ['usuarios' => $usuarios]);

    }



    public function empleado()

    {





        // $usuarios = User::where('tipo','e')->get();

        $query="select u.*, mp.Nombre as Puesto, cn.nomenclatura as Departamento

        from users u

        left join master_puesto mp on mp.IdPuesto = u.IdPuesto

        left join centros_negocio cn on cn.id = u.idcn

        where u.tipo = 'e'" ;



        $usuarios=DB::select($query);



        return view('administrador.usuarios.index',['usuarios' => $usuarios]);

    }



    public function cliente()

    {




        // $usuarios = User::where('tipo','e')->get();

        $query="select u.*,mc.nombre_comercial as Empresa,'' as CodigoCliente,mp.Nombre as Puesto,mc.rfc,mc.nombre_comercial

        from users u

        left join clientes mc on mc.id = u.IdCliente

        left join master_puesto mp on mp.IdPuesto = u.IdPuesto

        where u.tipo = 'c'" ;



        $usuarios=DB::select($query);



        return view('administrador.usuarios.indexCliente',['usuarios' => $usuarios]);

    }





    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $puestos       = Puesto::orderBy('name', 'asc')->get();

        $perfilnomina = DB::table('master_perfiles')->get();

        $modulosacceso=ModulosAcceso::select('IdModulo','Codigo')->get();

        $Cpuestos=DB::table('master_puesto')

        ->join('master_empresa', 'master_puesto.IdEmpresa', '=', 'master_empresa.IdEmpresa')

                ->select('IdPuesto',DB::raw("CONCAT(master_puesto.Nombre,' - ',master_empresa.FK_Titulo) AS Nombre"),'master_puesto.IdEmpresa')

                // ->orderBy('IdPuesto','Asc')

                ->orderBy('master_puesto.IdEmpresa','Asc')

                ->get();

        // $Cpuestos       = MasterPuesto::orderBy('Nombre', 'asc')->get();

        $departamentos = CentroNegocio::all();

        $empresa = DB::table('master_empresa')->get();

        $roles=DB::select('SELECT u.id, CONCAT(UPPER(LEFT(u.description,1)),SUBSTR(u.description,2)) as rol

        FROM roles as u 

        WHERE u.id=98 or u.id=105'); 

        

        $base64 = $this->getBase64(public_path().'\assets\img\icono-galeria.jpg');

        $codpost="";

        $State="";

        $IdState="";

        $Municipio="";

        $Colonia="";

        $IdPais="";

        $Localidad="";

        $IdCodigoPostal="";


        $dataroles = DB::select('select us.id,CONCAT(us.`name`," ",us.apellido_paterno," ",us.apellido_materno)AS nombre,us.IdRol,us.IdRolEva from users us');

        $rolUser=DB::select('SELECT u.id, CONCAT(UPPER(LEFT(u.description,1)),SUBSTR(u.description,2)) as rol
        FROM roles as u 
        WHERE u.id=120 or u.id=121');

        return view('administrador.usuarios.create_user',

                    ['puestos'       => $puestos,

                    'modulosacceso'  => $modulosacceso,

                    'Cpuestos'       => $Cpuestos,

                     'departamentos' => $departamentos,

                     'perfilnomina'  => $perfilnomina,

                     'cn_usuario'    => null,

                     'rol_usuario'   => null,

                     'puestosc'      => null,

                     'nick_name'     => null,

                     'name'          => null,

                     'apellido_paterno'     => null,

                     'apellido_materno'     => null,

                     'username'      => null,

                     'password_aux'  => null,

                     'telefono_movil'  => null,

                     'telefono_oficina'  => null,

                     'email'  => null,

                     'empresa'=>$empresa,

                     'rols'   =>$roles,

                     'roluser'=>null,

                     'modo' => 'create',

                     'imgbase64' => $base64,

                     'cp' => null,

                     'State' => null,

                     'IdState' => null,

                     'Municipio' => null,

                     'Colonia' => null,

                     'Localidad' => null,

                     'IdCodigoPostal' => null,

                     'ColUpdate' => null,

                     'dataroles' => $dataroles,
                     
                     'roluser' => $rolUser

                     ]);

    }



    public function existecl(){



        $cliente=Input::get('cliente');



        $query='select users.name,users.IdCliente from users inner join master_clientes on(master_clientes.IdCliente = users.IdCliente) where master_clientes.IdCliente = :cl';



        $existenciacl=DB::select($query,[$cliente]);



        foreach ($existenciacl as  $excl) {

                        $existCl = $excl->IdCliente;

                    }



        if ($existCl == $cliente){

            $mens="<b>Este cliente ya esta dado de alta. Seleccione uno distinto.</b>";

            return response()->json($mens);

          

         

        }

        



    }



    public function existeclient(){



        $cliente=Input::get('cliente');



        $query='select Nombre from master_clientes where Nombre = :cl';



        $existenciacl=DB::select($query,[$cliente]);



        foreach ($existenciacl as  $excl) {

                        $existCl = $excl->Nombre;

                    }



        if ($existCl == $cliente){

            $mens="<b>Ya existe un cliente con este nombre. Ingrese uno distinto.</b>";

            return response()->json($mens);

          

         

        }

        



    }



    public function existeus(){



        $username=Input::get('username');



        $query='select username from users where username = :us';



        $existenciaus=DB::select($query,[$username]);



        foreach ($existenciaus as  $exus) {

                        $existUs = $exus->username;

                    }



        if ($existUs == $username){

            $mens="<b>El usuario ya existe. Ingrese uno distinto.</b>";

            return response()->json($mens);



        }



    }



    public function existeem(){



    $email=Input::get('email');



    $queryEm='select email from users where email = :email';



    $existenciaEm=DB::select($queryEm,[$email]);



    foreach ($existenciaEm as  $exEm) {

        $existEm = $exEm->email;

    }





    if ($existEm == $email){

        $mens="<b>El email ya existe. Ingrese uno distinto.</b>";

        return response()->json($mens);



    }







}



public function existecurp(){



    $Curp=Input::get('Curp');

    $queryCurp='select Curp from master_personal where Curp = :Curp';

    $queryCurp=DB::select($queryEm,[$Curp]);

    foreach ($queryCurp as  $exCurp) {

        $existCurp = $exCurp->Curp;

    }



    if ($existCurp == $Curp){

        $mens="<b>El Curp ya existe. Ingrese uno distinto.</b>";

        return response()->json($mens);

    }

}





    public function postAuth()

    {



        if(Input::get('Guardar')) {

            $input = Input::all();

            $rules = ['username' => 'unique:users,username','email' => 'unique:users,email','Curp' => 'unique:master_personal,Curp'];

            $validator = Validator::make($input, $rules);

        

            if($validator->fails()){

                return redirect('modulo/administrador/usuarios/empleados/nuevo-empleado')

                ->with(['mensaje'  =>  'Nombre de Usuario, Correo y/o Curp ya existe.',

                'type'    => 'success']);

            }else{

                $data = collect([$this->saveempleado()]); //if login then use this method

                $data->toArray();

                $d=$data[0];

            //    dd($data);

                if ($d=='num') {

                    return redirect('modulo/administrador/usuarios/empleados/nuevo-empleado')

                    ->with(['mensaje'  =>  'Este usuario ya esta dado de alta.',

                    'type'    => 'success']);



                }

                else{

                    return redirect('modulo/administrador/usuarios/empleados')

                    ->with(['success' => $data . ' se registro con éxito',

                    'type'    => 'success']);



                }

            }



        } elseif(Input::get('Buscar')) {

            $data  = collect([$this->Ecodigopostal()]);

            $data->toArray();

            //dd($data);

            return redirect('modulo/administrador/usuarios/empleados/nuevo-empleado')

                ->with('success',$data)

                ->withInput(request()->all());

        }



    }



    public function postAuthCliente()

    {

        

        if(Input::get('Guardar')) {

            $input = Input::all();

            $rules = ['username' => 'unique:users,username','email' => 'unique:users,email'];

            $validator = Validator::make($input, $rules);

        

            if($validator->fails()){

               

                return redirect('modulo/administrador/usuarios/clientes/nuevo-cliente')

                ->with(['mensaje'  =>  'Nombre de Usuario y/o Correo ya existe.',

                'type'    => 'success']);



            }else{

                $data = collect([$this->savecliente()]); 

                $data->toArray();

                $d=$data[0];



                    if ($d=='numc') {

                        return redirect('modulo/administrador/usuarios/clientes/nuevo-cliente')

                        ->with(['mensaje'  =>  'Este cliente ya esta dado de alta.',

                        'type'    => 'success']);



                    }

                    else{

                        return redirect('modulo/administrador/usuarios/clientes')

                        ->with(['success' => $data . ' se registro con éxito',

                        'type'    => 'success']);





                    }

            }

            









        } elseif(Input::get('Buscar')) {

            $data  = collect([$this->Ecodigopostal()]);

            $data->toArray();

            //dd($data);

            return redirect('modulo/administrador/usuarios/clientes/nuevo-cliente')

                ->with('success',$data)

                ->withInput(request()->all());

        }



    }



    public function postEdit($id)

    {

        //check which submit was clicked on



        if(Input::get('Guardar')) {

            $user=User::find($id);

            $queryCurp=DB::select("select Curp from master_personal where IdPersonal=$user->IdPersonal");

            foreach($queryCurp as $q){

                $curp=$q->Curp;

            }

            

            $input = Input::all();

            $rules = ['username' => 'unique:users,username,'.$user->username.',username', 'email' => 'unique:users,email,'.$user->email.',email','Curp' => 'unique:master_personal,Curp,'.$curp.',Curp'];

            $validator = Validator::make($input, $rules);

            if($validator->fails()){

                

                return redirect('modulo/administrador/usuarios/empleados/editar/'.$id)

                ->with(['warning' => ' Nombre de Usuario, Correo y/o Curp ya existe.',

                'type'    => 'warning']);



            }else{



                $data = collect([$this->updateEmpleado($id)]);

                $data->toArray();

                    return redirect('modulo/administrador/usuarios/empleados')

                    ->with(['success' =>  $data . ' se actualizó con éxito',

                    'type'    => 'success']);



            }

            



        } elseif(Input::get('Buscar')) {

            $data  = collect([$this->Ecodigopostal()]);

            $data->toArray();

            return redirect('modulo/administrador/usuarios/empleados/editar/'.$id)

                ->with('success',$data)

                ->withInput(request()->all());

        }



    }



    public function postEditCliente($id)

    {

        //check which submit was clicked on



        if(Input::get('Guardar')) {

            $user=User::find($id);

            $input = Input::all();

            $rules = ['username' => 'unique:users,username,'.$user->username.',username', 'email' => 'unique:users,email,'.$user->email.',email'];

            $validator = Validator::make($input, $rules);

            if($validator->fails()){

                

                return redirect('modulo/administrador/usuarios/clientes/editar/'.$id)

                ->with(['warning' => ' Nombre de Usuario y/o Correo ya existe.',

                'type'    => 'warning']);



            }else{



                $data = collect([$this->updateCliente($id)]);

                $data->toArray();

                return redirect('modulo/administrador/usuarios/clientes')

                ->with(['success' =>  $data . ' se actualizó con éxito',

                'type'    => 'success']);

               



            }

            

        } elseif(Input::get('Buscar')) {

            $data  = collect([$this->Ecodigopostal()]);

            $data->toArray();

            return redirect('modulo/administrador/usuarios/clientes/editar/'.$id)

                ->with('success',$data)

                ->withInput(request()->all());

        }



    }





    public function createEmpleado()

    {







        // $puestos       = Puesto::orderBy('name', 'asc')->get();

        // $departamentos = CentroNegocio::all();

        // $Cpuestos       = MasterPuesto::all();

        $empresas = Facturadora::all();

        $personal= ReciboEmpleado::all();

        $Activo='No';

      /*  return view('administrador.usuarios.create_user-empleado',

            ['puestos'       => $puestos,

                'departamentos' => $departamentos,

                'cn_usuario'    => null,

                'rol_usuario'   => null]);  */

        return view('administrador.usuarios.create_user-empleado')

        // ->with('puestos',$puestos)

        // ->with('departamentos',$departamentos)

        ->with('empresas',$empresas)

        // ->with('Cpuestos',$Cpuestos)

        ->with('personal',$personal)

        ->with('IdEmpresa',null)

        ->with('id_personal',null)

        // ->with('cn_usuario',null)

        // ->with('rol_usuario',null)

        // ->with('cod',null)

        // ->with('estado',null)

        // ->with('Municipio',null)

        ->with('Activo',$Activo);

        // ->with('colonia',null);





    }



    public function createCliente()

    {







        // $puestos       = Puesto::orderBy('name', 'asc')->get();

        $departamentos = CentroNegocio::all();

        $Cpuestos       = MasterPuesto::all();

      //  $empresas = Facturadora::all();

        $cliente= MasterClientes::all();

        $contactos= DB::table('contactos')->get();

        $Activo='Si';

        $ActC='No';

        return view('administrador.usuarios.create_user-cliente')

        // ->with('puestos',$puestos)

        ->with('departamentos',$departamentos)

      //  ->with('empresas',$empresas)

        ->with('Cpuestos',$Cpuestos)

        ->with('Contactos',$contactos)

        ->with('id_empresa',null)

        ->with('nick_name',null)

        ->with('cliente',$cliente)

        ->with('Activo',null)

        ->with('nombre_comercial',null)

        ->with('cod',null)

        ->with('estado',null)

        ->with('Municipio',null)

        ->with('colonia',null)

        ->with('Activo',$Activo)

        ->with('ActC',$ActC)

        ;





    }



    public function selectEmpleado(){

      $data='';

      $IdEmp=Input::get('id');

      $query="select IdPersonal,IdEmpresa, concat(Nombre,' ',APaterno,' ',AMaterno) as Nombre from master_personal where IdEmpresa = {$IdEmp}";

      $select=DB::select($query);

      echo "<select id='personal' name='personal'>";

      foreach ($select as  $per) {

          echo "<option value='$per->IdPersonal'> $per->Nombre </option>";

      }

        echo "</select>";

    }



    public function compose($view)

    {

        $data = $view->getData();

        $section = isset($data['section']) ? $data['section'] : 'site';

        $view->with('navigation', $this->sections[$section]);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store()

    {

        $validation = Validator::make( [Input::get('username'),Input::get('email')], [

            'username'=>'unique',

            'email'=>'unique',

        ]);

        if($validation->fails()){

            return redirect()

            ->route('sig-erp-crm::modulo.administrador.usuarios.index')

            ->with(['warning' => ' Nombre de Usuario y/o Correo ya existe.',

                    'type'    => 'warning']);

        }else{

            $usuario       = new User();

            $passwd        = trim(Input::get('password_aux'));

            $puesto        = Input::get('perfilnomina');

            $Cpuesto       = Input::get('cpuesto');

            $departamento  = Input::get('departamento');



            $usuario->idcn              = $departamento;

            $usuario->IdRol             = trim(Input::get('roles'));

            $usuario->IdPerfil          = trim(Input::get('perfilnomina'));

            $usuario->IdPermisoWeb      = trim(Input::get('puesto'));

            $usuario->IdPuesto          = $Cpuesto;

            $usuario->name              = trim(Input::get('name'));

            $usuario->apellido_paterno  = trim(Input::get('apellido_paterno'));

            $usuario->apellido_materno  = trim(Input::get('apellido_materno'));

            $usuario->Genero            = trim(Input::get('Genero'));

            $usuario->FechaNacimiento   = trim(Input::get('FechaNacimiento'));

            $usuario->ext               = trim(Input::get('ext'));

            $usuario->nick_name         = str_replace(' ', '', Input::get('name')).'.'.trim(Input::get('apellido_paterno')).'.'.trim(Input::get('apellido_materno'));

            $usuario->username          = trim(Input::get('username'));

            $usuario->email             = trim(Input::get('email'));

            $usuario->password          = bcrypt($passwd);

            $datos= DB::select("SELECT AES_ENCRYPT('{$passwd}', 'DSAI2020') as pw");

            $contras="";

            foreach ($datos as  $dato) {

                $contras = $dato->pw;

            }



            $usuario->password_mobile   = $contras;

            $usuario->password_aux      = $passwd;

            $usuario->telefono_oficina  = trim(Input::get('telefono_oficina'));

            $usuario->telefono_movil    = trim(Input::get('telefono_movil'));

            $usuario->Colonia           = trim(Input::get('Colonia'));

            $usuario->IdPais            = trim(Input::get('IdPais'));

            $usuario->IdEstado          = trim(Input::get('IdEstado'));

            $usuario->Municipio         = trim(Input::get('municipio'));

            $usuario->Localidad         = trim(Input::get('Localidad'));

            $usuario->IdCodigoPostal    = trim(Input::get('IdCodigoPostal'));

            $usuario->CodigoPostal      = trim(Input::get('CP'));



            $usuario->save();



            if($usuario){



                $permiso = DB::table('users')->where('id',$usuario->id)->update(

                    array('IdPerfil'=>$puesto,

                    'PermisoModuloConexiones'=>'No',

                    'CambiarContrasena'=>'No',

                    'ModificarNombre'=>'No',

                    'ModificarOtrosUsuarios'=>'No',

                    'Editable'=>'No'));

                    

                   

                    if(Input::get('moduloacceso')<>null){

                        $empresa = DB::table('master_empresa')->get();

                        $permisos = DB::select("select IdEmpresa from master_empresa_usuario where IdUsuario = $usuario->id");

                        $permiso=[];$c=0;

                        foreach($permisos as $p){ $c++;

                            $permiso[$c]=$p->IdEmpresa;

                        } 

        

                        foreach ($empresa as $e) {

                            $emp = $e->IdEmpresa;

                            $val= (in_array($emp,Input::get('moduloacceso')) ? 'Si' : 'No'); 

                            if(in_array($e->IdEmpresa, $permiso)){

                                DB::table('master_empresa_usuario')->where('IdEmpresa',$e->IdEmpresa)->update(

                                    array('Activo'=>$val));

                                    // $empp[]=$e->IdEmpresa.' '.$val;

                            }

                            else{

                                DB::table('master_empresa_usuario')->insert(

                                array('IdEmpresa'=>$e->IdEmpresa,

                                'IdUsuario'=>$usuario->id,

                                'Activo'=>$val));

                                // $empp[]=$e->IdEmpresa.' '.$val;

                            }

                            $val='';

                        }

                    }

                    



                $usuario->attachRole($puesto);



                $modulo         = Modulo::where('slug','administrador')->get();

                $submodulo      = SubModulo::where('slug','administrador.usuarios')->get();

                $accion_kardex  = Accion::where('slug','alta')->get();

                $role           = Puesto::find($puesto);



                if( Input::file('firma') )

                {

                    $name_file  = Input::file('firma')->getClientOriginalName();

                    $imagedata = file_get_contents(Input::file('firma'));

                    $base64 = base64_encode($imagedata);

                    $usuario->file = $name_file;

                    $usuario->fileBase64 = $base64;

                    $usuario->save();

                }



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

    }



    public function Ecodigopostal()

    {





        $cp = request()->input('CodigoPostal');



        $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,

        cp.CodigoMunicipio,

        e.FK_nombre_estado as estado,

        e.IdEstado,

        m.Descripcion as Municipio,

        m.IdMunicipio, l.Descripcion as localidad,

        l.IdLocalidad,

        col.Colonia,

        p.IdPais

        From cfdi_codigopostal as cp

        INNER JOIN estados e on e.Codigo = cp.CodigoEstado

        left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

        left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

        left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)

        left join master_pais as p on (p.IdPais = e.IdPais)

        Where cp.CodigoPostal = :CodigoPostal

        ORDER BY CodigoPostal Asc';



        /*========CP========*/

        $codigopostal=DB::select($query,[$cp]);



        $cod="";

        $estado="";

        $municipio="";

        $colonia="";

        $Localidad="";

        $IdState="";

        $IdCP="";



        foreach ($codigopostal as  $CP) {

            $cod = $CP->CodigoPostal;

            $estado = $CP->estado;

            $IdState = $CP->IdEstado;

            $IdCP = $CP->IdCodigoPostal;

            $municipio = $CP->Municipio;

            $colonia = $CP->Colonia;

            $Localidad=$CP->localidad;



        }





        $data = array(

            'Estado'  => $estado,

            'Municipio'=> $municipio,

            'Colonia' => $colonia,

            'Localidad'=>$Localidad,

            'IdEstado' => $IdState,

            'IdCodigoPostal' => $IdCP

        );





         return $data;



    //    dd($data);



    }





    public function saveempleado(  )

    {





        $passwd        = trim(Input::get('password_aux'));

        // $puesto        = Input::get('puesto');

        // $departamento  = Input::get('departamento');

        // $CPuesto       = trim(Input::get('cpuesto'));

        $empresa       = Input::get('empresa');

        $IdP           = trim(Input::get('personal'));



        $idModAcceso=Input::get('IdModuloAcceso');

        if($idModAcceso!=0){

            $idModAcceso=Input::get('IdModuloAcceso');

        }else{

            $idModAcceso=null;

        }



        $val = trim(Input::get('valida'));

        if($val == 1){

            $IdPer = ReciboEmpleado::find($IdP);



            if($IdPer){



                    $query='select users.*

                    from users

                    where users.IdPersonal= :id';



                    /*========CP========*/

                    $datos=DB::select($query,[$IdP]);



                    $IdPersonal="";



                    foreach ($datos as  $dato) {

                        $IdPersonal = $dato->IdPersonal;

                    }



                    $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

                    

                    $datos=DB::select($contr,[$passwd]);

                    $contras="";

                    foreach ($datos as  $dato) {

                        $contras = $dato->pw;

                    }



                    if($IdPersonal==null){



                        if( Input::file('Imagen') )

                        {

                            $file = Input::file('Imagen');

                            $imagedata = file_get_contents($file);

                            $base64 = base64_encode($imagedata);

                            

                        }else{

                            $base64=null;

                        }



                        $Nombre= $IdPer->Nombre;

                        $APP= $IdPer->APaterno;

                        $APM= $IdPer->AMaterno;

                        $Email= $IdPer->CorreoElectronico;

                        $Oficina= $IdPer->Telefono;

                        $Movil= $IdPer->Movil;



                        $usuario       = new User();

                        $usuario->idcn              = 21;

                        // $usuario->IdPuesto          = $CPuesto;

                        $usuario->name              = $Nombre;

                        $usuario->apellido_paterno  = $APP;

                        $usuario->apellido_materno  = $APM;

                        $usuario->nick_name         = str_replace(' ', '', $Nombre).'.'.trim($APP).'.'.trim($APM);

                        $usuario->Genero            = trim(Input::get('Genero'));

                        $usuario->FechaNacimiento   = trim(Input::get('FechaNacimiento'));

                        $usuario->ext               = trim(Input::get('ext'));

                        // $usuario->nick_name         = trim(Input::get('nick_name'));

                        $usuario->username          = trim(Input::get('username'));

                        $usuario->IdPersonal        = $IdP;

                            if($Email == NULL)

                            {

                                $usuario->email = "";

                            }

                            else{

                            $usuario->email             = $Email;

                            }

                        $usuario->password          = bcrypt($passwd);

                        $usuario->password_mobile = $contras;

                        //$dcontra=openssl_decrypt($contra, "AES-128-ECB", 'DSAI2020');

                        $usuario->password_aux      = $passwd;

                        $usuario->telefono_oficina  = $Oficina;

                        $usuario->telefono_movil    = $Movil;

                        $usuario->tipo              = 'e';

                        // dd($contra);

                        // dd($dcontra);

                        $usuario->Imagen=$base64;

                        $usuario->save();

                        if($idModAcceso==null){

               

                            $modulosacceso  = ModulosAccesoUsuarios::Create([

                                "IdModulo"       => 2,

                                "IdUsuario"      => $usuario->id

                            ]);

                                                            

                        }else{

            

                            DB::update("update modulos_acceso_usuarios set IdModulo=2 where IdUsuarioModulo = $idModAcceso");

                        }

                        return $usuario->name;

                    }

                    else{

                        return 'num';

                    }



            }



        }

        else{



            if( Input::file('Imagen') )

            {

                $file = Input::file('Imagen');

                $imagedata = file_get_contents($file);

                $base64 = base64_encode($imagedata);

                

            }else{

                $base64=null;

            }

            $usuario       = new User();

            $usuario->idcn              = 21;

            // $usuario->IdPuesto          = $CPuesto;

            $usuario->name              = trim(Input::get('name'));

            $usuario->apellido_paterno  = trim(Input::get('apellido_paterno'));

            $usuario->apellido_materno  = trim(Input::get('apellido_materno'));

            $usuario->nick_name         = str_replace(' ', '', Input::get('name')).'.'.trim(Input::get('apellido_paterno')).'.'.trim(Input::get('apellido_materno'));

            $usuario->Genero            = trim(Input::get('Genero'));

            $usuario->FechaNacimiento   = trim(Input::get('FechaNacimiento'));

            $usuario->ext               = trim(Input::get('ext'));

            // $usuario->nick_name         = trim(Input::get('nick_name'));

            $usuario->username          = trim(Input::get('username'));

            $usuario->email             = trim(Input::get('email'));

            $usuario->password          = bcrypt($passwd);



            $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

            $datos=DB::select($contr,[$passwd]);

            $contras="";

            foreach ($datos as  $dato) {

                $contras = $dato->pw;

            }



            $usuario->password_mobile   = $contras;

            $usuario->password_aux      = $passwd;

            $usuario->telefono_oficina  = trim(Input::get('telefono_oficina'));

            $usuario->telefono_movil    = trim(Input::get('telefono_movil'));

            $usuario->tipo              = 'e';

            $usuario->Imagen=$base64;

            $usuario->save();



            $empleado= new ReciboEmpleado();

            $empleado->IdEmpresa        = $empresa;

            $empleado->Nombre           = trim(Input::get('name'));

            $empleado->APaterno         = trim(Input::get('apellido_paterno'));

            $empleado->AMaterno         = trim(Input::get('apellido_materno'));

            $empleado->Telefono         = trim(Input::get('telefono_oficina'));

            $empleado->Movil            = trim(Input::get('telefono_movil'));

            $empleado->CorreoElectronico= trim(Input::get('email'));

            // $empleado->CodigoPersonal   = trim(Input::get('CodigoPersonal'));

            $empleado->Sexo             = trim(Input::get('Genero'));

            // $empleado->CodigoPostal     = trim(Input::get('CodigoPostal'));

            // $empleado->Estado           = trim(Input::get('Estado'));

            // $empleado->IdCodigoPostal   = trim(Input::get('IdCodigoPostal'));

            // $empleado->Municipio        = trim(Input::get('Municipio'));

            // $empleado->Colonia          = trim(Input::get('Colonia'));

            // $empleado->Calle            = trim(Input::get('Calle'));

            $empleado->Curp             = trim(Input::get('Curp'));

            // $empleado->Rfc              = trim(Input::get('Rfc'));

            // $empleado->NSS              = trim(Input::get('NSS'));

            $empleado->FechaNacimiento  = trim(Input::get('FechaNacimiento'));

            $empleado->Imagen=$base64;

            $empleado->save();

            $usuario->IdPersonal        =$empleado->IdPersonal;

            $usuario->save();



            if($idModAcceso==null){

               

                $modulosacceso  = ModulosAccesoUsuarios::Create([

                    "IdModulo"       => 2,

                    "IdUsuario"      => $usuario->id

                ]);

                                                

            }else{



                DB::update("update modulos_acceso_usuarios set IdModulo=2 where IdUsuarioModulo = $idModAcceso");

            }



            return $usuario->name;

        }









    }



    private function setCNActual($id_cliente,$id_cn)

    {

            return DB::table('cliente_cn_actual')

                        ->insert(['id_cliente' => $id_cliente,'id_cn' => $id_cn]);



    }



    private function asignarCN($id_cn, $id_cliente, $id_user)

    {

        return ClienteCN::create([  'id_cn'      => $id_cn,

                                    'id_cliente' => $id_cliente,

                                    'id_usuario' => $id_user

                                   ]);

    }



    public function savecliente()

    {





        $usuario       = new User();

        // $departamento   =trim(Input::get('departamento'));

        $passwd        = trim(Input::get('password_aux'));

        // $CPuesto       = trim(Input::get('cpuesto'));

        // $contacto       = trim(Input::get('contacto'));

        $idModAcceso=Input::get('IdModuloAcceso');

        if($idModAcceso!=0){

            $idModAcceso=Input::get('IdModuloAcceso');

        }else{

            $idModAcceso=null;

        }



        if (Input::get('Activo')) {

            $Activo='Si';

        } else {

           $Activo='No';

        }



        $IdP = trim(Input::get('cliente'));



        $val = trim(Input::get('valida'));

        if($val == 1){



            // $validator = Validator::make(

            //     ['cliente' => 'required'],            

            //     ['username' => 'required'],

            //     ['password_aux' => 'required'],

            //     ['nombre_comercial' => 'nullable'],

            //     ['telefono_oficina' => 'nullable'],

            //     ['email' => 'nullable']

            // );

           

         



            $IdPer = MasterClientes::find($IdP);



            if($IdPer){



                    $query='select users.*

                    from users

                    where users.IdCliente= ?';



                    /*========CP========*/

                    $datos=DB::select($query,[$IdP]);



                    $IdCliente="";



                    foreach ($datos as  $dato) {

                        $IdCliente = $dato->IdCliente;

                    }



                    $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

                    $datos=DB::select($contr,[$passwd]);

                    $contras="";

                    foreach ($datos as  $dato) {

                        $contras = $dato->pw;

                    }



                    if($IdCliente==null){

                        $Nombre= $IdPer->Nombre;

                        // $APP= $IdPer->APaterno;

                        // $APM= $IdPer->AMaterno;

                        $Email= $IdPer->Correo;

                        $Oficina= $IdPer->Telefono_fijo;

                        // $Movil= $IdPer->Movil;





                       



                        // $usuario->IdPuesto          = $CPuesto;

                        $usuario->idcn              = 22;

                        $usuario->name              = $Nombre;

                        $usuario->nick_name         = $Nombre;

                        // $usuario->Genero            = trim(Input::get('Genero'));

                        // $usuario->FechaNacimiento  = trim(Input::get('FechaNacimiento'));

                        $usuario->username          = trim(Input::get('username'));

                        $usuario->IdCliente        = $IdP;

                            // if($Email == NULL)

                            // {

                            //     $usuario->email = "";

                            // }

                            // else{

                            $usuario->email= trim(Input::get('email'));

                            // }

                        $usuario->password          = bcrypt($passwd);

                        $usuario->password_mobile = $contras;

                        $usuario->password_aux      = $passwd;

                        $usuario->telefono_oficina  = trim(Input::get('telefono_oficina'));

                        $usuario->tipo              = 'c';

                        // $usuario->IdContacto        = $contacto;

                        // dd($usuario);

                        $usuario->save();



                        $this->asignarCN($usuario->idcn, $IdP, $usuario->id);

                        $this->setCNActual($IdP, $usuario->idcn);

         

                        if($idModAcceso==null){

               

                            $modulosacceso  = ModulosAccesoUsuarios::Create([

                                "IdModulo"       => 2,

                                "IdUsuario"      => $usuario->id

                            ]);

                                                            

                        }else{

            

                            DB::update("update modulos_acceso_usuarios set IdModulo=2 where IdUsuarioModulo = $idModAcceso");

                        }



                        return $usuario->name;

                    }

                    else{

                        return 'numc';

                    }



            }



        }

        else{

           



            $usuario->idcn              = 22;

            $usuario->name              = trim(Input::get('nombre_comercial'));

            $usuario->nick_name         = trim(Input::get('nombre_comercial'));

            $usuario->username          = trim(Input::get('username'));

            $usuario->email             = trim(Input::get('email'));

            $usuario->password          = bcrypt($passwd);

            $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

                $datos=DB::select($contr,[$passwd]);

                $contras="";

                foreach ($datos as  $dato) {

                    $contras = $dato->pw;

                }



            $usuario->password_mobile   = $contras;

            $usuario->password_aux      = $passwd;

            $usuario->telefono_oficina  = trim(Input::get('telefono_oficina'));

            $usuario->tipo              = 'c';

            // dd($usuario);

            $usuario->save();

            

            $Factur        = Facturadora::all();

            $ultimoAgregadoF  = $Factur->last();

            $FolioF = $ultimoAgregadoF->Codigo + 1;



            $empresa       = new Facturadora();

            $empresa->Codigo              = str_pad($FolioF, 3, "0", STR_PAD_LEFT);

            $empresa->FK_Titulo           = Input::get('nombre_comercial');

            $empresa->Activo                 = $Activo;

            $empresa->save();  

            $Id_Empresa = $empresa->IdEmpresa;



            $client=MasterClientes::all();

            $ultimoAgregado  = $client->last();

            $Folio = $ultimoAgregado->Codigo;

            $result = intval(preg_replace('/[^0-9]+/', '', $Folio), 10); 

            $cliente       = new MasterClientes();

                

            $cliente->Codigo              = 'CLIE'.'-'.str_pad($result+1, 4, "0", STR_PAD_LEFT);

            $cliente->Nombre              = trim(Input::get('nombre_comercial'));

            $cliente->Empresa             = trim(Input::get('nombre_comercial'));

            $cliente->Correo              = trim(Input::get('email'));

            $cliente->Telefono_fijo       = trim(Input::get('telefono_oficina'));

            $cliente->Activo              = $Activo;

            $cliente->IdEmpresa           = $Id_Empresa;

            $cliente->save();

            $id_cliente                   = $cliente->IdCliente;

            $usuario->IdCliente           = $id_cliente;



            $this->asignarCN($usuario->idcn, $id_cliente, $usuario->id);

            $this->setCNActual($id_cliente, $usuario->idcn);





            $usuario->save();



            if($idModAcceso==null){

               

                $modulosacceso  = ModulosAccesoUsuarios::Create([

                    "IdModulo"       => 2,

                    "IdUsuario"      => $usuario->id

                ]);

                                                

            }else{



                DB::update("update modulos_acceso_usuarios set IdModulo=2 where IdUsuarioModulo = $idModAcceso");

            }



            // dd($empleado);

            return $usuario->name;

        }









        // $puesto        = Input::get('puesto');

        // $departamento  = Input::get('cn');

        // $CPuesto       = trim(Input::get('cpuesto'));

        // $empresa       = Input::get('empresa');





        // $usuario->idcn              = $departamento;

        // $usuario->IdPuesto          = $CPuesto;





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

        $iddUsuario = $id;

       

        $usuario   = User::find($id);

        if($usuario){

            // $modA       = ModulosAcceso::select('IdModulo','Codigo')->get();

            $query='select users.*, if(users.IdPuesto is null ,0,users.IdPuesto) as Puesto,GROUP_CONCAT(concat(modulos_acceso.IdModulo,":",modulos_acceso.Codigo) SEPARATOR ",") AS Modulo

            from users

            left join modulos_acceso_usuarios on modulos_acceso_usuarios.IdUsuario = users.id

            left join modulos_acceso on modulos_acceso.IdModulo = modulos_acceso_usuarios.IdModulo 

            where users.id = ?';



            /*========CP========*/

            $datos=DB::select($query,[$id]);



            $id="";

            $idcn="";

            $nick_name="";

            $name="";

            $apellido_paterno="";

            $apellido_materno="";

            $username="";

            $password_aux="";

            $telefono_movil="";

            $telefono_oficina="";

            $email="";

            $file="";

            $Puesto="";

            $IdModuloAcceso="";



        foreach ($datos as  $dato) {

            $idusuario = $dato->id;

            $id_cn = $dato->idcn;

            $IdPuesto = $dato->Puesto;

            $IdPerfil = $dato->IdPerfil;

            $IdPermisoWeb = $dato->IdPermisoWeb;

            $nick_name = $dato->nick_name;

            $name      = $dato->name;

            $apellido_paterno = $dato->apellido_paterno;

            $apellido_materno = $dato->apellido_materno;



            $username = $dato->username;

            $password_aux = $dato->password_aux;

            $telefono_movil = $dato->telefono_movil;

            $telefono_oficina = $dato->telefono_oficina;

            $email = $dato->email;

            $firma = $dato->file;

            $Colonia = $dato->Colonia;

            $IdPais = $dato->IdPais;

            $IdEstado = $dato->IdEstado;

            $Municipio = $dato->Municipio;

            $Localidad = $dato->Localidad;

            $IdCodigoPostal = $dato->IdCodigoPostal;

            $CodigoPostal = $dato->CodigoPostal;

            $ColUpdate = $dato->Colonia;

        }

       



        $departamentos=DB::table('centros_negocio')

            ->select('id','nomenclatura')

           ->orderByRaw("FIELD(id, $id_cn) DESC")

            ->get();



            if($IdPermisoWeb==null){

                $puestos=DB::table('roles')

                ->select('roles.id','roles.name')

                ->get();

            }else{

                $puestos=DB::table('roles')

                ->select('roles.id','roles.name')

                ->orderByRaw("FIELD(roles.id, $IdPermisoWeb) DESC")

                ->get();

            }       



            if($IdPerfil==null){

                $perfilnomina=DB::table('master_perfiles')

                ->select('master_perfiles.IdPerfil','master_perfiles.Perfil')

                ->get();

            }else{

                $perfilnomina=DB::table('master_perfiles')

                ->select('master_perfiles.IdPerfil','master_perfiles.Perfil')

                ->orderByRaw("FIELD(master_perfiles.IdPerfil, $IdPerfil) DESC")

                ->get();

            }       

           



        $Cpuestos=DB::table('master_puesto')

        ->join('master_empresa', 'master_puesto.IdEmpresa', '=', 'master_empresa.IdEmpresa')

                ->select('IdPuesto',DB::raw("CONCAT(master_puesto.Nombre,' - ',master_empresa.FK_Titulo) AS Nombre"),'master_puesto.IdEmpresa')

                ->orderByRaw("FIELD (IdPuesto, $IdPuesto) DESC, master_puesto.IdEmpresa ASC")

                // ->orderByRaw("FIELD (IdPuesto, $IdPuesto) DESC")

                ->get();

       

        $empresa = DB::table('master_empresa')->get();

        $roles=DB::select('SELECT u.id, CONCAT(UPPER(LEFT(u.description,1)),SUBSTR(u.description,2)) as rol

        FROM roles as u 

        WHERE u.id=98 or u.id=105'); 



        $rolUser=DB::select('SELECT u.id, CONCAT(UPPER(LEFT(u.description,1)),SUBSTR(u.description,2)) as rol

        FROM roles as u 

        WHERE u.id=120 or u.id=121');

        /* **********COMENTARIO YOSIMAR************************

        $rolUser = DB::select("SELECT u.id,u.IdRol,

        IF(u.IdRol = 98,'Analista',

        IF(u.IdRol = 105,'Lider','Otro rol')

        ) as rol

        FROM users u WHERE u.id = $idusuario");



        foreach($rolUser as $r){

            $rolUser = $r->IdRol;

            // $rolF = $r->IdRol;

        }

        */



            $permisos = DB::select("select * from master_empresa_usuario where Activo = 'Si' and IdUsuario = $idusuario");

            $permiso=[];$c=0;

            foreach($permisos as $p){ $c++;

                $permiso[$c]=$p->IdEmpresa;

            }

        $base64 = '';

        if($usuario->fileBase64 != null && $usuario->fileBase64 != ''){

            $base64 = $usuario->fileBase64;

        }

        $base64 = ($base64 != '') ? $base64 : $this->getBase64(public_path().'\assets\img\icono-galeria.jpg');



        $cod = $CodigoPostal;

        $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,

        cp.CodigoMunicipio,

        e.FK_nombre_estado as estado,

        e.IdEstado,

        m.Descripcion as Municipio,

        m.IdMunicipio, l.Descripcion as localidad,

        l.IdLocalidad,

        col.Colonia,

        p.IdPais

        From cfdi_codigopostal as cp

        INNER JOIN estados e on e.Codigo = cp.CodigoEstado

        left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

        left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

        left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)

        left join master_pais as p on (p.IdPais = e.IdPais)

        Where (CodigoPostal = -1 or (CodigoPostal <> -1 and cp.CodigoPostal = ?))

        ORDER BY CodigoPostal Asc ';



        $cp=DB::select($query,[$cod]);



        $codpost="";

        $State="";

        $IdState="";

        $Municipio="";

        $Colonia="";

        $IdPais="";

        $Localidad="";

        $IdCodigoPostal="";



        foreach ($cp as  $cps) {

            $codpost=$cps->CodigoPostal;

            $State=$cps->estado;

            $IdState=$cps->IdEstado;

            $Municipio=$cps->Municipio;

            $Colonia=$cps->Colonia;

            $Localidad=$cps->localidad;

            $IdPais=$cps->IdPais;

            $IdCodigoPostal=$cps->IdCodigoPostal;

        }



        $col = explode(";", $Colonia);



        $dataroles = DB::select('select us.id,CONCAT(us.`name`," ",us.apellido_paterno," ",us.apellido_materno)AS nombre,us.IdRol,us.IdRolEva from users us where us.id ='.$iddUsuario);





        return view('administrador.usuarios.edit_user')

        ->with('usuario',$usuario)

        ->with('nick_name',$nick_name)

        ->with('name',$name)

        ->with('apellido_paterno',$apellido_paterno)

        ->with('apellido_materno',$apellido_materno)

        ->with('username',$username)

        ->with('password_aux',$password_aux)

        ->with('empresa',$empresa)

        ->with('telefono_movil',$telefono_movil)

        ->with('telefono_oficina',$telefono_oficina)

        ->with('email',$email)

        ->with('departamentos',$departamentos)

        ->with('puestos',$puestos)

        ->with('permiso',$permiso)

        ->with('perfilnomina',$perfilnomina)

        ->with('rols',$roles)

        ->with('modo','edicion')

        ->with('roluser',$rolUser)

        ->with('Cpuestos',$Cpuestos)

        ->with('imgbase64',$base64)

        ->with('cp', $codpost)

        ->with('State', $State)

        ->with('IdState', $IdState)

        ->with('Municipio',$Municipio)

        ->with('Colonia', $Colonia)

        ->with('Localidad', $Localidad)

        ->with('IdCodigoPostal', $IdCodigoPostal)

        ->with('IdPais',$IdPais)

        ->with('dataroles',$dataroles)

        ->with('ColUpdate',$ColUpdate);

        }





        return view('errors.503');

    }



    public function editarEmpleado($id)

    {



        $query='select users.*, master_personal.*,ifnull(users.IdPuesto,0) as Puesto,if(modulos_acceso_usuarios.IdModulo is null ,0,modulos_acceso_usuarios.IdModulo) as Modulo

        from users

        left join master_personal ON master_personal.IdPersonal = users.IdPersonal

        left join modulos_acceso_usuarios on modulos_acceso_usuarios.IdUsuario = users.id

        left join modulos_acceso on modulos_acceso.IdModulo = modulos_acceso_usuarios.IdModulo 

        where users.id = ?';



        /*========CP========*/

        $datos=DB::select($query,[$id]);

        // $id_cn="";

        $IdEmpresa="";

        // $IdPuesto="";

        // $nick_name="";

        $name="";

        $apellido_paterno="";

        $apellido_materno="";

        // $CodigoPersonal="";

        $username="";

        $Sexo ="";



        $password_aux="";

        $FechaNacimiento = "";

        // $CodigoPostal ="";

        // $Estado = "";

        // $IdCodigoPostal="";

        // $Municipio = "";

        // $Colonia = "";

        // $Calle = "";

        // $Rfc = "";

        $Curp = "";

        // $NSS = "";

        $telefono_movil="";

        $telefono_oficina="";

        $ext="";

        $email="";

        // $firma="";

        // $Puesto="";



        foreach ($datos as  $dato) {

            $IdEmpresa = $dato->IdEmpresa;

            // $id_cn = $dato->idcn;

            // $IdPuesto = $dato->Puesto;

            $IdModuloAcceso = $dato->Modulo;

            $nick_name = $dato->nick_name;

            $name      = $dato->name;

            $apellido_paterno = $dato->apellido_paterno;

            $apellido_materno = $dato->apellido_materno;

            // $CodigoPersonal = $dato->CodigoPersonal;

            $username = $dato->username;

            $Sexo = $dato->Sexo;

            $password_aux = $dato->password_aux;

            $FechaNacimiento = $dato->FechaNacimiento;

            // $CodigoPostal = $dato->CodigoPostal;

            // $Estado = $dato->Estado;

            // $IdCodigoPostal=$dato->IdCodigoPostal;

            // $Municipio = $dato->Municipio;

            // $Colonia = $dato->Colonia;

            // $Calle = $dato->Calle;

            // $Rfc = $dato->Rfc;

            $Curp = $dato->Curp;

            // $NSS = $dato->NSS;

            $telefono_movil = $dato->telefono_movil;

            $telefono_oficina = $dato->telefono_oficina;

            $ext = $dato->ext;

            $email = $dato->email;

            $imagen = $dato->Imagen;

        }



        $uri = 'data:image/jpeg;base64,' . $imagen;

      



        // $departamentos=DB::table('centros_negocio')

        //     ->select('id','nomenclatura')

        //    ->orderByRaw("FIELD(id, $id_cn) DESC")

        //     ->get();

        $Empresa=DB::table('master_empresa')

            ->select('IdEmpresa','FK_Titulo')

           ->orderByRaw("FIELD(IdEmpresa, $IdEmpresa) DESC")

            ->get();



            if($IdModuloAcceso!=0){

                $datosMA= DB::select("select IdUsuarioModulo from modulos_acceso_usuarios where IdModulo = $IdModuloAcceso and IdUsuario= $id");

  

                foreach ($datosMA as $g) {

                  $idmac = $g->IdUsuarioModulo;

                }

            }else{

                $idmac=0;

            }



        //     $Cpuestos=DB::table('master_puesto')

        //     ->select('IdPuesto','Nombre')

        //    ->orderByRaw("FIELD (IdPuesto, $IdPuesto) DESC")

        //     ->get();



        return view('administrador.usuarios.edit_user_empleado')

        ->with('idusuario',$id)

        ->with('nick_name',$nick_name)

        ->with('name',$name)

        ->with('apellido_paterno',$apellido_paterno)

        ->with('apellido_materno',$apellido_materno)

        // ->with('CodigoPersonal',$CodigoPersonal)

        ->with('username',$username)

        ->with('Genero',$Sexo)

        ->with('password_aux',$password_aux)

        ->with('FechaNacimiento',$FechaNacimiento)

        ->with('IdModuloAcceso',$idmac)

        // ->with('CodigoPostal',$CodigoPostal)

        // ->with('Estado',$Estado)

        // ->with('IdCodigoPostal',$IdCodigoPostal)

        // ->with('Municipio',$Municipio)

        // ->with('Colonia',$Colonia)

        // ->with('Calle',$Calle)

        // ->with('Rfc',$Rfc)

        ->with('Curp',$Curp)

        // ->with('NSS',$NSS)

        ->with('telefono_movil',$telefono_movil)

        ->with('telefono_oficina',$telefono_oficina)

        ->with('ext',$ext)

        // ->with('departamentos',$departamentos)

        ->with('email',$email)

        // ->with('Cpuestos',$Cpuestos)

        ->with('empresas',$Empresa)

        ->with('uri',$uri)

            ;





            //return view('administrador.usuarios.edit_user_empleado',)

            //    ->with('usuario',$data);

              //  ->with('cn_usuario',$cn_usuario)

             //   ->with('password',$usuario->password_aux);

            /*,

                ['usuario'       => $usuario,

                    'puestos'       => $puestos,

                    'departamentos' => $departamentos,

                    'empresas'      => $empresas->FK_Titulo,

                    'cn_usuario'    => $cn_usuario,

                    'rol_usuario'   => $rol->id,

                    'password'      => $usuario->password_aux



                ]);*/



    }



    public function editarCliente($id)

    {



        // $query='select users.*, master_clientes.*,  master_clientes.Codigo as CodigoCliente,master_clientes.Activo as ActivoCliente,

        // master_clientes.Imagen as ImagenCliente,ifnull(users.IdPuesto,0) as Puesto,ifnull(users.IdContacto,0) as Contacto, e.FK_nombre_estado as Estado,m.Descripcion as Municipio,cp.IdCodigoPostal

        //         from users

        //         left join master_clientes ON master_clientes.IdCliente = users.IdCliente

        //         left JOIN estados e on e.IdEstado = master_clientes.IdEstado

        //         left JOIN cfdi_codigopostal cp on cp.CodigoPostal = master_clientes.CodigoPostal

        //         left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

        //         left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

        //         where users.id = :id';



        $query='select users.*, master_clientes.*,  master_clientes.Codigo as CodigoCliente,master_clientes.Activo as ActivoCliente,

        master_clientes.Imagen as ImagenCliente,ifnull(users.IdPuesto,0) as Puesto, e.FK_nombre_estado as Estado,m.Descripcion as Municipio,cp.IdCodigoPostal,if(modulos_acceso_usuarios.IdModulo is null ,0,modulos_acceso_usuarios.IdModulo) as Modulo

        from users

        left join master_clientes ON master_clientes.IdCliente = users.IdCliente

        left JOIN estados e on e.IdEstado = master_clientes.IdEstado

        left JOIN cfdi_codigopostal cp on cp.CodigoPostal = master_clientes.CodigoPostal

        left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

        left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

        left join modulos_acceso_usuarios on modulos_acceso_usuarios.IdUsuario = users.id

        left join modulos_acceso on modulos_acceso.IdModulo = modulos_acceso_usuarios.IdModulo 

        where users.id = ?';



        /*========CP========*/

        $datos=DB::select($query,[$id]);



        // $IdEmpresa="";

        $Codigo="";

        $name="";

        $nick_name="";

        $id_cn="";

        $username="";

        $password="";

        $password_aux="";

        $tipo="";

        $Codigo="";

        $Empresa="";

        $RFC="";

        $RazonSocial="";

        $Nombre="";

        $Calle="";

        $No_int="";

        $No_ext="";

        $Colonia="";

        $CodigoPostal="";

        $IdEstado="";

        $IdCodigoPostal="";

        $Estado="";

        $Municipio="";

        $Correo="";

        $Telefono_movil="";

        $Telefono_fijo="";

        $Pagina_web="";

        $Activo="";



        foreach ($datos as  $dato) {

            // $IdEmpresa= $dato->IdEmpresa;

            $Codigo=$dato->CodigoCliente;

            $name= $dato->name;

            $id_cn=$dato->idcn;

            // $IdPuesto = $dato->Puesto;

            $IdModuloAcceso = $dato->Modulo;

            // $IdContacto = $dato->Contacto;

            $nick_name= $dato->nick_name;

            $username= $dato->username;

            $password= $dato->password;

            $password_aux= $dato->password_aux;

            $tipo= $dato->tipo;

            $Codigo= $dato->Codigo;

            $Empresa= $dato->Empresa;

            $RFC= $dato->RFC;

            // $RazonSocial= $dato->RazonSocial;

            // $Nombre= $dato->Nombre;

            // $Calle= $dato->Calle;

            // $No_int= $dato->No_int;

            // $No_ext= $dato->No_ext;

            // $Colonia= $dato->Colonia;

            // $CodigoPostal= $dato->CodigoPostal;

            // $IdEstado= $dato->IdEstado;

            // $IdCodigoPostal= $dato->IdCodigoPostal;

            // $Estado= $dato->Estado;

            // $Municipio= $dato->Municipio;

            // $Correo= $dato->Correo;

            // $telefono_movil=$dato->telefono_movil;

            $telefono_oficina= $dato->telefono_oficina;

            // $telefono_movil2=$dato->telefono_movil2;

            // $telefono_oficina2= $dato->telefono_oficina2;

            // $FechaNacimiento = $dato->FechaNacimiento;

            // $apellido_paterno = $dato->apellido_paterno;

            // $apellido_materno = $dato->apellido_materno;

            // $Pagina_web= $dato->Pagina_web;

            $Activo= $dato->Activo;

            // $ext = $dato->ext;

            $email = $dato->email;

            // $ext2 = $dato->ext2;

            // $email2 = $dato->email2;

            // $IdCliente= $dato->IdEmpresa;

        }



        if($IdModuloAcceso!=0){

            $datosMA= DB::select("select IdUsuarioModulo from modulos_acceso_usuarios where IdModulo = $IdModuloAcceso and IdUsuario= $id");



            foreach ($datosMA as $g) {

              $idmac = $g->IdUsuarioModulo;

            }

        }else{

            $idmac=0;

        }



        // $departamentos=DB::table('centros_negocio')

        //     ->select('id','nomenclatura')

        //    ->orderByRaw("FIELD(id, $id_cn) DESC")

        //     ->get();



        // $Cpuestos=DB::table('master_puesto')

        //         ->select('IdPuesto','Nombre')

        //        ->orderByRaw("FIELD (IdPuesto, $IdPuesto) DESC")

        //         ->get();

        // $contactos=DB::table('contactos')

        //         ->select('id',DB::raw("CONCAT(contactos.nombre_con,' ',contactos.apellido_paterno_con,' ',contactos.apellido_materno_con) AS nomcontacto"))

        //        ->orderByRaw("FIELD (id, $IdContacto) DESC")

        //         ->get();



        // dd($Estado);

        return view('administrador.usuarios.edit_user_cliente')

        ->with('idusuario',$id)

        // ->with('IdEmpresa',$IdEmpresa)

        ->with('nombre_comercial',$name)

        // ->with('apellido_paterno',$apellido_paterno)

        // ->with('apellido_materno',$apellido_materno)

        ->with('username',$username)

        ->with('nick_name',$nick_name)

        ->with('IdModuloAcceso',$idmac)

        // ->with('password',$password)

        ->with('password_aux',$password_aux)

        // ->with('tipo',$tipo)

        // ->with('Codigo',$Codigo)

        // ->with('Empresa',$Empresa)

        // ->with('RFC',$RFC)

        // ->with('RazonSocial',$RazonSocial)

        // ->with('Nombre',$Nombre)

        // ->with('Calle',$Calle)

        // ->with('No_int',$No_int)

        // ->with('No_ext',$No_ext)

        // ->with('Colonia',$Colonia)

        // ->with('CodigoPostal',$CodigoPostal)

        // ->with('IdEstado',$IdEstado)

        // ->with('IdCodigoPostal',$IdCodigoPostal)

        // ->with('Estado',$Estado)

        // ->with('Municipio',$Municipio)

        ->with('Correo',$Correo)

        // ->with('telefono_movil',$telefono_movil)

        ->with('telefono_oficina',$telefono_oficina)

        // ->with('telefono_movil2',$telefono_movil2)

        // ->with('telefono_oficina2',$telefono_oficina2)

        // ->with('ext',$ext)

        // ->with('ext2',$ext2)

        ->with('email',$email)

        // ->with('email2',$email2)

        // ->with('departamentos',$departamentos)

        // ->with('Cpuestos',$Cpuestos)

        // ->with('Contactos',$contactos)

        // ->with('FechaNacimiento',$FechaNacimiento)

        // ->with('Pagina_web',$Pagina_web)

        ->with('Activo',$Activo)

            ;







    }



    public function updateEmpleado($id)

    {



      /*  $this->validate(Input::get('firma'),

            [    'firma' => 'image',



            ],[  'firma.image' => 'La firma DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN, los datos del formulario no fueron gurdados, intenta de nuevo.',



            ]);

            */

        /*

         $validation = Validator::make(

             array(

                 'firma' => Input::file('firma'),

             ),

             array(

                 'firma' => array( 'image' ),

             )

         );



         if ( $validation->fails() ) {

             $errors = $validation->messages();

             return ['errors' =>  $validation->messages()];

            // dd($errors);

           //  $exportedPDF = $this->postEdit($id,$errors);

            // $this->postEdit($id, $errors);

          //   return self::index(Input::get( 'firma' ))->withErrors($validation->errors());

            // return redirect('modulo/administrador/usuarios/empleados/editar/'.$id)->with($errors);

         }







         if ( ! empty( $errors ) ) {

             if ($errors->has('firma')) {

                 echo '<div class="error">' . $errors->first('firma') . '</div>';

             }

         }



 */

        $query='Select p.IdPersonal from master_personal as p

        INNER JOIN users u on u.IdPersonal= p.IdPersonal

        Where u.id = ?';



        /*========ID PERSONAL========*/

        $Personal=DB::select($query,[$id]);



        foreach ($Personal as $DP){

            $IdPersonal = $DP->IdPersonal;

        }



        $user = User::findOrFail($id);

        $empleado = ReciboEmpleado::findOrFail($IdPersonal);



        $idModAcceso=Input::get('IdModuloAcceso');

        if($idModAcceso!=0){

            $idModAcceso=Input::get('IdModuloAcceso');

        }else{

            $idModAcceso=null;

        }



        if($user){



           

            if( Input::file('Imagen') )

            {

                $file = Input::file('Imagen');

                $imagedata = file_get_contents($file);

                $base64 = base64_encode($imagedata);

                

            }else{

                $base64=null;

            }

            //Elimina el rol asociado al usuario

           // $user->detachAllRoles();

            $passwd  = trim(Input::get('password_aux'));

          //  $name =  trim(Input::get('name'));



               $user->idcn = 21;

               $user->name = trim(Input::get('name'));

            //    $user->IdPuesto = trim(Input::get('cpuesto'));

               $user->apellido_paterno = trim(Input::get('apellido_paterno'));

               $user->apellido_materno = trim(Input::get('apellido_materno'));

               $user->nick_name         = trim(Input::get('name'));

               $user->Genero            = trim(Input::get('Genero'));

               $user->FechaNacimiento   = trim(Input::get('FechaNacimiento'));

               $user->ext               = trim(Input::get('ext'));

               $user->username = trim(Input::get('username'));

               $user->email = trim(Input::get('email'));

               $user->password = bcrypt($passwd);



               $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

               $datos=DB::select($contr,[$passwd]);

               $contras="";

               foreach ($datos as  $dato) {

                   $contras = $dato->pw; 

               }



               $user->password_mobile   = $contras;

               $user->password_aux = $passwd;

               $user->telefono_oficina = trim(Input::get('telefono_oficina'));

               $user->telefono_movil = trim(Input::get('telefono_movil'));

               

                $user->Imagen=$base64;

              // $user->file = trim(Input::get('file'));

                $user->save();





               $empleado->Nombre = trim(Input::get('name'));

               $empleado->APaterno = trim(Input::get('apellido_paterno'));

               $empleado->AMaterno = trim(Input::get('apellido_materno'));

               $empleado->Telefono = trim(Input::get('telefono_oficina'));

               $empleado->Movil = trim(Input::get('telefono_movil'));

               $empleado->CorreoElectronico = trim(Input::get('email'));

            //    $empleado->CodigoPersonal = trim(Input::get('CodigoPersonal'));

               $empleado->Sexo = trim(Input::get('Genero'));

            //    $empleado->CodigoPostal = trim(Input::get('CodigoPostal'));



            //    $cp = trim(Input::get('CodigoPostal'));



            //     $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,

            //     cp.CodigoMunicipio,

            //     e.FK_nombre_estado as estado,

            //     e.IdEstado,

            //     m.Descripcion as Municipio,

            //     m.IdMunicipio, l.Descripcion as localidad,

            //     l.IdLocalidad,

            //     col.Colonia,

            //     p.IdPais

            //     From cfdi_codigopostal as cp

            //     INNER JOIN estados e on e.Codigo = cp.CodigoEstado

            //     left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

            //     left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

            //     left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)

            //     left join master_pais as p on (p.IdPais = e.IdPais)

            //     Where cp.CodigoPostal = :CodigoPostal

            //     ORDER BY CodigoPostal Asc';



            //     /*========CP========*/

            //     $codigopostal=DB::select($query,[$cp]);

            //     $IdCodigoPostal="";

            //     foreach ($codigopostal as  $CP) {

            //         $IdCodigoPostal= $CP->IdCodigoPostal;

            //     }

            //     $empleado->IdCodigoPostal   =$IdCodigoPostal;

            // //    $empleado->Estado = trim(Input::get('Estado'));

            //    $empleado->Municipio = trim(Input::get('Municipio'));

            //    $empleado->Colonia = trim(Input::get('Colonia'));

            //    $empleado->Calle = trim(Input::get('Calle'));

               $empleado->Curp = trim(Input::get('Curp'));

            //    $empleado->Rfc = trim(Input::get('Rfc'));

            //    $empleado->NSS = trim(Input::get('NSS'));

               $empleado->FechaNacimiento = trim(Input::get('FechaNacimiento'));

               $empleado->Imagen=$base64;

               $empleado->save();



            //    $user->attachRole(Input::get('puesto'));



            //    $modulo = Modulo::where('slug', 'administrador')->get();

            //    $submodulo = SubModulo::where('slug', 'administrador.usuarios')->get();

            //    $accion_kardex = Accion::where('slug', 'alta')->get();

            //    $role = Puesto::find(Input::get('puesto'));



             /*  if (Input::get('firma')) {

                   $path_firma = 'Firmas\\' . strtolower($user->name) . '_' . $user->id;

                   $path_file = $this->createPath($path_firma);





                   $this->addFirma(Input::get('firma'), $path_file, $user);

               }

            */



            /*   $kardex = Kardex::create(["id_cn" => Input::get(user()->idcn),

                   "id_usuario" => Input::get(user()->id),

                   "id_modulo" => $modulo[0]->id,

                   "id_submodulo" => $submodulo[0]->id,

                   "id_accion" => $accion_kardex[0]->id,

                   "id_objeto" => $user->id,

                   "descripcion" => "Modificación Usuario: " . $user->name . ", puesto asignado " . $role->name]);

             */

          //  $nombre = $user->name;



           // return ['nombre'=>$user->name, 'firma.image' => 'La firma DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN'];





           if($idModAcceso==null){

               

            $modulosacceso  = ModulosAccesoUsuarios::Create([

                "IdModulo"       => 2,

                "IdUsuario"      => $user->id

            ]);

                                            

            }else{



                DB::update("update modulos_acceso_usuarios set IdModulo=2 where IdUsuarioModulo = $idModAcceso");

            }

            return $user->name;







        }





    }



    public function updateCliente($id)

    {

        $usuario = User::find($id);       

        $idModAcceso=Input::get('IdModuloAcceso');

        if($idModAcceso!=0){

            $idModAcceso=Input::get('IdModuloAcceso');

        }else{

            $idModAcceso=null;

        }

        if($usuario){



            $passwd             = trim(Input::get('password_aux'));

            $usuario->idcn      = $usuario->idcn;

            $usuario->name      = trim(Input::get('nombre_comercial'));



            $usuario->nick_name = trim(Input::get('nombre_comercial'));

            $usuario->username  = trim(Input::get('username'));

            $usuario->password  = bcrypt($passwd);



            $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

            $ct=DB::select($contr,[$passwd]);

            $contras="";

            foreach ($ct as  $dato) {

                $contras = $dato->pw;

            }

            $usuario->password_mobile   = $contras;

            $usuario->password_aux      = $passwd;

            $usuario->email             = trim(Input::get('email'));

            $usuario->telefono_oficina  = trim(Input::get('telefono_oficina'));

            $usuario->tipo              = 'c';

            $usuario->save();



            if($idModAcceso==null){

               

                $modulosacceso  = ModulosAccesoUsuarios::Create([

                    "IdModulo"       => 2,

                    "IdUsuario"      => $usuario->id

                ]);

                                                

            }else{



                DB::update("update modulos_acceso_usuarios set IdModulo=2 where IdUsuarioModulo = $idModAcceso");

            }

            return $usuario->name;

        }

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

        $user=User::find($id);

        $input = $request->all();

        $rules = ['username' => 'unique:users,username,'.$user->username.',username', 'email' => 'unique:users,email,'.$user->email.',email'];

        $validator = Validator::make($input, $rules);

        if($validator->fails()){

            return redirect()

            ->route('sig-erp-crm::modulo.administrador.usuarios.index')

            ->with(['warning' => ' Nombre de Usuario y/o Correo ya existe.',

                    'type'    => 'warning']);

        }else{

            $this->validate($request,

            [    'firma' => 'image',

    

            ],[  'firma.image' => 'La firma DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN, los datos del formulario no fueron gurdados, intenta de nuevo.',

    

            ]);

            

            

            if($user){

                

                //Elimina el rol asociado al usuario

                $user->detachAllRoles();

                $passwd  = trim($request->password_aux);

    

                $user->idcn              = trim($request->departamento);

                $user->IdRol             = $request->roles;

                $user->IdRolEva          = $request->rolesevaluacion;

                $user->IdPerfil          = $request->perfilnomina;

                $user->IdPermisoWeb      = $request->puesto;

                $user->IdPuesto          = trim($request->cpuesto);

                $user->name              = trim($request->name);

                $user->apellido_paterno  = trim($request->apellido_paterno);

                $user->apellido_materno  = trim($request->apellido_materno);

                $user->nick_name         = str_replace(' ', '', trim($request->name).'.'.trim($request->apellido_paterno).'.'.trim($request->apellido_materno));

                $user->Genero            = trim($request->Genero);

                $user->FechaNacimiento   = trim($request->FechaNacimiento);

                $user->ext               = trim($request->ext);

                $user->username          = trim($request->username);

                $user->email             = trim($request->email);

                $user->password          = bcrypt($passwd);

                $datos= DB::select("SELECT AES_ENCRYPT('{$passwd}', 'DSAI2020') as pw");

                // $contr="SELECT AES_ENCRYPT($passwd, 'DSAI2020') as pw";

                // $datos=DB::select($contr,[$passwd]);

                $contras="";

                foreach ($datos as  $dato) {

                    $contras = $dato->pw;

                }

               

                $user->password_mobile= $contras;

                $user->password_aux      = $passwd;

                $user->telefono_oficina  = trim($request->telefono_oficina);

                $user->telefono_movil    = trim($request->telefono_movil);

                $user->fileBase64  = ($request->roles == "98")?$user->fileBase64:null;

                $user->Colonia = trim($request->Colonia);

                $user->IdPais = trim($request->IdPais);

                $user->IdEstado = trim($request->IdEstado);

                $user->Municipio = trim($request->municipio);

                $user->Localidad = trim($request->Localidad);

                $user->IdCodigoPostal = trim($request->IdCodigoPostal);

                $user->CodigoPostal = trim($request->CP);

                $user->save();

    

                $user->attachRole($request->puesto);

    

                $modulo         = Modulo::where('slug','administrador')->get();

                $submodulo      = SubModulo::where('slug','administrador.usuarios')->get();

                $accion_kardex  = Accion::where('slug','alta')->get();

                $role           = Puesto::find($request->puesto);

    

                if( $request->file('firma') )

                {

                    $name_file  = Input::file('firma')->getClientOriginalName();

                    $imagedata = file_get_contents(Input::file('firma'));

                    $base64 = base64_encode($imagedata);

                    $user->file = $name_file;

                    $user->fileBase64 = $base64;

                    $user->save();

                }

    

    

                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,

                                            "id_usuario"    => $request->user()->id,

                                            "id_modulo"     => $modulo[0]->id,

                                            "id_submodulo"  => $submodulo[0]->id,

                                            "id_accion"     => $accion_kardex[0]->id,

                                            "id_objeto"     => $user->id,

                                            "descripcion"   => "Modificación Usuario: " . $user->name . ", puesto asignado " . $role->name]);

               

                    

                    $permiso = DB::table('users')->where('id',$id)->update(

                        array('IdPerfil'=>$request->perfilnomina,

                        'PermisoModuloConexiones'=>'No',

                        'CambiarContrasena'=>'No',

                        'ModificarNombre'=>'No',

                        'ModificarOtrosUsuarios'=>'No',

                        'Editable'=>'No'));



                       

                            $empresa = DB::table('master_empresa')->get();

                            $permisos = DB::select("select IdEmpresa from master_empresa_usuario where IdUsuario = $id");

                            $permiso=[];$c=0;

                      

                            $ModuloAccesoU= array();

                            foreach($permisos as $p){ 

                                $permiso[]=$p->IdEmpresa;

                            } 

                           

                            // $ModuloAccesoU=$request->moduloacceso;



                            // $result_array = array();



                            // for ($i=0; $i<count($permiso)+1; $i++)

                            // {

                            //     if (count($ModuloAccesoU)<$i){

                            //         array_splice($ModuloAccesoU, $i, 0,0);

                            //     }

                            // }



                            // $result[]=array_intersect($permiso,$ModuloAccesoU);

                            // dd($permiso,$result[0]);

                            // dd($request->moduloacceso);



                            if($request->moduloacceso<>null){

                                foreach ($empresa as $e) {

                                    $emp = $e->IdEmpresa;

                                    $val= (in_array($emp,$request->moduloacceso) ? 'Si' : 'No'); 

                                    if(in_array($e->IdEmpresa, $permiso)){

                                        DB::table('master_empresa_usuario')->where('IdEmpresa',$e->IdEmpresa)->where('IdUsuario',$id)->update(

                                            array('Activo'=>$val));

                                            // $empp[]=$e->IdEmpresa.' '.$val;

                                    }

                                    else{

                                        DB::table('master_empresa_usuario')->insert(

                                        array('IdEmpresa'=>$e->IdEmpresa,

                                        'IdUsuario'=>$id,

                                        'Activo'=>$val));

                                        // $empp[]=$e->IdEmpresa.' '.$val;

                                    }

                                    $val='';

                                }

                            }else{

                               

                                foreach ($empresa as $e) {

                                    if(in_array($e->IdEmpresa, $permiso)){

                                        DB::table('master_empresa_usuario')->where('IdEmpresa',$e->IdEmpresa)->where('IdUsuario',$id)->update(

                                            array('Activo'=>'No'));

                                    }

                                    

                                }

                            }

                            // dd($emp,$empp);

                      

                      

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



    }

                // $ResMA=ModulosAccesoUsuarios::select('IdUsuarioModulo')->where('IdUsuario', $user->id)->get();

                //CREACION SI NO SE HA ASIGNADO NINGUN MODULO DE ACCESO

                // if($ResMA->isEmpty()){

                //     for($Rma=0;$Rma<count($idModAcceso);$Rma++){

                //         $modulosacceso  = ModulosAccesoUsuarios::Create([

                //             "IdModulo"       => $idModAcceso[$Rma],

                //             "IdUsuario"      => $user->id

                //         ]);

                //     }

                    

                // }else{

                //     //ACTUALIZACION DE DATOS DE MODULO DE ACCESO

                //     if(count($ResMA)<count($idModAcceso)){

                //         for($ma=0;$ma<count($idModAcceso);$ma++){

                //             $modA=$idModAcceso[$ma];

                //             if(count($ResMA)<count($idModAcceso)){

                //                 for($Rma=0;$Rma<count($ResMA);$Rma++){

                //                     $arrMA=$ResMA[$Rma]->IdUsuarioModulo;

                //                     $arrMAupd=$idModAcceso[$ma];

                //                     $ExistU = ModulosAccesoUsuarios::select('IdModulo')->where('IdUsuarioModulo', $arrMA)->get();

                //                     if($ExistU[0]['IdModulo']==$arrMAupd){

                //                         DB::update("update modulos_acceso_usuarios set IdModulo=$modA where IdUsuarioModulo = $arrMA");

                //                     }else{

                //                         $modulosacceso  = ModulosAccesoUsuarios::Create([

                //                             "IdModulo"       => $idModAcceso[$ma],

                //                             "IdUsuario"      => $user->id

                //                         ]);

                //                     }

                //                 }

                //             }else if(count($ResMA) == count($idModAcceso)){

                //                 $modA=$idModAcceso[$ma];

                //                 $arrMA=$ResMA[$ma]->IdUsuarioModulo;

                //                 DB::update("update modulos_acceso_usuarios set IdModulo=$modA where IdUsuarioModulo = $arrMA");

                                

                //             }else{

                //                 for($Rma=0;$Rma<count($idModAcceso);$Rma++){

                //                     $arrMA=$idModAcceso[$Rma];

                                   

                //                     $arrMAupd=$ResMA[$ma]->IdUsuarioModulo;

                                   

                //                     $ExistU = ModulosAccesoUsuarios::select('IdModulo')->where('IdUsuarioModulo', $arrMAupd)->get();

                                   

                //                     if($ExistU[0]['IdModulo']==$arrMA){

                //                         DB::update("update modulos_acceso_usuarios set IdModulo=$modA where IdUsuarioModulo = $arrMA");

                //                     }else{

                //                         DB::table('modulos_acceso_usuarios')->where('IdUsuarioModulo', $arrMAupd)->delete();

                //                     }

                //                 }

                //             }

                            

                            

                //         }

                //     }else if(count($ResMA)>count($idModAcceso)){

                //         for($ma=0;$ma<count($ResMA);$ma++){

                //             if(count($ResMA)>count($idModAcceso)){

                //                 for($Rma=0;$Rma<count($idModAcceso);$Rma++){

                //                     $modA=$ResMA[$ma]->IdUsuarioModulo;

                //                     $arrMAupd=$idModAcceso[$Rma];

                                    

                //                     $ExistU = ModulosAccesoUsuarios::select('IdModulo')->where('IdUsuarioModulo', $modA)->get();

                //                     if($ExistU[0]['IdModulo']==$arrMAupd){

                //                         DB::update("update modulos_acceso_usuarios set IdModulo=$arrMAupd where IdUsuarioModulo = $modA");

                //                     }else{

                                        

                //                         DB::table('modulos_acceso_usuarios')->where('IdUsuarioModulo', $modA)->delete();

                //                     }

                //                 }

                //             }else{

                //                 for($Rma=0;$Rma<count($idModAcceso);$Rma++){

                //                     $modA=$ResMA[$ma]->IdUsuarioModulo;

                //                     $arrMA=$idModAcceso[$Rma];

                                   

                //                     $ExistU = ModulosAccesoUsuarios::select('IdModulo')->where('IdUsuarioModulo', $modA)->get();

                                   

                //                     if($ExistU[0]['IdModulo']==$arrMA){

                //                         DB::update("update modulos_acceso_usuarios set IdModulo=$modA where IdUsuarioModulo = $arrMA");

                //                     }else{

                //                         DB::table('modulos_acceso_usuarios')->where('IdUsuarioModulo', $modA)->delete();

                //                     }

                //                 }

                //             }

                            

                //         }

                //     }else{

                //         for($ma=0;$ma<count($idModAcceso);$ma++){

                //             $modA=$idModAcceso[$ma];

                //             $arrMA=$ResMA[$ma]->IdUsuarioModulo;

                //             DB::update("update modulos_acceso_usuarios set IdModulo=$modA where IdUsuarioModulo = $arrMA");

                //         }

                //     }

                // }

               

    

            

    





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

            if($usuario->IdPersonal<>null){

                $master_personal=DB::select("select p.IdPersonal from master_personal p Inner Join users u on p.IdPersonal=u.IdPersonal where u.id=$id");

            }

            // if($usuario->IdPerfil<>null){

            //     $perfiles=DB::select("select r.id from roles r Inner Join users u on r.id=u.IdPerfil where r.id=$usuario->IdPerfil");

            // }

            // if($usuario->IdRol<>null){

            //     $roles=DB::select("select r.id from roles r Inner Join users u on r.id=u.IdRol where u.id=$id");

            // }

            

                $permisos = DB::select("select IdEmpresa,Activo from master_empresa_usuario where IdUsuario = $id and Activo='Si'");

            

            if(count( $prospectos )){

                return redirect()

                        ->route('sig-erp-crm::modulo.administrador.usuarios.index')

                        ->with(['success' => $usuario->name .' NO se puede eliminar tiene '.count( $prospectos ).' Cliente(s)/Prospecto(s) asociado(s)',

                                'type'    => 'warning']);



            }else if(($usuario->IdPersonal<>null) && count( $master_personal )){

                return redirect()

                        ->route('sig-erp-crm::modulo.administrador.usuarios.index')

                        ->with(['success' => $usuario->name .' NO se puede eliminar tiene '.count( $master_personal ).' Personal(es) asociado(s)',

                                'type'    => 'warning']);



            }else if(count( $permisos )){

                return redirect()

                        ->route('sig-erp-crm::modulo.administrador.usuarios.index')

                        ->with(['success' => $usuario->name .' NO se puede eliminar tiene '.count( $permisos ).' Modulo Nómina asociado',

                                'type'    => 'warning']);



            }

            // else if(($usuario->IdPerfil<>null) && count( $perfiles )){

            //     return redirect()

            //             ->route('sig-erp-crm::modulo.administrador.usuarios.index')

            //             ->with(['success' => $usuario->name .' NO se puede eliminar tiene '.count( $perfiles ).' Perfil(es) asociado(s)',

            //                     'type'    => 'warning']);



            // }

            // else if(($usuario->IdRol<>null) && count( $roles )){

            //     return redirect()

            //             ->route('sig-erp-crm::modulo.administrador.usuarios.index')

            //             ->with(['success' => $usuario->name .' NO se puede eliminar tiene '.count( $roles ).' Modulo ESE asociado',

            //                     'type'    => 'warning']);



            // }

            else{

                DB::table('role_user')->where('user_id', '=', $id)->delete();

                DB::table('master_empresa_usuario')->where('IdUsuario', '=', $id)->where('Activo', '=', 'No')->delete();



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



                // $ResMA=ModulosAccesoUsuarios::select('IdUsuarioModulo')->where('IdUsuario', $usuario->id)->get();

                // //BORRADO DE MODULO DE ACCESO

                // if(!$ResMA->isEmpty()){

                //     for($ma=0;$ma<count($ResMA);$ma++){

                //         $modA=$ResMA[$ma]->IdUsuarioModulo;

                //         DB::table('modulos_acceso_usuarios')->where('IdUsuarioModulo', $modA)->delete();

                //     }

                   

                // }



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



    public function eliminarEmpleado(Request $request, $id)

    {

        $query='Select p.IdPersonal from master_personal as p

        INNER JOIN users u on u.IdPersonal= p.IdPersonal

        Where u.id = ?';



        /*========ID PERSONAL========*/

        $Personal=DB::select($query,[$id]);



        foreach ($Personal as $DP){

            $IdPersonal = $DP->IdPersonal;

        }



        $usuario = User::find($id);

        // $empleado = ReciboEmpleado::find($IdPersonal);



        if($usuario){



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

                $ResMA=ModulosAccesoUsuarios::select('IdUsuarioModulo')->where('IdUsuario', $usuario->id)->get();

                //BORRADO DE MODULO DE ACCESO

                if(!$ResMA->isEmpty()){

                    for($ma=0;$ma<count($ResMA);$ma++){

                        $modA=$ResMA[$ma]->IdUsuarioModulo;

                        DB::table('modulos_acceso_usuarios')->where('IdUsuarioModulo', $modA)->delete();

                    }

                   

                }

                // $empleado->delete();

            return redirect('modulo/administrador/usuarios/empleados')

                ->with(['success' => $usuario->name . ' se eliminó con éxito',

                    'type'    => 'success']);



        }







    }



    public function eliminarCliente(Request $request, $id)

    {

        $query='Select mc.IdCliente from master_clientes as mc

        INNER JOIN users u on u.IdCliente= mc.IdCliente

        Where u.id = :IdUser';



        /*========ID PERSONAL========*/

        $Cliente=DB::select($query,[$id]);



        foreach ($Cliente as $DC){

            $IdCliente = $DC->IdCliente;

        }



        $usuario = User::find($id);

        // $empleado = MasterClientes::find($IdCliente);



        if($usuario){



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

                $ResMA=ModulosAccesoUsuarios::select('IdUsuarioModulo')->where('IdUsuario', $usuario->id)->get();

                //BORRADO DE MODULO DE ACCESO

                if(!$ResMA->isEmpty()){

                    for($ma=0;$ma<count($ResMA);$ma++){

                        $modA=$ResMA[$ma]->IdUsuarioModulo;

                        DB::table('modulos_acceso_usuarios')->where('IdUsuarioModulo', $modA)->delete();

                    }

                   

                }

                // $empleado->delete();

            return redirect('modulo/administrador/usuarios/clientes')

                ->with(['success' => $usuario->name . ' se eliminó con éxito',

                    'type'    => 'success']);



        }







    }



    public function setPuesto($user)

    {

        $user->attachRole(1);

        return $user->getRoles()[0];

    }





   /* public function usuarioForaneo( UsuarioForaneoValidacion $request )

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



    }*/



    private function createPath($ruta)

    {

        $path = public_path().'\\'.$ruta;

        if( !file_exists($path) )

        {

            mkdir(public_path().'/'.$path,0777,true);

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



    private function getBase64($path){

        $base64 = '';

        if($path != null && $path != ''){

            if(file_exists($path)){

                $imagedata = file_get_contents($path);

                $base64 = base64_encode($imagedata);

            }

        }

        return $base64;

    }

    private function deleteFile($path){

        if($path != null && $path != ''){

            if(file_exists($path)){

                unlink($path);

            }

        }

    }

}

