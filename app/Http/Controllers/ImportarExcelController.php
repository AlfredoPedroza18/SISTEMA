<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use File;

use App\Http\Controllers\Controller\Encuestas;
use App\Bussines\MasterConsultas;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use App\EncuestaClientes;
use App\EncuestaPuestos;
use DB;
use App\Http\Controllers\Encuestas\Notificaciones;
use Laminas\Validator\File\Exists;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Maatwebsite\Excel\Facades\Excel;

//Antes
class ImportarExcelController extends Controller{

    public function import(Request $request){
        $data = null;
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        //Obtenemos los Valores
        $IdCliente = $request->input('idcliente');
        $FechadeServicio = $request->input('fecha');
        $IdPeriodo = $request->input('periodo');
        
        $IdTipoServicio = $request->input('idTipoServicio');

        if(!empty($IdPeriodo)){
            $servicioExistente = DB::select("select * from ev_servicio es where es.IdCliente =".$IdCliente." and es.IdPeriodo = ".$IdPeriodo);
            if(count($servicioExistente) == 0 ){
                $idPeriodo = DB::table('ev_periodos')->insertGetId([
                    'IdCliente' => $IdCliente,
                    'Fecha' => $FechadeServicio
                ]); 
    
                $fechaServ=date_create(date("d-m-Y", strtotime($FechadeServicio)));
                $fechalimit=date_add($fechaServ, date_interval_create_from_date_string("30 days"));
    
                $IdServicio = DB::table('ev_servicio')->insertGetId([
                    'IdCliente' => $IdCliente,
                    'IdTipoServicio' => $IdTipoServicio,
                    'IdPeriodo' => $idPeriodo,
                    'LinkSugerencias'=>'https://www.sigerpserv1.net/gen-t/public/quejaSugerencia/'.$IdCliente.'/'.$idPeriodo,
                    'dFechaVigenciaLink'=>$fechalimit,
                    'Estatus' => 'Abierto'
                ]);
            }else{
                $IdServicio = $servicioExistente[0]->IdServicio;
            }
        }else{
            $idPeriodo = DB::table('ev_periodos')->insertGetId([
                'IdCliente' => $IdCliente,
                'Fecha' => $FechadeServicio
            ]); 

            $fechaServ=date_create(date("d-m-Y", strtotime($FechadeServicio)));
            $fechalimit=date_add($fechaServ, date_interval_create_from_date_string("30 days"));

            $IdServicio = DB::table('ev_servicio')->insertGetId([
                'IdCliente' => $IdCliente,
                'IdTipoServicio' => $IdTipoServicio,
                'IdPeriodo' => $idPeriodo,
                'LinkSugerencias'=>'https://www.sigerpserv1.net/gen-t/public/quejaSugerencia/'.$IdCliente.'/'.$idPeriodo,
                'dFechaVigenciaLink'=>$fechalimit,
                'Estatus' => 'Abierto'
            ]);
        }


        DB::table('master_ese_srv_os')->insert([
            'IdModulo' => '4',
            'IdCliente' => $IdCliente,
            'Estatus' => 'En Proceso',
            'FechaSolicitud' =>  $now= Carbon::now(),
            'FechaCierre' => null
        ]);


        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
     
                //Obtenemos la ruta real y la hacemos momentaneamente temporal para subir el archivo
                $path = $request->file->getRealPath();

                try{
                    //$data=Excel::load($path)->get();
                    //$spreadsheet = IOFactory::load($path);
                    
                    $spreadsheet = Excel::load($path);
                    $sheet        = $spreadsheet->setActiveSheetIndex(1);
                    $row_limit    = $sheet->getHighestDataRow();
                    $column_limit = $sheet->getHighestDataColumn();
                    $centros = array(); 
                    $puesto = array();
                    $deptos  = array();
                    $data    = array(); 
                    $Cliente =  $IdCliente;
                    $IdServ  =  $IdServicio;
                    $contace = 0;
                    $arrayce = [];
         
                    
                    // CENTROS DE TRABAJO 
                    $row_rangeC    = range( 3, $row_limit );
                    $column_rangeC = range( 'B', $column_limit );
                    $startcountC = 3;
                    $centrosExistentes = DB::select("select * from ev_centros_trabajo ect where ect.IdCliente =".$Cliente);
                    foreach ($row_rangeC as $rowC ) {
                        foreach($centrosExistentes as $ce){
                            if($ce->Descripcion == $sheet->getCell('B'.$rowC )->getValue()){
                                $contace++;
                            }
                        }
                        if ($sheet->getCell('B'.$rowC )->getValue()!='' && $contace == 0 ){
                            if(count($arrayce) == 0){
                                array_push($arrayce, $sheet->getCell('B'.$rowC )->getValue());
                                $centros[] = [ 
                                    'IdCliente' => $Cliente,
                                    'Descripcion' =>$sheet->getCell('B'.$rowC )->getValue(),
                                    'Activo' => 'Si' ];
                            }else{
                                if(in_array($sheet->getCell('B'.$rowC )->getValue(), $arrayce)){

                                }else{
                                    array_push($arrayce, $sheet->getCell('B'.$rowC )->getValue());
                                    $centros[] = [ 
                                        'IdCliente' => $Cliente,
                                        'Descripcion' =>$sheet->getCell('B'.$rowC )->getValue(),
                                        'Activo' => 'Si' ];
                                }
                         
                            }
                        }
                        $contace = 0;
                        $startcountC++;
                    }
                    if(count($centros) > 0){
                        DB::table('ev_centros_trabajo')->insert($centros);
                    }

                $departamentosExistentes = DB::select("select * from ev_departamentos ed where ed.IdCliente =".$Cliente);
                $contadd = 0;
                $arrayde = [];
                
                    // DEPARTAMENTOS 
                    $row_rangeD    = range( 3, $row_limit );
                    $column_rangeD = range( 'D', $column_limit);
                    $startcountD = 3;
                    
                    foreach ($row_rangeD as $rowD ) {   
                     foreach($departamentosExistentes as $rowd){
                        if($sheet->getCell('D'.$rowD )->getValue() == $rowd->Descripcion){
                            $contadd++;
                        }
                     }   

                     if ($sheet->getCell('D'.$rowD )->getValue()!='' && $contadd == 0){
                         if(count($arrayde) == 0){
                            array_push($arrayde, $sheet->getCell('D'.$rowD )->getValue());
                            $deptos[] = [ 
                                'IdCliente' => $Cliente,
                                'Descripcion' =>$sheet->getCell('D'.$rowD )->getValue(),
                                'Activo' => 'Si' ];
                         }else{
                            if(in_array($sheet->getCell('D'.$rowD )->getValue(), $arrayde)){
                            
                            }else{
                                array_push($arrayde, $sheet->getCell('D'.$rowD )->getValue());
                                $deptos[] = [ 
                                    'IdCliente' => $Cliente,
                                    'Descripcion' =>$sheet->getCell('D'.$rowD )->getValue(),
                                    'Activo' => 'Si' ];
                            }
                         }
                         
                     }
                    $contadd = 0;
                    $startcountD++;
                }
                if(count($deptos) > 0){
                    DB::table('ev_departamentos')->insert($deptos);
                }
                
                // PUESTOS
                $puestosExistentes = DB::select("select * from ev_puestos ep where ep.IdCliente =".$Cliente);
                $contape = 0;
                $arraypu = [];
                $cuentaPuestos = 0;

                $row_rangeP    = range( 3, $row_limit );
                $column_rangeP = range( 'F', $column_limit);
                $startcountP = 3;
                foreach ($row_rangeP as $rowP ) {       
                    foreach($puestosExistentes as $pe){
                        if($pe->Descripcion == $sheet->getCell('F'.$rowP )->getValue()){
                            $contape++;
                        }
                    }  
                    if ($sheet->getCell('F'.$rowP )->getValue()!='' && $contape == 0){
                        if(count($arraypu) == 0){
                            array_push($arraypu, $sheet->getCell('F'.$rowP )->getValue());
                            $puesto[] = [ 
                                'IdCliente' => $Cliente,
                                'Descripcion' =>$sheet->getCell('F'.$rowP )->getValue(),
                                'Activo' => 'Si'
                                ];
                                $cuentaPuestos++;
                        }else{
                            if(in_array($sheet->getCell('F'.$rowP )->getValue(), $arraypu)){

                            }else{
                                array_push($arraypu, $sheet->getCell('F'.$rowP )->getValue()); 
                                $puesto[] = [ 
                                    'IdCliente' => $Cliente,
                                    'Descripcion' =>$sheet->getCell('F'.$rowP )->getValue(),
                                    'Activo' => 'Si'
                                    ];
                                    $cuentaPuestos++;
                            }
                        }
                
                    }
                    $contape = 0;
                    $startcountP++;
                }

                 if(count($puesto) > 0){
                    DB::table('ev_puestos')->insert($puesto);
                 }
                
                 // INSERTAR DATOS DE HOJA 1
                 $sheet        = $spreadsheet->setActiveSheetIndex(0);
                 $row_limit    = $sheet->getHighestDataRow();
                 $column_limit = $sheet->getHighestDataColumn();
                 $row_range    = range( 2, $row_limit );
                 $column_range = range( 'A', $column_limit);
                 $startcount = 2;
         
                    // importación en ev_personal
                    foreach ($row_range as $row ) {
                         if ($sheet->getCell('B'.$row )->getValue()!=''){
         
                             $ID_CT = DB::table('ev_centros_trabajo')
                             ->where('IdCliente', '=', $Cliente)
                             ->where('Descripcion', '=', $sheet->getCell('A'.$row )->getValue())
                             ->value('IdCentro');
         
                             $data[] = [ 
                             'IdCliente' => $Cliente,
                             'Nombre' =>$sheet->getCell('B'.$row )->getValue(),
                             'IdCentroTrabajo' => $ID_CT,
                             'Correo' => $sheet->getCell('C'.$row )->getValue(),
                             'Telefono' => $sheet->getCell('D'.$row )->getValue()   
                             ];
                         }
                        $startcount++;
                    }
         
                    //DB::table('ev_personal')->insert($data);
                    
         
                    // tabla de servicios cliente
                    $sheet        = $spreadsheet->setActiveSheetIndex(1);
                    $row_limit    = $sheet->getHighestDataRow();
                    $column_limit = $sheet->getHighestDataColumn();
                    $row_rangeC    = range( 3, $row_limit );
                    $column_rangeC = range( 'B', $column_limit );
                    $startcountC = 3;
                    $sevices = array(); 
                    $contace = 0;
                    $arrayce = [];


                    foreach ($row_rangeC as $rowC ) {

                        // foreach($SerExisten as $ce){
                        //     if($ce->IdCentro == $sheet->getCell('B'.$rowC )->getValue()){
                        //         $contace++;
                        //     }
                        // }
                        
                     if ($sheet->getCell('B'.$rowC )->getValue()!=''){

                        if(count($arrayce) == 0){
                            array_push($arrayce, $sheet->getCell('B'.$rowC )->getValue());
                            $cts = DB::table('ev_centros_trabajo')
                            ->where('IdCliente', '=', $Cliente)
                            ->where('Descripcion', '=', $sheet->getCell('B'.$rowC )->getValue())
                            ->orderBy('IdCentro','DESC')->value('IdCentro');

                                /*$ct_count = DB::table('ev_personal')
                             ->where('IdCliente', '=', $Cliente)
                             ->where('IdCentroTrabajo', '=', $cts)
                             ->count();*/
                            $ct_count=0;
                            foreach($data as $d){
                                if($d['IdCliente'] == $Cliente && $d['IdCentroTrabajo']==$cts){
                                    $ct_count++;
                                }
                            }
            
                            $services[] = [ 
                                'IdServicio'    => $IdServ,
                                'IdCentro'      => $cts,
                                'CantidadCentro' => $ct_count
                            ];
                        }else{
                            if(in_array($sheet->getCell('B'.$rowC )->getValue(), $arrayce)){

                            }else{
                                array_push($arrayce, $sheet->getCell('B'.$rowC )->getValue());
                                $cts = DB::table('ev_centros_trabajo')
                                ->where('IdCliente', '=', $Cliente)
                                ->where('Descripcion', '=', $sheet->getCell('B'.$rowC )->getValue())
                                ->orderBy('IdCentro','DESC')->value('IdCentro');

                                    /*$ct_count = DB::table('ev_personal')
                             ->where('IdCliente', '=', $Cliente)
                             ->where('IdCentroTrabajo', '=', $cts)
                             ->count();*/
                                $ct_count=0;
                                foreach($data as $d){
                                    if($d['IdCliente'] == $Cliente && $d['IdCentroTrabajo']==$cts){
                                        $ct_count++;
                                    }
                                }
                
                                $services[] = [ 
                                    'IdServicio'    => $IdServ,
                                    'IdCentro'      => $cts,
                                    'CantidadCentro' => $ct_count
                                ];
                            }
                     
                        }
                    }
                    $contace = 0;
                    $startcountC++;
                 }
                    
                //DB::table('ev_servicio_cliente')->insert($services);
                $encuestas = DB::select('select * from ev_encuesta where Activo="Si"');

                $SerExisten = DB::select("select * from ev_servicio_cliente esc where esc.IdServicio =".$IdServ);
                $arreExistCentro = [];
                if(count($SerExisten) > 0){
                    foreach($SerExisten as $serr){
                        array_push($arreExistCentro, $serr->IdCentro);
                    }
                }

                foreach($services as $sr){

                    if(in_array($sr['IdCentro'], $arreExistCentro) ){
                        $actualizarDepartamento = DB::table('ev_servicio_cliente')->where('IdServicio',$IdServ)->where('IdCentro',$sr['IdCentro'])->update(
                            array(
                            'CantidadCentro'=>$sr['CantidadCentro'])
                        );
                        $servicioClient = DB::select("select * from ev_servicio_cliente esc where esc.IdServicio =".$IdServ." and esc.IdCentro = ".$sr['IdCentro']);
                        $idServicioCliente = $servicioClient[0]->IdServicio_cliente;
                    }else{
                        
                        $idServicioCliente = DB::table('ev_servicio_cliente')->insertGetId([
                            'IdServicio' => $sr['IdServicio'],
                            'IdCentro' => $sr['IdCentro'],
                            'CantidadCentro' => $sr['CantidadCentro'] 
                        ]);
                    }
   
                
                    $totalPersonal = DB::select("SELECT * FROM ev_servicio_detalle esd where esd.IdServicio_cliente =".$idServicioCliente." GROUP BY esd.IdPersonal");
                    $totalDetalle = count($totalPersonal);


                    foreach($data as $dp){
                        
                        if($dp['IdCentroTrabajo'] == $sr['IdCentro']){

                            if(empty($IdPeriodo)){
                                $IdPersonal = DB::table('ev_personal')->insertGetId([
                                    'IdCliente' => $dp['IdCliente'],
                                    'IdCentroTrabajo' => $dp['IdCentroTrabajo'],
                                    'Nombre' => $dp['Nombre'],
                                    'Correo' => $dp['Correo'],
                                    'Telefono' => $dp['Telefono'],
                                    "IdPeriodo" => $idPeriodo
                                ]);

                                    
                                $fechAct=Carbon::now();
                                $CodigoUnico="COD-P".$IdPersonal;

                                foreach($encuestas as $encuesta){
                                    $Link="https://www.sigerpserv1.net/gen-t/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;
                                    $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                                        'IdServicio_cliente' => $idServicioCliente,
                                        'IdEncuesta' => $encuesta->IdEncuesta,
                                        'IdPersonal' => $IdPersonal,
                                        'CodigoUnico' => $CodigoUnico,
                                        'Link' =>  $Link,
                                        'Fecha'=>$fechAct
                                    ]);
                                }
                            }else{
                                $totalPersonas = DB::select("SELECT * FROM ev_personal ep where ep.IdCentroTrabajo =".$sr['IdCentro']);
                                $totPerso = count($totalPersonas);
                                if($totPerso != 0){
                                    if($totPerso == $sr['CantidadCentro']){

                                    }else{
                                        $IdPersonal = DB::table('ev_personal')->insertGetId([
                                            'IdCliente' => $dp['IdCliente'],
                                            'IdCentroTrabajo' => $dp['IdCentroTrabajo'],
                                            'Nombre' => $dp['Nombre'],
                                            'Correo' => $dp['Correo'],
                                            'Telefono' => $dp['Telefono'],
                                            "idpersonal"=>$idPeriodo
                                        ]);
        
                                            
                                        $fechAct=Carbon::now();
                                        $CodigoUnico="COD-P".$IdPersonal;
        
                                        foreach($encuestas as $encuesta){
                                            $Link="https://www.sigerpserv1.net/gen-t/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;
                                            $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                                                'IdServicio_cliente' => $idServicioCliente,
                                                'IdEncuesta' => $encuesta->IdEncuesta,
                                                'IdPersonal' => $IdPersonal,
                                                'CodigoUnico' => $CodigoUnico,
                                                'Link' =>  $Link,
                                                'Fecha'=>$fechAct
                                            ]);
                                        }
                                    }
                                }else{
                                    $IdPersonal = DB::table('ev_personal')->insertGetId([
                                        'IdCliente' => $dp['IdCliente'],
                                        'IdCentroTrabajo' => $dp['IdCentroTrabajo'],
                                        'Nombre' => $dp['Nombre'],
                                        'Correo' => $dp['Correo'],
                                        'Telefono' => $dp['Telefono'],
                                        "idperiodo" => $idPeriodo
                                    ]);

                                        
                                    $fechAct=Carbon::now();
                                    $CodigoUnico="COD-P".$IdPersonal;

                                    foreach($encuestas as $encuesta){
                                        $Link="https://www.sigerpserv1.net/gen-t/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;
                                        $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                                            'IdServicio_cliente' => $idServicioCliente,
                                            'IdEncuesta' => $encuesta->IdEncuesta,
                                            'IdPersonal' => $IdPersonal,
                                            'CodigoUnico' => $CodigoUnico,
                                            'Link' =>  $Link,
                                            'Fecha'=>$fechAct
                                        ]);
                                    }
                                }
                            }
                            
                            
                        }
                    }
                }
            
                $acciones = DB::select("select * from ev_acciones_default where idEncuesta = 12");

                foreach($acciones as $acc){
                    DB::table('ev_acciones')->insert([
                        'IdDimension' => $acc->idDimension,
                        'IdCliente' => $Cliente,
                        'IdEncuestaCliente' => 12,
                        'Descripcion' => $acc->Descripcion,
                        
                    ]);
                }
         
                } catch (Exception $e) {
                    return "Ocurrió el siguiente error ".$e->getMessage().", contacte al equipo de desarrollo";
                }finally{
    
                    $clientesTodos = DB::select('SELECT * FROM clientes');
                    foreach($clientesTodos as $ncli){
                        $nombre_comercial=$ncli->nombre_comercial;
                        $Id=$ncli->id;
                    }

                    $clientes = DB::select('SELECT * FROM clientes WHERE id = '.$Cliente);
                    foreach($clientes as $ncli){
                        $nombre_comercial=$ncli->nombre_comercial;
                        $Id=$ncli->id;
                    }

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

                    $accionesExistentes = DB::select("select * from ev_acciones ea where ea.IdCliente =".$Cliente);

                    if( count($accionesExistentes) == 0 ){
                        $accionesAba = DB::select("select * from ev_acciones ea where ea.IdCliente = 312 and ea.Predeterminado = 'Si' ORDER BY ea.IdDimension");
                        if(count($accionesAba) > 0){
                            foreach( $accionesAba as $row){{
                                $idAcciones = DB::table('ev_acciones')->insertGetId([
                                    'IdDimension' => $row->IdDimension,
                                    'IdCliente' => $Cliente,
                                    'IdEncuestaCliente' => $row->IdEncuestaCliente,
                                    'Descripcion' => $row->Descripcion
                                ]);
                            }}
                        }
                    }

                    $documentosExistentes = DB::select("select * from ev_documentos ed where ed.IdCliente =".$Cliente);

                    if(count($documentosExistentes) == 0 ){
                        $documentosGT = DB::select("select * from ev_documentos ed where ed.IdCliente = 312 and ed.Tipo = 'Basico'");
                        if(count($documentosGT) > 0){
                            foreach( $documentosGT as $row){{
                                $idDocumentos = DB::table('ev_documentos')->insertGetId([
                                    'IdCliente' => $Cliente,
                                    'Descripcion' => $row->Descripcion,
                                    'Tipo' => $row->Tipo,
                                    'Activo' => $row->Activo
                                ]);
                            }}
                        }
                    }

                    $resultSendNotification=$notification->notificationRequestServiceEncuesta($IdServicio,'SOLICITUD-ENCUESTA-CLIENTE','Cliente',null);


                    return redirect('/nom035')
                    ->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
                    'type'    => 'success']);
                }
     
            }else {
                return "Ningun archivo";
            }
        }
    }
}
