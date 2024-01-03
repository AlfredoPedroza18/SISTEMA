@extends('layouts.master')
@section('section')

<!-- begin #content -->

<div id="content" class="content">

	<ol class="breadcrumb ">
		@if( $peticion == 'catalogo/listado_contratos' )
		<li><a href="javascript:;">Catálogo</a></li>
		@else
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		@endif	
		<li>Contratos</li>

	</ol>
	
	<h1 class="page-header text-center">LISTADO DE CONTRATOS <small></small></h1>
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
                            <h4 class="panel-title text-center table-responsive">Listado Contratos</h4>
                        </div>
                        <div class="panel-body" id="lista-contratos">    
                        	                             	
                        		<table id="data-table" class="table table-striped table-bordered table-responsive">
								 <thead>
								 <tr>	
								        											
	                                    <th>Cliente</th>
	                                    <th class="hidden-md hidden-lg">#</th>	
	                                    <th>Servicio</th>	                                    
	                                    <th>Centro Negocio</th>	                                    
	                                    <th>Empresa Fcturadora</th>
	                                    <th>N° Contrato</th>
	                                    <th>Fecha Inicio</th>
	                                    <th>Fecha Fin</th>
	                                    <th >#</th>
                                       </tr>
						                           </thead>
						                          <tbody>
						                    @foreach($contratos as $key=>$value)
						                           	<tr>
						                           	
						                           	 <td>{{ $value->nombre_comercial}}</td>
						                           	 <td class="hidden-md hidden-lg">
							                    		<span><a class="genera-contrato" onclick="descargaContrato({{ $value->id_servicio}},{{ $value->id}})">
							                    			<i class="fa fa-book fa-2x"></i>
							                    		 </a
							                    		</span><br>
							                    		<input type="hidden" class="contrato-id" value="{{ $value->id}}" >
							                    		<input type="hidden" class="contrato-servicio-cotizacion" value="{{ $value->id_servicio}}" >
							                    		<input type="hidden" class="contrato-id-cotizacion" value="{{ $value->id_cotizacion}}">
							                    		<input type="hidden"  class="contrato-id-cliente" value="{{ $value->id_cliente}}" >
							                    	</td>
						                           	 <td>{{ $value->servicio}}</td>						                           	 
						                           	 <td>{{ $value->centro_negocio}}</td>
						                           	 <td>{{ $value->nombre}}</td>
						                           	 <td>{{ $value->no_contrato}}</td>
						                           	 <td>{{ $value->fecha_inicio}}</td>
						                           	 <td>{{ $value->fecha_fin}}</td>
						                           	 <td>
							                    		<span><a class="genera-contrato" onclick="descargaContrato({{ $value->id_servicio}},{{ $value->id}})">
							                    			<i class="fa fa-book fa-2x"></i>
							                    		 </a
							                    		</span><br>
							                    		<input type="hidden" class="contrato-id" value="{{ $value->id}}" >
							                    		<input type="hidden" class="contrato-servicio-cotizacion" value="{{ $value->id_servicio}}" >
							                    		<input type="hidden" class="contrato-id-cotizacion" value="{{ $value->id_cotizacion}}">
							                    		<input type="hidden"  class="contrato-id-cliente" value="{{ $value->id_cliente}}" >
							                    	</td>
						                           	</tr>
						                    @endforeach
						                          </tbody>
						      </table>   
                        </div>
                    </div>
       
	</div>

</div> <!--End  content-->



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

		
	//TableManageCombine.init();

	$(document).ready(function(){
		$("table#search").hide();
		iniciarTabla();
		
	});

									
		function redireccionar(ruta){
		  window.location=ruta;		  
		}
	


	var descargaContrato = function(servicio,contrato_id){
				
		if(servicio == 0) ruta_download = '{{ url('descarga_contrato_ese') }}';			        
		if(servicio == 1) ruta_download = '{{ url('descarga_contrato_rys') }}';
		if(servicio == 2) ruta_download = '{{ url('descarga_contrato_maquila') }}';	
		if(servicio == 3) ruta_download = '{{ url('descarga_contrato_psicometricos') }}';
        if(servicio == 4) ruta_download = '{{ url('descarga_contrato_generico') }}';

		redireccionar(ruta_download+'/'+contrato_id);
	}

	var iniciarTabla = function(){

            var data_table =$("#data-table").DataTable({
                                dom: 'Blfrtip',
                                buttons: [
                                       {
                extend: 'excelHtml5',
                title: 'Listado de contratos',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de contratos',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de contratos',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }
             }
                                ],
                                responsive: true,
                                autoFill: true,                                
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
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 0 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        
                                    
                                }
                           
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