<!doctype html>
<html lang="en" class="ie8">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIG-ERP-Gen-t</title>
    <meta content="" name="description" />
    <meta content="" name="author" />
    @include('librerias.login.login-styles')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/pace/pace.min.js"></script>
</head>
<body class="pace-top bg-white">
    <div id="page-loader" class="fade in">
        <span class="spinner">
        </span>
    </div>
    <div id="page-container" class="fade">
        <div class="login login-with-news-feed">
            <div class="news-feed">
                <div class="news-image">
                    <img src="assets/img/login-bg/gen-t-recursos-humano.jpg" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <p>
                    <h4 class="caption-title text-center">
                        <i class="fa fa-diamond "  aria-hidden="true">
                        </i>
                        Servicios profesionales en recursos humanos
                    </h4>
                </div>
            </div>
            <div class="right-content">
                <div class="login-header">
                    <div class="brand text-center">
                        <img src="assets/img/login-bg/GenTLogo.png" data-id="login-cover-image" alt="" class="logo-principal" />
                        <span class="logo"></span>SIG-ERP Bienvenido
                        <small>Proporciona tu usuario y contraseña</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <div class="login-content">

                    {{ csrf_field() }}
                    <div class="form-group m-b-15">
                        <div class="" id="warning-username">
                            {!! Form::label('username', 'Usuario:') !!}
                            {!! Form::text('username', null, ['id'=>'username', 'class'=>'form-control input-lg', 'placeholder'=>'Usuario', 'required'=>'required']) !!}
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-b-15">
                        <div class="" id="warning-passw">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['id'=>'password', 'class'=>'form-control input-lg', 'placeholder'=>'Password', 'required'=>'required']) !!}
                            @if($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg" id="sub">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                    </div>
                    <br>
                    <div class="icon text-center">
                        <a href="https://www.facebook.com/GenTOutsourcing/?ref=hl"><i class="fa fa-3x fa-facebook-square"></i></a>
                        <a href="https://twitter.com/GenTOutsourcing"><i class="fa fa-3x fa-twitter-square"></i></a>
                        <a href="https://www.linkedin.com/company/gen-t"><i class="fa fa-3x fa-linkedin-square"></i></a>
                    </div>
                    <p class="text-center text-inverse">
                        Sistema desarrollado por <a href="http://union-informatica.com/">Unión Informatica</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="assets/js/apps.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $(document).ready(function() {
            App.init();
            $('#sub').click(function(){
                    Swal.fire({
                        title: '¿Con qué usuario desea acceder?',
                        buttons:{
                            cancel:'Close',
                        },
                        html:
                            '<div class="row">\n' +
                            '                @if($staff)\n' +
                            '                    <div class="col-md-4 col-sm-6 animacion-modulos">\n' +
                            '                        <div class="widget widget-stats bg-green-lighter">\n' +
                            '                            <div class="stats-icon">\n' +
                            '                                <i class="fa fa-users">\n' +
                            '                                </i>\n' +
                            '                            </div>\n' +
                            '                            <div class="stats-info text-center">\n' +
                            '                                <h4><br></h4>\n' +
                            '                                <p>Staff</p>\n' +
                            '                            </div>\n' +
                            '                            <div class="stats-link">\n' +
                            '                                <a href="{{route("mod")}}">\n' +
                            '                                    Ingresar\n' +
                            '                                    <i class="fa fa-arrow-circle-o-right">\n' +
                            '                                    </i>\n' +
                            '                                </a>\n' +
                            '                            </div>\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '                @endif\n' +
                            '                @if($empleado_cliente)\n' +
                            '                        <div class="col-md-4 col-sm-6 animacion-modulos">\n' +
                            '                            <div class="widget widget-stats bg-purple">\n' +
                            '                                <div class="stats-icon">\n' +
                            '                                    <i class="fa fa-users">\n' +
                            '                                    </i>\n' +
                            '                                </div>\n' +
                            '                                <div class="stats-info text-center">\n' +
                            '                                    <h4><br></h4>\n' +
                            '                                    <p>Usuario/Empleado</p>\n' +
                            '                                </div>\n' +
                            '                                <div class="stats-link">\n' +
                            '                                    <a href="#">\n' +
                            '                                        Ingresar\n' +
                            '                                        <i class="fa fa-arrow-circle-o-right">\n' +
                            '                                        </i>\n' +
                            '                                    </a>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                        </div>\n' +
                            '                    @endif\n' +
                            '            </div>',
                    });
            });
        });
    </script>
</body>
</html>