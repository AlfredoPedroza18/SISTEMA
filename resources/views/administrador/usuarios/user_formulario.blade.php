<!-- begin table -->
<div class="table-responsive">
	{!! Form::token() !!}
    <table class="table table-profile">
        <thead>
            <tr>
                <th></th>
                <th>
                    <h4>{{ $nick_name}}
                    <!-- {{ isset($usuario->nick_name)?$usuario->nick_name:'*' }}  -->
                        <small>
                        {{ $name.' '.
                                  $apellido_paterno.' '.
                                  $apellido_materno }}
                        <!-- {{ (isset($usuario->name)?$usuario->name:'').' '.
                                  (isset($usuario->apellido_paterno)?$usuario->apellido_paterno:'').' '.
                                  (isset($usuario->apellido_materno)?$usuario->apellido_materno:'') }} -->
                        </small>
                    </h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="highlight" id="Departamentotr">
                <td class="field">Departamento</td>
                <td>
                <select id="departamento" name="departamento">
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id or ''}}" @if(old('departamento') == $departamento->id) selected @endif> {{ $departamento->nomenclatura or ''}} </option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr class="highlight" id="Permisostr">
                <td class="field">Permisos</td>
                <td>
                    <select id="puesto" name="puesto">
                    @foreach($puestos as $puesto)
                        <option value="{{ $puesto->id or ''}}" @if(old('puesto') == $puesto->id) selected @endif> {{ $puesto->name or ''}} </option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr id="PermisosNóminatr">
                <td class="field">Perfil Nómina</td>
                <td>
                    <select id="perfilnomina" name="perfilnomina">
                    @foreach($perfilnomina as $pn)
                        <option value="{{ $pn->IdPerfil or ''}}" @if(old('perfilnomina') == $pn->IdPerfil) selected @endif> {{ $pn->Perfil or ''}} </option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr id="ModuloAccesotr">
                <td class="field">Módulo Nómina</td>
                <td>
                    @if($modo=='edicion')
                        <select id="moduloacceso" name="moduloacceso[]"  multiple="multiple" >
                            @foreach ($empresa as $e)
                            <option value="{{$e->IdEmpresa}}"@if (in_array($e->IdEmpresa, $permiso)) selected @endif>{{$e->FK_Titulo}}</option>
							@endforeach
                        </select>
                    @else
                        <select id="moduloacceso" name="moduloacceso[]"  multiple="multiple" >
                            @foreach ($empresa as $e)
                            <option value="{{$e->IdEmpresa}}">{{$e->FK_Titulo}}</option>
							@endforeach
                        </select>
                    @endif
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr class="highlight" id="Perfiltr">
                <td class="field">Módulo ESE</td>
                <td>
                    <select class="form-control" name="roles" id="roles">
                            <option value="">Seleccione una opción</option>
                        @foreach ($rols as $e)
                            <option value="{{$e->id}}" @if ($e->id==$dataroles[0]->IdRol) selected @endif>{{$e->rol}}</option>
						@endforeach
				    </select>
                </td>
            </tr>
            <tr>
                <td class="field">Módulo Evaluación</td>
                <td>
                    <select class="form-control" name="rolesevaluacion" id="rolesevaluacion">
                            <option value="">Seleccione una opción</option>
                        @foreach ($roluser as $e)
                            <option value="{{$e->id}}" @if ($e->id==$dataroles[0]->IdRolEva) selected @endif>{{$e->rol}}</option>
						@endforeach
				    </select>
                </td>
            </tr>
            <tr id="addFirma">
                <td class="field">Firma</td>
                <td>
                    <div class="row">
                        <div class="col-sm-4 text-center" style="">
                            @if (isset($imgbase64))
                                <img src="data:image/jpg;base64,{{$imgbase64}}" width="100" height="100" alt="" id="imgFirma" >                                  
                            @endif
                        </div>                        
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="file" accept="image/*" class="form-control form-control-sm" id="firma" name="firma" onchange="previewImgFirma(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <tr>
            <tr class="highlight" id="Puestotr">
                <td class="field">Puesto</td>
                <td>
                    <select id="cpuesto" name="cpuesto">
                    @foreach($Cpuestos as $Cpuesto)
                        <option value="{{ $Cpuesto->IdPuesto or ''}}" @if(old('Cpuesto') == $Cpuesto->IdPuesto) selected @endif> {{ $Cpuesto->Nombre or '' }} </option>
                    @endforeach
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
            </tr>
            <tr id="Nombretr">
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
            <tr id="AppPtr">
                <td class="field">Apellido Paterno</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                        {{ Form::text('apellido_paterno', $apellido_paterno,['class' => 'form-control','placeholder' => 'Apellido paterno']) }}
                    </div>
                </td>
            </tr>
            <tr id="AppMtr">
                <td class="field">Apellido Materno</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                        {{ Form::text('apellido_materno', $apellido_materno,['class' => 'form-control','placeholder' => 'Apellido materno']) }}
                    </div>
                </td>
            </tr>
            <tr id="CodPostaltr">
                <td class="field">Código Postal</td>
                <td>
                <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
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
                </td>
            </tr>
            <tr id="Estadotr">
                <td class="field">Estado</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                        <input type="text" class="form-control" id="State" name="State" value="{{ $State or '' }}" data-live-search="true"
						data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>
						<input type="hidden" id="IdEstado"  name="IdEstado" value="{{ $IdState or '' }}">
						<input type="hidden" id="IdPais"  name="IdPais" value="{{ $IdPais or '' }}">
						<input type="hidden" id="Localidad" name="Localidad" value="{{ $Localidad or '' }}">
						<input type="hidden" id="IdCodigoPostal" name="IdCodigoPostal" value="{{ $IdCodigoPostal or '' }}">
                    </div>
                </td>
            </tr>
            <tr id="Ciudadtr">
                <td class="field">Ciudad o Municipio</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                        <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $Municipio or '' }}" data-live-search="true"
						data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>
                    </div>
                </td>
            </tr>
            <tr id="Coloniatr"> 
                <td class="field">Colonia</td> 
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                            <select class="form-control" name="Colonia" id="Colonia">
								@foreach(explode(';',$Colonia) as $row)
									<option @if ($ColUpdate == $row) selected	@endif value="{{ $row }}">{{ $row }}</option>
								@endforeach
							</select>
                    </div>
                </td>
            </tr>
            <tr id="Usuariotr">
                <td class="field">Usuario</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg m-r-5"></i></span>
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
            </tr>
            <tr id="Passwordtr">
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
            <tr id="Moviltr">
                <td class="field">Móvil</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('telefono_movil', $telefono_movil,['class' => 'form-control phone_with_ddd','placeholder' => 'Móvil','required' => 'required']) }}
                    </div>
                </td>
            </tr>
            <tr id="Oficinatr">
                <td class="field">Oficina</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('telefono_oficina', $telefono_oficina,['class' => 'form-control phone_with_ddd','placeholder' => 'Teléfono oficina']) }}
                    </div>
                </td>
            </tr>
            <tr id="Exttr">
                <td class="field">Ext</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('ext', $telefono_movil,['class' => 'form-control','placeholder' => 'Ext','required' => 'required']) }}
                    </div>
                </td>
            </tr>
            <tr id="Emailtr">
                <td class="field">Email</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>
                        {{ Form::email('email', $email,['class' => 'form-control','id' => 'email','onkeyup' => 'exisem(this)','placeholder' => 'Email','required' => 'required']) }}
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
            <tr class="divider">
                <td colspan="2"></td>
            </tr>
            <!-- <tr id="Firmatr">
                <td class="field">Firma</td>
                <td>
                    <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-bars fa-lg m-r-3"></i></span>
                        {{ Form::file('firma',['class' => 'form-control']) }}
                    </div>
                </td>
            </tr>					                                         -->
            <!-- <tr>
                <td class="field">Nickname</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-life-bouy (alias) fa-lg m-r-3"></i></span>
                        {{ Form::text('nick_name', $nick_name,['class' => 'form-control','placeholder' => 'Nombre de usuario','required' => 'required','minlength' => '5']) }}
                    </div>
                </td>
            </tr> -->
            <!-- <tr id="Usuariotr">
                <td class="field">Usuario</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg m-r-5"></i></span>
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
                </td> -->
                <!-- <div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12 alert alert-success" id="msg"> -->
                <!-- </div> -->
            <!-- </tr>
            <tr id="Passwordtr">
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
            <!-- <tr id="Nombretr">
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
            <tr id="AppPtr">
                <td class="field">Apellido Paterno</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                        {{ Form::text('apellido_paterno', $apellido_paterno,['class' => 'form-control','placeholder' => 'Apellido paterno']) }}
                    </div>
                </td>
            </tr>
            <tr id="AppMtr">
                <td class="field">Apellido Materno</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-navicon fa-lg m-r-2"></i></span>
                        {{ Form::text('apellido_materno', $apellido_materno,['class' => 'form-control','placeholder' => 'Apellido materno']) }}
                    </div>
                </td>
            </tr> -->
            <!-- <tr id="Moviltr">
                <td class="field">Móvil</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('telefono_movil', $telefono_movil,['class' => 'form-control telefono','placeholder' => 'Móvil','required' => 'required','maxlength'=>'10','minlength' => '10']) }}
                    </div>
                </td>
            </tr>
            <tr id="Oficinatr">
                <td class="field">Oficina</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('telefono_oficina', $telefono_oficina,['class' => 'form-control telefono','placeholder' => 'Teléfono oficina','maxlength'=>'10','minlength' => '10']) }}
                    </div>
                </td>
            </tr>
            <tr id="Exttr">
                <td class="field">Ext</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg m-r-5"></i></span>
                        {{ Form::text('ext', $telefono_movil,['class' => 'form-control telefono','placeholder' => 'Ext','required' => 'required','maxlength'=>'10','minlength' => '10']) }}
                    </div>
                </td>
            </tr>
            <tr id="Emailtr">
                <td class="field">Email</td>
                <td>
                	<div class="input-group input-group-sm col-md-8 col-sm-12 col-xs-12">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg m-r-3"></i></span>
                        {{ Form::email('email', $email,['class' => 'form-control','id' => 'email','onkeyup' => 'exisem(this)','placeholder' => 'Email','required' => 'required']) }}
                        @if($errors->has('email'))
                            <ul class="parsley-errors-list filled" id="parsley-id-1513">                                          
                                <li class="parsley-required">{{ $errors->first('email') }}</li>                                     
                            </ul>       
                        @endif
                    </div>
                    <div class="row">
                     <span class='text-danger' id='msge'></span>
                    </div>
                </td>
            </tr>
            <tr class="divider">
                <td colspan="2"></td>
            </tr>			                                         -->
        </tbody>
    </table>
</div>
<div class="form-group"  >
	<div class="col-md-3 col-md-offset-3">
		{{ Form::button('Guardar',['class' => 'btn btn-success btn-block','id' =>'btnGdiv' ,'type'=>'submit']) }}
	</div>
</div>
<!-- end table -->