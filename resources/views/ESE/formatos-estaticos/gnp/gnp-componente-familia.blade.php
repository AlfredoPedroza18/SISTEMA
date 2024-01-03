
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">DATOS FAMILIARES</h4>
    </div>

    <div class="panel-body">
        <div class="form-horizontal">
            <div id="familia-container">
            @if($estudio->formatoGnp)
                <div class="form-group">
                    <label class="col-md-2 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-familia">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Datos Familiares</strong>
                    </label>
                </div>
                @foreach ($estudio->formatoGnp->familia as $indexfa =>$fami)


                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-familia"
                                data-id-delete-familia="{{ $fami->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        
                        <label class="col-md-2 text-center control-label"><strong>PARENTESCO<strong></label>
                        <label class="col-md-2 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>EDAD</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>ESTADO CIVIL</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>OCUPACIÓN</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>DOMICILIO</strong></label>
                                     
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="family[{{ $indexfa }}][id]" value="{{ $fami->id }}">
                        <div class="col-md-2 col-md-offset-2">
                            <input type="text" maxlength="250" class="form-control" name="family[{{ $indexfa }}][parentesco]" value="{{ $fami->parentesco }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" maxlength="250" class="form-control" name="family[{{ $indexfa }}][nombre]" value="{{ $fami->nombre }}">
                        </div>
                        <div class="col-md-1">
                            <input type="text" maxlength="250" class="form-control" name="family[{{ $indexfa }}][edad]" value="{{ $fami->edad }}">
                        </div>
                         <div class="col-md-1">
                        <input type="text" maxlength="250" class="form-control" name="family[{{ $indexfa }}][edo_civil_familia]" value="{{ $fami->edo_civil_familia }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" maxlength="250" class="form-control" name="family[{{ $indexfa }}][ocupacion]" value="{{ $fami->ocupacion }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" maxlength="250" class="form-control" name="family[{{ $indexfa }}][domicilio]" value="{{ $fami->domicilio }}">
                        </div>
                       
                        
                        
                    </div>    
                @endforeach

            @else                
                    <div class="form-group">
                    <label class="col-md-2 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-familia">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Datos Familiares</strong>
                    </label>
                        <label class="col-md-2 text-center control-label"><strong>PARENTESCO<strong></label>
                        <label class="col-md-2 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>EDAD</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>ESTADO CIVIL</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>OCUPACIÓN</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>DOMICILIO</strong></label>
                                     
                                 
                </div>
                <div class="form-group">
    <input type="hidden" name="family[0][id]" value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->familia->id : 0 }}">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" maxlength="250" class="form-control" name="family[0][parentesco]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" maxlength="250" class="form-control" name="family[0][nombre]">
                    </div>
                    <div class="col-md-1">
                        <input type="text" maxlength="250" class="form-control" name="family[0][edad]">
                    </div>
                     <div class="col-md-1">
                        <input type="text" maxlength="250" class="form-control" name="family[0][edo_civil_familia]">
                    </div>
                    
                    <div class="col-md-2">
                        <input type="text" maxlength="250" class="form-control" name="family[0][ocupacion]">
                    </div>
                  <div class="col-md-2">
                        <input type="text" maxlength="250" class="form-control" name="family[0][domicilio]">
                    </div>
                   
                                        
                </div>
            @endif


            </div>
        </div>
      
    </div>
</div>