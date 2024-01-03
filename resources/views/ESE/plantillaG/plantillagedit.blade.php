@extends('layouts.masterMenuView')

@section('section')

<!doctype html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />



    <style type="text/css">

        .modal-dialog-scr{

            overflow-y: initial !important

        }

        .modal-body-scr{

            height: 500px;

            overflow-y: auto;



        }

          table {

      

            table-layout:fixed;

            text-align: center;

        }

        table td {

          
            word-wrap: break-word;

           
            max-width: 300px;

            text-align: center;

        }

         

        .table-container {
                
            max-height: 450px;

            max-width: 2000px;

            overflow: auto; 
           

        
        }
          
        
       
        #data-table thead {
          
            position: sticky;

            top: 0;

            z-index: 2;
          
        }



        #grid td {

            white-space:inherit;

        }

        td.details-control {

            background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;

            cursor: pointer;

        }

        tr.shown td.details-control {

            background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;

        }

        ul.social-network {

            list-style: none;

            display: inline;

            margin-left:0 !important;

            padding: 0;

        }

        ul.social-network li {

            display: inline;

            margin: 0 5px;

        }

        .social-network a.icoRss:hover {

            background-color: #348fe2;

        }

        .social-network a.icoRssDiana:hover {

			{{--background-color: #33bdbd;--}}

			 background-color: #348fe2;

        }

        .social-network a.icoRss:hover i,a.icoRssDiana:hover i, a.icoGoogle:hover i{

		  color:#fff;

        }

        .social-network a.icoGoogle:hover {

		{{-- background-color: #BD3518;--}}

		 background-color: #348fe2;

        }

        a.socialIcon:hover, .socialHoverClass {

            color:#44BCDD;

        }

        .social-circle li a {

            display:inline-block;

            position:relative;

            margin:0 auto 0 auto;

            -moz-border-radius:50%;

            -webkit-border-radius:50%;

            border-radius:50%;

            text-align:center;

            width: 6.5em;

            height: 6.5em;

            font-size:10px;

            background-color: #D8D8D8;

        }

        .social-circle li i {

            margin:0;

            line-height:3em;

            text-align: center;

        }

        .social-circle li a:hover i, .triggeredHover {

            -moz-transform: rotate(360deg);

            -webkit-transform: rotate(360deg);

            -ms--transform: rotate(360deg);

            transform: rotate(360deg);

            -webkit-transition: all 0.2s;

            -moz-transition: all 0.2s;

            -o-transition: all 0.2s;

            -ms-transition: all 0.2s;

            transition: all 0.2s;

        }

        .social-circle i {

            color: #3a3a3a;

            -webkit-transition: all 0.8s;

            -moz-transition: all 0.8s;

            -o-transition: all 0.8s;

            -ms-transition: all 0.8s;

            transition: all 0.8s;

        }

        .jumbotron{

            padding-top: 12px;

            padding-bottom:0px;

            height:100%;

            display: flex;

            align-items: center;

            justify-content: center;



        }

        #em{

            padding-left: 30px;

        }

        .col-md-2{

            width: auto;

            padding-left: 30px;

        }





    </style>

</head>

<div class="content">

	<ol class="breadcrumb ">

    <li><a href="{{ route('sig-erp-ese::configuracion.index') }}">Configuraciones</a></li>

        <li><a href='{{ route("sig-erp-ese::PlantillaGenericaP.index") }}'>Plantilla Genérica</a></li>



	        <li>Plantilla Genérica</li>



	</ol>





		<h1 class="page-header text-center">Plantilla Genérica </h1>





			    <!-- <div class="row">

					<div class="col-md-12 text-right">



                                <a href="#" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="modal" data-target="#create" data-placement="top" title="" data-original-title="Alta de Subgrupo">

									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>

								</a>





						<label>Añadir</label>

					</div>

				</div> -->



                <div class="modal fade " id="create" data-backdrop="static" data-keyboard="false">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">

                                    <span>×</span>

                                </button>

                                <h4>Añadir</h4>

                            </div>

                            <form method="GET" action="{{ url('GuardarPlantillaP')}}">

                                <div class="modal-body" >

                                        <input name="VaIn" id="VaIn" type="hidden" value="{{$VaIn}}"/>

                                        <label for="serv" class="col-form-label">Tipo Servicio:</label>

                                        <div class="col-md-13">

                                            <div class="input-group" id="servicios" name="servicios">

                                                <select class="form-control" name="ts" id="ts" required>

                                                    <option value="">Seleccione un Tipo Servicio</option>

                                                    @foreach($servicios as $ts)

                                                    <option value="{{ $ts->IdTipoServicio }}" >{{ $ts->Descripcion }}</option>

                                                    @endforeach

                                                </select>

                                                <span class="input-group-addon">

                                                    <i class="fa fa-bars"></i>

                                                </span>

                                            </div>

                                        </div>



                                        <div class="col-md-13">

                                            <div class="input-group" >

                                            <input type="text" id="DescripcionPlantilla" name="DescripcionPlantilla" class="form-control" required />



                                                <span class="input-group-addon">

                                                    <i class="fa fa-bars"></i>

                                                </span>

                                            </div>

                                        </div>



                                </div>

                                <div class="modal-footer">

                                    <button id="Guardar" type="submit" class="btn btn-success" >Guardar</button>

                                    <!-- <input type="submit" class="btn btn-success"  value="Guardar" id="Guardar" name="Guardar"/> -->

                                </div>





                            </form>

                        </div>

                    </div>

                </div>



				<br>







				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

						<div class="panel-heading">

							<div class="panel-heading-btn">

							</div>



								<h4 class="panel-title">Plantilla Genérica - {{$Descripcion}}</h4>



						</div>

		        <div class="panel-body">





		            <hr>

		            @if (session('success'))

			            <div class="row">

			            	<div class="col-md-12">

			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">



									 {{ session('success') }}

									<span class="close" data-dismiss="alert">×</span>

								</div>

			            	</div>

			            </div>

			        @endif

                    <input type="hidden" id="IdPlantilla" name="IdPlantilla" value="{{ $IdPlantilla or '' }}">





        <div class="row">

        <div class="col-md-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#foto" type="button" value="Preview" >Agregar Campo</button>
        </div>
                
        <div class="col-md-4 offset-md-4"></div>
        
        <div class="col-md-4 offset-md-4">
            <a style="margin-left: 150px; " class="btn btn-success " href="{{url('plantilla/'.$IdPlantilla)}}" target="_blank" >Previzualizar Plantilla</a>       
             
        </div>
            
             
        </div>
         



            <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoTitle"  aria-hidden="true" >

              <div class="modal-dialog modal-dialog-scr modal-lg" role="document">

                <div class="modal-content">

                  <div class="modal-body modal-body-scr">





                    <table id="TablaEntradas" class="display  table-bordered table-responsive" cellspacing="0" width="100%">

                        <thead>

                            <tr>

                                <th></th>

                                <th>&nbsp;</th>

                                <th>Contenedor</th>

                                <th>Agrupador</th>

                                <th>Clasificación</th>

                                <th>IdAgrupador</th>

                                <th>Campo</th>

                                <th>Apariciones</th>

                                <th>CE</th>

                                <th>Acción</th>

                            </tr>

                        </thead>

                     </table>



                  </div>

                  <div class="modal-footer">

                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>

                    <button id="submitButton" type="button" class="btn btn-warning" data-dismiss="modal" onclick="hacer_click_GuardarPCE()" disabled>Guardado Múltiple</button>



                  </div>

                </div>

              </div>

            </div>

            <br><br>
               
            


                <form id="tableP">

                <div class="table-container">

					<table id="data-table" class="display table  table-bordered table-responsive" class="sticky-header">

						<thead >

						<tr>

                            <th>&nbsp;</th>

                            <th>Id</th>

							<th>Contenedor</th>

                            <th>Clasificacion</th>

                            <th>Grupo</th>

                            <th>Campo</th>

                            <th>Requerido</th>

                            <th>Visible en Form</th>

                            <th>Visible en Reporte</th>

                            <th>Visible en Grid</th>

                            <th>Visible en Solic</th>

                            <th>Presencial</th>

                            <th>Telefónico</th>

                            <th>Temp Edita</th>

                            <th>Tipo Dato</th>

                            <th>Indice</th>

                            <th>OC</th>

                            <th>OA</th>

                            <th>Orden</th>

							<!-- <th>Acción</th> -->

						</tr>

						</thead>

						<tbody>

                        @php

                            $i = 0;

                            $o = 0;

                        @endphp

						@foreach($pentrada as $pe)

							<tr>


                                @php 
                                    if($i%20==0)
                                        $o++;
                                @endphp
                                <td><input type="checkbox" id="IdPE{{$i}}" name="IdPE{{$o}}" value="{{ $pentrada->IdPlantillaEntrada or '' }}" ></td>

                                <td>{{ $pe->IdPlantillaEntrada }}</td>

                                <td>{{ $pe->Grupo }}</td>

                                <td>{{ $pe->Subgrupo }}</td>

                                <td>{{ $pe->Clasificacion }}</td>

                                <td>{{ $pe->Entrada }}</td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="Requerido{{$i}}" name="Requerido"  {{  ($pe->Requerido == 1 ? ' checked' : '') }} ></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleFr{{$i}}" name="visibleFr"  {{  ($pe->VisibleForms == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleRep{{$i}}" name="visibleRep" {{  ($pe->VisibleReportes == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleGrid{{$i}}" name="visibleGrid"  {{  ($pe->VisibleGrids == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="VisibleOSClientes{{$i}}" name="VisibleOSClientes"  {{  ($pe->VisibleOSClientes == 1 ? ' checked' : '') }}></td>

                                

                                <td scope="col"><input type="checkbox" class="form-check-input" id="Presencial{{$i}}" name="Presencial"  {{  ($pe->Presencial == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="Telefonico{{$i}}" name="Telefonico"  {{  ($pe->Telefonico == 1 ? ' checked' : '') }}></td>



                                <td scope="col"><input type="checkbox" class="form-check-input" id="TempEdit{{$i}}" name="TempEdit"  {{  ($pe->TempUsrEdita == 1 ? ' checked' : '') }}></td>

                                <td>{{ $pe->tipo }}</td>

                                <td>{{ $pe->Indice }}</td>

                                <td>{{ $pe->OC }}</td>

                                <td>{{ $pe->OA }}</td>

                                <td>{{ $pe->Orden }}</td>



							</tr>

                            @php

                                $i++;

                            @endphp

						@endforeach

						</tbody>

					</table>
                </div>


                    <br />



                            <!-- <div class="col-md-6">

                                <div class="form-group col-md-13">

                                    <div class="col-md-12 col-md-offset-11 text-right"> -->



                                        <input type="button" id="GuardarPE" name="GuardarPE" value="Guardar" class="btn btn-success col-md-2 col-md-11 " onclick="hacer_click_GuardarPE({{$o}})">



                                    <!-- </div>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group col-md-6">

                                    <div class="col-md-12 col-md-offset-12 text-right"> -->



                                        <input type="button" id="EliminarPE" name="EliminarPE" value="Eliminar" class="btn btn-success col-md-2 col-md-7" onclick="hacer_click_EliminarPE({{$o}})">


                                        
                                    <!-- </div>

                                </div>

                            </div> -->









                    <!-- <input type="submit" class="btn btn-success" value="Guardar" id="btnGet" name="btnGet"/> -->

                    <!-- <input id = "btnGet" type="button" value="Guardar" class="btn btn-success col-md-2 col-md-offset-11 text-right"/> -->

		        </form>

                </div>

		    </div>







</div>



@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')

{!! Html::script('assets/js/sweetalert.min.js') !!}







<script type="text/javascript">



$.ajax({

                url: "{{ url('llenartabla') }}",

                type: "GET",

                dataType: "json",

                success: function(response){



                    // alert(response);

                    $.each(response, function(index, value){

                        llenar(response, index, value);

                    });

                }



            });





$('#Guardar').click(function(){

    var ts = $("#ts").val();

        var dp = $("#DescripcionPlantilla").val();



        if((ts=='' ) || (dp=='')){

        }else{

            if( $("#VaIn").val()==1){

                $("#create").modal('hide');

                // $("#VaIn").val(0);

            }

        }



});













    var mostrarValor = function(x){

        var p=document.getElementById('valcnt').value=x;

    };



   





	$(document).ready(function(){









    $('tr').click(function() {



            var checkbox = $(this).find('td:first').find('input');



            if (checkbox.is(':checked')) {

            } else {

                checkbox.attr('checked', true);



            }



            checkbox.change(function(){

                    if (checkbox.is(':checked')) {

                        checkbox.attr('checked', false);

                    }

                    else{

                        checkbox.attr('checked', true);

                    }

                });



    });








        var val = $("#VaIn").val();





        if($("#VaIn").val()!=1){

            $("#create").modal('show');

            $("#VaIn").val(1);

        }







    	iniciarTabla();



    	$('[data-toggle="popover"]').popover({

    		delay: { "show": 500, "hide": 100 },

    		trigger:'focus'



        });



        $('#cnt').on('change',function(){

            var NomEmp = $(this).val();

        });



        $('#grupos').change(function() {

			var datos;

            datos = $("#IdContenedor").val();



				$.ajax({

					url: '{{ url('ValidacionPG') }}',

					type:'GET',

					data: {datos:datos},

					success: function(response){

                        // alert(response);

                        // $("#CodigoEstado").html(response[0]);

                        $("#subgrupo").html(response[0]);

                        $("#campo").html(response[1]);



					}

                });

		});



        $('#sg').change(function() {

			var datos;

            datos = $("#subgrupo").val();



				$.ajax({

					url: '{{ url('ValidacionPC') }}',

					type:'GET',

					data: {datos:datos},

					success: function(response){

                        // alert(response);

                        // $("#CodigoEstado").html(response[0]);

                        // $("#subgrupo").html(response[0]);

                        $("#campo").html(response[0]);



					}

                });

        });









    });





	var iniciarTabla = function(){



        var data_table =$("#data-table").DataTable({

                                dom: 'Bfrtip',

                                "aoColumnDefs": [

                                    { "bVisible": false, "aTargets": [15] },

                                    { "bVisible": false, "aTargets": [16] },

                                    { "bVisible": false, "aTargets": [17] }

                                    ],

                                    "order": [[ 13, "asc" ], [ 14, "asc" ], [ 4, "asc" ],[ 12, "asc" ],[ 15, "asc" ]],



                                buttons: [

                                    {

                extend: 'excelHtml5',

                title: 'Listado de Plantilla Genérica',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4,]

                }

            },

            {

                extend: 'pdfHtml5',

                title: 'Listado de Plantilla Genérica',

                pageSize: 'LEGAL',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4, ]

                }



            },

             {

                extend: 'copyHtml5',

             },

             {

                extend: 'print',

                title: 'Listado de Plantilla Genérica',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4, ]

                }

             }



                                ],

                                responsive: true,

                                autoFill: true,



                                "paging": false,

                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

                                dom:'Blfrtip' ,

                                "drawCallback": function( settings ) {

							        $('[data-toggle="popover"]').popover({

							    		delay: { "show": 500, "hide": 100 },

							    		trigger:'focus'



							    	});

							    },





                            } );



                            // $('#data-table').DataTable().page('last').draw('page');



        }





</script>



<script>



function abrirmodal(){

    var val = $("#VaIn").val();





        if($("#VaIn").val()!=1){

            $("#create").modal('show');

            $("#VaIn").val(1);

        }

}



function hacer_click_GuardarPCE(){

    var arr=[];

    var arr = $("#TablaEntradas input[id=IdEntradaE]:checked").map(function() {

                var row = $(this).closest("tr")[0];

                arr = [

                    row.cells[0].children[0].value,

                    ];



            return arr;



          }).get();

            console.log(arr);



          var datos;

            datos = $("#IdPlantilla").val();



            console.log(datos);
            
        $.ajax({

            // headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('UpdateCamposME') }}/'+datos,

            type:'GET',

            dataType: 'json',

            data: {arr:arr},

            success: function(response){

                console.log("response: "+ response);



                    setTimeout(function(){

                        location.href = "{{ url('PlantillaRPEdit') }}/"+response+"";

                    },500);

            },

            error : function(jqXHR, status, error) {



                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });







    }



    function hacer_click_GuardarPE(valor){



    for(var i=0; i<valor+1; i++){
    
     var arr=[];
     var arr = $("#data-table input[name=IdPE"+i+"]:checked").map(function() {

                var row = $(this).closest("tr")[0];

                arr = [row.cells[0].innerHTML,

                       row.cells[1].innerHTML,

                       row.cells[2].innerHTML,

                       row.cells[3].innerHTML,

                       row.cells[4].innerHTML,

                       row.cells[5].innerHTML,

                       row.cells[6].childNodes[0].checked,

                       row.cells[7].childNodes[0].checked,

                       row.cells[8].childNodes[0].checked,

                       row.cells[9].childNodes[0].checked,

                       row.cells[10].childNodes[0].checked,

                       row.cells[11].childNodes[0].checked,

                       row.cells[12].childNodes[0].checked,

                       row.cells[13].childNodes[0].checked,

                    ];

            return arr;

          }).get();

          console.log(arr);

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('UpdatePlantillaP') }}',

            type:'GET',

            dataType: 'json',

            data: {arr:arr},



            success: function(response){

                location.href = '{{ route("sig-erp-ese::PlantillaGenericaP.index") }}';

            },

            error : function(jqXHR, status, error) {



                //swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });

    }
    }







    function llenar(response, index, value){





        var datos;

            datos = $("#IdPlantilla").val();

        var oTable = $('#TablaEntradas').DataTable({

        "bProcessing": true,

        "destroy": true,

        "paging":   false,

        "data": response,

        "columns":[

            {

                 "data": "IdEntrada",

                 "render": function (data) {

                    if(datos==''){

                        return "<a href='' onclick=\"return abrirmodal();\"><span class='btn-success form-control' style='text-align:center'>Agregar</span></a>"

                    }else{

                       return '<input type="checkbox" id="IdEntradaE" name="IdEntradaE" value="'+data+'" >';

                    }



                    }

            },

            {

                    "className": "details-control",

                    "orderable": false,

                    "defaultContent": ""

                },



            {"data":"Contenedor"},

            {"data":"Agrupador"},

            {"className": "replyIdClass",

            "data":"Clasificacion"},

            {"className": "replyClass",

            "data":"IdAgrupador"},

            {"data":"Campo"},

            {"data":"CantidadApariciones"},

            {"data":"CE"},

            {

                 "data": "IdEntrada",

                "render": function (data) {

                    if(datos==''){

                        return "<a href='' onclick=\"return abrirmodal();\"><span class='btn-success form-control' style='text-align:center'>Agregar</span></a>"

                    }else{

                        // return "<a href='{{ url('GuardarEntradaPlantillaP') }}/"+data+"/"+datos+"' ><span class='btn-success form-control' style='text-align:center'>Agregar</span></a>"

                        return "<a href='{{ url('GuardarEntradaPlantillaPEdit') }}/"+data+"/"+datos+"' ><span class='btn-success form-control' style='text-align:center'>Agregar</span></a>"

                    }


                }

            }

        ],

        "aoColumnDefs": [{ "bVisible": false, "aTargets": [8] }],



        retrieve: true,

        // dom: 'Blfrtip',

            "language": {

              "sProcessing":     "",

              "sLengthMenu":     "Mostrar _MENU_ registros",

              "sZeroRecords":    "No se encontraron resultados",

              "sEmptyTable":     "Ningún dato disponible en esta tabla",

              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

              "sInfoPostFix":    "",

              "sSearch":         "Buscar:",

              "searchPlaceholder": "Escribe aquí para buscar..",

              "sUrl":            "",

              "sInfoThousands":  ",",

              "sLoadingRecords": "<img style='display: block;width:100px;margin:0 auto;' src='assets/img/loading.gif' />",

              "oPaginate": {

                "sFirst":    "Primero",

                "sLast":     "Último",

                "sNext":     "Siguiente",

                "sPrevious": "Anterior"

              },

              "oAria": {

                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

                "sSortDescending": ": Activar para ordenar la columna de manera descendente"

              }

            }

    });









 // Add event listener for opening and closing details

 $('#TablaEntradas tbody').on('click', 'td.details-control', function() {


    var clasificacion = $(this).closest("tr").find('.replyIdClass').text();

    var IdAgrupador = $(this).closest("tr").find('.replyClass').text();



            var tr = $(this).closest('tr');

            var row = $('#TablaEntradas').DataTable().row(tr);

            if (row.child.isShown()) {

                row.child.hide();

                format().hide();

                tr.removeClass('shown');

            } else {

                format(row.child, clasificacion,IdAgrupador).show();

                tr.addClass('shown');

            }



  });










  function format(callback, clasificacion,IdAgrupador) {



    $.ajax({

        type: "GET",

        url: "{{ url('llenardetalles') }}/"+clasificacion+"/"+IdAgrupador,

        dataType: "json",

        cache: false,

        complete: function (response) {

            var data = JSON.parse(response.responseText);

            // console.log(data);

            var tbody = "";

            tbody = data;

            // console.log("<table>" + tbody + "</table>");

        callback($("<table>" + tbody + "</table>")).show();

        },

    });

}







var counterChecked = 0;



            $('body').on('change', 'input[id="IdEntradaE"]', function() {



                    this.checked ? counterChecked++ : counterChecked--;

                counterChecked > 0 ? $('#submitButton').prop("disabled", false): $('#submitButton').prop("disabled", true);



            });



}








    function hacer_click_EliminarPE(valor){


    for(var i=0; i<valor+1; i++){
        var datos;

            datos = $("#IdPlantilla").val();

     var arr=[];

     var arr = $("#data-table input[name=IdPE"+i+"]:checked").map(function() {

                var row = $(this).closest("tr")[0];

                arr = [row.cells[0].innerHTML,

                       row.cells[1].innerHTML,

                       row.cells[2].innerHTML,

                       row.cells[3].innerHTML,

                       row.cells[4].innerHTML,

                       row.cells[5].innerHTML,

                       row.cells[6].childNodes[0].checked,

                       row.cells[7].childNodes[0].checked,

                       row.cells[8].childNodes[0].checked,

                       row.cells[9].childNodes[0].checked,

                       row.cells[10].childNodes[0].checked,



                    ];



            return arr;

          }).get();

    

        $.ajax({

            // headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('DeletePlantillaP') }}',

            type:'GET',

            dataType: 'json',

            data: {arr:arr,datos:datos},

            success: function(response){

                setTimeout(function(){

                        location.href = "{{ url('PlantillaRPEdit') }}/"+response+"";

                    },500);

            },

            error : function(jqXHR, status, error) {



               
            }

        });

        }
    }



    

    </script>



@endsection

