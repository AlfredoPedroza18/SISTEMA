@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li>Puestos</li>
   </ol>
<h1 class="page-header text-center">Puestos</h1>

<div class="row">
		<div class="col-md-12 text-right">
                @permission('crear.puestos')
			    <a href="{{ route('sig-erp-crm::CatalogoPuestos.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Añadir Puesto">
					<i class="fa fa-cubes fa-1x" aria-hidden="true"></i>

				</a>
                @endpermission
				<label>Añadir Puesto</label>
		</div>
</div>
<br>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                            </div>
                            <h4 class="panel-title">Puestos</h4>
                        </div>
                        <div class="panel-body">

                        	<table id="data-table" class="display table table-striped table-bordered table-responsive">
						        				<thead>
											       <tr>

										                <th>Código</th>
										                <th>Puesto</th>
										                <th>Activo</th>
										                <th>Actividad</th>
										           </tr>
										        </thead>
										        <tbody>
										        @foreach($CatalogoPuesto as $clave)
										         <tr>
										           <td>{{ $clave->Codigo }}</td>
										           <td>{{ $clave->Nombre }}</td>
										           <td>{{ $clave->Activo}}</td>
										           <td class="text-center">
                                                   @permission('editar.puestos')
											           	<a href="{{route('sig-erp-crm::CatalogoPuestos.edit',$clave->IdPuesto)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i>
                                                        </a>
                                                    @endpermission    
                                                    &nbsp&nbsp
													    <input type="hidden"  value="{{ $clave->IdPuesto }}" data-id="{{ $clave->IdPuesto }}">
                                                    @permission('eliminar.puestos')
                                                        <a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                                                        onclick="eliminarCatalogoPuesto({{ $clave->IdPuesto }})">
                                                        <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    @endpermission
										           </td>
										         </tr>
										        @endforeach
										        </tbody>
										 </table>
                        </div>

</div>

    @endsection
    @section('js-base')
        @include('librerias.base.base-begin')
        @include('librerias.base.base-begin-page')
        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
            {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
            {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
            {!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
            {!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
            {!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
            {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
            {!! Html::script('assets/js/sweetalert.min.js') !!}
            <script type="text/javascript">
                $(document).ready(function(){
                    iniciarTabla();
                });

    var eliminarCatalogoPuesto= function(id){


    window.event.preventDefault();
    var IdPuesto=id;
    var ruta		= "{{ url('CatalogoPuestos') }}/"+IdPuesto+"";
    var token 		= $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers:{'X-CSRF-TOKEN':token},
        url:ruta,
        type:'DELETE',
        dataType:'json',
        success:function(response){
            if(response.status_alta=="successEliminado"){
                swal({
                title: "<h3>¡El puesto se elimino correctamente  !</h3> ",
                html: true,
                type: "success",
                confirmButtonText: "OK",
                showCancelButton: true,
                });
            }
            setTimeout(function(){
                location.reload();   }, 1000);
            },
            error : function(jqXHR, status, error) {
                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
            }
    });




}


                var iniciarTabla = function(){
                    var data_table =$("#data-table").DataTable({
                        //dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'Reporte de Puestos',
                                exportOptions: {
                                    columns: [ 0, 1, 2 ]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'Reporte de Puestos',
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
                                title: 'Reporte de Puestos',
                                exportOptions: {
                                    columns: [ 0, 1, 2 ]
                                }
                            }

                        ],
                        responsive: true,
                        autoFill: true,
                        "paging": true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        dom:'Blfrtip'
                    } );

                }

            </script>

@endsection
