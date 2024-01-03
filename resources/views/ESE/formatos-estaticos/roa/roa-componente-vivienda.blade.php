
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
                    <input type="hidden" name="infvivienda[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
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
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_propia: '' }}" 
                            name="infvivienda[vivienda_propia]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">PROPIA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_casa: '' }}" 
                            name="infvivienda[inmueble_casa]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">CASA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_luz: '' }}" 
                            name="infvivienda[servicios_luz]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">LUZ</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_sala: '' }}" 
                            name="infvivienda[distribucion_sala]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SALA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_jardín: '' }}" 
                            name="infvivienda[distribucion_jardín]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label">JARDIN</label>
                      </div>

                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_rentada: '' }}" 
                            name="infvivienda[vivienda_rentada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">RENTADA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_departamento: '' }}" 
                            name="infvivienda[inmueble_departamento]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">DEPARTAMENTO/label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_agua: '' }}" 
                            name="infvivienda[servicios_agua]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">AGUA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_comedor: '' }}" 
                            name="infvivienda[distribucion_comedor]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">COMEDOR</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_zotehuela: '' }}" 
                            name="infvivienda[distribucion_zotehuela]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">ZOTEHUELA</label>
                      </div>

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_hipotecada: '' }}" 
                            name="infvivienda[vivienda_hipotecada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">HIPOTECA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_duplex: '' }}" 
                            name="infvivienda[inmueble_duplex]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">DUPLEX</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_pavimentacion: '' }}" 
                            name="infvivienda[servicios_pavimentacion]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">PAVIMENTACION</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_recamara: '' }}" 
                            name="infvivienda[distribucion_recamara]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">RECAMARA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_patio: '' }}" 
                            name="infvivienda[distribucion_patio]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">PATIO</label>
                      </div>
                    </div>
                </div> 
               <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_congelada: '' }}" 
                            name="infvivienda[vivienda_congelada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">CONGELADA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_condominio: '' }}" 
                            name="infvivienda[inmueble_condominio]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">CONDOMINIO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_drenaje: '' }}" 
                            name="infvivienda[servicios_drenaje]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">DRENAJE</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_cocina: '' }}" 
                            name="infvivienda[distribucion_cocina]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">COCINA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_estudio: '' }}" 
                            name="infvivienda[distribucion_estudio]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">ESTUDIO</label>
                      </div>
                </div>
              </div> 
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_prestada: '' }}" 
                            name="infvivienda[vivienda_prestada]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">PRESTADA</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_vecindad: '' }}" 
                            name="infvivienda[inmueble_vecindad]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">VECINDAD</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_telefono: '' }}" 
                            name="infvivienda[servicios_telefono]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">TELÉFONO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_bano: '' }}" 
                            name="infvivienda[distribucion_bano]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">BAÑO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_cuarto_de_servicio: '' }}" 
                            name="infvivienda[distribucion_cuarto_de_servicio]"
                            maxlength="5">

                      </div>
                      <div class="col-md-1 text-left">
                           <label class="control-label text-left">CUARTO DE SERVICIO</label>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-1  col-md-offset-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_padres: '' }}" 
                            name="infvivienda[vivienda_padres]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">PADRES</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_cuarto: '' }}" 
                            name="infvivienda[inmueble_cuarto]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">CUARTO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_seg_publica: '' }}" 
                            name="infvivienda[servicios_seg_publica]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">SEG. PÚBLICA</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_garaje: '' }}" 
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
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->vivienda_otro: '' }}" 
                            name="infvivienda[vivienda_otro]"
                            maxlength="5">
                      </div>
                        <div class="col-md-1 text-left">
                           <label class="control-label">OTRO</label>
                      </div>
                      <div class="col-md-1 text-center">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->inmueble_otro: '' }}" 
                            name="infvivienda[inmueble_otro]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">OTRO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->servicios_alumbrado: '' }}" 
                            name="infvivienda[servicios_alumbrado]"
                            maxlength="5">
                      </div>
                       <div class="col-md-1 text-left">
                           <label class="control-label">ALUMBRADO</label>
                      </div>
                      <div class="col-md-1 text-center">
                        <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->distribucion_biblioteca: '' }}" 
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
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->vivienda->personas_viven: '' }}" 
                            name="infvivienda[personas_viven]"
                            maxlength="40">
                    </div>
                </div>

              </div>

          
          
              
             
           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
