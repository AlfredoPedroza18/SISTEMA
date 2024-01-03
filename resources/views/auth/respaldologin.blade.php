<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:49:19 GMT -->
<head>
	<meta charset="utf-8" />
	<title>SIG-ERP-Gen-t</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@4"></script>
    <style type="text/css">
    .boton{
  width:55px;
  height:55px;
    {{--background-color:#FAAC58;--}}
  background-color: #31a4e2;
  margin: 5px;
  padding:10px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  border-radius: 50px;
  font-size:11px;
  line-height:32px;
  text-transform: uppercase;
  float:left;
}
.boton:hover{
    {{-- background-color: #FF8000;--}}
    background-color: #4c56ff;
}
.boton a{
    {{--color:#FF8000;--}}
    color: #4c56ff;
  text-decoration:none;
  padding:5px 5px 5px 0;
}


    </style>
	
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
                    {!! Form::open(['url'=>'login', null, 'id'=>'abc']) !!}
                        {{ csrf_field() }}
                        
                        <button id="staff" type="button" class="boton" tol  onclick="s()">
                        <p align="justify" style="font-size:8px; color:black;font-weight: bold;"><i class="fas fa-users fa-3x"></i></p>
                        </button>
                       
                        <button id="empleado" type="button" class="boton"  onclick="e()" >
                                <p align="justify" style="font-size:8px; color:black;font-weight: bold;"><i class="fas fa-briefcase fa-3x"></i></p>
                        </button>

                        <button id="cliente" type="button" class="boton"  onclick="c()" >
                                <p align="justify" style="font-size:8px; color:black;font-weight: bold;"><i class="fas fa-handshake fa-3x"></i></p>
                        </button>
                        
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
                            <input id="password" type="password"  name="password" class="form-control input-lg" placeholder="Password"  required="required" />
                            @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>

                            @endif
                          </div>
                        </div>
                        
                        <div class="login-buttons">
                            <button type="submit"   class="btn btn-success btn-block btn-lg" id="sub" style="BACKGROUND-COLOR:#31a4e2; border-color: #1d83e2">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
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
                             <a href="#"></a>
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
        var aux=0;
		$(document).ready(function() {
			App.init();
        });

        $('#username').prop('disabled', true);
        $('#password').prop('disabled', true);
        function s() {

            if(document.getElementById('staff') && aux==0)
            {
                //document.getElementById('registrarse').disabled=false;
                document.getElementById('username').disabled=false;
                document.getElementById('password').disabled=false;
                document.getElementById('empleado').disabled=true;
                var em = document.getElementById("empleado");
                em.style.background = "grey";
                document.getElementById('cliente').disabled=true;
                //var cli = document.getElementById("cliente");
                document.getElementById("cliente").style.background = "grey";
                aux=1;
            }else
            {

                    if(aux==1){
                        document.getElementById('username').disabled=true;
                        document.getElementById('password').disabled=true;
                        document.getElementById('staff').disabled=false;
                        document.getElementById('empleado').disabled=false;
                        document.getElementById('empleado').style.background ="#31a4e2";
                        document.getElementById('empleado').addEventListener("onmouseover", function(e){
                            document.getElementById('empleado').style.background= "#4c56ff";
                        });
                        document.getElementById('cliente').disabled=false;
                        document.getElementById('cliente').style.background ="#31a4e2";
                        document.getElementById('cliente').addEventListener("onmouseover", function(e){
                            document.getElementById('cliente').style.background= "#4c56ff";
                        });
                        aux=0;
                    }
            }
        }

//*************************

function e() {
            if(document.getElementById('empleado') && aux==0)
            {
                //document.getElementById('registrarse').disabled=false;
                document.getElementById('username').disabled=false;
                document.getElementById('password').disabled=false;
                document.getElementById('staff').disabled=true;
                var em = document.getElementById("staff");
                em.style.background = "grey";
                document.getElementById('cliente').disabled=true;
                var cli = document.getElementById("cliente");
                cli.style.background = "grey";
                aux=1;
            }else
            {

                if(aux==1){
                    document.getElementById('username').disabled=true;
                    document.getElementById('password').disabled=true;
                    document.getElementById('empleado').disabled=false;
                    document.getElementById('staff').disabled=false;
                    document.getElementById('staff').style.background ="#31a4e2";
                    document.getElementById('staff').addEventListener("onmouseover", function(e){
                        document.getElementById('staff').style.background= "#4c56ff";
                    });
                    document.getElementById('cliente').disabled=false;
                    document.getElementById('cliente').style.background ="#31a4e2";
                    document.getElementById('cliente').addEventListener("onmouseover", function(e){
                        document.getElementById('cliente').style.background= "#4c56ff";
                    });
                    aux=0;
                }
            }
        }


        function c() {
            if(document.getElementById('cliente') && aux==0) {
                //document.getElementById('registrarse').disabled=false;
                document.getElementById('username').disabled = false;
                document.getElementById('password').disabled = false;
                document.getElementById('staff').disabled = true;
                var em = document.getElementById("staff");
                em.style.background = "grey";
                document.getElementById('empleado').disabled = true;
                var cli = document.getElementById("empleado");
                cli.style.background = "grey";
                aux=1;
            }else
            {

                if(aux==1){
                    document.getElementById('username').disabled=true;
                    document.getElementById('password').disabled=true;
                    document.getElementById('cliente').disabled=false;
                    document.getElementById('empleado').disabled=false;
                    document.getElementById('empleado').style.background ="#31a4e2";
                    document.getElementById('empleado').addEventListener("onmouseover", function(e){
                        document.getElementById('empleado').style.background= "#4c56ff";
                    });
                    document.getElementById('staff').disabled=false;
                    document.getElementById('staff').style.background ="#31a4e2";
                    document.getElementById('staff').addEventListener("onmouseover", function(e){
                        document.getElementById('staff').style.background= "#4c56ff";
                    });
                    aux=0;
                }
            }
        }
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

<!-- ======================== toolTip ======================== -->
<script>
tippy('#staff', {
    content: '<strong>STAFF</strong>',
    arrow: true,
  arrowType: 'round', // or 'sharp' (default)
  animation: 'fade',
});
tippy('#empleado', {
    content: '<strong>EMPLEADO</strong>',
    arrow: true,
  arrowType: 'round', // or 'sharp' (default)
  animation: 'fade',
});
tippy('#cliente', {
    content: '<strong>CLIENTE</strong>',
    arrow: true,
  arrowType: 'round', // or 'sharp' (default)
  animation: 'fade',
});
</script>

</body>

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:53:00 GMT -->
</html>
