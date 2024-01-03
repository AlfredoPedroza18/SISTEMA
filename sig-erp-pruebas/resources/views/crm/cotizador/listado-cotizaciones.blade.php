@extends('layouts.master')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">
		@if( $peticion == 'catalogo/listado_cotizaciones' )
		<li><a href="javascript:;">Catálogo</a></li>
		@else
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		@endif		
		<li>Cotizaciones</li>

	</ol>
	
	<h1 class="page-header text-center">LISTADO COTIZACIONES <small></small></h1>


	<div class="row">
	<div class="row">
		<div class="col-md-3 col-md-offset-9 col-xs-12 col-sm-12">
           <div class="invoice-price">
              <div class="invoice-price-right">
               <small>TOTAL GENERAL COTIZACIONES</small> 
               <div id="total-cotizaciones">$ 00.00</div>
               <input type="hidden" class="form-control" id="total_ese" name="total_ese">
              </div>
           </div><!-- end invoice price-->
        </div>
	</div>
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
                            <h4 class="panel-title text-center table-responsive">Listado Cotizaciones</h4>
                        </div>
                        <div class="panel-body" id="lista-cotizaciones">    
                        	                             	

                        </div>
                    </div>
       
	</div>





<!-- Modal crear contrato -->
<div class="modal fade" id="modal-save-contrato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title col-lg-7 col-md-7 col-sm-7 col-xs-7  text-right" >Crear Contrato</h4>
        <i class="fa fa-book fa-2x" aria-hidden="true"></i>
      </div>
      <div class="modal-body">
	    <div class="containerfluid">	    	
	    	<div class="row">
		        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">  

		        	<form id="frm-save-contrato" action="#" method="POST" class="form-horizontal">
		        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
							<div id="mns_contrato"></div>
							  <div class="form-group">	
							  	<label class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12 control-label">Servicio contratado</label>						  	
							  	<div class="col-md-7 col-sm-12">
								    <input type="text" class="form-control text-center input-lg" id="tipo_servicio_contrato" disabled>						  		
							  	</div>
							  </div>								
							
							  <div class="form-group">
							  	<label class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12 control-label">Número de contrato</label>			
							  	<div class="col-md-7 col-sm-12">
								    <input type="text" class="form-control text-center input-lg" disabled="disabled" id="numero_contrato_temp" value="ESE020916CN0101">						  		
							  	</div>
							  </div>

							  <div class="form-group" id="contrato-error-panel">
							  	
							  </div>							

							
							  <div class="form-group">
							    <label for="inputEmail3" class="col-md-3 col-sm-12 col-xs-12 control-label">Fecha Inicio</label>
							    <div class="col-md-3 col-sm-12 col-xs-12">
							      <input type="date" class="form-control" id="fechaInicio">
							    </div>
							    <label for="inputEmail3" class="col-sm-3 col-sm-12 col-xs-12 control-label">Fecha Fin</label>
							    <div class="col-md-3 col-sm-12 col-xs-12">
							      <input type="date" class="form-control" id="fechaFin">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="inputEmail3" class="col-md-3 col-sm-12 col-xs-12 control-label">Empresa</label>
							    <div class="col-md-3 col-sm-12 col-xs-12">
							      <select class="form-control" id="id_empresa_facturadora">
							      	@foreach($facturadoras as $indice => $empresa)
						      		  <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
						      		@endforeach									  
							      </select>
							    </div>
							    <!--label for="inputEmail3" class="col-sm-3 col-sm-12 col-xs-12 control-label">Años</label>
							    <div class="col-md-3 col-sm-12 col-xs-12">
							      <input type="text" class="form-control" id="inputEmail3" placeholder="2" disabled>
							    </div-->
							  </div>
							  <div id="selec_plantillas"></div>



						  <div class="form-group">						    
						    <input type="hidden" 	id="numero_contrato"	   		class="form-control" >
						    <input type="hidden" 	id="id_cotizacion_contrato"	 	class="form-control" >
						    <input type="hidden" 	id="id_servicio_contrato"	 	class="form-control" >
						    <input type="hidden" 	id="id_cliente_contrato"	 	class="form-control" >			 						    
						  </div>
						  
						  
					</form>
		        		
		      	</div>                                     	
	    		
	    	</div>

	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="cancelar-evento" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="btn-save-contrato">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal crear contrato -->


</div> <!--End  content-->

<div id="modal-plantilla-cotizacion" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center"> <i class="fa fa-file-pdf-o fa-2x"></i> Plantilla Cotizador</h4>
      </div>
      <div class="modal-body">
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
            			<a 	class="btn btn-primary btn-circle btn-sm" 
            				onclick="downloadCotizacionGenerica({{ $plantilla->id }})"
            				target="_blank">
            				<i class="fa fa-check"></i>
            			</a>
            			
            		</td>
            	</tr>
            @endforeach
                        
            </tbody>
          </table>
          <form action="{{ route('sig-erp-crm::download.cotizacion.generica') }}" method="POST" id="frmCotizacionGenerica">
			{{ csrf_field() }}	
			<input type="hidden" id="id_cotizacion_download" name="id_cotizacion">
			<input type="hidden" id="id_plantilla_download" name="id_plantilla">
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')


	<!-- ================== BEGIN PAGE LEVEL JS ==================  -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== --> 
	
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}

	{!! Html::script('assets/plugins/switchery/switchery.min.js') !!}
	{!! Html::script('assets/plugins/powerange/powerange.min.js') !!}
	{!! Html::script('assets/js/form-slider-switcher.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}
	
	<script>
		$(document).ready(function() {
			

			listarCotizaciones();
			$('#contrato-error-panel').hide();
			$('#plantilla-cotizacion-table-modal').DataTable();

					
		   //TableManageButtons.init();
		   $("#cancelar-evento").click(function(){
		   	location.reload();
		   });
		   
		   $('#status-clientes').change(function(){
					valor_status = $(this).val();
					limpiarDataTable();
					listarCotizaciones(valor_status);
			});
			  //Dtatables
	        $('[data-toggle="tooltip"]').tooltip();//TOOLTIPS EDITAR ELIMINAR

	        $('#btn-save-contrato').click(function(){

	        	var str_fecha_inicio = $('#fechaInicio').val();
	        	var str_fecha_fin	 = $('#fechaFin').val();
	        	var bandera 		 = true;

	        	
	        	if(str_fecha_inicio != '' && str_fecha_fin != ''){ 
	        		if(str_fecha_inicio != str_fecha_fin){	        		
		        		bandera = diferenciaFechasValidador(str_fecha_inicio,str_fecha_fin);
		        		if(bandera){
		        		
		        		if($('#id_plantilla_contrato').val()=="0"){
					
						$("#mns_contrato").html('<div class="alert alert-info" role="alert"><strong>Info!</strong> Favor de seleccionar una plantilla de contrato.</div><span class="close" data-dismiss="alert">×</');
					}else{
						guardarContrato();
					}

		        				
		        		
		        		}

		        		
		        	}else{
		        		str_error_fechas = '<div class="alert alert-warning fade in m-b-15 text-center">'+
										  		'<strong>¡ Info ! </strong>'+
										  		'<label>Favor de seleccionar una plantilla</label>'+
										  		'<span class="close" data-dismiss="alert">×</span>'+
										  	'</div>';
		        		str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
										  		'<strong>¡ Error ! </strong>'+
										  		'<label>Las Fechas NO pueden ser iguales</label>'+
										  		'<span class="close" data-dismiss="alert">×</span>'+
										  	'</div>';


			        	$('#contrato-error-panel').html(str_error_fechas);
			        	$('#contrato-error-panel').show();
		        	}

	        	}else{
	        		str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
										  		'<strong>¡ Error ! </strong>'+
										  		'<label>¡Seleccione las fechas para generar el contrato!</label>'+
										  		'<span class="close" data-dismiss="alert">×</span>'+
										  	'</div>';


			        	$('#contrato-error-panel').html(str_error_fechas);
			        	$('#contrato-error-panel').show();
	        	}        	
	        	
	        	
	        });

	       

		});	


		var listarCotizaciones = function(){

				$.ajax({
					url: '{{ url('all_cotizaciones') }}',
					type: 'GET',
					dataType: 'json',
					
					success:function(listado_cotizaciones){
								
								var cotizaciones = listado_cotizaciones[0];
								var total_cotizaciones = listado_cotizaciones[1][0].total_cotizaciones;								
								var ruta_edit_clientes = '{{ route('sig-erp-crm::clientes.index') }}';
								var ruta_accion_clientes = '{{ route('sig-erp-crm::accionXcliente.index') }}';
								var listadoCotizaciones = '<table id="data-table" class="table table-striped table-bordered">'
														+' <thead>'
														+' <tr>'															
	                                    					+' <th>Cliente</th>'
	                                    					+' <th>Servicio</th>'
	                                    					+' <th>Centro Negocio</th>'
	                                    					+' <th>Cantidad</th>'
	                                    					+' <th>Fecha</th>'
	                                    					+' <th>Descargar</th>'
	                                    				@permission('cotizaciones.contrato')
	                                    					+' <th>Contrato</th>'
	                                    				@endpermission
                                        				+' </tr>'
						                                +' </thead>'
						                                +'<tfoot>'
											            +'<tr>'
											    +'<th colspan="4" style="text-align:right">Total:</th>'
											                +'<th></th>'
											            +'</tr>'
											       +' </tfoot>'
						                                +'<tbody>';                               
                                 var contador = 1;
                                 var clase = '';
                                 var contrato_generado = '';
                                 $.each(cotizaciones,function(indice){
                                 	let link_servicio = cotizaciones[indice].id_servicio == '4' ? ' javascript:; ' : cotizaciones[indice].ruta;
                                 	let eventoLink 	  = cotizaciones[indice].id_servicio == '4' ? ' onclick="downloadCotizacion('+ cotizaciones[indice].id_cotizacion +')"' : '';
                                 	contrato_generado = (cotizaciones[indice].contrato != 0 ) ? '<spam class="label label-warning">Contrato generado</span>':'';
  
                                 	 clase =  (contador%2) == 0 ? 'class="gradeA odd"': 'class="gradeA even"';
									listadoCotizaciones+= 	'<tr>'+
							                					'<td>'+ cotizaciones[indice].nombre_comercial 			+'</td>'+
							                    				'<td>'+ cotizaciones[indice].servicio 	  	  			+'</td>'+
							                    				'<td>'+ cotizaciones[indice].centro_negocio	  			+'</td>'+
							                    				'<td> $ '+ number_format(cotizaciones[indice].total,2) 	+'</td>'+
							                    				'<td>'+ cotizaciones[indice].fecha_cotizacion 	+'</td>'+
							                    				'<td class="text-center">'+
							                    					'<a href="'+ link_servicio +'" '+ eventoLink +'>'+
							                    						'<span> <i class="fa fa-download fa-2x"></i> </span>'+
							                    					'</a>'+
							                    				'</td>'+
							                    			@permission('cotizaciones.contrato')
							                    				'<td class="text-center">'+
							                    					'<a class="genera-contrato">'+
							                    						'<i class="fa fa-book fa-2x"></i>'+
							                    					'</a>&nbsp;&nbsp;'+contrato_generado+
							                    					'<input type="hidden" class="contrato-ruta-cotizacion" value="'+cotizaciones[indice].ruta_contrato +'">'+
							                    					'<input type="hidden" class="contrato-id-cotizacion" value="'+cotizaciones[indice].id_cotizacion +'">'+
							                    					'<input type="hidden" class="contrato-servicio-cotizacion" value="'+cotizaciones[indice].id_servicio +'">'+
							                    					'<input type="hidden" class="contrato-id-cliente" value="'+cotizaciones[indice].id_cliente +'">'+			                    				
							                    					'<input type="hidden" class="contrato-generado" value="'+cotizaciones[indice].contrato +'">'+
							                    				'</td>'+
							                    			@endpermission
							                				'</tr>';
													  	
								});												
                                    listadoCotizaciones+='</table>';
                                    $('#total-cotizaciones').html('$ '+total_cotizaciones);
									$('#lista-cotizaciones').append(listadoCotizaciones);
								//TableManageButtons.init();
								//botonesABM_Clientes.init();
								$('.genera-contrato').click(function(){
						        	var index 			= $('.genera-contrato').index(this);
						        	var ruta_servicio	= $('.contrato-ruta-cotizacion').get(index);
						        	var id_cotizacion	= $('.contrato-id-cotizacion').get(index);
						        	var id_servicio		= $('.contrato-servicio-cotizacion').get(index);
						        	var id_cliente 		= $('.contrato-id-cliente').get(index);
						        	var tiene_contrato	= $('.contrato-generado').get(index);
						        	var ruta_download   = '';
						        	var servicio 		= id_servicio.value;

						        	
						        	resultadoCampos = validaCamposCliente(id_cliente.value);
						        	
						        	if(!resultadoCampos['resultado']){	



						        		swal({
											  title: "<h4>¡El Cliente tiene campos obligatorios que no han sido llenados!</h4> ",
											  text: "<h6><table class=\"text-center\">"+
											  				"<tr>"+
											  				"<td>Nombre Comercial<td> "+
															"<td>Forma Juridica<td> "+
															"<td>Actividad Económica<td> "+
															"</tr>"+
															"<tr>"+
															"<td>Cargo<td> "+
															"<td>Dirección Fiscal CP<td>"+
															"<td>Dirección Fiscal Estado<td>"+
															"</tr>"+
															"<tr>"+
															"<td>Dirección Fiscal Municipio<td>"+
															"<td>Dirección Fiscal Colonia<td>"+
															"<td>Dirección Fiscal Calle<td>"+
															"</tr>"+
															"<tr>"+
															"<td>Dirección Fiscal No. Exterior<td>"+
															"<td>Dirección Fiscal No. Interior<td>"+
															"<td>Nombre Contácto<td>"+
															"</tr>"+															
															"<tr></table></h6>",
											  type: "warning",
											  html:true,
											  showCancelButton: false,
											  confirmButtonColor: "#ef9d1e",
											  confirmButtonText: "Llenar campos",
											  
											  closeOnConfirm: false
										},
										function(isConfirm){
										  if (isConfirm) {
										  	@if( $peticion == 'catalogo/listado_cotizaciones' )
										    	location.href = '{{ route('sig-erp-crm::catalogo.clientes.index') }}'+'/'+id_cliente.value+'/edit';
										    @else 
										    	location.href = '{{ route('sig-erp-crm::clientes.index') }}'+'/'+id_cliente.value+'/edit';
										    @endif
										  } 	
										});				        		
						        		
										
										return false; 
						        	}					        	
						        	
						        	if(tiene_contrato.value==0){
						        		generaContrato(ruta_servicio.value,id_cotizacion.value,id_servicio.value,id_cliente.value);        		
						        	}else{

						        		if(servicio == 0) ruta_download = '{{ url('descarga_contrato_ese') }}';			        
										if(servicio == 1) ruta_download = '{{ url('descarga_contrato_rys') }}';
										if(servicio == 2) ruta_download = '{{ url('descarga_contrato_maquila') }}';	
										if(servicio == 3) ruta_download = '{{ url('descarga_contrato_psicometricos') }}';	
						        		
						        		swal({
										  title: '¡Ya existe un contrato previo!',
										  text: 'No se puede generar nuevamente un contrato',
										  type: "warning",
										  showCancelButton: true,
										  cancelButtonText:'Cancelar',
										  confirmButtonColor: "#ef9d1e",
										  confirmButtonText: "Descargar contrato",
										  closeOnConfirm: true
										},
										function(){
										  	/******************************************************
										  				DESCARGA LOS CONTRATOS EN WORD
										  	******************************************************/
										  	redireccionar(ruta_download+'/'+id_cotizacion.value);
										});


						        		
						        	}

						        });


								//TableManageCombine.init();
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

		function redireccionar(ruta){
		  window.location=ruta;		  
		}
		

		var guardarContrato 	= function(){
			
			var id_cotizacion 	= $('#id_cotizacion_contrato').val(); 
			var token 			= $('meta[name="csrf-token"]').attr('content');
			var url 			= '';
			var servicio 		= $('#id_servicio_contrato').val();
			var id_cn 			= '{{ Auth::user()->idcn }}';
			var id_facturadora 	= $('#id_empresa_facturadora').val();
			var id_usuario		= '{{ Auth::user()->id }}';
			var id_cliente 		= $('#id_cliente_contrato').val();
			var fecha_inicio 	= $('#fechaInicio').val();
			var fecha_fin 		= $('#fechaFin').val();
			
		
			var redirect 		= '';
			var ruta_download   = '';
			
			//alert(fecha_inicio+'    '+fecha_fin);
			var id_plantilla_con="";

			if(servicio == 0) url = '{{ route('sig-erp-crm::contrato_ese.store') }}';			        
			if(servicio == 1) url = '{{ route('sig-erp-crm::contrato_rys.store') }}';
			if(servicio == 2) url = '{{ route('sig-erp-crm::contrato_maquila.store') }}';	
			if(servicio == 3) url = '{{ route('sig-erp-crm::contrato_psicometricos.store') }}';						
			if(servicio == 4) url = '{{ route('sig-erp-crm::contrato_generico.store') }}';		
		
			if(servicio ==4)
			{
					id_plantilla_con=$("#id_plantilla_contrato").val();


			}

		
			$.ajax({
				headers: {'X-CSRF-TOKEN':token},
				url:url,
				type:'POST',
				dataType:'json',
				data:{	id_cn:id_cn,
						id_facturadora:id_facturadora,
						id_usuario:id_usuario,
						id_cotizacion:id_cotizacion,
						id_cliente:id_cliente,
						id_servicio:servicio,
					    fecha_inicio:fecha_inicio,
						fecha_fin:fecha_fin,
						id_plantilla_generica:id_plantilla_con
						 },
				success:function(response){
					
					if(response.servicio == 0) ruta_download = '{{ url('descarga_contrato_ese') }}';			        
					if(response.servicio == 1) ruta_download = '{{ url('descarga_contrato_rys') }}';
					if(response.servicio == 2) ruta_download = '{{ url('descarga_contrato_maquila') }}';	
					if(response.servicio == 3) ruta_download = '{{ url('descarga_contrato_psicometricos') }}';
				    if(response.servicio == 4) ruta_download = '{{ url('descarga_contrato_generico') }}';

					swal('¡El Contrato se genero correctamente!','','success');
					setTimeout(function(){ 						
						window.location.href = ruta_download+'/'+response.id_contrato;
						//location.reload();
					},1000);
					setTimeout(function(){ 						
						location.reload();
					},2000);
				},
				error : function(jqXHR, status, error) {
		            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
		        }
			});
		}

		var generaContrato = function(ruta,id,servicio,id_cliente){	//pelonete		
			var url = '';
			
			if(servicio == 0) url = '{{ url('contrato_ese_preview') }}';			        
			if(servicio == 1) url = '{{ url('contrato_rys_preview') }}';
			if(servicio == 2) url = '{{ url('contrato_maquila_preview') }}';			
			if(servicio == 3) url = '{{ url('contrato_psiometricos_preview') }}';
			if(servicio == 4) url = '{{ url('contrato_generico_preview') }}';
			        
			

			$.ajax({
				url: url+'/'+id,
				type: 'GET',
				dataType: 'json',
				success:function(response){

					$('#numero_contrato_temp').val(response[0].no_contrato);
					$('#numero_contrato').val(response[0].no_contrato);
					$('#tipo_servicio_contrato').val(response[0].servicio);
					$('#id_cotizacion_contrato').val(id);
					$('#id_servicio_contrato').val(servicio);
					$('#id_cliente_contrato').val(id_cliente);
					$('#modal-save-contrato').modal({
							show: true,
							backdrop:'static'
					});
					if(servicio==4){

				   $.ajax({
					url: '{{ url('ListadoPlantillasContratos') }}',
					type: 'GET',
					dataType: 'json',
					
					success:function(plantillas_contratos){
						console.log(plantillas_contratos);
						 $("#selec_plantillas").html('<div class="form-group" id="show_plantilla"><label for="inputEmail3" class="col-md-3 col-sm-12 col-xs-12 control-label">Plantilla Contrato:</label><div class="col-md-9 col-sm-12 col-xs-12"><select class="form-control" id="id_plantilla_contrato" class="valor_Select" ><option value="0">Favor de seleccionar una plantilla</option></select></div></div></select>');

						$.each(plantillas_contratos[0],function(i,v){
							
							 $('#id_plantilla_contrato').append('<option value='+v.id+'>'+v.titulo+'</option>');
						});

					}
					});
					
					}
					
				}
			});

		};

				/* ------------------convertir valores a  formato de moneda con dos decimales------------------*/
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


		var diferenciaFechasValidador = function(fechaInicio, fechaFin){ 
			var str_error_fechas 	= '';
			var arr_fecha_inicio 	= fechaInicio.split('-');
	        var arr_fecha_fin 	 	= fechaFin.split('-');

	        var fecha_inicio_year 	= parseInt(arr_fecha_inicio[0]); 	
	        var fecha_inicio_month 	= parseInt(arr_fecha_inicio[1]); 	
	        var fecha_inicio_day 	= parseInt(arr_fecha_inicio[2]); 	

	        var fecha_fin_year 		= parseInt(arr_fecha_fin[0]); 	
	        var fecha_fin_month 	= parseInt(arr_fecha_fin[1]); 	
	        var fecha_fin_day 		= parseInt(arr_fecha_fin[2]); 

	        var fecha_hoy 			= new Date();
	        var fecha_hoy_year 		= fecha_hoy.getFullYear();
	        var fecha_hoy_month		= fecha_hoy.getMonth()+1;
	        var fecha_hoy_day 		= fecha_hoy.getDate();		

	        /*************************************************************************************************/
	        /********************** VALIDA QUE LA FECHA INICIO NO SEA MENOR A LA ACTUAL **********************/
	        /*************************************************************************************************/


	         if(fecha_inicio_year < fecha_hoy_year ){
	        	
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>El AÑO de Fecha Inicio es menor al AÑO de la fecha actual</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }	
	        
	        if(fecha_inicio_month < fecha_hoy_month && fecha_inicio_year < fecha_hoy_year){
	        	
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>La fecha de inicio NO PUEDE SER MAYOR a la fecha fin</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }

	        if(fecha_inicio_day < fecha_hoy_day && fecha_inicio_month < fecha_hoy_month && fecha_inicio_year < fecha_hoy_year){
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>El DÍA Fecha Inicio es menor al DÍA de la fecha actual</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';

	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }

	        /*************************************************************************************************/
	        /********************** VALIDA QUE LA FECHA INICIO NO SEA MAYOR A FECHA FIN **********************/
	        /*************************************************************************************************/


	        if(fecha_inicio_year > fecha_fin_year ){
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>Fecha Inicio es mayor a Fecha Fin</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }	

	        if(fecha_inicio_month > fecha_fin_month && fecha_inicio_year >= fecha_fin_year ){
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>El mes de Fecha Inicio es mayor al mes Fecha Fin</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }

	        if(fecha_inicio_day > fecha_fin_day && fecha_inicio_month >= fecha_fin_month && fecha_inicio_year >= fecha_fin_year){
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>El día de Fecha Inicio es mayor al día Fecha Fin</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }

	        /*************************************************************************************************/
	        /********************** VALIDA QUE LA FECHA FIN NO SEA MENOR A LA ACTUAL **********************/
	        /*************************************************************************************************/


	        if(fecha_fin_year < fecha_inicio_year ){
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>El Año de Fecha Fin no puede ser menor al  la fecha actual</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }	

	        if(fecha_fin_month < fecha_inicio_month && fecha_fin_year <= fecha_inicio_year){	        	
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>Fecha Fin no puede ser menor a la fecha actual</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }

	        if(fecha_fin_day < fecha_inicio_day && fecha_fin_month <= fecha_inicio_month && fecha_fin_year <= fecha_inicio_year){
	        	str_error_fechas = 'Fecha Fin no puede ser menor a la fecha actual';
	        	str_error_fechas = '<div class="alert alert-danger fade in m-b-15 text-center">'+
								  		'<strong>¡ Error ! </strong>'+
								  		'<label>Fecha Fin no puede ser menor a la fecha actual</label>'+
								  		'<span class="close" data-dismiss="alert">×</span>'+
								  	'</div>';
	        	$('#contrato-error-panel').html(str_error_fechas);
	        	$('#contrato-error-panel').show();
	        	return false;
	        }

	        
	        return true;


		}

		var validaCamposCliente = function(id_cliente){

			var resultado = null;
			$.ajax({
				url:'{{ url('validador_campos_cliente') }}',
				type:'GET',
				async:false,
				data:{id_cliente:id_cliente},
				processData: true,
				success:function(response){				
					resultado = response;
					console.log(response);
					
				},
				error : function(jqXHR, status, error) {
				        alert('Disculpe, existió un problema comuniquese con el equipo de desarrollooooo');
				}

			});
			return resultado;
		}

		var iniciarTabla = function(){

            var data_table =$("#data-table").DataTable({
                                dom: 'Blfrtip',
                                buttons: [
                                     {
                extend: 'excelHtml5',
                title: 'Listado de cotizaciones',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de cotizaciones',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de cotizaciones',
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,                                
                                "paging": true,
                                "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;
                             
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };                                      
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 3, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 3 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        
                                    
                                }
                           
                            } );
                
        }

        var showModalPlantillaCotizacion = function()
		{
		    $('#modal-plantilla-cotizacion').modal({
		        backdrop:'static',
		        keyboard: false
		    });
		    $('#id_cotizacion_download').val('');
		    $('#id_plantilla_download').val('');
		}

        var downloadCotizacion = function( id )
        {
        	showModalPlantillaCotizacion();
        	$('#id_cotizacion_download').val( id );
        	
        }

        var downloadCotizacionGenerica = function( id )
        {
        	window.open('{{ url('catalogo/listado_cotizaciones') }}');
        	$('#id_plantilla_download').val( id );
        	$('#frmCotizacionGenerica').submit();
        }
		

		
	</script>
@endsection