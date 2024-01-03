<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">EN CASO DE EMERGENCIA</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="emergencia[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                  
                 </div>
                
            </div>
            
              <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-right">
                           <label class="control-label">EN CASO DE ACCIDENTE O EMERGENCIA, LLAMAR A:</label>
                      </div>
                      <div class="col-md-3 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->caso_emergencia: '' }}" 
                            name="emergencia[caso_emergencia]"
                            maxlength="250" 
                            >
                      </div>
                      <div class="col-md-2 text-right">
                           <label class="control-label">TELÉFONO:</label>
                      </div>
                      <div class="col-md-3 text-left">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->caso_telefono: '' }}" 
                            name="emergencia[caso_telefono]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999"
                            maxlength="15" 
                            >
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
                    <select class="form-control" name="emergencia[actividad_fisica]" id="fisica">
                            <option class="text-center" value="1" @if( $estudio->formatoMetlife) @if( $estudio->formatoMetlife->casoEmergencia->actividad_fisica == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoMetlife) @if( $estudio->formatoMetlife->casoEmergencia->actividad_fisica == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                  </div>
            
            </div>
            <div class="actividad-fisica" @if( $estudio->formatoMetlife) @if( $estudio->formatoMetlife->casoEmergencia->actividad_fisica == '2' ) style="display:none;" @endif @endif >
               <div class="row">
                    <div class="col-md-3 text-right">TIPO DE ACTIVIDAD:</div>
                    <div class="col-md-1 text-right">SOCIAL</div>
                    <div class="col-md-1 text-center">
                            <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->actividad_social: '' }}" 
                            name="emergencia[actividad_social]"
                           
                            maxlength="3" 
                            >
                      </div>
                    <div class="col-md-1 text-right">DEPORTIVA</div>
                    <div class="col-md-1">
                       <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->actividad_deportiva: '' }}" 
                            name="emergencia[actividad_deportiva]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">RELIGIOSA</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->actividad_religiosa: '' }}" 
                            name="emergencia[actividad_religiosa]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">CULTURAL</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->actividad_cultural: '' }}" 
                            name="emergencia[actividad_cultural]"
                           
                            maxlength="3" 
                            >
                    </div>
               </div>
            </div>
             <div class="actividad-fisica" @if( $estudio->formatoMetlife) @if( $estudio->formatoMetlife->casoEmergencia->actividad_fisica == '2' ) style="display:none;" @endif @endif >
               <div class="row">
                    <div class="col-md-3 text-right">TIEMPO DEDICADO:</div>
                    <div class="col-md-1 text-right">DIARIO</div>
                    <div class="col-md-1 text-center">
                            <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->tiempo_diario: '' }}" 
                            name="emergencia[tiempo_diario]"
                           
                            maxlength="3" 
                            >
                      </div>
                    <div class="col-md-1 text-right">SEMANAL</div>
                    <div class="col-md-1">
                       <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->tiempo_semanal: '' }}" 
                            name="emergencia[tiempo_semanal]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">QUINCENAL</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->tiempo_quincenal: '' }}" 
                            name="emergencia[tiempo_quincenal]"
                           
                            maxlength="3" 
                            >
                    </div>
                    <div class="col-md-1 text-right">MENSUAL</div>
                    <div class="col-md-1">
                      <input  type="text" 
                            class="form-control limpiar" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->tiempo_mensual: '' }}" 
                            name="emergencia[tiempo_mensual]"
                           
                            maxlength="3" 
                            >
                    </div>
               </div>
            </div>




              </div>
  
           
                        
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
