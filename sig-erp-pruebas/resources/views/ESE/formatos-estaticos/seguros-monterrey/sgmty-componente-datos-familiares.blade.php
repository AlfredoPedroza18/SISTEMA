
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Datos Familiares</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Diagrama familiares (Únicamente imagenes): </label>
                <div class="col-md-10">                    
                    <input type="hidden" name="datos_familiares[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_familiares->id : 0 }}">
                    <input  type="file" 
                            accept="image/x-png,image/jpeg"
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoSM->datos_familiares ) ? $estudio->formatoSM->datos_familiares->file : '' }}" 
                            name="datos_familiares[file]">
                </div>                
	            
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Observaciones: </label>
                <div class="col-md-10">   
                	<textarea class="form-control" rows="3" name="datos_familiares[observaciones]">{{ isset( $estudio->formatoSM->datos_familiares ) ? $estudio->formatoSM->datos_familiares->observaciones : '' }}</textarea>
                </div>                
            </div>            
        </div>
    </div>
</div>