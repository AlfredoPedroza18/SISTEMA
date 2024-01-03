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
        .social-network a.icoRss:hover i, a.icoGoogle:hover i{
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
<body>
<div class="content">
    <ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>
        <li>Usuarios</li>
    </ol>
        <h1 class="page-header text-center">Descargas  <i class="fas fa-download"></i></h1>
                <div class="jumbotron text-center">
                    <div class="row">
                    <div class="col-md-2 "  id="em">
                        <ul class="social-network social-circle">
                            <li>
                                <a href="{{ url('descargas-op') }}" id="usuario" class="icoGoogle" title="Software Operativo"><i class="fas fa-laptop-code fa-2x"></i>
                                </a>
                                <h5 class="text-center">Software-Operativo</h5>
                            </li>
                        </ul>
                    </div>     
                    <div class="col-md-2 " id="em">
                        <ul class="social-network social-circle">
                            <li>
                                <a href="{{ url('descargas-em') }}" class="icoRss" title="App-Empleados"><i class="fas fa-mobile-alt fa-2x"></i>
                                </a>
                                <h5  class="text-center">App-Empleados</h5>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>

              
                <h4 class="panel-title">Software-Operativo 
                 
                </h4>
            </div>
        <div class="panel-body">
                
        </div>
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
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
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