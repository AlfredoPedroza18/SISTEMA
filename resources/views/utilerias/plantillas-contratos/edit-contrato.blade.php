@extends('layouts.masterMenuView')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Utilerias</a></li>		
		<li><a href="{{ url('utilerias/plantilla_contratos') }}">Plantillas</a></li>
		<li>Editar</li>

	</ol>

	
	<h1 class="page-header text-center">Plantilla Contrato <small>EDITAR</small></h1>


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
                            <h4 class="panel-title text-center table-responsive">Carta Tipo</h4>
                        </div>
                        <div class="panel-body">               	


                        		

                        		
	                        		<input type="hidden" name="contenido" id="str_contenido">
	                        		<input type="hidden" name="id_usuario" id="id_usuario" value="{{ Auth::user()->id }}">
	                        		<input type="hidden" name="id_ct" id="id_ct" value="{{ $contrato->id }}">            		
									<div>
										<div>
										     <div class="mns"></div>
											<label class="control-label">Titulo:</label>
											<div class="m-b-15">
												<input type="text" name="titulo" id="titulo" class="form-control" id="asunto-email" value="{{ $contrato->titulo }}" />
											</div>
											<!-- end email to -->
											<!-- begin email subject -->
											<label class="control-label">Descripción:</label>
											<div class="m-b-15">
												<input type="text" name="descripcion" id="descripcion"  class="form-control" value="{{ $contrato->descripcion }}"/>
											</div>
											<div class="m-b-15">
											    <span class="badge">[NUM_CONTRATO]</span>
												<span class="badge">[NOMBRE_EMPRESA]</span>
												<span class="badge">[DIRECCION_EMPRESA]</span>
												<span class="badge">[NOMBRE_CLIENTE]</span>
												<span class="badge">[DIRECCION_CLIENTE]</span>
												<span class="badge">[REPRESENTANTE_LEGAL_CLIENTES]</span>
												<span class="badge">[REPRESENTANTE_LEGAL_EMPRESA]</span>
												<span class="badge">[RFC_EMPRESA]</span>
												<span class="badge">[RFC_CLIENTE]</span>
												<span class="badge">[SERVICIO]</span>
											</div>
										
											<textarea id="elm1" rows="15" cols="56"  "{!! $contrato->contenido !!}">
												
											</textarea>
											<hr>
											<div class="text-right">										
												<button type="submit" class="btn btn-success p-l-40 p-r-40" id="btn-enviar">Guardar</button>
											</div>
											<?php /*
											<div>
												<a href="javascript:;" onclick="tinymce.get('elm1').show();return false;">[Show]</a>
												<a href="javascript:;" onclick="tinymce.get('elm1').hide();return false;">[Hide]</a>
												<a href="javascript:;" onclick="tinymce.execCommand('mceAddEditor', false, 'elm1');return false;">[Add]</a>
												<a href="javascript:;" onclick="tinymce.get('elm1').remove();return false;">[Remove]</a>
												<a href="javascript:;" onclick="tinymce.get('elm1').execCommand('Bold');return false;">[Bold]</a>
												<a href="javascript:;" onclick="alert(tinymce.get('elm1').getContent());return false;" id="getContenido">[Get contents]</a>
												<a href="javascript:;" onclick="alert(tinymce.get('elm1').getContent({format: 'raw'}));return false;">[Get raw]</a>
												<a href="javascript:;" onclick="alert(tinymce.get('elm1').selection.getContent());return false;">[Get selected HTML]</a>
												<a href="javascript:;" onclick="alert(tinymce.get('elm1').selection.getContent({format : 'text'}));return false;">[Get selected text]</a>
												<a href="javascript:;" onclick="alert(tinymce.get('elm1').selection.getNode().nodeName);return false;">[Get selected element]</a>
												<a href="javascript:;" onclick="tinymce.execCommand('mceInsertContent',false,'<b>Hello world!!</b>');return false;">[Insert HTML]</a>
												<a href="javascript:;" onclick="tinymce.execCommand('mceReplaceContent',false,'<b>{$selection}</b>');return false;">[Replace selection]</a>
											</div>
											*/
											?>											
									</div>
								
                        </div>
                    </div>
       
	</div>


</div> <!--End  content-->



@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/tinymce/tinymce.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/table/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/paste/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/spellchecker/plugin.dev.js') !!}
{!! Html::script('assets/plugins/tinymce/plugins/codesample/plugin.dev.js') !!}
	
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}

	
	<script>
		$(document).ready(function(){
			
				

			$('#btn-enviar').click(function(event){
				event.preventDefault();
				str_contenido_carta_tipo = tinymce.get('elm1').getContent();
				$('#str_contenido').val(str_contenido_carta_tipo);	
				var titulo 	    = $('#titulo').val(); 
	        	var descripcion = $('#descripcion').val();
				 if(titulo=='' && descripcion==''){
		    	$(".mns").html('<div class="alert alert-info" role="alert"><strong>Info!</strong> Favor de llenar los campos marcados con *.</div>');
		    }else{
				actualizarCartaTipo();
			}
				
				
				setTimeout(function(){     location.reload();   }, 5000);
				
			});
			
			$('#btn-limpiar').click(function(event){
				event.preventDefault();
				$('textarea#elm1').val('');
				$('#str_contenido').val('');				
			});

			$('#btn-upload-image').click(function(event){
				event.preventDefault();
				datos = $('#image-upload')[0].files;					
				uploadFile();
			});

			iniciar_editor();



		});	


		var iniciar_editor = function(){
				tinymce.init({
					selector: "textarea#elm1",
					
					convert_urls : false,
					language: 'es_MX',
					
					plugins: [
					"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker codesample image imagetools"
					],
					external_plugins: {
			//"moxiemanager": "/moxiemanager-php/plugin.js"
					},
					
					image_caption: false,
					add_unload_trigger: false,
					autosave_ask_before_unload: false,

					toolbar1: "newdocument bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
					toolbar2: "cut copy paste pastetext | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor help code | insertdatetime preview | forecolor backcolor",
					toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking  pagebreak restoredraft | insertfile insertimage codesample",
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
					{title: 'My template 2', description: 'Some fancy template 2', url: 'development.html'},
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
		};


		var actualizarCartaTipo = function(){
	        var contenido   = $('#str_contenido').val(); 
	        var id_usuario  = $('#id_usuario').val();
	        var id_ct		= $('#id_ct').val();
	        var titulo 	    = $('#titulo').val(); 
	        var descripcion = $('#descripcion').val();
	        var token 	    = $('meta[name="csrf-token"]').attr('content');
	        
	        $.ajax({
	            headers: {'X-CSRF-TOKEN':token},
	            url:'{{ url('utilerias/update_contratos')}}',
	            type:'POST',
	            dataType: 'json',
	            data: {id:id_ct,contenido:contenido,id_usuario:id_usuario,titulo:titulo,descripcion:descripcion},
	            success: function(response){ 
	            		
	                    if(response.status_alta=='success' || response.status_alta=='wrong'){
	                        if(response.status_alta == 'success'){
	                            swal({                                  
	                                    title: "<h3>¡ El registro se guardo con éxito !</h3> ",
	                                    html: true,
	                                    
	                                    type: "success",   
	                                    confirmButtonText: "OK"                                                 
	                                });
	                     setTimeout(function(){     location.reload();   }, 5000);
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
	            error : function(jqXHR, status, error){

	                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
	            }
	        });
	        
	    }

	    var getCartasTipo = function(){

	    }

		

		

		
	</script>
@endsection