{{ Form::open([ 'url' => 'tipo_servicio_ese_store','id' => 'frm-tipo-servicio']) }}<!-- Modal -->
<div class="modal fade" id="altaTipoServicioServicioEseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header  text-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> <i class="fa fa-info-circle fa-2x"></i><label id="modalServicioRysTitle" style="margin-left: 10px;">Tipo Servicio ESE</label></h4>
				
			</div>
			<div class="modal-body">

				 @include('administrador.servicios.ese.alerta-tipo-servicio-ese')
				
				<div class="row">
						<div class="form-group col-md-6 col-md-offset-3">							
							<label>Tipo Servicio</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-reorder (alias)"></i>
								</div>								
								<input type="text" class="form-control" name="tipo_estudio" id="tipo_estudio" placeholder="Servicio... (escribe el servicio)">	
							</div>
						</div>
				</div>
				{{-- 
				<div class="row">
						<div class="form-group col-md-8 col-md-offset-2">
							<label>Descripción</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-comments"></i>
								</div>
								<textarea name="descripcion" class="form-control" rows="5">
									
								</textarea>
								
							</div>
						</div>
					</div>
				--}}
					
					
				
					
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{{ Form::submit('Guardar',['class' => 'btn btn-success m-r-5','id' => 'btn-alta-tipo-servicio']) }}
				
			</div>
		</div>
	</div>
</div>
{{ Form::close()}}