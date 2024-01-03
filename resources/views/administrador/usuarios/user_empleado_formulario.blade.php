<!-- begin table -->



<li class="table-responsive" xmlns="http://www.w3.org/1999/html">

	{!! Form::token() !!}

    <table class="table table-profile">

        <thead>

            <tr>

                <th></th>

                <th>

                    <h4>{{ isset($usuario->nick_name)?$usuario->nick_name:'*' }}

                        <small>{{ (isset($usuario->name)?$usuario->name:'').' '.

                                  (isset($usuario->apellido_paterno)?$usuario->apellido_paterno:'').' '.

                                  (isset($usuario->apellido_materno)?$usuario->apellido_materno:'') }}

                        </small>

                    </h4>

                </th>

            </tr>

        </thead>

        <tbody>

        <tr id="DatosPtr">

            <td class="field">¿Es empleado?</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <input class="swich toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"

                    <?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">

                </div>

            </td>

            <input type="hidden" name="IdModuloAcceso" id="IdModuloAcceso" value="{{ $IdModuloAcceso or '' }}" />

        </tr>





        <input id="valida" name="valida" type="hidden"  value="1">



				<tr class="highlight" id="empresatr">

                <td class="field">Empresa</td>

                <td>

                <div id="empresas">

                    <select id="empresa" name="empresa">



                        @foreach($empresas as $empresa)

                            <option value="{{ $empresa->IdEmpresa }}" @if(old('empresa') == $empresa->IdEmpresa) selected @endif> {{ $empresa->FK_Titulo}} </option>

                        @endforeach



                    </select>

                </div>

                </td>



            </tr>



        <tr class="highlight " id="personaltr">

            <td class="field">Personal</td>

            <td>

                <div id="personals">

                    <select id="personal" name="personal">



                        {{-- @foreach($personal as $per)

                            <option value="{{ $per->IdPersonal }}" @if(old('per') == $per->IdPersonal) selected @endif> {{ $per->Nombre.' '.$per->APaterno.' '.$per->AMaterno}} </option>

                        @endforeach --}}



                    </select>

                </div>

            </td>

        </tr>



        <tr id="Sexotr">

                <td class="field">Género</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::select('Genero',[''=>'Selecciona una opci&oacute;n','Masculino'=>'Masculino','Femenino'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'Sexo']) }}

                    </div>

                </td>

            </tr>

            <tr id="FechaNactr">

                <td class="field">Fecha Nacimiento</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::date('FechaNacimiento',null,['class' => 'form-control','id'=>'FechaNacimiento','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}

                    </div>

                </td>

            </tr>

            <tr id="Nombretr">

                <td class="field">Nombre(s)</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 ">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('name', null,['class' => 'form-control','placeholder' => 'Nombre','minlength' => '3']) }}

                        @if($errors->has('name'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('name') }}</li>

                            </ul>

                        @endif

                    </div>

                </td>

            </tr>

            <tr id="APaternotr">

                <td class="field">Apellido Paterno</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('apellido_paterno', null,['class' => 'form-control','placeholder' => 'Apellido paterno']) }}

                    </div>

                </td>

            </tr>

            <tr id="AMaternotr">

                <td class="field">Apellido Materno</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('apellido_materno', null,['class' => 'form-control','placeholder' => 'Apellido materno']) }}

                    </div>

                </td>

            </tr>

            <tr>

                <td class="field">Usuario</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-user fa-lg m-r-5"></i></span>

                        {{ Form::text('username', null,['class' => 'form-control','id' => 'username','onkeyup' => 'exisus(this)','placeholder' => 'Nombre de usuario','required' => 'required']) }}

                        @if($errors->has('username'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('username') }}</li>

                            </ul>

                        @endif

                    </div>

                    <div class="row">

                     <span class='text-danger' id='msg'></span>

                    </div>

                    <div class="row">

                     <span class='text-success' id='msg2'></span>

                    </div>

                </td>

            </tr>

            <tr id="Passwordtr">

                <td class="field">Password</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-lock fa-lg m-r-5"></i></span>

                        {{ Form::text('password_aux', isset($password)?$password:null,['class' => 'form-control','placeholder' => 'Secreto','required' => 'required']) }}

                        @if($errors->has('password'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('password') }}</li>

                            </ul>

                        @endif

                    </div>

                </td>

            </tr>

            <tr id="Oficinatr">

                <td class="field">Teléfono</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                        {{ Form::text('telefono_oficina', null,['class' => 'form-control phone_with_ddd','placeholder' => 'Teléfono']) }}

                    </div>

                </td>

            </tr>

            <tr id="Exttr">

                <td class="field">Ext</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('ext', null,['class' => 'form-control telefono','placeholder' => 'Ext','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

            </tr>

            <tr id="Moviltr">

                <td class="field">Móvil</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('telefono_movil', null,['class' => 'form-control phone_with_ddd','placeholder' => 'Móvil']) }}

                    </div>

                </td>

            </tr>



            <tr id="Emailtr">

                <td class="field">Email</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>

                        {{ Form::email('email', null,['class' => 'form-control','id' => 'email','onkeyup' => 'exisem(this)','placeholder' => 'Email']) }}

                        @if($errors->has('email'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('email') }}</li>

                            </ul>

                        @endif

                    </div>

                    <div class="row">

                     <span class='text-danger' id='msge'></span>

                    </div>

                    <div class="row">

                     <span class='text-success' id='msge2'></span>

                    </div>

                </td>

            </tr>

            <tr id="CURPtr">

                <td class="field">CURP</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('Curp',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'Curp','onkeyup' => 'exiscurp(this)','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}

                    </div>

                    <div class="row">

                     <span class='text-danger' id='msgc'></span>

                    </div>

                    <div class="row">

                     <span class='text-success' id='msgc2'></span>

                    </div>

                </td>

            </tr>



<!--









                <tr class="highlight " id="personaltr">

                    <td class="field">Personal</td>

                    <td>

                    <div id="personal">

                    <select id="personal" name="personal">



                        @foreach($personal as $per)

                            <option value="{{ $per->IdPersonal }}" @if(old('per') == $per->IdPersonal) selected @endif> {{ $per->Nombre.' '.$per->APaterno.' '.$per->AMaterno}} </option>

                        @endforeach



                    </select>

                    </div>

                    </td>

                </tr> -->



            <!-- <tr class="divider">

                <td colspan="2"></td>

            </tr> -->

            <!-- <tr>

                <td class="field">Firma</td>

                <td>

                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-bars fa-lg m-r-3"></i></span>

                        {{ Form::file('firma',['class' => 'form-control']) }}

                    </div>

                </td>

            </tr> -->

            <!-- <tr id="CodigoPersonaltr">

                <td class="field">Número</td>

                <td>

                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::number('CodigoPersonal', null,['class' => 'form-control','placeholder' => 'Número']) }}

                    </div>

                </td>

            </tr> -->

            <!-- <tr>

                <td class="field">Nickname</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>

                        {{ Form::text('nick_name', null,['class' => 'form-control','placeholder' => 'Nickname','required' => 'required','minlength' => '5']) }}

                    </div>

                </td>

            </tr> -->







            <!-- <tr id="Sexotr">

                <td class="field">Sexo</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::select('Sexo',[''=>'Selecciona una opci&oacute;n','Masculino'=>'Masculino','Femenino'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'Sexo']) }}

                    </div>

                </td>

            </tr> -->



            <!-- <tr id="CodPostaltr">

                <td class="field">Código Postal</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('CodigoPostal',null,['class' => 'form-control','id'=>'CodigoPostal','data-parsley-group'=>'wizard-step-1','maxlength'=>'', 'placeholder'=>'Código Postal'])}}



                        <div class="input-group-btn">

                            <input value="&#xe003" class=" btn btn-primary btn-block glyphicon glyphicon-search" type="submit" name="Buscar">

                        </div>



                    </div>



                </td>

            </tr>

            <tr id="Estadotr">

                <td class="field">Estado</td>

                <td>

                    @if (session()->has('success'))

                        @foreach(session()->get('success') as $datos)

                            <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                                <input type="text" class="form-control pull-right" id="Estado" name="Estado" value="{{$datos['Estado']}}"  placeholder="Estado" data-live-search="true"

                                       data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                                       <input type="hidden"  name="IdCodigoPostal" value="{{$datos['IdCodigoPostal']}}">

                            </div>

                        @endforeach

                        @else

                        <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                            <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                            <input type="text" class="form-control pull-right" name="Estado"   placeholder="Estado" data-live-search="true"

                                   data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                        </div>

                    @endif

                </td>

            </tr>

            <tr id="Municipiotr">

                <td class="field">Municipio</td>

                <td>

                    @if (session()->has('success'))

                        @foreach(session()->get('success') as $datos)

                            <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                                <input type="text" class="form-control pull-right" id="Municipio" name="Municipio" value="{{$datos['Municipio']}}"  placeholder="Municipio" data-live-search="true"

                                       data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                            </div>

                        @endforeach

                        @else

                        <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                            <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                            <input type="text" class="form-control pull-right" name="Estado"   placeholder="Municipio" data-live-search="true"

                                   data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                        </div>

                    @endif

                </td>

            </tr>

            <tr id="Coloniatr">

                <td class="field">Colonia</td>

                <td>

                    @if (session()->has('success'))

                        @foreach(session()->get('success') as $datos)

                            <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                                <input type="text" class="form-control pull-right" name="Colonia" value="{{$datos['Colonia']}}"  placeholder="Colonia" data-live-search="true"

                                       data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                            </div>

                        @endforeach

                        @else

                        <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                            <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                            <input type="text" class="form-control pull-right" name="Estado"   placeholder="Colonia" data-live-search="true"

                                   data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                        </div>

                    @endif

                </td>

            </tr>

            <tr id="Calletr">

                <td class="field">Calle</td>

                <td>

                            <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                                <input type="text" class="form-control pull-right" id="Calle" name="Calle"  placeholder="Calle" data-live-search="true"

                                       data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                            </div>

                </td>

            </tr>

            <tr id="RFCtr">

                <td class="field">RFC</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('Rfc',null,['class' => 'form-control','placeholder'=>'CUPU800825569','id'=>'Rfc','data-parsley-group'=>'wizard-step-1','maxlength'=>'13'])}}

                    </div>

                </td>

            </tr>

            <tr id="CURPtr">

                <td class="field">CURP</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('Curp',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'Curp','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}

                    </div>

                </td>

            </tr>

            <tr id="NSStr">

                <td class="field">NSS</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('NSS',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'NSS','data-parsley-group'=>'wizard-step-1','maxlength'=>'11'])}}

                    </div>

                </td>

            </tr>

           -->

            <tr class="divider">

                <td colspan="2"></td>

            </tr>

        </tbody>

    </table>

</div>

<div class="form-group">

	<div class="col-md-3 col-md-offset-3">

	<!--	{{ Form::submit('Guardar',['class' => 'btn btn-success btn-block']) }}  --->

        <input type="submit" id="Guardar" name="Guardar" value="Guardar" class="btn btn-success btn-block">





	</div>

</div>

<!-- end table -->

