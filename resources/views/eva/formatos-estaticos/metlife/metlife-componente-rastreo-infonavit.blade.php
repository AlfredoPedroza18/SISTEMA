<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">RASTREO INFONAVIT</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        
      
            <div class="form-group">
                <div class="col-md-2">
                    <input type="hidden" name="rastreo[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                  
                 </div>
                 <div class="col-md-10">                    
                    <input  type="file" 
                            accept="image/x-png,image/jpeg"
                            class="form-control"                            
                            value="{{ isset( $estudio->formatoMetlife->rastreo_infonavit) ? $estudio->formatoMetlife->rastreo_infonavit->file : '' }}" 
                            name="rastreo[file]">
                </div>
                
            </div>
            
              <div class="form-group">
                <div class="row">
                      <div class="col-md-4 text-right">
                           <label class="control-label">¿CUENTA CON RASTREO INFONAVIT ? :</label>
                      </div>
                      <div class="col-md-6 text-left">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->rastreoInfonavit->rastreo_infonavit: '' }}" 
                            name="rastreo[rastreo_infonavit]"
                            maxlength="250" 
                            >
                      </div>
                </div>
                
                </div>
    </div><!--edn formulario horizontal -->
  </div>
</div>