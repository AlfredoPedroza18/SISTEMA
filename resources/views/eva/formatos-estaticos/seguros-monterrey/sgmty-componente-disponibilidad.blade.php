
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Disponibilidad</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Si esta empleado actualmente ¿Por que desea cambiar?: </label>
                <div class="col-md-10">
                    <input type="hidden" name="disponibilidad[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->disponibilidad->id : 0 }}">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->disponibilidad->empleado_actualmente : '' }}" 
                            name="disponibilidad[empleado_actualmente]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">
                ¿Esta dispuesto a viajar?</label>
                <div class="col-md-1">                    
                    <select class="form-control" name="disponibilidad[dispuesto_viajar]">
                        <option value="1" @if( $estudio->formatoSM ) @if( $estudio->formatoSM->disponibilidad->dispuesto_viajar == '1' ) selected="selected" @endif @endif>Si</option>
                        <option value="2" @if( $estudio->formatoSM ) @if( $estudio->formatoSM->disponibilidad->dispuesto_viajar == '2' ) selected="selected" @endif @endif>No</option>
                    </select>
                </div>
                <label class="col-md-2 control-label">
                ¿A cambiar de residencia?</label>
                <div class="col-md-1">                    
                    <select class="form-control" name="disponibilidad[cambiar_residencia]">
                        <option value="1" @if( $estudio->formatoSM ) @if( $estudio->formatoSM->disponibilidad->cambiar_residencia == '1' ) selected="selected" @endif @endif>Si</option>
                        <option value="2" @if( $estudio->formatoSM ) @if( $estudio->formatoSM->disponibilidad->cambiar_residencia == '2' ) selected="selected" @endif @endif>No</option>
                    </select>
                </div>
                <label class="col-md-2 control-label">¿A partir de que fecha puede comenzar a trabajar? </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->disponibilidad->comenzar_trabajar : '' }}" 
                            name="disponibilidad[comenzar_trabajar]">
                </div>
            </div>
        </div>
    </div>
</div>