
<div class="modal fade" tabindex="-1" role="dialog" id="ese-modal-anexo">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center">Agregar Anexo <i class="fa fa-2x fa-upload text-warning"></i></h4>				
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ url('estudio-ese-add-anexo') }}" method="POST" id="frm-add-anexo" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="id_ese" value="{{ $estudio_ese->id }}">
					<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">Archivo</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_archivo_seleccionado">
								<input type="hidden" name="tipo[]" value="Archivo"> 
								<input type="hidden" name="seleccionado[]" class="input_seleccionado" value="0"> 								                                           
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-archive-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_anexos" name="file_anexo[]">			                               
								</div>
							</div>

							<div class="col-md-1 col-validation-field-file">
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
							<h5 class="col-md-12 control-label text-center"><strong>Documentos Requeridos</strong></h5>
							
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">INE</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_archivo_seleccionado">
								<input type="hidden" name="tipo[]" value="INE"> 
								<input type="hidden" name="seleccionado[]" class="input_seleccionado" value="0"> 								                                           
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-archive-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_anexos" name="file_anexo[]">			                               
								</div>
							</div>							

							<div class="col-md-1 col-validation-field-file">
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
							<label class="col-md-3 control-label">Comprobante de domicilio</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_archivo_seleccionado">
								<input type="hidden" name="tipo[]" value="C_Domicilio">
								<input type="hidden" name="seleccionado[]" class="input_seleccionado" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-archive-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_anexos" name="file_anexo[]">			                               
								</div>
							</div>

							<div class="col-md-1 col-validation-field-file">
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
							<label class="col-md-3 control-label">Otro</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_archivo_seleccionado">
								<input type="hidden" name="tipo[]" value="Otro">
								<input type="hidden" name="seleccionado[]" class="input_seleccionado" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-archive-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_anexos" name="file_anexo[]">			                               
								</div>
							</div>

							<div class="col-md-1 col-validation-field-file">
								<div class="input-group">
									<span class="text-warning">
										<i class="fa fa-2x fa-times-circle-o"></i>
									</span>									
								</div>
								
							</div>

						</div>
						<hr>
					</div>
					<div class="row">
						<div class="form-group">
							<h5 class="col-md-12 control-label text-center"><strong>Otros</strong></h5>
							
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-md-3 control-label">Evaluación</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_archivo_seleccionado">
								<input type="hidden" name="tipo[]" value="Evaluacion">
								<input type="hidden" name="seleccionado[]" class="input_seleccionado" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-archive-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_anexos" name="file_anexo[]">
												                               
								</div>
							</div>

							<div class="col-md-1 col-validation-field-file">
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
							<label class="col-md-3 control-label">Aviso de privacidad</label>
							<div class="col-md-1">														
								<input type="checkbox" class="checkbox_archivo_seleccionado">
								<input type="hidden" name="tipo[]" value="Aviso_Privacidad">
								<input type="hidden" name="seleccionado[]" class="input_seleccionado" value="0">                                            
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-file-archive-o"></i>
									</span>
									<input type="file" data-toggle="tooltip" title="El archivo no debe superar los 10mb" class="form-control files_anexos" name="file_anexo[]">
									
								</div>
							</div>

							<div class="col-md-1 col-validation-field-file">
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
				<button type="button" class="btn btn-success" id="btn-frm-add-anexo">Agregar Anexos</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



