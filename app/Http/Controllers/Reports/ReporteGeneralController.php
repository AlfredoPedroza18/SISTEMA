<?php

namespace App\Http\Controllers\Reports;
require_once 'dompdf/autoload.inc.php';

use Illuminate\Http\Request;

use Dompdf\Dompdf;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReporteGeneralController extends Controller
{
    public function index(Request $request,$id,$id2){

        $requiere = 0;
        $norequiere = 0;
        $arrayCentros = [];
        $arrayPersonal = [];
        $i = 0;
        $letcentros = "";
        $letpersonal = "";
        $cantPersonal = 0;
        $IdCliente = $id;
        $IdPeriodo = $id2;

        $categoria = DB::select("select * from ev_categorias;");
        $dominio = DB::select("select * from ev_dominio;");
        $dimension = DB::select("select * from ev_dimension;");
        $cliente = DB::select("select c.nombre_comercial from clientes c where c.id = ".$id);
        $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id);

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
            WHERE s.IdCliente = ".$id." AND s.IdPeriodo = ".$id2." AND sd.IdEncuesta = 11 AND sd.Estatus = 'Finalizado';");

        foreach($datos as $row){
            if($row->Valoracion == "REQUIERE VALORACIÓN"){
                $requiere++;
            }else{
                $norequiere++;
            }
        }

        $centrostrabajo = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion, YEAR(ep.Fecha) as anio, MONTH(ep.Fecha) as mes
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
		INNER JOIN ev_periodos ep
		ON ep.IdPeriodo = es.IdPeriodo
        WHERE es.IdCliente = ".$id." and es.IdPeriodo = ".$id2);

        $datosGrid = DB::select("SELECT ec.IdCategoria, ec.Descripcion AS Categoria,ed.IdDominio,ed.Descripcion AS Dominio,edm.IdDimension, edm.Descripcion AS Dimension FROM ev_categorias ec
        INNER JOIN ev_dominio ed
        ON ed.IdCategoria = ec.IdCategoria
        INNER JOIN ev_dimension edm
        ON edm.IdDominio = ed.IdDominio GROUP BY edm.IdDimension;");

        $dominioss = DB::select("SELECT ec.IdCategoria, ec.Descripcion AS Categoria,ed.IdDominio,ed.Descripcion AS Dominio,edm.IdDimension, edm.Descripcion AS Dimension FROM ev_categorias ec
        INNER JOIN ev_dominio ed
        ON ed.IdCategoria = ec.IdCategoria
        INNER JOIN ev_dimension edm
        ON edm.IdDominio = ed.IdDominio GROUP BY edm.IdDominio");

        foreach($centrostrabajo as $row){
            $arrayCentros[$i] = $row->Descripcion;
            $arrayPersonal[$i] = $row->CantidadCentro;
            $cantPersonal = $cantPersonal + $row->CantidadCentro;
            $i++;
        }

        $i = 0;
        foreach($arrayCentros as $row2){
            if($i == (count($arrayCentros)-1)){
                $letcentros = $letcentros."'".$row2."'";
            }else{
                $letcentros = $letcentros."'".$row2."'".",";
            }
            $i++;
        }

        $i = 0;
        foreach($arrayPersonal as $row2){
            if($i == (count($arrayCentros)-1)){
                $letpersonal = $letpersonal."'".$row2."'";
            }else{
                $letpersonal = $letpersonal."'".$row2."'".",";
            }
            $i++;
        }
        $arrayvacio = empty($imagen);

        if($arrayvacio){
            $imagen = DB::select("select c.bLogo from clientes c where c.id = 8");
        }else{
            $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id); 
        }

        foreach($imagen as $row){
            $img = $row->bLogo;
        }

        foreach($cliente as $row){
            $nombreCliente = $row->nombre_comercial;
        }

        foreach($centrostrabajo as $row){
            $anio = $row->anio;
            $mes = $row->mes;
        }

        $numCentros = count($centrostrabajo);

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

        $image = new Quickchart(array(
            'width'=> 300,
            'height'=> 200,
        ));

        $image->setConfig("{
            type: 'pie',
            data: {
                datasets: [
                    {
                    data: [".$requiere.", ".$norequiere."],
                    backgroundColor: [
                        'rgb(226, 101, 24)',
                        'rgb(163, 186, 210)',
                    ],
                    label: 'Dataset 1',
                    datalabels: {
                        color: 'black',
                        font: {
                            size:10
                        }
                    }
                    },
                ],
                labels: ['Requiere', 'No requiere'],
            },
            options: {
                legend: {
                    labels: {
                        fontColor: '#000',
                        fontSize: 8,
                    }
                }									
            }
          }
        ");

        $image2 = new Quickchart(array(
            'width'=> 320,
            'height'=> 200,
        ));
        $image2->setConfig("{
            type: 'horizontalBar',
            data: {
              labels:[".$letcentros."],
              datasets: [{
                label: '',
                data: [".$letpersonal."],
                backgroundColor: [
                    '#F56520',
                    '#EDF514',
                    '#05AB9E',
                    '#09A4DE',
                    '#07F5E1'
                ]
              }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: 'black',
                            beginAtZero: true,
                            color: '#fff',
                            fontSize: 8
                        },
                        stacked: true,
                        display: true
                    }],
                    yAxes: [{
                        ticks: {
                            fontColor: 'black',
                            beginAtZero: true,
                            color: '#fff',
                            fontSize: 8
                        },
                        stacked: true,
                    }]
                },
                legend: {
                    display: true,
                    labels: {
                        boxWidth: 0,
                        fontColor: 'rgb(255, 99, 132)',
                    }
                },
            },
            legend: {
                color: 'white',
                display: false
            }
          }
        ");

        //calculo de riesgo de entorno laboral
        $dimenCentros = [];

        $calificacionCategoria = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta, epe.IdCentro, epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
        from ev_personal_encuesta epe
        inner join ev_dimension_pregunta edp
        on edp.IdPregunta = epe.IdPregunta
        inner join ev_dimension evd
        on evd.IdDimension = edp.IdDimension
        inner join ev_dominio ed
        on ed.IdDominio = evd.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = ed.IdCategoria
        where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY epe.IdCentro,ec.IdCategoria');

        $calificacionDominio = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta, epe.IdCentro, epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
        from ev_personal_encuesta epe
        inner join ev_dimension_pregunta edp
        on edp.IdPregunta = epe.IdPregunta
        inner join ev_dimension evd
        on evd.IdDimension = edp.IdDimension
        inner join ev_dominio ed
        on ed.IdDominio = evd.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = ed.IdCategoria
        where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY epe.IdCentro,ed.IdDominio');

        $calificacionDimension = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta, epe.IdCentro, epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
        from ev_personal_encuesta epe
        inner join ev_dimension_pregunta edp
        on edp.IdPregunta = epe.IdPregunta
        inner join ev_dimension evd
        on evd.IdDimension = edp.IdDimension
        inner join ev_dominio ed
        on ed.IdDominio = evd.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = ed.IdCategoria
        where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY epe.IdCentro,edp.IdDimension');

        foreach($centrostrabajo as $row){
            $calificacionDimension2 = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta, epe.IdCentro, epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
            from ev_personal_encuesta epe
            inner join ev_dimension_pregunta edp
            on edp.IdPregunta = epe.IdPregunta
            inner join ev_dimension evd
            on evd.IdDimension = edp.IdDimension
            inner join ev_dominio ed
            on ed.IdDominio = evd.IdDominio
            inner join ev_categorias ec
            on ec.IdCategoria = ed.IdCategoria
            where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 and epe.IdCentro ='.$row->IdCentro.' GROUP BY epe.IdCentro,edp.IdDimension');

            for($i=0;$i<count($calificacionDimension2);$i++){
                if($i == 6){
                    if($calificacionDimension2[$i]->IdDimension != 12){
                        $json = (object) array('IdCliente' => '9','IdEncuesta' => '12','IdPeriodo' => '36','IdCliente' => '9','IdPregunta' => '24','iValor' => '-2','IdDimension' => '12','promedio' => '0'); 
                        array_splice($calificacionDimension2, 6, 0, $json );
                    }
                }
                if($i == 19){
                    if($calificacionDimension2[$i]->IdDimension != 25){
                        $json = (object) array('IdCliente' => '9','IdEncuesta' => '12','IdPeriodo' => '36','IdCliente' => '9','IdPregunta' => '24','iValor' => '-2','IdDimension' => '25','promedio' => '0'); 
                        array_splice($calificacionDimension2, 6, 0, $json );
                    }
                }
            }

            array_push($dimenCentros, $calificacionDimension2);
        }

        $varianteCentro = $calificacionDimension[0]->IdCentro;
        $califTotal = 0.0;
        $indextotal =0;
        $calificacionTotal = [];

        foreach($calificacionDimension as $row){
            $indextotal++;
            if($row->IdCentro != $varianteCentro){
                array_push($calificacionTotal,$califTotal);
                $califTotal = 0.0;
                $varianteCentro = $row->IdCentro;
                $califTotal = $califTotal + $row->promedio;
                if($indextotal == (count($calificacionDimension))){
                    array_push($calificacionTotal,$califTotal);
                }
            }else{
                $califTotal = $califTotal + $row->promedio;
                if($indextotal == (count($calificacionDimension))){
                    array_push($calificacionTotal,$califTotal);
                }
            }
        }

        $ddominio = $calificacionDimension[0]->IdDominio;
        $sumariesgoentorno = 0;
        $riesgoxdominio = [];
        $indexriesgo = 0;

        foreach($calificacionDimension as $row){
           $indexriesgo++;
           if($row->IdDominio != $ddominio){
               array_push($riesgoxdominio, $sumariesgoentorno);
               $sumariesgoentorno = 0;
               $ddominio = $row->IdDominio;
               $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
               if($indexriesgo == (count($calificacionDimension))){
                   array_push($riesgoxdominio, $sumariesgoentorno);
               }
           }else{
               $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
               if($indexriesgo == (count($calificacionDimension))){
                   array_push($riesgoxdominio, $sumariesgoentorno);
               }
           }
        }

        $ddcategoria = $calificacionDimension[0]->IdCategoria;
        $sumariesgoentorno = 0;
        $riesgoxcategoria = [];
        $indexriesgo = 0;

        foreach($calificacionDimension as $row){
           $indexriesgo++;
           if($row->IdCategoria != $ddcategoria){
               array_push($riesgoxcategoria, $sumariesgoentorno);
               $sumariesgoentorno = 0;
               $ddcategoria = $row->IdCategoria;
               $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
               if($indexriesgo == (count($calificacionDimension))){
                   array_push($riesgoxcategoria, $sumariesgoentorno);
               }
           }else{
               $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
               if($indexriesgo == (count($calificacionDimension))){
                   array_push($riesgoxcategoria, $sumariesgoentorno);
               }
           }
        }

        $calificacionDimensionFinal = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta,epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
            from ev_personal_encuesta epe
            inner join ev_dimension_pregunta edp
            on edp.IdPregunta = epe.IdPregunta
            inner join ev_dimension evd
            on evd.IdDimension = edp.IdDimension
            inner join ev_dominio ed
            on ed.IdDominio = evd.IdDominio
            inner join ev_categorias ec
            on ec.IdCategoria = ed.IdCategoria
            where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY edp.IdDimension');

        $calificacionFinal = 0.0;
        foreach($calificacionDimensionFinal as $row){
            $calificacionFinal = $calificacionFinal + $row->promedio;
        }


        $dompdf = new Dompdf();
        $image = $image->toBinary();  
        $image2 = $image2->toBinary();  
        $variable=base64_encode($image);
        $variable2=base64_encode($image2);

        $contad = 0;
        $dompdf->loadHtml(view('ArchivosPDF.reporteGeneral',['categoria'=>$categoria,
        'dominio'=>$dominio,
        'categoria'=>$categoria,
        'dimension'=>$dimension,
        'cliente'=>$nombreCliente,
        'img'=>$img,
        'image'=>$image,
        'centros'=>$centrostrabajo,
        'mes'=>$mes,
        'anio'=>$anio,
        'numCentros'=>$numCentros,
        'requiere'=>$requiere,
        'variable'=>$variable,
        'variable2'=>$variable2,
        'cantPersonal'=>$cantPersonal,
        'categorias'=>$datosGrid,
        'dominios'=>$dominioss,
        'totalDominio'=>$calificacionDominio,
        'totalDimension'=>$calificacionDimension,
        'totalCategoria'=>$calificacionCategoria,
        'calificacion'=>$calificacionTotal,
        'dimenCentros'=>$dimenCentros,
        'calificacionFinal'=>$calificacionFinal,
        'riesgodominio'=>$riesgoxdominio,
        'riesgocategoria'=>$riesgoxcategoria,
        'norequiere'=>$norequiere]));
        $dompdf->render();
        return $dompdf->stream("Reporte Final.pdf", array("Attachment" => false));
    }
}
