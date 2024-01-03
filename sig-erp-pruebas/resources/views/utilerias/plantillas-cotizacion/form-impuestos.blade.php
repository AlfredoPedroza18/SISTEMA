<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title text-center"> <i class="fa fa-pencil fa-2x"></i> Impuestos</h4>
</div>
<div class="modal-body">
  <div class="row">
  	<div class="col-md-6 form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
  		<label><strong>Nombre</strong></label>
  		<input type="hidden" id="impuesto-id">
  		<input type="text" class="form-control" name="nombre" id="impuesto-name" value="{{ old('nombre') }}">
  		{!!  $errors->first('nombre','<span class="help-block">:message</span>') !!}
  	</div>
  	<div class="col-md-6 form-group {{ $errors->has('tasa') ? 'has-error' : '' }} ">
  		<label><strong>Tasa</strong></label>
  		<input type="text" class="form-control" name="tasa" id="impuesto-tasa" value="{{ old('tasa') }}">
  		{!!  $errors->first('tasa','<span class="help-block">:message</span>') !!}
  	</div>
  </div>
  	
      
</div>
<div class="modal-footer">
	@if( count( $errors ) > 0 )
	<a href="{{ url('utilerias/impuestos') }}" class="btn btn-danger">Cancelar</a>
	@else
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    @endif
    <button class="btn btn-primary">Guardar</button>
</div>