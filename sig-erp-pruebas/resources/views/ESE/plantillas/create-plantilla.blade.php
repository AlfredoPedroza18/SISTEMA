@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">ESE</a></li>		
		<li><a href="javascript:;">Plantillas</a></li>		
	</ol>

	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title text-center">Creación de Plantilla ( {{ $plantilla->nombre }} )</h4>
				</div>
				<div class="panel-body">

					@if (session('success'))
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-{{ session('type') }} fade in m-b-15">
								<strong>Puesto </strong>
								{{ session('success') }}
								<span class="close" data-dismiss="alert">×</span>
							</div>
						</div>
					</div>
					@endif



					{{ Form::open( ['route' => 'sig-erp-ese::estudio-ese-plantillas.store','class' => 'form-horizontal' ]) }}					
						@include('ESE.plantillas.ese-form-alta-plantilla')
					{{ Form::close() }}
				</div>
			</div>
		</div>

	</div>

	@endsection

	@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')




	<script type="text/javascript">

		$(document).ready(function(){




		});

	</script>

	@endsection