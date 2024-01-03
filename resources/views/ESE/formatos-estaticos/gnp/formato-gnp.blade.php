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
			<h4 class="panel-title">FORMATO GNP</h4>
		</div>
		<div class="panel-body">							
				{{ Form::open(['route' => ['sig-erp-ese::formato-gnp.update', $estudio], 'method' => 'put' ]) }}				
					
					<div class="form-horizontal">
			            <div class="form-group">
			                <div class="col-md-2 col-md-offset-7 text-right">
			                    <button type="submit" class="btn btn-lg btn-circle btn-primary"><i class="fa fa-1x fa-save"></i></button>
			                </div>
			                       <div class="col-md-3">
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

					@include('ESE.formatos-estaticos.gnp.gnp-componente-encabezado')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-datos-generales')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-escolaridad')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-cursos')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-idiomas')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-conocimientos')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-familia')
					@include('ESE.formatos-estaticos.gnp.gnp-componente-info-familiar')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-situacion-economica')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-bienes')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-informacion-vivienda')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-apreciacion')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-ubicacion')
				    @include('ESE.formatos-estaticos.gnp.gnp-comoponente-situacion-social')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-estado-salud')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-padecimientos')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-tratamiento-salud')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-atencion-medica')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-habitos')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-disponibilidad')
				    @include('ESE.formatos-estaticos.gnp.gnp-componente-referencias-laborales')


					

					
					<div class="form-horizontal">
			            <div class="form-group">
			                <div class="col-md-2 col-md-offset-10">
			                    <button type="submit" class="btn btn-lg btn-circle btn-primary"><i class="fa fa-2x fa-save"></i></button>
			                </div>
			            </div>
			        </div>
				{{ Form::close() }}
				
		</div>
	</div>

</div>
{{ Form::open(['url' => 'delete-curso','method' => 'POST','id' => 'frm-delete-curso']) }}
	<input type="hidden" name="id_remove_curso" value="0" id="id_remove_curso">	
{{ Form::close() }}
{{ Form::open(['url' => 'delete-idioma','method' => 'POST','id' => 'frm-delete-idioma']) }}
	<input type="hidden" name="id_remove_idioma" value="0" id="id_remove_idioma">	
{{ Form::close() }}
{{ Form::open(['url' => 'delete-conocimiento','method' => 'POST','id' => 'frm-delete-conocimiento']) }}
	<input type="hidden" name="id_remove_conocimiento" value="0" id="id_remove_conocimiento">	
{{ Form::close() }}
{{ Form::open(['url' => 'delete-familia','method' => 'POST','id' => 'frm-delete-familia']) }}
	<input type="hidden" name="id_remove_familia" value="0" id="id_remove_familia">	
{{ Form::close() }}
{{ Form::open(['url' => 'delete-tratamiento','method' => 'POST','id' => 'frm-delete-tratamiento']) }}
	<input type="hidden" name="id_remove_tratamiento" value="0" id="id_remove_tratamiento">	
{{ Form::close() }}
{{ Form::open(['url' => 'delete-laboral','method' => 'POST','id' => 'frm-delete-laboral']) }}
	<input type="hidden" name="id_remove_laboral" value="0" id="id_remove_laboral">	
{{ Form::close() }}


</div>

@endsection

@section('js-base')

@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')


{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}
<script >
	
	//---------------------------------------------------------cursos--------------------------------------------//

let index_cursos = {{ isset( $estudio->formatoGnp->cursoMet ) ? count( $estudio->formatoGnp->cursoMet ) : '1' }};
	document.getElementById('add-curso').onclick = function () {
	    let template_curso = `
	        	<div id="fila_curso_${index_cursos}" class="form-horizontal">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-curso" data-btn-delete-curso="${index_cursos}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>
					    <label class="col-md-2 text-center control-label"><strong>DE</strong></label>
					    <label class="col-md-2 text-center control-label"><strong>A</strong></label>
					    <label class="col-md-6 text-center control-label"><strong>REALIZÓ</strong></label>
					                 
					</div>
					<div class="form-group">
						<input type="hidden" name="cursos[${index_cursos}][id]" value="0">
					    <div class="col-md-2 col-md-offset-2">
					        <input type="text" maxlength="50" class="form-control" name="cursos[${index_cursos}][de]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" maxlength="50" class="form-control" name="cursos[${index_cursos}][a]">
					    </div>
					    <div class="col-md-6">
					        <input type="text" class="form-control" name="cursos[${index_cursos}][realizo]">
					    </div>
					  
					</div>
	            	<hr>
	            </div>
	        `;

	    let container_curso = document.getElementById('cursos-container');
	    let div_curso 	  = document.createElement('div');
	    div_curso.innerHTML = template_curso;
	    container_curso.appendChild(div_curso);
	    

	    index_cursos++;

	    btn_delete_curso();
	}


	var btn_delete_curso = function()
	{
		$('.btn-row-curso').click(function(){
			 var id_curs = $(this).attr('data-btn-delete-curso');
			 $('#fila_curso_'+id_curs).remove();
		});
	}
// --------------------------------------------END CURSOS---------------------------------------------------------------------//
//---------------------------------------------------------IDIOMAS--------------------------------------------//
let index_idioma = {{ isset( $estudio->formatoGnp->idiomas ) ? count( $estudio->formatoGnp->idiomas ) : '1' }};
	document.getElementById('add-idioma').onclick = function () {
	    let template_idioma = `
	        	<div id="fila_idioma_${index_idioma}" class="form-horizontal">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-idioma" data-btn-delete-idioma="${index_idioma}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>
					    <label class="col-md-2 text-center control-label"><strong>IDIOMA</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>HABLADO<br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>LEÍDO<br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>ESCRITO<br>%</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>COMPRENSION<br>%</strong></label>
                       
                                 
                </div>
                <div class="form-group">
                  <input type="hidden" name="idiomas_realizados[${index_idioma}][id]" value="0">
                    <div class="col-md-2 col-md-offset-2">
                        <input type="text" class="form-control" name="idiomas_realizados[${index_idioma}][idioma]" maxlength="255">
                    </div>
                     <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[${index_idioma}][hablado]" maxlength="3">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[${index_idioma}][leido]" maxlength="3">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[${index_idioma}][escrito]" maxlength="3">
                    </div>
                    <div class="col-md-2">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" class="form-control" name="idiomas_realizados[${index_idioma}][comprension]" maxlength="3">
                    </div>
                   
                </div>
	            	<hr>
	            </div>
	        `;

	    let container_idioma = document.getElementById('idioma-container');
	    let div_idioma 	  = document.createElement('div');
	    div_idioma.innerHTML = template_idioma;
	    container_idioma.appendChild(div_idioma);
	    

	    index_idioma++;

	    btn_delete_idioma();
	}


	var btn_delete_idioma = function()
	{
		$('.btn-row-idioma').click(function(){
			 var id_idio = $(this).attr('data-btn-delete-idioma');
			 $('#fila_idioma_'+id_idio).remove();
		});
	}


// --------------------------------------------END IDIOMAS---------------------------------------------------------------------//
//---------------------------------------------------------CONOCIMIENTOS--------------------------------------------//

let index_conocimientos = {{ isset( $estudio->formatoGnp->conocimientos_ ) ? count( $estudio->formatoGnp->conocimientos_ ) : '1' }};
	document.getElementById('add-conocimiento').onclick = function () {
	    let template_conocimiento = `
	        	<div id="fila_conocimiento_${index_conocimientos}" class="form-horizontal">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-conocimiento" data-btn-delete-conocimiento="${index_conocimientos}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>
					    <label class="col-md-5 text-center control-label"><strong>PAQUETERIA</strong></label>
					    <label class="col-md-2 text-center control-label"><strong>%</strong></label>
					
					                 
					</div>
					<div class="form-group">

						<input type="hidden" name="conocimientomet[${index_conocimientos}][id]" value="0">
					    <div class="col-md-5 col-md-offset-2">
					        <input type="text" class="form-control" name="conocimientomet[${index_conocimientos}][paqueteria]">
					    </div>
					    <div class="col-md-2">
					        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" min="1" max="99999999999999999" class="form-control" name="conocimientomet[${index_conocimientos}][porcentaje]">
					    </div>
					    					  
					</div>
	            	<hr>
	            </div>
	        `;

	    let container_con = document.getElementById('conocimiento-container');
	    let div_con 	  = document.createElement('div');
	    div_con.innerHTML = template_conocimiento;
	    container_con.appendChild(div_con);
	    

	    index_conocimientos++;


	    btn_delete_conocimiento();
	}


	var btn_delete_conocimiento = function()
	{
		$('.btn-row-conocimiento').click(function(){
			 var id_conoc = $(this).attr('data-btn-delete-conocimiento');
			 $('#fila_conocimiento_'+id_conoc).remove();
		});
	}
// --------------------------------------------END CONOCIMIENTOS---------------------------------------------------------------------//
//---------------------------------------------------------FAMILIA--------------------------------------------//

let index_familia = {{ isset( $estudio->formatoGnp->familia ) ? count( $estudio->formatoGnp->familia) : '1' }};
	document.getElementById('add-familia').onclick = function () {
	    let template_familia = `
	        	<div id="fila_familia_${index_familia}" class="form-horizontal">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-familia" data-btn-delete-familia="${index_familia}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>
					    <label class="col-md-2 text-center control-label"><strong>PARENTESCO<strong></label>
                        <label class="col-md-2 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>EDAD</strong></label>
                        <label class="col-md-1 text-center control-label"><strong>ESTADO CIVIL</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>OCUPACIÓN</strong></label>
                        <label class="col-md-2 text-center control-label"><strong>DOMICILIO</strong></label>
					
					                 
					</div>
					<div class="form-group">

						<input type="hidden" name="family[${index_familia}][id]" value="0">
					    <div class="col-md-2 col-md-offset-2">
					        <input type="text" maxlength="255" class="form-control" name="family[${index_familia}][parentesco]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" maxlength="255" class="form-control" name="family[${index_familia}][nombre]">
					    </div>
					    <div class="col-md-1">
					        <input type="text" maxlength="255" class="form-control" name="family[${index_familia}][edad]">
					    </div>
					    <div class="col-md-1">
					        <input type="text" maxlength="255" class="form-control" name="family[${index_familia}][edo_civil_familia]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" maxlength="255" class="form-control" name="family[${index_familia}][ocupacion]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" maxlength="255" class="form-control" name="family[${index_familia}][domicilio]">
					    </div>
					   
					    					  
					</div>
	            	<hr>
	            </div>
	        `;

	    let container_fam = document.getElementById('familia-container');
	    let div_fam 	  = document.createElement('div');
	    div_fam.innerHTML = template_familia;
	    container_fam.appendChild(div_fam);
	    

	    index_familia++;

	    btn_delete_familia();
	}


	var btn_delete_familia = function()
	{
		$('.btn-row-familia').click(function(){
			 var id_fam = $(this).attr('data-btn-delete-familia');
			 $('#fila_familia_'+id_fam).remove();
		});
	}
// --------------------------------------------END FAMILIA---------------------------------------------------------------------//
//---------------------------------------------------------ITRATAMIENTO--------------------------------------------//
let index_tratamiento = {{ isset( $estudio->formatoGnp->edoSalud ) ? count( $estudio->formatoGnp->edoSalud ) : '1' }};
	document.getElementById('add-tratamiento').onclick = function () {
	    let template_tratamiento = `
	        	<div id="fila_tratamiento_${index_tratamiento}" class="form-horizontal">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-tratamiento" data-btn-delete-tratamiento="${index_tratamiento}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>
					    <label class="col-md-3 text-center control-label"><strong>NOMBRE</strong></label>
                        <label class="col-md-3 text-center control-label"><strong>PARENTESCO</strong></label>
                        <label class="col-md-3 text-center control-label"><strong>PADECIMIENTO</strong></label>
                       
                                 
                </div>
                <div class="form-group">
                  <input type="hidden" name="trata[${index_tratamiento}][id]" value="0">
                    <div class="col-md-3 col-md-offset-2">
                        <input type="text" class="form-control" name="trata[${index_tratamiento}][nombre]" maxlength="255">
                    </div>
                     <div class="col-md-3">
                        <input type="text" class="form-control" name="trata[${index_tratamiento}][parentesco]" maxlength="255">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="trata[${index_tratamiento}][padecimiento]" maxlength="255">
                    </div>
                                     
                </div>
	            	<hr>
	            </div>
	        `;

	    let container_tratamiento = document.getElementById('tratamiento-container');
	    let div_tratamiento 	  = document.createElement('div');
	    div_tratamiento.innerHTML = template_tratamiento;
	    container_tratamiento.appendChild(div_tratamiento);
	    

	    index_tratamiento++;

	    btn_delete_tratamiento();
	}


	var btn_delete_tratamiento = function()
	{
		$('.btn-row-tratamiento').click(function(){
			 var id_trat = $(this).attr('data-btn-delete-tratamiento');
			 $('#fila_tratamiento_'+id_trat).remove();
		});
	}


// --------------------------------------------END TRATAMIENTO---------------------------------------------------------------------//
//---------------------------------------------------------REFERENCIAS LABORALES--------------------------------------------//

let index_laboral = {{ isset( $estudio->formatoRoa->referenciaLaborales) ? count( $estudio->formatoRoa->referenciaLaborales) : '1' }};
	document.getElementById('add-laboral').onclick = function () {
	    let template_laboral = `
	        <div id="fila_laboral_${index_laboral}" attr-row="${index_laboral}">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-laboral" data-btn-delete-laboral="${index_laboral}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>				
					                 
					</div>
			<div class="form-group">

				<div class="form-group">
                                                         
                        <input type="hidden" name="referencias_laborales[${index_laboral}][id]" value="0">
                        <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">EMPRESA:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][empresa_laboral]">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">TELÉFONO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[${index_laboral}][telefono_laboral]"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                    </div>
             
                 <div class="form-group">
                    
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">GIRO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][giro_laboral]" >
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">CELULAR:</label>
                        </div>
                        <div class="col-md-3 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[${index_laboral}][celular_laboral]"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                    
                </div>
                  <div class="form-group">
                    
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">DIRECCIÓN:</label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][direccion_laboral]" >
                        </div>
                       
                   
                </div>
                <div class="form-group">
                  
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">PUESTO INICIAL:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][puesto_inicial_laboral]" >
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">SUELDO INICIAL:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[${index_laboral}][sueldo_inicial_laboral]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">FECHA INGRESO:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="date"  class="form-control" name="referencias_laborales[${index_laboral}][fecha_ingreso_laboral]"   maxlength="10">
                        </div>
                  
                </div>
                 <div class="form-group">
               
                       <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">ÚLTIMO PUESTO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][ultimo_puesto_laboral]" >
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">SUELDO FINAL:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="number"  class="form-control" name="referencias_laborales[${index_laboral}][sueldo_final_laboral]"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1" max="99999999999999999" maxlength="15">
                        </div>
                        <div class="col-md-1 text-right">
                            <label class="control-label">FECHA EGRESO:</label>
                        </div>
                        <div class="col-md-2 text-left">
                            <input type="date"  class="form-control" name="referencias_laborales[${index_laboral}][fecha_egreso_laboral]"   maxlength="10">
                        </div>
                   
                </div>
                <div class="form-group">
                   
                       <div class="col-md-4 col-md-offset-1 text-center">
                            <label class="control-label">NOMBRE DEL JEFE INMEDIATO:</label>
                        </div>
                        
                         <div class="col-md-4 text-center">
                            <label class="control-label">PUESTO,  ÁREA Y DEPARTAMENTO</label>
                        </div>

                            <div class="col-md-3 text-center">
                            <label class="control-label">TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO</label>
                        </div>
                   
                       
                </div>
              
                <div class="form-group">
                  
                        <div class="col-md-4 col-md-offset-1">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][nombre_jinmediato_laboral]" >
                        </div>
                        <div class="col-md-4">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][jpuesto_laboral]" >
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][tiempo_dependio_laboral]" >
                        </div>
                   
                </div>
                <div class="form-group">
                  
                      <div class="col-md-3  col-md-offset-1 text-center">
                            <label class="control-label">PRINCIPALES FUNCIONES</label>
                        </div>
                        <div class="col-md-7 text-center">
<textarea class="form-control" placeholder="Describir Situación Socioeconómica " rows="5"   name="referencias_laborales[${index_laboral}][principales_funciones_laboral]">
                             
                            </textarea>
                        </div>
                    </div>
              
                 <div class="form-group">
                    
                        <div class="col-md-12 text-center">
                           <div class="alert alert-info fade in alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                 EVALUACIÓN DE DESEMPEÑO
                            </div>
                       
                        </div>
                 
                </div>
                 <div class="form-group">
                
                        <div class="col-md-3 col-md-offset-1 text-right">
                           ASISTENCIA    
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][asistencia_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                 
                </div>
                <div class="form-group">
                  
                        <div class="col-md-3 col-md-offset-1 text-right">
                          PUNTUALIDAD   
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][puntualidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                   
                </div>
                  <div class="form-group">
                   
                        <div class="col-md-3 col-md-offset-1 text-right">
                          HONRADEZ
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][honradez_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                  
                </div>
                <div class="form-group">
                   
                        <div class="col-md-3 col-md-offset-1 text-right">
                          RESPONSABILIDAD
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][responsabilidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                  
                </div>
                    <div class="form-group">
                  
                        <div class="col-md-3 col-md-offset-1 text-right">
                          DISPONIBILIDAD
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][disponibilidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                  
                </div>
                 <div class="form-group">
                
                        <div class="col-md-3 col-md-offset-1 text-right">
                         COMPROMISO CON LA EMPRESA
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][compromiso_empresa_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                
                </div>
                 <div class="form-group">
                    
                        <div class="col-md-3 col-md-offset-1 text-right">
                         INICIATIVA
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][iniciativa_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                  
                </div>
                 <div class="form-group">
                 
                        <div class="col-md-3 col-md-offset-1 text-right">
                         CALIDAD DEL TRABAJO
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][calidad_trabajo_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                   
                </div>
                    <div class="form-group">
                  
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRABAJO EN EQUIPO
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][trabajo_equipo_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                    
                </div>
                  <div class="form-group">
                  
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRABAJO BAJO PRESIÓN
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][trabajo_bajo_presión_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                   
                </div>
                    <div class="form-group">
                 
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRATO CON EL JEFE
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][trato_jefe_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                   
                </div>
                  <div class="form-group">
                  
                        <div class="col-md-3 col-md-offset-1 text-right">
                         TRATO CON COMPAÑEROS
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][trato_compañeros_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
              
                </div>
                 <div class="form-group">
                   
                        <div class="col-md-3 col-md-offset-1 text-right">
                        PRODUCTIVIDAD / CAPACIDAD
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][productividad_capacidad_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                  
                </div>
                 <div class="form-group">
                   
                        <div class="col-md-3 col-md-offset-1 text-right">
                         LIDERAZGO
                        </div>
                         <div class="col-md-4 col-md-offset-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][liderazgo_laboral]">
                            <option value="1">EXCELENTE</option>
                            <option value="2" >BUENO</option>
                            <option value="3" >REGULAR</option>
                            <option value="4" >MALO</option>
                            <option value="5" >PÉSIMO</option>
              
                           </select>
                       
                        </div>
                   
                </div>
                   <div class="form-group">
                   
                    <div class="col-md-1 col-md-offset-1 text-right">
                         TIPO DE CONTRATO
                        </div>
                         <div class="col-md-2  text-left">
                         <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][tipo_contrato_laboral]">
                          
                        </div>
                        <div class="col-md-2 text-right">
                         MOTIVO DE SEPARACIÓN
                        </div>
                         <div class="col-md-4 text-left">
                    <textarea class="form-control" placeholder="Describir motivo de separación " rows="5"   name="referencias_laborales[${index_laboral}][motivo_separacion_laboral]">
                              
                            </textarea>
                          
                        </div>
                   
                </div>
                <div class="form-group">
               
                     <div class="col-md-2 col-md-offset-1 text-left">
                     ¿EXISTE ALGÚN ADEUDO ?

                    </div>
                     <div class="col-md-1  text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][adeudo_laboral]">
                                <option value="1" >SI</option>
                                <option value="2" >NO</option>
                                         
                           </select>
                     </div>
                      <div class="col-md-2  text-left">
                     ¿PERTENECIÓ A ALGÚN SINDICATO?

                    </div>
                     <div class="col-md-1 text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][sindicato_laboral]">
                                <option value="1">SI</option>
                                <option value="2">NO</option>
                                         
                           </select>
                     </div>
                        <div class="col-md-2 text-left">
                     ¿LO CONTRATARÍAN NUEVAMENTE?

                    </div>
                     <div class="col-md-1  text-left">
                           <select class="form-control" name="referencias_laborales[${index_laboral}][contrataria_laboral]">
                                <option value="1">SI</option>
                                <option value="2" >NO</option>
                                         
                           </select>
                     </div>
                 
                </div>
                <div class="form-group">
                 
                      <div class="col-md-11 text-center">
                             OBSERVACIONES
                      </div>
               
                  
                         <div class="col-md-10 text-center">
                         <textarea class="form-control" placeholder="Describir motivo de separación " rows="5"   name="referencias_laborales[${index_laboral}][observaciones_laboral]">
                                
                            </textarea>
                          
                        </div>
               
                </div>
                 <div class="form-group">
                  
                     
                        <div class="col-md-2 col-md-offset-1 text-right">
                            <label class="control-label">INFORMO:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][informo_sobre_puesto_laboral]">
                        </div>
                        <div class="col-md-2 text-right">
                            <label class="control-label">PUESTO:</label>
                        </div>
                        <div class="col-md-3 text-left">
                           <input type="text" maxlength="255" class="form-control" name="referencias_laborales[${index_laboral}][puesto_informo_laboral]">
                        </div>
               
                </div>


				
					 
					   
					    					  
					</div>
	            	<hr>
</div>
	       
	        `;

	    let container_lab = document.getElementById('laboral-container');
	    let div_lab 	  = document.createElement('div');
	    div_lab.innerHTML = template_laboral;
	    container_lab.appendChild(div_lab);
	    

	    index_laboral++;
	   

	    btn_delete_laboral();
	}


	var btn_delete_laboral = function()
	{
		$('.btn-row-laboral').click(function(){
			 var id_lab = $(this).attr('data-btn-delete-laboral');
			 $('#fila_laboral_'+id_lab).remove();
		});
	}
// --------------------------------------------referencia laborales--------------------------------------------------------------------//


	$(document).ready(function(){
//---------------------------------------------------------cursos--------------------------------------------//	
		btn_delete_curso();

		$('.frm-submit-delete-curso').click(function(){
			id_remove_curso = $(this).attr('data-id-delete-curso');
			$('#id_remove_curso').val( id_remove_curso );
			$('#frm-delete-curso').submit()

		});
// --------------------------------------------END CURSOS---------------------------------------------------------------------//
//---------------------------------------------------------cursos--------------------------------------------//	
		btn_delete_idioma();

		$('.frm-submit-delete-idioma').click(function(){
			id_remove_idioma = $(this).attr('data-id-delete-idioma');
			$('#id_remove_idioma').val( id_remove_idioma );
			$('#frm-delete-idioma').submit()

		});
// --------------------------------------------END CURSOS---------------------------------------------------------------------//
//---------------------------------------------------------conocimientos--------------------------------------------//	
		btn_delete_conocimiento();

		$('.frm-submit-delete-conocimiento').click(function(){
			id_remove_conocimiento = $(this).attr('data-id-delete-conocimiento');
			$('#id_remove_conocimiento').val( id_remove_conocimiento );
			$('#frm-delete-conocimiento').submit()

		});
// --------------------------------------------END conocimientos---------------------------------------------------------------------//
//---------------------------------------------------------FAMILIA--------------------------------------------//	
		btn_delete_familia();

		$('.frm-submit-delete-familia').click(function(){
			id_remove_familia = $(this).attr('data-id-delete-familia');
			$('#id_remove_familia').val( id_remove_familia );
			$('#frm-delete-familia').submit()

		});
// --------------------------------------------END FAMILIA---------------------------------------------------------------------//
//---------------------------------------------------------TRATAMIENTO--------------------------------------------//	
		btn_delete_tratamiento();

		$('.frm-submit-delete-tratamiento').click(function(){
			id_remove_tratamiento = $(this).attr('data-id-delete-tratamiento');
			$('#id_remove_tratamiento').val( id_remove_tratamiento );
			$('#frm-delete-tratamiento').submit()

		});
// --------------------------------------------TRATAMIENTO---------------------------------------------------------------------//
//---------------------------------------------------------LABORAL--------------------------------------------//	
		btn_delete_laboral();

		$('.frm-submit-delete-laboral').click(function(){
			id_remove_laboral = $(this).attr('data-id-delete-laboral');
			$('#id_remove_laboral').val( id_remove_laboral );
			$('#frm-delete-laboral').submit()

		});
// --------------------------------------------END PLABORAL--------------------------------------------------------------------//


$("#familiares").change(function(){
        if($(this).val()==2){
        	$("#especificacion").attr("readonly","readonly");
            $("#especificacion").val("N/A");
        }
        else{
        	$("#especificacion").removeAttr("readonly","readonly");
            $("#especificacion").val("");
        }
        
      });
$("#detencion").change(function(){
        if($(this).val()==2){
        	$("#especificacion_detencion").attr("readonly","readonly");
            $("#especificacion_detencion").val("N/A");
        }
        else{
        	$("#especificacion_detencion").removeAttr("readonly","readonly");
            $("#especificacion_detencion").val("");
        }
        
       });
 $("#fisica").change(function(){
          if($(this).val()==2){
        	$(".actividad-fisica").css('display',"none");
        	$(".limpiar").each(function(){	
			    $($(this)).val('');
		     });
        }
        else{
        	$(".actividad-fisica").show();
        }
        
    });
});
</script>

@endsection