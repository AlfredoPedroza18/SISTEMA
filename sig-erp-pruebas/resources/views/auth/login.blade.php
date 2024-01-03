<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:49:19 GMT -->
<head>
	<meta charset="utf-8" />
	<title>SIG-ERP-Gen-t</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	@include('librerias.login.login-styles')
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="assets/img/login-bg/gen-t-recursos-humano.jpg" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                <p>

                     <h4 class="caption-title text-center">
                     <i class="fa fa-diamond "  aria-hidden="true"></i>
                    
                     Servicios profesionales en recursos humanos
                  
                     </h4>
                  
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
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
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    {!! Form::open(['url' => 'login']) !!}
                        {{ csrf_field() }}
                        <div class="form-group m-b-15">
                        <div class="" id="warning-username">
                            <input id="username" type="text" name="username" class="form-control input-lg" placeholder="Usuario" required="required" />
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-b-15">
                        <div class="" id="warning-passw">
                            <input id="password" type="password" name="password" class="form-control input-lg" placeholder="Password"  required="required" />
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
                        <?php
                           /* <div class="m-t-20 m-b-40 p-b-40">
                                Not a member yet? Click <a href="register_v3.html" class="text-success">here</a> to register.
                            </div>
                            */
                        ?>
                        <hr />
                        <?php
                            /*<p class="text-center text-inverse">
                                &copy; Color Admin All Right Reserved 2015
                            </p>
                            */
                        ?>
                        <p class="text-center text-inverse">
                            Sistema desarrollado por <a href="http://union-informatica.com/">Unión Informatica</a>
                        </p>
                    {!! Form::close() !!}
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
         
        
       
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
<script>
      $(document).ready(function(){
/****************** Validacion de inputs de login ******************/
          $("#sub").click(function(event){


                    var username=$.trim($("#username").val());
                    var passw=$.trim($("#password").val());
                        if(username==""){ 
                             $("#warning-username").addClass( "form-group has-warning has-feedback" );
                            
                                   //event.preventDefault()
                        }
                        if(passw==""){ 
                             $("#warning-passw").addClass( "form-group has-warning has-feedback" );
                                   //event.preventDefault();
                        }

             //alert(username);
                          $( "#username" ).keydown  (function(){
                                $( "#warning-username").removeClass("form-group has-warning has-feedback");
                          }); 
                           $( "#password" ).keydown  (function(){
                                $( "#warning-passw").removeClass("form-group has-warning has-feedback");
                          });           
                 });


      });
/****************** Validacion de inputs de login ******************/
    </script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:53:00 GMT -->
</html>
