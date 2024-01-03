@extends('layouts.masterMenuView')
@section('section')


<div id="content" class="content">


	<ol class="breadcrumb ">
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		<li>Correo masivo</li>

	</ol>

	<h1 class="page-header text-center">CORREO MASIVO</h1>






	<div class="row">
		

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
				<h4 class="panel-title text-center table-responsive">Creación correo masivo</h4>
			</div>
			          

				<!-- begin #content -->
				<div >
					<!-- begin vertical-box -->
					<div class="vertical-box">
						<!-- begin vertical-box-column -->
						<div class="vertical-box-column width-250">
							<!-- begin wrapper -->
							<div class="wrapper bg-silver text-center">

								<a href="#" class="btn btn-success p-l-30 p-r-40 btn-md" id="btn-guardar-borrador">
									Guardar Borrador
								</a>
							</div>
							<!-- end wrapper -->
							<!-- begin wrapper -->
							<div class="wrapper">
								
								<ul class="nav nav-pills nav-stacked nav-sm">
									<li><a href="{{ url('listado_borradores') }}"><i class="fa fa-inbox fa-fw m-r-5"></i> Borradores <span class="badge pull-right" id="total_borradores">0</span></a></li>
									<!--li><a href="email_inbox_v2.html"><i class="fa fa-flag fa-fw m-r-5"></i> Important</a></li>
									<li><a href="email_inbox_v2.html"><i class="fa fa-send fa-fw m-r-5"></i> Sent</a></li>
									<li><a href="email_inbox_v2.html"><i class="fa fa-pencil fa-fw m-r-5"></i> Drafts</a></li>
									<li><a href="email_inbox_v2.html"><i class="fa fa-trash fa-fw m-r-5"></i> Trash</a></li-->
								</ul>
								
								<hr class="hidden-sm hidden-xs">
								
								<div class="table-responsive hidden-sm hidden-xs" style="height: 300px;">
									<table class="table table-valign-middle m-b-0 table-striped">
								<thead> 
									<tr>										
										<th class="text-center">Lista destinatarios</th>
									</tr>
								</thead>
								<tbody id="list-correos">									
								</tbody>
							</table>
								</div>
								<p></p>
								<hr class="hidden-sm hidden-xs">
								<?php /*p class="hidden-sm hidden-xs"><b>Lista de archivos</b></p>
								<div class="table-responsive hidden-sm hidden-xs" style="height: 300px;">
									<table class="table table-valign-middle m-b-0 table-striped">
								<thead> 
									<tr>	
										<th style="width: 10%;" class="text-left">
											<input type="checkbox" id="seleccion-archivo-todos" class="input-sm">
											
										</th>
										<th><h5>Nombre archivo</h5></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo1.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo1.pdf </label>
										</td>										
									</tr>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo2.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo2.pdf </label>
										</td>										
									</tr>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo3.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo3.pdf </label>
										</td>										
									</tr>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo4.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo4.pdf </label>
										</td>										
									</tr>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo5.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo5.pdf </label>
										</td>										
									</tr>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo6.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo6.pdf </label>
										</td>										
									</tr>
									<tr>
										<td><input type="checkbox" class="seleccion-archivo"></td>
										<td>
											<input type="hidden" value="archivo7.pdf" class="nombre-archivo">
											<label class="label label-warning">archivo7.pdf </label>
										</td>										
									</tr>
									
									

									
								</tbody>
							</table>
								</div*/?>
								
							</div>
							<!-- end wrapper -->
						</div>
						<!-- end vertical-box-column -->
						<!-- begin vertical-box-column -->
						<div class="vertical-box-column">
							<!-- begin wrapper -->
							<div class="wrapper bg-silver-lighter">
								<!-- begin btn-toolbar -->
								<div class="btn-toolbar">
									<div class="btn-group">
										
										<a href="#" class="btn btn-white btn-sm p-l-20 p-r-20"><i class="fa fa-trash fa-2x"></i></a>
									</div>
								</div>
								<!-- end btn-toolbar -->
							</div>
							<!-- end wrapper -->
							<!-- begin wrapper -->
							<div class="wrapper">
								<div class="p-30 bg-white">
									<!-- begin email form -->
										<!-- begin email to -->
										<label class="control-label">Para:</label>
										<div class="m-b-15" id="search-mail-contact">
											<ul id="email-to-mio" class="primary">
												@foreach($destinatarios as $key => $value)
													<li>{{ $value }}</li>
												@endforeach					

											</ul>
										</div>
										<!-- end email to -->
										<!-- begin email subject -->
										<label class="control-label">Asunto:</label>
										<div class="m-b-15">
											<input type="text" class="form-control" id="asunto-email" value="{{ $borrador->asunto }}" />
										</div>
										<!-- end email subject -->
										<?php /*label class="control-label">Archivos adjuntos:</label>
										<div class="m-b-15" id="search-mail-contact">
											<ul id="archivos-lista" class="primary">					

											</ul>
										</div*/?>
										
										<div class="m-b-15" id="search-mail-contact">
											<a href="#" class="btn btn-primary btn-sm" id="add-carta-tipo">Carta Tipo <i class="fa fa-pencil-square-o"></i></a>											
										</div>


										
									<form action="{{ url('upload_file') }}" class="form-inline" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" id="frm-upload-file">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group">
										    <input type="file" class="form-control" name="imagen" id="image-upload">
										 </div>
										 
										  <button type="submit" class="btn btn-primary btn-sm" id="btn-upload-image">Utilizar imagen seleccionada</button>
										<div class="m-b-15 col" id="search-mail-contact">
											
										</div>
									</form>
										<!-- begin email content -->
										<label class="control-label">Contenido:</label>
										<div class="m-b-15">
											<textarea class="textarea form-control" id="contenido-email" placeholder="Ingrese algún texto ..." rows="12" "{!! $borrador->contenido !!}"> </textarea>
										</div>
										<!-- end email content -->
										<button class="btn btn-success p-l-40 p-r-40" id="btn-enviar">Enviar</button>
									<!-- end email form -->
								</div>
							</div>
							<!-- end wrapper -->
						</div>
						<!-- end vertical-box-column -->
					</div>
					<!-- end vertical-box -->
				</div>
				<!-- end #content -->

			
		</div>

	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title col-lg-7 col-md-7 col-sm-7 col-xs-7  text-right" >Cartas Tipo</h4>
        <i class="fa fa-pencil-square-o fa-2x"></i>
      </div>
      <div class="modal-body">
	    <div class="containerfluid">
	    	<div class="row">
		        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" id="lista-cartas-tipo">  
		        		
		      	</div>                                     	
	    		
	    	</div>

	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="agregar-carta-tipo">Agregar Carta Tipo</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-save-borrador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title col-lg-7 col-md-7 col-sm-7 col-xs-7  text-right" >Guardar borrador</h4>
        <i class="fa fa-trash fa-2x"></i>
      </div>
      <div class="modal-body">
	    <div class="containerfluid">
	    	<div class="row">
	    		<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" id="contenedor-error">  
	    			<div class="alert alert-danger fade in m-b-15" id="error-save-borrador">
	    				<span class="label label-danger">Error</span>						
						{texto-error}
						<span class="close" data-dismiss="alert">×</span>
					</div>
	    		</div>
	    	</div>
	    	<div class="row">
		        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">  

		        	<form id="frm-save-borrador" action="{{ route('sig-erp-crm::correos.store') }}" method="POST">
		        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Titulo</label>
						    <input type="text" name="titulo" class="form-control" id="exampleInputEmail1" placeholder="Correos para servicios....">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Descripción</label>
						    <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" placeholder="Promoción de los nuevos servicios...">
						  </div>
						  <div class="form-group">
						    
						    <input type="hidden" name="para" 	  		 id="borrador_para" 	   class="form-control" >
						    <input type="hidden" name="asunto" 	  	 	 id="borrador_asunto" 	   class="form-control" >
						    <input type="hidden" name="datos_adjuntos" 	 id="borrador_adjuntos"    class="form-control" >
						    <input type="hidden" name="contenido"  	 	 id="borrador_contenido"   class="form-control" >
						    
						    
						  </div>
						  
						  
					</form>
		        		
		      	</div>                                     	
	    		
	    	</div>

	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="btn-save-borrador">Guardar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/jquery-tag-it/js/tag-it.min.js') !!}

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

{!! Html::script('assets/plugins/tinymce/tinymce.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/table/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/paste/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/spellchecker/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/codesample/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/imgsurfer/plugin.js') !!}

{!! Html::script('assets/js/sweetalert.min.js') !!}


<script>
	$(document).ready(function() {
		var lista_completa = new Array();
		listarCartasTipo();	
		cantidadBorradores();	
		$('#archivos-lista').tagit({
			readOnly:true
		});	
		$('#error-save-borrador').hide();
		$('#btn-save-borrador').click(function(event){
			guardarBorrador();
		});
		
		$('#btn-guardar-borrador').click(function(){ 
			$('#error-save-borrador').hide();
			$('#modal-save-borrador').modal('show');
		});

		$('#agregar-carta-tipo').click(function(){

			list_cartas_tipo = $('.carta-tipo-radio');

			$.each(list_cartas_tipo,function(indice){

				seleccionada = $(list_cartas_tipo[indice]).is(':checked');

				if(seleccionada){
					id_carta_tipo = list_cartas_tipo[indice].value;
					
					seleccionada = '';
					setCartaTipo(id_carta_tipo); 

					$('#myModal').modal('hide');
				}
			});
		});

		$('#add-carta-tipo').click(function(event){

			event.preventDefault();
			$('#myModal').modal({show:true,backdrop:'static',keyboard:false});
		});
		


		$("#email-to-mio").tagit({
			placeholderText:'correo.cliente@mail.com' ,
			autocomplete:{ 
	            delay: 3,
	            minLength: 2,
				source: function( request, response ){
		                $.ajax({
		                    url: "{{ url('lista_correos') }}",
		                    data:{correo:request.term },
		                    dataType: "json",		                    
		                    success: function( data ) {
		                    		response($.each(data,function(k,v){
			                    			return { label:v, value:v }	
			                    		})	
		                    		);
		                    }		                        
		                });
	            } 
            },
            tabIndex:222,
            removeConfirmation:true,
            afterTagAdded:function(event, ui){
            	str_class = (ui.tagLabel).replace('@','-');
            	clase 	  = str_class.replace('.','-');
            	
            	str_html= '<tr class="row-remove-email '+clase+ '"><td><label class="label label-primary">'+ui.tagLabel+ ' <span class="fa fa-times remove-email" ></span></label><input type="hidden" class="lista-nombre-correos" value="'+ui.tagLabel+'"></td></tr>';

            	$('#list-correos').append(str_html);

            	
            	$('.remove-email').click(function(){
            		indice = $('.remove-email').index(this);
            		quitarEmail(indice);
				});	
            },
            beforeTagRemoved: function(event, ui) {			        
		        str_class = (ui.tagLabel).replace('@','-');
            	clase 	  = str_class.replace('.','-');

		        $('.'+clase).fadeOut(1000,function(){
					$('.'+clase).remove();							
				});
		    },
		    

		});

		

		$('#btn-enviar').click(function(event){
			event.preventDefault();

			enviarMail();
		});

		$('#seleccion-archivo-todos').click(function(){
			longitud = $('.seleccion-archivo').length;
			
			if( $(this).is(':checked') ) {
				for(i=0; i< longitud; i++){
					elemento 		= $('.seleccion-archivo').get(i);
					nombre_archivo 	= $('.nombre-archivo').get(i);
					$("#archivos-lista").tagit("createTag", nombre_archivo.value);
					$(elemento).attr('checked','checked');
				}
			}else{
				for(i=0; i< longitud; i++){
					elemento 		= $('.seleccion-archivo').get(i);
					nombre_archivo 	= $('.nombre-archivo').get(i);
					$("#archivos-lista").tagit("removeTagByLabel", nombre_archivo.value);
					$(elemento).removeAttr('checked','checked');
				}
			}
			
		});

		$('.seleccion-archivo').click(function(){
			index 		   = $('.seleccion-archivo').index(this);
			nombre_archivo = $('.nombre-archivo').get(index);
			if( $(this).is(':checked') ) {
			    $("#archivos-lista").tagit("createTag", nombre_archivo.value);
			}else{
				$("#archivos-lista").tagit("removeTagByLabel", nombre_archivo.value);
			}
		});


		$('#btn-upload-image').click(function(event){
			event.preventDefault();
			datos = $('#image-upload')[0].files;
			
			uploadFile();
			


		});

		iniciar_editor();
		
	});// Fin funcion document ready 

	var uploadFile = function (){
		
		var datos_file 		  = new FormData();
		var token 	   		  = $('meta[name="csrf-token"]').attr('content');
		datos_file.append('imagen',$('#image-upload')[0].files);		
	    $.ajax({
	    	headers: {'X-CSRF-TOKEN':token},
		    url: '{{ url('upload_file') }}',
		    data: new FormData($("#frm-upload-file")[0]),
		    dataType:'json',
		    async:false,
		    type:'post',
		    processData: false,
		    contentType: false,
		    success:function(response){
		    	
		    	iniciar_editor();
		    },
		    error:function(jqXHR, status, error) {
				alert('Errorr');
			}

		});   

		 
	};


	var searchMailContact = function(){


	};

	var enviarMail = function(){

		
		longitud 			= $('.row-remove-email').length;
		var str_emails 		= "";
		var asunto 			= $("#asunto-email").val();
		var contenido 	  	= '';
		var error_mensaje 	= $('#contenedor-error').html();
		var borrador_asunto	= $('#asunto-email').val();
		var contenido_email = tinymce.get('contenido-email').getContent();
		var token 	        = $('meta[name="csrf-token"]').attr('content');
		var id_borrador		= '{{ $id_borrador }}';
		

		

		if(longitud == 0){
			swal('¡ Debe existir al menos un destinatario !','','warning');
		}else{
			//Genera el string de los emails
				for(i=0; i< longitud; i++){
					contenido = $('.tagit-hidden-field').get(i);
					str_emails+= $(contenido).val()+";";		
				}

				$.ajax({
		            headers: {'X-CSRF-TOKEN':token},
		            url:'{{ url('enviar_mail') }}',
		            type:'GET',
		            dataType: 'json',
		            data: {contenido_email:contenido_email,para:str_emails,asunto:asunto,borrador:true,id_borrador:id_borrador},
		            success: function(response){ 
		            		console.log(response);
		                    if(response.status_alta=='success' || response.status_alta=='wrong'){
		                        if(response.status_alta == 'success'){
		                            swal({                                  
		                                    title: "<h3>¡ El registro se guardo con éxito !</h3> ",
		                                    html: true,
		                                    data: datos,
		                                    type: "success",   
		                                    confirmButtonText: "OK"                                                 
		                                });
		                        }else if(response.status_alta == 'wrong'){
		                            swal({   
		                                    title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",
		                                    html: true,
		                                    type: "warning",   
		                                    confirmButtonText: "OK"                                                 
		                                });
		                        }
		                    }

		                    
		                },
		            error : function(jqXHR, status, error) {

		                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
		            }
	        	});
				 console.log(tinymce.get('contenido-email').getContent());


				 

			    
		}


	}


	var guardarBorrador = function(){
		longitud 			= $('.row-remove-email').length;
		var str_emails 		= "";
		var asunto 			= $("#asunto-email").val();
		var contenido 	  	= '';
		var error_mensaje 	= $('#contenedor-error').html();
		var borrador_asunto	= $('#asunto-email').val();
		

		$('#error-save-borrador').remove();
		
		
		if(longitud == 0){
			error_mensaje	= error_mensaje.replace('{texto-error}','<strong> ¡ Debe de existir al menos un destinatario !</strong>');
			$('#contenedor-error').append(error_mensaje);		
			$('#error-save-borrador').show();
		}else{
			//Genera el string de los emails
				for(i=0; i< longitud; i++){
					contenido = $('.tagit-hidden-field').get(i);
					str_emails+= $(contenido).val()+";";		
				}
				$('#borrador_para').val(str_emails);
				$('#borrador_asunto').val(borrador_asunto);
				$('#borrador_contenido').val(tinymce.get('contenido-email').getContent());
				
				$('#frm-save-borrador').submit();
			    
		}
		
	}

	var borrarEmail = function(index,objeto){
		var fila = $(objeto).get(index);	    				    
		$(fila).remove();		
	}


	var quitarEmail = function(indice,origen_llamada){

		nombre = $('.lista-nombre-correos').get(indice);
		//swal('¡ Eliminar !','¿Desea quitar de la lista de destinarios '+nombre.value+'?','warning');
		swal({   
					title: "<h3>¿ Eiminar de la lista de destinarios ?</h3> ",
					text: "<h3><span style=\"color:#FF9933\">"+nombre.value+"<span></h3>",   
					html: true,
					type: "warning",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					showLoaderOnConfirm: true, 
					cancelButtonText: 'Cancelar',
					confirmButtonColor: 'ef9d1e'
				}, function(){ 
						setTimeout(function(){  
							$("#email-to-mio").tagit("removeTagByLabel", nombre.value);
							str_class = (nombre.value).replace('@','-');
	            			clase 	  = str_class.replace('.','-');   
							
							$('.'+clase).fadeOut(1000,function(){
								$('.'+clase).remove();							
							});
							
							swal("¡ Correo eliminado de la lista !",'','success');   
						}, 500)
							 
				});
	}



	var iniciar_editor = function(){
		tinymce.init({
			selector: "textarea#contenido-email",
			convert_urls : false,
			language: 'es_MX',
			theme: "modern",
			plugins: [
			    'advlist autolink lists link image imagetools charmap print preview anchor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table contextmenu paste code'
			],
			toolbar1: "newdocument bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect print image ",
			
			external_plugins: {
				//"moxiemanager": "/moxiemanager-php/plugin.js"
			},
			image_list: listaImagenes(),
			
			add_unload_trigger: false,
			autosave_ask_before_unload: false,			
			menubar: false,
			toolbar_items_size: 'small',

			style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			],

			templates: [
				{title: 'My template 1', description: 'Some fancy template 1', content: 'My html'},
				{title: 'My template 2', description: 'Some fancy template 2', url: 'development.html'}
			],


	        spellchecker_callback: function(method, data, success) {
				if (method == "spellcheck") {
					var words = data.match(this.getWordCharPattern());
					var suggestions = {};

					for (var i = 0; i < words.length; i++) {
						suggestions[words[i]] = ["First", "second"];
					}

					success({words: suggestions, dictionary: true});
				}

				if (method == "addToDictionary") {
					success();
				}
			}
		});
	}


	var listarCartasTipo = function(status){

				$.ajax({
					url: '{{ url('lista_cartas_tipo') }}',
					type: 'GET',
					dataType: 'json',
					data:{status:status},
					success:function(clientes){
								
								var ruta_edit_cartas = '{{ route('sig-erp-crm::cartas_tipo.index') }}';
								var ruta_accion_clientes = '{{ route('sig-erp-crm::accionXcliente.index') }}';
								var listadoClientes = '<table id="data-table" class="table table-striped table-bordered table-condensed">'
														+' <thead>'
														+' <tr>'
															+' <th><small>Titulo</small></th>'											
	                                    					+' <th><small>Usuario</small></th>'
	                                    					+' <th class="botones-accion-clientes"><small>Elegir</small></th>'
                                        				+' </tr>'
						                                +' </thead>'
						                                +'<tbody>';                               
                                 
                                 $.each(clientes,function(indice){
									                                 	                                	
									listadoClientes+= 	'<tr>'+	
															'<td><h6>'+ (clientes[indice].titulo)+'</h6></td>'+
														  	'<td><h6>'+ clientes[indice].usuario + '</h6></td>'+
														  	'<td class="text-center botones-accion-clientes visible-md-3  visible-lg-3">'
														  		
																+ '<input type="radio" class="carta-tipo-radio" name="agregar-ct" value="'+clientes[indice].id+'">'+	

                                            				'</td>'+
														  	
														'</tr>';
													  	
								});												
                                    listadoClientes+='</table>';
				$('#lista-cartas-tipo').append(listadoClientes);

								//TableManageButtons.init();
								
								$('#data-table').DataTable({dom: 'C<"clear">lfrtip',
													        colVis: {
													            exclude: [ 0 ]
													        }});


					},
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}
				});
		}


		var setCartaTipo = function(id){

			$.ajax({
				url:  '{{ url('get_carta_tipo') }}',
				type: 'GET',
				dataType: 'json',
				data: {id_carta_tipo:id},
				success:function(response){
					str_html = response[0].contenido.split("\n").join(' ');					
					tinyMCE.activeEditor.setContent(str_html);
					
				},
				error : function(jqXHR, status, error) {
				        swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
				}
			});
		}


	var listaImagenes = function(){

		var lista = null;
		$.ajax({
			url:'{{ url('files_user') }}',
			type:'GET',
			async:false,
			processData: true,
			success:function(response){				
				lista = response;
				console.log(lista);
			},
			error : function(jqXHR, status, error) {
			        alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
			}

		});
		return lista;

	}

	var cantidadBorradores = function(){

		var id_user = '{{ Auth::user()->id }}';

		$.ajax({
			url: '{{ url('cantidad_borradores') }}',
			type:'GET',
			dataType:'json',
			data:{id_user:id_user},
			success:function(response){								
				
				$('#total_borradores').html(response[0].numero_borradores);
			},
			error : function(jqXHR, status, error) {
			        alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
			}
		});
	}

</script>