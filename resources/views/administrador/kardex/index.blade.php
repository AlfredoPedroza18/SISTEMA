@extends('layouts.masterMenuView')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li><a href="{{ url('modulo/administrador/kardex') }}">Kardex</a></li>
		
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
		            <h4 class="panel-title text-center">Listado del Kardex</h4>
		        </div>
		        <div class="panel-body">
		            
		            <hr>
		            
		            <div class="row">
		            	@include('administrador.kardex.table_kardex')

			            	<div class="col-md-12">
			            			<button class="btn btn-success" id="clear-filter">Limpiar Filtros</button>
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

    	$('#clear-filter').click(function(){
    		location.reload();
    	})
    	
    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

    	}); 
    		
    	

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table-kardex").DataTable({                                
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Kardex',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Kardex',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Kardex',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5 ]
                }
             }
                                ],
                                "iDisplayLength": 5,
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



            $('#data-table-kardex tfoot td').each( function () {
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
</script>

@endsection