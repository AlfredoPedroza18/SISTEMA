<div class="jumbotron">

  <!-- begin row 1 -->
    <div class="row">
        <div class="col-md-12" >
            <div class="note note-success">
                <i class="fa fa-cubes fa-2x pull-left"></i><h4>Regiones por Estado</h4> 
            </div>	           					
        </div>
    </div>
    
    <div class="row">
                            <!-- begin col-4 -->
        <div class="form-group col-md-4" id="Regiones">
            <label>{{ Form::label('Regiones', '* Regiones') }}</label>
            {!! Form::select('IdRegion', $IdRegion, null, ['class'=>'form-control', 'id'=>'IdRegion','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','required' => 'required']) !!}
            
        </div>	

        <div class="form-group col-md-4" id="CodigoEst">
            <label>{{ Form::label('Estado', '* Estado') }}</label>
            {!! Form::select('IdEstado', $IdEstado, null, ['class'=>'form-control', 'id'=>'IdEstado','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','required' => 'required']) !!}
            <input type="hidden"  id="CodigoEstado" name="CodigoEstado" value="{{ $CodigoEstado or '' }}">
        </div>	
        
        <div class="form-group col-md-4">
            <label>{{ Form::label('Municipio', '* Municipio') }}</label>
            <select id="CodigoMunicipio" name="CodigoMunicipio" class="form-control" type="text" required>
            </select>  
        </div>	
    </div>
                        
    <div class="row">
        <div class="col-md-3 col-md-offset-8 text-right">
            <input type="submit" name="Guardar" value="Guardar Región" class="btn btn-success btn-block" onclick="hacer_click_RegionesxEdo({{ isset($IdRegionEdo)?$IdRegionEdo:'0' }})">
        </div>
    </div>
                                      

<input type="hidden" id="num_id" value="{{ isset($IdRegionEdo)?$IdRegionEdo:'' }}">

 <!-- end row -->
</div>
