
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
                    <input type="hidden" name="apreciacion[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                  
                 </div>
                
            </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-2 col-md-offset-1 text-center">CONDICIONES INTERIORES</div>
                      <div class="col-md-2 text-center">ORDEN Y LIMPIEZA</div>
                      <div class="col-md-2 text-center">CALIDAD MOBILIARIO</div>
                      <div class="col-md-2 text-center">CONSERVACIÓN DEL MOBILIARIO</div>
                      <div class="col-md-2 text-center">ESPACIO DE LA VIVIENDA</div>
                     
                </div>
                
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->condiciones_alta: '' }}" 
                            name="apreciacion[condiciones_alta]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->orden_alta: '' }}" 
                            name="apreciacion[orden_alta]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->calidad_alta: '' }}" 
                            name="apreciacion[calidad_alta]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->conservacion_alta: '' }}" 
                            name="apreciacion[conservacion_alta]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->espacio_sobrado: '' }}" 
                            name="apreciacion[espacio_sobrado]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">SOBRADO</label>
                      </div>
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->condiciones_malta: '' }}" 
                            name="apreciacion[condiciones_malta]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->orden_malta: '' }}" 
                            name="apreciacion[orden_malta]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->calidad_malta: '' }}" 
                            name="apreciacion[calidad_malta]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->conservacion_malta: '' }}" 
                            name="apreciacion[conservacion_malta]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA ALTA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->espacio_suficiente: '' }}" 
                            name="apreciacion[espacio_suficiente]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">SUFICIENTE</label>
                      </div>
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->condiciones_media: '' }}" 
                            name="apreciacion[condiciones_media]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->orden_media: '' }}" 
                            name="apreciacion[orden_media]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->calidad_media: '' }}" 
                            name="apreciacion[calidad_media]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->conservacion_media: '' }}" 
                            name="apreciacion[conservacion_media]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->espacio_limitado: '' }}" 
                            name="apreciacion[espacio_limitado]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">LIMITADO</label>
                      </div>

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->condiciones_media_baja: '' }}" 
                            name="apreciacion[condiciones_media_baja]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->orden_media_baja: '' }}" 
                            name="apreciacion[orden_media_baja]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->calidad_media_baja: '' }}" 
                            name="apreciacion[calidad_media_baja]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->conservacion_media_baja: '' }}" 
                            name="apreciacion[conservacion_media_baja]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">MEDIA BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->espacio_insuficiente: '' }}" 
                            name="apreciacion[espacio_insuficiente]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">INSUFICIENTE</label>
                      </div>

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->condiciones_baja: '' }}" 
                            name="apreciacion[condiciones_baja]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->orden_baja: '' }}" 
                            name="apreciacion[orden_baja]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->calidad_baja: '' }}" 
                            name="apreciacion[calidad_baja]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BAJA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->conservacion_baja: '' }}" 
                            name="apreciacion[conservacion_baja]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BAJA</label>
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
                          <select class="form-control" name="apreciacion[tiene_familiares]" id="familiares">
                            <option value="1" @if( $estudio->formatoMetlife) @if( $estudio->formatoMetlife->apreciacionVivienda->tiene_familiares == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoMetlife) @if( $estudio->formatoMetlife->apreciacionVivienda->tiene_familiares == '2' ) selected="selected" @endif @endif>NO</option>
                          </select><br>
                        <label class="control-label">Especificar:</label>
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->especificacion: '' }}" 
                            name="apreciacion[especificacion]"
                            maxlength="250" id="especificacion"
                            @if( $estudio->formatoMetlife)
                            @if($estudio->formatoMetlife->apreciacionVivienda->especificacion =='2')
                            readonly="readonly"
                            @endif @endif
                            >
                      </div>
                      <div class="col-md-5 col-md-offset-1 text-center">
                        <textarea class="form-control" placeholder="Describir como se entero vacante"  maxlength="250" rows="5" name="apreciacion[entero_vacante]">{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->entero_vacante: '' }}</textarea>

                      </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1 text-center">
                      <label class="control-label">Nombre del reclutador:</label>
                        
                            <input  type="text" 
                                class="form-control" 
                                value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->nombre_reclutador: '' }}" 
                                name="apreciacion[nombre_reclutador]"
                                maxlength="250">
                    </div>
                </div>
              </div>
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
