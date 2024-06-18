<?php



function activarLink( $url = '' )

{

    return Request::is( $url )  ? 'active' : '*';

}



?>





<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if !IE]><!-->

<html lang="es">

<!--<![endif]-->



<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:35:05 GMT -->

<head>



    <title>SIG-ERP-Gen-t</title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />



    <meta content="" name="description" />

    <meta content="" name="author" />

    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- ================== BEGIN BASE CSS STYLE ================== -->

    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->



    <!-- ================== CSS SWEET ALERT ================== -->

    {!! Html::style('assets/css/sweetalert.css') !!}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- ================== END CSS SWEET ALERT ================== -->



    

    <!-- waitMe.js -->

    {{-- <link rel="stylesheet" href="assets/acceso/waitMe/waitMe.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('assets/acceso/waitMe/waitMe.min.css') }}">



{!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}

{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}

{!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}

{{-- ==================TIPO DE ESTILOS DEPENDIENDO EL USUARIO================== --}}

{!! Html::style('assets/css/animate.min.css') !!}



@if((Auth::check()) and (Auth::user()->tipo=='s'))

{!! Html::style('assets/css/styles.min.css') !!}

{!! Html::style('assets/css/theme/defaults.css') !!}

@endif



@if((Auth::check()) and (Auth::user()->tipo=='e'))

{!! Html::style('assets/css/stylee.min.css') !!}

{!! Html::style('assets/css/theme/defaulte.css') !!}

@endif



@if((Auth::check()) and (Auth::user()->tipo=='c'))

{!! Html::style('assets/css/stylec.min.css') !!}

{!! Html::style('assets/css/theme/defaultc.css') !!}

@endif


@if((Auth::check()) and (Auth::user()->tipo=='f'))

{!! Html::style('assets/css/stylep.min.css') !!}

{!! Html::style('assets/css/theme/defaultp.css') !!}

@endif

{{-- ==================TIPO DE ESTILOS DEPENDIENDO EL USUARIO================== --}}



{!! Html::style('assets/css/style-responsive.min.css') !!}

{!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.css') !!}

<!-- ================== END BASE CSS STYLE ================== -->



{!! Html::style('assets/css/scroll.css') !!}







    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->

{!! Html::style('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') !!}

{!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') !!}

{!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker3.css') !!}

{!! Html::style('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}

{!! Html::style('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') !!}

{!! Html::style('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}

{!! Html::style('assets/plugins/gritter/css/jquery.gritter.css') !!}

{!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.js') !!}

{!! Html::style('assets/plugins/select2/dist/css/select2.min.css') !!}



<!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== END PAGE LEVEL STYLE ================== -->



    <!-- ================== MAPA ================== -->

{!! Html::style('assets/css/mapa.css') !!}

<!-- ================== MAPA ================== -->











{!! Html::style('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') !!}

{!! Html::style('assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css') !!}

{!! Html::style('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') !!}



<!-- ================== END PAGE LEVEL STYLE ================== -->



    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->

{!! Html::style('assets/plugins/bootstrap-wizard/css/bwizard.min.css') !!}

{!! Html::style('assets/plugins/parsley/src/parsley.css') !!}

<!-- ================== END PAGE LEVEL STYLE ================== -->





{!! Html::style('assets/plugins/jquery-tag-it/css/jquery.tagit.css') !!}

{!! Html::style('assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css') !!}



{!! Html::style('assets/plugins/fullcalendar/fullcalendar.min.css') !!}

{{-- {!! Html::style('assets/css/chosen.css') !!} --}}



{!! Html::style('assets/css/chosen/chosen.css') !!}

{!! Html::style('assets/css/chosen/prism.css') !!}



@yield('estilos')



<!-- ================== BEGIN BASE JS ================== -->

{!! Html::script('assets/plugins/pace/pace.min.js') !!}

<!-- ================== END BASE JS ================== -->



<!--{!! Html::style('assets/plugins/drop-zone/dropzone.css') !!}-->



    <style type="text/css">



        ul.cotizador-social-network {

            list-style: none;

            display: inline;

            margin-left:0 !important;

            padding: 0;

        }

        ul.cotizador-social-network li {

            display: inline;

            margin: 0 5px;

        }



        .cotizador-social-circle li a {

            display:inline-block;

            position:relative;

            margin:5px auto 0 auto;

            -moz-border-radius:50%;

            -webkit-border-radius:50%;

            border-radius:50%;

            text-align:center;

            width: 2em;

            height: 2em;

            font-size:20px;

            background-color: #D8D8D8;

        }

        .cotizador-social-circle li i {

            margin:0;

            line-height:2em;

            text-align: center;

        }



        .cotizador-social-network a.icoRss:hover {

            background-color: #F56505;

        }



        .cotizador-social-network a.icoRss:hover i {

            color:#fff;

        }



        .cotizador-social-circle li a:hover i, .triggeredHover {

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



        .cotizador-social-circle i {

            color: #fff;

            -webkit-transition: all 0.8s;

            -moz-transition: all 0.8s;

            -o-transition: all 0.8s;

            -ms-transition: all 0.8s;

            transition: all 0.8s;

        }

        .modulos-desa{

            background-color:#454a4f;

            color: white;

            border-radius: 5px 5px 5px 5px;

        }

        .fondo{

          color: #000;

          padding: 0;

          border: none;

          background: none;

        }



        .fondo:hover{

          background:rgba(23, 139, 164, 0.2);

          cursor: pointer;

        }

        .not-scroll::-webkit-scrollbar {

          width: 5px;

        }



        .not-scroll::-webkit-scrollbar-thumb {

            background: rgba(0, 125, 255, 0.72);

            border-radius: 4px;

        }

    </style>





</head>

<body>

<!-- begin #page-loader -->

<div id="page-loader" class="fade in "><span class="spinner"></span></div>

<!-- end #page-loader -->



<!-- begin #page-container -->

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed  ">

    <!-- begin #header -->

    <div id="header" class="header navbar navbar-default navbar-fixed-top hidden-print">

        <!-- begin container-fluid -->

        <div class="container-fluid">

            <!-- begin mobile sidebar expand / collapse button -->

            <div class="navbar-header">

                <a

                        @if((Auth::check()) and (Auth::user()->tipo=='s'))

                        href="{{ url('/home') }}"

                        @else

                        href="javascript:;"

                        @endif

                        class="navbar-brand">

				<span class="navbar-logo"></span> SIG-ERP</a>

                


				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

				

            </div>

			

            <!-- end mobile sidebar expand / collapse button -->



            <!-- ------------------------------------------------------ Menu de Cuentas ------------------------------- -->



            @if( Auth::user()->tipo=='e' )



                <span class="navbar-text">

                  <h5>{{ Auth::user()->name }} - {{ Auth::user()->username }} </h5>

                </span>







            @elseif ( Auth::user()->tipo=='c' )

            @php

                
		        $ncc = DB::select("SELECT c.nombre_comercial as noc FROM clientes c
                        inner join users u on u.idCliente = c.id where u.id = ?
                ;",[Auth::user()->id]);

            @endphp
                <span class="navbar-text">

                    <h5>
                        @foreach ($ncc as $a)

                            {{$a->noc}}

                        @endforeach
                    </h5>

                </span>


                <div class="collapse navbar-collapse pull-left" id="top-navbar" style="margin-top: 6px;">

                    <ul class="nav navbar-nav">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                    <i class="fa fa-th-large fa-fw"></i> Catálogos <b class="caret"></b>

                                </a>

                               
                                <ul class="dropdown-menu" role="menu" style="width: 180px;">
                                   <li class="divider"></li>
                                    <li >

                                        <a href="{{ url('utilerias/listacreditos') }}">
                                            <i class="fa fa-cubes fa-fw"></i>
                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Creditos solicitados por clientes"></span>
                                            Creditos
                                        </a>

                                    </li>
                                 
                                </ul>

                            </li>

                    </ul>

                </div>
            @else

                <div class="collapse navbar-collapse pull-left" id="top-navbar" >

                    <ul class="nav navbar-nav">



                        @if( !Auth::user()->isForeing() )

                        @permission('catalogos.main|catalogos.clientes|catalogos.cotizaciones|catalogos.contratos') 

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                    <i class="fa fa-th-large fa-fw"></i> Catálogos <b class="caret"></b>

                                </a>

                                <ul class="dropdown-menu" role="menu" style="width: 180px;">

                                    @permission('catalogos.clientes')
                                    
                                    <li>

                                        <a href="{{url('catalogo/clientes')}}">

                                            <i class="fa fa-cubes fa-fw"></i>

                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Dar de alta un Cliente en el sistema SIG-ERP"></span>

                                            Clientes

                                        </a>

                                    </li>
                                    <li class="divider"></li>
                                    @endpermission

                                    @permission('ese.ordenes.servicio.main')
                                    
	                                    <li> 

                                            <a href="{{route('sig-erp-ese::ListadoOS.create')}}">

                                                <i class="fa fa-cubes fa-fw"></i>
                                                <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Mostrar lista de Órdenes de Servicio"></span>

                                                Órdenes de Servicios
                                            </a>
                                        </li>
                                    <li class="divider"></li>
	                                @endpermission

                                    {{-- <li><a href="#">Another action</a></li>

                                    <li><a href="#">Something else here</a></li>

                                    --}}

                                    @permission('catalogos.cotizaciones')

                                    
                                    <li>

                                        <a href="{{ url('catalogo/listado_cotizaciones') }}">

                                            <i class="fa fa-file-text-o fa-fw"></i>

                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de cotizaciones del sistema SIG-ERP"></span>

                                            Cotizaciones

                                        </a>

                                    </li>

                                    <li class="divider"></li>
                                    @endpermission

                                    @permission('catalogos.contratos')

                                   

                                    <li>

                                        <a href="{{ url('catalogo/listado_contratos') }}">

                                            <i class="fa fa-file-text fa-fw"></i>

                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de contratos del sistema SIG-ERP"></span>

                                            Contratos

                                        </a>

                                    </li>
                                    
                                    @endpermission

                                    @permission('catalogos.creditos')
                                   <li class="divider"></li>
                                    <li >

                                        <a href="{{ url('utilerias/listacreditos') }}">
                                            <i class="fa fa-cubes fa-fw"></i>
                                            <span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Creditos solicitados por clientes"></span>
                                            Creditos
                                        </a>

                                    </li>
                                    @endpermission

                                </ul>

                            </li>

                        @endpermission

                        @endif

                    </ul>

                </div>

        @endif

		

            <!-- ------------------------------------------------------ Menu de Cuentas ------------------------------- -->

            <!-- begin header navigation right -->

            <ul class="nav navbar-nav navbar-right">

                <li>



                @permission('ese.ordenes.servicio|ese.ordenes.servicio.cancelar|ese.ordenes.servicio.cerrar|ese.ordenes.servicio.detalle')

                    @if( Auth::user()->tipo!='f' && Auth::user()->tipo!='c')
                    <li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Nuevo Servicio">



                    <ul class="cotizador-social-network cotizador-social-circle">



                    <li>

                        <a href="javascript:;" class="icoRss text-center popovers"

                        data-trigger="focus"

                        data-html="true"

                        data-container="body"

                        data-placement="bottom"

                        data-content="<table class='table table-hover table-condensed'>

														<tbody>

															<tr>

																<td>Nuevo / Solicitar Servicio</td>

																<td><a class='btn btn-circle btn-icon-only btn-success' href='{{route('sig-erp-ese::NuevaOSCliente.index')}}'><i class='fa fa-files-o'></i></a></td>

															</tr>

														</tbody>"

                        data-original-title="<strong>Servicio</strong>"><i class="fa fa-files-o"></i></a>

                            </li>

                        </ul>





                    </li>

                    @endif

                @endpermission



                @if( !Auth::user()->isForeing() )

                    <li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Cotizador">



                        <ul class="cotizador-social-network cotizador-social-circle">



                            <li >

                                <a href="{{ url('cotizador_general') }}" class="icoRss text-center popovers"

                                   data-trigger="focus"

                                   data-html="true"

                                   data-container="body"

                                   data-placement="bottom"

                                   
                                   ><i class="fa fa-calculator"></i></a>

                            </li>

                        </ul>





                    </li>

                @endif

          <!-----------NOTIFICACIONES--------------->



                <li class="dropdown" data-toggle="tooltip" data-placement="bottom" >

					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14" id="icon-not">

						<i class="fa fa-bell-o"></i>

						{{-- <span class="label">*</span> --}}

					</a>



					<ul class="dropdown-menu media-list pull-right animated fadeInDown not-scroll" id="panel-notifica"  style="width:350px;height:560px;overflow-y: scroll;">

	                    <li class="dropdown-header">

                        Notificaciones

                        </li>

                      <li class="media">

                           <a href="javascript:;">

                               No hay Notificaciones

                           </a>

                     </li>

{{--

	                    <li class="dropdown-footer text-center">

	                        <a href="javascript:;">Ver todo</a>

	                    </li> --}}

					</ul>

				</li>

        <!-----------------FIN NOTIFICACIONES-------------------->



                <li class="dropdown navbar-user">



                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

                        {!! Html::image('assets/img/user-13.jpg') !!}

                        @if( Auth::user()->tipo=='s' )
                            <span class="hidden-xs"> {{ Auth::user()->name }}</span> <b class="caret"></b>
                        @elseif( Auth::user()->tipo=='c' || Auth::user()->tipo=='f')
                            <span class="hidden-xs"> {{ Auth::user()->username }}</span> <b class="caret"></b>
                        @else
                            <span class="hidden-xs"> {{ Auth::user()->name }}</span> <b class="caret"></b>
                        @endif
                    </a>

                    <ul class="dropdown-menu animated fadeInLeft">

                        <li class="arrow"></li>

                        @if( Auth::user()->tipo=='s' )

                            <li><a href="{{ url('modulo/administrador/cuentas') }}"><i class="fa fa-btn fa fa-gears"></i> Administrador</a></li>

                            <li role="separator" class="divider"></li>

                            <li><a href="{{ url('cartas_tipo') }}"><span class="fa fa-pencil-square-o pull-right"></span>Carta tipo</a></li>

                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesion</a></li>

                        @elseif( Auth::user()->tipo=='c' ||Auth::user()->tipo=='f')
                        
                            <li><a href="{{ url('/logout') }}" onclick="salirS()"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesion</a></li>
                        @else


                            <li><a href="{{ url('cartas_tipo') }}" onclick="salirS()"><span class="fa fa-pencil-square-o pull-right"></span>Carta tipo</a></li>

                            <li><a href="{{ url('/logout') }}" onclick="salirS()"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesion</a></li>

                        @endif



                    </ul>

                </li>

            </ul>

            <!-- end header navigation right -->

        </div>

        <!-- end container-fluid -->

    </div>

    <!-- end #header -->











    <!-- begin #sidebar -->

    <div id="sidebar" class="sidebar hidden-print sdclick">

        <!-- begin sidebar scrollbar -->

        <div class="scroll" data-height="100%">

            <!-- begin sidebar user -->

            <ul class="nav" >

                <li class="nav-profile bg-primary " >

                    <div class="image">

                        <a href="javascript:;">{!! Html::image('assets/img/user-13.jpg') !!}</a>

                    </div>

                    <div class="info">

                    @if( Auth::user()->tipo=='e')

                    <div id="empnombre" name="empnombre"></div>

                     @else

                        Empresa Gen-T

                        <small>SIG-ERP</small>

                    @endif

                       

                    </div>

                </li>

            </ul>

            <!-- end sidebar user -->

            <!-- begin sidebar nav -->

            <ul class="nav" >

                <li class="nav-header">Navegación</li>



                {{-- Inicio Utilerias --}}

    @if( Auth::user()->tipo=='s')

            {{-- Fin Utilerias --}}



            <!-- Inicio Menú Administrador -->

            @permission('admin.main')

            <li class="has-sub {{ 	activarLink( 'dashadministrador' ) .' '.

                                        activarLink('EmpresasFacturadoras').' '.

                                        activarLink('EmpresasFacturadoras').' '.

                                        activarLink('EmpresasFacturadoras/*').' '.

                                        activarLink('departamentos').' '.

                                        activarLink('departamentos/*').''.

                                        activarLink('CatalogoPuestos').' '.

                                        activarLink('CatalogoPuestos/*').' '.

                                        activarLink('modulo/administrador/cotizador').' '.

                                        activarLink('modulo/administrador/cotizador/*').' '.

                                        activarLink( 'modulo/administrador/usuarios').' '.

                                        activarLink( 'modulo/administrador/usuarios/*').' '.

                                        activarLink('EmpresasFacturadoras').' '.

                                        activarLink('EmpresasFacturadoras/*').' '.

                                        activarLink('info-comercial').' '.

                                        activarLink('info-comercial/*').' '.

                                        activarLink('anexo-documentos').' '.

                                        activarLink('anexo-documentos/*')}}">

                <a href="javascript:;">

                    <b class="caret pull-right"></b>

                    <i class="fa fa-gears"></i>

                    <span id="">Administrador</span>

                </a>

                <ul class="sub-menu" >






                    <!--<li class="modulos-desa"><a href="#">Suscripciones Servicios ERP</a></li>-->


                    <li class="{{ activarLink('EmpresasFacturadoras').' '.activarLink('EmpresasFacturadoras/*') }}">

                        <a href="{{url('/dashboardAdministracion')}}">Dashboard</a>

                    </li>

                    @permission('admin.empresasfacturadoras')

                    <li class="{{ activarLink('EmpresasFacturadoras').' '.activarLink('EmpresasFacturadoras/*') }}">

                        <a href="{{ route('sig-erp-crm::EmpresasFacturadoras.index') }}">Empresa</a>

                    </li>

                    @endpermission

                    @permission('admin.empresasmaquiladoras')

                    <li class="{{ activarLink('EmpresasMaquiladoras').' '.activarLink('EmpresasMaquiladoras/*') }}">

                        <a href="{{ url('EmpresasMaquiladoras') }}">Gestión de Nómina</a>

                    </li>

                    @endpermission

                    @permission('admin.departamentos')

                    <li class="{{ activarLink('departamentos').' '.activarLink('departamentos/*') }}">

                        <a href="{{ route('sig-erp-crm::departamentos.index') }}">Departamentos</a>

                    </li>

                    @endpermission

                    @permission('admin.puestos')

                    <li class="{{ activarLink('CatalogoPuestos').' '.activarLink('CatalogoPuestos/*') }}">

                        <a href="{{ route('sig-erp-crm::CatalogoPuestos.index') }}">Puestos</a>

                    </li>

                    @endpermission

                    {{-- <li class="{{ activarLink('CatalogoPuestos').' '.activarLink('CatalogoPuestos/*') }}">

                        <a href="{{ route('sig-erp-crm::CatalogoPuestos.index') }}">Puestos</a>

                    </li> --}}

                    <!-- <li class="{{ activarLink('modulo/administrador/puestos').' '.activarLink('modulo/administrador/puestos/*') }}">

                        <a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permisos</a>

                    </li> -->

                    @permission('admin.permisos')

                    <li class="{{ activarLink('Permisos').' '.activarLink('Permisos/*') }}">

                        <a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permisos</a>

                    </li>

                    @endpermission

                    <!-- <li class="has-sub">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            Permisos

                        </a>

                        <ul class="sub-menu">

                        <li class="{{activarLink('')}}">

                            <a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permisos web</a>

                        </li>

                        <li class="{{activarLink('modulo/administrador/permisos')}}">



                            <a href="{{ url('modulo/administrador/permisos') }}">Permisos Nomina</a>

                        </li>

                            <li class="">



                                <a href="{{url('PermisosESE')}}">Permisos ESE</a>

                            </li>

                        </ul>

                    </li> -->

                    @permission('admin.usuarios|admin.usuariosinvestigadores|admin.usuarios.staff')

                    <li class="has-sub">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            Usuarios

                        </a>

                        <ul class="sub-menu">

                            @permission('admin.usuarios.staff')

                            <li class="{{activarLink('')}}">



                                <a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}">Usuarios Staff</a>

                            </li>

                            @endpermission

                            @permission('admin.usuarios.candidatoempleado')

                            <li class="{{activarLink('modulo/administrador/usuarios/empleados')}}">



                                <a href="{{ url('modulo/administrador/usuarios/empleados') }}">Usuarios candidato o empleados</a>

                            </li>

                            @endpermission

                            <!--
                            22/02/2024
                            Concepto: Funcion migrado a clientes    
                            
                            li class="<{{activarLink('')}}"

                            @permission('admin.usuarios.clientes')

                            <li class="{{activarLink('modulo/administrador/usuarios/clientes')}}">



                                <a href="{{ url('modulo/administrador/usuarios/clientes') }}">Usuarios Clientes</a>

                            </li>

                            @endpermission-->

                            @permission('admin.usuariosinvestigadores')

                            <li class=" {{ activarLink('') }}">

                                <a href="{{url('CatalogoInvestigadores')}}">Usuarios investigadores</a>

                            </li>

                            @endpermission



                        </ul>

                    </li>

                    @endpermission

                    @permission('admin.utilerias|admin.utilerias.cotizador|admin.utilerias.plantilla.cotizador|admin.utilerias.platilla.contratos|admin.utilerias.inpuestos|admin.utilerias.codigos.postales')
                    <li class="has-sub {{ 	activarLink( 'utilerias/*' ) }}">

                    <a href="javascript:;">

                        <b class="caret pull-right"></b>

                        <span id="">Utilerías</span>

                    </a>

                    <ul class="sub-menu" >


                        @permission('admin.utilerias.cotizador')
                        <li class="{{ activarLink('modulo/administrador/cotizador').' '.activarLink('modulo/administrador/cotizador/*') }}">

                            <a href="{{ route('sig-erp-crm::modulo.administrador.cotizador.index') }}">Cotizador Cat. de Serv.</a>

                        </li>
                        @endpermission

                        @permission('admin.utilerias.plantilla.cotizador')
                        <li class="{{ activarLink('utilerias/plantillas') }}">

                            <a href="{{ url('utilerias/plantillas') }}">Plantillas Cotizador</a>

                        </li>
                        @endpermission

                        @permission('admin.utilerias.platilla.contratos')
                        <li class="{{ activarLink('utilerias/plantilla_contratos') }}">

                            <a href="{{ url('utilerias/plantilla_contratos') }}">Plantillas Contratos</a>

                        </li>
                        @endpermission


                        @permission('admin.utilerias.platilla.correo')
                        <li class="{{ activarLink('utilerias/listaFirmas') }}">

                            <a href="{{ url('utilerias/listaFirmas') }}">Plantillas Firma de Correo</a>

                        </li>
                        @endpermission

                        @permission('admin.utilerias.inpuestos')
                        <li class="{{ activarLink('utilerias/impuestos') }}">

                            <a href="{{ url('utilerias/impuestos') }}">Impuestos</a>

                        </li>
                        @endpermission

                        @permission('admin.utilerias.codigos.postales')
                        <li class="{{ activarLink('utilerias/plantillas') }}">

                            <a href="{{ url('utilerias/codigospostales') }}">Codigos postales</a>

                        </li>
                        @endpermission
                    </ul>

                    </li>
                    @endpermission

                <!--  <li class="{{ activarLink( 'modulo/administrador/usuarios').' '.activarLink( 'modulo/administrador/usuarios/*') }}">  -->

                

                    @permission('admin.kardex')

                    <li class="{{ activarLink( 'modulo/administrador/kardex' ) }}"><a href="{{ url('modulo/administrador/kardex') }}">Kardex</a></li>

                    @endpermission

                   

                    <!--<li class="modulos-desa {{ activarLink('').' '.activarLink('') }}">

                        <a href="{{ url('#') }}">Soporte</a>

                    </li>-->

                    

                </ul>

            </li>

            @endpermission



         <!-- Fin Menú Administrador -->





                @permission('crm.main')

                    <li class="has-sub {{ 	activarLink('clientes').' '.

                                        activarLink('clientes/*').' '.

                                        activarLink('correos').' '.

                                        activarLink('correos/*').' '.

                                        activarLink('agenda').' '.

                                        activarLink('listado_cotizaciones').' '.

                                        activarLink('listado_contratos').' '.

                                        activarLink('ReporteProspectos').' '.

                                        activarLink('ClientesContratos').' '.

                                        activarLink('ReportesCitas').' '.

                                        activarLink('ReportesLLamadas').' '.

                                        activarLink('ReportesCotizaciones').' '.

                                        activarLink('dashboard') }}">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            <i class="fa fa-laptop"></i>

                            <span id="modulo-crm">CRM</span>

                        </a>

                        <ul class="sub-menu" >





                            <!-- <li class="{{ 	activarLink('clientes').' '.

                                        activarLink('clientes/*') }}">

                                <a href="{{url('clientes')}}">Clientes y prospectos</a> -->

                            <!-- <li class="has-sub">

                                    <a href="javascript:;">

                                        <b class="caret pull-right"></b>

                                        Clientes y prospectos

                                    </a>

                                <ul class="sub-menu">

                                    <li class="{{ activarLink('catalogo/clientes') }}">

                                        <a href="{{url('catalogo/clientes')}}">Perfil de cliente</a>

                                    </li>

                                </ul>

                            </li> -->


                            <li class="{{ activarLink('catalogo/clientes') }}"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            @permission('agenda.cancelar')

                                <li class="{{ activarLink('agenda') }}"><a href="{{url('agenda')}}">Agenda</a></li>

                            @endpermission
                            @permission('crear.clientes|eliminar.clientes|editar.clientes|clientes.cambiarcn')

                            <li class="{{ activarLink('catalogo/clientes') }}"><a href="{{route('sig-erp-crm::clientes.index')}}">Clientes y prospectos</a></li>

                            @endpermission

                            

                            @permission('cotizaciones.contrato')

                            <li class="{{ activarLink('listado_cotizaciones') }}"><a href="{{url('listado_cotizaciones')}}">Cotizaciones</a></li>

                            @endpermission

                            @permission('contratos.listado')

                            <li class="{{ activarLink('listado_contratos') }}"><a href="{{url('listado_contratos')}}">Contratos</a></li>

                            @endpermission

                            

                           



                        </ul>



                    </li>

                @endpermission















            <!-- begin sidebar minify button -->

                        <!-- <li class="disabled modulos-desa has-sub {{ 	activarLink( '' ) }}">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                <i class="fa fa-briefcase"></i>

                                <span id="">RYS</span>

                            </a>

                            <ul class="sub-menu" >

                                <li class="modulos-desa {{ activarLink('') }}">

                                    <a href="{{ url('#') }}">Reportes</a>

                                </li>

                            </ul>

                        </li> -->





            @if( Auth::user()->isAbleEnter('ese') )

                @include('layouts.master_ese')

            @endif



            @permission('nominassssssssssssssssss')                

                <li class="has-sub {{	activarLink('modulo/administrador/usuarios').' '.

                                        activarLink('modulo/administrador/usuarios/*').' '.

                                        activarLink('empleados').' '.

                                        activarLink('empleados/*').' '.

                                        activarLink('permisos').' '.

                                        activarLink('empleados/*').' '.

                                        activarLink('descargas-op').' '.

                                        activarLink('descargas-em').' '.

                                        activarLink('ReciboEmpleado').' '.

                                        activarLink('ReciboEmpleado/*')}}">

                    <a href="javascript:;">

                        <b class="caret pull-right"></b>

                        <i class="fas fa-money-check-alt"></i>

                        <span id="modulo-nomina">Nómina</span>

                    </a>

                    <ul class="sub-menu">

                        <li class="modulos-desa has-sub">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                Descarga

                            </a>

                            <ul class="sub-menu">

                                <li class="{{activarLink('')}}">

                                    <a href="{{url('#')}}">Soft. operativo</a>

                                </li>

                                <li class="{{activarLink('')}}">

                                    <a href="{{url('#')}}">APP empleados</a>

                                </li>

                            </ul>

                        </li>

                        @permission('nomina.nominas')

                        <li class="has-sub">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                Nóminas

                            </a>

                            <ul class="sub-menu">

                                <li class="modulos-desa {{activarLink('')}}">

                                    <a href="{{url('#')}}">Reportes de incidencias</a>

                                </li>

                                @permission('nomina.nominas.detalle')

                                <li class="{{activarLink('DetallesNomina').' '.activarLink('DetallesNomina/*') }}">

                                    <a href="{{ url('Concentrado') }}">Detalle de nómina</a>

                                </li>

                                @endpermission

                            </ul>

                        </li>

                        @endpermission

                        @permission('Empleados')

                        <li class="has-sub">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                Empleados

                            </a>

                            <ul class="sub-menu">

                                <li class="modulos-desa {{activarLink('')}}">

                                    <a href="{{url('#')}}">Contrato de empleado</a>

                                </li>

                                @permission('empleado.recibo')

                                <li class="{{activarLink('ReciboEmpleado').' '.activarLink('ReciboEmpleado/*') }}">



                                    <a href="{{ route('ReciboEmpleado.index') }}">Recibos de empleado</a>

                                </li>

                                @endpermission

                            </ul>

                        </li>

                        @endpermission

                        <li class="modulos-desa">

                            <a href="#">Reportes</a>

                        </li>

                        <!-- <li class="{{activarLink('permisos').' '.activarLink('permisos/*') }} ">

                            <a href="{{ url('permisos') }}">Permisos Nomina</a>

                        </li> -->

                    </ul>

                </li>

            @endpermission


            @permission('facturacion.main')
            <li class="has-sub {{	activarLink('facturacion')}}">

                    <a href="javascript:;">

                        <b class="caret pull-right"></b>

                        <i class="fas fa-money-check-alt"></i>

                        <span id="modulo-nomina">Facturación</span>

                    </a>

                    @permission('facturacion.facturacion')
                    <ul class="sub-menu">

                        <li class="{{ activarLink('facturacion') }}"><a href="{{url('facturacion')}}">Facturación</a></li>

                    </ul>
                    @endpermission
            </li>
            @endpermission



            @if( Auth::user()->isAbleEnter('ese') )

            @include('layouts.master_encuestas')

        @endif

                        <!-- <li class="disabled modulos-desa has-sub {{ 	activarLink( '' ) }}">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                <i class="fa fa-briefcase"></i>

                                <span id="">CYC</span>

                            </a>

                            <ul class="sub-menu" >

                                <li class="modulos-desa {{ activarLink('') }}">

                                    <a href="{{ url('#') }}">Reportes</a>

                                </li>

                            </ul>

                        </li>



                        <li class="disabled modulos-desa has-sub {{ 	activarLink( '' ) }}">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                <i class="fas fa-dolly-flatbed"></i>

                                <span id="">Inventario</span>

                            </a>

                            <ul class="sub-menu" >

                                <li class="modulos-desa {{ activarLink('') }}">

                                    <a href="{{ url('#') }}">Reportes</a>

                                </li>

                            </ul>

                        </li>



                        <li class="disabled modulos-desa has-sub {{ 	activarLink( '' ) }}">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                <i class="fas fa-receipt"></i>

                                <span id="">Facturación</span>

                            </a>

                            <ul class="sub-menu" >

                                <li class="modulos-desa disabled has-sub">

                                    <a href="javascript:;">

                                        <b class="caret pull-right"></b>

                                        Descarga

                                    </a>

                                    <ul class="sub-menu">

                                        <li class="modulos-desa {{activarLink('')}}">

                                            <a href="{{url('#')}}">Soft. operativo</a>

                                        </li>

                                    </ul>

                                </li>

                                <li class="modulos-desa {{ activarLink('') }}">

                                    <a href="{{ url('#') }}">Reportes</a>

                                </li>

                            </ul>

                        </li>



                        <li class="disabled modulos-desa has-sub {{ 	activarLink( '' ) }}">

                            <a href="javascript:;">

                                <b class="caret pull-right"></b>

                                <i class="fas fa-file-invoice-dollar"></i>

                                <span id="">Contabilidad</span>

                            </a>

                            <ul class="sub-menu" >

                                <li class="modulos-desa has-sub">

                                    <a href="javascript:;">

                                        <b class="caret pull-right"></b>

                                        Descarga

                                    </a>

                                    <ul class="sub-menu">

                                        <li class="disabled {{activarLink('')}}">

                                            <a href="{{url('#')}}">Soft. operativo</a>

                                        </li>

                                    </ul>

                                </li>

                                <li class="modulos-desa has-sub">

                                    <a href="javascript:;">

                                        <b class="caret pull-right"></b>

                                        Bancos

                                    </a>

                                    <ul class="sub-menu">

                                        <li class="{{activarLink('')}}">

                                            <a href="{{url('#')}}">Presupuesto</a>

                                        </li>

                                        <li class="{{activarLink('')}}">

                                            <a href="{{url('#')}}">Registrar cobros</a>

                                        </li>

                                        <li class="{{activarLink('')}}">

                                            <a href="{{url('#')}}">Registrar pagos</a>

                                        </li>

                                    </ul>

                                </li>

                                <li class="modulos-desa {{ activarLink('') }}">

                                    <a href="{{ url('#') }}">Contabilidad</a>

                                </li>

                                <li class="modulos-desa has-sub">

                                    <a href="javascript:;">

                                        <b class="caret pull-right"></b>

                                        Reportes

                                    </a>

                                    <ul class="sub-menu">

                                        <li class="modulos-desa {{activarLink('')}}">

                                            <a href="{{url('#')}}">Conciliación</a>

                                        </li>

                                    </ul>

                                </li>

                            </ul>

                        </li> -->





    @endif

    @if( Auth::user()->tipo=='e')

                    <li class="{{ (request()->is('dashboardEmpleado')) ? 'active' : '' }}">

                        <a href="{{url('/dashboardEmpleado')}}">

                        <!--  <a href="javascript:;">

                            <b class="caret pull-right"></b>-->

                            <i class="fas fa-hourglass-start"></i>

                            <span id="">Inicio / Dashboard Empleado</span>

                        </a>

                    </li>

                    <li class="has-sub {{ 	activarLink( '' ) }}">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            <i class="fas fa-user-circle"></i>

                            <span id="">Perfil</span>

                        </a>

                        <ul class="sub-menu" >

                            <li class="{{ activarLink('empleado') }}">

                                <a href="{{ url('informacion-personal') }}">Información Personal</a>

                            </li>

                            <li class="{{ activarLink('changePassword') }}">

                                <a href="{{ url('cuenta-de-usuario') }}">Cuenta de Usuario</a>

                            </li>

                        </ul>

                    </li>

                    <li class="has-sub {{ activarLink('BNomina-Empleado').' '.

                                          activarLink('BNomina-Empleado/*') }}">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            <i class="fas fa-money-check-alt"></i>

                            <span id="">Nómina</span>

                        </a>

                        <ul class="sub-menu" >

                            <!-- <li class="{{ activarLink('') }}">

                                <a href="{{ url('/App') }}">APP</a>

                            </li> -->

                            <li class="{{ activarLink('BNomina-Empleado').' '.activarLink('BNomina-Empleado/*') }}">

                                <a href="{{ url('BNomina-Empleado') }}">Recibos de Nómina</a>

                            </li>

                        </ul>

                    </li>



                    <!-- <li class="modulos-desa disabled has-sub {{ 	activarLink( '' ) }}">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            <i class="fas fa-question-circle"></i>

                            <span id="">Soporte</span>

                        </a>

                    </li> -->

    @endif

    @if( Auth::user()->tipo=='f')
                        
                <li class="active">

                    <a href="{{url('/dashboard')}}">

                         <i class="fas fa-hourglass-start"></i>

                        <span id="">Dashboard</span>

                    </a>

                </li>

                <li class="active">

                      <!--  <a href="javascript:;">  -->

                        <a href="{{ route('sig-erp-ese::ListadoOS.index') }}">

                            <i class="fas fa-hourglass-start"></i>

                            <span id="">Estudios socieconómicos</span>

                        </a>

                </li>

    @endif
    @if( Auth::user()->tipo=='c' )

                    <li class="active">

                      <!--  <a href="javascript:;">  -->

                        <a href="{{url('dashboard')}}">

                            <i class="fas fa-hourglass-start"></i>

                            <span id="">Inicio</span>

                        </a>

                    </li>

                    <li class="has-sub {{
                        activarLink('dashboardese').' '.
                        activarLink('NuevaOSCliente').' '.
                        activarLink('ListadoOS')
                        
                    }}">


                        <a href="#">

                            <b class="caret pull-right"></b>

                            <i class="fas fa-server"></i>

                            <span id="modulo-esec">Estudios socieconómicos</span>

                        </a>

                        <ul class="sub-menu" >
                        
                        <li class="{{ activarLink('NuevaOSCliente') }} ">
                            <a href="{{ url('NuevaOSCliente') }}">Nuevo / Solicitar Servicio</a>
                        </li>

                        <li class="{{ activarLink('dashboardese') }}" >
                            <a href="{{url('dashboardese')}}">Dashboard ESE </a>
                        </li>


                        

                        <li class="{{ activarLink('ListadoOS') }}">
                            <a href="{{ url('ListadoOS') }}">Estudios Socioeconómicos</a>
                        </li>

                        <li class="{{ activarLink('dashboardPl') }}"><a href="{{ route('sig-erp-ese::dashboardPl.index') }}">Dashboard PL</a></li>


                        <li class="{{ activarLink('estudio-ese') }} {{ activarLink('ListadoOS') }} {{ activarLink('ListadoOS') }}">
                            <a href="{{ route('sig-erp-ese::ListadoIncidencias.index') }}">Pruebas Laborales</a>
                        </li>


                        </ul>
                </li>

         
                    <li class="has-sub {{ 	activarLink('dashboardencuestas_cliente') .' '.
						activarLink('nuevoservicio').' '.
						activarLink('nom035') }}">

                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-clipboard"></i>
                            <span @if( !Auth::user()->isForeing() )
                            @if(Auth::user()->tipo != 'c')id="modulo-ese"  @endif
                                    @endif >Encuestas</span>
                        </a>

                        <ul class="sub-menu" @if(Auth::user()->tipo != 'c') id="menu-ese" @endif> 
                        <!--<li class="{{ activarLink('dashboardencuestas_cliente') }}"><a href="{{ route('dashboardencuestas_cliente') }}">Dashboard</a></li>
                        -->
	                     <li class="{{ activarLink('nom035') }}"> <a href="{{route('nom035')}}">Nom 035</a></li>
                        </ul>

                    </li>

    @endif

    @if( Auth::user()->tipo=='p')

                    <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">

                        <a href="{{url('/dashboard')}}">

                        <!--   <a href="javascript:;">

                            <b class="caret pull-right"></b>-->

                            <i class="fas fa-hourglass-start"></i>

                            <span id="">Inicio / Dashboard Proveedor</span>

                        </a>

                    </li>

                    <li class="modulos-desa disabled has-sub {{ 	activarLink( '' ) }}">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            <i class="fas fa-receipt"></i>

                            <span id="">Facturación</span>

                        </a>

                        <ul class="sub-menu" >

                            <li class="modulos-desa {{ activarLink('') }}">

                                <a href="{{ url('#') }}">Carga de facturas</a>

                            </li>

                            <li class="modulos-desa {{ activarLink('') }}">

                                <a href="{{ url('#') }}">Facturación</a>

                            </li>

                            <li class="modulos-desa {{ activarLink('') }}">

                                <a href="{{ url('#') }}">Estado de cuenta</a>

                            </li>

                        </ul>

                    </li>

                    <li class="modulos-desa disabled has-sub {{ 	activarLink( '' ) }}">

                        <a href="javascript:;">

                            <b class="caret pull-right"></b>

                            <i class="fas fa-question-circle"></i>

                            <span id="">Soporte</span>

                        </a>

                        <ul class="sub-menu" >

                            <li class="modulos-desa {{ activarLink('') }}">

                                <a href="{{ url('#') }}">Información de contacto</a>

                            </li>

                        </ul>

                    </li>

    @endif



 <li>

     <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">

         <i class="fa fa-angle-double-left"></i>

     </a>

 </li>





 <!-- end sidebar minify button -->

</ul>

<!-- end sidebar nav -->

</div>

<!-- end sidebar scrollbar -->

</div>

<!--<div class="sidebar-bg"></div>

end #sidebar -->







@yield('section')







<!-- begin scroll to top btn -->

<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

<!-- end scroll to top btn -->

</div>

<!-- end page container -->





<?php

/*************************

Aqui van los js

*************************/

?>

@yield('js-base')







    <!-- Initializations -->

    {!! Html::script('assets/acceso/js/aos.js') !!}



    {!! Html::script('assets/acceso/js/toastr.min.js') !!}

    <!-- waitMe.js -->

    {!! Html::script('assets/acceso/waitMe/waitMe.min.js') !!}

    {!! Html::script('assets/js/sweetalert.min.js') !!}







<script>

var intervalId=null;    

$(document).ready(function() {

App.init();

Dashboard.init();

  notificacion();

  intervalId = setInterval(function(){ SendMail() }, 60000);

$('[data-toggle="tooltip"]').tooltip();

$('.popovers').popover()



/************************************** Links principales del menu ****************************/

$("#modulo-crm").click(function(){

url = '{{url('dashboard')}}';

$(location).attr('href',url);

});

$("#modulo-ese").click(function(){

url = '{{url('dashboardese')}}';

$(location).attr('href',url);

});

$("#modulo-ese").click(function(){

url = '{{url('dashboardese')}}';

$(location).attr('href',url);

});



// $("#modulo-nomina").click(function(){

// url = '{{url('descargas-op')}}';

// $(location).attr('href',url);

// });





/************************************** Links principales del menu ****************************/

});



function notificacion(){



  $.ajax({

      url: "{{url('NotificaWeb')}}",

      type: "GET",

      success: function( response )

      {

        $("#panel-notifica").html(response[0]);

        if(response[1]!=0){

          $("#icon-not").html("<i class='fa fa-bell-o'></i> <span class='label'>"+response[1]+"</span>");

        }

      },

      error : function(xhr, status)

      {

          console.error('Upss, algo salio mal!!');

      }

});

}



function SendMail(){

				let actualizar = false;

				momentoActual = new Date();

				hora = momentoActual.getHours();

				minuto = momentoActual.getMinutes();

				str_minuto = new String (minuto);

				if (str_minuto.length == 1){

					minuto = "0" + minuto;

				}

				str_hora = new String (hora);

				if (str_hora.length == 1){

					hora = "0" + hora;

				}

				

				horaImprimible = hora + ":" + minuto;

				if(horaImprimible== "10:00") {

						var token = $('meta[name="csrf-token"]').attr('content');

						$.ajax({

							headers: {'X-CSRF-TOKEN':token},

							url:'{{ url('ESEvencimiento') }}',

							type:'POST',

							dataType: 'json',

							success: function (response) {

								// console.log("horaImprimibleR: "+horaImprimible);

								// if(response.status_alta == 'error'){

								// 	console.log(response.error);

								// }

								console.log(response);

								clearInterval(intervalId);

							}

						});

				}

				



			}



function ocultar(valor){

  if(valor.value=='off'){

    notificacion();

  }else{

      $("#icon-not").html("<i class='fa fa-bell-o'></i>");

      $("#panel-notifica").html("<li class='dropdown-header'> <div class='custom-control custom-checkbox'> <input type='checkbox' class='custom-control-input' id='customCheck1' onclick='ocultar(this);'value='off' > <label class='custom-control-label' for='customCheck1'>Notificaciones Desactivadas</label> </div> </li>");

  }



}



function leidos(){

  $.ajax({

      url: "{{url('NotificaLeidos')}}"+"/"+0+"/"+0,

      type: "GET",

      success: function( response )

      {

        $("#icon-not").html("<i class='fa fa-bell-o'></i>");

        $("#panel-notifica").html(response[0]);

      }

});

}



function enlace(id,IdEse){

  $.ajax({

      url: "{{url('NotificaLeidos')}}"+"/"+id+"/"+IdEse,

      type: "GET",

      success: function( response )

      {

        console.log(response);

      }

});

  setTimeout(function(){

    var link = "'listadoCampana/"+IdEse+"'";
      location.href ="{{url('listadoNo')}}/"+IdEse;



  },500);

}


function salirS() {

swal({

title: 'Operacion Exitosa',

text: '<p>¡Cerrando sesion!</p>',

html: true,

type: 'info',

confirmButtonColor: '#3085d6',

confirmButtonText: 'Ok'

}).then(function () {

location.href='';

});

}


$('.sdclick li a').on('click',function(e){

     $(this).parent().find('.sdclick li a.active').removeClass('active');

     $(this).addClass('active');

     //e.preventDefault();

});





</script>

</body>





</html>

