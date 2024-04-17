<?php

namespace App\Http\Controllers\Reports;
require_once 'dompdf/autoload.inc.php';

use Illuminate\Http\Request;

use Dompdf\Dompdf;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class ReporteAccionesController extends Controller
{
    public function index(Request $request,$id,$id2){

        $IdCliente = $id;
        $IdPeriodo = $id2;

        $accionesxdimension = DB::select("select ead.IdAccionDet, ead.IdCentro, ead.IdCliente,ead.IdPeriodo, evd.Descripcion as Dominio, ec.Descripcion as Categoria, ead.IdDimension,ead.IdAccion,ead.Descripcion as Comentario,c.nombre_comercial,ed.Descripcion as Dimension,ea.Descripcion as Accion
        from ev_accion_detalle ead
        inner join clientes c
        on c.id = ead.IdCliente
        inner join ev_dimension ed
        on ed.IdDimension = ead.IdDimension
        inner join ev_acciones ea
        on ea.IdAccion = ead.IdAccion
        inner join ev_dominio evd
        on evd.IdDominio = ed.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = evd.IdCategoria
	    where ead.IdCliente =".$IdCliente." and ead.IdPeriodo =".$IdPeriodo." GROUP BY ead.IdCentro,ead.IdDimension");

        $accioness = DB::select("select ead.IdCentro, ead.IdCliente,ead.IdPeriodo,ead.IdDimension,ead.IdAccion,ead.Descripcion as Comentario,ea.Descripcion as Accion
        from ev_accion_detalle ead
        inner join clientes c
        on c.id = ead.IdCliente
        inner join ev_dimension ed
        on ed.IdDimension = ead.IdDimension
        inner join ev_acciones ea
        on ea.IdAccion = ead.IdAccion
        inner join ev_dominio evd
        on evd.IdDominio = ed.IdDominio
        inner join ev_categorias ec
        on ec.IdCategoria = evd.IdCategoria
        where ead.IdCliente =".$IdCliente." and ead.IdPeriodo =".$IdPeriodo." GROUP BY ead.IdCentro,ead.IdAccion,ead.IdDimension");

        $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id);

        $arrayvacio = empty($imagen);

        if($arrayvacio){
            $imagen = DB::select("select c.bLogo from clientes c where c.id = 8");
        }else{
            $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id); 
        }

        foreach($imagen as $row){
            $img = $row->bLogo;
        }

        $centrostrabajo = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro as cen,esc.IdCentro, ect.Descripcion, ep.Fecha
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
		INNER JOIN ev_periodos ep
	    ON ep.IdPeriodo = es.IdPeriodo
        WHERE es.IdCliente = ".$id." and es.IdPeriodo = ".$id2." order by esc.IdCentro asc");

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
                    
                    
                } 
                
            }
            array_push($calificacionTotal,$califTotal);
        }

        $contador = 0;

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('ArchivosPDF.reporteAcciones',['acciones'=>$accionesxdimension,'img'=>$img,'centros'=>$centrostrabajo,'calificacion'=>$calificacionTotal,'contador'=>$contador,'accionesDimension'=>$accioness]));
        $dompdf->render();
        return $dompdf->stream("Reporte de Acciones.pdf", array("Attachment" => false));
    }
}
