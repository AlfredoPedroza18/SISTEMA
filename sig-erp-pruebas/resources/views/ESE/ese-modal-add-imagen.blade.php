
<div class="modal fade" tabindex="-1" role="dialog" id="ese-modal-add-imagen">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center">Agregar Imagen <i class="fa fa-2x fa-smile-o text-warning"></i></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ url('estudio-ese-add-imagen') }}" method="POST" id="frm-add-imagen" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="id_ese" value="{{ $estudio_ese->id }}">
					
					<div class="row">
						<div class="form-group">
							<h5 class="col-md-12 control-label text-center"><strong>Imagenes Candidato</strong></h5>
							
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">Candidato</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_imagen_seleccionado">
								<input type="hidden" name="tipo[]" value="Candidato"> 
								<input type="hidden" name="seleccionado[]" class="input_imagen_seleccionada" value="0"> 								                                           
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-image-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_images" name="file_imagen[]">			                               
								</div>
							</div>
							<div class="col-md-1 col-validation-field-file-image">
								<div class="input-group">
									<span class="text-warning">
										<i class="fa fa-2x fa-times-circle-o"></i>
									</span>									
								</div>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">Vivienda Exterior</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_imagen_seleccionado">
								<input type="hidden" name="tipo[]" value="Vivienda Exterior">
								<input type="hidden" name="seleccionado[]" class="input_imagen_seleccionada" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-image-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_images" name="file_imagen[]">			                               
								</div>
							</div>
							<div class="col-md-1 col-validation-field-file-image">
								<div class="input-group">
									<span class="text-warning">
										<i class="fa fa-2x fa-times-circle-o"></i>
									</span>									
								</div>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">Vivienda Interior</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_imagen_seleccionado">
								<input type="hidden" name="tipo[]" value="Vivienda Interior">
								<input type="hidden" name="seleccionado[]" class="input_imagen_seleccionada" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-image-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_images" name="file_imagen[]">			                               
								</div>
							</div>
							<div class="col-md-1 col-validation-field-file-image">
								<div class="input-group">
									<span class="text-warning">
										<i class="fa fa-2x fa-times-circle-o"></i>
									</span>									
								</div>								
							</div>
						</div>						
					</div>
						<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">Ubicación</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_imagen_seleccionado">
								<input type="hidden" name="tipo[]" value="Ubicacion">
								<input type="hidden" name="seleccionado[]" class="input_imagen_seleccionada" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-image-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_images" name="file_imagen[]">			                               
								</div>
							</div>
							<div class="col-md-1 col-validation-field-file-image">
								<div class="input-group">
									<span class="text-warning">
										<i class="fa fa-2x fa-times-circle-o"></i>
									</span>									
								</div>								
							</div>
						</div>						
					</div>
					
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" id="btn-frm-add-imagen">Agregar Imagenes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



