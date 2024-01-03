<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">HABITOS Y COSTUMBRES </h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="habito[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
                 </div>
                
            </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2 text-center">
                ¿INGIERE BEBIDAS ALCOHOLICAS?
                </div>
                <div class="col-md-2 text-center">
                    <select class="form-control" name="habito[tipo_bebida]" >
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                  </div>
                <div class="col-md-2 text-center">
                Cantidad
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control " 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_bebida_cantidad: '' }}" 
                            name="habito[tipo_bebida_cantidad]"
                            maxlength="250" 
                            >
                  </div>
                   <div class="col-md-2 text-center">
                ¿CON QUÉ FRECUENCIA?
                </div>
                <div class="col-md-2 text-center">
                    <select class="form-control" name="habito[tipo_bebida_frecuencia]" >
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida_frecuencia == '1' ) selected="selected" @endif @endif>DIARIO</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida_frecuencia == '2' ) selected="selected" @endif @endif>SEMANAL</option>
                            <option class="text-center" value="3" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida_frecuencia == '3' ) selected="selected" @endif @endif>QUINCENAL</option>
                            <option class="text-center" value="4" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida_frecuencia == '4' ) selected="selected" @endif @endif>OCASIONAL</option>
                            <option class="text-center" value="5" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_bebida_frecuencia == '5' ) selected="selected" @endif @endif>N/A</option>
                          </select><br>
                  </div>
            </div>
                
      </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2 text-center">
               ¿ACOSTUMBRA FUMAR?
                </div>
                <div class="col-md-2 text-center">
                    <select class="form-control" name="habito[tipo_fuma]">
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                  </div>
                <div class="col-md-2 text-center">
                Cantidad
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control " 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_fuma_cantidad: '' }}" 
                            name="habito[tipo_fuma_cantidad]"
                            maxlength="250" 
                            >
                  </div>
                   <div class="col-md-2 text-center">
                ¿CON QUÉ FRECUENCIA?
                </div>
                <div class="col-md-2 text-center">
                    <select class="form-control" name="habito[tipo_fuma_frecuencia]" >
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma_frecuencia == '1' ) selected="selected" @endif @endif>DIARIO</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma_frecuencia == '2' ) selected="selected" @endif @endif>SEMANAL</option>
                            <option class="text-center" value="3" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma_frecuencia == '3' ) selected="selected" @endif @endif>QUINCENAL</option>
                            <option class="text-center" value="4" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma_frecuencia == '4' ) selected="selected" @endif @endif>OCASIONAL</option>
                              <option class="text-center" value="5" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_fuma_frecuencia == '5' ) selected="selected" @endif @endif>N/A</option>
                          </select><br>
                  </div>
            </div>
                
      </div>
      <div class="form-group">
            <div class="row">
                <div class="col-md-2 text-center">
               ANTIDEPRESIVOS
                </div>
                <div class="col-md-2 text-center">
                    <select class="form-control" name="habito[tipo_antidepresivos]" >
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                  </div>
                <div class="col-md-2 text-center">
                Cantidad
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control " 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos_cantidad: '' }}" 
                            name="habito[tipo_antidepresivos_cantidad]"
                            maxlength="250" 
                            >
                  </div>
                   <div class="col-md-2 text-center">
                ¿CON QUÉ FRECUENCIA?
                </div>
                <div class="col-md-2 text-center">
                    <select class="form-control" name="habito[tipo_antidepresivos_frecuencia]" >
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos_frecuencia == '1' ) selected="selected" @endif @endif>DIARIO</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos_frecuencia == '2' ) selected="selected" @endif @endif>SEMANAL</option>
                            <option class="text-center" value="3" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos_frecuencia == '3' ) selected="selected" @endif @endif>QUINCENAL</option>
                            <option class="text-center" value="4" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos_frecuencia == '4' ) selected="selected" @endif @endif>OCASIONAL</option>
                            <option class="text-center" value="5" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->tipo_antidepresivos_frecuencia == '5' ) selected="selected" @endif @endif>N/A</option>
                          </select><br>
                  </div>
            </div>
                
      </div>
      <div class="form-group">
              <div class="row">
                <div class="col-md-12 text-center">
                           <label class="control-label">¿REALIZA ALGUNA ACTIVIDAD?  </label>
                </div>
              </div>
             <div class="row">
                <div class="col-md-12 text-center">
                    <select class="form-control" name="habito[realiza_actividad_fisica]" id="fisica">
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->realiza_actividad_fisica == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->realiza_actividad_fisica == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                  </div>
            
            </div>

      </div>
  <div class="actividad-fisica" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->realiza_actividad_fisica == '2' ) style="display:none;" @endif @endif >
      <div class="form-group">
            <div class="row">
                    <div class="col-md-3 text-right">TIPO DE ACTIVIDAD:</div>
                    <div class="col-md-1 text-right">SOCIAL</div>
                    <div class="col-md-1 text-center">
                            <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_social: '' }}" 
                            name="habito[actividad_social]"
                           
                            maxlength="3" 
                            >
                      </div>
                    <div class="col-md-1 text-right">DEPORTIVA</div>
                    <div class="col-md-1">
                       <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_deportiva: '' }}" 
                            name="habito[actividad_deportiva]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">RELIGIOSA</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_religiosa: '' }}" 
                            name="habito[actividad_religiosa]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">CULTURAL</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_cultural: '' }}" 
                            name="habito[actividad_cultural]"
                           
                            maxlength="3" 
                            >
                    </div>
               </div>
      </div>
  </div>
   <div class="actividad-fisica" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->realiza_actividad_fisica == '2' ) style="display:none;" @endif @endif >
      <div class="form-group">
            <div class="row">
            <div class="col-md-1 text-right">PAREJA</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_actividad_pareja: '' }}" 
                            name="habito[tipo_actividad_pareja]"
                           
                            maxlength="3">
                        </div>
                          <div class="col-md-4">
                            <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_actividad_pareja_desc: '' }}" 
                            name="habito[tipo_actividad_pareja_desc]"
                           
                            maxlength="255" 
                            >

                        </div>
             </div>
          </div>
    </div>
<div class="actividad-fisica" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->realiza_actividad_fisica == '2' ) style="display:none;" @endif @endif >
      <div class="form-group">
            <div class="row">
            <div class="col-md-1 text-right">FAMILIA</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_actividad_familia: '' }}" 
                            name="habito[tipo_actividad_familia]"
                           
                            maxlength="3">
                        </div>
                          <div class="col-md-4">
                            <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_actividad_familia_desc: '' }}" 
                            name="habito[tipo_actividad_familia_desc]"
                           
                            maxlength="255" 
                            >

                        </div>
             </div>
          </div>
    </div>
    <div class="actividad-fisica" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->realiza_actividad_fisica == '2' ) style="display:none;" @endif @endif >
      <div class="form-group">
            <div class="row">
            <div class="col-md-1 text-right">¿Cúal ó Cúales?</div>
                    <div class="col-md-11">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->tipo_actividad_cuales: '' }}" 
                            name="habito[tipo_actividad_cuales]"
                           
                            maxlength="255">
                        </div>
                       
             </div>
          </div>
    </div>
     <div class="actividad-fisica" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->habitoCostumbre->actividad_fisica == '2' ) style="display:none;" @endif @endif >
               <div class="row">
                    <div class="col-md-3 text-right">¿CON QUÉ FRECUENCIA?</div>
                    <div class="col-md-1 text-right">DIARIO</div>
                    <div class="col-md-1 text-center">
                            <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_diario: '' }}" 
                            name="habito[actividad_diario]"
                           
                            maxlength="3" 
                            >
                      </div>
                    <div class="col-md-1 text-right">SEMANAL</div>
                    <div class="col-md-1">
                       <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_semanal: '' }}" 
                            name="habito[actividad_semanal]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">QUINCENAL</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_quincenal: '' }}" 
                            name="habito[actividad_quincenal]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">MENSUAL</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->habitoCostumbre->actividad_mensual: '' }}" 
                            name="habito[actividad_mensual]"
                           
                            maxlength="3" 
                            >
                    </div>
               </div>
            </div>

      
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
