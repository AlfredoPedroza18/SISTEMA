
@extends('layouts.master')

@section('section')

<!-- begin #content agenda -->
     

<div id="content" class="content">
		<ol class="breadcrumb ">
		
		<li><a href="{{url('dashboardese')}}">ESE</a></li>
		<li>Reporte</li>
		
	</ol>
	
	<h1 class="page-header text-center">Reporte <small></small></h1>
	<br>

<!-- FILTROS ------------------------------------------------>
<div class="panel panel-inverse">
	<div class="panel-heading">
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		</div>
		<h4 class="panel-title">Control de ESE</h4>
	</div>

	<div class="panel-body table-responsive">
	<div class="row">
		<div class="col-md-12">
			 @include('ESE.reporte.filtros')
			 </div>
	</div>
</div>
<!-- END FILTROS ------------------------------------------------>

					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Reporte de ESE</h4>
						</div>

						<div class="panel-body table-responsive">
						<center>{!! Html::image('assets/img/iconoCargando.gif','a picture', array('style' => 'display:none','class' => 'loading')) !!}</center>
						<div id="reporte_ver"></div>
							
						</div>
					</div>
					<!-- GRAFICAS  ESE.reporte.graficas ------------------------------------------------>
						 @include('ESE.reporte.graficas');
					 <!-- END GRAFICAS ------------------------------------------------>
				</div><!-- end content-->

			</div><!-- En panel general body-->

	</div><!-- end container-->

  

@endsection

@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')
	{!! Html::script('assets/plugins/select2/dist/js/select2.min.js') !!}
	{!! Html::script('assets/plugins/bootstrap-daterangepicker/moment.js')!!}
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
	
	
		{!! Html::script('assets/js/highcharts.js') !!}
		{!! Html::script('assets/js/exporting.js') !!}
		
<script type="text/javascript">
$(document).ready(function(){
var count_num_columnas=0;
	$(".js-example-basic-multiple").select2({
		 placeholder: "Selecciona una opción",
          allowClear: true
	});
	$(".btn-success").on("click",function(){
      var cliente=$("#id_cliente").val();
      var tipo=$("#id_tipo").val();
      var localidad=$("#localidad").val();
      var candidato=$("#id_candidato").val();
      var periodo=$("#periodo").val();
      var cn=$("#cn").val();
      $('#reporte_ver').empty();
      $('#container-cliente').empty();
      $('#container-localidad').empty();
      $('#container-tipo').empty();
      $('#container-xmes').empty();
      $('#container-grafica_diasTarda').empty();
      $('#container-grafica_cierreTarda').empty();
      $.ajax({
      	  url:"{{url('reporteGeneral')}}",
      	  type:"GET",
      	  dataType:"json",
      	  data:{"cliente":cliente,"tipo":tipo,"localidad":localidad,"candidato":candidato,"periodo":periodo,"cn":cn},
      	  beforeSend: function() {
	      $(".loading").fadeIn("slow");
         
          },
      	  success:function(response){
      	  	var table='';
      	  	if(response.exito=="ok"){

//response.encabezado[0].nombre_encabezado
             table+='<table class="table table table-striped table-bordered" id="data-table">';
					table+='<thead> ';
							table+='<tr>';
							$.each(response.encabezado,function(indice){
								count_num_columnas++;
					   				table+='<th>'+response.encabezado[indice].nombre_encabezado+'</th>';
							});
					table+='</tr>';
								table+='</thead>';
								table+='<tbody>';
									
									$.each(response.success,function(indice,v ){
										table+='<tr>';
										   $.each(v,function(key,value){

			  							table+='<td>'+value+'</td>';
			  						  });
										table+='</tr>';   
			  						});
									
								table+='</tbody>';
								table+='<tfoot> ';
										table+='<tr>';
							         	$.each(response.encabezado,function(indice){
								
					   						table+='<td>'+response.encabezado[indice].nombre_encabezado+'</td>';
							        	});
										table+='</tr>';


								table+='</tfoot> ';

							table+='</table>';
							 $('#reporte_ver').empty().append(table);
                       iniciarTabla(count_num_columnas);
                       // console.log(count_num_columnas);
                        @include('ESE.reporte.JsGraficasReporteEse.graf_cliente');
                        @include('ESE.reporte.JsGraficasReporteEse.graf_tipo');
                        @include('ESE.reporte.JsGraficasReporteEse.graf_localidad');
                        @include('ESE.reporte.JsGraficasReporteEse.graf_xmes');
                        @include('ESE.reporte.JsGraficasReporteEse.grafica_diasTarda');
                        @include('ESE.reporte.JsGraficasReporteEse.grafica_cierreTarda');
                       


                       //----------------END GRAFICAS ------------------//


      	  	}else if(response.exito=="error"){
      	  		var mns_busqueda='<center>'+
      	  	 	                    '<span class="fa-stack fa-2x ">'+
									'<i class="fa fa-search-1x"></i>'+
									'<i class="fa fa-ban fa-stack-2x text-danger"></i>'+
								    '</span>'+'<h3>No se encontraron resultados </h3></center>';

      	  	 $('#reporte_ver').html('<center>'+
      	  	 	                    '<span class="fa-stack fa-2x ">'+
									'<i class="fa fa-search-1x"></i>'+
									'<i class="fa fa-ban fa-stack-2x text-danger"></i>'+
								    '</span>'+'<h3>No se encontraron registros en la búsqueda. </h3></center>');
      	  	 $('#container-cliente').html(mns_busqueda);
      	  	 $('#container-localidad').html(mns_busqueda);
      	  	 $('#container-tipo').html(mns_busqueda);
      	  	 $('#container-xmes').html(mns_busqueda);
      	  	 $('#container-grafica_diasTarda').html(mns_busqueda);
      	  	 $('#container-grafica_cierreTarda').html(mns_busqueda);


      	  	}
      	  },
					
		  error : function(jqXHR, status, error) {
					            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
		  },
		  complete: function() {
        	  $(".loading").fadeOut("slow");

          }



      });
	
      // alert(cliente+"\n"+tipo+"\n"+localidad+"\n"+candidato+"\n"+periodo+"\n"+cn );
	});


$('input[name="periodo"]').daterangepicker({ format: 'YYYY/MM/DD'});//daterange picker calendario

    
 });// END DOCUMENT READY	
var iniciarTabla = function(count_numcolumnas){
	var columnas=[];
	for(i=0;i<=(count_numcolumnas-1);i++){
		 columnas.push(i);
	}
	 console.log(columnas);
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Control ESE',
                exportOptions: {
                    columns: columnas
                    
                }         
            },
           
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Control ESE',
                exportOptions: {
                    columns: columnas
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
//                                "scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                                 dom:'Blfrtip' 
							      } );
            $('#data-table tfoot td').each( function () {
		        var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
		    } );


		    data_table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );

          
                
        }


   var getMes=function(array){
     var mes=['','Enero', 
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'];
    
        for(i=0;i< array.length;i++){
            t=array[i].name

            mes[t];
            array[i].name=mes[t];
        }


     return array;
}
</script>


@endsection