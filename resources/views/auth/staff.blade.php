<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIG-ERP-Gen-t</title>
    <link rel="icon" type="image/png" href="assets/acceso/img/favicon.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="assets/acceso/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="assets/acceso/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="assets/acceso/css/style.min.css" rel="stylesheet">

    <link href="assets/acceso/css/aos.css" rel="stylesheet">

    <link href="assets/acceso/css/toastr.min.css" rel="stylesheet">
    <!-- waitMe.js -->
    <link href="assets/acceso/waitMe/waitMe.min.css" rel="stylesheet">



</head>

<body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="{{ url('login') }}">
                    <strong data-aos="fade-down" data-aos-duration="3000" class="nav-link waves-effect"><img
                            src="assets/acceso/img/nube.png" width="90"> SIG-ERP BIENVENIDO </strong>


                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a data-aos="fade-down" data-aos-duration="2000" class="nav-link waves-effect" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a data-aos="fade-down" data-aos-duration="3000" class="nav-link waves-effect" href="#"
                                target="_blank"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="#"></a>
                        </li>

                    </ul>

                    <!-- Right -->
                    <ul data-aos="fade-down" data-aos-duration="3000" class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="{{ url('login') }}" class="nav-link waves-effect">
                                <i class="orange-text fa fa-home fa-2x"></i><strong> INICIO</strong>
                            </a>
                        </li>
                    </ul>

                </div>


            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <br>
    <br>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">





            <!--Section: Cards-->
            <section class="text-center">

                <!--Grid row-->


                <!-- News jumbotron -->
                <div class="jumbotron text-center hoverable p-4">

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-md-5 offset-md-1 mx-3 my-3">

                            <!-- Featured image -->
                            <div data-aos="fade-right" data-aos-duration="1300" class="view overlay">
                                <img src="assets/acceso/img/foto-tipo/sfaffl.png" class="img-fluid" style="width: 100%;
          height: auto;background-size: contain;
          border: 1px solid #0d47a1;">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>


                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div data-aos="fade-left" data-aos-duration="1300" class="col-md-6 text-md-left ml-3 mt-3">

                           {{--  {!! Form::open(['url'=>'login', null, 'id'=>'abc','class' => 'text-center border
                            border-light p-5']) !!} --}}
                            <form action="{{ url('login') }}" method="POST" id="abc" class="text-center border
                            border-light p-5" onsubmit="return validar()">
                            {{ csrf_field() }}
                            {{-- <form class="text-center border border-light p-5"> --}}
                            <h5 class="card-header primary-color-dark white-text text-center py-4">
                                <strong>STAFF</strong>
                            </h5>

                            <!-- Avatar -->
                            <br>
                            <div class="avatar mx-auto white">
                                <img src="assets/acceso/img/logos/logostaff.png" class="rounded-circle" width="110"
                                    alt="woman avatar">
                            </div>
                            <br>
                            <p>Proporciona tu usuario y contraseña</p>
                            <!-- Email -->

                            <!-- Material input -->
                            <div class="md-form">
                                <input id="username" type="text" name="username"  class="form-control validate">
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                                <label for="Usuario">Usuario</label>
                            </div>



                            <!-- Material input -->
                            <div class="md-form">
                                <input id="password" type="password" name="password" 
                                    class="form-control validate">
                                @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>

                                @endif
                                <label for="inputValidationEx2" data-error="wrong" data-success="right">Password</label>
                            </div>

                            <div class="d-flex justify-content-around">
                                <div>
                                    <!-- Remember me -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                            id="defaultLoginFormRemember">
                                        <label class="custom-control-label"
                                            for="defaultLoginFormRemember">Recuerdame</label>
                                    </div>
                                </div>
                                <div>
                                    <!-- Forgot password -->
                                    <a href="">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>

                            <!-- Sign in button -->
                            <button class="btn btn-warning btn-block my-4"  type="submit">Iniciar Sesion
                                <i class="fa fa-sign-in ml-2"></i></button>



                            <!-- Register -->
                            <p>¿No te has registrado?
                                <a href="{{ url('register') }}">¡Registrate!</a>
                            </p>

                            <!-- Social login -->
                            <p>Redes Sociales</p>

                            <a href="https://www.facebook.com/GenTOutsourcing/?ref=hl" class="nav-link waves-effect"
                                target="_blank">
                                <i class="blue-text fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/GenTOutsourcing" class="nav-link waves-effect">
                                <i class="blue-text fa fa-twitter"></i>
                            </a>

                            <a href="https://www.linkedin.com/company/gen-t" class="nav-link waves-effect">
                                <i class="blue-text fa fa-linkedin"></i>
                            </a>


                            </form>
                            <!-- Default form login -->



                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                </div>
                <!-- News jumbotron -->

            </section>
            <!--Section: Cards-->

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn  ">

        <!--Call to action-->

        <!--/.Call to action-->

        <hr class="my-4">

        <!-- Social icons -->
        <div data-aos="fade-down" data-aos-duration="3000" class="pb-4">
            <a href="#" target="_blank">
                <img src="assets/acceso/img/nube.png" width="150">
            </a>


        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2019 Copyright:
            <a href="" target="_blank"> Gen-T </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    {!! Html::script('assets/acceso/js/jquery-3.3.1.min.js') !!}

    <!-- Bootstrap tooltips -->
    {!! Html::script('assets/acceso/js/popper.min.js') !!}
    <!-- Bootstrap core JavaScript -->
    {!! Html::script('assets/acceso/js/bootstrap.min.js') !!}
    <!-- MDB core JavaScript -->
    {!! Html::script('assets/acceso/js/mdb.min.js') !!}

    <!-- Initializations -->
    {!! Html::script('assets/acceso/js/aos.js') !!}

    {!! Html::script('assets/acceso/js/toastr.min.js') !!}
    <!-- waitMe.js -->
    {!! Html::script('assets/acceso/waitMe/waitMe.min.js') !!}



    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
        AOS.init();
    </script>


<script type="text/javascript">
    function validar() {
        //obteniendo el valor que se puso en campo text del formulario
        u = document.getElementById("username").value;
        p = document.getElementById("password").value;
        //la condición
        if (u.length == 0 || p.length == 0) {
            toastr.error("y/o Campos vacios","Usuario o Password Incorrectos");
            return false;
        }
        else if(u.length != 0 && p.length != 0){
            $('body').waitMe({
            effect : 'roundBounce',
            waitTime: 20000,
            text : 'Espere un momento por favor...',
            onClose: function() {}
            });
           return true; 
        }
        
        
    }
</script>
    
</body>

</html>