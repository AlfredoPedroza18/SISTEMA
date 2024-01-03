
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">CURSOS REALIZADOS</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div id="cursos-container">

            @if($estudio->formatoGnp)
                <div class="form-group">
                    <label class="col-md-2 col-md-offset-10 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-curso">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Cursos</strong>
                    </label>
                </div>
                @foreach ($estudio->formatoGnp->cursoMet as $index => $curso)
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-curso"
                                data-id-delete-curso="{{ $curso->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <label class="col-md-2 text-center control-label"><strong>De</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>A</strong></label>
                        <label class="col-md-6 text-center control-label"><strong>Realizo</strong></label>
                                     
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cursos[{{ $index }}][id]" value="{{ $curso->id }}">
                        <div class="col-md-2 col-md-offset-2">
                            <input type="text" maxlength="50" class="form-control" name="cursos[{{ $index }}][de]" value="{{ $curso->de }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" maxlength="50" class="form-control" name="cursos[{{ $index }}][a]" value="{{ $curso->a }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cursos[{{ $index }}][realizo]" value="{{ $curso->realizo }}">
                        </div>
                        
                    </div>    
                @endforeach

            @else                
                <div class="form-group">
                    <label class="col-md-2 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-curso">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Cursos</strong>
                    </label>
                    <label class="col-md-2 text-center control-label"><strong>DE</strong></label>
                    <label class="col-md-2 text-center control-label"><strong>A</strong></label>
                    <label class="col-md-6 text-center control-label"><strong>Realizo</strong></label>
                                 
                </div>
                <div class="form-group">
                    <input type="hidden" name="cursos[0][id]" value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->cursoMet->id : 0 }}">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" maxlength="50" class="form-control" name="cursos[0][de]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" maxlength="50" class="form-control" name="cursos[0][a]">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cursos[0][realizo]">
                    </div>
                    
                </div>
            @endif


            </div>
        </div>
      
    </div>
</div>