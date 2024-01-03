
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">INFORMACION DE LA VIVIENDA</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="infvivienda[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                  
                 </div>
                
            </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-2 col-md-offset-1 text-center">TIPO DE VIVIENDA</div>
                      <div class="col-md-2 text-center">TIPO DE PROPIEDAD</div>
                      <div class="col-md-2 text-center">SERVICIOS</div>
                      <div class="col-md-2 text-center">DISTRIBUCIÓN</div>
                      <div class="col-md-2 text-center">NIVEL ECONMICO</div>
                     
                </div>
                
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_propia: '' }}" 
                            name="infvivienda[vivienda_propia]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">PROPIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_sola: '' }}" 
                            name="infvivienda[propiedad_sola]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SOLA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->servicio_luz: '' }}" 
                            name="infvivienda[servicio_luz]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">LUZ</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_sala: '' }}" 
                            name="infvivienda[distribucion_sala]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SALA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->economico_alto: '' }}" 
                            name="infvivienda[economico_alto]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">ALTO</label>
                      </div>

                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_rentada: '' }}" 
                            name="infvivienda[vivienda_rentada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">RENTADA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_duplex: '' }}" 
                            name="infvivienda[propiedad_duplex]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">DUPLEX</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->servicio_agua: '' }}" 
                            name="infvivienda[servicio_agua]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">AGUA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_comedor: '' }}" 
                            name="infvivienda[distribucion_comedor]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">COMEDOR</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->economico_malto: '' }}" 
                            name="infvivienda[economico_malto]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">MEDIO ALTO</label>
                      </div>

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_hipoteca: '' }}" 
                            name="infvivienda[vivienda_hipoteca]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">HIPOTECA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_huespedes: '' }}" 
                            name="infvivienda[propiedad_huespedes]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">HUÉSPEDES</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->servicio_pavimentacion: '' }}" 
                            name="infvivienda[servicio_pavimentacion]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">PAVIMENTACION</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_recamara: '' }}" 
                            name="infvivienda[distribucion_recamara]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">RECAMARA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->economico_medio: '' }}" 
                            name="infvivienda[economico_medio]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">MEDIO</label>
                      </div>
                    </div>
                </div> 
               <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_congelada: '' }}" 
                            name="infvivienda[vivienda_congelada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">CONGELADA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_depto: '' }}" 
                            name="infvivienda[propiedad_depto]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">DEPTO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->servicio_drenaje: '' }}" 
                            name="infvivienda[servicio_drenaje]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">DRENAJE</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_cocina: '' }}" 
                            name="infvivienda[distribucion_cocina]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">COCINA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->economico_mediobajo: '' }}" 
                            name="infvivienda[economico_mediobajo]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">MEDIO BAJO</label>
                      </div>
                </div>
              </div> 
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_prestada: '' }}" 
                            name="infvivienda[vivienda_prestada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">PRESTADA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_condominio: '' }}" 
                            name="infvivienda[propiedad_condominio]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">CONDOMINIO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->ervicio_telefono: '' }}" 
                            name="infvivienda[ervicio_telefono]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">TELÉFONO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_bano: '' }}" 
                            name="infvivienda[distribucion_bano]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BAÑO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->economico_bajo: '' }}" 
                            name="infvivienda[economico_bajo]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">BAJO</label>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_padres: '' }}" 
                            name="infvivienda[vivienda_padres]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">PADRES</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_vecindad: '' }}" 
                            name="infvivienda[propiedad_vecindad]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">VECINDAD</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->servicio_refrigerador: '' }}" 
                            name="infvivienda[servicio_refrigerador]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">REFRIGERADOR</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_garaje: '' }}" 
                            name="infvivienda[distribucion_garaje]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">GARAJE</label>
                      </div>
                      
                </div>
              </div>
               <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->vivienda_otro: '' }}" 
                            name="infvivienda[vivienda_otro]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">OTRO</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->propiedad_otro: '' }}" 
                            name="infvivienda[propiedad_otro]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">OTRO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->servicio_boiler: '' }}" 
                            name="infvivienda[servicio_boiler]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BOILER</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->distribucion_biblioteca: '' }}" 
                            name="infvivienda[distribucion_biblioteca]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BIBLIOTECA</label>
                      </div>
                      
                </div>
              </div> 
               <div class="form-group">
                <div class="row">
                   <div class="col-md-3">
                    <label class="lable-control">¿Cuántas personas viven en el domicilio?</label>
                    </div>
                    <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->personas_viven: '' }}" 
                            name="infvivienda[personas_viven]"
                            maxlength="40">
                    </div>
                </div>

              </div>

          
          
              
             
           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
