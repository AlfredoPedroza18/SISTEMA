<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\Jll\FormatoJll;
use App\ESE\Formatos\Jll\ResultadoJll;
use App\ESE\Formatos\Jll\DatosPersonalesJll;
use App\ESE\Formatos\Jll\DocumentacionJll;
use App\ESE\Formatos\Jll\AntecedentesLegalesJll;
use App\ESE\Formatos\Jll\ReferenciasLaboralesJll;
use App\ESE\Formatos\Jll\GapsJll;
use App\ESE\Formatos\Jll\ReferenciasLaboralesCincoJll;
use App\ESE\Formatos\Jll\OtraFuenteIngresoJll;
use App\ESE\Formatos\Jll\EscolaridadJll;
use App\ESE\Formatos\Jll\PersonasDomicilioJll;
use App\ESE\Formatos\Jll\ObservacionDomicilioJll;
use App\ESE\Formatos\Jll\DescripcionViviendaJll;
use App\ESE\Formatos\Jll\TipoViviendaJll;

class FormatoJllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(Request $request,$id)
    {
        $formato       = Formato::find( $id );
        $estudio       = EstudioEse::find( $request->estudio );
        $os            = $estudio->ordenServicioEse->orden_servicio->id;
        $os_ese        = $estudio->ordenServicioEse->id;
        $id_ese        = $estudio->id;
        $backToEstudio = "estudio-ese/create?os=$os&os_ese=$os_ese&ese=$id_ese";
        
        if( $estudio && $formato )
        {
            return view('ESE.formatos-estaticos.jll.formato-jll', compact( 'estudio', 'backToEstudio' ) );
        }

        return back();
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
        $estudio = EstudioEse::with('formatoJll')->get()->find( $id );

        if( $estudio )
        {    
            $formato_estudio     = null;
                        
            if( !$estudio->formatoJll )
            {              

                $formato_Jll             = new FormatoJll;
                $formato_Jll->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoJll()->save( $formato_Jll );  
            }else{
                $formato_estudio = $estudio->formatoJll;
                
            }

            $this->insertOrUpdateResultado( $formato_estudio, $request->resultados ); 
            $this->insertOrUpdateDatosPersonales( $formato_estudio, $request->datos_personales ); 
            $this->insertOrUpdateDocumentacion( $formato_estudio, $request->documentacion );
            $this->insertOrUpdateAntecedentesLegales( $formato_estudio, $request->antecedentes_legales );
            $this->insertOrUpdateReferenciasLaborales( $formato_estudio, $request->referencia_laboral_simple );
            $this->insertOrUpdateGaps( $formato_estudio, $request->gaps );
            $this->insertOrUpdateReferenciasLaboralesCinco( $formato_estudio, $request->referencias_lab_cinco );
            $this->insertOrUpdateOtroIngreso( $formato_estudio, $request->otras_fuentes_ingresos );
            $this->insertOrUpdateEscolaridad( $formato_estudio, $request->escolaridad ); 
            $this->insertOrUpdateVivenEnDomicilio( $formato_estudio, $request->viven_domicilio );
            $this->insertOrUpdateObservacionesVivenEnDomicilio( $formato_estudio, $request->obs_viven_dom );
            $this->insertOrUpdateDescripcionVivienda( $formato_estudio, $request->descripcion_vivienda );
            $this->insertOrUpdateTipoVivienda( $formato_estudio, $request->tipo_vivienda );         
            
            
        }

        return back();



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

    private function insertOrUpdateResultado( $formato, $data )
    {        
        if( !$formato->resultado )
        {
            $formato->resultado()->create($data);
        }else{
            ResultadoJll::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateDatosPersonales( $formato, $data )
    {
        if( !$formato->datosPersonales )
        {
            $formato->datosPersonales()->create($data);
        }else{
            DatosPersonalesJll::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateDocumentacion( $formato, $data )
    {
        if( !$formato->documentacion )
        {
            $formato->documentacion()->create($data);
        }else{
            DocumentacionJll::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateAntecedentesLegales( $formato, $data )
    {
        if( !$formato->antecedentesLegales )
        {
            $formato->antecedentesLegales()->create($data);
        }else{
            AntecedentesLegalesJll::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateReferenciasLaborales( $formato, $data )
    {
        foreach ($data as $data_referencia ) 
        {
            $referencia = $formato->referenciasLaborales()->find( $data_referencia['id'] );

            if( !$referencia )
            {
                $formato->referenciasLaborales()->create($data_referencia);
            }else{                
                ReferenciasLaboralesJll::where('id',$data_referencia['id'])->update($data_referencia);
            }

        }


           
    }
    private function insertOrUpdateGaps( $formato, $data )
    {
        if( !$formato->gaps )
        {
            $formato->gaps()->create($data);
        }else{
            GapsJll::where('id',$data['id'])->update($data);
        }        
    }
    private function insertOrUpdateReferenciasLaboralesCinco( $formato, $data )
    {
        foreach ($data as $data_referencia ) 
        {
            $referencia = $formato->referenciasLaboralesCinco()->find( $data_referencia['id'] );
            if( !$referencia )
            {
                $formato->referenciasLaboralesCinco()->create($data_referencia);
            }else{
                ReferenciasLaboralesCincoJll::where('id',$data_referencia['id'])->update($data_referencia);
            }
        }
    }
    private function insertOrUpdateOtroIngreso( $formato, $data )
    {
        if( !$formato->otroIngreso )
        {
            $formato->otroIngreso()->create($data);
        }else{
            OtraFuenteIngresoJll::where('id',$data['id'])->update($data);
        }        
    }
    private function insertOrUpdateEscolaridad( $formato, $data )
    {
        if( !$formato->escolaridad )
        {
            $formato->escolaridad()->create($data);
        }else{
            EscolaridadJll::where('id',$data['id'])->update($data);
        } 
        
    }
    private function insertOrUpdateVivenEnDomicilio( $formato, $data )
    {
        foreach ($data as $data_referencia ) 
        {
            $referencia = $formato->vivenEnDomicilio()->find( $data_referencia['id'] );
            if( !$referencia )
            {
                $formato->vivenEnDomicilio()->create($data_referencia);
            }else{
                PersonasDomicilioJll::where('id',$data_referencia['id'])->update($data_referencia);
            }
        }
    }
    private function insertOrUpdateObservacionesVivenEnDomicilio( $formato, $data )
    {
        if( !$formato->observacionesVivenEnDomicilio )
        {
            $formato->observacionesVivenEnDomicilio()->create($data);
        }else{
            ObservacionDomicilioJll::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateDescripcionVivienda( $formato, $data )
    {   
        if( !$formato->descripcionVivienda )
        {
            $formato->descripcionVivienda()->create($data);
        }else{
            DescripcionViviendaJll::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateTipoVivienda( $formato, $data )
    {
        if( !$formato->tipoVivienda )
        {
            $formato->tipoVivienda()->create($data);
        }else{
            TipoViviendaJll::where('id',$data['id'])->update($data);
        }
    }

    public function deleteReferenciaSimple( Request $request )
    {
        if( $request->id_remove_ref_lab_simple != 0 )
        {
            ReferenciasLaboralesJll::destroy($request->id_remove_ref_lab_simple);
        }

        return back();
        
    }

    public function deleteReferenciaCinco( Request $request )
    {
        if( $request->id_remove_ref_lab_cinco != 0 )
        {
            ReferenciasLaboralesCincoJll::destroy($request->id_remove_ref_lab_cinco);
        }

        return back();
        
    }

    public function deleteVivenDomicilio( Request $request )
    {
        if( $request->id_remove_vive_persona != 0 )
        {
            PersonasDomicilioJll::destroy($request->id_remove_vive_persona);
        }

        return back();
        
    }
}
