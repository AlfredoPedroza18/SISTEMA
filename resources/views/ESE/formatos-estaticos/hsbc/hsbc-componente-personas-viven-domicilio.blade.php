
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Personas que viven en el domicilio</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div id="viven-domicilio-container">

            @if( $estudio->formatoHsbc)
                <div class="form-group">
                    <label class="col-md-2 col-md-offset-10 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-vive-persona">
                            <i class="fa fa-plus"></i>
                        </a>
                    </label>
                </div>
                @foreach ($estudio->formatoHsbc->vivenEnDomicilio as $index => $persona)
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-viven-dom"
                                data-id-delete-vive-persona="{{ $persona->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <label class="col-md-2 text-center control-label"><strong>PARENTESCO</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>EDAD Y ESTADO CIVIL</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>OCUPACIÓN</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>DEPENDE DEL CANDIDATO</strong></label>                
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="viven_domicilio[{{ $index }}][id]" value="{{ $persona->id }}">
                        <div class="col-md-2 col-md-offset-2">
                            <input type="text" class="form-control" name="viven_domicilio[{{ $index }}][parentesco]" value="{{ $persona->parentesco }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="viven_domicilio[{{ $index }}][nombre]" value="{{ $persona->nombre }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="viven_domicilio[{{ $index }}][edo_civil]" value="{{ $persona->edo_civil }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="viven_domicilio[{{ $index }}][ocupacion]" value="{{ $persona->ocupacion }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="viven_domicilio[{{ $index }}][depende_del_candidato]" value="{{ $persona->depende_del_candidato }}">
                        </div>
                    </div>    
                @endforeach

            @else                
                <div class="form-group">
                    <label class="col-md-2 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-vive-persona">
                            <i class="fa fa-plus"></i>
                        </a>
                    </label>
                    <label class="col-md-2 text-center control-label"><strong>PARENTESCO</strong></label>
                    <label class="col-md-2 text-center control-label"><strong>NOMBRE</strong></label>
                    <label class="col-md-2 text-center control-label"><strong>EDAD Y ESTADO CIVIL</strong></label>
                    <label class="col-md-2 text-center control-label"><strong>OCUPACIÓN</strong></label>
                    <label class="col-md-2 text-center control-label"><strong>DEPENDE DEL CANDIDATO</strong></label>                
                </div>
                <div class="form-group">
                    <input type="hidden" name="viven_domicilio[0][id]" value="{{ isset( $estudio->formatoHsbc->vivenEnDomicilio ) ? $estudio->formatoHsbc->vivenEnDomicilio->id : 0 }}">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" class="form-control" name="viven_domicilio[0][parentesco]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="viven_domicilio[0][nombre]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="viven_domicilio[0][edo_civil]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="viven_domicilio[0][ocupacion]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="viven_domicilio[0][depende_del_candidato]">
                    </div>
                </div>
            @endif


            </div>
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 text-center control-label"><strong>Observaciones</strong></label>
                <div class="col-md-10">
                    <input type="hidden" name="obs_viven_dom[id]" value="{{ isset( $estudio->formatoHsbc->observacionesVivenEnDomicilio ) ? $estudio->formatoHsbc->observacionesVivenEnDomicilio->id : 0 }}">
                    <textarea class="form-control" rows="3" name="obs_viven_dom[descripcion]">
                        {{ isset( $estudio->formatoHsbc->observacionesVivenEnDomicilio ) ? $estudio->formatoHsbc->observacionesVivenEnDomicilio->descripcion : '' }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>