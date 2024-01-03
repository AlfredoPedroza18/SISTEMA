<div class="jumbotron">
  <!-- begin row 1 -->
  <div class="row">
    <div class="col-md-12">
      <div class="note note-success">
        <i class="fa fa-cubes fa-2x pull-left"></i>
        <h4>Aviso de Privacidad</h4>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- begin col-4 -->
    <div class="col-md-8">
      <div class="form-group block1">

        <label>{{ Form::label('Contenido', '* Contenido') }}</label>

        {{ Form::textarea('Contenido',$Contenido,['class' => 'form-control','placeholder'=>'Contenido','id'=>'Contenido','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group block1">

        <label>{{ Form::label('Activo', '* Activo') }}</label>

        <select class="form-control" name="Activo" id="Activo">
          <option @if ($Activo == 'Si') selected @endif value="Si">Si</option>
          <option @if ($Activo == 'No') selected @endif value="No">No</option>
        </select>
      </div>
    </div>



  </div>

  <div class="row">
    <div class="col-md-3 col-md-offset-8 text-right">
      <input type="submit" name="Guardar" value="Guardar Aviso de Privacidad" class="btn btn-success btn-block" onclick="hacer_click_TiposServicio({{ isset($IdAvisoPriv)?$IdAvisoPriv:'0' }})">
    </div>
  </div>

</div>
<input type="hidden" id="num_id" value="{{ isset($IdAvisoPriv)?$IdAvisoPriv:'' }}">

<!-- end row -->
</div>
