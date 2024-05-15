<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Cliente;
use App\Libs\Curp;
use App\Libs\Rfc;
use App\Contacto;
use App\Banco;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use App\CentroNegocio;
use App\Asignacion\ClienteCN;
use Session;
use App\Cotizacion;
class ClientesController extends Controller
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
    public function index( Request $request )
    {   
       /* $centros = CentroNegocio::find(4);
        dd( $centros->clientes_demo );
        */
       
        
        $peticion = $request->path();
            $clientes=DB::table('centros_negocio')->get();
            $clientes_select=[''=>'Seleccione una CN...'];
            foreach ($clientes as  $cliente) {
                $clientes_select[$cliente->id]="(".$cliente->nomenclatura.")"."  ".$cliente->nombre;
            }


        return view('crm.clientes.crm-clientes',[ 'peticion' => $peticion,'cn'=>$clientes_select ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request ) 
    {

            $peticion = $request->path();

            $clientes=DB::table('centros_negocio')->get();
            $clientes_select=[''=>'Seleccione una CN...'];
            foreach ($clientes as  $cliente) {
                $clientes_select[$cliente->id]=$cliente->nomenclatura;
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
            foreach ($ejecutivos as  $ejecutivo) {
                $ejecutivo_select[$ejecutivo->id]=$ejecutivo->nombre;
            }

              // Listado de CP
            $cp=DB::table('codigospostales')->get();
            $cp_select=[''=>'Seleccione un CP...'];
           /* foreach ($cp as  $cps) {
                $cp_select[$cps->CodigoPostal]=$cps->CodigoPostal;
            }*/

            $lugar_nacimiento = [];
            $estados = DB::table('estados')->get();
            foreach ($estados as $estado) {
                $lugar_nacimiento[$estado->renapo] = $estado->nombre_estado;
            }
            $actividad_economica = [];
            $actividad = DB::table('actividad_economica')->get();
            foreach ($actividad as $act) {
                $actividad_economica[$act->id] = $act->actividad_economica;
            }



           /* $actividad_economica= [ "0" => 'Seleccione una opción',
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
                                    "23" => 'Otros'];*/

        $tipos_clientes = DB::table('tipos_clientes')->get();

        $tipo_cliente_lista=['' => 'Seleccione una opción'];

        foreach ($tipos_clientes as $tipo) {
            $tipo_cliente_lista[$tipo->id]=$tipo->nombre;
        }



        return view('crm.clientes.crm-altaClientes',['cn'=>$clientes_select,'eje'=>$ejecutivo_select,'cp'=>$cp_select,'bancos' => $bancos,'lugar_nacimiento' => $lugar_nacimiento,'actividad_economica' => $actividad_economica,'tipo_cliente_lista' => $tipo_cliente_lista, 'peticion' => $peticion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Obtiene los valores del contacto telefono1 y correo1
       
        $resultado = $this->validarCampos($request); 

        if($resultado['resultado']){      

                $id_contacto            = null;
                $cliente                = Cliente::create($request->all());
                $cliente->id_cn         = $request->user()->idcn;
                $id_cliente             = $cliente->id;
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


                $this->asignarCN($request->user()->idcn, $cliente->id, $request->user()->id);
                $this->setCNActual($cliente->id, $request->user()->idcn);

                

                
                $name = [];
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

                $cliente->id_contacto_principal = $id_contacto;
                $cliente->save();                

               
                if($cliente){
                    $peticion = $request->peticion;
                    $slug     = ( $peticion == 'catalogo/clientes/create' ) ? 'catalogos' : 'crm'; 

                    $modulo         = Modulo::where('slug',$slug)->get();
                    $submodulo      = SubModulo::where('slug', $slug . '.clientes')->get();
                    $accion_kardex  = Accion::where('slug','alta')->get();

                    $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                                "id_usuario"    => $request->user()->id,
                                                "id_modulo"     => $modulo[0]->id,
                                                "id_submodulo"  => $submodulo[0]->id,
                                                "id_accion"     => $accion_kardex[0]->id,
                                                "id_objeto"     => $cliente->id,
                                                "descripcion"   => "Alta de un Cliente/Prospecto: " . $cliente->nombre_comercial]);

                    return response()->json(['status_alta' => 'success']);
                }
                
                 return response()->json(['status_alta' => 'wrong']);
        }

        return response()->json($resultado['lista_campos']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $cliente = Cliente::findOrFail($id);

        return response()->json(['cliente' => $id]);
                
            
      
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id)
    {

        $cliente_editar = Cliente::find($id);

         $clientes=DB::table('centros_negocio')->get();
            $clientes_select=[''=>'Seleccione una CN...'];
            foreach ($clientes as  $cliente) {
                $clientes_select[$cliente->id]=$cliente->nomenclatura;
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
            foreach ($ejecutivos as  $ejecutivo) {
                $ejecutivo_select[$ejecutivo->id]=$ejecutivo->nombre;
            }

              // Listado de CP
            $cp=DB::table('codigospostales')->get();
            $cp_select=[''=>'Seleccione un CP...'];
            foreach ($cp as  $cps) {
                $cp_select[$cps->CodigoPostal]=$cps->CodigoPostal;
            }

            $lugar_nacimiento = [];
            $estados = DB::table('estados')->get();
            
            foreach ($estados as $estado) {
                $estado_renapo =  trim($estado->renapo);
                $lugar_nacimiento[$estado_renapo] = $estado->nombre_estado;
            }
            
            /*$actividad_economica= [ ""  => 'Seleccione una opción',
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

                                    "100" => 'Otros'];*/
           $actividad_economica = [];
            $actividad = DB::table('actividad_economica')->get();
            foreach ($actividad as $act) {
                $actividad_economica[$act->id] = $act->actividad_economica;
            }




        $tipos_clientes = DB::table('tipos_clientes')->get();
        $tipo_cliente_lista = ['' => 'Seleccione una opción'];
        foreach($tipos_clientes as $tipo_cliente){
            $tipo_cliente_lista[$tipo_cliente->id] = $tipo_cliente->nombre;
        }


        $peticion = $request->path();

        return view('crm.clientes.edit-clientes',['cn'=>$clientes_select,'eje'=>$ejecutivo_select,'cp'=>$cp_select,'bancos' => $bancos,'cliente' => $cliente_editar,'lugar_nacimiento' => $lugar_nacimiento,'actividad_economica' => $actividad_economica,'tipo_cliente_lista'=>$tipo_cliente_lista, 'peticion' => $peticion, 'id_cliente' => $id]);
        
        
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
        $cliente = Cliente::find($id);        

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

            $contacto_nuevo = Contacto::find($id_contacto[$i]);
            $id_cliente     = null;


            if($contacto_nuevo){
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

        $cliente->update($request->all());
        if($id_contacto){ 
            $cliente->id_contacto_principal = $id_contact;
            $cliente->save();
        }
        //Banco::create($request->all());
        if($cliente){            


            $peticion = $request->peticion;
            $slug     = ( $peticion == 'catalogo/clientes/update' ) ? 'catalogos' : 'crm'; 

            $modulo         = Modulo::where('slug',$slug)->get();
            $submodulo      = SubModulo::where('slug', $slug . '.clientes')->get();
            $accion_kardex  = Accion::where('slug','modificacion')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $cliente->id,
                                        "descripcion"   => "Modificación de un Cliente/Prospecto: " . $cliente->nombre_comercial]);

            return response()->json(['status_alta' => 'success']);
        }
        
         return response()->json(['status_alta' => 'wrong']);
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
            if ($cliente){
                DB::table('contactos')->where('id_cliente', '=', $id)->delete();



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
                return response()->json(['success'=>$cliente->id]); 
            }
            else{
                return response()->json(['success'=> $cliente->id]);
            }
            
      
        }
        
    }

    public function listaClientes(Request $request)
    {   
        $clientes;
        $id_cn   = $request->user()->idcn;
        $id_user = $request->user()->id; 
        

        $query =    " SELECT ".
                    " clientes.tipo,".
                    " CASE clientes.tipo WHEN 1 THEN 'Prospecto' WHEN 2 THEN 'Cliente' END as clasificacion,".
                    " IFNULL(clientes.id,'') AS id,".
                    " IFNULL(clientes.nombre_comercial,'') AS nombre_cliente,".
                    " IFNULL(tipos_clientes.nombre,'') AS tipo_cliente,".
                    " IFNULL(centros_negocio.nombre,'') AS nombre_cn,".                    
                    //" IFNULL(users.name,'') AS nombre_ejecutivo,".
                 
                    " IFNULL(contactos.nombre_con,'') AS nombre_contacto,".
                    " IFNULL(contactos.apellido_paterno_con,'') AS apellido_paterno,".
                    " IFNULL(contactos.apellido_materno_con,'') AS apellido_materno,".
                    " IFNULL(contactos.correo1,'') AS correo1,".
                    " IFNULL(contactos.telefono1,'') AS telefono1,".
                    " IFNULL(contactos.celular1,'') AS celular1,".
                    " IFNULL(clientes.status,'') AS status".                         
                    " FROM        clientes".
                    " INNER JOIN cliente_cn_actual ON cliente_cn_actual.id_cliente = clientes.id ".
                    //" LEFT JOIN users       ON users.idcn = clientes.id_cn ".
                    //"                      AND users.id     = clientes.id_user".
                    " LEFT JOIN   centros_negocio ".
                                    "ON cliente_cn_actual.id_cn      = centros_negocio.id  ".                    
                    " LEFT JOIN contactos ON (contactos.id_clientes = clientes.id AND contactos.principal = 1) ".
                    " LEFT JOIN   tipos_clientes ".
                                    " ON tipos_clientes.id  = clientes.tipo_cliente ";
                    
        if($request->user()->is('admin')){
            $query .= " WHERE 1=1 ";
        }else{
            $query .= " WHERE centros_negocio.id   = $id_cn ";
        }
                
        if($request->status != 0){        
        
            $query .= " AND clientes.status = $request->status ";
        }
        
       // dd($query);
        $clientes = DB::select($query);


        return response()->json($clientes);

    }
     public function ValidacionClientes(Request $request)
    {   
       $datos=$request->all();
       
      // $response = response()->json($datos);
       

       return $datos ;

      

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
                
        foreach ($campos_validacion as $key) {
            $list_campos[]=$key->nombre_campo;
        }

        $cantidad_campos = count($list_campos);
        $result_list_campos = [];



        for($i=0;$i<$cantidad_campos;$i++){
            
            $tiene_propiedad = property_exists($campos_cliente, $list_campos[$i]);         
            if($tiene_propiedad){

                if($campos_cliente->$list_campos[$i]==''){               
                    if($guardar_registro) $guardar_registro = false;              

                    $result_list_campos[] = $list_campos[$i];
                }
            }            
        }  


        for($i=0;$i<$cantidad_campos;$i++){            
            $tiene_propiedad = property_exists($campos_contacto, $list_campos[$i]); 
            if($tiene_propiedad){           
                if($campos_contacto->$list_campos[$i]==''){               
                    if($guardar_registro) $guardar_registro = false;              

                    $result_list_campos[] = $list_campos[$i];
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

        $centro_negocio = CentroNegocio::find($request->id_cn);
        //$cliente_validacion =ClienteCN::where('id_cliente',$request->id_cliente);
        $cliente_validacion = DB::table('cliente_cn_actual')->where('id_cliente', '=',$request->id_cliente )->get();
        //dd($cliente_validacion);
       if($cliente_validacion[0]->id_cn==$request->id_cn)
        {
           return response()->json(['error'=>'wrong']);
           
        }


        if( $centro_negocio ){

            $clienteCn = $this->asignarCN($request->id_cn, $request->id_cliente, $request->user()->id);                                          

            $this->updateCNActual($request->id_cliente, $request->id_cn);            


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

}
