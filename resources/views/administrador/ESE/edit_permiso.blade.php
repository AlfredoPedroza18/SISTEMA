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
			<div class="panel panel-in	verse" data-sortable-id="ui-widget-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title text-center">Permisos para ESE</h4>
				</div>
				<div class="panel-body">

					<div class="alert alert-info">
						<h4><i class="fa fa-info-circle fa-lg"></i> Asignación de permisos ESE</h4>
					</div>
					<div style="background:#f7f6f6;">

							<br><br>
							<input type="hidden" name="id" value="{{$puesto->id}}">
							<div class="row">
								<div class="col-md-4">
									<label>Usuario</label> <br>
									<label> <h4> <strong> {{$puesto->username}} </strong> </h4></label>

								</div>

								<div class="col-md-8">
									<label>Seleccionar perfil</label>
									<select class="form-control" name="roles" id="roles">
										<option {{$roluser == 'Otro rol' ? 'selected': ''}} value="">Seleccione un perfil</option>
										<option {{$roluser == 'Analista' ? 'selected': ''}} value="Analista">Analista</option>
										<option {{$roluser == 'Lider' ? 'selected': ''}} value="Lider">Lider</option>

									</select>

								</div>
								
								<div class="col-md-8">
									<div class="form-group">

											<div id="tree">


											</div>
									</div>
								</div>

								<div class="col-md-7 col-md-offset-5">
									<br>
									<!-- <button class="btn btn-sm btn-success m-r-5" onclick="setRolESE()">Guardar</button> -->
									{{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success m-r-5','id' => 'create-puesto']) }}

								</div>

							</div>

							<br>
								<hr>



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
{!! Html::script('assets/js/sweetalert.min.js') !!}

{!! Html::script('assets/js/jquery.bootstrap-duallistbox.js') !!}
{!! Html::script('assets/permisos/jquery.fancytree.js') !!}
<script type="text/javascript">
	function setRolESE(){
		if($("#roles").val() != ""){
			let id = {{$puesto->id}};
			let rol = $('select[name="roles"] option:selected').text();
			var token = $('meta[name="csrf-token"]').attr('content');
			
			$.ajax({
				headers: {'X-CSRF-TOKEN':token},
				url: "{{ url('setPermisoESE') }}",
				type: "POST",
				data: {id:id,
					rol:rol,

				},
				success: function( response )
				{

						swal({
							title: "<h3>¡ Rol asignado con exito !</h3> ",
							html: true,
							type: "success"

						});
						location.href = "{{url('PermisosESE')}}";

				}
			});
		}else{
			swal("", "Seleccione un perfil");
		}
	}
	$(document).ready(function() {

		$('[data-toggle="popover"]').popover({
			delay: {
				"show": 500,
				"hide": 100
			},
			trigger: 'focus'

		});

		arbolPermisos();
	});


	var arbolPermisos = function(){
        $("#tree").fancytree({
            source:[
                { id: -1, key: '-1', title: 'Módulos',folder:true, children: [
                   
                    { id: '39', key: '39', title: 'ESE', folder:true, @if( in_array(39, $permisos_asignados) ) selected:true, @endif children: [
                        { id: '37', key: '37', title: 'Ordenes de Servicio', folder:true, @if( in_array(37, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '25',
                                key:'25',
                                title: 'Ver ordenes de servicio',
                                @if( in_array(25, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '26',
                                key:'26',
                                title: 'Cancelar orden de servicio',
                                @if( in_array(26, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '27',
                                key:'27',
                                title: 'Cerrar orden de servicio',
                                @if( in_array(27, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '28',
                                key: '28',
                                title: 'Ver detalle de orden de servicio',
                                @if( in_array(28, $permisos_asignados) ) selected:true, @endif
                            }
                        ]},
                        { id: '38', key: '38', title: 'Estudios Socioeconómicos', folder:true, @if( in_array(38, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '29',
                                key: '29',
                                title: 'Ver detalle del estudio',
                                @if( in_array(29, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '30',
                                key: '30',
                                title: 'Ver ejecutivos asignados',
                                @if( in_array(30, $permisos_asignados) ) selected:true, @endif
                            }
                        ]},
                        { id: '31', key: '31', title: 'Investigadores', folder:true, @if( in_array(31, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '32',
                                key: '32',
                                title: 'Nuevos investigadores',
                                @if( in_array(31, $permisos_asignados) ) selected:true, @endif
                            }
                        ]},
                        {   id: '33',
                            key: '33',
                            title: 'Reporte',
                            folder:true,
                            @if( in_array(33, $permisos_asignados) ) selected:true, @endif
                        },
                        { id: '34', key: '34', title: 'Plantillas', folder:true, @if( in_array(34, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '35',
                                key: '35',
                                title: 'Nueva plantilla',
                                @if( in_array(35, $permisos_asignados) ) selected:true, @endif
                            }
                        ]}

                    ]}
                ]}

            ],
            selectMode:3,
            checkbox:true,
            select:function(event, data){
                //console.log(data.node.key);

                    console.log(data.tree.getSelectedNodes());

                    /*var selKeys = $.map(data.tree.getSelectedNodes(), function (node) {
                        console.log(node.key);
                        console.log( (node.parent).parent );
                    });*/
            },
            click:function(event, data){
                console.log(data.targetType);
            }

        });
    }
</script>

@endsection
