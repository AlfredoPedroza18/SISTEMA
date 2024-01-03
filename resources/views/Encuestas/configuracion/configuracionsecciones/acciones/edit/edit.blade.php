@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_acciones')}}">Acciones</a></li>
        <li class="active">
            Editar Acción
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Acción <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Acción <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="form-alta-tiposservicio" action="{{ route('encuestas_acciones_update',['id'=>$IdAccion])}}" method="POST">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Acción</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <input type="hidden" id="cliente" name="cliente" value="{{$IdAccion}}">
                            <label>Encuesta: {{$Cliente}}</label>
                            <br>
                            <br>
                    </div>

                    <div class="col-md-6">
                            <label>{{ Form::label ('Encuesta', '* Encuesta')}}</label>
                            <select class="form-control" name="encuesta" id="encuesta" onchange="" required>
                                    <option value="{{$IdEncuestaCliente}}">{{$DescripcionEncuestaOriginal}}</option>
                                    @foreach($queryEncuesta as $lista)
                                        @if($lista->DescripcionEncuesta <> $DescripcionEncuestaOriginal)
                                        <option value="{{$lista->IdEncuesta}}">{{$lista->DescripcionEncuesta}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('dimension', '* Dimensión')}}</label>
                            <select class="form-control" name="dimension" id="dimension" onchange="" required>
                                    <option value="{{$IdDimension}}">{{$DescripcionDimensionOriginal}}</option>
                                    @foreach($queryDimension as $lista)
                                        @if($lista->DescripcionDimension <> $DescripcionDimensionOriginal)
                                        <option value="{{$lista->IdDimension}}">{{$lista->DescripcionDimension}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>



                        <div class="col-md-6">
                            <label>{{ Form::label ('descripcion', '* Nombre la Acción')}}</label>
                            {{ Form::text('descripcion',$Descripcion,['class' => 'form-control','id'=>'descripcion','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
 
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('default', '* Default')}}</label>
                            <select class="form-control" name="default" id="default" onchange="" required>
                                    @if ($Predeterminado == "No")
                                        <option selected value="No">No</option>
                                        <option value="Si">Si</option>
                                    @else
                                        <option selected value="Si">Si</option>
                                        <option value="No">No</option>
                                    @endif
                            </select>
                        </div>

                    </div>
                    
                    <br>
                    <br>
        
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8 text-left">
                            <input type="submit" name="Guardar" value="Guardar Acción" class="btn btn-success btn-block">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="num_id" value="">
            </form>
        </div>
    </div>
</div>    
@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

@endsection
