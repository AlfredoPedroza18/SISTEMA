<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use PDF;

class ActaHechosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query_acta="SELECT
                       ese_estudios_acta_hechos.id,
                CONCAT(ese_candidato.nombre,' ',ese_candidato.apellido_paterno,' ',ese_candidato.apellido_materno ) as candidato,
                        tipos_estudo_ese.nombre,
                        prioridades.nombre as prioridad,
                        estados.nombre_estado,
                        ese_estudios_acta_hechos.fecha_eliminacion
                        FROM ese_estudios_acta_hechos
                        LEFT JOIN tipos_estudo_ese ON ese_estudios_acta_hechos.id_tipo_estudio=tipos_estudo_ese.id
                        LEFT JOIN prioridades ON ese_estudios_acta_hechos.prioridad=prioridades.id
                        LEFT JOIN estados ON ese_estudios_acta_hechos.estado=estados.id
                        LEFT JOIN ese_status ON ese_estudios_acta_hechos.id_status=ese_status.id
                        LEFT JOIN ese_candidato ON ese_estudios_acta_hechos.id_estudio=ese_candidato.id_ese";
                 
            $acta=DB::select($query_acta);

          return view('ESE.acta-hechos',["acta"=>$acta]);
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
    public function edit($id)
    {
        //
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
        //
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

    public function pdfActaHechos(Request $request){

         $query_acta_="SELECT
                       ese_estudios_acta_hechos.id,
                CONCAT(ese_candidato.nombre,' ',ese_candidato.apellido_paterno,' ',ese_candidato.apellido_materno ) as candidato,
                        tipos_estudo_ese.nombre,
                        prioridades.nombre as prioridad,
                        estados.nombre_estado,
                        ese_estudios_acta_hechos.fecha_eliminacion
                        FROM ese_estudios_acta_hechos
                        LEFT JOIN tipos_estudo_ese ON ese_estudios_acta_hechos.id_tipo_estudio=tipos_estudo_ese.id
                        LEFT JOIN prioridades ON ese_estudios_acta_hechos.prioridad=prioridades.id
                        LEFT JOIN estados ON ese_estudios_acta_hechos.estado=estados.id
                        LEFT JOIN ese_status ON ese_estudios_acta_hechos.id_status=ese_status.id
                        LEFT JOIN ese_candidato ON ese_estudios_acta_hechos.id_estudio=ese_candidato.id_ese
                        Where ese_estudios_acta_hechos.id=".$request->id;
                 
    $acta=DB::select($query_acta_);

    $data = ['acta' => $acta];
    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-acta-hechos',compact('data'));
    $pdf->setPaper('letter', 'portrait');
    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
    return $pdf->download('pdf-acta-hechos.pdf');

    
    }
}
