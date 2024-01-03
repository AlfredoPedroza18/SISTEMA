
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
                <label class="col-md-2 col-md-offset-1 control-label"><strong>Concepto</strong></label>
                <label class="col-md-4 text-center control-label"><strong>Número de certificado</strong></label>
                <label class="col-md-4 text-center control-label"><strong>Copia/Original</strong></label>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Identificación oficial</label>
                <div class="col-md-4">
                    <input type="hidden" name="documentacion[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->id : 0 }}">
                    <input  type="text" class="form-control" name="documentacion[identificacion_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->identificacion_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[identificacion_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->identificacion_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1 control-label">Acta de Nacimiento</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[acta_nacimiento_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->acta_nacimiento_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[acta_nacimiento_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->acta_nacimiento_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Comprobante de Domicilio</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_dom_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->comprobante_dom_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_dom_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->comprobante_dom_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">RFC</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[rfc_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->rfc_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[rfc_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->rfc_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">No. de afiliaciión IMSS ó ISSSTE</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[nss_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->nss_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[nss_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->nss_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">No. de crédito INFONAVIT</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[infonavit_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->infonavit_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[infonavit_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->infonavit_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">No. CURP</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[curp_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->curp_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[curp_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->curp_corroboro : '' }}">
                </div>
            </div>
            
            
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Último comprobante de estudios</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_estudios_no]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->comprobante_estudios_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_estudios_corroboro]" 
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->documentacion->comprobante_estudios_corroboro : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Observaciones: </label>
                <div class="col-md-8">   
                    <textarea class="form-control" rows="3" name="documentacion[observaciones]">{{ isset( $estudio->formatoSM->documentacion ) ? $estudio->formatoSM->documentacion->observaciones : '' }}</textarea>
                </div>                
            </div>
            

        </div>
    </div>
</div>