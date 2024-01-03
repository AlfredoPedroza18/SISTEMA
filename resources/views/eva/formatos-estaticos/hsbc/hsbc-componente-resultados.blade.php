
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Estudio de Referencias</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Nombre del candidato: </label>
                <div class="col-md-10">
                    <input type="hidden" name="resultados[id]" value="{{ isset( $estudio->formatoHsbc ) ? $estudio->formatoHsbc->id : 0 }}">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
                            name="resultados[candidato]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Fecha: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->candidato ) ? $estudio->fecha_visita_formato : '' }}" name="resultados[fecha_visita]">
                </div>
                <label class="col-md-2 control-label">Resultado: </label>
                <div class="col-md-4">
                    {{--<input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->resultado_final_ese ) ?  $estudio->resultado_final_ese->nombre : 'Sin resultado' }}" 
                            name="resultados[resultado_candidato]">--}}
                    <select class="form-control" name="resultados[resultado_candidato]">
                            <option value="1" 
                                    @if( $estudio->formatoHsbc ) 
                                            @if( $estudio->formatoHsbc->resultado->resultado_candidato == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Apto</option>
                            <option value="2" 
                                    @if( $estudio->formatoHsbc ) 
                                            @if( $estudio->formatoHsbc->resultado->resultado_candidato == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Apto con reservas</option>
                            <option value="3" 
                                    @if( $estudio->formatoHsbc ) 
                                            @if( $estudio->formatoHsbc->resultado->resultado_candidato == '3' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No Apto</option>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Verificación laboral: </label>
                <div class="col-md-10">                    
                    <textarea class="form-control" rows="5" name="resultados[resultados_verificacion_laboral]">{{ isset( $estudio->formatoHsbc->resultado ) ? $estudio->formatoHsbc->resultado->resultados_verificacion_laboral : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Verificación escolar: </label>
                <div class="col-md-10">                    
                    <textarea class="form-control" rows="5" name="resultados[resultados_verificacion_escolar]">{{ isset( $estudio->formatoHsbc->resultado ) ? $estudio->formatoHsbc->resultado->resultados_verificacion_escolar : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Gap employments: </label>
                <div class="col-md-10">                    
                    <textarea class="form-control" rows="5" name="resultados[resultados_gaps]">{{ isset( $estudio->formatoHsbc->resultado ) ? $estudio->formatoHsbc->resultado->resultados_gaps : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Observaciones: </label>
                <div class="col-md-10">                    
                    <textarea class="form-control" rows="2" name="resultados[observaciones]">{{ isset( $estudio->formatoHsbc->resultado ) ? trim($estudio->formatoHsbc->resultado->observaciones) : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>