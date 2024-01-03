<!-- Modal -->
<div class="modal fade" id="plantillasSeleccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form class="form-horizontal" action="{{ route('sig-erp-ese::estudio-ese-plantillas.create') }}" method="GET" id="frm-create-template">
			{{ csrf_token() }}
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-warning text-center" id="myModalLabel">
						<i class="fa fa-2x fa-file-pdf-o"></i> Selección de Plantilla
					</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
					<div class="row" id="modal-message-template">
						<div class="alert alert-danger fade in m-b-15 col-md-10 col-md-offset-1">
							<strong>Error! </strong>
							No hay una plantilla seleccionada							
						</div>
					</div>
					<div class="row">
							<h5 class="col-md-3 control-label">
								<span class="semi-bold">Tipo de Plantilla: </span>
							</h5>
							<div class="col-md-8">
								<select class="form-control input-sm" name="template" id="select-template">
									<option value="-1">Seleccionar plantilla</option>
								@foreach( $templates as $template )
									<option value="{{ $template->id }}">{{ $template->nombre }}</option>
								@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success" id="btn-create-template">Crear plantilla</button>
				</div>
			</div>
		</form>


	</div>
</div>