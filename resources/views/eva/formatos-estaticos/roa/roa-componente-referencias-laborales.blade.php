
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">REFERENCIAS LABORALES</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">

            <div class="form-group">
                <label class="col-md-2 col-md-offset-10 text-center control-label">
                    <a href="javascript:;" class="btn btn-circle btn-primary" id="add-laboral">
                        <i class="fa fa-plus"></i>
                    </a> <strong>Agregar Referencia laboral</strong>
                </label>
            </div>
        <div id="laboral-container">

                @if($estudio->formatoRoa)

                @foreach ($estudio->formatoRoa->referenciaLaborales as $indexlaboral => $laboral)
                <div id="fila_laboral_0" attr-row="0">
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                            class="btn btn-circle btn-danger frm-submit-delete-laboral"
                            data-id-delete-laboral="{{ $laboral->id }}">
                            <i class="fa fa-minus"></i>
                        </a>
                    </label>

                </div>
                <div class="form-group">
                    <div class="row">
                        <input type="hidden" name="referencias_laborales[{{ $indexlaboral }}][id]" value="{{ $laboral->id }}">
                        <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">EMPRESA:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][empresa_laboral]" value="{{ $laboral->empresa_laboral }}">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TELÉFONO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[{{ $indexlaboral }}][telefono_laboral]" value="{{ $laboral->telefono_laboral }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                 <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">GIRO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][giro_laboral]" value="{{ $laboral->giro_laboral }}">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">CELULAR:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[{{ $indexlaboral }}][celular_laboral]" value="{{ $laboral->celular_laboral }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                  <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">DIRECCIÓN:</label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][direccion_laboral]" value="{{ $laboral->direccion_laboral }}">
                        </div>
                       
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">PUESTO INICIAL:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][puesto_inicial_laboral]" value="{{ $laboral->puesto_inicial_laboral }}">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">SUELDO INICIAL:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[{{ $indexlaboral }}][sueldo_inicial_laboral]" value="{{ $laboral->sueldo_inicial_laboral }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">FECHA INGRESO:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="date"  class="form-control" name="referencias_laborales[{{ $indexlaboral }}][fecha_ingreso_laboral]" value="{{ $laboral->fecha_ingreso_laboral }}"  maxlength="10">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                 <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">ÚLTIMO PUESTO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][ultimo_puesto_laboral]" value="{{ $laboral->ultimo_puesto_laboral }}">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">SUELDO FINAL:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[{{ $indexlaboral }}][sueldo_final_laboral]" value="{{ $laboral->sueldo_final_laboral }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">FECHA EGRESO:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="date"  class="form-control" name="referencias_laborales[{{ $indexlaboral }}][fecha_egreso_laboral]" value="{{ $laboral->fecha_egreso_laboral }}"  maxlength="10">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                <div class="form-group">
                    <div class="row">
                       <div class="col-md-4 col-md-offset-1 text-center">
                            <label class="control-label">NOMBRE DEL JEFE INMEDIATO:</label>
                        </div>
                        
                         <div class="col-md-4 text-center">
                            <label class="control-label">PUESTO,  ÁREA Y DEPARTAMENTO</label>
                        </div>

                            <div class="col-md-3 text-center">
                            <label class="control-label">TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO</label>
                        </div>
                    </div>
                       
                </div><!-- end row-->
              
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][nombre_jinmediato_laboral]" value="{{ $laboral->nombre_jinmediato_laboral }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][jpuesto_laboral]" value="{{ $laboral->jpuesto_laboral }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][tiempo_dependio_laboral]" value="{{ $laboral->tiempo_dependio_laboral }}">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-3  col-md-offset-1 text-center">
                            <label class="control-label">PRINCIPALES FUNCIONES</label>
                        </div>
                        <div class="col-md-7 text-center">
<textarea class="form-control" placeholder="Describir Situación Socioeconómica " rows="5"   name="referencias_laborales[{{ $indexlaboral }}][principales_funciones_laboral]">{{ $laboral->principales_funciones_laboral }}</textarea>
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                           <div class="alert alert-info fade in alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                 EVALUACIÓN DE DESEMPEÑO
                            </div>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                           ASISTENCIA    
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][asistencia_laboral]">
                            <option value="1" @if( $laboral->asistencia_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->asistencia_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->asistencia_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->asistencia_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->asistencia_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          PUNTUALIDAD   
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][puntualidad_laboral]">
                            <option value="1" @if( $laboral->puntualidad_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->puntualidad_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->puntualidad_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->puntualidad_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->puntualidad_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          HONRADEZ
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][honradez_laboral]">
                            <option value="1" @if( $laboral->honradez_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->honradez_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->honradez_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->honradez_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->honradez_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          RESPONSABILIDAD
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][responsabilidad_laboral]">
                            <option value="1" @if( $laboral->responsabilidad_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->responsabilidad_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->responsabilidad_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->responsabilidad_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->responsabilidad_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          DISPONIBILIDAD
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][disponibilidad_laboral]">
                            <option value="1" @if( $laboral->disponibilidad_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->disponibilidad_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->disponibilidad_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->disponibilidad_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->disponibilidad_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         COMPROMISO CON LA EMPRESA
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][compromiso_empresa_laboral]">
                            <option value="1" @if( $laboral->compromiso_empresa_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->compromiso_empresa_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->compromiso_empresa_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->compromiso_empresa_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->compromiso_empresa_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         INICIATIVA
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][iniciativa_laboral]">
                            <option value="1" @if( $laboral->iniciativa_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->iniciativa_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->iniciativa_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->iniciativa_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->iniciativa_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         CALIDAD DEL TRABAJO
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][calidad_trabajo_laboral]">
                            <option value="1" @if( $laboral->calidad_trabajo_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->calidad_trabajo_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->calidad_trabajo_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->calidad_trabajo_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->calidad_trabajo_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRABAJO EN EQUIPO
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][trabajo_equipo_laboral]">
                            <option value="1" @if( $laboral->trabajo_equipo_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->trabajo_equipo_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->trabajo_equipo_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->trabajo_equipo_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->trabajo_equipo_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRABAJO BAJO PRESIÓN
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][trabajo_bajo_presión_laboral]">
                            <option value="1" @if( $laboral->trabajo_bajo_presión_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->trabajo_bajo_presión_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->trabajo_bajo_presión_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->trabajo_bajo_presión_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->trabajo_bajo_presión_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRATO CON EL JEFE
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][trato_jefe_laboral]">
                            <option value="1" @if( $laboral->trato_jefe_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->trato_jefe_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->trato_jefe_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->trato_jefe_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->trato_jefe_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRATO CON COMPAÑEROS
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][trato_compañeros_laboral]">
                            <option value="1" @if( $laboral->trato_compañeros_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->trato_compañeros_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->trato_compañeros_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->trato_compañeros_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->trato_compañeros_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                        PRODUCTIVIDAD / CAPACIDAD
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][productividad_capacidad_laboral]">
                            <option value="1" @if( $laboral->productividad_capacidad_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->productividad_capacidad_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->productividad_capacidad_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->productividad_capacidad_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->productividad_capacidad_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         LIDERAZGO
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][liderazgo_laboral]">
                            <option value="1" @if( $laboral->liderazgo_laboral== '1' ) selected="selected" @endif>EXCELENTE</option>
                            <option value="2" @if( $laboral->liderazgo_laboral == '2' ) selected="selected" @endif>BUENO</option>
                            <option value="3" @if( $laboral->liderazgo_laboral == '3' ) selected="selected" @endif>REGULAR</option>
                            <option value="4" @if( $laboral->liderazgo_laboral == '4' ) selected="selected" @endif>MALO</option>
                            <option value="5" @if( $laboral->liderazgo_laboral == '5' ) selected="selected" @endif>PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                   <div class="form-group">
                    <div class="row">
                    <div class="col-md-1 col-md-offset-1 text-right">
                         TIPO DE CONTRATO
                        </div>
                         <div class="col-md-2  text-left">
                         <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][tipo_contrato_laboral]" value="{{ $laboral->tipo_contrato_laboral }}">
                          
                        </div>
                        <div class="col-md-2 text-right">
                         MOTIVO DE SEPARACIÓN
                        </div>
                         <div class="col-md-4 text-left">
                <textarea class="form-control" placeholder="Describir motivo de separación " rows="5"   name="referencias_laborales[{{ $indexlaboral }}][motivo_separacion_laboral]">{{ $laboral->motivo_separacion_laboral }}</textarea>
                          
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <div class="row">
                     <div class="col-md-2 col-md-offset-1 text-left">
                     ¿EXISTE ALGÚN ADEUDO ?

                    </div>
                     <div class="col-md-1  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][adeudo_laboral]">
                                <option value="1" @if( $laboral->adeudo_laboral== '1' ) selected="selected" @endif>SI</option>
                                <option value="2" @if( $laboral->adeudo_laboral == '2' ) selected="selected" @endif>NO</option>
                                         
                           </select>
                     </div>
                      <div class="col-md-2  text-left">
                     ¿PERTENECIÓ A ALGÚN SINDICATO?

                    </div>
                     <div class="col-md-1  text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][sindicato_laboral]">
                                <option value="1" @if( $laboral->sindicato_laboral== '1' ) selected="selected" @endif>SI</option>
                                <option value="2" @if( $laboral->sindicato_laboral == '2' ) selected="selected" @endif>NO</option>
                                         
                           </select>
                     </div>
                        <div class="col-md-2  text-left">
                     ¿LO CONTRATARÍAN NUEVAMENTE?

                    </div>
                     <div class="col-md-1 text-left">
                           <select class="form-control" name="referencias_laborales[{{ $indexlaboral }}][contrataria_laboral]">
                                <option value="1" @if( $laboral->contrataria_laboral== '1' ) selected="selected" @endif>SI</option>
                                <option value="2" @if( $laboral->contrataria_laboral == '2' ) selected="selected" @endif>NO</option>
                                         
                           </select>
                     </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-11 col-md-offset-1 text-center">
                             OBSERVACIONES
                      </div>
                  </div>
                   <div class="row">
                         <div class="col-md-10 col-md-offset-1 text-center">
                <textarea class="form-control" placeholder="Describir motivo de separación " rows="5"   name="referencias_laborales[{{ $indexlaboral }}][observaciones_laboral]">{{ $laboral->observaciones_laboral }}</textarea>
                          
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                     
                        <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">INFORMO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][informo_sobre_puesto_laboral]" value="{{ $laboral->informo_sobre_puesto_laboral }}">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">PUESTO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                           <input type="text" maxlength="255" class="form-control" name="referencias_laborales[{{ $indexlaboral }}][puesto_informo_laboral]" value="{{ $laboral->puesto_informo_laboral }}">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->



            </div> <!-- end div fila-->
            @endforeach

            @else 
            <div id="fila_personal_0" attr-row="0"><!-- START FILA -->
                 <div class="form-group">
                    <div class="row">
                        <input type="hidden" name="referencias_laborales[0][id]" value="0">
                        <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">EMPRESA:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="BBreferencias_laborales[0][empresa_laboral]">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TELÉFONO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[0][telefono_laborales]"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                 <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">GIRO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][giro_laboral]" >
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">CELULAR:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[0][celular_laboral]"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                  <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">DIRECCIÓN:</label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][direccion_laboral]" >
                        </div>
                       
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">PUESTO INICIAL:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][puesto_inicial_laboral]" >
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">SUELDO INICIAL:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[0][sueldo_inicial_laboral]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">FECHA INGRESO:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="date"  class="form-control" name="referencias_laborales[0][fecha_ingreso_laboral]"   maxlength="10">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                 <div class="form-group">
                    <div class="row">
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">ÚLTIMO PUESTO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][ultimo_puesto_laboral]" >
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">SUELDO FINAL:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[0][sueldo_final_laboral]"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">FECHA EGRESO:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="date"  class="form-control" name="referencias_laborales[0][fecha_egreso_laboral]"   maxlength="10">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                <div class="form-group">
                    <div class="row">
                       <div class="col-md-4 col-md-offset-1 text-center">
                            <label class="control-label">NOMBRE DEL JEFE INMEDIATO:</label>
                        </div>
                        
                         <div class="col-md-4 text-center">
                            <label class="control-label">PUESTO,  ÁREA Y DEPARTAMENTO</label>
                        </div>

                            <div class="col-md-3 text-center">
                            <label class="control-label">TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO</label>
                        </div>
                    </div>
                       
                </div><!-- end row-->
              
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][nombre_jinmediato_laboral]" >
                        </div>
                        <div class="col-md-4">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][jpuesto_laboral]" >
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][tiempo_dependio_laboral]" >
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-3  col-md-offset-1 text-center">
                            <label class="control-label">PRINCIPALES FUNCIONES</label>
                        </div>
                        <div class="col-md-7 text-center">
<textarea class="form-control" placeholder="Describir Situación Socioeconómica " rows="5"   name="referencias_laborales[0][principales_funciones_laboral]">
                             
                            </textarea>
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                           <div class="alert alert-info fade in alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                 EVALUACIÓN DE DESEMPEÑO
                            </div>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                           ASISTENCIA    
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][asistencia_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          PUNTUALIDAD   
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][puntualidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          HONRADEZ
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[0][honradez_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          RESPONSABILIDAD
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][responsabilidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                          DISPONIBILIDAD
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[0][disponibilidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         COMPROMISO CON LA EMPRESA
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][compromiso_empresa_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         INICIATIVA
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][iniciativa_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         CALIDAD DEL TRABAJO
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][calidad_trabajo_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRABAJO EN EQUIPO
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[0][trabajo_equipo_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRABAJO BAJO PRESIÓN
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][trabajo_bajo_presión_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRATO CON EL JEFE
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][trato_jefe_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRATO CON COMPAÑEROS
                        </div>
                         <div class="col-md-4 text-left">
                           <select class="form-control" name="referencias_laborales[0][trato_compañeros_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                        PRODUCTIVIDAD / CAPACIDAD
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][productividad_capacidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 text-right">
                         LIDERAZGO
                        </div>
                         <div class="col-md-4  text-left">
                           <select class="form-control" name="referencias_laborales[0][liderazgo_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    </div>
                </div>
                   <div class="form-group">
                    <div class="row">
                    <div class="col-md-1 col-md-offset-1 text-right">
                         TIPO DE CONTRATO
                        </div>
                         <div class="col-md-2 text-left">
                         <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][tipo_contrato_laboral]">
                          
                        </div>
                        <div class="col-md-2 text-right">
                         MOTIVO DE SEPARACIÓN
                        </div>
                         <div class="col-md-4  text-left">
                         <textarea class="form-control" placeholder="Describir motivo de separación " rows="5"   name="referencias_laborales[0][motivo_separacion_laboral]">
                              
                            </textarea>
                          
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <div class="row">
                     <div class="col-md-2 col-md-offset-1 text-left">
                     ¿EXISTE ALGÚN ADEUDO ?

                    </div>
                     <div class="col-md-1 text-left">
                           <select class="form-control" name="referencias_laborales[0][adeudo_laboral]">
                                <option value="1" >SI</option>
                                <option value="2" >NO</option>
                                         
                           </select>
                     </div>
                      <div class="col-md-2 text-left">
                     ¿PERTENECIÓ A ALGÚN SINDICATO?

                    </div>
                     <div class="col-md-1  text-left">
                           <select class="form-control" name="referencias_laborales[0][sindicato_laboral]">
                                <option value="1">SI</option>
                                <option value="2">NO</option>
                                         
                           </select>
                     </div>
                        <div class="col-md-2 text-left">
                     ¿LO CONTRATARÍAN NUEVAMENTE?

                    </div>
                     <div class="col-md-1  text-left">
                           <select class="form-control" name="referencias_laborales[0][contrataria_laboral]">
                                <option value="1">SI</option>
                                <option value="2" >NO</option>
                                         
                           </select>
                     </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-11 col-md-offset-1 text-center">
                             OBSERVACIONES
                      </div>
                  </div>
                   <div class="row">
                         <div class="col-md-10  text-center">
                         <textarea class="form-control" placeholder="Describir motivo de separación " rows="5"   name="referencias_laborales[0][observaciones_laboral]">
                                
                            </textarea>
                          
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                     
                        <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">INFORMO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][informo_sobre_puesto_laboral]">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">PUESTO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                           <input type="text" maxlength="255" class="form-control" name="referencias_laborales[0][puesto_informo_laboral]">
                        </div>
                    </div><!-- end row-->
                </div> <!-- end form-group-->


            </div><!-- END FILA-->
            @endif


        </div>
    </div>
</div>

