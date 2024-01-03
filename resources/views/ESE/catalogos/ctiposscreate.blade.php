<div class="jumbotron">

  <!-- begin row 1 -->

  <div class="row">

    <div class="col-md-12">

      <div class="note note-success">

        <i class="fa fa-cubes fa-2x pull-left"></i>

        <h4>Tipos de Servicio</h4>

      </div>

    </div>

  </div>



  <div class="row">

    <!-- begin col-4 -->

    <div class="col-md-6 form-group block1">



        <label>{{ Form::label('Descripcion', '* Nombre') }}</label>



        {{ Form::text('Descripcion',$Descripcion,['class' => 'form-control','placeholder'=>'Nombre','id'=>'Descripcion','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}



    </div>



    <div class="col-md-6 form-group block1">



        <label>{{ Form::label('Servicio', '* Servicio') }}</label>



        <select class="form-control" name="Tipos">

          <option value="">Selecione una opción....</option>

          @foreach ($tipoSercivio as $t)

            <option @if ($servicios == $t->IdTipoServicio) selected @endif value="{{$t->IdTipoServicio}}">{{$t->Descripcion}}</option>

          @endforeach



        </select>



    </div>



  </div>

  <br>

  <div class="row">

    <div class="col-md-3 col-md-offset-8 text-left">

      <input type="submit" name="Guardar" value="Guardar Tipo Servicio" class="btn btn-success btn-block" onclick="hacer_click_TiposServicio({{ isset($IdTipos)?$IdTipos:'0' }})">

    </div>

  </div>



</div>

<input type="hidden" id="num_id" value="{{ isset($IdTipos)?$IdTipos:'' }}">



<!-- end row -->

</div>



<script type="text/javascript">

  document.getElementById("menu-ese").style.display = "block";

</script>

