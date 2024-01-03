@extends('layouts.masterMenuView')

@section('estilos')

{!! Html::style('assets/css/bootstrap-duallistbox.css') !!}
{!! Html::style('assets/permisos/ui.fancytree.min.css') !!}

@endsection
@section('section')
<div id="content" class="content" >

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li><a href="{{ url('modulo/administrador/permisos') }}">Permisos</a></li>

	</ol>

	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title text-center">Permisos para Nómina</h4>
				</div>
				<div class="panel-body">

					<div class="alert alert-info">
						<h4><i class="fa fa-info-circle fa-lg"></i> Asignación de permisos</h4>
					</div>
					<div style="background:#f7f6f6;">
							{!! Form::open([
							'action' => 'Administrador\PermisosNomController@save',
							'method' => 'post',
							'class' => 'form-horizontal',
							'id' => 'create-puesto-frm'])
							!!}
							<br><br>
							<input type="hidden" name="id" value="{{$puesto->id}}">
							<div class="row">
								<div class="col-md-4">
									<label>Usuario</label> <br>
									<label> <h4> <strong> {{$puesto->username}} </strong> </h4></label>

								</div>

								<div class="col-md-8">
									<label>Seleccionar perfil</label>
									{{ Form::select('IdPerfil',$IdPerfil, $puesto->IdPerfil,['class' => 'form-control', 'name'=>'Perfil']) }}

								</div>
							</div>

							<br>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<label> <h4>Seleccionar Permisos</h4> </label>
										<div class="input-group">
											<span class="input-group-addon" style="background:#005edb;">
												<input name="modulos" type="checkbox" <?= ($puesto->PermisoModuloConexiones == 'Si' ? ' checked' : ''); ?> >
											</span>
											<input type="text" class="form-control" style="font-size: 14px; color:#fff; background: #ff8a00;" value="Permisos Modulos" readonly>
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon" style="background:#005edb;">
												<input name="pass" type="checkbox" <?= ($puesto->CambiarContrasena == 'Si' ? ' checked' : ''); ?>>
											</span>
											<input type="text" class="form-control" style="font-size: 14px;color:#fff; background: #ff8a00;" value="Cambiar Contraseña" readonly>
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon" style="background:#005edb;">
												<input name="nom" type="checkbox" <?= ($puesto->ModificarNombre == 'Si' ? ' checked' : ''); ?>>
											</span>
											<input  type="text" class="form-control" style="font-size: 14px;color:#fff; background: #ff8a00;" value="Modificar Nombre" readonly>
										</div>
										<br>

										<div class="input-group">
											<span class="input-group-addon" style="background:#005edb;">
												<input name="users" type="checkbox" <?= ($puesto->ModificarOtrosUsuarios == 'Si' ? ' checked' : ''); ?>>
											</span>
											<input  type="text" class="form-control" style="font-size: 14px;color:#fff; background: #ff8a00;" value="Modificar Otros Usuarios" readonly>
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon" style="background:#005edb;">
												<input name="editable" type="checkbox" <?= ($puesto->Editable == 'Si' ? ' checked' : ''); ?>>
											</span>
											<input  type="text" class="form-control" style="font-size: 14px;color:#fff; background: #ff8a00;" value="Editable" readonly>
										</div>
									</div>


								<div class="col-md-6" >

											<label>	<h4>Seleccionar Empresas</h4></label>
											<div style="height:240px; overflow-y: scroll;">
												@foreach ($empresa as $e)
													<div class="input-group">
														<span class="input-group-addon" style="background:#005edb;" >
															<input name="empresa{{$e->IdEmpresa}}" type="checkbox" @if (in_array($e->IdEmpresa, $permiso)) checked @endif>
														</span>
														<input type="text" class="form-control" style="font-size: 14px;color:#fff; background: #ff8a00;" value="{{$e->FK_Titulo}}" readonly>
													</div> <br>
												@endforeach
											</div>


								</div>

								<div class="form-group">
						        <div class="col-md-7 col-md-offset-5">
											<br>
						            {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success m-r-5','id' => 'create-puesto']) }}

						        </div>
						    </div>
								</div>

				{!! Form::close() !!}
				</div>
			</div>
			</div>
		</div>



		</div>

	</div>


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<script type="text/javascript">
	$(document).ready(function() {

		$('[data-toggle="popover"]').popover({
			delay: {
				"show": 500,
				"hide": 100
			},
			trigger: 'focus'

		});
	});

</script>

@endsection
