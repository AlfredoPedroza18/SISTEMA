
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">DOCUMENTACIÓN</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">

       <input type="hidden" name="RoaDocumentacion[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
   
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-center">DOCUMENTO</div>
                  <div class="col-md-7 text-center">No. DE CERTIFICADO</div>
                  <div class="col-md-2 text-center">COPIA / ORIGINA</div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">ACTA DE NACIMIENTO</label></div>
                  <div class="col-md-7">
                       <div class="row">
                       <div class="col-md-1 text-left"><label class="control-label">Acta:</label></div>
                            <div class="col-md-2 text-center">
                                <input  type="number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="5" min="1" max="99999999999999999999" 
                                class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->acta_acta : '' }}" 
                                name="RoaDocumentacion[acta_acta]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Año:</label></div>
                            <div class="col-md-2 text-center">
                                <input  type="number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="4" min="1" max="99999999999999999999" 
                                class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->acta_ano : '' }}" 
                                name="RoaDocumentacion[acta_ano]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Libro:</label></div>
                            <div class="col-md-2 text-center">
                              <input  type="text" 
                              class="form-control" 
                               value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->acta_libro : '' }}" 
                              name="RoaDocumentacion[acta_libro]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Número:</label></div>
                             <div class="col-md-2 text-center">
                                <input  type="number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="20" min="1" max="99999999999999999999" 
                                class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->acta_oficialia : '' }}" 
                                name="RoaDocumentacion[acta_oficialia]">
                            </div>
                          
                       </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->acta_cotejo : '' }}" 
                            name="RoaDocumentacion[acta_cotejo]">
                  </div>
          </div>
        </div>  
        <div class="form-group">
            <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">INE (VIGENTE)</label></div>
                  <div class="col-md-7">
                 
                      <div class="row">
                          <div class="col-md-1 text-right"><label class="control-label">Clave:</label></div>
                          <div class="col-md-5">
                             <input  type="text"
                              maxlength="30"  
                              class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->elector_clave: '' }}" 
                            name="RoaDocumentacion[elector_clave]">
                          </div>
                          <div class="col-md-1 text-left"><label class="control-label">Número:</label></div>
                          <div class="col-md-5">
                             <input  type="number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="15" min="1" max="99999999999999999999" 
                                class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->elector_numero : '' }}" 
                                name="RoaDocumentacion[elector_numero]">
                          </div>
                     </div>
                      <div class="row">
                          <div class="col-md-3 text-left"><label class="control-label">Coincide con dirección actual:</label></div>
                          <div class="col-md-9">
                  <select class="form-control" name="RoaDocumentacion[elector_coincide_direccion]">
                  <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->documentacionRoa->elector_coincide_direccion == '1' ) selected="selected" @endif @endif>SI</option>
                  <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->documentacionRoa->elector_coincide_direccion == '2' ) selected="selected" @endif @endif>NO</option>
                  </select>
                         </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3 text-right"><label class="control-label">Dirección:</label></div>
                          <div class="col-md-9">
                           <input  type="text"
                              maxlength="255"  
                              class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->elector_direccion: '' }}" 
                            name="RoaDocumentacion[elector_direccion]">
                          </div>
                    </div>
              </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->elector_cotejo : '' }}" 
                            name="RoaDocumentacion[elector_cotejo]">
                  </div>
          </div>
       </div>
               <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">CURP</label></div>
                  <div class="col-md-7">
                      <div class="row">
                         
                          <div class="col-md-12">
                              <input  type="text"
                               maxlength="18"   
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->curp: '' }}" 
                            name="RoaDocumentacion[curp]">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->curp_cotejo : '' }}" 
                            name="RoaDocumentacion[curp_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">RFC</label></div>
                  <div class="col-md-7">
                       <input  type="text"
                              maxlength="13" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->rfc : '' }}" 
                              name="RoaDocumentacion[rfc]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="150"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->rfc_cotejo: '' }}" 
                            name="RoaDocumentacion[rfc_cotejo]">
                  </div>
                </div>
            </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">AFORE</label></div>
                  <div class="col-md-7">
                      <div class="row">
                         <div class="col-md-2 text-left"><label class="control-label">Número:</label></div>
                         <div class="col-md-4">
                           <input  type="number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="15" min="1" max="99999999999999999999" 
                                class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->afore_numero : '' }}" 
                                name="RoaDocumentacion[afore_numero]">
                          </div>
                          <div class="col-md-2 text-left"><label class="control-label">Institución:</label></div>
                         <div class="col-md-4">
                           <input  type="text"
                                  maxlength="255" 
                                  class="form-control" 
                                  value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->afore_institucion : '' }}" 
                                  name="RoaDocumentacion[afore_institucion]">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->afore_cotejo: '' }}" 
                            name="RoaDocumentacion[afore_cotejo]">
                  </div>
                </div>
            </div>
               <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">IMSS</label></div>
                  <div class="col-md-7">
                       <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="20" min="1" max="99999999999999999999" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->imss : '' }}" 
                            name="RoaDocumentacion[imss]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->imss_cotejo : '' }}" 
                            name="RoaDocumentacion[imss_cotejo]">
                  </div>
                </div>
            </div>
               <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">COMPROBANTE DE ESTUDIOS</label></div>

                  <div class="col-md-7">
                    <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Institución:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_institucion : '' }}" 
                            name="RoaDocumentacion[compr_estudios_institucion]">
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-2 text-left"><label class="control-label">Documento:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_documento : '' }}" 
                            name="RoaDocumentacion[compr_estudios_documento]">
                        </div>
                  
                     <div class="col-md-2 text-left"><label class="control-label">Folio:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->compr_estudios_folio : '' }}" 
                            name="RoaDocumentacion[compr_estudios_folio]">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-left"><label class="control-label">Grado:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_grado : '' }}" 
                            name="RoaDocumentacion[compr_estudios_grado]">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-2 text-left"><label class="control-label">Licenciatura:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_licenciatura : '' }}" 
                            name="RoaDocumentacion[compr_estudios_licenciatura]">
                        </div>
                    </div>

                  </div>



                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_institucion_cotejo : '' }}" 
                            name="RoaDocumentacion[compr_estudios_institucion_cotejo]">
                  </div>
                </div>
            </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">COMPROBANTE DE DOMICILIO</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Titular:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_domicilio_titular : '' }}" 
                            name="RoaDocumentacion[compr_domicilio_titular]">
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Servicio y Fecha:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_domicilio_servicio : '' }}" 
                            name="RoaDocumentacion[compr_domicilio_servicio]">
                        </div>
                    </div>
                  </div>

                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->compr_domicilio_servicio_cotejo : '' }}" 
                            name="RoaDocumentacion[compr_domicilio_servicio_cotejo]">
                  </div>
              </div>
            </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">LICENCIA DE MANEJO</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Tipo:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->licencia_tipo : '' }}" 
                            name="RoaDocumentacion[licencia_tipo]">
                        </div>
                        <div class="col-md-2 text-left"><label class="control-label">Número y vigencia:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->licencia_vigencia : '' }}" 
                            name="RoaDocumentacion[licencia_vigencia]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->licencia_vigencia_cotejo : '' }}" 
                            name="RoaDocumentacion[licencia_vigencia_cotejo]">
                  </div>
              </div>
            </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">CEDULA</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Número:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->cedula_numero : '' }}" 
                            name="RoaDocumentacion[cedula_numero]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->cedula_numero_cotejo : '' }}" 
                            name="RoaDocumentacion[cedula_numero_cotejo]">
                  </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">PASAPORTE</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Número:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->pasaporte_numero : '' }}" 
                            name="RoaDocumentacion[pasaporte_numero]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->pasaporte_cotejo : '' }}" 
                            name="RoaDocumentacion[pasaporte_cotejo]">
                  </div>
              </div>
            </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">CRÉDITO  DE INFONAVIT</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Número:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->creditoinfo_numero : '' }}" 
                            name="RoaDocumentacion[creditoinfo_numero]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->creditoinfo_cotejo : '' }}" 
                            name="RoaDocumentacion[creditoinfo_cotejo]">
                  </div>
              </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">CRÉDITO DE FONACOT</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Número:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->creditofonacot_numero : '' }}" 
                            name="RoaDocumentacion[creditofonacot_numero]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->creditofonacot_cotejo : '' }}" 
                            name="RoaDocumentacion[creditofonacot_cotejo]">
                  </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">CARTILLA SERVICIO MILITAR NACIONAL</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Matricula:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->cartilla_matricula : '' }}" 
                            name="RoaDocumentacion[cartilla_matricula]">
                        </div>
                        <div class="col-md-2 text-left"><label class="control-label">Liberación:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->cartilla_liberacion : '' }}" 
                            name="RoaDocumentacion[cartilla_liberacion]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->cartilla_cotejo : '' }}" 
                            name="RoaDocumentacion[cartilla_cotejo]">
                  </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">ACTA DE MATRIMONIO</label></div>

                  <div class="col-md-7">
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Juzgado:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_juzgado : '' }}" 
                            name="RoaDocumentacion[acta_matrimonio_juzgado]">
                        </div>
                        <div class="col-md-2 text-left"><label class="control-label">Número:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_numero : '' }}" 
                            name="RoaDocumentacion[acta_matrimonio_numero]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_cotejo : '' }}" 
                            name="RoaDocumentacion[acta_matrimonio_cotejo]">
                  </div>
              </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-3 text-left"><label class="control-label">ULTIMO RECIBO DE PERCEPCIONES</label></div>

                  <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-2 text-left"><label class="control-label">Empresa:</label></div>
                        <div class="col-md-10">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_empresa : '' }}" 
                            name="RoaDocumentacion[ultimo_recibo_empresa]">
                        </div>
                        
                      </div>
                     <div class="row">
                     <div class="col-md-2 text-left"><label class="control-label">Puesto:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_puesto : '' }}" 
                            name="RoaDocumentacion[ultimo_recibo_puesto]">
                        </div>
                        <div class="col-md-2 text-left"><label class="control-label">Ingreso:</label></div>
                        <div class="col-md-4">
                            <input  type="text"
                            maxlength="255" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_ingreso : '' }}" 
                            name="RoaDocumentacion[ultimo_recibo_ingreso]">
                        </div>
                    </div>
                    </div>
                    
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_cotejo : '' }}" 
                            name="RoaDocumentacion[ultimo_recibo_cotejo]">
                  </div>
              </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-12 text-center"><label class="control-label">OBSERVACIONES</label></div>
               </div>
               <div class="row">
               <div class="col-md-12 text-center">
                    <textarea class="form-control" placeholder="Observaciones documentación" rows="5" name="RoaDocumentacion[documentacion_observaciones]">{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->documentacion_observaciones : '' }}</textarea>
                  </div>
               </div>

            </div>








        {{--
        
          
             <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">CURP Ó CARTA DE NATURALIZACIÓN</label></div>
                  <div class="col-md-5">
                       <input  type="text" 
                            max="20" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->curp : '' }}" 
                            name="RoaDocumentacion[curp]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->curp_cotejo : '' }}" 
                            name="RoaDocumentacion[curp_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">COMPROBANTE DE DOMICILIO</label></div>
                  <div class="col-md-5">
                      <div class="row">
                          <div class="col-md-1" text-left"><label class="control-label">Serv.:</label></div>
                          <div class="col-md-3">
                             <input  type="text"
                             maxlength="150"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->comprobante_servicio : '' }}" 
                            name="RoaDocumentacion[comprobante_servicio]">
                          </div>
                          <div class="col-md-1" text-left"><label class="control-label">Fecha:</label></div>
                          <div class="col-md-3">
                              <input  type="text"
                               maxlength="100"   
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->comprobante_fecha : '' }}" 
                            name="RoaDocumentacion[comprobante_fecha]">
                          </div>
                          <div class="col-md-1" text-left"><label class="control-label">Titular:</label></div>
                          <div class="col-md-3">
                             <input  type="text"
                             maxlength="100"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->comprobante_titular : '' }}" 
                            name="RoaDocumentacion[comprobante_titular]">
                          </div>

                      </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                            maxlength="250" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->comprobante_cotejo : '' }}" 
                            name="RoaDocumentacion[comprobante_cotejo]">
                  </div>
                </div>
            </div>
         
         
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">CARTAS DE RECOMENDACIÓN (2)</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="255" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->carta : '' }}" 
                              name="RoaDocumentacion[carta]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->carta_cotejo : '' }}" 
                            name="RoaDocumentacion[carta_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">RECIBOS DE NÓMINA (3 ÚLTIMOS)</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="100" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->recibo_nomina : '' }}" 
                              name="RoaDocumentacion[recibo_nomina]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->recibo_nomina_cotejo: '' }}" 
                            name="RoaDocumentacion[recibo_nomina_cotejo]">
                  </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">CONSTANCIA DE ESTUDIOS</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="150" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->constancia_estudios : '' }}" 
                              name="RoaDocumentacion[constancia_estudios]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="150"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->constancia_estudios_cotejo : '' }}" 
                            name="RoaDocumentacion[constancia_estudios_cotejo]">
                  </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">ACTA DE MATRIMONIO</label></div>
                  <div class="col-md-5">
                       <div class="row">
                            <div class="col-md-1 text-left"><label class="control-label">Acta:</label></div>
                            <div class="col-md-3 text-center">
                                <input  type="text"
                                 maxlength="50" 
                                 class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_acta : '' }}" 
                                name="RoaDocumentacion[acta_matrimonio_acta]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Foja:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                               maxlength="50"  
                              class="form-control" 
                               value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_foja : '' }}" 
                              name="RoaDocumentacion[acta_matrimonio_foja]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Libro:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                              maxlength="50"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_libro : '' }}" 
                            name="RoaDocumentacion[acta_matrimonio_libro]">
                            </div>
                       </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_cotejo : '' }}" 
                            name="RoaDocumentacion[acta_matrimonio_cotejo]">
                  </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">ACTA DE NACIMIENTO DE CÓNYUGE</label></div>
                  <div class="col-md-5">
                       <div class="row">
                            <div class="col-md-1 text-left"><label class="control-label">Año:</label></div>
                            <div class="col-md-3 text-center">
                                <input  type="text"
                                 maxlength="50" 
                                 class="form-control" 
                                 value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_nac_conyugue_ano : '' }}" 
                                name="RoaDocumentacion[acta_nac_conyugue_ano]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Foja:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                               maxlength="50"  
                              class="form-control" 
                               value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_nac_conyugue_foja : '' }}" 
                              name="RoaDocumentacion[acta_nac_conyugue_foja]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Libro:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                              maxlength="50"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_nac_conyugue_libro: '' }}" 
                            name="RoaDocumentacion[acta_nac_conyugue_libro]">
                            </div>
                       </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_nac_conyugue_cotejo : '' }}" 
                            name="RoaDocumentacion[acta_nac_conyugue_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">ACTA DE NACIMIENTO DE HIJOS</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="255" 
                              placeholder="Libro:10 Acta:1988 Libro:10 Acta:1988 Libro:10 Acta:1988" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_nac_hijos : '' }}" 
                              name="RoaDocumentacion[acta_nac_hijos]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->acta_nac_hijos_cotejo: '' }}" 
                            name="RoaDocumentacion[acta_nac_hijos_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">BURO DE CRÉDITO</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="255" 
                              placeholder="" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->buro_credito: '' }}" 
                              name="RoaDocumentacion[buro_credito]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->buro_credito_cotejo : '' }}" 
                            name="RoaDocumentacion[buro_credito_cotejo]">
                  </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-12 text-center"><label class="control-label">OBSERVACIONES</label></div>
               </div>
               <div class="row">
               <div class="col-md-12 text-center">
                    <textarea class="form-control" placeholder="Observaciones documentación" rows="5" name="RoaDocumentacion[documentacion_observaciones]">{{ isset($estudio->formatoRoa) ?$estudio->formatoRoa->documentacionRoa->documentacion_observaciones : '' }}</textarea>
                  </div>
               </div>

            </div>
--}}

           
  </div><!--edn formulario horizontal -->
  </div>
</div>
