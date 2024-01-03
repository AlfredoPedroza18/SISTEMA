
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Hábitos y costumbres</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:20%;">Tipo</th>
                                <th class="text-center" style="width:20%;">Respuesta</th>
                                <th class="text-center" style="width:10%;">Cantidad</th>
                                <th class="text-center" style="width:10%;">Diario</th>
                                <th class="text-center" style="width:10%;">Semanal</th>
                                <th class="text-center" style="width:10%;">Quincenal</th>
                                <th class="text-center" style="width:10%;">Ocasional</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td style="width:20%;">
                                    <label class="col-md-4 control-label text-center">Alcoholismo </label>
                                    <input type="hidden" name="habitos_costumbres[0][id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[0]->id : 0 }}">
                                    <input type="hidden" name="habitos_costumbres[0][tipo]" value="Alcoholismo">  
                                </td>
                                <td style="width:20%;">
                                    <div class="col-md-12 text-center">
                                                        
                                        <select class="form-control" name="habitos_costumbres[0][respuesta]">
                                            <option value="1" 
                                            @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->habitos_detalle[0]->respuesta == '1' ) 
                                            selected="selected"
                                            @endif
                                            @endif
                                            >Si</option>
                                            <option value="2" 
                                            @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->habitos_detalle[0]->respuesta == '2' ) 
                                            selected="selected"
                                            @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[0]->cantidad : '' }}" 
                                                name="habitos_costumbres[0][cantidad]">
                                    </div>

                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[0]->diario : '' }}" 
                                                name="habitos_costumbres[0][diario]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[0]->semanal : '' }}" 
                                                name="habitos_costumbres[0][semanal]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[0]->quincenal : '' }}" 
                                                name="habitos_costumbres[0][quincenal]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[0]->ocasional : '' }}" 
                                                name="habitos_costumbres[0][ocasional]">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;">
                                    <label class="col-md-4 control-label text-center">Tabaquismo</label>
                                    <input type="hidden" name="habitos_costumbres[1][id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[1]->id : '0' }}">
                                    <input type="hidden" name="habitos_costumbres[1][tipo]" value="Tabaquismo">  
                                </td>
                                <td style="width:20%;">
                                    <div class="col-md-12 text-center">                   
                                        <select class="form-control" name="habitos_costumbres[1][respuesta]">
                                            <option value="1" 
                                            @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->habitos_detalle[1]->respuesta == '1' ) 
                                            selected="selected"
                                            @endif
                                            @endif
                                            >Si</option>
                                            <option value="2" 
                                            @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->habitos_detalle[1]->respuesta == '2' ) 
                                            selected="selected"
                                            @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[1]->cantidad : '' }}" 
                                                name="habitos_costumbres[1][cantidad]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[1]->diario : '' }}" 
                                                name="habitos_costumbres[1][diario]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[1]->semanal : '' }}" 
                                                name="habitos_costumbres[1][semanal]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[1]->quincenal : '' }}" 
                                                name="habitos_costumbres[1][quincenal]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[1]->ocasional : '' }}" 
                                                name="habitos_costumbres[1][ocasional]">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;">
                                    <label class="col-md-4 control-label text-center">Antidepresivos</label>
                                    <input type="hidden" name="habitos_costumbres[2][id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[2]->id : '0' }}">
                                    <input type="hidden" name="habitos_costumbres[2][tipo]" value="Antidepresivos">  
                                </td>
                                <td style="width:20%;">
                                    <div class="col-md-12 text-center">                   
                                        <select class="form-control" name="habitos_costumbres[2][respuesta]">
                                            <option value="1" 
                                            @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->habitos_detalle[2]->respuesta == '1' ) 
                                            selected="selected"
                                            @endif
                                            @endif
                                            >Si</option>
                                            <option value="2" 
                                            @if( $estudio->formatoHddisc ) 
                                            @if( $estudio->formatoHddisc->habitos_detalle[2]->respuesta == '2' ) 
                                            selected="selected"
                                            @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[2]->cantidad : '' }}" 
                                                name="habitos_costumbres[2][cantidad]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[2]->diario : '' }}" 
                                                name="habitos_costumbres[2][diario]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[2]->semanal : '' }}" 
                                                name="habitos_costumbres[2][semanal]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[2]->quincenal : '' }}" 
                                                name="habitos_costumbres[2][quincenal]">
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-md-12 text-center">                   
                                        <input  type="text" 
                                                class="form-control"                              
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos_detalle[2]->ocasional : '' }}" 
                                                name="habitos_costumbres[2][ocasional]">
                                    </div>
                                </td>

                            </tr>                     
                        </tbody>
                    </table>
                </div>        
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Realiza alguna actividad</label>
                <div class="col-md-2 text-center">           
                    <input type="hidden" name="habitos_costumbres_normal[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos->id : '0' }}">        
                    <select class="form-control" name="habitos_costumbres_normal[realiza_actividad]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->realiza_actividad == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->realiza_actividad == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label text-center"><strong>Tipo de actividad</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">Social</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tipo_actividad_social]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_social == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_social == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
                <label class="col-md-1 control-label">Deportiva</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tipo_actividad_deportiva]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_deportiva == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_deportiva == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
                <label class="col-md-1 control-label">Religiosa</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tipo_actividad_religiosa]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_religiosa == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_religiosa == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
                <label class="col-md-1 control-label">Cultural</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tipo_actividad_cultural]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_cultural == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tipo_actividad_cultural == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
            </div>

                
            
            <div class="form-group">
                <label class="col-md-2 control-label">¿Cual ó cuales?</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="habitos_costumbres_normal[cuales]"
                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->habitos->cuales : '' }}" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label text-center"><strong>Tiempo dedicado</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">Diario</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tiempo_dedicado_diario]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_diario == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_diario == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
                <label class="col-md-1 control-label">Semanal</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tiempo_dedicado_semanal]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_semanal == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_semanal == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
                <label class="col-md-1 control-label">Quincenal</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tiempo_dedicado_quincenal]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_quincenal == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_quincenal == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
                <label class="col-md-1 control-label">Mensual</label>
                <div class="col-md-2 text-center">                   
                    <select class="form-control" name="habitos_costumbres_normal[tiempo_dedicado_mensual]">
                        <option value="1" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_mensual == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoHddisc ) 
                                        @if( $estudio->formatoHddisc->habitos->tiempo_dedicado_mensual == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>                    
                </div>
            </div>
        </div>
    </div>
</div>