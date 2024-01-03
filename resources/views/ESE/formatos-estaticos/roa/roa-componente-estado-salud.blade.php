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
                 <input type="hidden" name="enfer[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
            </div>
           </div>
        </div>
           <div class="form-group">
                <label class="col-md-2 control-label">¿CÓMO CONSIDERA SU ESTADO DE SALUD? </label>
                <div class="col-md-5">
                    <select class="form-control" name="enfer[estado_salud]">
                            <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->enfermedad->estado_salud == '1' ) selected="selected" @endif @endif>BUENA</option>
                            <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->enfermedad->estado_salud == '2' ) selected="selected" @endif @endif>REGULAR</option>
                            <option value="3" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->enfermedad->estado_salud == '3' ) selected="selected" @endif @endif>MALA</option>
              
                    </select>
                 
                </div>
            </div>
            <div class="form-group">
                   <div class="row">
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->anemia : '' }}" 
                            name="enfer[anemia]">
                         </div>
                         <div class="col-md-1">
                         ANEMIA
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->asma : '' }}" 
                            name="enfer[asma]">
                         </div>
                         <div class="col-md-1">
                         ASMA
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->gripe : '' }}" 
                            name="enfer[gripe]">
                         </div>
                         <div class="col-md-1">
                         GRIPE
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->presion_alta : '' }}" 
                            name="enfer[presion_alta]">
                         </div>
                         <div class="col-md-1">
                         PRESIÓN ALTA
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->epilepsia : '' }}" 
                            name="enfer[epilepsia]">
                         </div>
                         <div class="col-md-1">
                         EPILEPSIA
                         </div>
                        
                   </div>
            </div>
            <div class="form-group">
                   <div class="row">
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->gastritis : '' }}" 
                            name="enfer[gastritis]">
                         </div>
                         <div class="col-md-1">
                         GASTRITIS
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->espalda : '' }}" 
                            name="enfer[espalda]">
                         </div>
                         <div class="col-md-1">
                         ESPALDA
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->migrania : '' }}" 
                            name="enfer[migrania]">
                         </div>
                         <div class="col-md-1">
                         MIGRAÑA
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->presion_baja : '' }}" 
                            name="enfer[presion_baja]">
                         </div>
                         <div class="col-md-1">
                         PRESIÓN BAJA
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->problemas_cardiacos : '' }}" 
                            name="enfer[problemas_cardiacos]">
                         </div>
                         <div class="col-md-1">
                         PROBLEMAS CARDIACOS
                         </div>
                        
                   </div>
            </div>
             <div class="form-group">
                   <div class="row">
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->ulcera : '' }}" 
                            name="enfer[ulcera]">
                         </div>
                         <div class="col-md-1">
                         ULCERA
                         </div>
                         <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->artritis : '' }}" 
                            name="enfer[artritis]">
                         </div>
                         <div class="col-md-1">
                         ARTRITIS
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->bronquitis : '' }}" 
                            name="enfer[bronquitis]">
                         </div>
                         <div class="col-md-1">
                         BRONQUITIS
                         </div>
                          <div class="col-md-1">
                          <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->enfermedad->rinon : '' }}" 
                            name="enfer[rinon]">
                         </div>
                         <div class="col-md-1">
                         RIÑON
                         </div>
                        
                        
                   </div>
            </div>


  </div><!--edn formulario horizontal -->
  </div>
</div>