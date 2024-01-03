
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
                <div class="col-md-4">
                    <input type="hidden" name="datos_generales[id]" value="{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->id : 0 }}">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
                            name="datos_generales[nombre_general]">
                 </div>
                <label class="col-md-2 control-label">SEXO: </label>
                <div class="col-md-3">
                         <select class="form-control" name="datos_generales[sexo]">
                            <option value="1" @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->sexo == '1' ) selected="selected" @endif @endif>FEMENINNO</option>
                            <option value="2" @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->sexo == '2' ) selected="selected" @endif @endif>MASCULINO</option>
                                        
                    </select>

                 </div>
            </div>
              <div class="form-group">
                <label class="col-md-2 control-label">EDAD: </label>
                <div class="col-md-2">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->edad: '' }}" 
                            name="datos_generales[edad]" maxlength="10">
                 </div>
                  <div class="col-md-2 text-right"> <label class="control-label">FECHA  DE NAC: </label></div>
                  <div class="col-md-2">
                            <input  type="date" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->fecha_nac : '' }}" 
                            name="datos_generales[fecha_nac]" maxlength="10"> 
                  </div>
                  <div class="col-md-2 text-right"> <label class="control-label">LUGAR DE NAC. : </label></div>
                  <div class="col-md-2">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->lugar_nac : '' }}" 
                            name="datos_generales[lugar_nac]" maxlength="255"> 
                  </div>
          
               
            </div>
            <div class="form-group">
                   <div class="col-md-2 text-right"><label class="control-label">  NACIONALIDAD : </label></div>
                   <div class="col-md-2">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->nacionalidad : '' }}" 
                            name="datos_generales[nacionalidad]" maxlength="255"> 
                   </div>
                   <label class="col-md-2 control-label">ESTADO CIVIL: </label>
                <div class="col-md-2">
                         <select class="form-control" name="datos_generales[edo_civil]">
                             <option value="1" @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '1' ) selected="selected" @endif @endif>SOLTERO</option>
                             <option value="2" @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '2' ) selected="selected" @endif @endif>CASADO</option>
                             <option value="3" @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '3' ) selected="selected" @endif @endif>VIUDO</option>
                             <option value="4" @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '4' ) selected="selected" @endif @endif>DIVORCIADO</option>
                                        
                    </select>
                 </div>
                  <div class="col-md-2 text-right"> <label class="control-label">FECHA  DE MATRIMONIO: </label></div>
                  <div class="col-md-2">
                            <input  type="date" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->fecha_matrimonio : '' }}" 
                            name="datos_generales[fecha_matrimonio]" maxlength="10"> 
                  </div>
          </div>
            <div class="form-group">
                <label class="col-md-2 control-label">CALLE: </label>
                <div class="col-md-10">
                      <input type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->calle : ''}}" 
                            name="datos_generales[calle]" maxlength="250">
                 </div>
                
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-2 text-right"> <label class="control-label">N°.EXTERIOR: </label></div>
                  <div class="col-md-2">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->num_ext: '' }}" 
                            name="datos_generales[num_ext]" maxlength="20"> 
                  </div>
                  <div class="col-md-2 text-right"> <label class="control-label">N°.INTERIOR: </label></div>
                  <div class="col-md-2">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->num_int: '' }}" 
                            name="datos_generales[num_int]" maxlength="20"> 
                  </div>
                   <div class="col-md-2 text-right"> <label class="control-label">DELEGACIÓN/MUNICIPIO:</label></div>
                  <div class="col-md-2">
                            <input  type="text" 
                             class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->municipio : '' }}" 
                            name="datos_generales[municipio]" maxlength="255"> 
                  </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="row">
                  <div class="col-md-2 text-right"> <label class="control-label">COLONIA: </label></div>
                  <div class="col-md-2">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->colonia : '' }}" 
                            name="datos_generales[colonia]"> 
                  </div>
                   <div class="col-md-2 text-right"> <label class="control-label">EMAIL: </label></div>
                  <div class="col-md-2">
                            <input  type="email" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->email : '' }}" 
                            name="datos_generales[email]" maxlength="200" multiple="multiple"> 
                  </div>
                  <div class="col-md-2 text-right"> <label class="control-label">TELÉFONO: </label></div>
                  <div class="col-md-2">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="form-control" 
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->telefono : '' }}" 
                            name="datos_generales[telefono]"
                            maxlength="15" min="1" max="99999999999999999999" > 
                  </div> 
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2 text-right"> <label class="control-label">C.P. </label></div>
                  <div class="col-md-2">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->cp : '' }}" 
                            name="datos_generales[cp]"
                            maxlength="5" min="1" max="99999999999999999999" > 
                  </div>

                  <div class="col-md-2 text-right"> <label class="control-label">TIEMPO EN EL DOMICILIO: </label></div>
                  <div class="col-md-2">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->tiempo_domicilio : '' }}" 
                            name="datos_generales[tiempo_domicilio]"> 
                </div>
                  <div class="col-md-2 text-right"> <label class="control-label">CELULAR: </label></div>
                  <div class="col-md-2">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->celular : '' }}" 
                            name="datos_generales[celular]"
                            maxlength="15" min="1" max="99999999999999999999" > 
                  </div>
              </div>
          </div>
           <div class="form-group">
                <div class="row">     
                  <div class="col-md-2 text-right"> <label class="control-label">PUESTO: </label></div>
                  <div class="col-md-6">
                            <input  type="text" 
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->puesto : '' }}" 
                            name="datos_generales[puesto]"> 
                  </div>
                   <div class="col-md-2 text-right"> <label class="control-label">TELÉFONO RECADOS: </label></div>
                  <div class="col-md-2">
                            <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->telefono_recados : '' }}" 
                            name="datos_generales[telefono_recados]"
                            maxlength="15" min="1" max="99999999999999999999" > 
                  </div>


                </div>
          </div>
          <div class="form-group">
             <div class="row">
                  <div class="col-md-4 text-right"> <label class="control-label">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</label></div>
                  <div class="col-md-8">
                            <input  type="text"
                            class="form-control" 
                             value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->datosGenerales->entre_calles : '' }}" 
                            name="datos_generales[entre_calles]"> 
                  </div>
            </div>

          </div>
           <div class="row">
                        <div class="col-md-4 text-right"><label class="control-label">OBSERVACIONES</label></div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 text-center">
                              <textarea class="form-control" placeholder="Comentarios " rows="5"   name="datos_generales[observaciones_doc_general]">{{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->datosGenerales->observaciones_doc_general:'' }}</textarea>
                        </div>
                    </div>

          
  </div><!--edn formulario horizontal -->
  </div>
</div>
