
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Referencias Personales</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
        	<div id="refencia-personal-container">
                <div class="form-group">
                    <label class="col-md-2 text-center control-label">
                        <a  href="javascript:;" 
                            class="btn btn-circle btn-primary" 
                            id="add-row-referencia-personal">
                            <i class="fa fa-plus"></i>
                        </a>
                    </label>
                </div>
            @if( $estudio->formatoEvenplan )
                @foreach( $estudio->formatoEvenplan->referenciaPersonal as $index => $referencia )
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger btn-xs frm-submit-delete-referncia-personal"                          
                                data-id-delete-referncia-personal="{{ $referencia->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Quién da la referencia</label>
                        <div class="col-md-4">
                            <input type="hidden" class="form-control" name="referencias_personales[{{ $index }}][id]" value="{{ $referencia->id }}">
                            <input type="text" class="form-control" name="referencias_personales[{{ $index }}][da_referencia]" value="{{ $referencia->da_referencia }}">
                        </div>
                        <label class="col-md-2 control-label">Ocupación</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencias_personales[{{ $index }}][ocupacion]" value="{{ $referencia->ocupacion }}">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Domicilio</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="referencias_personales[{{ $index }}][domicilio]" value="{{ $referencia->domicilio }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencias_personales[{{ $index }}][telefono]" value="{{ $referencia->telefono }}">
                        </div>
                        <label class="col-md-2 control-label">Tiempo de conocerlo</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencias_personales[{{ $index }}][tiempo_conocerlo]" value="{{ $referencia->tiempo_conocerlo }}">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Relación con el candidato</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="referencias_personales[{{ $index }}][relacion_candidato]" value="{{ $referencia->relacion_candidato }}">
                        </div>
                     </div>

                    
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" name="referencias_personales[{{ $index }}][comentarios]">{{ trim( $referencia->comentarios ) }}</textarea>
                        </div>
                    </div> 
                @endforeach
            @else

                <div class="form-group">                
                    <label class="col-md-2 control-label">Quién da la referencia</label>
                    <div class="col-md-4">
                        <input type="hidden" class="form-control" name="referencias_personales[0][id]" value="0">
                        <input type="text" class="form-control" name="referencias_personales[0][da_referencia]" value="">
                    </div>
                    <label class="col-md-2 control-label">Ocupación</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_personales[0][ocupacion]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Domicilio</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="referencias_personales[0][domicilio]" value="">
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-2 control-label">Teléfono</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencias_personales[0][telefono]" value="">
                    </div>
                    <label class="col-md-2 control-label">Tiempo de conocerlo</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencias_personales[0][tiempo_conocerlo]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Relación con el candidato</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="referencias_personales[0][relacion_candidato]" value="">
                    </div>
                 </div>

                
                <div class="form-group">                
                    <label class="col-md-2 control-label">Comentarios</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="5" name="referencias_personales[0][comentarios]"></textarea>
                    </div>
                </div> 

            @endif  

            </div>  
            
            

        </div>
    </div>
</div>