@extends('layouts.masterMenuView')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		<li>Listado Borradores</li>

	</ol>
	
	<h1 class="page-header text-center">BORRADORES <small>LISTADO</small></h1>

	<div class="row">
    <p></p>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <?php
                /*<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>*/
                ?>
            </div>
            <h4 class="panel-title text-center table-responsive">Listado Borradores</h4>
        </div>
        <div class="panel-body" id="listado-borradores" >                                       	
        		
        </div>
    </div>
       
	</div>


</div> <!--End  content-->



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
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}

	{!! Html::script('assets/js/sweetalert.min.js') !!}

	<script>
		$(document).ready(function() {

			iniciarTabla();
			listaBorradores();

		});

		var listaBorradores = function(){
			var ruta = '{{ url('correos') }}';
			$.ajax({
				url:'{{ url('all_borradores') }}',
				type:'GET',
				dataType:'json',
				success:function(borradores){
					
					str_html = '';
					str_html += '<table id="data-table" class="table table-striped table-bordered">';
					str_html += ' <thead>';
					str_html += 	'<tr>';
					str_html += 		'<th>Titulo</th>';
					str_html += 		'<th>Descripción</th>';
					str_html += 		'<th>Creación</th>';
					str_html += 		'<th>Acción</th>';
					str_html += 	'</tr>';
					str_html += ' <thead>';
					str_html += ' <tbody>';
					$.each(borradores,function(indice){
						console.log(borradores[indice]);
							str_html += '<tr>';
							str_html += 	'<td>'+borradores[indice].titulo+'</td>';
							str_html += 	'<td>'+borradores[indice].descripcion+'</td>';
							str_html += 	'<td>'+borradores[indice].fecha_creacion+'</td>';
							str_html +=		'<td class="text-center botones-accion-clientes visible-md-3  visible-lg-3">'
										  		+ '<input type="hidden" class="nombre-borrador" value="'+borradores[indice].titulo+'">'
												+ '<input type="hidden" class="id-borrador" value="'+borradores[indice].id+'">'+	
										  		'<a href="'+ruta+'/'+borradores[indice].id+'/edit" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-send-o"></i></a>&nbsp&nbsp'+
                                												  	    
                                				'<a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro" data-toggle="tooltip" data-placement="top" title="Eliminar Registro"><i class="fa fa-trash-o"></i></a>'+

                            				'</td>';

							str_html += 	'</tr>';
					});
					str_html += '</tbody>'
					str_html += '</table>'

					$('#listado-borradores').html(str_html);
					botonesABM.init();
					iniciarTabla();

				},
				error:function(){
					console.log('Error.......');
				}
			});
		}


		var botonesABM = {
			init: function(){



					$('.btn-eliminar-registro').click(function(event){
							swal('Quiero eliminar');
							event.preventDefault();			

							var indice 		= $('.btn-eliminar-registro').index(this);
							var cliente 	= $('.nombre-borrador').get(indice).value;
							var id_borrador	= $('.id-borrador').get(indice).value;
							var ruta		= "{{ url('correos') }}/"+id_borrador+"";
							var token 		= $('meta[name="csrf-token"]').attr('content');

							swal({   
								title: "<h3>¿ Estas seguro de eliminar el registro ?</h3> ",
								text: "<h1><span style=\"color:#FF9933\">"+cliente+"<span></h1>",   
								html: true,
								type: "warning",   
								showCancelButton: true,   
								closeOnConfirm: false,   
								showLoaderOnConfirm: true, 
								cancelButtonText: 'Cancelar',
								confirmButtonColor: 'ef9d1e'
							}, function(){ 
									$.ajax({
										headers: {'X-CSRF-TOKEN':token},
										url: ruta,									
										type: 'DELETE',
										dataType: 'json',
										success: function(response){ 
													$('#listado-borradores').empty();
													 
													listaBorradores(); // Cargara todos los registros
													swal({   
															title: "<h3>¡ El registro se elimino con éxito !</h3> ",
															html: true,
															type: "success",   
															confirmButtonText: "OK"													
														}); 

													//setTimeout(function(){     location.reload();   }, 1000);
												},
										error : function(jqXHR, status, error) {

										            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
										        }
									});
										 
							});	
					});	

					


			
			}
		
		}
			var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
            	// "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                dom: 'Blfrtip',
                               
                    
                                buttons: [
                {
                extend: 'excelHtml5',
                title: 'Listado de Borradores de correo',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Borradores de correo',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Borradores de correo',
                exportOptions: {
                    columns: [ 0,1,2]
                }
             }

                                ],
                                responsive: false,
                                autoFill: true,                                
                                "paging": true,
            
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   1
        } ]
                           
                            } );
                
        }
	</script>
@endsection























