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

        .social-network a.icoRssDiana:hover {

        {{--background-color: #33bdbd;--}}

        background-color: #348fe2;

        }

        .social-network a.icoRss:hover i,a.icoRssDiana:hover i, a.icoGoogle:hover i{

        color:#fff;

        }

        .social-network a.icoGoogle:hover {

        {{-- background-color: #BD3518;--}}

        background-color: #348fe2;

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
            <li><a href="javascript:;">Utilerias</a></li>
            <li><a href="{{ url('utilerias/listacreditos') }}">creditos</a></li>
            <li><a>crear</a></li>
        </ol>

        <h1 class="page-header text-center">CREDITOS</h1>
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">


            <div class="panel-heading">
                <div class="panel-heading-btn"></div>
                <h4 class="panel-title">Solicitud de Creditos por cliente</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <select name="modulo" id="modulo" class="form-control" onchange="obtenerModulo()">
                                    <option value="0">Seleccione un modulo</option>

                                    @foreach ($modulos as $Modulos)

                                    <option value="{{$Modulos->id}}">{{$Modulos->nombre}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-control" name="cliente" id="cliente" onchange="obternerContacto()">
                                    <option value="0">Selecciones un cliente</option>

                                    @foreach ($clientes as $Clientes)

                                    <option value="{{$Clientes->id}}">{{$Clientes->nombre_comercial}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <select name="contacto" id="contacto" class="form-control">
                                    <option value="0">Seleccione un contacto</option>
                                </select>
                            </div>
                        </div>

                        <br>



                        <div class="row">
                            <div class="col-md-4" style="text-align:  right;">
                                <label for="cantidad">Cantidad:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="cantidad" id="cantidad" class="form-control" min='1' value="1">
                            </div>

                            <div class="col-md-4">
                                <input class="form-control btn btn-success" type="button" value="Solicitar Creditos" onclick="agregarCreditos()">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6" style="text-align: center;">
                        <h4>Total Creditos</h4>
                        <p style="font-size: 30px;" id="contadosM">0</p>
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

<!-- ================== END PAGE LEVEL JS ================== -->
{!! Html::script('assets/js/sweetalert.min.js') !!}


<script>

    function obtenerModulo(){
        let IdCliente = $("#cliente").val();
        let IdModulo = $("#modulo").val();
        obtenerCreditos(IdCliente,IdModulo);
    }

    function obternerContacto() {

        let IdCliente = $("#cliente").val();
        let IdModulo = $("#modulo").val();

        $.ajax({
            url: "{{url('utilerias/Utileria_contacto')}}/" + IdCliente,
            type: "GET",

            success: function(response) {
                $("#contacto").html("");
                $("#contacto").append(response.contactos);
            },
            error: function(error) {
                console.log(error)
            }
        });

        obtenerCreditos(IdCliente,IdModulo);

    };

    function agregarCreditos() {

        let IdCliente = $("#cliente").val();
        let contacto = $("#contacto").val();
        let creditos = $("#cantidad").val();
        let modulo = $("#modulo").val();

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{url('utilerias/registrarCreditos')}}/" + IdCliente,
            type: "POST",
            dataType: 'json',
            data: {
                contacto: contacto,
                creditos: creditos,
                modulo: modulo
            },

            success: function(response) {
                swal({
                    title: "<h3>¡Creditos Registrados Correctamente!</h3> ",
                    html: true,
                    type: "success",
                    confirmButtonText: "OK",
                    showCancelButton: true,
                });

                location.reload();
            },
            error: function(error) {
                swal({
                    title: "<h3>¡Ups Creditos no Registrados!</h3> ",
                    html: true,
                    type: "error",
                    confirmButtonText: "OK",
                    showCancelButton: true,
                });
            }
        });
    }

    function obtenerCreditos(cliente,modulos){

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{url('utilerias/obtenerCantidadCre')}}/" + cliente +"/"+modulos,
            type: "POST",

            success: function(response) {
                $("#contadosM").html(response.cantidad);
            },
            error: function(error) {
            }
        });
    }
</script>