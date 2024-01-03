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

	.text-color-amarillo {

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



<div id="content" class="content">



	<!-- begin breadcrumb -->

	<ol class="breadcrumb ">

		<li>{{ link_to('home', $title = 'Módulos', $parameters = array(), $attributes = array()) }}</li>

		<li class="active">ESE-Dashboard</li>

	</ol>

	<!-- end breadcrumb -->

	<!-- begin page-header -->

	<div style="display: flex; justify-content:end;">
		<h1 style="width: 50vw;  font-size: 30px;" class="page-header text-center">DASHBOARD</h1>
		
		<div style="width: 10px;"></div>

		<div style="width: 15vw; text-align: center; display: flex; justify-content: end;" >
		<a class="btn btn-success text-center" onclick="pdfs()"  style="height: 30px; width: 130px; text-align: center;" target="_blank">Generar Reporte</a> 
		</div>
		
		<div style="height: 10px;"></div>
	</div>
 
	 
        
	<!-- end page-header -->

	<!-- row  bloque 1-->

	<div class="row">
		<div class="col-md-12" style="height:100%">
			<div class="form-group col-md-3">
				<label>Filtro de Cliente</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF1" name="IdAnalista" @if(Auth::user()->tipo=="c") disabled @endif>
							<option value="NA"> Sin Filtro</option>
							@foreach ($clientesFiltro as $clF)
							<option value="{{$clF->id}}" @if(Auth::user()->tipo=="c" && $clF->id == Auth::user()->IdCliente) selected @endif> {{$clF->nombre_comercial}}</option>
							@endforeach
						</select>

					</div>
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Filtro de Analista</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF2" name="IdAnalistaSec">
							<option value="NA"> Sin Filtro</option>
							@foreach ($analistaFiltro as $clF)
							<option value="{{$clF->id}}"> {{$clF->nombre}}</option>
							@endforeach
						</select>


					</div>
				</div>
			</div>

			<div class="form-group col-md-3" @if(Auth::user()->tipo=="c") style = "display:none;" @endif>
				<label>Filtro de Investigador</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF3" name="IdInvestigador" @if(Auth::user()->tipo=="c") disabled @endif>
							<option value="NA"> Sin Filtro</option>
							@foreach ($investigadorFiltro as $clF)
								@if($clF->nombre != null && $clF->nombre!="")
							<option value="{{$clF->IdEmpleado}}"> {{$clF->nombre}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Filtro de Modalidad</label>
				<div class="row">
					<div class="input-group col-sm-12">
						<select class="form-control" id="IdF4" name="IdLider">
							<option value="NA"> Sin filtro</option>
							@foreach ($modalidadFiltro as $clF)
							<option value="{{$clF->IdModalidad}}"> {{$clF->Descripcion}}</option>
							@endforeach
						</select>

					</div>
				</div>
			</div>
		</div>
		<div class="row">



			<!-- begin col-1 -->

			<div class="col-md-2 col-sm-6" style="height:100%">

				<div class="widget widget-stats bg-black text-center">

					<div class="row">

						<div class="col-sm-12">

							<div class="stats-title">Total Servicios</div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 80px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody>

								<tr>

									<td>

										<div class="stats-number text-color-amarillo" id="total_clientes_cuadro">{{ $Totalservicio }}</div>

									</td>

								</tr>

							</tbody>

						</table>

					</div>

					<!-- <div class="stats-number text-color-amarillo" id="total_clientes_cuadro">{{ $estudios_cerrados->count() }}</div> -->

				</div>

			</div>




			<!-- end col-1 -->

			<!-- begin col-3 -->

			<div class="col-md-4 col-sm-6">

				<div class="widget widget-stats bg-black">

					<div class="row">

						<div class="col-sm-12">

							<div class="stats-title text-center">Servicios</div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 80px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody id="TiposServicios">

								@foreach($totalporservicio as $tpsrv)

								<tr>

									<th>{{ $tpsrv->Descripcion }}</th>

									<th class="text-color-amarillo">{{ $tpsrv->Total }}</th>

								</tr>

								@endforeach

							</tbody>

						</table>

					</div>





				</div>

			</div>



			<!-- end col-3 -->

			<!-- begin col-2 -->

			<div class="col-md-2 col-sm-6">

				<div class="widget widget-stats bg-black">

					<div class="row">

						<div class="col-sm-12">

							<div class="stats-title text-center">Prioridad</div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 80px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody id="Prioridad">

								@foreach($prioridadservicios as $psrv)

								<tr>

									<th>{{ $psrv->Descripcion }}</th>

									<th class="text-color-amarillo">{{ $psrv->Total }}</th>

								</tr>

								@endforeach

							</tbody>

						</table>

					</div>



				</div>

			</div>

			<!-- end col-2 -->

			<!-- begin col-3 -->

			<div class="col-md-2 col-sm-6">

				<div class="widget widget-stats bg-black">

					<div class="row">

						<div class="col-sm-12">

							<div class="stats-title text-center">Tipo</div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 80px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody id="Tipo">

								@foreach($tipos as $t)

								<tr>

									<th>{{ $t->Tipos }}</th>

									<th class="text-color-amarillo">{{ $t->Total }}</th>

								</tr>

								@endforeach

							</tbody>

						</table>

					</div>

				</div>

			</div>

			<!-- end col-3 -->



			<!-- begin col-3 -->

			<div class="col-md-2 col-sm-6">

				<div class="widget widget-stats bg-black">

					<div class="row">

						<div class="col-sm-12">

							<div class="stats-title text-center">Modalidad</div>

						</div>

					</div>

					<div class="panel-body table-responsive" style="height: 80px; padding:5px;">

						<table style="height: 50px; width: 100%;">

							<tbody id="Modalidad">

								@foreach($modalidadservicios as $msrv)

								<tr>

									<th>{{ $msrv->Descripcion }}</th>

									<th class="text-color-amarillo">{{ $msrv->Total }}</th>

								</tr>

								@endforeach

							</tbody>

						</table>

					</div>

				</div>

			</div>

			<!-- end col-3 -->



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

								<table style=" height: 50px; " id="TableClientes" class="container-data">

									<tbody id="bodyTableClientes">

										@foreach ($clientes as $cliente)

										<tr>

											<td style="display:none">{{ $cliente->IdCliente }}</td>

											<td><span>{{ $cliente->Nombre }}</span></td>

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

										@foreach($analistas as $analista)

										<tr>

											<td style="display:none">{{ $analista->IdEmpleado }}</td>

											<td><span>{{ $analista->NombreCompleto }}</span></td>

										</tr>

										@endforeach

									</tbody>

								</table>

							</div>

						</div>

					</div><!-- end colspan 6-->

					<div class="col-md-4 col-sm-6">

						<div class="panel panel-inverse" @if(Auth::user()->tipo=="c") style = "display:none;" @endif>

							<div class="panel-heading">

								<div class="panel-heading-btn">


								</div>

								<h4 class="panel-title">Investigador</h4>

							</div>



							<div class="panel-body table-responsive" style="height: 150px;">

								<center class="chartloader">

									<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

										<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

											<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

										</path>

									</svg>

								</center>

								<table id="TableInvestigador" class="container-data">

									<tbody id="bodyTableInvestigador" >

										@foreach($investigadores as $inv)
											
										<tr>

											<td style="display:none">{{ $inv->IdEmpleado }}</td>

											<td><span>{{ $inv->NombreCompleto }}</span></td>

										</tr>
											
										@endforeach

									</tbody>

								</table>

							</div>

						</div>

						<!--<div style="display: none;" class="panel panel-inverse">

							<div class="panel-heading">

								<div class="panel-heading-btn">

									<button class="btn btn-xs btn-icon btn-circle btn-clear-filter btn-success" id="clearfilterTipoclient"><i class="fa fa-filter"></i></button>

								</div>

								<h4 class="panel-title">Tipos de Clientes</h4>

							</div>



							<div class="panel-body table-responsive" style="height: 150px;">

								<center class="chartloader">

									<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

										<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

											<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

										</path>

									</svg>

								</center>

								<table id="TableTipoCliente" class="container-data">

									<tbody id="bodyTableTipoCliente">

										@foreach ($tiposClientes as $tc)

										<tr>

											<td style="display:none;">{{ $tc->TipoCliente }}</td>

											<td><span class="hoveroption">{{ $tc->TipoCliente }}</span></td>

										</tr>

										@endforeach

										<tr><td><span class="hoveroption">Externo</span></td></tr>

											<tr><td><span class="hoveroption">Interno</span></td></tr>

									</tbody>

								</table>

						

							</div>

						</div>-->

					</div>

				</div>

				<!-- row  Sub-bloque 2-->

				<!--<div class="row">

					<div class="col-md-4 col-sm-6">

						<div style="display: none;" class="panel panel-inverse">

							<div class="panel-heading">

								<div class="panel-heading-btn">

									<button class="btn btn-xs btn-icon btn-circle btn-clear-filter btn-success" id="clearfilterEstatus"><i class="fa fa-filter"></i></button>

								</div>

								<h4 class="panel-title">Estatus del proceso</h4>

							</div>



							<div class="panel-body table-responsive" style="height: 150px;">

								<center class="chartloader">

									<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

										<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

											<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

										</path>

									</svg>

								</center>

								<table id="TableEstatusProceso" class="container-data">

									<tbody id="bodyTableEstatusProceso">

										@foreach($estatus_proceso as $estatu)

										<tr>

											<td style="display:none;">{{ $estatu->Estatus }}</td>

											<td><span class="hoveroption">{{ $estatu->Estatus }}</span></td>

										</tr>

										@endforeach

									</tbody>

								</table>

							</div>

						</div>

					</div> end colspan 6-->

			</div>

		</div>

	</div>

	<!-- fin row bloque 2-->

	<div class="row">

		<!-- begin col-4 potlet #1 -->

		<div class="col-md-4 col-sm-6"><!------------->

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn">

					</div>

					<h4 class="panel-title">Servicios Solicitados</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-solicitadosChart" class="container-data" style="display:none;"><canvas id="solicitadosChart"></canvas></div>

				</div>

			</div>

		</div><!-- end colspan 6-->



		<!-- begin col-4 potlet #1 -->

		<div class="col-md-4 col-sm-6">


			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Prioridad</h4><!-- -->

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-tipoServicioChart" class="container-data" style="display:none;"><canvas id="tipoServicioChart"></canvas></div>

				</div>

			</div>



		</div><!-- end colspan 6-->



		<div class="col-md-4 col-sm-6">
			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Modalidad del servicio</h4>

				</div>

				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-modalidadServicioChart" class="container-data" style="display:none;"><canvas id="modalidadServicioChart"></canvas></div>

				</div>



			</div>


			<div style="display: none;" class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Porcentaje de servicios</h4>

				</div>

				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-clientesChart" class="container-data" style="display:none;"><canvas id="clientesChart"></canvas></div>

				</div>



			</div>

		</div><!-- end colspan 6-->



	</div><!-- end rowspan -->



	<div class="row">

		<!-- begin col-4 potlet #1 -->

		<div class="col-md-4 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Estatus del proceso</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-procesoChart" class="container-data" style="display:none;"><canvas id="procesoChart"></canvas></div>

				</div>

			</div>




		</div><!-- end colspan 6-->



		<!-- begin col-4 potlet #1 -->

		<div class="col-md-4 col-sm-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Dictamen</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-dictamenChart" class="container-data" style="display:none;"><canvas id="dictamenChart"></canvas></div>

				</div>

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



	<!--<div class="row">


			<div class="col-md-6">

				<div style="display: none;" class="panel panel-inverse">

					<div class="panel-heading">

						<div class="panel-heading-btn"></div>

						<h4 class="panel-title">Dictamen de incidencias</h4>

					</div>



					<div class="panel-body table-responsive">

						<center class="chartloader">

							<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

								<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

									<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

								</path>

							</svg>

						</center>

						<div id="container-porcentajeDictamenLChart" class="container-data" style="display:none;"><canvas id="porcentajeDictamenLChart"></canvas></div>

					</div>

				</div>

			</div>

		</div>-->



	<div class="row">

		<div class="col-md-4" >

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Tiempo respuesta agenda</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-respuestaAgendaChart" class="container-data" style="display:none;"><canvas id="respuestaAgendaChart" width="400" height="150"></canvas></div>

				</div>

			</div>

		</div>



		<div class="col-md-4">

			<div class="panel panel-inverse" @if(Auth::user()->tipo=="c") style = "display:none;" @endif>

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Tiempo de respuesta ISL</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-tiempoISLChart" class="container-data" style="display:none;"><canvas id="tiempoISLChart" width="400" height="150"></canvas></div>

				</div>

			</div>

		</div>



		<div class="col-md-4">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Tiempo de respuesta</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-tiempoRespuestaChart" class="container-data" style="display:none;"><canvas id="tiempoRespuestaChart" width="400" height="150"></canvas></div>



				</div>

			</div>

		</div>

	</div>



	<div style="display: none;" class="row">

		<div class="col-md-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Facturación Global</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-facturacionGlobalChart" class="container-data" style="display:none;"><canvas id="facturacionGlobalChart"></canvas></div>

				</div>

			</div>

		</div>



		<div style="display: none;" class="col-md-6">

			<div class="panel panel-inverse">

				<div class="panel-heading">

					<div class="panel-heading-btn"></div>

					<h4 class="panel-title">Facturación por servicio</h4>

				</div>



				<div class="panel-body table-responsive">

					<center class="chartloader">

						<svg class="svgloader" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

							<path fill="#00BFFF" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />

							</path>

						</svg>

					</center>

					<div id="container-factServicioChart" class="container-data" style="display:none; position: relative;"><canvas id="factServicioChar"></canvas></divt>

				</div>

			</div>

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

	let colors = ['#28B463', '#F4D03F', '#E74C3C', '#3498DB', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'];



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


		var canvas = document.getElementById('solicitadosChart');

		var ctxSolicitados = document.getElementById('solicitadosChart').getContext('2d');

		
		canvas.style.cssText = 'width: 400px; height: 400px;';

		var solicitadosChart = new Chart(ctxSolicitados, {

			type: 'bar',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: '#',

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1

				}]

			},

			options: {

				scales: {

					yAxes: [{

						ticks: {

							beginAtZero: true

						}

					}]

				},

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionplugnormal

				}

			}

		});


		
	}

	function ChartEstatusPreceso(Chartlabels, ChartData) {

		var canvas = document.getElementById('procesoChart');

		canvas.style.cssText = 'width: 400px; height: 400px;';

		var ctxProceso = document.getElementById('procesoChart').getContext('2d');

		var procesoChart = new Chart(ctxProceso, {

			type: 'bar',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: '#',

					data: ChartData,

					backgroundColor:  ['#28B463', '#F4D03F', '#E74C3C', '#3498DB', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'],

					borderColor: colors,

					borderWidth: 1

				}]

			},

			options: {

				scales: {

					yAxes: [{

						ticks: {

							beginAtZero: true

						}

					}]

				},

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionplugnormal

				}

			}

		});

	}



	function ChartSrvSolicitadosPercentage(Chartlabels, ChartData) {

		var canvas = document.getElementById('clientesChart');

		canvas.style.cssText = 'width: 400px; height: 400px;';

		var ctxClientes = document.getElementById('clientesChart').getContext('2d');

		var clientesChart = new Chart(ctxClientes, {

			type: 'pie',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: '',

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

					datalabels: {

						anchor: 'end'

					}

				}]

			},

			options: {

				plugins: {

					datalabels: optionpluginpercentage

				},

				layout: {

					padding: paddinglayout

				}

			}

		});



	}

	function ChartTipoServicio(Chartlabels, ChartData) {

		var canvas = document.getElementById('tipoServicioChart');

		canvas.style.cssText = 'width: 400px; height: 400px;';

		var ctxTipoServicio = document.getElementById('tipoServicioChart').getContext('2d');

		var tipoServicioChart = new Chart(ctxTipoServicio, {

			type: 'horizontalBar',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: ['#'],

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

					datalabels: {

						align: 'center',

						anchor: 'center'

					}

				}]

			},

			options: {

				scales: {

					xAxes: [

						{



							ticks: {

								beginAtZero: true

							}

						}

					],

					yAxes: [

						{

							ticks: {

								beginAtZero: true

							}

						}

					]

				},

				responsive: true,

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionplugnormal2

				}

			}

		});



	}

	function ChartModalidad(Chartlabels, ChartData) {

		var canvas = document.getElementById('modalidadServicioChart');

		canvas.style.cssText = 'width: 400px; height: 400px;';

		var ctxModalidadServicio = document.getElementById('modalidadServicioChart').getContext('2d');

		var modalidadServicioChart = new Chart(ctxModalidadServicio, {

			type: 'doughnut',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: Chartlabels,

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

					datalabels: {

						anchor: 'start'

					}

				}]

			},

			options: {

				plugins: {

					datalabels: optionpluginpercentage

				}

			}

		});



	}

	function ChartDictamen(Chartlabels, ChartData) {

		var calculate = 0;

		var canvas = document.getElementById('dictamenChart');

		canvas.style.cssText = 'width: 400px; height: 400px;';

		var ctxDictamen = document.getElementById('dictamenChart').getContext('2d');

		var dictamenChart = new Chart(ctxDictamen, {

			type: 'bar',

			data: {

				labels: letterAndProcentage(Chartlabels, ChartData),

				datasets: [{

					label: ['#'],

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1

				}]

			},

			options: {

				scales: {

					yAxes: [{

						ticks: {

							beginAtZero: true

						}

					}]

				},

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionplugnormal

				}

			}

		});

	}

	function ChartDictamenIncidencias(Chartlabels, ChartData) {

		var canvas = document.getElementById('porcentajeDictamenLChart');

		canvas.style.cssText = 'width: 400px; height: 150px;';

		var ctxPorcentajeDictamen = document.getElementById('porcentajeDictamenLChart').getContext('2d');

		var porcentajeDictamenLChart = new Chart(ctxPorcentajeDictamen, {

			type: 'bar',

			data: {

				labels: letterAndProcentage(Chartlabels, ChartData),

				datasets: [{

					label: '#',

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

				}]

			},

			options: {

				scales: {

					yAxes: [{

						ticks: {

							beginAtZero: true

						}

					}]

				},

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionplugnormal

				}

			}

		});

	}

	function ChartRespuestaAgenda(Desfasada, d1,d2,d3) {

		var canvas = document.getElementById('respuestaAgendaChart');

		canvas.style.cssText = 'width: 400px; height: 150px;';

		var ctxRespuestaAgenda = document.getElementById('respuestaAgendaChart').getContext('2d');

		var respuestaAgendaChart = new Chart(ctxRespuestaAgenda, {

			type: 'horizontalBar',

			data: {

				labels: [ 'Desfasado','3 Días','2 Días','1 Día',],

				datasets: [{

					label: ['#'],

					data: [Desfasada, d3,d2,d1],

					backgroundColor: [ '#E74C3C', '#3498DB', '#F4D03F', '#28B463', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'],

					borderColor:	[ '#E74C3C', '#3498DB', '#F4D03F', '#28B463', 'FFA500', 'Purple', 'Turquiose ', 'Brown', 'Gray', 'Fuchsia'],

					borderWidth: 1

				}]

			},

			options: {

				scales: {

					xAxes: [

						{



							ticks: {

								beginAtZero: true

							}

						}

					],

					yAxes: [

						{

							ticks: {

								beginAtZero: true

							}

						}

					]

				},

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionplugnormal

				}

			}

		});



	}

	function ChartRespuestaISL(Desfasada, EnTiempo) {

		var sum = SumaTotal([Desfasada, EnTiempo]);

		var percentageEnTiempo = 0;

		var percentageDesfasada = 0;

		if (sum > 0) {

			percentageEnTiempo = (parseInt(EnTiempo) / parseInt(sum)) * 100;

			percentageDesfasada = (parseInt(Desfasada) / parseInt(sum)) * 100;

		}

		var canvas = document.getElementById('tiempoISLChart');

		canvas.style.cssText = 'width: 400px; height: 150px;';

		var ctxTiempoISL = document.getElementById('tiempoISLChart').getContext('2d');

		var tiempoISLChart = new Chart(ctxTiempoISL, {

			type: 'doughnut',

			data: {

				labels: ['En tiempo', 'Desfasado'],

				datasets: [{

					label: ['En tiempo', 'Desfasado'],

					data: [percentageEnTiempo.toFixed(2),

						percentageDesfasada.toFixed(2)
					],

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

					datalabels: {

						anchor: 'end'

					}

				}]

			},

			options: {

				plugins: {

					datalabels: optionpluginpercentage

				},

				layout: {

					padding: paddinglayout

				}

			}

		});

	}

	function ChartRespuesta(Desfasada, EnTiempo) {

		var sum = SumaTotal([Desfasada, EnTiempo]);

		var percentageEnTiempo = 0;

		var percentageDesfasada = 0;

		if (sum > 0) {

			percentageEnTiempo = (parseInt(EnTiempo) / parseInt(sum)) * 100;

			percentageDesfasada = (parseInt(Desfasada) / parseInt(sum)) * 100;

		}

		var canvas = document.getElementById('tiempoRespuestaChart');

		canvas.style.cssText = 'width: 400px; height: 150px;';

		var ctxTiempoRespuesta = document.getElementById('tiempoRespuestaChart').getContext('2d');

		var tiempoRespuestaChart = new Chart(ctxTiempoRespuesta, {

			type: 'pie',

			data: {

				labels: ['En tiempo', 'Desfasado'],

				datasets: [{

					label: 'Porcentaje',

					data: [percentageEnTiempo.toFixed(2),

						percentageDesfasada.toFixed(2)
					],

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

					datalabels: {

						anchor: 'end'

					}

				}]

			},

			options: {

				plugins: {

					datalabels: optionpluginpercentage

				},

				layout: {

					padding: paddinglayout

				}

			}

		});

	}



	function ChartFacturaGlobal(Chartlabels, ChartData) {

		var canvas = document.getElementById('facturacionGlobalChart');

		canvas.style.cssText = 'width: 400px; height: 150px;';

		var ctxfacturacionGlobal = document.getElementById('facturacionGlobalChart').getContext('2d');

		var facturacionGlobalChart = new Chart(ctxfacturacionGlobal, {

			type: 'bar',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: '$ ',

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1

				}]

			},

			options: {

				scales: {

					yAxes: [{

						ticks: {

							beginAtZero: true,

							userCallback: function(value, index, values) {

								// Convert the number to a string and splite the string every 3 charaters from the end

								value = value.toString();

								value = value.split(/(?=(?:...)*$)/);



								// Convert the array to a string and format the output

								value = value.join(',');

								return '$' + value;

							}

						}

					}]

				},

				legend: {

					display: false

				},

				plugins: {

					datalabels: optionpluginmoneda

				}

			}

		});

	}

	function ChartFacturaxServicio(Chartlabels, ChartData) {

		var canvas = document.getElementById('factServicioChart');

		canvas.style.cssText = 'width: 400px; height: 150px;';

		var ctxFactServicio = document.getElementById('factServicioChart').getContext('2d');

		var factServicioChart = new Chart(ctxFactServicio, {

			type: 'doughnut',

			data: {

				labels: Chartlabels,

				datasets: [{

					label: ['%'],

					data: ChartData,

					backgroundColor: colors,

					borderColor: colors,

					borderWidth: 1,

					datalabels: {

						anchor: 'end'

					}

				}]

			},

			options: {

				plugins: {

					datalabels: optionpluginpercentage

				},

				layout: {

					padding: paddinglayout

				}

			}

		});

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

		let now = new Date();

		let dateinitial = -1;

		let datenow = -1;

		$.ajax({

			type: "GET",

			url: "{{ url('getDataChart') }}" + "/-1/" + dateinitial + "/" + datenow,

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

		var tiposervicios = [];

		var totalporservicios = [];

		var tipoprioridad = [];

		var totalprioridadservicios = [];

		var modalidadservicios = [];

		var totalmodalidadservicios = [];

		var estatus_proceso = [];

		var totalestatus_proceso = [];

		var dictamen = [];

		var totaldictamen = [];

		//var dictamenIncidencias = [];

		//var totaldictamenIncidencias = [];

		//var facturacionglobal = [];

		//var montofacturacionglobal = [];

		//var facturacion_x_servicios = [];

		//var montofacturacion_x_servicios = [];



		response.totalporservicio.forEach(element => tiposervicios.push(element.Descripcion));

		response.totalporservicio.forEach(element => totalporservicios.push(element.Total));

		response.prioridadservicios.forEach(element => totalprioridadservicios.push(element.Total));

		response.prioridadservicios.forEach(element => tipoprioridad.push(element.Descripcion));

		response.modalidadservicios.forEach(

			function(element) {

				totalmodalidadservicios.push(element.Total);

			});

		var totalC = 0;
		var totalP = 0;
		var totalCe = 0;

		response.modalidadservicios.forEach(element => modalidadservicios.push(element.Descripcion));

		response.totalestatus_proceso.forEach(function(element) {


			if (element.Estatus == "Asignada" || element.Estatus == "Creada" || element.Estatus == "Pendiente" || element.Estatus == "Programada") {
				totalP += parseInt(element.Total);
			} else if (element.Estatus == "Cancelado") {
				totalC += parseInt(element.Total);
			} else {
				totalCe += parseInt(element.Total);
			}



		});


		estatus_proceso.push("Proceso","Cerrados", "Cancelados", );

		totalestatus_proceso.push(totalP,totalCe, totalC );

		response.dictamen.forEach(function(element) {

			if(element.Estatus!=""){
				dictamen.push(element.Estatus);

				totaldictamen.push(element.Total);
			}
			

		});

		/*response.dictamenIncidencias.forEach(function(element) {

			dictamenIncidencias.push(element.EstatusIncidencias);

			totaldictamenIncidencias.push(element.Total);

		});*/

		/*response.facturacionglobal.forEach(function(element) {

			facturacionglobal.push(element.EstatusCobro);

			montofacturacionglobal.push(element.Total);

		});*/

		/*response.facturacion_x_servicios.forEach(function(element) {

			facturacion_x_servicios.push(element.Descripcion);

			montofacturacion_x_servicios.push(element.MontoFinal);

		});*/

		ChartSrvSolicitados(tiposervicios, totalporservicios);

		ChartSrvSolicitadosPercentage(tiposervicios, percentage(totalporservicios));

		ChartTipoServicio(tipoprioridad, totalprioridadservicios);

		ChartModalidad(modalidadservicios, percentage(totalmodalidadservicios));

		ChartEstatusPreceso(estatus_proceso, totalestatus_proceso);

		ChartDictamen(dictamen, totaldictamen);

		//ChartDictamenIncidencias(dictamenIncidencias, totaldictamenIncidencias);

		//ChartFacturaGlobal(facturacionglobal, montofacturacionglobal);

		//ChartFacturaxServicio(facturacion_x_servicios, percentage(montofacturacion_x_servicios));

		ChartRespuestaAgenda(response.respuestaAgenda.Desfasada, response.respuestaAgenda.d1, response.respuestaAgenda.d2, response.respuestaAgenda.d3);

		var suma = response.respuestaAgenda.d1 + response.respuestaAgenda.d2 + response.respuestaAgenda.d3 
		ChartRespuestaISL(response.respuestaISL.Desfasada, response.respuestaISL.d1);

		ChartRespuesta(response.TiempoRespuesta.Desfasada,response.TiempoRespuesta.d1);

	}

	//Funcion para hacer el cambio en los recuadros

	function DrawPictureHigher(Totalservicio, Totalporservicio, Prioridadservicios, Tipos, Modalidadservicios) {

		var totalporservicio;

		var prioridad;

		var tipo;

		var modalidadservicios;



		$("#total_clientes_cuadro").html(Totalservicio);

		Totalporservicio.forEach(function(element) {

			totalporservicio = totalporservicio + '<tr><th>' + element.Descripcion + '</th><th class="text-color-amarillo">' + element.Total + '</th></tr>';

		});

		Prioridadservicios.forEach(function(element) {

			prioridad = prioridad + '<tr><th>' + element.Descripcion + '</th><th class="text-color-amarillo">' + element.Total + '</th></tr>';

		});

		Tipos.forEach(function(element) {

			tipo = tipo + '<tr><th>' + element.Tipos + '</th><th class="text-color-amarillo">' + element.Total + '</th></tr>';

		});

		Modalidadservicios.forEach(function(element) {

			modalidadservicios = modalidadservicios + '<tr><th>' + element.Descripcion + '</th><th class="text-color-amarillo">' + element.Total + '</th></tr>';

		});

		$("#TiposServicios").html(totalporservicio);

		$("#Prioridad").html(prioridad);

		$("#Tipo").html(tipo);

		$("#Modalidad").html(modalidadservicios);

	}

	function DrawClients(ResponseClients) {

		var clients

		$('#bodyTableClientes').html('');

		if (ResponseClients.length == 0) {

			$('#bodyTableClientes').html('');

		} else {

			ResponseClients.forEach(function(element) {

				clients = clients + '<tr><td style="display:none">' + element.IdCliente + '</td><td><span class="hoveroption">' + element.Nombre + '</span></td></tr>';

			});



			$('#bodyTableClientes').append(clients);


		}

	}

	function DrawKindClients(ResponseKindClients) {

		var Kindclients

		$('#bodyTableTipoCliente').html('');

		if (ResponseKindClients.length == 1) {

			$('#bodyTableTipoCliente').html('');

		} else {

			ResponseKindClients.forEach(function(element) {

				Kindclients = Kindclients + '<tr><td style="display:none">' + element.TipoCliente + '</td><td><span class="hoveroption">' + element.TipoCliente + '</span></td></tr>';

			});



			$('#bodyTableTipoCliente').append(Kindclients);



		}

	}

	function DrawInvestigator(ResponseInvestigadores) {

		var investigadores;

		$('#bodyTableInvestigador').html('');

		if (ResponseInvestigadores.length == 0) {

			$('#bodyTableInvestigador').html('');

		} else {

			ResponseInvestigadores.forEach(function(element) {

				investigadores = investigadores + '<tr><td style="display:none">' + element.IdEmpleado + '</td><td><span class="hoveroption">' + element.NombreCompleto + '</span></td></tr>';

			});



			$('#bodyTableInvestigador').append(investigadores);

		}



	}

	function DrawAnalist(ResponseAnalist) {

		var analistas;

		$("#bodyTableAnalista").html('');

		if (ResponseAnalist.length > 0) {

			ResponseAnalist.forEach(function(element) {

				analistas = analistas + '<tr><td style="display:none">' + element.IdEmpleado + '</td><td><span class="hoveroption">' + element.NombreCompleto + '</span></td></tr>';

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

	//Funcion para sumar los elementos

	function SumaTotal(numbers) {

		var sumTotal = 0;

		for (i = 0; i < numbers.length; i++) {

			sumTotal = sumTotal + parseInt(numbers[i]);

		}

		return sumTotal;

	}

	//Request de los filtros

	function GetFilterDataByClient(value, DateIni, DateEnd) {

		showNotify("Filtro: ", "Realizando filtro, espere por favor", "");

		$.ajax({

			url: "{{ url('GetDataByClient') }}" + "/" + value + "/" + DateIni + "/" + DateEnd,

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio,

					response.prioridadservicios, response.tipos, response.modalidadservicios);

				DrawInvestigator(response.investigadores);

				DrawAnalist(response.analistas);

				DrawStatusProcess(response.estatus_proceso);

				//charts

				clearcharts();

				DrawGraph(response);

				ChangeColorBtnClearfilter("filter", "clearfilterclient");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetFilterDataByInvestigator(value, DateIni, DateEnd) {

		showNotify("Filtro: ", "Realizando filtro, espere por favor", "");

		$.ajax({

			url: "{{ url('GetDataByInvestigator') }}" + "/" + value + "/" + DateIni + "/" + DateEnd,

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio,

					response.prioridadservicios, response.tipos, response.modalidadservicios);

				DrawClients(response.clientes);

				DrawAnalist(response.analistas);

				DrawStatusProcess(response.estatus_proceso);

				//DrawKindClients(response.tiposClientes)

				//charts

				clearcharts();

				DrawGraph(response);

				ChangeColorBtnClearfilter("filter", "clearfilterInvestigator");

			},

			error: function() {



			}

		});

	}

	function GetFilterDataByAnalist(value, DateIni, DateEnd) {

		showNotify("Filtro: ", "Realizando filtro, espere por favor", "");

		$.ajax({

			url: "{{ url('GetDataByAnalist') }}" + "/" + value + "/" + DateIni + "/" + DateEnd,

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio,

					response.prioridadservicios, response.tipos, response.modalidadservicios);

				DrawClients(response.clientes);

				DrawInvestigator(response.investigadores);

				DrawStatusProcess(response.estatus_proceso);

				//DrawKindClients(response.tiposClientes)

				//charts

				clearcharts();

				DrawGraph(response);

				ChangeColorBtnClearfilter("filter", "clearfilterAnalist");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetFilterDataByPeriod(DateIni, DateEnd) {

		showNotify("Filtro: ", "Realizando filtro, espere por favor", "");

		$.ajax({

			url: "{{ url('GetDataByPeriod') }}" + "/" + DateIni + "/" + DateEnd,

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio,

					response.prioridadservicios, response.tipos, response.modalidadservicios);

				DrawClients(response.clientes);

				DrawInvestigator(response.investigadores);

				DrawAnalist(response.analistas);

				DrawStatusProcess(response.estatus_proceso);

				// DrawKindClients(response.tiposClientes)

				//charts

				clearcharts();

				DrawGraph(response);

				ChangeColorBtnClearfilter("filter", "clearfilterPeriodo");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetFilterDataByTypeClient(value, DateIni, DateEnd) {

		showNotify("Filtro: ", "Realizando filtro, espere por favor", "");

		$.ajax({

			url: "{{ url('GetDataByTypeClient') }}" + "/" + value + "/" + DateIni + "/" + DateEnd,

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio,

					response.prioridadservicios, response.tipos, response.modalidadservicios);

				DrawClients(response.clientes);

				DrawInvestigator(response.investigadores);

				DrawAnalist(response.analistas);

				DrawStatusProcess(response.estatus_proceso);

				//DrawKindClients(response.tiposClientes)

				//charts

				clearcharts();

				DrawGraph(response);

				ChangeColorBtnClearfilter("filter", "clearfilterTipoclient");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetFilterDataByStatusProcess(value, DateIni, DateEnd) {

		showNotify("Filtro: ", "Realizando filtro, espere por favor", "");

		$.ajax({

			url: "{{ url('GetDataByStatusProcess') }}" + "/" + value + "/" + DateIni + "/" + DateEnd,

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio,

					response.prioridadservicios, response.tipos, response.modalidadservicios);

				DrawClients(response.clientes);

				DrawInvestigator(response.investigadores);

				DrawAnalist(response.analistas);

				//DrawKindClients(response.tiposClientes)

				//charts

				clearcharts();

				DrawGraph(response);

				ChangeColorBtnClearfilter("filter", "clearfilterPeriodo");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	//Request clear filtros

	function GetClearFilterClient() {

		showNotify("Filtro: ", "Limpiando filtro clientes, espere por favor", "");

		$.ajax({

			url: "{{ url('GetClients') }}",

			type: "GET",

			success: function(response) {

				DrawClients(response.clientes);

				ChangeColorBtnClearfilter("clear", "clearfilterclient");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetClearFilterInvestigator() {

		showNotify("Filtro: ", "Limpiando filtro investigador, espere por favor", "");

		$.ajax({

			url: "{{ url('GetInvestigators') }}",

			type: "GET",

			success: function(response) {

				DrawInvestigator(response.investigadores);

				ChangeColorBtnClearfilter("clear", "clearfilterInvestigator");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetClearFilterAnalist() {

		showNotify("Filtro: ", "Limpiando filtro analistas, espere por favor", "");

		$.ajax({

			url: "{{ url('GetAnalists') }}",

			type: "GET",

			success: function(response) {

				DrawAnalist(response.analistas);

				ChangeColorBtnClearfilter("clear", "clearfilterAnalist");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetClearFilterTypeClients() {

		showNotify("Filtro: ", "Limpiando filtro tipo clientes, espere por favor", "");

		$.ajax({

			url: "{{ url('GetTypeClients') }}",

			type: "GET",

			success: function(response) {

				//DrawKindClients(response.tiposClientes);

				ChangeColorBtnClearfilter("clear", "clearfilterTipoclient");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetClearStatusProcess() {

		showNotify("Filtro: ", "Limpiando filtro Estatus del proceso, espere por favor", "");

		$.ajax({

			url: "{{ url('GetStatusProcess') }}",

			type: "GET",

			success: function(response) {

				DrawStatusProcess(response.estatus_proceso);

				ChangeColorBtnClearfilter("clear", "clearfilterEstatus");

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	function GetClearPictureHigher() {

		$.ajax({

			url: "{{ url('GetBoxHeader') }}",

			type: "GET",

			success: function(response) {

				DrawPictureHigher(response.Totalservicio, response.totalporservicio, response.prioridadservicios,

					response.tipos, response.modalidadservicios);

			},

			error: function() {

				showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

			}

		});

	}

	//Funcion para destruir las graficas

	function clearcharts() {

		$("#container-solicitadosChart").html('');

		$('#container-solicitadosChart').append('<canvas id="solicitadosChart" ></canvas>');

		$("#container-procesoChart").html('');

		$('#container-procesoChart').append('<canvas id="procesoChart"></canvas>');

		$("#container-clientesChart").html('');

		$('#container-clientesChart').append('<canvas id="clientesChart"></canvas>');

		$("#container-tipoServicioChart").html('');

		$('#container-tipoServicioChart').append('<canvas id="tipoServicioChart"></canvas>');

		$("#container-modalidadServicioChart").html('');

		$('#container-modalidadServicioChart').append('<canvas id="modalidadServicioChart"></canvas>');

		$("#container-dictamenChart").html('');

		$('#container-dictamenChart').append('<canvas id="dictamenChart"></canvas>');

		$("#container-porcentajeDictamenLChart").html('');

		$('#container-porcentajeDictamenLChart').append('<canvas id="porcentajeDictamenLChart"></canvas>');

		$("#container-respuestaAgendaChart").html('');

		$('#container-respuestaAgendaChart').append('<canvas id="respuestaAgendaChart"></canvas>');

		$("#container-tiempoISLChart").html('');

		$('#container-tiempoISLChart').append('<canvas id="tiempoISLChart"></canvas>');

		$("#container-tiempoRespuestaChart").html('');

		$('#container-tiempoRespuestaChart').append('<canvas id="tiempoRespuestaChart"></canvas>');

		$("#container-facturacionGlobalChart").html('');

		$('#container-facturacionGlobalChart').append('<canvas id="facturacionGlobalChart"></canvas>');

		$("#container-factServicioChart").html('');

		$('#container-factServicioChart').append('<canvas id="factServicioChart"></canvas>');

	}

	//Funcion para change color de boton limpiar filtro

	function ChangeColorBtnClearfilter(type, nameId) {

		if (type == "filter") {

			if ($("#" + `${nameId}`).hasClass('btn-success')) {

				$("#" + `${nameId}`).removeClass('btn-success');

				$("#" + `${nameId}`).addClass('btn-danger');

			}

		}

		if (type == "clear") {

			if ($("#" + `${nameId}`).hasClass('btn-danger')) {

				$("#" + `${nameId}`).removeClass('btn-danger');

				$("#" + `${nameId}`).addClass('btn-success');

			}

		}

	}

	//Eventos para realizar los filtros


	$("#btnPeriod").on("click", function() {

		var dateIni = $("#fechainicio").val();

		var dateEnd = $("#fechafin").val();

		for (var i = 1; i <= 4; i++) {
			filtro[i] = $('#IdF' + i).val();
		}

		$.ajax({
			url: "{{ url('Filtros') }}/" + filtro[1] + "/" + filtro[2] + "/" + filtro[3] + "/" + filtro[4] +"/"+ dateIni + "/" + dateEnd,

			type: "GET",

			success: function(response) {
				showNotify("Aplicando Filtro:", "Esperar");
				DrawPictureHigher(response.Totalservicio, response.totalporservicio,
					response.prioridadservicios, response.tipos, response.modalidadservicios);
				console.log(response.modalidadservicios);
				DrawClients(response.clientes);
				DrawInvestigator(response.investigadores);
				DrawAnalist(response.analistas);
				clearcharts();
				DrawGraph(response);
				console.log(dateIni);
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
	for (var j = 1; j <= 4; j++) {
		$('#IdF' + j).on("change", function() {
			for (var i = 1; i <= 4; i++) {
				filtro[i] = $('#IdF' + i).val();
			}
			$.ajax({
				url: "{{ url('Filtros') }}/" + filtro[1] + "/" + filtro[2] + "/" + filtro[3] + "/" + filtro[4] + "/0/0",

				type: "GET",

				success: function(response) {
					showNotify("Aplicando Filtro:", "Esperar");
					DrawPictureHigher(response.Totalservicio, response.totalporservicio,
						response.prioridadservicios, response.tipos, response.modalidadservicios);
					console.log(response.TiempoRespuesta);
					DrawClients(response.clientes);
					DrawInvestigator(response.investigadores);
					DrawAnalist(response.analistas);
					clearcharts();
					DrawGraph(response);
					
					//ChangeColorBtnClearfilter("filter", "clearfilterclient");

				},

				error: function() {

					showNotify("Filtro error: ", "Ocurrió un error al obtener los datos.", "danger");

				}
			});
			console.log(filtro);
		});
	}


	function pdfs (){
		var canvas = document.getElementById("solicitadosChart");
		var canvas1 = document.getElementById('procesoChart');
		var canvas2 = document.getElementById('tipoServicioChart');
		var canvas3 = document.getElementById('modalidadServicioChart');
		var canvas4 = document.getElementById('dictamenChart');
		var canvas6 = document.getElementById('respuestaAgendaChart');
		var canvas7 = document.getElementById('tiempoISLChart');
		var canvas8 = document.getElementById('tiempoRespuestaChart');

		var dataURL = canvas.toDataURL(1);
		var dataURL1 = canvas1.toDataURL(1);
		var dataURL2 = canvas2.toDataURL(1);
		var dataURL3 = canvas3.toDataURL(1);
		var dataURL4 = canvas4.toDataURL(1);
		var dataURL6 = canvas6.toDataURL(1);
		var dataURL7 = canvas7.toDataURL(1);
		var dataURL8 = canvas8.toDataURL(1);
		
		
		
		
		
		var cli = document.getElementById("bodyTableClientes");
		var variable=cli.getElementsByTagName("span");
		var clientes = [];
		for(var i = 0; i< variable.length; i++){
			clientes[i] = variable[i].innerHTML;
		}

		var dateIni = $("#fechainicio").val();
		var dateEnd = $("#fechafin").val();

		
		@if(Auth::user()->tipo=="c")
			var doc = new jsPDF( {orientation: "lanscape", unit: "in"});
			
			//Encabezado
			doc.addImage("{{$logo}}", 'JPEG', 0.3, 0.2, 1.7, 1.3);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(20);
			doc.text("Estudio Socioeconómico", 4.4, 0.9);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(2.1, 1.1, 9.1, 0.1, 'F');
			//Encabezado Cliente
			doc.setFontType('bold');
			doc.setFontSize(11);		
			doc.text("Cliente:", 3.3, 1.5);
			doc.setFontType('normal');			
			doc.text(clientes[0],3.9,1.5);
			//Periodo
			doc.setFontType('bold');
			doc.text("Período: ", 8.2, 1.5);
			doc.setFontType('normal');
			doc.text(dateIni + " a " + dateEnd, 8.9, 1.5);
			
			//cuadro total servicios 
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(0.4, 1.9, 2.3, 0.3, 'F');
			
			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Total de Servicios",0.8, 2.1);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);
			var Servicio = document.getElementById("TiposServicios");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 2.0;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(0.4, 2.2, 2.3, con-1.7, 'F');
			con = 2.2;
			doc.text(document.getElementById("total_clientes_cuadro").innerHTML,1.5,con+=0.2);
			
			var espacio = con-0.2;
			
			//cuadro servicios 
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(2.9, 1.9, 1.8, 0.3, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Servicios",3.4, 2.1);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("TiposServicios");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 2.1;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=0.2;
				}
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(2.9, 2.2, 1.8, con-1.9, 'F');
			con = 2.2;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],3,con+=0.2);
				}
			}

			

			//cuadro prioridad 
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(4.9, 1.9, 1.8, 0.3, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Prioridad",5.4, 2.1);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("Prioridad");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 2.1;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=0.2;
				}
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(4.9, 2.2, 1.8, con-1.9, 'F');
			con = 2.2;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],5.1,con+=0.2);
				}
			}

			//cuadro tipo
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(6.9, 1.9, 1.8, 0.3, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Tipo",7.6, 2.1);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("Tipo");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 2.1;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=0.2;
				}
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(6.9, 2.2, 1.8, con-1.9, 'F');
			con = 2.2;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],7,con+=0.2);
				}
			}

			

			//cuadro modalidad
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(8.9, 1.9, 1.8, 0.3, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Modalidad",9.5, 2.1);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("Modalidad");
			var Serv=Servicio.getElementsByTagName("th");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 2.1;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					con+=0.2;
				}
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(8.9, 2.2, 1.8, con-1.9, 'F');
			con = 2.2;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],9,con+=0.2);
				}
			}

			//cuadro Analistas
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(0.4, espacio+0.7, 2.3, 0.3, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Analistas",1.1, espacio+0.9);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("bodyTableAnalista");
			var Serv=Servicio.getElementsByTagName("span");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 2.2;
			for(var i = 0; i< serv.length; i++){
					con+=0.2;
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(0.4, espacio+1.0, 2.3, con-1.9, 'F');
			con = espacio+1.0;
			for(var i = 0; i< serv.length; i++){
					doc.text(serv[i],0.5, con+=0.2);
			}

			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.text("Servicios Solicitados",0.9,5.1)
			doc.addImage(dataURL, 'JPEG', 0.4, 5.3, 3, 2.4);
			doc.text("Prioridad",5.5,5.1)
			doc.addImage(dataURL2, 'JPEG', 4.2, 5.3,3, 2.4);
			doc.text("Modalidad del Servicio",8.2,5.1)
			doc.addImage(dataURL3, 'JPEG', 8, 5.3, 2.4, 2.4);
			
			
			doc.addPage();
			//Encabezado
			doc.addImage("{{$logo}}", 'JPEG', 0.3, 0.2, 1.7, 1.3);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(20);
			doc.text("Estudio Socioeconómico", 4.4, 0.9);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(2.1, 1.1, 9.1, 0.1, 'F');
			//Encabezado Cliente
			doc.setFontType('bold');
			doc.setFontSize(11);		
			doc.text("Cliente:", 3.3, 1.5);
			doc.setFontType('normal');			
			doc.text(clientes[0],3.9,1.5);
			//Periodo
			doc.setFontType('bold');
			doc.text("Período: ", 8.2, 1.5);
			doc.setFontType('normal');
			doc.text(dateIni + " a " + dateEnd, 8.9, 1.5);

			doc.setFontType('bold');
			doc.text("Estatus del Proceso",2.2,2)
			doc.addImage(dataURL1, 'JPEG', 0.6, 2.2, 4.3, 2.4);
			doc.text("Dictamen",8.2,2)
			doc.addImage(dataURL4, 'JPEG', 6.2, 2.2, 4.3, 2.4);
			doc.text("Tiempo de Respuesta Agenda",1.8,5.4)
			doc.addImage(dataURL6, 'JPEG', 1.2, 5.6, 3, 2.4);
			doc.text("Tiempo de Respuesta",7.7,5.4)
			doc.addImage(dataURL8, 'JPEG', 5.5, 5.6, 5.9, 2.3);
	

		@else

		var doc = new jsPDF();
			
			//Encabezado
			doc.addImage("{{$logo}}", 'JPEG', 10, 5, 45,30);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(17);
			doc.text("Estudio Socioeconómico", 90, 20);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(60, 22 , 142, 1, 'F');

			//Periodo
			doc.setFontType('bold');
			doc.setFontSize(9);
			doc.text("Período: ", 148, 27);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.text(dateIni + " a " + dateEnd, 163, 27);
			
			//cuadro total servicios 
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, 40, 45, 7, 'F');
			
			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Total de Servicios",14, 45);
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
			doc.rect(10, 47, 45, con-38, 'F');
			con = 45;
			doc.text(document.getElementById("total_clientes_cuadro").innerHTML,31,con+=7);
			
			var espacio = con + 15;
			
			//cuadro servicios 
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, espacio , 45, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Servicios",22, espacio + 5);
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
			doc.rect(10, espacio + 7, 45, con, 'F');
			con = espacio + 6;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],13,con+=6);
				}
			}
			espacio = con + 17;
			

			//cuadro prioridad 
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, espacio, 45, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Prioridad",23, espacio + 5);
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
			doc.rect(10, espacio + 7 , 45, con, 'F');
			con = espacio + 6;
			for(var i = 0; i < serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],13,con+=6);
				}
			}

			espacio = con + 17;
			

			//cuadro tipo
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, espacio , 45, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Tipo", 27, espacio + 5 );
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			po = con; 
			var Servicio = document.getElementById("Tipo");
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
			doc.rect(10, espacio + 7, 45, con, 'F');
			con = espacio + 6;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],13, con+=6);
				}
			}

			espacio = con + 17;
			
			//cuadro modalidad
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(10, espacio , 45, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Modalidad",20, espacio+5);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("Modalidad");
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
			con+=2;
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(10, espacio+7 , 45, con, 'F');
			con = espacio + 6;
			for(var i = 0; i< serv.length; i++){
				if(i % 2 == 0){
					doc.text(serv[i]+": "+serv[i+1],13,con+=6);
				}
			}

			//cuadro clientes
			doc.setDrawColor(0);
			doc.setFillColor(118, 113, 112);
			doc.rect(65, 40, 64, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Clientes",89, 45);
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
			doc.rect(65,47 , 64, con-45, 'F');
			con = 47;
			for(var i = 0; i< serv.length; i++){
					doc.text(serv[i],70, con+=5);
			}
			espacio = con + 10;
			//cuadro Analista
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(65,espacio, 64, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Analista",89,espacio+5);
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
			doc.rect(65,espacio+7, 64, con, 'F');
			con =espacio+6;
			for(var i = 0; i< serv.length; i++){
				if(serv[i] != "" && serv[i]!=null)
					doc.text(serv[i],68, con+=5);
			}

			//cuadro Investigador
			doc.setDrawColor(0);
			doc.setFillColor(116, 113, 112);
			doc.rect(139,40, 64, 7, 'F');
			doc.setFontType('bold');

			doc.setFontSize(12);
			doc.setTextColor(255,255,255);
			doc.text("Investigador",159, 45);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.setTextColor(0,0,0);

			var Servicio = document.getElementById("bodyTableInvestigador");
			var Serv=Servicio.getElementsByTagName("span");
			var serv = [];
			for(var i = 0; i< Serv.length; i++){
				serv[i] = Serv[i].innerHTML;
			}
			con = 47;
			for(var i = 0; i< serv.length; i++){
					con+=5;
			}
			doc.setDrawColor(0);
			doc.setFillColor(232, 231, 231);
			doc.rect(139,47 , 64, con-45, 'F');
			con = 47;
			for(var i = 0; i< serv.length; i++){
				if(serv[i] != "" && serv[i]!=null && serv[i]!="null")
					doc.text(serv[i],143, con+=5);
			}

			doc.addPage();
			//Encabezado
			doc.addImage("{{$logo}}", 'JPEG', 10, 5, 45,30);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(17);
			doc.text("Estudio Socioeconómico", 90, 20);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(60, 22 , 142, 1, 'F');

			//Periodo
			doc.setFontType('bold');
			doc.setFontSize(9);
			doc.text("Período: ", 148, 27);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.text(dateIni + " a " + dateEnd, 163, 27);

			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.text("Servicios Solicitados",33,45)
			doc.addImage(dataURL, 'JPEG', 15, 48 ,80, 70);
			doc.text("Prioridad",156,45)
			doc.addImage(dataURL2, 'JPEG', 120, 48,80, 70);
			doc.text("Modalidad del Servicio",82,128)
			doc.addImage(dataURL3, 'JPEG', 74, 131, 60, 60);
			doc.setFontType('bold');
			doc.text("Estatus del Proceso",37,200)
			doc.addImage(dataURL1, 'JPEG', 15, 203,80,70);
			doc.text("Dictamen",152,200)
			doc.addImage(dataURL4, 'JPEG', 120, 203, 80, 70);

			

			doc.addPage();
			//Encabezado
			doc.addImage("{{$logo}}", 'JPEG', 10, 5, 45,30);
			doc.setFont("helvetica");
			doc.setFontType('bold');
			doc.setFontSize(17);
			doc.text("Estudio Socioeconómico", 90, 20);
			doc.setDrawColor(0);
			doc.setFillColor(247,140,30);
			doc.rect(60, 22 , 142, 1, 'F');

			//Periodo
			doc.setFontType('bold');
			doc.setFontSize(9);
			doc.text("Período: ", 148, 27);
			doc.setFontType('normal');
			doc.setFontSize(9);
			doc.text(dateIni + " a " + dateEnd, 163, 27);

			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.text("Tiempo de Respuesta Agenda",85,47)
			doc.addImage(dataURL6, 'JPEG', 35, 49, 140, 70);
			doc.text("Tiempo de Respuesta ISL",80,135)
			doc.addImage(dataURL7, 'JPEG', 40, 137, 132,60);
			doc.text("Tiempo de Respuesta",83,215)
			doc.addImage(dataURL8, 'JPEG',40, 217,  132,60);
		@endif

		
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
		doc.addImage(dataURL, 'JPEG', 0.4, 5, 3.5, 3);
		doc.text("Prioridad",4.7,5)
		doc.addImage(dataURL2, 'JPEG', 4.5, 5, 3.5, 3);
		doc.text("Modalidad del Servicio",8.3,5)
		doc.addImage(dataURL3, 'JPEG', 8.1, 5, 3.5, 3);
		doc.addPage();
		doc.text("Estatus del Proceso",0.6,1)
		doc.addImage(dataURL1, 'JPEG', 0.4, 1.2, 3.5, 3);
		doc.text("Dictamen",4.7,1)
		doc.addImage(dataURL4, 'JPEG', 4.5, 1.2, 3.5, 3);
		doc.text("Tiempo de Respuesta Agenda",8.3,1)
		doc.addImage(dataURL6, 'JPEG', 8.1, 1.2, 3.5, 3);
		
		@if(Auth::user()->tipo!="c")
			doc.text("Tiempo de Respuesta ISL",0.6,5)
			doc.addImage(dataURL7, 'JPEG', 0.4, 5, 3.5, 3);
		@endif
		doc.text("Tiempo de Respuesta",4.7,5)
		doc.addImage(dataURL8, 'JPEG', 4.5, 5, 3.5, 3);
		@endif


		@if(Auth::user()->tipo!="c")

		doc.addPage();
		doc.setFontType('bold');
		doc.setFontSize(12);
		doc.text("Servicios Solicitados",0.6,1)
		doc.addImage(dataURL, 'JPEG', 0.4, 1.2, 3.5, 3);
		doc.text("Prioridad",4.7,1)
		doc.addImage(dataURL2, 'JPEG', 4.5, 1.2, 3.5, 3);
		doc.text("Modalidad del Servicio",8.3,1)
		doc.addImage(dataURL3, 'JPEG', 8.1, 1.2, 3.5, 3);
		doc.text("Estatus del Proceso",0.6,5)
		doc.addImage(dataURL1, 'JPEG', 0.4, 5.2, 3.5, 3);
		doc.text("Dictamen",4.7,5)
		doc.addImage(dataURL4, 'JPEG', 4.5, 5.2, 3.5, 3);
		doc.text("Tiempo de Respuesta Agenda",8.3,5)
		doc.addImage(dataURL6, 'JPEG', 8.1, 5.2, 3.5, 3);
		doc.addPage();
		
		
		doc.text("Tiempo de Respuesta ISL",0.6,1)
		doc.addImage(dataURL7, 'JPEG', 0.4, 1.2, 3.5, 3);
		
		doc.text("Tiempo de Respuesta",4.7,1)
		doc.addImage(dataURL8, 'JPEG', 4.5, 1.2, 3.5, 3);
		@endif
		*/
		

		
		doc.save('Reporte.pdf');  
		
	}
</script>







@endsection