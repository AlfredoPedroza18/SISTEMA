<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:35:05 GMT -->
<head>
	<meta charset="utf-8" />

	<title>SIG-ERP Modulos</title>


	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	{!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
	{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
	{!! Html::style('assets/css/animate.min.css') !!}
	{!! Html::style('assets/css/style.min.css') !!}
	{!! Html::style('assets/css/style-responsive.min.css') !!}
	{!! Html::style('assets/css/theme/default.css" rel="styl') !!}
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== CSS SWEET ALERT ================== -->
	{!! Html::style('assets/css/sweetalert.css') !!}
	<!-- ================== END CSS SWEET ALERT ================== -->

	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	{!! Html::style('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') !!}
	{!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') !!}
	{!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
    {!! Html::style('assets/plugins/gritter/css/jquery.gritter.css') !!}
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('assets/plugins/pace/pace.min.js') !!}

	
	<!-- ================== END BASE JS ================== -->


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
	</style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="{{ url('/home') }}" class="navbar-brand"><span class="navbar-logo"></span> SIG-ERP</a>
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
					@permission('catalogos.main') 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-th-large fa-fw"></i> Catálogos <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu"> 
							@permission('catalogos.clientes')
                                <li>
                                	<a href="{{url('catalogo/clientes')}}">
                                		<i class="fa fa-cubes fa-fw"></i> 
                                		<span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Dar de alta un Cliente en el sistema SIG-ERP"></span>
                                		Clientes
                                	</a>
                                </li>
							@endpermission
                                {{-- <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                --}}
							@permission('catalogos.cotizaciones')
                                <li class="divider"></li>
                                <li>
                                	<a href="{{ url('catalogo/listado_cotizaciones') }}"> 
                                		<i class="fa fa-file-text-o fa-fw"></i> 
                                		<span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de cotizaciones del sistema SIG-ERP"></span>
                                		Cotizaciones
                                	</a>
                                </li>
							@endpermission
							@permission('catalogos.contratos')
                                <li class="divider"></li>
                                <li>
                                	<a href="{{ url('catalogo/listado_contratos') }}">
                                		<i class="fa fa-file-text fa-fw"></i> 
                                		<span class="fa fa-question-circle pull-right" data-toggle="tooltip" data-placement="bottom" title="Listado de contratos del sistema SIG-ERP"></span>
                                		Contratos
                                	</a>
                                </li>
							@endpermission    
                            </ul>
                        </li>
					@endpermission
                    </ul>
                </div>
<!-- ------------------------------------------------------ Menu de Cuentas --------------------------------->
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
					<?php /*
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword" />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
						*/
					?>
					</li>
					<li class="dropdown">

					
					    <?php /*
						<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell-o"></i>
							<span class="label">5</span>
						
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="assets/img/user-1.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="assets/img/user-2.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
						</ul>
						*/ ?>

						<ul class="cotizador-social-network cotizador-social-circle">
			                {{--  
			                <li><a href="{{ url('cotizador') }}" class="icoRss text-center" title="Cotizador"><i class="fa fa-calculator"></i></a></li>
			                --}}
			                <li>
			                	<a href="javascript:;" class="icoRss text-center popovers" 
											data-trigger="focus" 
											data-html="true" 
											data-container="body" 
											data-placement="bottom" 
											data-content='	
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
											' 
											data-original-title="<strong>Tipo de cotizador</strong>"><i class="fa fa-calculator"></i></a>
			                </li>
			            </ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							{!! Html::image('assets/img/user-13.jpg') !!}
							<span class="hidden-xs"> {{ Auth::user()->name }}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							@role('admin')
								<li><a href="{{ url('modulo/administrador/cuentas') }}"><i class="fa fa-btn fa fa-gears"></i> Administrador</a></li>
								<li role="separator" class="divider"></li>
							@endrole
							
							<li><a href="{{ url('cartas_tipo') }}"><span class="fa fa-pencil-square-o pull-right"></span>Carta tipo</a></li>
							<li><a href="{{ url('/logout') }}" onclick="salirS()" ><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="container">
			<?php /*
				<!-- begin breadcrumb -->
				<ol class="breadcrumb pull-right">
					<li><a href="javascript:;">Modulos</a></li>
					<li class="active">Dashboard</li>
				</ol>
				<!-- end breadcrumb -->
				*/
			?>
				 @include('partials.messages') 

			<p><p>
			<div class="jumbotron"> <!-- container -->
    
  
			<div class="row">

				<div class="col-md-12 col-sm-6">	
					<!-- begin page-header -->
					<h2 class="page-header text-center">SIG-ERP Módulos  </h2>
					<!-- end page-header -->
				</div>
			</div>
			
			<!-- begin row -->
			<div class="row">

			    @permission('admin.main')
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-money"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Administrador</p>	
						</div>
						<div class="stats-link">
						<a href="{{ Auth::user()->isAbleEnter('crm') ? url('/dashadministrador') : 'javascript:;' }}">Ingresar <i class="fa fa-arrow-circle-o-right"
							></i></a>
						</div>
					</div>
				</div>
				@endpermission
				<!-- begin col-3 -->
				{{--- @permission('crm.main|crear.clientes|eliminar.clientes|editar.clientes|clientes.cambiarcn') ---}}
				@permission('crm.main')
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-green-lighter">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>CRM</p>	
						</div>
						<div class="stats-link">
							<a href="{{ Auth::user()->isAbleEnter('crm') ? url('/dashboard') : 'javascript:;' }}"
							@if( !Auth::user()->isAbleEnter('crm') )
								onclick="moduloVencido('CRM')"
							@endif>Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
							
							<!--a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a-->
						</div>
					</div>
				</div>
				@endpermission 

				
				<!-- end col-3 -->

				<!-- begin col-3 -->
				{{--<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-bank"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Finanzas</p>	
						</div>
						<div class="stats-link">
							<a href="{{ url('/home') }}">Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->				
			</div>
			<!-- end row -->
			
			<!-- begin row -->
			<div class="row">				
				<!-- begin col-3 -->
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fa fa-user"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>RYS</p>	
						</div>
						<div class="stats-link">
							<a href="{{ url('/home') }}">Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>--}}
				<!-- end col-3 -->
				<!-- begin col-3 -->
				@permission('ese.ordenes.servicio|ese.ordenes.servicio.cancelar|ese.ordenes.servicio.cerrar|ese.ordenes.servicio.detalle')
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-book"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>ESE</p>	
						</div>
						<div class="stats-link">
							<a href="{{ Auth::user()->isAbleEnter('crm') ? url('dashboardese') : 'javascript:;' }}"
							@if( !Auth::user()->isAbleEnter('ese') )
								onclick="moduloVencido('Estudios Socioeconómicos')"
							@endif>Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				@endpermission
				<!-- end col-3 -->
				<!-- begin col-3 -->
				@permission('nomina')
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-money"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Nóminas</p>	
						</div>
						<div class="stats-link">
						<a href="{{ Auth::user()->isAbleEnter('crm') ? url('descargas-op') : 'javascript:;' }}">Ingresar <i class="fa fa-arrow-circle-o-right"
							@if( !Auth::user()->isAbleEnter('nomina') )
								onclick="moduloVencido('Nóminas')"
							@endif></i></a>
						</div>
					</div>
				</div>
				@endpermission
				<!-- end col-3 -->				
				<!-- begin col-3 -->
				{{--<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-aqua">
						<div class="stats-icon"><i class="fa fa-calculator"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Contabilidad</p>	
						</div>
						<div class="stats-link">
							<a href="{{ url('/home') }}">Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->

			<!-- begin row -->
			<div class="row">				
				<!-- begin col-3 -->
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-black-lighter">
						<div class="stats-icon"><i class="fa fa-cubes"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Recursos Humanos</p>	
						</div>
						<div class="stats-link">
							<a href="{{ url('/home') }}">Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-red-lighter">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Consultoria</p>	
						</div>
						<div class="stats-link">
							<a href="{{ url('/home') }}">Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>--}}
				<!-- end col-3 -->
				<!-- begin col-3 -->
				@permission('facturacion.main|facturacion.facturacion')
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-black">
						<div class="stats-icon"><i class="fa fa-clock-o"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Facturación</p>	
						</div>
						<div class="stats-link">
							<a href="{{ url('facturacion') }}">Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				@endpermission
				<!-- end col-3 -->
				<!-- begin col-3 -->
				@permission('encuestas.main|encuestas.nom035|encuestas.nuevo.servicio|encuestas.catalogos')
				<div class="col-md-4 col-sm-6 animacion-modulos">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-clipboard"></i></div>
						<div class="stats-info text-center">
							<h4> <br></h4>
							<p>Encuestas</p>	
						</div>
						<div class="stats-link">
							<a href="{{ Auth::user()->isAbleEnter('crm') ? url('dashboardencuestas') : 'javascript:;' }}"
							@if( !Auth::user()->isAbleEnter('ese') )
								onclick="moduloVencido('Estudios Socioeconómicos')"
							@endif>Ingresar <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				@endpermission
				<!-- end col-3 -->
			</div>
			<!-- end row -->
</div><!-- end jumbobutron-->
			
		</div>
		<!-- end #content -->

		
		
        <!-- begin theme-panel -->

        <?php /*
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        */
        ?>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('assets/plugins/jquery/jquery-1.9.1.min.js') !!}
	{!! Html::script('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') !!}
	{!! Html::script('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') !!}
	{!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	{!! Html::script('assets/plugins/slimscroll/jquery.slimscroll.min.js') !!}
	{!! Html::script('assets/plugins/jquery-cookie/jquery.cookie.js') !!}
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{!! Html::script('assets/plugins/gritter/js/jquery.gritter.js') !!}
	{!! Html::script('assets/plugins/flot/jquery.flot.min.js') !!}
	{!! Html::script('assets/plugins/flot/jquery.flot.time.min.js') !!}
	{!! Html::script('assets/plugins/flot/jquery.flot.resize.min.js') !!}
	{!! Html::script('assets/plugins/flot/jquery.flot.pie.min.js') !!}
	{!! Html::script('assets/plugins/sparkline/jquery.sparkline.js') !!}
	{!! Html::script('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
	{!! Html::script('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') !!}
	{!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
	{!! Html::script('assets/js/dashboard.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}
	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}
	
	<script>
		$(document).ready(function() {
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

		function moduloVencido( modulo )
		{
			swal({   
				title: "<h3>¡Necesitas contratar el servicio del módulo " + modulo + "!</h3> ",
				text: "<h4><span style=\"color:#FF9933\">Comunicate con tu ejecutivo de SIG-ERP<span></h4>",   
				html: true,
				type: "warning",   
				showCancelButton: false,   
				closeOnConfirm: false,   
				showLoaderOnConfirm: true, 
				cancelButtonText: 'Cancelar',
				confirmButtonColor: 'ef9d1e'
			});
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
	
	</script>

    
</body>

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:36:31 GMT -->
</html>
