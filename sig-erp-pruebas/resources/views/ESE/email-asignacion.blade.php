<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .logo-gent{
            margin-left: 25px;
        }
        nav{
            background: #FE642E ;
        }
    </style>
</head>
<body>
    <div>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo logo-gent">SIG-ERP | GEN-T</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="javascript:;">ESTUDIOS SOCIOECONÓMICOS</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">


            <div class="col s12">
                <h2 class="header center-align">Un estudio se te ha asignado</h2>
                <div class="card horizontal hoverable">
                    <div class="card-image">
                        {!! Html::image('assets/img/GenTLogo.png') !!}
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>{{ strtoupper( $receptor->name ) }} EL ESTUDIO <strong>{{ 'ESE' . $estudio->id }}</strong> TE FUE ASIGNADO</p>
                            <p>POR: {{ $remitente->name . ' ' . $remitente->email }}</p>
                        </div>
                        <div class="card-action">
                            <a href="#">Enviado desde SIG-ERP | ESTUDIOS SOCIOECONÓMICOS</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
</body>
</html>