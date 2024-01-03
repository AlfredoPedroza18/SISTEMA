@extends('layouts.masterMenuView')
@section('section')
    <div id="content" class="content">

        <ol class="breadcrumb ">
            <li><a href="javascript:;">Nómina</a></li>
            <li><a href="{{ url('/App') }}">APP</a></li>

        </ol>
        <br>
        <div class="row">
            <div class="col-md-12 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">APP</h4>
                    </div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif

                        <!-- se activa para subir apk -->

                        <!--
                        {{Form::open(array('url' => '/App','files'=>'true'))}}
                            <label>{{ Form::label('Instrucciones', 'Seleccione el archivo a subir.') }}</label>
                            {{Form::file('image')}}
                            <button type="submit" class="btn btn-primary">Subir</button>
                        {{Form::close()}}

                         -->
                        <br><br>
                        <div class="card text-center mb-3" >
                            <img class="card-img-top" src="assets/img/download.png" alt="Descarga">
                            <div class="card-body">
                                <h3 class="card-title">App Gen-T</h3>
                                <br>
                                <a href="{{url('/descarga-App')}}" class="btn btn-primary">Descargar</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div><br></div>
@endsection
@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
@endsection