<!---------------------------------------- BEGIN DATOS DE PROSPECTO ----------------------------------------------  -->



<!-- begin wizard step-1 -->

<div class="wizard-step-1">

	<fieldset>

		<legend class="pull-left width-full">Datos Prospectos </legend>

		<font size="1">Nota: (Los campos marcados con * son obligatorios para prospecto )</font>

		<p>



			<!-- begin row 1 -->

			<div class="row">

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group block1">

						<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

						<label>{{ Form::label('Nombre Comercial', '* Nombre Comercial') }}</label>



						{{ Form::text('nombre_comercial',$nombre_comercial,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'nombre_comercial','data-parsley-group'=>'wizard-step-1'])}}





					</div>

				</div>

				<!-- end col-4 -->

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group">





						<label>{{ Form::label('Forma Juridica', ' Forma Juridica') }}</label>



						<!-- {{ Form::select('forma_juridica',[''=>'Selecciona una opci&oacute;n','1'=>'Persona Fisica','2'=>'Persona Moral'],null,['class'=>'form-control','data-parsley-group'=>'wizard-step-1','data-size'=>'10','id'=>'forma_juridica']) }} -->

						

                          <select id="forma_juridica" name="forma_juridica" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="1" value="1">Persona Fisica</option>

                            <option id="2" value="2">Persona Moral</option>

                          </select>





					</div>

				</div>

				<!-- end col-4 -->

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group pm" style="display:none">

						<label>{{ Form::label('Razon Social', ' Razon Social') }}</label>

						{{ Form::text('razon_social',$razon_social,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'razon_social','data-parsley-group'=>'wizard-step-1'])}}

					</div>

					<div class="form-group pf" style="display:none" id="curp-nombre">

						<label>{{ Form::label('Nombre',' Nombre') }}</label>

						{{ Form::text('nombre',$nombre,['class' => 'form-control','placeholder'=>'Arturo','id'=>'nombre','data-parsley-group'=>'wizard-step-1'])}}





					</div>

				</div>

				<!-- end col-4 -->

			</div>

			<!-- end row 1-->

			<!-- begin row 2-->

			<div class="row pf" style="display:none">

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group block1" id="curp-apellido_paterno">

						<label>{{ Form::label('Apellido Paterno', ' Apellido Paterno') }}</label>

						{{ Form::text('apellido_paterno',$apellido_paterno,['class' => 'form-control','placeholder'=>'Gonzalez','id'=>'apellido_paterno','data-parsley-group'=>'wizard-step-1'])}}





					</div>

				</div>

				<!-- end col-4 -->

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group" id="curp-nombre">



						<label>{{ Form::label('Apellido Materno', 'Apellido Materno') }}</label>

						{{ Form::text('apellido_materno',$apellido_materno,['class' => 'form-control','placeholder'=>'Tapia','id'=>'apellido_materno','data-parsley-group'=>'wizard-step-1'])}}





					</div>

				</div>

				<!-- end col-4 -->

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group" id="curp-genero">

						<label>{{ Form::label('Genero', 'Genero') }}</label><br>

						<!-- {{ Form::select('genero',[''=>'Selecciona una opci&oacute;n','H'=>'Masculino','M'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'genero']) }} -->

						<select id="genero" name="genero" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="H" value="H">Masculino</option>

                            <option id="M" value="M">Femenino</option>

                          </select>

					</div>

					<!-- end col-4 -->

				</div>

			</div>

			<div class="row pm" style="display:none">

				<div class="col-md-4">

					<div class="form-group">

						<label>Fecha de Constitución</label><br>





						{{ Form::date('fecha_constitucion',$fecha_constitucion,['class' => 'form-control','id'=>'fecha_constitucion','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}

					</div>

				</div>



			</div>



			<!-- end row 2-->

			<div class="row pf" style="display:none">

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group block1" id="curp-fec_nacimiento">

						<label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>

						{{ Form::date('fecha_nacimiento_pros',$fecha_nacimiento_pros,['class' => 'form-control','id'=>'fecha_nacimiento_pros','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}





					</div>

				</div>

				<!-- end col-4 -->

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group" id="curp-lugar_nacimiento">



						<label>{{ Form::label('Lugar de Nacimiento', 'Lugar de Nacimiento') }}</label>

						{{ Form::select('lugar_nacimiento',$lugar_nacimiento,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'lugar_nacimiento']) }}





					</div>

				</div>

				<!-- end col-4 -->

				<!-- begin col-4 -->

				<div class="col-md-4">

					<div class="form-group">

						<label>{{ Form::label('CURP', 'CURP') }}</label>

						{{ Form::text('curp',$curp,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'curp','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}

					</div>

				</div>

				<!-- end col-4 -->

			</div>

			<!-- end row 2-->

			<!-- Begin row 3-->

			<div class="row">

				<!-- begin col-1 -->

				<div class="col-md-4">

					<div class="form-group pm" style="display:none">



						<label>{{ Form::label('CLASE DE PM', 'Clase de PM') }}</label>

						{{ Form::select('clase_pm',[''=>'Selecciona una opci&oacute;n','1'=>'SA','2'=>'S.A de C.V','3'=>' S. de RL de CV','4'=>'SC','5'=>'AC'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'clase_pm']) }}

					</div>



					<div class="form-group">

						<label>{{ Form::label('RFC ', ' RFC') }}</label>

						{{ Form::text('rfc',$rfc,['class' => 'form-control','placeholder'=>'CUPU800825569','id'=>'rfc','data-parsley-group'=>'wizard-step-1','maxlength'=>'13'])}}

					</div>





				</div>

				<!-- end col-1 -->

				<!-- begin col-2-->

				<div class="col-md-4">



					<div class="form-group">

						<label>{{ Form::label('Actividad Economica', 'Actividad Ecónomica') }}</label>



						{{ Form::select('actividad_economica',$actividad_economica,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'actividad_economica']) }}





					</div>



				</div>

				<!-- end col-2 -->

				<!-- begin col-3 -->

				<div class="col-md-4">

					<div class="form-group block1">

						<label>{{ Form::label('Status', 'Status') }}</label>

						

						{{ Form::select('status',['1'=>'Activo','2'=>'Inactivo'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'status']) }}





					</div>



				</div>

				<!-- end col-3 -->



			</div><!-- end row 3-->

			<!-- Begin row 3-->

			<div class="row">

				<div class="col-md-4">

					<div class="form-group block1">



						<label>{{ Form::label('Clase RT', 'Clase RT') }}</label>

						  <select id="registro_patronal" name="registro_patronal" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="1" value="1">Clase I</option>

                            <option id="2" value="2">Clase II</option>

							<option id="3" value="3">Clase III</option>

							<option id="4" value="4">Clase IV</option>

							<option id="5" value="5">Clase V</option>

                          </select>

						</div>

				</div>

				<div class="col-md-4">

					<div class="form-group block1">



						<label>{{ Form::label('Registro Patronal', 'Registro Patronal') }}</label>

						{{ Form::text('registro_p',$registro_p,['class' => 'form-control','placeholder'=>'','id'=>'registro_p','data-parsley-group'=>'wizard-step-1','maxlength'=>'11'])}}



					</div>

				</div>

			</div>

			<!-- end row -->



	</fieldset>

</div>

<!-- end wizard step-1 -->

<!---------------------------------------- END DATOS DE PROSPECTO ----------------------------------------------  -->

<!---------------------------------------- BEGIN DATOS DIRECCIÓN FISCAL ----------------------------------------------  -->

<!-- begin wizard step-2 -->

<div class="wizard-step-2">

	<fieldset>

		<legend class="pull-left width-full">Dirección Fiscal</legend>

		<!-- begin row 1-->

		<div class="row">

			<!-- begin col-1 -->

			<div class="col-md-4">

				<form>

					{{ csrf_field() }}

					<div class="form-group">

						<label>{{ Form::label('Código Postal', 'Código Postal') }}</label>





						<div class="input-group">

							<input type="text" class="form-control" name="cp" value="{{ $cp or '' }}" id="searchcp" placeholder="Buscar CP" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

							<div class="input-group-btn">

								<button type="button" class=" btn btn-primary btn-block glyphicon glyphicon-search" name="Buscar" id="Buscar" onclick="buscarCP(1);"></button>

							</div>

						</div>





					</div>



					<!-- ====================* FORMULARIO *===================> -->

			</div>





			<div class="col-md-2">



				<div class="form-group">

					<label>{{ Form::label('Estado', 'Estado') }}</label>





					<input type="text" class="form-control" id="estadoF" name="estado" value="{{ $State or '' }}" placeholder="Estado" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

					<input type="hidden" name="IdEstado" id="IdEstadoF" value="{{ $IdState or '' }}">

					<input type="hidden" name="IdPais" id="IdPaisF" value="{{ $IdPais or '' }}">

					<input type="hidden" name="IdCodigoPostal" id="IdCodigoPostal" value="">

					<input type="hidden" name="Localidad" value="{{ $Localidad or '' }}">

				</div>



			</div>



			<div class="col-md-2">

				<div class="form-group">

					<label>{{ Form::label('Municipio', ' Municipio') }}</label>





					<input type="text" class="form-control" id="municipioF" name="municipio" value="{{ $municipio or '' }}" placeholder="Municipio" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />





				</div>

			</div>





			<div class="col-md-4">



				<div class="form-group">





					<label>{{ Form::label('Colonia', 'Colonia') }}</label>

					<select class="form-control" name="colonia" id="colonia">

					@foreach(explode(';',$Colonia) as $row)

						<option value="{{ $row }}">{{ $row }}</option>

						@endforeach

					</select>

				</div>



			</div>





		</div>

		<!-- end row 1-->

		<!-- begin row 2 -->

		<div class="row">



			<!-- end col-1 -->

			<!-- begin col-2 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Calle', 'Calle') }}</label>

					{{ Form::text('df_calle',$df_calle,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'df_calle','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

				</div>

			</div>

			<!-- end col-2 -->

			<!-- begin col-3 -->

			<div class="col-md-2">

				<div class="form-group">

					<label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>

					{{ Form::text('df_num_exterior',$df_num_exterior,['class' => 'form-control','placeholder'=>'E12','id'=>'df_num_exterior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

				</div>

			</div>

			<!-- end col-3 -->

			<!-- begin col-4 -->

			<div class="col-md-2">

				<div class="form-group">

					<label>{{ Form::label('N° Interior', 'N° Interior') }}</label>

					{{ Form::text('df_num_interior',$df_num_interior,['class' => 'form-control','placeholder'=>'99','id'=>'df_num_interior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

				</div>

			</div>

			<!-- end col-4 -->



		</div>

		<!-- end row 2 -->



	</fieldset>

</div>

<!-- end wizard step-2 -->



<!---------------------------------------- END DATOS DE PROSPECTO DIRECCION FISCAL ----------------------------------------------  -->

<!---------------------------------------- BEGIN  DATOS DE PROSPECTO DIRECCION COMERCIAL ----------------------------------------------  -->

<!-- begin wizard step-3 -->

<div class="wizard-step-3">



	<fieldset>

		<legend class="pull-left width-full">Dirección Comercial</legend>



		<!-- begin row 1-->

		<div class="row">

			<!-- begin col-1 -->

			<div class="col-md-4">





				<div class="form-group">

					<label>{{ Form::label('Código Postal', 'Código Postal') }}</label>





					<div class="input-group">

						<input type="text" class="form-control" name="cp_dc" id="cp_dc" value="{{ $cp_dc or '' }}" placeholder="Buscar CP" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

						<div class="input-group-btn">

							<button type="button" class=" btn btn-primary btn-block glyphicon glyphicon-search" name="Buscar" id="Buscar_dc" onclick="buscarCP(2);"></button>

						</div>

					</div>





				</div>



				<!-- ====================* FORMULARIO *===================> -->

			</div>





			<div class="col-md-2">



				<div class="form-group">

					<label>{{ Form::label('Estado', 'Estado') }}</label>





					<input type="text" class="form-control" id="estado_dc" name="estado_dc" value="{{ $State_dc or '' }}" placeholder="Estado" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

					<input type="hidden" name="IdEstado_dc" id="IdEstado_dc" value="{{ $IdState_dc or '' }}">

					<input type="hidden" name="IdPais_dc" id="IdPais_dc" value="{{ $IdPais_dc or '' }}">

					<input type="hidden" name="Localidad_dc" value="{{ $Localidad_dc or '' }}">

				</div>



			</div>



			<div class="col-md-2">

				<div class="form-group">

					<label>{{ Form::label('Municipio', ' Municipio') }}</label>





					<input type="text" class="form-control" id="municipioC" name="Municipio_dc" value="{{ $Municipio_dc or '' }}" placeholder="Municipio" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />





				</div>

			</div>





			<div class="col-md-4">



				<div class="form-group">





					<label>{{ Form::label('Colonia', 'Colonia') }}</label>

					<select class="form-control" name="colonia_dc" id="colonia_dc">

                               

						@foreach(explode(';',$Colonia_dc) as $row_dc)

						<option value="{{ $row_dc }}">{{ $row_dc }}</option>

						@endforeach

                    </select>

					

				</div>



			</div>





		</div>

		<!-- end row 1-->

		<!-- begin row 2 -->

		<div class="row">



			<!-- end col-1 -->

			<!-- begin col-2 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Calle', 'Calle') }}</label>

					{{ Form::text('Calle_dc',$Calle_dc,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'Calle_dc','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

				</div>

			</div>

			<!-- end col-2 -->

			<!-- begin col-3 -->

			<div class="col-md-2">

				<div class="form-group">

					<label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>

					{{ Form::text('NoExt_dc',$NoExt_dc,['class' => 'form-control','placeholder'=>'E12','id'=>'NoExt_dc','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

				</div>

			</div>

			<!-- end col-3 -->

			<!-- begin col-4 -->

			<div class="col-md-2">

				<div class="form-group">

					<label>{{ Form::label('N° Interior', 'N° Interior') }}</label>

					{{ Form::text('NoInt_dc',$NoInt_dc,['class' => 'form-control','placeholder'=>'99','id'=>'NoInt_dc','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

				</div>

			</div>

			<!-- end col-4 -->



		</div>

		<!-- end row -->



	</fieldset>

</div>

<!-- end wizard step-3 -->

<!---------------------------------------- BEGIN  DATOS DE PROSPECTO DIRECCION COMERCIAL ----------------------------------------------  -->

<!---------------------------------------- BEGIN  DATOS DE Contácto ----------------------------------------------  -->





<!-- begin wizard step-4 -->

<div class="wizard-step-3">

	<fieldset>

		<legend class="pull-left width-full">Contacto</legend>

		{{-- <div class="text-left  ">

			<!-- <a class="btn btn-warning btn-icon btn-circle btn-lg" id="add-contact"><i class="fa fa-plus"></i></a> -->

		</div> --}}

		<hr>

		<div id="container-contacto">

			<div id="principal-contacto">

				<div class="row">

					<div class="col-md-3 col-md-offset-9">

						<div class="form-group">

						



						</div>

					</div>

				</div>

				<div class="row">

					<!-- begin col-4 -->

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Nombre', '* Nombre') }}</label>

							{{ Form::text('nombre_con',$nombre_con,['class' => 'form-control','id'=>'nombre_con','placeholder'=>'Edgar','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

							</div>

					</div>

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Apellido Paterno', '* Apellido Paterno') }}</label>

							{{ Form::text('apellido_paterno_con',$apellido_paterno_con,['class' => 'form-control contact-name','id'=>'apellido_paterno_con','placeholder'=>'Edgar','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

						</div>

					</div>

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Apellido Materno', '* Apellido Materno') }}</label>

							{{ Form::text('apellido_materno_con',$apellido_materno_con,['class' => 'form-control contact-name','id'=>'apellido_materno_con','placeholder'=>'Edgar','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

						</div>

					</div>

					

				</div>

				<div class="row">

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('username', '* Usuario') }}</label>

							<!-- <input name="username" type="text" class="form-control contact-name" id="username" data-parsley-group="wizard-step-3" required onblur="users();" /><br /> -->

							{{ Form::text('username', $username,['class' => 'form-control contact-name','id' => 'username','data-parsley-group'=>'wizard-step-3','onblur' => 'users();','placeholder' => 'Nombre de usuario','required' => 'required']) }}

							<div id="alerta"></div>

						</div>

					</div>

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('password', '* Contraseña') }}</label>

							<!-- <input name="password" type="password" class="form-control contact-name" id="Password" data-parsley-group="wizard-step-3" required /><br /> -->

							{{ Form::text('password', isset($password)?$password:null,['class' => 'form-control contact-name','placeholder' => 'Password','data-parsley-group'=>'wizard-step-3','required' => 'required']) }}

						</div>

					</div>

					<!-- end col-4 -->

					<!-- begin col-4 -->

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Cargo', 'Cargo') }}</label>

							{{ Form::text('cargo',$cargo,['class' => 'form-control','placeholder'=>'Lider','id'=>'cargo','data-parsley-group'=>'wizard-step-4','maxlength'=>''])}}

						</div>

					</div>



					

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Genero', 'Género') }}</label>

							<!-- {{ Form::select('genero_con',[''=>'Selecciona una opci&oacute;n','1'=>'Masculino','2'=>'Femenino'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'genero_con']) }} -->

							<select id="genero_con" name="genero_con" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="1" value="1">Masculino</option>

                            <option id="2" value="2">Femenino</option>

                          </select>

					</div>

						</div>

					</div>

					<!-- end col-6 -->

				</div>

				<!-- end row1 -->

				<!-- begin row 2-->

				<div class="row">

					<!-- begin col-1 -->

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>

							{{ Form::date('fecha_nacimiento_con',$fecha_nacimiento_con,['class' => 'form-control','placeholder'=>'Sistemas','id'=>'fecha_nacimiento_con','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

						</div>

					</div>

					<!-- endcol-1 -->

					<!-- begin col-2 -->

					<div class="col-md-2">

						<div class="form-group">

							<label>{{ Form::label('telefono1', '* Teléfono 1') }}</label>

							{{ Form::text('telefono1',$telefono1,['class' => 'form-control phone_with_ddd','placeholder'=>'587-020-9993','id'=>'telefono1','data-parsley-group'=>'wizard-step-3','maxlength'=>'10','onblur'=>'sizeTelefonos(this)'])}}

						</div>

					</div>

					<!-- end col-2 -->

					<!-- begin col-3 -->

					<div class="col-md-1">

						<div class="form-group">

							<label>{{ Form::label('Extensión', 'Extensión') }}</label>

							{{ Form::text('ext1',$ext1,['class' => 'form-control ext1','placeholder'=>'140','id'=>'ext1','data-parsley-group'=>'wizard-step-3','maxlength'=>'5'])}}

						</div>

					</div>

					<!-- end col-3 -->

					<!-- begin col-4 -->

					<div class="col-md-2">

						<div class="form-group">

							<label>{{ Form::label('telefono2', 'Teléfono 2') }}</label>

							{{ Form::text('telefono2',$telefono2,['class' => 'form-control phone_with_ddd','placeholder'=>'58702093','id'=>'telefono2','data-parsley-group'=>'wizard-step-3','maxlength'=>'10','onblur'=>'sizeTelefonos(this)'])}}

						</div>

					</div>

					<!-- end col-4 -->

					<!-- begin col-5 -->

					<div class="col-md-1">

						<div class="form-group">

							<label>{{ Form::label('Extensión', 'Extensión') }}</label>

							{{ Form::text('ext2',$ext2,['class' => 'form-control ext2','placeholder'=>'140','id'=>'ext2','data-parsley-group'=>'wizard-step-3','maxlength'=>'5'])}}

						</div>

					</div>

					<!-- end col-5 -->

				</div>

				<!--  end row 2 -->

				<!-- begin row 3-->

				<div class="row">

					<!-- begin col-1 -->

					<div class="col-md-2">

						<div class="form-group">

							<label>{{ Form::label('Celular 1', 'Celular 1') }}</label>

							{{ Form::text('celular1',$celular1,['class' => 'form-control celular1','placeholder'=>'5589631475','id'=>'celular1','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

						</div>

					</div>

					<!-- endcol-2 -->

					<!-- begin col-1 -->

					<div class="col-md-1">

						<div class="form-group">



						</div>

					</div>

					<!-- endcol-2 -->

					<!-- begin col-3 -->

					<div class="col-md-2">

						<div class="form-group">

							<label>{{ Form::label('Celular 2', 'Celular 2') }}</label>

							{{ Form::text('celular2',$celular2,['class' => 'form-control celular2','placeholder'=>'5589631475','id'=>'celular2','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

						</div>

					</div>

					<!-- endcol-3 -->

					<!-- begin col-4 -->

					<div class="col-md-1">

						<div class="form-group">



						</div>

					</div>

					<!-- endcol-4 -->

					<!-- begin col-5 -->

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Correo 1', '* Correo 1') }}</label>

							{{ Form::text('correo1',$correo1,['class' => 'form-control','placeholder'=>'email@domain.com','id'=>'correo1','data-parsley-group'=>'wizard-step-3','onblur'=>'validarEmail(this);emails();'])}}

							<div id="alertaE"></div>

						</div>

					</div>

					<!-- endcol-5 -->

					<!-- begin col-5 -->

					<div class="col-md-3">

						<div class="form-group">

							<label>{{ Form::label('Correo 2', 'Correo 2') }}</label>

							{{ Form::text('correo2',$correo2,['class' => 'form-control','placeholder'=>'email@domain.com','id'=>'correo2','data-parsley-group'=>'wizard-step-3','onblur'=>'validarEmail(this)'])}}



						</div>

					</div>

					<!-- endcol-5 -->



				

				<!-- end row 3 -->

				<!-- begin row 4

                                                  <div class="row">-->

				<!-- begin col-1 -->

				<!-- <div class="col-md-3">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Página web', 'Página Web') }}</label>

                                                            {{ Form::text('pagina_web[]',null,['class' => 'form-control','placeholder'=>'http://www.test.domain.com','id'=>'pagina_web','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}



                                                        </div>

                                                    </div> -->

				<!-- end col-1 -->





				<!-- </div> begin row 4 -->

			</div>

		</div><!-- contenedor contacto -->

	</fieldset>

</div>

<!-- end wizard step-4 -->

<!---------------------------------------- END DATOS DE Contácto ----------------------------------------------  -->

<!---------------------------------------- bGEGIN DATOS DE SEGUIMIENTO DE VENTA ----------------------------------------------  -->

<!-- begin wizard step-5 -->

<div class="wizard-step-3">

	<fieldset>

		<legend class="pull-left width-full">Seguimiento de venta</legend>

		<!-- begin row -->

		<div class="row">

			<!-- begin col-4 -->

			<div class="col-md-4">

				<div class="form-group">



					<label>{{ Form::label('Medio de Contácto', ' Medio de Contácto') }}</label>

					<!-- {{ Form::select('medio_contacto',[''=>'Selecciona una opci&oacute;n','Directorio'=>'Directorio','Evento'=>'Evento','3'=>'Página web','Mail'=>'Mail','Recomendación'=>'Recomendación','Sección Amarilla'=>'Sección amarilla','Teléfono'=>'Teléfono'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'medio_contacto']) }} -->

					<select id="medio_contactoc" name="medio_contactoc" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="Directorio" value="Directorio">Directorio</option>

                            <option id="Evento" value="Evento">Evento</option>

							<option id="Página web" value="Página web">Página web</option>

                            <option id="Mail" value="Mail">Mail</option>

                            <option id="Recomendación" value="Recomendación">Recomendación</option>

							<option id="Sección amarilla" value="Sección amarilla">Sección amarilla</option>

                            <option id="Teléfono" value="Teléfono">Teléfono</option>

                          </select>											



				</div>

			</div>

			<!-- end col-4 -->

			<!-- begin col-4 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Tipo de cliente', 'Tipo de cliente') }}</label>

					{{ Form::select('tipo_cliente',$tipo_cliente_lista,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'tipo_cliente']) }}

						

				</div>

			</div>

			<!-- end col-4 -->

			<!-- begin col-4 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Comentario', 'Comentario') }}</label>

					{{ Form::textarea('comentario', $comentario, ['class' => 'form-control','id' => 'comentario','size' => '30x5']) }}





				</div>

			</div>

			<!-- end col-6 -->

		</div>

		<!-- end row -->

		<!-- GEBIN ROW 2 -->

		<div class="row" style="display: none;">

			<!-- begin col-1 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Contrato a', '* Contrato a') }}</label>

					<!-- {{ Form::select('contrato_a',[''=>'Selecciona una opci&oacute;n','1'=>'PSCC','2'=>'Admon TH','3'=>'Capacitando','4'=>'Human DEV','5'=>'ARCADIA'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'contrato_a']) }} -->

					<select id="contrato_a" name="contrato_a" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="1" value="1">PSCC</option>

                            <option id="2" value="2">Admon</option>

							<option id="3" value="3">Capacitando</option>

                            <option id="4" value="4">Human DEV</option>

                            <option id="5" value="5">ARCADIA</option>

                          </select>			

				</div>

			</div>

			<!-- end col-2 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Clientes Asignado a', '* Cliente asignado a') }}</label>

					{{ Form::select('id_cn',$cn,null,['class'=>'default-select2 form-control input-lg','data-parsley-group'=>'wizard-step-1','id'=>'id_cn','style'=>'width: 100%']) }}

				</div>

			</div>

			<!-- end col-2-->

			<!-- end col-2 -->

			<div class="col-md-4">

				<div class="form-group">

					<label>{{ Form::label('Nombre del ejecutivo', '* Nombre del ejecutivo') }}

					</label>



					<select name="id_ejecutivo" class="default-select2 form-control input-lg" data-live-search='true' data-parsley-group='wizard-step-1' data-style='btn-white' data-size='10' id='id_ejecutivo' style='width: 100%'>



					</select>



				</div>

			</div>



			<!-- end col-2-->

		</div>

		<!--END ROW 2 -->

	</fieldset>

</div>

<!-- end wizard step-5 -->

<!---------------------------------------- END DATOS DE SEGUIMIENTO DE VENTA ----------------------------------------------  -->

<!---------------------------------------- begin  DATOS BANCARIOS ----------------------------------------------  -->

<!-- begin wizard step-6 -->

<div class="wizard-step-3">

	<fieldset>

		<legend class="pull-left width-full">Datos Bancarios</legend>

		<!-- begin row -->

		<div class="row">

			<!-- begin col-1 -->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('db_Forma de pago', 'Forma de pago') }}</label>

					<!-- {{ Form::select('db_forma_pago',[''=>'Selecciona una opci&oacute;n','1'=>'Cheque','2'=>'Transferencia','3'=>'Efectivo','4'=>'Otro'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'db_forma_pago']) }} -->

					<select id="db_forma_pagoc" name="db_forma_pagoc" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="1" value="1">Cheque</option>

                            <option id="2" value="2">Transferencia</option>

							<option id="3" value="3">Efectivo</option>

                            <option id="4" value="4">Otro</option>

                          </select>		

				</div>

			</div>

			<!-- end col-1-->

			<!-- begin col-2 -->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('Banco', 'Banco') }}</label>



					{{ Form::select('db_banco',$bancos,null,['class'=>'.js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','id'=>'db_banco','style'=>'width: 100%','onkeypress'=>'EnterCp(event)']) }}

						



				</div>

			</div>

			<!-- end col-2 -->

			<!-- begin col-3 -->

			<!--div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('Cuenta', 'Cuenta') }}</label>

                                                        {{ Form::number('db_cuenta',null,['class' => 'form-control input-sm','placeholder'=>'5596317446','id'=>'db_cuenta','data-parsley-group'=>'wizard-step-2','maxlength'=>'10',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

                                                    </div>

                                                </div-->

			<!-- end col-3-->

			<!-- begin col-4-->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('Clabe', 'Clabe') }}</label>

					{{ Form::number('db_clabe',$db_clabe,['class' => 'form-control input-sm','placeholder'=>'369852145632897103','id'=>'db_clabe','data-parsley-group'=>'wizard-step-2','maxlength'=>'18',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

				

				</div>

			</div>

			<!-- end col4 -->

		</div>

		<!-- end row 1-->

		<!-- begin row 2 -->

		<div class="row">

			<!-- begin col-1-->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('Dias Credito', 'Dias Crédito') }}</label>

					<!-- {{ Form::select('db_dias_credito',[''=>'Selecciona una opci&oacute;n','0'=>'0','1'=>'8','2'=>'15','3'=>'30','4'=>'45','5'=>'90'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'db_dias_credito']) }} -->

					<select id="db_dias_credito" name="db_dias_credito" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="0" value="0">0</option>

                            <option id="1" value="1">8</option>

							<option id="2" value="2">15</option>

                            <option id="3" value="3">30</option>

							<option id="4" value="4">45</option>

                            <option id="5" value="5">90</option>

                          </select>		

				</div>

			</div>

			<!-- end col1 -->

			<!-- begin col-2-->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('Limite de  Credito', 'Limite de Crédito') }}</label>

					{{ Form::number('db_limite_credito',$db_limite_credito,['class' => 'form-control input-sm','placeholder'=>'99974','id'=>'db_limite_credito','step'=>'any','data-parsley-group'=>'wizard-step-2','maxlength'=>'12',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

				</div>

			</div>

			<!-- end col-2 -->

			<!-- begin col-3-->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('Cuenta Clientes', 'Cuenta Clientes') }}</label>

					{{ Form::text('db_cta_clientes',$db_cta_clientes,['class' => 'form-control input-sm','placeholder'=>'99974','id'=>'db_cta_clientes','step'=>'any','data-parsley-group'=>'wizard-step-2','maxlength'=>'10',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

				</div>

			</div>

			<!-- end col-3 -->

			<!-- begin col-4-->

			<div class="col-md-3">

				<div class="form-group">

					<label>{{ Form::label('IVA', 'IVA') }}</label>

					<!-- {{ Form::select('db_iva',['-1'=>'Selecciona una opci&oacute;n','0'=>'0%','11'=>'11%','16'=>'16%','1'=>'Excento'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'db_iva']) }} -->

					<select id="db_iva" name="db_iva" class="form-control" type="text">

                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>

                            <option id="0" value="0">0</option>

                            <option id="11" value="11">11%</option>

							<option id="16" value="16">16%</option>

                            <option id="1" value="1">Excento</option>

                          </select>		

				</div>

			</div>

			<!-- end col-4 -->



		</div>

		<!-- end row 2 -->

	</fieldset>

</div>

<!-- end wizard step-6 -->

<!---------------------------------------- END  DATOS BANCARIOS ----------------------------------------------  -->

<!-- begin wizard step-7-->

<div class="wizard-step-3 final">

	<div class="jumbotron m-b-0 text-center">

		<h4>Formulario llenado correctamente</h4>

		<div class="text-center"><i class="fa fa-flag fa-4x fa-border"></i></div>

		

		<!--  End ID_EJECUTIVO.-->

		<div class="row">

			<div class="col-md-3 col-md-offset-8 text-center ">

				<input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-block " onclick="hacer_click_clientes({{ isset($cliente)?$cliente->IdCliente:'0' }})">

			</div>

		</div>



	</div>

</div>

<!-- end wizard step-7 -->

</div>

