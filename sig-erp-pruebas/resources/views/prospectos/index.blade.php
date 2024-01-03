<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/register_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:53:00 GMT -->
<head>
	<meta charset="utf-8" />
	<title>SIG-ERP GEN-T | Prospectos</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	{!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
	{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
	{!! Html::style('assets/css/animate.min.css') !!}
	{!! Html::style('assets/css/style.min.css') !!}
	{!! Html::style('assets/css/style-responsive.min.css') !!}
	
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('assets/plugins/pace/pace.min.js') !!}
	<!-- ================== END BASE JS ================== -->
    {!! Html::script('assets/img/favi-ico/favicon-16x16.png',['rel'=>'shortcut icon','type'=>'image/png']) !!}
    
    <style type="text/css">
        .logo-principal{

            width: 40%;
            height: 60%;
        }
        
    </style>
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    {{ HTML::image('assets/img/login-bg/bg-8.jpg') }}
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-diamond"></i> Servicios profesionales en recursos humanos</h4>
                    
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <div class="text-center">
                    {{ HTML::image('assets/img/login-bg/GenTLogo.png','',['class'=>'logo-principal']) }}                    
                </div>
                <h1 class="register-header text-center">
                    Bienvenido
                    <small>Para poder darte un servicio adecuado llena los campos.</small>
                </h1>
                <div class="col-md-10 col-md-offset-1 alert alert-success text-center" id="mensaje-success">
                    <h5>¡Gracias, el registro se ha guardado con éxito!. <br>En breve un asesor se pondra en contacto.</h5>
                </div>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                   {!! Form::open(['url' => 'prospecto/contacto/guardar','method' => 'post']) !!}
                   <input type="hidden" name="csrf-token" value="{{ csrf_token() }}>
                        <label class="control-label">Nombre/Empresa</label>
                        <div class="row row-space-10">
                            <div class="col-md-12 m-b-15">
                                <input type="text" name="nombre_comercial" class="form-control" placeholder="Ingrese su Nombre..." required="required" />
                            </div>


                            <!--div class="col-md-6 m-b-15">
                                <input type="text" class="form-control" placeholder="Last name" />
                            </div-->
                        </div>
                        <label class="control-label">Estado</label>
                         <div class="row row-space-10">
                            <div class="col-md-12 m-b-15">
                                {{ Form::select('id_cn',$estados,null,['class'=>'form-control','data-parsley-group'=>'wizard-step-1','id'=>'id_cn','style'=>'width: 100%','required'=>'required']) }}
                            </div>
                            <!--div class="col-md-6 m-b-15">
                                <input type="text" class="form-control" placeholder="Last name" />
                            </div-->
                        </div>
                        
                        <label class="control-label">Teléfono</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="tel" name="telefono1" class="form-control" placeholder="Ingrese su Teléfono" required="required" maxlength="13" minlength="10" />
                            </div>
                        </div>
                        <label class="control-label">Email</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="email" name="correo1" class="form-control" placeholder="Ingrese su Email" required="required"/>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Registrarse</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 icon text-center">
                            
                                <a href="https://www.facebook.com/GenTOutsourcing/?ref=hl"><i class="fa fa-3x fa-facebook-square"></i></a>
                                <a href="https://twitter.com/GenTOutsourcing"><i class="fa fa-3x fa-twitter-square"></i></a>
                                <a href="https://www.linkedin.com/company/gen-t"><i class="fa fa-3x fa-linkedin-square"></i></a>
                            
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            Sistema desarrollado por <a href="http://union-informatica.com/">Unión Informatica</a>
                        </p>
                    {!! Form::close() !!}
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
        
       
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('assets/plugins/jquery/jquery-1.9.1.min.js') !!}
	{!! Html::script('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') !!}
	{!! Html::script('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') !!}
	{!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
	<!--[if lt IE 9]>
		{!! Html::script('assets/crossbrowserjs/html5shiv.js') !!}
		{!! Html::script('assets/crossbrowserjs/respond.min.js') !!}
		{!! Html::script('assets/crossbrowserjs/excanvas.min.js') !!}
	<![endif]-->
	{!! Html::script('assets/plugins/slimscroll/jquery.slimscroll.min.js') !!}
	{!! Html::script('assets/plugins/jquery-cookie/jquery.cookie.js') !!}
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/apps.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();

            $('#mensaje-success').hide();

            @if(Session::has('alta') == 'success')
                    showAlerta();
                {{ Session::flush() }}
            @endif
		});

        var showAlerta = function(){
            $('#mensaje-success').fadeIn(1000);
            $('#mensaje-success').fadeOut(8000);
        };
	</script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/register_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:53:53 GMT -->
</html>
