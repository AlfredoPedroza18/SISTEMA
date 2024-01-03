
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Referencias Laborales</h4>
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
            <div class="form-group">
                <label class="col-md-4 text-center control-label"><strong>Nombre de la empresa</strong></label>                
                <label class="col-md-4 text-center control-label"><strong>Jefe inmediato</strong></label>                
                <label class="col-md-4 text-center control-label"><strong>Puesto</strong></label>                
            </div>
            <div id="refencia-laboral-container">
                
            @if( $estudio->formatoEvenplan )
                @forelse( $estudio->formatoEvenplan->referenciaLaboral as $index => $referencia )  

                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-xs frm-submit-delete-referncia-laboral"
                                data-id-delete-referncia-laboral="{{ $referencia->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                    </div>                  
                    <div class="form-group">
                        <input type="hidden" name="referencia_laboral[{{ $index }}][id]" value="{{ $referencia->id }}">                
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][nombre_empresa]" value="{{ $referencia->nombre_empresa }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][jefe_inmediato]" value="{{ $referencia->jefe_inmediato }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][puesto]" value="{{ $referencia->puesto }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Domicilio</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][domicilio]" value="{{ $referencia->domicilio }}">
                        </div>
                        <label class="col-md-1 control-label">Teléfono</label>                
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][telefono]" value="{{ $referencia->telefono }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Fecha de ingreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][fecha_ingreso]" value="{{ $referencia->fecha_ingreso }}">
                        </div>
                        <label class="col-md-1 control-label">Puesto inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][puesto_inicial]" value="{{ $referencia->puesto_inicial }}">
                        </div>
                        <label class="col-md-1 control-label">Salario inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][salario_inicial]" value="{{ $referencia->salario_inicial }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Fecha de egreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][fecha_egreso]" value="{{ $referencia->fecha_egreso }}">
                        </div>
                        <label class="col-md-1 control-label">Puesto final</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][puesto_final]" value="{{ $referencia->puesto_final }}">
                        </div>
                        <label class="col-md-1 control-label">Salario final</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][salario_final]" value="{{ $referencia->salario_final }}">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">¿Tuvo personal a su cargo?</label>
                        <div class="col-md-4">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][tuvo_personal]">
                                <option value="1" {{ $referencia->tuvo_personal == '1' ? "selected" : ''  }}>Si</option>
                                <option value="2" {{ $referencia->tuvo_personal == '2' ? "selected" : ''  }}>No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Cotizó al IMSS</label>
                        <div class="col-md-4">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][cotizo_imss]">
                                <option value="1" {{ $referencia->cotizo_imss == '1' ? "selected" : ''  }}>Si</option>
                                <option value="2" {{ $referencia->cotizo_imss == '2' ? "selected" : ''  }}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Motivo de separación</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][motivo_separacion]" value="{{ $referencia->motivo_separacion }}">
                        </div>
                        <label class="col-md-2 control-label">Causa</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][causa]" value="{{ $referencia->causa }}">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">¿Lo considera una persona recomendable?</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][pesona_recomendable]" value="{{ $referencia->pesona_recomendable }}">
                        </div>
                        <label class="col-md-2 control-label">Lo volverían a contratar</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][volverian_contratar]" value="{{ $referencia->volverian_contratar }}">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Persona que da la referencia</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][da_referencia]" value="{{ $referencia->da_referencia }}">
                        </div>
                        <label class="col-md-2 control-label">Puesto</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][da_referencia_puesto]" value="{{ $referencia->da_referencia_puesto }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <hr>
                        <label class="col-md-12 text-center control-label"><strong>Evaluación de competencias Laborales</strong></label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Honradez</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][honradez]">
                                <option value="1" {{ $referencia->honradez == '1' ? "selected" : ''  }} >Excelente</option>
                                <option value="2" {{ $referencia->honradez == '2' ? "selected" : ''  }} >Apropiado</option>
                                <option value="3" {{ $referencia->honradez == '3' ? "selected" : ''  }} >Regular</option>
                                <option value="4" {{ $referencia->honradez == '4' ? "selected" : ''  }} >Malo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Calidad de trabajo</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][calidad_trabajo]">
                                <option value="1" {{ $referencia->calidad_trabajo == '1' ? "selected" : ''  }} >Excelente</option>
                                <option value="2" {{ $referencia->calidad_trabajo == '2' ? "selected" : ''  }} >Apropiado</option>
                                <option value="3" {{ $referencia->calidad_trabajo == '3' ? "selected" : ''  }} >Regular</option>
                                <option value="4" {{ $referencia->calidad_trabajo == '4' ? "selected" : ''  }} >Malo</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Relación con superiores</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][relacion_superiores]">
                                <option value="1" {{ $referencia->relacion_superiores == '1' ? "selected" : ''  }} >Excelente</option>
                                <option value="2" {{ $referencia->relacion_superiores == '2' ? "selected" : ''  }} >Apropiado</option>
                                <option value="3" {{ $referencia->relacion_superiores == '3' ? "selected" : ''  }} >Regular</option>
                                <option value="4" {{ $referencia->relacion_superiores == '4' ? "selected" : ''  }} >Malo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Relación con compañeros</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][relacion_companeros]">
                                <option value="1" {{ $referencia->relacion_companeros == '1' ? "selected" : ''  }} >Excelente</option>
                                <option value="2" {{ $referencia->relacion_companeros == '2' ? "selected" : ''  }} >Apropiado</option>
                                <option value="3" {{ $referencia->relacion_companeros == '3' ? "selected" : ''  }} >Regular</option>
                                <option value="4" {{ $referencia->relacion_companeros == '4' ? "selected" : ''  }} >Malo</option>
                            </select>
                        </div>                
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Puntualidad</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][puntualidad]">
                                <option value="1" {{ $referencia->puntualidad == '1' ? "selected" : ''  }} >Excelente</option>
                                <option value="2" {{ $referencia->puntualidad == '2' ? "selected" : ''  }} >Apropiado</option>
                                <option value="3" {{ $referencia->puntualidad == '3' ? "selected" : ''  }} >Regular</option>
                                <option value="4" {{ $referencia->puntualidad == '4' ? "selected" : ''  }} >Malo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Responsabilidad</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[{{ $index }}][responsabilidad]">
                                <option value="1" {{ $referencia->responsabilidad == '1' ? "selected" : ''  }} >Excelente</option>
                                <option value="2" {{ $referencia->responsabilidad == '2' ? "selected" : ''  }} >Apropiado</option>
                                <option value="3" {{ $referencia->responsabilidad == '3' ? "selected" : ''  }} >Regular</option>
                                <option value="4" {{ $referencia->responsabilidad == '4' ? "selected" : ''  }} >Malo</option>
                            </select>
                        </div>                
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">¿Cuenta con algún comprobante?</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="referencia_laboral[{{ $index }}][comprobante]" value="{{ $referencia->comprobante }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" name="referencia_laboral[0][observaciones]">{{ $referencia->observaciones }}</textarea>
                        </div>
                    </div> 

                @empty
                    <div class="form-group">
                        <input type="hidden" name="referencia_laboral[0][id]" value="0">                
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][nombre_empresa]" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][jefe_inmediato]" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Domicilio</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="referencia_laboral[0][domicilio]" value="">
                        </div>
                        <label class="col-md-1 control-label">Teléfono</label>                
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][telefono]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Fecha de ingreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][fecha_ingreso]" value="">
                        </div>
                        <label class="col-md-1 control-label">Puesto inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto_inicial]" value="">
                        </div>
                        <label class="col-md-1 control-label">Salario inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][salario_inicial]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Fecha de egreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][fecha_egreso]" value="">
                        </div>
                        <label class="col-md-1 control-label">Puesto final</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][puesto_final]" value="">
                        </div>
                        <label class="col-md-1 control-label">Salario final</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[0][salario_final]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">¿Tuvo personal a su cargo?</label>
                        <div class="col-md-4">
                            <select class="form-control" name="referencia_laboral[0][tuvo_personal]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Cotizó al IMSS</label>
                        <div class="col-md-4">
                            <select class="form-control" name="referencia_laboral[0][cotizo_imss]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Motivo de separación</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][motivo_separacion]" value="">
                        </div>
                        <label class="col-md-2 control-label">Causa</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][causa]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">¿Lo considera una persona recomendable?</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][pesona_recomendable]" value="">
                        </div>
                        <label class="col-md-2 control-label">Lo volverían a contratar</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][volverian_contratar]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Persona que da la referencia</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][da_referencia]" value="">
                        </div>
                        <label class="col-md-2 control-label">Puesto</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[0][da_referencia_puesto]" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <hr>
                        <label class="col-md-12 text-center control-label"><strong>Evaluación de competencias Laborales</strong></label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Honradez</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[0][honradez]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Apropiado</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Calidad de trabajo</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[0][calidad_trabajo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Apropiado</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Relación con superiores</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[0][relacion_superiores]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Apropiado</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Relación con compañeros</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[0][relacion_companeros]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Apropiado</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                            </select>
                        </div>                
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Puntualidad</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[0][puntualidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Apropiado</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Responsabilidad</label>
                        <div class="col-md-3">
                            <select class="form-control" name="referencia_laboral[0][responsabilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Apropiado</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                            </select>
                        </div>                
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">¿Cuenta con algún comprobante?</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="referencia_laboral[0][comprobante]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" name="referencia_laboral[0][observaciones]">{{ isset( $estudio->formatoHsbc->antecedentesLegales ) ? $estudio->formatoHsbc->antecedentesLegales->descripcion : '' }}</textarea>
                        </div>
                    </div> 
                

                @endforelse
            @else
                <div class="form-group">
                    <input type="hidden" name="referencia_laboral[0][id]" value="0">                
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][nombre_empresa]" value="">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][jefe_inmediato]" value="">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][puesto]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-1 control-label">Domicilio</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="referencia_laboral[0][domicilio]" value="">
                    </div>
                    <label class="col-md-1 control-label">Teléfono</label>                
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][telefono]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-1 control-label">Fecha de ingreso</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][fecha_ingreso]" value="">
                    </div>
                    <label class="col-md-1 control-label">Puesto inicial</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][puesto_inicial]" value="">
                    </div>
                    <label class="col-md-1 control-label">Salario inicial</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][salario_inicial]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-1 control-label">Fecha de egreso</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][fecha_egreso]" value="">
                    </div>
                    <label class="col-md-1 control-label">Puesto final</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][puesto_final]" value="">
                    </div>
                    <label class="col-md-1 control-label">Salario final</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[0][salario_final]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">¿Tuvo personal a su cargo?</label>
                    <div class="col-md-4">
                        <select class="form-control" name="referencia_laboral[0][tuvo_personal]">
                            <option value="1" >Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Cotizó al IMSS</label>
                    <div class="col-md-4">
                        <select class="form-control" name="referencia_laboral[0][cotizo_imss]">
                            <option value="1" >Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Motivo de separación</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][motivo_separacion]" value="">
                    </div>
                    <label class="col-md-2 control-label">Causa</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][causa]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">¿Lo considera una persona recomendable?</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][pesona_recomendable]" value="">
                    </div>
                    <label class="col-md-2 control-label">Lo volverían a contratar</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][volverian_contratar]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Persona que da la referencia</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][da_referencia]" value="">
                    </div>
                    <label class="col-md-2 control-label">Puesto</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[0][da_referencia_puesto]" value="">
                    </div>
                </div>

                <div class="form-group">
                    <hr>
                    <label class="col-md-12 text-center control-label"><strong>Evaluación de competencias Laborales</strong></label>
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Honradez</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[0][honradez]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Calidad de trabajo</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[0][calidad_trabajo]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Relación con superiores</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[0][relacion_superiores]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Relación con compañeros</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[0][relacion_companeros]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>                
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Puntualidad</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[0][puntualidad]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Responsabilidad</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[0][responsabilidad]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>                
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">¿Cuenta con algún comprobante?</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="referencia_laboral[0][comprobante]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Comentarios</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="5" name="referencia_laboral[0][observaciones]">{{ isset( $estudio->formatoHsbc->antecedentesLegales ) ? $estudio->formatoHsbc->antecedentesLegales->descripcion : '' }}</textarea>
                    </div>
                </div> 

            @endif
            </div>

        </div>
    </div>
</div>