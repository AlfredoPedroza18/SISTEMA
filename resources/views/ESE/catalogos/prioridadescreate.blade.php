<div class="jumbotron">

  <!-- begin row 1 -->

  <div class="row">

    <div class="col-md-12">

      <div class="note note-success">

        <i class="fa fa-cubes fa-2x pull-left"></i>

        <h4>Prioridades</h4>

      </div>

    </div>

  </div>



  <div class="row">

    <!-- begin col-4 -->

    <div class="col-md-6">

      <div class="form-group block1">



        <label>{{ Form::label('Descripcion', '* Nombre') }}</label>



        {{ Form::text('Descripcion',$Descripcion,['class' => 'form-control','placeholder'=>'Nombre','id'=>'Descripcion','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}

      </div>

    </div>



    <div class="col-md-6">

      <div class="form-group block1">



        <label>{{ Form::label('Tiempo', '* Tiempo en Días') }}</label>

        <select class="form-control" name="dias" id="dias">

          <option value="">Selecione una opción</option>

          @for ($i=1; $i < 21; $i++)

            <option @if ($Dias == $i) selected @endif value="{{$i}}">Dia(s) {{$i}}</option>

          @endfor



        </select>

      </div>

    </div>



  </div>



  <div class="row">

    <div class="col-md-3 col-md-offset-8 text-right">

      <input type="submit" name="Guardar" value="Guardar Prioridad" class="btn btn-success btn-block" onclick="hacer_click_Prioridades({{ isset($IdPrioridad)?$IdPrioridad:'0' }})">

    </div>

  </div>



</div>

<input type="hidden" id="num_id" value="{{ isset($IdPrioridad)?$IdPrioridad:'' }}">



<!-- end row -->

</div>

