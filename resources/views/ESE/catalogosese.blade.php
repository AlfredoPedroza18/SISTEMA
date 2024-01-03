@extends('layouts.masterMenuView')

@section('section')

<!doctype html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

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

        .background-blanco{

            background: white;

        }

    </style>

</head>

<div class="content">

	<ol class="breadcrumb ">

    <li><a href="javascript:;">ESE</a></li>

        <li>

            <a href="javascript:;">Catálogos ESE</a>

        </li>

	</ol>

    <br>



    <hr>

    <br>



    <div class="row">

                <!-- <div class="col-md-4 col-sm-6 animacion-modulos">

			        <div class="widget widget-stats bg-blue">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-pencil-square-o"></i></div>

			            <div class="stats-title">Catálogo de Órdenes de Servicio </div>

                        <br><br>

                        <div class="stats-link">

							<a href="{{route('sig-erp-ese::ListadoOS.create')}}">Ir al Catálogo de Órdenes de Servicio<i class="fa fa-arrow-circle-o-right"></i></a>



						</div>

			        </div>

			    </div> -->

                <!--<div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-blue">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Clientes</div>

                        <br><br>

                        @permission('catalogos.clientes')

                        <div class="stats-link">

							<a href="{{url('catalogo/clientes')}}">Ir al Catálogo de Clientes<i class="fa fa-arrow-circle-o-right"></i></a>



						</div>

                        @endpermission

			        </div>

			    </div>



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-blue">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo Investigadores</div>

                        <br><br>

                        @permission('ese.catalogo.investigadores')

                        <div class="stats-link">

							<a href="{{ url('CatalogoInvestigadores') }}">Ir al Catálogo de Investigadores <i class="fa fa-arrow-circle-o-right"></i></a>



						</div>

                        @endpermission

			        </div>

			    </div>

-->



			    <!-- begin col-3 -->
<!--
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

			    </div>-->

			    <!-- end col-3 -->

			    <!-- begin col-3 -->

			    <!--<div class="col-md-4 col-sm-6">

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



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-purple">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Modalidades</div>

                        <br><br>

                        @permission('ese.catalogo.modalidades')

                        <div class="stats-link">

							<a href="{{ url('CatalogoModalidades') }}">Ir al Catálogo de Modalidades <i class="fa fa-arrow-circle-o-right"></i></a>

						</div>

                        @endpermission

			        </div>

			    </div>



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-purple">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Prioridades</div>

                        <br><br>

                        @permission('ese.catalogo.prioridades')

                        <div class="stats-link">

							<a href="{{ url('CatalogoPrioridades') }}">Ir al Catálogo de Prioridades <i class="fa fa-arrow-circle-o-right"></i></a>

						</div>

                        @endpermission

			        </div>

			    </div>



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-purple">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>
    -->
			            <!-- <div class="stats-title">Catálogo de Tipos de Servicios</div> -->
<!--
                        <div class="stats-title">Catálogo de Servicios</div>

                        <br><br>

                        @permission('ese.catalogo.servicios')

                        <div class="stats-link">
    -->
							<!-- <a href="{{ url('CatalogoTiposServicio') }}">Ir al Catálogo de Tipos de Servicios <i class="fa fa-arrow-circle-o-right"></i></a>

                             -->
<!--
                             <a href="{{ url('CatalogoTiposServicio') }}">Ir al Catálogo de Servicios <i class="fa fa-arrow-circle-o-right"></i></a>

						</div>

                        @endpermission

			        </div>

			    </div>



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-black">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Tipos de Servicios</div>



                        <br><br>

                        @permission('ese.catalogo.tiposservicios')

                        <div class="stats-link">

							<a href="{{ url('CTiposServicios') }}">Ir al Catálogo de Tipos de Servicios <i class="fa fa-arrow-circle-o-right"></i></a>



						</div>

                        @endpermission

			        </div>

			    </div>



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-black">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Aviso de Privacidad</div>

                        <br><br>

                        @permission('ese.catalogo.avisoprivacidad')

                        <div class="stats-link">

							<a href="{{ url('AvisoPrivacidad') }}">Ir al Catálogo de Aviso de Privacidad <i class="fa fa-arrow-circle-o-right"></i></a>

						</div>

                        @endpermission

			        </div>

			    </div>

                

                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-black">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Regiones</div>

                        <br><br>

                        @permission('ese.catalogo.regiones')

                        <div class="stats-link">

							<a href="{{ url('CatalogoRegiones') }}">Ir al Catálogo de Regiones<i class="fa fa-arrow-circle-o-right"></i></a>

						</div>

                        @endpermission

			        </div>

			    </div>



                <div class="col-md-4 col-sm-6 ">

			        <div class="widget widget-stats bg-black">

			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>

			            <div class="stats-title">Catálogo de Regiones por Estado</div>

                        <br><br>

                        @permission('ese.catalogo.regionesestado')

                        <div class="stats-link">

							<a href="{{ url('CatalogoRegionesxEdo') }}">Ir al Catálogo de Regiones por Estado <i class="fa fa-arrow-circle-o-right"></i></a>

						</div>

                        @endpermission

			        </div>

			    </div>
            
    -->



    </div>

</div>



@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')



<script>

    $(document).ready(function() {

        document.getElementById("menu-ese").style.display="block";

        App.init();

        //Dashboard.init();

        $('.popovers').popover()



        $('.animacion-modulos').mouseover(function(){

            $(this).addClass('animated');

            $(this).addClass('pulse');

        });



        $('.animacion-modulos').mouseout(function(){

            $(this).removeClass('animated');

            $(this).removeClass('pulse');

        });

    });





</script>









@endsection

