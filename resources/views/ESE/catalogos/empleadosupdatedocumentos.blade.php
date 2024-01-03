<style>

    .link-pdf{

        color:white;

    }

</style>



<div class="jumbotron">



	<ul class="nav nav-tabs" role="tablist">

		<li role="presentation" class="active"><a href="#DatosGenerales" aria-controls="DatosGenerales" role="tab" data-toggle="tab">Datos Generales</a></li>

		<li role="presentation"><a href="#Usuario" aria-controls="Usuario" role="tab" data-toggle="tab">Usuario</a></li>

		<li role="presentation"><a href="#Documentos" aria-controls="Documentos" role="tab" data-toggle="tab">Documentos</a></li>

	</ul>



	<div class="tab-content" id="nav-tabContent">

		<div role="tabpanel" class="tab-pane active" id="DatosGenerales">

			<div class="row">

				<h4>Datos Personal</h4>

				<hr>

				<div class="form-group col-md-3">

					<label class="requerido">Nombre (*)</label>

					{{ Form::text('Nombre',$Nombre,['class' => 'form-control','id'=>'Nombre','data-parsley-group'=>'wizard-step-1','required'=>'required','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}



				</div>

				<div class="form-group col-md-3">

				<label>Segundo Nombre</label>

				{{ Form::text('SegundoNombre',$SegundoNombre,['class' => 'form-control','id'=>'SegundoNombre','data-parsley-group'=>'wizard-step-1','pattern'=>'.*[^ ].*'])}}

				</div>

				<div class="form-group col-md-3">

				<label class="requerido">Apellido Paterno (*)</label>

				{{ Form::text('ApellidoPaterno',$ApellidoPaterno,['class' => 'form-control','id'=>'ApellidoPaterno','data-parsley-group'=>'wizard-step-1','required'=>'required','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}

				</div>

				<div class="form-group col-md-3">

					<label>Apellido Materno</label>

					{{ Form::text('ApellidoMaterno',$ApellidoMaterno,['class' => 'form-control','id'=>'ApellidoMaterno','data-parsley-group'=>'wizard-step-1','pattern'=>'.*[^ ].*'])}}

				</div>

			</div>



			<div class="row">

				<div class="form-group col-md-3">

					<label >RFC</label>

					{{ Form::text('Rfc',$Rfc,['class' => 'form-control','id'=>'Rfc','data-parsley-group'=>'wizard-step-1','pattern'=>'.*[^ ].*'])}}

				</div>

				<div class="form-group col-md-3">

					<label>CURP</label>

					{{ Form::text('Curp',$Curp,['class' => 'form-control','id'=>'Curp','data-parsley-group'=>'wizard-step-1'])}}

				</div>

				<div class="form-group col-md-3">

					<label>Email</label>

					{{ Form::text('Email',$Email,['class' => 'form-control','name'=>'Email','id'=>'Email','data-parsley-group'=>'wizard-step-1','maxlength'=>'','onblur'=>'validarEmail(this)'])}}

				</div>

				<div class="form-group col-md-3">

					<label>Genero</label>

					<select id="genero" name="genero" class="form-control" type="text">

						<option id="Masculino" <?php if ($genero == "Masculino" ) echo 'selected' ; ?> value="Masculino" >Masculino</option>

						<option id="Femenino" <?php if ($genero == "Femenino" ) echo 'selected' ; ?> value="Femenino" >Femenino</option>

					</select>

				</div>

			</div>



			<div class="row">

				<h4>Datos de Domicilio</h4>

				<hr>

				<div class="form-group col-md-3">



						<label class="requerido">Código Postal (*)</label>

						<div class="input-group">

							<input type="text" class="form-control" name="CP" value="{{ $cp or '' }}" id="searchcp"

							required

							data-live-search="true"

							data-parsley-group="wizard-step-1"

							data-style="btn-white"

							data-size="10"

							title="Es campo requerido"/>

							<div class="input-group-btn">

								<button class="btn btn-primary" type="button" onclick="searchCP();">Buscar

									<span class="glyphicon glyphicon-search"></span>

								</button>

							</div>

						</div>

            <div id="alerta-cp">



            </div>

				</div>

				<div class="form-group col-md-3">

					<label>Estado</label>



						<input type="text" class="form-control" id="State" name="State" value="{{ $State or '' }}" data-live-search="true"

												data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>

						<input type="hidden"  id="IdEstado" name="IdEstado" value="{{ $IdState or '' }}">

						<input type="hidden"  id="IdPais"  name="IdPais" value="{{ $IdPais or '' }}">

						<input type="hidden"  id="Localidad" name="Localidad" value="{{ $Localidad or '' }}">

						<input type="hidden"  id="IdCodigoPostal" name="IdCodigoPostal" value="{{ $IdCodigoPostal or '' }}">





				</div>

				<div class="form-group col-md-3">

					<label>Ciudad o municipio</label>



						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $Municipio or '' }}" data-live-search="true"

						data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>





				</div>

				<div class="form-group col-md-3">

						<label>Colonia</label>



							<select class="form-control" name="Colonia" id="Colonia">

								@foreach(explode(';',$Colonia) as $row)

									<option value="{{ $row }}">{{ $row }}</option>

								@endforeach

							</select>



				</div>

			</div>



			<div class="row">

				<div class="form-group col-md-6">

					<label>Calle</label>

					{{ Form::text('Calle',$Calle,['class' => 'form-control','id'=>'Calle','data-parsley-group'=>'wizard-step-1'])}}

				</div>

				<div class="form-group col-md-6">

					<label>Referencia</label>

					{{ Form::text('Referencias',$Referencias,['class' => 'form-control','id'=>'Referencias','data-parsley-group'=>'wizard-step-1'])}}

				</div>

			</div>



			<div class="row">

				<h4>Datos de Contacto</h4>

				<hr>

				<div class="form-group col-md-4">

					<label class="requerido">Telefono Movil (*)</label>

					{{ Form::text('TelefonoMovil',$TelefonoMovil,['class' => 'form-control','id'=>'TelefonoMovil','data-parsley-group'=>'wizard-step-1','required'=>'required','minlength'=>'8','maxlength'=>'10','title'=>'Es campo requerido'])}}

				</div>

				<div class="form-group col-md-4">

					<label>Telefono Local</label>

					{{ Form::text('TelefonoLocal',$TelefonoLocal,['class' => 'form-control','id'=>'TelefonoLocal','data-parsley-group'=>'wizard-step-1','minlength'=>'8','maxlength'=>'10'])}}

				</div>

				<div class="form-group col-md-4">

					<label>Extencion</label>

					{{ Form::text('Extension',$Extension,['class' => 'form-control','id'=>'Extension','data-parsley-group'=>'wizard-step-1','maxlength'=>'10'])}}

				</div>

			</div>



			<div class="form-group row">

				<h4>Datos Bancarios</h4>

				<hr>

				<div class="form-group col-md-6">

					<label>Selecciona tu Banco</label>

					{!! Form::select('IdBanco', $Bancos, null, ['class'=>'form-control', 'id'=>'IdBanco','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

				</div>

			</div>

		</div>



		<div class="tab-pane fade" id="Usuario" role="tabpanel" aria-labelledby="Usuario-tab">

			<div class="form-group row">

				<h4>Datos para generar usuario</h4>

				<hr>

				<div class="form-group col-md-3">

					<label>Usuario</label>

					{{ Form::text('Usuario',$Usuario,['class' => 'form-control','name'=>'Usuario','id'=>'Usuario','data-parsley-group'=>'wizard-step-1','required'=>'required','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}

				</div>

				<div class="form-group col-md-3">

					<label>Password</label><br>

					{{ Form::text('Password',$Password,['class' => 'form-control','id'=>'Password','data-parsley-group'=>'wizard-step-1','required'=>'required','minlength'=>'3','pattern'=>'.*[^ ].*','type'=>'password','title'=>'Es campo requerido'])}}

				</div>

				<div class="form-group col-md-3">

					<label>Rol</label>

					{!! Form::select('IdRol', $Roles, null, ['class'=>'form-control', 'id'=>'IdRol','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

				</div>

				<div class="form-group col-md-3">

					<label>Puesto</label>

					{!! Form::select('IdPuesto', $Puestos, null, ['class'=>'form-control', 'id'=>'IdPuesto','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

				</div>

			</div>

			<br>





		</div>



		<div class="tab-pane fade" id="Documentos" role="tabpanel" aria-labelledby="nav-contact-tab">

			<table class="table">

				<thead>

					<tr>

						<th scope="col">

							<input type="checkbox" class="form-check-input" id="exampleCheck1">

						</th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaFoto) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						</th>

						<th scope="col">Foto</th>

						<th scope="col">

							{{Form::file('ArchivoFoto',['class'=>'form-control','id'=>'ArchivoFoto','data-parsley-group'=>'wizard-step-1','accept'=>'image/*','enctype'=>'multipart/form-data','files'=>true])}}

						</th>



					</tr>

				</thead>

				<tbody>

					<tr>

						<th scope="col">

							<input type="checkbox" class="form-check-input" id="exampleCheck1">

						</th>

						<th scope="col">

						<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaReferencias) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						</th>

						<th scope="col">Referencias</th>

						<th scope="col">

							{{ Form::file('referenciasPDF',['class' => 'form-control','id'=>'referenciasPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>





					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

						<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaConvenio) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Convenio de trabajo</th>

						<th scope="col">

							{{ Form::file('convenioPDF',['class' => 'form-control','id'=>'convenioPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaActaNacimiento) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Acta de nacimiento</th>

						<th scope="col">

							{{ Form::file('actaPDF',['class' => 'form-control','id'=>'actaPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaIdentificacion) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Identificacion oficial (INE)</th>

						<th scope="col">

						{{ Form::file('inePDF',['class' => 'form-control','id'=>'inePDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaPasaporte) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Pasaporte</th>

						<th scope="col">

							{{ Form::file('pasaportePDF',['class' => 'form-control','id'=>'pasaportePDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaCurp) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Clave Unica de registro de Poblacion CURP</th>

						<th scope="col">

							{{ Form::file('curpPDF',['class' => 'form-control','id'=>'curpPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaRfc) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Registro Federal de Contribuyente RFC</th>

						<th scope="col">

							{{ Form::file('rfcPDF',['class' => 'form-control','id'=>'rfcPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

						<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaCv) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Curriculum Vitae (CV)</th>

						<th scope="col">

						{{ Form::file('cvPDF',['class' => 'form-control','id'=>'cvPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaComprobante) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Comprobante de domicilio</th>

						<th scope="col">

							{{ Form::file('comprobantePDF',['class' => 'form-control','id'=>'comprobantePDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaNss) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Numero de Seguridad Social (NSS)</th>

						<th scope="col">

							{{ Form::file('nssPDF',['class' => 'form-control','id'=>'nssPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

							<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaCuentaBancaria) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Estado de cuenta Bancaria</th>

						<th scope="col">

							{{ Form::file('cuentabancariaPDF',['class' => 'form-control','id'=>'cuentabancariaPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

						<th scope="col">

						<button type="button" class="btn btn-warning link-pdf" type="button"><a href="{{ asset($RutaDocumentosExtras) }}" target="_blank" rel="noopener noreferrer" class="link-pdf">Ver</a></button>

						<th scope="col">Documentos extras</th>

						<th scope="col">

							{{ Form::file('documentosextrasPDF',['class' => 'form-control','id'=>'documentosextrasPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','type'=>'file'])}}

						</th>

					</tr>



				</tbody>

			</table>

			<br>







		</div>



		<div class="row">

				<div class="col-md-2 col-sm-4">

					<a class="btn btn-default btn-block" href="{{ url('CatalogoEmpleados') }}">Cancelar</a>

				</div>

				<div class="col-md-2 col-md-offset-8 text-right">

					<input type="submit" name="Guardar" value="Actualizar Personal" class="btn btn-success btn-block" onclick="hacer_click_Empleados({{ isset($IdEmpleado)?$IdEmpleado:'0' }})">

					<input type="hidden" id="num_id" value="{{ isset($IdEmpleado)?$IdEmpleado:'' }}">





				</div>

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
  		<script>
			$('.phone_with_ddd').mask('000-000-0000');
		</script>
</div>


