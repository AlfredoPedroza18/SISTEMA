<!doctype html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIG-ERP-Gen-t Modulos</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
    {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/animate.min.css') !!}
    {!! Html::style('assets/css/style.min.css') !!}
    {!! Html::style('assets/css/style-responsive.min.css') !!}
    {!! Html::style('assets/css/theme/default.css" rel="styl') !!}
    {!! Html::style('assets/css/sweetalert.css') !!}
    {!! Html::style('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') !!}
    {!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') !!}
    {!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
    {!! Html::style('assets/plugins/gritter/css/jquery.gritter.css') !!}
    {!! Html::script('assets/plugins/pace/pace.min.js') !!}
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
<body>
<div id="content" class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <h2 class="page-header text-center">
                    SIG-ERP Modulos
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 animacion-modulos">
                <div class="widget widget-stats bg-green-lighter">
                    <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info text-center">
                        <h4> <br></h4>
                        <p>CRM</p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ url('/dashboard') }}"
                           @if( !Auth::user()->isAbleEnter('crm') )
                           onclick="moduloVencido('CRM')"
                                @endif>Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>

                        <!--a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a-->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animacion-modulos">
                <div class="widget widget-stats bg-purple">
                    <div class="stats-icon"><i class="fa fa-book"></i></div>
                    <div class="stats-info text-center">
                        <h4> <br></h4>
                        <p>ESE</p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ url('dashboardese') }}"
                           @if( !Auth::user()->isAbleEnter('ese') )
                           onclick="moduloVencido('Estudios Socioeconómicos')"
                                @endif>Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>