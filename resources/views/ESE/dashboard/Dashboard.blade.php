@extends('layouts.masterMenuView')



@section('section')



<!-- begin #content agenda -->

<style>
	.bg-dash-bloque1 {

		background: rgba(88, 88, 88, 0.473);

	}


	.padre{
		width: 100vw;
	}

	.hijo{
		margin: 0 auto;
	}

	. {

		color: yellow;

	}

	

	.selected {
		color: Red;

		font-weight: bold;

	}

	.chartZise {
		width: 400px;
		height: 400px;
	}

	/* svg{

				width: 100px;

				height: 100px;

				margin: 20px;

				display:inline-block;

			} */

	.svgloader {

		width: 100px;

		height: 100px;

		margin: 20px;

		display: inline-block;

	}
</style>



<div id="content" class="content ">



	<!-- begin breadcrumb -->

	<ol class="breadcrumb ">

		<li>{{ link_to('home', $title = 'Módulos', $parameters = array(), $attributes = array()) }}</li>

		<li class="active">ESE-Dashboard</li>

	</ol>

	<!-- end breadcrumb -->

	<!-- begin page-header -->

	<div style="display: flex; justify-content:end;">
		<h1 style="width: 50vw;  font-size: 30px;" class="page-header text-center">DASHBOARD PRUEBAS LABORALES</h1>
		
		<div style="width: 10px;"></div>

		<div style="width: 15vw; text-align: center; display: flex; justify-content: end;" >
		<a class="btn btn-success text-center" onclick="pdfs()"  style="height: 30px; width: 130px; text-align: center;" target="_blank">Generar Reporte</a> 
		</div>
		
		<div style="height: 10px;"></div>
	</div>
 
	 
        
	<!-- end page-header -->

	<!-- row  bloque 1-->

	<div class="row">
		<div class="col-md-12">
			<div class="form-group col-md-6">
					<label>Filtro de Cliente</label>
					<div class="row">
						<div class="input-group col-sm-12">
							<select class="form-control" id="IdF1" name="IdAnalista" @if(Auth::user()->tipo=="c") disabled @endif>
								<option value="-1"> Sin Filtro</option>
								@if(isset($clientesPl))
									@foreach ($clientesPl as $clF)
										<option value="{{$clF->idc}}" @if(Auth::user()->tipo=="c" && $clF->idc == Auth::user()->IdCliente) selected @endif> {{$clF->nombre}}</option>
									@endforeach
								@endif
							</select>

						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="height:100%">

			<div class="form-group col-md-3">
				<label>Filtro de Analista</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF2" name="IdAnalistaSec">
							<option value="-1"> Sin Filtro</option>
							@if(isset($analistaPl))
								@foreach ($analistaPl as $clF)
									@if($clF->nombre != "")
										<option value="{{$clF->id}}"> {{$clF->nombre}}</option>
									@endif
								@endforeach
							@endif
						</select>


					</div>
				</div>
			</div>

			<div class="form-group col-md-3" >
				<label>Filtro Tipo de Prueba</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF3" name="IdInvestigador" >
							<option value="-1"> Sin Filtro</option>
							
							@if(isset($tipoPruebaPl))
								@foreach ($tipoPruebaPl as $clF)
									
									<option value="{{$clF->id}}"> {{$clF->nombre}}</option>
									
								@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Filtro Estatus</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF4" name="IdLider">
							<option value="-1"> Sin filtro</option>
							<option value="Activo">Activo</option>
							<option value="Finalizado">Finalizado</option>
							<option value="Cancelado">Cancelado</option>
						</select>

					</div>
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Filtro de Solicitante</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF5" name="IdSolicitante">
							<option value="-1"> Sin filtro</option>
							@foreach ($solicitantePl as $clF)
								@if($clF->Solicitante != "")
									<option value="{{$clF->Solicitante}}"> {{$clF->Solicitante}}</option>
								@endif
							@endforeach
						</select>

					</div>
				</div>
			</div>
		</div>
		<div class="row">



			<!-- begin col-1 -->

			<div class="col-md-4 col-sm-6" style="height:100%">

				<div class="widget widget-stats bg-black text-center">

					<div class="row">

						<div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

						<div class="col-sm-12">

							<div class=""><strong>Total Pruebas Laborales</strong></div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 120px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody>

								<tr>

									<td>

										<div class="stats-number " style="" id="total_clientes_cuadro">{{$totalPruebas}}</div>

									</td>

								</tr>

							</tbody>

						</table>


					</div>

					<div class="stats-progress progress">

						<div class="progress-bar" style="width: 70.1%;"></div>

					</div>

					<!-- <div class="stats-number " id="total_clientes_cuadro">{{ $estudios_cerrados->count() }}</div> -->

				</div>

			</div>




			<!-- end col-1 -->

			<!-- begin col-3 -->

			<div class="col-md-4 col-sm-6">

				<div class="widget widget-stats bg-orange">

					<div class="row">

						<div class="col-sm-12">

							<div class=" text-center"><strong>Tipos de Prueba</strong></div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 120px; padding:5px;">

						<table style="height: 80px; width: 100%;">

							<tbody id="TiposServicios">

								@foreach($totalPruebaTipo as $tpsrv)

								<tr>

									<th>{{ $tpsrv->nombre }}</th>

									<th class="">{{ $tpsrv->total2 }}</th>

								</tr>

								@endforeach

							</tbody>

						</table>

						

					</div>


					<div class="stats-progress progress">

						<div class="progress-bar" style="width: 70.1%;"></div>

					</div>


				</div>

			</div>



			<!-- end col-3 -->

			<!-- begin col-2 -->

			<div class="col-md-4 col-sm-6">

				<div class="widget widget-stats bg-purple">

					<div class="row">

						<div class="col-sm-12">

							<div class=" text-center"><strong>Estatus</strong></div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 120px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody id="Prioridad">

								@foreach($totalPruebaEstatus as $psrv)

								<tr>

									<th>{{ $psrv->estatus }}</th>

									<th class="">{{ $psrv->total2 }}</th>

								</tr>

								@endforeach

							</tbody>

						</table>

					</div>

					<div class="stats-progress progress">

						<div class="progress-bar" style="width: 70.1%;"></div>

					</div>


				</div>

			</div>

			<!-- end col-2 -->

			<!-- begin col-3 -->

		</div>

		<!-- fin row bloque 1-->

		<!-- row  bloque 2-->

		<div class="row">

			<!-- begin col-6 potlet #1 -->

			<div class="col-md-3 col-sm-6">

				<div class="panel panel-inverse">

					<div class="panel-heading">

						<div class="panel-heading-btn">


						</div>

						<h4 class="panel-title">Período</h4>

					</div>



					<div class="panel-body table-responsive" style="height: 150px;">

						<div class="row">

							<div class="col-md-6 col-sm-12">

								<div class="form-group">

									<label for="">Fecha Inicio</label>

									<input type="date" class="form-control form-control-sm" id="fechainicio">

								</div>

							</div>

							<div class="col-md-6 col-sm-12">

								<div class="form-group">

									<label for="">Fecha Fin</label>

									<input type="date" class="form-control form-control-sm" id="fechafin">

								</div>

							</div>

						</div>

						<div class="row">

							<div class="col-md-12">

								<button class="btn btn-sm btn-success float-left" style="float: right;" id="btnPeriod">Aplicar filtro</button>

							</div>

						</div>

					</div>

				</div>

			</div><!-- end colspan 6-->


			<div class="col-md-9 col-sm-12">

				<!-- row  Sub-bloque 1-->

				<div class="row">

					

					<div class="col-md-4 col-sm-6">

						<div class="panel panel-inverse">

							<div class="panel-heading">

								<div class="panel-heading-btn">


								</div>

								<h4 class="panel-title">Clientes</h4>

							</div>



							<div class="panel-body table-responsive" style="height: 150px;">

								<center class="chartloader">

									<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

										<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

											<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

										</path>

									</svg>

								</center>

								<table id="TableClientes" class="container-data">

									<tbody id="bodyTableClientes">

										@foreach ($clientesPl2 as $cliente)

										<tr>

											<td style="display:none">{{ $cliente->id }}</td>

											<td><span>{{ $cliente->nombre }}</span></td>

										</tr>

										@endforeach



									</tbody>

								</table>

							</div>

						</div>


					</div><!-- end colspan 6-->
	
					<div class="col-md-4 col-sm-6">

						<div class="panel panel-inverse">

							<div class="panel-heading">

								<div class="panel-heading-btn">


								</div>

								<h4 class="panel-title">Analistas</h4>

							</div>



							<div class="panel-body table-responsive" style="height: 150px;">

								<center class="chartloader">

									<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

										<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

											<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

										</path>

									</svg>

								</center>

								<table id="TableAnalista" class="container-data">

									<tbody id="bodyTableAnalista">

										@foreach($analistaPl2 as $analista)

											@if($analista->nombre != "")
												<tr>

													<td style="display:none">{{ $analista->id }}</td>

													<td><span>{{ $analista->nombre }}</span></td>

												</tr>
											@endif
											
										@endforeach

									</tbody>

								</table>

							</div>

						</div>

					</div><!-- end colspan 6-->

					

					<div class="col-md-4 col-sm-6">

						<div class="panel panel-inverse">

							<div class="panel-heading">

								<div class="panel-heading-btn">


								</div>

								<h4 class="panel-title">Solicitante</h4>

							</div>



							<div class="panel-body table-responsive" style="height: 150px;">

								<center class="chartloader">

									<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

										<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

											<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

										</path>

									</svg>

								</center>

								<table  id="TableSolicitante" class="container-data">

									<tbody id="bodyTableInvestigador">

										@foreach ($solicitantePl2 as $soli)

										<tr>

											<td><span>{{ $soli->Solicitante }}</span></td>

										</tr>

										@endforeach



									</tbody>

								</table>

							</div>

						</div>


					</div><!-- end colspan 6-->

				</div>


			</div>

		</div>

	</div>

	

	<div class="row">
	<div class="row justify-content-md-center">

		<div class="col-md-6 col-sm-6">
			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Estatus de Prueba</h4>

				</div>

				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-modalidadServicioChart" class="container-data" style="display:none;"><div id="modalidadServicioChart"></div></div>

					<input id= "modalidadServicioChart_input" type="text" hidden>
				</div>



			</div>
		</div>
		<!-- begin col-4 potlet #1 -->


		<!-- begin col-4 potlet #1 -->

		<div class="col-md-6 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Tipo de prueba Laboral</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-dictamenChart" class="container-data" style="display:none;"><div id="dictamenChart"></div></div>
					<div id="dictamenChart2"></div>
				</div>

				<input type="text" id="dictamenChart_input" hidden>

			</div>

			<!--<div style="display: none;" class="panel panel-inverse">

					<div class="panel-heading">

						<div class="panel-heading-btn"></div>

						<h4 class="panel-title">Presencia Nacional</h4>

					</div>

					<div class="panel-body table-responsive">

						<center>

							<div id="geochart-colors" style="width: 280px; height: 196px;"></div>

						</center>

					</div>



				</div>-->

		</div><!-- end colspan 6-->



	</div><!-- end rowspan -->

	</div>

	

	</div>

</div>

<!-- end #content -->









@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')





{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}

{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script src="assets/js/jspdf-autotable-custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

{!! Html::script('assets/js/map/code.js') !!}

<script type="text/javascript">
	var hideloaderchart = 'display:none;';

	$(document).ready(function() {

		iniciarTabla();



		$('[data-toggle="popover"]').popover({

			delay: {
				"show": 500,
				"hide": 100
			},

			trigger: 'focus'



		});

		initDate();

		initChart();

	});

	$.ajaxSetup({

		beforeSend: function() {

			$('.chartloader').show();

			$('.container-data').hide();

			$("#btnPeriod").attr("disabled", "disabled");

			$(".btn-clear-filter").attr("disabled", "disabled");

		},

		complete: function() {

			$('.chartloader').hide();

			$('.container-data').show();

			$("#btnPeriod").removeAttr("disabled");

			$(".btn-clear-filter").removeAttr("disabled");

		},

		success: function() {

			$('.chartloader').hide();

			$('.container-data').show();

			$("#btnPeriod").removeAttr("disabled");

			$(".btn-clear-filter").removeAttr("disabled");

		}

	});



	var iniciarTabla = function() {

		var data_table = $("#data-table-ultimas-solicitudes").DataTable({

			dom: 'Bfrtip',

			buttons: [

				{

					extend: 'excelHtml5',

					title: 'Listado de Estudios Socioeconómicos',

					exportOptions: {

						columns: [0, 1, 2, 3, 4]

					}

				},

				{

					extend: 'pdfHtml5',

					title: 'Listado de Estudios Socioeconómicos',

					pageSize: 'LEGAL',

					exportOptions: {

						columns: [0, 1, 2, 3, 4]

					}



				},

				{

					extend: 'copyHtml5',

				},

				{

					extend: 'print',

					title: 'Listado de Estudios Socioeconómicos',

					exportOptions: {

						columns: [0, 1, 2, 3, 4]

					}

				}



			],

			responsive: true,

			autoFill: true,



			"paging": true,

			"lengthMenu": [
				[5, 10, 25, 50, -1],
				[5, 10, 25, 50, "All"]
			],

			dom: 'Blfrtip',

			"drawCallback": function(settings) {

				$('[data-toggle="popover"]').popover({

					delay: {
						"show": 500,
						"hide": 100
					},

					trigger: 'focus'



				});

			},



		});





		var data_table_urgentes = $("#data-table-urgentes").DataTable({

			dom: 'Bfrtip',

			buttons: [

				{

					extend: 'excelHtml5',

					title: 'Listado de Estudios Socioeconómicos',

					exportOptions: {

						columns: [0, 1, 2, 3, 4, 5, 6]

					}

				},

				{

					extend: 'pdfHtml5',

					title: 'Listado de Estudios Socioeconómicos',

					pageSize: 'LEGAL',

					exportOptions: {

						columns: [0, 1, 2, 3, 4, 5, 6]

					}



				},

				{

					extend: 'copyHtml5',

				},

				{

					extend: 'print',

					title: 'Listado de Estudios Socioeconómicos',

					exportOptions: {

						columns: [0, 1, 2, 3, 4, 5, 6]

					}

				}



			],

			responsive: true,

			autoFill: true,



			"paging": true,

			"lengthMenu": [
				[5, 10, 25, 50, -1],
				[5, 10, 25, 50, "All"]
			],

			dom: 'Blfrtip',

			"drawCallback": function(settings) {

				$('[data-toggle="popover"]').popover({

					delay: {
						"show": 500,
						"hide": 100
					},

					trigger: 'focus'



				});

			},



		});



		var data_table_normales = $("#data-table-normales").DataTable({

			dom: 'Bfrtip',

			buttons: [

				{

					extend: 'excelHtml5',

					title: 'Listado de Estudios Socioeconómicos',

					exportOptions: {

						columns: [0, 1, 2, 3, 4, 5, 6]

					}

				},

				{

					extend: 'pdfHtml5',

					title: 'Listado de Estudios Socioeconómicos',

					pageSize: 'LEGAL',

					exportOptions: {

						columns: [0, 1, 2, 3, 4, 5, 6]

					}



				},

				{

					extend: 'copyHtml5',

				},

				{

					extend: 'print',

					title: 'Listado de Estudios Socioeconómicos',

					exportOptions: {

						columns: [0, 1, 2, 3, 4, 5, 6]

					}

				}



			],

			responsive: true,

			autoFill: true,



			"paging": true,

			"lengthMenu": [
				[5, 10, 25, 50, -1],
				[5, 10, 25, 50, "All"]
			],

			dom: 'Blfrtip',

			"drawCallback": function(settings) {

				$('[data-toggle="popover"]').popover({

					delay: {
						"show": 500,
						"hide": 100
					},

					trigger: 'focus'



				});

			},



		});







	}

	

	const optionpluginpercentage = {

		backgroundColor: function(context) {

			return context.dataset.backgroundColor;

		},

		borderColor: 'white',

		borderRadius: 25,

		borderWidth: 2,

		color: 'white',

		font: {

			weight: 'bold'

		},

		formatter: function(value, context) {

			return value + '%';

		}

	};

	const optionpluginnumypercentage = {

		backgroundColor: function(context) {

			return context.dataset.backgroundColor;

		},

		borderColor: 'white',

		borderRadius: 25,

		borderWidth: 2,

		color: 'white',

		font: {

			weight: 'bold'

		},

		formatter: function(value, context) {

			return value + '%';

		}

	};

	const optionplugnormal = {

		color: 'white',

		font: {

			weight: 'bold'

		}

	};

	const optionplugnormal2 = {

		align: "top",

		anchor: "center",

		color: 'white',

		font: {

			weight: 'bold'

		}

	};

	const optionpludonugnormal = {

		backgroundColor: function(context) {

			return context.dataset.backgroundColor;

		},

		borderColor: 'white',

		borderRadius: 25,

		borderWidth: 2,

		color: 'white',

		font: {

			weight: 'bold'

		}

	};

	const optionpluginmoneda = {

		color: 'white',

		font: {

			weight: 'bold'

		},



		formatter: function(value, context) {

			const formatterPeso = new Intl.NumberFormat('en-US', {

				style: 'currency',

				currency: 'USD'

			});



			return formatterPeso.format(value);

		}

	};



	const paddinglayout = {

		left: 0,

		right: 0,

		top: 0,

		bottom: 10

	};

	//Funciones para generar las graficas

	function ChartSrvSolicitados(Chartlabels, ChartData) {

	

		var colors = ["#3366cc","#990099","#ff9900","#109618",,"#dc3912",'#28B463', '#F4D03F', '#E74C3C', '#3498DB', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'];



		var ChartData2 = [];
		for(let i = 0; i<ChartData.length;i++){
			ChartData2[i] =ChartData[i]+"";
			ChartData[i] = parseInt(ChartData[i]);
			
		}

		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = new google.visualization.DataTable();

		data.addColumn('string', 'Tipo servicio'); // Implicit domain label col.
		data.addColumn('number', 'Cantidad'); 
		data.addColumn({ role: 'style' });
		data.addColumn( { role: 'annotation' });



		for(let i = 0; i<ChartData.length;i++){
			data.addRow(
				[Chartlabels[i],ChartData[i],colors[i],ChartData2[i]]
			);

			
		}

		

		var options = {
				title: "",
				height: 350,
				height: 200,
				bar: {groupWidth: "70%"},
				legend: { position: "none" },
			};
		var chart = new google.visualization.BarChart(document.getElementById("solicitadosChart"));
		chart.draw(data, options);
		$("#solicitadosChart_input").val(chart.getImageURI());

		}
      


		
	}

	function ChartModalidad(Chartlabels, ChartData) {

		var colors = ["#990099","#ff9900","#109618","#3366cc","#F9E600","#dc3912",'#28B463', '#F4D03F', '#E74C3C', '#3498DB', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'];

		for(let i = 0; i<ChartData.length;i++){
			
			ChartData[i] = parseInt(ChartData[i]);
			
		}

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		var data = new google.visualization.DataTable();

		data.addColumn('string', 'Tipo servicio'); // Implicit domain label col.
		data.addColumn('number', 'Cantidad'); 



		for(let i = 0; i<ChartData.length;i++){
			data.addRow(
				[Chartlabels[i],ChartData[i]]
			);

			
}

        var options = {
          title: '',
          pieHole: 0.1,
		  slices: [{color: colors[0]} ,{color: colors[3]}],
		  pieSliceTextStyle: {
            color: 'black',
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('modalidadServicioChart'));
        chart.draw(data, options);
		$("#modalidadServicioChart_input").val(chart.getImageURI());
		
      }

	}

	

	function ChartDictamen(Chartlabels, ChartData) {
		var colors = ["#109618","#F9E600","#dc3912","#990099","#ff9900","#3366cc",'#28B463', '#F4D03F', '#E74C3C', '#3498DB', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'];

		var ChartData2 = [];
		for(let i = 0; i<ChartData.length;i++){
			ChartData2[i] = ChartData[i]+"";
			ChartData[i] = parseInt(ChartData[i]);
			
		}
		
		
	
		google.charts.load("current", {packages:['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = new google.visualization.DataTable();

			data.addColumn('string', 'Tipo servicio'); // Implicit domain label col.
			data.addColumn('number', 'Cantidad'); 
			data.addColumn({ role: 'style' });
			data.addColumn( { role: 'annotation' });



			for(let i = 0; i<ChartData.length;i++){
				data.addRow(
					[Chartlabels[i],ChartData[i],colors[i],ChartData2[i]]
				);

				
			}


			var options = {
				title: "",
				height: 350,
				height: 200,
				bar: {groupWidth: "50%"},
				legend: { position: "none" },
			};
			var chart = new google.visualization.ColumnChart(document.getElementById("dictamenChart"));
			chart.draw(data, options);
			$("#dictamenChart_input").val(chart.getImageURI());
		}

		
      
	}

	function messageErrorChart() {

		var message = '<div class="container-fluid" style="height:300px;">' +

			'<div class="row">' +

			'<div class="col-sm-12">' +

			'<div class="card h-100 text-center" style="height: 300px; margin-top:200px">' +

			'<center><h3 class="">:( ocurrió un error al generar la grafica</h3></center>' +

			'</div>' +

			'</div>' +

			'</div>' +

			'</div>';

		document.getElementById('solicitadosChart').innerHTML = message;

		document.getElementById('clientesChart').innerHTML = message;

		document.getElementById('tipoServicioChart').innerHTML = message;

		document.getElementById('modalidadServicioChart').innerHTML = message;

	}

	//Funciones a ejecutar cuando de ingrese a la pagina

	function initDate() {

		date = new Date();

		sdateinicio = subtractDays(date, -30);

		sdatefin = currentDate();

		$("#fechainicio").val(sdateinicio);

		$("#fechafin").val(sdatefin);

	}

	function initChart() {

	

		date = new Date();

		sdateinicio = subtractDays(date, -30);

		sdatefin = currentDate();

		let dateinitial = sdateinicio;

		let datenow = sdatefin;

		$.ajax({

			type: "GET",

			url: "{{ url('getDataChart2') }}" + "/-1/" + dateinitial + "/" + datenow,

			success: function(response) {

				$(".chartloader").hide();

				DrawGraph(response);

			},

			error: function() {

				messageErrorChart();

			}

		});

	}

	function currentDate() {

		date = new Date();

		year = date.getFullYear();

		month = date.getMonth() + 1;

		day = date.getDate();

		if (day < 10) {

			day = '0' + day;

		}

		if (month < 10) {

			month = '0' + month;

		}

		return year + '-' + month + '-' + day;

	}

	function subtractDays(date, days) {

		date.setDate(date.getDate() + days);

		year = date.getFullYear();

		month = date.getMonth() + 1;

		day = date.getDate();

		if (day < 10) {

			day = '0' + day;

		}

		if (month < 10) {

			month = '0' + month;

		}

		return year + '-' + month + '-' + day;

	}

	//Funciones para hacer el reload de las graficas	

	function DrawGraph(response) {

		var modalidadservicios = [];

		var totalmodalidadservicios = [];

		var dictamen = [];

		var totaldictamen = [];


		response.totalPruebaEstatus.forEach(

			function(element) {

				totalmodalidadservicios.push(element.total2);
				modalidadservicios.push(element.estatus);
			});


		response.totalPruebaTipo.forEach(function(element) {

				dictamen.push(element.nombre);
				totaldictamen.push(element.total2);
			
		});
		

		ChartModalidad(modalidadservicios, totalmodalidadservicios);

		ChartDictamen(dictamen, totaldictamen);

		
	}

	//Funcion para hacer el cambio en los recuadros

	function DrawPictureHigher(Totalservicio, Totalporservicio, Prioridadservicios) {

		var totalporservicio;

		var prioridad;

		var tipo;

		var modalidadservicios;



		$("#total_clientes_cuadro").html(Totalservicio);

		Totalporservicio.forEach(function(element) {

			totalporservicio = totalporservicio + '<tr><th>' + element.nombre + '</th><th class="">' + element.total2 + '</th></tr>';

		});

		Prioridadservicios.forEach(function(element) {

			prioridad = prioridad + '<tr><th>' + element.estatus + '</th><th class="">' + element.total2 + '</th></tr>';

		});

	

		$("#TiposServicios").html(totalporservicio);

		$("#Prioridad").html(prioridad);

		

	}

	function DrawClients(ResponseClients) {

		var clients

		$('#bodyTableClientes').html('');

		if (ResponseClients.length == 0) {

			$('#bodyTableClientes').html('');

		} else {

			ResponseClients.forEach(function(element) {

				clients = clients + '<tr><td style="display:none">' + element.id + '</td><td><span class="hoveroption">' + element.nombre + '</span></td></tr>';

			});



			$('#bodyTableClientes').append(clients);


		}

	}

	function DrawSolicitante(ResponseSolicitante) {

		var solicitante = "";

		$('#bodyTableInvestigador').html('');

		if (ResponseSolicitante.length == 0) {

			$('#bodyTableInvestigador').html('');

		} else {

			ResponseSolicitante.forEach(function(element) {

				solicitante += '<tr><td><span class="hoveroption">' + element.Solicitante + '</span></td></tr>';

			});



			$('#bodyTableInvestigador').append(solicitante);


		}

	}

	function DrawAnalist(ResponseAnalist) {

		var analistas;

		$("#bodyTableAnalista").html('');

		if (ResponseAnalist.length > 0) {

			ResponseAnalist.forEach(function(element) {

				analistas = analistas + '<tr><td style="display:none">' + element.id + '</td><td><span class="hoveroption">' + element.nombre + '</span></td></tr>';

			});

			$('#bodyTableAnalista').append(analistas);



		}

	}

	function DrawStatusProcess(ResponseStatus) {

		var StatusProcess;

		$("#bodyTableEstatusProceso").html('');

		if (ResponseStatus.length > 0) {

			ResponseStatus.forEach(function(element) {

				StatusProcess = StatusProcess + '<tr><td style="display:none;">' + element.Estatus + '</td><td><span class="hoveroption">' + element.Estatus + '</span></td></tr>';

			});

			$("#bodyTableEstatusProceso").append(StatusProcess);



		}

	}

	//Funcion para calcular el porcentaje

	function percentage(numbers) {

		var percentage = [];

		var sumTotal = 0;

		var calculate = 0;

		for (i = 0; i < numbers.length; i++) {

			sumTotal = sumTotal + parseInt(numbers[i]);

		}

		for (j = 0; j < numbers.length; j++) {

			if (sumTotal > 0) {

				calculate = (parseInt(numbers[j]) / parseInt(sumTotal)) * 100;

				percentage.push(calculate.toFixed(2));

			} else {

				percentage.push(0);

			}

		}



		return percentage;

	}

	function letterAndProcentage(labels, data) {

		var letterProcentage = [];

		var rpercentage = percentage(data);

		for (i = 0; i < labels.length; i++) {

			letterProcentage.push(labels[i] + '\n' + rpercentage[i] + '%');

		}

		return letterProcentage;

	}

	

	
	//Funcion para destruir las graficas

	function clearcharts() {

		$("#container-solicitadosChart").html('');

		$('#container-solicitadosChart').append('<div id="solicitadosChart" ></div>');

		$("#container-procesoChart").html('');

		$('#container-procesoChart').append('<div id="procesoChart"></div>');

		$("#container-clientesChart").html('');

		$('#container-clientesChart').append('<div id="clientesChart"></div>');

		$("#container-tipoServicioChart").html('');

		$('#container-tipoServicioChart').append('<div id="tipoServicioChart"></div>');

		$("#container-modalidadServicioChart").html('');

		$('#container-modalidadServicioChart').append('<div id="modalidadServicioChart"></div>');

		$("#container-dictamenChart").html('');

		$('#container-dictamenChart').append('<div id="dictamenChart"></div>');

		$("#container-porcentajeDictamenLChart").html('');

		$('#container-porcentajeDictamenLChart').append('<div id="porcentajeDictamenLChart"></div>');

		$("#container-respuestaAgendaChart").html('');

		$('#container-respuestaAgendaChart').append('<div id="respuestaAgendaChart"></div>');

		$("#container-tiempoISLChart").html('');

		$('#container-tiempoISLChart').append('<div id="tiempoISLChart"></div>');

		$("#container-tiempoRespuestaChart").html('');

		$('#container-tiempoRespuestaChart').append('<div id="tiempoRespuestaChart"></div>');

		$("#container-facturacionGlobalChart").html('');

		$('#container-facturacionGlobalChart').append('<div id="facturacionGlobalChart"></div>');

		$("#container-factServicioChart").html('');

		$('#container-factServicioChart').append('<div id="factServicioChart"></div>');

	}

	//Eventos para realizar los filtros


	$("#btnPeriod").on("click", function() {

		var dateIni = $("#fechainicio").val();

		var dateEnd = $("#fechafin").val();

		for (var i = 1; i <= 5; i++) {
			filtro[i] = $('#IdF' + i).val();
		}

		$.ajax({
			url: "{{ url('Filtros2') }}/" + filtro[1] + "/" + filtro[2] + "/" + filtro[3] + "/" + filtro[4] +"/"+ dateIni + "/" + dateEnd,
			type: "GET",
			data: {solicitante:filtro[5]},

			success: function(response) {
				showNotify("Aplicando Filtro:", "Esperar");
				

				console.log(response)

					DrawPictureHigher(response.totalPruebas, response.totalPruebaTipo,response.totalPruebaEstatus);
					
					DrawClients(response.clientesPl2);
					
					DrawAnalist(response.analistaPl2);
					
					//console.log(response.solicitanteF);
					DrawSolicitante(response.solicitantePl2);
					//ChangeColorBtnClearfilter("filter", "clearfilterclient");
					
					
					clearcharts();
					DrawGraph(response);
				
				//ChangeColorBtnClearfilter("filter", "clearfilterclient");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}
		})

	});

	$("#fechafin").on("change", function() {

		var dateEnd = [];

		var dateLimit = [];

		var dateIni = [];

		var dateNow = currentDate();

		dateEnd = $("#fechafin").val().split('-');

		dateLimit = dateNow.split('-');

		dateIni = $("#fechainicio").val().split('-');

		var f1 = new Date(dateEnd[0], dateEnd[1], dateEnd[2]);

		var f2 = new Date(dateLimit[0], dateLimit[1], dateLimit[2]);

		var f3 = new Date(dateIni[0], dateIni[1], dateIni[2]);

		if (f1 > f2) {

			showNotify("Filtro: ", "Fecha Fin no puede ser mayor de la fecha " + dateLimit[2] + "/" + dateLimit[1] + "/" + dateLimit[0], "warning");

			$("#fechafin").val(dateNow);

		}

		if (f1 < f3) {

			showNotify("Filtro: ", "Fecha Fin no puede ser menor de la Fecha Inicio: " + dateIni[2] + "/" + dateIni[1] + "/" + dateIni[0], "warning");

			$("#fechafin").val(dateNow);

		}

	});

	$("#fechainicio").on("change", function() {

		var dateEnd = [];

		var dateIni = [];

		dateEnd = $("#fechafin").val().split('-');

		dateIni = $("#fechainicio").val().split('-');

		var f1 = new Date(dateEnd[0], dateEnd[1], dateEnd[2]);

		var f2 = new Date(dateIni[0], dateIni[1], dateIni[2]);

		if (f1 < f2) {

			showNotify("Filtro: ", "Fecha Inicio no debe ser mayor a Fecha Fin: " + dateEnd[2] + "/" + dateEnd[1] + "/" + dateEnd[0], "warning");

			date = new Date();

			sdateinicio = subtractDays(date, -30);

			$("#fechainicio").val(sdateinicio);

		}

	});

	
	// Events for clears filters 
	var filtro = [];
	filtro[0] = 0
	for (var j = 1; j <= 5; j++) {
		$('#IdF' + j).on("change", function() {
			for (var i = 1; i <= 5; i++) {
				filtro[i] = $('#IdF' + i).val();
			}
			
			dateEnd = $("#fechafin").val();

			dateIni = $("#fechainicio").val();


			$.ajax({
				url: "{{ url('Filtros2') }}/" + filtro[1] + "/" + filtro[2] + "/" + filtro[3] + "/" + filtro[4] + "/"+dateIni+"/"+dateEnd+"",
				data: {solicitante:filtro[5]},
				type: "GET",

				success: function(response) {
					showNotify("Aplicando Filtro:", "Esperar");

					DrawPictureHigher(response.totalPruebas, response.totalPruebaTipo,response.totalPruebaEstatus);
					
					DrawClients(response.clientesPl2);
					
					DrawAnalist(response.analistaPl2);
					
					//console.log(response.solicitanteF);
					DrawSolicitante(response.solicitantePl2);
					
					//ChangeColorBtnClearfilter("filter", "clearfilterclient");
					
					
					clearcharts();
					DrawGraph(response);

				},

				error: function() {

					showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

				}
			});
			
		});
	}


	function pdfs (){

		
		var dataURL3 = $("#modalidadServicioChart_input").val();
		var dataURL4 =  $("#dictamenChart_input").val();
		
		
		
		
		
		
		var cli = document.getElementById("bodyTableClientes");
		var variable=cli.getElementsByTagName("span");
		var clientes = [];
		for(var i = 0; i< variable.length; i++){
			clientes[i] = variable[i].innerHTML;
		}

		var dateIni = $("#fechainicio").val();
		var dateEnd = $("#fechafin").val();

		
		
		var doc = new jsPDF();
			
			//Encabezado
			doc.addImage("{{$logo}}", 'JPEG', 10, 5, 45,25);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(17);
			doc.text("Pruebas Laborales", 100, 20);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(60, 22 , 142, 1, 'F');


			Servicio = document.getElementById("bodyTableClientes");
			Serv=Servicio.getElementsByTagName("span");
			serv = Serv[0].innerHTML;
			
			//Periodo
			doc.setFontType('bold');
			doc.setFontSize(9);
			doc.text("Período: ", 148, 27);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.text(dateIni + " a " + dateEnd, 163, 27);
			doc.setFontType('bold');
			doc.setFontSize(9);
			//doc.text("Cliente: ", 60, 27);
			//doc.setFontType('normal');
			//doc.setFontSize(9);
			//doc.text(serv, 74, 27);

			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, 40,60, 7, 'F');
			
			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Total de Servicios",22, 45);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("TiposServicios");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 45;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, 47, 60, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_clientes_cuadro").innerHTML,40,con+=7);
			
			var espacio = con + 7;

			//cuadro clientes
			doc.setDrawColor(0);
			doc.setFillColor(118, 113, 112);
			doc.rect(10, espacio , 60, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Clientes",34, espacio + 5);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			Servicio = document.getElementById("bodyTableClientes");
			Serv=Servicio.getElementsByTagName("span");
			serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 47;
			for(var i = 0; i< serv.length; i++){
					con+=5;
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, espacio + 7 , 60, con-45, 'F');
			con = espacio  + 6;
			for(var i = 0; i< serv.length; i++){
					doc.text(serv[i],13, con+=5);
					espacio+=5;
			}
			espacio += 15;

			//cuadro Investigador
			
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10,espacio, 60, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Solicitante",30, espacio+5);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("bodyTableInvestigador");
			var Serv=Servicio.getElementsByTagName("span");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con =  espacio+7;
			for(var i = 0; i< serv.length; i++){
					con+=5;
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, espacio+7 , 60, con-espacio-5, 'F');
			con = espacio+7;
			for(var i = 0; i< serv.length; i++){
				if(serv[i] != "" && serv[i]!=null && serv[i]!="null" && serv[i]!="NO Aplica Investigador" && serv[i]!="No Aplica Investigador")
					doc.text(serv[i],12, con+=5);
			}

			espacio = 40;

			//cuadro prioridad 
			/*doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(110, espacio, 45, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Prioridad",123, espacio + 5);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);
			var po = con;
			var Servicio = document.getElementById("Prioridad");
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
			con += 2
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(110, espacio + 7 , 45, con, 'F');
			con = espacio + 6;
			for(var i = 0; i < serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],113,con+=6);
				}
			}
*/
		
			
			//serviciof
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(78, espacio , 45, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Tipos",93, espacio + 5);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("TiposServicios");
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
			doc.rect(78, espacio + 7, 45, con, 'F');
			con = espacio + 6;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],80,con+=6);
				}
			}
			

			//cuadro Analista
			doc.setDrawColor(0);
			doc.setFillColor(112, 113, 112);
			doc.rect(131,espacio, 70, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Analista",158,espacio+5);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("bodyTableAnalista");
			var Serv=Servicio.getElementsByTagName("span");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 0;
			for(var i = 0; i< serv.length; i++){
					con+=5;
			}
			con+=2;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(131,espacio+7, 70, con, 'F');
			con =espacio+6;
			for(var i = 0; i< serv.length; i++){
				if(serv[i] != "" && serv[i]!=null){
					doc.text(serv[i],133, con+=5);
					
				}
			}

			
	

			doc.addImage(dataURL3, 'PNG/JPEG', 102, 120, 80, 36);
			doc.text("Estatus",135,120)

			espacio += 60

			doc.addImage(dataURL4, 'PNG/JPEG', 102, 183, 80, 44);
			doc.text("Tipo de pruena",132,180);

			

		
		
		/*
		
		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Total de Servicios:", 2.5, 1.4);
		doc.setFontType('normal');
		doc.setFontSize(9);
		doc.text(document.getElementById("total_clientes_cuadro").innerHTML,2.5,1.6);


		var ana = document.getElementById("bodyTableAnalista");
		var Avariable=ana.getElementsByTagName("span");
		var analistas = [];
		for(var i = 0; i< Avariable.length; i++){
			analistas.push( [Avariable[i].innerHTML]);
		}
		// Or use javascript directly:
		doc.autoTable({
			theme: "plain",
			styles: {cellWidth: 3.2, font:'helvetica', fillColor: [232, 231, 231]},
			margin: {top: 3},
			Padding: {top:0 ,  bottom: 0},
			headStyles:{halign: "center" , fillColor: [116, 113, 112 ],fontSize: 11,textColor:[255,255,255]},
			bodyStyles: {fontSize: 9, textColor:[0,0,0]},
			head: [['Analistas']],
			body: analistas,
			
			});



		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Prioridad:",6.9, 1.4);
		doc.setFontType('normal');
		doc.setFontSize(9);
		Servicio = document.getElementById("Prioridad");
		Serv=Servicio.getElementsByTagName("th");
		serv = [];
		for(var i = 0; i< Serv.length; i++){
			serv[i] = Serv[i].innerHTML;
		}

		con = 1.4;
		for(var i = 0; i< serv.length; i++){
			if(i % 2 == 0)
				doc.text(serv[i]+": "+serv[i+1],6.9,con+=0.2);
		}

		@if(Auth::user()->tipo!="c")
		var inv = document.getElementById("bodyTableInvestigador");
		var Ivariable=inv.getElementsByTagName("span");
		var investigator = [];
		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Investigador:",6.9, 2.4);
		doc.setFontType('normal');
		doc.setFontSize(9);
		for(var i = 0; i< Ivariable.length; i++){
			investigator[i] = Ivariable[i].innerHTML;
		}
		con =2.4;
		for(var i = 0; i<investigator.length; i++){
			if(investigator[i]!="")
				doc.text(investigator[i],6.9,con+=0.2);
		}
		@endif


		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Tipo:",8.5, 1.4);
		doc.setFontType('normal');
		doc.setFontSize(9);
		Servicio = document.getElementById("Tipo");
		Serv=Servicio.getElementsByTagName("th");
		serv = [];
		for(var i = 0; i< Serv.length; i++){
			serv[i] = Serv[i].innerHTML;
		}

		con = 1.4;
		for(var i = 0; i< serv.length; i++){
			if(i % 2 == 0)
				doc.text(serv[i]+": "+serv[i+1],8.5,con+=0.2);
		}

		doc.setFontSize(12);
		doc.setFontType('bold');
		doc.text("Modalidad:",9.7, 1.4);
		doc.setFontType('normal');
		doc.setFontSize(9);
		Servicio = document.getElementById("Modalidad");
		Serv=Servicio.getElementsByTagName("th");
		serv = [];
		for(var i = 0; i< Serv.length; i++){
			serv[i] = Serv[i].innerHTML;
		}

		con = 1.4;
		for(var i = 0; i< serv.length; i++){
			if(i % 2 == 0)
				doc.text(serv[i]+": "+serv[i+1],9.7,con+=0.2);
		}


		
		@if(Auth::user()->tipo=="c")
		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Servicios Solicitados",0.6,5)
		doc.addImage(dataURL, 'PNG/JPEG', 0.4, 5, 3.5, 3);
		doc.text("Prioridad",4.7,5)
		doc.addImage(dataURL2, 'PNG/JPEG', 4.5, 5, 3.5, 3);
		doc.text("Modalidad del Servicio",8.3,5)
		doc.addImage(dataURL3, 'PNG/JPEG', 8.1, 5, 3.5, 3);
		doc.addPage();
		doc.text("Estatus del Proceso",0.6,1)
		doc.addImage(dataURL1, 'PNG/JPEG', 0.4, 1.2, 3.5, 3);
		doc.text("Dictamen",4.7,1)
		doc.addImage(dataURL4, 'PNG/JPEG', 4.5, 1.2, 3.5, 3);
		doc.text("Tiempo de Respuesta Agenda",8.3,1)
		doc.addImage(dataURL6, 'PNG/JPEG', 8.1, 1.2, 3.5, 3);
		
		@if(Auth::user()->tipo!="c")
			doc.text("Tiempo de Respuesta ISL",0.6,5)
			doc.addImage(dataURL7, 'PNG/JPEG', 0.4, 5, 3.5, 3);
		@endif
		doc.text("Tiempo de Respuesta",4.7,5)
		doc.addImage(dataURL8, 'PNG/JPEG', 4.5, 5, 3.5, 3);
		@endif


		@if(Auth::user()->tipo!="c")

		doc.addPage();
		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Servicios Solicitados",0.6,1)
		doc.addImage(dataURL, 'PNG/JPEG', 0.4, 1.2, 3.5, 3);
		doc.text("Prioridad",4.7,1)
		doc.addImage(dataURL2, 'PNG/JPEG', 4.5, 1.2, 3.5, 3);
		doc.text("Modalidad del Servicio",8.3,1)
		doc.addImage(dataURL3, 'PNG/JPEG', 8.1, 1.2, 3.5, 3);
		doc.text("Estatus del Proceso",0.6,5)
		doc.addImage(dataURL1, 'PNG/JPEG', 0.4, 5.2, 3.5, 3);
		doc.text("Dictamen",4.7,5)
		doc.addImage(dataURL4, 'PNG/JPEG', 4.5, 5.2, 3.5, 3);
		doc.text("Tiempo de Respuesta Agenda",8.3,5)
		doc.addImage(dataURL6, 'PNG/JPEG', 8.1, 5.2, 3.5, 3);
		doc.addPage();
		
		
		doc.text("Tiempo de Respuesta ISL",0.6,1)
		doc.addImage(dataURL7, 'PNG/JPEG', 0.4, 1.2, 3.5, 3);
		
		doc.text("Tiempo de Respuesta",4.7,1)
		doc.addImage(dataURL8, 'PNG/JPEG', 4.5, 1.2, 3.5, 3);
		@endif
		*/
		

		
		doc.save('Reporte.pdf');  
		
	}
</script>







@endsection