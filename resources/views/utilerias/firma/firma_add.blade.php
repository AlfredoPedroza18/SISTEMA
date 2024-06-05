@extends('layouts.masterMenuView')

@section('section')


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">
        ul.social-network {
            list-style: none;
            display: inline;
            margin-left: 0 !important;
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
                {
                    {
                    --background-color: #33bdbd;
                    --
                }
            }

            background-color: #348fe2;
        }

        .social-network a.icoRss:hover i,
        a.icoRssDiana:hover i,
        a.icoGoogle:hover i {
            color: #fff;
        }

        .social-network a.icoGoogle:hover {
                {
                    {
                    -- background-color: #BD3518;
                    --
                }
            }

            background-color: #348fe2;
        }

        a.socialIcon:hover,
        .socialHoverClass {
            color: #44BCDD;
        }

        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto 0 auto;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            text-align: center;
            width: 6.5em;
            height: 6.5em;
            font-size: 10px;
            background-color: #D8D8D8;
        }

        .social-circle li i {
            margin: 0;
            line-height: 3em;
            text-align: center;
        }

        .social-circle li a:hover i,
        .triggeredHover {
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

        .jumbotron {
            padding-top: 12px;
            padding-bottom: 0px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #em {
            padding-left: 30px;
        }

        .col-md-2 {
            width: auto;
            padding-left: 30px;
        }
    </style>

</head>

<body>

    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Utilerias</a></li>
            <li><a href="{{ url('utilerias/listaFirmas') }}">Correos</a></li>
            <li><a>Crear</a></li>
        </ol>

        <div class="row">

            <h1 class="page-header text-center">Plantilla Firma Correos <small>crear</small></h1>

            <br>

            <div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">



                <div class="panel-heading">
                    <div class="panel-heading-btn"></div>
                    <h4 class="panel-title">Firma correo</h4>
                </div>



                <div class="panel-body">

                    <div class="row">

                        @include('utilerias.firma.firma_form')


                    </div>

                    <br><br>

                    <div class="row" align=right>

                        <div class="col-md-12 ">
                            <input type="button" value="Crear Plantilla" class="btn btn-success" onclick="CrearPlantilla()">
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</body>

</html>


@endsection





@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}
{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- ================== END PAGE LEVEL JS ================== -->
{!! Html::script('assets/js/sweetalert.min.js') !!}


<script>
    function cambio(id) {

        var valor = $("#" + id).val();

        if (id == "fondo")
            $("#fondoT").css("background-color", valor);
        if (id == "empresa")
            $("#empresaT").css("color", valor);
        if (id == "info")
            $("#infoT").css("color", valor);


    }

    function CrearPlantilla() {
        swal({
                title: "¿Estás seguro?",
                text: "Estás por crear una plantilla.",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Confirmar",
                closeOnConfirm: false
            },
            function(isConfirm) {
                CrearPlantillas()
            });
    }


    function CrearPlantillas() {

        var token = $('meta[name="csrf-token"]').attr('content');

        var nombre = $("#nombre").val();
        var fondo = $("#fondo").val();
        var info = $("#info").val();
        var empresa = $("#empresa").val();
        var aviso = $("#aviso").val();

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{url('utilerias/saveP')}}",
            type: "POST",
            dataType: "JSON",
            data: { nombre:nombre, fondo:fondo, info:info, empresa:empresa, aviso:aviso },

            success: function(response) {

                    swal({
                        title: "<h3>¡Plantilla creada exitosamente!</h3> ",
                        html: true,
                        type: "success",
                        confirmButtonText: "OK",
                        showCancelButton: false,
                    },
                    function(isConfirm) {
                         location.href = "{{ url('utilerias/listaFirmas') }}";
                    });
                    
            },
            error: function() {

            }
        });
    }
</script>