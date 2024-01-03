<style>

</style>

<div class="jumbotron">

	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#DatosGenerales" aria-controls="DatosGenerales" role="tab" data-toggle="tab">Datos</a></li>
		<li role="presentation"><a href="#Usuario" aria-controls="Usuario" role="tab" data-toggle="tab">Plantillas</a></li>
		<li role="presentation"><a href="#Documentos" aria-controls="Documentos" role="tab" data-toggle="tab">Recipientes</a></li>
	</ul>

	<div class="tab-content" id="nav-tabContent">
		<div role="tabpanel" class="tab-pane active" id="DatosGenerales">
			<div class="form-group row">
				<h4>Datos para Configurar Email</h4>
				<hr>

				<div class="form-group col-md-6">
				<label>Modulo</label>
				{{ Form::text('Modulo',$Modulo,['class' => 'form-control','name'=>'Modulo','id'=>'Modulo','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}
				</div>

				<div class="form-group col-md-3">
				<label>Noficaciones Web</label>
				<select class="form-control" name="notweb">
					<option value="">Selecciones una opcion</option>
					<option @if ($web == 'Si') selected @endif value="Si">Si</option>
					<option @if ($web == 'No') selected @endif value="No">No</option>
				</select>
				</div>

				<div class="form-group col-md-3">
				<label>Notificaciones por Correo</label>
				<select class="form-control" name="notCorreo">
					<option value="">Selecciones una opcion</option>
					<option @if ($correo == 'Si') selected @endif value="Si">Si</option>
					<option @if ($correo == 'No') selected @endif value="No">No</option>
				</select>
				</div>

				<div class="form-group col-md-12">
				<label>Descripcion</label>
				{{ Form::textarea('Descripcion',$Descripcion,['class' => 'form-control','name'=>'Descripcion','id'=>'Descripcion','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido','rows'=>'4'])}}
				</div>
					<input type="hidden" name="IdPlantilla" value="{{ $IdPlantillaEmail }}">
			</div>

		</div>

		<div class="tab-pane fade" id="Usuario" role="tabpanel" aria-labelledby="Usuario-tab">
			<div class="form-group row">
				<h4>Datos para Configurar Email</h4>
				<hr>
				<div class="col-md-9">
					<div class="form-group col-md-6">
						<label>Descripcion Notificaciones</label>
						{{ Form::text('DescripcionEmail',$DescripcionPlantilla,['class' => 'form-control','name'=>'DescripcionEmail','id'=>'DescripcionEmail','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}
					</div>

					<div class="form-group col-md-6">
						<label>Asunto Email</label>
						{{ Form::text('TituloEmail',$TituloEmail,['class' => 'form-control','name'=>'TituloEmail','id'=>'TituloEmail','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}
					</div>

					<div class="form-group col-md-12">
						<label>Descripción Email</label>
						{{ Form::textarea('CuerpoEmail',$CuerpoEmail,['class' => 'form-control','name'=>'CuerpoEmail','id'=>'CuerpoEmail','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}
					</div>

					<div class="form-group col-md-12">
						<label>Pie de Página Email</label>
						{{ Form::textarea('FooterEmail',$FooterEmail,['class' => 'form-control','name'=>'FooterEmail','id'=>'FooterEmail','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>''])}}
					</div>
				</div>

				<div class="col-sm-3">
					<div style="border: black 1px solid; height:320px; overflow-y: scroll;" >
						<table>
							@foreach ($labels as $l)
								<tr> <td width="5%"></td> <td width="95%"> {{$l->CampoNombre}} </td> </tr>
							@endforeach

						</table>
					</div>

				</div>

			</div>
 	</div>

		<div class="tab-pane fade" id="Documentos" role="tabpanel" aria-labelledby="nav-contact-tab">
			<div class="form-group row">
				<h4>Datos para Configurar Email</h4>
				<hr>
				<div class="col-md-12">
						<button class="btn btn-small btn-success" type="button" name="button" onclick="newitem()"><i class="fa fa-plus" aria-hidden="true"></i> Agregar </button>
				</div>

				<div class="col-md-12">
					<table style="width:100%;">
						<tbody id="table-emails">
					@foreach ($recipients as $r)
						<tr>
							<td>
								<input type="hidden" name="ids[]" id="ids" value="{{$r->IdRecipient}} ">
								<div class="form-group col-md-4">
									<label>Email</label>
									{{-- {{ Form::text('Email',$r->Email,['class' => 'form-control','name'=>'Email','id'=>'Email$r->IdRecipient','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}} --}}
									<input class="form-control" type="text" id="Email" name="Email[]" value="{{$r->Email}}" title="Es campo requerido" required>
								</div>

								<div class="form-group col-md-4">
									<label>Destinatario</label>
									<input class="form-control" type="text" id="Destinatario" name="Destinatario[]" value="{{$r->NombreDestinatario}}" title="Es campo requerido" required>
									{{-- {{ Form::text('Destinatario',,['class' => '','name'=>'Destinatario','id'=>'Destinatario','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*',])}} --}}
								</div>

								<div class="form-group col-md-3">
									<label>Modo</label>
									<select class="form-control" name="Modo[]">
										<option value="Normal" @if ($r->ModoEnvio == "Normal" )  {{'selected'}} @endif >Normal</option>
										<option value="CC" @if ($r->ModoEnvio == "CC" )  {{'selected'}} @endif >CC</option>
										<option value="CCO" @if ($r->ModoEnvio == "CCO" )  {{'selected'}} @endif >CCO</option>

									</select>

								</div>

								<div class="form-group col-md-1">
									<br>
									<button class="borrar btn btn-small btn-danger" type="button" name="button" > <i class="fa fa-trash"></i> </button>
								</div>
							</td>
						</tr>
					@endforeach
						<tbody>
					</table>

				</div>

			</div>


		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2 col-sm-4">
			<a class="btn btn-default btn-block" href="{{ url('ConfiguracionEmail') }}">Cancelar</a>
		</div>
		<div class="col-md-2 col-md-offset-8 text-right">
			<input type="submit" name="Siguiente" value="Guardar Email" class="btn btn-success btn-block" onclick="save({{ isset($IdConfEmail)?$IdConfEmail:'0' }})">
			<input type="hidden" id="num_id" name="num_id" value="{{ isset($IdConfEmail)?$IdConfEmail:'' }}">
		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <div style="clear:both">
           <iframe id="viewer" frameborder="0" scrolling="no" width="565" height="500"></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	document.getElementById("menu-ese").style.display="block";
</script>
