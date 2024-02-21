<style>

</style>

@if ($mensaje=='Se requiere crear el usuario.')

	<div class="row">

		<div class="col-md-12">

			<div class="alert alert-danger fade in m-b-15">

			

					{{$mensaje}}

				<span class="close" data-dismiss="alert">×</span>

			</div>

		</div>

	</div>

@endif

<div class="jumbotron">



	<ul class="nav nav-tabs" role="tablist">

		<li role="presentation" class="@if($active_tab=='Usuario') active @endif"><a class="tab" href="#Usuario" aria-controls="tabUsuario" role="tab" data-toggle="tab">Usuario</a></li>

		<li role="presentation" class="@if($active_tab=='DatosGenerales') active @endif"><a class="tab" href="#DatosGenerales" aria-controls="DatosGenerales" role="tab" data-toggle="tab">Datos Generales</a></li>

		<li role="presentation" class="@if($active_tab=='Documentos') active @endif"><a class="tab" href="#Documentos" aria-controls="Documentos" role="tab" data-toggle="tab">Documentos</a></li>

		<li role="presentation" class="@if($active_tab=='DatosBancarios') active @endif"><a class="tab" href="#DatosBancarios" aria-controls="DatosBancarios" role="tab" data-toggle="tab">Datos Bancarios</a></li>

		<li role="presentation" class="@if($active_tab=='RegionesxInvestigador') active @endif"><a class="tab" href="#RegionesxInvestigador" aria-controls="RegionesxInvestigador" role="tab" data-toggle="tab">Cobertura por Investigador</a></li>

	</ul>

	<input type="hidden" value="{{$active_tab}}" id="active_tab" name="active_tab">

	<input type="hidden" value="{{$IdEmpleado}}" id="IdEmpleado" name="IdEmpleado">

	<div class="tab-content" id="nav-tabContent">

		<div class="tab-pane @if($active_tab=='Usuario') in active @endif" id="Usuario" role="tabpanel" aria-labelledby="tabUsuario-tab">

			<input type="hidden" value="{{$catalogoSeleccionado}}" id="catalogoSeleccionado" name="catalogoSeleccionado">

			@if ($catalogoSeleccionado == "CatalogoAnalistas")

				<div class="form-group row">

					<div class="form-group col-md-6">

						<label>Usuario</label>

						<select name="usuarios" id="usuarios" class="form-control form-control-sm">

							@foreach ($usuarios as $item)

								<option {{($IdUsuario == $item->id)?'selected':''}} value="{{$item->id}}"><div >Usuario:</div>{{$item->username}} Rol:{{$item->namerol}}</option>	

							@endforeach

						</select>

					</div>

				</div>

			@else

			<div class="form-group row">

				<h4>Datos para generar usuario</h4>

				<hr>

				<div class="row">

					<!-- <h4>Datos Personal</h4> -->

					<!-- <hr> -->

					<div class="form-group col-md-3">

						<label class="requerido">Nombre (*)</label>

						{{ Form::text('Nombre',$Nombre,['class' => 'form-control','id'=>'Nombre','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}



					</div>

					<div class="form-group col-md-3">

					<label>Segundo Nombre</label>

					{{ Form::text('SegundoNombre',$SegundoNombre,['class' => 'form-control','id'=>'SegundoNombre','data-parsley-group'=>'wizard-step-1','pattern'=>'.*[^ ].*'])}}

					</div>

					<div class="form-group col-md-3">

					<label class="requerido">Apellido Paterno (*)</label>

					{{ Form::text('ApellidoPaterno',$ApellidoPaterno,['class' => 'form-control','id'=>'ApellidoPaterno','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido'])}}

					</div>

					<div class="form-group col-md-3">

						<label>Apellido Materno</label>

						{{ Form::text('ApellidoMaterno',$ApellidoMaterno,['class' => 'form-control','id'=>'ApellidoMaterno','data-parsley-group'=>'wizard-step-1','pattern'=>'.*[^ ].*'])}}

					</div>

				</div>



				<div class="row">

					<div class="form-group col-md-3">

						<label >RFC</label>

						{{ Form::text('Rfc',$Rfc,['class' => 'form-control','id'=>'Rfc','data-parsley-group'=>'wizard-step-1','pattern'=>'.*[^ ].*','maxlength'=>'13'])}}

					</div>

					<div class="form-group col-md-3">

						<label>CURP</label>

						{{ Form::text('Curp',$Curp,['class' => 'form-control','id'=>'Curp','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}

					</div>

					<div class="form-group col-md-3">

						<label>Email (*)</label>

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

					<div class="form-group col-md-4">

						<label class="requerido">Telefono Movil</label>

						{{ Form::text('TelefonoMovil',$TelefonoMovil,['class' => 'form-control phone_with_ddd','id'=>'TelefonoMovil','data-parsley-group'=>'wizard-step-1','minlength'=>'8','maxlength'=>'10','title'=>'Es campo requerido'])}}

					</div>

					<div class="form-group col-md-4">

						<label>Usuario (*)</label>

						{{ Form::text('Usuario',$Usuario,['class' => 'form-control','name'=>'Usuario','id'=>'Usuario','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','title'=>'Es campo requerido','onblur' => 'existUsername(this)'])}}

					</div>

					<div class="form-group col-md-4">

						<label>Password (*)</label>

						<div class="input-group">

							{{ Form::input('Password','Password',$Password,['class' => 'form-control','id'=>'Password','data-parsley-group'=>'wizard-step-1','minlength'=>'3','pattern'=>'.*[^ ].*','type'=>'password','title'=>'Es campo requerido'])}}

							<div class="input-group-btn">

								<button class="btn btn-primary" type="button" onclick="visualizar();">

									|<span id="icon-pass" class="glyphicon glyphicon-eye-open"></span>

								</button>

								<input type="hidden" id="id_mostrar" value="0">

							</div>

						</div>

					</div>

					

				</div>

				<div class="form-group col-md-3">

					{{-- <label>Rol</label> --}}

					{{-- {!! Form::select('IdRol', $Roles, null, ['class'=>'form-control', 'id'=>'IdRol', 'name'=>'IdRol','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','onchange'=>'mostrarValor(this.value);']) !!} --}}

					<input type="hidden" id='IdRol' name='IdRol' value="{{$Roles}}">

				</div>

				<input type="hidden" name="IdPuesto" id="IdPuesto" value="1">

				{{-- <div class="form-group col-md-3">

					<label>Puesto</label>

					{!! Form::select('IdPuesto', $Puestos, null, ['class'=>'form-control', 'id'=>'IdPuesto','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

				</div> --}}

			</div>				

			@endif

			<div class="row">

				<div class="col-md-2 col-md-offset-10 text-right">

				<button type="submit" name="SiguienteUsuario" id="saveInformation" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." class="btn btn-success btn-block" >Siguiente</button>

				

				</div>

			</div>

			

		</div>

		<div role="tabpanel fade" class="tab-pane  @if($active_tab=='DatosGenerales') in active @endif" id="DatosGenerales">

			<div class="row">

				<h4>Datos de Domicilio</h4>

				<hr>

				<div class="form-group col-md-3">



						<label>Código Postal </label>

						<div class="input-group">

							<input type="text" class="form-control" name="CP" value="{{ $cp or '' }}" id="searchcp"

							

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

						<input type="hidden" id="IdEstado"  name="IdEstado" value="{{ $IdState or '' }}">

						<input type="hidden" id="IdPais"  name="IdPais" value="{{ $IdPais or '' }}">

						<input type="hidden" id="Localidad" name="Localidad" value="{{ $Localidad or '' }}">

						<input type="hidden" id="IdCodigoPostal" name="IdCodigoPostal" value="{{ $IdCodigoPostal or '' }}">





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

									<option @if($ColUpdate == $row) selected	@endif value="{{ $row }}">{{ $row }}</option>

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

				<div class="form-group col-md-6">

					<label>Latitud, Longitud</label>

					{{ Form::text('Coordendas',$CoordenadasGmaps,['class' => 'form-control','id'=>'Coordendas','data-parsley-group'=>'wizard-step-1'])}}

				</div>



				<div class="form-group col-md-6">

					<label>Url Localizacion</label>

					{{ Form::text('Localizacion',$Localizacion,['class' => 'form-control','id'=>'Localizacion','data-parsley-group'=>'wizard-step-1'])}}

				</div>



			</div>



		<div class="row">

				<h4>Datos de Contacto</h4>

				<hr>
				
				<div class="form-group col-md-4">

					<label>Telefono Local</label>

					{{ Form::text('TelefonoLocal',$TelefonoLocal,['class' => 'form-control phone_with_ddd','id'=>'TelefonoLocal','data-parsley-group'=>'wizard-step-1'])}}

				</div>

				<div class="form-group col-md-4">

					<label>Extencion</label>

					{{ Form::text('Extension',$Extension,['class' => 'form-control phone_with_ddd','id'=>'Extension','data-parsley-group'=>'wizard-step-1','maxlength'=>'10'])}}

				</div>
				<div class="form-group col-md-3">
					<label>Estatus del Investigador</label>

					<select class="form-control" name="EstatusInvesId" id="EstatusInvesId">
						@foreach($CatalogoEstatusInves as $row)
							<option @if ($CatalogoEstatusInves == $row->id) selected	@endif  value={{ $row->id }}>{{ $row->Descripcion }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-3">
					<label>Comentarios</label>
					<textarea   id ="ComentarioInves" rows="4" cols="50" name="ComentarioInves" placeholder="Agregar comentario">{{$ComentarioInves}}</textarea>
				</div>
			</div>

			<div class="row">

				<div class="col-md-2 col-sm-4">

					<a class="btn btn-success btn-block back">Anterior</a>

				</div>

				<div class="col-md-2 col-md-offset-8 text-right">

					<button type="submit" name="SiguienteDG" id="saveInformation" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." class="btn btn-success btn-block" >Siguiente</button>

					<!-- <a class="btn btn-success btn-block continue">Siguiente</a> -->

				</div>

			</div>

			

		</div>

		<div class="tab-pane  @if($active_tab=='Documentos') in active @endif" id="Documentos" role="tabpanel" aria-labelledby="nav-contact-tab">

			<table class="table">

				<thead>

					<tr>

						<th scope="col">

							<input type="checkbox" class="form-check-input" id="fotock" <?php if ($RutaFoto <> "" ) echo 'checked' ; ?> disabled>

						</th>

						<th scope="col">

							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="PreviewImage();">Ver</button>

						</th>

						<th scope="col">fotografia candidato</th>

						<th scope="col">

							<input type="hidden" name="foto" id="foto" value="{{$RutaFoto}}">

							@if ($RutaFoto)

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{Form::file('fotografiaPDF',['class'=>'form-control','id'=>'fotografiaPDF','data-parsley-group'=>'wizard-step-1','accept'=>'image/*','enctype'=>'multipart/form-data','files'=>true])}}

						</th>



					</tr>

				</thead>

				<tbody>

					<tr>

						<th scope="col">

							<input type="checkbox" class="form-check-input" id="Referencias_pdfck" <?php if ($RutaReferencias <> "" ) echo 'checked' ; ?> disabled>

						</th>

						<th scope="col">

							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('referenciasPDF','Referencias_pdf');">Ver</button>

						</th>

						<th scope="col">Referencias</th>

						<th scope="col">

							<input type="hidden" name="Referencias_pdf" id="Referencias_pdf" value="{{ $RutaReferencias }}">

							@if ($RutaReferencias)

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('referenciasPDF',['class' => 'form-control','id'=>'referenciasPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>





					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Convenio_pdfck" <?php if ($RutaConvenio <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('convenioPDF','Convenio_pdf');">Ver</button></th>

						<th scope="col">Convenio de trabajo</th>

						<th scope="col">

							<input type="hidden" name="Convenio_pdf" id="Convenio_pdf" value="{{ $RutaConvenio }}">

							@if ( $RutaConvenio )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('convenioPDF',['class' => 'form-control','id'=>'convenioPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Acta_pdfck" <?php if ($RutaActaNacimiento <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('actaPDF','Acta_pdf');">Ver</button></th>

						<th scope="col">Acta de nacimiento</th>

						<th scope="col">

							<input type="hidden" name="Acta_pdf" id="Acta_pdf" value="{{ $RutaActaNacimiento }}">

							@if ($RutaActaNacimiento)

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('actaPDF',['class' => 'form-control','id'=>'actaPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Ine_pdfck" <?php if ($RutaIdentificacion <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('inePDF','Ine_pdf');">Ver</button></th>

						<th scope="col">Identificacion oficial (INE)</th>

						<th scope="col">

							<input type="hidden" name="Ine_pdf" id="Ine_pdf" value="{{ $RutaIdentificacion }}">

							@if ($RutaIdentificacion)

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

						{{ Form::file('inePDF',['class' => 'form-control','id'=>'inePDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Pasaporte_pdfck" <?php if ($RutaPasaporte <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('pasaportePDF','Pasaporte_pdf');">Ver</button></th>

						<th scope="col">Pasaporte</th>

						<th scope="col">

							<input type="hidden" name="Pasaporte_pdf" id="Pasaporte_pdf" value="{{ $RutaPasaporte }}">

							@if ( $RutaPasaporte )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('pasaportePDF',['class' => 'form-control','id'=>'pasaportePDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Curp_pdfck" <?php if ($RutaCurp <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('curpPDF','Curp_pdf');">Ver</button></th>

						<th scope="col">Clave Unica de registro de Poblacion CURP</th>

						<th scope="col">

							<input type="hidden" name="Curp_pdf" id="Curp_pdf" value="{{ $RutaCurp }}">

							@if ( $RutaCurp )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('curpPDF',['class' => 'form-control','id'=>'curpPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Rfc_pdfck" <?php if ($RutaRfc <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('rfcPDF','Rfc_pdf');">Ver</button></th>

						<th scope="col">Registro Federal de Contribuyente RFC</th>

						<th scope="col">

							<input type="hidden" name="Rfc_pdf" id="Rfc_pdf" value="{{ $RutaRfc }}">

							@if ( $RutaRfc )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('rfcPDF',['class' => 'form-control','id'=>'rfcPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Cv_pdfck" <?php if ($RutaCv <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('cvPDF','Cv_pdf');">Ver</button></th>

						<th scope="col">Curriculum Vitae (CV)</th>

						<th scope="col">

							<input type="hidden" name="Cv_pdf" id="Cv_pdf" value="{{ $RutaCv }}">

							@if ( $RutaCv )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

						{{ Form::file('cvPDF',['class' => 'form-control','id'=>'cvPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Comprobante_pdfck" <?php if ($RutaComprobante <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('comprobantePDF','Comprobante_pdf');">Ver</button></th>

						<th scope="col">Comprobante de domicilio</th>

						<th scope="col">

							<input type="hidden" name="Comprobante_pdf" id="Comprobante_pdf" value="{{ $RutaComprobante }}">

							@if ( $RutaComprobante )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('comprobantePDF',['class' => 'form-control','id'=>'comprobantePDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="Nss_pdfck" <?php if ($RutaNss <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('nssPDF','Nss_pdf');">Ver</button></th>

						<th scope="col">Numero de Seguridad Social (NSS)</th>

						<th scope="col">

							<input type="hidden" name="Nss_pdf" id="Nss_pdf" value="{{ $RutaNss }}">

							@if ( $RutaNss )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('nssPDF',['class' => 'form-control','id'=>'nssPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="CuentaBancaria_pdfck" <?php if ($RutaCuentaBancaria <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('cuentabancariaPDF','CuentaBancaria_pdf');">Ver</button></th>

						<th scope="col">Estado de cuenta Bancaria</th>

						<th scope="col">

							<input type="hidden" name="CuentaBancaria_pdf" id="CuentaBancaria_pdf" value="{{ $RutaCuentaBancaria }}">

							@if ( $RutaCuentaBancaria )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('cuentabancariaPDF',['class' => 'form-control','id'=>'cuentabancariaPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



					<tr>

						<th scope="col"><input type="checkbox" class="form-check-input" id="DocumentoExtra_pdfck" <?php if ($RutaDocumentosExtras <> "" ) echo 'checked' ; ?> disabled></th>

						<th scope="col">

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="visualizar_PDF('documentosextrasPDF','DocumentoExtra_pdf');">Ver</button></th>

						<th scope="col">Documentos extras</th>

						<th scope="col">

							<input type="hidden" name="DocumentoExtra_pdf" id="DocumentoExtra_pdf" value="{{ $RutaDocumentosExtras }}">

							@if ( $RutaDocumentosExtras )

							<label for="">ya existe un archivo cargado (Dar clic en boton ver para visualizar) </label>

							@endif

							{{ Form::file('documentosextrasPDF',['class' => 'form-control','id'=>'documentosextrasPDF','data-parsley-group'=>'wizard-step-1','accept'=>'.pdf','enctype'=>'multipart/form-data','files'=>'true'])}}

						</th>

					</tr>



				</tbody>

			</table>

			

			<br>

			<div class="row">

				<div class="col-md-2 col-sm-4">

					<a class="btn btn-success btn-block back">Anterior</a>

				</div>

				

				<div class="col-md-2 col-md-offset-8 text-right">

					<button type="submit" name="SiguienteDocumentos" id="saveInformation" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." class="btn btn-success btn-block" >Siguiente</button>

					

				</div>

			</div>

		</div>



		<div class="tab-pane  @if($active_tab=='DatosBancarios') in active @endif" id="DatosBancarios" role="tabpanel" aria-labelledby="nav-contact-tab">

			<div class="row">



				

					<h4>Datos Bancarios</h4>

					<hr>

					<div class="row">
						<div class="form-group col-md-6">

								<label>Nombre de la persona a la que pertenece la cuenta</label>

								{{ Form::text('propietario_c', $propietario_c,['class' => 'form-control','id'=>'propietario_C','data-parsley-group'=>'wizard-step-1','minlength'=>'10','maxlength'=>'100'])}}

						</div>
					</div>

					<div class="row">


						
					
						
						<div class="form-group col-md-6">

							<label>Selecciona tu Banco</label>

							{!! Form::select('IdBanco', $Bancos, null, ['class'=>'form-control', 'id'=>'IdBanco','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

						</div>

						<div class="form-group col-md-6">

							<label>Número de Cuenta</label>

							{{ Form::text('NumCuenta',$NumCuenta,['class' => 'form-control','id'=>'NumCuenta','data-parsley-group'=>'wizard-step-1','minlength'=>'10','maxlength'=>'12'])}}

						</div>

					</div>



					<div class="row">

						<div class="form-group col-md-6">

							<label>Número de Tarjeta</label>

							{{ Form::text('NumTarjeta',$NumTarjeta,['class' => 'form-control','id'=>'NumTarjeta','data-parsley-group'=>'wizard-step-1','minlength'=>'16','maxlength'=>'16'])}}

						</div>

						<div class="form-group col-md-6">

							<label>Clabe Interbancaria</label>

							{{ Form::text('ClabeInt',$ClabeInt,['class' => 'form-control','id'=>'ClabeInt','data-parsley-group'=>'wizard-step-1','minlength'=>'18','maxlength'=>'18'])}}

						</div>

					</div>

					

			</div>

			<div class="row">

						<div class="col-md-2 col-sm-4">

							<a class="btn btn-success btn-block back">Anterior</a>

						</div>

						<div class="col-md-2 col-md-offset-8 text-right">

						<button type="submit" name="SiguienteDB" id="saveInformation" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." class="btn btn-success btn-block" >Siguiente</button>

							<!-- <a class="btn btn-success btn-block continue">Siguiente</a> -->

						</div>

						<!-- <div class="col-md-2 col-md-offset-8 text-right">

							<input type="submit" name="SiguienteDB" value="Guardar Personal" class="btn btn-success btn-block" onclick="hacer_click_Empleados({{ isset($IdEmpleado)?$IdEmpleado:'0' }})">

							<input type="hidden" id="num_iddb" value="{{ isset($IdEmpleado)?$IdEmpleado:'' }}">

						</div> -->

			</div>

		</div>



		<div class="tab-pane  @if($active_tab=='RegionesxInvestigador') in active @endif" id="RegionesxInvestigador" role="tabpanel" aria-labelledby="nav-contact-tab">

			<div class="container">

				<h4>Cobertura por Investigador</h4>

				<hr>

				<div class="row">

					<div class="col-sm-4">

						<div class="form-group">

							<label for="estados">Estados</label>

							<select name="estados" id="estados" class="form-control form-control-sm">

								<option value="-1">Seleccione un estado</option>

								@foreach ($estados as $item)

									<option value="{{$item->IdEstado}}">{{$item->FK_nombre_estado}}</option>	

								@endforeach

								

							</select>

						</div>

					</div>

				</div>

				<div class="row">



					<div id="TablaRegionesDIV" class="col-sm-4">

						<span>Lista de Municipios</span>

						<table id="TablaMunicipios" class="display table table-striped table-bordered table-responsive">

							<thead>

							<tr>

								<th class="text-center"><input type="checkbox" class="all-selected" id="all-selected" onclick="javascript:checkAll(this)"></th>

								<th style="display: none">IdEstado</th>

								<th style="display: none">IdMunicipio</th>

								<th>Municipio</th>

							</tr>

							</thead>

							<tbody class="sortable" id="tbBody">

							</tbody>

						</table>

					<br>

					<button class="btn btn-success" id="btnAddMunicipio" style="display: none" onclick="movedataTable(event)">Agregar</button>

				</div>



				<div id="TRegSelectDIV" class="col-sm-4">

						<span>Municipios Seleccionados</span>

						<input type="hidden" name="TableMunicipiosSelectV" id="TableMunicipiosSelectV">

						<table id="TableMunicipiosSelect" class="display table table-striped table-bordered table-responsive">

							<thead>

							<tr>

								<th style="display: none">IdEstado</th>

								<th style="display: none">IdMunicipio</th>

								<th>Municipio</th>

								<th class="text-center"><button class="btn btn-sm btn-danger" onclick="removeAllRowTableMunicipiosSelect(event)">Eliminar todo</button></th>

							</tr>

							</thead>

							<tbody class="sortable" id="tbBodyMunicipiosSelect">

							</tbody>

							

						</table>

					

				</div>

				@if ($action == "edit")

				<div class="col-sm-4">

					<span>Municipios Asignados</span>

					<table id="" class="display table table-striped table-bordered table-responsive">

						<thead>

						<tr>

							<th>Estado</th>

							<th>Municipio</th>

							<th></th>

						</tr>

						</thead>

						<tbody class="" id="tbodyMunicipiosAsignados">

							@foreach ($cobertura as $item)

								<tr>

									<td>{{$item->FK_nombre_estado}}</td>

									<td>{{$item->Descripcion}}</td>

									<td><input type="button" class="btn btn-sm btn-danger" onclick="deleteMucipioAsignado({{$item->Id}},{{$item->IdEmpleado}})" value="Eliminar"></td>

								</tr>

							@endforeach

						</tbody>

						

					</table>

				</div>

				@endif



				</div>



			</div>

			<br>

			<br>

			<div class="row">

						<div class="col-md-2 col-sm-4">

							<a class="btn btn-success btn-block back">Anterior</a>

						</div>

						<div class="col-md-2 col-md-offset-8 text-right">

							<button type="submit" name="SiguienteMunicipios" id="saveInformation" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." class="btn btn-success btn-block" onclick="hacer_click_Empleados(event)">Finalizar</button>

							<!-- <button type="submit" name="SiguienteDB" id="saveInformation" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." class="btn btn-success btn-block" onclick="hacer_click_Empleados(event)">Guardar Personal</button> -->

							<input type="hidden" id="num_iddb" value="{{ isset($IdEmpleado)?$IdEmpleado:'' }}">

						</div>

			</div>

		</div>



	<br>





</div>



<!-- Modal -->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-body">

	  	<!-- <div style="clear:both"> -->

           <iframe id="viewer" frameborder="0" scrolling="no" width="565" height="500"></iframe>

        <!-- </div> -->

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>

      </div>

    </div>

  </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>

    $('.phone_with_ddd').mask('000-000-0000');

</script>



</div>