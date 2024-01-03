@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">ESE</a></li>		
		<li><a href="javascript:;">Acta Hechos</a></li>		
	</ol>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<table id="data-table" class="table table-striped table-bordered table-responsive">
								<thead>
									<tr>
										<th class="text-center">Nombre Candidato</th>
										<th class="text-center">Estudio</th>
										<th class="text-center">Prioridad</th>
										<th class="text-center">Estado</th>
										<th class="text-center">Fecha de Eliminación</th>
										<th class="text-center">Archivo</th>
														            							            		
									</tr>
								</thead>
								<tfoot>

									<tr>
										<th colspan="6" class="text-center">Acta de Hechos</th>
									</tr>
								</tfoot>
								<tbody>
							      @foreach($acta as $key=>$value)
									<tr>
										<td>{{$value->candidato}}</td>
										<td class="text-center">{{$value->nombre}}</td>
										<td class="text-center">{{$value->prioridad}}</td>
										<td class="text-center">{{$value->nombre_estado}}</td>
										<td class="text-center">{{$value->fecha_eliminacion}}</td>
										<td class="text-center">
											<a href="{{url('pdfActaHechos')}}?id={{$value->id}}" class="btn btn-default btn-block"  target="_blank"><i class="fa fa-list pull-right"></i>Acta de Hechos</a>
										</td>      							            		
										
									</tr>
								@endforeach
					

								</tbody>
							</table>
						</div>


					</div>


</div>

@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

<script type="text/javascript">
	$(document).ready(function(){
		iniciarTabla();



	});

		var iniciarTabla = function(){
		var data_table =$("#data-table").DataTable({
			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'excelHtml5',
				title: 'Acta de Hechos',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4 ]
				}         
			},
			{
				extend: 'pdfHtml5',
				title: 'Acta de Hechos',
				pageSize: 'LEGAL',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4 ]
				}

			},
			{
				extend: 'copyHtml5',
			},
			{
				extend: 'print',
				title: 'Acta de Hechos',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4 ]
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
			
		} );
	}

       
</script>
