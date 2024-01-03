
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Apreciación de la vivienda</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Condiciones Interiores</th>
                                <th class="text-center">Orden y limpieza</th>
                                <th class="text-center">Calidad mobiliario</th>
                                <th class="text-center">Conservación del mobiliario</th>
                                <th class="text-center">Espacio de la vivienda</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Alta </label>
                                    <div class="col-md-6 text-center">   
                                        <input type="hidden" name="vivienda_condicion_interior[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_condiciones_interiores->id : '0' }}">                
                                            <input  type="text" 
                                                    name="vivienda_condicion_interior[alta]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_condiciones_interiores->alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Alta </label>
                                    <div class="col-md-6 text-center">                   
                                        <input type="hidden" name="vivienda_orden_limpieza[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_orden_limpieza->id : '0' }}">                
                                            <input  type="text" 
                                                    name="vivienda_orden_limpieza[alta]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_orden_limpieza->alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Alta </label>
                                    <div class="col-md-6 text-center"> 
                                        <input type="hidden" name="vivienda_calidad_mobiliario[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_calidad_mobiliario->id : '0' }}">                                  
                                            <input  type="text" 
                                                    name="vivienda_calidad_mobiliario[alta]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_calidad_mobiliario->alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Alta </label>
                                    <div class="col-md-6 text-center">                   
                                        <input type="hidden" name="vivienda_conservacion_mobiliario[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_conservacion_mobiliario->id : '0' }}">                                  
                                            <input  type="text" 
                                                    name="vivienda_conservacion_mobiliario[alta]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_conservacion_mobiliario->alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Sobrado </label>
                                    <div class="col-md-6 text-center">                  
                                        <input type="hidden" name="vivienda_espacio[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_espacio->id : '0' }}">                                   
                                            <input  type="text" 
                                                    name="vivienda_espacio[sobrado]" 
                                                    class="form-control"
                                                    value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_espacio->sobrado : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media Alta</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_condicion_interior[media_alta]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_condiciones_interiores->media_alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media Alta</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_orden_limpieza[media_alta]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_orden_limpieza->media_alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media Alta</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_calidad_mobiliario[media_alta]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_calidad_mobiliario->media_alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media Alta</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion_mobiliario[media_alta]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_conservacion_mobiliario->media_alta : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Suficiente </label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_espacio[suficiente]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_espacio->suficiente : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_condicion_interior[media]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_condiciones_interiores->media : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media </label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_orden_limpieza[media]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_orden_limpieza->media : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_calidad_mobiliario[media]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_calidad_mobiliario->media : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion_mobiliario[media]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_conservacion_mobiliario->media : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Limitado</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_espacio[limitado]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_espacio->limitado : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_condicion_interior[media_baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_condiciones_interiores->media_baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_orden_limpieza[media_baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_orden_limpieza->media_baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_calidad_mobiliario[media_baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_calidad_mobiliario->media_baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Media baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion_mobiliario[media_baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_conservacion_mobiliario->media_baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Insuficiente</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_espacio[insuficiente]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_espacio->insuficiente : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_condicion_interior[baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_condiciones_interiores->baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_orden_limpieza[baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_orden_limpieza->baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_calidad_mobiliario[baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_calidad_mobiliario->baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Baja</label>
                                    <div class="col-md-6 text-center">                   
                                        <input  type="text" 
                                                name="vivienda_conservacion_mobiliario[baja]" 
                                                class="form-control"
                                                value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->vivienda_conservacion_mobiliario->baja : '' }}">
                                        
                                    </div>

                                </td>
                                <td></td>
                            </tr>                           
                        </tbody>
                    </table>
                </div>        
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">¿Tiene familiares y/o conocidos en la empresa?</label>
                <div class="col-md-2 text-center">  
                    <input  type="hidden" 
                            name="familiar_empresa[id]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->id : '0' }}" >
                            
                            <select class="form-control" name="familiar_empresa[familiar_empresa]">
                                <option value="1"
                                @if( $estudio->formatoSM )
                                    @if( $estudio->formatoSM->familiar_empresa->familiar_empresa == '1' )
                                        selected="selected"    
                                    @endif
                                @endif
                                >Si</option>
                                <option value="2"
                                @if( $estudio->formatoSM )
                                    @if( $estudio->formatoSM->familiar_empresa->familiar_empresa == '2' )
                                        selected="selected"
                                    @endif
                                @endif
                                >No</option>
                            </select>
                            {{--

                                <input  type="text" 
                                        name="familiar_empresa[familiar_empresa]" 
                                        class="form-control"
                                        value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->familiar_empresa : '' }}">
                            --}}
                    
                </div>
                <label class="col-md-1 control-label">Especificar</label>
                <div class="col-md-5">
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->familiar_empresa_si : '' }}" 
                            name="familiar_empresa[familiar_empresa_si]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Nombre del reclutador</label>
                <div class="col-md-8">
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->reclutador : '' }}" 
                            name="familiar_empresa[reclutador]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Como se entero de la vacante</label>
                <div class="col-md-8">
                    <input  type="text" 
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->entero_vacante : '' }}" 
                            name="familiar_empresa[entero_vacante]">
                </div>

            </div>

        </div>
    </div>
</div>