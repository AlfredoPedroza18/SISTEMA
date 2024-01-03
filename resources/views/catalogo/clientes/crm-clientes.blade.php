@extends('layouts.masterMenuView')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">

		@if( $peticion == 'catalogo/clientes' )
		<!-- <li><a href="javascript:;">Catálogo</a></li> -->
		@else
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		@endif
		<li>Clientes/Prospectos</li>

	</ol>

	<h1 class="page-header text-center">CLIENTES/PROSPECTOS<small>ABM</small></h1>
	@if(session('success'))
		<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
		<script>
			swal({
				title: "<h3>¡ El registro se actualizó con éxito !</h3> ",
				html: true,
				type: "success"

			});
		</script>
	@endif



	<div class="row">
		<div class="col-md-4 col-md-offset-5  col-xs-12 form-inline">

			 <div class="form-group">
			    	<label for="exampleInputEmail1">Status</label>
			    	<select  class="form-control" id="status-clientes">
			    		<option value="todos">Todos</option>
		           		<option value="Si">Activo</option>
		           		<option value="No">Inactivo</option>
		           		<option value="sus">Suspendido</option>
		            </select>
			 </div>

			<!--
				Le camobiamos al al ID por uno que se llame tipo
			-->			
			 <div class="form-group">
			    	<label for="exampleInputEmail1">Tipo</label>
			    	<select  class="form-control" id="tipo">
			    		<option value="todos">Todos</option>
		           		<option value="cli">Clientes</option>
						   <option value="pros">Prospectos</option>
		            </select>
			 </div>
        </div>

		@permission('crear.clientes')
		<div class="col-md-3 col-xs-12 text-center">


				@if( $peticion == 'catalogo/clientes' )
				@permission('crear.clientes')
				<a href="{{ route('sig-erp-crm::catalogo.clientes.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Alta de Cliente/Prospecto">
					<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
				</a>
				@endpermission
				@else
				@permission('crear.clientes')
			    <a href="{{ route('sig-erp-crm::clientes.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Alta de Cliente/Prospecto">
					<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
				</a>
				@endpermission
				@endif
				<label>Añadir Cliente/Prospecto</label>
		</div>
		@endpermission

	</div>


	<div class="row">
    <p></p>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
							<!--
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							-->
                                <?php
                                /*<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>*/
                                ?>
                            </div>
                            <h4 class="panel-title text-center table-responsive">Listado Clientes/Prospectos</h4>
                        </div>
                        <div class="panel-body table-responsive" id="lista-clientes">

                        </div>
                    </div>

	</div>


</div> <!--End  content-->

<!-- Modal de cambio de CN -------------------- -->

<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><center>Cambiar de Centro de Negocio</center></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12"><div id="err-cn"></div></div>
					<div class="col-md-12"><div id="name-cliente"></div></div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label for="" id="lbcentroNegocioCliente"></label>
						<div id="centroNegocioCliente"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">

						<div class="form-group">
							<label for="">Cambiar de Centro de Negocio</label>
								<form id="form-cn">

								{{ Form::select('id_cn',$cn,null,['class'=>' form-control','id'=>'id_cn','style'=>'width: 100%']) }}
								<input type="hidden" name="id_cliente" id="idCliente">
								<input type="hidden" name="peticion" value="{{ $peticion }}">

							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
				<a href="javascript:;" class="btn btn-sm btn-success" id="guardar-cn">Cambiar</a>
			</div>
		</div>
	</div>
</div>
<!-- end Modal de cambio de CN -------------------- -->

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')


	<!-- ================== BEGIN PAGE LEVEL JS ==================  -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
=======
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->

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

		<!-- ================== BEGIN PAGE LEVEL JS ================== -->

	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}


	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}

	{!! Html::script('assets/plugins/switchery/switchery.min.js') !!}
	{!! Html::script('assets/plugins/powerange/powerange.min.js') !!}
	{!! Html::script('assets/js/form-slider-switcher.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}

	<script>
	function EliminarClientes(valor){
		var indice 		= valor;
		var coma = indice+'cc';
		// $('.btn-eliminar-registro').index(this);

		 var id_cliente = document.getElementById(indice).value;

		console.log(id_cliente);

							var tipo_cliente= document.getElementById(coma).value;
							console.log(tipo_cliente)
							var cliente 	= $('.nombre-cliente').get(indice);

							var ruta		= "{{ url('clientesEliminar') }}/"+id_cliente+"";
							var token 		= $('meta[name="csrf-token"]').attr('content');



							if(tipo_cliente ==2){
								swal(cliente,'¡Ya contiene un contrato NO es posible eliminarlo!','warning');
							}else{
								$.ajax({
									headers: {'X-CSRF-TOKEN':token},
									url: ruta,
									type: 'DELETE',
									dataType: 'json',
									success: function(response){
										limpiarDataTable();
										clientes_estatus = $('#status-clientes').val();
										tipo = $('#tipo').val();//generamos una var para adquirir el valor del tipo
										listarClientes(clientes_estatus,tipo); // Cargara todos los registros
										swal({
											title: "<h3>¡ El registro se elimino con éxito !</h3> ",
											html: true,
											type: "success",
											confirmButtonText: "OK"
										});

										//setTimeout(function(){     location.reload();   }, 1000);
									},
									error : function(jqXHR, status, error) {

										swal('El registro se elimino con éxito');
									}
								});



						}
	}
		$(document).ready(function() {



			FormSliderSwitcher.init();

			listarClientes(0,0);


		   //TableManageButtons.init();
		   TableManageCombine.init();
		   $('#status-clientes').change(function(){
					valor_status = $(this).val();
					limpiarDataTable();
					listarClientes(valor_status,$('#tipo').val());//aqui se agrego $('#tipo').val()
			});


			//se agrego completo
			$('#tipo').change(function(){
					tipo = $(this).val();
					limpiarDataTable();
					listarClientes($('#status-clientes').val(),tipo);
			});
		  	//Dtatables
        	$('[data-toggle="tooltip"]').tooltip();//TOOLTIPS EDITAR ELIMINAR

        	$("#guardar-cn").click(function(event){
        		cambiarCn();

        	});

		});


		var listarClientes = function(status,tipo){//aqui se le agrego el tipo

				$.ajax({
					url: '{{ url('lista_clientes') }}',
					type: 'GET',
					dataType: 'json',
					data:{status:status,llamada:0,tipo:tipo},
					success:function(clientes){

								var ruta_edit_clientes = '';



								@if( $peticion == 'catalogo/clientes' )
									ruta_edit_clientes = '{{ route('sig-erp-crm::catalogo.clientes.index') }}';
								@else
									ruta_edit_clientes = '{{ route('sig-erp-crm::clientes.index') }}';
								@endif


								var ruta_accion_clientes = '{{ route('sig-erp-crm::accionXcliente.index') }}';
								var listadoClientes = '<table id="data-table" class="table table-striped table-bordered dt-responsive ">'
														+' <thead>'
														+' <tr>'
														+'<th style="width: 1px;"> </th>'
														+' <th class="botones-accion-clientes hidden-sm hidden-xs hidden-print" style="width:60px;">Acción</th>'

															+' <th>ID</th>'
															+' <th class="hidden-md hidden-lg">Accion</th>'


	                                    					+' <th>Nombre</th>'
	                                    					+' <th>Tipo</th>'
	                                    					+' <th>Clasificación</th>'
	                                    					// +' <th>Gerencia</th>'
	                                    					+' <th>Contacto</th>'
	                                    					+' <th>Teléfono</th>'
	                                    					+' <th>Celular</th>'
	                                    					+' <th>Correo</th>'
	                                    					+' <th>Status</th>'
                                    						+'</tr>'
						                                +' </thead>'
						                                +'<tbody>';
                                 var contador = 1;
                                 var clase = '';
                                 $.each(clientes,function(indice
){									
                                 	var status=clientes[indice].STATUS;
                                 	if(clientes[indice].STATUS == "1") 		status = 'Activo';
                                 	else if(clientes[indice].STATUS == "2")	status = 'Inactivo';
                                 	else if(clientes[indice].STATUS == "3")	status = 'Suspendido';
											var com = indice+"cc";
  									clase = (clientes[indice].tipo == 1) ? 'label label-primary':'label label-warning';
                                 	 //clase =  (contador%2) == 0 ? 'class="gradeA odd"': 'class="gradeA even"';
									listadoClientes+= 	'<tr '+clase+' >'+
									                        '<td style="width: 1px;""></td>'+
															'<td class="text-center botones-accion-clientes  hidden-xs hidden-print" style="width:60px;>'
														  		+ '<input type="hidden"  value="">'
														  		+ '<input type="hidden" class="nombre-cliente" value="'+clientes[indice].nombre_cliente+'">'
														  		+ '<input type="hidden" id="'+com+'" class="cliente-contrato" value="'+clientes[indice].tipo+'">'
																+ '<input type="hidden" class="id-cliente" id="'+indice+'" value="'+clientes[indice].id+'">'+
															'<div class="row">'+
															    '<div class="col-md-3" style="margin-right:4px">'+
															@permission('editar.clientes')


														  		'<a href="'+ruta_edit_clientes+'/'+clientes[indice].id+'/edit" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp'+
														  	@endpermission
														  	     '</div>'+
														  	 	'<div class="col-md-3 " style="margin-right:4px">'+
                                                			@permission('eliminar.clientes')
															'<a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" onclick="EliminarClientes('+indice+')"><i class="fa fa-trash-o"></i></a>'+
                                                			@endpermission
                                                			      '</div>'+
                                                			      '<div class="col-md-3" style="margin-right:8spx" >'+
                                                			@permission('clientes.cambiarcn')
                                                				'<button type="button" class="btn btn-info btn-icon btn-circle btn-sm btn-cambiar-cn" data-toggle="modal" data-target="#modal-dialog" data-placement="top" title="Cambiar de CN"><i class="fa fa-exchange"></i></button>&nbsp&nbsp&nbsp'+
                                                			@endpermission
                                                			      '</div>'+
                                                			'</div>'+

                                            				'</td>'+
															'<td>'+ clientes[indice].id+'</td>'+
															'<td class="text-center botones-accion-clientes hidden-sm hidden-md hidden-lg" >'
														  		+ '<input type="hidden" class="nombre-cliente" value="'+clientes[indice].nombre_cliente+'">'
																+ '<input type="hidden"  id="'+indice+'" class="id-cliente" value="'+clientes[indice].id+'">'
																+ '<input type="hidden" id="'+com+'" class="cliente-contrato" value="'+clientes[indice].tipo+'">'+
															@permission('editar.clientes')
														  		'<a href="'+ruta_edit_clientes+'/'+clientes[indice].id+'/edit" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp'+
														  	@endpermission
                                                			@permission('eliminar.clientes')
															'<a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" onclick="EliminarClientes('+indice+')"><i class="fa fa-trash-o"></i></a>'+
                                                			@endpermission
                                                			@permission('clientes.cambiarcn')
                                                				'<a href="#modal-dialog" class="btn btn-info btn-icon btn-circle btn-sm btn-cambiar-cn" data-toggle="tooltip Modal" data-placement="top" title="Departamento"><i class="fa fa-exchange"></i></a>&nbsp&nbsp&nbsp'+
                                                			@endpermission

                                            				'</td>'+

                                                            @if( $peticion == 'catalogo/clientes' )
                                                           '<td > '+ clientes[indice].nombre_cliente+'</td>'+
                                                            @else
															'<td > <a href="'+ruta_accion_clientes+'/'+clientes[indice].id+'">'+ clientes[indice].nombre_cliente+'</a></td>'+
															 @endif





														  	'<td>'+ clientes[indice].tipo_cliente + '</td>'+
														  	'<td><span class="'+clase+'">'+ clientes[indice].clasificacion + '</span></td>'+


														  	// '<td>'+ clientes[indice].nombre_cn + '</td>'+
'<td>'+ clientes[indice].nombre_contacto +" "+ clientes[indice].apellido_paterno+" "+clientes[indice].apellido_materno +'</td>'+
														  	'<td>'+ clientes[indice].telefono1 + '</td>'+
														  	'<td>'+ clientes[indice].celular1 + '</td>'+
														  	'<td>'+ clientes[indice].correo1 + '</td>'+

														  	'<td>'+ status + '</td>'+


														'</tr>';

								});
                                    listadoClientes+='</table>';
				$('#lista-clientes').append(listadoClientes);

								//TableManageButtons.init();
								//TableManageCombine.init();
								iniciarTabla();
								botonesABM_Clientes.init();


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

				$('.btn-cambiar-cn').on('click', function () {
					        var indice 		= $('.btn-cambiar-cn').index(this);
							var cliente 	= $('.nombre-cliente').get(indice).value;
							var id_cliente 	= $('.id-cliente').get(indice).value;
							$("#idCliente").val(id_cliente);
                            $("#name-cliente").html("<center><h3>"+ cliente+'</h3></center>');

  					$('#modal-dialog').modal();
				});







					// $('.btn-eliminar-registro').click(function(event){

					// 		event.preventDefault();

						// 	var indice 		= $('.btn-eliminar-registro').index(this);
						// 	var tipo_cliente= $('.cliente-contrato').get(indice);
						// 	var cliente 	= $('.nombre-cliente').get(indice).value;
						// 	var id_cliente 	= $('.id-cliente').get(indice).value;
						// 	var ruta		= "{{ url('clientes') }}/"+id_cliente+"";
						// 	var token 		= $('meta[name="csrf-token"]').attr('content');

						// 	if(tipo_cliente.value ==2){
						// 		swal(cliente,'¡Ya contiene un contrato NO es posible eliminarlo!','warning');
						// 	}else{
						// 		swal({
						// 			title: "<h3>¿ Estas seguro de eliminar el registro ?</h3> ",
						// 			text: "<h1><span style=\"color:#FF9933\">"+cliente+"<span></h1>",
						// 			html: true,
						// 			type: "warning",
						// 			showCancelButton: true,
						// 			closeOnConfirm: false,
						// 			showLoaderOnConfirm: true,
						// 			cancelButtonText: 'Cancelar',
						// 			confirmButtonColor: 'ef9d1e'
						// 		}, function(){
						// 				$.ajax({
						// 					headers: {'X-CSRF-TOKEN':token},
						// 					url: ruta,
						// 					type: 'DELETE',
						// 					dataType: 'json',
						// 					success: function(response){
						// 								limpiarDataTable();
						// 								clientes_estatus = $('#status-clientes').val();
						// 								listarClientes(clientes_estatus); // Cargara todos los registros
						// 								swal({
						// 										title: "<h3>¡ El registro se elimino con éxito !</h3> ",
						// 										html: true,
						// 										type: "success",
						// 										confirmButtonText: "OK"
						// 									});

						// 								//setTimeout(function(){     location.reload();   }, 1000);
						// 							},
						// 					error : function(jqXHR, status, error) {

						// 					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
						// 					        }
						// 				});

						// 		});



						// }
					// });




			}
		}

		var cambiarCn= function(){
			event.preventDefault();
			var cn=$("#id_cn").val();
			if(cn==''){
				$("#err-cn").html("<div class=\"alert alert-warning\"><center><strong>Alerta!</strong> Favor de seleccionar un CN.</center></div>");
				$("#err-cn").fadeOut(5000);
			}else{
				var datos=$("#form-cn").serialize();
				var token=$('meta[name="csrf-token"]').attr('content');
				$.ajax({
						headers:{'X-CSRF-TOKEN':token},
						url:'{{url('cambiarClienteCN')}}',
						type:'GET',
						dataType: 'json',
						data: datos,
						success:function(response){
							if(response.error=='wrong'){
								$("#err-cn").html("<div class=\"alert alert-warning\"><center><strong>Alerta!</strong> El cliente ya esta asignado a este Centro de negocio </center></div>");
							$("#err-cn").fadeOut(5000);
							setTimeout(function(){
									$('#modal-dialog').modal('hide');
									window.location.reload();
								}, 3000);

							}
							if(response.status_alta=="success"){
							$("#err-cn").html("<div class=\"alert alert-success\"><center><strong>Exito! </strong> El cliente cambio correctamente al "+response.cn+"</center></div>");
							$("#err-cn").fadeOut(5000);
							setTimeout(function(){
									$('#modal-dialog').modal('hide');
									window.location.reload();
								}, 3000);
							}

						},
						error : function(jqXHR, status, error) {
							swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
						}
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
                title: 'Listado de Clientes/Prospectos',
                exportOptions: {
                    columns: [ 4,5,6,7,8,9,10,11,12 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Clientes/Prospectos',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 4,5,6,7,8,9,10,11,12 ]
                }

            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Clientes/Prospectos',
                exportOptions: {
                    columns: [ 4,5,6,7,8 ,9,10,11,12]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
                                "paging": true,
                                "drawCallback": function( settings ) {
							        botonesABM_Clientes.init();
							    },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   1
        } ],
                                "footerCallback": function ( row, data, start, end, display ) {
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

                                }

                            } );

        }

        var number_format = function(amount, decimals) {
            amount += ''; // por si pasan un numero en vez de un string
            amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
            decimals = decimals || 0; // por si la variable no fue fue pasada
            // si no es un numero o es igual a cero retorno el mismo cero
            if (isNaN(amount) || amount === 0)
                return parseFloat(0).toFixed(decimals);
            // si es mayor o menor que cero retorno el valor formateado como numero
            amount = '' + amount.toFixed(decimals);
            var amount_parts = amount.split('.'),
                regexp = /(\d+)(\d{3})/;
            while (regexp.test(amount_parts[0]))
                amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

            return amount_parts.join('.');
        };

		//al dar clic en btn cambiar cn se le asigna al inputcon id idCliente, el id del cliente
		$(document).on("click", "#lista-clientes .btn-cambiar-cn", function(){
			var indice = $('.btn-cambiar-cn').index(this);
			var cliente = $('.nombre-cliente').get(indice).value;
			var id_cliente = $('.id-cliente').get(indice).value;
			$("#idCliente").val(id_cliente);
			getCentroNegocio($("#idCliente").val(),cliente);
		});

		const getCentroNegocio = (IdCliente,NombreCliente) => {
			document.getElementById('centroNegocioCliente').innerHTML = "";
			document.getElementById('lbcentroNegocioCliente').innerHTML = `Centro de negocio asignado al cliente <b>${NombreCliente}</b>:`;
			$.ajax({
				url: `{{ url('getCentroNegocio') }}/${IdCliente}`,
				type: "GET",
				success: function(response){
					response.forEach((element,index)=>{
						let cn =document.getElementById('centroNegocioCliente').innerHTML;
						if(index > 0)
							cn = cn+'<br>';
						document.getElementById('centroNegocioCliente').innerHTML = cn + `<label>${element.cn}</label>`;
					});
				},
				error: function(){

				}
			});
		}
	</script>
@endsection
