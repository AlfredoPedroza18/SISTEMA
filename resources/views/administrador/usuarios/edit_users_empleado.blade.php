<!-- begin table -->

<div class="table-responsive" xmlns="http://www.w3.org/1999/html">

    {!! Form::token() !!}

    <table class="table table-profile">

        <thead>

        <tr>

            <th></th>

            <th>

                <h4>{{ $nick_name}}

                    <small>{{ $name.' '.

                                  $apellido_paterno.' '.

                                  $apellido_materno }}

                    </small>

                </h4>

            </th>

        </tr>

        </thead>

        <tbody>

        <tr class="highlight" id="empresatr">

                <td class="field">Empresa</td>

                <td>

                <div id="empresa">

                    <select id="empresa" name="empresa">



                        @foreach($empresas as $empresa)

                            <option value="{{ $empresa->IdEmpresa }}" @if(old('empresa') == $empresa->IdEmpresa) selected @endif> {{ $empresa->FK_Titulo}} </option>

                        @endforeach



                    </select>

                </div>

                </td>



            </tr>

            <input type="hidden" name="IdModuloAcceso" id="IdModuloAcceso" value="{{ $IdModuloAcceso or '' }}" />

        <tr id="Sexotr">

                <td class="field">Género</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::select('Genero',[''=>'Selecciona una opci&oacute;n','Masculino'=>'Masculino','Femenino'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'Genero']) }}

                    </div>

                </td>

            </tr>

            <tr>

            <td class="field">Fecha Nacimiento</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::date('FechaNacimiento',$FechaNacimiento,['class' => 'form-control','id'=>'FechaNacimiento','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}

                </div>

            </td>

        </tr>     

        <tr>

            <td class="field">Nombre(s)</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 ">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('name', $name,['class' => 'form-control','placeholder' => 'Nombre','required' => 'required','minlength' => '3']) }}

                    @if($errors->has('name'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('name') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Apellido Paterno</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('apellido_paterno', $apellido_paterno,['class' => 'form-control','placeholder' => 'Apellido paterno']) }}

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Apellido Materno</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('apellido_materno', $apellido_materno,['class' => 'form-control','placeholder' => 'Apellido materno']) }}

                </div>

            </td>

        </tr>     

        <tr>

            <td class="field">Usuario</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-user fa-lg m-r-5"></i></span>

                    {{ Form::text('username', $username,['class' => 'form-control','placeholder' => 'Nombre de usuario','required' => 'required']) }}

                    @if($errors->has('username'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('username') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Password</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-lock fa-lg m-r-5"></i></span>

                    {{ Form::text('password_aux', $password_aux,['class' => 'form-control','placeholder' => 'Secreto','required' => 'required']) }}

                    @if($errors->has('password'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('password') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr>  

        <tr>

            <td class="field">Teléfono</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                    {{ Form::text('telefono_oficina', $telefono_oficina,['class' => 'form-control phone_with_ddd','placeholder' => 'Teléfono']) }}

                </div>

            </td>

        </tr> 

        <tr id="Exttr">

                <td class="field">Ext</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('ext', $ext,['class' => 'form-control telefono','placeholder' => 'Ext','required' => 'required','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

            </tr>

            <tr>

            <td class="field">Móvil</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                    {{ Form::text('telefono_movil', $telefono_movil,['class' => 'form-control phone_with_ddd','placeholder' => 'Teléfono móvil']) }}

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Email</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>

                    {{ Form::email('email', $email,['class' => 'form-control','placeholder' => 'Email']) }}

                    @if($errors->has('email'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('email') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">CURP</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('Curp',$Curp,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'Curp','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}

                </div>

            </td>

        </tr>

        <!-- 

        <tr class="highlight">

            <td class="field">Empresa</td>

            <td>

                <select id="empresa" name="empresa">



                    @foreach($empresas as $empresa)

                        <option value="{{ $empresa->IdEmpresa }}" @if(old('empresa') == $empresa->IdEmpresa) selected @endif> {{ $empresa->FK_Titulo }} </option>

                    @endforeach



                </select>

            </td>

        </tr>

        <tr class="divider">

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

        <!-- 

        <tr>

            <td class="field">Nickname</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>

                    {{ Form::text('nick_name', $nick_name,['class' => 'form-control','placeholder' => 'Nickname','required' => 'required','minlength' => '5']) }}

                </div>

            </td>

        </tr> -->

        <!-- <tr>

            <td class="field">Usuario</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-user fa-lg m-r-5"></i></span>

                    {{ Form::text('username', $username,['class' => 'form-control','placeholder' => 'Nombre de usuario','required' => 'required']) }}

                    @if($errors->has('username'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('username') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Password</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-lock fa-lg m-r-5"></i></span>

                    {{ Form::text('password_aux', $password_aux,['class' => 'form-control','placeholder' => 'Secreto','required' => 'required']) }}

                    @if($errors->has('password'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('password') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr> -->

        <!-- <tr>

            <td class="field">Nombre</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 ">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('name', $name,['class' => 'form-control','placeholder' => 'Nombre','required' => 'required','minlength' => '3']) }}

                    @if($errors->has('name'))

                        <ul class="parsley-errors-list filled" id="parsley-id-1513">

                            <li class="parsley-required">{{ $errors->first('name') }}</li>

                        </ul>

                    @endif

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Apellido Paterno</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('apellido_paterno', $apellido_paterno,['class' => 'form-control','placeholder' => 'Apellido paterno']) }}

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Apellido Materno</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('apellido_materno', $apellido_materno,['class' => 'form-control','placeholder' => 'Apellido materno']) }}

                </div>

            </td>

        </tr> -->

       

        <!-- <tr>

            <td class="field">Fecha Nacimiento</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::date('FechaNacimiento',$FechaNacimiento,['class' => 'form-control','id'=>'FechaNacimiento','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}

                </div>

            </td>

        </tr> -->

       

        

        <tr class="divider">

            <td colspan="2"></td>

        </tr>

        </tbody>

    </table>

    </div>

    <div class="form-group">

        <div class="col-md-3 col-md-offset-3">

        <!--	{{ Form::submit('Guardar',['class' => 'btn btn-success btn-block']) }}  --->

            <input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-block">





        </div>

    </div>

    <!-- end table -->