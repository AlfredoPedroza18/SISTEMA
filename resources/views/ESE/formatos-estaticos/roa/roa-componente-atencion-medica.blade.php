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
                 <input type="hidden" name="atencionmedica[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
            </div>
           </div>
        </div>
           <div class="form-group">
                <label class="col-md-4 control-label text-center">USTED Ó ALGUNO DE SUS FAMILIARES CERCANOS REQUIERE DE ATENCIÓN MÉDICA CONSTANTE? </label>
                <div class="col-md-7">
                    <select class="form-control" name="atencionmedica[atencion]">
                            <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->atencion->atencion == '1' ) selected="selected" @endif @endif>SI</option>
                            <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->atencion->atencion == '2' ) selected="selected" @endif @endif>NO</option>              
                    </select>
                 
                </div>
            </div>
             <div class="form-group">
                   <div class="row">
                       <div class="col-md-1 text-center">
                           ¿QUIËN?
                       </div>
                       <div class="col-md-1 text-center">
                           Esposa
                       </div>
                       <div class="col-md-1">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->quie_esposa : '' }}" 
                            name="atencionmedica[quie_esposa]">
                       </div>
                       <div class="col-md-1 text-center">
                           Hijos
                       </div>
                       <div class="col-md-1">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->quien_hijos : '' }}" 
                            name="atencionmedica[quien_hijos]">
                       </div>
                       <div class="col-md-1 text-center">
                           Padres
                       </div>
                       <div class="col-md-1">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->quien_padres : '' }}" 
                            name="atencionmedica[quien_padres]">
                       </div>
                       <div class="col-md-1 text-center">
                           Otros
                       </div>
                       <div class="col-md-1">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->quien_otros : '' }}" 
                            name="atencionmedica[quien_otros]">
                       </div>

                       <div class="col-md-2">
                           <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->quien_otros_desc : '' }}" 
                            name="atencionmedica[quien_otros_desc]">
                       </div>

                   </div>
            </div>
                <div class="form-group">
                     <div class="row">
                       <div class="col-md-2 text-center">
                           ¿CUÁL ES EL PADECIMIENTO?
                       </div>
                       <div class="col-md-8 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->cual_padecimiento : '' }}" 
                            name="atencionmedica[cual_padecimiento]" maxlength="255">
                       </div>
                    </div>
                </div>
                   <div class="form-group">
                     <div class="row">
                       <div class="col-md-2 text-center">
                           Tratamiento:
                       </div>
                       <div class="col-md-4 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->tratamiento : '' }}" 
                            name="atencionmedica[tratamiento]" maxlength="255">
                       </div>
                       <div class="col-md-2 text-center">
                           Frecuencia de visita médica:
                       </div>
                       <div class="col-md-4 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->frecuencia_medica : '' }}" 
                            name="atencionmedica[frecuencia_medica]" maxlength="255">
                       </div>
                    </div>
                </div>
             <div class="form-group">
                      <div class="row">
                       <div class="col-md-2 text-center">
                           EN CASO DE ACCIDENTE O EMERGENCIA, LLAMAR A:
                       </div>
                       <div class="col-md-4 text-center">
                            <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->accidente_llamar : '' }}" 
                            name="atencionmedica[accidente_llamar]" maxlength="255">
                       </div>
                       <div class="col-md-2 text-center">
                          TELEFONO:
                       </div>
                       <div class="col-md-4 text-center">
                            <input  type="number" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->atencion->accidente_telefono : '' }}" 
                            name="atencionmedica[accidente_telefono]"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                            min="1" max="99999999999999999999"
                             maxlength="15">
                       </div>
                    </div>
                </div>

     
   </div><!--edn formulario horizontal -->
  </div>
</div>