
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Referencias Económicas</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-12 text-center control-label"><strong>Tipo de Zona y Vivienda</strong></label>                
            </div>
            <div class="form-group">
                <input type="hidden" name="referencias_economicas[id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->id : 0 }}">
                <label class="col-md-2 control-label">La vivienda es:</label>
                <div class="col-md-3">
                    <select class="form-control" name="referencias_economicas[vivienda]">
                        <option value="1" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '1' )
                                        selected="selected"
                                    @endif
                                @endif>Propia</option>
                        <option value="2" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '2' )
                                        selected="selected"
                                    @endif
                                @endif>Rentada</option>
                        <option value="3" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '3' )
                                        selected="selected"
                                    @endif
                                @endif>Prestada</option>
                        <option value="4" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '4' )
                                        selected="selected"
                                    @endif
                                @endif>Otra</option>
                    </select>
                </div>
                <label class="col-md-2 control-label">Otra:</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="referencias_economicas[otra_vivienda]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->otra_vivienda : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">¿Cuenta con todos los servicios?</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="referencias_economicas[cuenta_con_servicios]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->cuenta_con_servicios : '' }}">
                </div>
                <label class="col-md-2 control-label">Tipo de Casa Habitación</label>                
                <div class="col-md-4">
                    <select class="form-control" name="referencias_economicas[tipo_casa]">
                        <option value="1"
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '1' )
                                        selected="selected"
                                    @endif
                                @endif>Casa</option>
                        <option value="2"
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '2' )
                                        selected="selected"
                                    @endif
                                @endif>Departamento</option>
                        <option value="3"
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '3' )
                                        selected="selected"
                                    @endif
                                @endif>Condominio</option>
                        <option value="4"
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '4' )
                                        selected="selected"
                                    @endif
                                @endif>Unidad Habitacional</option>
                        <option value="5"
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '5' )
                                        selected="selected"
                                    @endif
                                @endif>Vivienda popular</option>
                    </select>
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-1 control-label">Mobiliario</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="referencias_economicas[mobiliario]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->mobiliario : '' }}">
                </div>
                <label class="col-md-1 control-label">Limpieza</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="referencias_economicas[limpieza]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->limpieza : '' }}">
                </div>
                <label class="col-md-1 control-label">Orden</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="referencias_economicas[orden]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->orden : '' }}">
                </div>
            </div>

            <div class="form-group">
            	<hr>
                <label class="col-md-12 text-center control-label"><strong>Referencia Patrimonial</strong></label>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">¿Cuenta con automóvil propio?</label>
                <div class="col-md-3">
                    <select class="form-control" name="referencias_economicas[automovil_propio]">
                        <option value="1" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->automovil_propio == '1' )
                                        selected="selected"
                                    @endif
                                @endif>Si</option>
                        <option value="2" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->automovil_propio == '2' )
                                        selected="selected"
                                    @endif
                                @endif>No</option>
                    </select>
                </div>
                <label class="col-md-1 control-label">Marca</label>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="referencias_economicas[marca_auto]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->marca_auto : '' }}">
                </div>
                <label class="col-md-1 control-label">Año</label>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="referencias_economicas[anio]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->anio : '' }}">
                </div>
                
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Bienes Raíces</label>
                <div class="col-md-3">
                    <select class="form-control" name="referencias_economicas[bienes_raices]">
                        <option value="1" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->bienes_raices == '1' )
                                        selected="selected"
                                    @endif
                                @endif>Si</option>
                        <option value="2" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->bienes_raices == '2' )
                                        selected="selected"
                                    @endif
                                @endif>No cuenta</option>
                    </select>
                </div>
                <label class="col-md-1 control-label">Ubicación</label>
                <div class="col-md-5">
                    <input  type="text" class="form-control" name="referencias_economicas[ubicacion_bienes_raices]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->ubicacion_bienes_raices : '' }}">
                </div>
                
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Tarjetas de crédito/departamentales</label>
                <div class="col-md-3">
                    <select class="form-control" name="referencias_economicas[tdc]">
                        <option value="1" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tdc == '1' )
                                        selected="selected"
                                    @endif
                                @endif>Si</option>
                        <option value="2" 
                                @if( $estudio->formatoEvenplan )
                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tdc == '2' )
                                        selected="selected"
                                    @endif
                                @endif>No</option>
                    </select>
                </div>
                <label class="col-md-1 control-label">Institución</label>
                <div class="col-md-5">
                    <input  type="text" class="form-control" name="referencias_economicas[tdc_institucion]"
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->tdc_institucion : '' }}">
                </div>                
            </div>

            <div class="form-group">
            	<hr>
                <label class="col-md-12 text-center control-label"><strong>Gastos Mensuales</strong></label>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <table class="table table-striped">
                    	<thead>
                    		<tr>
                    			<th>Egresos</th>
                    			<th>Monto</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<tr>
                    			<td>Alimentación:</td>
                    			<td>
                                    <input  type="hidden" class="form-control" name="gastos_mensuales[id]"
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->id : '0' }}">
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_alimentacion]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_alimentacion : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Renta:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_renta]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_renta : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Servicios:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_servicios]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_servicios : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Transportes:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_transportes]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_transportes : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Escolares:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_escolares]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_escolares : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Ropa y calzado:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_ropa_calzado]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_ropa_calzado : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Servicio doméstico:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos tico]" name="gastos_mensuales[e_servicio_domes                                            "
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_servicio_domestico : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Créditos:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_creditos]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_creditos : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Diversiones:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_diversiones]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_diversiones : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Otros:</td>
                    			<td>
                    				<input  type="number" class="form-control monto_egresos" name="gastos_mensuales[e_otros]"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_otros : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Total egresos:</td>
                    			<td>
                    				<input  type="number" class="form-control" name="gastos_mensuales[e_total]" id="monto_egresos_total"                                             
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->e_total : '' }}">
                    			</td>
                    		</tr>
                    	</tbody>
                    </table>
                </div>
                <div class="col-md-6">
                	<label class="col-md-12 text-center control-label"><strong>Cuando los gastos son mayores a los ingresos, ¿Cómo los solventas?</strong></label>
                	<textarea class="form-control" rows="15" name="gastos_mensuales[observaciones]">{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->observaciones : '' }}</textarea>
                	<table class="table table-striped">
                    	<thead>
                    		<tr>
                    			<th>Ingresos</th>
                    			<th>Monto</th>
                    		</tr>
                    	</thead>
                    	<tfoot>
                    		<tr>
                    			<td>Total de ingresos</td>
                    			<td>
                    				<input  type="number" class="form-control" name="gastos_mensuales[i_total]" id="monto_total_ingresos" 
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_total : '' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Total diferencia</td>
                    			<td>
                    				<input  type="number" class="form-control" name="gastos_mensuales[total_diferencia]" id="ref_economicas_total_diferencia" 
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->total_diferencia : '' }}">
                    			</td>
                    		</tr>
                    	</tfoot>
                    	<tbody>
                    		<tr>
                    			<td><input type="text" class="form-control" name="gastos_mensuales[i_ingreso0_concepto]" value="Candidato"></td>
                    			<td>
                    				<input  type="number" class="form-control monto_ingresos" name="gastos_mensuales[i_ingreso0]"
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso0 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><input type="text" class="form-control" name="gastos_mensuales[i_ingreso1_concepto]" 
                                    value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso1_concepto : '' }}"></td>
                    			<td>
                    				<input  type="number" class="form-control monto_ingresos" name="gastos_mensuales[i_ingreso1]"
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso1 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><input type="text" class="form-control" name="gastos_mensuales[i_ingreso2_concepto]" 
                                    value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso2_concepto : '' }}"></td>
                    			<td>
                    				<input  type="number" class="form-control monto_ingresos" name="gastos_mensuales[i_ingreso2]"
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso2 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><input type="text" class="form-control" name="gastos_mensuales[i_ingreso3_concepto]" 
                                    value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso3_concepto : '' }}"></td>
                    			<td>
                    				<input  type="number" class="form-control monto_ingresos" name="gastos_mensuales[i_ingreso3]"
                                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso3 : '0.00' }}">
                    			</td>
                    		</tr>
                    	</tbody>
                    </table>
                </div>                
            </div>
            

        </div>
    </div>
</div>