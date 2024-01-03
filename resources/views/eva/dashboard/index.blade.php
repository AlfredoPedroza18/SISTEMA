
@extends('layouts.master')

@section('section')

<!-- begin #content agenda -->
     

		<div id="content" class="content">

			<!-- begin breadcrumb -->
			<ol class="breadcrumb ">
				<li>{{ link_to('home', $title = 'Módulos', $parameters = array(), $attributes = array()) }}</li>
				<li class="active">ESE-Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header text-center">DASHBOARD<small></small></h1>
			<!-- end page-header -->
			<!-- begin row -->
				 <div class="row">
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-md-offset-2 col-sm-6">
			        <div class="widget widget-stats bg-purple">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>
			            <div class="stats-title">Cerrados en el mes</div>
			            <div class="stats-number" id="total_clientes_cuadro">{{ $estudios_cerrados->count() }}</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 76.3%;"></div>
                        </div>
                        <div class="stats-desc">
                         <label class="mes_actual stats-desc"></label> 
                        </div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-black">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>
			            <div class="stats-title">En proceso</div>
			            <div class="stats-number" id="total_prospectos">{{ $estudios_proceso->count() }}</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 54.9%;"></div>
                        </div>
                        <div class="stats-desc">
                        	<label class="mes_actual stats-desc"></label> 
                       	</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-aqua">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
			            <div class="stats-title">Facturación del mes</div>
			            <div class="stats-number" id="total_porcentaje_cuadro">$ {{ number_format($estudios_facturar->sum('total'), 2, '.', '') }}</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 40.5%;"></div>
                        </div>
                        <div class="stats-desc">
                        	<label class="mes_actual stats-desc">	
                        		
                        	</label>
                        </div>
			        </div>
			    </div>
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
							<h4 class="panel-title">Ultimas Solicitudes</h4>
						</div>

						<div class="panel-body table-responsive">
							<table class="table table-bordered" id="data-table-ultimas-solicitudes">
								<thead> 
									<tr>	
										<th>Id Estudio</th>
										<th>Estudio</th>
										<th>Cliente</th>
										<th>Fecha Alta</th>
										<th>Subtotal</th>										
										<th>Total</th>										
										
									</tr>
								</thead>
								<tbody>
                                
                                    @foreach( $estudios_solicitados as $ese_solicitud )
									<tr>
										<td>ESE{{ $ese_solicitud->id }}</td>
										<td>{{ $ese_solicitud->tipoEstudio->tipo_estudio }}</td>
										<td>{{ $ese_solicitud->cliente->nombre_comercial }}</td>
										<td>{{ $ese_solicitud->fecha_ingreso }}</td>
										<td>{{ number_format($ese_solicitud->subtotal, 2, '.', '') }}</td>										
										<td><label class="label label-primary">$ {{ number_format($ese_solicitud->total, 2, '.', '') }}</label></td>

									</tr>
									@endforeach

						


								</tbody>
							</table>
						</div>
					</div>
				</div><!-- end colspan 6-->
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
							<h4 class="panel-title">Vencidos tipo urgente</h4>
						</div>

						<div class="panel-body table-responsive">
							<table class="table table-bordered" id="data-table-urgentes">
								<thead> 
									<tr>	
										<th>Id Estudio</th>
										<th>Estudio</th>
										<th>Cliente</th>
										<th>Fecha Inicio</th>
										<th>Fecha Finaliza</th>
										<th>Subtotal</th>										
										<th>Total</th>										
										
									</tr>
								</thead>
								<tbody>
                                
                                    @foreach( $estudios_urgentes as $ese_solicitud )
									<tr class="{{ $ese_solicitud->isOutTime() ? 'danger':'' }}">
										<td>ESE{{ $ese_solicitud->id }}</td>
										<td>{{ $ese_solicitud->tipoEstudio->tipo_estudio }}</td>
										<td>{{ $ese_solicitud->cliente->nombre_comercial }}</td>
										<td>{{ $ese_solicitud->fecha_actualizacion }}</td>
										<td>{{ $ese_solicitud->dateFinalize() }}</td>
										<td>{{ number_format($ese_solicitud->subtotal, 2, '.', '') }}</td>										
										<td><label class="label label-primary">$ {{ number_format($ese_solicitud->total, 2, '.', '') }}</label></td>

									</tr>
									@endforeach

						


								</tbody>
							</table>
						</div>
					</div>
				</div><!-- end colspan 6-->



			</div><!-- end rowspan -->
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
							<h4 class="panel-title">Vencidos tipo normal</h4>
						</div>

						<div class="panel-body table-responsive">
							<table class="table table-bordered" id="data-table-normales">
								<thead> 
									<tr>	
										<th>Id Estudio</th>
										<th>Estudio</th>
										<th>Cliente</th>
										<th>Fecha Inicio</th>
										<th>Fecha Finaliza</th>
										<th>Subtotal</th>										
										<th>Total</th>										
										
									</tr>
								</thead>
								<tbody>
                                
                                    @foreach( $estudios_normales as $ese_solicitud )
									<tr  class="{{ $ese_solicitud->isOutTime() ? 'danger':'' }}">
										<td>ESE{{ $ese_solicitud->id }}</td>
										<td>{{ $ese_solicitud->tipoEstudio->tipo_estudio }}</td>
										<td>{{ $ese_solicitud->cliente->nombre_comercial }}</td>
										<td>{{ $ese_solicitud->fecha_actualizacion }}</td>
										<td>{{ $ese_solicitud->dateFinalize() }}</td>
										<td>{{ number_format($ese_solicitud->subtotal, 2, '.', '') }}</td>										
										<td><label class="label label-primary">$ {{ number_format($ese_solicitud->total, 2, '.', '') }}</label></td>

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
		<!-- end #content -->



		
@endsection

@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')
	
		{!! Html::script('assets/js/highcharts.js') !!}
		{!! Html::script('assets/js/exporting.js') !!}

		<script type="text/javascript">

			$(document).ready(function(){
		    	iniciarTabla();

		    	$('[data-toggle="popover"]').popover({
		    		delay: { "show": 500, "hide": 100 },
		    		trigger:'focus'

		    	}); 
		    	
		    		
		    	

		    });
			




			var iniciarTabla = function(){
				var data_table =$("#data-table-ultimas-solicitudes").DataTable({
								dom: 'Bfrtip',
								buttons: [
								{
									extend: 'excelHtml5',
									title: 'Listado de Estudios Socioeconómicos',
									exportOptions: {
										columns: [ 0,1,2,3,4]
									}         
								},
								{
									extend: 'pdfHtml5',
									title: 'Listado de Estudios Socioeconómicos',
									pageSize: 'LEGAL',
									exportOptions: {
										columns: [ 0,1,2,3,4 ]
									}

								},
								{
									extend: 'copyHtml5',
								},
								{
									extend: 'print',
									title: 'Listado de Estudios Socioeconómicos',
									exportOptions: {
										columns: [ 0,1,2,3,4 ]
									}
								}

								],
								responsive: true,
								autoFill: true,

								"paging": true,
								"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
								dom:'Blfrtip' ,
								"drawCallback": function( settings ) {
									$('[data-toggle="popover"]').popover({
										delay: { "show": 500, "hide": 100 },
										trigger:'focus'

									});
								},	                               

					} );


				var data_table_urgentes =$("#data-table-urgentes").DataTable({
								dom: 'Bfrtip',
								buttons: [
								{
									extend: 'excelHtml5',
									title: 'Listado de Estudios Socioeconómicos',
									exportOptions: {
										columns: [ 0,1,2,3,4,5,6]
									}         
								},
								{
									extend: 'pdfHtml5',
									title: 'Listado de Estudios Socioeconómicos',
									pageSize: 'LEGAL',
									exportOptions: {
										columns: [ 0,1,2,3,4,5,6 ]
									}

								},
								{
									extend: 'copyHtml5',
								},
								{
									extend: 'print',
									title: 'Listado de Estudios Socioeconómicos',
									exportOptions: {
										columns: [ 0,1,2,3,4,5,6 ]
									}
								}

								],
								responsive: true,
								autoFill: true,

								"paging": true,
								"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
								dom:'Blfrtip' ,
								"drawCallback": function( settings ) {
									$('[data-toggle="popover"]').popover({
										delay: { "show": 500, "hide": 100 },
										trigger:'focus'

									});
								},	                               

					} );

				var data_table_normales =$("#data-table-normales").DataTable({
								dom: 'Bfrtip',
								buttons: [
								{
									extend: 'excelHtml5',
									title: 'Listado de Estudios Socioeconómicos',
									exportOptions: {
										columns: [ 0,1,2,3,4,5,6]
									}         
								},
								{
									extend: 'pdfHtml5',
									title: 'Listado de Estudios Socioeconómicos',
									pageSize: 'LEGAL',
									exportOptions: {
										columns: [ 0,1,2,3,4,5,6 ]
									}

								},
								{
									extend: 'copyHtml5',
								},
								{
									extend: 'print',
									title: 'Listado de Estudios Socioeconómicos',
									exportOptions: {
										columns: [ 0,1,2,3,4,5,6 ]
									}
								}

								],
								responsive: true,
								autoFill: true,

								"paging": true,
								"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
								dom:'Blfrtip' ,
								"drawCallback": function( settings ) {
									$('[data-toggle="popover"]').popover({
										delay: { "show": 500, "hide": 100 },
										trigger:'focus'

									});
								},	                               

					} );



			}
		</script>
		

		
@endsection