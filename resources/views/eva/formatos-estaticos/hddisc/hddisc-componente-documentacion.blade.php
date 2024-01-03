
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Documentación</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label"><strong>Concepto</strong></label>
                <label class="col-md-8 text-center control-label"><strong>Número de certificado</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Copia/Original</strong></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Acta de Nacimiento</label>
                <label class="col-md-1 control-label">Acta</label>
                <div class="col-md-1">
                    <input type="hidden" name="documentacion[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->id : 0 }}">
                    <input  type="text" class="form-control" name="documentacion[acta_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->acta_no : '' }}">
                </div>
                <label class="col-md-1 control-label">Año</label>
                <div class="col-md-1">
                    <input  type="text" class="form-control" name="documentacion[acta_anio]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->acta_anio : '' }}">
                </div>
                <label class="col-md-1 control-label">Libro</label>
                <div class="col-md-1">
                    <input  type="text" class="form-control" name="documentacion[acta_libro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->acta_libro : '' }}">
                </div>
                <label class="col-md-1 control-label">Oficialia</label>
                <div class="col-md-1">
                    <input  type="text" class="form-control" name="documentacion[acta_oficialia]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->acta_oficialia : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[acta_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->acta_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">INE (Vigente)</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Clave</label>
                        <div class="col-md-5">
                            <input  type="text" class="form-control" name="documentacion[ine_clave_]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ine_clave_ : '' }}">
                        </div>
                        <label class="col-md-1 control-label">Número</label>
                        <div class="col-md-5">
                            
                            <input  type="text" class="form-control" name="documentacion[ine_no]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ine_no : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Coincide con dirección actual</label>
                        <div class="col-md-4">
                            
                            <input  type="text" class="form-control" name="documentacion[ine_direccion_actual]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ine_direccion_actual : '' }}">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-md-1 control-label">Dirección</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[ine_direccion]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ine_direccion : '' }}">
                        </div>
                    </div>                                        
                </div>
                <div class="col-md-2">
                    
                    <input  type="text" class="form-control" name="documentacion[ine__corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ine__corroboro : '' }}">
                </div>
            </div>
            
            <div class="form-group">                
                <label class="col-md-2 control-label">CURP</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control" name="documentacion[curp]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->curp : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[curp_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->curp_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">RFC</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control" name="documentacion[rfc_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->rfc_no : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[rfc_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->rfc_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Afore</label>
                <label class="col-md-2 control-label">Número</label>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[afore_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->afore_no : '' }}">
                </div>
                <label class="col-md-2 control-label">Institución</label>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[afore_institucion]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->afore_institucion : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[afore_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->afore_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">No. de afiliaciión IMSS ó ISSSTE</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control" name="documentacion[nss_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->nss_no : '' }}">
                </div>                
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[nss_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->nss_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Comprobante de estudios</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Institución</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[ce_institucion]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ce_institucion : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Documento</label>
                        <div class="col-md-5">
                            
                            <input  type="text" class="form-control" name="documentacion[ce_documento]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ce_documento : '' }}">
                        </div>
                        <label class="col-md-1 control-label">Folio</label>
                        <div class="col-md-5">
                            
                            <input  type="text" class="form-control" name="documentacion[ce_folio]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ce_folio : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Grado</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[ce_grado]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ce_grado : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Licenciatura</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[ce_licenciatura]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ce_licenciatura : '' }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    
                    <input  type="text" class="form-control" name="documentacion[ce_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->ce_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Comprobante de Domicilio</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Titular</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[cd_titular]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cd_titular : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Servicio y Fecha</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[cd_servicio_fecha]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cd_servicio_fecha : '' }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    
                    <input  type="text" class="form-control" name="documentacion[cd_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cd_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Licencia de manejo</label>
                <label class="col-md-1 control-label">Tipo</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="documentacion[licencia_manejo_tipo]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->licencia_manejo_tipo : '' }}">
                </div>
                <label class="col-md-1 control-label">Número y Vigencia</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="documentacion[licencia_manejo_no_vig]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->licencia_manejo_no_vig : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[licencia_manejo_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->licencia_manejo_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Cédula Profesional</label>
                <label class="col-md-1 control-label">Número</label>
                <div class="col-md-7">
                    <input  type="text" class="form-control" name="documentacion[cedula_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cedula_no : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[cedula_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cedula_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Pasaporte</label>
                <label class="col-md-1 control-label">Número</label>
                <div class="col-md-7">
                    <input  type="text" class="form-control" name="documentacion[pasaporte_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->pasaporte_no : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[pasaporte_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->pasaporte_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Crédito INFONAVIT</label>
                <label class="col-md-1 control-label">Número</label>
                <div class="col-md-7">
                    <input  type="text" class="form-control" name="documentacion[infonavit_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->infonavit_no : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[infonavit_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->infonavit_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Crédito FONACOT</label>
                <label class="col-md-1 control-label">Número</label>
                <div class="col-md-7">
                    <input  type="text" class="form-control" name="documentacion[fonacot_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->fonacot_no : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[fonacot_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->fonacot_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Cartilla Servicio Militar</label>
                <label class="col-md-1 control-label">Matricula</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="documentacion[cartilla_matricula]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cartilla_matricula : '' }}">
                </div>
                <label class="col-md-1 control-label">Liberación</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="documentacion[cartilla_liberacion]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cartilla_liberacion : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[cartilla_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->cartilla_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 control-label">Acta de Matrimonio</label>
                <label class="col-md-1 control-label">Juzgado</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="documentacion[actam_juzgado]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->actam_juzgado : '' }}">
                </div>
                <label class="col-md-1 control-label">Número</label>
                <div class="col-md-3">
                    <input  type="text" class="form-control" name="documentacion[actam_no]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->actam_no : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[actam_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->actam_corroboro : '' }}">
                </div>
            </div>
            

            <div class="form-group">                
                <label class="col-md-2 control-label">Último recibo de percepciones</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Empresa</label>
                        <div class="col-md-11">
                            
                            <input  type="text" class="form-control" name="documentacion[recibo_percepciones_empresa]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->recibo_percepciones_empresa : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Puesto</label>
                        <div class="col-md-5">
                            <input  type="text" class="form-control" name="documentacion[recibo_percepciones_puesto]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->recibo_percepciones_puesto : '' }}">
                        </div>
                        <label class="col-md-1 control-label">Ingreso</label>
                        <div class="col-md-5">
                            <input  type="text" class="form-control" name="documentacion[recibo_percepciones_ingreso]" 
                                    value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->recibo_percepciones_ingreso : '' }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <input  type="text" class="form-control" name="documentacion[recibo_percepciones_corroboro]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->documentacion->recibo_percepciones_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Observaciones: </label>
                <div class="col-md-8">   
                    <textarea class="form-control" rows="3" name="documentacion[observaciones]">{{ isset( $estudio->formatoHddisc->documentacion ) ? $estudio->formatoHddisc->documentacion->observaciones : '' }}</textarea>
                </div>                
            </div>
            

        </div>
    </div>
</div>