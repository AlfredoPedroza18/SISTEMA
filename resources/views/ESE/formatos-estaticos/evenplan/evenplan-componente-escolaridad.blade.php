
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
                <label class="col-md-4 control-label text-center"><strong>Nivel Escolar</strong></label>                
                <label class="col-md-4 control-label text-center"><strong>Institución</strong></label>                
                <label class="col-md-4 control-label text-center"><strong>Certificado</strong></label>                
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label text-center">Primaria </label>
                <div class="col-md-4 text-center">
                    <input type="hidden" name="escolaridad[0][id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad->first()->id : 0 }}">
                    <input type="hidden" name="escolaridad[0][nivel_escolar]" value="Primaria">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad->first()->institucion : '' }}" 
                            name="escolaridad[0][institucion]">
                </div>
                <div class="col-md-4 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad->first()->certificado : '' }}" 
                            name="escolaridad[0][certificado]">
                </div>                                
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label text-center">Secundaria </label>
                <div class="col-md-4 text-center">
                    <input type="hidden" name="escolaridad[1][id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[1]->id : 0 }}">
                    <input type="hidden" name="escolaridad[1][nivel_escolar]" value="Secundaria">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[1]->institucion : '' }}" 
                            name="escolaridad[1][institucion]">
                </div>
                <div class="col-md-4 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[1]->certificado : '' }}" 
                            name="escolaridad[1][certificado]">
                </div>                                
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label text-center">Bachillerato </label>
                <div class="col-md-4 text-center">
                    <input type="hidden" name="escolaridad[2][id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[2]->id : 0 }}">
                    <input type="hidden" name="escolaridad[2][nivel_escolar]" value="Bachillerato">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[2]->institucion : '' }}" 
                            name="escolaridad[2][institucion]">
                </div>
                <div class="col-md-4 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[2]->certificado : '' }}" 
                            name="escolaridad[2][certificado]">
                </div>                                
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label text-center">Licenciatura </label>
                <div class="col-md-4 text-center">
                    <input type="hidden" name="escolaridad[3][id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[3]->id : 0 }}">
                    <input type="hidden" name="escolaridad[3][nivel_escolar]" value="Licenciatura">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[3]->institucion : '' }}" 
                            name="escolaridad[3][institucion]">
                </div>
                <div class="col-md-4 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[3]->certificado : '' }}" 
                            name="escolaridad[3][certificado]">
                </div>                                
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label text-center">Posgrado </label>
                <div class="col-md-4 text-center">
                    <input type="hidden" name="escolaridad[4][id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[4]->id : 0 }}">
                    <input type="hidden" name="escolaridad[4][nivel_escolar]" value="Posgrado">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[4]->institucion : '' }}" 
                            name="escolaridad[4][institucion]">
                </div>
                <div class="col-md-4 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[4]->certificado : '' }}" 
                            name="escolaridad[4][certificado]">
                </div>                                
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label text-center">Otro </label>
                <div class="col-md-4 text-center">
                    <input type="hidden" name="escolaridad[5][id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[5]->id : 0 }}">
                    <input type="hidden" name="escolaridad[5][nivel_escolar]" value="Otro">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[5]->institucion : '' }}" 
                            name="escolaridad[5][institucion]">
                </div>
                <div class="col-md-4 text-center">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridad[5]->certificado : '' }}" 
                            name="escolaridad[5][certificado]">
                </div>                                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">¿Estudia Actualmente? </label>
                <div class="col-md-4">
                    <input type="hidden" name="escolaridad_detalle[id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->id : 0 }}">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->estudia_actualmente : '' }}" 
                            name="escolaridad_detalle[estudia_actualmente]">
                </div>
                <label class="col-md-2 control-label">¿Dónde? </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->donde : '' }}" 
                            name="escolaridad_detalle[donde]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">¿En que horario? </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->horario : '' }}" 
                            name="escolaridad_detalle[horario]">
                </div>
            </div>

            <div class="form-group">
                <hr>
                <label class="col-md-12 text-center control-label"><strong>Idiomas</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary"
                        id="add-idioma-escolaridad" 
                        data-id-delete-vive-persona="0">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
                <label class="col-md-3 text-center control-label"><strong>Idioma</strong></label>
                <label class="col-md-3 text-center control-label"><strong>Porcentaje</strong></label>
                <label class="col-md-3 text-center control-label"><strong>Certificación</strong></label>
            </div>
            <div id="idiomas-container">
            @if($estudio->formatoEvenplan)
                @forelse( $estudio->formatoEvenplan->idiomas as $index => $idioma )
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-xs frm-submit-delete-idioma"
                                data-id-delete-idioma="{{ $idioma->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <input type="hidden" name="idiomas[{{ $index }}][id]" value="{{ $idioma->id }}">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="idiomas[{{ $index }}][idioma]" value="{{ $idioma->idioma }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="idiomas[{{ $index }}][porcentaje]" value="{{ $idioma->porcentaje }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="idiomas[{{ $index }}][certificacion]" value="{{ $idioma->certificacion }}">
                        </div>
                    </div>
                @empty
                    <div class="form-group">
                        <input type="hidden" name="idiomas[0][id]" value="">
                        <div class="col-md-3 col-md-offset-2">
                            <input type="text" class="form-control" name="idiomas[0][idioma]" value="">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="idiomas[0][porcentaje]" value="">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="idiomas[0][certificacion]" value="">
                        </div>
                    </div>
                @endforelse

            @else


                <div class="form-group">
                    <input type="hidden" name="idiomas[0][id]" value="">
                    <div class="col-md-3 col-md-offset-2">
                        <input type="text" class="form-control" name="idiomas[0][idioma]" value="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idiomas[0][porcentaje]" value="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idiomas[0][certificacion]" value="">
                    </div>
                </div>
            @endif

            </div>
            
            

        </div>
    </div>
</div>