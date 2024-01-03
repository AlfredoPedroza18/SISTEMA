@extends('layouts.master')
@section('section')



<!-- begin #content -->

<div id="content" class="content">

    <ol class="breadcrumb ">
        <li><a href="{{url('dashboard')}}">CRM</a></li>
        <li>Reporte Cotizaciones</li>

    </ol>

    <h1 class="page-header text-center">REPORTE COTIZACIONES <small></small></h1>


    <div class="row">
        <div class="row">

            <label class="col-md-1 control-label text-right">Rango: </label>
            <div class="col-md-3 col-xs-12 col-sm-12">                
                <div class="input-group input-daterange">
                    <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" id="reporte_fecha_inicio">
                    <span class="input-group-addon"> a </span>
                    <input type="text" class="form-control" name="end" placeholder="Fecha Fin" id="reporte_fecha_fin">
                </div>
            </div>            
            <div class="col-md-2 col-md-offset-6">
                <div class="form-group">                    
                    <button class="btn btn-success" id="btn-generar-reporte">Reporte</button>                    
                </div>
            </div>        

        
        </div>
        <div class="row" style="margin-top: 10px;">
            @permission('reportes.cotizaciones.cn')
            <label class="col-md-1 control-label text-right">CN</label>
            <div class="col-md-2">
                <div class="form-group">
                    <select class=" form-control" id="select_cn">
                        
                    </select>
                </div>
            </div>
            @endpermission
            @permission('reportes.cotizaciones.sector')
            <label class="col-md-1 control-label text-right">Sector</label>
            <div class="col-md-2">
                <div class="form-group">
                    <select class=" form-control" id="select_sector">
                        
                    </select>
                </div>
            </div>
            @endpermission
            @permission('reportes.cotizaciones.servicio')
            <label class="col-md-1 control-label text-right">Servicio
            </label>
            <div class="col-md-2">
                <div class="form-group">
                    <select class=" form-control" id="select_servicio">
                             
                    </select>
                </div>
            </div>
            @endpermission
            
            

            <div class="col-md-3      col-xs-12 col-sm-12">
               <div class="invoice-price">
                  <div class="invoice-price-right">
                   <small>TOTAL GENERAL REPORTE</small> 
                   <div id="total-cotizaciones-reportes">$ 00.00</div>
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
                </div>
                <h4 class="panel-title text-center table-responsive">Listado Cotizaciones</h4>
            </div>
            <div class="panel-body" id="lista-cotizaciones">    

   
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
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/moment.js') !!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') !!}
    
	
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script type="text/javascript">
        $(document).ready(function(){
            $(".input-daterange").datepicker({
                Format: 'yy-mm-dd'
            });
            
            filtros_reporte.init();
            $('#btn-generar-reporte').click(function(){
                generarReporte();
                
                
            });

        });

        var generarReporte = function(){
            
            var reporte_fecha_inicio    = $('#reporte_fecha_inicio').val();
            var reporte_fecha_fin       = $('#reporte_fecha_fin').val();
            var fecha_inicio            = reporte_fecha_inicio.split('/');
            var fecha_fin               = reporte_fecha_fin.split('/');
            var filtro_fecha_inicio     = fecha_inicio[2]+'-'+fecha_inicio[0]+'-'+fecha_inicio[1];
            var filtro_fecha_fin        = fecha_fin[2]+'-'+fecha_fin[0] +'-'+ fecha_fin[1];
            var reporte_select_cn       = $('#select_cn').val();
            var reporte_select_sector   = $('#select_sector').val();
            var reporte_select_servicio = $('#select_servicio').val();            
            var is_admin                = @if(Auth::user()->is('admin')) true @else false @endif;            
            var where_select_cn         = (reporte_select_cn=='-1' || typeof reporte_select_cn === 'undefined' ) ? '':' AND crm_cotizaciones.id_cn = '+reporte_select_cn;
            var where_select_sector     = (reporte_select_sector=='-1' || typeof reporte_select_sector === 'undefined' )      ? '':' AND actividad_economica.id = '+reporte_select_sector;
            var where_select_servicio   = (reporte_select_servicio=='-1' || typeof reporte_select_servicio === 'undefined')    ? '':' AND crm_cotizaciones.id_servicio = '+reporte_select_servicio;
            var url                     = '{{url('reporte_cotizaciones')}}';
            var where_fecha_inicio      = (reporte_fecha_inicio=='' && reporte_fecha_fin=='')  ? '':
            ' AND DATE_FORMAT(crm_cotizaciones.fecha_cotizacion,"%Y-%m-%d") BETWEEN DATE_FORMAT("'+filtro_fecha_inicio+'","%Y-%m-%d") AND DATE_FORMAT("'+filtro_fecha_fin+'","%Y-%m-%d")';

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data:{
                        reporte_fecha_inicio:reporte_fecha_inicio,            
                        reporte_fecha_fin:reporte_fecha_fin,                        
                        reporte_select_cn:reporte_select_cn,                        
                        reporte_select_sector:reporte_select_sector,                        
                        reporte_select_servicio:reporte_select_servicio,                        
                        is_admin:is_admin,                        
                        where_fecha_inicio:where_fecha_inicio,                                                                       
                        where_select_cn:where_select_cn,                        
                        where_select_sector:where_select_sector,                        
                        where_select_servicio:where_select_servicio                        

                },
                success:function(response){
                        str_table_cotizaciones = 
                        '<table id="data-table" class="display table table-striped table-bordered table-responsive">'+
                            ' <thead> '+
                                ' <tr> '+
                                    ' <th>Cliente</th> '+
                                    ' <th>Servicio</th> '+
                                    ' <th>Monto</th> '+
                                    ' <th>Fecha</th> '+
                                    ' <th>Ejecutivo</th> '+
                                    ' <th>CN</th> '+
                                ' </tr> '+
                            ' </thead> '+
                            ' <tfoot> '+
                                ' <tr> '+
                                    
                                    ' <th colspan="6" class="text-center"></th> '+
                                    
                                ' </tr> '+
                            ' </tfoot> '+
                            ' <tbody>'; 
                        $.each(response,function(indice){
                            str_table_cotizaciones +=
                                '<tr>'+            
                                    '<td>'+response[indice].nombre_comercial+'</td>'+
                                    '<td>'+response[indice].nombre_servicio+'</td>'+
                                    '<td>$ '+number_format(response[indice].total,2)+'</td>'+
                                    '<td>'+response[indice].fecha_cotizacion+'</td>'+
                                    '<td>'+response[indice].name+'</td>'+
                                    '<td>'+response[indice].nomenclatura+'</td>'+                
                                '</tr>';
                        });
                        str_table_cotizaciones += ' <tbody> </table>'

                        $('#lista-cotizaciones').html('').append(str_table_cotizaciones);
                        iniciarTabla();
                       
                },
                error : function(jqXHR, status, error) {
                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                }
            });


            
        }

        var filtros_reporte = {

            init:function(){
                this.select_cn();
                this.select_sector();
                this.select_servicio();
                
            },
            select_cn:function(){
                url_cn = '{{ url('reportes_get_cn') }}';
                this.peticion_ajax('select_cn',url_cn);                
            },
            select_sector:function(){
                url_sector = '{{ url('reportes_get_sector') }}';

                this.peticion_ajax('select_sector',url_sector);
            },
            select_servicio:function(){
                url_servicio = '{{ url('reportes_get_servicio') }}';
                this.peticion_ajax('select_servicio',url_servicio);
            },
            peticion_ajax:function(id_select,url){
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data:{status:status},
                    success:function(response){
                        str_html_select ='<option value="-1">Todos</option>';
                        $.each(response,function(indice){                            
                            str_html_select += '<option value="'+response[indice].id+'">'+response[indice].valor+'</option>';                            
                        });
                        $('#'+id_select).html('');
                        $('#'+id_select).append(str_html_select);
                    },
                    error : function(jqXHR, status, error) {
                        swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                    }
                });
            }
        }
		var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Blfrtip',
                                buttons: [
                                     {
                                                                extend: 'excelHtml5',
                                                                title: 'Reporte de cotizaciones',
                                                                 exportOptions: {
                                                                    columns: [ 0, 1, 2,3,4,5 ]
                                                                }

                                                            },
                                                            {
                                                                extend: 'pdfHtml5',
                                                                title: 'Reporte de cotizaciones',
                                                                
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
                                                                title: 'Reporte de cotizaciones',
                                                                exportOptions: {
                                                                    columns: [ 0, 1, 2,3,4,5 ]
                                                                }
                                                             }

                                ],
                                responsive: true,
                                autoFill: true,
                                "scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));
                                    
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