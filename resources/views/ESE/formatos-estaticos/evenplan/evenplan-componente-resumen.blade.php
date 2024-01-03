
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
                <label class="col-md-2 control-label">Nombre: </label>
                <div class="col-md-4">
                    <input type="hidden" name="resumen[id]" value="{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->id : 0 }}">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
                            name="resumen[candidato]">
                </div>                
            
                <label class="col-md-2 control-label">Puesto solicitado: </label>
                <div class="col-md-4">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->puesto_solicitado : '' }}" 
                            name="resumen[puesto_solicitado]">
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Cliente: </label>
                <div class="col-md-4">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->cliente ) ? $estudio->cliente->nombre_comercial : '' }}" 
                            name="resumen[cliente]">
                </div>                
                <label class="col-md-2 control-label">En atención a: </label>
                <div class="col-md-4">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->atencion_a : '' }}" 
                            name="resumen[atencion_a]">
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Gráfica (Únicamente imagenes): </label>
                <div class="col-md-4">                    
                    <input  type="file" 
                            accept="image/x-png,image/jpeg"
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->atencion_a : '' }}" 
                            name="resumen_grafica[grafica]">
                </div>                
	            <label class="col-md-2 control-label">Resultado: </label>
	                <div class="col-md-4">                    
	                    <select class="form-control" name="resumen[resultado]">
	                        <option value="1" 
                                    @if( $estudio->formatoEvenplan ) 
                                            @if( $estudio->formatoEvenplan->resumen->resultado == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable</option>
	                        <option value="2" 
                                    @if( $estudio->formatoEvenplan ) 
                                            @if( $estudio->formatoEvenplan->resumen->resultado == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable con reservas</option>
	                        <option value="3" 
                                    @if( $estudio->formatoEvenplan ) 
                                            @if( $estudio->formatoEvenplan->resumen->resultado == '3' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No Recomendable</option>
	                    </select>
	                </div>                
            </div>
            <div class="form-group">
            	<hr>
                <label class="col-md-12 control-label text-center"><strong>Observaciones</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Personal: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[observaciones_personal]">{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_personal : '' }}</textarea>
                </div>                
            </div>                
            <div class="form-group">
                <label class="col-md-2 control-label">Familiar: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[observaciones_familiar]">{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_familiar : '' }}</textarea>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Escolar: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[observaciones_escolar]">{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_escolar : '' }}</textarea>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Económico: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[observaciones_economico]">{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_economico : '' }}</textarea>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Laboral: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[observaciones_laboral]">{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_laboral : '' }}</textarea>
                </div>                
            </div>
            
            <div class="form-group">
                <label class="col-md-2 control-label">Observaciones finales: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[observaciones_finales]">{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_finales : '' }}</textarea>
                </div>                
            </div>
            
        </div>
    </div>
</div>