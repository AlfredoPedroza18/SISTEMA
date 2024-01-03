
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Apreciación de la Vivienda</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nivel Económico</th>
                                <th class="text-center">Construcción</th>
                                <th class="text-center">Conservación</th>
                                <th class="text-center">Mobiliario</th>
                                <th class="text-center">De Corte</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Alta </label>
                                    <div class="col-md-6 text-center">   
                                        <input type="hidden" name="vivienda_nivel_economico[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->info_vivienda_nivel_economico->id : '0' }}">                
                                            <input  type="text" 
                                                    name="vivienda_nivel_economico[alta]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->info_vivienda_nivel_economico->alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Antigua </label>
                                    <div class="col-md-6 text-center">                   
                                        <input type="hidden" name="vivienda_construccion[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_construccion->id : '0' }}">                
                                            <input  type="text" 
                                                    name="vivienda_construccion[antigua]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_construccion->antigua : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Excelente </label>
                                    <div class="col-md-6 text-center"> 
                                        <input type="hidden" name="vivienda_conservacion[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->id : '0' }}">                                  
                                            <input  type="text" 
                                                    name="vivienda_conservacion[excelente]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->excelente : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Completo</label>
                                    <div class="col-md-6 text-center">                   
                                        <input type="hidden" name="vivienda_conservacion_mobiliario[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->id : '0' }}">                                  
                                            <input  type="text" 
                                                    name="vivienda_conservacion_mobiliario[completo]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_calidad_mobiliario->completo : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Variado</label>
                                    <div class="col-md-6 text-center">                  
                                        <input type="hidden" name="vivienda_corte[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->id : '0' }}">                                   
                                            <input  type="text" 
                                                    name="vivienda_corte[variado]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->variado : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media Alta</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_nivel_economico[media_alta]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->info_vivienda_nivel_economico->media_alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Sencilla</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_construccion[sencilla]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_construccion->sencilla : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Bueno</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion[bueno]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->bueno : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Incompleto</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion_mobiliario[incompleto]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_calidad_mobiliario->incompleto : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Conservador </label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_corte[conservador]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->conservador : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_nivel_economico[media]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->info_vivienda_nivel_economico->media : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Moderna</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_construccion[moderna]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_construccion->moderna : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Regular</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion[regular]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->regular : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Escueto</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion_mobiliario[escueto]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_calidad_mobiliario->escueto : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Moderno</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_corte[moderno]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->moderno : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_nivel_economico[media_baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->info_vivienda_nivel_economico->media_baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Semi moderna</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_construccion[semi_moderna]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_construccion->semi_moderna : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Malo</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion[malo]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->malo : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Colonial</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_corte[colonial]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->colonial : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_nivel_economico[baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->info_vivienda_nivel_economico->baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Convencional</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_construccion[convencional]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_construccion->convencional : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Pésimo</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion[pesimo]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_conservacion->pesimo : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    

                                </td>
                                <td>
                                    
                                </td>
                            </tr>                           
                        </tbody>
                    </table>
                </div>        
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Condiciones internas</label>
                <div class="col-md-9 text-center">  
                                <input  type="text" 
                                        name="vivienda_corte[condiciones_internas]" 
                                        class="form-control"
                                        value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->condiciones_internas : '' }}">
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Condiciones Externas</label>
                <div class="col-md-9 text-center"> 
                                <input  type="text" 
                                        name="vivienda_corte[condiciones_externas]" 
                                        class="form-control"
                                        value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->vivienda_corte->condiciones_externas : '' }}">
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">¿Tiene familiares y/o conocidos en la empresa?</label>
                <div class="col-md-2 text-center">                                              
                                <input  type="hidden" 
                                        name="familiar_empresa[id]" 
                                        value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->familiar_empresa->id : '0' }}" >
                                <select class="form-control" name="familiar_empresa[familiar_empresa]">
                                        <option value="1" 
                                                @if( $estudio->formatoHddisc ) 
                                                        @if( $estudio->formatoHddisc->familiar_empresa->familiar_empresa == '1' ) 
                                                            selected="selected"
                                                        @endif
                                                @endif
                                                 >Si</option>
                                        <option value="2" 
                                                @if( $estudio->formatoHddisc ) 
                                                        @if( $estudio->formatoHddisc->familiar_empresa->familiar_empresa == '2' ) 
                                                            selected="selected"
                                                        @endif
                                                @endif
                                                 >No</option>
                                </select>
                                
                    
                </div>
                <label class="col-md-1 control-label">Especificar</label>
                <div class="col-md-5">
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->familiar_empresa->familiar_empresa_si : '' }}" 
                            name="familiar_empresa[familiar_empresa_si]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Nombre del reclutador</label>
                <div class="col-md-8">
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->familiar_empresa->reclutador : '' }}" 
                            name="familiar_empresa[reclutador]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Como se entero de la vacante</label>
                <div class="col-md-8">
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->familiar_empresa->entero_vacante : '' }}" 
                            name="familiar_empresa[entero_vacante]">
                </div>

            </div>

        </div>
    </div>
</div>