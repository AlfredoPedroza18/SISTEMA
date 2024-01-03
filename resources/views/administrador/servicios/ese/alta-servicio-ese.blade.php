{{ Form::open([ 'route' => 'sig-erp-crm::modulo.administrador.servicios.ese.store','id' => 'frm-alta-servicio']) }}<!-- Modal -->
<div class="modal fade" id="altaServicioEseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header  text-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> <i class="fa fa-clipboard fa-2x"></i><label id="modalServicioRysTitle" style="margin-left: 10px;">Servicio ESE</label></h4>
				
			</div>
			<div class="modal-body">
				
				@include('administrador.servicios.ese.alerta-tipo-servicio-ese')

				<div class="row">
						<div class="form-group col-md-6">
							<input type="hidden" name="prioridad" id="prioridad">
							<input type="hidden" name="id_servicio_ese" id="id_servicio_ese">
							<label>Prioridad</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-list-ol"></i>
								</div>
								<div id="select-prioridad-ese"> 
									
								</div>														
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>Tipo servicio</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-cogs"></i>
								</div>
								<div id="select-tipo-estudio">
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4 col-md-offset-4">
							<label>Costo</label>
							<div class="input-group">
								<div class="input-group-addon">
									$
								</div>
								<input type="number" id="costo_tipo_servicio" class="form-control" name="costo" placeholder="150">
								
							</div>
						</div>
					</div>
					
				
					
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{{ Form::submit('Guardar',['class' => 'btn btn-success m-r-5' ,'id' => 'btn-alta-servicio']) }}
				
			</div>
		</div>
	</div>
</div>
{{ Form::close()}}