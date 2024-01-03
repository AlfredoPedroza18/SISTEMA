
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">ESTADO DE SALUD</h4>
    </div>

    <div class="panel-body">
        <div class="form-horizontal">
            <div id="tratamiento-container">
            @if($estudio->formatoRoa)
                <div class="form-group">
                    <label class="col-md-5 col-md-offset-7 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-tratamiento">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Padecimiento</strong>
                    </label>
                </div>
                @foreach ($estudio->formatoRoa->edoSalud as $indextrata =>$tratamiento)


                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-tratamiento"
                                data-id-delete-tratamiento="{{ $tratamiento->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        
                        <label class="col-md-3 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-3 text-center control-label"><strong>PARENTESCO</strong></label>
                        <label class="col-md-3 text-center control-label"><strong>PADECIMIENTO</strong></label>
                                     
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="trata[{{ $indextrata }}][id]" value="{{ $tratamiento->id }}">
                        <div class="col-md-3 col-md-offset-2">
                            <input type="text" maxlength="255" class="form-control" name="trata[{{ $indextrata }}][nombre]" value="{{ $tratamiento->nombre }}">
                        </div>
                        <div class="col-md-3">
                         <input type="text" maxlength="255" class="form-control" name="trata[{{ $indextrata }}][parentesco]" value="{{ $tratamiento->parentesco }}">
                        </div>
                          <div class="col-md-3">
                         <input type="text" maxlength="255" class="form-control" name="trata[{{ $indextrata }}][padecimiento]" value="{{ $tratamiento->padecimiento }}">
                        </div>
                        
                        
                    </div>    
                @endforeach

            @else                
                <div class="form-group">
                    <label class="col-md-5 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-tratamiento">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Padecimiento</strong>
                    </label>
                        <label class="col-md-3 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-3 text-center control-label"><strong>PARENTESCO</strong></label>
                        <label class="col-md-3 text-center control-label"><strong>PADECIMIENTO</strong></label>
                                     
                                 
                </div>
                <div class="form-group">
    <input type="hidden" name="trata[0][id]" value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->edoSalud->id : 0 }}">
                    <div class="col-md-3 col-md-offset-2">
                        <input type="text" maxlength="255" class="form-control" name="trata[0][nombre]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" maxlength="255" class="form-control" name="trata[0][parentesco]">
                    </div>
                     <div class="col-md-3">
                        <input type="text" maxlength="255" class="form-control" name="trata[0][padecimiento]">
                    </div>
                                        
                </div>
            @endif


            </div>
        </div>
      
    </div>
</div>