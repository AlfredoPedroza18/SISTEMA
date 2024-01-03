@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="{{ url( 'dashboardese' ) }}">ESE</a></li>		
		<li><a href="javascript:;">Listado Ejecutivos</a></li>
	</ol>
	@if( count( $errors ) > 0 )
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger">
		        <ul class="parsley-errors-list filled" id="parsley-id-1513">                                          
		            @foreach( $errors->all() as $error )
		            	<li class="parsley-required">{{ $error }}</li>
		            @endforeach
		        </ul>
		     </div>
		</div>
	</div>
    @endif
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
		            <h4 class="panel-title text-center">Listado Ejecutivos</h4>
		        </div>
		        <div class="panel-body">
		        	<div class="row">
		            	<div class="col-md-3 col-md-offset-9">
		            		 <a href="javascript:;" 
		            		 	class="btn btn-inverse btn-icon btn-circle btn-lg" 		            		 	
		            		 	data-toggle="modal" data-target="#myModal">
								<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
							</a>
							<label>Nuevo Ejecutivo</label>
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
		            	<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
		            		<table id="data-table" class="display table table-striped table-bordered ">
			            		<thead>
			            			<tr>
			            				<th class="text-center">Ejecutivo</th>
			            				<th class="text-center">Teléfono</th>
				            			<th class="text-center">Ubicación</th>				            							            		
				            			
				            			<th class="text-center">Tipo</th>
				            			<th class="text-center">Usuario</th>
				            			<th class="text-center">Estudios</th>
				            			
				            		</tr>
			            		</thead>
			            		<tfoot>

				            		<tr>
			            				<td>">Ejecutivo</td>
			            				<td>">Teléfono</td>
				            			<td>">Ubicación</td>				            							            		
				            			
				            			<td>">Tipo</td>
				            			<td>">Usuario</td>
				            			<td>">Estudios</td>
				            			
				            		</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach($ejecutivos as $ejecutivo)
			            				{{-- @if( $ejecutivo->is('investigador.staff|investigador.foraneo')) --}}
				            			<tr>
				            				<td>{{ $ejecutivo->name . ' ' . $ejecutivo->apellido_paterno . ' ' . $ejecutivo->apellido_materno }}</td> 				
				            				<td>{{ $ejecutivo->telefono_oficina }}</td>
				            				<td>{{ $ejecutivo->telefono_oficina }}</td>
				            				<td>{{ isset($ejecutivo->roles[0]) ? $ejecutivo->roles[0]->name : '' }}</td>
				            				<td>{{ $ejecutivo->username }}</td>
				            				<td class="text-center"><span class="badge badge-danger" data-toggle="tooltip" title="Estudios asignados"> {{ $ejecutivo->estudios_ese->count() }}</span></td>
				            				
				            				{{--	
				            				

					            				<a 	href='{{ url("estudio-ese") . "/create?os=$os&os_ese=$os_ese&ese=$ese"}}' 
					            					data-toggle="tooltip" 
					            					data-placement="top" 
					            					title="Ver detalle del estudio"
					            					>
					            						<i class="fa fa-edit"></i>
					            				</a>

					            				<a 	href='javascript:;' 
					            					data-toggle="popover" 
					            					data-placement="auto left" 
					            					title="Ejecutivos asignados"
					            					data-html="true"
					            					data-content="
					            						<ul>
					            						@forelse( $estudio->ejecutivos as $ejecutivo )
					            							<li class='text-primary'>{{ $ejecutivo->name }}</li>
					            						@empty
					            							<li>Sin ejecutivos</li>					            						
					            						@endforelse
					            						</ul>
					            						"

					            					>
					            						<i class="fa fa-group"></i>
					            				</a>
				            				</td>					            							            			

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
				            					--}}
				            			</tr>
				            			{{-- @endif --}}
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

@include('ESE.ejecutivo.ese-modal-investigador-create')

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/jquery.numeric.min.js') !!}




<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();
    	$('.telefono').numeric();

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
                title: 'Listado de Ejecutivos',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Ejecutivos',
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
                title: 'Listado de Ejecutivos',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
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

            $('#data-table tfoot td').each( function () {
		        var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Buscar" />' );
		    } );


		    data_table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
                
        }
</script>

@endsection