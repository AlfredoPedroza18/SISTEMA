@extends('layouts.master')
@section('section')

<div id="content" class="content">


	<ol class="breadcrumb ">
		
		<li><a href="{{ url( 'dashboardese' ) }}">ESE</a></li>
		<li><a href="{{url('os')}}">Ordenes de Servicio</a></li>
		<li>Detallle de Orden de Servicio #ESE {{ $detalle_os[0]->id_os }}</li>

	</ol>
	
	<h1 class="page-header text-center">Detallle de Orden de Servicio #ESE {{ $detalle_os[0]->id_os }} <small></small></h1>
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
                            <h4 class="panel-title text-center table-responsive">#ESE {{ $detalle_os[0]->id_os }} </h4>
                        </div>
                        <div class="panel-body" id="lista-contratos">    
                        	                             	
                        		<table id="data-table" class="table table-striped table-bordered table-responsive">
								 <thead>
								 <tr>	<th >Iniciar<br>Cancelar/Cerrar</th>
								        <th># ESE</th>									
	                                    <th>Tipo de Estudio </th>
	                                    <th>Prioridad </th>
	                                    <th>Estado </th>
	                                    <th>Costo </th>
	                                    <th>Iva  </th>
	                                    <th>Total</th>
	                                    <th>Total + Viaticos</th>
	                                    <th>Fecha Alta </th>
	                                    <th>Fecha Inicio</th>
	                                    <th>Fecha Cierre</th>
	                                    <th>Estatus ESE</th>
	                                    
	                                    
	                                    
	                                   
                                       </tr>
						                           </thead>
						                          <tbody>
						                  
						            @foreach($detalle_os as $key)
						                 <?php 
						                    $span="";
						                   if($key->id_status==1)
						                   	$span="primary";
						                    //estatus =1 sin ininciar
						                   elseif($key->id_status==2)
						                   	$span="warning";//estatus =2 en proceso
						                   elseif($key->id_status==3)
						                   	$span='default'; //estatus =3 cancelado
						                   elseif($key->id_status==4)
						                   	$span='danger'; //estatus =4 cerrado
						                   elseif($key->id_status==5)
						                   	$span = 'info';


						                   	$total_viaticos=$key->total+$key->viaticos;
						                   	?>

						                <tr>
						                   <td colspan="1" class="text-center">
						                    @if($key->id_status != 3 )
						                    	@if( $key->id_status != 5 and $key->id_status != 3 and $key->id_status != 2)
							                    <a 	href='javascript:;'
							                    	class="btn btn-info btn-icon btn-circle btn-sm btn-add-ejecutivo" 
							                    	data-toggle="tooltip" 
							                    	data-id-ese = "{{ $key->id }}"
							                    	title="Asignación ESE"><i class="fa fa-1x fa-group"></i>



							                    </a>					
							                    @endif	                    
						                    <a 	href='{{ url("estudio-ese") . "/create?os=$key->id_os&os_ese=$key->id_os_ese&ese=$key->id" }}'
						                    	class="btn btn-warning btn-icon btn-circle btn-sm" 
						                    	data-toggle="tooltip" 
						                    	title="Iniciar ESE"><i class="fa fa-1x fa-flag"></i>

						                    </a>
						                  	@if($key->id_status!=4)
						                  	<a class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" title="Cerrar ESE" data-target="#cerrarese" onclick="cerrarese({{$key->id}},'{{$key->nombre}}',{{$key->id_os}},'{{$key->prioridad}}','{{$key->nombre_estado}}')"><i class="fa fa-check-square-o"></i></a>
						                  	<a class="btn btn-default btn-icon btn-circle btn-sm cancelar" data-toggle="tooltip modal" title="Cancelar ESE" data-target="#cancelarese" onclick="CANCELARESE({{$key->id}},'{{$key->nombre}}',{{$key->id_os}})"><i class="fa fa-ban"></i></a>
						                    @endif
						                  	@else
						                  	<i class="fa fa-2x fa-ban"></i>
						                  	@endif
						                         	
						                  </td> 
						                       
						                  <td class="text-center">ESE{{$key->id}}</td>
						                  <td class="text-center">{{$key->nombre}}</td>
						                  <td class="text-center">{{$key->prioridad}}</td>
						                  <td class="text-center">{{$key->nombre_estado}}</td>
						       			  <td class="text-right">$ {{number_format($key->costo, 2, ',', ' ')}}</td>
						       			  <td class="text-right">$ {{number_format($key->iva, 2, ',', ' ')}}</td>
						       			  <td class="text-right">$ {{number_format($key->total, 2, ',', ' ')}}</td>
						       			  <td class="text-right">$ {{number_format($total_viaticos, 2, ',', ' ')}}</td>
						       			  <td class="text-right"> {{$key->fecha_ingreso}}</td>
						       			  <td class="text-right"> {{$key->fecha_actualizacion}}</td>
						                  <td class="text-right"> {{$key->fecha_cierre}}</td>		              			                      
						                  <td class="text-center"><span class='label label-{{$span}}'>{{$key->estatus}}</span> @if($key->id_status==4) <i class="fa fa-1x fa-check-square-o"></i>  @endif</td> 
						                 
						                             
						                </tr>
						               
						                      
						            @endforeach

						                          </tbody>
						      </table>   
                        </div>
                    </div>

                   <div id="detalle">
                   </div>
                   <!-- MODAL PARA CANCELAR ESE -->
                   <!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="cancelarese" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel"><center><h2>Cancelación</h2><br> <div id="n_ese"></div></center></h5>
					        
					      </div>
					      <div class="modal-body">
					      <div class="mns"></div>
					      <center>Motivo de Cancelación</center>
					      <form id="form-cancelar"> 
					       <input type="hidden" value="{{ Auth()->user()->id }}" name="id_usuario" id="id_usuario">
					       <textarea class="form-control" placeholder="Limit 300 caracteres" rows="5" maxlength="300" name="comentario_cierre" id="comentario_cancelacion"></textarea>
					       </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
					        <button type="button" class="btn btn-primary" id="Cancelar_ese">Cancelar</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- END MODAL CANCELAR -->
				  <!----------------- MODAL PARA CERRAR ESE -->
                   <!-- Modal -->
					<div class="modal fade" id="myModal_cerrar" tabindex="-1" role="dialog" aria-labelledby="cerrarese" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel"><center><h2>Cerrar Ese <i class="fa fa-1x fa-check-square-o"></i></h2><br></center> </h5>

					        <div class="panel panel-primary" data-sortable-id="ui-widget-16">
                             <div class="panel-heading">
                              <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning " data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Detalle del Estudio a Cerrar</h4>
                        </div>
                        <div class="panel-body bg-info text-black">
                          <div class="row">
                          		<div class="col-md-10">

                          			<div id="n_ese_cerrar"></div>
                          		</div>
                          </div>
                        </div>
                    </div> 
                    Nota: Los campos marcados con (*) son obligatorios.
					      </div>
					      <div class="modal-body">
					      <div class="mns_cierre"></div>
					      <form id="form-cerrar"> 
					       <input type="hidden" value="{{ Auth()->user()->id }}" name="id_usuario" id="id_usuario">

					 <div class="row">	

						<div class="form-group">
						<div class="col-md-6">
							<label class="control-label">* Nombre Investigador que cierra</label>
								<div class="input-group ">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select class="form-control" id="id_ejecutivo_cierre">
									<option value="">Seleccione un investigador</option>
										@foreach( $ejecutivos as $ejecutivo )
										<option value="{{ $ejecutivo->id }}" >
											{{ $ejecutivo->name }}
										</option>
										@endforeach																
									</select>
								</div>
							</div>
							<div class="col-md-6">
							<label class="control-label">* Resultado ESE</label>
								<div class="input-group ">
									<span class="input-group-addon">
										<i class="fa fa-1x fa-paste"></i>
									</span>
									<select class="form-control" id="resultado_ese">
									    <option value="">Seleccione un resultado</option>
										@foreach( $resultados as $res )
										<option value="{{ $res->id }}" >
											{{ $res->nombre }}
										</option>
										@endforeach	
																									
									</select>
								</div>
							</div>
						</div>
						<br>
							<div class="row">
							<div class="col-md-12">
							<div class="form-group">
							<center><label class="control-label">* Comentarios del Estudio</label></center>		<div class="input-group ">
									<span class="input-group-addon">
											<i class="fa fa-2x fa-indent"></i>
									</span>
					       				<textarea class="form-control" placeholder="Limit 300 caracteres" rows="5" maxlength="300" name="comentario_cierre" id="comentario_cierre"></textarea>
					          </div>
					       </div>
					      </div>
						</div>

				
					       </form>
					      </div>

					      <div class="modal-footer">
					        {!! Html::image('assets/img/loader.gif','a picture', array('style' => 'display:none','class' => 'loading')) !!}
					        <button type="button" class="btn btn-secondary ocultar_btn" data-dismiss="modal" >Cerrar</button>
					        
					        <button type="button" class="btn btn-primary ocultar_btn" id="cerrar_ese">Cerrar estudio</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- END MODAL CERRAR ESE -->

</div><!-- end content-->

@include('ESE.ese-asignar-ejecutivo') 

@endsection



	@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')
	<!-- ================== BEGIN PAGE LEVEL JS ==================  -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== --> 
	{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}

	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}

	{!! Html::script('assets/plugins/switchery/switchery.min.js') !!}
	{!! Html::script('assets/plugins/powerange/powerange.min.js') !!}
	{!! Html::script('assets/js/form-slider-switcher.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}
<script type="text/javascript">

$(document).ready(function(){
   iniciarTabla();
    $('[data-toggle="tooltip"]').tooltip();
    $('.cancelar').tooltip();
    $('.btn-add-ejecutivo').click(function(){
    	var id_estudio_ese = $(this).attr('data-id-ese');
    	$('#id_ese_estudio').val(id_estudio_ese);
    	$('#asignar-ejecutivo').modal('show');
    });
 	
 	$('#btn-asignar-ejecutivo').click(function(){
 		$( this ).prop( "disabled", true );
		asignarEjecutivos();
	});
	$('.popover-dismiss').popover({
      trigger: 'focus'
})
   
});

var asignarEjecutivos = function()
{        
	var id_ejecutivo_principal = $('#id_ejecutivo_principal').val();
	var id_ejecutivo_aux 	   = $('#id_ejecutivo_aux').val();
	var id_ejecutivo_foraneo   = $('#id_ejecutivo_foraneo').val();
	var id_ese_estudio 		   = $('#id_ese_estudio').val();

	if( id_ejecutivo_principal != -1 ){
    
        $.ajax({		            
	            url:'{{ url('estudio-ese-asignar-ejecutivo') }}',
	            type:'GET',
	            dataType: 'json',
	            data: { id_ese_detalle:id_ese_estudio,
	            		ejecutivos:[ id_ejecutivo_principal, id_ejecutivo_aux, id_ejecutivo_foraneo],
	            		tipo_ejecutivo:[2,1,3],
	            		id_ejecutivo_principal:id_ejecutivo_principal,
	            		id_ejecutivo_aux:id_ejecutivo_aux,
	            		id_ejecutivo_foraneo:id_ejecutivo_foraneo
	            		},
	            success: function(response){

	            	if( response.data.status ==  'success'){	            	
		            	setTimeout(function(){
		            		swal('Asignación realizada con éxito','El estudio esta listo para ser iniciado','success');
		            		location.reload();
		            	}, 3000); 
	            	}

	            },
	            error : function(jqXHR, status, error) {

				            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
				}
		});
	}
}

var iniciarTabla = function(){
var os="{{ $detalle_os[0]->id_os }}";
            var data_table =$("#data-table").DataTable({
                                dom: 'Blfrtip',
                                buttons: [
                                       {
                extend: 'excelHtml5',
                title: 'Detalle de Ordene de servicio #ESE'+os,
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Detalle de Ordene de servicio #ESE'+os,
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Detalle de Ordene de servicio #ESE'+os,
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12]
                }
             }
            ],
            responsive: true,
                                autoFill: true,
                               //"scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                                 dom:'Blfrtip',
                                  "drawCallback": function( settings ) {
							        $('[data-toggle="tooltip"]').tooltip();
							        $('.cancelar').tooltip();
							    },
                                
                            } );
                
        }
   var CANCELARESE=function(id,nombre,id_os){
     	
     $("#myModal").modal('show');
     $("#n_ese").html("<strong>"+nombre+" de la Orden de Servicio #ESE"+id_os+"</strong>");
     $("#Cancelar_ese").on("click",function(){
        var comentario=$("#comentario_cancelacion").val();
        var id_usuario=$("#id_usuario").val();
     	var datos = $("#form-cancelar").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');

   if(comentario!=""){
      
        $.ajax({
           			headers: {'X-CSRF-TOKEN':token},
           			url:'{{url('detalleEstudio')}}'+"/"+id,
     				type:'PUT',
     				dataType:'json',
     				data:{'id':id,'id_os':id_os,'comentario':comentario,'id_usuario':id_usuario},
     				success:function(response){
     					if(response.success=="ok"){
     						$(".mns").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><center><strong>Exito!</strong> Estudio cancelado correctamente.</center> </div>');
     						  
     						  setTimeout(function(){     


     						  	location.reload();   

     						  }, 1000);

     					}

     				},
     				 //end success
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}


     	});
    }//end if de validacion de campo de comentario
    else{
    	$(".mns").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><center><strong>Alerta!</strong> Ingresar comentario de cancelación.</center> </div>');
    	}
   });
    
}
 var cerrarese=function(id,nombre,id_os,prioridad,estado){
     	
     $("#myModal_cerrar").modal('show');
     $("#n_ese_cerrar").html("<div class='row'><div class='col-md-10'><center><span class='label label-success'><strong>Orden de Servicio #ESE"+id_os+"</strong></span>&nbsp<span class='label label-warning'><strong>"+nombre+"</strong></span>&nbsp<span class='label label-inverse'><strong>"+prioridad+"</strong></span>&nbsp<span class='label label-danger'><strong>"+estado+"</strong></span></center></div></div>");
     $("#cerrar_ese").on("click",function(){
        var comentario=$("#comentario_cierre").val();
        var id_usuario=$("#id_usuario").val();
        var ejecutivo_cierre=$("#id_ejecutivo_cierre").val();
        var resultado_ese=$("#resultado_ese").val();
       	var datos = $("#form-cerrar").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');

   if(comentario!="" && ejecutivo_cierre!='' && resultado_ese!=''){
      
        $.ajax({
           			headers: {'X-CSRF-TOKEN':token},
           			url:'{{url('cerrarEse')}}',
     				type:'GET',
     				dataType:'json',
     				data:{'id':id,
     				'id_os':id_os,
     				'comentario_cierre':comentario,
     				'id_usuario':id_usuario,
     				'ejecutivo_cierre':ejecutivo_cierre,
     				'resultado_ese':resultado_ese

     			     },
     			      beforeSend: function() {
                     $(".ocultar_btn").fadeOut("slow");
			         $(".loading").fadeIn("slow");

			         
			          },
     				success:function(response){
     					if(response.success=="ok"){
     						$(".mns_cierre").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><center><strong>Exito!</strong> Estudio se cerro correctamente.</center> </div>');
     						  
     						  setTimeout(function(){     
     						  	location.reload();   

     						  }, 1000);

     					}

     				},
     				 //end success
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					},
					  complete: function() {
			            $(".loading").fadeOut("slow");
			          }


     	});
    }//end if de validacion de campo de comentario
    else{
    	$(".mns_cierre").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><center><strong>Alerta!</strong> LLenar los campos obligatorios marcados con *.</center> </div>');
    	}
   });
    
}



</script>
	@endsection

