<?php

namespace App\Http\Controllers\Reports;
require_once 'dompdf/autoload.inc.php';

use Illuminate\Http\Request;

use Dompdf\Dompdf;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportEntornoController extends Controller
{
    public function index(Request $request,$id,$id2,$id3){

        $IdCliente = $id;
        $IdPeriodo = $id2;
        $contador2 = 0;
        $dimenCentros = [];

        $categoria = DB::select("select * from ev_categorias;");
        $dominio = DB::select("select * from ev_dominio;");
        $dimension = DB::select("select * from ev_dimension;");
        $cliente = DB::select("select c.nombre_comercial from clientes c where c.id = ".$id);
        $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id);

        $tamdimen = count($dimension);

        $centrostrabajo = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro,  esc.IdCentro as cen, esc.IdCentro, ect.Descripcion,
        (SELECT COUNT(ssd.IdServicio_detalle) FROM ev_servicio_detalle ssd WHERE ssd.IdServicio_cliente = esc.IdServicio_cliente AND ssd.Estatus = 'Finalizado' AND ssd.IdEncuesta = 12) as totCon
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$id." and es.IdPeriodo = ".$id2);
        

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

        $dd = 0;
        $ff = 0;
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
            
            $dd = 0;

            if(count($calificacionDimension2) == 0){
                $objetos = new \stdClass();
                $objetos->IdCliente = "9"; 
                $objetos->IdEncuesta = "12";
                $objetos->IdPeriodo = "36";
                $objetos->IdPregunta = "24"; 
                $objetos->iValor = "-2";
                $objetos->IdDimension = "25";
                $objetos->promedio = "0";
                $objetos->IdCentro = $row->IdCentro;

                $calificacionDimension3[0]=$objetos;
                $dd++;
            }
            for($i=0;$i<(count($calificacionDimension2));$i++){


                if($i == 6){
                    if($calificacionDimension2[$i]->IdDimension != 12){
                        $objetos = new \stdClass();
                        $objetos->IdCliente = "9"; 
                        $objetos->IdEncuesta = "12";
                        $objetos->IdPeriodo = "36";
                        $objetos->IdPregunta = "24"; 
                        $objetos->iValor = "-2";
                        $objetos->IdDimension = "25";
                        $objetos->promedio = "0";
                        $objetos->IdCentro = $calificacionDimension2[$i]->IdCentro;

                        $calificacionDimension3[$i]=$objetos;
                        $dd++;
               
                    }else{
                        $calificacionDimension3[$i] = $calificacionDimension2[$dd];
                        $dd++;
                    }
                }

                if($i == 19){           
                    if($calificacionDimension2[$i]->IdDimension != 25){

                        $objetos = new \stdClass();
                        $objetos->IdCliente = "9"; 
                        $objetos->IdEncuesta = "12";
                        $objetos->IdPeriodo = "36";
                        $objetos->IdPregunta = "24"; 
                        $objetos->iValor = "-2";
                        $objetos->IdDimension = "25";
                        $objetos->promedio = "0";
                        $objetos->IdCentro = $calificacionDimension2[$i]->IdCentro;

                        $calificacionDimension3[$i]=$objetos;
                        $dd++;

                        for($j=20; $j<$tamdimen;$j++){
                            $calificacionDimension3[$j] = $calificacionDimension2[$j-1];
                        }

                        $i = 25;
                        
                    }else{
                        $calificacionDimension3[$i] = $calificacionDimension2[$dd];
                        $dd++;
                    }
                }

                if($i != 6 and $i != 19 and $i != 25){
                    $calificacionDimension3[$i] = $calificacionDimension2[$dd];
                    $dd++;
                }

              
            }    
            
            array_push($dimenCentros, $calificacionDimension3);
            $ff++;
        }


        $varianteCentro = $calificacionDimension[0]->IdCentro;
        $califTotal = 0;
        $indextotal =0;
        $calificacionTotal = [];

        foreach($centrostrabajo as $cn){
            $califTotal = 0;
            $indextotal =0;
            foreach($calificacionDimension as $row){
                $indextotal++;

                
                if($row->IdCentro == $cn->cen){   
                    $califTotal = $califTotal + $row->promedio;
                    if($indextotal == (count($calificacionDimension))){
                        array_push($calificacionTotal,$califTotal);
                    }

                }else{
                    $califTotal = 0;
                    if($indextotal == (count($calificacionDimension))){
                        array_push($calificacionTotal,$califTotal);
                    }
                }
            }
        }


        $ddominio = $calificacionDimension[0]->IdDominio;
        $sumariesgoentorno = 0;
        $riesgoxdominio = [];
        $indexriesgo = 0;



        foreach($centrostrabajo as $cn){
            $sumariesgoentorno = 0;
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
        }

        $ddcategoria = $calificacionDimension[0]->IdCategoria;
        $sumariesgoentorno = 0;
        $riesgoxcategoria = [];
        $indexriesgo = 0;

        foreach($centrostrabajo as $cn){
            $sumariesgoentorno = 0;
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
        }  
    
        $contabor = 0;

        // var_dump($dimenCentros[9]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('ArchivosPDF.reporteentornolaboral',['categoria'=>$categoria,'dominio'=>$dominio,'dimension'=>$dimension,'cliente'=>$nombreCliente,'img'=>$img,'centros'=>$centrostrabajo,'totalDominio'=>$calificacionDominio,'totalDimension'=>$calificacionDimension,'totalCategoria'=>$calificacionCategoria,'calificacion'=>$calificacionTotal,'dimenCentros'=>$dimenCentros,'calificaciondimension'=>$calificacionDimension,'riesgodominio'=>$riesgoxdominio,'riesgocategoria'=>$riesgoxcategoria,'contad'=>$contabor,'idcentro'=>$id3]));
        $dompdf->render();
        return $dompdf->stream("Reporte de riesgos.pdf", array("Attachment" => false));
    }
}
