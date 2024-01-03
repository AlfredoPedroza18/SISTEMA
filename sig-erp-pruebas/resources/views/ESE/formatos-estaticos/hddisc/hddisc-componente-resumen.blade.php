
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Estudio Socioeconómico</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Empresa: </label>
                <div class="col-md-4">
                    <input type="hidden" name="resumen[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->id : 0 }}">
                    <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->cliente ) ? $estudio->cliente->nombre_comercial : '' }}" 
                            name="resumen[empresa]">
                </div>                
            
                <label class="col-md-2 control-label">Nombre: </label>
                <div class="col-md-4">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
                            name="resumen[nombre]">
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Puesto: </label>
                <div class="col-md-4">                    
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->puesto : '' }}" 
                            name="resumen[puesto]">
                </div>                
	            <label class="col-md-2 control-label">Resultado: </label>
	                <div class="col-md-4">                    
	                    <select class="form-control" name="resumen[status]">
	                        <option value="1" 
                                    @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->resumen->status == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable</option>
	                        <option value="2" 
                                    @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->resumen->status == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable con reservas</option>
	                        <option value="3" 
                                    @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->resumen->status == '3' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No Recomendable</option>
	                    </select>
	                </div>                
            </div>
            <div class="form-group">
            	<hr>
                <label class="col-md-12 control-label text-center"><strong>Resumen</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Situación Socioeconómica: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[situacion_socioeconomica]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->situacion_socioeconomica : '' }}</textarea>
                </div>                
            </div>                
            <div class="form-group">
                <label class="col-md-2 control-label">Escolaridad: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[escolaridad]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->escolaridad : '' }}</textarea>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Trayectoria Laboral: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="resumen[trayectoria_laboral]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->trayectoria_laboral : '' }}</textarea>
                </div>                
            </div>
            <div class="form-group">
                <hr>
                <label class="col-md-12 control-label text-center"><strong>Valores calificados durante la aplicación del Estudio Socioeconómico</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Disponibilidad: </label>
                <div class="col-md-2">                    
                    <select class="form-control" name="resumen[disponibilidad]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->disponibilidad == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Buena</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->disponibilidad == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Regular</option>
                        <option value="3" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->disponibilidad == '3' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Mala</option>
                    </select>
                </div>
                <label class="col-md-1 control-label">Puntualidad: </label>
                <div class="col-md-2">                    
                    <select class="form-control" name="resumen[puntualidad]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->puntualidad == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Buena</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->puntualidad == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Regular</option>
                        <option value="3" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->puntualidad == '3' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Mala</option>
                    </select>
                </div>
                <label class="col-md-1 control-label">Presentacion: </label>
                <div class="col-md-2">                    
                    <select class="form-control" name="resumen[presentacion]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->presentacion == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Buena</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->presentacion == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Regular</option>
                        <option value="3" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->presentacion == '3' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Mala</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Comentarios: </label>
                <div class="col-md-10">   
                    <textarea class="form-control" rows="3" name="resumen[comentarios]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->comentarios : '' }}</textarea>
                </div>                
            </div> 
            <div class="form-group">
                <label class="col-md-5 control-label">La entrevista se llevo a cabo en casa, en compañía de, su actitud fue  y sus respuestas fueron:</label>
                <div class="col-md-2">                    
                    <select class="form-control" name="resumen[respuestas]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->respuestas == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Claras</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->respuestas == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Concretas</option>
                        <option value="3" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->respuestas == '3' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Fluidas</option>
                        <option value="4" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->respuestas == '4' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Confusas</option>
                        <option value="5" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->resumen->respuestas == '5' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Incompletas</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Incidentes de Seguridad en la Información: </label>
                <div class="col-md-10">   
                    <textarea class="form-control" rows="3" name="resumen[incidentes_seguridad]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->resumen->incidentes_seguridad : '' }}</textarea>
                </div>                
            </div>           
        </div>
    </div>
</div>