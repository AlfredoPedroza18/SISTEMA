
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">ESCOLARIDAD</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
     <input type="hidden" name="escolaridad[id]" value="{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->id : 0 }}">
            <div class="row">
                <div class="col-md-2 text-center"><strong>GRADO</strong></div>
                <div class="col-md-2 text-center"><strong>INSTITUCIÓN</strong></div>
                <div class="col-md-2 text-center"><strong>DOMICILIO</strong></div>
                <div class="col-md-2 text-center"><strong>PERIODO</strong></div>
                <div class="col-md-2 text-center"><strong>AÑOS</strong></div>
                <div class="col-md-2 text-center"><strong>COMPROBANTE</strong></div>
            </div>
      
            <div class="form-group">
              <div class="row">
                <div class="col-md-2 text-left"><label class="control-label">PRIMARIA</label></div>
                <div class="col-md-2 text-center">
                  <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[institucion_primaria]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->institucion_primaria: ''}}</textarea>        
                </div>
                <div class="col-md-2 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[domicilio_primaria]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->domicilio_primaria: ''}}</textarea> 
                </div>
                <div class="col-md-2 text-center">
                     <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->periodo_primaria: '' }}" 
                            name="escolaridad[periodo_primaria]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->anos_primaria: '' }}" 
                            name="escolaridad[anos_primaria]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->comprobante_primaria: '' }}" 
                            name="escolaridad[comprobante_primaria]"> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-2 text-left"><label class="control-label">SECUNDARIA</label></div>
                <div class="col-md-2 text-center">
                    <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[institucion_secundaria]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->institucion_secundaria: ''}}</textarea>        
                </div>
                <div class="col-md-2 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[domicilio_secundaria]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->domicilio_secundaria: ''}}</textarea> 
                </div>
                <div class="col-md-2 text-center">
                     <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->periodo_secundaria: '' }}" 
                            name="escolaridad[periodo_secundaria]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->anos_secundaria: '' }}" 
                            name="escolaridad[anos_secundaria]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->comprobante_secundaria: '' }}" 
                            name="escolaridad[comprobante_secundaria]"> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-2 text-left"><label class="control-label">TÉCNICA</label></div>
                <div class="col-md-2 text-center">
                    <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[institucion_tecnica]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->institucion_tecnica: ''}}</textarea>        
                </div>
                <div class="col-md-2 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[domicilio_tecnica]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->domicilio_tecnica: ''}}</textarea> 
                </div>
                <div class="col-md-2 text-center">
                     <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->periodo_tecnica: '' }}" 
                            name="escolaridad[periodo_tecnica]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->anos_tecnica: '' }}" 
                            name="escolaridad[anos_tecnica]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->comprobante_tecnica: '' }}" 
                            name="escolaridad[comprobante_tecnica]"> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-2 text-left"><label class="control-label">PREPARATORIA</label></div>
                <div class="col-md-2 text-center">
                    <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[institucion_preparatoria]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->institucion_preparatoria: ''}}</textarea>        
                </div>
                <div class="col-md-2 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[domicilio_preparatoria]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->domicilio_preparatoria: ''}}</textarea> 
                </div>
                <div class="col-md-2 text-center">
                     <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->periodo_preparatoria: '' }}" 
                            name="escolaridad[periodo_preparatoria]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->anos_preparatoria: '' }}" 
                            name="escolaridad[anos_preparatoria]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->comprobante_preparatoria: '' }}" 
                            name="escolaridad[comprobante_preparatoria]"> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-2 text-left"><label class="control-label">PROFESIONAL</label></div>
                <div class="col-md-2 text-center">
                    <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[institucion_profesiona]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->institucion_profesiona: ''}}</textarea>        
                </div>
                <div class="col-md-2 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[domicilio_profesional]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->domicilio_profesional: ''}}</textarea> 
                </div>
                <div class="col-md-2 text-center">
                     <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->periodo_profesional: '' }}" 
                            name="escolaridad[periodo_profesional]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->anos_profesional: '' }}" 
                            name="escolaridad[anos_profesional]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->comprobante_profesional: '' }}" 
                            name="escolaridad[comprobante_profesional]"> 
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="row">
                <div class="col-md-2 text-left"><label class="control-label">OTRO</label></div>
                <div class="col-md-2 text-center">
                    <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[institucion_otro]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->institucion_otro: ''}}</textarea>        
                </div>
                <div class="col-md-2 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[domicilio_otro]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->domicilio_otro: ''}}</textarea> 
                </div>
                <div class="col-md-2 text-center">
                     <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->periodo_otro: '' }}" 
                            name="escolaridad[periodo_otro]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->anos_otro: '' }}" 
                            name="escolaridad[anos_otro]"> 
                </div>
                <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->comprobante_otro: '' }}" 
                            name="escolaridad[comprobante_otro]"> 
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                 <div class="row">
                    <div class="col-md-4 text-right">
                        Si es trunco, ¿Por qué abandonó sus estudios?
                    </div>
                     <div class="col-md-8">
                      
                           <input type="text"  class="form-control" 
                           value="{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->escolaridadmet->si_trunco : '' }}" 
                           name="escolaridad[si_trunco]" 
                           >
                    </div>
                 </div>
                  <div class="row">
                    <div class="col-md-4 text-right">
                        Si es trunco, ¿Por qué abandonó sus estudios?
                    </div>
                     <div class="col-md-8">
                           <input type="text"  class="form-control" 
                           value="{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->escolaridadmet->si_estudiando : '' }}" 
                           name="escolaridad[si_estudiando]" 
                           >
                    </div>
                 </div>
             </div>
            


            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                      OBSERVACIONES 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                      <textarea class="form-control" placeholder="Describir Institución" rows="5" name="escolaridad[escolaridad_observaciones]">{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->escolaridadmet->escolaridad_observaciones: ''}}</textarea> 
                </div>
            </div>
           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>



   
                