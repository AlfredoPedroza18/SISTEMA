
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Información de la vivienda</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Tipo de vivienda</th>
                                <th class="text-center">Tipo de propiedad</th>
                                <th class="text-center">Servicios</th>
                                <th class="text-center">Distribución</th>
                                <th class="text-center">Nivel económico</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Propia </label>
                                    <div class="col-md-6 text-center">     
                                        <input type="hidden" name="tipo_vivienda[id]" value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->id ) : '0' }}">              
                                        <input  type="text" 
                                                class="form-control" 
                                                name="tipo_vivienda[propia]" 
                                                value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->propia ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Casa </label>
                                    <div class="col-md-6 text-center">      
                                        <input type="hidden" name="tipo_propiedad[id]" value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->id ) : '0' }}">                           
                                        <input  type="text" 
                                                class="form-control" 
                                                name="tipo_propiedad[casa]" 
                                                value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->casa ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Luz </label>
                                    <div class="col-md-6 text-center">     
                                        <input type="hidden" name="tipo_vivienda_servicios[id]" value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->id ) : '0' }}">                           
                                        <input  type="text" 
                                                class="form-control" 
                                                name="tipo_vivienda_servicios[luz]" 
                                                value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->luz ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Sala </label>
                                    <div class="col-md-6 text-center">            
                                        <input type="hidden" name="tipo_vivienda_distribucion[id]" value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->id ) : '0' }}">                                  
                                        <input  type="text" 
                                                class="form-control" 
                                                name="tipo_vivienda_distribucion[sala]" 
                                                value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->sala ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Jardin </label>
                                    <div class="col-md-6 text-center">                                                 
                                        <input  type="text" 
                                                class="form-control" 
                                                name="tipo_vivienda_distribucion[jardin]" 
                                                value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->jardin ) : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Rentada </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda[rentada]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->rentada ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Departamento </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_propiedad[depto]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->depto ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Agua </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_servicios[agua]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->agua ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Comedor </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[comedor]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->comedor ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Zotehuela </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[zotehuela]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->zotehuela ) : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Hipotecada </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda[hipotecada]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->hipotecada ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Duplex </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_propiedad[duplex]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->duplex ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Pavimentación </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_servicios[pavimento]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->pavimento ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Recamara </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[recamara]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->recamara ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Patio </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[patio]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->patio ) : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Congelada </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda[congelada]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->congelada ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Condominio</label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_propiedad[condominio]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->condominio ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Drenaje </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_servicios[drenaje]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->drenaje ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Cocina </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[cocina]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->cocina ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Estudio</label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[estudio]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->estudio ) : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Prestada </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda[prestada]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->prestada ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Vecindad </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_propiedad[vecindad]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->vecindad ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Teléfono </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_servicios[telefono]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->telefono ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Baño </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[banio]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->banio ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Cuarto de servicio</label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[cuarto_servicio]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->cuarto_servicio ) : '' }}">
                                        
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">De Padres</label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda[de_padres]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->de_padres ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Cuarto</label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_propiedad[cuarto]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->cuarto ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Seg. Pública </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_servicios[seg_publica]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->seg_publica ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Garaje </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[garaje]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->garaje ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-md-4 control-label text-center">Otro </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda[otro]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_vivienda->otro ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Otro </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_propiedad[otro]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->tipo_propiedad->otro ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Alumbrado</label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_servicios[alumbrado]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_servicios->alumbrado ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td>
                                    <label class="col-md-4 control-label text-center">Biblioteca </label>
                                    <div class="col-md-6 text-center">                   
                                    <input  type="text" 
                                            class="form-control" 
                                            name="tipo_vivienda_distribucion[biblioteca]" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? trim( $estudio->formatoFemsa->info_vivienda_distribucion->biblioteca ) : '' }}">
                                        
                                    </div>

                                </td>
                                <td></td>
                            </tr>

                           
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                <label class="col-md-3 control-label">¿Cuantas personas viven en el domicilio? </label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->tipo_vivienda->viven_domicilio : '' }}" 
                            name="tipo_vivienda[viven_domicilio]">
                </div>
            </div>
            
            
            

        </div>
    </div>
</div>