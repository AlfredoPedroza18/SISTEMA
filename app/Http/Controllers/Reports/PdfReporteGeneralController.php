<?php

namespace App\Http\Controllers\Reports;
require_once 'dompdf/autoload.inc.php';
//Realizar adición de Quickchart como DOMPDF

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use DB;

class PdfReporteGeneralController extends Controller {

    public function show(Request $request){

        $clienteYLogo = DB::SELECT("SELECT nombre_comercial, bLogo FROM clientes WHERE Id = ".$request->idCliente);

        $IdCliente = $request->idCliente;
        $IdPeriodo = $request->idPeriodo;
        $IdCentro = ($request->idCentro == -1)?"like '%'":" = ".$request->idCentro;
        $requiere = 0;
        $norequiere = 0;
        $arrayCentros = array();
        $anio = 0;
        $mes = 0;
        $datos = DB::SELECT("SELECT YEAR(evp.Fecha) as anio, MONTH(evp.Fecha) as mes, sd.IdEncuesta, sd.IdPersonal, sd.CodigoUnico, sd.Fecha,
        IF(sd.Archivo <=> NULL,0,1) AS Archivo, 
        (SELECT epe.Nombre FROM ev_personal epe WHERE epe.IdPersonal = sd.IdPersonal) AS Nombre,
        (SELECT Descripcion FROM ev_centros_trabajo WHERE IdCentro = sc.IdCentro) AS CentroTrabajo,
        (SELECT Descripcion FROM ev_encuesta WHERE IdEncuesta = sd.IdEncuesta) AS Encuesta,
        (SELECT sum(iValor) FROM ev_personal_encuesta WHERE IdEncuesta = sd.IdEncuesta AND IdCliente = s.IdCliente AND IdPeriodo = s.IdPeriodo AND IdCentro = sc.IdCentro AND IdPersonal = sd.IdPersonal AND IdAgrupador = 8) AS SR1,
        (SELECT sum(iValor) FROM ev_personal_encuesta WHERE IdEncuesta = sd.IdEncuesta AND IdCliente = s.IdCliente AND IdPeriodo = s.IdPeriodo AND IdCentro = sc.IdCentro AND IdPersonal = sd.IdPersonal AND IdAgrupador = 9) AS SR2,
        (SELECT sum(iValor) FROM ev_personal_encuesta WHERE IdEncuesta = sd.IdEncuesta AND IdCliente = s.IdCliente AND IdPeriodo = s.IdPeriodo AND IdCentro = sc.IdCentro AND IdPersonal = sd.IdPersonal AND IdAgrupador = 10) AS SR3,
        (SELECT sum(iValor) FROM ev_personal_encuesta WHERE IdEncuesta = sd.IdEncuesta AND IdCliente = s.IdCliente AND IdPeriodo = s.IdPeriodo AND IdCentro = sc.IdCentro AND IdPersonal = sd.IdPersonal AND IdAgrupador = 11) AS SR4,
        IF((SELECT SR2) >= 1, 'REQUIERE VALORACIÓN',IF ((SELECT SR3) >=3,'REQUIERE VALORACIÓN', IF((SELECT SR4 >=2),'REQUIERE VALORACIÓN','NO REQUIERE VALORACIÓN'))) as Valoracion
        FROM ev_servicio_detalle sd
        INNER join ev_servicio_cliente sc ON (sc.IdServicio_cliente = sd.IdServicio_cliente)
        INNER join ev_servicio s ON (s.IdServicio = sc.IdServicio)
        INNER join ev_periodos evp ON s.IdPeriodo = evp.IdPeriodo
            WHERE s.IdCliente = ".$IdCliente." AND s.IdPeriodo = ".$IdPeriodo." AND sc.IdCentro ".$IdCentro." AND sd.IdEncuesta = 11 AND sd.Estatus = 'Finalizado';");

        $centros = DB::SELECT("SELECT ect.Descripcion FROM ev_servicio es
            INNER JOIN ev_servicio_cliente esc ON es.IdServicio = esc.IdServicio
            INNER JOIN ev_centros_trabajo ect ON ect.IdCentro = esc.IdCentro
            WHERE es.IdCliente =".$IdCliente." AND es.IdPeriodo = ".$IdPeriodo.($IdPeriodo. ($request->idCentro == -1)?"":" AND esc.IdCentro =".$request->idCentro).";");
        foreach($datos as $row){
            if($row->Valoracion == "REQUIERE VALORACIÓN")
                $requiere++;
            else
                $norequiere++;
            $anio = $row->anio;
            $mes = $row->mes;
        }
        foreach($centros as $row){
            array_push($arrayCentros, $row->Descripcion);
        }

        $image = new QuickChart([
            'width'=> 150,
            'height'=> 150,
        ]);

        $image->setConfig("{
            type: 'pie',
            data: {
                datasets: [
                    {
                    data: [".$requiere.", ".$norequiere."],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                    ],
                    label: 'Dataset 1',
                    },
                ],
                labels: ['Requiere', 'No requiere'],
            },
          }
          ");

        
        $dompdf = new Dompdf();
        $image = $image->toBinary();  
        
        switch($mes){
            case 1:
                $mes = 'Enero';
                break;
            case 2:
                $mes = 'Febrero';
                break;
            case 3:
                $mes = 'Marzo';
                break;
            case 4:
                $mes = 'Abril';
                break;
            case 5:
                $mes = 'Mayo';
                break;
            case 6:
                $mes = 'Junio';
                break;
            case 7:
                $mes = 'Julio';
                break;
            case 8:
                $mes = 'Agosto';
                break;
            case 9:
                $mes = 'Septiembre';
                break;
            case 10:
                $mes = 'Octubre';
                break;
            case 11:
                $mes = 'Noviembre';
                break;
            case 12:
                $mes = 'Diciembre';
                break;
        }
        
        $dompdf->loadHtml(view('ArchivosPDF.reporteriesgogeneral', [
            "cliente" => $clienteYLogo,
            "image" => $image,
            'centros'=>$centros,
            'requiere'=>$requiere,
            'noRequiere'=>$norequiere,
            "anio"=>$anio,
            "mes"=>$mes
        ]));

        $dompdf->render();
        $dompdf->setPaper('A4');
        return $dompdf->stream("Reporte general.pdf", array("Attachment" => false));
        //return view('ArchivosPDF.DocumentoPdfGeneral', ["cliente" => $clienteYLogo, "image" => $image]);
    }

    function getPDFData(){
    
    }

    // https://documentation.image-charts.com/bar-charts/
}
