
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">IDIOMAS</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div id="idioma-container">

            @if($estudio->formatoMetlife)
                <div class="form-group">
                    <label class="col-md-2 col-md-offset-10 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-idioma">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Idiomas</strong>
                    </label>
                </div>
                @foreach ($estudio->formatoMetlife->idiomas as $indexidiomas => $idi)
                    <div class="form-group">
                        <label class="col-md-2 text-center control-label">
                            <a  href="javascript:;" 
                                class="btn btn-circle btn-danger frm-submit-delete-idioma"
                                data-id-delete-idioma="{{ $idi->id }}">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                        <label class="col-md-2 text-center control-label"><strong>IDIOMA</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>HABLADO <br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>LEÍDO <br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>ESCRITO <br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>COMPRENSION %</strong></label>
                      

                                     
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="idiomas_realizados[{{ $indexidiomas }}][id]" value="{{ $idi->id }}">
                        <div class="col-md-2 col-md-offset-2">
                            <input type="text" class="form-control" name="idiomas_realizados[{{ $indexidiomas }}][idioma]" value="{{ $idi->idioma }}" maxlength="255">
                        </div>
                        <div class="col-md-2">
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[{{ $indexidiomas }}][hablado]" value="{{ $idi->hablado }}" maxlength="3">
                        </div>
                        <div class="col-md-2">
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[{{ $indexidiomas }}][leido]" value="{{ $idi->leido}}" maxlength="3">
                        </div>
                        <div class="col-md-2 ">
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[{{ $indexidiomas }}][escrito]" value="{{ $idi->escrito }}" maxlength="3">
                        </div>
                        <div class="col-md-2">
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[{{ $indexidiomas }}][comprension]" value="{{ $idi->comprension }}" maxlength="3">
                        </div>
                      
                        
                    </div>    
                @endforeach

            @else                
                <div class="form-group">
                    <label class="col-md-2 text-center control-label">
                        <a href="javascript:;" class="btn btn-circle btn-primary" id="add-idioma">
                            <i class="fa fa-plus"></i>
                        </a> <strong>Agregar Idiomas</strong>
                    </label>
                        <label class="col-md-2 text-center control-label"><strong>IDIOMA %</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>HABLADO <br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>LEÍDO <br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>ESCRITO <br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>COMPRENSION %</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>%</strong></label>
                                 
                </div>
                <div class="form-group">
                    <input type="hidden" name="idiomas_realizados[0][id]" value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->idiomas->id : 0 }}">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" class="form-control" name="idiomas_realizados[0][idioma]" maxlength="255">
                    </div>
                     <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[0][hablado]" maxlength="3">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[0][leido]" maxlength="3">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[0][escrito]" maxlength="3">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[0][comprension]" maxlength="3">
                    </div>
                  
                </div>
            @endif


            </div>
        </div>
      
    </div>
</div>