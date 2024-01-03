@extends('layouts.master')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		<li>Alta Carta Tipo</li>

	</ol>

	<h1 class="page-header text-center">ALTA CARTA TIPO <small>NUEVA</small></h1>






	<div class="row">
		<div class="col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9 col-xs-12 col-sm-12 text-center">

			<a href="{{ route('sig-erp-crm::cartas_tipo.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Alta de Cliente/Prospecto">
				<i class="fa fa-edit" aria-hidden="true"></i>
			</a>
			<label>Añadir carta tipo</label>


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
				<h4 class="panel-title text-center table-responsive">Carta Tipo</h4>
			</div>
			<div class="panel-body">               	





				<input type="hidden" name="contenido" id="str_contenido">
				<input type="hidden" name="id_usuario" id="id_usuario" value="{{ Auth::user()->id }}">
				<div>
					<div>
						<label class="control-label">Titulo:</label>
						<div class="m-b-15">
							<input type="text" name="titulo" id="titulo" class="form-control" id="asunto-email" />
						</div>
						<!-- end email to -->
						<!-- begin email subject -->
						<label class="control-label">Descripción:</label>
						<div class="m-b-15">
							<input type="text" name="descripcion" id="descripcion" class="form-control" id="asunto-email" />
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


						<textarea id="elm1" rows="15" cols="80" style="width: 80%">

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

		$('#str_contenido').val('');	

		$('#btn-enviar').click(function(event){
			event.preventDefault();
			str_contenido_carta_tipo = tinymce.get('elm1').getContent();
			$('#str_contenido').val(str_contenido_carta_tipo);	
			guardarCartaTipo();

		});

		$('#btn-upload-image').click(function(event){
			event.preventDefault();
			datos = $('#image-upload')[0].files;		
			uploadFile();
		});

		$('#btn-limpiar').click(function(event){
			event.preventDefault();
			$('textarea#elm1').val('');
			$('#str_contenido').val('');				
		});


		iniciar_editor();


	});	


	var iniciar_editor = function(){
			tinymce.init({
				selector: "textarea#elm1",
				convert_urls : false,
				//relative_urls : true,
				//remove_script_host : true,
				language: 'es_MX',
				theme: "modern",
				plugins: [
				"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker codesample image imagetools"
				],
				external_plugins: {
		//"moxiemanager": "/moxiemanager-php/plugin.js"
				},
				
				image_caption: true,
				add_unload_trigger: false,
				autosave_ask_before_unload: false,

				toolbar1: "newdocument bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
				toolbar2: "cut copy paste pastetext | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media help code | insertdatetime preview | forecolor backcolor",
				toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | insertfile insertimage codesample",
				menubar: false,

				image_list: '{{ url('files_user') }}',
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


	var guardarCartaTipo = function(){
		var contenido   = $('#str_contenido').val(); 
		var id_usuario  = $('#id_usuario').val();
		var titulo 	    = $.trim($('#titulo').val()); 
		var descripcion = $.trim($('#descripcion').val());
		var token 	   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			headers: {'X-CSRF-TOKEN':token},
			url:'{{ route('sig-erp-crm::cartas_tipo.store') }}',
			type:'POST',
			dataType: 'json',
			data: {contenido:contenido,id_usuario:id_usuario,titulo:titulo,descripcion:descripcion},
			success: function(response){ 
				console.log(response);
				if(response.status_alta=='success' || response.status_alta=='wrong'){
					if(response.status_alta == 'success'){
						swal({                                  
							title: "<h3>¡ El registro se guardo con éxito !</h3> ",
							html: true,
							
							type: "success",   
							confirmButtonText: "OK"                                                 
						});

						setTimeout(function(){     location.reload();   }, 500);
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

	}

	var getCartasTipo = function(){

	}

	var uploadFile = function (){
		
		var datos_file 		  = new FormData();  console.log(new FormData($("#frm-upload-file")[0]));
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
		    	/*setTimeout(function(){
				    location.reload();
				}, 500);*/
		    },
		    error:function(jqXHR, status, error) {
				alert('Error '+error);
			}

		});   

		 
	};

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


</script>
@endsection