
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">APRECIACIÓN VIVIENDA</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="apreciacion[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
                 </div>
                
            </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-2 col-md-offset-1 text-center">NIVEL ECONÓMICO</div>
                      <div class="col-md-2 text-center">CONSTRUCCIÓN</div>
                      <div class="col-md-2 text-center">CONSERVACIÓN :</div>
                      <div class="col-md-2 text-center">MOBILIARIO:</div>
                      <div class="col-md-2 text-center">DE CORTE:</div>
                     
                </div>
                
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->nivel_eco_alta: '' }}" 
                            name="apreciacion[nivel_eco_alta]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->construccion_antigua: '' }}" 
                            name="apreciacion[construccion_antigua]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">ANTIGUA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->conservacion_excelente: '' }}" 
                            name="apreciacion[conservacion_excelente]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">EXCELENTE</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->mobiliario_completo: '' }}" 
                            name="apreciacion[mobiliario_completo]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">COMPLETO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->corte_variado: '' }}" 
                            name="apreciacion[corte_variado]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">VARIADO</label>
                      </div>
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->nivel_eco_media_alta: '' }}" 
                            name="apreciacion[nivel_eco_media_alta]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->construccion_sencilla: '' }}" 
                            name="apreciacion[construccion_sencilla]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SENCILLA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->conservacion_bueno: '' }}" 
                            name="apreciacion[conservacion_bueno]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BUENO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->mobiliario_incompleto: '' }}" 
                            name="apreciacion[mobiliario_incompleto]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">INCOMPLETO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->corte_conservador: '' }}" 
                            name="apreciacion[corte_conservador]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">CONSERVADOR</label>
                      </div>
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->nivel_eco_media: '' }}" 
                            name="apreciacion[nivel_eco_media]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->construccion_moderna: '' }}" 
                            name="apreciacion[construccion_moderna]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MODERNA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->conservacion_regular: '' }}" 
                            name="apreciacion[conservacion_regular]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">REGULAR</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->mobiliario_escueto: '' }}" 
                            name="apreciacion[mobiliario_escueto]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">ESCUETO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->corte_moderno: '' }}" 
                            name="apreciacion[corte_moderno]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">MODERNO</label>
                      </div>

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->nivel_eco_media_baja: '' }}" 
                            name="apreciacion[nivel_eco_media_baja]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->construccion_semi_moderna: '' }}" 
                            name="apreciacion[construccion_semi_moderna]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SEMI-MODERNA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->conservacion_malo: '' }}" 
                            name="apreciacion[conservacion_malo]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1  text-left">
                           <label class="control-label">MALO</label>
                      </div>
                       <div class="col-md-1 col-md-offset-1 text-left">
                           <label class="control-label"></label>
                      </div>
                      
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->corte_colonial: '' }}" 
                            name="apreciacion[corte_colonial]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">COLONIAL</label>
                      </div>

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->nivel_eco_baja: '' }}" 
                            name="apreciacion[nivel_eco_baja]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->construccion_convencional: '' }}" 
                            name="apreciacion[construccion_convencional]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">CONVENCIONAL</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->conservacion_pesimo: '' }}" 
                            name="apreciacion[conservacion_pesimo]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">PESIMO</label>
                      </div>
                       <div class="col-md-1 col-md-offset-1 text-left">
                           <label class="control-label"></label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->corte_sencillo: '' }}" 
                            name="apreciacion[corte_sencillo]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SENCILLO</label>
                      </div>
                      

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-5 col-md-offset-1 text-center">TIENE FAMILIARES Y/O CONOCIDOS EN LA EMPRESA</div>
                      <div class="col-md-5 col-md-offset-1 text-center">COMO SE ENTERO DE LA VACANTE</div>
                </div>
                <div class="row">
                      <div class="col-md-5 col-md-offset-1 text-center">
                          <select class="form-control" name="apreciacion[familiares_enla_empresa]" id="familiares">
                            <option value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->apreciacionVivienda->familiares_enla_empresa == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->apreciacionVivienda->familiares_enla_empresa == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                        <label class="control-label">Nombre y/o parentesco:</label>
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->familiares_parentesco: '' }}" 
                            name="apreciacion[familiares_parentesco]"
                            maxlength="250" id="especificacion"
                            @if( $estudio->formatoRoa)
                            @if($estudio->formatoRoa->apreciacionVivienda->familiares_enla_empresa =='2')
                            readonly="readonly"
                            @endif @endif
                            >
                      </div>
                      <div class="col-md-5 col-md-offset-1 text-center">
                        <textarea class="form-control" placeholder="Describir como se entero vacante"  maxlength="250" rows="5" name="apreciacion[entero_vacante]">{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->entero_vacante: '' }}</textarea>

                      </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1 text-center">
                      <label class="control-label">Nombre del reclutador:</label>
                        
                            <input  type="text" 
                                class="form-control" 
                                value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->nombre_reclutador: '' }}" 
                                name="apreciacion[nombre_reclutador]"
                                maxlength="250">
                    </div>
                </div>
              </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-right">
                      CONDICIONES INTERNAS
                    </div>
                    <div class="col-md-9">
                      <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->condiciones_internas: '' }}" 
                            name="apreciacion[condiciones_internas]"
                            >
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-3 text-right">
                      CONDICIONES EXTERNAS
                    </div>
                    <div class="col-md-9 ">
                      <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->condiciones_externas: '' }}" 
                            name="apreciacion[condiciones_externas]"
                            >
                    </div>
                </div>
              </div>

                        
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
