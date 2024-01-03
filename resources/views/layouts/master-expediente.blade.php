<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:35:05 GMT -->
<head>
	
	<title>SIG-ERP-Gen-t</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

	<!-- ================== CSS SWEET ALERT ================== -->
	{!! Html::style('assets/css/sweetalert.css') !!}
	<!-- ================== END CSS SWEET ALERT ================== -->

	{!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
	{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
	{!! Html::style('assets/css/animate.min.css') !!}
	{!! Html::style('assets/css/style.min.css') !!}
	{!! Html::style('assets/css/style-responsive.min.css') !!}
	{!! Html::style('assets/css/theme/default.css') !!}
	{!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.css') !!}
	<!-- ================== END BASE CSS STYLE ================== -->
	
	


	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	{!! Html::style('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') !!}
	{!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') !!}
	{!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
	{!! Html::style('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
	{!! Html::style('assets/plugins/gritter/css/jquery.gritter.css') !!}
    {!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.js') !!}
    {!! Html::style('assets/plugins/select2/dist/css/select2.min.css') !!}
 
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE DATATABLES ================== -->





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
	
	
	
	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('assets/plugins/pace/pace.min.js') !!}
	<!-- ================== END BASE JS ================== -->

	<!--{!! Html::style('assets/plugins/drop-zone/dropzone.css') !!}-->


	
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
					<a href="{{ url('/home') }}" class="navbar-brand"><span class="navbar-logo"></span> SIG-ERP</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<?php 
						/*
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

						<!-- <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell-o"></i>
							<span class="label">5</span>
						</a>
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
                           
						</ul> -->
						

					</li>
					<li class="dropdown navbar-user">
					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							{!! Html::image('assets/img/user-13.jpg') !!}
							<span class="hidden-xs"> Cliente </span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<!--li class="arrow"></li>
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="{{ url('cartas_tipo') }}"><span class="fa fa-pencil-square-o pull-right"></span>Carta tipo</a></li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li-->
								><i class="fa fa-btn fa-sign-out"></i> Cerrar sesion</a></li>
							<li><a href="{{ url('/logout/clientes') }}" onclick="salirS()"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
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
				<ul class="nav" >
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;">{!! Html::image('assets/img/user-13.jpg') !!}</a>
						</div>
						<div class="info">
							RAZON SOCIAL
							<small>CLIENTE</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav" >
					<li class="nav-header">Navegación</li>

					<li class="has-sub active ">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-laptop"></i>
						    <span>MENÚ</span>
					    </a>
						<ul class="sub-menu" >
						  
						    <li class="active"><a href="#">Archivos</a></li>
						    <li class="active"><a href="#">Facturas</a></li>
						    <li class="active"><a href="#">Por Pagar</a></li>
						    <li class="active"><a href="#">Cotizaciones</a></li>
						    
						    
						</ul>
					</li>					
			        <!-- begin sidebar minify button -->
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
		
		

		<?php
		/*
        <!-- begin theme-panel -->
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
        <!-- end theme-panel -->
		*/

		?>
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


	
	
	
	
	<script>
		$(document).ready(function() {
			App.init();
			

/************************************** Links principales del menu ****************************/
			$("#modulo-crm").click(function(){
    			url = '{{url('dashboard')}}';    
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
