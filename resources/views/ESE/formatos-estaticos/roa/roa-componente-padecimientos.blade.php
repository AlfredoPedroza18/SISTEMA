<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">ESTADO DE SALUD</h4>
        
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
        <div class="row">
         <div class="col-md-4 col-md-offset-8">
           <div class="form-group">
                 <input type="hidden" name="pade[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
            </div>
           </div>
        </div>
            <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                         ¿CUÁL DE LAS SIGUIENTES SÍNTOMAS FÍSICOS HA PADECIDO EN LOS ÚLTIMOS SEIS MESES?
                         </div>
                    </div>
                    <br>
                   <div class="row">
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->acidez : '' }}" 
                            name="pade[acidez]">
                         </div>
                         <div class="col-md-1">
                         ACIDEZ
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->ansiedad : '' }}" 
                            name="pade[ansiedad]">
                         </div>
                         <div class="col-md-1">
                         ANSIEDAD
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->dolor_cabeza : '' }}" 
                            name="pade[dolor_cabeza]">
                         </div>
                         <div class="col-md-1">
                         DOLOR CABEZA
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->estrenimiento : '' }}" 
                            name="pade[estrenimiento]">
                         </div>
                         <div class="col-md-1">
                         ESTREÑIMIENTO
                         </div>
                         
                   </div>
            </div>
            <div class="form-group">
                   <div class="row">
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->insomnio : '' }}" 
                            name="pade[insomnio]">
                         </div>
                         <div class="col-md-1">
                         INSOMNIO
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->escalofrios : '' }}" 
                            name="pade[escalofrios]">
                         </div>
                         <div class="col-md-1">
                         ESCALOFRÍOS
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->manos_temblorosas : '' }}" 
                            name="pade[manos_temblorosas]">
                         </div>
                         <div class="col-md-1">
                       MANOS TEMBLO.
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->alergia : '' }}" 
                            name="pade[alergia]">
                         </div>
                         <div class="col-md-1">
                         ALERGIA
                         </div>
                          <div class="col-md-1">
                         TIPO
                         </div>
                          <div class="col-md-2">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->tipo : '' }}" 
                            name="pade[tipo]">
                         </div>
                         
                   </div>
            </div>
             <div class="form-group">
                <div class="row">
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->debilidad : '' }}" 
                            name="pade[debilidad]">
                         </div>
                         <div class="col-md-1">
                         DEBILIDAD
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->mareos : '' }}" 
                            name="pade[mareos]">
                         </div>
                         <div class="col-md-1">
                         MAREOS
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->taquicardia : '' }}" 
                            name="pade[taquicardia]">
                         </div>
                         <div class="col-md-1">
                         TAQUICARDIA
                         </div>  
                   </div>
                   
            </div>
            <div class="row">
                        <div class="col-md-3 text-center">
                         ¿SE ENCUENTRA BAJO TRATAMIENTO MEDICO?
                        </div>
                         <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->tratamiento_medico : '' }}" 
                            name="pade[tratamiento_medico]" maxlength="40">
                        </div>
                        <div class="col-md-3 text-center">
                         PADECIMIENTO:
                        </div>
                         <div class="col-md-4 text-center">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->tratamiento_medico_desc : '' }}" 
                            name="pade[tratamiento_medico_desc]" maxlength="40">
                        </div>
            </div>
                  <div class="row">
                        <div class="col-md-3 text-center">
                         ¿TOMA ALGÚN MEDICAMENTO CONTROLADO?
                        </div>
                         <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->medicamento_controlado : '' }}" 
                            name="pade[medicamento_controlado]" maxlength="40">
                        </div>
                        <div class="col-md-3 text-center">
                         MEDICAMENTO
                        </div>
                         <div class="col-md-4 text-center">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->padecimientos->medicamento_controlado_desc : '' }}" 
                            name="pade[medicamento_controlado_desc]" maxlength="40">
                        </div>
            </div>


  </div><!--edn formulario horizontal -->
  </div>
</div>