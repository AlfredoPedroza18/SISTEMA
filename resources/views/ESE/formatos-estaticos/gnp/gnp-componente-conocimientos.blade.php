
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">CONOCIMIENTOS Y HABILIDADES</h4>
    </div>

    <div class="panel-body">
        <div class="form-horizontal">
            <div id="conocimiento-container">
            @if($estudio->formatoGnp)
                <div class="form-group">
                    <label class="col-md-5 col-md-offset-7 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-conocimiento">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Conocimientos y Habilidades</strong>
                    </label>
                </div>
                @foreach ($estudio->formatoGnp->conocimientos_ as $indexconoci =>$conoci)


                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-conocimiento"
                                data-id-delete-conocimiento="{{ $conoci->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        
                        <label class="col-md-5 text-center control-label"><strong>PAQUETERIA</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>%</strong></label>
                                     
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="conocimientomet[{{ $indexconoci }}][id]" value="{{ $conoci->id }}">
                        <div class="col-md-5 col-md-offset-2">
                            <input type="text" class="form-control" name="conocimientomet[{{ $indexconoci }}][paqueteria]" value="{{ $conoci->paqueteria }}">
                        </div>
                        <div class="col-md-2">
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" min="1" max="99999999999999999" class="form-control" name="conocimientomet[{{ $indexconoci }}][porcentaje]" value="{{ $conoci->porcentaje}}">
                        </div>
                        
                        
                    </div>    
                @endforeach

            @else                
                <div class="form-group">
                    <label class="col-md-5 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-conocimiento">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Conocimientos y Habilidades</strong>
                    </label>
                        <label class="col-md-5 text-center control-label"><strong>PAQUETERIA</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>%</strong></label>
                                     
                                 
                </div>
                <div class="form-group">
    <input type="hidden" name="conocimientomet[0][id]" value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->conocimientos_->id : 0 }}">
                    <div class="col-md-5 col-md-offset-2">
                        <input type="text" class="form-control" name="conocimientomet[0][paqueteria]">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" maxlength="3" max="99999999999999999" class="form-control" name="conocimientomet[0][porcentaje]">
                    </div>
                                        
                </div>
            @endif


            </div>
        </div>
      
    </div>
</div>