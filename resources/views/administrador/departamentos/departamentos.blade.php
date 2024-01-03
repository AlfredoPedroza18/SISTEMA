@extends('layouts.masterMenuView')
@section('section')

<div class="content">
	
<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>
		<li>Departamentos</li>
   </ol>
<h1 class="page-header text-center">Departamentos</h1>

<div class="row">
		<div class="col-md-12 text-right">
				@permission('crear.departamentos')
			    <a href="{{ route('sig-erp-crm::departamentos.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="Añadir Departamento">
					<i class="fa fa-cubes fa-1x" aria-hidden="true"></i>

				</a>
				@endpermission
				<label>Añadir Departamento</label>        
		</div>
</div>
<br>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                           <!-- <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                
                            </div>
							-->
                            <h4 class="panel-title">Departamentos</h4>
                        </div>
                        <div class="panel-body">

                        	<table id="data-table" class="display table table-striped table-bordered table-responsive">
						        				<thead>
											       <tr>
										                
										                <th>Departamento</th>
										                <th>Ubicación</th>
										                <th>Teléfono</th>
										                <th>Actividad</th>
										           </tr>
										        </thead>
										        <tbody>
										        @foreach($cn as $clave)
										         <tr>
										           <td>{{ $clave->nomenclatura }}&nbsp;&nbsp;{{$clave->nombre}}</td>
										           <td>{{ $clave->estado }}&nbsp;&nbsp;{{$clave->municipio}}&nbsp;&nbsp;{{$clave->colonia}}&nbsp;&nbsp;{{$clave->calle}}&nbsp;&nbsp;{{$clave->no_exterior}}</td>
										           <td>{{ $clave->telefono}}</td>
										           <td class="text-center">
												   		@permission('editar.departamentos')
											           	  <a href="{{route('sig-erp-crm::departamentos.edit',$clave->id)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i>
														  </a>
														@endpermission
														&nbsp&nbsp
													           <input type="hidden"  value="{{ $clave->id }}" data-id="{{ $clave->id }}">
														@permission('eliminar.departamentos')										  	    
                                                		   <a href="" class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-registro" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" onclick="eliminarDepartamento({{ $clave->id }})">
                                                		   <i class="fa fa-trash-o"></i></a>
														@endpermission
														</td>

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

    var eliminarDepartamento= function(id){
           	 window.event.preventDefault();
           	 var idDepartamento=id;
           	 var ruta		= "{{ url('departamentos') }}/"+idDepartamento+"";
			 var token 		= $('meta[name="csrf-token"]').attr('content');
           	 $.ajax({
           	 	headers:{'X-CSRF-TOKEN':token},
           	 	url:ruta,
           	 	type:'DELETE',
           	 	dataType:'json',
           	 	success:function(response){ 
														
												if(response.status_alta=="successDepartamento"){
														swal({   
																title: "<h3>¡Este departamento ya contiene un usuario Agregado, No se puede eliminar !</h3> ",
																html: true,
																type: "info",   
																confirmButtonText: "OK",
																showCancelButton: true,	
																showLoaderOnConfirm: true							
															}); 
													}
													if(response.status_alta=="successEliminado"){
														swal({   
																title: "<h3>¡El departamento se elimino correctamente  !</h3> ",
																html: true,
																type: "success",   
																confirmButtonText: "OK",
																showCancelButton: true,													
															}); 
													}

														setTimeout(function(){     location.reload();   }, 1500);
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
                title: 'Reporte de Departamentos',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Reporte de Departamentos',
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
                title: 'Reporte de Departamentos',
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
