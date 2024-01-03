
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Tipo de vivienda</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 col-md-offset-2 text-center control-label"><strong>PROPIA</strong></label>
                <label class="col-md-2 text-center control-label"><strong>HIPOTECADA</strong></label>
                <label class="col-md-2 text-center control-label"><strong>RENTADA</strong></label>
                <label class="col-md-2 text-center control-label"><strong>PRESTADA</strong></label>
                <label class="col-md-2 text-center control-label"><strong>PADRES</strong></label>                
            </div>
            <div class="form-group">
                <input type="hidden" name="tipo_vivienda[id]" value="{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->id : 0 }}">
                <div class="col-md-2 col-md-offset-2">
                    <input  type="text" 
                            class="form-control" 
                            name="tipo_vivienda[propia]"
                            value="{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->propia : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="tipo_vivienda[hipotecada]"
                            value="{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->hipotecada : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="tipo_vivienda[rentada]"
                            value="{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->rentada : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="tipo_vivienda[prestada]"
                            value="{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->prestada : '' }}">
                </div>
                <div class="col-md-2">
                    <input  type="text" 
                            class="form-control" 
                            name="tipo_vivienda[padres]"
                            value="{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->padres : '' }}">
                </div>
            </div>
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 text-center control-label"><strong>Observaciones</strong></label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="tipo_vivienda[observaciones]">{{ isset( $estudio->formatoJll->tipoVivienda ) ? $estudio->formatoJll->tipoVivienda->observaciones : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>