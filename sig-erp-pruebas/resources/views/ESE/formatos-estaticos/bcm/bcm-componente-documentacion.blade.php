
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
                <label class="col-md-3 control-label"><strong>Credencial de Elector: </strong></label>
                <label class="col-md-2 control-label">No. de documento: </label>
                <div class="col-md-2">
                    <input type="hidden" name="documentacion[id]" value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->id : 0 }}">
                    <input  type="text" 
                            class="form-control" 
                            name="documentacion[ine_no_doc]" 
                            value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->ine_no_doc : '' }}">
                </div>
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-4">                    
                    <textarea class="form-control" rows="2" name="documentacion[ine_observaciones]">{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->ine_observaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><strong>Pasaporte: </strong></label>
                <label class="col-md-2 control-label">No. de documento: </label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="documentacion[pasaporte_no_doc]" 
                            value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->pasaporte_no_doc : '' }}">
                </div>
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-4">                    
                    <textarea class="form-control" rows="2" name="documentacion[pasaporte_observaciones]">{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->pasaporte_observaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><strong>Cédula profesional: </strong></label>
                <label class="col-md-2 control-label">No. de documento: </label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="documentacion[cedula_no_doc]" 
                            value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->cedula_no_doc : '' }}">
                </div>
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-4">                    
                    <textarea class="form-control" rows="2" name="documentacion[cedula_observaciones]">{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->cedula_observaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><strong>No. de Afiliación del IMSS o ISSSTE: </strong></label>
                <label class="col-md-2 control-label">No.: </label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="documentacion[seguro_afiliado_no]" 
                            value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->seguro_afiliado_no : '' }}">
                </div>
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-4">                    
                    <textarea class="form-control" rows="2" name="documentacion[seguro_afiliado_observaciones]">{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->seguro_afiliado_observaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><strong>R.F.C: </strong></label>
                <label class="col-md-2 control-label">No de documento: </label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="documentacion[rfc_no]" 
                            value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->rfc_no : '' }}">
                </div>
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-4">                    
                    <textarea class="form-control" rows="2" name="documentacion[rfc_observaciones]">{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->rfc_observaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><strong>CURP: </strong></label>
                <label class="col-md-2 control-label">No de documento: </label>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="documentacion[curp_no]" 
                            value="{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->curp_no : '' }}">
                </div>
                <label class="col-md-1 control-label">Observaciones: </label>
                <div class="col-md-4">                    
                    <textarea class="form-control" rows="2" name="documentacion[curp_observaciones]">{{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->curp_observaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-10 control-label">El candidato ha permanecido por mas de 6 meses en otro pais durante los ultimos 5 años (Indicar si vivió/trabajó/ vacacionó en el extranjero durante los últimos 5 años): </label>
                <div class="col-md-2">                    
                    <select class="form-control" name="documentacion[vivio_otro_pais]">
                        <option value="1" @if( $estudio->formatoBcm ) @if( $estudio->formatoBcm->documentacion->vivio_otro_pais == '1' ) selected="selected" @endif @endif>Si</option>
                        <option value="2" @if( $estudio->formatoBcm ) @if( $estudio->formatoBcm->documentacion->vivio_otro_pais == '2' ) selected="selected" @endif @endif>No</option>
                        <option value="3" @if( $estudio->formatoBcm ) @if( $estudio->formatoBcm->documentacion->vivio_otro_pais == '3' ) selected="selected" @endif @endif>No aplica</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>