
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Escolaridad</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 text-center col-md-offset-1 control-label"><strong>GRADO</strong></label>
                <label class="col-md-2 text-center control-label"><strong>INSTITUCIÓN</strong></label>
                <label class="col-md-2 text-center control-label"><strong>LUGAR</strong></label>
                <label class="col-md-2 text-center control-label"><strong>PERÍODO</strong></label>
                <label class="col-md-2 text-center control-label"><strong>CERTIFICADO</strong></label>                
            </div>
            <div class="form-group">
                <input type="hidden" name="escolaridad[id]" value="{{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->id : 0 }}">
                <div class="col-md-2 col-md-offset-1">
                    <input  type="text" 
                            class="form-control" 
                            name="escolaridad[grado]" 
                            value="{{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->grado : '' }}">
                </div>
                <div class="col-md-2">
                    <textarea class="form-control" rows="3" name="escolaridad[institucion]">
                        {{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->institucion : '' }}
                    </textarea>
                </div>
                <div class="col-md-2">
                    <textarea class="form-control" rows="3" name="escolaridad[lugar]">
                        {{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->lugar : '' }}
                    </textarea>
                </div>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="escolaridad[periodo]" 
                            value="{{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->periodo : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="escolaridad[certificado]" 
                            value="{{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->certificado : '' }}">
                </div>
            </div>
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 text-center control-label"><strong>Persona que corroboró datos</strong></label>
                <div class="col-md-3">
                    <input  type="text" 
                            class="form-control" 
                            name="escolaridad[corroboro_datos]" 
                            value="{{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->corroboro_datos : '' }}">
                </div>
                <label class="col-md-3 text-center control-label"><strong>Verificación con la Institución</strong></label>
                <div class="col-md-3">
                    <input  type="text" 
                            class="form-control" 
                            name="escolaridad[verifico_con_institucion]" 
                            value="{{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->verifico_con_institucion : '' }}">
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-3 text-center control-label"><strong>Observaciones</strong></label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="3" name="escolaridad[observaciones]">
                        {{ isset( $estudio->formatoHsbc->escolaridad ) ? $estudio->formatoHsbc->escolaridad->observaciones : '' }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>