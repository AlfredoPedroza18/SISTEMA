@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Utilerias</a></li>		
		<li><a href="{{ url('utilerias/plantillas') }}">Plantillas</a></li>
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
		            <h4 class="panel-title text-center">Listado de plantillas</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-2 col-md-offset-7">
		            		<a 	href="{{ url('utilerias/plantillas/create') }}"
		            			class="btn btn-inverse btn-icon btn-circle btn-lg" 
		            			data-toggle="tooltip" 
		            			data-placement="top" 
		            			title="" 
		            			data-original-title="Alta de plantilla">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</a>
							<label>Nueva plantilla</label>
		            	</div>
		            	<div class="col-md-2">
		            		<a 	href="javascript:;"
		            			id="btn-duplicate-template" 
		            			class="btn btn-inverse btn-icon btn-circle btn-lg" 
		            			data-toggle="tooltip" 
		            			data-placement="top" 
		            			title="" 
		            			data-original-title="Duplicar plantilla">
								<i class="fa fa-copy" aria-hidden="true"></i>
							</a>
							<label>Duplicar plantilla</label>
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
				            				<th colspan="3" class="text-center">Plantillas</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach ($plantillas as $plantilla )
			            				<tr>
			            					<td>{{ $plantilla->nombre }}</td>
			            					<td>{{ $plantilla->descripcion }}</td>
			            					<td>
			            						<input type="hidden" value="{{ $plantilla->id }}" class="id-impuesto">
			            						<a href="{{ url('utilerias/plantillas/' . $plantilla->id. '/edit') }}" class="btn btn-primary btn-circle btn-sm">
			            							<i class="fa fa-edit"></i>
			            						</a>
			            						<a 	href="javascript:;" 
			            							class="btn btn-danger btn-circle btn-sm"
			            							onclick="deleteTemplate( {{ $plantilla->id }} )">
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

<form id="frmDleteTemplate" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="DELETE">
</form>



<div id="modal-plantilla-cotizacion" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<form 	action="{{ route('sig-erp-crm::duplicate.cotizacion.generica') }}" 
				method="POST" 
				id="frmDuplicateTemplate"
				class="form-horizontal">
				{{ csrf_field() }}	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center"> <i class="fa fa-file-pdf-o fa-2x"></i> Duplicar Plantilla</h4>
      </div>
      <div class="modal-body">
      		<div class="row">
      			<div class="col-md-12">
      				
						<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">
						    	<input type="text" name="nombre_plantilla" class="form-control" placeholder="Nombre de la plantilla">
						    </div>
					  	</div>
					  	<hr>
					
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-md-12">
			          <table class="table table-hover table-condensed" id="plantilla-cotizacion-table-modal">
			            <thead>
				            <tr>
				                <th>Producto</th>
				                <th>Descripción</th>
				                <th>Acción</th>
				            </tr>
			            </thead>
			            <tbody>
		            	@foreach ($plantillas as $plantilla)
			            	<tr>
			            		<td>{{ $plantilla->nombre }}</td>
			            		<td>{{ $plantilla->descripcion }}</td>
			            		<td>
			            		<input 	type="radio" 
			            				name="id_template" 
			            				value="{{ $plantilla->id }}" 
			            				data-id-tepmlate="{{ $plantilla->id }}"
			            				onclick="checkDuplicateTemplate({{ $plantilla->id }})">
			            			
			            		</td>
		            		</tr>
		            	@endforeach
		                        
		            	</tbody>
		          	</table>
		          </div>
		        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Duplicar</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/sweetalert.min.js') !!}




<script type="text/javascript">
	var deleteTemplate = function( id )
	{
		url = '{{ url('utilerias/plantillas') }}' + '/'+id;
		$('#frmDleteTemplate').attr('action', url);
		confirmDeleteTemplate();
	}

	var showModalDuplicateTemplates = function()
	{
	    $('#modal-plantilla-cotizacion').modal({
	        backdrop:'static',
	        keyboard: false
	    });
	}	

	var confirmDeleteTemplate = function()
	{
	    swal({
	          title: "<h2>¿Deseas eliminar la plantilla?</h2> ",
	          type: "warning",
	          html:true,
	          showCancelButton: true,
	          cancelButtonColor: '#ef9d1e',
	          cancelButtonText: 'Cancelar',
	          confirmButtonColor: "#ef9d1e",
	          confirmButtonText: "Eliminar",
	          
	          closeOnConfirm: false
	    },
	    function(isConfirm){
	      if (isConfirm) {
	        $('#frmDleteTemplate').submit();
	      }else{  
	      	$('#frmDleteTemplate').removeAttr('action');
	      }
	    }); 
	    
	}


	$(document).ready(function(){
    	iniciarTabla();

    	$('#btn-duplicate-template').click(function(){
    		showModalDuplicateTemplates();
    	});

    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

    	}); 

    });

    @if( count( $errors ) > 0 )
		showModalPlantillas();
	@endif

	var iniciarTabla = function(){
            var data_table =$("#data-table,#plantilla-cotizacion-table-modal").DataTable({
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