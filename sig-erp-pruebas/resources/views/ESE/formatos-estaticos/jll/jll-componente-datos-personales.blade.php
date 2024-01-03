
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Datos personales</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Teléfono celular: </label>
                <div class="col-md-4">
                    <input type="hidden" name="datos_personales[id]" value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->id : 0 }}">
                    <input  type="text" 
                            class="form-control telefono" 
                            name="datos_personales[celular]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->celular : '' }}">

                </div>
                <label class="col-md-2 control-label">Edad: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[edad]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->edad : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Teléfono casa: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control telefono" 
                            name="datos_personales[telefono_casa]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->telefono_casa : '' }}">
                </div>
                <label class="col-md-2 control-label">Sexo: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[sexo]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->sexo : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Fecha y lugar de nacimiento: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[lugar_nacimiento]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->lugar_nacimiento : '' }}">
                </div>
                <label class="col-md-2 control-label">Estado civil: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[edo_civil]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->edo_civil : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Domicilio actual: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[domicilio_actual]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->domicilio_actual : '' }}">
                </div>
                <label class="col-md-2 control-label">CP: </label>
                <div class="col-md-4">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[cp]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->cp : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Entre las calles: </label>
                <div class="col-md-10">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[entre_calles]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->entre_calles : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Tiempo de radicar en el domicilio: </label>
                <div class="col-md-10">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[tiempo_radicar_domicilio_actual]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->tiempo_radicar_domicilio_actual : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Domicilio anterior: </label>
                <div class="col-md-10">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[domicilio_anterior]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->domicilio_anterior : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Tiempo de radicar en el domicilio anterior: </label>
                <div class="col-md-10">
                    <input  type="text" 
                            class="form-control" 
                            name="datos_personales[tiempo_radicar_domicilio_anterior]"
                            value="{{ isset( $estudio->formatoJll->datosPersonales ) ? $estudio->formatoJll->datosPersonales->tiempo_radicar_domicilio_anterior : '' }}">
                </div>
            </div>
        </div>
    </div>
</div>