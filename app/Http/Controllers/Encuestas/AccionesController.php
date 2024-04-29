<?php

namespace App\Http\Controllers\Encuestas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;
use App\Bussines\MasterConsultas;
use App\Bussines\ReportsNom035;

class AccionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request,$id,$id2)
    { 

        $centros = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$id." and es.IdPeriodo = ".$id2);
        $i = 0;

        $datosCliente = DB::select('SELECT c.nombre_comercial,ep.Fecha FROM clientes c INNER JOIN ev_periodos ep WHERE c.id ='.$id.' AND ep.IdPeriodo ='.$id2);
        $IdPeriodo = $id2;
        $IdCliente = $id;
        return view("Encuestas.nom035.acciones",['centros'=>$centros,'datos'=>$datosCliente,'IdCliente'=>$IdCliente,'IdPeriodo'=>$IdPeriodo]);
    }

    public function getPersonal(Request $request)
    {
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $arrayCentros = [];
        $arrayPersonal = [];

        $centros = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente =".$IdCliente." AND es.IdPeriodo = ".$IdPeriodo);
        $i = 0;

        foreach($centros as $row){
            $arrayCentros[$i] = $row->Descripcion;
            $arrayPersonal[$i] = $row->CantidadCentro;
            $i++;
        }

        return response()->json(['data2'=>$arrayCentros,'data3'=>$arrayPersonal]);
    }

    public function getEncuestados(Request $request){

        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $IdCentro = $request->IdCentro;
        $arrayCentros = [];
        $arrayPersonal = [];
        $sumaRiesgo = 0;
        $requiere = 0;
        $norequiere = 0;
        
        if($IdCentro != -1){
            $requiere = 0;
            $norequiere = 0;
            $datos = DB::select("select sd.IdEncuesta, sd.IdPersonal, sd.CodigoUnico, sd.Fecha, 
            if(sd.Archivo <=> null,0,1) as Archivo, 
            (select epe.Nombre from ev_personal epe where epe.IdPersonal = sd.IdPersonal) AS Nombre,
            (select Descripcion from ev_centros_trabajo where IdCentro = sc.IdCentro) as CentroTrabajo,
            (select Descripcion from ev_encuesta where IdEncuesta = sd.IdEncuesta) as Encuesta,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 8) as SR1,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 9) as SR2,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 10) as SR3,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 11) as SR4,
            if((select SR2) >= 1, '*REQUIERE VALORACIÓN',if ((select SR3) >=3,'*REQUIERE VALORACIÓN', if((select SR4 >=2),'*REQUIERE VALORACIÓN','NO REQUIERE VALORACIÓN'))) as Valoracion
            from ev_servicio_detalle sd
            inner join ev_servicio_cliente sc on (sc.IdServicio_cliente = sd.IdServicio_cliente)
            inner join ev_servicio s on (s.IdServicio = sc.IdServicio)
            where s.IdCliente = ".$IdCliente." and s.IdPeriodo = ".$IdPeriodo." and sc.IdCentro =".$IdCentro." and sd.IdEncuesta = 11 and sd.Estatus = 'Finalizado';");

            $centros = DB::select("SELECT 
            es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
            FROM ev_servicio es
            INNER JOIN ev_servicio_cliente esc
            ON es.IdServicio = esc.IdServicio
            INNER JOIN ev_centros_trabajo ect
            ON ect.IdCentro = esc.IdCentro
            WHERE es.IdCliente =".$IdCliente." AND es.IdPeriodo = ".$IdPeriodo." AND esc.IdCentro =".$IdCentro);
            $i = 0;

            $nuevoCentros = DB::select("select esd.IdPersonal,esd.IdEncuesta,COUNT(esd.Estatus) as totalEncuestados,esd.Estatus,es.IdCliente,es.IdPeriodo,esc.IdCentro,esc.CantidadCentro,ect.Descripcion
            from ev_servicio_detalle esd
            inner join ev_servicio_cliente esc
            on esc.IdServicio_cliente = esd.IdServicio_cliente
            inner join ev_servicio es
            on es.IdServicio = esc.IdServicio
            inner join ev_centros_trabajo ect
            on ect.IdCentro = esc.IdCentro
            where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." and esd.IdEncuesta = 11 and esd.Estatus = 'Finalizado' and esc.IdCentro = ".$IdCentro);

            foreach($datos as $row){
                if($row->Valoracion == "REQUIERE VALORACIÓN"){
                    $requiere++;
                }else{
                    $norequiere++;
                }
            }
    
            foreach($nuevoCentros as $row){
                $arrayCentros[$i] = $row->Descripcion;
                $arrayPersonal[$i] = $row->totalEncuestados;
                $i++;
            }
        }else{
            $requiere = 0;
            $norequiere = 0;
            $datos = DB::select("select sd.IdEncuesta, sd.IdPersonal, sd.CodigoUnico, sd.`FechaEnvío`, 
            if(sd.Archivo <=> null,0,1) as Archivo,
            (select epe.Nombre from ev_personal epe where epe.IdPersonal = sd.IdPersonal) AS Nombre,
            (select Descripcion from ev_centros_trabajo where IdCentro = sc.IdCentro) as CentroTrabajo,
            (select Descripcion from ev_encuesta where IdEncuesta = sd.IdEncuesta) as Encuesta,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 8) as SR1,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 9) as SR2,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 10) as SR3,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 11) as SR4,
            if((select SR2) >= 1, '*REQUIERE VALORACIÓN',if ((select SR3) >=3,'*REQUIERE VALORACIÓN', if((select SR4 >=2),'*REQUIERE VALORACIÓN','NO REQUIERE VALORACIÓN'))) as Valoracion
            from ev_servicio_detalle sd
            inner join ev_servicio_cliente sc on (sc.IdServicio_cliente = sd.IdServicio_cliente)
            inner join ev_servicio s on (s.IdServicio = sc.IdServicio)
            where s.IdCliente = ".$IdCliente." and s.IdPeriodo = ".$IdPeriodo." and sc.IdCentro like '%' and sd.IdEncuesta = 11 and sd.Estatus = 'Finalizado';");
            
            $centros = DB::select("SELECT 
            es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
            FROM ev_servicio es
            INNER JOIN ev_servicio_cliente esc
            ON es.IdServicio = esc.IdServicio
            INNER JOIN ev_centros_trabajo ect
            ON ect.IdCentro = esc.IdCentro
            WHERE es.IdCliente =".$IdCliente." AND es.IdPeriodo = ".$IdPeriodo);
            $i = 0;

            $nuevoCentros = DB::select("select esd.IdPersonal,esd.IdEncuesta,COUNT(esd.Estatus) as totalEncuestados,esd.Estatus,es.IdCliente,es.IdPeriodo,esc.IdCentro,esc.CantidadCentro,ect.Descripcion
            from ev_servicio_detalle esd
            inner join ev_servicio_cliente esc
            on esc.IdServicio_cliente = esd.IdServicio_cliente
            inner join ev_servicio es
            on es.IdServicio = esc.IdServicio
            inner join ev_centros_trabajo ect
            on ect.IdCentro = esc.IdCentro
            where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." and esd.IdEncuesta = 11 and esd.Estatus = 'Finalizado' group by esc.IdCentro");

            foreach($datos as $row){
                if($row->Valoracion == "REQUIERE VALORACIÓN"){
                    $requiere++;
                }else{
                    $norequiere++;
                }
            }
    
            foreach($nuevoCentros as $row){
                $arrayCentros[$i] = $row->Descripcion; // Labels
                $arrayPersonal[$i] = $row->totalEncuestados; // Cantidades
                $i++;
            }
        }  
        return response()->json(['data'=>$datos,'data2'=>$arrayCentros,'data3'=>$arrayPersonal,'data4'=>$requiere,'data5'=>$norequiere]);
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
       
    }

    public function subirArchivo(Request $request)
    {
        $IdPersonal = $request->input("IdPersonal");
        $file = $request->file("archivo");
        $IdCliente = $request->input("IdCliente");
        $IdPeriodo = $request->input("IdPeriodo");
        if($file == null){
            $base64= null;
        }else{
            $archivodata= file_get_contents($file);
            $base64= base64_encode($archivodata);
        }

        $buscarregistro=DB::select('select esd.Archivo from ev_servicio_detalle esd where esd.IdPersonal = '.$IdPersonal.' and esd.IdEncuesta = 11');

        foreach($buscarregistro as $row){
            $Archivo = $row->Archivo;
        }
        $arrayvacio=empty($buscarregistro);

       
            $UpdatePC = DB::table('ev_servicio_detalle')->where('IdPersonal',$IdPersonal)->where('IdEncuesta',11)->update(
                array(
                    'Archivo'=>$base64
                )
            );
                     
            return redirect()->route('accionesNom035',['id'=>$IdCliente,'id2'=>$IdPeriodo])->with(['success' => ' El archivo se guardó con éxito',
            'type'    => 'success']);
        
    }

    public function showPDF(Request $request){
        $id= $request->id;

        $pdf=DB::select('select Archivo from ev_servicio_detalle where IdPersonal='.$id.' and IdEncuesta = 11');

        foreach($pdf as $p){
            $archivopdf=$p->Archivo;
        }
        
        return response()->json(['pdf'=>$archivopdf]);
    }


    public function getReportRiesgo(Request $request){
        $ReportsNom035 = new ReportsNom035;
        $response = $ReportsNom035->GetReport(1,$request->input('idpersonal'),$request->input('idcliente'));
        return response()->json([$response]);
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

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}
