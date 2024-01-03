<input type="hidden" name="id_plantilla" value="{{ $plantilla->id }}"> 

<div class="form-group text-center">
	<label class="col-sm-3 control-label">
		<strong>Nombre de la plantilla</strong>
	</label>
	<div class="col-md-8">
		<div class="input-group">
			<div class="input-group-addon"><i class="text-danger fa fa-edit"></i></div>
			<input type="text" class="form-control input-sm" name="nombre" placeholder="Plantilla Para Estudios Socioeconómicos">						    	
		</div>
	</div>
</div>

<div class="form-group text-center">
	<label class="col-sm-3 control-label">
		<strong>Descripción</strong>
	</label>
	<div class="col-md-8">
		<div class="input-group">
			<div class="input-group-addon"><i class="text-danger fa fa-bars"></i></div>
			<input type="text" class="form-control input-sm" name="descripcion" placeholder="Descripción de la plantilla">

		</div>
	</div>
</div>

<div class="form-group text-center">
	<div class="col-sm-offset-7 col-sm-4">							     	
		{{ Form::submit('Guardar Plantilla',['class' => 'btn btn-danger btn-block']) }}
	</div>
</div>


<div class="panel-group" id="accordion">

	@forelse( $plantilla->componentes as $componente )								 
	<div class="panel panel-info overflow-hidden col-md-12">
		<div class="panel-heading">
			<h3 class="panel-title">
				<a style="padding: 3px 10px;" class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $componente->id }}" aria-expanded="false">
					<i class="fa fa-plus-circle pull-right"></i> 
					<strong>{{ $componente->nombre }}</strong>
				</a>
			</h3>
		</div>
		<div id="collapse{{ $componente->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">								
				<h4 class="text-danger text-center">Selecciona los campos para generar la plantilla</h4>
				<hr>

				<div class="container-fluid">
					<div class="row">
						@foreach( $componente->campos as $campo )
						<div class="form-group col-md-4">
							<input type="checkbox" name="{{ $campo->key }}" value="{{ $campo->id }}" class="{{ $componente->class_name }}"> 
							<label>
								<small>{{ $campo->label }}</small>
								@if( $campo->rows > 0 )
								{{--<a tabindex="0"
								   class="btn btn-xs btn-primary" 
								   role="button" 
								   data-html="true" 
								   data-toggle="popover"  
								   title="<strong>Número de Filas</strong>" 
								   data-content='<input class="form-control input-sm num-rows-class" data-rows="{{ $campo->key }}" type="text" name="{{ $campo->key }}-rows" value="{{ $campo->rows }}">'><i class="fa fa-bars"></i></a>--}}
								   <input class="form-control input-sm num-rows-class" data-rows="{{ $campo->key }}" type="text" name="{{ $campo->key }}-rows" value="{{ $campo->rows }}">
								@endif
							</label>

						</div>
						@endforeach
					</div>
				</div>

			</div>
		</div>
	</div>						
	@empty
	<h1>Nada que mostrar</h1>

	@endforelse



</div>