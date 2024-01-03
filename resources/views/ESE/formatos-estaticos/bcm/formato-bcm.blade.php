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
			<h4 class="panel-title">Formato BCM</h4>
		</div>
		<div class="panel-body">							
				{{ Form::open(['route' => ['sig-erp-ese::formato-bcm.update', $estudio], 'method' => 'put' ]) }}				
					
					<div class="form-horizontal">
			            <div class="form-group">
			                <div class="col-md-2 col-md-offset-7 text-right">
			                    <button type="submit" class="btn btn-lg btn-circle btn-primary"><i class="fa fa-2x fa-save"></i></button>
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
					@include('ESE.formatos-estaticos.bcm.bcm-componente-resultados')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-datos-personales')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-documentacion')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-antecedentes-legales')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-referencias-laborales')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-gaps')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-ref-lab-cinco-anios')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-escolaridad')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-personas-viven-domicilio')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-descripcion-vivienda')
					@include('ESE.formatos-estaticos.bcm.bcm-componente-tipo-vivienda')
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

{{ Form::open(['url' => 'delete-referencia-lab-simple-bcm','method' => 'POST','id' => 'frm-delete-ref-simple']) }}
	<input type="text" name="id_remove_ref_lab_simple" value="0" id="id_remove_ref_lab_simple">	
{{ Form::close() }}

{{ Form::open(['url' => 'delete-referencia-lab-cinco-bcm','method' => 'POST','id' => 'frm-delete-ref-cinco']) }}
	<input type="text" name="id_remove_ref_lab_cinco" value="0" id="id_remove_ref_lab_cinco">	
{{ Form::close() }}

{{ Form::open(['url' => 'delete-viven-domicilio-bcm','method' => 'POST','id' => 'frm-delete-vive-persona']) }}
	<input type="text" name="id_remove_vive_persona" value="0" id="id_remove_vive_persona">	
{{ Form::close() }}




</div>

@endsection

@section('js-base')

@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')


{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}


<script>
/***************************************************************************************************************************************************************************************/
	let i = {{ isset( $estudio->formatoBcm->referenciasLaborales ) ? count( $estudio->formatoBcm->referenciasLaborales ) : '1' }};
	document.getElementById('add-referencia-laboral').onclick = function () {
	    let template = `
	        <div id="fila_${i}" data-row="${i}">
                <div class="form-group"> 
                	<div class="col-md-1 text-right">
                        <a href="javascript:;" data-btn-delete="${i}" class="btn btn-xs btn-circle btn-danger btn-row-delete"><i class="fa fa-minus"></i></a>
                    </div>                       
                    <input type="hidden" name="referencia_laboral_simple[${i}][id]" value="0">
                    <label class="col-md-2 text-right control-label"><strong>Empresa</strong></label>                    
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral_simple[${i}][empresa_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral_simple[${i}][periodo_empresa]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral_simple[${i}][motivo_salida_empresa]">
                    </div>
                </div>
                <div class="form-group">                        
                    <label class="col-md-2 col-md-offset-1 text-right control-label"><strong>Candidato</strong></label>                    
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral_simple[${i}][empresa_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral_simple[${i}][periodo_candidato]">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="referencia_laboral_simple[${i}][motivo_salida_candidato]">
                    </div>
                </div>
                <hr>
            </div>
	        `;

	    let container = document.getElementById('referencia-container');
	    let div = document.createElement('div');
	    div.innerHTML = template;
	    container.appendChild(div);
	    

	    i++;

	    btn_delete_referencia_simple();
	}

	

	var btn_delete_referencia_simple = function()
	{
		$('.btn-row-delete').click(function(){
			 var idx = $(this).attr('data-btn-delete');
			 $('#fila_'+idx).remove();
		});
	}
/***************************************************************************************************************************************************************************************/


/***************************************************************************************************************************************************************************************/

	let index_ref_lab_cinco = {{ isset( $estudio->formatoBcm->referenciasLaboralesCinco ) ? count( $estudio->formatoBcm->referenciasLaboralesCinco ) : 1 }};
	document.getElementById('add-referencia-laboral-cinco').onclick = function () {
	    let template_ref_lab = `
	        	<div id="fila_laboral_cinco_${index_ref_lab_cinco}" class="form-horizontal">
	                <div class="form-group">
	                    <div class="col-md-2 text-right">
	                        <a href="javascript:;" data-btn-delete-ref-lab="${index_ref_lab_cinco}" class="btn btn-circle btn-danger btn-row-delete-ref-lab"><i class="fa fa-minus"></i></a>
	                    </div>
	                    <input type="hidden" name="referencias_lab_cinco[${index_ref_lab_cinco}][id]" value="0">
	                    <label class="col-md-1 control-label">Empresa: </label>
	                    <div class="col-md-4">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][empresa]">
	                    </div>
	                    <label class="col-md-1 control-label">Giro: </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][giro]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-1 col-md-offset-2 control-label">Dirección: </label>
	                    <div class="col-md-4">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][direccion]">
	                    </div>
	                    <label class="col-md-1 control-label">Teléfono: </label>
	                    <div class="col-md-3">
	                        <input type="text"
	                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="13" min="1" max="99999999999999999999"  
	                               class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][telefono]">
	                    </div>
	                </div>
	                <div class="form-group alert alert-info" >
	                    <label class="col-md-3 control-label"></label>
	                    <label class="col-md-3 control-label"><strong>Datos Obtenidos por el candidato</strong></label>
	                    <label class="col-md-3 control-label"><strong>Datos obtenidos por la empresa (R.H)</strong></label>
	                    <label class="col-md-3 control-label"><strong>Datos obtenidos por el jefe inmediato/otro</strong></label>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Puesto desempeñado </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Fecha de Ingreso </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][fecha_ingreso_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][fecha_ingreso_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][fecha_ingreso_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Fecha de Salida </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][fecha_salida_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][fecha_salida_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][fecha_salida_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Sueldo Final </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][sueldo_final_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][sueldo_final_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][sueldo_final_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Principales Funciones </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][funciones_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][funciones_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][funciones_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Motivo de Salida </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][motivo_salida_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][motivo_salida_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][motivo_salida_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Último Jefe </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][ultimo_jefe_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][ultimo_jefe_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][ultimo_jefe_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Puesto del Jefe </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_del_jefe_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_del_jefe_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_del_jefe_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Persona que provee la información</label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][da_informacion_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][da_informacion_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][da_informacion_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Puesto de la persona que provee la información</label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_da_informacion_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_da_informacion_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][puesto_da_informacion_jefe_inmediato]">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-3 control-label">Lo contratarían nuevamente </label>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][contratar_nuevamente_candidato]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][contratar_nuevamente_empresa]">
	                    </div>
	                    <div class="col-md-3">
	                        <input type="text" class="form-control" name="referencias_lab_cinco[${index_ref_lab_cinco}][contratar_nuevamente_jefe_inmediato]">
	                    </div>
	                </div>
	            	<hr>
	            </div>
	        `;

	    let container_ref = document.getElementById('referencia-laboral-cinco-container');
	    let div_ref 	  = document.createElement('div');
	    div_ref.innerHTML = template_ref_lab;
	    container_ref.appendChild(div_ref);
	    

	    index_ref_lab_cinco++;

	    btn_delete_referencia_cinco();
	}


	var btn_delete_referencia_cinco = function()
	{
		$('.btn-row-delete-ref-lab').click(function(){
			 var idx = $(this).attr('data-btn-delete-ref-lab');
			 $('#fila_laboral_cinco_'+idx).remove(); console.log( index_ref_lab_cinco );
		});
	}

/***************************************************************************************************************************************************************************************/



/***************************************************************************************************************************************************************************************/



let index_vivien_dom = {{ isset( $estudio->formatoBcm->vivenEnDomicilio ) ? count( $estudio->formatoBcm->vivenEnDomicilio ) : '1' }};
	document.getElementById('add-vive-persona').onclick = function () {
	    let template_viven_dom = `
	        	<div id="fila_vive_con_${index_vivien_dom}" class="form-horizontal">
	                <div class="form-group">
					    <label class="col-md-2 text-center control-label">
					        <a href="javascript:;" class="btn btn-circle btn-danger btn-row-vive-con" data-btn-delete-vive-con="${index_vivien_dom}">
					            <i class="fa fa-minus"></i>
					        </a>
					    </label>
					    <label class="col-md-2 text-center control-label"><strong>PARENTESCO</strong></label>
					    <label class="col-md-2 text-center control-label"><strong>NOMBRE</strong></label>
					    <label class="col-md-2 text-center control-label"><strong>EDAD Y ESTADO CIVIL</strong></label>
					    <label class="col-md-2 text-center control-label"><strong>OCUPACIÓN</strong></label>
					    <label class="col-md-2 text-center control-label"><strong>DEPENDE DEL CANDIDATO</strong></label>                
					</div>
					<div class="form-group">
						<input type="hidden" name="viven_domicilio[${index_vivien_dom}][id]" value="0">
					    <div class="col-md-2 col-md-offset-2">
					        <input type="text" class="form-control" name="viven_domicilio[${index_vivien_dom}][parentesco]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="viven_domicilio[${index_vivien_dom}][nombre]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="viven_domicilio[${index_vivien_dom}][edo_civil]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="viven_domicilio[${index_vivien_dom}][ocupacion]">
					    </div>
					    <div class="col-md-2">
					        <input type="text" class="form-control" name="viven_domicilio[${index_vivien_dom}][depende_del_candidato]">
					    </div>
					</div>
	            	<hr>
	            </div>
	        `;

	    let container_viven = document.getElementById('viven-domicilio-container');
	    let div_viven 	  = document.createElement('div');
	    div_viven.innerHTML = template_viven_dom;
	    container_viven.appendChild(div_viven);
	    

	    index_vivien_dom++;

	    btn_delete_vive_con();
	}


	var btn_delete_vive_con = function()
	{
		$('.btn-row-vive-con').click(function(){
			 var id_vive = $(this).attr('data-btn-delete-vive-con');
			 $('#fila_vive_con_'+id_vive).remove();
		});
	}













/***************************************************************************************************************************************************************************************/




	$(document).ready(function(){
		btn_delete_referencia_simple();
		btn_delete_referencia_cinco();
		btn_delete_vive_con();
		$('.telefono').numeric();
		$('.frm-submit-delete-referencia-simple').click(function(){
			id_remove_ref_simple = $(this).attr('data-id-delete-referencia-simple');
			$('#id_remove_ref_lab_simple').val( id_remove_ref_simple );
			$('#frm-delete-ref-simple').submit()

		});

		$('.frm-submit-delete-referencia-cinco').click(function(){
			id_remove_ref_simple = $(this).attr('data-id-delete-referencia-cinco');
			$('#id_remove_ref_lab_cinco').val( id_remove_ref_simple );
			$('#frm-delete-ref-cinco').submit()

		});

		$('.frm-submit-delete-viven-dom').click(function(){
			id_remove_viven_per = $(this).attr('data-id-delete-vive-persona');
			$('#id_remove_vive_persona').val( id_remove_viven_per );
			$('#frm-delete-vive-persona').submit()

		});

		
	});

	
</script>

@endsection


