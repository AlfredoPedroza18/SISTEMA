
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Descripción de la vivienda</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <input type="hidden" name="descripcion_vivienda[id]" value="{{ isset( $estudio->formatoBcm->descripcionVivienda ) ? $estudio->formatoBcm->descripcionVivienda->id : 0 }}">
                <label class="col-md-2 text-center control-label"><strong>Ubicación</strong></label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="descripcion_vivienda[ubicacion]">{{ isset( $estudio->formatoBcm->descripcionVivienda ) ? $estudio->formatoBcm->descripcionVivienda->ubicacion : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 text-center control-label"><strong>Exterior</strong></label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="descripcion_vivienda[exterior]">{{ isset( $estudio->formatoBcm->descripcionVivienda ) ? $estudio->formatoBcm->descripcionVivienda->exterior : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>