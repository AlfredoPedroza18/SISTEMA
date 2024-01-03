@extends('layouts.masterMenuView')
@section('section')
    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Administrador</a></li>
            <li>Configuración Cotizadores</li>
        </ol>
        <h1 class="page-header text-center">Configuración Cotizadores</h1>
        <br>
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Servicios</h4>
            </div>
            <div class="panel-body">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="list-group">
                                <a href="{{ url('modulo/administrador/servicios/ese') }}" class="list-group-item list-group-item-action">  Estudios Socioeconomicos (ESE) <i class="fa fa-2x fa-gears pull-left"></i></a>
                                <a href="{{ url('modulo/administrador/servicios/rys') }}" class="list-group-item list-group-item-action list-group-item-info">  Reclutamiento y seleccion (RyS) <i class="fa fa-2x fa-gears pull-left"></i></a>
                                <a href="{{ url('servicio_maquila') }}" class="list-group-item list-group-item-action">  Maquila <i class="fa fa-2x fa-gears pull-left"></i></a>
                                <a href="{{ url('listaPsicometricos') }}" class="list-group-item list-group-item-action list-group-item-info">  Pruebas Psicometricas <i class="fa fa-2x fa-gears pull-left"></i></a>
                                <a href="{{ url('servicios_generales') }}" " class="list-group-item list-group-item-action list-group-item-info">General <i class="fa fa-2x fa-gears pull-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
@endsection