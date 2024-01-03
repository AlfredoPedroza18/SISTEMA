@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>		
		<li><a href="javascript:;">Cuentas</a></li>
		
		<li><a href="javascript:;">Estudios Socioeconómicos</a></li>
		
	</ol>
 @if (session('success'))
    <div class="row">
    	<div class="col-md-12">
    		<div class="alert alert-{{ session('type') }} fade in m-b-15">
				<strong>{{ session('label') }}</strong>
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





	<div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
		<div class="panel-heading p-0">
			<div class="panel-heading-btn m-r-10 m-t-10">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			</div>
			<!-- begin nav-tabs -->
			<div class="tab-overflow overflow-right">
				<ul class="nav nav-tabs">
					<li class="prev-button"><a href="javascript:;" data-click="prev-tab" class="text-inverse"><i class="fa fa-arrow-left"></i></a></li>
					<li class="active"><a href="#nav-tab2-1" data-toggle="tab" aria-expanded="true">Crear Servicio</a></li>
					<li class=""><a href="#nav-tab2-2" data-toggle="tab">Prioridades</a></li>
					<li class=""><a href="#nav-tab2-3" data-toggle="tab">Tipos de servicio</a></li>                         
				</ul>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="nav-tab2-1">
				<h3 class="m-t-10 text-center">Servicios ESE</h3>
					
				<div class="row">
		           	<div class="col-md-3 col-md-offset-9">
		            		<a href="javascript:;"
		            		 	id="btn-alta-registro-ese"
		            		 	class="btn btn-inverse btn-icon btn-circle btn-lg" 	            		 			            		 	
		            		 	data-placement="top"
		            		 	data-backdrop="static">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</a>
							<label>Nuevo Registro ESE</label>
		            </div>
		        </div>

		        <hr>


	            <div class="row">
	            	
	            	<div class="col-md-12">
	            		
	            	


	            		<table id="data-table" class="display table table-striped table-bordered">
		            		<thead>
		            			<tr>
		            				<th class="text-center">Tipo</th>
		            				<th class="text-center">Estudio</th>
			            			<th class="text-center">Precio</th>    			
			            			<th class="text-center">Fecha Alta</th>
			            			
			            		</tr>
		            		</thead>
		            		<tfoot>

			            			<tr>
			            				<td class="text-center">Tipo</td>
			            				<td class="text-center">Estudio</td>
				            			<td class="text-center">Precio</td>    			
				            			<td class="text-center">Fecha Alta</td>
			            			</tr>
		            		</tfoot>
		            		<tbody>
		            			@foreach( $lista_ese as $ese )
		            				<tr>
		            					<td class="text-center">{{ $ese->tipo }}</td>
		            					<td class="text-center">{{ $ese->tipo_estudio }}</td>
		            					<td class="text-center">$ {{ number_format($ese->costo,2) }}</td>
		            					<td class="text-center">{{ $ese->fecha }}</td>
		            					

		            					
		            				</tr>
		            			@endforeach
		            		</tbody>
	            		</table>

	            	</div>
	            </div>
		            	




			</div>
			<div class="tab-pane fade" id="nav-tab2-2">
				<h3 class="m-t-10 text-center">Prioridades de los servicios</h3>
				<div class="row">
		           	<div class="col-md-3 col-md-offset-9">
		            		<a href="javascript:;"
		            		 	id="btn-alta-prioridad-ese"
		            		 	class="btn btn-inverse btn-icon btn-circle btn-lg" 	            		 			            		 	
		            		 	data-placement="top"
		            		 	data-backdrop="static">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</a>
							<label>Nueva Prioridad</label>
		            </div>
		        </div>

		        <hr>


	            <div class="row">
	            	
	            	<div class="col-md-12">
	            		
	            	


	            		<table id="data-table-prioridades" class="display table table-striped table-bordered table-responsive">
		            		<thead>
		            			<tr>
		            				<th class="text-center">Nombre</th>
		            				<th class="text-center">Descripción</th>
		            				<th class="text-center">Fecha Alta</th>
		            				<th class="text-center" style="width:15%;">Acción</th>
		            				

			            			
			            			
			            		</tr>
		            		</thead>
		            		<tfoot>

			            			<tr>
			            				<td class="text-center">Nombre</td>
			            				<td class="text-center">Descripción</td>
			            				<td class="text-center">Fecha Alta</td>
			            				<td class="text-center" style="width:15%;">Acción</td>
		            					
				            			
			            			</tr>
		            		</tfoot>-
		            		<tbody>
		            			@foreach( $prioridades as $prioridad )
		            				<tr>
		            					<td class="text-center">{{ $prioridad->nombre }}</td>
		            					<td class="text-center">{{ $prioridad->descripcion }}</td>				
		            					<td class="text-center">{{ $prioridad->fecha_alta }}</td>
		            					<td class="text-center" style="width:15%;">

		            					<button class="btn btn-primary btn-icon btn-circle btn-sm m-r-5 btn-edit-prioridad" data-edit-prioridad="{{ $prioridad->id }}">
		            							<i class="fa fa-pencil"></i>
		            					</button>

		            					{{-- Form::open([ 'url' => 'prioridad_ese_delete','style' => 'float:right']) }}

		            						<button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm m-r-5">
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
			<div class="tab-pane fade" id="nav-tab2-3">
				<h3 class="m-t-10 text-center">Tipos de servicio</h3>
				<div class="row">
		           	<div class="col-md-3 col-md-offset-9">
		            		<a href="javascript:;"
		            		 	id="btn-alta-tipo-servicio-ese"
		            		 	class="btn btn-inverse btn-icon btn-circle btn-lg" 	            		 			            		 	
		            		 	data-placement="top"
		            		 	data-backdrop="static">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</a>
							<label>Nuevo Tipo Servicio</label>
		            </div>
		        </div>

		        <hr>


	            <div class="row">
	            	
	            	<div class="col-md-12">
	            		
	            	


	            		<table id="data-table-tipos-estudio" class="display table table-striped table-bordered table-responsive">
		            		<thead>
		            			<tr>
		            				<th class="text-center">Tipo Estudio</th>			            			
			            			<th class="text-center">Fecha Alta</th>			            			
			            			<th class="text-center">Acción</th>			            			
			            		</tr>
		            		</thead>
		            		<tfoot>
			            			<tr>
			            				<td class="text-center">Tipo Estudio</td>
				            			<td class="text-center">Fecha Alta</td>
				            			<td class="text-center">acción</td>
			            			</tr>
		            		</tfoot>
		            		<tbody>
		            			@foreach( $estudios as $estudio )
		            				<tr>
		            					<td class="text-center"><?= $estudio->tipo_estudio; ?></td>
		            					<td class="text-center">{{ $estudio->fecha }}</td>	
		            					<td class="text-center">
		            						<button class="btn btn-primary btn-icon btn-circle btn-sm m-r-5 btn-edit-tipo-estudio" data-edit-tipo-estudio="{{ $estudio->id }}">
		            							<i class="fa fa-pencil"></i>
		            					</button>
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

@include('administrador.servicios.ese.alta-servicio-ese')
@include('administrador.servicios.ese.alta-prioridad-ese')
@include('administrador.servicios.ese.edit-prioridad-ese')
@include('administrador.servicios.ese.alta-tipo-servicio-ese')
@include('administrador.servicios.ese.edit-tipo-servicio-ese')
@include('administrador.servicios.ese.edicion-servicio-ese')

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')




<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();
    	iniciarTablaPrioridades();
    	iniciarTablaTiposEstudios();

    	$('.alerta-tipo-servicio').hide();


    	$("#modalServicioRysTitle").html("Alta registro ESE");

    	$("#btn-alta-registro-ese").click(function(){   			
    			getEse();

    	});

    	$('#btn-alta-prioridad-ese').click(function(){ 
    		$('#descripcion-prioridad').val('');
    		$('#altaPrioridadServicioEseModal').modal({show:true});
    	});

    	$('#btn-alta-tipo-servicio-ese').click(function(){
    		$('.alerta-tipo-servicio').hide();
    		$('#altaTipoServicioServicioEseModal').modal({show:true});
    	});

    	$('#btn-alta-tipo-servicio').click(function( e ){
    		e.preventDefault();
    		tipo_estudio = $.trim($('#tipo_estudio').val());
    		if( tipo_estudio != '' )
    		{
    			$('#frm-tipo-servicio').submit();
    		}else{
	    		$('.msg-tipo-servicio').empty().html('Upss !');
	    		$('.detail-msg-tipo-servicio').empty().html('Tipo servicio es campo obligatorio');
	    		$('.alerta-tipo-servicio').show();    			
    		}

    	});

    	$('#btn-edit-tipo-servicio').click(function( e ){
    		e.preventDefault();
    		tipo_estudio = $.trim($('#tipo_estudio_edit').val());
    		if( tipo_estudio != '' )
    		{
    			$('#frm-edit-tipo-servicio').submit();
    		}else{
	    		$('.msg-tipo-servicio').empty().html('Upss !');
	    		$('.detail-msg-tipo-servicio').empty().html('Tipo servicio es campo obligatorio');
	    		$('.alerta-tipo-servicio').show();    			
    		}

    	});

    	

    	$('.btn-edit-prioridad').click(function( e ){
    		id = $(this).attr('data-edit-prioridad');
    		getPrioridad(id);
    	});
    	

    	$('.btn-edit-tipo-estudio').click(function(){
    		id = $(this).attr('data-edit-tipo-estudio');

    		getTipoServicio(id);
    	});

    	$('#btn-edit-prioridad-servicio-ese').click(function( e ){
    		e.preventDefault();

    		if( !validarPrioridadEdit() )
    		{    			
    			$('.msg-tipo-servicio').empty().html('Upss !');
	    		$('.detail-msg-tipo-servicio').empty().html('Verifica bien los campos');
	    		$('.alerta-tipo-servicio').show();    
    		}else{
    			$('#frm-edit-prioridad-servicio-ese').submit();
    		}
    	});


    	$('#btn-alta-servicio').click(function( e ){
    		e.preventDefault();
    		
    		if( !validarServicio() ){

    			$('.msg-tipo-servicio').empty().html('Upss !');
	    		$('.detail-msg-tipo-servicio').empty().html('Verifica bien los campos');
	    		$('.alerta-tipo-servicio').show();    
    		}else{
    			$('#frm-alta-servicio').submit();
    		}
    		

    	});



    	$('#btn-alta-prioridad-servicio-ese').click(function( e ){
    		e.preventDefault();

    		if( !validarPrioridad() )
    		{    			
    			$('.msg-tipo-servicio').empty().html('Upss !');
	    		$('.detail-msg-tipo-servicio').empty().html('Verifica bien los campos');
	    		$('.alerta-tipo-servicio').show();    
    		}else{
    			$('#frm-alta-prioridad-servicio-ese').submit();
    		}
    		
    	});
    	
    		
    	

    });

    var validarPrioridad = function()
    {
    	paso = true;
    	nombre_prioridad = $.trim( $('#prioridad-nombre').val() );
    	dias_prioridad = $('#prioridad-dias').val();
    	if( nombre_prioridad == ''){
    		paso = false;
    	}

    	if( isNaN( dias_prioridad ) || dias_prioridad == '' )
    	{
    		paso = false;
    	}

    	console.log( isNaN( dias_prioridad ) + '  Dias:  ' +  dias_prioridad + ' Paso: '+ paso);

    	

    	return paso;

    }

    var validarPrioridadEdit = function()
    {
    	paso = true;
    	nombre_prioridad = $.trim( $('#edit-prioridad-nombre').val() );
    	dias_prioridad = $('#prioridad-dias').val();
    	if( nombre_prioridad == ''){
    		paso = false;
    	}

    	if( isNaN( dias_prioridad ) )
    	{
    		paso = false;
    	}



    	return paso;

    }

    var validarServicio = function()
    {
    	paso = true;
    	tipo_servicio 		= $('#servicio_ese_select').val();
		prioridad_servicio  = $('#tipo_prioridad').val();
		costo_tipo_servicio = $('#costo_tipo_servicio').val();

    	if(prioridad_servicio == '-1' || tipo_servicio == '-1' || costo_tipo_servicio <= 0){
    		paso = false;    		
    	}
    	
    	return  paso;


    } 
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de paquetes ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de paquetes ESE',
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
                title: 'Listado de paquetes ESE',
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





            				$('#data-table tfoot td').each( function () {
						        var title = $(this).text();
						        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
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


        var iniciarTablaPrioridades = function()
        {
            var data_table_prioridades =$("#data-table-prioridades").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de Prioridades',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Prioridades',
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
                title: 'Listado de Prioridades',
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
							    	$('.btn-edit-prioridad').click(function( e ){
							    		id = $(this).attr('data-edit-prioridad');
							    		getPrioridad(id);
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





            				$('#data-table-prioridades tfoot td').each( function () {
						        var title = $(this).text();
						        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
						    } );


						    data_table_prioridades.columns().every( function () {
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


        var iniciarTablaTiposEstudios = function()
        {
            var data_table_tipos_estudios =$("#data-table-tipos-estudio").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de Tipos de Servicios',
                exportOptions: {
                    columns: [ 0, 1 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Tipos de Servicios',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Tipos de Servicios',
                exportOptions: {
                    columns: [ 0, 1 ]
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





            				$('#data-table-tipos-estudio tfoot td').each( function () {
						        var title = $(this).text();
						        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
						    } );


						    data_table_tipos_estudios.columns().every( function () {
						        var that = this;
						 
						        $( 'input', this.footer() ).on( 'keyup change', function () {
						            if ( that.search() !== this.value ) {
						                that
						                    .search( this.value )
						                    .draw();
						            }
						        } );
						    } );
                
        };


        var getPrioridad = function(id)
        {
        	$.ajax({
        		url: "{{ url('get_prioridad_ese') }}",
                type:'GET',
                data:{id_prioridad:id},
                dataType: 'json',
                success:function(response){
                	if( response.data.status == 'success' )
                	{
                		
                		$('#id_prioridad_edit').val(id);
                		$('#edit-prioridad-nombre').val( $.trim(response.data.prioridad['nombre']) );
                		$('#edit-prioridad-descripcion').val( $.trim(response.data.prioridad['descripcion']) );
                		$('#prioridad-dias-edit').val( $.trim(response.data.prioridad['numero_maximo_dias']) );                		
                		$('#editPrioridadServicioEseModal').modal({show:true});
                	}
                },
                error : function(jqXHR, status, error) {
                            alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo ' + status);
                }

        	});
        };

        var getTipoServicio = function( id )
        {        	
        	$.ajax({
        		url: "{{ url('tipo_estudio_ese_edit') }}",
                type:'GET',
                data:{id_tipo_estudio:id},
                dataType: 'json',
                success:function(response){

                	if( response.data.status == 'success' )
                	{                		
                		$('.alerta-tipo-servicio').hide();
                		$('#id_tipo_servicio_edit').val(id);
                		$('#tipo_estudio_edit').val( $.trim(response.data.tipo_servicio['tipo_estudio']) );                		
                		$('#editTipoServicioServicioEseModal').modal({show:true});
                	}
                },
                error : function(jqXHR, status, error) {
                            alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo ' + status);
                }

        	});
        }

        var getEse = function( ){ 
        	
        	$.ajax({
                url: "{{ url('modulo/administrador/servicios/listado-estudios-ese') }}",
                type:'GET',
                dataType: 'json',
                success:function(response){
                    
                    if(response.data){
                    	strSelect = '<select class="form-control" id="servicio_ese_select" >';
                    	strSelect += '<option value="-1">Seleccione una opción</option>'

                    	$.each(response.data.tipos_estudio,function(indice){
                    		strSelect += '<option value="'+ response.data.tipos_estudio[indice].id_servicio_ese +'">'+ response.data.tipos_estudio[indice].tipo_estudio +'</option>';
                    		
                    	});

                    	strSelect += '</select>';

                    	$('#select-tipo-estudio').empty().append(strSelect);





                    	strSelectPrioridades = '<select class="form-control" id="tipo_prioridad">';
                    	strSelectPrioridades += '<option value="-1">Seleccione una opción</option>'	
                    	$.each(response.data.prioridades,function(indice){
                    			strSelectPrioridades += '<option value="'+ response.data.prioridades[indice].id +'">'+ response.data.prioridades[indice].nombre +'</option>';
                    	});

                    	strSelectPrioridades += '</select>';

                    	$('#select-prioridad-ese').empty().html(strSelectPrioridades);



                    	
                    	$("#modalServicioRysTitleEdit").html("Edición registro ESE");
                    	$("#altaServicioEseModal").modal({show:true});

                    	initSelectServicios();
                    }
                    


                },
                error : function(jqXHR, status, error) {
                            alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo ' + status);
                }
            });
        }



        var initSelectServicios = function(){ 

        	$('#servicio_ese_select').change(function(){
        		id = $(this).val(); 	        		        		
        		$('#id_servicio_ese').val(id);        		
        	});

        	$('#tipo_prioridad').change(function(){
        		prioridad = $(this).val();
        		$('#prioridad').val( prioridad );
        	});
        }
</script>

@endsection