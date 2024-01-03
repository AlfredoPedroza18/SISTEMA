@extends('layouts.masterMenuView')
@section('section')
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        ul.social-network {
            list-style: none;
            display: inline;
            margin-left:0 !important;
            padding: 0;
        }
        ul.social-network li {
            display: inline;
            margin: 0 5px;
        }
        .social-network a.icoRss:hover {
            background-color: #348fe2;
        }
        .social-network a.icoRssDiana:hover {
			{{--background-color: #33bdbd;--}}
			 background-color: #348fe2;
        }
        .social-network a.icoRss:hover i,a.icoRssDiana:hover i, a.icoGoogle:hover i{
		  color:#fff;
        }
        .social-network a.icoGoogle:hover {
		{{-- background-color: #BD3518;--}}
		 background-color: #348fe2;
        }
        a.socialIcon:hover, .socialHoverClass {
            color:#44BCDD;
        }
        .social-circle li a {
            display:inline-block;
            position:relative;
            margin:0 auto 0 auto;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;
            text-align:center;
            width: 6.5em;
            height: 6.5em;
            font-size:10px;
            background-color: #D8D8D8;
        }
        .social-circle li i {
            margin:0;
            line-height:3em;
            text-align: center;
        }
        .social-circle li a:hover i, .triggeredHover {
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -ms--transform: rotate(360deg);
            transform: rotate(360deg);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            -ms-transition: all 0.2s;
            transition: all 0.2s;
        }
        .social-circle i {
            color: #3a3a3a;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }
        .jumbotron{
            padding-top: 12px;
            padding-bottom:0px;
            height:100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        #em{
            padding-left: 30px;
        }
        .col-md-2{
            width: auto;
            padding-left: 30px;
        }


    </style>
</head>
<div class="content">
	<ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>
        @if (Request::path() == 'modulo/administrador/usuarios')
	        <li>Usuarios</li>
	    @endif
        @if (Request::path() == 'modulo/administrador/usuarios/empleados')
	        <li>Empleados</li>
	    @endif
        <!-- <li>Usuarios</li> -->
	</ol>
	@if (Request::path() == 'modulo/administrador/usuarios')
	<h1 class="page-header text-center">Usuarios Staff</h1>
	@endif
	@if (Request::path() == 'modulo/administrador/usuarios/empleados')
		<h1 class="page-header text-center">Usuarios Empleados</h1>
	@endif

    <!--    <div class="jumbotron text-center">
            <div class="row">
            <div class="col-md-2 "  id="em">
                <ul class="social-network social-circle">
                    <li>
                        <a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}" id="usuario" class="icoGoogle" title="Usuarios"><i class="fa fa-users fa-2x"></i>
                        </a>
                        <h5 class="text-center">Usuarios/Staff</h5>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 " id="em">
                <ul class="social-network social-circle">
                    <li>
                        <a href="{{ route('sig-erp-crm::empleados.index') }}" class="icoRss" title="Empleados"><i class="fa fa-user fa-2x"></i>
                        </a>
                        <h5  class="text-center">Usuarios/Empleados</h5>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 " id="em">
                <ul class="social-network social-circle">
                    <li>
                        <a href="{{ route('sig-erp-crm::empleados.index') }}" class="icoRssDiana" title="Empleados"><i class="fas fa-handshake fa-2x"></i>
                        </a>
                        <h5  class="text-center">Usuarios/Clientes</h5>
                    </li>
                </ul>
            </div>
            </div>
		</div>  -->



			<div class="row">
					<div class="col-md-12 text-right">
						@if (Request::path() == 'modulo/administrador/usuarios')
                        @permission('crear.usuariosstaff')
							<a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Usuario">
								<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
							</a>
                        @endpermission    
						@endif
						@if (Request::path() == 'modulo/administrador/usuarios/empleados')
                        @permission('crear.usuarioscandidatoempleado')
								<a href="{{ url('modulo/administrador/usuarios/empleados/nuevo-empleado') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Empleado">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a>
                        @endpermission
						@endif

						<label>Nuevo Usuario</label>
					</div>
				</div>
				<br>



				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							@if (Request::path() == 'modulo/administrador/usuarios')
								<h4 class="panel-title">Staff</h4>
							@endif
							@if (Request::path() == 'modulo/administrador/usuarios/empleados')
								<h4 class="panel-title">Empleado</h4>
							@endif
						</div>
		        <div class="panel-body">


		            <hr>
		            @if (session('success'))
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">
									<strong>Usuario </strong>
									 {{ session('success') }}
									<span class="close" data-dismiss="alert">×</span>
								</div>
			            	</div>
			            </div>
                    @endif
                    @if (session('warning'))
                        <div class="row">
			            	<div class="col-md-12">
			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">
									 {{ session('warning') }}
									<span class="close" data-dismiss="alert">×</span>
								</div>
			            	</div>
			            </div>
			        @endif

					<table id="data-table" class="display table table-striped table-bordered table-responsive">
						<thead>
						<tr>

							<th>Nickname</th>
							<th>Nombre</th>
                            @if (Request::path() == 'modulo/administrador/usuarios')
							<th>Puesto</th>
                            @endif
							<th>Departamento</th>
							<th>Fecha Alta</th>
							<th>Acción</th>
						</tr>
						</thead>
						<tbody>
                        
						@foreach($usuarios as $usuario)
							<tr>
                                <td>{{ $usuario->nick_name }}</td>
								<td class="text-center">{{ $usuario->name }}</td>
                                @if (Request::path() == 'modulo/administrador/usuarios')
								<td class="text-center">{{ $usuario->Puesto }}</td>
                                @endif
								<td class="text-center">{{ $usuario->Departamento }}</td>
								<td class="text-center">{{$usuario->created_at}}</td>
								 @if (Request::path() == 'modulo/administrador/usuarios')
									<td class="text-center">
                                        @permission('editar.usuariosstaff')
                                        <a href="{{route('sig-erp-crm::modulo.administrador.usuarios.edit',$usuario->id)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i>
                                        </a>
                                        @endpermission
                                        &nbsp&nbsp
										<input type="hidden"  value="{{ $usuario->id }}" data-id="{{ $usuario->id }}">

										@if($usuario->id != Auth::user()->id)
                                            @permission('eliminar.usuariosstaff')
											{{ Form::open([ 'route' => ['sig-erp-crm::modulo.administrador.usuarios.destroy',
																		$usuario->id],
															   'method' => 'DELETE',
															   'class'  => 'pull-right'
															 ]) }}

											<button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Usuario">
												<i class="fa fa-trash"></i>
											</button>
											{{ Form::close()}}
                                            @endpermission
										@endif
									</td>
								@endif
								@if (Request::path() == 'modulo/administrador/usuarios/empleados')
									<td class="text-center">
                                        @permission('editar.usuarioscandidatoempleado')
                                        <a href="{{url('modulo/administrador/usuarios/empleados/editar',$usuario->id)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i>
                                        </a>
                                        @endpermission
                                        &nbsp&nbsp
										<input type="hidden"  value="{{ $usuario->id }}" data-id="{{ $usuario->id }}">

										@if($usuario->id != Auth::user()->id)
                                            @permission('eliminar.usuarioscandidatoempleado')
											{{ Form::open([ 'url' => ['modulo/administrador/usuarios/empleados/eliminar',$usuario->id],
															   'method' => 'get',
															   'class'  => 'pull-right'
															 ]) }}

											<button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Usuario">
												<i class="fa fa-trash"></i>
											</button>
											{{ Form::close()}}
                                            @endpermission
										@endif
									</td>
								@endif
							</tr>
						@endforeach
						</tbody>
					</table>


		        </div>
		    </div>



</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')




<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();

    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

    	});



    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Usuarios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Usuarios',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }

            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Usuarios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,

                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },
                               /* "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;

                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };

                                        // Total over all pages
                                        total = api
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );

                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );

                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));

                                }*/

                            } );

        }
</script>

@endsection