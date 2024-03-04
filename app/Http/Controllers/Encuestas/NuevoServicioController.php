<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;
use App\Bussines\MasterConsultas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use App\CentrosTrabajo;
use App\Departamentos;
use Illuminate\Support\Facades\Auth; 
use DB;
use App\Http\Controllers\Encuestas\Notificaciones;
use Crypt;


class NuevoServicioController extends Controller
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
        if(Auth::user()->tipo == 'c'){
            $clientes=DB::select('SELECT id AS Cliente,nombre_comercial AS Nombre FROM clientes where tipo=2 AND id='.Auth::user()->IdCliente);
        }else{
            $clientes=DB::select('SELECT id AS Cliente,nombre_comercial AS Nombre FROM clientes where tipo=2 ORDER BY nombre_comercial ASC');
        }
        

        $servicios = MasterConsultas::exeSQL("master_ev_tiposervicio", "READONLY",
            array(
                    "IdTipoServicio" => '-1'
                )
            );
        
        $now= Carbon::now();
        $fechaactual = $now->format('Y-m-d');

        return view("Encuestas.nuevoservicio.index",["clientes"=>$clientes, "servicios"=>$servicios,"fechaactual"=>$fechaactual]);
    }

    //Esta parte se queda, ya que su funcionalidad es útil para la creación de nuevos servicios
    public function createNS($IdTipoServicio , $IdCliente){

        
        $cliente=DB::select('SELECT nombre_comercial FROM clientes WHERE id='.$IdCliente);

        foreach($cliente as $cnte){
            $cliente=$cnte->nombre_comercial;
        }

        $tiposervicio=DB::select('SELECT Descripcion FROM master_ev_tiposervicio WHERE IdTipoServicio='.$IdTipoServicio);

        foreach($tiposervicio as $tpsv){
            $tiposervicio=$tpsv->Descripcion;
        }

        $now= Carbon::now();
        $fechaactual = $now->format('Y-m-d');

        return view("Encuestas.nuevoservicio.create.create",["IdTipoServicio"=>$IdTipoServicio, "IdCliente"=>$IdCliente,"fechaactual"=>$fechaactual,"cliente"=>$cliente,"tserv"=>$tiposervicio]);

    }

    public function createSRV($IdTipoServicio , $IdCliente){

        
        $cliente=DB::select('SELECT nombre_comercial FROM clientes WHERE id='.$IdCliente);

        foreach($cliente as $cnte){
            $cliente=$cnte->nombre_comercial;
        }

        $tiposervicio=DB::select('SELECT Descripcion FROM master_ev_tiposervicio WHERE IdTipoServicio='.$IdTipoServicio);

        foreach($tiposervicio as $tpsv){
            $tiposervicio=$tpsv->Descripcion;
        }

        $now= Carbon::now();
        $fechaactual = $now->format('Y-m-d');

        return view("Encuestas.nuevoservicio.create.createservicio",["IdTipoServicio"=>$IdTipoServicio, "IdCliente"=>$IdCliente,"fechaactual"=>$fechaactual,"cliente"=>$cliente,"tserv"=>$tiposervicio]);

    }

    public function obtenerFecha(Request $request){
        $IdCliente = $request->input('idcliente');
        $IdTipoServicio = $request->input('idtiposervicio');
        $fechadeservicio = $request->input('fechadeservicio');

        //$buscarregistro=DB::select('select * from ev_departamentos where IdCliente='.$IdCliente.' AND IdDeptoCliente<>'.$id.' AND Descripcion="'.$Descripcion.'"');
        $buscarregistro = DB::select('SELECT * FROM ev_servicio es INNER JOIN ev_periodos ep ON ep.IdCliente = es.IdCliente WHERE es.IdTipoServicio = '.$IdTipoServicio.' AND es.IdCliente = '.$IdCliente.' AND ep.Fecha = "'.$fechadeservicio.'"');
        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/nuevoservicio')->with(['success' => 'Ya existe un servicio con el mismo periodo para el cliente seleccionado',
            'type'    => 'danger']);
        }else{


            $cliente=DB::select('SELECT nombre_comercial FROM clientes WHERE id='.$IdCliente);

            foreach($cliente as $cnte){
                $cliente=$cnte->nombre_comercial;
            }

            $tiposervicio=DB::select('SELECT Descripcion FROM master_ev_tiposervicio WHERE IdTipoServicio='.$IdTipoServicio);

            foreach($tiposervicio as $tpsv){
                $tiposervicio=$tpsv->Descripcion;
            }

            return view("Encuestas.nuevoservicio.create.createservicio",
            ["IdTipoServicio"=>$IdTipoServicio, 
            "IdCliente"=>$IdCliente,
            "cliente"=>$cliente,
            "tiposervicio"=>$tiposervicio,
            "fechadeservicio"=>$fechadeservicio
            ]);

        }
    }


    //Después de seleccionar el Pop Up, creamos el servicio y rápidamente retornamos a la vista para agregar elementos en ella
    public function store(Request $request){
        //PASAMOS ESTOS VALORES DE ESTE CAMPO PARA QUE SE PUEDAN VISUALIZAR
        $IdCliente = $request->input('idcliente');
        $IdTipoServicio = $request->input('idTipoServicio');
        $FechadeServicio = $request->input('fecha');
        $data = null;


        $centroExistente = DB::select("select * from ev_centros_trabajo ect where ect.IdCliente =".$IdCliente);
        $departamentosExistente = DB::select("select * from ev_departamentos ed where ed.IdCliente =".$IdCliente);
        $puestosExistente = DB::select("SELECT * FROM ev_puestos ep where ep.IdCliente =".$IdCliente);

        $centrotra = $request->addmore[0]['Descripcion'];

        $departamento = $request->addmoreDepartamentos[0]['Descripcion'];

        var_dump($centrotra);

        // foreach($centroExistente as $row){
        //     foreach($request->addmore as $key){
        //         var_dump($key['Descripcion']);
        //         if($row->Descripcion == $key['Descripcion']){
        //             return redirect('/nuevoservicio')
        //             ->with(['success' => 'El registro no se pudo actualizar ya que algun centro de trabajo ya existe',
        //             'type'=>'danger']);
        //         }
        //     }
        // }
    
        $contadorDepartamento = 0;
        $contadorCentros = 0;
        $contadorPuestos = 0;

        $encuestas = DB::select('select * from ev_encuesta where Activo="Si"');

        //Inicio de la lectura de los select dinámico
        if ($request->addmoreDepartamentos!=null) {

            foreach ($request->addmoreDepartamentos as $key) {
                

                if( count($departamentosExistente) > 0) {
                    foreach($departamentosExistente as $row){

                        if($row->Descripcion == $key['Descripcion']){
                            $contadorDepartamento++;
                        }
                    }
    
    
                    if($contadorDepartamento < 1){
                        $idDepartamento = DB::table('ev_departamentos')->insertGetId([
                            'IdCliente' => $IdCliente,
                            'Descripcion' => str_replace('"','',json_encode($key['Descripcion']))
                        ]);
                    }
                }else{
                    $idDepartamento = DB::table('ev_departamentos')->insertGetId([
                        'IdCliente' => $IdCliente,
                        'Descripcion' => str_replace('"','',json_encode($key['Descripcion']))
                    ]);
                }

                $contadorDepartamento = 0;
                
            }
            foreach ($request->addmorePuestos as $key) {

                if( count($puestosExistente) > 0){
                    foreach($puestosExistente as $row3){
                        if($row3->Descripcion == $key['Descripcion']) {
                             $contadorPuestos++;
                        }
                     }
     
                     if($contadorPuestos < 1){
                         DB::table('ev_puestos')->insert([
                             'IdCliente' => $IdCliente,
                             'Descripcion' => str_replace('"','',json_encode($key['Descripcion'],JSON_UNESCAPED_UNICODE))
                         ]);
                     }
                }else{
                    DB::table('ev_puestos')->insert([
                        'IdCliente' => $IdCliente,
                        'Descripcion' => str_replace('"','',json_encode($key['Descripcion'],JSON_UNESCAPED_UNICODE))
                    ]); 
                }

                $contadorPuestos = 0;
            }
            $idPeriodo = DB::table('ev_periodos')->insertGetId([
                'IdCliente' => $IdCliente,
                'Fecha' => $FechadeServicio
            ]);
            $varL =  "{{url('')}}";
            $fechaServ=date_create(date("d-m-Y", strtotime($FechadeServicio)));
            $fechalimit=date_add($fechaServ, date_interval_create_from_date_string("30 days"));
            $idServicio = DB::table('ev_servicio')->insertGetId([
                'IdCliente' => $IdCliente,
                'IdTipoServicio' => $IdTipoServicio,
                'IdPeriodo' => $idPeriodo,
                'LinkSugerencias'=>'https://sigerpserv1.net/gen-t_fp/public/quejaSugerencia/'.$IdCliente.'/'.$idPeriodo,
                'dFechaVigenciaLink'=>$fechalimit,
                'Estatus' => 'Abierto'
            ]);
            foreach ($request->addmore as $key) {

                if( count($centroExistente) > 0){
                    foreach($centroExistente as $row2){
                        if($row2->Descripcion == $key['Descripcion']){
                            $contadorCentros++;
                        }
                    }
                    
                    if($contadorCentros < 1){
                        $idCentro = DB::table('ev_centros_trabajo')->insertGetId([
                            'IdCliente' =>$IdCliente,
                            'Descripcion' => str_replace('"','',json_encode($key['Descripcion']))
                        ]);

                        $idServicioCliente = DB::table('ev_servicio_cliente')->insertGetId([
                            'IdServicio' => $idServicio,
                            'IdCentro' => $idCentro,
                            'CantidadCentro' => json_decode($key['Cantidad']) 
                        ]);
        
                        $cantidad = json_decode($key['Cantidad']);
        
                        while($cantidad>0){
                            $IdPersonal = DB::table('ev_personal')->insertGetId([
                                'IdCliente' => $IdCliente,
                                'IdCentroTrabajo' => $idCentro
                            ]);
        
                            $fechAct=Carbon::now();
                            $CodigoUnico="COD-P".$IdPersonal;
                            foreach($encuestas as $encuesta){
                                $Link="https://sigerpserv1.net/gen-t_fp/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;
        
                                $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                                    'IdServicio_cliente' => $idServicioCliente,
                                    'IdEncuesta' => $encuesta->IdEncuesta,
                                    'IdPersonal' => $IdPersonal,
                                    'CodigoUnico' => $CodigoUnico,
                                    'Link' => $Link,
                                    'Fecha' => $fechAct
                                ]);
                            }
                            $cantidad--;
                        }
                    }
                }else{
                    $idCentro = DB::table('ev_centros_trabajo')->insertGetId([
                        'IdCliente' =>$IdCliente,
                        'Descripcion' => str_replace('"','',json_encode($key['Descripcion']))
                    ]);

                    $idServicioCliente = DB::table('ev_servicio_cliente')->insertGetId([
                        'IdServicio' => $idServicio,
                        'IdCentro' => $idCentro,
                        'CantidadCentro' => json_decode($key['Cantidad']) 
                    ]);
    
                    $cantidad = json_decode($key['Cantidad']);
    
                    while($cantidad>0){
                        $IdPersonal = DB::table('ev_personal')->insertGetId([
                            'IdCliente' => $IdCliente,
                            'IdCentroTrabajo' => $idCentro
                        ]);
    
                        $fechAct=Carbon::now();
                        $CodigoUnico="COD-P".$IdPersonal;
                        foreach($encuestas as $encuesta){
                            $Link="https://sigerpserv1.net/gen-t_fp/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;
    
                            $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                                'IdServicio_cliente' => $idServicioCliente,
                                'IdEncuesta' => $encuesta->IdEncuesta,
                                'IdPersonal' => $IdPersonal,
                                'CodigoUnico' => $CodigoUnico,
                                'Link' => $Link,
                                'Fecha' => $fechAct
                            ]);
                        }
                        $cantidad--;
                    }
                }

                $contadorCentros = 0;
            }

            $idOrdenServicio = DB::table('master_ese_srv_os')->insertGetId([
                'IdModulo' => '4',
                'IdCliente' => $IdCliente,
                'Estatus' => 'En Proceso',
                'FechaSolicitud' =>  $now= Carbon::now(),
                'FechaCierre' => null
            ]);

            $accionesExistentes = DB::select("select * from ev_acciones ea where ea.IdCliente =".$IdCliente);

            if(count($accionesExistentes) == 0 ){
                $accionesAba = DB::select("select * from ev_acciones ea where ea.IdCliente = 312 and ea.Predeterminado = 'Si' ORDER BY ea.IdDimension");
                if(count($accionesAba) > 0){
                    foreach( $accionesAba as $row){{
                        $idAcciones = DB::table('ev_acciones')->insertGetId([
                            'IdDimension' => $row->IdDimension,
                            'IdCliente' => $IdCliente,
                            'IdEncuestaCliente' => $row->IdEncuestaCliente,
                            'Descripcion' => $row->Descripcion
                        ]);
                    }}
                }
            }

            $documentosExistentes = DB::select("select * from ev_documentos ed where ed.IdCliente =".$IdCliente);

            if(count($documentosExistentes) == 0 ){
                $documentosGT = DB::select("select * from ev_documentos ed where ed.IdCliente = 312 and ed.Tipo = 'Basico'");
                if(count($documentosGT) > 0){
                    foreach( $documentosGT as $row){{
                        $idDocumentos = DB::table('ev_documentos')->insertGetId([
                            'IdCliente' => $IdCliente,
                            'Descripcion' => $row->Descripcion,
                            'Tipo' => $row->Tipo,
                            'Activo' => $row->Activo
                        ]);
                    }}
                }
            }

          
            $clientesTodos = DB::select('SELECT * FROM clientes');
            $clientes = DB::select('SELECT * FROM clientes WHERE id = '.$IdCliente);

            foreach($clientes as $ncli){
                $nombre_comercial=$ncli->nombre_comercial;
                $Id=$ncli->id;
            }
 
            // $cliente = array("nombre" => "Ivan Alegría",
            // "email" => "ijesusad@gmail.com");
         
            $notification = new Notificaciones();
            $notificacionLider = new Notificaciones();

            $lider = DB::select("SELECT c.id_cn FROM clientes c where c.id = ".$IdCliente);

            $lideres = DB::select('SELECT *,CONCAT(u.`name`," ",u.apellido_paterno," ",u.apellido_materno) as nombre FROM users u where u.idcn ='.$lider[0]->id_cn.' and u.IdRolEva = 121');

            $lidere = DB::select("SELECT * 
            FROM master_ese_email_settings mees 
            INNER JOIN master_ese_email_templates meet
            ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
            WHERE mees.Modulo = 'SOLICITUD-SERVICIO-LIDER'");

            $tituloFSL = $lidere[0]->TituloEmail;
            $cuerpoFSL = $lidere[0]->CuerpoEmail;
            $nombreInstancia2 = "notificacion";

            $footerL = $lidere[0]->FooterEmail;

            if(count($lideres) > 0){
                for($i=0;$i<count($lideres);$i++){
                    $nombreInstancia2 = new Notificaciones();
                    $cuerpoFSL = $lidere[0]->CuerpoEmail;
                    $cuerpoFSL = str_replace("<<NOMBRE USUARIO CLIENTE>>", $clientes[0]->nombre_comercial, $cuerpoFSL); 
                    $cuerpoFSL = str_replace("<<NOMBRE DEL USUARIO LIDER>>", $lideres[$i]->nombre, $cuerpoFSL);
                    $notificacionLider = $nombreInstancia2->send_phpMailerEncuesta($lideres[$i]->email,$lideres[$i]->nombre,$tituloFSL,$cuerpoFSL,$footerL,''); 
                }
            }
            $resultSendNotification=$notification->notificationRequestServiceEncuesta($idServicio,'SOLICITUD-ENCUESTA-CLIENTE','Cliente',null);
  
            return redirect('/nom035')
            ->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
            'type'    => 'success']);
            
        }
        //Finalización de los datos dinámicos
        
    }

    //Método para inputs dinamicos
    public function addMorePost(Request $request){
     /*   foreach ($request->addmore as $key => $value) {
            CentrosTrabajo::create($value);
        }

        foreach ($request->addmoreDepartamentos as $key => $value) {
            Departamentos::create($value);
        }
    
        //PRUEBA INSERTAR
        foreach($request->addmore as $bank) { 
            DB::table('ev_servicio_cliente')->insert([
                'CantidadCentro' => json_decode($bank['Cantidad'])
            ]);
        }
*/

        //INSERTA EL ÚLTIMO ID
        /*
               $idPeriodo = DB::table('ev_periodos')->insertGetId([
            'IdCliente' =>$IdCliente,
            'Fecha' => $FechadeServicio
        ]);
        */
        return 'Hola: ';
        /*return redirect('/nuevoservicio')
        ->with(['success' => 'El servicio se solicitó con éxito',
            'type'    => 'success']);*/
    }


}
