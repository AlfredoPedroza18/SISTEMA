
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">GAPS de tiempo mayor a 3 meses entre empleos</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Periódo: </label>
                <div class="col-md-10">
                    <input type="hidden" name="gaps[id]" value="{{ isset( $estudio->formatoBcm->gaps ) ? $estudio->formatoBcm->gaps->id : 0 }}">
                    <textarea class="form-control" rows="3" name="gaps[periodo]">{{ isset( $estudio->formatoBcm->gaps ) ? $estudio->formatoBcm->gaps->periodo : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>