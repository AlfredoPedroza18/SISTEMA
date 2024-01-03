<?php



namespace App\Http\Controllers\ESE;



use Illuminate\Http\Request;



use Response;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Bussines\MasterConsultas;

use App\MasterEseEmpleado;

use App\MasterEseEmpleadosDoc;

use App\Http\Controllers\ESE\Notificaciones;

use App\RegionesxInv;

use App\User;

use DB;

use Session;



class EmpleadosController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index() 

    {

        $Empleados = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

            array(

                "IdEmpleado" => '-1',

                "IdRol" => '-1'

            )

        );





        return view("ESE.catalogos.empleadosindex",["empleados"=>$Empleados,"cntC"=>"Todos"]);

    }



    public function indexPPersonal(Request $request)

    {

        $cod = $request->input('valcnt');

        if($cod=='Analistas'){

             $Empleados = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

                array(

                    "IdEmpleado" => '-1',

                    "IdRol" => 98

                )

            );





            return view("ESE.catalogos.empleadosxanalistas",["empleados"=>$Empleados,"cntC"=>$cod]);

        }



        if($cod=='Investigadores'){

            $Empleados = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

               array(

                   "IdEmpleado" => '-1',

                   "IdRol" => 4

               )

           );





           return view("ESE.catalogos.empleadosxanalistas",["empleados"=>$Empleados,"cntC"=>$cod]);

       }



       if($cod=='Todos'){

            $Empleados = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

                array(

                    "IdEmpleado" => '-1',

                    "IdRol" => '-1'

                )

            );





            return view("ESE.catalogos.empleadosindex",["empleados"=>$Empleados,"cntC"=>$cod]);

        }



    }



    public function indexAnalistas()

    {

        $Empleados = MasterConsultas::exeSQL("catalogo_analistas", "READONLY",

            array(

                "IdEmpleado" => '-1',

                "IdRol" => 98

            )

        );





        return view("ESE.catalogos.empleadosxanalistas",["empleados"=>$Empleados]);

    }

    public function indexPermisos(){

        $roles=DB::select('select u.*,

          (select Perfil from master_perfiles where IdPerfil = u.IdPerfil ) as Perfil

          from users as u ');

        return view("administrador.ESE.index",["roles"=>$roles]);





    }



    public function indexInvestigadores()

    {

        /*$Empleados = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",
            array(
                "IdEmpleado" => '-1',
                "IdRol" => 4
          )
        );*/

        $Empleados = DB::select("select 
                                me.*,
                                concat( me.Nombre,' ',ifnull(me.SegundoNombre,''),' ',me.ApellidoPaterno,' ',ifnull( me.ApellidoMaterno,'') ) as NombreCompleto,
                                telefonomovil as TelefonoMovil,
                                es.FK_nombre_estado as nombre_estado
                                from master_ese_empleado as me left join
                                cfdi_codigopostal as cp
                                on (cp.IdCodigoPostal = me.IdCodigoPostal)
                                left join   
                                estados as es 
                                on(es.IdEstado = me.IdEstado)
                                left join
                                users as u on (u.IdEmpleado =me.IdEmpleado) ;
        ");
        
        foreach($Empleados as $Empleado){
            $NombreCompleto=$Empleado->NombreCompleto;
        }




        return view("ESE.catalogos.empleadosxinvestigadores",["empleados"=>$Empleados]);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(Request $request)

    {

        $url_referee = explode("/",$_SERVER['HTTP_REFERER']);

        $catalogoSeleccionado = end($url_referee);

        $usuarios = DB::select("SELECT u.*,r.name AS namerol FROM users u 

                                INNER JOIN roles r ON u.IdRol=r.id

                                WHERE u.IdRol = 105 OR u.IdRol = 98; 

                                ");

        // $cod = $request->input('CP');

        // $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,

        // cp.CodigoMunicipio,

        // e.FK_nombre_estado as estado,

        // e.IdEstado,

        // m.Descripcion as Municipio,

        // m.IdMunicipio, l.Descripcion as localidad,

        // l.IdLocalidad,

        // col.Colonia,

        // p.IdPais

        // From cfdi_codigopostal as cp

        // INNER JOIN estados e on e.Codigo = cp.CodigoEstado

        // left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

        // left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

        // left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)

        // left join master_pais as p on (p.IdPais = e.IdPais)

        // Where (CodigoPostal = -1 or (CodigoPostal <> -1 and cp.CodigoPostal = :CodigoPostal))

        // ORDER BY CodigoPostal Asc ';



        $Bancos = DB::table('master_bancos')->get();



        $bancos = ['' => 'Seleccione un Banco'];

        foreach ($Bancos as $bank) {

            $bancos[$bank->IdBanco] = $bank->Descripcion;

        }



        $roles = 4;



        $Puestos = DB::table('master_ese_puestoempleado')->get();



        $puestos = ['' => 'Seleccione un Puesto'];

        foreach ($Puestos as $puesto) {

            $puestos[$puesto->IdPuesto] = $puesto->Descripcion;

        }



        // $cp=DB::select($query,[$cod]);

        $estadosQuery = "SELECT

                            e.IdEstado,

                            e.FK_nombre_estado

                        FROM estados e

                        WHERE e.FK_nombre_estado IS NOT NULL

                        ORDER BY e.IdEstado";

        $estados = DB::select($estadosQuery);



        $codpost="";

        $State="";

        $IdState="";

        $Municipio="";

        $Colonia="";

        $IdPais="";

        $Localidad="";

        $IdCodigoPostal="";



        // foreach ($cp as  $cps) {

        //     $codpost=$cps->CodigoPostal;

        //     $State=$cps->estado;

        //     $IdState=$cps->IdEstado;

        //     $Municipio=$cps->Municipio;

        //     $Colonia=$cps->Colonia;

        //     $Localidad=$cps->localidad;

        //     $IdPais=$cps->IdPais;

        //     $IdCodigoPostal=$cps->IdCodigoPostal;



        // }



        // $col = explode(";", $Colonia);

        $active_tab = "Usuario";

        clearstatcache();



        return view("ESE.catalogos.form-catalogoempleados")

        ->with('cp', null)

        ->with('State', null)

        ->with('IdState', null)

        ->with('Municipio',null)

        ->with('Colonia', null)

        ->with('Localidad', null)

        ->with('IdCodigoPostal', null)

        ->with('Bancos', $bancos)

        ->with('Roles', $roles)

        ->with('Puestos', $puestos)

        ->with('IdPais', null)

        ->with('Rfc',null)

        ->with('Curp',null)

        ->with('Nombre',null)

        ->with('SegundoNombre',null)

        ->with('ApellidoPaterno',null)

        ->with('ApellidoMaterno',null)

        ->with('genero',null)

        ->with('IdBanco',null)

        ->with('Email',null)

        ->with('TelefonoMovil',null)

        ->with('TelefonoLocal',null)

        ->with('Extension',null)

        ->with('Calle',null)

        ->with('NoInt',null)

        ->with('NoExt',null)

        ->with('IdPais',null)

        ->with('IdEstado',null)

        ->with('IdCodigoPostal',null)

        ->with('CodigoPostal',null)

        ->with('Referencias',null)

        ->with('FechaAlta',null)

        ->with('IdPuesto',null)

        ->with('IdRol',null)

        ->with('Usuario',null)

        ->with('Password',null)

        ->with('IdEmpleado',null)

        // ->with('Regiones',null)

        //Documentos

        //->with('IdDocumentoEmpleado')

        ->with('ArchivoFoto',null)

        ->with('ArchivoReferencias',null)

        ->with('ArchivoConvenio',null)

        ->with('ArchivoActaNacimiento',null)

        ->with('ArchivoIdentificacion',null)

        ->with('ArchivoPasaporte',null)

        ->with('ArchivoCurp',null)

        ->with('ArchivoRfc',null)

        ->with('ArchivoCv',null)

        ->with('ArchivoComprobante',null)

        ->with('ArchivoNss',null)

        ->with('ArchivoCuentaBancaria',null)

        ->with('ArchivoDocumentosExtras',null)

        ->with('ArchivoFechaAlta',null)

        //RutaNss

        ->with('RutaFoto',null)

        ->with('RutaReferencias',null)

        ->with('RutaConvenio',null)

        ->with('RutaActaNacimiento',null)

        ->with('RutaIdentificacion',null)

        ->with('RutaPasaporte',null)

        ->with('RutaCurp',null)

        ->with('RutaRfc',null)

        ->with('RutaCv',null)

        ->with('RutaComprobante',null)

        ->with('RutaNss',null)

        ->with('RutaCuentaBancaria',null)

        ->with('RutaDocumentosExtras',null)

        ->with('CoordenadasGmaps','')

        ->with('Localizacion','')

        ->with('ColUpdate',null)

        ->with('NumCuenta',null)

        ->with('NumTarjeta',null)

        ->with('ClabeInt',null)

        ->with("catalogoSeleccionado",$catalogoSeleccionado)

        ->with("usuarios",$usuarios)

        ->with("IdUsuario",null)

        ->with("estados",$estados)

        ->with("active_tab",$active_tab)

        ->with('mensaje', null)

        ->with("action","create");





    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */





    public function GCreate(Request $request){

        

        try {

                // dd($request->IdEmpleado);

                // dd($request->active_tab);

                // $datos = $request->input('datos');

                // parse_str(urldecode($_POST['datos']), $datos);

                $mens='';

                $empl='';

                $CodigoPostal='';

                $IdRol=4;

                $Genero='';

                $NumCuenta='';

                $NumTarjeta='';

                $ClabeInt='';

                $NoInt='';

                $NoExt='';

                $Referencias='';

                $FechaAlta='';

                $Usuario='';

                $Password='';

                $CoordenadasGmaps='';

                $Localizacion='';

                $ColUpdate='';

                $IdPuesto='';

                $IdUsuario='';

                $Rfc                   = $request->Rfc;

                $Curp                  = $request->Curp;

                $Nombre                = $request->Nombre;

                $SegundoNombre         = $request->SegundoNombre;

                $ApellidoPaterno       = $request->ApellidoPaterno;

                $ApellidoMaterno       = $request->ApellidoMaterno;

                $genero                = $request->genero;

                $Email                 = $request->Email;

                $TelefonoMovil         = $request->TelefonoMovil;

                $TelefonoLocal         = $request->TelefonoLocal;

                $Extension             = $request->Extension;

                $Calle                 = $request->Calle;

                $Colonia               = $request->Colonia;

                $IdPais                = $request->IdPais;

                $IdEstado              = $request->IdEstado;

                $municipio             = $request->municipio;

                $Localidad             = $request->Localidad;

                $IdCodigoPostal        = $request->IdCodigoPostal;

                $CP                    = $request->CP;

                



                if($request->active_tab=='Usuario'){

                    if($request->IdEmpleado==null){



                        



                        $IdPuesto="0";

                        $IdUsuario = "0";

                        if($request->catalogoSeleccionado != "CatalogoAnalistas"){

                            $IdPuesto              = $request->IdPuesto;

                            $Usuario               = $request->Usuario;

                            $Password              = $request->Password;

                            $IdRol                 = $request->IdRol;

                        }

                        if($request->catalogoSeleccionado == "CatalogoAnalistas"){

                            $IdUsuario = $request->usuario;

                            $datausuario = DB::table('users')->where("id","=",$IdUsuario)->get();

                            $usr=$datausuario[0]->id;

                            $usrIR=$datausuario[0]->IdRol;

                        }



                            

                        $Empleados  = MasterEseEmpleado::Create([

                            "Rfc" => $Rfc,

                            "Curp" => $Curp,

                            "Nombre" => $Nombre,

                            "SegundoNombre" => $SegundoNombre,

                            "ApellidoPaterno" => $ApellidoPaterno,

                            "ApellidoMaterno" => $ApellidoMaterno,

                            "Genero" => $genero,

                            "Email" => $Email,

                            "TelefonoMovil" => $TelefonoMovil,

                            "FechaAlta" => date('Y-m-d H:i:s'),

                            "IdPuesto" => $IdPuesto,

                            "IdUsuario" => $IdUsuario

                        ]);



                        $empl=$Empleados->IdEmpleado;



                        if($request->catalogoSeleccionado != "CatalogoAnalistas"){

                            $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

                            $datos=DB::select($contr,[$Password]);

                            $contras="";

                            foreach ($datos as  $dato) {

                                $contras = $dato->pw;

                            }

                            $pass=bcrypt($Password);

                        

                            $UserGC  = User::Create([

                                "name" => $Nombre,

                                "apellido_paterno" => $ApellidoPaterno,

                                "apellido_materno" => $ApellidoMaterno,

                                "Genero" => $genero,

                                "nick_name" => str_replace(' ', '', $Nombre).'.'.trim($ApellidoPaterno).'.'.trim($ApellidoMaterno),

                                "username" => $Usuario,

                                "idcn" => 24,

                                "email" => $Email,

                                "password" => $pass,

                                "password_mobile" => $contras,

                                "password_aux" => $Password,

                                "telefono_oficina" => $TelefonoLocal,

                                "telefono_movil" => $TelefonoMovil,

                                "IdRol" => $IdRol,

                                "IdEmpleado" => $empl,

                                "password_ese_mobile" => $contras

                            ]);

            

            

                            $usr=$UserGC->id;

                            $usrIR=$UserGC->IdRol;

                        }

            

                        $guardarCambios=DB::table('role_user')->insert([

                            "role_id" => $usrIR,

                            "user_id" => $usr

                        

                        ]);





                    }else{

                        // dd($request->IdEmpleado);

                        // $TelefonoLocal         = $request->TelefonoLocal;

                        // $Extension             = $request->Extension;

                        // $Calle                 = $request->Calle;

                        // $Colonia               = $request->Colonia;

                        // $IdPais                = $request->IdPais;

                        // $IdEstado              = $request->IdEstado;

                        // $municipio             = $request->municipio;

                        // $Localidad             = $request->Localidad;

                        // $IdCodigoPostal        = $request->IdCodigoPostal;

                        // $CP                    = $request->CP;

                        $IdPuesto="0";

                        $IdUsuario = "0";

                        $Empleados = MasterEseEmpleado::where('IdEmpleado',$request->IdEmpleado)->first();

        

                        $Empleados->update([

                            "Rfc" => $request->Rfc,

                            "Curp" => $request->Curp,

                            "Nombre" => $request->Nombre,

                            "SegundoNombre" => $request->SegundoNombre,

                            "ApellidoPaterno" => $request->ApellidoPaterno,

                            "ApellidoMaterno" => $request->ApellidoMaterno,

                            "Genero" => $request->genero,

                            "IdBanco" => $request->IdBanco,

                            "NumCuenta" => $request->NumCuenta,

                            "NumTarjeta" => $request->NumTarjeta,

                            "ClabeInt" => $request->ClabeInt,

                            "Email" => $request->Email,

                            "TelefonoMovil" => $request->TelefonoMovil,

                            "TelefonoLocal" => $request->TelefonoLocal,

                            "Extension" => $request->Extension,

                            "Calle" => $request->Calle,

                            "Colonia" => $request->Colonia,

                            "NoInt" => isset($request->NoInt)?$request->NoInt:'',

                            "NoExt" => isset($request->NoExt)?$request->NoExt:'',

                            "IdPais" => $request->IdPais,

                            "IdEstado" => $request->IdEstado,

                            "Municipio" => $request->municipio,

                            "Localidad" => $request->Localidad,

                            "IdCodigoPostal" => $request->IdCodigoPostal,

                            "CodigoPostal" => $request->CP,

                            "Referencias" => $request->Referencias,

                            "CoordenadasGmaps" => $request->Coordendas,

                            "url_ubicacion" => $request->Localizacion,

                            // "FechaAlta" => date('Y-m-d H:i:s'),

                            "IdPuesto" => $IdPuesto,

                            "IdUsuario" => $IdUsuario

                        ]);

                    }

                    

                    $empl=$Empleados->IdEmpleado;

                    $active_tab = "DatosGenerales";



                }



                if($request->active_tab=='DatosGenerales'){

                  

                    if($request->IdEmpleado==null){

                        $mens='Se requiere crear el usuario.';

                        

                    }else{



                        

                        $CP= $request->CP;

                        $IdPuesto="0";

                        $IdUsuario = "0";

                        $Empleados = MasterEseEmpleado::where('IdEmpleado',$request->IdEmpleado)->first();



                        $Empleados->update([

                            "Rfc" => $request->Rfc,

                            "Curp" => $request->Curp,

                            "Nombre" => $request->Nombre,

                            "SegundoNombre" => $request->SegundoNombre,

                            "ApellidoPaterno" => $request->ApellidoPaterno,

                            "ApellidoMaterno" => $request->ApellidoMaterno,

                            "Genero" => $request->genero,

                            "IdBanco" => $request->IdBanco,

                            "NumCuenta" => $request->NumCuenta,

                            "NumTarjeta" => $request->NumTarjeta,

                            "ClabeInt" => $request->ClabeInt,

                            "Email" => $request->Email,

                            "TelefonoMovil" => $request->TelefonoMovil,

                            "TelefonoLocal" => $request->TelefonoLocal,

                            "Extension" => $request->Extension,

                            "Calle" => $request->Calle,

                            "Colonia" => $request->Colonia,

                            "NoInt" => isset($request->NoInt)?$request->NoInt:'',

                            "NoExt" => isset($request->NoExt)?$request->NoExt:'',

                            "IdPais" => $request->IdPais,

                            "IdEstado" => $request->IdEstado,

                            "Municipio" => $request->municipio,

                            "Localidad" => $request->Localidad,

                            "IdCodigoPostal" => $request->IdCodigoPostal,

                            "CodigoPostal" => $CP,

                            "Referencias" => $request->Referencias,

                            "CoordenadasGmaps" => $request->Coordendas,

                            "url_ubicacion" => $request->Localizacion,

                            // "FechaAlta" => date('Y-m-d H:i:s'),

                            "IdPuesto" => $IdPuesto,

                            "IdUsuario" => $IdUsuario

                        ]);



                        $empl=$Empleados->IdEmpleado;

                    }

                    // dd($EmpDatos->CodigoPostal);



                    $active_tab='Documentos';

                }



                if($request->active_tab=='Documentos'){

                    // dd($request->IdEmpleado);

                    if($request->IdEmpleado==null){

                        $mens='Se requiere crear el usuario.';

                        

                    }else{

                        // dd($request->IdEmpleado);

                        $EmpDoctosDatos = MasterEseEmpleadosDoc::where('IdEmpleado', $request->IdEmpleado)->first();



                        if($EmpDoctosDatos){



                            if (!file_exists('uploads')) {

                                mkdir('uploads', 0777, true);

                            }

                

                            $destinationPath = 'uploads';

                            if($fotografia=$request->file('fotografiaPDF')){

                                $nombrefotografia=rand().'-'.$fotografia->getClientOriginalName();

                                $fotografia->move($destinationPath,$nombrefotografia);

                

                            }else{

                                $nombrefotografia = (!empty($request->foto))?$request->foto:'';

                            }

                

                            if($referencias=$request->file('referenciasPDF')){

                                $nombrereferencias=rand().'-'.$referencias->getClientOriginalName();

                                $referencias->move($destinationPath,$nombrereferencias);

                            }else{

                                $nombrereferencias = (!empty($request->Referencias_pdf))?$request->Referencias_pdf:'';

                            }

                

                            if($convenio=$request->file('convenioPDF')){

                                $nombreconvenio=rand().'-'.$convenio->getClientOriginalName();

                                $convenio->move($destinationPath,$nombreconvenio);

                

                            }else{

                                $nombreconvenio = (!empty($request->Convenio_pdf))?$request->Convenio_pdf:'';

                            }

                

                            if($acta=$request->file('actaPDF')){

                                $nombreacta=rand().'-'.$acta->getClientOriginalName();

                                $acta->move($destinationPath,$nombreacta);

                

                            }else{

                                $nombreacta = (!empty($request->Acta_pdf))?$request->Acta_pdf:'';

                            }

                

                            if($ine=$request->file('inePDF')){

                                $nombreine=rand().'-'.$ine->getClientOriginalName();

                                $ine->move($destinationPath,$nombreine);

                

                            }else{

                                $nombreine = (!empty($request->Ine_pdf))?$request->Ine_pdf:'';

                            }

                

                            if($pasaporte=$request->file('pasaportePDF')){

                                $nombrepasaporte=rand().'-'.$pasaporte->getClientOriginalName();

                                $pasaporte->move($destinationPath,$nombrepasaporte);

                

                            }else{

                                $nombrepasaporte = (!empty($request->Pasaporte_pdf))?$request->Pasaporte_pdf:'';

                            }

                

                            if($curp=$request->file('curpPDF')){

                                $nombrecurp=rand().'-'.$curp->getClientOriginalName();

                                $curp->move($destinationPath,$nombrecurp);

                

                            }else{

                                $nombrecurp = (!empty($request->Curp_pdf))?$request->Curp_pdf:'';

                            }

                

                            if($rfc=$request->file('rfcPDF')){

                                $nombrerfc=rand().'-'.$rfc->getClientOriginalName();

                                $rfc->move($destinationPath,$nombrerfc);

                

                            }else{

                                $nombrerfc = (!empty($request->Rfc_pdf))?$request->Rfc_pdf:'';

                            }

                

                            if($cv=$request->file('cvPDF')){

                                $nombrecv=rand().'-'.$cv->getClientOriginalName();

                                $cv->move($destinationPath,$nombrecv);

                

                            }else{

                                $nombrecv = (!empty($request->Cv_pdf))?$request->Cv_pdf:'';

                            }

                

                            if($comprobante=$request->file('comprobantePDF')){

                                $nombrecomprobante=rand().'-'.$comprobante->getClientOriginalName();

                                $comprobante->move($destinationPath,$nombrecomprobante);

                

                            }else{

                                $nombrecomprobante = (!empty($request->Comprobante_pdf))?$request->Comprobante_pdf:''; 

                            }

                

                            if($nss=$request->file('nssPDF')){

                                $nombrenss=rand().'-'.$nss->getClientOriginalName();

                                $nss->move($destinationPath,$nombrenss);

                

                            }else{

                                $nombrenss = (!empty($request->Nss_pdf))?$request->Nss_pdf:'';

                            }

                

                            if($cuentabancaria=$request->file('cuentabancariaPDF')){

                                $nombrecuentabancaria=rand().'-'.$cuentabancaria->getClientOriginalName();

                                $cuentabancaria->move($destinationPath,$nombrecuentabancaria);

                

                            }else{

                                $nombrecuentabancaria = (!empty($request->CuentaBancaria_pdf))?$request->CuentaBancaria_pdf:'';

                            }

                

                            if($documentosextras=$request->file('documentosextrasPDF')){

                                $nombredocumentosextras=rand().'-'.$documentosextras->getClientOriginalName();

                                $documentosextras->move($destinationPath,$nombredocumentosextras);

                

                            }else{

                                $nombredocumentosextras = (!empty($request->DocumentoExtra_pdf))?$request->DocumentoExtra_pdf:'';

                            }

        

                            $EmpDoctosDatos->update([

                                "ArchivoFoto" => $nombrefotografia,

                                "ArchivoReferencias" => $nombrereferencias,

                                "ArchivoConvenio" => $nombreconvenio,

                                "ArchivoActaNacimiento" => $nombreacta,

                                "ArchivoIdentificacion" => $nombreine,

                                "ArchivoPasaporte" => $nombrepasaporte,

                                "ArchivoCurp" => $nombrecurp,

                                "ArchivoRfc" => $nombrerfc,

                                "ArchivoCv" => $nombrecv,

                                "ArchivoComprobante" => $nombrecomprobante,

                                "ArchivoNss" => $nombrenss,

                                "ArchivoCuentaBancaria" => $nombrecuentabancaria,

                                "ArchivoDocumentosExtras" => $nombredocumentosextras,

                                "FechaModificacion" => date('Y-m-d H:i:s')

                            ]);

                            $empl=$request->IdEmpleado;

                        

        

                        }else{

                            $empl=$request->IdEmpleado;

                            $destinationPath = 'uploads';

        

                            if($fotografia=$request->file('fotografiaPDF')){

                                $nombrefotografia=rand().'-'.$fotografia->getClientOriginalName();

                                $fotografia->move($destinationPath,$nombrefotografia);

        

                            }else{

                                $nombrefotografia = "";

                            }

        

                            if($referencias=$request->file('referenciasPDF')){

                                $nombrereferencias=rand().'-'.$referencias->getClientOriginalName();

                                $referencias->move($destinationPath,$nombrereferencias);

                            }else{

                                $nombrereferencias = "";

                            }

        

                            if($convenio=$request->file('convenioPDF')){

                                $nombreconvenio=rand().'-'.$convenio->getClientOriginalName();

                                $convenio->move($destinationPath,$nombreconvenio);

                            }else{

                                $nombreconvenio = "";

                            }

        

                            if($acta=$request->file('actaPDF')){

                                $nombreacta=rand().'-'.$acta->getClientOriginalName();

                                $acta->move($destinationPath,$nombreacta);

        

                            }else{

                                $nombreacta = "";

                            }

        

                            if($ine=$request->file('inePDF')){

                                $nombreine=rand().'-'.$ine->getClientOriginalName();

                                $ine->move($destinationPath,$nombreine);

        

                            }else{

                                $nombreine = "";

                            }

        

                            if($pasaporte=$request->file('pasaportePDF')){

                                $nombrepasaporte=rand().'-'.$pasaporte->getClientOriginalName();

                                $pasaporte->move($destinationPath,$nombrepasaporte);

        

                            }else{

                                $nombrepasaporte = "";

                            }

        

                            if($curp=$request->file('curpPDF')){

                                $nombrecurp=rand().'-'.$curp->getClientOriginalName();

                                $curp->move($destinationPath,$nombrecurp);

        

                            }else{

                                $nombrecurp = "";

                            }

        

                            if($rfc=$request->file('rfcPDF')){

                                $nombrerfc=rand().'-'.$rfc->getClientOriginalName();

                                $rfc->move($destinationPath,$nombrerfc);

        

                            }else{

                                $nombrerfc = "";

                            }

        

                            if($cv=$request->file('cvPDF')){

                                $nombrecv=rand().'-'.$cv->getClientOriginalName();

                                $cv->move($destinationPath,$nombrecv);

        

                            }else{

                                $nombrecv = "";

                            }

        

                            if($comprobante=$request->file('comprobantePDF')){

                                $nombrecomprobante=rand().'-'.$comprobante->getClientOriginalName();

                                $comprobante->move($destinationPath,$nombrecomprobante);

        

                            }else{

                                $nombrecomprobante = "";

                            }

        

                            if($nss=$request->file('nssPDF')){

                                $nombrenss=rand().'-'.$nss->getClientOriginalName();

                                $nss->move($destinationPath,$nombrenss);

        

                            }else{

                                $nombrenss = "";

                            }

        

                            if($cuentabancaria=$request->file('cuentabancariaPDF')){

                                $nombrecuentabancaria=rand().'-'.$cuentabancaria->getClientOriginalName();

                                $cuentabancaria->move($destinationPath,$nombrecuentabancaria);

        

                            }else{

                                $nombrecuentabancaria = "";

                            }

        

                            if($documentosextras=$request->file('documentosextrasPDF')){

                                $nombredocumentosextras=rand().'-'.$documentosextras->getClientOriginalName();

                                $documentosextras->move($destinationPath,$nombredocumentosextras);

        

                            }else{

                                $nombredocumentosextras = "";

                            }

        

        

                            $EmpleadosDoc  = MasterEseEmpleadosDoc::Create([

                                "IdEmpleado" => $empl, 

                                "ArchivoFoto" => $nombrefotografia,

                                "ArchivoReferencias" => $nombrereferencias,

                                "ArchivoConvenio" => $nombreconvenio,

                                "ArchivoActaNacimiento" => $nombreacta,

                                "ArchivoIdentificacion" => $nombreine,

                                "ArchivoPasaporte" => $nombrepasaporte,

                                "ArchivoCurp" => $nombrecurp,

                                "ArchivoRfc" => $nombrerfc,

                                "ArchivoCv" => $nombrecv,

                                "ArchivoComprobante" => $nombrecomprobante,

                                "ArchivoNss" => $nombrenss,

                                "ArchivoCuentaBancaria" => $nombrecuentabancaria,

                                "ArchivoDocumentosExtras" => $nombredocumentosextras,

                                "FechaAlta" => date('Y-m-d H:i:s')

                            ]);



                            $empl=$request->IdEmpleado;

                            // dd($request->IdEmpleado);

        

                        }

                    }



                    

                    $active_tab='DatosBancarios';

                    

                }



                if($request->active_tab=='DatosBancarios'){

                    

                    if($request->IdEmpleado==null){

                        $mens='Se requiere crear el usuario.';

                       

                    }else{

                        $IdPuesto="0";

                        $IdUsuario = "0";



                        $EmpDatos = MasterEseEmpleado::where('IdEmpleado',$request->IdEmpleado)->first();



                        $EmpDatos->update([

                            "Rfc" => $request->Rfc,

                            "Curp" => $request->Curp,

                            "Nombre" => $request->Nombre,

                            "SegundoNombre" => $request->SegundoNombre,

                            "ApellidoPaterno" => $request->ApellidoPaterno,

                            "ApellidoMaterno" => $request->ApellidoMaterno,

                            "Genero" => $request->genero,

                            "IdBanco" => $request->IdBanco,

                            "NumCuenta" => $request->NumCuenta,

                            "NumTarjeta" => $request->NumTarjeta,

                            "ClabeInt" => $request->ClabeInt,

                            "Email" => $request->Email,

                            "TelefonoMovil" => $request->TelefonoMovil,

                            "TelefonoLocal" => $request->TelefonoLocal,

                            "Extension" => $request->Extension,

                            "Calle" => $request->Calle,

                            "Colonia" => $request->Colonia,

                            "NoInt" => isset($request->NoInt)?$request->NoInt:'',

                            "NoExt" => isset($request->NoExt)?$request->NoExt:'',

                            "IdPais" => $request->IdPais,

                            "IdEstado" => $request->IdEstado,

                            "Municipio" => $request->municipio,

                            "Localidad" => $request->Localidad,

                            "IdCodigoPostal" => $request->IdCodigoPostal,

                            "CodigoPostal" => $request->CP,

                            "Referencias" => $request->Referencias,

                            "CoordenadasGmaps" => $request->Coordendas,

                            "url_ubicacion" => $request->Localizacion,

                            // "FechaAlta" => date('Y-m-d H:i:s'),

                            "IdPuesto" => $IdPuesto,

                            "IdUsuario" => $IdUsuario

                        ]);



                        $empl=$request->IdEmpleado;

                    }

                    $active_tab='RegionesxInvestigador';

                }



                if($request->active_tab=='RegionesxInvestigador'){

                    if($request->IdEmpleado==null){

                        $mens='Se requiere crear el usuario.';

                       

                    }else{

                    

                        $empl=$request->IdEmpleado;

                        // dd($request->TableMunicipiosSelectV);

                        $arr = (!empty($request->TableMunicipiosSelectV))?$request->TableMunicipiosSelectV:array();

                        

                        if(!empty($arr)){

                            $arr = explode(',', $request->TableMunicipiosSelectV);  

                            $arrValue = array();

                        

                            for ($x = 0; $x < count($arr); $x++) {

                                $value = explode('-',$arr[$x]);

                                $queryValue = "(".$empl.",".$value[0].",".$value[1].")";

                                array_push($arrValue,$queryValue);

                            }   

                            if(count($arrValue) > 0){

                                $queryValue = implode(',',$arrValue);

                                $queryInsert = "INSERT INTO master_ese_cobertura_inv (IdEmpleado,IdEstado,IdMunicipio) VALUES $queryValue";

                                DB::insert($queryInsert);

                            }

                        }

                    }

                    $active_tab='Finalizar';

                }



                $Empleado = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

                    array(

                        "IdEmpleado" => $empl

                    )

                );



                $DocumentoEmpleado = MasterConsultas::exeSQL("documentos_empleados", "READONLY",

                    array(

                        "id" => $empl

                    )

                );



                

                foreach ($Empleado as  $c) {

                    $IdEmpleado = $c->IdEmpleado;

                    $Rfc = $c->Rfc;

                    $Curp = $c->Curp;

                    $Nombre = $c->Nombre;

                    $SegundoNombre = $c->SegundoNombre;

                    $ApellidoPaterno = $c->ApellidoPaterno;

                    $ApellidoMaterno = $c->ApellidoMaterno;

                    $Genero = $c->Genero;

                    $IdBanco = $c->IdBanco;

                    $NumCuenta = $c->NumCuenta;

                    $NumTarjeta = $c->NumTarjeta;

                    $ClabeInt = $c->ClabeInt;

                    $Email = $c->Email;

                    $TelefonoMovil = $c->TelefonoMovil;

                    $TelefonoLocal = $c->TelefonoLocal;

                    $Extension = $c->Extension;

                    $Calle = $c->Calle;

                    $Colonia = $c->Colonia;

                    $NoInt = $c->NoInt;

                    $NoExt = $c->Rfc;

                    $IdPais = $c->IdPais;

                    $IdEstado = $c->IdEstado;

                    $Municipio = $c->Municipio;

                    $Localidad = $c->Localidad;

                    $IdCodigoPostal = $c->IdCodigoPostal;

                    $CodigoPostal = $c->CodigoPostal;

                    $Referencias = $c->Referencias;

                    $FechaAlta = $c->FechaAlta;

                    $IdPuesto = $c->IdPuesto;

                    $IdRol = $c->IdRol;

                    $Usuario = $c->username;

                    $Password = $c->password_aux;

                    $CoordenadasGmaps = $c->CoordenadasGmaps;

                    $Localizacion = $c->url_ubicacion;

                    $ColUpdate = $c->Colonia;

                    $IdUsuario = $c->IdUsuario;



            }

            $IdDocumentoEmpleado="";

            $ArchivoFoto = "";

            $ArchivoReferencias = "";

            $ArchivoConvenio = "";

            $ArchivoActaNacimiento = "";

            $ArchivoIdentificacion = "";

            $ArchivoPasaporte = "";

            $ArchivoCurp = "";

            $ArchivoRfc = "";

            $ArchivoCv = "";

            $ArchivoComprobante = "";

            $ArchivoNss = "";

            $ArchivoCuentaBancaria = "";

            $ArchivoDocumentosExtras = "";



            foreach ($DocumentoEmpleado as  $d) {

                $IdDocumentoEmpleado = $d->IdDocumentoEmpleado;

                $ArchivoFoto = $d->ArchivoFoto;

                $ArchivoReferencias = $d->ArchivoReferencias;

                $ArchivoConvenio = $d->ArchivoConvenio;

                $ArchivoActaNacimiento = $d->ArchivoActaNacimiento;

                $ArchivoIdentificacion = $d->ArchivoIdentificacion;

                $ArchivoPasaporte = $d->ArchivoPasaporte ;

                $ArchivoCurp = $d->ArchivoCurp;

                $ArchivoRfc = $d->ArchivoRfc;

                $ArchivoCv = $d->ArchivoCv ;

                $ArchivoComprobante = $d->ArchivoComprobante;

                $ArchivoNss = $d->ArchivoNss;

                $ArchivoCuentaBancaria = $d->ArchivoCuentaBancaria;

                $ArchivoDocumentosExtras = $d->ArchivoDocumentosExtras;



            }

            $destinationPath = '';

            $RutaFoto= "$destinationPath$ArchivoFoto";

            $RutaReferencias= "$destinationPath$ArchivoReferencias";

            $RutaConvenio= "$destinationPath$ArchivoConvenio";

            $RutaActaNacimiento= "$destinationPath$ArchivoActaNacimiento";

            $RutaIdentificacion= "$destinationPath$ArchivoIdentificacion";

            $RutaPasaporte= "$destinationPath$ArchivoPasaporte";

            $RutaCurp= "$destinationPath$ArchivoCurp";

            $RutaRfc= "$destinationPath$ArchivoRfc";

            $RutaCv= "$destinationPath$ArchivoCv";

            $RutaComprobante= "$destinationPath$ArchivoComprobante";

            $RutaNss= "$destinationPath$ArchivoNss";

            $RutaCuentaBancaria= "$destinationPath$ArchivoCuentaBancaria";

            $RutaDocumentosExtras= "$destinationPath$ArchivoDocumentosExtras";



            $destinationPath = '/uploads/';

            //$headers = [

            //    'Content-Type' => 'application/pdf',

            // ];



            //return Response::download($file, 'foto.pdf', $headers);

        

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



            // $regiones=DB::select("select DISTINCT mr.Nombre as Region,mr.IdRegion from master_regiones mr

            // inner join master_region_edo mre on mre.IdRegion = mr.IdRegion

            // where mre.IdEstado = $IdState");

            $IdBanco=(!empty($IdBanco))?$IdBanco:0;

            $Bancos=DB::table('master_bancos')

                    ->select('IdBanco','Descripcion')

                ->orderByRaw("FIELD(IdBanco, $IdBanco) DESC")

                    ->get();



                foreach ($Bancos as $bank) {

                    $bancos[$bank->IdBanco] = $bank->Descripcion;

                }



            $roles = $IdRol;



            $Puestos = DB::table('master_ese_puestoempleado')->get();



            $puestos = ['' => 'Seleccione un Puesto'];

            foreach ($Puestos as $puesto) {

                $puestos[$puesto->IdPuesto] = $puesto->Descripcion;

            }



            $estadosQuery = "SELECT

                                e.IdEstado,

                                e.FK_nombre_estado

                            FROM estados e

                            WHERE e.FK_nombre_estado IS NOT NULL

                            ORDER BY e.IdEstado";

            $estados = DB::select($estadosQuery);



            $coberturaQuery = "SELECT

                                    meci.Id,

                                    meci.IdEmpleado,

                                    e.IdEstado,

                                    e.FK_nombre_estado,

                                    mm.IdMunicipio,

                                    mm.Descripcion

                                FROM estados e

                                    INNER JOIN master_municipios mm

                                    ON e.Codigo = mm.CodigoEstado

                                    INNER JOIN master_ese_cobertura_inv meci 

                                    ON mm.IdMunicipio = meci.IdMunicipio

                                WHERE meci.IdEmpleado = ?";

            $cobertura = DB::select($coberturaQuery, [$empl]);



            $usuarios = DB::select("SELECT u.*,r.name AS namerol FROM users u 

                                INNER JOIN roles r ON u.IdRol=r.id

                                WHERE u.IdRol = 105 OR u.IdRol = 98; 

                                ");

            

            $url_referee = explode("/",$_SERVER['HTTP_REFERER']);

            $catalogoSeleccionado = end($url_referee);





            if($active_tab=='Finalizar'){

                // $empl=$request->IdEmpleado;

                $ntf = new Notificaciones();

                $statusNot=$ntf->notificaUsuariosInv($empl,'USUARIO-INVESTIGADOR','UsuarioInvestigador',null);

                if($statusNot==1){

                    return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se creó con éxito y notificación enviada.',

                    'type'    => 'success']);

                }else{

                    return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se creó con éxito ',

                    'type'    => 'success']);

                }

                

                

                    

                

            }else{

                

                return view("ESE.catalogos.form-catalogoempleados")

                ->with('IdEmpleado', $empl)

                ->with('mensaje', $mens)

                ->with('cp', $codpost)

                ->with('State', $State)

                ->with('IdState', $IdState)

                ->with('Municipio',$Municipio)

                ->with('Colonia', $Colonia)

                ->with('Localidad', $Localidad)

                ->with('IdCodigoPostal', $IdCodigoPostal)

                ->with('Bancos', $bancos)

                ->with('Roles', $roles)

                ->with('Puestos', $puestos)

                ->with('IdPais', $IdPais)

                ->with('Rfc',$Rfc)

                ->with('Curp',$Curp)

                ->with('Nombre',$Nombre)

                ->with('SegundoNombre',$SegundoNombre)

                ->with('ApellidoPaterno',$ApellidoPaterno)

                ->with('ApellidoMaterno',$ApellidoMaterno)

                ->with('genero',$Genero)

                ->with('IdBanco',$IdBanco)

                ->with('NumCuenta',$NumCuenta)

                ->with('NumTarjeta',$NumTarjeta)

                ->with('ClabeInt',$ClabeInt)

                ->with('Email',$Email)

                ->with('TelefonoMovil',$TelefonoMovil)

                ->with('TelefonoLocal',$TelefonoLocal)

                ->with('Extension',$Extension)

                ->with('Calle',$Calle)

                ->with('Colonia',$Colonia)

                ->with('NoInt',$NoInt)

                ->with('NoExt',$NoExt)

                ->with('IdPais',$IdPais)

                ->with('IdEstado',$IdEstado)

                ->with('Municipio',$Municipio)

                ->with('Localidad',$Localidad)

                ->with('IdCodigoPostal',$IdCodigoPostal)

                ->with('CodigoPostal',$CodigoPostal)

                ->with('Referencias',$Referencias)

                ->with('FechaAlta',$FechaAlta)

                ->with('IdPuesto',$IdPuesto)

                ->with('IdRol',$IdRol)

                ->with('Usuario',$Usuario)

                ->with('Password',$Password)

                ->with('IdDocumentoEmpleado',$IdDocumentoEmpleado)

                ->with('RutaFoto',$RutaFoto)

                ->with('RutaReferencias',$RutaReferencias)

                ->with('RutaConvenio',$RutaConvenio)

                ->with('RutaActaNacimiento',$RutaActaNacimiento)

                ->with('RutaIdentificacion',$RutaIdentificacion)

                ->with('RutaPasaporte',$RutaPasaporte)

                ->with('RutaCurp',$RutaCurp)

                ->with('RutaRfc',$RutaRfc)

                ->with('RutaCv',$RutaCv)

                ->with('RutaComprobante',$RutaComprobante)

                ->with('RutaNss',$RutaNss)

                ->with('RutaCuentaBancaria',$RutaCuentaBancaria)

                ->with('RutaDocumentosExtras',$RutaDocumentosExtras)

                ->with('CoordenadasGmaps',$CoordenadasGmaps)

                ->with('Localizacion',$Localizacion)

                ->with('ColUpdate',$ColUpdate)

                ->with("catalogoSeleccionado",$catalogoSeleccionado)

                ->with("usuarios",$usuarios)

                ->with("IdUsuario",$IdUsuario)

                ->with("estados",$estados)

                ->with("cobertura",$cobertura)

                ->with("active_tab",$active_tab)

                ->with("action","create");



              

            }

            

            

 

            

            // return view('ESE.catalogos.form-catalogoempleados', ->with('active_tab',$active_tab));

            // return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se creó con éxito',

            // 'type'    => 'success']);

            // return response()->json(['status_alta' => 'success']); 

        } catch (\Exception $e) {

            return redirect('/CatalogoInvestigadores')->with(['success' =>  "El registro se creó con éxito, ".$e->getMessage(),

            'type'    => 'success']);

            // return response()->json(['status_alta' => 'error',

            //                             'message' =>"Se ha producido una excepción. Los detalles son los siguientes:".$e->getMessage() 

            //                         ]);

        }

    } 



    public function store(Request $request)

    {



       

       try {

            

            // $datos = $request->input('datos');

            // parse_str(urldecode($_POST['datos']), $datos);

            

            // $arr = $request->input('arr');

            // $arr = array_diff($arr, array(" ",0,null));





            $Rfc                   = $request->Rfc;

                $Curp                  = $request->Curp;

                $Nombre                = $request->Nombre;

                $SegundoNombre         = $request->SegundoNombre;

                $ApellidoPaterno       = $request->ApellidoPaterno;

                $ApellidoMaterno       = $request->ApellidoMaterno;

                $genero                = $request->genero;

                $IdBanco               = $request->IdBanco;

                $NumCuenta             = $request->NumCuenta;

                $NumTarjeta            = $request->NumTarjeta;

                $ClabeInt              = $request->ClabeInt;

                $Email                 = $request->Email;

                $TelefonoMovil         = $request->TelefonoMovil;

                $TelefonoLocal         = $request->TelefonoLocal;

                $Extension             = $request->Extension;

                $Calle                 = $request->Calle;

                $Colonia               = $request->Colonia;

                $IdPais                = $request->IdPais;

                $IdEstado              = $request->IdEstado;

                $municipio             = $request->municipio;

                $Localidad             = $request->Localidad;

                $IdCodigoPostal        = $request->IdCodigoPostal;

                $CP                    = $request->CP;

                $Referencias           = $request->Referencias;

                $Coordendas            = $request->Coordendas;

                $Localizacion          = $request->Localizacion;

                $IdPuesto              = $request->IdPuesto;

                $Usuario               = $request->Usuario;

                $Password              = $request->Password;

                $IdRol                 = $request->IdRol;



            $Empleados  = MasterEseEmpleado::Create([

                    "Rfc" => $Rfc,

                    "Curp" => $Curp,

                    "Nombre" => $Nombre,

                    "SegundoNombre" => $SegundoNombre,

                    "ApellidoPaterno" => $ApellidoPaterno,

                    "ApellidoMaterno" => $ApellidoMaterno,

                    "Genero" => $genero,

                    "IdBanco" => $IdBanco,

                    "NumCuenta" => $NumCuenta,

                    "NumTarjeta" => $NumTarjeta,

                    "ClabeInt" => $ClabeInt,

                    "Email" => $Email,

                    "TelefonoMovil" => $TelefonoMovil,

                    "TelefonoLocal" => $TelefonoLocal,

                    "Extension" => $Extension,

                    "Calle" => $Calle,

                    "Colonia" => $Colonia,

                    "IdPais" => $IdPais,

                    "IdEstado" => $IdEstado,

                    "Municipio" => $municipio,

                    "Localidad" => $Localidad,

                    "IdCodigoPostal" => $IdCodigoPostal,

                    "CodigoPostal" => $CP,

                    "Referencias" => $Referencias,

                    "CoordenadasGmaps" => $Coordendas,

                    "url_ubicacion" => $Localizacion,

                    "FechaAlta" => date('Y-m-d H:i:s'),

                    "IdPuesto" => $IdPuesto

            ]);





            $empl=$Empleados->IdEmpleado;





        $contr='SELECT AES_ENCRYPT(:password_mobile, "DSAI2020") as pw';

        $datos=DB::select($contr,[$Password]);

        $contras="";

        foreach ($datos as  $dato) {

            $contras = $dato->pw;

        }

        $pass=bcrypt($Password);



        $UserGC  = User::Create([

            "name" => $Nombre,

            "apellido_paterno" => $ApellidoPaterno,

            "apellido_materno" => $ApellidoMaterno,

            "Genero" => $genero,

            "nick_name" => str_replace(' ', '', $Nombre).'.'.trim($ApellidoPaterno).'.'.trim($ApellidoMaterno),

            "username" => $Usuario,

            "idcn" => 24,

            "email" => $Email,

            "password" => $pass,

            "password_mobile" => $contras,

            "password_aux" => $Password,

            "telefono_oficina" => $TelefonoLocal,

            "telefono_movil" => $TelefonoMovil,

            "IdRol" => $IdRol,

            "IdEmpleado" => $empl,

            "password_ese_mobile" => $contras

        ]);





        $usr=$UserGC->id;

        $usrIR=$UserGC->IdRol;



//    clearstatcache();



//    $latestidU = DB::table('users')->select('id','IdRol')->orderBy('id', 'DESC')->first();

//    $usr=$latestidU->id;

//    $usrIR=$latestidU->IdRol;



        $guardarCambios=DB::table('role_user')->insert([

            "role_id" => $usrIR,

            "user_id" => $usr



        ]);



//    clearstatcache();



        $destinationPath = 'uploads';



        if($fotografia=$request->file('fotografiaPDF')){

            $nombrefotografia=rand().'-'.$fotografia->getClientOriginalName();

            $fotografia->move($destinationPath,$nombrefotografia);



        }else{

            $nombrefotografia = "";

        }



        if($referencias=$request->file('referenciasPDF')){

            $nombrereferencias=rand().'-'.$referencias->getClientOriginalName();

            $referencias->move($destinationPath,$nombrereferencias);

        }else{

            $nombrereferencias = "";

        }



        if($convenio=$request->file('convenioPDF')){

            $nombreconvenio=rand().'-'.$convenio->getClientOriginalName();

            $convenio->move($destinationPath,$nombreconvenio);

        }else{

            $nombreconvenio = "";

        }



        if($acta=$request->file('actaPDF')){

            $nombreacta=rand().'-'.$acta->getClientOriginalName();

            $acta->move($destinationPath,$nombreacta);



        }else{

            $nombreacta = "";

        }



        if($ine=$request->file('inePDF')){

            $nombreine=rand().'-'.$ine->getClientOriginalName();

            $ine->move($destinationPath,$nombreine);



        }else{

            $nombreine = "";

        }



        if($pasaporte=$request->file('pasaportePDF')){

            $nombrepasaporte=rand().'-'.$pasaporte->getClientOriginalName();

            $pasaporte->move($destinationPath,$nombrepasaporte);



        }else{

            $nombrepasaporte = "";

        }



        if($curp=$request->file('curpPDF')){

            $nombrecurp=rand().'-'.$curp->getClientOriginalName();

            $curp->move($destinationPath,$nombrecurp);



        }else{

            $nombrecurp = "";

        }



        if($rfc=$request->file('rfcPDF')){

            $nombrerfc=rand().'-'.$rfc->getClientOriginalName();

            $rfc->move($destinationPath,$nombrerfc);



        }else{

            $nombrerfc = "";

        }



        if($cv=$request->file('cvPDF')){

            $nombrecv=rand().'-'.$cv->getClientOriginalName();

            $cv->move($destinationPath,$nombrecv);



        }else{

            $nombrecv = "";

        }



        if($comprobante=$request->file('comprobantePDF')){

            $nombrecomprobante=rand().'-'.$comprobante->getClientOriginalName();

            $comprobante->move($destinationPath,$nombrecomprobante);



        }else{

            $nombrecomprobante = "";

        }



        if($nss=$request->file('nssPDF')){

            $nombrenss=rand().'-'.$nss->getClientOriginalName();

            $nss->move($destinationPath,$nombrenss);



        }else{

            $nombrenss = "";

        }



        if($cuentabancaria=$request->file('cuentabancariaPDF')){

            $nombrecuentabancaria=rand().'-'.$cuentabancaria->getClientOriginalName();

            $cuentabancaria->move($destinationPath,$nombrecuentabancaria);



        }else{

            $nombrecuentabancaria = "";

        }



        if($documentosextras=$request->file('documentosextrasPDF')){

            $nombredocumentosextras=rand().'-'.$documentosextras->getClientOriginalName();

            $documentosextras->move($destinationPath,$nombredocumentosextras);



        }else{

            $nombredocumentosextras = "";

        }



        $EmpleadosDoc  = MasterEseEmpleadosDoc::Create([

            "IdEmpleado" => $empl, 

            "ArchivoFoto" => $nombrefotografia,

            "ArchivoReferencias" => $nombrereferencias,

            "ArchivoConvenio" => $nombreconvenio,

            "ArchivoActaNacimiento" => $nombreacta,

            "ArchivoIdentificacion" => $nombreine,

            "ArchivoPasaporte" => $nombrepasaporte,

            "ArchivoCurp" => $nombrecurp,

            "ArchivoRfc" => $nombrerfc,

            "ArchivoCv" => $nombrecv,

            "ArchivoComprobante" => $nombrecomprobante,

            "ArchivoNss" => $nombrenss,

            "ArchivoCuentaBancaria" => $nombrecuentabancaria,

            "ArchivoDocumentosExtras" => $nombredocumentosextras,

            "FechaAlta" => date('Y-m-d H:i:s')

        ]);



        for ($x = 0; $x < count($arr); $x++) {

            $ireg=$arr[$x];

            DB::insert("INSERT INTO master_region_inv (IdInvestigador,IdRegion) VALUES ($empl,$ireg)");



        }



      } catch (Exception $e) {

        return redirect('/CatalogoInvestigadores')->with(['success' =>  "Se ha producido una excepción. Los detalles son los siguientes:".$e->getMessage()." ".$e->getLine(),

        'type'    => 'error']);

            // echo "Se ha producion una excepción. Los detalles son los siguientes:";

            // var_dump($e);

      } finally {

            // return response()->json(['status_alta' => 'success']);

            return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se creó con éxito',

            'type'    => 'success']);

      }

    }



    public function show($id)

    {

        //

    }



    public function edit($id)

    {

        $url_referer = explode("/",$_SERVER['HTTP_REFERER']);

        $catalogoSeleccionado = end($url_referer);

        if($catalogoSeleccionado != "CatalogoAnalistas"){

            $Empleado = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

                array(

                    "IdEmpleado" => $id

                )

            );

        }else{

            $Empleado = MasterConsultas::exeSQL("catalogo_analistas", "READONLY",

                array(

                    "IdEmpleado" => $id

                )

            );



        }



        // $DocumentoEmpleado = DB::table('master_ese_empleadosdocumentos')

        // ->join('master_ese_empleado','master_ese_empleado.IdEmpleado', '=', 'master_ese_empleadosdocumentos.IdEmpleado')

        // ->select('master_ese_empleadosdocumentos.IdDocumentoEmpleado','master_ese_empleadosdocumentos.IdEmpleado'

        // ,'master_ese_empleadosdocumentos.ArchivoFoto','master_ese_empleadosdocumentos.ArchivoReferencias','master_ese_empleadosdocumentos.ArchivoConvenio'

        // ,'master_ese_empleadosdocumentos.ArchivoActaNacimiento','master_ese_empleadosdocumentos.ArchivoIdentificacion'

        // ,'master_ese_empleadosdocumentos.ArchivoPasaporte','master_ese_empleadosdocumentos.ArchivoCurp','master_ese_empleadosdocumentos.ArchivoRfc'

        // ,'master_ese_empleadosdocumentos.ArchivoCv','master_ese_empleadosdocumentos.ArchivoComprobante','master_ese_empleadosdocumentos.ArchivoNss'

        // ,'master_ese_empleadosdocumentos.ArchivoCuentaBancaria','master_ese_empleadosdocumentos.ArchivoDocumentosExtras')

        // ->get();



        $DocumentoEmpleado = MasterConsultas::exeSQL("documentos_empleados", "READONLY",

        array(

            "id" => $id

        )

        );



        foreach ($Empleado as  $c) {

                $IdEmpleado = $c->IdEmpleado;

                $Rfc = $c->Rfc;

                $Curp = $c->Curp;

                $Nombre = $c->Nombre;

                $SegundoNombre = $c->SegundoNombre;

                $ApellidoPaterno = $c->ApellidoPaterno;

                $ApellidoMaterno = $c->ApellidoMaterno;

                $Genero = $c->Genero;

                $IdBanco = $c->IdBanco;

                $NumCuenta = $c->NumCuenta;

                $NumTarjeta = $c->NumTarjeta;

                $ClabeInt = $c->ClabeInt;

                $Email = $c->Email;

                $TelefonoMovil = $c->TelefonoMovil;

                $TelefonoLocal = $c->TelefonoLocal;

                $Extension = $c->Extension;

                $Calle = $c->Calle;

                $Colonia = $c->Colonia;

                $NoInt = $c->NoInt;

                $NoExt = $c->Rfc;

                $IdPais = $c->IdPais;

                $IdEstado = $c->IdEstado;

                $Municipio = $c->Municipio;

                $Localidad = $c->Localidad;

                $IdCodigoPostal = $c->IdCodigoPostal;

                $CodigoPostal = $c->CodigoPostal;

                $Referencias = $c->Referencias;

                $FechaAlta = $c->FechaAlta;

                $IdPuesto = $c->IdPuesto;

                $IdRol = $c->IdRol;

                $Usuario = $c->username;

                $Password = $c->password_aux;

                $CoordenadasGmaps = $c->CoordenadasGmaps;

                $Localizacion = $c->url_ubicacion;

                $ColUpdate = $c->Colonia;

                $IdUsuario = $c->IdUsuario;



        }

        $mens='';

        $IdDocumentoEmpleado="";

        $ArchivoFoto = "";

        $ArchivoReferencias = "";

        $ArchivoConvenio = "";

        $ArchivoActaNacimiento = "";

        $ArchivoIdentificacion = "";

        $ArchivoPasaporte = "";

        $ArchivoCurp = "";

        $ArchivoRfc = "";

        $ArchivoCv = "";

        $ArchivoComprobante = "";

        $ArchivoNss = "";

        $ArchivoCuentaBancaria = "";

        $ArchivoDocumentosExtras = "";



        foreach ($DocumentoEmpleado as  $d) {

            $IdDocumentoEmpleado = $d->IdDocumentoEmpleado;

            $ArchivoFoto = $d->ArchivoFoto;

            $ArchivoReferencias = $d->ArchivoReferencias;

            $ArchivoConvenio = $d->ArchivoConvenio;

            $ArchivoActaNacimiento = $d->ArchivoActaNacimiento;

            $ArchivoIdentificacion = $d->ArchivoIdentificacion;

            $ArchivoPasaporte = $d->ArchivoPasaporte ;

            $ArchivoCurp = $d->ArchivoCurp;

            $ArchivoRfc = $d->ArchivoRfc;

            $ArchivoCv = $d->ArchivoCv ;

            $ArchivoComprobante = $d->ArchivoComprobante;

            $ArchivoNss = $d->ArchivoNss;

            $ArchivoCuentaBancaria = $d->ArchivoCuentaBancaria;

            $ArchivoDocumentosExtras = $d->ArchivoDocumentosExtras;



        }

        $destinationPath = '';

        $RutaFoto= "$destinationPath$ArchivoFoto";

        $RutaReferencias= "$destinationPath$ArchivoReferencias";

        $RutaConvenio= "$destinationPath$ArchivoConvenio";

        $RutaActaNacimiento= "$destinationPath$ArchivoActaNacimiento";

        $RutaIdentificacion= "$destinationPath$ArchivoIdentificacion";

        $RutaPasaporte= "$destinationPath$ArchivoPasaporte";

        $RutaCurp= "$destinationPath$ArchivoCurp";

        $RutaRfc= "$destinationPath$ArchivoRfc";

        $RutaCv= "$destinationPath$ArchivoCv";

        $RutaComprobante= "$destinationPath$ArchivoComprobante";

        $RutaNss= "$destinationPath$ArchivoNss";

        $RutaCuentaBancaria= "$destinationPath$ArchivoCuentaBancaria";

        $RutaDocumentosExtras= "$destinationPath$ArchivoDocumentosExtras";



        $destinationPath = '/uploads/';

        //$headers = [

        //    'Content-Type' => 'application/pdf',

        // ];



        //return Response::download($file, 'foto.pdf', $headers);

        $active_tab='Usuario';

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



        // $regiones=DB::select("select DISTINCT mr.Nombre as Region,mr.IdRegion from master_regiones mr

        // inner join master_region_edo mre on mre.IdRegion = mr.IdRegion

        // where mre.IdEstado = $IdState");

       $IdBanco=(!empty($IdBanco))?$IdBanco:0;

       $Bancos=DB::table('master_bancos')

            ->select('IdBanco','Descripcion')

           ->orderByRaw("FIELD(IdBanco, $IdBanco) DESC")

            ->get();



        foreach ($Bancos as $bank) {

            $bancos[$bank->IdBanco] = $bank->Descripcion;

        }



        $roles = $IdRol;



        $Puestos=DB::table('master_ese_puestoempleado')

            ->select('IdPuesto','Descripcion')

           ->orderByRaw("FIELD(IdPuesto, $IdPuesto) DESC")

            ->get();



        foreach ($Puestos as $puesto) {

            $puestos[$puesto->IdPuesto] = $puesto->Descripcion;

        }



        $estadosQuery = "SELECT

                            e.IdEstado,

                            e.FK_nombre_estado

                        FROM estados e

                        WHERE e.FK_nombre_estado IS NOT NULL

                        ORDER BY e.IdEstado";

        $estados = DB::select($estadosQuery);



        $coberturaQuery = "SELECT

                                meci.Id,

                                meci.IdEmpleado,

                                e.IdEstado,

                                e.FK_nombre_estado,

                                mm.IdMunicipio,

                                mm.Descripcion

                            FROM estados e

                                INNER JOIN master_municipios mm

                                ON e.Codigo = mm.CodigoEstado

                                INNER JOIN master_ese_cobertura_inv meci 

                                ON mm.IdMunicipio = meci.IdMunicipio

                            WHERE meci.IdEmpleado = ?";

        $cobertura = DB::select($coberturaQuery, [$id]);



        $usuarios = DB::select("SELECT u.*,r.name AS namerol FROM users u 

                                INNER JOIN roles r ON u.IdRol=r.id

                                WHERE u.IdRol = 105 OR u.IdRol = 98; 

                                ");

              return view("ESE.catalogos.empleadosedit")

              ->with('IdEmpleado', $IdEmpleado)

              ->with('cp', $codpost)

              ->with('State', $State)

              ->with('IdState', $IdState)

              ->with('Municipio',$Municipio)

              ->with('Colonia', $Colonia)

              ->with('Localidad', $Localidad)

              ->with('IdCodigoPostal', $IdCodigoPostal)

              ->with('Bancos', $bancos)

              ->with('Roles', $roles)

              ->with('Puestos', $puestos)

              ->with('IdPais', $IdPais)

              ->with('Rfc',$Rfc)

              ->with('Curp',$Curp)

              ->with('Nombre',$Nombre)

              ->with('SegundoNombre',$SegundoNombre)

              ->with('ApellidoPaterno',$ApellidoPaterno)

              ->with('ApellidoMaterno',$ApellidoMaterno)

              ->with('genero',$Genero)

              ->with('IdBanco',$IdBanco)

              ->with('NumCuenta',$NumCuenta)

              ->with('NumTarjeta',$NumTarjeta)

              ->with('ClabeInt',$ClabeInt)

              ->with('Email',$Email)

              ->with('TelefonoMovil',$TelefonoMovil)

              ->with('TelefonoLocal',$TelefonoLocal)

              ->with('Extension',$Extension)

              ->with('Calle',$Calle)

              ->with('Colonia',$Colonia)

              ->with('NoInt',$NoInt)

              ->with('NoExt',$NoExt)

              ->with('IdPais',$IdPais)

              ->with('IdEstado',$IdEstado)

              ->with('Municipio',$Municipio)

              ->with('Localidad',$Localidad)

              ->with('IdCodigoPostal',$IdCodigoPostal)

              ->with('CodigoPostal',$CodigoPostal)

              ->with('Referencias',$Referencias)

              ->with('FechaAlta',$FechaAlta)

              ->with('IdPuesto',$IdPuesto)

              ->with('IdRol',$IdRol)

              ->with('Usuario',$Usuario)

              ->with('Password',$Password)

            //   ->with('Regiones',$regiones)

              // Documentos

              ->with('IdDocumentoEmpleado',$IdDocumentoEmpleado)

              ->with('RutaFoto',$RutaFoto)

              ->with('RutaReferencias',$RutaReferencias)

              ->with('RutaConvenio',$RutaConvenio)

              ->with('RutaActaNacimiento',$RutaActaNacimiento)

              ->with('RutaIdentificacion',$RutaIdentificacion)

              ->with('RutaPasaporte',$RutaPasaporte)

              ->with('RutaCurp',$RutaCurp)

              ->with('RutaRfc',$RutaRfc)

              ->with('RutaCv',$RutaCv)

              ->with('RutaComprobante',$RutaComprobante)

              ->with('RutaNss',$RutaNss)

              ->with('RutaCuentaBancaria',$RutaCuentaBancaria)

              ->with('RutaDocumentosExtras',$RutaDocumentosExtras)

              ->with('CoordenadasGmaps',$CoordenadasGmaps)

              ->with('Localizacion',$Localizacion)

              ->with('ColUpdate',$ColUpdate)

              ->with("catalogoSeleccionado",$catalogoSeleccionado)

              ->with("usuarios",$usuarios)

              ->with("IdUsuario",$IdUsuario)

              ->with("estados",$estados)

              ->with("cobertura",$cobertura)

              ->with("active_tab",$active_tab)

              ->with("mensaje",$mens)

              ->with("action","edit");

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request)

    {

        // try {

            // $datos = $request->input('datos');

            // parse_str(urldecode($_POST['datos']), $datos);

            $IdEmpleado=$request->IdEmpleado;

            $EmpDatos = MasterEseEmpleado::where('IdEmpleado',$request->IdEmpleado)->first();

            $url_referer = explode("/",$_SERVER['HTTP_REFERER']);

            $catalogoSeleccionado = end($url_referer);

            if($request->input('catalogoSeleccionado') == "CatalogoAnalistas"){

                $IdUsuario = $request->usuarios;

                $IdPuesto = $EmpDatos->IdPuesto; 

            }else{

                $IdUsuario = $EmpDatos->IdUsuario;

                $IdPuesto = $request->IdPuesto;

            }

            $Usuario               = $request->Usuario;

            $Email                 = $request->Email;

            $IdRol                 = $request->IdRol;





            if($request->active_tab=='Usuario'){

                $EmpDatos->update([

                    "Rfc" => $request->Rfc,

                    "Curp" => $request->Curp,

                    "Nombre" => $request->Nombre,

                    "SegundoNombre" => $request->SegundoNombre,

                    "ApellidoPaterno" => $request->ApellidoPaterno,

                    "ApellidoMaterno" => $request->ApellidoMaterno,

                    "Genero" => $request->genero,

                    "IdBanco" => $request->IdBanco,

                    "NumCuenta" => $request->NumCuenta,

                    "NumTarjeta" => $request->NumTarjeta,

                    "ClabeInt" => $request->ClabeInt,

                    "Email" => $request->Email,

                    "TelefonoMovil" => $request->TelefonoMovil,

                    "TelefonoLocal" => $request->TelefonoLocal,

                    "Extension" => $request->Extension,

                    "Calle" => $request->Calle,

                    "Colonia" => $request->Colonia,

                    "NoInt" => isset($request->NoInt)?$request->NoInt:'',

                    "NoExt" => isset($request->NoExt)?$request->NoExt:'',

                    "IdPais" => $request->IdPais,

                    "IdEstado" => $request->IdEstado,

                    "Municipio" => $request->municipio,

                    "Localidad" => $request->Localidad,

                    "IdCodigoPostal" => $request->IdCodigoPostal,

                    "CodigoPostal" => $request->CP,

                    "Referencias" => $request->Referencias,

                    "CoordenadasGmaps" => $request->Coordendas,

                    "url_ubicacion" => $request->Localizacion,

                    "FechaAlta" => date('Y-m-d H:i:s'),

                    "IdPuesto" => $IdPuesto,

                    "IdUsuario" => $IdUsuario

                ]);

                

                $IdEmpleado=$request->IdEmpleado;

                $active_tab = "DatosGenerales";



            }



            if($request->active_tab=='DatosGenerales'){

              

                $EmpDatos->update([

                    "Rfc" => $request->Rfc,

                    "Curp" => $request->Curp,

                    "Nombre" => $request->Nombre,

                    "SegundoNombre" => $request->SegundoNombre,

                    "ApellidoPaterno" => $request->ApellidoPaterno,

                    "ApellidoMaterno" => $request->ApellidoMaterno,

                    "Genero" => $request->genero,

                    "IdBanco" => $request->IdBanco,

                    "NumCuenta" => $request->NumCuenta,

                    "NumTarjeta" => $request->NumTarjeta,

                    "ClabeInt" => $request->ClabeInt,

                    "Email" => $request->Email,

                    "TelefonoMovil" => $request->TelefonoMovil,

                    "TelefonoLocal" => $request->TelefonoLocal,

                    "Extension" => $request->Extension,

                    "Calle" => $request->Calle,

                    "Colonia" => $request->Colonia,

                    "NoInt" => isset($request->NoInt)?$request->NoInt:'',

                    "NoExt" => isset($request->NoExt)?$request->NoExt:'',

                    "IdPais" => $request->IdPais,

                    "IdEstado" => $request->IdEstado,

                    "Municipio" => $request->municipio,

                    "Localidad" => $request->Localidad,

                    "IdCodigoPostal" => $request->IdCodigoPostal,

                    "CodigoPostal" => $request->CP,

                    "Referencias" => $request->Referencias,

                    "CoordenadasGmaps" => $request->Coordendas,

                    "url_ubicacion" => $request->Localizacion,

                    "FechaAlta" => date('Y-m-d H:i:s'),

                    "IdPuesto" => $IdPuesto,

                    "IdUsuario" => $IdUsuario

                ]);

                

                $IdEmpleado=$request->IdEmpleado;

                $active_tab = "Documentos";

            }



            if($request->active_tab=='Documentos'){



                $EmpDoctosDatos = MasterEseEmpleadosDoc::where('IdEmpleado', $request->IdEmpleado)->first();



                if($EmpDoctosDatos){



                    if (!file_exists('uploads')) {

                        mkdir('uploads', 0777, true);

                    }

        

                    $destinationPath = 'uploads';

                    if($fotografia=$request->file('fotografiaPDF')){

                        $nombrefotografia=rand().'-'.$fotografia->getClientOriginalName();

                        $fotografia->move($destinationPath,$nombrefotografia);

        

                    }else{

                        $nombrefotografia = (!empty($request->foto))?$request->foto:'';

                    }

        

                    if($referencias=$request->file('referenciasPDF')){

                        $nombrereferencias=rand().'-'.$referencias->getClientOriginalName();

                        $referencias->move($destinationPath,$nombrereferencias);

                    }else{

                        $nombrereferencias = (!empty($request->Referencias_pdf))?$request->Referencias_pdf:'';

                    }

        

                    if($convenio=$request->file('convenioPDF')){

                        $nombreconvenio=rand().'-'.$convenio->getClientOriginalName();

                        $convenio->move($destinationPath,$nombreconvenio);

        

                    }else{

                        $nombreconvenio = (!empty($request->Convenio_pdf))?$request->Convenio_pdf:'';

                    }

        

                    if($acta=$request->file('actaPDF')){

                        $nombreacta=rand().'-'.$acta->getClientOriginalName();

                        $acta->move($destinationPath,$nombreacta);

        

                    }else{

                        $nombreacta = (!empty($request->Acta_pdf))?$request->Acta_pdf:'';

                    }

        

                    if($ine=$request->file('inePDF')){

                        $nombreine=rand().'-'.$ine->getClientOriginalName();

                        $ine->move($destinationPath,$nombreine);

        

                    }else{

                        $nombreine = (!empty($request->Ine_pdf))?$request->Ine_pdf:'';

                    }

        

                    if($pasaporte=$request->file('pasaportePDF')){

                        $nombrepasaporte=rand().'-'.$pasaporte->getClientOriginalName();

                        $pasaporte->move($destinationPath,$nombrepasaporte);

        

                    }else{

                        $nombrepasaporte = (!empty($request->Pasaporte_pdf))?$request->Pasaporte_pdf:'';

                    }

        

                    if($curp=$request->file('curpPDF')){

                        $nombrecurp=rand().'-'.$curp->getClientOriginalName();

                        $curp->move($destinationPath,$nombrecurp);

        

                    }else{

                        $nombrecurp = (!empty($request->Curp_pdf))?$request->Curp_pdf:'';

                    }

        

                    if($rfc=$request->file('rfcPDF')){

                        $nombrerfc=rand().'-'.$rfc->getClientOriginalName();

                        $rfc->move($destinationPath,$nombrerfc);

        

                    }else{

                        $nombrerfc = (!empty($request->Rfc_pdf))?$request->Rfc_pdf:'';

                    }

        

                    if($cv=$request->file('cvPDF')){

                        $nombrecv=rand().'-'.$cv->getClientOriginalName();

                        $cv->move($destinationPath,$nombrecv);

        

                    }else{

                        $nombrecv = (!empty($request->Cv_pdf))?$request->Cv_pdf:'';

                    }

        

                    if($comprobante=$request->file('comprobantePDF')){

                        $nombrecomprobante=rand().'-'.$comprobante->getClientOriginalName();

                        $comprobante->move($destinationPath,$nombrecomprobante);

        

                    }else{

                        $nombrecomprobante = (!empty($request->Comprobante_pdf))?$request->Comprobante_pdf:''; 

                    }

        

                    if($nss=$request->file('nssPDF')){

                        $nombrenss=rand().'-'.$nss->getClientOriginalName();

                        $nss->move($destinationPath,$nombrenss);

        

                    }else{

                        $nombrenss = (!empty($request->Nss_pdf))?$request->Nss_pdf:'';

                    }

        

                    if($cuentabancaria=$request->file('cuentabancariaPDF')){

                        $nombrecuentabancaria=rand().'-'.$cuentabancaria->getClientOriginalName();

                        $cuentabancaria->move($destinationPath,$nombrecuentabancaria);

        

                    }else{

                        $nombrecuentabancaria = (!empty($request->CuentaBancaria_pdf))?$request->CuentaBancaria_pdf:'';

                    }

        

                    if($documentosextras=$request->file('documentosextrasPDF')){

                        $nombredocumentosextras=rand().'-'.$documentosextras->getClientOriginalName();

                        $documentosextras->move($destinationPath,$nombredocumentosextras);

        

                    }else{

                        $nombredocumentosextras = (!empty($request->DocumentoExtra_pdf))?$request->DocumentoExtra_pdf:'';

                    }

        

                    $EmpDoctosDatos = MasterEseEmpleadosDoc::where('IdEmpleado', $request->IdEmpleado)->first();

        

                    $EmpDoctosDatos->update([

                        "ArchivoFoto" => $nombrefotografia,

                        "ArchivoReferencias" => $nombrereferencias,

                        "ArchivoConvenio" => $nombreconvenio,

                        "ArchivoActaNacimiento" => $nombreacta,

                        "ArchivoIdentificacion" => $nombreine,

                        "ArchivoPasaporte" => $nombrepasaporte,

                        "ArchivoCurp" => $nombrecurp,

                        "ArchivoRfc" => $nombrerfc,

                        "ArchivoCv" => $nombrecv,

                        "ArchivoComprobante" => $nombrecomprobante,

                        "ArchivoNss" => $nombrenss,

                        "ArchivoCuentaBancaria" => $nombrecuentabancaria,

                        "ArchivoDocumentosExtras" => $nombredocumentosextras,

                        "FechaModificacion" => date('Y-m-d H:i:s')

                    ]);

           

                    $IdEmpleado=$request->IdEmpleado;

                



                }else{

                    $empl=$request->IdEmpleado;

                    $destinationPath = 'uploads';



                    if($fotografia=$request->file('fotografiaPDF')){

                        $nombrefotografia=rand().'-'.$fotografia->getClientOriginalName();

                        $fotografia->move($destinationPath,$nombrefotografia);



                    }else{

                        $nombrefotografia = "";

                    }



                    if($referencias=$request->file('referenciasPDF')){

                        $nombrereferencias=rand().'-'.$referencias->getClientOriginalName();

                        $referencias->move($destinationPath,$nombrereferencias);

                    }else{

                        $nombrereferencias = "";

                    }



                    if($convenio=$request->file('convenioPDF')){

                        $nombreconvenio=rand().'-'.$convenio->getClientOriginalName();

                        $convenio->move($destinationPath,$nombreconvenio);

                    }else{

                        $nombreconvenio = "";

                    }



                    if($acta=$request->file('actaPDF')){

                        $nombreacta=rand().'-'.$acta->getClientOriginalName();

                        $acta->move($destinationPath,$nombreacta);



                    }else{

                        $nombreacta = "";

                    }



                    if($ine=$request->file('inePDF')){

                        $nombreine=rand().'-'.$ine->getClientOriginalName();

                        $ine->move($destinationPath,$nombreine);



                    }else{

                        $nombreine = "";

                    }



                    if($pasaporte=$request->file('pasaportePDF')){

                        $nombrepasaporte=rand().'-'.$pasaporte->getClientOriginalName();

                        $pasaporte->move($destinationPath,$nombrepasaporte);



                    }else{

                        $nombrepasaporte = "";

                    }



                    if($curp=$request->file('curpPDF')){

                        $nombrecurp=rand().'-'.$curp->getClientOriginalName();

                        $curp->move($destinationPath,$nombrecurp);



                    }else{

                        $nombrecurp = "";

                    }



                    if($rfc=$request->file('rfcPDF')){

                        $nombrerfc=rand().'-'.$rfc->getClientOriginalName();

                        $rfc->move($destinationPath,$nombrerfc);



                    }else{

                        $nombrerfc = "";

                    }



                    if($cv=$request->file('cvPDF')){

                        $nombrecv=rand().'-'.$cv->getClientOriginalName();

                        $cv->move($destinationPath,$nombrecv);



                    }else{

                        $nombrecv = "";

                    }



                    if($comprobante=$request->file('comprobantePDF')){

                        $nombrecomprobante=rand().'-'.$comprobante->getClientOriginalName();

                        $comprobante->move($destinationPath,$nombrecomprobante);



                    }else{

                        $nombrecomprobante = "";

                    }



                    if($nss=$request->file('nssPDF')){

                        $nombrenss=rand().'-'.$nss->getClientOriginalName();

                        $nss->move($destinationPath,$nombrenss);



                    }else{

                        $nombrenss = "";

                    }



                    if($cuentabancaria=$request->file('cuentabancariaPDF')){

                        $nombrecuentabancaria=rand().'-'.$cuentabancaria->getClientOriginalName();

                        $cuentabancaria->move($destinationPath,$nombrecuentabancaria);



                    }else{

                        $nombrecuentabancaria = "";

                    }



                    if($documentosextras=$request->file('documentosextrasPDF')){

                        $nombredocumentosextras=rand().'-'.$documentosextras->getClientOriginalName();

                        $documentosextras->move($destinationPath,$nombredocumentosextras);



                    }else{

                        $nombredocumentosextras = "";

                    }





                    $EmpleadosDoc  = MasterEseEmpleadosDoc::Create([

                        "IdEmpleado" => $empl, 

                        "ArchivoFoto" => $nombrefotografia,

                        "ArchivoReferencias" => $nombrereferencias,

                        "ArchivoConvenio" => $nombreconvenio,

                        "ArchivoActaNacimiento" => $nombreacta,

                        "ArchivoIdentificacion" => $nombreine,

                        "ArchivoPasaporte" => $nombrepasaporte,

                        "ArchivoCurp" => $nombrecurp,

                        "ArchivoRfc" => $nombrerfc,

                        "ArchivoCv" => $nombrecv,

                        "ArchivoComprobante" => $nombrecomprobante,

                        "ArchivoNss" => $nombrenss,

                        "ArchivoCuentaBancaria" => $nombrecuentabancaria,

                        "ArchivoDocumentosExtras" => $nombredocumentosextras,

                        "FechaAlta" => date('Y-m-d H:i:s')

                    ]);



                    $IdEmpleado=$request->IdEmpleado;



                }

                

                $active_tab='DatosBancarios';

                

            }



            if($request->active_tab=='DatosBancarios'){

                

                $EmpDatos->update([

                    "Rfc" => $request->Rfc,

                    "Curp" => $request->Curp,

                    "Nombre" => $request->Nombre,

                    "SegundoNombre" => $request->SegundoNombre,

                    "ApellidoPaterno" => $request->ApellidoPaterno,

                    "ApellidoMaterno" => $request->ApellidoMaterno,

                    "Genero" => $request->genero,

                    "IdBanco" => $request->IdBanco,

                    "NumCuenta" => $request->NumCuenta,

                    "NumTarjeta" => $request->NumTarjeta,

                    "ClabeInt" => $request->ClabeInt,

                    "Email" => $request->Email,

                    "TelefonoMovil" => $request->TelefonoMovil,

                    "TelefonoLocal" => $request->TelefonoLocal,

                    "Extension" => $request->Extension,

                    "Calle" => $request->Calle,

                    "Colonia" => $request->Colonia,

                    "NoInt" => isset($request->NoInt)?$request->NoInt:'',

                    "NoExt" => isset($request->NoExt)?$request->NoExt:'',

                    "IdPais" => $request->IdPais,

                    "IdEstado" => $request->IdEstado,

                    "Municipio" => $request->municipio,

                    "Localidad" => $request->Localidad,

                    "IdCodigoPostal" => $request->IdCodigoPostal,

                    "CodigoPostal" => $request->CP,

                    "Referencias" => $request->Referencias,

                    "CoordenadasGmaps" => $request->Coordendas,

                    "url_ubicacion" => $request->Localizacion,

                    "FechaAlta" => date('Y-m-d H:i:s'),

                    "IdPuesto" => $IdPuesto,

                    "IdUsuario" => $IdUsuario

                ]);

                

                $IdEmpleado=$request->IdEmpleado;

                $active_tab='RegionesxInvestigador';

            }



            if($request->active_tab=='RegionesxInvestigador'){

                

                    $empl=$request->IdEmpleado;

                    // dd($request->TableMunicipiosSelectV);

                    $arr = (!empty($request->TableMunicipiosSelectV))?$request->TableMunicipiosSelectV:array();

                    

                    if(!empty($arr)){

                        $arr = explode(',', $request->TableMunicipiosSelectV);  

                        $arrValue = array();

                    

                        for ($x = 0; $x < count($arr); $x++) {

                            $value = explode('-',$arr[$x]);

                            $queryValue = "(".$empl.",".$value[0].",".$value[1].")";

                            array_push($arrValue,$queryValue);

                        }   

                        if(count($arrValue) > 0){

                            $queryValue = implode(',',$arrValue);

                            $queryInsert = "INSERT INTO master_ese_cobertura_inv (IdEmpleado,IdEstado,IdMunicipio) VALUES $queryValue";

                            DB::insert($queryInsert);

                        }

                    }

                $IdEmpleado=$request->IdEmpleado;

                $active_tab='Finalizar';

            }



           

            

            

            if($request->catalogoSeleccionado != "CatalogoAnalistas"){

                $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';

                $Password = $request->Password;

                $datos=DB::select($contr,[$Password]);

                $contras="";

                foreach ($datos as  $dato) {

                    $contras = $dato->pw;

                }

                $pass=bcrypt($Password);

    

                $UsrDatos = User::where('IdEmpleado', $request->IdEmpleado)->first();

    

                $UsrDatos->update([

                    "username" => $Usuario,

                    "idcn" => 24,

                    "password" => $pass,

                    "password_mobile" => $contras,

                    "password_aux" => $Password,

                    "email" => $Email,

                    "IdRol" => $IdRol,

                    "password_ese_mobile" => $contras

                ]);

            }



            $Empleado = MasterConsultas::exeSQL("master_ese_empleado", "READONLY",

                array(

                    "IdEmpleado" => $request->IdEmpleado

                )

            );



            $DocumentoEmpleado = MasterConsultas::exeSQL("documentos_empleados", "READONLY",

        array(

            "id" => $request->IdEmpleado

        )

        );



       



        foreach ($Empleado as  $c) {

                $IdEmpleado = $c->IdEmpleado;

                $Rfc = $c->Rfc;

                $Curp = $c->Curp;

                $Nombre = $c->Nombre;

                $SegundoNombre = $c->SegundoNombre;

                $ApellidoPaterno = $c->ApellidoPaterno;

                $ApellidoMaterno = $c->ApellidoMaterno;

                $Genero = $c->Genero;

                $IdBanco = $c->IdBanco;

                $NumCuenta = $c->NumCuenta;

                $NumTarjeta = $c->NumTarjeta;

                $ClabeInt = $c->ClabeInt;

                $Email = $c->Email;

                $TelefonoMovil = $c->TelefonoMovil;

                $TelefonoLocal = $c->TelefonoLocal;

                $Extension = $c->Extension;

                $Calle = $c->Calle;

                $Colonia = $c->Colonia;

                $NoInt = $c->NoInt;

                $NoExt = $c->Rfc;

                $IdPais = $c->IdPais;

                $IdEstado = $c->IdEstado;

                $Municipio = $c->Municipio;

                $Localidad = $c->Localidad;

                $IdCodigoPostal = $c->IdCodigoPostal;

                $CodigoPostal = $c->CodigoPostal;

                $Referencias = $c->Referencias;

                $FechaAlta = $c->FechaAlta;

                $IdPuesto = $c->IdPuesto;

                $IdRol = $c->IdRol;

                $Usuario = $c->username;

                $Password = $c->password_aux;

                $CoordenadasGmaps = $c->CoordenadasGmaps;

                $Localizacion = $c->url_ubicacion;

                $ColUpdate = $c->Colonia;

                $IdUsuario = $c->IdUsuario;



        }

        // dd($IdEmpleado);

        

        $IdDocumentoEmpleado="";

        $ArchivoFoto = "";

        $ArchivoReferencias = "";

        $ArchivoConvenio = "";

        $ArchivoActaNacimiento = "";

        $ArchivoIdentificacion = "";

        $ArchivoPasaporte = "";

        $ArchivoCurp = "";

        $ArchivoRfc = "";

        $ArchivoCv = "";

        $ArchivoComprobante = "";

        $ArchivoNss = "";

        $ArchivoCuentaBancaria = "";

        $ArchivoDocumentosExtras = "";



        foreach ($DocumentoEmpleado as  $d) {

            $IdDocumentoEmpleado = $d->IdDocumentoEmpleado;

            $ArchivoFoto = $d->ArchivoFoto;

            $ArchivoReferencias = $d->ArchivoReferencias;

            $ArchivoConvenio = $d->ArchivoConvenio;

            $ArchivoActaNacimiento = $d->ArchivoActaNacimiento;

            $ArchivoIdentificacion = $d->ArchivoIdentificacion;

            $ArchivoPasaporte = $d->ArchivoPasaporte ;

            $ArchivoCurp = $d->ArchivoCurp;

            $ArchivoRfc = $d->ArchivoRfc;

            $ArchivoCv = $d->ArchivoCv ;

            $ArchivoComprobante = $d->ArchivoComprobante;

            $ArchivoNss = $d->ArchivoNss;

            $ArchivoCuentaBancaria = $d->ArchivoCuentaBancaria;

            $ArchivoDocumentosExtras = $d->ArchivoDocumentosExtras;



        }

        $destinationPath = '';

        $RutaFoto= "$destinationPath$ArchivoFoto";

        $RutaReferencias= "$destinationPath$ArchivoReferencias";

        $RutaConvenio= "$destinationPath$ArchivoConvenio";

        $RutaActaNacimiento= "$destinationPath$ArchivoActaNacimiento";

        $RutaIdentificacion= "$destinationPath$ArchivoIdentificacion";

        $RutaPasaporte= "$destinationPath$ArchivoPasaporte";

        $RutaCurp= "$destinationPath$ArchivoCurp";

        $RutaRfc= "$destinationPath$ArchivoRfc";

        $RutaCv= "$destinationPath$ArchivoCv";

        $RutaComprobante= "$destinationPath$ArchivoComprobante";

        $RutaNss= "$destinationPath$ArchivoNss";

        $RutaCuentaBancaria= "$destinationPath$ArchivoCuentaBancaria";

        $RutaDocumentosExtras= "$destinationPath$ArchivoDocumentosExtras";



        $destinationPath = '/uploads/';

        //$headers = [

        //    'Content-Type' => 'application/pdf',

        // ];



        //return Response::download($file, 'foto.pdf', $headers);

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

       $IdBanco=(!empty($IdBanco))?$IdBanco:0;

       $Bancos=DB::table('master_bancos')

            ->select('IdBanco','Descripcion')

           ->orderByRaw("FIELD(IdBanco, $IdBanco) DESC")

            ->get();



        foreach ($Bancos as $bank) {

            $bancos[$bank->IdBanco] = $bank->Descripcion;

        }



        $roles = $IdRol;



        $Puestos=DB::table('master_ese_puestoempleado')

            ->select('IdPuesto','Descripcion')

           ->orderByRaw("FIELD(IdPuesto, $IdPuesto) DESC")

            ->get();



        foreach ($Puestos as $puesto) {

            $puestos[$puesto->IdPuesto] = $puesto->Descripcion;

        }



        $estadosQuery = "SELECT

                            e.IdEstado,

                            e.FK_nombre_estado

                        FROM estados e

                        WHERE e.FK_nombre_estado IS NOT NULL

                        ORDER BY e.IdEstado";

        $estados = DB::select($estadosQuery);



        $coberturaQuery = "SELECT

                                meci.Id,

                                meci.IdEmpleado,

                                e.IdEstado,

                                e.FK_nombre_estado,

                                mm.IdMunicipio,

                                mm.Descripcion

                            FROM estados e

                                INNER JOIN master_municipios mm

                                ON e.Codigo = mm.CodigoEstado

                                INNER JOIN master_ese_cobertura_inv meci 

                                ON mm.IdMunicipio = meci.IdMunicipio

                            WHERE meci.IdEmpleado = ?";

        $cobertura = DB::select($coberturaQuery, [$IdEmpleado]);



        $usuarios = DB::select("SELECT u.*,r.name AS namerol FROM users u 

                                INNER JOIN roles r ON u.IdRol=r.id

                                WHERE u.IdRol = 105 OR u.IdRol = 98; 

                                ");

        



            if($active_tab=='Finalizar'){

                // $ntf = new Notificaciones();

                // $statusNot=$ntf->notificaUsuariosInv($IdEmpleado,'USUARIO-INVESTIGADOR','UsuarioInvestigador',null);

                // if($statusNot==1){

                //     return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se actualizó con éxito y notificación enviada.',

                //     'type'    => 'success']);

                // }else{

                    return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se actualizó con éxito.',

                    'type'    => 'success']);

                // }

                    

                

                

            }else{

              return view("ESE.catalogos.empleadosedit")

              ->with('IdEmpleado', $IdEmpleado)

              ->with('cp', $codpost)

              ->with('State', $State)

              ->with('IdState', $IdState)

              ->with('Municipio',$Municipio)

              ->with('Colonia', $Colonia)

              ->with('Localidad', $Localidad)

              ->with('IdCodigoPostal', $IdCodigoPostal)

              ->with('Bancos', $bancos)

              ->with('Roles', $roles)

              ->with('Puestos', $puestos)

              ->with('IdPais', $IdPais)

              ->with('Rfc',$Rfc)

              ->with('Curp',$Curp)

              ->with('Nombre',$Nombre)

              ->with('SegundoNombre',$SegundoNombre)

              ->with('ApellidoPaterno',$ApellidoPaterno)

              ->with('ApellidoMaterno',$ApellidoMaterno)

              ->with('genero',$Genero)

              ->with('IdBanco',$IdBanco)

              ->with('NumCuenta',$NumCuenta)

              ->with('NumTarjeta',$NumTarjeta)

              ->with('ClabeInt',$ClabeInt)

              ->with('Email',$Email)

              ->with('TelefonoMovil',$TelefonoMovil)

              ->with('TelefonoLocal',$TelefonoLocal)

              ->with('Extension',$Extension)

              ->with('Calle',$Calle)

              ->with('Colonia',$Colonia)

              ->with('NoInt',$NoInt)

              ->with('NoExt',$NoExt)

              ->with('IdPais',$IdPais)

              ->with('IdEstado',$IdEstado)

              ->with('Municipio',$Municipio)

              ->with('Localidad',$Localidad)

              ->with('IdCodigoPostal',$IdCodigoPostal)

              ->with('CodigoPostal',$CodigoPostal)

              ->with('Referencias',$Referencias)

              ->with('FechaAlta',$FechaAlta)

              ->with('IdPuesto',$IdPuesto)

              ->with('IdRol',$IdRol)

              ->with('Usuario',$Usuario)

              ->with('Password',$Password)

              ->with('IdDocumentoEmpleado',$IdDocumentoEmpleado)

              ->with('RutaFoto',$RutaFoto)

              ->with('RutaReferencias',$RutaReferencias)

              ->with('RutaConvenio',$RutaConvenio)

              ->with('RutaActaNacimiento',$RutaActaNacimiento)

              ->with('RutaIdentificacion',$RutaIdentificacion)

              ->with('RutaPasaporte',$RutaPasaporte)

              ->with('RutaCurp',$RutaCurp)

              ->with('RutaRfc',$RutaRfc)

              ->with('RutaCv',$RutaCv)

              ->with('RutaComprobante',$RutaComprobante)

              ->with('RutaNss',$RutaNss)

              ->with('RutaCuentaBancaria',$RutaCuentaBancaria)

              ->with('RutaDocumentosExtras',$RutaDocumentosExtras)

              ->with('CoordenadasGmaps',$CoordenadasGmaps)

              ->with('Localizacion',$Localizacion)

              ->with('ColUpdate',$ColUpdate)

              ->with("catalogoSeleccionado",$catalogoSeleccionado)

              ->with("usuarios",$usuarios)

              ->with("IdUsuario",$IdUsuario)

              ->with("estados",$estados)

              ->with("cobertura",$cobertura)

              ->with("active_tab",$active_tab)

              ->with("mensaje",null)

              ->with("action","edit");

            }

                // Documentos Update

    



                // clearstatcache();

                // return response()->json(['status_alta' => 'success']); 

                // return redirect('/CatalogoInvestigadores')->with(['success' =>  'El registro se actualizó con éxito ',

                //         'type'    => 'success']);

                // if($request->input('IdRol')==4){

                //     v

                //     ->with(['success' =>  'El registro se actualizó con éxito',

                //         'type'    => 'success']);

                // }else{

                //     return redirect('/CatalogoAnalistas')

                // ->with(['success' =>  'El registro se actualizó con éxito',

                //     'type'    => 'success']);

                // }

        // } catch (\Exception $e) {

        //     return redirect('/CatalogoInvestigadores')->with(['success' =>  "Se ha producido una excepción. Los detalles son los siguientes:".$e->getMessage()." ".$e->getLine(),

        //                 'type'    => 'error']);

           

        // }





    }





    //UPDATE EMPLEADOS



    public function UpdateRegiones(Request $request)

    {

        $inv = $request->input('inv');

        

        $arr = $request->input('arr');



        $arr = array_diff($arr, array(" ",0,null));



        //INICIO ASIGNACION DE REGIONES POR INVESTIGADOR



        $ResMA=RegionesxInv::select('IdRegInv')->where('IdInvestigador', $inv)->get();

        // return array($inv,$arr,$ResMA);

        //CREACION SI NO SE HA ASIGNADO NINGUNA REGION

        sort($arr);

        if($ResMA->isEmpty()){

           

            for($Rma=0;$Rma<count($arr);$Rma++){

                $ireg=$arr[$Rma];

                DB::insert("INSERT INTO master_region_inv (IdInvestigador,IdRegion) VALUES ($inv,$ireg)");

               

            }

            

        }else if(count($arr)>count($ResMA)){

                for($Rma=0;$Rma<count($arr);$Rma++){

                    $ireg=$arr[$Rma];

                    $regiones=DB::select("select mre.IdRegInv,mre.IdRegion,mre.IdInvestigador from master_region_inv mre

                    where mre.IdRegion = $ireg and mre.IdInvestigador = $inv");

                    

                    if($regiones==null){

                        DB::insert("INSERT INTO master_region_inv (IdInvestigador,IdRegion) VALUES ($inv,$ireg)");

                    }else{

    

                        foreach ($regiones as $p) {

                            $IdRegInv=$p->IdRegInv;

                        }

                        DB::update("update master_region_inv set IdRegion=$ireg where IdRegInv = $IdRegInv");

                    }

                   

                }

            }else if(count($arr)<count($ResMA)){

                for($Rma=0;$Rma<count($arr);$Rma++){

                    $ireg=$arr[$Rma];

                    

                    $regiones=DB::select("select mre.IdRegInv,mre.IdRegion,mre.IdInvestigador from master_region_inv mre

                    where mre.IdRegion = $ireg and mre.IdInvestigador = $inv");

    

                    if($regiones==null){

                        DB::insert("INSERT INTO master_region_inv (IdInvestigador,IdRegion) VALUES ($inv,$ireg)");

                    }else{

                        foreach ($regiones as $p) {

                            $IdRegInv=$p->IdRegInv;

                        }

                        DB::update("update master_region_inv set IdRegion=$ireg where IdRegInv = $IdRegInv");

                    }

                        

                        

                   

                }



                $ResRA=RegionesxInv::select('IdRegion')->where('IdInvestigador', $inv)->get();



                foreach ($ResRA as $p) {

                    $arrRA[]=$p->IdRegion;

                }

                $dA1 = array_diff($arrRA, $arr);

                $dA2 = array_diff($arr, $arrRA);



                $diffe = array_merge($dA1, $dA2);

                $dif = collect($diffe);

                $rElim = $dif->unique();

                for($Rma=0;$Rma<count($rElim);$Rma++){

                    $regElm=$rElim[$Rma]; 



                    $regiones=DB::select("select mre.IdRegInv,mre.IdRegion,mre.IdInvestigador from master_region_inv mre

                    where mre.IdRegion = $regElm and mre.IdInvestigador = $inv");

    

                        foreach ($regiones as $p) {

                            DB::delete("delete from master_region_inv where IdRegInv = $p->IdRegInv");

                        }

                }



               

        }else if(count($arr)==count($ResMA)){

            $regiones=DB::select("select mre.IdRegInv,mre.IdRegion,mre.IdInvestigador from master_region_inv mre

            where mre.IdInvestigador = $inv");

            

            foreach ($regiones as $p) {

                $iqry[]=$p->IdRegInv;

            }

            for($Rma=0;$Rma<count($arr);$Rma++){

                $ireg=$arr[$Rma];

                $iriv=$iqry[$Rma];

                DB::update("update master_region_inv set IdRegion=$ireg where IdRegInv = $iriv");

               

            }

        }

    

        // return array($iqry,$ir,$ir);

        //FIN ASIGNACION DE REGIONES POR INVESTIGADOR



    }



    //FIN UPDATE EMPLEADOS



   /*public function actualizarDoc(Request $request, $id)

    {



    }*/





    public function destroy($id)

    {



        $catp=DB::select("select IdRol from users Where IdEmpleado=$id");



        foreach ($catp as $ctp) {

            $IdRol = $ctp->IdRol;

        }



        try {

          $DeleteCiudad=MasterConsultas::exeSQLStatement("delete_catalogo_empleado", "UPDATE",

          array(

              "IdEmpleado" => $id

          )

          );



        } catch (Exception $e) {



        	echo "Se ha producion una excepción. Los detalles son los siguientes:";

        	var_dump($e);

        } finally {

          if($IdRol==4){

              return redirect('CatalogoInvestigadores')

              ->with(['success' => ' El registro se eliminó con éxito',

                  'type'    => 'success']);

          }else{

              return redirect('CatalogoAnalistas')

              ->with(['success' => ' El registro se eliminó con éxito',

                  'type'    => 'success']);

          }

        }



    }



    public function searchCP(){



      $cod = $_POST['cp'];

      $query= "Select

        cp.IdCodigoPostal,

        p.IdPais,

        e.IdEstado,

        e.FK_nombre_estado as estado,

        m.IdMunicipio,

        m.Descripcion as Municipio,

        l.IdLocalidad,

        l.Descripcion as localidad,

        col.Colonia

         From    cfdi_codigopostal as cp

        INNER JOIN estados e on e.Codigo = cp.CodigoEstado

        left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

        left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

        left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)

        left join master_pais as p on (p.IdPais = e.IdPais)

         Where    cp.CodigoPostal = '{$cod}'

         ORDER BY CodigoPostal Asc" ;



      $CodigoPostal=DB::select($query);



      $result='';

      $IdEstado=0;

      foreach ($CodigoPostal as $cp) {

        $IdEstado=$cp->IdEstado;

        $result.= "$cp->IdCodigoPostal|$cp->IdPais|$cp->IdEstado|$cp->estado|$cp->IdMunicipio|$cp->Municipio|$cp->IdLocalidad|$cp->localidad|$cp->Colonia";

      }



      $regiones=DB::select("select DISTINCT mr.Nombre as Region,mr.IdRegion from master_regiones mr

      inner join master_region_edo mre on mre.IdRegion = mr.IdRegion

      where mre.IdEstado = $IdEstado");



      return response()->json(['result' => $result,'regiones'=>$regiones]);

    }





    public function RegionesEdit(Request $request)

    {

        $cod = $request->input('cp');

        $Investigador = $request->input('Investigador');

        $query= "Select

          cp.IdCodigoPostal,

          p.IdPais,

          e.IdEstado,

          e.FK_nombre_estado as estado,

          m.IdMunicipio,

          m.Descripcion as Municipio,

          l.IdLocalidad,

          l.Descripcion as localidad,

          col.Colonia

           From    cfdi_codigopostal as cp

          INNER JOIN estados e on e.Codigo = cp.CodigoEstado

          left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio

          left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad

          left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)

          left join master_pais as p on (p.IdPais = e.IdPais)

           Where    cp.CodigoPostal = '{$cod}'

           ORDER BY CodigoPostal Asc" ;

  

        $CodigoPostal=DB::select($query);

  

        $result='';

        $IdEstado=0;

        foreach ($CodigoPostal as $cp) {

          $IdEstado=$cp->IdEstado;

          $result.= "$cp->IdCodigoPostal|$cp->IdPais|$cp->IdEstado|$cp->estado|$cp->IdMunicipio|$cp->Municipio|$cp->IdLocalidad|$cp->localidad|$cp->Colonia";

        }

  

        $regiones=DB::select("select DISTINCT mr.Nombre as Region,mr.IdRegion from master_regiones mr

        inner join master_region_edo mre on mre.IdRegion = mr.IdRegion

        where mre.IdEstado = $IdEstado AND mr.Nombre

        NOT IN(

        select DISTINCT mr.Nombre from master_regiones mr

        inner join master_region_edo mre on mre.IdRegion = mr.IdRegion

        inner join master_region_inv mri on mri.IdRegion = mre.IdRegion

        where mri.IdInvestigador = $Investigador) ");

  

        return response()->json(['regiones'=>$regiones]);

      }



    public function RegSelect(Request $request)

    {

        $Investigador = $request->input('Investigador');

  

        $regiones=DB::select("select DISTINCT mr.Nombre as Region,mr.IdRegion from master_regiones mr

        inner join master_region_edo mre on mre.IdRegion = mr.IdRegion

        inner join master_region_inv mri on mri.IdRegion = mre.IdRegion

        where mri.IdInvestigador = $Investigador ");

  

        return response()->json(['regiones'=>$regiones]);

    }



    public function ubicacion(){



      $address = urlencode($_POST['address']);

        $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBr4c9PGyx6cY1EyfiMHup1XlcbZyGhAA0";

        $geocodeResponseData = file_get_contents($googleMapUrl);

        $responseData = json_decode($geocodeResponseData, true);

        echo $googleMapUrl;

      //   if($responseData['status']=='OK') {

      //       $latitude = isset($responseData['results'][0]['geometry']['location']['lat']) ? $responseData['results'][0]['geometry']['location']['lat'] : "";

      //       $longitude = isset($responseData['results'][0]['geometry']['location']['lng']) ? $responseData['results'][0]['geometry']['location']['lng'] : "";

      //       $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";

      //       if($latitude && $longitude && $formattedAddress) {

      //           $geocodeData = array($latitude,$longitude,$formattedAddress);

      //           return $geocodeData;

      //       } else {

      //           return false;

      //       }

      //   } else {

      //       echo "ERROR: {$responseData['status']}";

      //       return false;

      //   }

    }



    public function getMunicipios($IdEstado){

        $query = "SELECT

                    e.IdEstado,

                    e.FK_nombre_estado,

                    mm.IdMunicipio,

                    mm.Descripcion

                FROM estados e

                    INNER JOIN master_municipios mm

                    ON e.Codigo = mm.CodigoEstado

                WHERE e.IdEstado = ?;";

        $municipios = DB::select($query, [$IdEstado]);

        return response()->json(['data'=>$municipios]);



    }



    public function deleteMunicipioAsignado($Id,$IdEmpleado){

        try {

            DB::delete('delete from master_ese_cobertura_inv where Id = ?', [$Id]);

            $coberturaQuery = "SELECT

                                    meci.Id,

                                    meci.IdEmpleado,

                                    e.IdEstado,

                                    e.FK_nombre_estado,

                                    mm.IdMunicipio,

                                    mm.Descripcion

                                FROM estados e

                                    INNER JOIN master_municipios mm

                                    ON e.Codigo = mm.CodigoEstado

                                    INNER JOIN master_ese_cobertura_inv meci 

                                    ON mm.IdMunicipio = meci.IdMunicipio

                                WHERE meci.IdEmpleado = ?";

            $cobertura = DB::select($coberturaQuery, [$IdEmpleado]);

            $tbody = "";

            foreach($cobertura as $item){

                $tbody = $tbody. "<tr>

                            <td>$item->FK_nombre_estado</td>

                            <td>$item->Descripcion</td>

                            <td><input type='button' class='btn btn-sm btn-danger' onclick='deleteMucipioAsignado($item->Id,$item->IdEmpleado)' value='Eliminar'></td>

                          </tr>"; 

            }

            return response()->json([

                                    'status' => 'success',

                                    'tbody' => $tbody

                                ]);

        } catch (\Exception $e) {

            return response()->json([

                                    'status' => 'error',

                                    'message' => 'error: '.$e->getMessage()     

                                ]);

        }

    }



    function existEmailInvestigator($email){

        try {

            $resultEmail = MasterConsultas::exeSQL("get_exist_email_type_investigator","READONLY",array("paramEmail" => "$email"));

            $existEmail = false;

            if(count($resultEmail) > 0)

                $existEmail = true;

            return response()->json([

                                    "status" => "success",

                                    "existEmail" => $existEmail

                                    ]); 

        } catch (\Throwable $th) {

            return response()->json([

                                    "status" => "error"

                                    ]); 

        }

    }



    function existUsernameInvestigator($username){

        try {

            $resultUsername = MasterConsultas::exeSQL("get_exist_username","READONLY",array("paramUsername" => "$username"));

            $existUsername = false;

            if(count($resultUsername) > 0)

                $existUsername = true;

            return response()->json([

                                    "status" => "success",

                                    "existUsername" => $existUsername

                                    ]); 

        } catch (\Throwable $th) {

            return response()->json([

                                    "status" => "error"

                                    ]); 

        }

    }

}

