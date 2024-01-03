@extends('layouts.masterMenuView')
@section('section')
        <!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">

        ul.social-network {
            list-style: none;
            display: inline;
            margin-left:0 !important;
            padding: 0;
        }
        ul.social-network li {
            display: inline;
            margin: 0 5px;
        }
        .social-network a.icoRss:hover {
            background-color: #348fe2;
        }
        .social-network a.icoRssDiana:hover {
            background-color: #33bdbd;
        }
        .social-network a.icoRss:hover i,a.icoRssDiana:hover i, a.icoGoogle:hover i{
            color:#fff;
        }
        .social-network a.icoGoogle:hover {
            background-color: #BD3518;
        }

        a.socialIcon:hover, .socialHoverClass {
            color:#44BCDD;
        }
        .social-circle li a {
            display:inline-block;
            position:relative;
            margin:0 auto 0 auto;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;
            text-align:center;
            width: 6.5em;
            height: 6.5em;
            font-size:10px;
            background-color: #D8D8D8;
        }
        .social-circle li i {
            margin:0;
            line-height:3em;
            text-align: center;
        }
        .social-circle li a:hover i, .triggeredHover {
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -ms--transform: rotate(360deg);
            transform: rotate(360deg);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            -ms-transition: all 0.2s;
            transition: all 0.2s;
        }
        .social-circle i {
            color: #3a3a3a;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }
        .jumbotron{
            padding-top: 12px;
            padding-bottom:0px;
            height:100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        #em{
            padding-left: 30px;
        }
        .col-md-2{
            width: auto;
            padding-left: 30px;
        }


    </style>
</head>

<div id="content" class="content">

    <ol class="breadcrumb ">
        <li><a href="javascript:;">Perfil</a></li>
        <li><a href="{{ url('cuenta-de-usuario') }}">Cuenta de Usuario</a></li>

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
                    <h4 class="panel-title">Cuenta de Usuario</h4>
                </div>


                <div class=" card panel-body">
                <input type="hidden" name="nombreEmpresa" id="nombreEmpresa" value="{{ $empresa }}">
                    <!--   <div class="card-header">Change password</div>  -->

                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{!! $username !!}" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" value="{!! $password !!}" disabled>
                                <span class="help-block"></span>
                                <a href="{{ url('cambiar-contrasena') }}">Editar</a>
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
<script type="text/javascript">
        var empN=$("#nombreEmpresa").val();
        $("#empnombre").html(empN); 
        
</script>
@endsection
