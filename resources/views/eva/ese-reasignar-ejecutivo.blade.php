<div class="modal fade" tabindex="-1" role="dialog" id="reasignar-ejecutivo" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
				<h4 class="modal-title text-center"> Asignación de Ejecutivos <i class="fa fa-2x fa-group text-warning"></i></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">

				@foreach( $estudio_ese->ejecutivos as $ejecutivo)
					@if( $ejecutivo->pivot->status == 1 )			                                    		
	                	<input type="hidden" value="{{ $ejecutivo->id }}" 
	                    	@if( $ejecutivo->pivot->principal == 1 )			                                    		
								id="id_old_ejecutivo_aux"
	                    	@elseif( $ejecutivo->pivot->principal == 2 )
	                    		id="id_old_ejecutivo_principal"
							@elseif( $ejecutivo->pivot->principal == 3 )
								id="id_old_ejecutivo_foraneo"
							@endif
	                	>
					@endif
                @endforeach

					<div class="row">												
						<div class="form-group">
							<label class=" col-md-offset-1 col-md-3 control-label">Ejecutivo Principal</label>
							<div class="col-md-6">
								<div class="input-group ">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select class="form-control" id="id_reasignar_ejecutivo_principal">
									<option value="-1">Seleccione un ejecutivo</option>
										@foreach( $ejecutivos as $ejecutivo )
										<option value="{{ $ejecutivo->id }}" 
											@if(Auth::user()->id == $ejecutivo->id)
												selected="selected"												
											@endif
										>
											{{ $ejecutivo->nombre_ejecutivo }}
										</option>
										@endforeach																
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">												
						<div class="form-group">
							<label class=" col-md-offset-1 col-md-3 control-label">Ejecutivo Secundario</label>
							<div class="col-md-6">
								<div class="input-group ">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select class="form-control" id="id_reasignar_ejecutivo_aux">
										<option value="-1">Seleccione un ejecutivo</option>
										@foreach( $ejecutivos as $ejecutivo )
										<option value="{{ $ejecutivo->id }}" >
											{{ $ejecutivo->nombre_ejecutivo }}
										</option>
										@endforeach																
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">												
						<div class="form-group">
							<label class=" col-md-offset-1 col-md-3 control-label">Ejecutivo Foraneo</label>
							<div class="col-md-6">
								<div class="input-group ">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select class="form-control" id="id_reasignar_ejecutivo_foraneo">
									<option value="-1">Seleccione un ejecutivo</option>
										@foreach( $ejecutivos_foraneos as $ejecutivo )
										<option value="{{ $ejecutivo->id }}" >
											{{ $ejecutivo->nombre_ejecutivo }}
										</option>
										@endforeach																
									</select>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>				
				<button type="button" class="btn btn-success" id="btn-reasignar-ejecutivo">Asignar ejecutivos</button>
				<input type="hidden" id="id_ese_estudio">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->