<!-- begin table -->

<li class="table-responsive" xmlns="http://www.w3.org/1999/html">

	{!! Form::token() !!}

    <table class="table table-profile">

        <thead>

            <tr>

               

                    <h4>{{ $nombre_comercial }}

                        <!-- <small>{{ $nombre_comercial}}

                        </small> -->

                    </h4>

               

            </tr>

        </thead>

        <tbody>

        <tr>

            <td class="col-md-2 form-group block1">

                    <div>{{ Form::label('Activo', 'Activo') }}</div>

                

                    <div >

                    <input class="toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"<?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">

                    </div> 

                </td>    



            </tr>

            <!-- <tr>

                <td class="field">Activo</td>

                <td>

                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <input class="toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"<?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">

                    </div> 

                </td>                    

            </tr> -->



            <tr id="NombreComercialtr"> 

                <td class="col-md-4 form-group block1" >

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div>{{ Form::label('Nombre Comercial', '* Nombre Comercial') }}</div>

                        <div>{{ Form::text('nombre_comercial',$nombre_comercial,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'nombre_comercial','data-parsley-group'=>'wizard-step-1','readonly' => 'true'])}}

                        </div>

                </td>



            </tr>	

            <input type="hidden" name="IdModuloAcceso" id="IdModuloAcceso" value="{{ $IdModuloAcceso or '' }}" />

            <tr>

                <td class="col-md-4 form-group block1" >

                    <div>{{ Form::label('Usuario', '* Usuario') }}</div>

                

                	<div >

                        {{ Form::text('username', $username,['class' => 'form-control','id' => 'username','onkeyup' => 'exisus(this)','placeholder' => 'Nombre de usuario','required' => 'required']) }}

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

                    <div>{{ Form::label('Password', '* Password') }}</div>

                

                	<div>

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

                <td class="col-md-4 form-group block1" id="Oficinatr">

                    <div>{{ Form::label('Telefono', '* Telefono') }}</div>

                    

                    <div>

                    {{ Form::text('telefono_oficina', $telefono_oficina,['class' => 'form-control telefono','placeholder' => 'Teléfono','required' => 'required']) }}

                    </div>

                </td>

                <td class="col-md-4 form-group block1" id="Emailtr">

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div>{{ Form::label('Email', '* Email') }}</div>

                        <div>

                            {{ Form::email('email', $email,['class' => 'form-control','id' => 'email','onkeyup' => 'exisem(this)','placeholder' => 'Email']) }}

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



            <!-- <tr class="highlight" id="Puestotr">

                <td class="field">Puesto</td>

                <td>

                

                 

                    <select id="cpuesto" name="cpuesto">



                   



                </select>

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

            </tr> -->



            <!-- <tr>

            <td class="field">Nombre(s)</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 ">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('name', null,['class' => 'form-control','placeholder' => 'Nombre','required' => 'required','minlength' => '3']) }}

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

                    {{ Form::text('apellido_paterno', null,['class' => 'form-control','placeholder' => 'Apellido paterno']) }}

                </div>

            </td>

        </tr>

        <tr>

            <td class="field">Apellido Materno</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('apellido_materno', null,['class' => 'form-control','placeholder' => 'Apellido materno']) }}

                </div>

            </td>

        </tr>      -->

        <!-- <tr>



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

        </tr>  



         <tr>

            <td class="field">Teléfono</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                    {{ Form::text('telefono_oficina', $telefono_oficina,['class' => 'form-control phone_with_ddd','placeholder' => 'Tel. 1','maxlength'=>'10','minlength' => '10']) }}

                </div>

            </td>

        </tr> 

        <tr id="Exttr">

                <td class="field">Ext</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('ext', null,['class' => 'form-control phone_with_ddd','placeholder' => 'Ext(Tel.1)','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

        </tr>

         

        <tr id="Oficina2tr">

                <td class="field">Tel. 2 + Ext</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-phone fa-lg m-r-2"></i></span>

                        {{ Form::text('telefono_oficina2', null,['class' => 'form-control phone_with_ddd','placeholder' => 'Tel. 2 + Ext','maxlength'=>'10','minlength' => '10']) }}

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

                        {{ Form::text('telefono_movil', null,['class' => 'form-control phone_with_ddd','placeholder' => 'Móvil 1','maxlength'=>'15','minlength' => '10']) }}

                    </div>

                </td>

            </tr>



            <tr id="Movil2tr">

                <td class="field">Móvil 2</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>

                        {{ Form::text('telefono_movil2', null,['class' => 'form-control phone_with_ddd','placeholder' => 'Móvil 2','maxlength'=>'10','minlength' => '10']) }}

                    </div>

                </td>

            </tr>



            <tr id="Emailtr">

                <td class="field">Email 1</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>

                        {{ Form::email('email', $email,['class' => 'form-control','placeholder' => 'Email 1']) }}

                        @if($errors->has('email'))

                            <ul class="parsley-errors-list filled" id="parsley-id-1513">

                                <li class="parsley-required">{{ $errors->first('email') }}</li>

                            </ul>

                        @endif

                    </div>

                    

                </td>

            </tr>



            <tr id="Emailtr">

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



            <tr class="highlight" id="Contactotr">

                <td class="field">Contacto Principal</td>

                <td>

                

                 

                    

                </td>

            </tr> -->



            <!-- <tr class="highlight">

                <td class="field">Empresa</td>

                <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>

                        {{ Form::text('Empresa', null,['class' => 'form-control','placeholder' => 'Empresa','required' => 'required']) }}

                    </div>

                </td>



            </tr>

            <tr class="divider">

                <td colspan="2"></td>

            </tr>

                                 

            <tr>

                <td class="field">RFC</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>

                        {{ Form::text('RFC', null,['class' => 'form-control','placeholder' => 'RFC','required' => 'required','maxlength' => '13']) }}

                    </div>

                </td>

            </tr>

            

            <tr>

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

            </tr>

            <tr>

                <td class="field">Razón Social</td>

                <td>

                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                        {{ Form::text('RazonSocial',null,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'RazonSocial','data-parsley-group'=>'wizard-step-1'])}}

                    </div>

                </td>

            </tr> -->

           

           <!-- <td class="field">Código Postal</td>

            <td>

                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">

                    <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>

                    {{ Form::text('CodigoPostal',null,['class' => 'form-control','id'=>'CodigoPostal','data-parsley-group'=>'wizard-step-1','maxlength'=>'', 'placeholder'=>'Código Postal'])}}



                    <div class="input-group-btn">

                        <input value="&#xe003" class=" btn btn-primary btn-block glyphicon glyphicon-search" type="submit" name="Buscar">

                    </div>

                </div>



            </td>

        </tr>-->

       

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