<?php

namespace App\Http\Controllers\Reports;
require_once 'dompdf/autoload.inc.php';

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use DB;

class PdfRiesgoReport extends Controller {
    
    public function show(Request $request){
        $listaDelPersonal = explode("|", $request->idPersonal);
        $cuestionarios = array();
        $requiere = array();
        foreach ($listaDelPersonal as $personal) {
            $consulta = "SELECT ep.IdPregunta, ep.IdGrupoRespuesta, ep.iOrden, ep.Numero, ep.Pregunta, bbb.IdEncuesta, ep.IdAgrupador, 
            (SELECT eae.Descripcion FROM ev_agrupador_encuesta eae WHERE eae.IdAgrupador = ep.IdAgrupador) AS Agrupador,
            (SELECT erp.Descripcion FROM ev_respuesta_grupo erp WHERE erp.IdGrupoRespuesta = ep.IdGrupoRespuesta) AS GrupoRespuesta,
            (SELECT esd.FechaEnvío FROM ev_servicio_detalle esd WHERE esd.IdPersonal = ".$personal." AND esd.IdEncuesta = 11 LIMIT 1) as fecha,
            ifnull((SELECT epe.iValor from ev_personal_encuesta epe where epe.IdEncuesta = 11 and epe.IdCliente =".$request->idCliente." and epe.IdPersonal =".$personal." and epe.IdPregunta =ep.IdPregunta),3) as Valor,
            (select p.Nombre from ev_personal p where p.IdPersonal = ".$personal.") as Nombre,
            ep.Activo, bbb.Descripcion AS Descripcion
            FROM ev_pregunta ep
            INNER JOIN ev_agrupador_encuesta aaa ON aaa.IdAgrupador = ep.IdAgrupador
            INNER JOIN ev_encuesta bbb ON bbb.IdEncuesta = aaa.IdEncesta 
            WHERE (11 = -1 or (11 <> -1 AND bbb.IdEncuesta = 11))
            ORDER BY ep.iOrden,ep.IdAgrupador;";

            $consulta2 = DB::select("select 
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 8) as SR1,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 9) as SR2,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 10) as SR3,
            (select sum(iValor) from ev_personal_encuesta where IdEncuesta = sd.IdEncuesta and IdCliente = s.IdCliente and IdPeriodo = s.IdPeriodo and IdCentro = sc.IdCentro and IdPersonal = sd.IdPersonal and IdAgrupador = 11) as SR4,
            if((select SR2) >= 1, 'Requiere Valoración',if ((select SR3) >=3,'Requiere Valoración', if((select SR4 >=2),'Requiere Valoración','No Requiere Valoración'))) as Valoracion
            from ev_servicio_detalle sd
            inner join ev_servicio_cliente sc on (sc.IdServicio_cliente = sd.IdServicio_cliente)
            inner join ev_servicio s on (s.IdServicio = sc.IdServicio)
            where sd.Idpersonal = $personal and sd.IdEncuesta = 11");

            array_push($requiere, $consulta2[0]->Valoracion);
            array_push($cuestionarios, DB::select($consulta));
        }
        $clienteYLogo = DB::select("SELECT bLogo FROM clientes WHERE Id = ".$request->idCliente);
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('ArchivosPDF.DocumentoPrueba', ["requiere"=>$requiere,"cuestionarios" => $cuestionarios, "cliente" => $clienteYLogo, "consulta" => $consulta]));
        $dompdf->render();
        $dompdf->setPaper('A4');
        return $dompdf->stream("Reporte de riesgos.pdf", array("Attachment" => false));
        //return view('ArchivosPDF.DocumentoPrueba', ["cuestionario" => $cuestionario, "cliente" => $clienteYLogo]);
    }
    
}
