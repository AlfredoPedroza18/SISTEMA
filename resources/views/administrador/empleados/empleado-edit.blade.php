@extends('layouts.masterMenuView')
@section('section')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{url('css.css')}}">
</head>
<body>
    <div class="content">
     <ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>
        <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li>
        <li><a href="{{route('sig-erp-crm::empleados.index')}}">Empleados</a></li>
        <li>Alta Empleados</li>
    </ol>
    <h1 class="page-header text-center">Empleados<small>Alta</small></h1>
    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Empleados <small>Alta</small></h4>
        </div>
        <div class="panel-body">
            {!! Form::open(["action"=>"Administrador\EmpleadoController@store", 'class'=>'altaempleado']) !!}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('Nombre', 'Nombre (s):') !!}
                        {!! Form::text('Nombre', null, ['class'=>'form-control', 'id'=>'Nombre', 'required'=>'required', 'placeholder'=>'Nombre (s)']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('APaterno', 'Apellido paterno:') !!}
                        {!! Form::text('APaterno', null, ['class'=>'form-control', 'id'=>'APaterno', 'required'=>'required', 'placeholder'=>'Apellido paterno']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('AMaterno', 'Apellido materno:') !!}
                        {!! Form::text('AMaterno', null, ['class'=>'form-control', 'id'=>'AMaterno', 'required'=>'required', 'placeholder'=>'Apellido materno']) !!}<br/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('Curp', 'CURP:') !!}
                        {!! Form::text('Curp', null, ['class'=>'form-control', 'id'=>'Curp', 'required'=>'required', 'placeholder'=>'CURP']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('Nickname', 'Nickname:') !!}
                        {!! Form::text('Nickname', $IdCliente, ['class'=>'form-control', 'id'=>'Nickname', 'required'=>'required', 'readonly', 'placeholder'=>'.Nombre'.'.Apellido_Paterno'.'.Apellido_Materno'.'.Curp']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('Password', 'Password:') !!}
                        <input name="Password" type="password" class="form-control" id="Password" required/><br/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('Telefono', 'Telefono:') !!}
                        {!! Form::text('Telefono', null, ['class'=>'form-control', 'id'=>'Telefono', 'required'=>'required', 'placeholder'=>'1234567890']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('Email', 'Correo:') !!}
                        {!! Form::email('Email', null, ['class'=>'form-control', 'id'=>'Email', 'required'=>'required', 'placeholder'=>'correo@dominio.com']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('Cliente', 'Cliente:') !!}<br/>
                        {!! Form::label('Cliente', 'sig_erp_demo', ['class'=>'form-control', 'required'=>'required']) !!}<br/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group block1">
                        {!! Form::label('Empresa', 'Empresa:') !!}
                        {!! Form::select('Empresa', $IdEmpresa, null, ['class'=>'form-control', 'id'=>'Empresa', 'required'=>'required', 'placeholder'=>'Selecciona una opci&oacute;n']) !!}<br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('Activo', 'Activo:') !!}
                        {!! Form::select('Activo', ['1'=>'Si','2'=>'No'], null, ['class'=>'form-control', 'id'=>'Activo', 'required'=>'required', 'placeholder'=>'Selecciona una opci&oacute;n']) !!}<br/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-8 text-right">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
</body>
</html>
@endsection
@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
    {!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}npm run dev
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
    {!! Html::script('assets/js/jquery.numeric.min.js') !!}
@endsection