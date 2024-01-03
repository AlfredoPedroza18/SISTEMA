
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Estado de Salud</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 control-label">¿Cómo considera su estado de salud?: </label>
                <div class="col-md-4">
                    <input type="hidden" name="enfermedades_candidato[id]" value="">
                    <select class="form-control" name="enfermedades_candidato[estado_salud]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->estado_salud == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Bueno</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->estado_salud == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Regular</option>
                            <option value="3" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->estado_salud == '3' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Malo</option>
                        </select>
                </div>               
            </div>
            <div class="form-group">
                <label class="control-label col-md-12 text-center"><strong>¿De las siguientes enfermedades ha padecido alguna frecuentemente?</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Anemia</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[anemia]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->anemia == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->anemia == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Gastritis</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[gastritis]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->gastritis == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->gastritis == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Úlcera</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[ulcera]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->ulcera == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->ulcera == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>




            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Asma</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[asma]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->asma == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->asma == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Espalda</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[espalda]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->espalda == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->espalda == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Artritis</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[artritis]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->artritis == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->artritis == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>
            




            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Gripe</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[gripe]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->gripe == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->gripe == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Migraña</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[migrania]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->migrania == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->migrania == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Bronquitis</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[bronquitis]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->bronquitis == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->bronquitis == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Presión Alta</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[presion_alta]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->presion_alta == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->presion_alta == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Presión Baja</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[presion_baja]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->presion_baja == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->presion_baja == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Riñon</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[rinon]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->rinon == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->rinon == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Epilepsia</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[epilepsia]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->epilepsia == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->epilepsia == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Problemas cardiacos</label>
                <div class="col-md-2">
                    <select class="form-control" name="enfermedades_candidato[problemas_cardiacos]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->problemas_cardiacos == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->enfermedad->problemas_cardiacos == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>






            <div class="form-group">
                <label class="control-label col-md-12 text-center"><strong>¿Cuál de las siguientes síntomas físicos ha padecido en los últimos seis meses?</strong></label>
            </div>

            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Acidez</label>
                <input  type="hidden" 
                        name="padecimientos[id]" 
                        value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->padecimiento->id : 0 }}">
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[acidez]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->acidez == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->acidez == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Insomnio</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[insomnio]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->insomnio == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->insomnio == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Debilidad</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[debilidad]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->debilidad == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->debilidad == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>
            




            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Ansiedad</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[ansiedad]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->ansiedad == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->ansiedad == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Escalofríos</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[escalofrios]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->escalofrios == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->escalofrios == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Mareos</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[mareos]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->mareos == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->mareos == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Dolor de cabeza</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[dolor_cabeza]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->dolor_cabeza == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->dolor_cabeza == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Manos temblorosas</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[manos_temblorosas]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->manos_temblorosas == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->manos_temblorosas == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Taquicardia</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[taquicardia]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->taquicardia == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->taquicardia == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 col-md-offset-1 control-label">Estreñimiento</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[estrenimiento]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->estrenimiento == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->estrenimiento == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>               
                <label class="col-md-1 control-label">Alergia</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[alergia]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->alergia == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->alergia == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                        </select>
                </div>
                <label class="col-md-1 control-label">Tipo de alergia</label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="padecimientos[tipo]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->padecimiento->tipo : '' }}">
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1 control-label">¿SE ENCUENTRA BAJO TRATAMIENTO MEDICO?</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[tratamiento_medico]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->tratamiento_medico == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->tratamiento_medico == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>
                <label class="col-md-2">PADECIMIENTO:</label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="padecimientos[tratamiento_medico_desc]" 
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->padecimiento->tratamiento_medico_desc : '' }}">   
                </div>
            </div> 
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1 control-label">¿TOMA ALGÚN MEDICAMENTO CONTROLADO?</label>
                <div class="col-md-2">
                    <select class="form-control" name="padecimientos[medicamento_controlado]">
                            <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->medicamento_controlado == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Si</option>
                            <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->padecimiento->medicamento_controlado == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No</option>
                    </select>
                </div>
                <label class="col-md-2">MEDICAMENTO:</label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="padecimientos[medicamento_controlado_desc]"
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->padecimiento->medicamento_controlado_desc : '' }}">   
                </div>
            </div> 

            <div class="form-group">
                <label class="control-label col-md-12 text-center"><strong>
                    ¿Alguno de tus familiares padece ó han padecido alguna enfermedad cronicodegenerativa: diabetes, cancer, cardiacas, respiratorias o cerebrales
                </strong></label>
            </div>

            <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary frm-submit-delete-viven-dom"
                        id="add-row-familiar-padece" 
                        data-id-delete-vive-persona="0">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
                <label class="col-md-3 text-center control-label"><strong>Nombre</strong></label>
                <label class="col-md-3 text-center control-label"><strong>Parentesco</strong></label>
                <label class="col-md-3 text-center control-label"><strong>Padecimiento</strong></label>
            </div>
            <div id="familiares-padecen-container">
            @if( $estudio->formatoFemsa )
                @forelse( $estudio->formatoFemsa->padecimiento_familiar as $index => $familiar )
                     <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-xs frm-submit-delete-familiar-padece"
                                data-id-delete-familiar-padece="{{ $familiar->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <div class="col-md-3">
                            <input  type="hidden" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][id]" 
                                    value="{{ $familiar->id }}">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][nombre]" 
                                    value="{{ $familiar->nombre }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][parentesco]" 
                                    value="{{ $familiar->parentesco }}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][padecimiento]" 
                                    value="{{ $familiar->padecimiento }}">
                        </div>
                    </div>
                @empty
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-2">
                            <input  type="hidden" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][id]" 
                                    value="">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][nombre]" 
                                    value="">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][parentesco]" 
                                    value="">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][padecimiento]" 
                                    value="">
                        </div>
                    </div>
                @endforelse
            @else
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-2">
                            <input  type="hidden" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][id]" 
                                    value="">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][nombre]" 
                                    value="">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][parentesco]" 
                                    value="">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[0][padecimiento]" 
                                    value="">
                        </div>
                    </div>
            @endif


            </div>



            
            <div class="form-group">
            	<hr>
                <label class="col-md-5 control-label text-center">
                    ¿Usted ó alguno de sus familiares cercanos requiere de atención médica constante?
                </label>
                <div class="col-md-2">                    
                    <input  type="hidden" 
                            name="atencion_medica[id]" 
                            value="{{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->atencion_medica->id : '0' }}">
                    <select class="form-control" name="atencion_medica[atencion_medica]">
                        <option value="1" 
                                @if( $estudio->formatoFemsa ) 
                                        @if( $estudio->formatoFemsa->atencion_medica->atencion_medica == '1' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >Si</option>
                        <option value="2" 
                                @if( $estudio->formatoFemsa ) 
                                        @if( $estudio->formatoFemsa->atencion_medica->atencion_medica == '2' ) 
                                            selected="selected"
                                        @endif
                                @endif
                                 >No</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-2 control-label">¿Quién y cuál es el padecimiento? </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="atencion_medica[padecimiento]"
                            value="{{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->atencion_medica->padecimiento : '' }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">En caso de accidente llamar a : </label>
                <div class="col-md-4">   
                	<input     type="text" 
                            class="form-control" 
                            name="atencion_medica[accidente_llamar]"
                            value="{{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->atencion_medica->accidente_llamar : '' }}">
                </div>                
                <label class="col-md-2 control-label">Teléfono: </label>
                <div class="col-md-2">   
                    <input  type="text" 
                            maxlength="13" 
                            class="form-control telefono" 
                            name="atencion_medica[telefono]"
                            value="{{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->atencion_medica->telefono : '' }}">
                </div>                
            </div>            
        </div>
    </div>
</div>