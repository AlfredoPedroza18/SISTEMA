
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
                <label class="col-md-4 text-center control-label"><strong>Número de folio</strong></label>
                <label class="col-md-4 text-center control-label"><strong>Descripción</strong></label>
            </div>
            <div class="form-group">
                <input type="hidden" name="documentacion[id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->id : 0 }}">
                <label class="col-md-2 col-md-offset-1 control-label">Acta de Nacimiento</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[acta_nacimiento_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_nacimiento_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[acta_nacimiento_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_nacimiento_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Acta de Matrimonio</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[acta_matrimonio_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_matrimonio_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[acta_matrimonio_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_matrimonio_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Comprobante de Domicilio</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_domicilio_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_domicilio_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_domicilio_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_domicilio_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Comprobante de Estudios</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_estudios_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_estudios_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[comprobante_estudios_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_estudios_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">Identificación</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[identificacion_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->identificacion_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[identificacion_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->identificacion_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">CURP</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[curp_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->curp_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[curp_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->curp_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">NSS</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[nss_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->nss_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[nss_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->nss_descripcion : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-1 control-label">RFC</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[rfc_no]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->rfc_no : '' }}">
                </div>
                <div class="col-md-4">
                    <input  type="text" class="form-control" name="documentacion[rfc_descripcion]" 
                            value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->rfc_descripcion : '' }}">
                </div>
            </div>
            

        </div>
    </div>
</div>