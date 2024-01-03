@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
		<li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li>
		<li><a href="{{ route('sig-erp-crm::cartas_tipo.index') }}">Usuarios</a></li>
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
		            <h4 class="panel-title text-center">Listado de Usuarios</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-3 col-md-offset-9">
		            		 <a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Usuario">
					<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
				</a>
				<label>Nuevo Usuario</label>
		            	</div>
		            </div>
		            <hr>
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
			        @endif

		            <div class="row">
		            	<div class="col-md-12 col-sm-12 col-xs-12">
		            		<table id="data-table" class="display table table-striped table-bordered table-responsive">
			            		<thead>
			            			<tr>
			            				<th>Nickname</th>
				            			<th>Nombre</th>
				            			<th>Puesto</th>
				            			<th>Departamento</th>
				            			<th>Fecha Alta</th>
				            			<th>Acción</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="6" class="text-center">USUARIOS</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach($usuarios as $usuario)
				            			<tr>
				            				<td>{{ $usuario->nick_name }}</td>
				            				<td>{{ $usuario->name }}</td>				            			
				            				<td>
				            					@if(isset($usuario->roles[0]))
				            						<span class="label label-primary">
				            							{{$usuario->roles[0]->name}}
				            						</span>
				            					@else
				            						<span class="label label-warning">Sin puesto</span>
				            					@endif				            					
				            				</td>				            			
				            				<td>{{ isset( $usuario->centro_negocio ) ? $usuario->centro_negocio->nombre : 'S/CN'  }}</td>				            			
				            				<td>{{ Carbon\Carbon::parse($usuario->created_at)->format('Y-m-d') }}</td>		
				            				<td class="text-center">
				            					<a href="javascript:;" 
					            					class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo"
					            					data-toggle="popover"
					            					data-placement="left" 
					            					data-html="true"			            					
					            					title="Permisos asignados" 
					            					data-content="
					            					<ul>
					            					@if(isset($usuario->roles[0]))
						            					@forelse ($usuario->roles[0]->permissions as $permiso)
						            						<li><h6>{{$permiso->name}}</h6></li>
						            					@empty
						            						<li>Sin permisos asignados</li>
						            					@endforelse
						            				@else
						            					<li>Sin permisos asignados</li>
						            				@endif
					            					</ul>">
				            						<i class="fa fa-eye"></i>
				            					</a>
				            					<a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.edit',$usuario->id) }}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Editar Usuario"><i class="fa fa-pencil"></i></a>&nbsp&nbsp

				            					@if($usuario->id != Auth::user()->id)

				            					{{ Form::open([ 'route' => ['sig-erp-crm::modulo.administrador.usuarios.destroy', 
				            												$usuario->id],
						                           				'method' => 'DELETE',
						                           				'class'  => 'pull-right' 
			                           						  ]) }}
			                           				
                									<button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Usuario">
                										<i class="fa fa-trash"></i>
                									</button>
				            					{{ Form::close()}}

				            					@endif
				            					
				            					{{-- 
				            					<a href="javascript:;" class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Ver Usuario"><i class="fa fa-eye"></i></a>&nbsp&nbsp
				            					--}}
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
                title: 'Listado de Usuarios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Usuarios',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Usuarios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
                                
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