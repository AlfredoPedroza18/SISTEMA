
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Datos Familiares</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary frm-submit-delete-viven-dom"
                        id="add-row-dato-familiar" 
                        data-id-delete-vive-persona="0">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
            </div>
            <div class="form-group">
                <label class="col-md-2 text-center control-label"><strong>Parentesco</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Nombre</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Edad</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Edo. Civil</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Ocupación (Empresa)</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Domicilio</strong></label>
            </div>
            <div id="dato-familiar-container">
            @if( $estudio->formatoFemsa )
                @forelse( $estudio->formatoFemsa->datos_familiares as $index => $familiar )
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-xs frm-submit-delete-dato-familiar"
                                data-id-delete-dato-familiar="{{ $familiar->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="parentesco[{{ $index }}][id]" value="{{ $familiar->id }}">
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][parentesco]" value="{{ $familiar->parentesco }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][nombre]" value="{{ $familiar->nombre }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][edad]" value="{{ $familiar->edad }}">
                        </div>
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][edo_civil]" value="{{ $familiar->edo_civil }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][ocupacion]" value="{{ $familiar->ocupacion }}">
                        </div>
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][domicilio]" value="{{ $familiar->domicilio }}">
                        </div>
                    </div>
                @empty
                    <div class="form-group">
                        <input type="hidden" name="parentesco[0][id]" value="0">
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="parentesco[0][parentesco]" value="">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[0][nombre]" value="">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[0][edad]" value="">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[0][edo_civil]" value="">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[0][ocupacion]" value="">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[0][domicilio]" value="">
                        </div>
                    </div>
                @endforelse
            @else
                <div class="form-group">
                    <input type="hidden" name="parentesco[0][id]" value="0">
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][parentesco]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][nombre]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][edad]" value="">
                    </div>
                    <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[0][edo_civil]" value="">
                        </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][ocupacion]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][domicilio]" value="">
                    </div>
                </div>
            @endif
            </div> 
            <div class="form-group">
                <label class="col-md-12 text-center"><strong>Información Familiar</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-3">¿Con quién habita actualmente?</label>
                <div class="col-md-9">
                    <input  type="hidden" name="informacion_familiar[id]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->id : '0' }}">
                    <input  type="text" class="form-control" name="informacion_familiar[habita_actualmente]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->habita_actualmente : '' }}"> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">¿Cómo considera que es su relación con ellos?</label>
                <div class="col-md-9">
                    <input  type="text" class="form-control" name="informacion_familiar[relacion]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->relacion : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?</label>
                <div class="col-md-9">
                    <input  type="text" class="form-control" name="informacion_familiar[familiares_extranjero]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->familiares_extranjero : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Y, ¿al interior de la República?. ¿En dónde?</label>
                <div class="col-md-9">
                    <input  type="text" class="form-control" name="informacion_familiar[interior_republica]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->interior_republica : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">¿Con qué frecuencia los visita?</label>
                <div class="col-md-9">
                    <input  type="text" class="form-control" name="informacion_familiar[visita_frecuencia]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->visita_frecuencia : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-11">   
                    <textarea class="form-control" rows="3" name="informacion_familiar[observaciones]">{{ isset( $estudio->formatoFemsa->resumen ) ? $estudio->formatoFemsa->informacion_familiar->observaciones : '' }}</textarea>
                </div>                
            </div>
        </div>
    </div>
</div>