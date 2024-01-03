
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
        
       <input type="hidden" name="documentacion[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-center">DOCUMENTO</div>
                  <div class="col-md-5 text-center">No. DE CERTIFICADO</div>
                  <div class="col-md-2 text-center">COPIA / ORIGINA</div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">ACTA DE NACIMIENTO</label></div>
                  <div class="col-md-5">
                       <div class="row">
                            <div class="col-md-1 text-left"><label class="control-label">Año:</label></div>
                            <div class="col-md-3 text-center">
                                <input  type="number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="4" min="1" max="99999999999999999999" 
                                class="form-control" 
                                 value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_ano : '' }}" 
                                name="documentacion[acta_ano]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Foja:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text" 
                              class="form-control" 
                               value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_foja : '' }}" 
                              name="documentacion[acta_foja]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Libro:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                              maxlength="100"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_libro : '' }}" 
                            name="documentacion[acta_libro]">
                            </div>
                       </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_cotejo : '' }}" 
                            name="documentacion[acta_cotejo]">
                  </div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">FOTOGRAFÍA EN FORMATO ELECTRÓNICO</label></div>
                  <div class="col-md-5">
                       <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->fotografia : '' }}" 
                            name="documentacion[fotografia]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->fotografia_cotejo : '' }}" 
                            name="documentacion[fotografia_cotejo]">
                  </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">IDENTIFICACIÓN OFICIAL VIGENTE</label></div>
                  <div class="col-md-5">
                      <div class="row">
                          <div class="col-md-1" text-left"><label class="control-label">Clave de elector:</label></div>
                          <div class="col-md-5">
                             <input  type="text"
                             maxlength="30"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->elector_clave: '' }}" 
                            name="documentacion[elector_clave]">
                          </div>
                          <div class="col-md-1" text-left"><label class="control-label">OCR:</label></div>
                          <div class="col-md-5">
                              <input  type="text"
                               maxlength="30"   
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->elector_ocr: '' }}" 
                            name="documentacion[elector_ocr]">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->elector_cotejo : '' }}" 
                            name="documentacion[elector_cotejo]">
                  </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">CURP Ó CARTA DE NATURALIZACIÓN</label></div>
                  <div class="col-md-5">
                       <input  type="text" 
                            max="20" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->curp : '' }}" 
                            name="documentacion[curp]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->curp_cotejo : '' }}" 
                            name="documentacion[curp_cotejo]">
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
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->comprobante_servicio : '' }}" 
                            name="documentacion[comprobante_servicio]">
                          </div>
                          <div class="col-md-1" text-left"><label class="control-label">Fecha:</label></div>
                          <div class="col-md-3">
                              <input  type="text"
                               maxlength="100"   
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->comprobante_fecha : '' }}" 
                            name="documentacion[comprobante_fecha]">
                          </div>
                          <div class="col-md-1" text-left"><label class="control-label">Titular:</label></div>
                          <div class="col-md-3">
                             <input  type="text"
                             maxlength="100"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->comprobante_titular : '' }}" 
                            name="documentacion[comprobante_titular]">
                          </div>

                      </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                            maxlength="250" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->comprobante_cotejo : '' }}" 
                            name="documentacion[comprobante_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">COMP. DE AFILIACIÓN AL IMSS</label></div>
                  <div class="col-md-5">
                       <input  type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="15" min="1" max="99999999999999999999" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->imss : '' }}" 
                            name="documentacion[imss]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->imss_cotejo : '' }}" 
                            name="documentacion[imss_cotejo]">
                  </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">EDO. DE CTA. DE AFORE</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="255" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->afore : '' }}" 
                              name="documentacion[afore]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->afore_cotejo: '' }}" 
                            name="documentacion[afore_cotejo]">
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
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->carta : '' }}" 
                              name="documentacion[carta]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->carta_cotejo : '' }}" 
                            name="documentacion[carta_cotejo]">
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
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->recibo_nomina : '' }}" 
                              name="documentacion[recibo_nomina]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->recibo_nomina_cotejo: '' }}" 
                            name="documentacion[recibo_nomina_cotejo]">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-4 text-left"><label class="control-label">CONSTANCIA DE INSCRIPCIÓN DE RFC</label></div>
                  <div class="col-md-5">
                       <input  type="text"
                              maxlength="150" 
                              class="form-control" 
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->inscripcion_rfc : '' }}" 
                              name="documentacion[inscripcion_rfc]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="150"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->inscripcion_rfc_cotejo: '' }}" 
                            name="documentacion[inscripcion_rfc_cotejo]">
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
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->constancia_estudios : '' }}" 
                              name="documentacion[constancia_estudios]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="150"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->constancia_estudios_cotejo : '' }}" 
                            name="documentacion[constancia_estudios_cotejo]">
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
                                 value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_acta : '' }}" 
                                name="documentacion[acta_matrimonio_acta]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Foja:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                               maxlength="50"  
                              class="form-control" 
                               value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_foja : '' }}" 
                              name="documentacion[acta_matrimonio_foja]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Libro:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                              maxlength="50"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_libro : '' }}" 
                            name="documentacion[acta_matrimonio_libro]">
                            </div>
                       </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_cotejo : '' }}" 
                            name="documentacion[acta_matrimonio_cotejo]">
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
                                 value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_ano : '' }}" 
                                name="documentacion[acta_nac_conyugue_ano]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Foja:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                               maxlength="50"  
                              class="form-control" 
                               value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_foja : '' }}" 
                              name="documentacion[acta_nac_conyugue_foja]">
                            </div>
                            <div class="col-md-1 text-left"><label class="control-label">Libro:</label></div>
                            <div class="col-md-3 text-center">
                              <input  type="text"
                              maxlength="50"  
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_libro: '' }}" 
                            name="documentacion[acta_nac_conyugue_libro]">
                            </div>
                       </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text" 
                            class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_cotejo : '' }}" 
                            name="documentacion[acta_nac_conyugue_cotejo]">
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
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_nac_hijos : '' }}" 
                              name="documentacion[acta_nac_hijos]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->acta_nac_hijos_cotejo: '' }}" 
                            name="documentacion[acta_nac_hijos_cotejo]">
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
                              value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->buro_credito: '' }}" 
                              name="documentacion[buro_credito]">
                  </div>
                  <div class="col-md-2 text-center">
                    <input  type="text"
                             maxlength="255"  
                             class="form-control" 
                             value="{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->buro_credito_cotejo : '' }}" 
                            name="documentacion[buro_credito_cotejo]">
                  </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-12 text-center"><label class="control-label">OBSERVACIONES</label></div>
               </div>
               <div class="row">
               <div class="col-md-12 text-center">
                    <textarea class="form-control" placeholder="Observaciones documentación" rows="5" name="documentacion[documentacion_observaciones]">{{ isset($estudio->formatoMetlife) ?$estudio->formatoMetlife->documentacion->documentacion_observaciones : '' }}</textarea>
                  </div>
               </div>

            </div>


           
  </div><!--edn formulario horizontal -->
  </div>
</div>
