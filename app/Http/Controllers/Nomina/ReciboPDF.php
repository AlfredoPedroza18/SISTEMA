<?php


namespace App\Http\Controllers\Nomina;


use App\Http\Controllers\Controller;
use BD;
use Illuminate\Http\Request;

class ReciboPDF extends Controller
{
    public function show($id){
        $recibo= DB::table('master_personal')->get();
        $view= view('ArchivosPDF.ReciboNomina', compact('recibo'));
        $pdf=app::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('recibo');

    }
}