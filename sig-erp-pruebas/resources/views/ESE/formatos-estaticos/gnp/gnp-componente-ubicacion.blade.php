
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">UBICACIÓN DEL DOMICILIO</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="ubicacion[id]" value="{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->id : 0 }}">
                  
                 </div>
                
            </div>
            <div class="form-group">
                  <div class="row">
                        <div class="col-md-12 text-center">
                            DESCRIPCIÓN DEL DOMICILIO
                        </div>
                        <div class="col-md-12">
                          <textarea class="form-control" placeholder="Describir Institución" rows="5" name="ubicacion[descripcion_vivienda]"> 
                          {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->ubicacionDomicilio->descripcion_vivienda: '' }}
                          </textarea>
                        </div>
                  </div>
            </div>
            
              <div class="form-group">
                <div class="row">
                <div class="col-md-4 text-right">
                           <label class="control-label">DISTANCIA DE SU CASA AL TRABAJO:</label>
                      </div>
                      <div class="col-md-5  col-md-offset-1 text-left ">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->ubicacionDomicilio->distancia_trabajo: '' }}" 
                            name="ubicacion[distancia_trabajo]"
                            maxlength="250">
                      </div>   
              </div>
           </div>
            <div class="form-group">
                <div class="row">
                <div class="col-md-4 text-right">
                           <label class="control-label">MEDIO DE TRANSPORTE QUE UTILIZA:</label>
                      </div>
                      <div class="col-md-5  col-md-offset-1 text-left ">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->ubicacionDomicilio->medio_transporte: '' }}" 
                            name="ubicacion[medio_transporte]"
                            maxlength="250">
                      </div>   
              </div>
           </div>
                        
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
