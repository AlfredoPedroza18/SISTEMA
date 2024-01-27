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
	@if(Auth::user()->tipo!="c")
	<h1 class="page-header text-center">DASHBOARD<small></small></h1>

	@if(Auth::user()->tipo!="f")
	<div class="row">
		
			<div class=" form-group col-md-3 col-sm-6" style="margin-left: -8px;">
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

			<div class="form-group col-md-3 col-sm-6" style="margin-left: 3px;">
				<label>Cliente/Prospecto</label>
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

			<div class="form-group col-md-3 col-sm-6" style="margin-left: 4px;">
				<label>Acción</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF3" name="IdInvestigador" >
							<option value="-1"> Sin Filtro</option>
							<option value="1">Llamada</option>
							<option value="2">Correo</option>
							<option value="3">Visita</option>
							
						</select>
					</div>
				</div>
			</div>

			<div class="form-group col-md-3 col-sm-6" style="margin-left: 1px;">
				<label>Departamentos</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF3" name="IdInvestigador" >
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

				<div class="panel-title">Total Clientes/Prospectos</div>

				<div class="stats-number" id="total_porcentaje_cuadro">&nbsp;</div>

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

								

								<tr>

									

								</tr>

								

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

								<input type="date" class="form-control form-control-sm" id="fechainicio" value="<?php echo date("Y-m-d");?>" max = "<?php echo date("Y-m-d");?>" min = "2015-01-01">

							</div>

						</div>

						<div class="col-md-8 col-sm-12">

							<div class="form-group">

								<label for="">Periodo Final</label>
			
								@php
									$fecha= date("Y-m-d");
									$nuevafecha = strtotime ( '-30 day' , strtotime ( $fecha ) ) ;
									$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
								@endphp

								<input type="date" class="form-control form-control-sm" id="fechainicio" value="{{$nuevafecha}}" min = "2015-01-01">

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

						<tbody id="bodyTableClientes">

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

						<tbody id="bodyTableClientes">

							

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

						<tbody id="bodyTableClientes">

							

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

				<div class="stats-number" id="total_cotizaciones_cuadro">&nbsp;</div>

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

				<div class="stats-number" id="total_contratos_cuadro">&nbsp;</div>

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

	<!-- begin row -->

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

					<h4 class="panel-title">Propectos con cotización menor a 4 meses</h4>

				</div>



				<div class="panel-body table-responsive">

					<table class="table table-bordered">

						<thead>

							<tr>

								<th>Nombre</th>

								<th>Contácto</th>

								<th><span class="text-success"><i class="fa fa-1x fa-phone"></i></span> Teléfono</th>

								<th><span class="text-success"><i class="fa fa-1x fa-mobile-phone"></i></span> Celular</th>

								<th>Propuesta</th>

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

					<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>

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

								@if(Auth::user()->is('admin'))

								<th>Ejecutivo</th>

								@endif





							</tr>

						</thead>

						<tbody>

							@foreach($contrato as $key=>$value)

							<tr>

								<td><span class="text-success">{{ $value->no_contrato }}</span></td>

								<td>{{$value->nombre_comercial}}</td>

								<td>{{$value->fecha_fin}}</td>

								<td><label class="label label-danger">{{$value->dias_vencer}}</label></td>

								@if(Auth::user()->is('admin'))

								<th>{{$value->name}}</th>

								@endif



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



	{!! Html::script('assets/js/highcharts.js') !!}

	{!! Html::script('assets/js/exporting.js') !!}





	<script type="text/javascript">
		$("#tipo_cliente").on("change",function(){

			var id_tipo=$("#tipo_cliente").val();

			$("#clientes_prospectos").html("");

			$.ajax({
				url:"{{ url('tipoCliente') }}"+"/"+id_tipo,
				type:"GET",
				success: function(response){
					$("#clientes_prospectos").html("");
					$("#clientes_prospectos").append(`<option value='-1'>Sin FIltro</option>`);
					response.forEach(element => { 
					$("#clientes_prospectos").append(`<option value='${element.id}'>${element.nombre_comercial}</option>`);
					});
				},
				error:function(){
					console.log(id_tipo);
				}
			})

		});

		$("#btnPeriod").on("click", function() {

		var dateIni =$("#fechainicio").val()+"-1";
		var dato = new Date (dateIni);

		var mes= dato.getMonth() + 1;
		var año=dato.getFullYear();

			console.log
		$.ajax({
			url: "{{ url('filtroDash') }}/"+mes + "/"+año,
			type: "GET",

			
			success: function(response) {
				console.log(response.TotalCota +" "+ response.TotalClientes +" " + response.TotalProspectos +" " + response.TotalClientesProspectos+" "+ response.meses);
				
				$('#total_clientes_cuadro').html(response.TotalClientes);
				$('#fechaClientes').html(response.meses);
				$('#total_prospectos').html(response.TotalProspectos);
				$('#fechaProspectos').html(response.meses);
				$('#total_porcentaje_cuadro').html(response.TotalClientesProspectos);
				$('#fechatotal').html(response.meses);
				$('#total_cotizaciones_cuadro').html("$"+response.TotalCota);
				$('#fechatotal_cotizaciones').html(response.meses);
			},

			error: function() {

				console.log("perro");
			}
		})

		});

		/*$(function() {

			$('#container').highcharts({

				chart: {

					type: 'column'

				},

				title: {

					text: 'CLIENTES POR MES'

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

						text: '# Clientes'

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

				//series: pintarGrafica()

			});



			//iniciarCuadrosDashBoard();

		});*/



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




		var pintarGrafica = function() {

			lista = new Array();

			servicio_ese = {};

			servicio_rys = {};

			servicio_maquila = {};

			servicio_psicometricos = {};



			$.ajax({

				url: '{{ url("'+clientes_mes_dashboard+ '") }}',

				dataType: 'json',

				async: false,

				type: 'GET',

				processData: false,

				contentType: false,

				success: function(response) {

					arr_mes_ese = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

					arr_mes_rys = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

					arr_mes_maq = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

					arr_mes_psi = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

					longitud = response.length;



					for (x = 0; x < longitud; x++) {



						for (i = 0; i < 12; i++) {



							for (j = 0; j < 1; j++) {





								if (response[x].id_servicio == 0) {



									if (response[x].meses_cotizaciones == i) {

										arr_mes_ese[i] = response[x].numero_clientes;

									}

								}



								if (response[x].id_servicio == 1) {



									if ((response[x].meses_cotizaciones) == i) {

										arr_mes_rys[i] = response[x].numero_clientes;

									}

								}

								if (response[x].id_servicio == 2) {



									if ((response[x].meses_cotizaciones) == i) {

										arr_mes_maq[i] = response[x].numero_clientes;

									}

								}

								if (response[x].id_servicio == 3) {



									if ((response[x].meses_cotizaciones) == i) {

										arr_mes_psi[i] = response[x].numero_clientes;

									}

								}





							}

						}

					}







					servicio_ese.name = 'ESE';

					servicio_ese.data = arr_mes_ese;

					servicio_rys.name = 'RYS';

					servicio_rys.data = arr_mes_rys;

					servicio_maquila.name = 'Maquila';

					servicio_maquila.data = arr_mes_maq;

					servicio_psicometricos.name = 'Psicométricos';

					servicio_psicometricos.data = arr_mes_psi;



					lista.push(servicio_ese);

					lista.push(servicio_rys);

					lista.push(servicio_maquila);

					lista.push(servicio_psicometricos);







				},

				error: function(jqXHR, status, error) {

					alert('Error ' + error);

				}



			});



			return lista;

		}



	</script>

	@endsection