<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">INFORMACIÓN FAMILIAR</h4>
        
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
     
           <div class="form-group">
           <input type="hidden" name="ifamiliar[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                <div class="row">
                        <div class="col-md-4 text-right">¿Con quién habita actualmente?</div>
                        <div class="col-md-7">
                      <input  type="text" 
                                    class="form-control text-center" 
            value="{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->con_quien_vive : '' }}" 
                                    name="ifamiliar[con_quien_vive]">
                 
                        </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                        <div class="col-md-4 text-right">¿Cómo considera que es su relación con ellos?</div>
                        <div class="col-md-7">
                      <input  type="text" 
                                    class="form-control text-center" 
                                    value="{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->relacion_familia : '' }}" 
                                    name="ifamiliar[relacion_familia]">
                 
                        </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                        <div class="col-md-4 text-right">¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?</div>
                        <div class="col-md-7">
                      <input  type="text" 
                                    class="form-control text-center" 
                                    value="{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->familiares_extrangero : '' }}" 
                                    name="ifamiliar[familiares_extrangero]">
                 
                        </div>
               </div>
            </div>
             <div class="form-group">
                <div class="row">
                        <div class="col-md-4 text-right">Y, ¿al interior de la República?. ¿En dónde?</div>
                        <div class="col-md-7">
                      <input  type="text" 
                                    class="form-control text-center" 
                                    value="{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->familiares_interior_republica : '' }}" 
                                    name="ifamiliar[familiares_interior_republica]">
                        </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                        <div class="col-md-4 text-right">¿Con qué frecuencia los visita?</div>
                        <div class="col-md-7">
                      <input  type="text" 
                                    class="form-control text-center" 
                                    value="{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->frecuencia_visita : '' }}" 
                                    name="ifamiliar[frecuencia_visita]">
                 
                        </div>
               </div>
            </div>
             <div class="form-group">
                <div class="row">
                        <div class="col-md-12 text-center">OBSERVACIONES</div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                      <input  type="text" 
                                    class="form-control text-center" 
                                    value="{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->observaciones : '' }}" 
                                    name="ifamiliar[observaciones]">
                 
                        </div>
               </div>
            </div>

           


    </div><!--edn formulario horizontal -->
  </div>
</div>