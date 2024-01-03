@extends('layouts.masterMenuView')

@section('section')

<!doctype html>

<html lang="es">

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

        .background-blanco {

            background: white;

        }
    </style>

</head>

<div class="content">

    <ol class="breadcrumb ">

        <li><a href="javascript:;">Utilerias</a></li>

        <li>

            <a href="javascript:;">Codigos postales</a>

        </li>

    </ol>

    <br>

    <p>Las diferentes codigos postales se encuentran se encuentran</p>

    <hr>

    <br>



    <div class="row">

        <div class="col-md-4 col-sm-6 ">

            <div class="widget widget-stats bg-blue">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

                <div class="stats-title">Catálogo de Estados</div>

                <br><br>

                @permission('ese.catalogo.estados')

                <div class="stats-link">

                    <a href="{{ url('CatalogoEstados') }}">Ir al Catálogo de Estados <i class="fa fa-arrow-circle-o-right"></i></a>

                </div>

                @endpermission

            </div>

        </div>

        <!-- end col-3 -->

        <!-- begin col-3 -->

        <div class="col-md-4 col-sm-6">

            <div class="widget widget-stats bg-aqua">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

                <div class="stats-title">Catálogo de Países</div>

                <br><br>

                @permission('ese.catalogo.paises')

                <div class="stats-link">

                    <a href="{{ url('CatalogoPaises') }}">Ir al Catálogo de Países <i class="fa fa-arrow-circle-o-right"></i></a>

                </div>

                @endpermission

            </div>

        </div>



        <div class="col-md-4 col-sm-6">

            <div class="widget widget-stats bg-aqua">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

                <div class="stats-title">Catálogo de Ciudades</div>

                <br><br>

                @permission('ese.catalogo.ciudades')

                <div class="stats-link">

                    <a href="{{ url('CatalogoCiudades') }}">Ir al Catálogo de Ciudades <i class="fa fa-arrow-circle-o-right"></i></a>

                </div>

                @endpermission

            </div>

        </div>



        <div class="col-md-4 col-sm-6">

            <div class="widget widget-stats bg-aqua">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

                <div class="stats-title">Catálogo de Códigos Postales</div>

                <br><br>

                @permission('ese.catalogo.codigospostales')

                <div class="stats-link">

                    <a href="{{ url('CatalogoCodigosPostales') }}">Ir al Catálogo de Códigos Postales <i class="fa fa-arrow-circle-o-right"></i></a>

                </div>

                @endpermission

            </div>

        </div>



    </div>

</div>



@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')



<script>
    document.getElementById("menu-ese").style.display = "block";

    var mostrarValor = function(x) {

        var p = document.getElementById('valcnt').value = x;

    };
</script>









@endsection