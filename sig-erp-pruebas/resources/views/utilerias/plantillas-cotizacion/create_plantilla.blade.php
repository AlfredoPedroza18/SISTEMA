@extends('layouts.master')

@section('estilos')
{!! Html::style('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
@endsection




@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Utilerias</a></li>		
		<li><a href="{{ url('utilerias/plantillas') }}">Plantillas</a></li>
		<li><a href="javascript:;">Nuva plantilla</a></li>
		
	</ol>

	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
		        <div class="panel-heading">
		            <div class="panel-heading-btn">
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		            </div>
		            <h4 class="panel-title text-center">Creación de plantilla</h4>
		        </div>
		        <form class="form-horizontal" action="{{ url('utilerias/plantillas') }}" method="POST" enctype="multipart/form-data">
		        	{{ csrf_field() }}
			        <div class="panel-body">
			        	<div class="row">
			        		<div class="col-md-4">
			        			<div class="panel panel-success" data-sortable-id="ui-widget-11">
			                        <div class="panel-heading">
			                        	<div class="panel-heading-btn">
							                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
							                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							            </div>
			                            <h4 class="panel-title"> 
			                            	<i class="fa fa-edit"></i> Nueva Plantilla
			                            </h4>
				                        </div>
				                        <div class="panel-body">
				                            <div class="row">
											  	<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
											    	<label for="inputEmail3" class="col-md-3 control-label">Nombre</label>
											    	<div class="col-md-9">
											      		<input type="text" name="nombre" class="form-control" id="inputEmail3">
											    		{!!  $errors->first('nombre','<span class="help-block">:message</span>') !!}
											    	</div>
											  	</div>
											  	<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
											    	<label for="inputPassword3" class="col-md-3 control-label">Descripción</label>
											    	<div class="col-md-9">
											      		<textarea name="descripcion" class="form-control" rows="3"></textarea>
											    		{!!  $errors->first('descripcion','<span class="help-block">:message</span>') !!}
											    	</div>
											  	</div>											
											  	<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
											    	<label for="inputEmail3" class="col-md-3 control-label">Logo</label>
											    	<div class="col-md-9">
											      		<input type="file" name="logo" class="form-control" id="inputEmail3">
											    		{!!  $errors->first('logo','<span class="help-block">:message</span>') !!}
											    	</div>
											  	</div>
				                            </div>
				                        </div>
				                    </div>
			        		</div>
			        		<div class="col-md-8">
			        			<div class="panel panel-success" data-sortable-id="ui-widget-11">
			                        <div class="panel-heading">
			                        	<div class="panel-heading-btn">
							                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
							                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							            </div>
			                            <h4 class="panel-title"> 
			                            	<i class="fa fa-edit"></i> Configuración de la plantilla
			                            </h4>
				                        </div>
				                        <div class="panel-body">
				                            <div class="row">
				                            	<form class="form-horizontal">
				                            		<div class="form-group">
				                            			<label for="inputEmail3" class="col-md-2 control-label"><strong>Encabezado</strong></label>
													    <label for="inputEmail3" class="col-md-1 control-label">Fondo</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-encabezado"
																		name="encabezado_fondo">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													    <label for="inputEmail3" class="col-md-1 control-label">Letra</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-encabezado-letra"
																		name="encabezado_letra">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													  </div>
													  <div class="form-group">
				                            			<label for="inputEmail3" class="col-md-2 control-label"><strong>Encabezado detalle</strong></label>
													    <label for="inputEmail3" class="col-md-1 control-label">Fondo</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-encabezado-detalle"
																		name="encabezado_detalle_fondo">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													    <label for="inputEmail3" class="col-md-1 control-label">Letra</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-encabezado-letra-detalle"
																		name="encabezado_detalle_letra">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													  </div>
													  <div class="form-group">
				                            			<label for="inputEmail3" class="col-md-2 control-label"><strong>Fecha / Total</strong></label>
													    <label for="inputEmail3" class="col-md-1 control-label">Fondo</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-fecha-total"
																		name="fecha_total_fondo">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													    <label for="inputEmail3" class="col-md-1 control-label">Letra</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-letra-fecha-total"
																		name="fecha_total_letra">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													  </div>
													  <div class="form-group">
				                            			<label for="inputEmail3" class="col-md-2 control-label"><strong>Letra general</strong></label>
													    <label for="inputEmail3" class="col-md-1 control-label">Color</label>
													    <div class="col-md-3">
													      <div 	class="input-group colorpicker-component color-plantilla" 
													      		data-color="rgb(0, 0, 0)" 
													      		data-color-format="rgb" 
													      		id="colorpicker-prepend" 
													      		data-colorpicker-guid="2">
																<input 	type="text" 
																		value="rgb(0, 0, 0)" 
																		readonly="" 
																		class="form-control" 
																		id="color-letra-general"
																		name="letra_general">
																<span class="input-group-addon"><i style="background-color: rgb(143, 47, 47);"></i></span>
															</div>
													    </div>
													   </div>
													   <div class="form-group">
													    <div class="col-md-2 col-md-offset-8">
													    	<button class="form-control btn btn-primary btn-block pull-right">
													    		<i class="fa fa-save"></i> Guardar
													    	</button>
													    </div>
													  </div>
												</form>
				                            </div>
				                        </div>
				                    </div>
			        		</div>
			        	</div>
			        	<div class="row">
	                        <div class="panel panel-warning" data-sortable-id="ui-widget-11">
		                        <div class="panel-heading">
		                            <div class="panel-heading-btn">
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		                            </div>
		                            <h4 class="panel-title">
		                            	<i class="fa fa-file-pdf-o"></i> Plantilla
		                            </h4>
		                        </div>
		                        <div class="panel-body">
		                            @include('crm.cotizador.pdf_cotizaciones.pdf-generico', ['colorHeader' => '#aaeeff','encabezadoPadding' => '20px 0px;'] )
		                        </div>
		                    </div>
	                    </div>
			        </div>
			    </form>
		    </div>
		</div>
	</div>

</div>

@endsection

@section('js-base')

@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}

<script>
	$(document).ready(function(){
		$(".color-plantilla").colorpicker({format:"hex"});

		$('#color-encabezado').change(function(){
			cambiarColorHeader( this.value );
		});	

		$('#color-encabezado-letra').change(function(){
			cambiarColorHeaderLetra( this.value );
		});	

		$('#color-encabezado-detalle').change(function(){
			cambiarColorHeaderDetalle( this.value );
		});

		$('#color-encabezado-letra-detalle').change(function(){
			cambiarColorHeaderLetraDetalle( this.value );
		});	

		$('#color-letra-fecha-total').change(function(){
			cambiarColorLetraFechaTotal( this.value );
		});

		$('#color-fecha-total').change(function(){
			cambiarColorFechaTotal( this.value );
		});

		$('#color-letra-general').change(function(){
			cambiarColorLetraGeneral( this.value );
		});	
		
	});

	var iniciarPlantilla = function()
	{
		cambiarColorHeader( '#FF5733' );
		cambiarColorHeaderLetra( '#FFF' );
		cambiarColorHeaderDetalle( '#FF5733' );
		cambiarColorHeaderLetraDetalle( '#FF5733' );
		cambiarColorLetraFechaTotal( '#000' );
		cambiarColorFechaTotal( '#FF5733' );
		cambiarColorLetraGeneral( '#000' );
	}

	var cambiarColorHeader = function( color )
	{
		$('#encabezado').css({
			background: color
		});

		/*$('#items td.balance'). css({ 
			background: color
		});*/
	}
	var cambiarColorHeaderLetra = function( color )
	{
		$('#encabezado').css({
			color: color
		});

		/*$('#items td.balance'). css({ 
			background: color
		});*/
	}

	var cambiarColorLetraGeneral = function( color )
	{
		$('.item-row').css('color', color );
		$('#identity').css('color', color );
		$('#customer-title').css('color', color );
		$('#customer').css('color', color );
		$('#encabezado-detail').css('color', color );
		$('#items td.total-value').css('color', color );
		$('#items td.total-line').css('color', color );
		$('#items tr.item-row td').css('color', color );

	}

	var cambiarColorHeaderDetalle = function( color )
	{
		$('#items th ').css('background', color );
	}

	var cambiarColorHeaderLetraDetalle = function( color )
	{
		$('#items th ').css('color', color );
	}

	var cambiarColorFechaTotal = function( color )
	{
		$('.meta-head').css('background', color );
		$('#items td.balance').css('background', color );
	}

	var cambiarColorLetraFechaTotal = function( color )
	{
		$('#meta').css('color', color );
		$('#items td.balance').css('color', color );
		
		$('#detail-id-description').css('color', color);
		$('#detail-date-invoice').css('color', color);
		$('#date').css('color', color);
		$('#detail-id-font').css('color', color);
		$('#total-description').css('color', color);
		$('#total-amount').css('color', color);
	}
</script>

@endsection