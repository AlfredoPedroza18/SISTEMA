{{ Form::open([ 'route' => 'sig-erp-crm::modulo.administrador.servicios.rys.store']) }}<!-- Modal -->
<div class="modal fade" id="altaServicioRysModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header  text-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> <i class="fa fa-clipboard fa-2x"></i><label id="modalServicioRysTitle" style="margin-left: 10px;">Servicio RYS</label></h4>
				
			</div>
			<div class="modal-body">
				
				<div class="row">
						<div class="form-group col-md-6">
							<label>Inicio</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-list-ol"></i>
								</div>
								<input type="number" class="form-control" name="inicio" placeholder="15">
								
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>Fin</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-list-ol"></i>
								</div>
								<input type="number" class="form-control" name="fin" placeholder="50">
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-md-offset-3">
							<label>Porcentaje</label>
							<div class="input-group">
								<div class="input-group-addon">
									%
								</div>
								<input type="number" class="form-control" name="porcentaje_servicio" placeholder="15">
								
							</div>
						</div>
					</div>
					
				
					
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{{ Form::submit('Guardar',['class' => 'btn btn-success m-r-5']) }}
				
			</div>
		</div>
	</div>
</div>
{{ Form::close()}}