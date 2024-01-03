<?php

namespace App\Http\Controllers\Reports;
require_once 'dompdf/autoload.inc.php';
use App\Custom\Archivos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use App\User;
use DB;


class ReportEntorno extends Controller
{
    // public function index(Request $request,$id,$id2){

    //     $categoria = DB::select("select * from ev_categorias;");
    //     $dominio = DB::select("select * from ev_dominio;");
    //     $dimension = DB::select("select * from ev_dimension;");
    //     $cliente = DB::select("select c.nombre_comercial from clientes c where c.id = ".$id);
    //     $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id);

    //     $arrayvacio = empty($imagen);

    //     if($arrayvacio){
    //         $imagen = DB::select("select c.bLogo from clientes c where c.id = 8");
    //     }else{
    //         $imagen = DB::select("select c.bLogo from clientes c where c.id = ".$id); 
    //     }

    //     foreach($imagen as $row){
    //         $img = $row->bLogo;
    //     }

    //     foreach($cliente as $row){
    //         $nombreCliente = $row->nombre_comercial;
    //     }


    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml(view('ArchivosPDF.reporteentornolaboral',['categoria'=>$categoria,'dominio'=>$dominio,'dimension'=>$dimension,'cliente'=>$nombreCliente,'img'=>$img]));
    //     $dompdf->render();
    //     return $dompdf->stream("Reporte de riesgos.pdf", array("Attachment" => false));
    // }
}
