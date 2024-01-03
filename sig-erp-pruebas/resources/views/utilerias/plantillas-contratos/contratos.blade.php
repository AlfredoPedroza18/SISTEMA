@extends('layouts.master')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Utilerias</a></li>		
		<li><a href="{{ url('utilerias/plantilla_contratos') }}">Plantillas</a></li>
		<li><a href="javascript:;">Listado</a></li>
	</ol>
	
	<h1 class="page-header text-center">CONTRATOS <small>ABM PLANTILLAS</small></h1>




	
 
	<div class="row">
		<div class="col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9 col-xs-12 col-sm-12 text-center">

			    <a href="{{ url('utilerias/plantilla_contratos/create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Alta de Plantillas">
					<i class="fa fa-edit" aria-hidden="true"></i>
				</a>
				<label>Añadir plantilla contrato</label>
						
                        
		</div>
		
	</div>


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
                            <h4 class="panel-title text-center table-responsive">Listado Contratos</h4>
                        </div>
                        <div class="panel-body" id="lista-clientes">                                       	

                        </div>
                    </div>
       
	</div>


</div> <!--End  content-->



@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')


	<!-- ================== BEGIN PAGE LEVEL JS ==================  -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== 
=======
	<!-- ================== BEGIN PAGE LEVEL JS ================== 

	{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js') !!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/js/table-manage-buttons.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}
	<!-- ================== END PAGE LEVEL JS ================== -->

	
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}

	{!! Html::script('assets/plugins/switchery/switchery.min.js') !!}
	{!! Html::script('assets/plugins/powerange/powerange.min.js') !!}
	{!! Html::script('assets/js/form-slider-switcher.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}
	
	<script>
		$(document).ready(function() {
			FormSliderSwitcher.init();

			listarContratos();

					
		   //TableManageButtons.init();
		   iniciarTabla();
		   
		  //Dtatables
        $('[data-toggle="tooltip"]').tooltip();//TOOLTIPS EDITAR ELIMINAR

		});	


		var listarContratos = function(status){
              
				$.ajax({
					url: '{{ url('utilerias/lista_plantillas_contratos') }}',
					type: 'GET',
					dataType: 'json',
					data:{status:status},
					success:function(clientes){
								
										ruta_edit_cartas= '{{ url('utilerias/plantilla_contratos') }}';
								
								var listadoClientes = '<table id="data-table" class="table table-striped table-bordered">'
														+' <thead>'
														+' <tr>'
															+' <th>Titulo</th>'															
	                                    					+' <th>Contenido</th>'
	                                    					+' <th>Usuario</th>'
	                                    					+' <th class="botones-accion-clientes">Acción</th>'
                                        				+' </tr>'
						                                +' </thead>'
						                                +'<tbody>';                               
                                 
                                 $.each(clientes,function(indice){
									                               	                                	
									listadoClientes+= 	'<tr>'+	
															'<td>'+ (clientes[indice].titulo).substr(0,30)+' ...</td>'+
														  	'<td>'+ (clientes[indice].descripcion).substr(0,40)+' ...</td>'+								  	
														  	'<td>'+ clientes[indice].usuario + '</td>'+
														  	'<td class="text-center botones-accion-clientes visible-md-3  visible-lg-3">'
														  		+ '<input type="hidden" class="nombre-cliente" value="'+clientes[indice].titulo+'">'
																+ '<input type="hidden" class="id-cliente" value="'+clientes[indice].id+'">'+	
														  		'<a href="'+ruta_edit_cartas+'/'+clientes[indice].id+'/edit" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp'+
                                                												  	    
                                                				'<a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro" data-toggle="tooltip" data-placement="top" title="Eliminar Registro"><i class="fa fa-trash-o"></i></a>'+

                                            				'</td>'+
														  	
														'</tr>';
													  	
								});	
								listadoClientes+='</tbody>';											
                                listadoClientes+='</table>';
				$('#lista-clientes').append(listadoClientes);

								//TableManageButtons.init();
								botonesABM_Clientes.init();
								iniciarTabla();


					},
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}
				});
		}	


		var limpiarDataTable = function(){
			$('#lista-clientes').empty();
		}


		var botonesABM_Clientes = {
			init: function(){


					$('.btn-eliminar-registro').click(function(event){
							swal('Quiero eliminar');
							event.preventDefault();			

							var indice 		= $('.btn-eliminar-registro').index(this);
							var cliente 	= $('.nombre-cliente').get(indice).value;
							var id_cliente 	= $('.id-cliente').get(indice).value;
							var ruta		= "{{ url('utilerias/baja_contratos') }}";
							var token 		= $('meta[name="csrf-token"]').attr('content');

							swal({   
								title: "<h3>¿ Estas seguro de eliminar la plantilla ?</h3> ",
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
										type: 'get',
										dataType: 'json',
										data:{id:id_cliente},
										success: function(response){ 
													limpiarDataTable();
													clientes_estatus = $('#status-clientes').val();  
													listarContratos(); // Cargara todos los registros
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
                title: 'Listado de cartas tipo',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de cartas tipo',
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
                title: 'Listado de cartas tipo',
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