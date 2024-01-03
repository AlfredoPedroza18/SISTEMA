<!-- begin table -->

<li class="table-responsive" xmlns="http://www.w3.org/1999/html">

	{!! Form::token() !!}

    <table class="table table-profile">

        <thead>

            <tr>

                <th></th>

                <th>

                    <h4>{{ isset($usuario->Nombre)?$usuario->Nombre:'*' }}

                        <small>{{ isset($usuario->Nombre)?$usuario->Nombre:''

                                 }}

                        </small>

                    </h4>

                </th>

            </tr>

        </thead>

        <tbody>

        

            <tr>

                <td class="col-md-2 form-group block1" id="DatosPtr">

                    <div>{{ Form::label('¿Datos de Clientes existente?', '¿Datos de Clientes existente?') }}</div>

                    <div >

                        <input class="swich toggle-class" name="ActC" type="checkbox" data-onstyle="success"  value="1"

                        <?php echo ($ActC == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="ActC">

                    </div> 

                </td>    



                <input id="valida" name="valida" type="hidden"  value="1">

                <input type="hidden" name="IdModuloAcceso" id="IdModuloAcceso" value="{{ $IdModuloAcceso or '' }}" />

                <td class="col-md-2 form-group block1">

                    <div>{{ Form::label('Activo', 'Activo') }}</div>

                

                    <div >

                    <input class="toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"<?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">

                    </div> 

                </td>    



            </tr>



            <tr id="clientetr"> 

               

                <td class="col-md-4 form-group block1" >

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div>{{ Form::label('Cliente', '* Cliente') }}</div>

                        <div id="cliente">

                            <select required id="cliente" name="cliente" class="form-control" onChange="exiscl(this);">

                             <option value="">Seleccione Cliente</option>

                                @foreach($cliente as $cli)

                                    <option value="{{ $cli->IdCliente }}" @if(old('cli') == $cli->IdCliente) selected @endif> {{ $cli->Nombre }} </option>

                                @endforeach



                            </select>

                        </div>

                        <div class="row">

                        <span class='text-danger' id='msgcl'></span>

                        </div>

                        <div class="row">

                        <span class='text-success' id='msg2cl'></span>

                        </div>

                </td>

            </tr>	



            <tr id="NombreComercialtr"> 

                <td class="col-md-4 form-group block1" >

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div>{{ Form::label('Nombre Comercial', '* Nombre Comercial') }}</div>

                        <div> <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control" placeholder="Empresa S.A de C.V" data-parsley-group="wizard-step-1" value="{{ $nombre_comercial }}">

                        <!-- <div>{{ Form::text('nombre_comercial',$nombre_comercial,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'nombre_comercial','data-parsley-group'=>'wizard-step-1','required' => 'required'])}} -->

                        </div>

                </td>



            </tr>	

            

            <tr>

                <td class="col-md-4 form-group block1" >

                    <div>{{ Form::label('Usuario', '* Usuario') }}</div>

                

                	<div >

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



                <td class="col-md-4 form-group block1" >

                    <div>{{ Form::label('Password', ' Password') }}</div>

                

                	<div>

                   {{ Form::text('password_aux', isset($password)?$password:null,['class' => 'form-control','placeholder' => 'Secreto','required' => 'required']) }}

                        @if($errors->has('password'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('password') }}</li>

                            </ul>

                        @endif

                    </div>

                    

                </td>

            </tr>

            



            <tr> 

                <td class="col-md-4 form-group block1" id="Oficinatr">

                    <div>{{ Form::label('Telefono', '* Telefono ') }}</div>

                    

                    <div>

                    <div> <input type="text" name="telefono_oficina" id="telefono_oficina" class="form-control phone_with_ddd" placeholder="Teléfono">

                    <!-- {{ Form::text('telefono_oficina', null,['class' => 'form-control telefono','placeholder' => 'Tel. 1','id' => 'telefono_oficina','maxlength'=>'10','minlength' => '10','required' => 'required']) }} -->

                    </div>

                </td>

                <td class="col-md-4 form-group block1" id="Emailtr">

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div>{{ Form::label('Email', '* Email') }}</div>

                        <div>

                        <div> <input type="text" name="email" id="email" class="form-control" onkeyup="exisem(this)" placeholder="Email">

                            <!-- {{ Form::email('email', null,['class' => 'form-control','id' => 'email','onkeyup' => 'exisem(this)','placeholder' => 'Email 1','required' => 'required']) }} -->

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

            <!-- <tr id="activotr"> 

                <td class="field">Activo</td>

                <td>

                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <input class="toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"<?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">

                    </div> 

                </td>                    

            </tr> -->



            <!-- <tr  id="clientetr">

                    <td class="field">Cliente</td>

                    <td>

                    <div id="cliente">

                    <select id="cliente" name="cliente">



                        @foreach($cliente as $cli)

                            <option value="{{ $cli->IdCliente }}" @if(old('cli') == $cli->IdCliente) selected @endif> {{ $cli->Nombre }} </option>

                        @endforeach



                    </select>

                    </div>

                    </td>

            </tr> -->



            <!-- <tr id="Puestotr">

                <td class="field">Puesto</td>

                <td>

                

                 

                    <select id="cpuesto" name="cpuesto">



                    @foreach($Cpuestos as $Cpuesto)

                        <option value="{{ $Cpuesto->IdPuesto or ''}}" @if(old('Cpuesto') == $Cpuesto->IdPuesto) selected @endif> {{ $Cpuesto->Nombre or '' }} </option>

                    @endforeach



                </select>

                </td>

            </tr> -->



            <!-- <tr id="Sexotr">

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

            </tr> -->



            <!-- <tr id="Nombretr">

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

            </tr> -->



            <!-- <tr>

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

            </tr>  -->



            <!-- <tr id="Oficinatr">

                <td class="field">Tel. 1</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                        {{ Form::text('telefono_oficina', null,['class' => 'form-control telefono','placeholder' => 'Tel. 1','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

            </tr> 



            <tr id="Exttr">

                <td class="field">Ext(Tel.1)</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                        {{ Form::text('ext', null,['class' => 'form-control telefono','placeholder' => 'Ext(Tel.1)','maxlength'=>'15','minlength' => '10']) }}

                    </div>

                </td>

            </tr>



            <tr id="Oficina2tr">

                <td class="field">Tel. 2 + Ext</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                        {{ Form::text('telefono_oficina2', null,['class' => 'form-control telefono','placeholder' => 'Tel. 2 + Ext','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

            </tr> 



            <tr id="Ext2tr">

                <td class="field">Ext(Tel.2)</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                        {{ Form::text('ext2', null,['class' => 'form-control telefono','placeholder' => 'Ext(Tel.2)','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

            </tr>



            <tr id="Moviltr">

                <td class="field">Móvil 1</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('telefono_movil', null,['class' => 'form-control telefono','placeholder' => 'Móvil 1','maxlength'=>'1','minlength' => '10']) }}

                    </div>

                </td>

            </tr>



            <tr id="Movil2tr">

                <td class="field">Móvil 2</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('telefono_movil2', null,['class' => 'form-control telefono','placeholder' => 'Móvil 2','maxlength'=>'15','minlength' => '10']) }}

                    </div>

                </td>

            </tr> -->



            <!-- <tr id="Emailtr">

                <td class="field">Email 1</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>

                        {{ Form::email('email', null,['class' => 'form-control','id' => 'email','onkeyup' => 'exisem(this)','placeholder' => 'Email 1']) }}

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

            </tr> -->



            <!-- <tr id="Email2tr">

                <td class="field">Email 2</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>

                        {{ Form::email('email2', null,['class' => 'form-control','placeholder' => 'Email 2']) }}

                        @if($errors->has('email'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('email') }}</li>

                            </ul>

                        @endif

                    </div>

                   

                </td>

            </tr>



            <tr  id="Contactotr">

                <td class="field">Contacto Principal</td>

                <td class="col-md-8 col-sm-12 col-xs-12">

                

                 

                    <select id="contacto" name="contacto">



                    @foreach($Contactos as $Cont)

                        <option value="{{ $Cont->id or ''}}" @if(old('Cont') == $Cont->id) selected @endif> {{ $Cont->nombre_con.' '.$Cont->apellido_paterno_con.' '.$Cont->apellido_materno_con}}  </option>

                    @endforeach



                </select>

                </td>

            </tr> -->

            <!-- <tr >

                <td class="field">Nickname</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 ">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('nick_name', $nick_name,['class' => 'form-control','placeholder' => 'Nickname','required' => 'required','minlength' => '3']) }}

                        @if($errors->has('nick_name'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('name') }}</li>

                            </ul>

                        @endif

                    </div>

                </td>

            </tr> -->

                       

            <!-- <tr class="highlight" id="empresatr">

                <td class="field">Empresa</td>

                <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>

                        {{ Form::text('Empresa', null,['class' => 'form-control','placeholder' => 'Empresa']) }}

                    </div>

                </td>



            </tr>

            <tr class="divider">

                <td colspan="2"></td>

            </tr>

                                 

            <tr id="rfctr">

                <td class="field">RFC</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>

                        {{ Form::text('RFC', null,['class' => 'form-control','placeholder' => 'RFC','maxlength' => '13']) }}

                    </div>

                </td>

            </tr> -->

            

            <!-- <tr>

                <td class="field">Nombre</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 ">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('Nombre', null,['class' => 'form-control','placeholder' => 'Nombre','required' => 'required','minlength' => '3']) }}

                        @if($errors->has('Nombre'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('Nombre') }}</li>

                            </ul>

                        @endif

                    </div>

                </td>

            </tr> -->

         

           <!-- <tr id="codigopostaltr">

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

            <tr id="estadotr">

                <td class="field">Estado</td>

                <td>

                    @if (session()->has('success'))

                        @foreach(session()->get('success') as $datos)

                            <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                                <input type="text" class="form-control pull-right" id="Estado" name="Estado" value="{{$datos['Estado']}}"  placeholder="Estado" data-live-search="true"

                                       data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                                       <input type="hidden"  name="IdEstado" value="{{$datos['IdEstado']}}">

                                       <input type="hidden"  name="IdCodigoPostal" value="{{$datos['IdCodigoPostal']}}">

                            </div>

                        @endforeach

                        @else

                        <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                            <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                            <input type="text" class="form-control pull-right" name="Estado"   placeholder="Estado" data-live-search="true"

                                   data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                                   <input type="hidden"  name="IdEstado" value="{{ $IdState or '' }}">

                        </div>

                    @endif

                </td>

            </tr>

            <tr id="municipiotr">

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

                            <input type="text" class="form-control pull-right" name="Municipio"   placeholder="Municipio" data-live-search="true"

                                   data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                        </div>

                    @endif

                </td>

            </tr>

            <tr id="coloniatr">

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

                            <input type="text" class="form-control pull-right" name="Colonia"   placeholder="Colonia" data-live-search="true"

                                   data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />

                        </div>

                    @endif

                </td>

            </tr> -->

            

            

            <!-- <tr>

                <td class="field">NSS</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('NSS',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'NSS','data-parsley-group'=>'wizard-step-1','maxlength'=>'11'])}}

                    </div>

                </td>

            </tr> -->

            <!-- <tr>

                <td class="field">Teléfono Móvil</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('telefono_movil', null,['class' => 'form-control telefono','placeholder' => 'Teléfono móvil','maxlength'=>'15','minlength' => '10']) }}

                    </div>

                </td>

            </tr>

           <tr id="telefonotr">

                <td class="field">Teléfono Fijo</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('Telefono_fijo', null,['class' => 'form-control telefono','placeholder' => 'Teléfono fijo','maxlength'=>'15','minlength' => '10']) }}

                    </div>

                </td>

            </tr>

            <tr id="paginawebtr">

                <td class="field">Página Web</td>

                <td>

                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-5"></i></span>



                            {{ Form::text('Pagina_web',null,['class' => 'form-control','placeholder'=>'http://www.google.com','id'=>'Pagina_web','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>''])}}

                    </div>

                </td>

            </tr>

            <tr id="emailtr">

                <td class="field">Email</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>

                        {{ Form::email('Correo', null,['class' => 'form-control','placeholder' => 'Correo']) }}

                        @if($errors->has('Correo'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('Correo') }}</li>

                            </ul>

                        @endif

                    </div>

                </td>

            </tr> -->

            <!-- <tr class="divider">

                <td colspan="2"></td>

            </tr> -->

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