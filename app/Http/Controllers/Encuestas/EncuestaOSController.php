<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\Http\Controllers\Encuestas\Notificaciones;
use DB;

class EncuestaOSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $listOrdenesServicio = MasterConsultas::exeSQL("ev_ordenes_servicio", "READONLY",
            array(
                    "id" => '-1'
                )
        );

        return view("Encuestas.ordenesdeservicios.index",["listOrdenesServicio"=>$listOrdenesServicio]);
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
        //
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
    public function edit($id){

        $listOrdenesServicio = MasterConsultas::exeSQL("ev_ordenes_servicio", "READONLY",
        array(
                "id" => $id
            )
         );

        $oss = DB::select("SELECT osa.id, osa.id_os FROM ordenes_servicio_eva osa where osa.id = ".$id);
        $cdn = DB::select('SELECT mes.IdCliente,mes.IdServicioOS,us.IdCliente,us.idcn FROM master_ese_srv_os mes INNER JOIN users us ON us.IdCliente = mes.IdCliente where mes.IdServicioOS ='.$oss[0]->id_os);
        $ejecutive = DB::select("SELECT u.id,u.name AS nombre,u.apellido_paterno AS ap_paterno,u.apellido_materno AS ap_materno FROM users u WHERE u.name <> '' AND u.tipo = 's' AND u.idcn = ".$cdn[0]->idcn);

        return view("Encuestas.ordenesdeservicios.editar",['listOrdenesServicio'=>$listOrdenesServicio, 'ejecutivo'=>$ejecutive]);
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

        $actualizar = DB::table('ordenes_servicio_eva')->where('id',$id)->update(
            array(
                'estado'=>$request->input('estadoCobro'),
                'costo'=>$request->input('costo')
            ));

            //master_ese_srv_os idOS
        $actualizar_master_ese_srv_os = DB::table('master_ese_srv_os')->where('IdServicioOS',$request->input('idOS'))->update(
            array(
               'numFactura'=>$request->input('numeroFactura'),
               'id_ejecutivo'=>$request->input('asignarAnalista')
            ));
        
            
        return redirect('/encuestaOS')->with(['success' => ' El registro se actualizó con éxito',
        'type'    => 'success']);
    }

    public function sendAnalista(Request $request) {

        $notificacion = new Notificaciones();
        $IdAnalista = $request->IdAnalista;
        $nombre = $request->cliente;
        
        $dd = DB::select("SELECT * 
        FROM master_ese_email_settings mees 
        INNER JOIN master_ese_email_templates meet
        ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
        WHERE mees.Modulo = 'ASIGNACION-ANALISTA-ENCUESTA'");


        $datosEjecutivos = DB::select("select u.id, CONCAT(u.`name`,' ',u.apellido_paterno,' ',u.apellido_materno) as nombre, u.email from users u where u.id= ".$IdAnalista); 

        $cuerpoFS = "";
        $tituloFS = "";

        foreach($dd as $row){
            $cuerpoFS = $row->CuerpoEmail;
            $tituloFS = $row->TituloEmail;
        }


        $cuerpoFS = str_replace("<<NOMBRE DEL USUARIO ANALISTA>>", $datosEjecutivos[0]->nombre, $cuerpoFS);
        $cuerpoFS = str_replace("<<OS#>>", "Encuestas NOM 035", $cuerpoFS);
        $cuerpoFS = str_replace("<<NOMBRE CLIENTE>>", $nombre, $cuerpoFS);
        $footer = $dd[0]->FooterEmail;
        $nombreC = $datosEjecutivos[0]->nombre;


        $notificacion = $notificacion->send_phpMailerEncuesta($datosEjecutivos[0]->email,$nombreC,$tituloFS,$cuerpoFS,$footer,''); 

        return response()->json(['data'=>$notificacion]);  


    }

    public function sendFinServicio(Request $request){
        $notificacionAnalista = new Notificaciones();
        $notificacionCliente = new Notificaciones();

        $nombre = $request->cliente;

        $cliente = DB::select("select c.id from clientes c where c.nombre_comercial = '".$nombre."'");
        $IdCliente = $cliente[0]->id;
        $analista = DB::select("select mos.id_ejecutivo from master_ese_srv_os mos where mos.IdCliente = ".$IdCliente." and mos.id_ejecutivo <> ''");
        $IdAnalista = $analista[0]->id_ejecutivo;

        $lider = DB::select("SELECT c.id_cn FROM clientes c where c.id = ".$IdCliente);

        $lideres = DB::select('SELECT *,CONCAT(u.`name`," ",u.apellido_paterno," ",u.apellido_materno) as nombre FROM users u where u.idcn ='.$lider[0]->id_cn.' and u.IdRolEva = 121');


        $dd = DB::select("SELECT * 
        FROM master_ese_email_settings mees 
        INNER JOIN master_ese_email_templates meet
        ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
        WHERE mees.Modulo = 'FIN-SERVICIO-ENCUESTA-CLIENTE'");

        $lidere = DB::select("SELECT * 
        FROM master_ese_email_settings mees 
        INNER JOIN master_ese_email_templates meet
        ON meet.IdPlantillaEmail = mees.IdPlantillaEmail
        WHERE mees.Modulo = 'CIERRE-SERVICIO-ENCUESTA-LIDER'");

        $tituloFSL = $lidere[0]->TituloEmail;
        $cuerpoFSL = $lidere[0]->CuerpoEmail;
 
        $nombreInstancia2 = "notificacion";



        $evaluados = DB::select("SELECT ep.Nombre, ep.Correo
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON esc.IdServicio = es.IdServicio
        INNER JOIN ev_servicio_detalle esd
        ON esd.IdServicio_cliente = esc.IdServicio_cliente
        INNER JOIN ev_personal ep
        ON ep.IdPersonal = esd.IdPersonal
        WHERE es.IdCliente = ".$IdCliente." GROUP BY esd.IdPersonal");

        $datosEjecutivos = DB::select("select u.id, CONCAT(u.`name`,' ',u.apellido_paterno,' ',u.apellido_materno) as nombre, u.email from users u where u.id= ".$IdAnalista); 
        $datosCliente = DB::select("select s.`name`, s.email from users s where s.IdCliente = ".$IdCliente);

        $tituloFS = $dd[0]->TituloEmail;
        $cuerpoFS = $dd[0]->CuerpoEmail;
        $cuerpoFSC = $dd[0]->CuerpoEmail;
        $footer = $dd[0]->FooterEmail;   

        for($i=0;$i<count($lideres);$i++){
            $nombreInstancia2 = new Notificaciones();
            $cuerpoFSL = $lidere[0]->CuerpoEmail;
            $cuerpoFSL = str_replace("<<OS#>>", "Encuestas NOM 035", $cuerpoFSL);
            $cuerpoFSL = str_replace("<<NOMBRE CLIENTE>>", $nombre, $cuerpoFSL); 
            $cuerpoFSL = str_replace("<<NOMBRE DEL USUARIO LIDER>>", $lideres[$i]->nombre, $cuerpoFSL);
            $notificacionLider = $nombreInstancia2->send_phpMailerEncuesta($lideres[$i]->email,$lideres[$i]->nombre,$tituloFSL,$cuerpoFSL,$footer,''); 
        }
        
        $cuerpoFSC = str_replace("<<NOMBRE USUARIO CLIENTE>>", $datosCliente[0]->name, $cuerpoFSC);
        $cuerpoFSC = str_replace("<<OS#>>", "Encuestas NOM 035", $cuerpoFSC);
        $cuerpoFSC = str_replace("<<NOMBRE CLIENTE>>", $nombre, $cuerpoFSC);        

        $cuerpoFS = str_replace("<<NOMBRE USUARIO CLIENTE>>", $datosEjecutivos[0]->nombre, $cuerpoFS);
        $cuerpoFS = str_replace("<<OS#>>", "Encuestas NOM 035", $cuerpoFS);
        $cuerpoFS = str_replace("<<NOMBRE CLIENTE>>", $nombre, $cuerpoFS);

        $direccion = $datosEjecutivos[0]->email;
        $nombreC = $datosEjecutivos[0]->nombre;
        $nombreInstancia = "notificacionEvaluados";

        $notificacionAnalista = $notificacionAnalista->send_phpMailerEncuesta($direccion,$nombreC,$tituloFS,$cuerpoFS,$footer,''); 
        $notificacionCliente = $notificacionCliente->send_phpMailerEncuesta($datosCliente[0]->email,$datosCliente[0]->name,$tituloFS,$cuerpoFSC,$footer,''); 

        for($i=0;$i<count($evaluados);$i++){

            $nombreInstancia = new Notificaciones();
            $cuerpoFSE = $dd[0]->CuerpoEmail;
            $cuerpoFSE = str_replace("<<NOMBRE USUARIO CLIENTE>>", $evaluados[$i]->Nombre, $cuerpoFSE);
            $cuerpoFSE = str_replace("<<OS#>>", "Encuestas NOM 035", $cuerpoFSE);
            $cuerpoFSE = str_replace("<<NOMBRE CLIENTE>>", $nombre, $cuerpoFSE);  
            if($evaluados[$i]->Correo != ''){
                $notificacionEvaluados = $nombreInstancia->send_phpMailerEncuesta($evaluados[$i]->Correo,$evaluados[$i]->Nombre,$tituloFS,$cuerpoFSE,$footer,''); 
            }
        }
        return response()->json(['data'=>$notificacionEvaluados]);  

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
}
