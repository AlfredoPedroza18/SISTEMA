
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Referencias laborales últimos 5 años</h4>
    </div>
    <div class="panel-body">
        <div id="referencia-laboral-cinco-container">

        @if( $estudio->formatoHsbc )

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10 text-right">
                        <a href="javascript:;" id="add-referencia-laboral-cinco" class="btn btn-circle btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            @forelse ( $estudio->formatoHsbc->referenciasLaboralesCinco as $index => $referencia )
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-2 text-right">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-referencia-cinco"
                                data-id-delete-referencia-cinco="{{ $referencia->id }}"><i class="fa fa-minus"></i></a>
                        </div>
                        <input type="hidden" name="referencias_lab_cinco[{{ $index }}][id]" value="{{ $referencia->id }}">
                        <label class="col-md-1 control-label">Empresa:</label>
                        <div class="col-md-4">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][empresa]"
                                    value="{{ $referencia->empresa }}">
                        </div>
                        <label class="col-md-1 control-label">Giro: </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][giro]"
                                    value="{{ $referencia->giro }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 col-md-offset-2 control-label">Dirección: </label>
                        <div class="col-md-4">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][direccion]"
                                    value="{{ $referencia->direccion }}">
                        </div>
                        <label class="col-md-1 control-label">Teléfono: </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][telefono]"
                                    value="{{ $referencia->telefono }}">
                        </div>
                    </div>
                    <div class="form-group alert alert-info" >
                        <label class="col-md-3 control-label"></label>
                        <label class="col-md-3 control-label"><strong>Datos Obtenidos por el candidato</strong></label>
                        <label class="col-md-3 control-label"><strong>Datos obtenidos por la empresa (R.H)</strong></label>
                        <label class="col-md-3 control-label"><strong>Datos obtenidos por el jefe inmediato/otro</strong></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Puesto desempeñado </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_candidato]"
                                    value="{{ $referencia->puesto_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_empresa]"
                                    value="{{ $referencia->puesto_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_jefe_inmediato]"
                                    value="{{ $referencia->puesto_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Fecha de Ingreso </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][fecha_ingreso_candidato]"
                                    value="{{ $referencia->fecha_ingreso_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][fecha_ingreso_empresa]"
                                    value="{{ $referencia->fecha_ingreso_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][fecha_ingreso_jefe_inmediato]"
                                    value="{{ $referencia->fecha_ingreso_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Fecha de Salida </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][fecha_salida_candidato]"
                                    value="{{ $referencia->fecha_salida_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][fecha_salida_empresa]"
                                    value="{{ $referencia->fecha_salida_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][fecha_salida_jefe_inmediato]"
                                    value="{{ $referencia->fecha_salida_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sueldo Final </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][sueldo_final_candidato]"
                                    value="{{ $referencia->sueldo_final_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][sueldo_final_empresa]"
                                    value="{{ $referencia->sueldo_final_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][sueldo_final_jefe_inmediato]"
                                    value="{{ $referencia->sueldo_final_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Principales Funciones </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][funciones_candidato]"
                                    value="{{ $referencia->funciones_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][funciones_empresa]"
                                    value="{{ $referencia->funciones_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][funciones_jefe_inmediato]"
                                    value="{{ $referencia->funciones_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Motivo de Salida </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][motivo_salida_candidato]"
                                    value="{{ $referencia->motivo_salida_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][motivo_salida_empresa]"
                                    value="{{ $referencia->motivo_salida_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][motivo_salida_jefe_inmediato]"
                                    value="{{ $referencia->motivo_salida_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Último Jefe </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][ultimo_jefe_candidato]"
                                    value="{{ $referencia->ultimo_jefe_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][ultimo_jefe_empresa]"
                                    value="{{ $referencia->ultimo_jefe_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][ultimo_jefe_jefe_inmediato]"
                                    value="{{ $referencia->ultimo_jefe_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Puesto del Jefe </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_del_jefe_candidato]"
                                    value="{{ $referencia->puesto_del_jefe_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_del_jefe_empresa]"
                                    value="{{ $referencia->puesto_del_jefe_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_del_jefe_jefe_inmediato]"
                                    value="{{ $referencia->puesto_del_jefe_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Persona que provee la información</label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][da_informacion_candidato]"
                                    value="{{ $referencia->da_informacion_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][da_informacion_empresa]"
                                    value="{{ $referencia->da_informacion_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][da_informacion_jefe_inmediato]"
                                    value="{{ $referencia->da_informacion_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Puesto de la persona que provee la información</label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_da_informacion_candidato]"
                                    value="{{ $referencia->puesto_da_informacion_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_da_informacion_empresa]"
                                    value="{{ $referencia->puesto_da_informacion_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][puesto_da_informacion_jefe_inmediato]"
                                    value="{{ $referencia->puesto_da_informacion_jefe_inmediato }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Lo contratarían nuevamente </label>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][contratar_nuevamente_candidato]"
                                    value="{{ $referencia->contratar_nuevamente_candidato }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][contratar_nuevamente_empresa]"
                                    value="{{ $referencia->contratar_nuevamente_empresa }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="referencias_lab_cinco[{{ $index }}][contratar_nuevamente_jefe_inmediato]"
                                    value="{{ $referencia->contratar_nuevamente_jefe_inmediato }}">
                        </div>
                    </div>
                    <hr>
                </div>
            @empty
                <p>No hay referencias</p>
            @endforelse
        @else

            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-2 text-right">
                        <a href="javascript:;" id="add-referencia-laboral-cinco" class="btn btn-circle btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                    <input type="hidden" name="referencias_lab_cinco[0][id]" value="{{ isset( $estudio->referenciasLaboralesCinco ) ? $estudio->referenciasLaboralesCinco->id : 0 }}">
                    <label class="col-md-1 control-label">Empresa: </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][empresa]">
                    </div>
                    <label class="col-md-1 control-label">Giro: </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][giro]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 col-md-offset-2 control-label">Dirección: </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][direccion]">
                    </div>
                    <label class="col-md-1 control-label">Teléfono: </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][telefono]">
                    </div>
                </div>
                <div class="form-group alert alert-info" >
                    <label class="col-md-3 control-label"></label>
                    <label class="col-md-3 control-label"><strong>Datos Obtenidos por el candidato</strong></label>
                    <label class="col-md-3 control-label"><strong>Datos obtenidos por la empresa (R.H)</strong></label>
                    <label class="col-md-3 control-label"><strong>Datos obtenidos por el jefe inmediato/otro</strong></label>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Puesto desempeñado </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Ingreso </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][fecha_ingreso_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][fecha_ingreso_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][fecha_ingreso_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Salida </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][fecha_salida_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][fecha_salida_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][fecha_salida_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Sueldo Final </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][sueldo_final_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][sueldo_final_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][sueldo_final_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Principales Funciones </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][funciones_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][funciones_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][funciones_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Motivo de Salida </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][motivo_salida_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][motivo_salida_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][motivo_salida_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Último Jefe </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][ultimo_jefe_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][ultimo_jefe_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][ultimo_jefe_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Puesto del Jefe </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_del_jefe_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_del_jefe_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_del_jefe_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Persona que provee la información</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][da_informacion_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][da_informacion_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][da_informacion_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Puesto de la persona que provee la información</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_da_informacion_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_da_informacion_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][puesto_da_informacion_jefe_inmediato]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Lo contratarían nuevamente </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][contratar_nuevamente_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][contratar_nuevamente_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_lab_cinco[0][contratar_nuevamente_jefe_inmediato]">
                    </div>
                </div>
                <hr>
            </div>

            @endif
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-10 col-md-offset-1 control-label text-center alert alert-info">
                    <strong>OTRAS FUENTES DE INGRESOS/OTRAS ACTIVIDADES ECONÓMICAS</strong>
                </label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Descripción: </label>
                <div class="col-md-10">
                    <input type="hidden" name="otras_fuentes_ingresos[id]" value="{{ isset( $estudio->formatoHsbc->otroIngreso ) ? $estudio->formatoHsbc->otroIngreso->id : 0 }}">
                    <textarea class="form-control" rows="3" name="otras_fuentes_ingresos[descripcion]">
                        {{ isset( $estudio->formatoHsbc->otroIngreso ) ? $estudio->formatoHsbc->otroIngreso->descripcion : '' }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>