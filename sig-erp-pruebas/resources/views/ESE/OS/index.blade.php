@extends('layouts.master')
@section('section')

<div id="content" class="content">


	<ol class="breadcrumb ">
		
		<li><a href="{{ url( 'dashboardese' ) }}">ESE</a></li>
        <li>Ordenes de Servicio</li>
		

	</ol>
	
	<h1 class="page-header text-center">Ordenes de Servicio <small></small></h1>
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
                            <h4 class="panel-title text-center table-responsive">Listado Ordenes de Servicio</h4>
                        </div>
                        <div class="panel-body" id="lista-contratos">    
                        	                             	
                        		<table  id="data-table" class="table table-striped table-bordered table-responsive">
								 <thead>
								 <tr>	
								        <th>Detalle </th>										
	                                    <th># OS ESE </th>
	                                    <th>Cliente</th>	                                    
	                                    <th>Servicio</th>
	                                    <th>Centro Negocio</th>
	                                    <th>Costo</th>
	                                    <th>Fecha</th>
	                                    <th>Estatus</th>
                                        @permission('ese.ordenes.servicio.cancelar|ese.ordenes.servicio.cerrar')
	                                    <th>Cancelar/Cerrar</th>
                                        @endpermission
	                                   
                                       </tr>
						                           </thead>
						                          <tbody>
						                    @foreach($os as $key)
						                    
						                    <?php
						                    $funcion=null;
						                    if($key->id_status!=3 and $key->id_status!=4)
						                    $funcion="MostrarDetalle($key->id)";
						                    else
						                    $funcion="Mensaje('No se puede mostrar el detalle de la Orden #ESE $key->id, ya que se encuentra en el Estado Cancelada o Cerrada')";
											?>

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
						                   ?>
						                   <tr >
						                     <td @permission('ese.ordenes.servicio') onclick="{{$funcion}}"  @endpermission >
						                     	 
						                             <a href="#ir_detalle"><i class="fa fa-1x fa-plus-square detalle_tool"  data-toggle="tooltip modal" title="Ver detalle de la orden de servicio ESE {{ $key->id }}"> </i> OS
                                                     </a>
						                     </td>

						                             <td  @permission('ese.ordenes.servicio') onclick="{{$funcion}}"  @endpermission >
						                              {{ $key->id}} 
                                                     
						                             </td>
						                             <td>{{ $key->nombre_comercial}}</td>
						                             <td class="text-center">{{ 'ESE'}}</td>
						                             <td>{{ $key->centro_negocio}}</td>
						                             <td class="text-right">$ {{ $key->total}}</td>
						                             <td>{{ $key->fecha_cotizacion}}</td>
						                             <td><span class='label label-{{$span}} text-center'>{{$key->nombre}}</span></td>

						                             

                                                     @permission('ese.ordenes.servicio.cancelar|ese.ordenes.servicio.cerrar')
                                                     <td class="text-center">


						                             @if($key->id_status!=3 and $key->id_status!=4 )
                                                     @permission('ese.ordenes.servicio.cancelar')
						                             <a class="btn btn-default btn-icon btn-circle btn-sm cancelar" data-toggle="tooltip modal" title="Cancelar OS ESE" data-target="#cancelarese" onclick="cancelar_os({{$key->id}})">
						                             <i class="fa fa-ban"></i>
						                             </a>
                                                     @endpermission
                                                     @permission('ese.ordenes.servicio.cerrar')
						                             <a class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" title="Cerrar OS ESE" onclick="cerrar_os({{$key->id}})"><i class="fa fa-check-square-o"></i>
						                             </a>
                                                     @endpermission
						                             @else
						                             <i class="fa fa-2x fa-ban"></i>
						                             @endif

						                             </td>
                                                     @endpermission
						                             


						                </tr>
						               
						                      
						                    @endforeach

						                          </tbody>
						      </table>   
                        </div>
                    </div>
            <div id="ir_detalle">
                   <div id="detalle">
                   </div>
            </div>

</div><!-- end content-->
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
	   $(".fa-outdent").tooltip('toggle');
       $('.cancelar').tooltip();
       $('.detalle_tool').tooltip();
      iniciarTabla();
     
	});

	var MostrarDetalle = function(id){
	
		$.ajax({
					url: '{{ url('detalleOs') }}',
					type: 'GET',
					dataType: 'json',
					data:{"id":id},
					success:function(response){

						   if(response.data){
				var tabla_detalle='<div class="row"><div clas="col-md-12">"<div class="panel panel-inverse" data-sortable-id="ui-general-3">'+
                        '<div class="panel-heading">'+
                            '<div class="panel-heading-btn">'+
                                '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'+
                                '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>'+
                                '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'+
                                '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>'+
                            '</div>'+
                            '<h4 class="panel-title"><strong> ORDEN DE SERVICIO # ESE '+id+'</strong></h4>'+
                        '</div>'+
                        '<div class="panel-body">'+
                           '<a href=" @if(Auth::check() && Auth::user()->can('ese.ordenes.servicio.detalle')) {{url("detalleOsEstudio")}}/'+id+' @else javascript:; @endif" class="btn btn-danger btn-block"><i class="fa fa-1x fa-edit"></i> <strong>Ver detalle de orden de Servicio # ESE '+id+'</strong> </a>  '+
                            '<div class="row"><div clas="col-md-10"><table id="data-table2" class="table table-striped table-bordered table-responsive">'+
                                '<thead>'+
                                    '<tr>'+

                                        '<th class="text-center">Tipo de Estudio</th>'+
                                        '<th class="text-center">Prioridad</th>'+
                                        '<th class="text-center">Cantidad</th>'+
                                        '<th class="text-center">Ubicación</th>'+
                                        '<th class="text-center">Costo del Estudio</th>'+
                                        '</tr>'+
                                '</thead>'+
                                '<tbody>';
                               $.each(response.data,function(indice){
                                    tabla_detalle+='<tr>'+
                                        
                                        '<td class="text-left"><span class="label label-success"><strong>'+response.data[indice].nombre+'</strong></span></td>'+
                                        '<td>'+response.data[indice].prioridad+'</td>'+
                                        '<td class="text-center"><span class="badge badge-warning badge-square">'+response.data[indice].cantidad+'</span></td>'+
                                        '<td class="text-center">'+response.data[indice].nombre_estado+'</td>'+
                                        '<td class="text-center"><span class="label label-primary"><strong> $'+number_format(response.data[indice].total,2)+'</strong></span></td>'+
                                        
                                    '</tr>';
                            });
                                tabla_detalle+='</tbody>'+
                            '</table></div></div>'+
                        '</div>'+
                    '</div>'+
				'</div>'+
            '</div>'+
                '</div>';
						   	$("#detalle").html(tabla_detalle);
                            $("#data-table2").DataTable({
                                                            dom: 'Blfrtip',
                                                            buttons: [
                                                               {
                                                                extend: 'excelHtml5',
                                                                title: 'Reporte de contratos generados',
                                                                exportOptions: {
                                                                    columns: [ 0, 1, 2 ,3,4]
                                                                }         
                                                            },
                                                            {
                                                                extend: 'pdfHtml5',
                                                                title: 'Reporte de contratos generados',
                                                                pageSize: 'LEGAL',
                                                                exportOptions: {
                                                                    columns: [ 0, 1, 2 ,3,4]
                                                                }
                                                                 
                                                            },
                                                             {
                                                                extend: 'copyHtml5',
                                                             },
                                                             {
                                                                extend: 'print',
                                                                title: 'Reporte de contratos generados',
                                                                exportOptions: {
                                                                    columns: [ 0, 1, 2 ,3,4]
                                                                }
                                                             }

                                                            ],
                                                            responsive: true,
                                                            autoFill: true,
                                                            //"scrollY": "350px",
                                                            "paging": true
                                                        });
                            


								}//end if
								else{

									 swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
								}

					},//end success
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}
			});


	}

	
		var cancelar_os=function(id){
			var token = $('meta[name="csrf-token"]').attr('content');
			  $.ajax({
           			headers: {'X-CSRF-TOKEN':token},
           			url:'{{url('cancelar_os')}}',
     				type:'GET',
     				dataType:'json',
     				data:{'id':id},
     				success:function(response){
     					if(response.success=="ok"){
     						 swal({                                  
                                title: "",
                                text:"<strong><span style='color:#F8BB86'>No se puede cancelar la Orden de Servicio #ESE"+id+" ya que hay estudios en proceso o iniciados.</span></strong>",
                                html: true,
                                type: "warning",   
                                confirmButtonText: "OK"                                                 
                            });
     						  setTimeout(function(){     


     						  	location.reload();   

     						  }, 1800);

     					}
     					else if(response.success=="update_os"){
     					 swal({                                  
                                title: "",
           						text:"<strong><span style='color:#F8BB86'>La Orden de Servicio #ESE"+id+
          						" se ha cancelado correctamente</span></strong>",
                                html: true,
                                type: "success",   
                                confirmButtonText: "OK"                                                 
                            });
     						  setTimeout(function(){     


     						  	location.reload();   

     						  }, 1800);

     					}

     				},
     				 //end success
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}


     	});
		}
		var cerrar_os=function(id){
			var token = $('meta[name="csrf-token"]').attr('content');
			  $.ajax({
           			headers: {'X-CSRF-TOKEN':token},
           			url:'{{url('cerrar_os')}}',
     				type:'GET',
     				dataType:'json',
     				data:{'id':id},
     				success:function(response){
     					if(response.success=="ok"){
     						 swal({                                  
                                title: "",
                                text:"<strong><span style='color:#F8BB86'>No se puede cerrar la Orden de Servicio #ESE"+id+" ya que cueta con estudios disponibles</span></strong>",
                                html: true,
                                type: "warning",   
                                confirmButtonText: "OK"                                                 
                            });
     						  setTimeout(function(){     


     						  	location.reload();   

     						  }, 1800);

     					}
     					else if(response.success=="update_os"){
     					 swal({                                  
                                title: "",
           						text:"<strong><span style='color:#F8BB86'>La Orden de Servicio #ESE"+id+
          						" se ha cerrado correctamente</span></strong>",
                                html: true,
                                type: "success",   
                                confirmButtonText: "OK"                                                 
                            });
     						  setTimeout(function(){     


     						  	location.reload();   

     						  }, 1800);

     					}

     				},
     				 //end success
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}


     	});
		}
        var Mensaje=function(mns){
        	$("#detalle").html('<div class="panel-body bg-red text-white text-center"><p><strong>'+mns+'</strong></p></div>');

        }
		var iniciarTabla = function(){

            var data_table =$("#data-table").DataTable({
                                dom: 'Blfrtip',
                                columnDefs:[
                                	{ "width": "5%", "targets": 0 },
                                	{ "width": "10%", "targets": 5 },
                                	{ "width": "10%", "targets": 6 }
                                ],
                                buttons: [
                                       {
                extend: 'excelHtml5',
                title: 'Listado de Ordenes de servicio',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Ordenes de Servicio',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Ordenes de Servicio',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
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
                                    $('[data-toggle="tooltip"]').popover({
                                        delay: { "show": 500, "hide": 100 },
                                        trigger:'focus'

                                    });
                                },
                                
                            } );
                
        }
    var number_format = function(amount, decimals) {
		    amount += ''; // por si pasan un numero en vez de un string
		    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
		    decimals = decimals || 0; // por si la variable no fue fue pasada
		    // si no es un numero o es igual a cero retorno el mismo cero
		    if (isNaN(amount) || amount === 0) 
		        return parseFloat(0).toFixed(decimals);
		    // si es mayor o menor que cero retorno el valor formateado como numero
		    amount = '' + amount.toFixed(decimals);
		    var amount_parts = amount.split('.'),
		        regexp = /(\d+)(\d{3})/;
		    while (regexp.test(amount_parts[0]))
		        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

		    return amount_parts.join('.');
		};
	</script>
@endsection

	