<?php



namespace App\Http\Controllers;



use http\Client\Response;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



use App\Http\Requests;

use DB;

use App\User;

use App\Facturadora;

// use App\MasterClientes as Cliente;

 // use App\Cliente;

use App\Libs\Curp;

use App\Libs\Rfc;

use App\Contacto;

use App\Banco;

use App\Administrador\Kardex;

use App\Administrador\SubModulo;

use App\Administrador\Modulo;

use App\Administrador\Accion;

use App\CentroNegocio;

use App\Bussines\MasterConsultas;

use App\Asignacion\ClienteCN;

use Session;

use App\Cotizacion;

use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use Laminas\Validator\StringLength;
use Mockery\Undefined;

class ClientesController extends Controller

{

    public function crearCliente(Request $request){

        $id_cn = $request->id_cn;//ob

        
        $id_ejecutivo =$request->id_ejecutivo;//ob

        if ($id_ejecutivo==''){$id_ejecutivo=1;}

        $id_contacto_principal = 1;//ob

        $tipo = 1;

        $contrato_a = $request->contrato_a;//ob

        $id_user = 1;//ob

        $nombre_comercial =$request->nombre_comercial;//ob

        $forma_juridica = $request->forma_juridica;

        $razon_social = $request->razon_social;

        $fecha_constitucion = '0000-00-00';

        $nombre = $request->nombre;

        $apellido_paterno = $request->apellido_paterno;

        $apellido_materno = $request->apellido_materno;

        $genero = $request->genero;

        $fecha_nacimiento_pros = $request->fecha_nacimiento_pros;

        $lugar_nacimiento = $request->lugar_nacimiento;

        $clase_pm = $request->clase_pm;

        $rfc = $request->rfc;

        $curp = $request->curp;

        $registro_patronal = $request->registro_patronal;

        $registro_p = 1;

        $actividad_economica = 1;

        $status = $request->status;

        $df_cp = $request->df_cp;

        $df_estado = $request->df_estado;

        $df_municipio = $request->df_municipio;

        $df_ciudad =$request->df_ciudad;

        $df_colonia = $request->df_colonia;

        //aqui termina el recover

        $datas = $request->all();

        $db_forma_pago =1;//ob

        $db_banco =1;//ob





        //$cliente   = Cliente::create($request->all());

        
       DB::insert('insert into clientes (`id_cn`, `id_ejecutivo`, `id_contacto_principal`, `tipo`, `contrato_a`, `id_user`, `nombre_comercial`, `forma_juridica`, `razon_social`, `fecha_constitucion`,

 `nombre`, `apellido_paterno`, `apellido_materno`, `genero`, `fecha_nacimiento_pros`, `lugar_nacimiento`, `clase_pm`, `rfc`, `curp`, `registro_patronal`, `registro_p`, `actividad_economica`, `status`,

  `df_cp`, `df_estado`, `df_municipio`, `df_ciudad`, `df_colonia`, `df_calle`, `df_num_exterior`, `df_num_interior`, `dc_cp`, `dc_estado`, `dc_municipio`, `dc_ciudad`, `dc_colonia`, `dc_calle`,

   `dc_num_exterior`, `dc_num_interior`, `medio_contacto`, `tipo_cliente`, `comentario`, `db_forma_pago`, `db_banco`, `db_dias_credito`, `db_limite_credito`, `db_cta_clientes`, `db_clabe`, `db_iva`,

    `clientescol`,`nickname`, `password`, `Username`, `TipoCliente`,`creacion`,`actualizacion`)

       values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now())',

            [$id_cn,$id_ejecutivo,$id_contacto_principal,$request->TipoDeCliente,$contrato_a,$id_user,$nombre_comercial,$forma_juridica,$razon_social,'0000-00-00',$nombre,$apellido_paterno,$apellido_materno,

                0,$fecha_nacimiento_pros,$lugar_nacimiento,$clase_pm,$rfc,$curp,$registro_patronal,$registro_p,$actividad_economica,$status,$df_cp,$df_estado,$df_municipio,$df_ciudad,$df_colonia

                ,$request->df_calle,$request->df_num_exterior,$request->df_num_interior,$request->dc_cp,$request->dc_estado,$request->dc_municipio,$request->dc_ciudad,$request->dc_colonia

                ,$request->dc_calle,$request->dc_num_exterior,$request->dc_num_interior,$request->medio_contacto,$request->tipo_cliente,$request->comentario,$request->db_forma_pago,$request->db_banco,$request->db_dias_credito

            ,$request->db_limite_credito,$request->db_cta_clientes,$request->db_clabe,$request->db_iva,'','','','','']);

        $id_cliente = DB::select('SELECT * FROM clientes ORDER BY id DESC LIMIT 1');

        DB::insert('insert into cliente_cn_actual (id_cn,id_cliente) values (?,?)', [$id_cn,$id_cliente[0]->id]);

        $file= $request->file("archivo");

        $archivopdf=$request->input('archivopdf');



        if($file == null){

            $base64 = null;

        }else{

            $imagedata = file_get_contents(Input::file('archivo'));

            $base64 = base64_encode($imagedata);

        }

        DB::table('clientes')

            ->where('id',$id_cliente[0]->id)

            ->update([

                'tipo'=>$request->TipoDeCliente,

                'nombre_comercial' => $request->nombre_comercial,

                'id_cn' => $request->id_cn,

                'forma_juridica'   =>  $request->forma_juridica,

                'razon_social'=> $request->razon_social,

                'fecha_constitucion'=> $request->fecha_constitucion,

                'nombre'=> $request->nombre,

                'apellido_paterno'=> $request->apellido_paterno,

                'apellido_materno'=> $request->apellido_materno,

                'genero'=> 0,

                'fecha_nacimiento_pros'=> $request->fecha_nacimiento_pros,

                'lugar_nacimiento'=> $request->lugar_nacimiento,

                'clase_pm'=> $request->clase_pm,

                'rfc'=> $request->rfc,

                'curp'=> $request->curp,

                'registro_patronal'=> $request->registro_patronal,

                'registro_p'=> $request->registro_p,

                'actividad_economica'=> $request->actividad_economica,

                'status'=> $request->status,

                'df_cp'=> $request->df_cp,

                'df_estado'=> $request->df_estado,

                'df_municipio'=> $request->df_municipio,

                'df_ciudad'=> $request->df_ciudad,

                'df_colonia'=> $request->df_colonia,

                'df_calle'=> $request->df_calle,

                'df_num_exterior'=> $request->df_num_exterior,

                'df_num_interior'=> $request->df_num_interior,

                'dc_cp'=> $request->dc_cp,

                'dc_estado'=> $request->dc_estado,

                'dc_municipio'=> $request->dc_municipio,

                'dc_ciudad'=> $request->dc_ciudad,

                'dc_colonia'=> $request->dc_colonia,

                'dc_calle'=> $request->dc_calle,

                'dc_num_exterior'=> $request->dc_num_exterior,

                'dc_num_interior'=> $request->dc_num_interior,

                'medio_contacto'=> $request->medio_contacto,

                'tipo_cliente'=> $request->tipo_cliente,

                'comentario'=> $request->comentario,

                'db_forma_pago'=> $request->db_forma_pago,

                'db_banco'=> $request->db_banco,

                'db_dias_credito'=> $request->db_dias_credito,

                'db_limite_credito'=> $request->db_limite_credito,

                'db_cta_clientes'=> $request->db_cta_clientes,

                'db_clabe'=> $request->db_clabe,

                'db_iva'=> $request->db_iva,

                'id_ejecutivo' => $id_ejecutivo,

                'bLogo'=>$base64,

                'contrato_a'=>$request->contrato_a,




            ]);


        $last_client = DB::select('SELECT id FROM clientes ORDER BY id DESC LIMIT 1');

        $last_user = DB::select('SELECT id FROM users ORDER BY id DESC LIMIT 1');



        DB::table('clientes')

            ->where('id', $last_client[0]->id)

            ->update(['id_user' => $last_user[0]->id]);

        

        $peticion = $request->path();

        $clientes=DB::table('centros_negocio')->get();

        $clientes_select=[''=>'Selecciona un departamento...'];

        foreach ($clientes as  $cliente) {

            $clientes_select[$cliente->id]="(".$cliente->nomenclatura.")"."  ".$cliente->nombre;

        }



        $contactos              = count($request->input('nombre_con'));

        $nombre_con             = $request->input('nombre_con');

        $cargo                  = $request->input('cargo');

        $departamento           = $request->input('departamento');

        $genero_con             = $request->input('genero_con');

        $fecha_nacimiento_con   = $request->input('fecha_nacimiento_con');

        $telefono1              = $request->input('telefono1');

        $telefono2              = $request->input('telefono2');

        $ext1                   = $request->input('ext1');

        $ext2                   = $request->input('ext2');

        $celular1               = $request->input('celular1');

        $celular2               = $request->input('celular2');

        $correo1                = $request->input('correo1');

        $correo2                = $request->input('correo2');

        $pagina_web             = $request->input('pagina_web');

        $contacto_principal     = $request->input('contacto_principal');

        $apellido_materno_con   = $request->input('ap_m');

        $apellido_paterno_con   = $request->input('ap_p');



        for($i=0; $i < $contactos; $i++){

           

           $contacto = Contacto::create([  'id_cliente'             => $id_cliente[0]->id,

                                            'nombre_con'            => $nombre_con[$i],

                                            'cargo'                 => $cargo[$i],

                                            'departamento'          => $departamento[$i],

                                            'genero_con'            => $genero_con[$i],

                                            'fecha_nacimiento_con'  => $fecha_nacimiento_con[$i],

                                            'telefono1'             => $telefono1[$i],

                                            'telefono2'             => $telefono2[$i],

                                            'ext1'                  => $ext1[$i],

                                            'ext2'                  => $ext2[$i],

                                            'celular1'              => $celular1[$i],

                                            'celular2'              => $celular2[$i],

                                            'correo1'               => $correo1[$i],

                                            'correo2'               => $correo2[$i],

                                            'pagina_web'            => $pagina_web[$i],

                                            'principal'             => $contacto_principal[$i],

                                            'apellido_paterno_con' => $apellido_paterno_con[$i],

                                            'apellido_materno_con' => $apellido_materno_con[$i]

                                        ]);



            if($contactos == 1 || $contacto_principal[$i] == '1'){

                $id_contacto = $contacto->id;

            }



        }



        return view('catalogo.clientes.crm-clientes',[ 'peticion' => $peticion,'cn'=>$clientes_select ]);

    }


    public function addContacto (Request $Request){

        $contacto = Contacto::create([  'id_cliente' => $Request->id_cliente]);

        $id_con = DB::select("select id from contactos where id_cliente = {$Request->id_cliente} order by id desc limit 1");
        return response() -> json($id_con[0]->id);
    }

    public function __construct()

    {

        $this->middleware('auth');

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request )

    {

       /* $centros = CentroNegocio::find(4);

        dd( $centros->clientes_demo );

        */





        $peticion = $request->path();

            $clientes=DB::table('centros_negocio')->get();

            $clientes_select=[''=>'Seleccione un CN...'];

            foreach ($clientes as  $cliente) {

                $clientes_select[$cliente->id]="(".$cliente->nomenclatura.")"."  ".$cliente->nombre;

            }

            



       return view('catalogo.clientes.crm-clientes',[ 'peticion' => $peticion,'cn'=>$clientes_select]);





    }

    public function setRol(Request $request){

        $user = DB::table('users')->where('Id',$request->id)->first();

        $analista = 98;

        $lider = 105;

        if ($request->rol=='Lider'){

            $permiso = DB::table('users')->where('id',$request->id)->update(

                array('IdRol'=>$lider,

                   ));



        }elseif ($request->rol=='Analista'){

            $permiso = DB::table('users')->where('id',$request->id)->update(

                array('IdRol'=>$analista,

                ));



        }

        return response()->json(['rol' => 'success']);





    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()



    {

        $clientes=DB::table('centros_negocio')->get();

        $clientes_select=[''=>'Selecciona un departamento...'];

        foreach ($clientes as  $cliente) {

            $clientes_select[$cliente->id]=$cliente->nombre;

        }



        $bancos_lista = DB::table('bancos')->get();



        $bancos = ['' => 'Seleccione un Banco'];

        foreach ($bancos_lista as $bank) {

            $bancos[$bank->id] = $bank->nombre;

        }



        //$ejecutivos=DB::table('ejecutivos')

            //->join('clientes','clientes.id_cn','=','ejecutivos.id')

           // ->get();

        $ejecutivos=DB::table('ejecutivos')->get();

        $ejecutivo_select=[''=>'Seleccione un ejecutivo...'];

        foreach ($ejecutivos as  $ejecutivo) {

            $ejecutivo_select[$ejecutivo->id]=$ejecutivo->nombre;

        }



        // Listado de CP

        $cp=DB::table('codigospostales')->get();

        $cp_select=[''=>'Seleccione un CP...'];

        foreach ($cp as  $cps) {

            $cp_select[$cps->FK_CodigoPostal]=$cps->FK_CodigoPostal;

        }



        $lugar_nacimiento = [];

        $estados = DB::table('estados')->get();

        foreach ($estados as $estado) {

            $lugar_nacimiento[$estado->IdEstado] = $estado->FK_nombre_estado;

        }





        $actividad_economica= [ "0" => 'Seleccione una opción',

            "1" => 'Animales y mascotas',

            "2" => 'Automovilismo y transporte',

            "3" => 'Belleza y masajes',

            "4" => 'Negocios y consultoría',

            "5" => 'Educación y cuidado infantil',

            "6" => 'Construcción y contratación',

            "7" => 'Entretenimiento, arte y música',

            "8" => 'Servicios y orientación familiar',

            "9" => 'Finanzas y seguros',

            "10" => 'Alimentos, bebidas y restaurantes',

            "11" => 'Salud y seguridad pública',

            "12" => 'Días festivos y ocasiones especiales',

            "13" => 'Mejoras y limpieza del hogar',

            "14" => 'Ciencias y tecnología',

            "15" => 'IT/ Ingeniería',

            "16" => 'Legal y política',

            "17" => 'Mercadeo y comunicaciones',

            "18" => 'Bienes raíces',

            "19" => 'Religioso y espiritual',

            "20" => 'Comercio y ventas',

            "21" => 'Deportes y fitness',

            "22" => 'Viajes y hospitalidad',

            "23" => 'Otros'];



        $tipos_clientes = DB::table('tipos_clientes')->get();



        $tipo_cliente_lista=['' => 'Seleccione una opción'];



        foreach ($tipos_clientes as $tipo) {

            $tipo_cliente_lista[$tipo->id]=$tipo->nombre;

        }



        $tipoCliente = [2 => 'Cliente',1 => 'Prospecto'];


        $cont = DB::select ("Select * from master_empresa where tipoempresa = 'FACTURADORA' AND activo ='Si'");

        $contratoAAAA=[''=>'Seleccione una opcion...'];

            foreach ($cont as  $conta) {

                $contratoAAAA[$conta->IdEmpresa]=$conta->FK_Titulo;

        }

        return view('crm.clientes.crm-altaClientes',["contratoAAAA"=>$contratoAAAA,'tipoCliente' => $tipoCliente,'cn'=>$clientes_select,'eje'=>$ejecutivo_select,'cp'=>$cp_select,'bancos' => $bancos,'lugar_nacimiento' => $lugar_nacimiento,'actividad_economica' => $actividad_economica,'tipo_cliente_lista' => $tipo_cliente_lista]);

    }







    public function selectClientes(Request $request)

    {

      $datos=$request->input('datos');

      $res='';



      $query = DB::select("select contactos.id ,master_clientes.IdEmpresa, concat(contactos.nombre_con,' ',contactos.apellido_paterno_con,' ',contactos.apellido_materno_con) as Nombre from contactos inner join master_clientes on (master_clientes.IdCliente = contactos.id_cliente)where master_clientes.IdEmpresa = $datos");



      foreach ($query as $opt) {

        //$res = $opt->id.'|'.$opt->Nombre;

        $res=$res."<option value='".$opt->id."' >".$opt->Nombre."</option>";

      }



       return $res;



  }







    public function valores(){



        $s=Input::get('s');



        return $s;



    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {



        // $resultado = $this->validarCampos($request);







        // $val = $request->input('valida');



        // if($val == 1){



        //     $status = $request->input('status');





        //     if ($status = "Activo") {

        //         $Activo='Si';

        //     }else{

        //         $Activo='No';

        //     }

        //     $empresa = $request->input('empresa');

        //     $IdP = $request->input('personal');



        //     $this->validate($request, [

        //         'empresa' => 'required',

        //         'personal' => 'required',

        //         'username' => 'required',

        //         'password' => 'required',



        //     ]);

        //     // $IdPer = Contacto::find($IdP);

        //     $IdPer=DB::select("select * from contactos where id = $IdP");



        //     /*========ID PERSONAL========*/

        //     // $Cliente=DB::select($query,[$id]);



        //     foreach ($IdPer as $per){

        //         // $id_cliente=$per->id_cliente;

        //         $idcon=$per->id;

        //         $Nombre= $per->nombre_con;

        //         $APP= $per->apellido_paterno_con;

        //         $APM= $per->apellido_materno_con;

        //         $Email= $per->correo1;

        //         $Oficina= $per->telefono1;

        //         $Ext= $per->ext1;

        //         $Movil= $per->celular1;

        //         $Genero= $per->genero_con;

        //         $FecNac= $per->fecha_nacimiento_con;

        //     }







        //     if($IdPer){



        //             // $query='select users.*

        //             // from users

        //             // where users.IdCliente= :id';

        //             $query='select master_clientes.* from master_clientes where master_clientes.id_contacto_principal= :id';

        //             /*========CP========*/

        //             $datos=DB::select($query,[$idcon]);



        //             $IdPersonal="";



        //             foreach ($datos as  $dato) {

        //                 $IdPersonal = $dato->IdCliente;

        //             }



        //             if($IdPersonal==null){

        //                 $passwd=$request->input('password');

        //                 $contr='SELECT AES_ENCRYPT(:password_mobile, "DSAI2020") as pw';

        //                 $datos=DB::select($contr,[$passwd]);

        //                 $contras="";

        //                 foreach ($datos as  $dato) {

        //                     $contras = $dato->pw;

        //                 }

        //                 $empres=Facturadora::find($empresa);

        //                 $usuario       = new User();

        //                 $usuario->idcn              = 22;

        //     //             // $usuario->IdPuesto          = $CPuesto;

        //                 $usuario->name              = $empres->FK_Titulo;

        //                 // $usuario->name              = $Nombre;

        //                 // $usuario->apellido_paterno  = $APP;

        //                 // $usuario->apellido_materno  = $APM;

        //                 // $usuario->nick_name         = trim($Nombre.'.'.$APP.'.'.$APM);

        //                 $usuario->nick_name         = $empres->FK_Titulo;

        //                 // $usuario->Genero            = $Genero;

        //                 // $usuario->FechaNacimiento   = $FecNac;

        //                 // $usuario->ext               = $Ext;

        //                 // $usuario->username          = trim(Input::get('username'));

        //                 $usuario->username          =$request->input('username');

        //                 // $usuario->IdCliente        = $id_cliente;

        //                     if($Email == NULL)

        //                     {

        //                         $usuario->email = "";

        //                     }

        //                     else{

        //                     $usuario->email             = $Email;

        //                     }

        //                 $usuario->password          = bcrypt($passwd);

        //                 $usuario->password_mobile = $contras;

        //                 //$dcontra=openssl_decrypt($contra, "AES-128-ECB", 'DSAI2020');

        //                 $usuario->password_aux      = $passwd;

        //                 // $usuario->telefono_oficina  = $Oficina;

        //                 // $usuario->telefono_movil    = $Movil;

        //                 $usuario->tipo              = 'c';

        //                 // dd($contra);

        //                 // dd($dcontra);

        //                 $usuario->save();



        //                 // $IdPer=DB::select("select * from contactos where id = $IdP");

        //                 // foreach ($IdPer as $per){

        //                 //     // $id_cliente=$per->id_cliente;

        //                 //     $idcon=$per->id;

        //                 //     $Nombre= $per->nombre_con;

        //                 //     $APP= $per->apellido_paterno_con;

        //                 //     $APM= $per->apellido_materno_con;

        //                 //     $Email= $per->correo1;

        //                 //     $Oficina= $per->telefono1;

        //                 //     $Ext= $per->ext1;

        //                 //     $Movil= $per->celular1;

        //                 //     $Genero= $per->genero_con;

        //                 //     $FecNac= $per->fecha_nacimiento_con;

        //                 // }

        //                 $empre=Facturadora::find($empresa);

        //                 $client=Cliente::all();

        //                 $ultimoAgregado  = $client->last();

        //                 $Folio = $ultimoAgregado->Codigo;

        //                 $result = intval(preg_replace('/[^0-9]+/', '', $Folio), 10);

        //                 $cliente       = new Cliente();



        //                 $cliente->Codigo              = 'CLIE'.'-'.str_pad($result+1, 4, "0", STR_PAD_LEFT);

        //                 $cliente->Nombre              = $empre->FK_Titulo;

        //                 $cliente->Empresa             = $empre->FK_Titulo;

        //                 $cliente->Calle               = $empre->Calle;

        //                 $cliente->No_int              = $empre->NoInt;

        //                 $cliente->No_ext              = $empre->NoExt;

        //                 $cliente->Colonia             = $empre->Colonia;

        //                 $cliente->CodigoPostal        = $empre->CP;

        //                 $cliente->IdEstado            = $empre->IdEstado;

        //                 $cliente->Activo              = $Activo;

        //                 $cliente->IdEmpresa           = $empresa;

        //                 $cliente->tipo                = $request->input('tipo');

        //                 $cliente->save();

        //                 $id_cliente             = $cliente->IdCliente;

        //                 $usuario->IdCliente     = $id_cliente;

        //                 $usuario->save();

        //                 $cliente->id_contacto_principal = $IdP;

        //                 $cliente->save();



        //                 $this->asignarCN($usuario->idcn, $id_cliente, $usuario->id);

        //                 $this->setCNActual($id_cliente, $usuario->idcn);



        //                 // return $usuario->id;

        //                 clearstatcache();

        //                 return response()->json(['status_alta' => 'success']);

        //             }

        //             else{

        //                 return response()->json(['status_alta' => 'existe']);

        //             }



        //         }





        // }else{

            $this->validate($request, [

                'nombre_comercial' => 'required',

                'nombre_con' => 'required',

                'apellido_paterno_con' => 'required',

                'apellido_materno_con' => 'required',

                'username' => 'required',

                'password' => 'required',

                'telefono1' => 'required',

                'correo1' => 'required',

                'telefono_oficina' => 'required',

                'email' => 'required',

            ]);





                $status = $request->input('status');





                if ($status = "Activo") {

                    $Activo='Si';

                } else {

                $Activo='No';

                }

                $usuario       = new User();

                $passwd=$request->input('password');

                // $usuario->idcn              = 22;

                $usuario->idcn              = trim($request->input('id_cn'));

                $usuario->name              = trim($request->input('nombre_comercial'));

                // $usuario->name              = trim($request->input('nombre_con'));

                // $usuario->apellido_paterno  = trim($request->input('apellido_paterno_con'));

                // $usuario->apellido_materno  = trim($request->input('apellido_materno_con'));

                $usuario->nick_name         = trim($request->input('nombre_comercial'));

                $usuario->name              = trim($request->input('nombre_comercial'));

                $usuario->username          = trim($request->input('username'));

                // $usuario->Genero            = trim($request->input('genero_con'));

                // $usuario->FechaNacimiento   = trim($request->input('fecha_nacimiento_con'));

                $usuario->email             = trim($request->input('email'));

                $usuario->password          = bcrypt($passwd);

                $contr='SELECT AES_ENCRYPT(:password_mobile, "DSAI2020") as pw';

                    $datos=DB::select($contr,[$passwd]);

                    $contras="";

                    foreach ($datos as  $dato) {

                        $contras = $dato->pw;

                    }



                $usuario->password_mobile   = $contras;

                $usuario->password_aux      = $passwd;

                $usuario->telefono_oficina  = trim($request->input('telefono_oficina'));

                // $usuario->ext               = trim($request->input('ext1'));

                // $usuario->telefono_movil    = trim($request->input('celular1'));

                $usuario->tipo              = 'c';

                $usuario->save();



                $Factur        = Facturadora::all();

                $ultimoAgregadoF  = $Factur->last();

                $FolioF = $ultimoAgregadoF->Codigo + 1;



                $empresa       = new Facturadora();

                $empresa->Codigo              = str_pad($FolioF, 3, "0", STR_PAD_LEFT);

                $empresa->FK_Titulo           = $request->input('nombre_comercial');

                $empresa->RazonSocial         = $request->input('razon_social');

                $empresa->FormaJuridica       = $request->input('forma_juridica');

                $empresa->Rfc                 = $request->input('rfc');

                $empresa->clase_rt            = $request->input('registro_patronal');

                $empresa->pf_nombre           = $request->input('nombre');

                $empresa->pf_apellido_paterno = $request->input('apellido_paterno');

                $empresa->pf_apellido_materno = $request->input('apellido_materno');

                $empresa->pf_genero           = $request->input('genero');

                $empresa->pf_fecha_nacimiento = $request->input('fecha_nacimiento_pros');

                $empresa->fecha_constitucion  = $request->input('fecha_constitucion');

                $empresa->pf_lugar_nacimiento = $request->input('lugar_nacimiento');

                $empresa->clase_pm            = $request->input('clase_pm');

                $empresa->IdActividadEconomica= $request->input('actividad_economica');

                $empresa->RegPatronal         = $request->input('registro_p');

                $empresa->Rfc                 = $request->input('rfc');

                $empresa->pf_CURP             = $request->input('curp');

                $empresa->Calle               = $request->input('df_calle');

                $empresa->NoInt               = $request->input('df_num_interior');

                $empresa->NoExt               = $request->input('df_num_exterior');

                $empresa->Colonia             = $request->input('colonia');

                $empresa->CP                  = $request->input('cp');

                $IdPais                       = $request->input('IdPais');



                if($IdPais){

                    $empresa->IdPais              = $request->input('IdPais');

                    $empresa->IdEstado            = $request->input('IdEstado');

                    $empresa->Localidad           = $request->input('municipio');

                }







                $empresa->Calle_dc               = $request->input('Calle_dc');

                $empresa->NoInt_dc               = $request->input('NoInt_dc');

                $empresa->NoExt_dc               = $request->input('NoExt_dc');

                $empresa->Colonia_dc             = $request->input('colonia_dc');

                $empresa->CP_dc                  = $request->input('cp_dc');

                $IdPais_dc                       = $request->input('IdPais_dc');

                if($IdPais_dc){

                    $empresa->IdPais_dc              = $request->input('IdPais_dc');

                    $empresa->IdEstado_dc            = $request->input('IdEstado_dc');

                    $empresa->Municipio_dc           = $request->input('Municipio_dc');

                }



                $empresa->fecha_constitucion     = $request->input('fecha_constitucion');

                $empresa->Activo                 = $Activo;

                $empresa->save();



                $Id_Empresa = $empresa->IdEmpresa;

                $client=Cliente::all();

                $ultimoAgregado  = $client->last();

                $Folio = $ultimoAgregado->Codigo;

                $result = intval(preg_replace('/[^0-9]+/', '', $Folio), 10);

                $cliente       = new Cliente();



                $cliente->Codigo              = 'CLIE'.'-'.str_pad($result+1, 4, "0", STR_PAD_LEFT);

                $cliente->Nombre              = $request->input('nombre_comercial');

                $cliente->Empresa             = $request->input('nombre_comercial');

                $cliente->Calle               = $request->input('df_calle');

                $cliente->No_int              = $request->input('df_num_interior');

                $cliente->No_ext              = $request->input('df_num_exterior');

                $cliente->Colonia             = $request->input('colonia');

                $cliente->CodigoPostal        = $request->input('cp');

                $cliente->IdCodigoPostal      = $request->input('IdCodigoPostal');

                $cliente->IdEstado            = $request->input('IdEstadoF');

                $cliente->medio_contacto      = $request->input('medio_contactoc');

                $cliente->tipo_cliente        = $request->input('tipo_cliente');

                $cliente->comentario          = $request->input('comentario');

                $cliente->contrato_a          = $request->input('contrato_a');

                $cliente->id_ejecutivo        = $request->input('id_ejecutivo');

                $cliente->db_forma_pago       = $request->input('db_forma_pagoc');

                $cliente->db_banco            = $request->input('db_banco');

                $cliente->db_clabe            = $request->input('db_clabe');

                $cliente->db_dias_credito     = $request->input('db_dias_credito');

                $cliente->db_limite_credito   = $request->input('db_limite_credito');

                $cliente->db_cta_clientes     = $request->input('db_cta_clientes');

                $cliente->db_iva              = $request->input('db_iva');

                $cliente->TipoCliente          = $request->input('tipo');

                $cliente->Activo              = $Activo;

                $cliente->IdEmpresa           = $Id_Empresa;

                $cliente->save();



                // $cliente->id_cn         = $request->user()->idcn;

                $id_cliente             = $cliente->IdCliente;

                $usuario->IdCliente     = $id_cliente;

                $usuario->save();



                $contactos              = count($request->input('nombre_con'));

                $nombre_con             = $request->input('nombre_con');

                $cargo                  = $request->input('cargo');

                $departamento           = $request->input('departamento');

                $genero_con             = $request->input('genero_con');

                $fecha_nacimiento_con   = $request->input('fecha_nacimiento_con');

                $telefono1              = $request->input('telefono1');

                $telefono2              = $request->input('telefono2');

                $ext1                   = $request->input('ext1');

                $ext2                   = $request->input('ext2');

                $celular1               = $request->input('celular1');

                $celular2               = $request->input('celular2');

                $correo1                = $request->input('correo1');

                $correo2                = $request->input('correo2');

                $pagina_web             = $request->input('pagina_web');

                $contacto_principal     = $request->input('contacto_principal');

                $apellido_materno_con   = $request->input('apellido_materno_con');

                $apellido_paterno_con   = $request->input('apellido_paterno_con');



                for($i=0; $i < $contactos; $i++){





                   $contacto = Contacto::create([  'id_cliente'             => $id_cliente,

                                                    'nombre_con'            => $nombre_con[$i],

                                                    'cargo'                 => $cargo[$i],

                                                    'departamento'          => $departamento[$i],

                                                    'genero_con'            => $genero_con[$i],

                                                    'fecha_nacimiento_con'  => $fecha_nacimiento_con[$i],

                                                    'telefono1'             => $telefono1[$i],

                                                    'telefono2'             => $telefono2[$i],

                                                    'ext1'                  => $ext1[$i],

                                                    'ext2'                  => $ext2[$i],

                                                    'celular1'              => $celular1[$i],

                                                    'celular2'              => $celular2[$i],

                                                    'correo1'               => $correo1[$i],

                                                    'correo2'               => $correo2[$i],

                                                    'pagina_web'            => $pagina_web[$i],

                                                    'apellido_materno_con'  => $apellido_materno_con[$i],

                                                    'principal'             => $contacto_principal[$i],

                                                    'apellido_paterno_con'  => $apellido_paterno_con[$i]

                                                ]);



                    if($contactos == 1 || $contacto_principal[$i] == '1'){

                        $id_contacto = $contacto->id;

                    }



                }



                // // $cliente->nickname=$request->input('nickame');

                // // $cliente->password=$request->input('password');





                // $this->asignarCN($request->user()->idcn, $cliente->id, $request->user()->id);

                // $this->setCNActual($cliente->id, $request->user()->idcn);

                $this->asignarCN($usuario->idcn, $id_cliente, $usuario->id);

                $this->setCNActual($id_cliente, $usuario->idcn);



                // $name = [];

                // for($i=0; $i < $contactos; $i++){





                // $contacto = Contacto::create([  'id_cliente'             => $id_cliente,

                //                                     'nombre_con'            => $nombre_con,

                //                                     'cargo'                 => $cargo,

                //                                     // 'departamento'          => $departamento[$i],

                //                                     'genero_con'            => $genero_con,

                //                                     'fecha_nacimiento_con'  => $fecha_nacimiento_con,

                //                                     'telefono1'             => $telefono1,

                //                                     'telefono2'             => $telefono2,

                //                                     'ext1'                  => $ext1,

                //                                     'ext2'                  => $ext2,

                //                                     'celular1'              => $celular1,

                //                                     'celular2'              => $celular2,

                //                                     'correo1'               => $correo1,

                //                                     'correo2'               => $correo2,

                //                                     // 'pagina_web'            => $pagina_web[$i],

                //                                     'apellido_materno_con'  => $apellido_materno_con,

                //                                     // 'principal'             => $contacto_principal[$i],

                //                                     'apellido_paterno_con'  => $apellido_paterno_con

                //                                 ]);



                //     if($contactos == 1 || $contacto_principal[$i] == '1'){

                        // $id_contacto = $contacto->id;

                //     }



                // }



                $cliente->id_contacto_principal = $id_contacto;

                $cliente->save();





                        // dd($cliente);



                        // if($cliente){

                        //     $peticion = $request->peticion;

                        //     $slug     = ( $peticion == 'catalogo/clientes/create' ) ? 'catalogos' : 'crm';



                        //     $modulo         = Modulo::where('slug',$slug)->get();

                        //     $submodulo      = SubModulo::where('slug', $slug . '.clientes')->get();

                        //     $accion_kardex  = Accion::where('slug','alta')->get();



                            // $kardex = Kardex::create([

                            //                             "id_cn"         => $request->user()->idcn,

                            //                             "id_usuario"    => $request->user()->id,

                            //                             "id_modulo"     => $modulo[0]->id,

                            //                             "id_submodulo"  => $submodulo[0]->id,

                            //                             "id_accion"     => $accion_kardex[0]->id,

                            //                             "id_objeto"     => $cliente->IdCliente,

                            //                             "descripcion"   => "Alta de un Cliente/Prospecto: " . $cliente->Nombre]);

                            // clearstatcache();

                            return response()->json(['status_alta' => 'success']);

                            // return response()->json(['success' => true, 'message' => 'success'], 200);





                        // }



                        // return response()->json(['status_alta' => 'wrong']);





            // return response()->json($resultado['lista_campos']);

        //  }



    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        // $cliente = Cliente::findOrFail($id);



       //  return response()->json(['cliente' => $id]);

            return $id;







    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $IdCliente = $id;

        $cliente_editar = DB::select("select * from clientes where id = $id");

        $cliente_edit = (array)$cliente_editar[0];

        $cliente_edit = (object) $cliente_edit;



        foreach ($cliente_editar as $editar) {

            $Imagen=$editar->bLogo;

        }





        $contacto_editar = DB::select("select * from contactos where id_cliente = $id");

        $contacto_edit = (array)$contacto_editar[0];

        $contacto_edit = (object) $contacto_edit;



        $clientes=DB::table('centros_negocio')->get();

        $clientes_select=[''=>'Selecciona un departamento...'];

        foreach ($clientes as  $cliente) {

            $clientes_select[$cliente->id]=$cliente->nombre;

        }



        $bancos_lista = DB::table('bancos')->get();



        $bancos = ['' => 'Seleccione un Banco'];

        foreach ($bancos_lista as $bank) {

            $bancos[$bank->id] = $bank->nombre;

        }





       

        $ejecutivos=DB::table('ejecutivos')

            ->join('clientes','clientes.id_cn','=','ejecutivos.id')

            ->get();

        $ejecutivo_select=[''=>'Seleccione una ejecutivo...'];

        foreach ($ejecutivos as $ejecutivo) {

            $ejecutivo_select[$ejecutivo->id]=$ejecutivo->nombre;

        }





        // Listado de CP

        // $cp=DB::table('codigospostales')->get();

        // $cp_select=[''=>'Seleccione un CP...'];

        // foreach ($cp as  $cps) {

        //     $cp_select[$cps->FK_CodigoPostal]=$cps->FK_CodigoPostal;

        // }

        // $df_cp = DB::table('codigospostales')->where('FK_CodigoPostal', $cliente_editar[0]->df_cp)->first();



        // $dc_cp = DB::table('codigospostales')->where('FK_CodigoPostal', $cliente_editar[0]->dc_cp)->first();

        $df_cp=$cliente_editar[0]->df_cp;

        $dc_cp=$cliente_editar[0]->dc_cp;

        // dd($cliente_edit);

        // $nombre=$cliente_editar[0]->nombre;

        $lugar_nacimiento = [];

        $estados = DB::table('estados')->get();

        foreach ($estados as $estado) {

            $lugar_nacimiento[$estado->IdEstado] = $estado->FK_nombre_estado;

        }

        /** Se obtienen los datos del usuario */

        



        

        $seguimientoVenta = DB::select('SELECT c.id_ejecutivo, c.id_cn, cn.nombre AS clienteAsignado, c.medio_contacto, c.tipo, tc.id AS tipoCliente, c.id,c.contrato_a,c.nombre_comercial,c.comentario,CONCAT(u.`name`," ",u.apellido_paterno," ",u.apellido_materno) AS nombreEjecutivo FROM clientes c 

        INNER JOIN users u

        ON u.id = c.id_ejecutivo

        INNER JOIN tipos_clientes tc

        ON tc.id = c.tipo_cliente

        INNER JOIN centros_negocio cn

        ON cn.id = c.id_cn

        WHERE c.id ='.$id);




        $IdEjecutivo = "";

        $nombreEjecutivo = "";

        $sid_cn = "";

        $clienteAsignado = "";

        $mediocontacto = "";

        $tipoclientee = "";

        $contratoa = "";



        foreach($seguimientoVenta as $row){

            $IdEjecutivo = $row->id_ejecutivo;

            $nombreEjecutivo = $row->nombreEjecutivo;

            $sid_cn = $row->id_cn;

            $clienteAsignado = $row->clienteAsignado;

            $mediocontacto = $row->medio_contacto;

            $tipoclientee = $row->tipoCliente;

            $contratoa = $row->contrato_a;

        }

        $ej = DB::select("select id_cn from clientes c where c.id = $id");
        
        $ejecut = DB::select('SELECT u.id,CONCAT(IFNULL(u.name,"")," ", IFNULL(u.apellido_paterno,"")," ",IFNULL(u.apellido_materno,"")) AS nombre FROM users u WHERE u.idcn ='.$ej[0]->id_cn.' AND u.tipo = "s" ');






        $actividad_economica= [ ""  => 'Seleccione una opción',

            "0" => 'Servicios Profesionales',

            "1" => 'Servicios Públicos',

            "2" => 'Servicios Privados',

            "3" => 'Transporte',

            "4" => 'Turismo',

            "5" => 'Financiera',

            "6" => 'Bancaría',

            "7" => 'Educación ',

            "8" => 'Salubridad',

            "9" => 'Comercial',

            "10" => 'Industrial',

            "11" => 'Producción',

            "12" => 'Fabricación',

            "13" => 'Farmaceutica',



            "100" => 'Otros'];









        $tipos_clientes = DB::table('tipos_clientes')->get();

        $tipo_cliente_lista = ['' => 'Seleccione una opción'];

        foreach($tipos_clientes as $tipo_cliente){

            $tipo_cliente_lista[$tipo_cliente->id] = $tipo_cliente->nombre;

        }

        $tipoCliente = [2 => 'Cliente',1 => 'Prospecto'];

        $cont = DB::select ("Select IdEmpresa,FK_Titulo from master_empresa where tipoempresa = 'FACTURADORA' AND activo ='Si'");

        $contratoAAAA=[''=>'Seleccione una opcion...'];

            foreach ($cont as  $conta) {

                $contratoAAAA[$conta->IdEmpresa]=$conta->FK_Titulo;

        }

        return view('crm.clientes.edit-clientes',

                    [
                    
                    'contratoAAAA'=>$contratoAAAA,

                     'tipoCliente' => $tipoCliente,

                     'cn'=>$clientes_select,

                     'eje'=>$ejecut,

                     'df_cp'=> $df_cp, 

                     'dc_cp'=> $dc_cp,

                     'bancos' => $bancos,

                     'cliente' => $cliente_edit,

                     'contacto' => $contacto_edit,

                     'lugar_nacimiento' => $lugar_nacimiento,

                     'actividad_economica' => $actividad_economica,

                     'tipo_cliente_lista'=>$tipo_cliente_lista,


                     'Archivo'=> $Imagen,

                     'IdCliente'=>$IdCliente,

                     'seguimiento'=>$seguimientoVenta,

                     'IdEjecutivo'=>$IdEjecutivo,

                     'nombreEjecutivo'=> $nombreEjecutivo,

                     'sid_cn'=> $sid_cn,

                     'clienteAsignado'=> $clienteAsignado,

                     'mediocontacto'=> $mediocontacto,

                     'tipoclientee'=> $tipoclientee,

                     'contratoa'=> $contratoa

                    ]);

    }

    public function edit2( Request $request, $id)

    {



        $cliente_editar = Cliente::find($id);

        if (empty($cliente_editar->CodigoPostal)){

            $cod = "default@gmail.com";



        }else{

            $cod=$cliente_editar->CodigoPostal;



        }





        $query=DB::select("select users.*, master_clientes.*,  if(master_clientes.db_banco is null ,0,master_clientes.db_banco) as dbBanco, if(master_clientes.tipo_cliente is null ,0,master_clientes.tipo_cliente) as TCliente, master_clientes.Codigo as CodigoCliente,master_clientes.Activo as ActivoCliente,

        master_clientes.Imagen as ImagenCliente, e.FK_nombre_estado as Estado,m.Descripcion as Municipio,cp.IdCodigoPostal, master_empresa.*,

        (select estados.FK_nombre_estado from estados where master_empresa.IdEstado = estados.IdEstado) as EstadoE,

        master_empresa.IdEstado as IdEstadoE, master_empresa.IdCiudad as IdCiudadE,master_empresa.Colonia as ColoniaE,

        (select estados.FK_nombre_estado from estados where master_empresa.IdEstado_dc = estados.IdEstado) as EstadoE_dc,

        master_empresa.Calle as CalleE,

        if(master_empresa.IdActividadEconomica is null ,0,master_empresa.IdActividadEconomica) as IdActividadEconomicaEE,

        contactos.nombre_con,contactos.apellido_paterno_con,contactos.apellido_materno_con,contactos.cargo,contactos.genero_con,

        contactos.fecha_nacimiento_con,contactos.telefono1,contactos.telefono2,contactos.ext1,contactos.ext2,contactos.celular1,contactos.celular2,contactos.correo1,contactos.correo2

                from master_clientes

                LEFT JOIN users on users.IdCliente= master_clientes.IdCliente

                LEFT JOIN master_empresa on master_empresa.IdEmpresa= master_clientes.IdEmpresa

                -- LEFT JOIN contactos on contactos.id_cliente= master_clientes.IdCliente

                LEFT JOIN contactos on contactos.id= master_clientes.id_contacto_principal

                left JOIN estados e on e.IdEstado = master_clientes.IdEstado

                left JOIN cfdi_codigopostal cp on cp.CodigoPostal = master_clientes.CodigoPostal

                left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

                left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

                where master_clientes.IdCliente = $id limit 1 ");





        $IdActividadEconomica="";



        /*========ACCESO OCULTO IDPAIS,IDESTADO ========*/

        foreach ($query as  $cps) {

            $nombre_comercial=$cps->Empresa;

            $FormaJuridica=$cps->FormaJuridica;

            $RazonSocial=$cps->RazonSocial;

            $pf_nombre=$cps->pf_nombre;

            $pf_apellido_paterno=$cps->pf_apellido_paterno;

            $pf_apellido_materno=$cps->pf_apellido_materno;

            $pf_lugar_nacimiento=$cps->pf_lugar_nacimiento;

            $tipo_client=$cps->TCliente;

            $pf_genero=$cps->pf_genero;

            $fecha_constitucion=$cps->fecha_constitucion;

            $pf_fecha_nacimiento=$cps->pf_fecha_nacimiento;

            $pf_CURP=$cps->pf_CURP;

            $clase_pm=$cps->clase_pm;

            $Rfc=$cps->Rfc;

            $IdEstadoE=$cps->IdEstadoE;

            $IdCiudadE=$cps->IdCiudadE;

            $IdActividadEconomica=$cps->IdActividadEconomicaEE;

            $Activo=$cps->Activo;

            $clase_rt=$cps->clase_rt;

            $RegPatronal=$cps->RegPatronal;



            $codpost=$cps->CP;

            $State=$cps->EstadoE;

            $IdState=$cps->IdEstadoE;

            $Municipio=$cps->Localidad;

            $Colonia=$cps->ColoniaE;

            $Localidad=$cps->Localidad;

            $IdPais=$cps->IdPais;

            $Calle=$cps->CalleE;

            $NoExt=$cps->NoExt;

            $NoInt=$cps->NoInt;





            $codpost_dc=$cps->CP_dc;

            $State_dc=$cps->EstadoE_dc;

            $IdState_dc=$cps->IdEstado_dc;

            $Municipio_dc=$cps->Municipio_dc;

            $Colonia_dc=$cps->Colonia_dc;

            $IdPais_dc=$cps->IdPais_dc;

            $Calle_dc=$cps->Calle_dc;

            $NoExt_dc=$cps->NoExt_dc;

            $NoInt_dc=$cps->NoInt_dc;



            $nombre_con=$cps->nombre_con;

            $apellido_paterno_con=$cps->apellido_paterno_con;

            $apellido_materno_con=$cps->apellido_materno_con;

            $username=$cps->username;

            $password=$cps->password_aux;

            $cargo=$cps->cargo;

            $genero_con=$cps->genero_con;

            $fecha_nacimiento_con=$cps->fecha_nacimiento_con;

            $telefono1=$cps->telefono1;

            $ext1=$cps->ext1;

            $telefono2=$cps->telefono2;

            $ext2=$cps->ext2;

            $correo1=$cps->correo1;

            $correo2=$cps->correo2;

            $celular1=$cps->celular1;

            $celular2=$cps->celular2;

            $medio_contacto=$cps->medio_contacto;

            $tipo_cliente=$cps->tipo_cliente;

            $comentario=$cps->comentario;

            $contrato_a=$cps->contrato_a;

            $id_cn=$cps->idcn;

            $id_ejecutivo=$cps->id_ejecutivo;

            $db_forma_pago=$cps->db_forma_pago;



            if (empty($cps->dbBanco)){

                $db_banco = 1;

            }else{

                $db_banco=$cps->dbBanco;

            }

            $db_clabe=$cps->db_clabe;

            $db_dias_credito=$cps->db_dias_credito;

            $db_limite_credito=$cps->db_limite_credito;

            $db_cta_clientes=$cps->db_cta_clientes;

            $db_iva=$cps->db_iva;

            $telefono_oficina=$cps->telefono_oficina;

            $email=$cps->email;

            $tipo = $cps->tipo;



        }



           $DatosE='No';

           $empresas = Facturadora::all();

           $personal= Contacto::all();

         $clientes=DB::table('centros_negocio')->get();

            $clientes_select=[''=>'Selecciona un departamento...'];

            foreach ($clientes as  $cliente) {

                $clientes_select[$cliente->id]=$cliente->nomenclatura;

            }







            $bancos_lista=DB::select('SELECT id,nombre FROM bancos');



            foreach ($bancos_lista as $bank) {

                        $bancos[$bank->id] = $bank->nombre;

                    }



            $ejecutivos=DB::table('ejecutivos')

            ->join('clientes','clientes.id_cn','=','ejecutivos.id')

            ->get();

            $ejecutivo_select=[''=>'Seleccione una ejecutivo...'];

            foreach ($ejecutivos as  $ejecutivo) {

                $ejecutivo_select[$ejecutivo->id]=$ejecutivo->nombre;

            }







            $lugar_nacimiento = [];

            $estados = DB::table('estados')->get();

            foreach ($estados as $estado) {

                $lugar_nacimiento[$estado->FK_nombre_estado] = $estado->FK_nombre_estado;

            }



        // $actividad_economica = [];

        $actividad=DB::table('actividad_economica')

        ->select('id','actividad_economica')

        ->orderByRaw("FIELD(id, $IdActividadEconomica) DESC")

        ->get();

        foreach ($actividad as $act) {

                    $actividad_economica[$act->id] = $act->actividad_economica;

                }





                $tipos_clientes=DB::table('tipos_clientes')

                ->select('id','nombre')

                ->orderByRaw("FIELD(id, $tipo_client) DESC")

                ->get();

                foreach ($tipos_clientes as $tipo_cliente) {

                            $tipo_cliente_lista[$tipo_cliente->id] = $tipo_cliente->nombre;

                        }



        $datosContactos=DB::select("select * from contactos where id_cliente = $id");





        $peticion = $request->path();





            return view("crm.clientes.edit-clientes")

            ->with('cn',$clientes_select)

            ->with('eje',$ejecutivo_select)

            ->with('bancos',$bancos)

            ->with('cliente',$cliente_editar)

            ->with('actividad_economica',$actividad_economica)

            ->with('tipo_cliente_lista',$tipo_cliente_lista)

            ->with('lugar_nacimiento',$lugar_nacimiento)

            ->with('peticion',$peticion)

            ->with('id_cliente',$id)

            ->with('nombre_comercial',$nombre_comercial)

            ->with('forma_juridica',$FormaJuridica)

            ->with('razon_social',$RazonSocial)

            ->with('nombre',$pf_nombre)

            ->with('apellido_paterno',$pf_apellido_paterno)

            ->with('apellido_materno',$pf_apellido_materno)

            ->with('genero',$pf_genero)

            ->with('fecha_constitucion',$fecha_constitucion)

            ->with('fecha_nacimiento_pros',$pf_fecha_nacimiento)

            ->with('lugar_nacimiento',$lugar_nacimiento)

            ->with('curp',$pf_CURP)

            ->with('clase_pm',$clase_pm)

            ->with('rfc',$Rfc)

            ->with('DatosE', $DatosE)

            ->with('empresas',$empresas)

            ->with('personal',$personal)

            ->with('IdEmpresa',null)

            ->with('status',$Activo)

            ->with('registro_patronal',$clase_rt)

            ->with('registro_p',$RegPatronal)

            ->with('cp',$codpost)

            ->with('State',$State)

            ->with('IdState',$IdState)

            ->with('IdPais',$IdPais)

            ->with('Localidad',$Localidad)

            ->with('municipio',$Municipio)

            ->with('Colonia',$Colonia)

            ->with('df_calle',$Calle)

            ->with('df_num_exterior',$NoExt)

            ->with('df_num_interior',$NoInt)

            ->with('cp_dc',$codpost_dc)

            ->with('State_dc',$State_dc)

            ->with('IdState_dc',$IdState_dc)

            ->with('IdPais_dc',$IdPais_dc)

            ->with('Municipio_dc',$Municipio_dc)

            ->with('Colonia_dc',$Colonia_dc)

            ->with('Calle_dc',$Calle_dc)

            ->with('NoExt_dc',$NoExt_dc)

            ->with('NoInt_dc',$NoInt_dc)

            ->with('nombre_con',$nombre_con)

            ->with('apellido_paterno_con',$apellido_paterno_con)

            ->with('apellido_materno_con',$apellido_materno_con)

            ->with('username',$username)

            ->with('password',$password)

            ->with('cargo',$cargo)

            ->with('genero_con',$genero_con)

            ->with('fecha_nacimiento_con',$fecha_nacimiento_con)

            ->with('telefono1',$telefono1)

            ->with('ext1',$ext1)

            ->with('telefono2',$telefono2)

            ->with('ext2',$ext2)

            ->with('celular1',$celular1)

            ->with('celular2',$celular2)

            ->with('correo1',$correo1)

            ->with('correo2',$correo2)

            ->with('medio_contactoc',$medio_contacto)

            ->with('tipo_cliente',$tipo_cliente)

            ->with('comentario',$comentario)

            ->with('contrato_a',$contrato_a)

            ->with('id_cn',$id_cn)

            ->with('id_ejecutivo',$id_ejecutivo)

            ->with('db_forma_pagoc',$db_forma_pago)

            ->with('db_banco',$db_banco)

            ->with('db_clabe',$db_clabe)

            ->with('db_dias_credito',$db_dias_credito)

            ->with('db_limite_credito',$db_limite_credito)

            ->with('db_cta_clientes',$db_cta_clientes)

            ->with('db_iva',$db_iva)

            ->with('telefono_oficina',$telefono_oficina)

            ->with('email',$email)

            ->with('datosContactos',$datosContactos)

            ->with('tipo',$tipo)

            ;

            // ->with('cp', $codpost)

            // ->with('State', $State)

            // ->with('IdState', $IdState)

            // ->with('Municipio',$Municipio)

            // ->with('Colonia', $Colonia)

            // ->with('Localidad', $Localidad)

            // ->with('IdPais', $IdPais);

              //return view("administrador.departamentos.edit-departamento",['depCn'=>$depCn,'cp'=>$cp_select]);



        // return view('crm.clientes.edit-clientes',['cn'=>$clientes_select,'eje'=>$ejecutivo_select,'cp'=>$cp_select,'bancos' => $bancos,'cliente' => $cliente_editar,'lugar_nacimiento' => $lugar_nacimiento,'actividad_economica' => $actividad_economica,'tipo_cliente_lista'=>$tipo_cliente_lista, 'peticion' => $peticion, 'id_cliente' => $id]);





    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request,$id)

    {



        $file= $request->file("archivo");

        $archivopdf=$request->input('archivopdf');



        if($file == null){

            $base64 = null;

        }else{

            $imagedata = file_get_contents(Input::file('archivo'));

            $base64 = base64_encode($imagedata);

        }



        // $id_cliente = DB::select('SELECT * FROM clientes ORDER BY id DESC LIMIT 1');

        $id_ejecutivo = 0;

        if($request->id_ejecutivo == "")

            $id_ejecutivo = DB::table('clientes')->where('id',$id)->get();

        $id_ejecutivo = ($request->id_ejecutivo == "") ? $id_ejecutivo[0]->id_ejecutivo : $request->id_ejecutivo;


        $cont = 20;

        for($i=0; $i<count($request->nombre_con); $i++){

            

            

            DB::table('contactos')
                ->where('Id_Cliente', $id)
                ->where('id',$request->id[$i])
                ->update([

                    "nombre_con" => $request->nombre_con[$i],
                    "cargo"  => $request->cargo[$i],
                    "departamento" => $request->departamento[$i],
                    "genero_con" => 0,
                    "fecha_nacimiento_con" => $request->fecha_nacimiento_con[$i],
                    "telefono1" => $request->telefono1[$i],
                    "ext1" => $request->ext1[$i],
                    "telefono2" => $request->telefono2[$i],
                    "ext2" => $request->ext2[$i],
                    "celular1" => $request->celular1[$i],
                    "celular2" => $request->celular2[$i],
                    "correo1" => $request->correo1[$i],
                    "correo2" => $request->correo2[$i],
                    "pagina_web" => $request->pagina_web[$i],
                    "apellido_paterno_con" =>$request->ap_p[$i],
                    "apellido_materno_con" =>$request->ap_m[$i],
                    "principal" => $request->contacto_principal[$i]
            ]);
        }



        if($request->medio_contacto!= null && $request->medio_contacto!= ""&&$request->medio_contacto!= " " ){
            $response =   DB::table('clientes')
            ->where('id', $id)
            ->update(['medio_contacto'=> $request->medio_contacto]);
        }

            $cli = DB::select("SELECT tipo FROM clientes where id = $id");

            if($cli[0]->tipo != $request->TipoDeCliente){
                $response =   DB::table('clientes')

                ->where('id', $id)

                ->update([
                    "actualizacion"=> date('y-m-d')
                ]);
            }
            $response =   DB::table('clientes')

            ->where('id', $id)

            ->update([

                'tipo'=>$request->TipoDeCliente,

                'nombre_comercial' => $request->nombre_comercial,

                'id_cn' => $request->id_cn,

                'forma_juridica'   =>  $request->forma_juridica,

                'razon_social'=> $request->razon_social,

                'fecha_constitucion'=> $request->fecha_constitucion,

                'nombre'=> $request->nombre,

                'apellido_paterno'=> $request->apellido_paterno,

                'apellido_materno'=> $request->apellido_materno,

                'genero'=> $request->genero,

                'fecha_nacimiento_pros'=> $request->fecha_nacimiento_pros,

                'lugar_nacimiento'=> $request->lugar_nacimiento,

                'clase_pm'=> $request->clase_pm,

                'rfc'=> $request->rfc,

                'curp'=> $request->curp,

                'registro_patronal'=> $request->registro_patronal,

                'registro_p'=> $request->registro_p,

                'actividad_economica'=> $request->actividad_economica,

                'status'=> $request->status,

                'df_cp'=> $request->df_cp,

                'df_estado'=> $request->df_estado,

                'df_municipio'=> $request->df_municipio,

                'df_ciudad'=> $request->df_ciudad,

                'df_colonia'=> $request->df_colonia,

                'df_calle'=> $request->df_calle,

                'df_num_exterior'=> $request->df_num_exterior,

                'df_num_interior'=> $request->df_num_interior,

                'dc_cp'=> $request->dc_cp,

                'dc_estado'=> $request->dc_estado,

                'dc_municipio'=> $request->dc_municipio,

                'dc_ciudad'=> $request->dc_ciudad,

                'dc_colonia'=> $request->dc_colonia,

                'dc_calle'=> $request->dc_calle,

                'dc_num_exterior'=> $request->dc_num_exterior,

                'dc_num_interior'=> $request->dc_num_interior,

                'tipo_cliente'=> $request->tipo_cliente,

                'comentario'=> $request->comentario,

                'db_forma_pago'=> $request->db_forma_pago,

                'db_banco'=> $request->db_banco,

                'db_dias_credito'=> $request->db_dias_credito,

                'db_limite_credito'=> $request->db_limite_credito,

                'db_cta_clientes'=> $request->db_cta_clientes,

                'db_clabe'=> $request->db_clabe,

                'db_iva'=> $request->db_iva,

                'id_ejecutivo' => $id_ejecutivo,

                'bLogo'=>$base64,

                'contrato_a'=>$request->contrato_a,




            ]);



        $peticion =  'catalogo/clientes';

        $clientes=DB::table('centros_negocio')->get();

        $clientes_select=[''=>'Seleccione un CN...'];

        foreach ($clientes as  $cliente) {

            $clientes_select[$cliente->id]="(".$cliente->nomenclatura.")"."  ".$cliente->nombre;

        }



        return redirect()

                    ->route('sig-erp-crm::clientes.index')

                    ->with(['success' =>  'el registro se actualizó con éxitoooo',

                            'type'    => 'success'

                        ]);



        // ->with(['success' => ' el registro se inserto con éxito',

        //         'label'   => 'Servicio ESE: ',

        //         'type'    => 'success']);



        // return view('catalogo.clientes.crm-clientes',['peticion' => $peticion,'cn'=>$clientes_select]);

    }

    



    public function showPDF(Request $request){

        $id= $request->id;



        $img=DB::select('select * from clientes where id='.$id);



        foreach($img as $p){

            $archivoimg=$p->bLogo;

        }



        $imagen = $archivoimg;



        return response()->json(['img'=>$imagen]);

    }





    public function update2(Request $request, $id)

    {





        $query=DB::select("Select mc.IdCliente,mc.IdEmpresa,u.id,c.id as IdContacto from master_clientes as mc

        LEFT JOIN users u on u.IdCliente= mc.IdCliente

        LEFT JOIN master_empresa em on em.IdEmpresa= mc.IdEmpresa

        LEFT JOIN contactos c on c.id_cliente= mc.IdCliente

        Where mc.IdCliente = $id limit 1");



        $IdCliente = '';

        $IdEmpresa = '';

        $IdUsuario = '';

        $IdContacto = '';



        /*========ID PERSONAL========*/

        // $Cliente=DB::select($query,[$id]);



        foreach ($query as $DC){

            $IdCliente = $DC->IdCliente;

            $IdEmpresa = $DC->IdEmpresa;

            $IdUsuario = $DC->id;

            $IdContacto = $DC->IdContacto;

        }



        // $da=$request->input('colonia');

        // dd($da);



        if($IdUsuario==''){

          // echo "cliente $IdCliente empresa $IdEmpresa";

          $usuario       = new User();

          $passwd=$request->input('password');

          $usuario->idcn              = 22;

          $usuario->name              = trim($request->input('nombre_comercial'));



          $usuario->nick_name         = trim($request->input('nombre_comercial'));

          $usuario->name              = trim($request->input('nombre_comercial'));

          $usuario->username          = trim($request->input('username'));



          $usuario->email             = trim($request->input('email'));

          $usuario->password          = bcrypt($passwd);

          $contr='SELECT AES_ENCRYPT(:password_mobile, "DSAI2020") as pw';

              $datos=DB::select($contr,[$passwd]);

              $contras="";

              foreach ($datos as  $dato) {

                  $contras = $dato->pw;

              }



          $usuario->password_mobile   = $contras;

          $usuario->password_aux      = $passwd;

          $usuario->telefono_oficina  = trim($request->input('telefono_oficina'));



          $usuario->tipo              = 'c';

          $usuario->IdCliente         = $IdCliente;

          $usuario->save();



          $query=DB::select("Select mc.IdCliente,mc.IdEmpresa,u.id,c.id as IdContacto from master_clientes as mc

          LEFT JOIN users u on u.IdCliente= mc.IdCliente

          LEFT JOIN master_empresa em on em.IdEmpresa= mc.IdEmpresa

          LEFT JOIN contactos c on c.id_cliente= mc.IdCliente

          Where u.IdCliente = $id limit 1");



          foreach ($query as $DC){

              $IdCliente = $DC->IdCliente;

              $IdEmpresa = $DC->IdEmpresa;

              $IdUsuario = $DC->id;

              $IdContacto = $DC->IdContacto;

          }

        }



        $usuario = User::find($IdUsuario);

        $empresa = Facturadora::find($IdEmpresa);

        $cliente = Cliente::find($IdCliente);

        $contacto = Contacto::find($IdContacto);



            if($cliente){



            $status = $request->input('status');





            if ($status = "Activo") {

                $Activo='Si';

            } else {

            $Activo='No';

            }

            $passwd=$request->input('password');



            if($usuario){

                $usuario->idcn              = 22;

                $usuario->name              = trim($request->input('nombre_comercial'));

                // $usuario->name              = trim($request->input('nombre_con'));

                // $usuario->apellido_paterno  = trim($request->input('apellido_paterno_con'));

                // $usuario->apellido_materno  = trim($request->input('apellido_materno_con'));

                // $usuario->nick_name         = trim($request->input('nombre_con').'.'.$request->input('apellido_paterno_con').'.'.$request->input('apellido_materno_con'));

                $usuario->nick_name              = trim($request->input('nombre_comercial'));

                $usuario->username          = trim($request->input('username'));

                // $usuario->Genero            = trim($request->input('genero_con'));

                // $usuario->FechaNacimiento   = trim($request->input('fecha_nacimiento_con'));

                $usuario->email             = trim($request->input('email'));

                $usuario->password          = bcrypt($passwd);

                $contr='SELECT AES_ENCRYPT(:password_mobile, "DSAI2020") as pw';

                    $datos=DB::select($contr,[$passwd]);

                    $contras="";

                    foreach ($datos as  $dato) {

                        $contras = $dato->pw;

                    }



                $usuario->password_mobile   = $contras;

                $usuario->password_aux      = $passwd;

                $usuario->telefono_oficina  = trim($request->input('telefono_oficina'));

                // $usuario->ext               = trim($request->input('ext1'));

                // $usuario->telefono_movil    = trim($request->input('celular1'));

                $usuario->tipo              = 'c';

                $usuario->save();

            }



            // $Factur        = Facturadora::all();

            // $ultimoAgregadoF  = $Factur->last();

            // $FolioF = $ultimoAgregadoF->Codigo + 1;



            // $empresa       = new Facturadora();

            // $empresa->Codigo              = str_pad($FolioF, 3, "0", STR_PAD_LEFT);

            if($empresa){

                $empresa->FK_Titulo           = $request->input('nombre_comercial');

                $empresa->FormaJuridica       = $request->input('forma_juridica');

                $empresa->RazonSocial         = $request->input('razon_social');

                $empresa->Rfc                 = $request->input('rfc');

                $empresa->clase_rt            = $request->input('registro_patronal');

                $empresa->pf_nombre           = $request->input('nombre');

                $empresa->pf_apellido_paterno = $request->input('apellido_paterno');

                $empresa->pf_apellido_materno = $request->input('apellido_materno');

                $empresa->pf_genero           = $request->input('genero');

                $empresa->pf_fecha_nacimiento = $request->input('fecha_nacimiento_pros');

                $empresa->fecha_constitucion  = $request->input('fecha_constitucion');

                $empresa->pf_lugar_nacimiento = $request->input('lugar_nacimiento');

                $empresa->clase_pm            = $request->input('clase_pm');

                $empresa->IdActividadEconomica= $request->input('actividad_economica');

                $empresa->RegPatronal         = $request->input('registro_p');

                $empresa->Rfc                 = $request->input('rfc');

                $empresa->pf_CURP             = $request->input('curp');

                $empresa->Calle               = $request->input('df_calle');

                $empresa->NoInt               = $request->input('df_num_interior');

                $empresa->NoExt               = $request->input('df_num_exterior');

                $empresa->Colonia             = $request->input('colonia');

                $empresa->CP                  = $request->input('cp');

                $IdPais                       = $request->input('IdPais');



                if($IdPais){

                    $empresa->IdPais              = $request->input('IdPais');

                    $empresa->IdEstado            = $request->input('IdEstado');

                    $empresa->Localidad           = $request->input('municipio');

                }

                // $empresa->IdPais              = $request->input('IdPais');

                // $empresa->IdEstado            = $request->input('IdEstado');

                // $empresa->Localidad           = $request->input('Localidad');

                // $empresa->municipio           = $request->input('municipio');



                $empresa->Calle_dc               = $request->input('Calle_dc');

                $empresa->NoInt_dc               = $request->input('NoInt_dc');

                $empresa->NoExt_dc               = $request->input('NoExt_dc');

                $empresa->Colonia_dc             = $request->input('colonia_dc');

                $empresa->CP_dc                  = $request->input('cp_dc');

                $IdPais                       = $request->input('IdPais_dc');



                if($IdPais){

                    $empresa->IdPais_dc              = $request->input('IdPais_dc');

                    $empresa->IdEstado_dc            = $request->input('IdEstado_dc');

                    $empresa->Municipio_dc           = $request->input('Municipio_dc');

                }

                // $empresa->IdPais_dc              = $request->input('IdPais_dc');

                // $empresa->IdEstado_dc            = $request->input('IdEstado_dc');

                // $empresa->Municipio_dc           = $request->input('Municipio_dc');

                $empresa->fecha_constitucion     = $request->input('fecha_constitucion');

                $empresa->Activo                 = $Activo;

                $empresa->save();

                $Id_Empresa = $empresa->IdEmpresa;

            }

            // $client=Cliente::all();

            // $ultimoAgregado  = $client->last();

            // $Folio = $ultimoAgregado->Codigo;

            // $result = intval(preg_replace('/[^0-9]+/', '', $Folio), 10);



            // $cliente->Codigo              = 'CLIE'.'-'.str_pad($result+1, 4, "0", STR_PAD_LEFT);



            $cliente->Nombre              = $request->input('nombre_comercial');

            $cliente->Empresa             = $request->input('nombre_comercial');

            $cliente->Calle               = $request->input('df_calle');

            $cliente->No_int              = $request->input('df_num_interior');

            $cliente->No_ext              = $request->input('df_num_exterior');

            $cliente->Colonia             = $request->input('colonia');

            $cliente->CodigoPostal        = $request->input('cp');

            $cliente->IdCodigoPostal      = $request->input('IdCodigoPostal');

            $cliente->IdEstado            = $request->input('IdEstadoF');

            $cliente->medio_contacto      = $request->input('medio_contactoc');

            $cliente->tipo_cliente        = $request->input('tipo_cliente');

            $cliente->comentario          = $request->input('comentario');

            $cliente->contrato_a          = $request->input('contrato_a');

            $cliente->id_ejecutivo        = $request->input('id_ejecutivo');

            $cliente->db_forma_pago       = $request->input('db_forma_pagoc');

            $cliente->db_banco            = $request->input('db_banco');

            $cliente->db_clabe            = $request->input('db_clabe');

            $cliente->db_dias_credito     = $request->input('db_dias_credito');

            $cliente->db_limite_credito   = $request->input('db_limite_credito');

            $cliente->db_cta_clientes     = $request->input('db_cta_clientes');

            $cliente->db_iva              = $request->input('db_iva');

            $cliente->TipoCliente          = $request->input('tipo');

            $cliente->Activo              = $Activo;

            if($empresa){

                $cliente->IdEmpresa           = $Id_Empresa;

            }

            $cliente->save();



            // $cliente->id_cn         = $request->user()->idcn;

            $id_cliente             = $cliente->IdCliente;

            $usuario->IdCliente     = $id_cliente;

            $usuario->save();



            $contactos              = count($request->input('nombre_con'));

            $id_contacto            = $request->input('id');

            $nombre_con             = $request->input('nombre_con');

            $cargo                  = $request->input('cargo');

            $departamento           = $request->input('departamento');

            $generon_con            = $request->input('genero_con');

            $fecha_nacimiento_con   = $request->input('fecha_nacimiento_con');

            $telefono1              = $request->input('telefono1');

            $telefono2              = $request->input('telefono2');

            $ext1                   = $request->input('ext1');

            $ext2                   = $request->input('ext2');

            $celular1               = $request->input('celular1');

            $celular2               = $request->input('celular2');

            $correo1                = $request->input('correo1');

            $correo2                = $request->input('correo2');

            $pagina_web             = $request->input('pagina_web');

            $contacto_principal     = $request->input('contacto_principal');

            $apellido_materno_con   = $request->input('apellido_materno_con');

            $apellido_paterno_con   = $request->input('apellido_paterno_con');

            $id_contact             = null;





            $arreglo = [];

            for($i=0; $i < $contactos; $i++){



                $id_cliente     = null;



                if(isset($id_contacto[$i])){



                    $contacto_nuevo = Contacto::find($id_contacto[$i]);



                    $contacto_nuevo->nombre_con             = trim($nombre_con[$i]);

                    $contacto_nuevo->cargo                  = trim($cargo[$i]);

                    $contacto_nuevo->departamento           = trim($departamento[$i]);

                    $contacto_nuevo->genero_con             = trim($generon_con[$i]);

                    $contacto_nuevo->fecha_nacimiento_con   = trim($fecha_nacimiento_con[$i]);

                    $contacto_nuevo->telefono1              = trim($telefono1[$i]);

                    $contacto_nuevo->telefono2              = trim($telefono2[$i]);

                    $contacto_nuevo->ext1                   = trim($ext1[$i]);

                    $contacto_nuevo->ext2                   = trim($ext2[$i]);

                    $contacto_nuevo->celular1               = trim($celular1[$i]);

                    $contacto_nuevo->celular2               = trim($celular2[$i]);

                    $contacto_nuevo->correo1                = trim($correo1[$i]);

                    $contacto_nuevo->correo2                = trim($correo2[$i]);

                    $contacto_nuevo->pagina_web             = trim($pagina_web[$i]);

                    $contacto_nuevo->principal              = $contacto_principal[$i];

                    $contacto_nuevo->apellido_materno_con   = $apellido_materno_con[$i];

                    $contacto_nuevo->apellido_paterno_con   = $apellido_paterno_con[$i];



                    $contacto_nuevo->save();

                }else{

                     $contacto_nuevo = Contacto::create([

                                                'id_cliente'           => trim($id),

                                                'nombre_con'           => trim($nombre_con[$i]),

                                                'cargo'                => trim($cargo[$i]),

                                                'departamento'         => trim($departamento[$i]),

                                                'genero_con'           => trim($generon_con[$i]),

                                                'fecha_nacimiento_con' => trim($fecha_nacimiento_con[$i]),

                                                'telefono1'            => trim($telefono1[$i]),

                                                'telefono2'            => trim($telefono2[$i]),

                                                'ext1'                 => trim($ext1[$i]),

                                                'ext2'                 => trim($ext2[$i]),

                                                'celular1'             => trim($celular1[$i]),

                                                'celular2'             => trim($celular2[$i]),

                                                'correo1'              => trim($correo1[$i]),

                                                'correo2'              => trim($correo2[$i]),

                                                'pagina_web'           => trim($pagina_web[$i]),

                                                'principal'            => $contacto_principal[$i],

                                                'apellido_materno_con' => $apellido_materno_con[$i],

                                                'apellido_paterno_con' => $apellido_paterno_con[$i]

                                                ]);

                }



                if($contacto_principal[$i] == 1){

                    $id_contact = $contacto_nuevo->id;

                }

            }



        }

        return redirect()

        ->route('sig-erp-crm::clientes.index')

        ->with(['success' => ' el registro se inserto con éxito',

                'label'   => 'Servicio ESE: ',

                'type'    => 'success']);



    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request, $id)

    {

        if ($request->ajax())

        {

            $cotizacion_servicio=DB::table('crm_cotizaciones')->where('id_cliente', '=', $id)->get();

            $cont=count($cotizacion_servicio);





            for($i=0;$i< $cont;$i++){



            if($cotizacion_servicio[$i]->id_servicio==0){//elimina detalle de cotizador de ESE

                  DB::table('crm_cotizaciones_ese')->where('id_cotizacion', '=', $cotizacion_servicio[$i]->id)->delete();





            }

             if($cotizacion_servicio[$i]->id_servicio==1){//elimina detalle de cotizador de RYS

                  DB::table('crm_cotizaciones_rys')->where('id_cotizacion', '=', $cotizacion_servicio[$i]->id)->delete();



            }

            if($cotizacion_servicio[$i]->id_servicio==2){//elimina detalle de cotizador de MAQUILA

                  DB::table('crm_cotizaciones_maquila')->where('id_cotizacion', '=', $cotizacion_servicio[$i]->id)->delete();



            }

            if($cotizacion_servicio[$i]->id_servicio==3){//elimina detalle de cotizador de PSICOMETRICOS

                  DB::table('crm_cotizaciones_psicometrico')->where('id_cotizacion', '=', $cotizacion_servicio[$i]->id)->delete();



            }



         $elimina_cotizacion =DB::table('crm_cotizaciones')->where('id_cliente', '=',$cotizacion_servicio[$i]->id_cliente)->delete();



           }



            $cliente = Cliente::find($id);

            $IdEmpresa=$cliente->IdEmpresa;

            if ($cliente){

                DB::table('contactos')->where('id_cliente', '=', $id)->delete();

                DB::table('users')->where('IdCliente', '=', $id)->delete();





                $modulo         = Modulo::where('slug','crm')->get();

                $submodulo      = SubModulo::where('slug','crm.clientes')->get();

                $accion_kardex  = Accion::where('slug','baja')->get();



                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,

                                            "id_usuario"    => $request->user()->id,

                                            "id_modulo"     => $modulo[0]->id,

                                            "id_submodulo"  => $submodulo[0]->id,

                                            "id_accion"     => $accion_kardex[0]->id,

                                            "id_objeto"     => $cliente->id,

                                            "descripcion"   => "Eliminación de un Cliente/Prospecto: " . $cliente->nombre_comercial]);

                $cliente->delete();

                DB::table('master_empresa')->where('IdEmpresa', '=', $IdEmpresa)->delete();

                return response()->json(['success'=>$cliente->id]);

            }

            else{

                return response()->json(['success'=> $cliente->id]);

            }





        }



    }

    public function eliminar($id){

        DB::table('clientes')->where('id', '=', $id)->delete();



        $peticion ='catalogo/clientes';

        $clientes=DB::table('centros_negocio')->get();

        $clientes_select=[''=>'Seleccione un CN...'];

        foreach ($clientes as  $cliente) {

            $clientes_select[$cliente->id]="(".$cliente->nomenclatura.")"."  ".$cliente->nombre;

        }





        return view('catalogo.clientes.crm-clientes',[ 'peticion' => $peticion,'cn'=>$clientes_select]);



    }

    public function listaClientes(Request $request)

    {
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            
            $id_cn = $request->user()->idcn;
            
        }

        $clientes="";

       

        $id_user = $request->user()->id;

        $llamada = $request->llamada;

        if($llamada == 0){

            $query ="

            SELECT clientes.tipo,CASE clientes.tipo WHEN 1 THEN 'Prospecto' WHEN 2 THEN 'Cliente' END as clasificacion,

IFNULL(clientes.id,'') AS id, IFNULL(clientes.nombre_comercial,'') AS nombre_cliente,IFNULL(tipos_clientes.nombre,'')

 AS tipo_cliente,IFNULL(centros_negocio.nombre,'') AS nombre_cn,IFNULL(users.name,'') AS nombre_ejecutivo,

 IFNULL(contactos.nombre_con,'') AS nombre_contacto,IFNULL(contactos.apellido_paterno_con,'') AS apellido_paterno,

 IFNULL(contactos.apellido_materno_con,'') AS apellido_materno,IFNULL(contactos.correo1,'') AS correo1,

 IFNULL(contactos.telefono1,'') AS telefono1,IFNULL(contactos.celular1,'') AS celular1,

 IFNULL(clientes.status,'') AS STATUS FROM clientes INNER JOIN cliente_cn_actual ON 

 cliente_cn_actual.id_cliente = clientes.id 

 LEFT JOIN users ON users.idcn = clientes.id_cn  AND users.id = clientes.id_user

 

 LEFT JOIN   centros_negocio ON cliente_cn_actual.id_cn = centros_negocio.id 

 LEFT JOIN contactos ON contactos.id_cliente = clientes.id

 LEFT JOIN   tipos_clientes ON tipos_clientes.id  = clientes.tipo_cliente


where -1 = $id_cn OR (-1<>$id_cn AND $id_cn = clientes.id_cn)
            

            ";



        }else{

            $query =  " SELECT ".

                " master_clientes.tipo, ".

                " master_clientes.TipoCliente, ".

                " CASE master_clientes.tipo WHEN 1 THEN 'Prospecto' WHEN 2 THEN 'Cliente' END as clasificacion, ".

                " IFNULL(master_clientes.IdCliente,'') AS id, ".

                " IFNULL(master_clientes.Nombre,'') AS nombre_cliente, ".

                " IFNULL(tipos_clientes.nombre,'') AS tipo_cliente, ".

                " IFNULL(centros_negocio.nombre,'') AS nombre_cn,  ".

                // " IFNULL(users.name,'') AS nombre_ejecutivo,".".



                " IFNULL(contactos.nombre_con,'') AS nombre_contacto, ".

                " IFNULL(contactos.apellido_paterno_con,'') AS apellido_paterno, ".

                " IFNULL(contactos.apellido_materno_con,'') AS apellido_materno, ".

                " IFNULL(contactos.correo1,'') AS correo1, ".

                " IFNULL(contactos.telefono1,'') AS telefono1, ".

                " IFNULL(contactos.celular1,'') AS celular1, ".

                " IFNULL(master_clientes.Activo,'') AS status ".

                " FROM        master_clientes ".

                " INNER JOIN cliente_cn_actual ON cliente_cn_actual.id_cliente = master_clientes.IdCliente ".

                // " LEFT JOIN users       ON users.idcn = clientes.id_cn ".

                // "                      AND users.id     = clientes.id_user".

                " LEFT JOIN   centros_negocio ".

                "ON cliente_cn_actual.id_cn      = centros_negocio.id  ".

                " LEFT JOIN contactos ON contactos.id_cliente = clientes.id ".

                " LEFT JOIN   tipos_clientes ".

                " ON tipos_clientes.id  = master_clientes.tipo_cliente ";



        }



                                            // " WHERE master_clientes.Activo = 'Si' ";

            // $query =    " SELECT ".

            //             " clientes.tipo,".

            //             " CASE clientes.tipo WHEN 1 THEN 'Prospecto' WHEN 2 THEN 'Cliente' END as clasificacion,".

            //             " IFNULL(clientes.id,'') AS id,".

            //             " IFNULL(clientes.nombre_comercial,'') AS nombre_cliente,".

            //             " IFNULL(tipos_clientes.nombre,'') AS tipo_cliente,".

            //             " IFNULL(centros_negocio.nombre,'') AS nombre_cn,".

            //             //" IFNULL(users.name,'') AS nombre_ejecutivo,".



        //             " IFNULL(contactos.nombre_con,'') AS nombre_contacto,".

        //             " IFNULL(contactos.apellido_paterno_con,'') AS apellido_paterno,".

        //             " IFNULL(contactos.apellido_materno_con,'') AS apellido_materno,".

        //             " IFNULL(contactos.correo1,'') AS correo1,".

        //             " IFNULL(contactos.telefono1,'') AS telefono1,".

        //             " IFNULL(contactos.celular1,'') AS celular1,".

        //             " IFNULL(clientes.status,'') AS status".

        //             " FROM        clientes".

        //             " INNER JOIN cliente_cn_actual ON cliente_cn_actual.id_cliente = clientes.id ".

        //             //" LEFT JOIN users       ON users.idcn = clientes.id_cn ".

        //             //"                      AND users.id     = clientes.id_user".

        //             " LEFT JOIN   centros_negocio ".

        //                             "ON cliente_cn_actual.id_cn      = centros_negocio.id  ".

        //             " LEFT JOIN contactos ON contactos.id = clientes.id_contacto_principal ".

        //             " LEFT JOIN   tipos_clientes ".

        //                             " ON tipos_clientes.id  = clientes.tipo_cliente ";



        // if($request->user()->is('admin')){

        //     $query .= " WHERE 1=1 ";

        // }else{

        //     $query .= " WHERE centros_negocio.id   = $id_cn ";

        // }

        if($llamada == 0 ){



            if($request->status == "Si" ){
                $query .= " AND status = '1' ";

                if($request->tipo == "cli"){
                    $query .= "AND clientes.tipo = 2 ";
                }else if($request->tipo == "pros"){
                    $query .= "AND clientes.tipo = 1 ";
                }else{
                    $query .=" ";
                }

            }else if($request->status == "No"){
                // $query .= " AND clientes.status = $request->status ";
                $query .= " AND status = '2' ";
                if($request->tipo == "cli"){
                    $query .= "AND clientes.tipo = 2 ";
                }else if($request->tipo == "pros"){
                    $query .= "AND clientes.tipo = 1 ";
                }else{
                    $query .=" ";
                }
            }else if($request->status == "sus"){
                $query .= " AND status = '3' ";
                if($request->tipo == "cli"){
                    $query .= "AND clientes.tipo = 2 ";
                }else if($request->tipo == "pros"){
                    $query .= "AND clientes.tipo = 1 ";
                }else{
                    $query .=" ";
                }
            }else if ($request->status == "todos"){
                $query .=" ";
                if($request->tipo == "cli"){
                    $query .= "AND clientes.tipo = 2 ";
                }else if($request->tipo == "pros"){
                    $query .= "AND clientes.tipo = 1 ";
                }else{
                    $query .=" ";
                }
            }






        }else{

            if($request->status == "Si"){

                $query .= " WHERE master_clientes.Activo = 'Si' ";

            }else if($request->status == "No"){

                // $query .= " AND clientes.status = $request->status ";

                $query .= " WHERE master_clientes.Activo = 'No' ";

            }



        }

        if ($llamada==0){



            $query.="group by clientes.id order by clientes.id asc 

             ";

        }else{



            $query .= " group by master_clientes.IdCliente order by master_clientes.IdCliente asc  ";

        }



       // dd($query);

        $clientes = DB::select($query);





        return response()->json($clientes);



    }

     public function ValidacionClientes(Request $request)

    {

      $datos=$request->input('datos');

      $res='';

    //   $dat = DB::select("select * from codigospostales where FK_CodigoPostal = $datos limit 1");

        $dat = DB::select("Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,

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

        Where cp.CodigoPostal = $datos

        ORDER BY CodigoPostal Asc limit 1");

        foreach ($dat as $c) {

            // $rc = explode(";",$c->Colonia);

            $rc=$c->Colonia;

          }

     foreach ($dat as $g) {

       $res = $g->Colonia.'|'.$g->Municipio.'|'.$g->estado.'|'.$g->IdEstado.'|'.$g->IdPais.'|'.$g->IdCodigoPostal;

    // $res = $g->Municipio.'|'.$g->estado.'|'.$g->IdEstado.'|'.$g->IdPais.'|'.$g->IdCodigoPostal;

     }



// var_dump($res);

return array($res, $rc);

    //   return $res;

    }





    public function ValidacionUsuarios(Request $request)

   {

     $datos=$request->input('datos');

     $res='';

     $dat = DB::select("select count(*) as cont from users where username = '{$datos}'");



    foreach ($dat as $g) {

      $res = $g->cont;

    }



     return $res;

   }



   public function ValidacionEmails(Request $request)

   {

     $datos=$request->input('datos');

     $res='';

     $dat = DB::select("select count(*) as cont from users where email = '{$datos}'");



    foreach ($dat as $g) {

      $res = $g->cont;

    }



     return $res;

   }



    public function getCURP(Request $request){

        $curp = new Curp();

        $curp->apellido_paterno = utf8_decode($request->apellido_paterno);

        $curp->apellido_materno = utf8_decode($request->apellido_materno);

        $curp->nombres          = utf8_decode($request->nombre);

        $curp->fecha_nacimiento = utf8_decode($request->fec_nacimiento);

        $curp->genero           = utf8_decode($request->genero);

        $curp->lugar_nacimiento = utf8_decode($request->lugar_nacimiento);

        $strcurp = $curp->getCurp();





        return response()->json($strcurp);

    }





    public function getRFC(Request $request){

        $curp = new Rfc();

        $curp->apellido_paterno = $request->apellido_paterno;

        $curp->apellido_materno = $request->apellido_materno;

        $curp->nombres          = $request->nombre;

        $curp->fecha_nacimiento = $request->fec_nacimiento;

        $strcurp = $curp->getRfc();



        return response()->json($strcurp);

    }



    public function saveContactos(Request $request){



       /* $contacto = Contacto::create(['id_cliente' => 4,'nombre_con' =>'Rafael']);



        return response()->json($contacto->id);*/



        $ruta = public_path().'\anexos-accionXcliente\221_UnionInformatica';

        if(file_exists($ruta)){

            echo 'Ya existe la carpeta solo muevo el archivo';

        }else{

            $dir = mkdir($ruta);

            echo 'No existe la carpeta la creo y muevo el archivo';

        }







    }



    private function validarCampos(Request $request){

        $getTipo            = $request->tipo;

        $campos_validacion  = DB::table('campos_validacion')->where('tipo_cliente', '=', 1)->get();

        $list_campos        = [];

        $guardar_registro   = true;

        $campos_contacto    = count($request->input('telefono1'));





        //Genera un arreglo para validar los campos de acuerdo al tipo de cliente (cliente/prospecto)

        foreach ($campos_validacion as $key) {

            $list_campos[]=$key->nombre_campo;

        }



        $cantidad_campos = count($list_campos);

        $result_list_campos = [];







        for($i=0;$i<$cantidad_campos;$i++){



            if($request->$list_campos[$i]==''){

                if($guardar_registro) $guardar_registro = false;



                $result_list_campos[] = $list_campos[$i];

            }



            /************************************************************************

                                    ITERA LOS CAMPOS DE CONTACTO

            ************************************************************************/

            if(is_array($request->$list_campos[$i])){

                $lista_campos_contacto = $request->$list_campos[$i];

                for($x = 0; $x < $campos_contacto; $x++){

                    if($lista_campos_contacto[$x]==''){

                        if($guardar_registro) $guardar_registro = false;

                        $result_list_campos[] = $list_campos[$i];

                    }

                }

            }

        }





        return ['resultado' => $guardar_registro, 'lista_campos' => $result_list_campos];

    }



 /*********************************************************************************************************

                             SE MANDA LLAMAR DESDE EL LISTADO DE COTIZACIONES

    *********************************************************************************************************/

     public function validarCamposCliente(Request $request){

        $id_cliente         = $request->id_cliente;

        $campos_cliente     = $this->getCamposCliente($request->user(),$id_cliente);

        $campos_contacto    = $this->getCamposContacto($request->user(),$id_cliente);







        $campos_validacion  = DB::table('campos_validacion')->where('tipo_cliente', '=', 2)->get();

        $list_campos        = [];

        $guardar_registro   = true;

        $list_campos_definidos = [];

        foreach ($campos_validacion as $key) {

            $list_campos[]=$key->nombre_campo;
            $list_campos_definidos[] = $key->nombre;
        }



        $cantidad_campos = count($list_campos);

        $result_list_campos = [];







        for($i=0;$i<$cantidad_campos;$i++){



            $tiene_propiedad = property_exists($campos_cliente, $list_campos[$i]);

            if($tiene_propiedad){


                $valores = $list_campos[$i];

                if($campos_cliente->$valores==''){

                    if($guardar_registro) $guardar_registro = false;
                    $result_list_campos[] = $list_campos_definidos[$i];

                }

            }

        }





        return ['resultado' => $guardar_registro, 'lista_campos' => $result_list_campos];

    }





    private function getCamposCliente($usuario,$id_cliente){

        $query              = 'SELECT clientes.* '.

                              'FROM clientes '.

                              'LEFT JOIN contactos ON clientes.id = contactos.id_cliente '.

                              'WHERE clientes.id = ? ';

        $campos_cliente     = DB::select($query,[$id_cliente]);



        /*

            $query              = 'SELECT clientes.* '.

                              'FROM clientes '.

                              'LEFT JOIN contactos ON clientes.id = contactos.id_cliente '.

                              'WHERE clientes.id = ? AND clientes.id_cn = ? AND clientes.id_user = ?';

        $campos_cliente     = DB::select($query,[$id_cliente,$usuario->idcn,$usuario->id]);



        */





        return $campos_cliente[0];

    }



    private function getCamposContacto($usuario,$id_cliente){

        $query              = 'SELECT contactos.* '.

                              'FROM clientes '.

                              'LEFT JOIN contactos ON clientes.id = contactos.id_cliente '.

                              'WHERE clientes.id = ?';

        $campos_contacto    = DB::select($query,[$id_cliente]);



        /*

            $query              = 'SELECT contactos.* '.

                              'FROM clientes '.

                              'LEFT JOIN contactos ON clientes.id = contactos.id_cliente '.

                              'WHERE clientes.id = ? AND clientes.id_cn = ? AND clientes.id_user = ?';

        $campos_contacto    = DB::select($query,[$id_cliente,$usuario->idcn,$usuario->id]);



        */

        return $campos_contacto[0];

    }



    public function cambiarCn(Request $request){

        try {



            $centro_negocio = CentroNegocio::find($request->id_cn);

            //$cliente_validacion =ClienteCN::where('id_cliente',$request->id_cliente);

            $cliente_validacion = DB::table('cliente_cn_actual')->where('id_cliente', '=',$request->id_cliente )->get();

            //dd($cliente_validacion);

            if(count($cliente_validacion) > 0){

                if($cliente_validacion[0]->id_cn==$request->id_cn)

                    return response()->json(['error'=>'wrong']);

            }else{

                DB::table('cliente_cn_actual')->insert([

                    'id_cn' => $request->id_cn,

                    'id_cliente' => $request->id_cliente

                ]);

            }    

    

            if( $centro_negocio ){

                $clienteCn = $this->asignarCN($request->id_cn, $request->id_cliente, $request->user()->id);

                $this->updateCNActual($request->id_cliente, $request->id_cn);

                DB::update("UPDATE clientes c SET c.id_cn = $request->id_cn WHERE c.id = $request->id_cliente");

                DB::update("UPDATE users u SET u.idcn = $request->id_cn WHERE u.IdCliente = $request->id_cliente");

                if($clienteCn){

                    $slug           = ( $request->peticion == 'catalogo/clientes' ) ? 'catalogos' : 'crm';

                    $cn             = CentroNegocio::find($request->id_cn);

                    $modulo         = Modulo::where('slug',$slug)->get();

                    $submodulo      = SubModulo::where('slug', $slug . '.clientes')->get();

                    $accion_kardex  = Accion::where('slug','modificacion')->get();



                    $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,

                                                "id_usuario"    => $request->user()->id,

                                                "id_modulo"     => $modulo[0]->id,

                                                "id_submodulo"  => $submodulo[0]->id,

                                                "id_accion"     => $accion_kardex[0]->id,

                                                "id_objeto"     => $clienteCn->id,

                                                "descripcion"   => "Se cambio el cliente ". $clienteCn->nombre_comercial." al ".$centro_negocio->nomenclatura." - ".$centro_negocio->nombre ]);



    

                     return response()->json(['status_alta' => 'success','cn'=>$cn->nomenclatura." - ".$cn->nombre]);

                }

    

                return response()->json(['status_alta' => 'wrong']);

            }

    

              return response()->json(['status_alta' => 'wrong']);

        } catch (\Exception $e) {

            return response()->json(['status_alta' => 'error','error' => $e->getMessage().' '.$e->getLine()]);

        }



    }





    /**

     * Actualiza el registro de un cliente que ha sido asignado a otro CN

     *

     * @param  int id_cliente,id_cn

     * @return

     */

    private function updateCNActual($id_cliente,$id_cn)

    {

            return DB::table('cliente_cn_actual')

                        ->where('id_cliente', $id_cliente)

                        ->update(['id_cn' => $id_cn]);



    }



    private function setCNActual($id_cliente,$id_cn)

    {

            return DB::table('cliente_cn_actual')

                        ->insert(['id_cliente' => $id_cliente,'id_cn' => $id_cn]);

            // return  DB::insert('insert into cliente_cn_actual (id_cliente, id_cn) values (?, ?)', [$id_cliente, $id_cn]);



    }



    private function asignarCN($id_cn, $id_cliente, $id_user)

    {

        return ClienteCN::create([  'id_cn'      => $id_cn,

                                    'id_cliente' => $id_cliente,

                                    'id_usuario' => $id_user

                                   ]);

    }



    public function validarNombreComercial (Request $request){



   #Cliente::where('nombre_comercial',$request->nombre_comercial)->get();

         $query = 'SELECT * '.

                              'FROM clientes '.

                              'WHERE clientes.nombre_comercial= ?';

        $valida_nombre_comercial =DB::select($query,[$request->nombre_comercial]);



    if($valida_nombre_comercial){



        return response()->json(["status_alta"=>"success","nombre"=>$request->nombre_comercial]);



    }

    return response()->json(["status_alta"=>"wrong"]);











    }



    public function getEjecutive(Request $request){

        $ejecutive = DB::select("SELECT u.id,u.name AS nombre,u.apellido_paterno AS ap_paterno,u.apellido_materno AS ap_materno FROM users u WHERE u.name <> '' AND u.tipo = 's' AND u.idcn = ?", [$request->id_cn]);

        return response()->json($ejecutive);

    }

    public function getCentroNegocio($IdCliente){

        $centroNegocio = DB::select("SELECT

                                        c.nombre_comercial,

                                        CONCAT('(',cn.nomenclatura,') ',cn.nombre) AS cn

                                    FROM clientes c

                                        INNER JOIN centros_negocio cn

                                        ON c.id_cn = cn.id

                                    WHERE c.id=?",[$IdCliente]);

        return response()->json($centroNegocio);

    }



}

