<!-- begin table -->
<div class="table-responsive">
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
            <tr class="highlight">
                <td class="field">Departamento</td>
                <td>
                	<select class="form-control input-inline input-xs" name="idcn">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ $departamento->id == $cn_usuario?'selected="selected"': '' }}>
                                {{ $departamento->nomenclatura }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr class="highlight">
                <td class="field">Puesto</td>
                <td>
                	<select class="form-control input-inline input-xs" name="puesto">
                        @foreach($puestos as $puesto)
                            <option value="{{ $puesto->id }}"  {{ $puesto->id == $rol_usuario?'selected="selected"': '' }}>
                                {{ $puesto->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr>
                <td class="field">Firma</td>
                <td>
                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-bars fa-lg m-r-3"></i></span>
                        {{ Form::file('firma',['class' => 'form-control']) }}
                    </div>
                </td>
            </tr>					                                        
            <tr>
                <td class="field">Nickname</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>
                        {{ Form::text('nick_name', null,['class' => 'form-control','placeholder' => 'Nombre de usuario','required' => 'required','minlength' => '5']) }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="field">Usuario</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg m-r-5"></i></span>
                        {{ Form::text('username', null,['class' => 'form-control','placeholder' => 'Nombre de usuario','required' => 'required']) }}
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
                <td class="field">Nombre</td>
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
            </tr>
            <tr>
                <td class="field">Móvil</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('telefono_movil', null,['class' => 'form-control telefono','placeholder' => 'Teléfono móvil','required' => 'required','maxlength'=>'15','minlength' => '10']) }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="field">Oficina</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('telefono_oficina', null,['class' => 'form-control telefono','placeholder' => 'Teléfono oficina','maxlength'=>'15','minlength' => '10']) }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="field">Email</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>
                        {{ Form::email('email', null,['class' => 'form-control','placeholder' => 'Email','required' => 'required']) }}
                        @if($errors->has('email'))
                            <ul class="parsley-errors-list filled" id="parsley-id-1513">                                          
                                <li class="parsley-required">{{ $errors->first('email') }}</li>                                     
                            </ul>       
                        @endif
                    </div>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>			                                        
        </tbody>
    </table>
</div>
<div class="form-group">
	<div class="col-md-3 col-md-offset-3">
		{{ Form::submit('Guardar',['class' => 'btn btn-success btn-block']) }}

	</div>
</div>
<!-- end table -->