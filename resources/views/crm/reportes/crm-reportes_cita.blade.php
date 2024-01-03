@extends('layouts.masterMenuView')
@section('section')
<div id="content" class="content">
	<ol class="breadcrumb ">
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		<li>Reporte de Citas</li>
	</ol>

	<h1 class="page-header text-center">Reporte de Citas <small></small></h1>

		<div class="row">
	     <div class="col-md-4">
	         <div class="form-group">
                                   <label class="col-md-2 control-label">Periodo</label>
                                    <div class="col-md-10">
                                        <div class="input-group input-daterange">
                                            <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" id="fecha_inicio" />
                                            <span class="input-group-addon">a</span>
                                            <input type="text" class="form-control" name="end" placeholder="Fecha Termino" id="fecha_fin" />
                                        </div>
                                    </div>
                                </div>
	     </div>

	     @permission('reportes.citas.cn')
		    <div class="col-md-2">
	    		<div class="form-group">
	                <label class="control-label">{{ Form::label('CN','CN') }}</label>
						{{ Form::select('cn',$cn,null,['id'=>'cn','class'=>' form-control']) }}
			    </div>
		    </div>
	    @endpermission
	    @permission('reportes.citas.status')
		    <div class="col-md-2">
		        <div class="form-group">
	            	<label class="control-label">{{ Form::label('Status','Status') }}</label>
						{{ Form::select('status',['%'=>'Todos','1'=>'Activas','0'=>'Canceladas'],null,['id'=>'status','class'=>' form-control']) }}
				</div>
		    </div>
	    @endpermission
	    @permission('reportes.citas.usuario')
	    	<div class="col-md-2">
	     		<div class="form-group">
                    <label class="control-label">{{ Form::label('Usuario', ' Usuario') }}</label>
     					{{ Form::select('usario',$user,null,['id'=>'usuario','class'=>' form-control','style'=>'overflow: scroll;']) }}
     			</div>
			</div>
		@endpermission

	   <div class="col-md-2">
	     <div class="form-group">
	       {{ Form::button('Reporte', ['class' => 'btn btn-success btn-lg','id' => 'listar_citas','type'=>'button']) }}
	       </div>
	     </div>
	  
	</div>


	
	<div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <?php
                                /*<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>*/
                                ?>
                            </div>
                            <h4 class="panel-title text-center table-responsive">Listado Cotizaciones</h4>
                        </div>
                        <div class="panel-body"> 
                         <div id="tabla-result">
                      
	                    </div>
     </div> 

</div>


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

	<!-- ================== BEGIN PAGE LEVEL JS ==================  -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== --> 
	{!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
	{!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
	
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
		{!! Html::script('assets/js/sweetalert.min.js') !!}
	
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script type="text/javascript">
	$(".input-daterange").datepicker({
		Format: 'yy-mm-dd'
        });


	$(document).ready(function(){

 $("#listar_citas").on('click',function(){
   var finicio= $("#fecha_inicio").val();
   var ffin=$("#fecha_fin").val();
   var cn=$("#cn").val();
   var status=$("#status").val();
   var usuario=$("#usuario").val();


	$.ajax({
					url: '{{ url('reporteCitas') }}',
					type: 'GET',
					dataType: 'json',
					data:{finicio:finicio,ffin:ffin,cn:cn,status:status,usuario:usuario},
					success:function(agendaList){
				
						   var listadoContratos="";
						       listadoContratos+='<table id="data-table" class="display table table-striped table-bordered table-responsive">';
						        listadoContratos+='<thead>';
											       listadoContratos+='<tr>';
										                listadoContratos+='<th>Evento</th>';
										                listadoContratos+='<th>Hora Inicio</th>';
										                listadoContratos+='<th>Hora Fin</th>';
										                listadoContratos+='<th>Fecha Inicio</th>';
										                listadoContratos+='<th>Fecha Fin</th>';
										                listadoContratos+='<th>Nombre Uusario</th>';
										            listadoContratos+='</tr>';
										            listadoContratos+='<tbody>';
										            $.each(agendaList,function(indice){
														             listadoContratos+='<tr>';
														                 listadoContratos+='<td>'+ agendaList[indice].evento+'</td>';
														                 listadoContratos+='<td>'+ agendaList[indice].start+'</td>';
														                 listadoContratos+='<td>'+ agendaList[indice].end+'</td>';
														                 listadoContratos+='<td>'+ agendaList[indice].h_start+'</td>';
														                 listadoContratos+='<td>'+ agendaList[indice].h_end+'</td>';
														                 listadoContratos+='<td>'+ agendaList[indice].name+'</td>';
														             listadoContratos+='</tr>';
												  });
														         listadoContratos+=' </tbody>';
														         listadoContratos+='</table>';
														         $('#tabla-result').empty();
									 $('#tabla-result').append(listadoContratos);
									 		$("#data-table").DataTable({
													        dom: 'Blfrtip',
													        "scrollY": "350px",
                                							"paging": true,
													        buttons: [
													                                                             
												            {
												                extend: 'excelHtml5',
												                title: 'Reporte de citas',
												                 exportOptions: {
												                    columns: [ 0, 1, 2,3,4,5 ]
												                }

												            },
												            {
												                extend: 'pdfHtml5',
												                title: 'Reporte de citas',
												                orientation: 'landscape',
												                pageSize: 'LEGAL',
												                exportOptions: {
												                    columns: [ 0, 1, 2,3,4,5 ]
												                }
												                 
												            },
												             {
												                extend: 'copyHtml5',
												             },
												              {
												                extend: 'print',
												                title: 'Reporte de citas',
												                exportOptions: {
												                    columns: [ 0, 1, 2,3,4,5 ]
												                }
												             }

													        ],
													          responsive: true,
													          autoFill: true
													   
													    } );

							},
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}
				});





 });

});

	</script>

@endsection