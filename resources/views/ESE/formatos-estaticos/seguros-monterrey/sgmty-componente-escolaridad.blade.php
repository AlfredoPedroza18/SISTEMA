
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Escolaridad</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label text-center"><strong>Grado</strong></label>                
                <label class="col-md-2 control-label text-center"><strong>Institución</strong></label>                
                <label class="col-md-2 control-label text-center"><strong>Domicilio</strong></label> 
                <label class="col-md-2 control-label text-center"><strong>Periódo</strong></label>                
                <label class="col-md-2 control-label text-center"><strong>Años</strong></label>                
                <label class="col-md-2 control-label text-center"><strong>Comprobante</strong></label>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label text-center">Primaria </label>
                <div class="col-md-2 text-center">
                    <input type="hidden" name="escolaridad[0][id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad->first()->id : 0 }}">
                    <input type="hidden" name="escolaridad[0][grado]" value="Primaria">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad->first()->institucion : '' }}" 
                            name="escolaridad[0][institucion]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad->first()->domicilio : '' }}" 
                            name="escolaridad[0][domicilio]">
                </div>                                
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad->first()->periodo : '' }}" 
                            name="escolaridad[0][periodo]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad->first()->anios : '' }}" 
                            name="escolaridad[0][anios]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad->first()->comprobante : '' }}" 
                            name="escolaridad[0][comprobante]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label text-center">Secundaria </label>
                <div class="col-md-2 text-center">
                    <input type="hidden" name="escolaridad[1][id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[1]->id : 0 }}">
                    <input type="hidden" name="escolaridad[1][grado]" value="Secundaria">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[1]->institucion : '' }}" 
                            name="escolaridad[1][institucion]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[1]->domicilio : '' }}" 
                            name="escolaridad[1][domicilio]">
                </div>                                
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[1]->periodo : '' }}" 
                            name="escolaridad[1][periodo]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[1]->anios : '' }}" 
                            name="escolaridad[1][anios]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[1]->comprobante : '' }}" 
                            name="escolaridad[1][comprobante]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label text-center">Técnica </label>
                <div class="col-md-2 text-center">
                    <input type="hidden" name="escolaridad[2][id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[2]->id : 0 }}">
                    <input type="hidden" name="escolaridad[2][grado]" value="Técnica">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[2]->institucion : '' }}" 
                            name="escolaridad[2][institucion]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[2]->domicilio : '' }}" 
                            name="escolaridad[2][domicilio]">
                </div>                                
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[2]->periodo : '' }}" 
                            name="escolaridad[2][periodo]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[2]->anios : '' }}" 
                            name="escolaridad[2][anios]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[2]->comprobante : '' }}" 
                            name="escolaridad[2][comprobante]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label text-center">Preparatoria </label>
                <div class="col-md-2 text-center">
                    <input type="hidden" name="escolaridad[3][id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[3]->id : 0 }}">
                    <input type="hidden" name="escolaridad[3][grado]" value="Preparatoria">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[3]->institucion : '' }}" 
                            name="escolaridad[3][institucion]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[3]->domicilio : '' }}" 
                            name="escolaridad[3][domicilio]">
                </div>                                
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[3]->periodo : '' }}" 
                            name="escolaridad[3][periodo]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[3]->anios : '' }}" 
                            name="escolaridad[3][anios]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[3]->comprobante : '' }}" 
                            name="escolaridad[3][comprobante]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label text-center">Profesional </label>
                <div class="col-md-2 text-center">
                    <input type="hidden" name="escolaridad[4][id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[4]->id : 0 }}">
                    <input type="hidden" name="escolaridad[4][grado]" value="Profesional">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[4]->institucion : '' }}" 
                            name="escolaridad[4][institucion]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[4]->domicilio : '' }}" 
                            name="escolaridad[4][domicilio]">
                </div>                                
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[4]->periodo : '' }}" 
                            name="escolaridad[4][periodo]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[4]->anios : '' }}" 
                            name="escolaridad[4][anios]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[4]->comprobante : 'asasa' }}" 
                            name="escolaridad[4][comprobante]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label text-center">Otro </label>
                <div class="col-md-2 text-center">
                    <input type="hidden" name="escolaridad[5][id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[5]->id : 0 }}">
                    <input type="hidden" name="escolaridad[5][grado]" value="Otro">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[5]->institucion : '' }}" 
                            name="escolaridad[5][institucion]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[5]->domicilio : '' }}" 
                            name="escolaridad[5][domicilio]">
                </div>                                
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[5]->periodo : '' }}" 
                            name="escolaridad[5][periodo]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[5]->anios : '' }}" 
                            name="escolaridad[5][anios]">
                </div>
                <div class="col-md-2 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad[5]->comprobante : 'asasa' }}" 
                            name="escolaridad[5][comprobante]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Comentarios: </label>
                <div class="col-md-10"> 
                    <input type="hidden" name="escolaridad_obs[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->escolaridad_obs->id : 0 }}">  
                    <textarea class="form-control" rows="3" name="escolaridad_obs[observaciones]">{{ isset( $estudio->formatoSM->escolaridad_obs ) ? $estudio->formatoSM->escolaridad_obs->observaciones : '' }}</textarea>
                </div>                
            </div>  
            <div class="form-group">
                <hr>
                <label class="col-md-12 control-label text-center"><strong>Cursos Realizados</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary"
                        id="add-escolaridad-cursos" >
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-md-offset-2 control-label text-center"><strong>De</strong></label>
                <label class="col-md-3 control-label text-center"><strong>A</strong></label>
                <label class="col-md-3 control-label text-center"><strong>Realizó</strong></label>
            </div>
            <div id="cursos-realizados-container">

                @if( $estudio->formatoSM )
                    @forelse( $estudio->formatoSM->cursos as $index => $curso )
                        <div class="form-group">
                            <div class="col-md-1 col-md-offset-1 text-right">
                                <a  href="javascript:;" 
                                    class="btn btn-circle btn-danger btn-sm frm-submit-delete-curso-realizado"
                                    data-id-delete-curso="{{ $curso->id }}">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="curso[{{ $index }}][id]" value="{{ $curso->id }}">
                                <input  type="text" 
                                        class="form-control"                              
                                        value="{{ $curso->de }}" 
                                        name="curso[{{ $index }}][de]">
                            </div>
                            <div class="col-md-3">                    
                                <input  type="text" 
                                        class="form-control"                            
                                        value="{{ $curso->a }}" 
                                        name="curso[{{ $index }}][a]">
                            </div>
                            <div class="col-md-3">                    
                                <input  type="text" 
                                        class="form-control"                            
                                        value="{{ $curso->curso }}" 
                                        name="curso[{{ $index }}][curso]">
                            </div>
                        </div>
                    @empty
                        <div class="form-group">
                            <div class="col-md-3">
                                <input type="hidden" name="curso[0][id]" value="0">
                                <input  type="text" class="form-control" value="" name="curso[0][de]">
                            </div>
                            <div class="col-md-3">                    
                                <input  type="text" class="form-control" value="" name="curso[0][a]">
                            </div>
                            <div class="col-md-3">                    
                                <input  type="text" class="form-control" value="" name="curso[0][curso]">
                            </div>
                        </div>
                    @endforelse


                @else
                    <div class="form-group">
                        <div class="col-md-3">
                            <input type="hidden" name="curso[0][id]" value="0">
                            <input  type="text" class="form-control" value="" name="curso[0][de]">
                        </div>
                        <div class="col-md-3">                    
                            <input  type="text" class="form-control" value="" name="curso[0][a]">
                        </div>
                        <div class="col-md-3">                    
                            <input  type="text" class="form-control" value="" name="curso[0][curso]">
                        </div>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <hr>
                <label class="col-md-12 control-label text-center"><strong>Idiomas</strong></label>
            </div>
             <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary"
                        id="add-escolaridad-idiomas" 
                        data-id-delete-vive-persona="0">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1 text-center control-label"><strong>Idioma</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Hablado</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Leído</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Escrito</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Comprensión</strong></label>
                <label class="col-md-1 text-center control-label"><strong>%</strong></label>
            </div>
            <div id="escolaridad-idiomas-container">
            @if( $estudio->formatoSM )
                @forelse( $estudio->formatoSM->idiomas as $index => $idioma )
                    <div class="form-group">
                        <label class="col-md-1 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-sm frm-submit-delete-idioma"
                                    data-id-delete-idioma="{{ $idioma->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <div class="col-md-2">
                            <input  type="hidden" name="idiomas[{{ $index }}][id]" value="{{ $idioma->id }}" >
                            <input  type="text" class="form-control" name="idiomas[{{ $index }}][idioma]" value="{{ $idioma->idioma }}" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[{{ $index }}][hablado]" value="{{ $idioma->hablado }}" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[{{ $index }}][leido]" value="{{ $idioma->leido }}" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[{{ $index }}][escrito]" value="{{ $idioma->escrito }}" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[{{ $index }}][comprension]" value="{{ $idioma->comprension }}" >
                        </div>
                        <div class="col-md-1">
                            <input  type="number" class="form-control" name="idiomas[{{ $index }}][porcentaje]" value="{{ $idioma->porcentaje_total }}" readonly="readonly">
                        </div>
                    </div>
                @empty
                    <div class="form-group">
                        <input  type="hidden" name="idiomas[0][id]" value="0" >
                        <div class="col-md-2">
                            <input  type="text" class="form-control" name="idiomas[0][idioma]" value="" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[0][hablado]" value="0" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[0][leido]" value="0" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[0][escrito]" value="0" >
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[0][comprension]" value="0" >
                        </div>
                        <div class="col-md-1">
                            <input  type="number" class="form-control" name="idiomas[0][porcentaje]" value="" readonly="readonly">
                        </div>
                    </div>
                @endforelse



            @else
                <div class="form-group">
                    <input  type="hidden" name="idiomas[0][id]" value="0" >
                    <div class="col-md-2">
                        <input  type="text" class="form-control" name="idiomas[0][idioma]" value="" >
                    </div>
                    <div class="col-md-2">
                        <input  type="number" class="form-control" name="idiomas[0][hablado]" value="0" >
                    </div>
                    <div class="col-md-2">
                        <input  type="number" class="form-control" name="idiomas[0][leido]" value="0" >
                    </div>
                    <div class="col-md-2">
                        <input  type="number" class="form-control" name="idiomas[0][escrito]" value="0" >
                    </div>
                    <div class="col-md-2">
                        <input  type="number" class="form-control" name="idiomas[0][comprension]" value="0" >
                    </div>
                    <div class="col-md-1">
                        <input  type="number" class="form-control" name="idiomas[0][porcentaje]" value="0" >
                    </div>
                </div>
            @endif
            </div>

            <div class="form-group">
                <hr>
                <label class="col-md-12 control-label text-center"><strong>Conocimientos y habilidades</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary"
                        id="add-escolaridad-conocimiento">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
                <label class="col-md-4 control-label text-center"><strong>Paqueteria</strong></label>                
                <label class="col-md-4 control-label text-center"><strong>Porcentaje</strong></label>                 
            </div>
            <div id="conocimientos-container">
                @if( $estudio->formatoSM )
                    @forelse( $estudio->formatoSM->conocmientos_habilidades as $index => $conocimiento )
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1 text-center control-label">
                                <a  href="javascript:;" 
                                    class="btn btn-circle btn-danger btn-sm frm-submit-delete-conocimiento"
                                    data-id-delete-conocimiento="{{ $conocimiento->id }}">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </label>
                            <div class="col-md-4">
                                <input  type="hidden" 
                                        name="conocimientos[{{ $index }}][id]" 
                                        value="{{ $conocimiento->id }}">
                                <input  type="text" 
                                        class="form-control"                              
                                        value="{{ $conocimiento->paqueteria }}" 
                                        name="conocimientos[{{ $index }}][paqueteria]">
                            </div>
                            <div class="col-md-4">                    
                                <input  type="text" 
                                        class="form-control"                            
                                        value="{{ $conocimiento->porcentaje }}" 
                                        name="conocimientos[{{ $index }}][porcentaje]">
                            </div>
                        </div>
                    @empty
                        <div class="form-group">
                            <div class="col-md-4" col-md-offset-3>
                                <input type="hidden" name="conocimientos[0][id]" value="0">
                                <input  type="text" class="form-control" value="" name="conocimientos[0][paqueteria]">
                            </div>
                            <div class="col-md-4">                    
                                <input  type="text" class="form-control" value="" name="conocimientos[0][porcentaje]">
                            </div>
                        </div>
                    @endforelse
                @else
                    <div class="form-group">
                        <div class="col-md-4" col-md-offset-3>
                            <input type="hidden" name="conocimientos[0][id]" value="0">
                            <input  type="text" class="form-control" value="" name="conocimientos[0][paqueteria]">
                        </div>
                        <div class="col-md-4">                    
                            <input  type="text" class="form-control" value="" name="conocimientos[0][porcentaje]">
                        </div>
                    </div>
                @endif
            </div>
            
            

        </div>
    </div>
</div>