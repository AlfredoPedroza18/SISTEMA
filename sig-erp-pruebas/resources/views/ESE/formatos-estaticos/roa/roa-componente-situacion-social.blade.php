<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">SITUACIÓN SOCIAL</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="situacion[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
                 </div>
                
            </div>
            
              <div class="form-group">
                <div class="row">
                      <div class="col-md-12 text-center">
                           <label class="control-label">A QUE ORGANIZACIONES O SINDICATOS LABORALES HA PERTENECIDO</label>
                      </div>
                </div>
                <div class="row">

                  <div class="col-md-12 text-center">
                     <textarea class="form-control" placeholder="Describir si pertenecio a un sindicato"  maxlength="250" rows="5" name="situacion[pertenece_sindicato]">{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionSocial->pertenece_sindicato: '' }}</textarea>  
                  </div>
              </div>
           </div>
            <div class="form-group">
                <div class="row">
                <div class="col-md-12 text-center">
                           <label class="control-label">¿HA SIDO DETENIDO O HA TENIDO ALGUNA DEMANDA LABORAL, CIVIL, MERCANTIL O PENAL? </label>
                </div>
                <div class="col-md-12 text-center">
                    <select class="form-control" name="situacion[detencion]" id="detencion">
                            <option class="text-center" value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->situacionSocial->detencion == '1' ) selected="selected" @endif @endif>SI</option>
                            <option class="text-center" value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->situacionSocial->detencion == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                        <label class="control-label text-center">Motivo:</label>
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionSocial->especificacion_detencion: '' }}" 
                            name="situacion[especificacion_detencion]"
                            maxlength="250" id="especificacion_detencion"
                            @if($estudio->formatoRoa)
                            @if($estudio->formatoRoa->situacionSocial->especificacion_detencion =='2')
                            readonly="readonly"
                            @endif @endif
                            >
                      </div>
                </div>   
              </div>
           </div>
           <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center"><strong>INTERESES CORTO PLAZO</strong></div>
                    <div class="col-md-3 text-center"><strong>INTERESES MEDIANO PLAZO</strong></div>
                    <div class="col-md-3 text-center"><strong>INTERESES LARGO PLAZO</strong></div>
                    <div class="col-md-3 text-center"><strong>PRINCIPALES PASATIEMPOS</strong></div>

                </div>
                <div class="row">
                    <div class="col-md-3 text-center">
                         <textarea class="form-control" placeholder="Describir interes a corto plazo"  maxlength="250" rows="5" name="situacion[interes_corto]">{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionSocial->interes_corto: '' }}</textarea>  
                    </div>
                    <div class="col-md-3 text-center">
                         <textarea class="form-control" placeholder="Describir interes a mediano plazo"  maxlength="250" rows="5" name="situacion[interes_mediano]">{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionSocial->interes_mediano: '' }}</textarea>  
                    </div>
                    <div class="col-md-3 text-center">
                         <textarea class="form-control" placeholder="Describir interes a largo plazo"  maxlength="250" rows="5" name="situacion[interes_largo]">{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionSocial->interes_largo: '' }}</textarea>  
                    </div>
                    <div class="col-md-3 text-center">
                         <textarea class="form-control" placeholder="Describir principal pasatiempo"  maxlength="250" rows="5" name="situacion[pasatiempos]">{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionSocial->pasatiempos: '' }}</textarea>  
                    </div>

                </div>
           </div>
                        
           
  </div><!--edn formulario horizontal -->
  </div>
