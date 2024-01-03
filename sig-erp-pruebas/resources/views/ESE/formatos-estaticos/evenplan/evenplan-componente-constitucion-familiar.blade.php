
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Constitución Familiar</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 text-center control-label">
                    <a  href="javascript:;" 
                        class="btn btn-circle btn-primary frm-submit-delete-viven-dom"
                        id="add-row-parentesco" 
                        data-id-delete-vive-persona="0">
                        <i class="fa fa-plus"></i>
                    </a>
                </label>
                <label class="col-md-2 text-center control-label"><strong>Parentesco</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Nombre</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Edad</strong></label>
                <label class="col-md-2 text-center control-label"><strong>Ocupación</strong></label>
            </div>
            <div id="parentesco-container">
            @if( $estudio->formatoEvenplan )
                @forelse( $estudio->formatoEvenplan->parentesco as $index => $familiar )
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-xs frm-submit-delete-parentesco"
                                data-id-delete-parentesco="{{ $familiar->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <input type="hidden" name="parentesco[{{ $index }}][id]" value="{{ $familiar->id }}">
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][parentesco]" value="{{ $familiar->parentesco }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][nombre]" value="{{ $familiar->nombre }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][edad]" value="{{ $familiar->edad }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="parentesco[{{ $index }}][ocupacion]" value="{{ $familiar->ocupacion }}">
                        </div>
                    </div>
                @empty
                    <div class="form-group">
                    <input type="hidden" name="parentesco[0][id]" value="0">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" class="form-control" name="parentesco[0][parentesco]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][nombre]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][edad]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][ocupacion]" value="">
                    </div>
                </div>
                @endforelse
            @else
                <div class="form-group">
                    <input type="hidden" name="parentesco[0][id]" value="0">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" class="form-control" name="parentesco[0][parentesco]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][nombre]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][edad]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[0][ocupacion]" value="">
                    </div>
                </div>
            @endif
            </div> 
        </div>
    </div>
</div>