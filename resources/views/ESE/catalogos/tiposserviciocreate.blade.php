<div class="jumbotron">

  <!-- begin row 1 -->

  <div class="row">

    <div class="col-md-12">

      <div class="note note-success">

        <i class="fa fa-cubes fa-2x pull-left"></i>

        <h4>Servicio</h4>

      </div>

    </div>

  </div>



  <div class="row">

    <!-- begin col-4 -->

    <div class="col-md-6">



        <label>{{ Form::label('Descripcion', '* Nombre') }}</label>



        {{ Form::text('Descripcion',$Descripcion,['class' => 'form-control','placeholder'=>'Nombre','id'=>'Descripcion','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}



    </div>

    <div class="col-md-6">



        <label>{{ Form::label('Color', '* Seleccione el Color') }}</label>



        <input type="color" class="form-control" id="color" name="color" value="{{$color}}">

    </div>



  </div>

  <div class="row">

    <div class="col-md-12">



        <label>{{ Form::label('Informacion', '* Información') }}</label>



        <textarea class="form-control" name="Informacion" id="Informacion" rows="6" cols="80">{{$Info}}</textarea>



    </div>

  </div>

  <br>

  <div class="row">

    <div class="col-md-3 col-md-offset-8 text-left">

      <input type="submit" name="Guardar" value="Guardar Servicio" class="btn btn-success btn-block" onclick="hacer_click_TiposServicio({{ isset($IdTipoServicio)?$IdTipoServicio:'0' }})">

    </div>

  </div>



</div>

<input type="hidden" id="num_id" value="{{ isset($IdTipoServicio)?$IdTipoServicio:'' }}">



<!-- end row -->

</div>



<script type="text/javascript">

  document.getElementById("menu-ese").style.display = "block";

</script>

