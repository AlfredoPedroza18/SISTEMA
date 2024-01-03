@extends('layouts.masterMenuView')
@section('section')
    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;"></a></li>
            <li><a href="#"></a></li>
            <li></li>
        </ol>
        <h1 class="page-header text-center"></h1>

        <div class="row">
            <div class="col-md-12 text-right">
                <a href="#" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip"
                   data-placement="top" title="Añadir Empleados">
                    <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
                </a>
                <label>Añadir </label>
            </div>
        </div>
        <br>
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                                class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                                class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                       data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                       data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>
@endsection

@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
@endsection