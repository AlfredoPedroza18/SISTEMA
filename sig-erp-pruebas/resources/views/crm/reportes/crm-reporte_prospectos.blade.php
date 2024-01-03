@extends('layouts.master')
@section('section')
<div id="content" class="content">
    <ol class="breadcrumb ">
        <li><a href="{{url('dashboard')}}">CRM</a></li>
        <li>Reporte de Prospectos</li>
    </ol>

    <h1 class="page-header text-center">Reporte de Prospectos<small></small></h1>

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
        @permission('reporte.prospecto.cn')
        <div class="col-md-2">
                     <div class="form-group">
                                  <label class="control-label">{{ Form::label('CN','CN') }}</label>

{{ Form::select('cn',$cn,null,['id'=>'cn','class'=>' form-control']) }}


                  </div>

        </div>
        @endpermission

        @permission('reporte.prospecto.sector')
        <div class="col-md-2">
         <div class="form-group">
                                  <label class="control-label">{{ Form::label('Sector', ' Sector') }}</label>

{{ Form::select('sector',$sector,null,['id'=>'sector','class'=>' form-control']) }}

                  </div>


                  </div>
        @endpermission
  
       <div class="col-md-2">
         <div class="form-group">
           {{ Form::button('Reporte', ['class' => 'btn btn-success','id' => 'listar_prospectos','type'=>'button']) }}
           </div>
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
                            <h4 class="panel-title text-center table-responsive">Listado de Prospectos</h4>
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

 $("#listar_prospectos").on('click',function(){
   var finicio= $("#fecha_inicio").val();
   var ffin=$("#fecha_fin").val();
   var cn=$("#cn").val();
   var sector=$("#sector").val();


    $.ajax({
                    url: '{{ url('listaProspectos') }}',
                    type: 'GET',
                    dataType: 'json',
                    data:{finicio:finicio,ffin:ffin,cn:cn,sector:sector},
                    success:function(query_con){
                      
                 

                
                           var listadoProspectos="";
                               listadoProspectos+='<table id="data-table" class="display table table-striped table-bordered table-responsive">';
                                listadoProspectos+='<thead>';
                                                   listadoProspectos+='<tr>';
                                                        listadoProspectos+='<th>Cliente</th>';
                                                        listadoProspectos+='<th>Sector</th>';
                                                        listadoProspectos+='<th>Gerencia</th>';
                                                        listadoProspectos+='<th>Contacto</th>';
                                                        listadoProspectos+='<th>Cargo</th>';
                                                        listadoProspectos+='<th>Departamento</th>';
                                                        listadoProspectos+='<th>Teléfono</th>';
                                                        listadoProspectos+='<th>Celular</th>';
                                                        listadoProspectos+='<th>Correo</th>';
                                                    listadoProspectos+='</tr></thead>';
                                                    
                                                    listadoProspectos+='<tbody>';
                                                    $.each(query_con,function(indice){
                                                                     listadoProspectos+='<tr>';
                                                                         listadoProspectos+='<td>'+ query_con[indice].nombre_cliente+'</td>';
                                                                         listadoProspectos+='<td>'+ query_con[indice].actividad_economica+'</td>';
                                                                         listadoProspectos+='<td>'+ query_con[indice].nombre_cn+'</td>';
                                                                         listadoProspectos+='<td>'+ query_con[indice].nombre_contacto+' '+query_con[indice].apellido_paterno+' '+query_con[indice].apellido_materno+'</td>';
                                                                         listadoProspectos+='<td>'+query_con[indice].cargo+'</td>';
                                                                         listadoProspectos+='<td>'+query_con[indice].departamento+'</td>';
                                                                         listadoProspectos+='<td>'+query_con[indice].telefono1+'</td>';
                                                                         listadoProspectos+='<td>'+ query_con[indice].celular1+'</td>';
                                                                         listadoProspectos+='<td>'+ query_con[indice].correo1+'</td>';
                                                                     listadoProspectos+='</tr>';
                                                  });
                                                                 listadoProspectos+=' </tbody>';
                                                                 listadoProspectos+='</table>';
                                                                 $('#tabla-result').empty().append(listadoProspectos);
                                            $("#data-table").DataTable({
                                                            dom: 'Blfrtip',
                                                            buttons: [
                                                            
            {
                extend: 'excelHtml5',
                title: 'Reporte de Prospectos',
                 exportOptions: {
                    columns: [ 0, 1, 2,3,4,5,6,7,8 ]
                } 

            },
            {
                extend: 'pdfHtml5',
                title: 'Reporte de Prospectos',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5,6,7,8 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
              {
                extend: 'print',
                title: 'Reporte de Prospectos',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5,6,7,8 ]
                }
             }
                                                              ],
                                                            responsive: false,
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