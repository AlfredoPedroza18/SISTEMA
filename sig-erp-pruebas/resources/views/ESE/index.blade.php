@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="{{ url( 'dashboardese' ) }}">ESE</a></li>		
		<li><a href="javascript:;">Listado Estudios Socioeconómicos</a></li>
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
		            <h4 class="panel-title text-center">Listado de Estudios Socioeconómicos</h4>
		        </div>
		        <div class="panel-body">
		          {{--  <div class="row">
		            	<div class="col-md-3 col-md-offset-9">
		            		 <a href="{{ route('sig-erp-crm::modulo.administrador.puestos.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Puesto">
					<i class="fa fa-tasks fa-1x" aria-hidden="true"></i>
				</a>
				<label>Nuevo Puesto</label>
		            	</div>
		            </div>--}}
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
		            		<table id="data-table" class="display table table-hover table-bordered ">
			            		<thead>
			            			<tr>
			            			    @if( auth()->user()->isForeing() )
				            			<th class="text-center">Acción</th>
				            			@endif
				            			@permission('ese.lista.estudios.detalle|ese.lista.estudios.ejecutivos')
				            			<th class="text-center">Acción</th>
				            			@endpermission
				            			
			            				<th class="text-center">#ESE</th>
				            			<th class="text-center">#O.S</th>
				            			<th class="text-center">Resultado</th>
			            				<th class="text-center">Candidato</th>
				            			<th class="text-center">Status</th>				            							            		
				            			
				            			<th class="text-center">Fecha Recepción</th>
				            			<th class="text-center">Fecha Visita</th>
				            			<th class="text-center">Cliente</th>
				            			
				            			<th class="text-center">Costo</th>
				            			<th class="text-center">Costo + viaticos</th>
				            			<th class="text-center">Timer</th>
				            			<th class="text-center">Timer retraso</th>
				            			<th class="text-center">Comentarios ESE (Cancelación)</th>
				            			<th class="text-center">Comentarios ESE (Cierre)</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            		<tr>
				            			@if( auth()->user()->isForeing() )
				            			<td>Acción</td>
				            			@endif
				            			@permission('ese.lista.estudios.detalle|ese.lista.estudios.ejecutivos')
				            			<td>Acción</td>
				            			@endpermission
				            			<td>#ESE</td>
				            			<td>#O.S</td>
				            			<td>Resultado</td>
			            				<td>Candidato</td>
				            			<td>Status</td>				            							            		
				            			
				            			<td>Fecha Recepción</td>
				            			<td>Fecha Visita</td>
				            			<td>Cliente</td>
				            			
				            			<td>Costo</td>
				            			<td>Costo + viaticos</td>
				            			<td>Días trasncurridos</td>
				            			<td>Días atraso</td>
				            			<td>Comentarios ESE (Cerrado/Cancelado)</td>
				            			<td>Comentarios ESE (Cierre)</td>

				            		</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach($estudios as $estudio)
				            			<tr @if( $estudio->isClosed() ) class="success" @else class="{{ $estudio->isOutTime() ? 'danger':'' }}" @endif>
				            			@if( auth()->user()->isForeing() )
				            				<td class="text-center">
				            			
				            					<?php
				            					$os=$estudio->ordenServicioEse->orden_servicio->id;
				            					$os_ese=$estudio->ordenServicioEse->id;
				            					$ese=$estudio->id;
				            				?>

				            					@if( ( 	App\ESE\EstudioEse::CERRADA != $estudio->id_status )  && 
				            							App\ESE\EstudioEse::CANCELADA != $estudio->id_status )
				            					
					            				<a 	href='{{ url("estudio-ese") . "/create?os=$os&os_ese=$os_ese&ese=$ese"}}' 
					            					data-toggle="tooltip" 
					            					data-placement="top" 
					            					title="Ver detalle del #ESE{{$estudio->id}}"
					            					>
					            						<i class="fa fa-edit"></i>
					            				</a>

					            				@endif
					            				@if($estudio->id_status != App\ESE\EstudioEse::SIN_INICIAR )
						            				@if( $estudio->plantilla )
						            				<a  style="margin-right: 20px;" href="{{ url('estudio-ese-download-pdf-ese') }}?plantilla={{$estudio->id_plantilla}}&estudio={{ $estudio->id }}" target="_blank" data-toggle="tooltip" 
						            					data-placement="top" 
						            					title="Ver #ESE{{$estudio->id}}">	<i class="fa  fa-file-pdf-o"></i>
						            				</a>
						            				@else
						            				<a  style="margin-right: 20px;" href="javascript:;" data-toggle="tooltip" 
						            					data-placement="top" 
						            					title="El #ESE{{$estudio->id}} se visualizara hasta que se ASIGNE UNA PLANTILLA.">	<i class="fa  fa-file-pdf-o"></i>
					            					</a>
						            				@endif
					            				@else
					            				<a  style="margin-right: 20px;" href="javascript:;" data-toggle="tooltip" 
					            					data-placement="top" 
					            					title="El #ESE{{$estudio->id}} se visualizara hasta que SE INICIE.">	<i class="fa  fa-file-pdf-o"></i>
					            				</a>
					            			@endif
				            				</td>
				            			@endif
				            				@permission('ese.lista.estudios.detalle|ese.lista.estudios.ejecutivos')
				            				<td class="text-center">


				            				@if( 	( $estudio->id_status != App\ESE\EstudioEse::CANCELADA  &&
				            						  $estudio->id_status != App\ESE\EstudioEse::CERRADA )  || 
				            						  Auth::user()->is('admin'))

				            				<?php
				            					$os=$estudio->ordenServicioEse->orden_servicio->id;
				            					$os_ese=$estudio->ordenServicioEse->id;
				            					$ese=$estudio->id;
				            				?>

				            					@if( ( 	App\ESE\EstudioEse::CERRADA != $estudio->id_status )  && 
				            							App\ESE\EstudioEse::CANCELADA != $estudio->id_status )
				            					@permission('ese.lista.estudios.detalle')
					            				<a 	href='{{ url("estudio-ese") . "/create?os=$os&os_ese=$os_ese&ese=$ese"}}' 
					            					data-toggle="tooltip" 
					            					data-placement="top" 
					            					title="Ver detalle del #ESE{{$estudio->id}}"
					            					>
					            						<i class="fa fa-edit"></i>
					            				</a>
					            				@endpermission
					            				@endif

					            			@endif

					            				@permission('ese.lista.estudios.ejecutivos')
					            				<a 	href='javascript:;' 
					            					data-toggle="tooltip" 
					            					data-placement="right" 
					            					
					            					data-title="<center>Ejecutivos asignados:</center>
					 
					            					     <ol>
					            						@forelse( $estudio->ejecutivos as $ejecutivo )
					            							<li class='text-primary'>{{ $ejecutivo->name.' '.$ejecutivo->apellido_paterno.' '.$ejecutivo->apellido_materno }}</li>
					            						@empty
					            							<li>Sin ejecutivos</li>					            						
					            						@endforelse
					            						</ol>
					            						"
					            						data-html="true"

					            					>
					            						<i class="fa fa-group"></i>
					            				</a>
					            				@endpermission
					            				<!--- descarga de pdf  NO SE COLOCAN PERMISOS NI RESTRICCION ES STATUS YA QUE LO PUEDEN VISUALIZAR TODOS Y EN CUALQUIER STATUS-->
					            			@if($estudio->id_status != App\ESE\EstudioEse::SIN_INICIAR )
						            				@if( $estudio->plantilla )
						            				<a  style="margin-right: 20px;" href="{{ url('estudio-ese-download-pdf-ese') }}?plantilla={{$estudio->id_plantilla}}&estudio={{ $estudio->id }}" target="_blank" data-toggle="tooltip" 
						            					data-placement="top" 
						            					title="Ver #ESE{{$estudio->id}}">	<i class="fa  fa-file-pdf-o"></i>
						            				</a>
						            				@else
						            				<a  style="margin-right: 20px;" href="javascript:;" data-toggle="tooltip" 
						            					data-placement="top" 
						            					title="El #ESE{{$estudio->id}} se visualizara hasta que se ASIGNE UNA PLANTILLA.">	<i class="fa  fa-file-pdf-o"></i>
					            					</a>
						            				@endif
					            				@else
					            				<a  style="margin-right: 20px;" href="javascript:;" data-toggle="tooltip" 
					            					data-placement="top" 
					            					title="El #ESE{{$estudio->id}} se visualizara hasta que SE INICIE.">	<i class="fa  fa-file-pdf-o"></i>
					            				</a>
					            			@endif
					            				<!--- descarga de pdf -->
				            				</td>
				            				@endpermission	
				            				<td class="text-center">{{  $estudio->id }} </td>	
				            				<td class="text-center">{{ $estudio->ordenServicioEse->orden_servicio->id }}</td>
				            				<td>{{isset( $estudio->resultado_final_ese ) ?  $estudio->resultado_final_ese->nombre : 'Sin resultado' }}</td>
				            				<td>
				            					{!! isset($estudio->candidato) ? '<strong>' . $estudio->candidato->nombre_completo . '</strong>' : '<strong class="text-danger">Sin registrar</strong>' !!}
				            				</td>
				            				<td class="text-center">
				            					<span class="label label-{{ $estudio->getStatusLabel() }}">{{ $estudio->status->nombre }}</span>	
				            				</td>					            							            			     				
				            				<td class="text-center">{{ $estudio->fecha_ingreso }}</td>		           								            		
				            				<td class="text-center">
				            					<span class="label label-{{ $estudio->fecha_visita_formato == 'Sin asignar' ? 'primary': 'warning' }}">{{ $estudio->fecha_visita_formato }} </span>
				            				</td>		
				            				<td>{{ $estudio->cliente->nombre_comercial }}</td>					            							            			
				            				
				            								            							            			

				            				<td class="text-center"> <strong>${{ $estudio->subtotal }}</strong></td>
				            				<td class="text-center"> <strong>${{ number_format( ($estudio->subtotal+$estudio->viaticos)*1.16,2) }}</strong></td>
				            				<td class="text-center">
				            					@if( $estudio->isClosed() )
				            						<span class="label label-success"> 0 </span>
				            					@else
				            						<span class="label label-{{ $estudio->isOutTime() ? 'warning' : 'primary' }}">{{ $estudio->getDifTime() }}</span>
				            					@endif
				            				</td>	
				            				<td class="text-center">
				            					@if( $estudio->isClosed() )
				            						<span class="label label-success"> 0 </span>
				            					@else
				            						<span class="label label-{{ $estudio->isOutTime() ? 'danger' : 'primary' }}"> {{ $estudio->getDiasAtraso() }} </span>
				            					@endif

				            				</td>
				            				<td class="text-center">
				            					@if( isset($estudio->cancelacionese->comentario_cancelacion) )
				            						{{ $estudio->cancelacionese->comentario_cancelacion }}
				            					 @else
				            					  N/A
				 
				            					@endif

				            				</td>
				            				<td class="text-center">
				            			@if( isset($estudio->comentarios_cierre) || $estudio->comentarios_cierre!=" ")
				            				{{ $estudio->comentarios_cierre }}
				            				 @else
				            					  N/A
				            			@endif
				            				</td>	           								            		
				            				

				            								            							            			

				            				{{--	
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

    	$('[data-toggle="tooltip"]').tooltip(); 

    		
    	

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                order: [[ 1, "asc" ]],
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de Estudios Socioeconómicos',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Estudios Socioeconómicos',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Estudios Socioeconómicos',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ]
                }
             }

                                ],
                               // responsive: true,
                                autoFill: true,
                         // "scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                 dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
							        $('[data-toggle="tooltip"]').tooltip();
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
		        $(this).html( '<input type="text" placeholder="Buscar '+title+'" style="witdh:100%" />' );
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