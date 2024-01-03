@extends('layouts.masterMenuView')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Utilerias</a></li>		
		<li><a href="{{ url('utilerias/impuestos') }}">Impuestos</a></li>
		<li><a href="javascript:;">Listado</a></li>
		
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
		            <h4 class="panel-title text-center">Listado de impuestos</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-3 col-md-offset-9">
		            		<a 	href="javascript:;" 
		            			id="btn-create-impuesto" 
		            			class="btn btn-inverse btn-icon btn-circle btn-lg" 
		            			data-toggle="tooltip" 
		            			data-placement="top" 
		            			title="" 
		            			data-original-title="Alta de impuesto">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</a>
							<label>Nuevo impuesto</label>
		            	</div>
		            </div>
		            <hr>
		            @if( session('success') )
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
			            				<th>Nombre</th>
				            			<th>Tasa</th>
				            			<th>Acción</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="3" class="text-center">Impuestos</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach ($impuestos as $impuesto )
			            				<tr>
			            					<td>{{ $impuesto->nombre }}</td>
			            					<td>{{ $impuesto->tasa }}</td>
			            					<td>
			            						<input type="hidden" value="{{ $impuesto->id }}" class="id-impuesto">
			            						<a href="javascript:;" class="btn btn-primary btn-circle btn-edit-impuesto">
			            							<i class="fa fa-edit"></i>
			            						</a>
			            						<a href="javascript:;" class="btn btn-danger btn-circle">
			            							<i class="fa fa-trash"></i>
			            						</a>
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



<div id="modal-impuestos" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form action="{{ url('utilerias/impuestos') }}" method="POST">
			{{ csrf_field() }}
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <h4 class="modal-title text-center"> <i class="fa fa-pencil fa-2x"></i> Impuestos</h4>
			</div>
			<div class="modal-body">
			  <div class="row">
			  	<div class="col-md-6 form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
			  		<label><strong>Nombre</strong></label>
			  		<input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
			  		{!!  $errors->first('nombre','<span class="help-block">:message</span>') !!}
			  	</div>
			  	<div class="col-md-6 form-group {{ $errors->has('tasa') ? 'has-error' : '' }} ">
			  		<label><strong>Tasa</strong></label>
			  		<input type="text" class="form-control" name="tasa" value="{{ old('tasa') }}">
			  		{!!  $errors->first('tasa','<span class="help-block">:message</span>') !!}
			  	</div>
			  </div>
			  	
			      
			</div>
			<div class="modal-footer">
				@if( count( $errors ) > 0 )
				<a href="{{ url('utilerias/impuestos') }}" class="btn btn-danger">Cancelar</a>
				@else
			    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			    @endif
			    <button class="btn btn-primary">Guardar</button>
			</div>
	    </form>
    </div>
  </div>
</div>

<div id="modal-impuestos-edit" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form id="form-impuesto-edit" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <h4 class="modal-title text-center"> <i class="fa fa-pencil fa-2x"></i> Impuestos</h4>
			</div>
			<div class="modal-body">
			  <div class="row">
			  	<div class="col-md-6 form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
			  		<label><strong>Nombre</strong></label>
			  		<input type="hidden" id="impuesto-id">
			  		<input type="text" class="form-control" name="nombre" id="impuesto-name" value="{{ old('nombre') }}">
			  		{!!  $errors->first('nombre','<span class="help-block">:message</span>') !!}
			  	</div>
			  	<div class="col-md-6 form-group {{ $errors->has('tasa') ? 'has-error' : '' }} ">
			  		<label><strong>Tasa</strong></label>
			  		<input type="text" class="form-control" name="tasa" id="impuesto-tasa" value="{{ old('tasa') }}">
			  		{!!  $errors->first('tasa','<span class="help-block">:message</span>') !!}
			  	</div>
			  </div>
			  	
			      
			</div>
			<div class="modal-footer">
				@if( count( $errors ) > 0 )
				<a href="{{ url('utilerias/impuestos') }}" class="btn btn-danger">Cancelar</a>
				@else
			    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			    @endif
			    <button class="btn btn-primary">Guardar</button>
			</div>
	    </form>
    </div>
  </div>
</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')




<script type="text/javascript">

	var showModalImpuestos = function()
	{
	    $('#modal-impuestos').modal({
	        backdrop:'static',
	        keyboard: false
	    });
	}

	var showModalImpuestosEdit = function( id_impuesto )
	{
		let form_action = "{{ url('utilerias/impuestos') }}" + "/" + id_impuesto;
		$('#form-impuesto-edit').attr('action', form_action );
	    $('#modal-impuestos-edit').modal({
	        backdrop:'static',
	        keyboard: false
	    });
	}

	var getImpuesto = function( id_impuesto )
	{
		$.ajax({
			url: "{{ url('utilerias/impuestos') }}" +"/"+ id_impuesto +"/edit",
			type: "GET",
			dataType: "json",
			success: function( response )
			{
				$('#impuesto-name').val( response.nombre );
				$('#impuesto-tasa').val( response.tasa );
				$('#impuesto-id').val( response.id );
				showModalImpuestosEdit( response.id );
			},
			error : function(xhr, status) 
			{
		    	console.error('Upss, algo salio mal!!');
		    }
		});
	}


	$(document).ready(function(){
    	iniciarTabla();
    	$('#btn-create-impuesto').click(function(){
    		showModalImpuestos();    		
    	});

    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

    	}); 

    	$('.btn-edit-impuesto').click(function(){
    		let index 		= $('.btn-edit-impuesto').index(this);
    		let id_impuesto	= $( $('.id-impuesto').get( index ) ).val();
    		getImpuesto( id_impuesto );
    	});   	

    });

    @if( count( $errors ) > 0 )
		showModalImpuestos();
	@endif

	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                columns: [
				    { width: "40px" },
				    { width: "40px" },
				    { width: "20px" }
				],
                title: 'Listado de impuestos',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de impuestos',
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
                title: 'Listado de impuestos',
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