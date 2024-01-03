
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Situación Social</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Organizaciones a las que ha pertenecido: </label>
                <div class="col-md-10">
                    <input type="hidden" name="situacion_social[id]" value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->id : 0 }}">
                    <textarea class="form-control" rows="3" name="situacion_social[pertenece_organizaciones]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->pertenece_organizaciones : '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">
                ¿Alguna vez fue detenido o ha tenido alguna demanda laboral, civil, mercantil ó penal ?:</label>
                <div class="col-md-1">                    
                    <select class="form-control" name="situacion_social[demanda_laboral]">
                        <option value="1" @if( $estudio->formatoHddisc ) @if( $estudio->formatoHddisc->situacion_social->demanda_laboral == '1' ) selected="selected" @endif @endif>Si</option>
                        <option value="2" @if( $estudio->formatoHddisc ) @if( $estudio->formatoHddisc->situacion_social->demanda_laboral == '2' ) selected="selected" @endif @endif>No</option>
                    </select>
                </div>
                <label class="col-md-2 control-label">
                    Motivo demanda
                </label>
                <div class="col-md-4">
                    <input  type="text" class="form-control" 
                            name="situacion_social[motivo_demanda]" 
                            value="{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->motivo_demanda : '' }}">
                </div>
            </div>
            <div class="form-group">                
                <label class="col-md-2 col-md-offset-2 control-label text-center"><strong>Intereses corto plazo</strong></label>
                <label class="col-md-2 control-label text-center"><strong>Intereses mediano plazo</strong></label>
                <label class="col-md-2 control-label text-center"><strong>Intereses largo plazo</strong></label>
                <label class="col-md-2 control-label text-center"><strong>Intereses principales pasatiempos</strong></label>
            </div>
            <div class="form-group">                
                <div class="col-md-2 col-md-offset-2">
                    <textarea class="form-control" rows="3" name="situacion_social[interes_corto_plazo]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->interes_corto_plazo : '' }}</textarea>
                </div>
                <div class="col-md-2">
                    <textarea class="form-control" rows="3" name="situacion_social[interes_mediano_plazo]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->interes_mediano_plazo : '' }}</textarea>
                </div>
                <div class="col-md-2">
                    <textarea class="form-control" rows="3" name="situacion_social[interes_largo_plazo]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->interes_largo_plazo : '' }}</textarea>
                </div>
                <div class="col-md-2">
                    <textarea class="form-control" rows="3" name="situacion_social[pasatiempos]">{{ isset( $estudio->formatoHddisc ) ? $estudio->formatoHddisc->situacion_social->pasatiempos : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>