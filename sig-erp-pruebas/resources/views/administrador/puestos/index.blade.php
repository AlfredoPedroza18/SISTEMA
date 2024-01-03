@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>		
		<li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li>
		
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Puestos</a></li>
		
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
		            <h4 class="panel-title text-center">Listado de Puestos</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-3 col-md-offset-9">
		            		 <a href="{{ route('sig-erp-crm::modulo.administrador.puestos.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Puesto">
					<i class="fa fa-tasks fa-1x" aria-hidden="true"></i>
				</a>
				<label>Nuevo Puesto</label>
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
			            				<th>Puesto</th>
				            			<th>Descripción</th>				            							            		
				            			
				            			<th>Fecha Alta</th>
				            			<th>Acción</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="4" class="text-center">PUESTOS</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach($roles as $rol)
				            			<tr>
				            				<td>{{ $rol->name }}</td>
				            				<td>{{ $rol->description }}</td>					            							            			
				            				
				            				
				            				<td>{{ Carbon\Carbon::parse($rol->created_at)->format('Y-m-d') }}</td>		           								            			
				            				<td class="text-center">
					            				<a href="javascript:;" 
					            					class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo"
					            					data-toggle="popover"
					            					data-placement="auto left" 
					            					data-html="true"			            					
					            					title="Permisos asignados" 
					            					data-content="
					            					<ul>
					            					@forelse ($rol->permissions as $permiso)
					            						<li><h6>{{$permiso->name}}</h6></li>
					            					@empty
					            						<li>Sin permisos asignados</li>
					            					@endforelse
					            					</ul>">
				            						<i class="fa fa-eye"></i>
				            					</a>

				            					@if($rol->slug != 'admin')
				            					<a href="{{ route('sig-erp-crm::modulo.administrador.puestos.edit',$rol->id) }}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Editar Usuario"><i class="fa fa-pencil"></i></a>&nbsp&nbsp

				            					{{ Form::open([ 'route' => ['sig-erp-crm::modulo.administrador.puestos.destroy', 
				            												$rol->id],
						                           				'method' => 'DELETE',
						                           				'class'  => 'pull-right' 
			                           						  ]) }}
			                           				
                									<button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Usuario">
                										<i class="fa fa-trash"></i>
                									</button>
				            					{{ Form::close()}}

				            					@endif



				            					
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