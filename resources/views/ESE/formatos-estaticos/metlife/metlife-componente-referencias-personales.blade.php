
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">REFERENCIAS PERSONALES</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">

            <div class="form-group">
                <label class="col-md-2 col-md-offset-10 text-center control-label">
                    <a href="javascript:;" class="btn btn-circle btn-primary" id="add-personal">
                        <i class="fa fa-plus"></i>
                    </a> <strong>Agregar Referencia personal</strong>
                </label>
            </div>
            <div id="personal-container">

                @if($estudio->formatoMetlife)

                @foreach ($estudio->formatoMetlife->referenciaPersonal as $indexpersonal => $personal)
                <div id="fila_personal_0" attr-row="0">
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                            class="btn btn-circle btn-danger frm-submit-delete-personal"
                            data-id-delete-personal="{{ $personal->id }}">
                            <i class="fa fa-minus"></i>
                        </a>
                    </label>

                </div>
                <div class="form-group">
                    <div class="row">
                        <input type="hidden" name="referencias_personales[{{ $indexpersonal }}][id]" value="{{ $personal->id }}">
                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">NOMBRE DE LA REFERENCIA:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_personales[{{ $indexpersonal }}][nombre_referencia]" value="{{ $personal->nombre_referencia }}">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">CELULAR:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_personales[{{ $indexpersonal }}][celular_referencia]" value="{{ $personal->celular_referencia }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="13">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">DOMICILIO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_personales[{{ $indexpersonal }}][domicilio_referencia]" value="{{ $personal->domicilio_referencia }}">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TELÉFONO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_personales[{{ $indexpersonal }}][telefono_referencia]" value="{{ $personal->telefono_referencia }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="13">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">OCUPACIÓN:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_personales[{{ $indexpersonal }}][ocupacion_referencia]" value="{{ $personal->ocupacion_referencia }}">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TIEMPO DE CONOCERLO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="text"  class="form-control" name="referencias_personales[{{ $indexpersonal }}][tiempo_conocerlo_referencia]" value="{{ $personal->tiempo_conocerlo_referencia }}" maxlength="15">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">COMENTARIOS:</label>
                        </div>
                        <div class="col-md-8 text-left">
                            <input type="text"  class="form-control" name="referencias_personales[{{ $indexpersonal }}][comentarios_referencia]" maxlength="255" value="{{ $personal->comentarios_referencia }}">
                        </div>

                    </div>

                </div>   
            </div> 
            @endforeach

            @else 


            <div id="fila_personal_0" attr-row="0">
                <div class="form-group">

                    <input type="hidden" name="referencias_personales[0][id]" value="0" }}">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">NOMBRE DE LA REFERENCIA:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_personales[0][nombre_referencia]">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">CELULAR:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number" maxlength="255" class="form-control" name="referencias_personales[0][celular_referencia]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="13">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">DOMICILIO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_personales[0][domicilio_referencia]" >
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TELÉFONO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="text"  class="form-control" name="referencias_personales[0][telefono_referencia]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="13">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">OCUPACIÓN:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_personales[0][ocupacion_referencia]" >
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TIEMPO DE CONOCERLO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="text"  class="form-control" name="referencias_personales[0][tiempo_conocerlo_referencia]" maxlength="15">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-2 text-right">
                            <label class="control-label">COMENTARIOS:</label>
                        </div>
                        <div class="col-md-8 text-left">
                            <input type="text"  class="form-control" name="personal[0][comentarios_referencia]" maxlength="255">
                        </div>

                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>


</div>


