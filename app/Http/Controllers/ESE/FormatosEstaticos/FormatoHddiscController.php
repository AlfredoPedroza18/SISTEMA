<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\Hddisc\FormatoHddisc;
use App\ESE\Formatos\Hddisc\CursoHddisc;
use App\ESE\Formatos\Hddisc\IdiomaHddisc;
use App\ESE\Formatos\Hddisc\ConocimientosHddisc;
use App\ESE\Formatos\Hddisc\ReferenciaPersonalHddisc;
use App\ESE\Formatos\Hddisc\InformacionLaboralHddisc;
use App\ESE\Formatos\Hddisc\DatoFamiliarHddisc;
use App\ESE\Formatos\Hddisc\PadecimientoFamiliarHddisc;

class FormatoHddiscController extends Controller
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
    public function edit( Request $request, $id)
    {
        $formato       = Formato::find( $id );
        $estudio       = EstudioEse::find( $request->estudio );
        $os            = $estudio->ordenServicioEse->orden_servicio->id;
        $os_ese        = $estudio->ordenServicioEse->id;
        $id_ese        = $estudio->id;
        $backToEstudio = "estudio-ese/create?os=$os&os_ese=$os_ese&ese=$id_ese";
        
        if( $estudio && $formato )
        {
            return view('ESE.formatos-estaticos.hddisc.formato-hddisc', compact( 'estudio','backToEstudio' ) );
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
        $estudio = EstudioEse::with('formatoHddisc')->get()->find( $id );

        if( $estudio )
        {    
            $formato_estudio = null;
            
            if( !$estudio->formatoHddisc )
            {              

                $formato_sm             = new FormatoHddisc;
                $formato_sm->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoHddisc()->save( $formato_sm );  
            }else{
                $formato_estudio = $estudio->formatoHddisc;                
            }
  
            
            $this->InsertOrUpdateResumen( $request->resumen, $formato_estudio );
            $this->InsertOrUpdateDatosGenerales( $request->datos_generales, $formato_estudio );
            $this->InsertOrUpdateDocumentacion( $request->documentacion, $formato_estudio );
            $this->InsertOrUpdateEscolaridad( $request->escolaridad, $formato_estudio );
            $this->InsertOrUpdateEscolaridadObs( $request->escolaridad_obs, $formato_estudio );
            $this->InsertOrUpdateCursos( $request->curso, $formato_estudio );
            $this->InsertOrUpdateIdiomas( $request->idiomas, $formato_estudio );
            $this->InsertOrUpdateConocmientosHabilidades( $request->conocimientos, $formato_estudio );
            $this->InsertOrUpdateDatosFamiliares( $request->parentesco, $formato_estudio );
            $this->InsertOrUpdateInformacionFamiliar( $request->informacion_familiar, $formato_estudio );
            $this->InsertOrUpdateSituacionEconomica( $request->situacion_economica, $formato_estudio );
            $this->InsertOrUpdateBienes( $request->bienes_detalle, $formato_estudio );
            $this->InsertOrUpdateBienesTotales( $request->bienes_total, $formato_estudio );
            $this->InsertOrUpdateTipoVivienda( $request->tipo_vivienda, $formato_estudio );
            $this->InsertOrUpdateTipoPropiedad( $request->tipo_propiedad, $formato_estudio );
            $this->InsertOrUpdateInfoViviendaServicios( $request->tipo_vivienda_servicios, $formato_estudio );
            $this->InsertOrUpdateInfoViviendaDistribucion( $request->tipo_vivienda_distribucion, $formato_estudio );
            $this->InsertOrUpdateInfoViviendaNivelEconomico( $request->vivienda_nivel_economico, $formato_estudio );
            $this->InsertOrUpdateViviendaConstruccion( $request->vivienda_construccion, $formato_estudio );
            $this->InsertOrUpdateViviendaConservacion( $request->vivienda_conservacion, $formato_estudio );
            $this->InsertOrUpdateViviendaCalidadMobiliario( $request->vivienda_conservacion_mobiliario, $formato_estudio );
            $this->InsertOrUpdateViviendaCorte( $request->vivienda_corte, $formato_estudio );
            $this->InsertOrUpdateFamiliarEmpresa( $request->familiar_empresa, $formato_estudio );
            $this->InsertOrUpdateUbicacionDomicilio( $request->ubicacion_domicilio, $formato_estudio );
            $this->InsertOrUpdateSituacionSocial( $request->situacion_social, $formato_estudio );
            $this->InsertOrUpdateEnfermedad( $request->enfermedades_candidato, $formato_estudio );
            $this->InsertOrUpdatePadecimiento( $request->padecimientos, $formato_estudio );
            $this->InsertOrUpdatePadecimientoFamiliar( $request->familiares_padecimientos, $formato_estudio );
            $this->InsertOrUpdateAtencionMedica( $request->atencion_medica, $formato_estudio );
            $this->InsertOrUpdateHabitosDetalle( $request->habitos_costumbres, $formato_estudio );
            $this->InsertOrUpdateHabitos( $request->habitos_costumbres_normal, $formato_estudio );
            $this->InsertOrUpdateDisponibilidad( $request->disponibilidad, $formato_estudio );
            $this->InsertOrUpdateReferenciasPersonales( $request->referencias_personales, $formato_estudio );
            $this->InsertOrUpdateInformacionLaboral( $request->referencia_laboral, $formato_estudio );
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


    private function InsertOrUpdateResumen( $data , $formato )
    {
        if( !$formato->resumen )
        {
            $formato->resumen()->create($data);
        }else{
            $formato->resumen->where('id',$data['id'])->update($data);
        }
    }

    private function InsertOrUpdateDatosGenerales( $data , $formato )
    {
        if( !$formato->datos_generales )
        {
            $formato->datos_generales()->create($data);
        }else{
            $formato->datos_generales->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateDocumentacion( $data , $formato )
    {
        if( !$formato->documentacion )
        {
            $formato->documentacion()->create($data);
        }else{
            $formato->documentacion->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateEscolaridad( $data , $formato )
    {
        foreach ($data as $escolaridad ) 
        {
            $escolaridad_result = $formato->escolaridad()->find( $escolaridad['id'] );
            if( !$escolaridad_result )
            {
                $formato->escolaridad()->create($escolaridad);
            }else{
                $formato->escolaridad()->where('id',$escolaridad['id'])->update($escolaridad);
            }
        }
    }

    private function InsertOrUpdateEscolaridadObs( $data , $formato )
    {
        if( !$formato->escolaridad_obs )
        {
            $formato->escolaridad_obs()->create($data);
        }else{
            $formato->escolaridad_obs->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateCursos( $data , $formato )
    {
        foreach ($data as $curso ) 
        {
            $curso_result = $formato->cursos()->find( $curso['id'] );
            if( !$curso_result )
            {
                $formato->cursos()->create($curso);
            }else{
                $formato->cursos()->where('id',$curso['id'])->update($curso);
            }
        }

    }

    private function InsertOrUpdateIdiomas( $data , $formato )
    {
        foreach ($data as $idioma ) 
        {
            $idioma_result = $formato->idiomas()->find( $idioma['id'] );
            if( !$idioma_result )
            {
                $formato->idiomas()->create($idioma);
            }else{
                $formato->idiomas()->where('id',$idioma['id'])->update($idioma);
            }
        }

    }

    private function InsertOrUpdateConocmientosHabilidades( $data , $formato )
    {
        foreach ($data as $conocimiento ) 
        {
            $conocimiento_result = $formato->conocmientos_habilidades()->find( $conocimiento['id'] );
            if( !$conocimiento_result )
            {
                $formato->conocmientos_habilidades()->create($conocimiento);
            }else{
                $formato->conocmientos_habilidades()->where('id',$conocimiento['id'])->update($conocimiento);
            }
        }
    }

    private function InsertOrUpdateDatosFamiliares( $data , $formato )
    {
        foreach ($data as $familiar ) 
        {
            $familiar_result = $formato->datos_familiares()->find( $familiar['id'] );
            if( !$familiar_result )
            {
                $formato->datos_familiares()->create($familiar);
            }else{
                $formato->datos_familiares()->where('id',$familiar['id'])->update($familiar);
            }
        }
    }

    private function InsertOrUpdateInformacionFamiliar( $data , $formato )
    {
        if( !$formato->informacion_familiar )
        {
            $formato->informacion_familiar()->create($data);
        }else{
            $formato->informacion_familiar->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateSituacionEconomica( $data , $formato )
    {
        if( !$formato->situacion_economica )
        {
            $formato->situacion_economica()->create($data);
        }else{
            $formato->situacion_economica->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateBienes( $data , $formato )
    {
        foreach ($data as $bien ) 
        {
            $bien_result = $formato->bienes()->find( $bien['id'] );
            if( !$bien_result )
            {
                $formato->bienes()->create($bien);
            }else{
                $formato->bienes()->where('id',$bien['id'])->update($bien);
            }
        }
    }

    private function InsertOrUpdateBienesTotales( $data , $formato )
    {
        if( !$formato->bienes_totales )
        {
            $formato->bienes_totales()->create($data);
        }else{
            $formato->bienes_totales->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateTipoVivienda( $data , $formato )
    {
        if( !$formato->tipo_vivienda )
        {
            $formato->tipo_vivienda()->create($data);
        }else{
            $formato->tipo_vivienda->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateTipoPropiedad( $data , $formato )
    {
        if( !$formato->tipo_propiedad )
        {
            $formato->tipo_propiedad()->create($data);
        }else{
            $formato->tipo_propiedad->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateInfoViviendaServicios( $data , $formato )
    {
        if( !$formato->info_vivienda_servicios )
        {
            $formato->info_vivienda_servicios()->create($data);
        }else{
            $formato->info_vivienda_servicios->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateInfoViviendaDistribucion( $data , $formato )
    {
        if( !$formato->info_vivienda_distribucion )
        {
            $formato->info_vivienda_distribucion()->create($data);
        }else{
            $formato->info_vivienda_distribucion->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateInfoViviendaNivelEconomico( $data , $formato )
    {
        if( !$formato->info_vivienda_nivel_economico )
        {
            $formato->info_vivienda_nivel_economico()->create($data);
        }else{
            $formato->info_vivienda_nivel_economico->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateViviendaConstruccion( $data , $formato )
    {
        if( !$formato->vivienda_construccion )
        {
            $formato->vivienda_construccion()->create($data);
        }else{
            $formato->vivienda_construccion->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateViviendaConservacion( $data , $formato )
    {
        if( !$formato->vivienda_conservacion )
        {
            $formato->vivienda_conservacion()->create($data);
        }else{
            $formato->vivienda_conservacion->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateViviendaCalidadMobiliario( $data , $formato )
    {
        if( !$formato->vivienda_calidad_mobiliario )
        {
            $formato->vivienda_calidad_mobiliario()->create($data);
        }else{
            $formato->vivienda_calidad_mobiliario->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateViviendaCorte( $data , $formato )
    {
        if( !$formato->vivienda_corte )
        {
            $formato->vivienda_corte()->create($data);
        }else{
            $formato->vivienda_corte->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateFamiliarEmpresa( $data , $formato )
    {
        if( !$formato->familiar_empresa )
        {
            $formato->familiar_empresa()->create($data);
        }else{
            $formato->familiar_empresa->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateUbicacionDomicilio( $data , $formato )
    {
        if( !$formato->ubicacion_domicilio )
        {
            $formato->ubicacion_domicilio()->create($data);
        }else{
            $formato->ubicacion_domicilio->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateSituacionSocial( $data , $formato )
    {
        if( !$formato->situacion_social )
        {
            $formato->situacion_social()->create($data);
        }else{
            $formato->situacion_social->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateEnfermedad( $data , $formato )
    {
        if( !$formato->enfermedad )
        {
            $formato->enfermedad()->create($data);
        }else{
            $formato->enfermedad->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdatePadecimiento( $data , $formato )
    {
        if( !$formato->padecimiento )
        {
            $formato->padecimiento()->create($data);
        }else{
            $formato->padecimiento->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdatePadecimientoFamiliar( $data , $formato )
    {
        foreach ($data as $padecimiento_fam ) 
        {
            $padecimiento_fam_result = $formato->padecimiento_familiar()->find( $padecimiento_fam['id'] );
            if( !$padecimiento_fam_result )
            {
                $formato->padecimiento_familiar()->create($padecimiento_fam);
            }else{
                $formato->padecimiento_familiar()->where('id',$padecimiento_fam['id'])->update($padecimiento_fam);
            }
        }
    }

    private function InsertOrUpdateAtencionMedica( $data , $formato )
    {   
        if( !$formato->atencion_medica )
        {
            $formato->atencion_medica()->create($data);
        }else{
            $formato->atencion_medica()->where('id',$data['id'])->update($data);
        }
        
    }

    private function InsertOrUpdateHabitosDetalle( $data , $formato )
    {
        foreach ($data as $habito ) 
        {
            $habito_result = $formato->habitos_detalle()->find( $habito['id'] );
            if( !$habito_result )
            {
                $formato->habitos_detalle()->create($habito);
            }else{
                $formato->habitos_detalle()->where('id',$habito['id'])->update($habito);
            }
        }
    }

    private function InsertOrUpdateHabitos( $data , $formato )
    {
        if( !$formato->habitos )
        {
            $formato->habitos()->create($data);
        }else{
            $formato->habitos->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateDisponibilidad( $data , $formato )
    {
        if( !$formato->disponibilidad )
        {
            $formato->disponibilidad()->create($data);
        }else{
            $formato->disponibilidad->where('id',$data['id'])->update($data);
        }


    }

    private function InsertOrUpdateReferenciasPersonales( $data , $formato )
    {
        foreach ($data as $referencia ) 
        {
            $referencia_result = $formato->referencias_personales()->find( $referencia['id'] );
            if( !$referencia_result )
            {
                $formato->referencias_personales()->create($referencia);
            }else{
                $formato->referencias_personales()->where('id',$referencia['id'])->update($referencia);
            }
        }
    }

    private function InsertOrUpdateInformacionLaboral( $data , $formato )
    {
        foreach ($data as $referencia ) 
        {
            $referencia_result = $formato->informacion_laboral()->find( $referencia['id'] );
            if( !$referencia_result )
            {
                $formato->informacion_laboral()->create($referencia);
            }else{
                $formato->informacion_laboral()->where('id',$referencia['id'])->update($referencia);
            }
        }
    }

    public function deleteCursoRealizado(Request $request)
    {
        if( $request->id_remove_curso_realizado != 0 )
        {
            CursoHddisc::destroy($request->id_remove_curso_realizado);
        }

        return back();
    }

    public function deleteIdioma(Request $request)
    {
        if( $request->id_remove_idioma != 0 )
        {
            IdiomaHddisc::destroy($request->id_remove_idioma);
        }

        return back();
    }

    public function deleteConocimiento(Request $request)
    {
        if( $request->id_remove_conocimiento != 0 )
        {
            ConocimientosHddisc::destroy($request->id_remove_conocimiento);
        }

        return back();
    }

    public function deleteReferenciaPersonal(Request $request)
    {
        if( $request->id_remove_ref_personal != 0 )
        {
            ReferenciaPersonalHddisc::destroy($request->id_remove_ref_personal);
        }

        return back();
    }

    public function deleteReferenciaLaboral(Request $request)
    {
        if( $request->id_remove_ref_laboral != 0 )
        {
            InformacionLaboralHddisc::destroy($request->id_remove_ref_laboral);
        }

        return back();
    }

    public function deleteDatoFamiliar(Request $request)
    {
        if( $request->id_remove_dato_familiar != 0 )
        {
            DatoFamiliarHddisc::destroy($request->id_remove_dato_familiar);
        }

        return back();
    }

    public function deleteFamiliarPadece(Request $request)
    {
        if( $request->id_remove_familiar_padece != 0 )
        {
            PadecimientoFamiliarHddisc::destroy($request->id_remove_familiar_padece);
        }

        return back();
    }

}
