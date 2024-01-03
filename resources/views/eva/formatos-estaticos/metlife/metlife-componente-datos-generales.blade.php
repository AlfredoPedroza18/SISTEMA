
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">DATOS GENERALES</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <label class="col-md-3 control-label">NOMBRE DEL CANDIDATO: </label>
                <div class="col-md-9">
                    <input type="hidden" name="datos_generales[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
                            name="datos_generales[nombre_general]">
                 </div>
                
            </div>
             <div class="form-group">
                <label class="col-md-3 control-label">DOMICILIO: </label>
                <div class="col-md-9">
                      <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->domicilio : ''}}" 
                            name="datos_generales[domicilio]">
                 </div>
                
            </div>
            <div class="row">
                  <div class="col-md-1 text-right"> <label class="control-label">N°. INT/EXT: </label></div>
                  <div class="col-md-3">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->num_int_ext: '' }}" 
                            name="datos_generales[num_int_ext]"> 
                  </div>
          
        
                  <div class="col-md-1 text-right"> <label class="control-label">LUGAR DE NAC. : </label></div>
                  <div class="col-md-3">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->lugar_nac : '' }}" 
                            name="datos_generales[lugar_nac]"> 
                  </div>
          
          
                  <div class="col-md-1 text-right"><label class="control-label">  NACIONALIDAD : </label></div>
                  <div class="col-md-3">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->nacionalidad : '' }}" 
                            name="datos_generales[nacionalidad]"> 
                  </div>
            </div>
             <div class="row">
                  <div class="col-md-1 text-right"> <label class="control-label">COLONIA: </label></div>
                  <div class="col-md-3">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->colonia : '' }}" 
                            name="datos_generales[colonia]"> 
                  </div>
          
        
                  <div class="col-md-1 text-right"> <label class="control-label">FECHA  DE NAC: </label></div>
                  <div class="col-md-3">
                            <input  type="date" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->fecha_nac : '' }}" 
                            name="datos_generales[fecha_nac]"> 
                  </div>
          
          
                  <div class="col-md-1 text-right"> <label class="control-label">PUESTO: </label></div>
                  <div class="col-md-3">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->puesto : '' }}" 
                            name="datos_generales[puesto]"> 
                  </div>
            </div>
               <div class="row">
                  <div class="col-md-1 text-right"> <label class="control-label">C.P. </label></div>
                  <div class="col-md-3">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->cp : '' }}" 
                            name="datos_generales[cp]"
                            maxlength="5" min="1" max="99999999999999999999" > 
                  </div>
          
        
                  <div class="col-md-1 text-right"> <label class="control-label">TIEMPO EN EL DOMICILIO: </label></div>
                  <div class="col-md-3">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->tiem_dom : '' }}" 
                            name="datos_generales[tiem_dom]"> 
                  </div>
          
          
                  <div class="col-md-1 text-right"> <label class="control-label">CELULAR: </label></div>
                  <div class="col-md-3">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->celular : '' }}" 
                            name="datos_generales[celular]"
                            maxlength="13" min="1" max="99999999999999999999" > 
                  </div>
            </div>
             <div class="row">
                  <div class="col-md-1 text-right"> <label class="control-label">MUNICIPIO:</label></div>
                  <div class="col-md-7">
                            <input  type="text" 
                             class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->municipio : '' }}" 
                            name="datos_generales[municipio]"> 
                  </div>
          
        
                  <div class="col-md-1 text-right"> <label class="control-label">TELÉFONO: </label></div>
                  <div class="col-md-3">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->telefono : '' }}" 
                            name="datos_generales[telefono]"
                            maxlength="13" min="1" max="99999999999999999999" > 
                  </div>                
            </div>
            <div class="row">
                  <div class="col-md-4 text-right"> <label class="control-label">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</label></div>
                  <div class="col-md-8">
                            <input  type="text"
                            class="form-control" 
                             value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->datosGenerales->entre_calles : '' }}" 
                            name="datos_generales[entre_calles]"> 
                  </div>
            </div>
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
