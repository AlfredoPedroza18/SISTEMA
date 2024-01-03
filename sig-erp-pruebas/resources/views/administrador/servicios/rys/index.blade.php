@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>		
		<li><a href="javascript:;">Cuentas</a></li>
		
		<li><a href="javascript:;">Reclutamiento y Selección</a></li>
		
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
		            <h4 class="panel-title text-center">Listado de Servicios Reclutamiento y Selección</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-3 col-md-offset-9">
		            		 <a href="javascript:;" 
		            		 	class="btn btn-inverse btn-icon btn-circle btn-lg" 
		            		 	data-toggle="modal"
		            		 	data-target="#altaServicioRysModal" 
		            		 	data-placement="top"
		            		 	data-backdrop="static">
					<i class="fa fa-bars fa-1x" aria-hidden="true"></i>
				</a>
				<label>Nuevo Servicio RYS</label>
		            	</div>
		            </div>
		            <hr>
		            @if (session('success'))
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">
									<strong>RYS: </strong>
									 {{ session('success') }}
									<span class="close" data-dismiss="alert">×</span>
								</div>
			            	</div>
			            </div>
			        @endif

			        @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

		            <div class="row">
		            	<div class="col-md-12 col-sm-12 col-xs-12">
		            		<table id="data-table" class="display table table-striped table-bordered table-responsive">
			            		<thead>
			            			<tr>
			            				<th class="text-center">Inicio</th>
				            			<th class="text-center">Fin</th>    			
				            			<th class="text-center">Porcentaje %</th>	
				            			<th class="text-center" style="width: 50px;">Acción</th>			            			
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="4" class="text-center">Servicios</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach( $lista_rys as $rys )
			            				<tr>
			            					<td class="text-center">{{ $rys->inicio }}</td>
			            					<td class="text-center">{{ $rys->fin }}</td>
			            					<td class="text-center">{{ $rys->porcentaje_servicio }} %</td>
			            					<td class="text-center" style="width: 50px;"">

			            						<a 	href="javascript:;" 
			            							class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo btn-editar-registro-rys" 
			            							data-toggle="tooltip" 
			            							data-placement="bottom" 
			            							data-id-servicio-rys = "{{ $rys->id }}"
			            							title="Editar registro">
			            								<i class="fa fa-pencil"></i>
			            						</a>
			            						{{-- Form::open([ 'route' => ['sig-erp-crm::modulo.administrador.servicios.rys.destroy', 
				            												$rys->id],
						                           				'method' => 'DELETE',
						                           				'class'  => 'pull-right' 
			                           						  ]) }}
			                           				
	                								<button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro">
	                										<i class="fa fa-trash"></i>
	                								</button>
				            					{{ Form::close() --}}

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


	@include('administrador.servicios.rys.alta-servicio-rys')
	@include('administrador.servicios.rys.edicion-servicio-rys')
	

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')




<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();

    	$("#modalServicioRysTitle").html("Alta registro RYS");

    	$(".btn-editar-registro-rys").click(function(){
    			id_servicio_rys = $(this).attr('data-id-servicio-rys');
    			
    			getRys( id_servicio_rys );


    	});
    	
    	
    		
    	

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de Reclutamiento y Selección',
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
                title: 'Listado de Reclutamiento y Selección',
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

        var getRys = function( id_rys ){ 
        	
        	$.ajax({
                url: "<?php echo  url('get_rys_servicio'); ?>",
                type:'GET',
                dataType: 'json',
                data:{id:id_rys},
                success:function(response){
                    
                    if(response.data){
                    	$("#vacante-inicio").val(response.data.inicio);
                    	$("#vacante-fin").val(response.data.fin);
                    	$("#vacante-porcentaje").val(response.data.porcentaje_servicio);
                    	$("#modalServicioRysTitleEdit").html("Edición registro RYS");
                    	$("#edicionServicioRysModal").modal({show:true});
                    }
                    


                },
                error : function(jqXHR, status, error) {
                            alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo ' + status);
                }
            });
        }
</script>

@endsection