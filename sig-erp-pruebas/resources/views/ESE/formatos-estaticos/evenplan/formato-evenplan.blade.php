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
			<h4 class="panel-title">Formato Evenplan</h4>
		</div>
		<div class="panel-body">

				{{ Form::open(['route' => ['sig-erp-ese::formato-evenplan.update', $estudio], 'method' => 'put','enctype'=>'multipart/form-data' ]) }}								
					
					<div class="form-horizontal">
			            <div class="form-group">
			                <div class="col-md-2 col-md-offset-7 tetxt-right">
			                    <button type="submit" class="btn btn-lg btn-circle btn-warning"><i class="fa fa-2x fa-save"></i></button>
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
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-resumen')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-datos-personales')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-escolaridad')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-constitucion-familiar')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-documentacion')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-referencias-economicas')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-referencias-laborales')
					@include('ESE.formatos-estaticos.evenplan.evenplan-componente-referencias-personales')
					
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

{{ Form::open(['url' => 'evenplan-delete-referencia-personal','method' => 'POST','id' => 'frm-delete-ref-personal']) }}
	<input type="hidden" name="id_remove_ref_personal" value="0" id="id_remove_ref_personal">	
{{ Form::close() }}

{{ Form::open(['url' => 'evenplan-delete-idioma','method' => 'POST','id' => 'frm-delete-idioma']) }}
	<input type="hidden" name="id_remove_idioma" value="0" id="id_remove_idioma">	
{{ Form::close() }}

{{ Form::open(['url' => 'evenplan-delete-parentesco','method' => 'POST','id' => 'frm-delete-parentesco']) }}
	<input type="hidden" name="id_remove_ref_parentesco" value="0" id="id_remove_ref_parentesco">	
{{ Form::close() }}

{{ Form::open(['url' => 'evenplan-delete-referencia-laboral','method' => 'POST','id' => 'frm-delete-ref-laboral']) }}
	<input type="hidden" name="id_remove_ref_laboral" value="0" id="id_remove_ref_laboral">	
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
									INICIO ADD IDIOMAS
***************************************************************************************************************************************************************************************/

let index_idiomas = {{ isset( $estudio->formatoEvenplan ) ? count( $estudio->formatoEvenplan->idiomas ) : '1' }};
	document.getElementById('add-idioma-escolaridad').onclick = function () {
	    let template_idiomas = `
	    		<div class="form-group" id="fila_idioma_${index_idiomas}">
	    			<label class="col-md-2 text-center control-label">
	                    <a  href="javascript:;" 
	                        class="btn btn-circle btn-danger btn-xs btn-rm-idioma"
	                        id="add-idioma-escolaridad" 
	                        data-id-delete-idioma="${index_idiomas}">
	                        <i class="fa fa-minus"></i>
	                    </a>
	                </label>
                    <input type="hidden" name="idiomas[${index_idiomas}][id]" value="0">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idiomas[${index_idiomas}][idioma]" value="${index_idiomas}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idiomas[${index_idiomas}][porcentaje]" value="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idiomas[${index_idiomas}][certificacion]" value="">
                    </div>

                	
                </div>
	        `;

	    let container_idiomas = document.getElementById('idiomas-container');
	    let div_idioma 	  	  = document.createElement('div');
	    div_idioma.innerHTML  = template_idiomas;
	    container_idiomas.appendChild(div_idioma);
	    

	    index_idiomas++;

	    btn_delete_idioma();
	}


	var btn_delete_idioma = function()
	{
		$('.btn-rm-idioma').click(function(){ 
			 var id_idioma = $(this).attr('data-id-delete-idioma');			 
			 $('#fila_idioma_'+id_idioma).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD IDIOMAS
***************************************************************************************************************************************************************************************/


/***************************************************************************************************************************************************************************************
									INICIO ADD PARENTESCO
***************************************************************************************************************************************************************************************/
let index_parentesco = {{ isset( $estudio->formatoEvenplan ) ? count( $estudio->formatoEvenplan->parentesco ) : '1' }};
	document.getElementById('add-row-parentesco').onclick = function () {
	    let template_parentesco = `
	    		<div class="form-group" id="fila_parentesco_${index_parentesco}">
	    			<label class="col-md-2 text-center control-label">
	                    <a  href="javascript:;" 
	                        class="btn btn-circle btn-danger btn-xs btn-rm-parentesco"	                        
	                        data-id-delete-parentesco="${index_parentesco}">
	                        <i class="fa fa-minus"></i>
	                    </a>
	                </label>
                    <input type="hidden" name="parentesco[${index_parentesco}][id]" value="0">
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[${index_parentesco}][parentesco]" value="${index_parentesco}">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[${index_parentesco}][nombre]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[${index_parentesco}][edad]" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="parentesco[${index_parentesco}][ocupacion]" value="">
                    </div>
                </div>
	        `;

	    let container_parentesco = document.getElementById('parentesco-container');
	    let div_parentesco 	  	 = document.createElement('div');
	    div_parentesco.innerHTML = template_parentesco;
	    container_parentesco.appendChild(div_parentesco);
	    

	    index_parentesco++;

	    btn_delete_parentesco();
	}


	var btn_delete_parentesco = function()
	{
		$('.btn-rm-parentesco').click(function(){ 
			 var id_parentesco = $(this).attr('data-id-delete-parentesco');			 
			 $('#fila_parentesco_'+id_parentesco).remove();
		});
	}

/***************************************************************************************************************************************************************************************
									FIN ADD PARENTESCO
***************************************************************************************************************************************************************************************/


/***************************************************************************************************************************************************************************************
									INICIO ADD REFERENCIA LABORAL
***************************************************************************************************************************************************************************************/
let index_referencia_laboral = {{ isset( $estudio->formatoEvenplan ) ? count( $estudio->formatoEvenplan->parentesco ) : '1' }};
	document.getElementById('add-row-referencia-laboral').onclick = function () {
	    let template_referencia_laboral = `
	    	<div id="fila_referencia_laboral_${index_referencia_laboral}">
	    		<div class="form-group">
	    			<label class="col-md-2 text-center control-label">
	                    <a  href="javascript:;" 
	                        class="btn btn-circle btn-danger btn-xs btn-rm-referncia-laboral"	                        
	                        data-id-delete-referncia-laboral="${index_referencia_laboral}">
	                        <i class="fa fa-minus"></i>
	                    </a>
	                </label>
	    		</div>
	    		<div class="form-group">
	                <label class="col-md-4 text-center control-label"><strong>Nombre de la empresa</strong></label>                
	                <label class="col-md-4 text-center control-label"><strong>Jefe inmediato</strong></label>                
	                <label class="col-md-4 text-center control-label"><strong>Puesto</strong></label>                
	            </div>
	    		<div class="form-group">
                    <input type="hidden" name="referencia_laboral[${index_referencia_laboral}][id]" value="0">                
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][nombre_empresa]" value="${index_referencia_laboral}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][jefe_inmediato]" value="">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][puesto]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-1 control-label">Domicilio</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][domicilio]" value="">
                    </div>
                    <label class="col-md-1 control-label">Teléfono</label>                
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][telefono]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-1 control-label">Fecha de ingreso</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][fecha_ingreso]" value="">
                    </div>
                    <label class="col-md-1 control-label">Puesto inicial</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][puesto_inicial]" value="">
                    </div>
                    <label class="col-md-1 control-label">Salario inicial</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][salario_inicial]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-1 control-label">Fecha de egreso</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][fecha_egreso]" value="">
                    </div>
                    <label class="col-md-1 control-label">Puesto final</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][puesto_final]" value="">
                    </div>
                    <label class="col-md-1 control-label">Salario final</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][salario_final]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">¿Tuvo personal a su cargo?</label>
                    <div class="col-md-4">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][tuvo_personal]">
                            <option value="1" >Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Cotizó al IMSS</label>
                    <div class="col-md-4">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][cotizo_imss]">
                            <option value="1" >Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Motivo de separación</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][motivo_separacion]" value="">
                    </div>
                    <label class="col-md-2 control-label">Causa</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][causa]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">¿Lo considera una persona recomendable?</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][pesona_recomendable]" value="">
                    </div>
                    <label class="col-md-2 control-label">Lo volverían a contratar</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][volverian_contratar]" value="">
                    </div>
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Persona que da la referencia</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][da_referencia]" value="">
                    </div>
                    <label class="col-md-2 control-label">Puesto</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][da_referencia_puesto]" value="">
                    </div>
                </div>

                <div class="form-group">
                    <hr>
                    <label class="col-md-12 text-center control-label"><strong>Evaluación de competencias Laborales</strong></label>
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Honradez</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][honradez]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Calidad de trabajo</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][calidad_trabajo]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Relación con superiores</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][relacion_superiores]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Relación con compañeros</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][relacion_companeros]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>                
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">Puntualidad</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][puntualidad]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Responsabilidad</label>
                    <div class="col-md-3">
                        <select class="form-control" name="referencia_laboral[${index_referencia_laboral}][responsabilidad]">
                            <option value="1" >Excelente</option>
                            <option value="2" >Apropiado</option>
                            <option value="3" >Regular</option>
                            <option value="4" >Malo</option>
                        </select>
                    </div>                
                </div>

                <div class="form-group">                
                    <label class="col-md-2 control-label">¿Cuenta con algún comprobante?</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="referencia_laboral[${index_referencia_laboral}][comprobante]" value="">
                    </div>
                </div>
                <div class="form-group">                
                    <label class="col-md-2 control-label">Comentarios</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="5" name="referencia_laboral[${index_referencia_laboral}][observaciones]">{{ isset( $estudio->formatoHsbc->antecedentesLegales ) ? $estudio->formatoHsbc->antecedentesLegales->descripcion : '' }}</textarea>
                    </div>
                </div> 
             </div>
	        `;

	    let container_referencia_laboral = document.getElementById('refencia-laboral-container');
	    let div_referencia_laboral 	  	 = document.createElement('div');
	    div_referencia_laboral.innerHTML = template_referencia_laboral;
	    container_referencia_laboral.appendChild(div_referencia_laboral);
	    

	    index_referencia_laboral++;

	    btn_delete_referencia_laboral();
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
let index_referencia_personal = {{ isset( $estudio->formatoEvenplan ) ? count( $estudio->formatoEvenplan->referenciaPersonal ) : '1' }};
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
	                    <label class="col-md-2 control-label">Quién da la referencia</label>
	                    <div class="col-md-4">
	                        <input type="hidden" class="form-control" name="referencias_personales[${index_referencia_personal}][id]" value="0">
	                        <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][da_referencia]" value="${index_referencia_personal}">
	                    </div>
	                    <label class="col-md-2 control-label">Ocupación</label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][ocupacion]" value="">
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
	                        <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][telefono]" value="">
	                    </div>
	                    <label class="col-md-2 control-label">Tiempo de conocerlo</label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][tiempo_conocerlo]" value="">
	                    </div>
	                </div>
	                <div class="form-group">                
	                    <label class="col-md-2 control-label">Relación con el candidato</label>
	                    <div class="col-md-9">
	                        <input type="text" class="form-control" name="referencias_personales[${index_referencia_personal}][relacion_candidato]" value="">
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





	$(document).ready(function(){
		btn_delete_idioma();
		btn_delete_parentesco();
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
			var total = getIngresos() - getEgresos();
			$('#ref_economicas_total_diferencia').val( total );
			$('#monto_egresos_total').val( getEgresos() );			
			$('#monto_total_ingresos').val( getIngresos() );
		},2000);

		$('.monto_ingresos').delayKeyUp(function(){
			var total = getIngresos() - getEgresos();
			$('#ref_economicas_total_diferencia').val( total );
			$('#monto_egresos_total').val( getEgresos() );			
			$('#monto_total_ingresos').val( getIngresos() );
		},2000);

		$('.frm-submit-delete-referncia-personal').click(function(){
			var id_rm_referencia_personal = $(this).attr('data-id-delete-referncia-personal');
			$('#id_remove_ref_personal').val( id_rm_referencia_personal );
			$('#frm-delete-ref-personal').submit();
		});

		$('.frm-submit-delete-idioma').click(function(){
			var id_remove_idioma = $(this).attr('data-id-delete-idioma');
			$('#id_remove_idioma').val( id_remove_idioma );
			$('#frm-delete-idioma').submit();
		});

		$('.frm-submit-delete-parentesco').click(function(){
			var id_rm_referencia_parentesco = $(this).attr('data-id-delete-parentesco');
			$('#id_remove_ref_parentesco').val( id_rm_referencia_parentesco );
			$('#frm-delete-parentesco').submit();
		});

		$('.frm-submit-delete-referncia-laboral').click(function(){
			var id_rm_referencia_laboral = $(this).attr('data-id-delete-referncia-laboral');
			$('#id_remove_ref_laboral').val( id_rm_referencia_laboral );
			$('#frm-delete-ref-laboral').submit();
		});


	});

</script>


@endsection


