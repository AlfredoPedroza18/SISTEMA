<?php

	function activarLink( $url = '' )
	{
		return Request::is( $url )  ? '' : '*';
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
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

	<!-- ================== CSS SWEET ALERT ================== -->
	{!! Html::style('assets/css/sweetalert.css') !!}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
		integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<!-- ================== END CSS SWEET ALERT ================== -->

	{!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
	{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
	{!! Html::style('assets/css/animate.min.css') !!}
	@if((Auth::check()) and (Auth::user()->tipo=='s'))
	{!! Html::style('assets/css/styles.min.css') !!}
	{!! Html::style('assets/css/theme/defaults.css') !!}
	@endif

	{!! Html::style('assets/css/style-responsive.min.css') !!}

	{!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.css') !!}
	<!-- ================== END BASE CSS STYLE ================== -->




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
	{!! Html::style('assets/css/chosen.css') !!}

	@yield('estilos')

	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('assets/plugins/pace/pace.min.js') !!}
	<!-- ================== END BASE JS ================== -->

	<!--{!! Html::style('assets/plugins/drop-zone/dropzone.css') !!}-->

	<style type="text/css">
		ul.cotizador-social-network {
			list-style: none;
			display: inline;
			margin-left: 0 !important;
			padding: 0;
		}

		ul.cotizador-social-network li {
			display: inline;
			margin: 0 5px;
		}

		.cotizador-social-circle li a {
			display: inline-block;
			position: relative;
			margin: 5px auto 0 auto;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			border-radius: 50%;
			text-align: center;
			width: 2em;
			height: 2em;
			font-size: 20px;
			background-color: #D8D8D8;
		}

		.cotizador-social-circle li i {
			margin: 0;
			line-height: 2em;
			text-align: center;
		}

		.cotizador-social-network a.icoRss:hover {
			background-color: #F56505;
		}

		.cotizador-social-network a.icoRss:hover i {
			color: #fff;
		}

		.cotizador-social-circle li a:hover i,
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

		.cotizador-social-circle i {
			color: #fff;
			-webkit-transition: all 0.8s;
			-moz-transition: all 0.8s;
			-o-transition: all 0.8s;
			-ms-transition: all 0.8s;
			transition: all 0.8s;
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
					<a @if(Auth::check() && !Auth::user()->is('investigador.foraneo'))
						href="{{ url('/home') }}"
						@else
						href="javascript:;"
						@endif
						class="navbar-brand"><span class="navbar-logo"></span> SIG-ERP</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->

				<!-- ------------------------------------------------------ Menu de Cuentas ------------------------------- -->

				<div class="collapse navbar-collapse pull-left" id="top-navbar">
					<ul class="nav navbar-nav">

						@if( !Auth::user()->isForeing() )
						@permission('catalogos.clientes|catalogos.cotizaciones|catalogos.contratos|catalogos.os')
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-th-large fa-fw"></i> Catálogos <b class="caret"></b>
							</a>
							<ul class="dropdown-menu" role="menu">
								@permission('catalogos.clientes')
								<li>
									<a href="{{url('catalogo/clientes')}}">
										<i class="fa fa-cubes fa-fw"></i>
										<span class="fa fa-question-circle pull-right" data-toggle="tooltip"
											data-placement="bottom"
											title="Dar de alta un Cliente en el sistema SIG-ERP"></span>
										Clientes
									</a>
								</li>
								{{-- <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                --}}
								<li class="divider"></li>
								@endpermission
								@permission('catalogos.cotizaciones')
								<li>
									<a href="{{ url('catalogo/listado_cotizaciones') }}">
										<i class="fa fa-file-text-o fa-fw"></i>
										<span class="fa fa-question-circle pull-right" data-toggle="tooltip"
											data-placement="bottom"
											title="Listado de cotizaciones del sistema SIG-ERP"></span>
										Cotizaciones
									</a>
								</li>
								<li class="divider"></li>
								@endpermission
								@permission('catalogos.contratos')
								<li>
									<a href="{{ url('catalogo/listado_contratos') }}">
										<i class="fa fa-file-text fa-fw"></i>
										<span class="fa fa-question-circle pull-right" data-toggle="tooltip"
											data-placement="bottom"
											title="Listado de contratos del sistema SIG-ERP"></span>
										Contratos
									</a>
								</li>
								<li class="divider"></li>
								@endpermission
								@permission('catalogos.os')
								<li>
									<a href="{{ url('ordenes_servicio') }}">
										<i class="fa fa-reorder fa-fw"></i>
										<span class="fa fa-question-circle pull-right" data-toggle="tooltip"
											data-placement="bottom"
											title="Listado de contratos del sistema SIG-ERP"></span>
										Ordenes de servicio
									</a>
								</li>
								@endpermission


							</ul>
						</li>
						@endpermission
						@endif
					</ul>
				</div>
				<!-- ------------------------------------------------------ Menu de Cuentas --------------------------------->
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>

						@if( !Auth::user()->isForeing() )
					<li class="dropdown">

						<ul class="cotizador-social-network cotizador-social-circle">
							{{--
			                <li>
			                	<a href="{{ url('cotizador') }}" class="icoRss text-center" title="Cotizador">
							<i class="fa fa-calculator"></i>
							</a>
					</li>
					--}}
					<li>
						<a href="javascript:;" class="icoRss text-center popovers" data-trigger="focus" data-html="true"
							data-container="body" data-placement="bottom" data-content='
							<table class="table table-hover table-condensed">
														<tbody>
															<tr>
																<td>Gen-T</td>
																<td>
																	<a 	class="btn btn-circle btn-icon-only btn-success"
																		href="{{ url('cotizador') }}">
																		<i class="fa fa-calculator"></i>
																	</a>
																</td>
															</tr>
															<tr>
																<td>Genérico</td>
																<td>
																	<a 	class="btn btn-circle btn-icon-only btn-primary"
																		href="{{ url('cotizador_general') }}">
																		<i class="fa fa-calculator"></i>
																	</a>
																</td>
															</tr>
														</tbody>
											' data-original-title="<strong>Tipo de cotizador</strong>"><i class="fa fa-calculator"></i></a>
					</li>
				</ul>


				</li>
				@endif
				<li class="dropdown navbar-user">

					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						{!! Html::image('assets/img/user-13.jpg') !!}
						<span class="hidden-xs"> {{ Auth::user()->name }}</span> <b class="caret"></b>
					</a>
					<ul class="dropdown-menu animated fadeInLeft">
						<li class="arrow"></li>
						@role('admin')
						<li><a href="{{ url('modulo/administrador/cuentas') }}"><i class="fa fa-btn fa fa-gears"></i>
								Administrador</a></li>
						<li role="separator" class="divider"></li>
						@endrole
						@if( !Auth::user()->isForeing() )
						<li><a href="{{ url('cartas_tipo') }}"><span
									class="fa fa-pencil-square-o pull-right"></span>Carta tipo</a></li>
						@endif
						<li><a href="{{ url('/logout') }}" onclick="salirS()"><i class="fa fa-btn fa-sign-out"></i>
								Cerrar sesion</a></li>

					</ul>
				</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->





		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar hidden-print">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;">{!! Html::image('assets/img/user-13.jpg') !!}</a>
						</div>
						<div class="info">
							Empresa Gen-T
							<small>SIG-ERP</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navegación</li>

					{{-- Inicio Utilerias --}}
					@role('admin')
					<li class="has-sub {{ 	activarLink( 'utilerias/*' ) }}">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa fa-briefcase"></i>
							<span id="">Utilerías</span>
						</a>
						<ul class="sub-menu">

							<li class="{{ activarLink('utilerias/plantillas') }}">
								<a href="{{ url('utilerias/plantillas') }}">Plantillas Cotizador</a>
							</li>
							<li class="{{ activarLink('utilerias/plantilla_contratos') }}">
								<a href="{{ url('utilerias/plantilla_contratos') }}">Plantillas Contratos</a>
							</li>
							<li class="{{ activarLink('utilerias/impuestos') }}">
								<a href="{{ url('utilerias/impuestos') }}">Impuestos</a>
							</li>



						</ul>

					</li>
					@endrole
					{{-- Fin Utilerias --}}

					<!-- Inicio Menú Administrador -->
					@role('admin')
					<li class="has-sub {{
										activarLink( 'modulo/administrador/*' ) .' '.
										 activarLink('EmpresasFacturadoras').' '.
										 activarLink('EmpresasFacturadoras/*').' '.
										 activarLink('info-comercial').' '.
										 activarLink('info-comercial/*').' '.
										 activarLink('anexo-documentos').' '.
										 activarLink('anexo-documentos/*').' '.
										 activarLink('departamentos').' '.
										 activarLink('departamentos/*').''.
										 activarLink('modulo/administrador/cotizador').' '.
										 activarLink('modulo/administrador/cotizador/*').' '.
										 activarLink( 'modulo/administrador/usuarios').' '.
										 activarLink( 'modulo/administrador/usuarios/*')
										  }}">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa fa-gears"></i>
							<span id="">Administrador</span>
						</a>
						<ul class="sub-menu">

							<!-- <li class="
						    			{{-- activarLink( 'modulo/administrador/cuentas' ).' '.
						    				activarLink('EmpresasFacturadoras').' '.
						    				activarLink('EmpresasFacturadoras/*').' '.
						    				activarLink('departamentos').' '.
											activarLink('departamentos/*').' '.
											activarLink('modulo/administrador/puestos').' '.
											activarLink('modulo/administrador/puestos/*').' '.
											activarLink('modulo/administrador/usuarios').' '.
											activarLink('modulo/administrador/usuarios/*') }}">
						    				<a href="{{ //url('modulo/administrador/cuentas') --}}">Cuentas</a>
								</li> -->

							{{-- 	has-sub {{ 	activarLink( 'modulo/administrador/*' ) .' '.
											activarLink('EmpresasFacturadoras').' '.
											activarLink('EmpresasFacturadoras').' '.
											activarLink('EmpresasFacturadoras/*').' '.
											activarLink('departamentos').' '.
											activarLink('departamentos/*').''.
											activarLink('modulo/administrador/cotizador').' '.
											activarLink('modulo/administrador/cotizador/*').' '.
											activarLink( 'modulo/administrador/usuarios').' '.
											activarLink( 'modulo/administrador/usuarios/*')}} --}}


							<li class="#"><a href="#">Subscripciones</a></li>

							<li class="has-sub {{
							    activarLink('EmpresasFacturadoras').' '.
								activarLink('EmpresasFacturadoras/*').' '.
								activarLink('info-comercial').' '.
								activarLink('info-comercial/*').' '.
								activarLink('anexo-documentos').' '.
								activarLink('anexo-documentos/*') }}">
								<a href="javascript:;">
									<b class="caret pull-right"></b>
									<span id="">Empresas</span>
								</a>
								<ul class="sub-menu">
									<li
										class="{{ activarLink('EmpresasFacturadoras').' '.activarLink('EmpresasFacturadoras/*') }}">
										<a href="{{ route('sig-erp-crm::EmpresasFacturadoras.index') }}">Empresas
											Facturadoras</a>
									</li>
									<li class="{{ activarLink('info-comercial') }}">
										<a href="{{ url('info-comercial') }}">Informacion Comercial</a>
									</li>
									<li class="{{ activarLink('anexo-documentos') }}">
										<a href="{{ url('anexo-documentos') }}">Anexo Documentos</a>
									</li>


								</ul>
							</li>

							<li class="{{ activarLink('departamentos').' '.activarLink('departamentos/*') }}">
								<a href="{{ route('sig-erp-crm::departamentos.index') }}">Departamentos</a>
							</li>
							<li
								class="{{ activarLink('modulo/administrador/puestos').' '.activarLink('modulo/administrador/puestos/*') }}">
								<a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permisos</a>
							</li>
							<li
								class="{{ activarLink( 'modulo/administrador/usuarios').' '.activarLink( 'modulo/administrador/usuarios/*') }}">
								<a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}">Usuario</a>
							</li>
					</li>
					<li
						class="{{ activarLink('modulo/administrador/cotizador').' '.activarLink('modulo/administrador/cotizador/*') }}">
						<a href="{{ route('sig-erp-crm::modulo.administrador.cotizador.index') }}">Cotizador</a>
					</li>
					<li class="{{ activarLink( 'modulo/administrador/kardex' ) }}"><a
							href="{{ url('modulo/administrador/kardex') }}">Kardex</a></li>
					<!-- <li class="{{ activarLink( 'modulo/administrador/perfil') }}">
					<a href="{{ url('modulo/administrador/perfil') }}">Perfiles</a></li> -->

				</ul>
				</li>
				@endrole
				<!-- Fin Menú Administrador -->
				@if( Auth::user()->isAbleEnter('crm') )
				@if( !Auth::user()->isForeing() )

				@permission('crear.clientes|eliminar.clientes|editar.clientes|clientes.cambiarcn')
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
					<ul class="sub-menu">


						@permission('crear.clientes|eliminar.clientes|editar.clientes|clientes.cambiarcn|reportes.show')
						<li class="{{ 	activarLink('clientes').' '.
						    				activarLink('clientes/*') }}"><a href="{{url('clientes')}}">Clientes / Prospectos</a></li>
						@endpermission

						@permission('correos.send')
						<li class="{{ activarLink('correos').' '.activarLink('correos/*') }}"><a
								href="{{url('correos')}}">Correos</a></li>
						@endpermission

						@permission('agenda.cancelar')
						<li class="{{ activarLink('agenda') }}"><a href="{{url('agenda')}}">Agenda</a></li>
						@endpermission

						@permission('cotizaciones.contrato')
						<li class="{{ activarLink('listado_cotizaciones') }}"><a
								href="{{url('listado_cotizaciones')}}">Cotizaciones</a></li>
						@endpermission

						@permission('contratos.listado')
						<li class="{{ activarLink('listado_contratos') }}"><a
								href="{{url('listado_contratos')}}">Contratos</a></li>
						@endpermission


						@permission('reportes.show')
						<li class="has-sub {{ 	activarLink('ReporteProspectos').' '.
						    						activarLink('ClientesContratos').' '.
						    						activarLink('ReportesCitas').' '.
						    						activarLink('ReportesCotizaciones').' '.
						    						activarLink('ReportesLLamadas').' '.
						    						activarLink('ReportesCotizaciones') }}">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								Reportes
							</a>
							<ul class="sub-menu">
								@permission('reportes.prospecto.show')
								<li class="{{ activarLink('ReporteProspectos') }}">
									<a href="{{url('ReporteProspectos')}}">Prospectos</a>
								</li>
								@endpermission
								@permission('reportes.contrato.show')
								<li class="{{ activarLink('ClientesContratos') }}">
									<a href="{{url('ClientesContratos')}}">Clientes con contrato y Generados</a>
								</li>
								@endpermission
								@permission('reportes.citas.show')
								<li class="{{ activarLink('ReportesCitas') }}">
									<a href="{{url('ReportesCitas')}}">Reporte de Citas</a>
								</li>
								@endpermission
								@permission('reportes.llamadas.show')
								<li class="{{ activarLink('ReportesLLamadas') }}">
									<a href="{{url('ReportesLLamadas')}}">Reporte de acción por cliente realizadas</a>
								</li>
								@endpermission
								@permission('reportes.cotizaciones.show')
								<li class="{{ activarLink('ReportesCotizaciones') }}">
									<a href="{{url('ReportesCotizaciones')}}">Reporte de Cotizaciones</a>
								</li>
								@endpermission
								<!--<li><a href="javascript:;">Reporte de Contratos enviados</a></li>-->
							</ul>
						</li>
						@endpermission

					</ul>

				</li>
				@endpermission

				@endif
				@endif
				<!-- begin sidebar minify button -->
				@if( Auth::user()->isAbleEnter('ese') )
				@include('layouts.master_ese')
				@endif

				@role('admin')
				<li class="has-sub {{	activarLink('modulo/administrador/usuarios').' '.
											activarLink('modulo/administrador/usuarios/*').' '.
											activarLink('empleados').' '.
											activarLink('empleados/*').' '.
											activarLink('descargas-op').' '.
											activarLink('descargas-em').' '.
											activarLink('ReciboEmpleado').' '.
											activarLink('ReciboEmpleado/*')}}">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="fa fa-briefcase"></i>
						<span id="">Nómina</span>
					</a>
					<ul class="sub-menu">
						<li class="{{ activarLink('descargas-op') }}">
							<a href="{{ url('descargas-op') }}">Descargas</a>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								Nóminas
							</a>
							<ul class="sub-menu">
								<li class="#">
									<a href="#">Detalle de nómina</a>
								</li>
								<li class="{{activarLink('ReciboEmpleado').' '.activarLink('ReciboEmpleado/*') }}">
									<a href="{{ route('ReciboEmpleado.index') }}">Recibos de empleados</a>
								</li>

							</ul>
						</li>
						<li class="#">
							<a href="#">Reportes</a>
						</li>
					</ul>
				</li>
				@endrole

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
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
			data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->


	<?php
		/*************************
			Aqui van los js
		*************************/
	?>
	@yield('js-base')






	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
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


/************************************** Links principales del menu ****************************/
		});

		function salirS() {
			swal({
			title: 'Operacion Exitosa',
			text: '<p style="font-weight: bold;">¡Cerrando sesion!</p>',
			html: true,
			type: 'info',
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Ok'
		  }).then(function () {
			location.href='';
		  });
			}
	</script>
</body>


</html>
