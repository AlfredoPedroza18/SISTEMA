
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Antecedentes legales</h4>
    </div>
    <div class="panel-body">
        
        <div class="form-horizontal">
            <div class="form-group">
                <input type="hidden" name="antecedentes_legales[id]" value="{{ isset( $estudio->formatoBcm->antecedentesLegales ) ? $estudio->formatoBcm->antecedentesLegales->id : 0 }}">
                <label class="col-md-8 control-label">
                ¿Alguna vez fue detenido o ha tenido alguna demanda laboral, civil, mercantil, penal o falta administrativa?:</label>
                <div class="col-md-4">                    
                    <select class="form-control" name="antecedentes_legales[demanda_laboral]">
                        <option value="1" @if( $estudio->formatoBcm ) @if( $estudio->formatoBcm->antecedentesLegales->demanda_laboral == '1' ) selected="selected" @endif @endif>Si</option>
                        <option value="2" @if( $estudio->formatoBcm ) @if( $estudio->formatoBcm->antecedentesLegales->demanda_laboral == '2' ) selected="selected" @endif @endif>No</option>
                                  
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"> Descripción:</label>
                <div class="col-md-10">                    
                    <textarea class="form-control" rows="5" name="antecedentes_legales[descripcion]">{{ isset( $estudio->formatoBcm->antecedentesLegales ) ? $estudio->formatoBcm->antecedentesLegales->descripcion : '' }}</textarea>
                </div>
            </div>
        </div>

    </div>
</div>