
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
                <label class="col-md-12 text-center control-label"><strong>Sitaución económica</strong></label>                
            </div>
            
            <div class="form-group">
                <div class="col-md-2">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Aportaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input  type="hidden" class="form-control" name="situacion_economica[id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->id : '0' }}">
                                    <input type="text" class="form-control" name="situacion_economica[aportacion1]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion1 : '' }}">
                                
                            </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion2]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion2 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion3]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion3 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion4]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion4 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion5]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion5 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion6]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion6 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion7]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion7 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion8]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion8 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion9]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion9 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion10]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion10 : '' }}">
                                </td>                                
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[aportacion11]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion11 : '' }}">
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5">
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
                                    <input  type="number" class="form-control" name="situacion_economica[i_total]" id="monto_total_ingresos" readonly="readonly" 
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_total : '' }}">
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto1]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto1 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto1]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto1 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto2]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto2 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto2]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto2 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto3]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto3 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto3]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto3 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto4]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto4 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto4]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto4 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto5]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto5 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto5]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto5 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto6]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto6 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto6]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto6 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto7]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto7 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto7]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto7 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto8]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto8 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto8]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto8 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto9]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto9 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto9]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto9 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto10]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto10 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto10]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto10 : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="situacion_economica[i_concepto11]" 
                                    value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto11 : '' }}"></td>
                                <td>
                                    <input  type="number" class="form-control monto_ingresos" name="situacion_economica[i_monto11]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_monto11 : '0.00' }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
                <div class="col-md-5">
                    <table class="table table-striped">
                    	<thead>
                    		<tr>
                    			<th>Egresos</th>
                    			<th>Monto</th>
                    		</tr>
                    	</thead>
                        <tfoot>
                            <tr>
                                <td>Total egresos:</td>
                                <td>
                                    <input  type="number" 
                                            class="form-control" 
                                            name="situacion_economica[e_total]" id="monto_egresos_total"  
                                            readonly="readonly" 
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_total : '' }}">
                                </td>
                            </tr>
                        </tfoot>
                    	<tbody>
                    		<tr>
                    			<td>Alimentación en casa:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto1]" value="ALIMENTACIÓN EN CASA">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto1]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto1 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Alimentación fuera de casa:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto2]" value="ALIMENTACIÓN FUERA DE CASA">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto2]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto2 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Reanta/Hipoteca:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto3]" value="REANTA/HIPOTECA">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto3]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto3 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Teléfono:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto4]" value="TELÉFONO">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto4]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto4 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Servicios (gas,agua,luz):</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto5]" value="SERVICIOS (GAS,AGUA,LUZ)">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto5]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto5 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Predial:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto6]" value="PREDIAL">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto6]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto6 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Gastos escolares:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto7]" value="GASTOS ESCOLARES">
                    				<input  type="number" class="form-control monto_egresos tico]" name="situacion_economica[e_monto7]"
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto7 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Gasolina ó transporte:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto8]" value="GASOLINA Ó TRANSPORTE">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto8]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto8 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Ropa calzado:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto9]" value="ROPA CALZADO">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto9]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto9 : '0.00' }}">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Diversiones:</td>
                    			<td>
                                    <input type="hidden" name="situacion_economica[e_concepto10]" value="DIVERSIONES">
                    				<input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto10]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto10 : '0.00' }}">
                    			</td>
                    		</tr>
                            <tr>
                                <td>Otros:</td>
                                <td>
                                    <input type="hidden" name="situacion_economica[e_concepto11]" value="OTROS">
                                    <input  type="number" class="form-control monto_egresos" name="situacion_economica[e_monto11]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_monto11 : '0.00' }}">
                                </td>
                            </tr>
                    	</tbody>
                    </table>
                </div>                              
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Si hay déficit, ¿Cómo lo solventa?</label>
                <div class="col-md-9">   
                    <textarea class="form-control" rows="3" name="situacion_economica[deficit]">{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->deficit : '' }}</textarea>
                </div>                
            </div>                
            
            

        </div>
    </div>
</div>