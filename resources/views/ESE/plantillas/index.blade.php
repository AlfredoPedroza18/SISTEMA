@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">ESE</a></li>		
		<li><a href="javascript:;">Plantillas</a></li>		
	</ol>

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
					<h4 class="panel-title text-center">Listado de Plantillas</h4>
				</div>
				<div class="panel-body">

					@permission('ese.plantillas.nueva')
					<div class="row">
						<div class="col-md-3 col-md-offset-9">
							<a 	href="javascript:;" 
								class="btn btn-inverse btn-icon btn-circle btn-lg" 
								data-toggle="modal" 
								data-target="#plantillasSeleccion"
								data-placement="top" 
								title="" 
								data-original-title="Nueva Plantilla">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</a>
							<label>Nuevo Plantilla</label>
						</div>
					</div>
					@endpermission
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
										<th class="text-center">Nombre</th>
										<th class="text-center">Fecha</th>
										<th class="text-center">Tipo</th>
										<th class="text-center">Comentario</th>
										<th class="text-center">Archivo</th>
														            							            		
									</tr>
								</thead>
								<tfoot>

									<tr>
										<th colspan="5" class="text-center">Plantillas</th>
									</tr>
								</tfoot>
								<tbody>
								@foreach( $plantillas as $plantilla )
									<tr>
										<td>{{ $plantilla->nombre }}</td>
										<td class="text-center">{{ $plantilla->fecha_alta }}</td>
										<td class="text-center">{{ $plantilla->plantilla->tipo }}</td>
										<td>{{ $plantilla->descripcion }}</td>
										<td class="text-center">
											{{--<a href="javascript:;" class="btn btn-circle btn-danger"> <i class="fa fa-file-pdf-o"></i> </a>--}}
											<a href="{{ route('sig-erp-ese::estudio-ese-plantillas.edit',['id' => $plantilla->plantilla->id]) }}?formato={{ $plantilla->id }}" class="btn btn-circle btn-info btn-xs"> <i class="fa fa-edit"></i> </a>
										</td>      							            		
										
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

@include('ESE.plantillas.modal-plantillas')
@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')




<script type="text/javascript">

	$(document).ready(function(){
		iniciarTabla();
		$('#modal-message-template').hide();

		$('[data-toggle="popover"]').popover({
			delay: { "show": 500, "hide": 100 },
			trigger:'focus'

		}); 

		$('#btn-create-template').click(function( event ){
			
			event.preventDefault();
			
			template = $('#select-template').val();
			if( template == '-1' )
			{
				$('#modal-message-template').show();
			}else{
				$('#frm-create-template').submit();
				
			}
			
		});




	});
	var iniciarTabla = function(){
		var data_table =$("#data-table").DataTable({
			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'excelHtml5',
				title: 'Listado de Plantillas',
				exportOptions: {
					columns: [ 0, 1, 2 ]
				}         
			},
			{
				extend: 'pdfHtml5',
				title: 'Listado de Plantillas',
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
				title: 'Listado de Plantillas',
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
			},
			/* "footerCallback": function ( row, data, start, end, display ) {
			var api = this.api(), data;

			// Remove the formatting to get integer data for summation
			var intVal = function ( i ) {
			return typeof i === 'string' ?
			i.replace(/[\$,]/g, '')*1 :
			typeof i === 'number' ?
			i : 0;
			};

			// Total over all pages
			total = api
			.column( 2 )
			.data()
			.reduce( function (a, b) {
			return intVal(a) + intVal(b);
			}, 0 );

			// Total over this page
			pageTotal = api
			.column( 2, { page: 'current'} )
			.data()
			.reduce( function (a, b) {
			return intVal(a) + intVal(b);
			}, 0 );

			// Update footer
			$( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
			$('#total-cotizaciones-reportes').html('$ '+number_format(total,2));

			}*/

		} );
	}
</script>

@endsection