@extends('layouts.masterMenuView')



@section('section')



<!-- begin #content agenda -->





<div id="content" class="content">



	<!-- begin breadcrumb -->

	<ol class="breadcrumb ">

		@if(Auth::user()->tipo=='s')

		<li>{{ link_to('home', $title = 'Módulos', $parameters = array(), $attributes = array()) }}</li>

			<li class="active">CRM-Dashboard</li>
		


		@elseif(Auth::user()->tipo=='c')

			<li class="active">Inicio</li>

		@else

		@endif

	</ol>

	<!-- end breadcrumb -->

	<!-- begin page-header -->
	@if(Auth::user()->tipo!="c" && Auth::user()->tipo!="f")
	<div style="display: flex; justify-content:end;">
		<h1 style="width: 50vw;  font-size: 30px;" class="page-header text-center">DASHBOARD</h1>
		
		<div style="width: 10px;"></div>

		@if(Auth::user()->tipo!="f")
		<div style="width: 15vw; text-align: center; display: flex; justify-content: end;" >
		<a class="btn btn-success text-center" onclick="pdfs()"  style="height: 30px; width: 130px; text-align: center;" target="_blank">Generar Reporte</a> 
		</div>
		@endif
		
		<div style="height: 10px;"></div>
	</div>

	@if(Auth::user()->tipo!="f")
	<div class="row">
		
			<div class=" form-group col-md-4 col-sm-7" style="margin-left: -2px;">
				<label>Tipo</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="tipo_cliente" name="tipo_cliente" >
							<option value="-1"> Sin Filtro</option>
							<option value="1">Prospectos</option>
							<option value="2">Clientes</option>
						</select>

					</div>
				</div>
			</div>

			<div class="form-group col-md-4 col-sm-7" style="margin-left: 0px;">
				<label>Cliente / Prospecto</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="clientes_prospectos" name="clientes_prospectos">
							<option value="-1"> Sin Filtro</option>
							@foreach($cli_pros as $clientes)
								<option value="{{$clientes->id}}">{{$clientes->nombre_comercial}}</option>
							@endforeach
							
						</select>


					</div>
				</div>
			</div>

			

			<div class="form-group col-md-4 col-sm-7" style="margin-left: 1px;">
				<label>Departamentos</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="depar" name="IdInvestigador" >
							<option value="-1"> Sin Filtro</option>
							@foreach($departamentos as $departamento)
								<option value="{{$departamento->id}}"> {{$departamento->departamento}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		
	@endif
		
	<div class="row">

<!-- begin col-6 potlet #1 -->


<div class="col-md-4 col-md-offset-4 col-sm-6">

	

	</div><!-- end colspan 6-->

	</div>
	@elseif(Auth::user()->tipo=="f")
		<h1 class="page-header text-center">Dashboard<small></small></h1>

	@else
	<h1 class="page-header text-center">Inicio<small></small></h1>
	@endif
	<!-- end page-header -->

	<!-- begin row -->


	@if(Auth::user()->tipo=="c")

	<div class="row">

		<!-- begin col-3 -->
		<div class="col-md-3 col-md-offset-3 col-sm-6">

			<div class="widget widget-stats bg-purple">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

				<div class="stats-title">Estudios Socioeconómicos</div>

				<div class="stats-number" >
					
						{{$nESE}}
					
				</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 76.3%;"></div>

				</div>

				<div class="stats-desc"> <label class="mes_actual stats-desc"></label> </div>

			</div>

		</div>

		<!-- end col-3 -->
		
		<!-- begin col-3 -->

		<div class="col-md-3 col-sm-6">

			<div class="widget widget-stats bg-black">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

				<div class="stats-title">Encuestas</div>

				<div class="stats-number" >0</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 76.9%;"></div>

				</div>

				<div class="stats-desc"> <label class="mes_actual stats-desc"></div>

			</div>

		</div>

		
	</div>

	<div class="row" style="align-items: center;">
		<div class="col-md-3 col-md-offset-4 col-sm-6">

			<div class="widget widget-stats " style="background-color: #5499C7  ;">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

				<div class="stats-title">Creditos</div>

				<div class="stats-number" >{{$creditos}}</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 76.9%;"></div>

				</div>

				<div class="stats-desc"> <label class="mes_actual stats-desc"></div>

			</div>

		</div>
	</div>
	@elseif(Auth::user()->tipo=="f")

<div class="row">

	<!-- begin col-3 -->

	<div class="col-md-3 col-md-offset-3 col-sm-6">

		<div class="widget widget-stats bg-purple">

			<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

			<div class="stats-title">Estudios Socioeconómicos</div>

			<div class="stats-number" >
				
				@foreach ($ESEinvT as $n)
            		{{$n->numero}}
        		@endforeach
				
			</div>

			<div class="stats-progress progress">

				<div class="progress-bar" style="width: 76.3%;"></div>

			</div>

			<div class="stats-desc"> <label class="mes_actual stats-desc"></label> </div>

		</div>

	</div>

	<!-- end col-3 -->

	<!-- begin col-3 -->

	<div class="col-md-3 col-sm-6">

		<div class="widget widget-stats bg-black">

			<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

			<div class="stats-title">Estudios activos asignados</div>

			<div class="stats-number" >
				@foreach ($ESEinvA as $n)
            		{{$n->numero}}
        		@endforeach
			</div>

			<div class="stats-progress progress">

				<div class="progress-bar" style="width: 76.9%;"></div>

			</div>

			<div class="stats-desc"> <label class="mes_actual stats-desc"></div>

		</div>

	</div>
</div>
@else
	
	<div class="row">

		<!-- begin col-3 -->

		<div class="col-md-3  col-sm-6">

			<div class="widget widget-stats bg-purple">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

				<div class="panel-title">Clientes</div>

				<div class="stats-number" id="total_clientes_cuadro">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 76.3%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc"></label> </div>

			</div>

		</div>

		<!-- end col-3 -->

		<!-- begin col-3 -->

		<div class="col-md-3 col-sm-6">

			<div class="widget widget-stats bg-black">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

				<div class="panel-title">Prospectos</div>

				<div class="stats-number" id="total_prospectos">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 54.9%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc">&nbsp;</div>

			</div>

		</div>

		<!-- end col-3 -->

		<div class="col-md-3 col-sm-6">

			<div class="widget widget-stats bg-aqua">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

				<div class="panel-title">Total Clientes / Prospectos</div>

				<div class="stats-number" id="total_clientes_prospectos">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 40.5%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc">&nbsp;</div>

			</div>

		</div>

		<div class="col-md-3 col-sm-6">

				<div class="widget widget-stats " style="background-color: #17A589;">

					<div class="row">

						<div class="col-sm-12">

							<div class="stats-icon stats-icon-lg"></div>


							<div class="panel-title">Acciones</div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 76px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody id="accionxcliente">

								

								

								

							</tbody>

						</table>

					</div>

				</div>

			</div>

	</div>

	<div class="row">


		<div class="col-md-3 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Periodo</h4>

				</div>

				<div class="panel-body table-responsive" style="height: 150px;">

					<div class="row">

						<div class="col-md-8 col-sm-12">

							<div class="form-group">

								<label for="">Fecha Inicio</label>

								@php
									$fecha= date("Y-m-d");
									$nuevafecha = strtotime ( '-30 day' , strtotime ( $fecha ) ) ;
									$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
								@endphp

								<input type="date" class="form-control form-control-sm" id="fechaFin" value="{{$nuevafecha}}" max = "<?php echo date("Y-m-d");?>" min = "2015-01-01">

								
							</div>

						</div>

						<div class="col-md-8 col-sm-12">

							<div class="form-group">

								<label for="">Periodo Final</label>
			
								<input type="date" class="form-control form-control-sm" id="fechaInicio" value="<?php echo date("Y-m-d");?>" max = "<?php echo date("Y-m-d");?>" min = "2015-01-01">

							</div>

						</div>

						<div class="col-md-4 col-md-12">
							<div class="form-group">

								<label for="">&nbsp;</label>
								<input class="btn btn-sm btn-success form-control form-control-sm" id="btnPeriod"  type="button" value="Aplicar">
							</div>
						</div>

					</div>

				</div>

			</div>

		</div><!-- end colspan 6-->


		<div class="col-md-3 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Clientes</h4>

				</div>

				<div class="panel-body table-responsive" style="height: 150px;">

					<table style=" height: 50px; " id="TableClientes" class="container-data">

						<tbody id="bodyClientes">

							<tr>


							</tr>

						</tbody>

					</table>

				</div>

			</div>

		</div><!-- end colspan 6-->

		<div class="col-md-3 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Prospectos</h4>

				</div>

				<div class="panel-body table-responsive" style="height: 150px;">

					<table style=" height: 50px; " id="TableClientes" class="container-data">

						<tbody id="bodyProspectos">

							

						</tbody>

					</table>

				</div>

			</div>

		</div><!-- end colspan 6-->

		<div class="col-md-3 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					
					<table class="container-data">

								<td><h4 class="panel-title">Asignación</h4></td>
						

					</table>

				</div>

				<div class="panel-body table-responsive" style="height: 150px;">

					<table style=" height: 50px; " id="TableClientes" class="container-data">

						<tbody id="bodyAsignacion">

							

						</tbody>

					</table>

				</div>

			</div>

		</div><!-- end colspan 6-->


	</div>

	<div class="row">

		<!-- begin col-3 -->

		<div class="col-md-3  col-sm-6">

			<div class="widget widget-stats bg-green">

				<div class="stats-icon stats-icon-lg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z"/></svg></div>

				<div class="panel-title">Número de Cotizaciones</div>

				<div class="stats-number" id="numero_cotizaciones_cuadro">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 70.1%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc"></div>

			</div>

		</div>

		<div class="col-md-3  col-sm-6">

			<div class="widget widget-stats bg-green">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-dollar"></i></div>

				<div class="panel-title">Total Cotizaciones</div>

				<div class="stats-number" id="total_cotizaciones_cuadro">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 70.1%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc"></div>

			</div>

		</div>

		<!-- end col-3 -->

		<!-- begin col-3 -->

		<div class="col-md-3 col-sm-6">

			<div class="widget widget-stats bg-blue">

				<div class="stats-icon stats-icon-lg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z"/></svg></div>

				<div class="panel-title">Número Contratos</div>

				<div class="stats-number" id="numero_contratos_cuadro">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 40.5%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc"></div>

			</div>

		</div>

		<div class="col-md-3 col-sm-6">

			<div class="widget widget-stats bg-blue">

				<div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>

				<div class="panel-title">Total Contratos</div>

				<div class="stats-number" id="total_contratos_cuadro">&nbsp;</div>

				<div class="stats-progress progress">

					<div class="progress-bar" style="width: 40.5%;"></div>

				</div>

				<div class="stats-desc"><label class="mes_actual stats-desc"></div>

			</div>

		</div>

		<!-- end col-3 -->

	</div>

	<div class="row" >
			<div  class="col-md-6">
					<div class="panel panel-inverse">

						<div class="panel-heading">

							<div class="panel-heading-btn">

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

							</div>

							<h4 class="panel-title">Cotizaciones por servicio</h4>

						</div>

						<div class="panel-body table-responsive">

							<div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

						</div>



						</div>
					</div>
		
			
			<div  class="col-md-6">
					<div class="panel panel-inverse">

						<div class="panel-heading">

							<div class="panel-heading-btn">

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

							</div>

							<h4 class="panel-title">Contratos por servicio</h4>

						</div>

						<div class="panel-body table-responsive">

							<div id="container3" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

						</div>



						</div>
					</div>
		</div>

	<!-- begin row -->

	<div class="row">
		<div class="col-md-6">
				<div class="panel panel-inverse">

					<div class="panel-heading">

						<div class="panel-heading-btn">

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

						</div>

						<h4 class="panel-title">Clientes por mes</h4>

					</div>

					<div class="panel-body table-responsive">
						
							<div id="container1" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
						
					</div>

				</div>	
		</div>

		<div class="col-md-6">
				<div class="panel panel-inverse">

					<div class="panel-heading">

						<div class="panel-heading-btn">

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

						</div>

						<h4 class="panel-title">Clientes</h4>

					</div>

					<div class="panel-body table-responsive">
						
							<div id="container4" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
						
					</div>

				</div>	
		</div>
	</div>


	<div>
		<input id= "data1" hidden>
		<input  id= "data2" hidden>
		<input   id= "data3" hidden>
		<input  id= "data4" hidden>
	</div>
	<div class="row">

		<!-- begin col-6 potlet #1 -->

		
		<div class="col-md-6">
			
			
			

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

					</div>

					<h4 class="panel-title">Cotización menor a 4 meses</h4>

				</div>



				<div class="panel-body table-responsive">

					<table class="table table-bordered">

						<thead>

							<tr>

								<th>Empresa</th>

								<th>Contácto</th>

								<th><span class="text-success"><i class="fa fa-1x fa-phone"></i></span> Teléfono</th>

								<th><span class="text-success"><i class="fa fa-1x fa-mobile-phone"></i></span> Celular</th>

								<th>Servicio</th>

								<th>Total</th>

							</tr>

						</thead>

						<tbody>





							@foreach($prospectos as $key=>$value)





							@if($value->FECHA < 4) <tr class="active" s>

								<td>{{ $value->nombre}}</td>

								<td>{{ $value->contacto}} </td>

								<td>{{ $value->telefono}} </td>

								<td>{{ $value->celular}} </td>

								<td>{{ $value->servicio}} </td>

								<td><label class="label label-primary">{{ "$ ".number_format($value->total, 2, '.', '') }}</label></td>



								</tr>



								@endif



								@endforeach



						</tbody>

					</table>

				</div>

			


		</div>


		


		</div>

		

		<!-- end col-8 -->

		<!-- begin col-4 -->

		<div class="col-md-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

					</div>

					<h4 class="panel-title">Vigencia de contratos</h4>

				</div>

				<div class="panel-body p-t-0 table-responsive">

					<table class="table table-valign-middle m-b-0 table-striped">

						<thead>

							<tr>

								<th>#Contrato</th>

								<th>Cliente</th>

								<th>Fecha de vencimiento</th>

								<th>Dias por vencer</th>

								<th>Ejecutivo</th>






							</tr>

						</thead>

						<tbody>

							@foreach($contrato as $key=>$value)

							<tr>

								<td><span class="text-success">{{ $value->no_contrato }}</span></td>

								<td><a href="{{url('accionXcliente')}}/{{$value->id_cliente}}">{{$value->nombre_comercial}}</a></td>

								<td>{{$value->fecha_fin}}</td>

								<td><label class="label label-danger">{{$value->dias_vencer}}</label></td>

								

								<th>{{$value->name}}</th>



							</tr>

							@endforeach

						</tbody>

					</table>

				</div>

			</div>

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

					</div>

					<h4 class="panel-title">Mis próximas 10 citas</h4>

				</div>

				<div class="panel-body p-t-0 table-responsive">

					<table class="table table-valign-middle m-b-0 table-striped">

						<thead>

							<tr>

								<th>Fecha </th>

								<th>Hora</th>

								<th>Asunto</th>

								@if(Auth::user()->is('admin'))

								<th>Ejecutivo</th>

								@endif

							</tr>

						</thead>

						<tbody>

							@foreach($agenda as $key=>$value)

							<tr>

								<td><label class="label label-success"> {{$value->fecha_inicio." a ".$value->fecha_fin}}</label></td>

								<td> {{$value->hora_inicio." a ".$value->hora_fin}} <span class="text-success"><i class="fa fa-1x fa-clock-o"></i></span></td>

								<td>{{$value->evento}} </td>

								@if(Auth::user()->is('admin'))

								<th>{{$value->name}}</th>

								@endif



							</tr>

							@endforeach

						</tbody>

					</table>





				</div>





			</div>

			

			<!-- end col-4 -->

		</div>

		<!-- end row -->

		@endif
		

		

		
	</div>

	<!-- end #content -->









	@endsection



	@section('js-base')

	@include('librerias.base.base-begin')

	@include('librerias.base.base-begin-page')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
	


	{!! Html::script('assets/js/highcharts.js') !!}

	{!! Html::script('assets/js/exporting.js') !!}





	<script type="text/javascript">
		$(function() {
			iniciarDatos();
		});
		
		function iniciarDatos(){
			var fechaInicio = $('#fechaInicio').val();
			var fechaFin = $('#fechaFin').val();

			$.ajax({
				url:"{{ url('iniciarDash') }}"+"/"+fechaInicio+"/"+fechaFin,
				type:"GET",
				success: function(response){
					
					
					Data_Obtencion(response[0]);
				},
				error:function(){
					console.log(fechaInicio +"  "+ fechaFin);
				}
			})	
		}

		function Data_Obtencion (response){
			var totalClientes = [];
			var totalProspectos = [];
			var totalClientesProspectos = [];

			
			response.TotalClientes.forEach(element => totalClientes.push(element.total));
			response.TotalProspectos.forEach(element => totalProspectos.push(element.total));
			response.TotalClientesProspectos.forEach(element => totalClientesProspectos.push(element.total));

			totalClientesProspectosF(totalClientes,totalProspectos,totalClientesProspectos);
			
			var TotalCotizaiconesMonto = [];
			var TotalCotizaiconesCantidad = [];
			var TotalContratosMonto = [];
			var TotalContratosCantidad = [];
			
			response.TotalCotizaiconesMonto.forEach(element => TotalCotizaiconesMonto.push(element.total_cotizaciones));
			response.TotalCotizaiconesCantidad.forEach(element => TotalCotizaiconesCantidad.push(element.total_cotizaciones));
			response.TotalContratosMonto.forEach(element => TotalContratosMonto.push(element.total_contratos));
			response.TotalContratosCantidad.forEach(element => TotalContratosCantidad.push(element.total_contratos));
			
			//response.TotalClientesProspectos.forEach(element => totalClientesProspectos.push(element.total));

			totalCotizacionContratos (TotalCotizaiconesMonto,TotalCotizaiconesCantidad,TotalContratosMonto,TotalContratosCantidad);
		
			var Clientes =[];
			var Prospectos = [];
			var Asignacion = []
			response.Clientes.forEach(element => Clientes.push(element.Clientes));
			response.Prospectos.forEach(element => Prospectos.push(element.Prospectos));

			listas_ClientesProspectos (Clientes,Prospectos,response.Asignacion,response.Accion);

			
		
		}

		function totalClientesProspectosF (totalClientes,totalProspectos,totalClientesProspectos){
			$("#total_clientes_cuadro").html("");
			$("#total_prospectos").html('');
			$("#total_clientes_prospectos").html('');

			
			$("#total_clientes_cuadro").html(totalClientes[0]);
			$("#total_prospectos").html(totalProspectos[0]);
			$("#total_clientes_prospectos").html(totalClientesProspectos[0]);
		
			
		} 

		function totalCotizacionContratos (TotalCotizaiconesMonto,TotalCotizaiconesCantidad,TotalContratosMonto,TotalContratosCantidad){
			$("#numero_cotizaciones_cuadro").html("");
			$("#total_cotizaciones_cuadro").html('');
			$("#numero_contratos_cuadro").html("");
			$("#total_contratos_cuadro").html('');
			//$("#total_clientes_prospectos").html('');
			
			$("#numero_cotizaciones_cuadro").html(TotalCotizaiconesCantidad[0]);
			$("#total_cotizaciones_cuadro").html("$"+TotalCotizaiconesMonto[0]);
			$("#numero_contratos_cuadro").html(TotalContratosCantidad[0]);
			$("#total_contratos_cuadro").html("$"+TotalContratosMonto[0]);
			//$("#total_clientes_prospectos").html(totalClientesProspectos[0]);
		}

		function listas_ClientesProspectos (Clientes,Prospectos, Asignacion, Accion){

			var bodyTableClientes;
			var bodyTableProspectos;
			var bodyTableAsignacion;
			var accionxcliente;

			$("#bodyClientes").html("");
			$("#bodyProspectos").html("");
			$("#bodyAsignacion").html("");
			$("#accionxcliente").html("");

			for(var i= 0; i<Clientes.length;i++ ){
				bodyTableClientes += "<tr>"+"<th>"+Clientes[i]+"</th>"+"</tr>"
			}

			for(var i= 0; i<Prospectos.length;i++ ){
				bodyTableProspectos += "<tr>"+"<th>"+Prospectos[i]+"</th>"+"</tr>"
			}
			

			Asignacion.forEach(element => 
				(bodyTableAsignacion += "<tr>"+"<th>"+element.Departamento+"  </th><th style='width:15px'> C:"+element.CClientes+"</th><th style='width:15px'>P:"+element.Prospectos+"</th>"+"</tr>")
			);

	
			Accion.forEach(element => 
				(accionxcliente += "<tr>"+"<th>"+element.accion+"  </th><th style='width:30px'>"+element.total+"</th>"+"</tr>")
			);

			$("#bodyClientes").html(bodyTableClientes);
			$("#bodyProspectos").html(bodyTableProspectos);
			$("#bodyAsignacion").html(bodyTableAsignacion);
			$("#accionxcliente").html(accionxcliente);

		}
		

		$("#tipo_cliente").on("change",function(){

			var id_tipo=$("#tipo_cliente").val();

			$("#clientes_prospectos").html("");

			$.ajax({
				url:"{{ url('tipoCliente') }}"+"/"+id_tipo,
				type:"GET",
				success: function(response){
					$("#clientes_prospectos").html("");
					$("#clientes_prospectos").append(`<option value='-1'>Sin FIltro</option>`);
					if(response.length != 0 && response.length != null){
						response.forEach(element => { 
						$("#clientes_prospectos").append(`<option value='${element.id}'>${element.nombre_comercial}</option>`);
						});
					}
					console.log (response);
				},
				error:function(){
					console.log(id_tipo);
				}
			});

			var dateIni =$("#fechaInicio").val();
			var dateFin =$("#fechaFin").val();
			var tipo = $("#tipo_cliente").val();
			var cliente  =  -1;
			var accion = $("#accion").val();
			var depar = $("#depar").val();

			var dato = new Date (dateIni);
			var año=dato.getFullYear();

			$.ajax({
				url: "{{ url('filtroDash') }}/"+dateIni + "/"+dateFin +"/"+tipo+"/"+cliente+"/"+accion+"/"+depar,
				type: "GET",

				
				success: function(response) {
					Data_Obtencion(response[0]);
				},

				error: function() {

					console.log("Error en progrmable");
				}
			})
		});


		$('#clientes_prospectos').on("change", function(){

			var dateIni =$("#fechaInicio").val();
			var dateFin =$("#fechaFin").val();
			var tipo = $("#tipo_cliente").val();
			var cliente  =  $("#clientes_prospectos").val();
			var accion = -1;
			var depar = $("#depar").val();

			var dato = new Date (dateIni);
			var año=dato.getFullYear();

			$.ajax({
				url: "{{ url('filtroDash') }}/"+dateIni + "/"+dateFin +"/"+tipo+"/"+cliente+"/"+accion+"/"+depar,
				type: "GET",

				
				success: function(response) {
					Data_Obtencion(response[0]);
				},

				error: function() {

					console.log("Error progrmable");
				}
			})

		});

		$('#depar').on("change", function(){

			var dateIni =$("#fechaInicio").val();
			var dateFin =$("#fechaFin").val();
			var tipo = $("#tipo_cliente").val();
			var cliente  =  $("#clientes_prospectos").val();
			var accion = -1;
			var depar = $("#depar").val();

			var dato = new Date (dateIni);
			var año=dato.getFullYear();

			$.ajax({
				url: "{{ url('filtroDash') }}/"+dateIni + "/"+dateFin +"/"+tipo+"/"+cliente+"/"+accion+"/"+depar,
				type: "GET",

				
				success: function(response) {
					Data_Obtencion(response[0]);
				},

				error: function() {

					console.log("Error friltro");
				}
			})

		});

		$("#btnPeriod").on("click", function() {

		var dateIni =$("#fechaInicio").val();
		var dateFin =$("#fechaFin").val();
		var tipo = $("#tipo_cliente").val();
		var cliente  =  $("#clientes_prospectos").val();
		var accion = -1;
		var depar = $("#depar").val();
		
		var dato = new Date (dateIni);
		var año=dato.getFullYear();

		$.ajax({
			url: "{{ url('filtroDash') }}/"+dateIni + "/"+dateFin +"/"+tipo+"/"+cliente+"/"+accion+"/"+depar,
			type: "GET",

			
			success: function(response) {
				pintarGrafico(año);
				Data_Obtencion(response[0]);
				pintarGraficoCoti();
				pintarGraficoCotra ();
				pintarGraficoClientes();
				dataURL(1);
				dataURL(2);
				dataURL(3);
				dataURL(4);
			},

			error: function() {

				console.log("perro");
			}
		})

		});

		$(function() {

			@if(Auth::user()->tipo == "s")
			var dateIni =$("#fechaFin").val();
			var dateFin =$("#fechaInicio").val();
			var dato = new Date (dateFin);
			var año=dato.getFullYear();
			
			var servicios = dateIni +" a " + dateFin
			
			pintarGrafico(año);
				
			pintarGraficoCoti();
			
			pintarGraficoCotra ();

			pintarGraficoClientes ();
			//iniciarCuadrosDashBoard();

			dataURL(1);
			dataURL(2);
			dataURL(3);
			dataURL(4);
			@endif


		});

		function pintarGraficoClientes(){

			var dateIni =$("#fechaFin").val();
			var dateFin =$("#fechaInicio").val();
			var dato = new Date (dateFin);
			var año=dato.getFullYear();
			
			var servicios = dateIni +" a " + dateFin

			$('#container4').highcharts({

			chart: {

				type: 'column'

			},

			title: {

				text: 'Clientes'

			},

			subtitle: {

				text: ''

			},

			xAxis: {

				categories: [servicios],

				crosshair: true

			},

			yAxis: {

				min: 0,

				title: {

					text: '#Clientes'

				}

			},

			tooltip: {

				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',

				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +

					'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',

				footerFormat: '</table>',

				shared: true,

				useHTML: true

			},

			plotOptions: {

				column: {

					pointPadding: 0.2,

					borderWidth: 0

				}

			},

			series: pintarGraficaClientes()

			});

			

		}

		
		function pintarGraficoCotra (){
			var dateIni =$("#fechaFin").val();
			var dateFin =$("#fechaInicio").val();
			var dato = new Date (dateFin);
			var año=dato.getFullYear();
			
			var servicios = dateIni +" a " + dateFin

			$('#container3').highcharts({

			chart: {

				type: 'column'

			},

			title: {

				text: 'Contratos'

			},

			subtitle: {

				text: ''

			},

			xAxis: {

				categories: [servicios],

				crosshair: true

			},

			yAxis: {

				min: 0,

				title: {

					text: '#Clientes'

				}

			},

			tooltip: {

				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',

				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +

					'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',

				footerFormat: '</table>',

				shared: true,

				useHTML: true

			},

			plotOptions: {

				column: {

					pointPadding: 0.2,

					borderWidth: 0

				}

			},

			series: pintarGraficaCotratos ()

			});

		}

		function pintarGraficoCoti (){
			var dateIni =$("#fechaFin").val();
			var dateFin =$("#fechaInicio").val();
			var dato = new Date (dateFin);
			var año=dato.getFullYear();
			
			var servicios = dateIni +" a " + dateFin

			$('#container2').highcharts({

			chart: {

				type: 'column'

			},

			title: {

				text: 'Cotizaciones '

			},

			subtitle: {

				text: ''

			},

			xAxis: {

				categories: [servicios],

				crosshair: true

			},

			yAxis: {

				min: 0,

				title: {

					text: '#Clientes'

				}

			},

			tooltip: {

				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',

				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +

					'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',

				footerFormat: '</table>',

				shared: true,

				useHTML: true

			},

			plotOptions: {

				column: {

					pointPadding: 0.2,

					borderWidth: 0

				}

			},

			series: pintarGraficaCotizaicones()

			});

		}

		function pintarGrafico(año){
			$('#container1').highcharts({

			chart: {

				type: 'column'

			},

			title: {

				text: 'Clientes por mes '+año

			},

			subtitle: {

				text: ''

			},

			xAxis: {

				categories: [

					getMes(0),

					getMes(1),

					getMes(2),

					getMes(3),

					getMes(4),

					getMes(5),

					getMes(6),

					getMes(7),

					getMes(8),

					getMes(9),

					getMes(10),

					getMes(11)
				],

				crosshair: true

			},

			yAxis: {

				min: 0,

				title: {

					text: '#Clientes'

				}

			},

			tooltip: {

				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',

				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +

					'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',

				footerFormat: '</table>',

				shared: true,

				useHTML: true

			},

			plotOptions: {

				column: {

					pointPadding: 0.2,

					borderWidth: 0

				}

			},

			series: pintarGrafica()

			});
		}



		var iniciarCuadrosDashBoard = function() {



			$.ajax({

				url: '{{ url("'+estadisticas_cuadros+'") }}',

				type: 'GET',

				dataType: 'json',

				data: {

					is_admin: false



				},

				success: function(response) {

					var total_clientes_prospectos = response[2][0].total_clientes + response[3][0].total_prospectos;

					porcentaje_clientes = (response[2][0].total_clientes * 100) / total_clientes_prospectos;

					porcentaje_clientes = isNaN(porcentaje_clientes) ? 0 : porcentaje_clientes;

					$('#total_cotizaciones_cuadro').html('$ ' + response[0][0].total_cotizaciones);

					$('#total_contratos_cuadro').html('$ ' + response[1][0].total_contratos);

					$('#total_clientes_cuadro').html(response[2][0].total_clientes);

					$('.mes_actual').html(getMes(response[2][0].mes_actual));

					$('#total_prospectos').html(response[3][0].total_prospectos);

					$('#total_porcentaje_cuadro').html(porcentaje_clientes.toFixed(2) + ' %');











				},

				error: function(jqXHR, status, error) {

					//swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');

				}

			});

		}



		var getMes = function(indice) {

			meses = ['Enero',

				'Febrero',

				'Marzo',

				'Abril',

				'Mayo',

				'Junio',

				'Julio',

				'Agosto',

				'Septiembre',

				'Octubre',

				'Noviembre',

				'Diciembre'
			];



			return meses[indice];

		}



		var getServicioTitulo = function(id) {

			titulo = '';

			if (id == 0) {

				titulo = 'ESE';

			} else if (id == 1) {

				titulo = 'RYS';

			} else if (id == 2) {

				titulo = 'Maquíla';

			} else if (id == 3) {

				titulo = 'Psicométricos';

			}

			return titulo;

		}





		 pintarGrafica = function() {

			var lista = new Array();

			var clientess = {};

			var prospectoss = {};

			var fechaFin = $('#fechaInicio').val();
			
			var arr_mes_clientes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			var arr_mes_prospectos = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

			var datos;
			$.ajax({

				url: '{{ url("clientes_mes_dashboard") }}/'+fechaFin,

				async : false,
				
				type: 'GET',

				success: function(response) {

					for(var i =0; i<response.length; i++){
						arr_mes_clientes[i] = parseInt (response[i].clientesConteo);
						arr_mes_prospectos[i] = parseInt (response[i].prospectosConteo);
					}

					
					
				},

				error: function(jqXHR, status, error) {

					alert('Error ' + error);

				}



			});
					clientess.name = 'Clientes';
					clientess.data = arr_mes_clientes;
					//clientes._colorIndex = 0;

					prospectoss.name = 'Prospectos';
					prospectoss.data = arr_mes_prospectos;
					//prospectos._colorIndex = 1;
					lista.push(clientess);
					lista.push(prospectoss);


					
			return lista;

		}

		pintarGraficaClientes = function() {

			var lista = new Array();

			var fechaFin = $('#fechaFin').val();
			var fechaInicio = $('#fechaInicio').val();

			var lista = new Array();

			var Nuevos = {};

			var Inactivos = {};

			var Activos = {};


			$.ajax({

				url: '{{ url("clientes_mes_dashboard") }}/'+fechaInicio+"/"+fechaFin,

				async : false,
				
				type: 'GET',

				success: function(response) {

				
					Nuevos.name = 'Nuevos';
					Nuevos.data = [parseInt(response[0][0].nuevo)];

					Activos.name = 'Activos';
					Activos.data = [parseInt(response[1][0].activos)];

					Inactivos.name = 'Inactivos';
					Inactivos.data = [parseInt(response[2][0].inactivos)];
					
					lista.push(Nuevos);
					lista.push(Activos);
					lista.push(Inactivos);

				

				},

				error: function(jqXHR, status, error) {

					alert('Error ' + error);

				}



			});
					

			return lista;

			}

		pintarGraficaCotizaicones = function() {

			var lista = new Array();

			var fechaFin = $('#fechaFin').val();
			var fechaInicio = $('#fechaInicio').val();

			<?php for($i = 0; $i <count($servicios); $i++){ ?>

			
			var	{{print_r (strtr($servicios[$i]," ","_"))}}1= {} ;

			<?php }?>

			var datos;
			$.ajax({

				url: '{{ url("cotizaciones_mes_dashboard") }}/'+fechaInicio+"/"+fechaFin,

				async : false,
				
				type: 'GET',

				success: function(response) {

				

					var i =0;
					<?php for($i = 0; $i <count($servicios); $i++){ ?>

						
							{{print_r (strtr($servicios[$i]," ","_"))}}1.name = response[i].servicio;
							
							{{print_r (strtr($servicios[$i]," ","_"))}}1.data = [parseInt (response[i].total)];
							
							
						
							i++;
							
							lista.push({{print_r (strtr($servicios[$i]," ","_"))}}1);
					<?php }?>
					
				},

				error: function(jqXHR, status, error) {

					alert('Error ' + error);

				}



			});
					

				
			return lista;

			}

			pintarGraficaCotratos = function() {

				var lista = new Array();

				var fechaFin = $('#fechaFin').val();
				var fechaInicio = $('#fechaInicio').val();

				<?php for($i = 0; $i <count($servicios); $i++){ ?>

				var	{{print_r (strtr($servicios[$i]," ","_"))}}1= {} ;

				<?php }?>

				var datos;
				$.ajax({

					url: '{{ url("contratos_mes_dashboard") }}/'+fechaInicio+"/"+fechaFin,

					async : false,
					
					type: 'GET',

					success: function(response) {

					

						var i =0;
						<?php for($i = 0; $i <count($servicios); $i++){ ?>

							
								{{print_r (strtr($servicios[$i]," ","_"))}}1.name = response[i].servicio;
								
								{{print_r (strtr($servicios[$i]," ","_"))}}1.data = [parseInt (response[i].total)];
								
								
							
								i++;
								
								lista.push({{print_r (strtr($servicios[$i]," ","_"))}}1);
						<?php }?>
						
					},

					error: function(jqXHR, status, error) {

						alert('Error ' + error);

					}



				});
						

					
				return lista;

				}


		function dataURL(grafico){
			var svg = $("#container"+grafico).find('svg')[0],
			svgSize = svg.getBoundingClientRect(),
			svgData = new XMLSerializer().serializeToString(svg),
			base64Image = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgData)));

			var canvas = document.createElement('canvas');
			canvas.width = svgSize.width;
			canvas.height = svgSize.height;
			var ctx = canvas.getContext('2d');

			let url;

			var img = document.createElement('img');
			img.setAttribute('src', base64Image);
			
			img.onload = function() {
				ctx.drawImage(img, 0, 0);
				
				$("#data"+grafico).val(canvas.toDataURL('image/png'));
				
			};

			
		}
		
		function pdfs (){
			dataURL(1);
			dataURL(2);
			dataURL(3);
			dataURL(4);

		
			setTimeout(() => {
				pdf();
			},"2000");

			
		}
		function pdf (){


			var doc = new jsPDF();
			var dateIni = $('#fechaFin').val();
			var dateEnd = $('#fechaInicio').val();

			doc.addImage("{{$logo}}", 'JPEG', 10, 5, 40,28);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(17);
			doc.text("CRM", 120, 20);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(60, 22 , 142, 1, 'F');

			doc.setFontType('bold');
			doc.setFontSize(9);
			doc.text("Período: ", 148, 27);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.text(dateIni + " a " + dateEnd, 163, 27);

			//total Total Cotizaciones #
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, 72, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Total Cotizaciones #",16, 77);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, 79, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("numero_cotizaciones_cuadro").innerHTML,31,con+=39);
			//Fin Total Cotizaciones #
			
			//Total Cotizaciones $
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(59, 72, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Total Cotizaciones $",64, 77);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(59, 79, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_cotizaciones_cuadro").innerHTML,60,con+=39);
			//Fin total Cotizaciones $

			//Total Contratos #
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(108, 72, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Total Contratos #",115, 77);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(108, 79, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("numero_contratos_cuadro").innerHTML,129,con+=39);
			//Fin Total Contratos #

			//Total Contratos $
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(157, 72, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Total Contratos $",164, 77);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(157, 79, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_contratos_cuadro").innerHTML,158,con+=39);
			//end Total Contratos $


			//total clientes
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, 40, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Total Clientes",19, 45);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, 47, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_clientes_cuadro").innerHTML,31,con+=7);
			//Fin total clientes
			
			//total Prospectos
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(59, 40, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Total Prospectos",67, 45);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(59, 47, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_prospectos").innerHTML,80,con+=7);
			//Fin total Prospectos

			//total Prospectos_Clientes
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(108, 40, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Clientes/Prospectos",112, 45);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(108, 47, 43, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_clientes_prospectos").innerHTML,129,con+=7);
			//Fin total Prospectos_clientes

			//total acciones
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(157, 40, 43, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Acciones",171, 45);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("accionxcliente");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 0;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=6;
				}
			}
			con += 2;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(157, 47, 43, con, 'F');
			con = 40 + 6;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],160, con+=6);
				}
			}
			//end acciones

			//total asignaciones
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, 93, 92, 7, 'F');

			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Aasignación",48, 97);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("bodyAsignacion");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
				
			}
			con = 0;
			for(var i = 0; i< serv.length; i++){
				if(i % 3 == 0){
					con+=6;
				}
			}
			con += 2;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, 100, 92, con, 'F');
			con = 98;
			for(var i = 0; i< serv.length; i++){
				if(i % 3 == 0){
					doc.text(serv[i],11, con+=6);
					doc.text(serv[i+1],80, con);
					doc.text(serv[i+1],90, con);
				}
			}
			//end asignacion

		

			
			doc.addImage($("#data2").val(), 'PNG',0, 170,  100,90);
			doc.addImage($("#data3").val(), 'PNG',100, 170,  100,90);
			

			
			doc.addPage();

			doc.addImage("{{$logo}}", 'JPEG', 10, 5, 40,28);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(17);
			doc.text("CRM", 120, 20);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(60, 22 , 142, 1, 'F');

			//inicio cuadro clientes
			espacio = 41+100;
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(105, espacio , 92, 7, 'F');
			doc.setFontType('bold');
			espacio += 4;
			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Prospectos",139, espacio+1);
			espacio += 3;
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			Servicio = document.getElementById("bodyProspectos");
			Serv=Servicio.getElementsByTagName("th");
			serv = [];

			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 0;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=6;
				}
			}
			con +=2;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(105, espacio, 92, con, 'F');
			con = espacio;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i],106,con+=6);
				}
			}
			//termido tabla clientes
		    espacio = 41+100;
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, espacio , 92, 7, 'F');
			doc.setFontType('bold');
			espacio += 4;
			doc.setFontType('bold');
			doc.setFontSize(10);
			doc.setTextColor(255,255,255);
			doc.text("Clientes",50, espacio+1);
			espacio += 3;
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("TableClientes");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];

			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 0;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=6;
				}
			}
			con +=2;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, espacio, 92, con, 'F');
			con = espacio;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i],13,con+=5);
				}
			}

			doc.addImage($("#data1").val(), 'PNG',0, 41,  100,90);
			doc.addImage($("#data4").val(), 'PNG',100, 41,  100,90);

			
	
			
			
			
			doc.save('Reporte.pdf');  
		
		}

	</script>

	@endsection