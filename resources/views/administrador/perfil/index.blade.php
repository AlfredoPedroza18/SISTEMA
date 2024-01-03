@extends('layouts.master')

@section('estilos')



{!! Html::style('assets/css/bootstrap-duallistbox.css') !!}
{!! Html::style('assets/permisos/ui.fancytree.min.css') !!}

@endsection
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li><a href="{{ url('modulo/administrador/perfil') }}">Perfiles</a></li>
		
	</ol>
	<!-- begin page-header -->
	<h1 class="page-header text-center">Perfiles <small> </small></h1>
	<!-- end page-header -->
<div class="row">
	<div class="col-md-12 ui-sortable">
		<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title text-center">Listado de Perfiles</h4>
			</div>	
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 col-md-offset-9">
						<a href="{{ url('modulo/administrador/perfil/nuevo') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Perfil">
						<i class="fa fa-tasks fa-1x" aria-hidden="true"></i>
						</a>
						<label>Nuevo Perfil</label>
					</div>
				</div>
						<hr>
						@if (session('success'))
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-{{ session('type') }} fade in m-b-15">
										<strong>Puesto </strong>
										{{ session('success') }}
										<span class="close" data-dismiss="alert">×</span>
									</div>
								</div>
							</div>
						@endif
						<div class="row">
		            	<div class="col-md-12 col-sm-12 col-xs-12">
		            		<table id="data-table" class="display table table-striped table-bordered table-responsive">
			            		<thead>
			            			<tr>
			            				<th>Perfil</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="4" class="text-center">Perfiles</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
									@foreach($Perfil as $per)
									<tr>
										<td>{{ $per->Perfil }}</td>
									</tr>
									@endforeach
			            		</tbody>
		            		</table>
		            	</div>


		            </div>
			</div>	
		</div>
	
	</div>
</div>

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')



<script type="text/javascript">

	$(document).ready(function(){
		//iniciarTabla();

		$('[data-toggle="popover"]').popover({
			delay: { "show": 500, "hide": 100 },
			trigger:'focus'

		}); 

	});
	var iniciarTabla = function(){
		var data_table =$("#data-table").DataTable({
							dom: 'Bfrtip',
							buttons: [
							   {
									extend: 'excelHtml5',
									title: 'Listado de Puestos',
									exportOptions: {
										columns: [ 0, 1, 2 ]
									}         
								},
								{
									extend: 'pdfHtml5',
									title: 'Listado de Puestos',
									pageSize: 'LEGAL',
									exportOptions: {
										columns: [ 0, 1, 2 ]
									}
									
								},
								{
									extend: 'copyHtml5',
								},
								{
									extend: 'print',
									title: 'Listado de Puestos',
									exportOptions: {
										columns: [ 0, 1, 2 ]
									}
								}

							],
							responsive: true,
							autoFill: true,
//                                "scrollY": "350px",
							"paging": true,
							"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
							 dom:'Blfrtip' ,
							"drawCallback": function( settings ) {
								$('[data-toggle="popover"]').popover({
									delay: { "show": 500, "hide": 100 },
									trigger:'focus'

								});
							}
			});
			
	}
</script>

@endsection
