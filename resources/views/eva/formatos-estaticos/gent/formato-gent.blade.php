@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="{{ url( 'dashboardese' ) }}">ESE</a></li>				
		<li><a href="{{ url( 'estudio-ese' ) }}">Estudios Socioeconómicos</a></li>
		<li><a href="{{ url( $backToEstudio ) }}">Estudio {{ $estudio->id }}</a></li>
		<li><a href="javascript:;">Editar estudio</a></li>
	</ol>

	@if (session('success'))
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-{{ session('type') }} fade in m-b-15">
				<strong>{{ session('label') }}</strong>
				{{ session('success') }}
				<span class="close" data-dismiss="alert">×</span>
			</div>
		</div>
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif





	<div class="panel panel-warning" data-sortable-id="ui-widget-12">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
			<h4 class="panel-title">Formato GEN-T</h4>

		</div>
		<div class="panel-body">

				{{ Form::open(['route' => ['sig-erp-ese::formato-gent.update', $estudio], 'method' => 'put','enctype'=>'multipart/form-data' ]) }}								
					
					<div class="form-horizontal">
			            <div class="form-group">
			            	<div class="col-md-2">
			            		@if( $estudio )
			            			@if( $estudio->formatoGent )
				            			@if( $estudio->formatoGent->resumen )
					                    <a 	href="{{ url('gent-download-format-xls' . '/?estudio=' . $estudio->id . '&formato=formatoGent' )  }}"
					                    	class="btn btn-lg btn-circle btn-primary">
					                    		<i class="fa fa-file-excel-o"></i>
					                    </a>					                    					                    
				                    	@endif
				                    @else
				                    <div class="alert alert-warning fade in m-b-15">
											<strong>Descarga CSV: </strong>
											Para visualizar el Archivo de descarga guarda el formulario
											<span class="close" data-dismiss="alert">×</span>
									</div>
				                    @endif
				                @endif
			                </div>

			                <div class="col-md-2 col-md-offset-5 text-right">
			                    <button type="submit" class="btn btn-lg btn-circle btn-warning"><i class="fa fa-2x fa-save"></i></button>
			                 </div>
			       <div class="col-md-2">
			        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Fuentes de consultas</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">URL de consulta de información</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-danger" data-sortable-id="ui-widget-16">
		                        <div class="panel-heading">
		                            <div class="panel-heading-btn">
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		                            </div>
		                            <h4 class="panel-title">URL de consulta de información</h4>
		                        </div>
		                        <div class="panel-body">
		                        <div class="row">
		                            <div class="col-md-6">
		                            <a href="https://www.consisa.com.mx" target="_blank" title="Consisa"><i class="fa  fa-external-link"></i> Consisa</a>
		                            </div>
		                            <div class="col-md-6">
									<a href="https://www.siem.gob.mx" target="_blank" title="siem"><i class="fa  fa-external-link"></i> Siem</a>
									</div>
								</div>
								 <div class="row">
		                            <div class="col-md-6">
									<a href="https://www.google.com.mx/maps" target="_blank" title="Google Maps"><i class="fa  fa-external-link"></i> Google Maps</a>
									 </div>
		                            <div class="col-md-6">
									<a href="https://www.cedulaprofesional.sep.gob.mx" target="_blank" title="Cédula Profesional" ><i class="fa  fa-external-link"></i> Cédula Profesional</a>
									</div>
								</div>
								<div class="row">
		                            <div class="col-md-6">
									<a href="https://www.buholegal.com" target="_blank" title="Buro Legal"><i class="fa  fa-external-link"></i> Buro Legal</a>
										 </div>
		                            <div class="col-md-6">
									<a href="https://mx.datajuridica.com" target="_blank" title="Juridico"><i class="fa  fa-external-link"></i> Juridico</a>
									</div>
								</div>
								<div class="row">
		                            <div class="col-md-6">
									<a href="https://consultas.curp.gob.mx" target="_blank" title="Curp"><i class="fa  fa-external-link"></i> Curp</a>
										 </div>
		                            <div class="col-md-6">
									<a href="https://mi-rfc.com.mx/consulta-rfc-homoclave" target="_blank" title="RFC"> <i class="fa  fa-external-link"></i> Rfc</a>
										</div>
								</div>
								<div class="row">
		                            <div class="col-md-6">
									<a href="https://portal.infonavit.org.mx" target="_blank" title="INFONAVIT"><i class="fa  fa-external-link"></i> Infonavit</a>
									</div>
		                            <div class="col-md-6">
								    <a href="https://listanominal.ife.org.mx" target="_blank" title="IFE"><i class="fa  fa-external-link"></i> Ife</a>
								    	</div>
								</div>
		                        </div>
		                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

			                </div>
			            </div>

			        </div>


					@include('ESE.formatos-estaticos.gent.gent-componente-resumen')
					@include('ESE.formatos-estaticos.gent.gent-componente-datos-generales')
					@include('ESE.formatos-estaticos.gent.gent-componente-documentacion')
					@include('ESE.formatos-estaticos.gent.gent-componente-escolaridad')
					@include('ESE.formatos-estaticos.gent.gent-componente-datos-familiares')
					@include('ESE.formatos-estaticos.gent.gent-componente-datos-situacion-economica')
					@include('ESE.formatos-estaticos.gent.gent-componente-bienes')
					@include('ESE.formatos-estaticos.gent.gent-componente-informacion-vivienda')
					@include('ESE.formatos-estaticos.gent.gent-componente-apreciacion-vivienda')
					@include('ESE.formatos-estaticos.gent.gent-domicilio-ubicacion')
					@include('ESE.formatos-estaticos.gent.gent-componente-situacion-social')
					
					@include('ESE.formatos-estaticos.gent.gent-componente-estado-salud')
					@include('ESE.formatos-estaticos.gent.gent-componente-habitos-costumbres')
					@include('ESE.formatos-estaticos.gent.gent-componente-disponibilidad')
					
					@include('ESE.formatos-estaticos.gent.gent-componente-referencias-personales') 
					@include('ESE.formatos-estaticos.gent.gent-informacion-laboral')
					
					<div class="form-horizontal">
			            <div class="form-group">
			                <div class="col-md-2 col-md-offset-10">
			                    <button type="submit" class="btn btn-lg btn-circle btn-warning"><i class="fa fa-2x fa-save"></i></button>
			                </div>
			            </div>
			        </div>
				{{ Form::close() }}
				
		</div>
	</div>

</div>

{{ Form::open(['url' => 'gent-delete-cursos-realizados','method' => 'POST','id' => 'frm-delete-curso-realizado']) }}
	<input type="hidden" name="id_remove_curso_realizado" value="0" id="id_remove_curso_realizado">	
{{ Form::close() }}


{{ Form::open(['url' => 'gent-delete-idioma','method' => 'POST','id' => 'frm-delete-idioma']) }}
	<input type="hidden" name="id_remove_idioma" value="0" id="id_remove_idioma">	
{{ Form::close() }}


{{ Form::open(['url' => 'gent-delete-conocimiento','method' => 'POST','id' => 'frm-delete-conocimiento']) }}
	<input type="hidden" name="id_remove_conocimiento" value="0" id="id_remove_conocimiento">	
{{ Form::close() }}

{{ Form::open(['url' => 'gent-delete-referencia-personal','method' => 'POST','id' => 'frm-delete-ref-personal']) }}
	<input type="hidden" name="id_remove_ref_personal" value="0" id="id_remove_ref_personal">	
{{ Form::close() }}


{{ Form::open(['url' => 'gent-delete-referencia-laboral','method' => 'POST','id' => 'frm-delete-ref-laboral']) }}
	<input type="hidden" name="id_remove_ref_laboral" value="0" id="id_remove_ref_laboral">	
{{ Form::close() }}

{{ Form::open(['url' => 'gent-delete-dato-familiar','method' => 'POST','id' => 'frm-delete-dato-familiar']) }}
	<input type="hidden" name="id_remove_dato_familiar" value="0" id="id_remove_dato_familiar">	
{{ Form::close() }}

{{ Form::open(['url' => 'gent-delete-familiar-padece','method' => 'POST','id' => 'frm-delete-familiar-padece']) }}
	<input type="hidden" name="id_remove_familiar_padece" value="0" id="id_remove_familiar_padece">	
{{ Form::close() }}




</div>

@endsection

@section('js-base')

@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')


{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}


<script>


/***************************************************************************************************************************************************************************************
									INICIO ADD CURSOS
***************************************************************************************************************************************************************************************/

let index_curso = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->cursos ) : '1' }};
	document.getElementById('add-escolaridad-cursos').onclick = function () {
	    let template_curso = `
	    		<div class="form-group" id="fila_curso_${index_curso}">
	    			<div class="col-md-1 col-md-offset-1 text-right">
                        <a  href="javascript:;" 
                            class="btn btn-circle btn-danger btn-sm btn-rm-curso"
                            data-id-delete-row-curso="${index_curso}">
                            <i class="fa fa-minus"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" name="curso[${index_curso}][id]" value="0">
                        <input  type="text" class="form-control" value="" name="curso[${index_curso}][de]">
                    </div>
                    <div class="col-md-6">                    
                        <input  type="text" class="form-control" value="" name="curso[${index_curso}][curso]">
                    </div>                    
                </div>
	        `;

	    let container_curso = document.getElementById('cursos-realizados-container');
	    let div_curso 	  	= document.createElement('div');
	    div_curso.innerHTML = template_curso;
	    container_curso.appendChild(div_curso);
	    

	    index_curso++;

	    btn_delete_curso();
	}


	var btn_delete_curso = function()
	{
		$('.btn-rm-curso').click(function(){ 
			 var id_curso = $(this).attr('data-id-delete-row-curso');			 
			 $('#fila_curso_'+id_curso).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD CURSOS
***************************************************************************************************************************************************************************************/


/***************************************************************************************************************************************************************************************
									INICIO ADD IDIOMAS
***************************************************************************************************************************************************************************************/
let index_idioma = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->idiomas ) : '1' }};
	document.getElementById('add-escolaridad-idiomas').onclick = function () {
	    let template_idioma = `
	    		<div class="form-group" id="fila_escolaridad_idioma_${index_idioma}">
	    				<label class="col-md-1 text-center control-label">
		                    <a  href="javascript:;" 
		                        class="btn btn-circle btn-danger btn-sm btn-rm-idioma"	                        
		                        data-id-delete-row-idioma="${index_idioma}">
		                        <i class="fa fa-minus"></i>
		                    </a>
		                </label>
                        <div class="col-md-2">
                    		<input  type="hidden" name="idiomas[${index_idioma}][id]" value="0" >
                            <input  type="text" class="form-control" name="idiomas[${index_idioma}][idioma]" value="">                            
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[${index_idioma}][hablado]" value="0">
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[${index_idioma}][leido]" value="0">
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[${index_idioma}][escrito]" value="0">
                        </div>
                        <div class="col-md-2">
                            <input  type="number" class="form-control" name="idiomas[${index_idioma}][comprension]" value="0">
                        </div>
                        <div class="col-md-1">
                            <input  type="number" class="form-control" name="idiomas[${index_idioma}][porcentaje]" value="0" radonly="readonly">
                        </div>
                </div>
	        `;

	    let container_idioma  = document.getElementById('escolaridad-idiomas-container');
	    let div_idioma 	  	 = document.createElement('div');
	    div_idioma.innerHTML = template_idioma;
	    container_idioma.appendChild(div_idioma);
	    

	    index_idioma++;

	    btn_delete_idioma();
	}


	var btn_delete_idioma = function()
	{
		$('.btn-rm-idioma').click(function(){ 
			 var id_idioma = $(this).attr('data-id-delete-row-idioma');			 
			 $('#fila_escolaridad_idioma_'+id_idioma).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD IDIOMAS
***************************************************************************************************************************************************************************************/


/***************************************************************************************************************************************************************************************
									INICIO ADD CONOCIMIENTOS
***************************************************************************************************************************************************************************************/
let index_conocimiento = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->conocmientos_habilidades ) : '1' }};
	document.getElementById('add-escolaridad-conocimiento').onclick = function () {
	    let template_conocimiento = `
	    		<div class="form-group" id="fila_escolaridad_conocimiento_${index_conocimiento}">
	    			<label class="col-md-2 col-md-offset-1 text-center control-label">
	                    <a  href="javascript:;" 
	                        class="btn btn-circle btn-danger btn-sm btn-rm-conocimiento"	                        
	                        data-id-delete-row-conocimiento="${index_conocimiento}">
	                        <i class="fa fa-minus"></i>
	                    </a>
	                </label>
    				<div class="col-md-4">
                        <input type="hidden" name="conocimientos[${index_conocimiento}][id]" value="0">
                        <input  type="text" class="form-control" value="" name="conocimientos[${index_conocimiento}][paqueteria]">
                    </div>
                    <div class="col-md-4">                    
                        <input  type="text" class="form-control" value="" name="conocimientos[${index_conocimiento}][porcentaje]">
                    </div>
                </div>
	        `;

	    let container_conocimiento = document.getElementById('conocimientos-container');
	    let div_conocimiento 	   = document.createElement('div');
	    div_conocimiento.innerHTML = template_conocimiento;
	    container_conocimiento.appendChild(div_conocimiento);
	    

	    index_conocimiento++;

	    btn_delete_conocimiento();
	}


	var btn_delete_conocimiento = function()
	{
		$('.btn-rm-conocimiento').click(function(){ 
			 var id_conocimento = $(this).attr('data-id-delete-row-conocimiento');			 
			 $('#fila_escolaridad_conocimiento_'+id_conocimento).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD CONOCIMIENTOS
***************************************************************************************************************************************************************************************/







/***************************************************************************************************************************************************************************************
									INICIO ADD REFERENCIA LABORAL
***************************************************************************************************************************************************************************************/
let index_referencia_laboral = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->informacion_laboral ) : '1' }};
	document.getElementById('add-row-referencia-laboral').onclick = function () {
	    let template_referencia_laboral = `
	    	<div id="fila_referencia_laboral_${index_referencia_laboral}">
	    		<div class="form-group">
	    			<label class="col-md-2 text-center control-label">
	                    <a  href="javascript:;" 
	                        class="btn btn-circle btn-danger btn-sm btn-rm-referncia-laboral"	                        
	                        data-id-delete-referncia-laboral="${index_referencia_laboral}">
	                        <i class="fa fa-minus"></i>
	                    </a>
	                </label>
	    		</div>
	    		<div class="form-group">
                        <input type="hidden" name="referencia_laboral[${index_referencia_laboral}][id]" value="0">                
                        <label class="col-md-2 control-label">Empresa</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][empresa]" value="${index_referencia_laboral}">
                        </div>
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[${index_referencia_laboral}][telefono]" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Giro</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][giro]" value="">
                        </div>
                        <label class="col-md-2 control-label">Celular</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencia_laboral[${index_referencia_laboral}][celular]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Dirección</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][direccion]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Puesto inicial</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][puesto_inicial]" value="">
                        </div>
                        <label class="col-md-1 control-label">Sueldo inicial</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[${index_referencia_laboral}][sueldo_inicial]" value=""
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <label class="col-md-1 control-label">Fecha de ingreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][fecha_ingreso]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Último Puesto</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][ultimo_puesto]" value="">
                        </div>
                        <label class="col-md-1 control-label">Sueldo final</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="referencia_laboral[${index_referencia_laboral}][sueldo_final]" value=""  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <label class="col-md-1 control-label">Fecha de egreso</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][fecha_egreso]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-1 control-label">Nombre del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][jefe_inmediato]" value="">
                        </div>
                        <label class="col-md-1 control-label">Puesto, Área y Departamento</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][jefe_puesto]" value="">
                        </div>
                        <label class="col-md-1 control-label">Tiempo que dependió del jefe inmediato</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][jefe_tiempo_dependio]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Principales funciones</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][funciones]" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <hr>
                        <label class="col-md-12 control-label text-center"><strong>Evaluación de desempeño</strong></label>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Asistencia</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][asistencia]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Puntualidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][puntualidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Honradez</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][honradez]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Responsabilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][responsabilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>                                                          
                        <label class="col-md-2 control-label">Dsiponibilidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][disponibilidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Compromiso con la empresa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][compromiso]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Iniciativa</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][iniciativa]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>               
                        <label class="col-md-2 control-label">Calidad del trabajo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][calidad_trabajo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Trabajo en equipo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][trabajo_equipo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Trabajo bajo presión</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][trabajo_presion]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>              
                        <label class="col-md-2 control-label">Actitud con el jefe</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][trato_jefe]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Actitud con sus compañeros</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][trato_companeros]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">Productividad/Capacidad</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][productividad_capacidad]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Liderazgo</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][liderazgo]">
                                <option value="1" >Excelente</option>
                                <option value="2" >Bueno</option>
                                <option value="3" >Regular</option>
                                <option value="4" >Malo</option>
                                <option value="5" >Pésimo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Tipo de contrato</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][tipo_contrato]" value="">
                        </div>
                        <label class="col-md-2 control-label">Motivo de separación</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][motivo_separacion]" value="">
                        </div>
                    </div>

                   

                    <div class="form-group"> 
                        <label class="col-md-2 control-label">¿Existe lgún adeudo?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][adeudo]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Perteneció a algún sindicato?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][sindicato]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">¿Lo contratarían nuevamente?</label>
                        <div class="col-md-2">
                            <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][contratar_nuevamente]">
                                <option value="1" >Si</option>
                                <option value="2" >No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="referencia_laboral[${index_referencia_laboral}][observaciones]">{{ isset( $estudio->formatoHsbc->antecedentesLegales ) ? $estudio->formatoHsbc->antecedentesLegales->descripcion : '' }}</textarea>
                        </div>
                    </div> 
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Informó</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][informo]" value="">
                        </div>
                        <label class="col-md-2 control-label">Puesto</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][puesto_informa]" value="">
                        </div>
                    </div>
                    <br><br><br>
                    <hr>
	        `;

	    let container_referencia_laboral = document.getElementById('refencia-laboral-container');
	    let div_referencia_laboral 	  	 = document.createElement('div');
	    div_referencia_laboral.innerHTML = template_referencia_laboral;
	    container_referencia_laboral.appendChild(div_referencia_laboral);
	    

	    index_referencia_laboral++;

	    btn_delete_referencia_laboral();

	    $('.telefono').numeric();
	}


	var btn_delete_referencia_laboral = function()
	{
		$('.btn-rm-referncia-laboral').click(function(){ 
			 var id_ref_lab = $(this).attr('data-id-delete-referncia-laboral');			 
			 $('#fila_referencia_laboral_'+id_ref_lab).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD REFERENCIA LABORAL
***************************************************************************************************************************************************************************************/

/***************************************************************************************************************************************************************************************
									INICIO ADD REFERENCIAS PERSONALES
***************************************************************************************************************************************************************************************/
let index_referencia_personal = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->referencias_personales ) : '1' }};
	document.getElementById('add-row-referencia-personal').onclick = function () {
	    let template_referencia_personal = `
	    		<div class="form-group" id="fila_referencia_personal_${index_referencia_personal}">
	    			<div class="form-group">
		    			<label class="col-md-2 text-center control-label">
		                    <a  href="javascript:;" 
		                        class="btn btn-circle btn-danger btn-xs btn-rm-referncia-personal"	                        
		                        data-id-delete-referncia-personal="${index_referencia_personal}">
		                        <i class="fa fa-minus"></i>
		                    </a>
		                </label>
		    		</div>
	    			<div class="form-group">                
                        <label class="col-md-2 control-label">Nombre de la referencia</label>
                        <div class="col-md-4">
                            <input type="hidden" class="form-control" name="referencias_personales[${index_referencia_personal}][id]" value="0">
                            <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][nombre_referencia]" value="${index_referencia_personal}">
                        </div>
                        <label class="col-md-2 control-label">Celular</label>
                        <div class="col-md-3">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencias_personales[${index_referencia_personal}][celular]" value="">
                        </div>
                    </div>

                    <div class="form-group">                
                        <label class="col-md-2 control-label">Domicilio</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][domicilio]" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input type="text" maxlength="13" class="form-control telefono" name="referencias_personales[${index_referencia_personal}][telefono]" value="">
                        </div>
                        <label class="col-md-2 control-label">Ocupación</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][ocupacion]" value="">
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Empresa</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][empresa]" value="">
                        </div>
                        <label class="col-md-1 control-label">Parentesco</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][parentesco]" value="">
                        </div>
                        <label class="col-md-1 control-label">Tiempo de conocerlo</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][tiempo_conocerlo]" value="">
                        </div>
                     </div>

                    
                    <div class="form-group">                
                        <label class="col-md-2 control-label">Comentarios</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" name="referencias_personales[${index_referencia_personal}][comentarios]"></textarea>
                        </div>
                    </div> 
                </div>
	        `;

	    let container_referencia_personal = document.getElementById('refencia-personal-container');
	    let div_referencia_personal 	  = document.createElement('div');
	    div_referencia_personal.innerHTML = template_referencia_personal;
	    container_referencia_personal.appendChild(div_referencia_personal);
	    

	    index_referencia_personal++;

	    btn_delete_referencia_personal();

	    $('.telefono').numeric();
	}


	var btn_delete_referencia_personal = function()
	{
		$('.btn-rm-referncia-personal').click(function(){ 
			 var id_parentesco = $(this).attr('data-id-delete-referncia-personal');			 
			 $('#fila_referencia_personal_'+id_parentesco).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD REFERENCIAS PERSONALES
***************************************************************************************************************************************************************************************/



/***************************************************************************************************************************************************************************************
									INICIO ADD DATOS FAMILIARES
***************************************************************************************************************************************************************************************/

let index_dato_familiar = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->datos_familiares ) : '1' }};
	document.getElementById('add-row-dato-familiar').onclick = function () {
	    let template_dato_famliar = `
	    		<div class="form-group" id="fila_dato_personal_${index_dato_familiar}">
	    			<div class="form-group">
		    			<label class="col-md-2 text-center control-label">
		                    <a  href="javascript:;" 
		                        class="btn btn-circle btn-danger btn-xs btn-rm-datos-familiares"	                        
		                        data-id-delete-btn-rm-datos-familiares="${index_dato_familiar}">
		                        <i class="fa fa-minus"></i>
		                    </a>
		                </label>
		    		</div>
	    			<div class="form-group">
					    <input type="hidden" name="parentesco[${index_dato_familiar}][id]" value="0">
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="parentesco[${index_dato_familiar}][parentesco]" value="${index_dato_familiar}">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="parentesco[${index_dato_familiar}][nombre]" value="">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="parentesco[${index_dato_familiar}][edad]" value="">
					    </div>
					    <div class="col-md-2">
					            <input type="text" class="form-control" name="parentesco[${index_dato_familiar}][edo_civil]" value="">
					        </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="parentesco[${index_dato_familiar}][ocupacion]" value="">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="parentesco[${index_dato_familiar}][domicilio]" value="">
					    </div>
					</div>
                </div>
	        `;

	    let container_dato_familiar = document.getElementById('dato-familiar-container');
	    let div_dato_familiar 	  = document.createElement('div');
	    div_dato_familiar.innerHTML = template_dato_famliar;
	    container_dato_familiar.appendChild(div_dato_familiar);
	    

	    index_dato_familiar++;

	    btn_delete_dato_familiar();
	}


	var btn_delete_dato_familiar = function()
	{
		$('.btn-rm-datos-familiares').click(function(){ 
			 var id_dato_familiar = $(this).attr('data-id-delete-btn-rm-datos-familiares');			 
			 $('#fila_dato_personal_'+id_dato_familiar).remove();
		});
	}




/***************************************************************************************************************************************************************************************
									FIN ADD DATOS FAMILIARES
***************************************************************************************************************************************************************************************/




/***************************************************************************************************************************************************************************************
									INICIO ADD FAMILIAR PADECE
***************************************************************************************************************************************************************************************/

let index_familiar_padece = {{ isset( $estudio->formatoGent ) ? count( $estudio->formatoGent->datos_familiares ) : '1' }};
	document.getElementById('add-row-familiar-padece').onclick = function () {
	    let template_familiar_padece = `
	    		<div class="form-group" id="fila_familiar_padece_${index_familiar_padece}">
	    			<div class="form-group">
		    			<label class="col-md-2 text-center control-label">
		                    <a  href="javascript:;" 
		                        class="btn btn-circle btn-danger btn-xs btn-rm-familiar-padece"	                        
		                        data-id-delete-btn-rm-familiar-padece="${index_familiar_padece}">
		                        <i class="fa fa-minus"></i>
		                    </a>
		                </label>
                        <div class="col-md-3 ">
                            <input  type="hidden" 
                                    class="form-control" 
                                    name="familiares_padecimientos[${index_familiar_padece}][id]" 
                                    value="0">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[${index_familiar_padece}][nombre]" 
                                    value="${index_familiar_padece}">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[${index_familiar_padece}][parentesco]" 
                                    value="">
                        </div>
                        <div class="col-md-3">
                            <input  type="text" 
                                    class="form-control" 
                                    name="familiares_padecimientos[${index_familiar_padece}][padecimiento]" 
                                    value="">
                        </div>
                    </div>
                </div>
	        `;

	    let container_familiar_padece = document.getElementById('familiares-padecen-container');
	    let div_familiar_padece 	  = document.createElement('div');
	    div_familiar_padece.innerHTML = template_familiar_padece;
	    container_familiar_padece.appendChild(div_familiar_padece);
	    

	    index_familiar_padece++;

	    btn_delete_familiar_padece();
	}


	var btn_delete_familiar_padece = function()
	{
		$('.btn-rm-familiar-padece').click(function(){ 
			 var id_familiar_padece = $(this).attr('data-id-delete-btn-rm-familiar-padece');			 
			 $('#fila_familiar_padece_'+id_familiar_padece).remove();
		});
	}




/***************************************************************************************************************************************************************************************
									FIN ADD FAMILIAR PADECE
***************************************************************************************************************************************************************************************/





	var getEgresos = function()
	{
		var lista_monto_egresos  = $('.monto_egresos');
		var suma_monto_egresos   = 0.00;
		$.each(lista_monto_egresos,function(key,valor){
			suma_monto_egresos += parseFloat( valor.value );				
		});

		return suma_monto_egresos;
	}

	var getIngresos = function()
	{
		var lista_monto_ingresos = $('.monto_ingresos');
		var suma_monto_ingresos  = 0.00;
		$.each(lista_monto_ingresos,function(key,valor){
			suma_monto_ingresos += parseFloat( valor.value );				
		});

		return suma_monto_ingresos;
	}

	var getBienes = function()
	{
		var lista_monto_bienes = $('.monto_bienes');
		var suma_monto_bienes  = 0.00;
		$.each(lista_monto_bienes,function(key,valor){
			suma_monto_bienes += parseFloat( valor.value );				
		});

		return suma_monto_bienes;
	}

	var getPagado = function()
	{
		var lista_monto_pagado = $('.monto_pagado');
		var suma_monto_pagado  = 0.00;
		$.each(lista_monto_pagado,function(key,valor){
			suma_monto_pagado += parseFloat( valor.value );				
		});

		return suma_monto_pagado;
	}

	var getAdeudo = function()
	{
		var lista_monto_adeudo = $('.monto_adeudo');
		var suma_monto_adeudo  = 0.00;
		$.each(lista_monto_adeudo,function(key,valor){
			suma_monto_adeudo += parseFloat( valor.value );				
		});

		return suma_monto_adeudo;
	}




	$(document).ready(function(){
		btn_delete_curso();
		btn_delete_idioma();
		btn_delete_conocimiento();
		btn_delete_referencia_laboral();
		btn_delete_referencia_personal();


		$.fn.delayKeyUp = function(fn, ms)
	    {
	        var timer = 0;
	        $(this).on("keyup paste", function()
	        {
	            clearTimeout(timer);
	            timer = setTimeout(fn, ms);
	        });
	    };

		$('.monto_egresos').delayKeyUp(function(){
			$('#monto_egresos_total').val( getEgresos() );			
			$('#monto_total_ingresos').val( getIngresos() );
		},2000);

		$('.monto_ingresos').delayKeyUp(function(){
			$('#monto_egresos_total').val( getEgresos() );			
			$('#monto_total_ingresos').val( getIngresos() );
		},2000);


		$('.monto_bienes').delayKeyUp(function(){
			$('#monto_bienes_total').val( getBienes() );			
			$('#monto_pagado_total').val( getPagado() );
			$('#monto_adeudo_total').val( getAdeudo() );
		},2000);

		$('.monto_pagado').delayKeyUp(function(){
			$('#monto_bienes_total').val( getBienes() );			
			$('#monto_pagado_total').val( getPagado() );
			$('#monto_adeudo_total').val( getAdeudo() );
		},2000);

		$('.monto_adeudo').delayKeyUp(function(){
			$('#monto_bienes_total').val( getBienes() );			
			$('#monto_pagado_total').val( getPagado() );
			$('#monto_adeudo_total').val( getAdeudo() );
		},2000);

		$('.frm-submit-delete-curso-realizado').click(function(){
			var id_remove_curso_realizado = $(this).attr('data-id-delete-curso');
			$('#id_remove_curso_realizado').val( id_remove_curso_realizado );
			$('#frm-delete-curso-realizado').submit();
		});

		$('.frm-submit-delete-idioma').click(function(){
			var id_remove_idioma = $(this).attr('data-id-delete-idioma');
			$('#id_remove_idioma').val( id_remove_idioma );
			$('#frm-delete-idioma').submit();
		});

		$('.frm-submit-delete-conocimiento').click(function(){
			var id_remove_conocimiento = $(this).attr('data-id-delete-conocimiento');
			$('#id_remove_conocimiento').val( id_remove_conocimiento );
			$('#frm-delete-conocimiento').submit();
		});

		$('.frm-submit-delete-referncia-personal').click(function(){
			var id_rm_referencia_personal = $(this).attr('data-id-delete-referncia-personal');
			$('#id_remove_ref_personal').val( id_rm_referencia_personal );
			$('#frm-delete-ref-personal').submit();
		});

		$('.frm-submit-delete-referncia-laboral').click(function(){
			var id_rm_referencia_laboral = $(this).attr('data-id-delete-referncia-laboral');
			$('#id_remove_ref_laboral').val( id_rm_referencia_laboral );
			$('#frm-delete-ref-laboral').submit();
		});

		$('.frm-submit-delete-dato-familiar').click(function(){
			var id_rm_dato_familiar = $(this).attr('data-id-delete-dato-familiar');
			$('#id_remove_dato_familiar').val( id_rm_dato_familiar );
			$('#frm-delete-dato-familiar').submit();
		});

		$('.frm-submit-delete-familiar-padece').click(function(){
			var id_rm_familiar_padece = $(this).attr('data-id-delete-familiar-padece');
			$('#id_remove_familiar_padece').val( id_rm_familiar_padece );
			$('#frm-delete-familiar-padece').submit();
		});

		$('.telefono').numeric();


	});

</script>


@endsection


