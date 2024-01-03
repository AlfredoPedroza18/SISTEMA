<?php
    function activarLink($url=''){
        return Request::is($url)?'active':'*';
    }
?>
<!doctype html>
<html lang="es" class="ie8">
<head>
    <title>SIG-ERP-Gen-t @yield('title')</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {!! Html::style('assets/css/sweetalert.css') !!}
    {!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
    {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/animate.min.css') !!}
    {!! Html::style('assets/css/style.min.css') !!}
    {!! Html::style('assets/css/style-responsive.min.css') !!}
    {!! Html::style('assets/css/theme/default.css') !!}
    {!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.css') !!}
    {!! Html::style('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') !!}
    {!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') !!}
    {!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
    {!! Html::style('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
    {!! Html::style('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') !!}
    {!! Html::style('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}
    {!! Html::style('assets/plugins/gritter/css/jquery.gritter.css') !!}
    {!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.js') !!}
    {!! Html::style('assets/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('assets/css/mapa.css') !!}
    {!! Html::style('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/bootstrap-wizard/css/bwizard.min.css') !!}
    {!! Html::style('assets/plugins/parsley/src/parsley.css') !!}
    {!! Html::style('assets/plugins/jquery-tag-it/css/jquery.tagit.css') !!}
    {!! Html::style('assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css') !!}
    {!! Html::style('assets/plugins/fullcalendar/fullcalendar.min.css') !!}
    {!! Html::style('assets/css/chosen.css') !!}
    @yield('estilos')
    {!! Html::script('assets/plugins/pace/pace.min.js') !!}
    <!--{!! Html::style('assets/plugins/drop-zone/dropzone.css') !!}-->

    <style type="text/css">
        ul.cotizador-social-network {
            list-style: none;
            display: inline;
            margin-left:0 !important;
            padding: 0;
        }
        ul.cotizador-social-network li {
            display: inline;
            margin: 0 5px;
        }
        .cotizador-social-circle li a {
            display:inline-block;
            position:relative;
            margin:5px auto 0 auto;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;
            text-align:center;
            width: 2em;
            height: 2em;
            font-size:20px;
            background-color: #D8D8D8;
        }
        .cotizador-social-circle li i {
            margin:0;
            line-height:2em;
            text-align: center;
        }
        .cotizador-social-network a.icoRss:hover {
            background-color: #F56505;
        }
        .cotizador-social-network a.icoRss:hover i {
            color:#fff;
        }
        .cotizador-social-circle li a:hover i, .triggeredHover {
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
        .cotizador-social-circle i {
            color: #fff;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }
    </style>
</head>
@yield('head')
<body>
    <div id="page-loader" class="fade in ">
        <span class="spinner">
        </span>
    </div>
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed  ">
        <div id="header" class="header navbar navbar-default navbar-fixed-top hidden-print">
        <div class="container-fluid">
                <div class="navbar-header">
                <a href="{{ url('/home') }}" class="navbar-brand">
                    <span class="navbar-logo">
                    </span> SIG-ERP
                </a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
                <div class="collapse navbar-collapse pull-left" id="top-navbar">
                    <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-th-large fa-fw"></i> Catálogos <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cubes fa-fw"></i>
                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Dar de alta un Cliente en el sistema SIG-ERP"></span>
                                            Clientes
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-file-text-o fa-fw"></i>
                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de cotizaciones del sistema SIG-ERP"></span>
                                            Cotizaciones
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-file-text fa-fw"></i>
                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de contratos del sistema SIG-ERP"></span>
                                            Contratos
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-reorder fa-fw"></i>
                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de contratos del sistema SIG-ERP"></span>
                                            Ordenes de servicio
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <li class="dropdown">
                            <ul class="cotizador-social-network cotizador-social-circle">
                                <li>
                                    <a href="javascript:;" class="icoRss text-center popovers"
                                       data-trigger="focus"
                                       data-html="true"
                                       data-container="body"
                                       data-placement="bottom"
                                       data-content='
                                                            <table class="table table-hover table-condensed">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Gen-T</td>
                                                                        <td>
                                                                            <a 	class="btn btn-circle btn-icon-only btn-success"
                                                                                href="#">
                                                                                <i class="fa fa-calculator"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Genérico</td>
                                                                        <td>
                                                                            <a 	class="btn btn-circle btn-icon-only btn-primary"
                                                                                href="#">
                                                                                <i class="fa fa-calculator"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                    '
                                       data-original-title="<strong>Tipo de cotizador</strong>">
                                        <i class="fa fa-calculator">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">
                                </span>
                            <b class="caret">
                            </b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow">
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-btn fa fa-gears">
                                    </i> Administrador
                                </a>
                            </li>
                            <li role="separator" class="divider">
                            </li>
                            <li>
                                <a href="#">
                                            <span class="fa fa-pencil-square-o pull-right">
                                            </span>Carta tipo
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-btn fa-sign-out">
                                    </i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
        <div id="sidebar" class="sidebar hidden-print">
        <div data-scrollbar="true" data-height="100%">
            <ul class="nav" >
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"></a>
                    </div>
                    <div class="info">
                        Empresa Gen-T
                        <small>SIG-ERP</small>
                    </div>
                </li>
            </ul>
            <ul class="nav" >
                <li class="nav-header">Navegación</li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-briefcase"></i>
                        <span id="">Perfil</span>
                    </a>
                    <ul class="sub-menu" >
                        <li class="#">
                            <a href="#">Información personal</a>
                        </li>
                        <li class="#">
                            <a href="#">Cuenta de usuario</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-briefcase"></i>
                        <span id="">Nómina</span>
                    </a>
                    <ul class="sub-menu" >
                        <li class="#">
                            <a href="#">Recibos de nómina</a>
                        </li>
                        <li class="#">
                            <a href="#">Facturación</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-briefcase"></i>
                        <span id="">Configuración</span>
                    </a>
                    <ul class="sub-menu" >
                        <li class="#">
                            <a href="#">Perfil del cliente</a>
                        </li>
                        <li class="#">
                            <a href="#">Administrar cuentas de usuario</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-briefcase"></i>
                        <span id="">Soporte</span>
                    </a>
                    <ul class="sub-menu" >
                        <li class="#">
                            <a href="#">Información de contacto</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                        <i class="fa fa-angle-double-left">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('section')
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    </div>
    <?php
    ?>
    @yield('js-base')
    @yield('endsection')
    <script>
        $(document).ready(function() {
            App.init();
            Dashboard.init();
            $('[data-toggle="tooltip"]').tooltip();
            $('.popovers').popover()
            $("#modulo-crm").click(function(){
                url = '{{url('dashboard')}}';
                $(location).attr('href',url);
            });
            $("#modulo-ese").click(function(){
                url = '{{url('dashboardese')}}';
                $(location).attr('href',url);
            });
        });
    </script>
</body>
</html>
@yield('endhtml')
