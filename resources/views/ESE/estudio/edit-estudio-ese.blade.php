@extends('layouts.masterMenuView')

@section('estilos')
	<style type="text/css">
		.tabla-responsiva{
			width: 100%;
    		overflow: scroll;
    	}

    	.largo-input{
    		width: 150px;
    	}
	</style>
@endsection

@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">ESE</a></li>		
		<li><a href="javascript:;">Plantillas</a></li>		
	</ol>

	<div class="row">
		<div class="col-md-1 col-md-offset-11">
			<button class="btn btn-success btn-icon btn-circle btn-lg" id="btn-reload" title="Actualizar página"><i class="fa fa-repeat"></i></button>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-info" data-sortable-id="ui-widget-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title text-center">Edición del Estudio  ESE {{ $estudio->id }} || Plantilla {{ $estudio->plantilla->nombre }}</h4>
				</div>
				<div class="panel-body">

					{{ Form::open(['route' => ['sig-erp-ese::estudio-ese-formatos.update',$estudio],'method' => 'put','class' => 'form-horizontal' ]) }}

					@foreach($estudio->plantilla->plantilla->componentes  as $componente)
					<?php $pintar_panel = true; ?>
					@foreach( $estudio->fields as $field )
					@if( $componente->id == $field->id_componente )
					@if($pintar_panel)
					<div class="panel panel-danger" data-sortable-id="ui-widget-11">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">{{ $componente->nombre }}</h4>
						</div>
						<div class="panel-body">										
							@endif		
							<div class="row">
								@if( $field->multiple )
								<div class="col-md-12">
									<hr>
									<label class="col-md-12 text-center"><strong> {{ $field->label }} </strong></label>
										<div class="tabla-responsiva">											
										<table class="table table-bordered table-condensed table-striped">														
											<thead>
												<tr>

													@for($i=0; $i < $field->head_num_col; $i++ )
													<th class="text-center">
														{{ $field->campos[$i]->label }}
													</th>
													@endfor
												</tr>
											</thead>														

											<tbody>
												<?php $pintar = true; $col = 1; $size = $field->campos->count(); ?>
												@for ($i = 0; $i < $size; $i++)													    
												@if( $pintar )
												<tr>
													<?php $pintar = false; ?>
													@endif
													<td>																
														<div class="col-md-12">
															<input type="text" class="form-control input-sm largo-input" name="field[]" value="{{ $field->campos[$i]->value }}">
															<input type="hidden" name="parent[]" value="{{ $field->id }}">
															<input type="hidden" name="key[]" value="{{ $field->campos[$i]->key }}">
														</div>
													</td>

													<?php $col++; ?>
													
													@if( $col == ($field->head_num_col)+1 )
												</tr>
												<?php $pintar = true; $col = 1; ?>
												@endif


												@endfor
											</tbody>
										</table>
										</div>
										
								</div>
								@else
								<div class="form-group">
									<label class="col-md-2 col-md-offset-1">{{ $field->label }} </label>
									<div class="col-md-8">
										



										<input type="text" class="form-control input-sm largo-input" name="field[]" value="{{ $field->value }}">
										<input type="hidden" name="parent[]" value="0">
										<input type="hidden" name="key[]" value="{{ $field->key }}">
									</div>
								</div>
								@endif

								@if($pintar_panel)
								<?php $pintar_panel = false;?>
								@endif
							</div>

							@endif
							@endforeach
						</div>
					</div>

					@endforeach
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-8 ">
							<button type="submit" class="btn btn-success btn-block" style="margin: 15px;">Guardar</button>
						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>

	</div>

	@endsection

	@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')
	{!! Html::script('assets/js/sweetalert.min.js') !!}




	<script type="text/javascript">

		$(document).ready(function(){

			$('#btn-reload').click(function(){
				location.reload();
			});

			@if( session('status-ese-edit') == '1' )


			swal({
				title: '<h3 class="text-warning"><strong>Plantilla actualizada con éxito</strong></h3>',
				text:  '<h5 class="text-primary">Success</h5>',
				type: "success",
				html: true
			});
			@endif


		});

	</script>

	@endsection


