@extends('layouts.masterMenuView')
@section('section')
<div id="content" class="content">
	<ol class="breadcrumb ">
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		<li>Reporte de contratos</li>
	</ol>

	<h1 class="page-header text-center">Reporte de contratos generados <small></small></h1>

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
	    @permission('reportes.contrato.cn')
	    <div class="col-md-2">
	        		 <div class="form-group">
                                  <label class="control-label">{{ Form::label('CN','CN') }}</label>

{{ Form::select('cn',$cn,null,['id'=>'cn','class'=>' form-control']) }}


				  </div>

	    </div>
	    @endpermission

	    @permission('reportes.contrato.sector')
	    <div class="col-md-2">
	     <div class="form-group">
                                  <label class="control-label">{{ Form::label('Sector', ' Sector') }}</label>

{{ Form::select('sector',$sector,null,['id'=>'sector','class'=>' form-control']) }}

				  </div>


				  </div>
		@endpermission
	@permission('reportes.contrato.servicio')
	  <div class="col-md-2">
	     <div class="form-group">
                                  <label class="control-label">{{ Form::label('Servicio', ' Servicio') }}</label>
{{ Form::select('servicios',$servicios,null,['id'=>'servicio','class'=>' form-control']) }}


				  </div>
	   </div>
	   @endpermission
	   <div class="col-md-2">
	     <div class="form-group">
	       {{ Form::button('Reporte', ['class' => 'btn btn-success','id' => 'listar_contratos','type'=>'button']) }}
	       </div>
	     </div>
	  
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-9 col-xs-12 col-sm-12">
           <div class="invoice-price">
              <div class="invoice-price-right">
               <small>TOTAL GENERAL CONTRATOS</small> 
               <div id="total-contratos-reportes">$ 00.00</div>
               <input type="hidden" class="form-control" id="total_ese" name="total_ese">
              </div>
           </div><!-- end invoice price-->
        </div>
	</div>

	<p></p>
	
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
                            <h4 class="panel-title text-center table-responsive">Reporte de contratos generados</h4>
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
	
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script type="text/javascript">
	$(".input-daterange").datepicker({
		Format: 'yy-mm-dd'
        });


	$(document).ready(function(){

 $("#listar_contratos").on('click',function(){
   var finicio= $("#fecha_inicio").val();
   var ffin=$("#fecha_fin").val();
   var cn=$("#cn").val();
   var servicio=$("#servicio").val();
   var sector=$("#sector").val();


	$.ajax({
					url: '{{ url('reporteContratos') }}',
					type: 'GET',
					dataType: 'json',
					data:{finicio:finicio,ffin:ffin,cn:cn,servicio:servicio,sector:sector},
					success:function(query_con){
				
						   var listadoContratos="";
						       listadoContratos+='<table id="data-table" class="display table table-striped table-bordered table-responsive">';
						        listadoContratos+='<thead>';
											       listadoContratos+='<tr>';
										                listadoContratos+='<th>Cliente</th>';
										                listadoContratos+='<th>Servicio</th>';
										                listadoContratos+='<th>Empresa Fctiuradora</th>';
										                listadoContratos+='<th>N° Contrato</th>';
										                listadoContratos+='<th>Total</th>';
										                listadoContratos+='<th>Fecha Inicio</th>';
										                listadoContratos+='<th>Fecha Fin</th>';
										            listadoContratos+='</tr></thead>';
													listadoContratos+=' <tfoot> '+
								                                		' <tr> '+								                                    
								                                    		' <th colspan="6" class="text-center"></th> '+
										                                ' </tr> '+
										                            ' </tfoot> ';
										            listadoContratos+='<tbody>';
										            $.each(query_con,function(indice){
														             listadoContratos+='<tr>';
														                 listadoContratos+='<td>'+ query_con[indice].nombre_comercial+'</td>';
														                 listadoContratos+='<td>'+ query_con[indice].servicio+'</td>';
														                 listadoContratos+='<td>'+ query_con[indice].nombre+'</td>';
														                 listadoContratos+='<td>'+ query_con[indice].no_contrato+'</td>';
														                 listadoContratos+='<td>$ '+ number_format(query_con[indice].total,2)+'</td>';
														                 listadoContratos+='<td>'+ query_con[indice].fecha_inicio+'</td>';
														                 listadoContratos+='<td>'+ query_con[indice].fecha_fin+'</td>';
														             listadoContratos+='</tr>';
												  });
														         listadoContratos+=' </tbody>';
														         listadoContratos+='</table>';
														         $('#tabla-result').empty().append(listadoContratos);
									 		$("#data-table").DataTable({
													        dom: 'Blfrtip',
													        buttons: [
													           {
												                extend: 'excelHtml5',
												                title: 'Reporte de contratos generados',
												                exportOptions: {
												                    columns: [ 0, 1, 2 ,3,4,5,6]
												                }         
												            },
												            {
												                extend: 'pdfHtml5',
												                title: 'Reporte de contratos generados',
												                pageSize: 'LEGAL',
												                exportOptions: {
												                    columns: [ 0, 1, 2 ,3,4,5,6]
												                }
												                 
												            },
												             {
												                extend: 'copyHtml5',
												             },
												             {
												                extend: 'print',
												                title: 'Reporte de contratos generados',
												                exportOptions: {
												                    columns: [ 0, 1, 2 ,3,4,5,6]
												                }
												             }

													        ],
													        responsive: true,
													        autoFill: true,
													        "scrollY": "350px",
                                							"paging": true,
													        "footerCallback": function ( row, data, start, end, display ) {
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
							                                            .column( 4 )
							                                            .data()
							                                            .reduce( function (a, b) {
							                                                return intVal(a) + intVal(b);
							                                            }, 0 );
							                             
							                                        // Total over this page
							                                        pageTotal = api
							                                            .column( 4, { page: 'current'} )
							                                            .data()
							                                            .reduce( function (a, b) {
							                                                return intVal(a) + intVal(b);
							                                            }, 0 );
							                             
							                                        // Update footer
							                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
							                                        $('#total-contratos-reportes').html('$ '+number_format(total,2));
							                                        
							                                }
													   
													    } );

							},
					error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
					}
				});





 });

});


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