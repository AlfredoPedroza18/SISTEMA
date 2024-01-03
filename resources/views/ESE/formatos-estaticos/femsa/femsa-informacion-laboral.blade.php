
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Información Laboral</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary" 
                        id="add-row-referencia-laboral">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
            </div>
            <div id="refencia-laboral-container">
            @if( $estudio->formatoFemsa )
                @forelse( $estudio->formatoFemsa->informacion_laboral as $index => $referencia )

                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-sm frm-submit-delete-referncia-laboral"                          
                                data-id-delete-referncia-laboral="{{ $referencia->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="referencia_laboral[{{ $index }}][id]" value="{{ $referencia->id }}">                
                        <label class="col-md-2 control-label">Empresa</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][empresa]" value="{{ $referencia->empresa }}">
                        </div>
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[{{ $index }}][telefono]" value="{{ $referencia->telefono }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Giro</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][giro]" value="{{ $referencia->giro }}">
                        </div>
                        <label class="col-md-2 control-label">Celular</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[{{ $index }}][celular]" value="{{ $referencia->celular }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Dirección</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][direccion]" value="{{ $referencia->direccion }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Puesto inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][puesto_inicial]" value="{{ $referencia->puesto_inicial }}">
                        </div>
                        <label class="col-md-1 control-label">Sueldo inicial</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[{{ $index }}][sueldo_inicial]" value="{{ $referencia->sueldo_inicial }}">
                        </div>
                        <label class="col-md-1 control-label">Fecha de ingreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][fecha_ingreso]" value="{{ $referencia->fecha_ingreso }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Último Puesto</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][ultimo_puesto]" value="{{ $referencia->ultimo_puesto }}">
                        </div>
                        <label class="col-md-1 control-label">Sueldo final</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[{{ $index }}][sueldo_final]" value="{{ $referencia->sueldo_final }}">
                        </div>
                        <label class="col-md-1 control-label">Fecha de egreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][fecha_egreso]" value="{{ $referencia->fecha_egreso }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Nombre del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][jefe_inmediato]" value="{{ $referencia->jefe_inmediato }}">
                        </div>
                        <label class="col-md-1 control-label">Puesto, Área y Departamento</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][jefe_puesto]" value="{{ $referencia->jefe_puesto }}">
                        </div>
                        <label class="col-md-1 control-label">Tiempo que dependió del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][jefe_tiempo_dependio]" value="{{ $referencia->jefe_tiempo_dependio }}">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Principales funciones</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][funciones]" value="{{ $referencia->funciones }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <hr>
                        <label class="col-md-12 control-label text-center"><strong>Evaluación de desempeño</strong></label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Asistencia</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][asistencia]">
                                <option value="1" {{ $referencia->asistencia == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->asistencia == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->asistencia == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->asistencia == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->asistencia == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Puntualidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][puntualidad]">
                                <option value="1" {{ $referencia->puntualidad == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->puntualidad == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->puntualidad == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->puntualidad == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->puntualidad == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Honradez</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][honradez]">
                                <option value="1" {{ $referencia->honradez == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->honradez == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->honradez == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->honradez == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->honradez == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Responsabilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][responsabilidad]">
                                <option value="1" {{ $referencia->responsabilidad == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->responsabilidad == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->responsabilidad == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->responsabilidad == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->responsabilidad == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>                                                          
                        <label class="col-md-2 control-label">Dsiponibilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][disponibilidad]">
                                <option value="1" {{ $referencia->disponibilidad == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->disponibilidad == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->disponibilidad == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->disponibilidad == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->disponibilidad == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Compromiso con la empresa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][compromiso]">
                                <option value="1" {{ $referencia->compromiso == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->compromiso == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->compromiso == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->compromiso == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->compromiso == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Iniciativa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][iniciativa]">
                                <option value="1" {{ $referencia->iniciativa == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->iniciativa == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->iniciativa == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->iniciativa == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->iniciativa == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>               
                        <label class="col-md-2 control-label">Calidad del trabajo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][calidad_trabajo]">
                                <option value="1" {{ $referencia->calidad_trabajo == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->calidad_trabajo == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->calidad_trabajo == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->calidad_trabajo == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->calidad_trabajo == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Trabajo en equipo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][trabajo_equipo]">
                                <option value="1" {{ $referencia->trabajo_equipo == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->trabajo_equipo == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->trabajo_equipo == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->trabajo_equipo == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->trabajo_equipo == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Trabajo bajo presión</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][trabajo_presion]">
                                <option value="1" {{ $referencia->trabajo_presion == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->trabajo_presion == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->trabajo_presion == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->trabajo_presion == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->trabajo_presion == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>              
                        <label class="col-md-2 control-label">Trato con el jefe</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][trato_jefe]">
                                <option value="1" {{ $referencia->trato_jefe == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->trato_jefe == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->trato_jefe == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->trato_jefe == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->trato_jefe == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Trato con compañeros</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][trato_companeros]">
                                <option value="1" {{ $referencia->trato_companeros == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->trato_companeros == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->trato_companeros == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->trato_companeros == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->trato_companeros == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Productividad/Capacidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][productividad_capacidad]">
                                <option value="1" {{ $referencia->productividad_capacidad == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->productividad_capacidad == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->productividad_capacidad == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->productividad_capacidad == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->productividad_capacidad == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Liderazgo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][liderazgo]">
                                <option value="1" {{ $referencia->liderazgo == '1' ? 'selected' : '' }} >Excelente</option>
                                <option value="2" {{ $referencia->liderazgo == '2' ? 'selected' : '' }} >Bueno</option>
                                <option value="3" {{ $referencia->liderazgo == '3' ? 'selected' : '' }} >Regular</option>
                                <option value="4" {{ $referencia->liderazgo == '4' ? 'selected' : '' }} >Malo</option>
                                <option value="5" {{ $referencia->liderazgo == '5' ? 'selected' : '' }} >Pésimo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Tipo de contrato</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][tipo_contrato]" value="{{ $referencia->tipo_contrato }}">
                        </div>
                        <label class="col-md-2 control-label">Motivo de separación</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][motivo_separacion]" value="{{ $referencia->motivo_separacion }}">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-md-8">
                            El candidato estuvo involucrado en algun incidente de seguridad de la informacion como robo, filtración de información confidencial, usurpar.
                        </label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][robo]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-1 control-label">Detalle</label>
                        <div class="col-md-11">
                          <input class="form-control" name="referencia_laboral[{{ $index }}][robo_detalle]">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">¿Existe lgún adeudo?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][adeudo]">
                                <option value="1" {{ $referencia->adeudo == '1' ? 'selected' : '' }} >Si</option>
                                <option value="2" {{ $referencia->adeudo == '2' ? 'selected' : '' }} >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Perteneció a algún sindicato?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][sindicato]">
                                <option value="1" {{ $referencia->sindicato == '1' ? 'selected' : '' }} >Si</option>
                                <option value="2" {{ $referencia->sindicato == '2' ? 'selected' : '' }} >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Lo contratarían nuevamente?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][contratar_nuevamente]">
                                <option value="1" {{ $referencia->contratar_nuevamente == '1' ? 'selected' : '' }} >Si</option>
                                <option value="2" {{ $referencia->contratar_nuevamente == '2' ? 'selected' : '' }} >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="referencia_laboral[{{ $index }}][observaciones]">{{ $referencia->observaciones }}</textarea>
                        </div>
                    </div> 
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Informó</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][informo]" value="{{ $referencia->informo }}">
                        </div>
                        <label class="col-md-2 control-label">Puesto</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][puesto_informa]" value="{{ $referencia->puesto_informa }}">
                        </div>

                    </div>
                    <br><br><br>
                    <hr>
                @empty
                    <div class="form-group">
                        <input type="hidden" name="referencia_laboral[0][id]" value="0">                
                        <label class="col-md-2 control-label">Empresa</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][empresa]" value="">
                        </div>
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[0][telefono]" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Giro</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][giro]" value="">
                        </div>
                        <label class="col-md-2 control-label">Celular</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[0][celular]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Dirección</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[0][direccion]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Puesto inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto_inicial]" value="">
                        </div>
                        <label class="col-md-1 control-label">Sueldo inicial</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[0][sueldo_inicial]" value="0.00">
                        </div>
                        <label class="col-md-1 control-label">Fecha de ingreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][fecha_ingreso]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Último Puesto</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][ultimo_puesto]" value="">
                        </div>
                        <label class="col-md-1 control-label">Sueldo final</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[0][sueldo_final]" value="0.00">
                        </div>
                        <label class="col-md-1 control-label">Fecha de egreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][fecha_egreso]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Nombre del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_inmediato]" value="">
                        </div>
                        <label class="col-md-1 control-label">Puesto, Área y Departamento</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_puesto]" value="">
                        </div>
                        <label class="col-md-1 control-label">Tiempo que dependió del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_tiempo_dependio]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Principales funciones</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[0][funciones]" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <hr>
                        <label class="col-md-12 control-label text-center"><strong>Evaluación de desempeño</strong></label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Asistencia</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][asistencia]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Puntualidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][puntualidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Honradez</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][honradez]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Responsabilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][responsabilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>                                                          
                        <label class="col-md-2 control-label">Dsiponibilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][disponibilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Compromiso con la empresa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][compromiso]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Iniciativa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][iniciativa]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>               
                        <label class="col-md-2 control-label">Calidad del trabajo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][calidad_trabajo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Trabajo en equipo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trabajo_equipo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Trabajo bajo presión</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trabajo_presion]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>              
                        <label class="col-md-2 control-label">Actitud con el jefe</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trato_jefe]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Actitud con sus compañeros</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trato_companeros]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Productividad/Capacidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][productividad_capacidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Liderazgo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][liderazgo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Tipo de contrato</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][tipo_contrato]" value="">
                        </div>
                        <label class="col-md-2 control-label">Motivo de separación</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][motivo_separacion]" value="">
                        </div>
                    </div>

                    <div class="form-group"> 
                        <label class="control-label col-md-8">
                            El candidato estuvo involucrado en algun incidente de seguridad de la informacion como robo, filtración de información confidencial, usurpar.
                        </label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][robo]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-1 control-label">Detalle</label>
                        <div class="col-md-11">
                          <input class="form-control" name="referencia_laboral[0][robo_detalle]">
                        </div>
                    </div>

                    <div class="form-group"> 
                        <label class="col-md-2 control-label">¿Existe lgún adeudo?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][adeudo]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Perteneció a algún sindicato?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][sindicato]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Lo contratarían nuevamente?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][contratar_nuevamente]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="referencia_laboral[0][observaciones]">{{ isset( $estudio->formatoHsbc->antecedentesLegales ) ? $estudio->formatoHsbc->antecedentesLegales->descripcion : '' }}</textarea>
                        </div>
                    </div> 
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Informó</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][informo]" value="">
                        </div>
                        <label class="col-md-2 control-label">Puesto</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto_informa]" value="">
                        </div>
                    </div>

                @endforelse


            @else

                
            
                    <div class="form-group">
                        <input type="hidden" name="referencia_laboral[0][id]" value="0">                
                        <label class="col-md-2 control-label">Empresa</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][empresa]" value="">
                        </div>
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[0][telefono]" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Giro</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][giro]" value="">
                        </div>
                        <label class="col-md-2 control-label">Celular</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[0][celular]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Dirección</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[0][direccion]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Puesto inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto_inicial]" value="">
                        </div>
                        <label class="col-md-1 control-label">Sueldo inicial</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[0][sueldo_inicial]" value="0.00">
                        </div>
                        <label class="col-md-1 control-label">Fecha de ingreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][fecha_ingreso]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Último Puesto</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][ultimo_puesto]" value="">
                        </div>
                        <label class="col-md-1 control-label">Sueldo final</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[0][sueldo_final]" value="0.00">
                        </div>
                        <label class="col-md-1 control-label">Fecha de egreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][fecha_egreso]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Nombre del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_inmediato]" value="">
                        </div>
                        <label class="col-md-1 control-label">Puesto, Área y Departamento</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_puesto]" value="">
                        </div>
                        <label class="col-md-1 control-label">Tiempo que dependió del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_tiempo_dependio]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Principales funciones</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[0][funciones]" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <hr>
                        <label class="col-md-12 control-label text-center"><strong>Evaluación de desempeño</strong></label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Asistencia</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][asistencia]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Puntualidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][puntualidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Honradez</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][honradez]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Responsabilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][responsabilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>                                                          
                        <label class="col-md-2 control-label">Dsiponibilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][disponibilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Compromiso con la empresa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][compromiso]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Iniciativa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][iniciativa]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>               
                        <label class="col-md-2 control-label">Calidad del trabajo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][calidad_trabajo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Trabajo en equipo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trabajo_equipo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Trabajo bajo presión</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trabajo_presion]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>              
                        <label class="col-md-2 control-label">Trato con el jefe</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trato_jefe]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Trato con compañeros</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][trato_companeros]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Productividad/Capacidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][productividad_capacidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Liderazgo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][liderazgo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Tipo de contrato</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][tipo_contrato]" value="">
                        </div>
                        <label class="col-md-2 control-label">Motivo de separación</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][motivo_separacion]" value="">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-md-8">
                            El candidato estuvo involucrado en algun incidente de seguridad de la informacion como robo, filtración de información confidencial, usurpar.
                        </label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][robo]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-1 control-label">Detalle</label>
                        <div class="col-md-11">
                          <input class="form-control" name="referencia_laboral[0][robo_detalle]">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">¿Existe lgún adeudo?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][adeudo]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Perteneció a algún sindicato?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][sindicato]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Lo contratarían nuevamente?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[0][contratar_nuevamente]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="referencia_laboral[0][observaciones]">{{ isset( $estudio->formatoHsbc->antecedentesLegales ) ? $estudio->formatoHsbc->antecedentesLegales->descripcion : '' }}</textarea>
                        </div>
                    </div> 
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Informó</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][informo]" value="">
                        </div>
                        <label class="col-md-2 control-label">Puesto</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto_informa]" value="">
                        </div>
                    </div>
            @endif
                

          
            </div>

        </div>
    </div>
</div>