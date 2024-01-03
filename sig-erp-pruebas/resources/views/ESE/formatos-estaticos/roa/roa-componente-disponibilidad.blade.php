<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">DISPONIBILIDAD</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="dispo[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
                 </div>
                
            </div>
            
              <div class="form-group">
                <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">SI ESTA EMPLEADO ACTUALMENTE, ¿POR QUÉ DESEA CAMBIAR? :</label>
                      </div>
                      <div class="col-md-4 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->disponible->empleado_actualmente: '' }}" 
                            name="dispo[empleado_actualmente]"
                            maxlength="250" 
                            >
                      </div>
                </div>
                 <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">¿ESTA DISPUESTO A VIAJAR? :</label>
                      </div>
                      <div class="col-md-4 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->disponible->disponible_viajar: '' }}" 
                            name="dispo[disponible_viajar]"
                            maxlength="250" 
                            >
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">¿A CAMBIAR DE RESIDENCIA?:</label>
                      </div>
                      <div class="col-md-4 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->disponible->cambiar_residencia: '' }}" 
                            name="dispo[cambiar_residencia]"
                            maxlength="250" 
                            >
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">¿A PARTIR DE QUÉ FECHA PUEDE COMENZAR A TRABAJAR?:</label>
                      </div>
                      <div class="col-md-4 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->disponible->fecha_laboral: '' }}" 
                            name="dispo[fecha_laboral]"
                            maxlength="250" 
                            >
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">¿TIENE FAMILIARES TRABAJANDO EN ESTA EMPRESA?</label>
                      </div>
                      <div class="col-md-4 text-left">
                             <select class="form-control" name="dispo[tiene_familiares]" >
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->disponible->tiene_familiares == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->disponible->tiene_familiares == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                       </div>
                   </div>

                    <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">NOMBRE:</label>
                      </div>
                      <div class="col-md-4 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->disponible->nombre_familiar: '' }}" 
                            name="dispo[nombre_familiar]"
                            maxlength="250" 
                            >
                      </div>
                     </div>
                </div>

         
    </div><!--edn formulario horizontal -->
  </div>
</div>