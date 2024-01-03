<div class="jumbotron">
  <div class="row">
    <div class="col-md-12" >
	    <div class="note note-success">
				<i class="fa fa-cubes fa-2x pull-left"></i><h4>Códigos Postales</h4> 
			</div>	           					
		</div>
  </div>

  <div class="row">
    <div class="col-md-4">
			<div class="form-group block1" id="CodigoP">
        <label>{{ Form::label('Codigo Postal', '* Código Postal') }}</label>
       {{ Form::input('number','CodigoPostal',$CodigoPostal,['class' => 'form-control','placeholder'=>'Código Postal','id'=>'CodigoPostal','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
        <div id="alerta"></div>
      </div>
    </div>

    <div class="col-md-4">
			<div class="form-group block1" id="CodigoEst">
        <label>{{ Form::label('Estado', '* Estado') }}</label>
				{!! Form::select('IdEstado', $IdEstado, null, ['class'=>'form-control', 'id'=>'IdEstado','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','required' => 'required']) !!}
        <input type="hidden"  id="CodigoEstado" name="CodigoEstado" value="{{ $CodigoEstado or '' }}">
      </div>												
		</div>
    
    <div class="col-md-4">
        <div class="form-group block1">
          <label>{{ Form::label('Municipio', '* Municipio') }}</label>
            <select id="CodigoMunicipio" name="CodigoMunicipio" class="form-control" type="text" required>
            </select>  
            <!-- <input type="hidden"  id="IdMunicipio" name="IdMunicipio" value="{{ $IdMunicipio or '' }}">                    -->
        </div>												
    </div>
	</div>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group block1">
        <label>{{ Form::label('Localidad', '* Localidad') }}</label>
          <select id="CodigoLocalidad" name="CodigoLocalidad" class="form-control" type="text" required>
          </select>    
          <!-- <input type="hidden"  id="IdLocalidad" name="IdLocalidad" value="{{ $IdLocalidad or '' }}">                   -->
      </div>												
    </div>
  </div>

  <div class="row">
    <div class="col-md-3 col-md-offset-8 text-right">
      <input type="submit" id="Guardar" name="Guardar" value="Guardar Código Postal" class="btn btn-success btn-block" onclick="hacer_click_CodigoPostal({{ isset($IdCodigoPostal)?$IdCodigoPostal:'0' }})">
    </div>
  </div>
</div>
  <input type="hidden" id="num_id" value="{{ isset($IdCodigoPostal)?$IdCodigoPostal:'' }}">

</div>
