
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Referencias laborales</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-2 col-md-offset-1 text-right">
                    <a href="javascript:;" id="add-referencia-laboral" class="btn btn-circle btn-primary"><i class="fa fa-plus"></i></a>
                </div>
                <label class="col-md-3 text-center control-label"><strong>Empresa</strong></label>
                <label class="col-md-3 text-center control-label"><strong>Período</strong></label>
                <label class="col-md-3 text-center control-label"><strong>Motivo de Salida</strong></label>                
            </div>
            <div id="referencia-container">
            @if( $estudio->formatoJll )

                    @foreach ($estudio->formatoJll->referenciasLaborales as $index => $referencia)
                        <div id="fila_0" attr-row="0">
                            <div class="form-group">
                                <input type="hidden" name="referencia_laboral_simple[{{ $index }}][id]" value="{{ $referencia->id }}">
                                <div class="col-md-1 text-right">
                                    <a  href="javascript:;" 
                                        class="btn btn-xs btn-circle btn-danger frm-submit-delete-referencia-simple" 
                                        data-id-delete-referencia-simple="{{ $referencia->id }}">
                                            <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                <label class="col-md-2 text-right control-label"><strong>Empresa</strong></label>                    
                                <div class="col-md-3">
                                    <input  type="text" class="form-control" 
                                            name="referencia_laboral_simple[{{ $index }}][empresa_empresa]"
                                            value="{{ $referencia->empresa_empresa }}">
                                </div>
                                <div class="col-md-3">
                                    <input  type="text" class="form-control" 
                                            name="referencia_laboral_simple[{{ $index }}][periodo_empresa]"
                                            value="{{ $referencia->periodo_empresa }}">
                                </div>
                                <div class="col-md-3">
                                    <input  type="text" class="form-control" 
                                            name="referencia_laboral_simple[{{ $index }}][motivo_salida_empresa]"
                                            value="{{ $referencia->motivo_salida_empresa }}">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <label class="col-md-2 col-md-offset-1 text-right control-label"><strong>Candidato</strong></label>                    
                                <div class="col-md-3">
                                    <input  type="text" class="form-control" 
                                            name="referencia_laboral_simple[{{ $index }}][empresa_candidato]"
                                            value="{{ $referencia->empresa_candidato }}">
                                </div>
                                <div class="col-md-3">
                                    <input  type="text" class="form-control" 
                                            name="referencia_laboral_simple[{{ $index }}][periodo_candidato]"
                                            value="{{ $referencia->periodo_candidato }}">
                                </div>
                                <div class="col-md-3">
                                    <input  type="text" class="form-control" 
                                            name="referencia_laboral_simple[{{ $index }}][motivo_salida_candidato]"
                                            value="{{ $referencia->motivo_salida_candidato }}">
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                @else
                    <div id="fila_0" attr-row="0">
                        <div class="form-group">
                            <input type="hidden" name="referencia_laboral_simple[0][id]" value="0">
                            <label class="col-md-2 col-md-offset-1 text-right control-label"><strong>Empresa</strong></label>                    
                            <div class="col-md-3">
                                <input  type="text" class="form-control" 
                                        name="referencia_laboral_simple[0][empresa_empresa]"
                                        >
                            </div>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" 
                                        name="referencia_laboral_simple[0][periodo_empresa]"
                                        >
                            </div>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" 
                                        name="referencia_laboral_simple[0][motivo_salida_empresa]"
                                        >
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <label class="col-md-2 col-md-offset-1 text-right control-label"><strong>Candidato</strong></label>                    
                            <div class="col-md-3">
                                <input  type="text" class="form-control" 
                                        name="referencia_laboral_simple[0][empresa_candidato]"
                                        >
                            </div>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" 
                                        name="referencia_laboral_simple[0][periodo_candidato]"
                                        >
                            </div>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" 
                                        name="referencia_laboral_simple[0][motivo_salida_candidato]"
                                        >
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>