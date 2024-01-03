@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
<!-- <li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li> -->
		<li><a href="{{route('catalogo_servicios')}}">Catálogo de Servicio</a></li>
		<li>Edición Catálogo de Servicio</li>
   </ol>
<h1 class="page-header text-center">Catálogo de Servicio <small>Edición</small></h1>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <h4 class="panel-title">Catálogo de Servicio <small>Edicion</small></h4>
        </div>
        
        <div class="panel-body">
        {!! Form::model($IdTipoServicio,
        ['route'=>['CatalogoTiposServicioEncuesta.update',$IdTipoServicio],
        'id'=>'form-alta-tiposservicio','method'=>'PUT'])
        !!}
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

                    <label>{{ Form::label('Descripcion', '* Descripción') }}</label>

                    {{ Form::text('Descripcion',$Descripcion,['class' => 'form-control','placeholder'=>'Descripción','id'=>'Descripcion','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}

                </div>
                <div class="col-md-6">

                    <label>{{ Form::label('Color', '* Seleccione el Color') }}</label>

                    <input type="color" class="form-control" id="color" name="color" value="{{$color}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">

                    <label>{{ Form::label('Informacion', '* Información') }}</label>

                    <textarea class="form-control" name="Informacion" id="Informacion" rows="6" cols="80">{{$Info}}</textarea>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3 col-md-offset-8 text-left">
                <input type="submit" name="Guardar" value="Guardar Servicio" class="btn btn-success btn-block" >
                </div>
            </div>

            </div>
            <input type="hidden" id="num_id" value="{{ isset($IdTipoServicio)?$IdTipoServicio:'' }}">

            <!-- end row -->
            </div>
            {!! Form::close() !!}
@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

<script type="text/javascript">

    $(document).ready(function(){});

</script>


<script>


    </script>
