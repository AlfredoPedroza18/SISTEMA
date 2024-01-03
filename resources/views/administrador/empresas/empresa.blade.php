@extends('layouts.masterMenuView')
@section('section')

<div class="content">
	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li>Empresas {{ $TiposEmpresas }}</li>
	</ol>
	<h1 class="page-header text-center">Empresas {{ $TiposEmpresas }}</h1>

	<div class="row">
		<div class="col-md-12 text-right">
			@if($TiposEmpresas == 'Facturadoras')
				@permission('crear.empresasfacturadoras')
				<a href="{{ route('sig-erp-crm::EmpresasFacturadoras.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Añadir Empresa Facturadora">
					<i class="fa fa-building-o fa-1x" aria-hidden="true"></i>
				</a>
				@endpermission
			@else
				@permission('crear.empresasmaquiladoras')
				<a href="{{ route('sig-erp-crm::EmpresasFacturadoras.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Añadir Empresa Maquiladora">
					<i class="fa fa-building-o fa-1x" aria-hidden="true"></i>
				</a>
				@endpermission
			@endif
			<label>Añadir Empresa {{$TiposEmpresas}}</label>
		</div>
	</div>
	<br>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
						class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
						class="fa fa-repeat"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
						class="fa fa-minus"></i></a>

			</div>
			<h4 class="panel-title">Empresas {{$TiposEmpresas}}</h4>
		</div>
		<div class="panel-body">

			<table id="data-table" class="display table table-striped table-bordered table-responsive">
				<thead>
					<tr>

						<th>Empresa</th>
						<th>RFC</th>
						<th>Tipo</th>
						<th>CURP</th>
						<th>Actividad</th>
					</tr>
				</thead>
				<tbody>
					@foreach($empresa as $clave)
					<tr>

						<td>{{ $clave->FK_Titulo }}</td>
						<td class="text-center">{{ $clave->Rfc }}</td>
						<td class="text-center">{{ $clave->FormaJuridica==1 ?"Persona Fisica": "Persona Moral" }}</td>
						<td class="text-center">{{ $clave->pf_CURP==''? "N/A":$clave->pf_CURP }}</td>
						<td class="text-center">
						@if($TiposEmpresas == 'Facturadoras')
							@permission('editar.empresasfacturadoras')
							<a
								href="{{route('sig-erp-crm::EmpresasFacturadoras.edit',$clave->IdEmpresa)}}"
								class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro"
								data-toggle="tooltip" data-placement="top" title="Editar Registro"><i
									class="fa fa-pencil"></i></a>&nbsp&nbsp
							<input type="hidden" value="{{ $clave->IdEmpresa }}" data-id="{{ $clave->IdEmpresa }}">
							@endpermission
						@else
							@permission('editar.empresasmaquiladoras')
							<a
								href="{{route('sig-erp-crm::EmpresasFacturadoras.edit',$clave->IdEmpresa)}}"
								class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro"
								data-toggle="tooltip" data-placement="top" title="Editar Registro"><i
									class="fa fa-pencil"></i></a>&nbsp&nbsp
							<input type="hidden" value="{{ $clave->IdEmpresa }}" data-id="{{ $clave->IdEmpresa }}">
							@endpermission
						@endif

						@if($TiposEmpresas == 'Facturadoras')
							@permission('eliminar.empresasfacturadoras')
							<a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro"
								data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
								onclick="eliminarEmpresa({{ $clave->IdEmpresa }})">
								<i class="fa fa-trash-o"></i></a>
							@endpermission
						@else
							@permission('eliminar.empresasmaquiladoras')
							<a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro"
								data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
								onclick="eliminarEmpresa({{ $clave->IdEmpresa }})">
								<i class="fa fa-trash-o"></i></a>
							@endpermission
						@endif



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
	<!-- {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
	{!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
	{!! Html::script('assets/js/sweetalert.min.js') !!} -->
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

         var eliminarEmpresa = function(id){

           	
           	 window.event.preventDefault();
           	 var idEmpresa=id;
           	 var ruta		= "{{ url('EmpresasFacturadoras') }}/"+idEmpresa+"";
			 var token 		= $('meta[name="csrf-token"]').attr('content');
           	 $.ajax({
           	 	headers:{'X-CSRF-TOKEN':token},
           	 	url:ruta,
           	 	type:'DELETE',
           	 	dataType:'json',
           	 	success:function(response){ 
										console.log(JSON.stringify(response));				
												if(response.status_alta=="successEmpresa"){
														swal({   
																title: "<h3>¡Esta empresa Facturadora cuenta con un contrato , no se puede eliminar !</h3> ",
																html: true,
																type: "info",   
																confirmButtonText: "OK",
																showCancelButton: true,	
																showLoaderOnConfirm: true							
															}); 
													}
													if(response.status_alta=="successEliminado"){
														swal({   
																title: "<h3>¡La empresa Facturadora se elimino correctamente  !</h3> ",
																html: true,
																type: "success",   
																confirmButtonText: "OK",
																showCancelButton: true,													
															}); 
													}

														setTimeout(function(){     location.reload();   }, 1000);
													},
											error : function(jqXHR, status, error) {

											            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
											        }
										});


                    

           }

    	 var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                    
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Reporte de Empresas Facturadoras',
                 exportOptions: {
                    columns: [ 0, 1, 2,3 ]
                }          
            },
            {
                extend: 'pdfHtml5',
                title: 'Reporte de Empresas Facturadoras',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Reporte de Empresas Facturadoras',
                exportOptions: {
                    columns: [ 0, 1, 2,3 ]
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