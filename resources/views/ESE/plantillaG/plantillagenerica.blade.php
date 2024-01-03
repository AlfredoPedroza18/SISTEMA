@extends('layouts.masterMenuView')

@section('section')

<!doctype html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">

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
              
         }




        #grid td {

            white-space:inherit;

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

        <li><a href="javascript:;">Plantilla Genérica</a></li>



	        <li>Plantilla Genérica</li>



	</ol>





		<h1 class="page-header text-center">Plantilla Genérica</h1>








                <div class="modal fade " id="create" data-backdrop="static" data-keyboard="false">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <!-- <button type="button" class="close" data-dismiss="modal">

                                    <span>×</span>

                                </button> -->

                                <h4>Añadir</h4>

                            </div>

                            <form method="GET" action="{{ url('GuardarPlantilla')}}">

                                <div class="modal-body" >

                                  <input name="VaIn" id="VaIn" type="hidden" value="{{$VaIn}}"/>

                                  <div class="row">

                                    <div class="col-md-12">

                                      <label for="serv" class="col-form-label">Servicios:</label>

                                        <div class="input-group" id="servicios" name="servicios">

                                            <select class="form-control" name="ts" id="ts" required>

                                                <option value="">Seleccione un Servicio</option>

                                                @foreach($servicios as $ts)

                                                <option value="{{ $ts->IdTipoServicio }}" >{{ $ts->Descripcion }}</option>

                                                @endforeach

                                            </select>

                                            <span class="input-group-addon">

                                                <i class="fa fa-bars"></i>

                                            </span>

                                        </div>

                                    </div>





                                    <div class="col-md-12">

                                      <label for="serv" class="col-form-label">Tipo Servicio:</label>

                                        <div class="input-group" id="Tiposervicio" name="Tiposervicio">

                                            <select class="form-control" name="Tiposervicios" id="Tiposervicios" required>

                                                <option value="">Seleccione un Tipo Servicio</option>

                                                @foreach($tipos as $ts)

                                                <option value="{{ $ts->IdTipos }}" >{{ $ts->Tipos }}</option>

                                                @endforeach

                                            </select>

                                            <span class="input-group-addon">

                                                <i class="fa fa-bars"></i>

                                            </span>

                                        </div>

                                    </div>





                                    <div class="col-md-12">

                                      <label for="DescP" class="col-form-label">Descripcion Plantilla:</label>

                                        <div class="input-group" >

                                        <input type="text" id="DescripcionPlantilla" name="DescripcionPlantilla" class="form-control" required />



                                            <span class="input-group-addon">

                                                <i class="fa fa-bars"></i>

                                            </span>

                                        </div>

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

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

							</div>



								<h4 class="panel-title">Plantilla Genérica </h4>



						</div>

		        <div class="panel-body">

            <form method="GET" action="{{ url('GuardarEntradaPlantilla')}}" >

                <div class="col-md-30">

                    <div class="row">

                    <input type="hidden" id="IdPlantilla" name="IdPlantilla" value="{{ $IdPlantilla or '' }}">



                        <div class="col-md-2">

                            <div class="form-group">

                                <label class="col-md-4 control-label">Campo:</label>

                                <div class="col-md-13">

                                    <div class="input-group">



                                        <select class="form-control" name="IdCampo" id="IdCampo" required>



                                            @foreach($campos as $c)

                                            <option value="{{ $c->IdContenedor }}:{{ $c->IdAgrupador }}:{{ $c->IdEntrada }}:{{ $c->Clasificacion }}" >{{ $c->Campo }}</option>

                                            @endforeach

                                        </select>



                                    <span class="input-group-addon">

						                    <i class="fa fa-bars"></i>

						                </span>

                                    </div>

                                </div>

                            </div>

                        </div>





                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group col-md-20">

                                    <div class="col-md-12 col-md-offset-12 text-right">

                                    

                                        <input type="submit" class="btn btn-success" value="Agregar" id="Agregar" name="Agregar"/>



                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>







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









                <form id="tableP">

                <div>

					<table id="data-table" class="display table table-striped table-bordered table-responsive"  >

						<thead>

						<tr>

                            <th>&nbsp;</th>

                            <th>Id</th>

							<th>Grupo</th>

                            <th>Subgrupo</th>

                            <th>Clasificación</th>

                            <th>Campo</th>

                            <th>Requerido</th>

                            <th>Visible en Form</th>

                            <th>Visible en Reporte</th>

                            <th>Visible en Grid</th>

                            <th>Visible en Solic</th>

                            <th>Temp Edita</th>

						</tr>

						</thead>

						<tbody>



						@foreach($pentrada as $pe)

							<tr>

                                <td><input type="checkbox" id="IdPE" name="IdPE" value="{{ $pentrada->IdPlantillaEntrada or '' }}" ></td>

                                <td>{{ $pe->IdPlantillaEntrada }}</td>

                                <td>{{ $pe->Grupo }}</td>

                                <td>{{ $pe->Subgrupo }}</td>

                                <td>{{ $pe->Clasificacion }}</td>

                                <td>{{ $pe->Entrada }}</td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="Requerido" name="Requerido"  {{  ($pe->Requerido == 1 ? ' checked' : '') }} ></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleFr" name="visibleFr"  {{  ($pe->VisibleForms == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleRep" name="visibleRep" {{  ($pe->VisibleReportes == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleGrid" name="visibleGrid"  {{  ($pe->VisibleGrids == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="VisibleOSClientes" name="VisibleOSClientes"  {{  ($pe->VisibleOSClientes == 1 ? ' checked' : '') }}></td>

                                <td scope="col"><input type="checkbox" class="form-check-input" id="TempEdit" name="TempEdit"  {{  ($pe->TempUsrEdita == 1 ? ' checked' : '') }}></td>



							</tr>

						@endforeach

						</tbody>

					</table>

                </div>

                    <br />



                            


                                        <input type="button" id="GuardarPE" name="GuardarPE" value="Guardar" class="btn btn-success col-md-2 col-md-11 " onclick="hacer_click_GuardarPE()">






                                        <input type="button" id="EliminarPE" name="EliminarPE" value="Eliminar" class="btn btn-success col-md-2 col-md-7" onclick="hacer_click_EliminarPE()">




		        </form>

                </div>

		    </div>







</div>



@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')









<script type="text/javascript">



$('#Guardar').click(function(){

    if( $("#VaIn").val()==1){

            $("#create").modal('hide');

            // $("#VaIn").val(0);

        }

});





    var mostrarValor = function(x){

        var p=document.getElementById('valcnt').value=x;

     };







	 $(document).ready(function(){

     document.getElementById("menu-ese").style.display="block";





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


                        $("#campo").html(response[0]);



					}

                });

        });









    });



	var iniciarTabla = function(){



        var data_table =$("#data-table").DataTable({

                                dom: 'Bfrtip',

                                buttons: [

                                    {

                extend: 'excelHtml5',

                title: 'Listado de Plantilla Genérica',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4 ]

                }

            },

            {

                extend: 'pdfHtml5',

                title: 'Listado de Plantilla Genérica',

                pageSize: 'LEGAL',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4 ]

                }



            },

             {

                extend: 'copyHtml5',

             },

             {

                extend: 'print',

                title: 'Listado de Plantilla Genérica',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4 ]

                }

             }



                                ],

                                responsive: true,

                                autoFill: true,



                                "paging": true,

                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

                                dom:'Blfrtip' ,

                                "drawCallback": function( settings ) {

							        $('[data-toggle="popover"]').popover({

							    		delay: { "show": 500, "hide": 100 },

							    		trigger:'focus'



							    	});

							    },





                            } );



                            $('#data-table').DataTable().page('last').draw('page');



        }





</script>



<script>

    function hacer_click_GuardarPE(){

        console.log('plantilla generica');

        // alert("eeeeee");

       //     var message;



     var arr=[];

     var arr = $("#data-table input[id=IdPE]:checked").map(function() {

                var row = $(this).closest("tr")[0];

                arr = [row.cells[0].innerHTML,

                       row.cells[1].innerHTML,

                       row.cells[2].innerHTML,

                       row.cells[3].innerHTML,

                       row.cells[4].innerHTML,

                       row.cells[5].childNodes[0].checked,

                       row.cells[6].childNodes[0].checked,

                       row.cells[7].childNodes[0].checked,

                       row.cells[8].childNodes[0].checked,

                       row.cells[9].childNodes[0].checked,



                    ];


            return arr;

          }).get();




        $.ajax({

            // headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('UpdatePlantilla') }}',

            type:'GET',

            dataType: 'json',

            data: {arr:arr},

            success: function(response){



                    setTimeout(function(){

                        location.href = '{{ route("sig-erp-ese::PlantillaGenerica.index") }}';

                    });


            },

            error : function(jqXHR, status, error) {



                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });







    }



    function hacer_click_EliminarPE(){

        var datos;

            datos = $("#IdPlantilla").val();

      var arr=[];

       var arr = $("#data-table input[id=IdPE]:checked").map(function() {

                var row = $(this).closest("tr")[0];

                arr = [row.cells[0].innerHTML,

                       row.cells[1].innerHTML,

                       row.cells[2].innerHTML,

                       row.cells[3].innerHTML,

                       row.cells[4].innerHTML,

                       row.cells[5].childNodes[0].checked,

                       row.cells[6].childNodes[0].checked,

                       row.cells[7].childNodes[0].checked,

                       row.cells[8].childNodes[0].checked,

                       row.cells[9].childNodes[0].checked,



                    ];



            return arr;

          }).get();



        $.ajax({

            // headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('DeletePlantilla') }}',

            type:'GET',

            dataType: 'json',

            data: {arr:arr,datos:datos},

            success: function(response){


                setTimeout(function(){

                        location.href = "{{ url('PlantillaR') }}/"+response+"";

                    });


            },

            error : function(jqXHR, status, error) {



                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });







    }





    </script>



@endsection

