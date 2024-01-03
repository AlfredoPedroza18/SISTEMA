@extends('layouts.masterMenuView')
@section('section')
  {!! Html::style('assets/css/bootstrap-duallistbox.css') !!}
  {!! Html::style('assets/permisos/ui.fancytree.min.css') !!}

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li><a href="{{ url('modulo/administrador/permisos') }}">Permisos</a></li>

	</ol>

	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
		        <div class="panel-heading">

		            <h4 class="panel-title text-center">Listado de Permisos ESE</h4>
		        </div>
		        <div class="panel-body">
              @if(session('status'))
              <div class="alert alert-success" role="alert">
                <h4><i class="fas fa-check"></i> {{ session('status') }} </h4>
              </div>
              @endif
		            @if (session('success'))
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">
									<strong>Puesto </strong>
									 {{ session('success') }}
									<span class="close" data-dismiss="alert">×</span>
								</div>
			            	</div>
			            </div>
			        @endif

		            <div class="row">
		            	<div class="col-md-12 col-sm-12 col-xs-12">
		            		<table id="data-table" class="display table table-striped table-bordered table-responsive">
			            		<thead>
			            			<tr>
			            				<th>Usuario</th>
                          <th>Perfil</th>
				            			<th>Permisos a Modulos</th>
				            			<th>Cambiar Contraseña</th>
				            			<th>Modificar Nombre</th>
                          <th>Modificar Usuarios</th>
                          <th>Modificar Editable</th>
                          <th>Acción</th>
				            		</tr>
			            		</thead>
			            		<tfoot>

				            			<tr>
				            				<th colspan="8" class="text-center">PERMISOS</th>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach($roles as $rol)
				            			<tr>
				            				<td>{{ $rol->username }}</td>
                            <td>{{ $rol->Perfil }}</td>
				            				<td>{{ $rol->PermisoModuloConexiones }}</td>
                            <td>{{ $rol->CambiarContrasena }}</td>
                            <td>{{ $rol->ModificarNombre }}</td>
				            				<td>{{ $rol->ModificarOtrosUsuarios }}</td>
                            <td>{{ $rol->Editable }}</td>
                            <td class="text-center">
				            					<a href="{{ route('permisosESE',['id'=>$rol->id]) }}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Editar Usuario"><i class="fa fa-pencil"></i></a>&nbsp&nbsp
				            				</td>

				            			</tr>
				            		@endforeach
			            		</tbody>
		            		</table>
		            	</div>


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
                title: 'Listado de Puestos',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Puestos',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }

            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Puestos',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
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

                            } );

        }
</script>

@endsection
