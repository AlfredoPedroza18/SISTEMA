@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Ordenes de Servicio</a></li>	
		
		
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
		            <h4 class="panel-title text-center">Listado de Ordenes de Servicio</h4>
		        </div>
		        <div class="panel-body">		            
		            
		            @if (session('success'))
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">
									<strong>Usuario </strong>
									 {{ session('success') }}
									<span class="close" data-dismiss="alert">×</span>
								</div>
			            	</div>
			            </div>
			            <hr>
			        @endif

		            <div class="row">
		            	<div class="col-md-12 col-sm-12 col-xs-12">
		            		<table id="data-table" class="display table table-striped table-bordered table-responsive">
			            		<thead>
			            			<tr>
			            				<th>Cliente</th>
				            			<th>Servicio</th>
				            			<th>Centro de Negocio</th>
				            			<th>Cantidad</th>
				            			<th>Fecha</th>
				            			<th>Acción</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="6" class="text-center">Ordenes de Servicio</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>

			            			@foreach( $ordenes as $orden )			            			
			            				<tr>
				            				<td>{{ $orden->nombre_comercial }} </td>
					            			<td>{{ $orden->servicio }} </td>
					            			<td>{{ $orden->centro_negocio }} </td>
					            			<td>$ {{ $orden->total }} </td>
					            			<td>{{ $orden->fecha_cotizacion }} </td>
					            			<td>
					            				<a href="{{ $orden->ruta }}"><span> <i class="fa fa-download fa-2x"></i> </span></a>
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

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}


<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();
    	
    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

    	}); 
    		
    	

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'excel', 'pdf','print'

                                ],
                                responsive: true,
                                autoFill: true,
                                
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
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