
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">BIENES</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="bien[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
                 </div>
                
            </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-center">ACTIVOS</div>
                      <div class="col-md-1 text-center"></div>
                      <div class="col-md-3 text-center">TIPO</div>
                      <div class="col-md-1 text-center">VALOR</div>
                      <div class="col-md-1 text-center">PAGADO</div>
                     
                </div>
                
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-center">
                         <label class="form-control">PROPIEDADES DEL CANDIDATO</label>
                      </div>
                       <div class="col-md-1 text-center">
                          <select class="form-control" name="bien[propiedad_candidato]">
                            <option value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->propiedad_candidato == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->propiedad_candidato == '2' ) selected="selected" @endif @endif>NO</option>
                          </select>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->propiedad_tipo: '' }}" 
                            name="bien[propiedad_tipo]">
                      </div>
                       <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->propiedad_valor: '' }}" 
                            name="bien[propiedad_valor]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                      <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->propiedad_pagado: '' }}" 
                            name="bien[propiedad_pagado]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                      

                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-center">
                         <label class="form-control">CREDITO O HIPOTECA</label>
                      </div>
                       <div class="col-md-1 text-center">
                          <select class="form-control" name="bien[credito]">
                            <option value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->credito == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->credito == '2' ) selected="selected" @endif @endif>NO</option>
                          </select>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->credito_tipo: '' }}" 
                            name="bien[credito_tipo]">
                      </div>
                       <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->credito_valor: '' }}" 
                            name="bien[credito_valor]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                      <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->credito_pagado: '' }}" 
                            name="bien[credito_pagado]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                    

                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-center">
                         <label class="form-control">INVERSIONES/ AHORROS</label>
                      </div>
                       <div class="col-md-1 text-center">
                          <select class="form-control" name="bien[inversiones]">
                            <option value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->inversiones == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->inversiones == '2' ) selected="selected" @endif @endif>NO</option>
                          </select>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->inversiones_tipo: '' }}" 
                            name="bien[inversiones_tipo]">
                      </div>
                       <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->inversiones_valor: '' }}" 
                            name="bien[inversiones_valor]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                      <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->inversiones_pagado: '' }}" 
                            name="bien[inversiones_pagado]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                     

                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-center">
                         <label class="form-control">AUTOMOVILES </label>
                      </div>
                       <div class="col-md-1 text-center">
                          <select class="form-control" name="bien[automoviles]">
                            <option value="1" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->automoviles == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoRoa) @if( $estudio->formatoRoa->bienes->automoviles == '2' ) selected="selected" @endif @endif>NO</option>
                          </select>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->automoviles_tipo: '' }}" 
                            name="bien[automoviles_tipo]">
                      </div>
                       <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->automoviles_valor: '' }}" 
                            name="bien[automoviles_valor]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                      <div class="col-md-1 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->automoviles_pagado: '' }}" 
                            name="bien[automoviles_pagado]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" 
                            maxlength="15" 
                            >
                      </div>
                     

                </div> 
             </div>
             <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                        UBICACIÓN DE LAS PROPIEDADES
                        </div>
                        <div class="col-md-12">
                           <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->ubicacion_propipedad : ''}}" 
                            name="bien[ubicacion_propipedad]"
                            >
                        </div>
                    </div>
               </div>
             
           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
