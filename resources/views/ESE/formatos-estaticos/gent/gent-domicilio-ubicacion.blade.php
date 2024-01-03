
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Ubicación domicilio</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Distancia de su casa al trabajo: </label>
                <div class="col-md-10">
                    <input type="hidden" name="ubicacion_domicilio[id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->ubicacion_domicilio->id : 0 }}">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->ubicacion_domicilio->distancia_domicilio : '' }}" 
                            name="ubicacion_domicilio[distancia_domicilio]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Medio de transporte que utiliza: </label>
                <div class="col-md-10">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->ubicacion_domicilio->transporte_utiliza : '' }}" 
                            name="ubicacion_domicilio[transporte_utiliza]">
                </div>
            </div>
        </div>
    </div>
</div>