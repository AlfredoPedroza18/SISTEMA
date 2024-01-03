
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">ESCOLARIDAD</h4>
    </div>

    <div class="panel-body">
        <div class="form-horizontal">
            <div id="escolaridad-container">
            @if($estudio->formatoRoa)
                <div class="form-group">
                    <label class="col-md-5 col-md-offset-7 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-escolaridad">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Escolaridad </strong>
                    </label>
                </div>
                @foreach ($estudio->formatoRoa->escolariRoa as $index =>$esco)


                    <div class="form-group">
                        <label class="col-md-1 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-escolaridad"
                                data-id-delete-escolaridad="{{ $esco->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        
                        <label class="col-md-2 text-center control-label"><strong>GRADO</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>INSTITUCIÓN</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>DOMICILIO</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>PERIODO</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>AÑOS</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>COMPROBANTE</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>FOLIO</strong></label>
                                     
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="escolaridad[{{ $index }}][id]" value="{{ $esco->id }}">
                        <div class="col-md-2  col-md-offset-1">
                            <input type="text"  maxlength="255" class="form-control" name="escolaridad[{{ $index }}][grado]" value="{{ $esco->grado }}">
                        </div>
                        <div class="col-md-2">
                             <input type="text" class="form-control" name="escolaridad[{{ $index }}][institucion]" value="{{ $esco->institucion}}">
                        </div>
                         <div class="col-md-2">
                             <input type="text" class="form-control" name="escolaridad[{{ $index }}][domicilio]" value="{{ $esco->domicilio}}">
                        </div>
                         <div class="col-md-1">
                            <input type="text"  maxlength="255" class="form-control" name="escolaridad[{{ $index }}][periodos]" value="{{ $esco->periodos }}">
                        </div>
                         <div class="col-md-1">
                            <input type="text"  maxlength="255" class="form-control" name="escolaridad[{{ $index }}][años]" value="{{ $esco->años }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text"  maxlength="255" class="form-control" name="escolaridad[{{ $index }}][comprobante]" value="{{ $esco->comprobante }}">
                        </div>
                        <div class="col-md-1">
                            <input type="text"  maxlength="255" class="form-control" name="escolaridad[{{ $index }}][folio]" value="{{ $esco->folio }}">
                        </div>
                        
                        
                        
                    </div>    
                @endforeach

            @else                
                <div class="form-group">
                    <label class="col-md-5 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-escolaridad">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Escolaridad </strong>
                    </label>
                        <label class="col-md-2 text-center control-label"><strong>GRADO</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>INSTITUCIÓN</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>DOMICILIO</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>PERIODO</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>AÑOS</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>COMPROBANTE</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>FOLIO</strong></label>
                                     
                                 
                </div>
                <div class="form-group">
    <input type="hidden" name="escolaridad[0][id]" value="{{ isset( $estudio->formatoRoa) ? $estudio->$estudio->formatoRoa->escolariRoa->id : 0 }}">
                    <div class="col-md-2  col-md-offset-1">
                        <input type="text"  maxlength="255" class="form-control" name="escolaridad[0][grado]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="escolaridad[0][institucion]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="escolaridad[0][domicilio]">
                    </div>
                    <div class="col-md-1">
                        <input type="text" maxlength="255" class="form-control" name="escolaridad[0][periodos]">
                    </div>
                    <div class="col-md-1">
                        <input type="text" maxlength="255" class="form-control" name="escolaridad[0][años]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" maxlength="255" class="form-control" name="escolaridad[0][comprobante]">
                    </div> 
                    <div class="col-md-1">
                        <input type="text" maxlength="255" class="form-control" name="escolaridad[0][folio]">
                    </div>        
                </div>
            @endif


            </div>

             <div class="form-group">
                 <div class="row">
                    <div class="col-md-4 text-right">
                        Si es trunco, ¿Por qué abandonó sus estudios?
                    </div>
                     <div class="col-md-8">
                       <input type="hidden" name="abandono[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                           <input type="text"  class="form-control" 
                           value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->abandonoEscolar->si_tunco : '' }}" 
                           name="abandono[si_tunco]" 
                           >
                    </div>
                 </div>
                  <div class="row">
                    <div class="col-md-4 text-right">
                        Si es trunco, ¿Por qué abandonó sus estudios?
                    </div>
                     <div class="col-md-8">
                           <input type="text"  class="form-control" 
                           value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->abandonoEscolar->si_estudiando : '' }}" 
                           name="abandono[si_estudiando]" 
                           >
                    </div>
                 </div>
             </div>
              <div class="form-group">
                 <div class="row">
                    <div class="col-md-4 text-right">
                        Observaciones;
                    </div>
                     <div class="col-md-8">
                       <input type="hidden" name="obsesc[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                           <input type="text"  class="form-control" 
                           value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->ObsEscolar->observaciones : '' }}" 
                           name="obsesc[observaciones]" 
                           >
                    </div>
                     

                 </div>
             </div>

        </div>
      
    </div>
</div>