<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\BCM\FormatoBcm;
use App\ESE\Formatos\BCM\ResultadoBcm;
use App\ESE\Formatos\BCM\DatosPersonalesBcm;
use App\ESE\Formatos\BCM\DocumentacionBcm;
use App\ESE\Formatos\BCM\AntecedentesLegalesBcm;
use App\ESE\Formatos\BCM\ReferenciasLaboralesBcm;
use App\ESE\Formatos\BCM\GapsBcm;
use App\ESE\Formatos\BCM\ReferenciasLaboralesCincoBcm;
use App\ESE\Formatos\BCM\OtraFuenteIngresoBcm;
use App\ESE\Formatos\BCM\EscolaridadBcm;
use App\ESE\Formatos\BCM\PersonasDomicilioBcm;
use App\ESE\Formatos\BCM\ObservacionDomicilioBcm;
use App\ESE\Formatos\BCM\DescripcionViviendaBcm;
use App\ESE\Formatos\BCM\TipoViviendaBcm;

class FormatoBcmController extends Controller
{
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
            return view('ESE.formatos-estaticos.bcm.formato-bcm', compact( 'estudio','backToEstudio' ) );
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
        $estudio = EstudioEse::with('formatoBcm')->get()->find( $id );

        if( $estudio )
        {    
            $formato_estudio     = null;
                        
            if( !$estudio->formatoBcm )
            {              

                $formato_bcm             = new FormatoBcm;
                $formato_bcm->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoBcm()->save( $formato_bcm );  
            }else{
                $formato_estudio = $estudio->formatoBcm;
                
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
            ResultadoBcm::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateDatosPersonales( $formato, $data )
    {
        if( !$formato->datosPersonales )
        {
            $formato->datosPersonales()->create($data);
        }else{
            DatosPersonalesBcm::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateDocumentacion( $formato, $data )
    {
        if( !$formato->documentacion )
        {
            $formato->documentacion()->create($data);
        }else{
            DocumentacionBcm::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateAntecedentesLegales( $formato, $data )
    {
        if( !$formato->antecedentesLegales )
        {
            $formato->antecedentesLegales()->create($data);
        }else{
            AntecedentesLegalesBcm::where('id',$data['id'])->update($data);
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
                ReferenciasLaboralesBcm::where('id',$data_referencia['id'])->update($data_referencia);
            }

        }


           
    }
    private function insertOrUpdateGaps( $formato, $data )
    {
        if( !$formato->gaps )
        {
            $formato->gaps()->create($data);
        }else{
            GapsBcm::where('id',$data['id'])->update($data);
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
                ReferenciasLaboralesCincoBcm::where('id',$data_referencia['id'])->update($data_referencia);
            }
        }
    }
    private function insertOrUpdateOtroIngreso( $formato, $data )
    {
        if( !$formato->otroIngreso )
        {
            $formato->otroIngreso()->create($data);
        }else{
            OtraFuenteIngresoBcm::where('id',$data['id'])->update($data);
        }        
    }
    private function insertOrUpdateEscolaridad( $formato, $data )
    {
        if( !$formato->escolaridad )
        {
            $formato->escolaridad()->create($data);
        }else{
            EscolaridadBcm::where('id',$data['id'])->update($data);
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
                PersonasDomicilioBcm::where('id',$data_referencia['id'])->update($data_referencia);
            }
        }
    }
    private function insertOrUpdateObservacionesVivenEnDomicilio( $formato, $data )
    {
        if( !$formato->observacionesVivenEnDomicilio )
        {
            $formato->observacionesVivenEnDomicilio()->create($data);
        }else{
            ObservacionDomicilioBcm::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateDescripcionVivienda( $formato, $data )
    {   
        if( !$formato->descripcionVivienda )
        {
            $formato->descripcionVivienda()->create($data);
        }else{
            DescripcionViviendaBcm::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateTipoVivienda( $formato, $data )
    {
        if( !$formato->tipoVivienda )
        {
            $formato->tipoVivienda()->create($data);
        }else{
            TipoViviendaBcm::where('id',$data['id'])->update($data);
        }
    }

    public function deleteReferenciaSimple( Request $request )
    {
        if( $request->id_remove_ref_lab_simple != 0 )
        {
            ReferenciasLaboralesBcm::destroy($request->id_remove_ref_lab_simple);
        }

        return back();
        
    }

    public function deleteReferenciaCinco( Request $request )
    {
        if( $request->id_remove_ref_lab_cinco != 0 )
        {
            ReferenciasLaboralesCincoBcm::destroy($request->id_remove_ref_lab_cinco);
        }

        return back();
        
    }

    public function deleteVivenDomicilio( Request $request )
    {
        if( $request->id_remove_vive_persona != 0 )
        {
            PersonasDomicilioBcm::destroy($request->id_remove_vive_persona);
        }

        return back();
        
    }

}
