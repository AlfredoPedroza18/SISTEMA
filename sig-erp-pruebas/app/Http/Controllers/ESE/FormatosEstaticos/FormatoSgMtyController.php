<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;
use File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\SegurosMty\FormatoSegurosMonterrey as FormatoSM;
use App\ESE\Formatos\SegurosMty\CursoSegurosMonterrey;
use App\ESE\Formatos\SegurosMty\IdiomaSegurosMonterrey;
use App\ESE\Formatos\SegurosMty\ConocimientosSegurosMonterrey;
use App\ESE\Formatos\SegurosMty\ReferenciaPersonalSegurosMonterrey;
use App\ESE\Formatos\SegurosMty\InformacionLaboralSegurosMonterrey;




class FormatoSgMtyController extends Controller
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
    public function edit( Request $request, $id )
    {
        $formato       = Formato::find( $id );
        $estudio       = EstudioEse::find( $request->estudio );
        $os            = $estudio->ordenServicioEse->orden_servicio->id;
        $os_ese        = $estudio->ordenServicioEse->id;
        $id_ese        = $estudio->id;
        $backToEstudio = "estudio-ese/create?os=$os&os_ese=$os_ese&ese=$id_ese";
        
        if( $estudio && $formato )
        {
            return view('ESE.formatos-estaticos.seguros-monterrey.formato-sgmty', compact( 'estudio', 'backToEstudio' ) );
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
        $this->validate($request, 
            [    'datos_familiares.file' => 'image',       

            ],[  'datos_familiares.file.image' => 'El diagrama DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN, los datos del formulario no fueron gurdados, intenta de nuevo.',
            
            ]);
        $estudio = EstudioEse::with('formatoSM')->get()->find( $id );

        if( $estudio )
        {    
            $formato_estudio = null;
            
            if( !$estudio->formatoSM )
            {              

                $formato_sm             = new FormatoSM;
                $formato_sm->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoSM()->save( $formato_sm );  
            }else{
                $formato_estudio = $estudio->formatoSM;                
            }

            $this->InsertOrUpdateResumen( $formato_estudio, $request->resumen );            
            $this->InsertOrUpdatedatosGenerales( $formato_estudio, $request->datos_generales );
            $this->InsertOrUpdateDocumentacion( $formato_estudio, $request->documentacion );
            $this->InsertOrUpdateEscolaridad( $formato_estudio, $request->escolaridad );
            $this->InsertOrUpdateescolaridadObs( $formato_estudio, $request->escolaridad_obs );
            $this->InsertOrUpdateCursos( $formato_estudio, $request->curso );
            $this->InsertOrUpdateIdiomas( $formato_estudio, $request->idiomas );
            $this->InsertOrUpdateconocmientosHabilidades( $formato_estudio, $request->conocimientos );
            $this->InsertOrUpdateDatosFamiliares( $formato_estudio, $request->datos_familiares );
            $this->InsertOrUpdateSituacionEconomica( $formato_estudio, $request->situacion_economica );
            $this->InsertOrUpdateBienes( $formato_estudio, $request->bienes_detalle ); 
            $this->InsertOrUpdateBienesTotales( $formato_estudio, $request->bienes_total );
            $this->InsertOrUpdateTipoVivienda( $formato_estudio, $request->tipo_vivienda );
            $this->InsertOrUpdateTipoPropiedad( $formato_estudio, $request->tipo_propiedad );
            $this->InsertOrUpdateInfoViviendaServicios( $formato_estudio, $request->tipo_vivienda_servicios );
            $this->InsertOrUpdateInfoViviendaDistribucion( $formato_estudio, $request->tipo_vivienda_distribucion );
            $this->InsertOrUpdateInfoViviendaNivelEconomico( $formato_estudio, $request->tipo_vivienda_neconomico );
            $this->InsertOrUpdateViviendaCondicionesInteriores( $formato_estudio, $request->vivienda_condicion_interior );
            $this->InsertOrUpdateViviendaOrdenLimpieza( $formato_estudio, $request->vivienda_orden_limpieza );
            $this->InsertOrUpdateViviendaCalidadMobiliario( $formato_estudio, $request->vivienda_calidad_mobiliario );
            $this->InsertOrUpdateViviendaConservacionMobiliario( $formato_estudio, $request->vivienda_conservacion_mobiliario );
            $this->InsertOrUpdateViviendaEspacio( $formato_estudio, $request->vivienda_espacio );
            $this->InsertOrUpdateFamiliarEmpresa( $formato_estudio, $request->familiar_empresa );
            $this->InsertOrUpdateReferenciasPersonales( $formato_estudio, $request->referencias_personales );
            $this->InsertOrUpdateSituacionSocial( $formato_estudio, $request->situacion_social );
            $this->InsertOrUpdateHabitosDetalle( $formato_estudio, $request->habitos_costumbres );
            $this->InsertOrUpdateHabitos( $formato_estudio, $request->habitos_costumbres_normal );
            $this->InsertOrUpdateDisponibilidad( $formato_estudio, $request->disponibilidad );
            $this->InsertOrUpdateInfonavit( $formato_estudio, $request->rastreo_infonavit );
            $this->InsertOrUpdateUbicacionDomicilio( $formato_estudio, $request->ubicacion_domicilio );
            $this->InsertOrUpdateInformacionLaboral( $formato_estudio, $request->referencia_laboral );

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

    private function InsertOrUpdateResumen( $formato, $data )
    {
        
        if( !$formato->resumen )
        {
            $formato->resumen()->create($data);
        }else{
            $formato->resumen->where('id',$data['id'])->update($data);
        }
    }

    private function InsertOrUpdatedatosGenerales( $formato, $data )
    {
        if( !$formato->datos_generales )
        {
            $formato->datos_generales()->create($data);
        }else{
            $formato->datos_generales()->where('id',$data['id'])->update($data);
        }
    }

    private function InsertOrUpdatedocumentacion( $formato, $data )
    {
        if( !$formato->documentacion )
        {
            $formato->documentacion()->create($data);
        }else{
            $formato->documentacion()->where('id',$data['id'])->update($data);
        }
    }

    private function InsertOrUpdateescolaridad( $formato, $data )
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

    private function InsertOrUpdateescolaridadObs( $formato, $data )
    {
        if( !$formato->escolaridad_obs )
        {
            $formato->escolaridad_obs()->create($data);
        }else{
            $formato->escolaridad_obs()->where('id',$data['id'])->update($data);
        }
    }

    private function InsertOrUpdatecursos( $formato, $data )
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

    private function InsertOrUpdateidiomas( $formato, $data )
    {
        foreach ($data as $idioma) 
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

    private function InsertOrUpdateconocmientosHabilidades( $formato, $data )
    {
        foreach ( $data as $conocimiento ) 
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

    private function InsertOrUpdatedatosFamiliares( $formato, $data )
    {
        $form_df = null;
        if( !$formato->datos_familiares )
        {
            $form_df = $formato->datos_familiares()->create($data);
        }else{
            $formato->datos_familiares()->where('id',$data['id'])->update([ 'observaciones' => $data['observaciones'] ]);
            $form_df = $formato->datos_familiares()->find($data['id']);

        } 
            

        if($data['file'])
        {
            $path_ese_grafica = 'ESE\\ese' . $formato->ese->id. '\\diagrama';            
            $path_file        = $this->createPath($path_ese_grafica);

            $this->addDiagramaFamiliar($data['file'], $path_file, $form_df); 
        }
    }

    private function InsertOrUpdatesituacionEconomica( $formato, $data )
    {
        if( !$formato->situacion_economica )
        {
            $formato->situacion_economica()->create($data);
        }else{
            $formato->situacion_economica()->where('id',$data['id'])->update($data);
        } 
        
    }

    private function InsertOrUpdatebienes( $formato, $data )
    {
        foreach ($data as $bien) 
        {
            $bienes_result = $formato->bienes()->find( $bien['id'] );
            if( !$bienes_result )
            {
                $formato->bienes()->create($bien);
            }else{
                $formato->bienes()->where('id',$bien['id'])->update($bien);
            } 
        }
    }

    private function InsertOrUpdatebienesTotales( $formato, $data )
    {
        if( !$formato->bienes_totales )
        {
            $formato->bienes_totales()->create($data);
        }else{
            $formato->bienes_totales()->where('id',$data['id'])->update($data);
        }
    }

    private function InsertOrUpdatetipoVivienda( $formato, $data )
    {
        if( !$formato->tipo_vivienda )
        {
            $formato->tipo_vivienda()->create($data);
        }else{
            $formato->tipo_vivienda()->where('id',$data['id'])->update($data);
        }        
    }

    private function InsertOrUpdatetipoPropiedad( $formato, $data )
    {
        
        if( !$formato->tipo_propiedad )
        {
            $formato->tipo_propiedad()->create($data);
        }else{
            $formato->tipo_propiedad()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateinfoViviendaServicios( $formato, $data )
    {
        
        if( !$formato->info_vivienda_servicios )
        {
            $formato->info_vivienda_servicios()->create($data);
        }else{
            $formato->info_vivienda_servicios()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateinfoViviendaDistribucion( $formato, $data )
    {
        
        if( !$formato->info_vivienda_distribucion )
        {
            $formato->info_vivienda_distribucion()->create($data);
        }else{
            $formato->info_vivienda_distribucion()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateinfoViviendaNivelEconomico( $formato, $data )
    {
        
        if( !$formato->info_vivienda_nivel_economico )
        {
            $formato->info_vivienda_nivel_economico()->create($data);
        }else{
            $formato->info_vivienda_nivel_economico()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateviviendaCondicionesInteriores( $formato, $data )
    {
        
        if( !$formato->vivienda_condiciones_interiores )
        {
            $formato->vivienda_condiciones_interiores()->create($data);
        }else{
            $formato->vivienda_condiciones_interiores()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateviviendaOrdenLimpieza( $formato, $data )
    {
        
        if( !$formato->vivienda_orden_limpieza )
        {
            $formato->vivienda_orden_limpieza()->create($data);
        }else{
            $formato->vivienda_orden_limpieza()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateviviendaCalidadMobiliario( $formato, $data )
    {
        
        if( !$formato->vivienda_calidad_mobiliario )
        {
            $formato->vivienda_calidad_mobiliario()->create($data);
        }else{
            $formato->vivienda_calidad_mobiliario()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateviviendaConservacionMobiliario( $formato, $data )
    {
        
        if( !$formato->vivienda_conservacion_mobiliario )
        {
            $formato->vivienda_conservacion_mobiliario()->create($data);
        }else{
            $formato->vivienda_conservacion_mobiliario()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateviviendaEspacio( $formato, $data )
    {
        if( !$formato->vivienda_espacio )
        {
            $formato->vivienda_espacio()->create($data);
        }else{
            $formato->vivienda_espacio()->where('id',$data['id'])->update($data);
        }        
    }

    private function InsertOrUpdatefamiliarEmpresa( $formato, $data )
    {
        
        if( !$formato->familiar_empresa )
        {
            $formato->familiar_empresa()->create($data);
        }else{
            $formato->familiar_empresa()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdatereferenciasPersonales( $formato, $data )
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

    private function InsertOrUpdatesituacionSocial( $formato, $data )
    {
        if( !$formato->situacion_social )
        {
            $formato->situacion_social()->create($data);
        }else{
            $formato->situacion_social()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdatehabitosDetalle( $formato, $data )
    {
        foreach ( $data as $habito ) 
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

    private function InsertOrUpdatehabitos( $formato, $data )
    {        
        if( !$formato->habitos )
        {
            $formato->habitos()->create($data);
        }else{
            $formato->habitos()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdatedisponibilidad( $formato, $data )
    {        
        if( !$formato->disponibilidad )
        {
            $formato->disponibilidad()->create($data);
        }else{
            $formato->disponibilidad()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateInfonavit( $formato, $data )
    {        
        if( !$formato->rastreo_infonavit )
        {
            $formato->rastreo_infonavit()->create($data);
        }else{
            $formato->rastreo_infonavit()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateubicacionDomicilio( $formato, $data )
    {
        
        if( !$formato->ubicacion_domicilio )
        {
            $formato->ubicacion_domicilio()->create($data);
        }else{
            $formato->ubicacion_domicilio()->where('id',$data['id'])->update($data);
        } 
    }

    private function InsertOrUpdateinformacionLaboral( $formato, $data )
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
            CursoSegurosMonterrey::destroy($request->id_remove_curso_realizado);
        }

        return back();
    }

    public function deleteIdioma(Request $request)
    {
        if( $request->id_remove_idioma != 0 )
        {
            IdiomaSegurosMonterrey::destroy($request->id_remove_idioma);
        }

        return back();
    }

    public function deleteConocimiento(Request $request)
    {
        if( $request->id_remove_conocimiento != 0 )
        {
            ConocimientosSegurosMonterrey::destroy($request->id_remove_conocimiento);
        }

        return back();
    }

    public function deleteReferenciaPersonal(Request $request)
    {
        if( $request->id_remove_ref_personal != 0 )
        {
            ReferenciaPersonalSegurosMonterrey::destroy($request->id_remove_ref_personal);
        }

        return back();
    }

    public function deleteReferenciaLaboral(Request $request)
    {
        if( $request->id_remove_ref_laboral != 0 )
        {
            InformacionLaboralSegurosMonterrey::destroy($request->id_remove_ref_laboral);
        }

        return back();
    }

    private function createPath($ruta)
    {        
        $path = $ruta; 
        if( !file_exists($path) )
        {
            File::makeDirectory(public_path().'/'.$path,0777,true);
        }

        return $path;
    }

    private function addDiagramaFamiliar($file, $path_file, $formato_df)
    {
        $strAddFile = '';
        $name_file  = $file->getClientOriginalName();
        $file->move($path_file,$name_file);         
        $formato_df->path = $path_file;
        $formato_df->file = $name_file;
        $formato_df->save();
        

    }
}
