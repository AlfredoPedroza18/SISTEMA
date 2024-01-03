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
        }
        table td {
            word-wrap: break-word;
            max-width: 400px;
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

        .ocultar{
          display: none;
        }
    </style>
</head>
<div class="content">
	<ol class="breadcrumb ">

        <li><a href="{{route('sig-erp-ese::PlantillaCliente.index')}}">Plantilla Cliente</a></li>

	        <li>Plantilla Cliente</li>

	</ol>


		<h1 class="page-header text-center">Plantilla Cliente</h1>


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
                                <!-- <button type="button" class="close" data-dismiss="modal">
                                    <span>×</span>
                                </button> -->
                                <h4>Añadir</h4>
                            </div>
                            <!-- <form id="plantillacliente" method="GET" action="{{ url('GuardarPlantillaCliente')}}"> -->
                            <form id="plantillacliente" >
                                <div class="modal-body" >
                                        <input name="VaIn" id="VaIn" type="hidden" value="{{$VaIn}}"/>
                                        <input name="idc" id="idc" type="hidden" value="{{$idc or ''}}"/>
                                        <div class="row">
                                          <div class="col-md-12">
                                                <label for="serv" class="col-form-label">Cliente:</label>
                                                <div class="">
                                                    <select class=" form-control selectpicker" multiple data-live-search="true" name="ct" id="ct" required>
                                                        @foreach($clientes as $cl)
                                                            <option value="{{ $cl->IdCliente }}" >{{ $cl->Nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- <div class="input-group" id="clientes" name="clientes">
                                                    <select class="form-control" name="ct" id="ct" required>

                                                      @foreach($clientes as $cl)
                                                      <option value="{{ $cl->IdCliente }}" >{{ $cl->Nombre }}</option>
                                                      @endforeach
                                                    </select>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </span>
                                                </div> -->
                                          </div>

                                          <div class="col-md-12">
                                            <label for="serv" class="col-form-label">Servicio:</label>
                                              <div class="input-group" id="servicio" name="servicio">
                                                  <select class="form-control" name="serv" id="serv" onchange="mostrar(this);" required>
                                                      <option value=''>Seleccione un Servicio</option>
                                                      @foreach($servicios as $s)
                                                      <option value="{{ $s->IdTipoServicio }}" >{{ $s->Servicio }}</option>
                                                      @endforeach
                                                  </select>
                                                  <span class="input-group-addon">
                                                      <i class="fa fa-bars"></i>
                                                  </span>
                                              </div>
                                          </div>

                                          <div class="col-md-12 ocultar" id="tipos">
                                            <label for="serv" class="col-form-label">Tipo Servicio:</label>
                                              <div class="input-group" id="TiposervicioD" name="TiposervicioD">
                                                  <select class="form-control" name="Tiposervicios" id="Tiposervicios" onchange="FPlantillas();" >
                                                      <option id="na" value="">Seleccione un Tipo Servicio</option>
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
                                            <label for="DescP" class="col-form-label">Plantilla:</label>
                                              <div class="input-group" id="plantillas" name="plantillas">
                                                  <select class="form-control" name="pl" id="pl" required>


                                                  </select>
                                                  <span class="input-group-addon">
                                                      <i class="fa fa-bars"></i>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    @if ($id==0)
                                      <a href="{{ url('PlantillaCliente')}}" class="btn btn-danger">Cancelar</a>
                                    @else
                                      <a href="#" class="btn btn-danger" onclick="cancelar();">Regresar</a>
                                    @endif
                                    <button id="GuardarM" type="submit" class="btn btn-success" >Guardar</button>
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

								<h4 class="panel-title">Plantilla Cliente</h4>

						</div>
		        <div class="panel-body">

				<input type="hidden" id="IdPlantilla" name="IdPlantilla" value="{{ $IdPlantillaCliente or '' }}">

                <input type="hidden" id="IdClientes" name="IdClientes" value="{{ $IdClientes or '' }}">
                <input type="hidden" id="IdPlantillasClientes" name="IdPlantillasClientes" value="{{ $IdPlantillasClientes or '' }}">
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

					<table id="data-table" class="display table table-striped table-bordered table-responsive">
						<thead>
						<tr>
                            <th>&nbsp;</th>
                            <th>Id</th>
							<th>Grupo</th>
                            <th>Subgrupo</th>
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
                            <th>Clasificacion </th>
                            <th>Orden Contenedor</th>
                            <th>Orden Agrupador</th>
                            <th>Orden </th>
						</tr>
						</thead>
						<tbody>
                        @php
                            $i = 0;
                        @endphp
						@foreach($pentrada as $pe)
							<tr>
                                <td><input type="checkbox" id="IdPE" name="IdPE" value="{{ $pentrada->IdPlantillaClienteEntrada or '' }}" ></td>
                                <td>{{ $pe->IdPlantillaClienteEntrada }}</td>
                                <td>{{ $pe->Grupo }}</td>
                                <td>{{ $pe->Subgrupo }}</td>
                                <td>{{ $pe->Entrada }}</td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="Requerido" name="Requerido"  {{  ($pe->Requerido == 1 ? ' checked' : '') }} ></td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleFr" name="visibleFr"  {{  ($pe->VisibleForms == 1 ? ' checked' : '') }}></td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleRep" name="visibleRep" {{  ($pe->VisibleReportes == 1 ? ' checked' : '') }}></td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="visibleGrid" name="visibleGrid"  {{  ($pe->VisibleGrids == 1 ? ' checked' : '') }}></td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="VisibleOSClientes" name="VisibleOSClientes"  {{  ($pe->VisibleOSClientes == 1 ? ' checked' : '') }}></td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="Presencial{{$i}}" name="Presencial"  {{  ($pe->Presencial == 1 ? ' checked' : '') }}></td>
                                <td scope="col"><input type="checkbox" class="form-check-input" id="Telefonico{{$i}}" name="Telefonico"  {{  ($pe->Telefonico == 1 ? ' checked' : '') }}></td>                                
                                <td scope="col"><input type="checkbox" class="form-check-input" id="TempEdit" name="TempEdit"  {{  ($pe->TempUsrEdita == 1 ? ' checked' : '') }}></td>
                                <td>{{ $pe->tipo }}</td>
                                <td>{{ $pe->Indice }}</td>
                                <td>{{ $pe->Clasificacion }}</td>
                                <td>{{ $pe->OrdenC }}</td>
                                <td>{{ $pe->OrdenA }}</td>
                                <td>{{ $pe->Orden }}</td>
							</tr>
                            @php
                                $i++;
                            @endphp
						@endforeach
						</tbody>
					</table>

                    <br />

                            <!-- <div class="col-md-6">
                                <div class="form-group col-md-13">
                                    <div class="col-md-12 col-md-offset-11 text-right"> -->

                                        <input type="button" id="GuardarPE" name="GuardarPE" value="Guardar" class="btn btn-success col-md-2 col-md-11 " onclick="hacer_click_GuardarPE()">

                                    <!-- </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group col-md-6">
                                    <div class="col-md-12 col-md-offset-12 text-right"> -->

                                        <input type="button" id="EliminarPE" name="EliminarPE" value="Eliminar" class="btn btn-success col-md-2 col-md-7" onclick="hacer_click_EliminarPE()">

                                        <input type="button" id="ReasignarPE" name="ReasignarPE" value="Reasignar" class="btn btn-success col-md-2 col-md-7" onclick="hacer_click_ReasignarPE()">

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




<script type="text/javascript">
document.getElementById("menu-ese").style.display="block";
$('#Guardar').click(function(){
    if( $("#VaIn").val()==1){
            $("#create").modal('hide');
            // $("#VaIn").val(0);
        }
});


function cancelar(){
  var e=$("#ct").val();
//   console.log(e);
  setTimeout(function(){
      // if(urlA==Nurl){
      location.href = '{{ url("PlantillaClienteCI") }}/'+e;

  },500);
}

function mostrar(val){
  if(val.value==3){
    $("#tipos").removeClass('ocultar');
    $("#Tiposervicios").prop('required',true);
  }else{
    $("#na").attr('selected')
    $("#tipos").addClass('ocultar');
    $("#Tiposervicios").prop('required',false);
    var Idserv = $("#serv").val();
    var Idtipos = $("#Tiposervicios").val();
    Idtipos=0;
    if((Idserv!='')){
        $.ajax({
                        url: "{{ url('FPlantillas') }}/"+Idserv+"/"+Idtipos,
                        type: "GET",
                        dataType: "json",
                        success: function( response )
                        {
                            // console.log(response[0]);
                            $('#pl').attr('disabled', false);
                            $("#pl").html(response[0]);
                            // $('#ordencampoCC').val(response[0]);
                            //  $("#GuardarCreateC").attr('disabled', false);
                        },
                        error : function(xhr, status)
                        {
                            console.error('Upss, algo salio mal!!');
                        }
                    });
    }else{
        $('#pl').attr('disabled', true);
        $("#pl").html('');
        // $('#GuardarM').attr('disabled',false);
    }
                    
  }
}

function FPlantillas(){
    var Idserv = $("#serv").val();
    var Idtipos = $("#Tiposervicios").val();
            // var Clas = $("#clasificacioncampoC").val();
            if((Idserv!='')){
            //     $("#GuardarCreateC").attr('disabled', true);
            //     $("#alertaClasificacion").html("");
                    $.ajax({
                        url: "{{ url('FPlantillas') }}/"+Idserv+"/"+Idtipos,
                        type: "GET",
                        dataType: "json",
                        success: function( response )
                        {
                            // console.log(response[0]);
                            $('#pl').attr('disabled', false);
                            $("#pl").html(response[0]);
                            // $('#ordencampoCC').val(response[0]);
                            //  $("#GuardarCreateC").attr('disabled', false);
                        },
                        error : function(xhr, status)
                        {
                            console.error('Upss, algo salio mal!!');
                        }
                    });
                
            }else{
                $('#pl').attr('disabled', true);
                $("#pl").html('');
                // $('#GuardarM').attr('disabled',false);
            //     $("#alertaClasificacion").html("<label style='color:#ffa100;'> <strong> Llenar el Campo Clasificación. </strong> </label>");
            }
}



// $('#plantillacliente').submit(function(){
    $('#GuardarM').on('click',function(e){
    $('#GuardarM').attr('disabled',true);
    var ct= $("#ct").val();
    console.log("ct: "+ct);
    var pl= $("#pl").val();
    console.log(pl);
    if((pl!=null) && (pl!='')){
        var uant = document.referrer;
        var origin   = window.location.origin;
        var urlA   = uant.replace(origin,"");
        // console.log("pathname: "+$(location).attr('pathname'));
            // if(urlA=='/PlantillaxCliente'){
            if (urlA.indexOf("/PlantillaxCliente") > -1) {
                $("#ct").attr('disabled', true);

            }else{
                $("#ct").attr('disabled', false);
            }

    // var ct= $("#ct").val();
    // // console.log("ct: "+ct);
    // var pl= $("#pl").val();
    var Nurl='/PlantillaxCliente/'+ct;
    var Aurl=urlA+'/'+ct;
    // console.log("NurlPR: "+Nurl);
    // console.log("Aurl: "+Aurl);
    $.ajax({
					url: '{{ url('GuardarPlantillaCliente') }}',
					type:'GET',
					data: {ct:ct,pl:pl},
					success: function(response){
                        // console.log(response[0]);
                        // console.log(response[1]);
                        $("#IdPlantilla").val(response[0]);
                        $("#IdClientes").val(response[1]);
                        $("#IdPlantillasClientes").val(response[2]);
                        // idplantilla=$("#IdPlantilla").val();
                        idclientes=$("#IdClientes").val();
                        // console.log("idsclientes: "+idclientes);
                        idplantillasclientes=$("#IdPlantillasClientes").val();
                        // console.log("plantilla: "+idplantilla+" clientes: "+idclientes+" IdPlantillasClientes: "+idplantillasclientes);
                        setTimeout(function(){
                            // if(Aurl==Nurl){
                            if (urlA.indexOf("/PlantillaxCliente") > -1) {
                                location.href = "{{ url('PlantillaClienteRPC') }}/"+response[0]+"/"+ct;
                            }else{
                                location.href = "{{ url('PlantillaClienteR') }}/"+response[0]+"/"+idclientes+"/"+idplantillasclientes;
                            }

                    },500);

					}
                });
    return false;

    }else{
        $('#GuardarM').attr('disabled',false);
    }

    });

        //Assign Click event to Button.
        // $("#btnGet").click(function () {
        //     // var message;

        //     // //Loop through all checked CheckBoxes in GridView.
        //     // $("#data-table input[id=IdPE]:checked").each(function () {
        //     //     var row = $(this).closest("tr")[0];
        //     //     message += row.cells[1].innerHTML;
        //     //     message += "   " + row.cells[2].innerHTML;
        //     //     message += "   " + row.cells[3].innerHTML;
        //     //     message += "   " + row.cells[4].childNodes[0].checked ;
        //     //     message += "   " + row.cells[5].childNodes[0].checked ;
        //     //     message += "   " + row.cells[6].childNodes[0].checked ;
        //     //     message += "   " + row.cells[7].childNodes[0].checked ;
        //     //     message += "   " + row.cells[8].childNodes[0].checked ;

        //     //     message += "\n";
        //     // });

        //     //Display selected Row data in Alert Box.
        //     alert("a");
        //     // return false;
        //     //     var datos;
        //     //     datos=$('#tableP').serialize();
        //     // $.ajax({
        //     //     headers: {'X-CSRF-TOKEN':token},
        //     //     url:'{{ url('UpdatePlantilla') }}',
        //     //     type:'GET',
        //     //     dataType: 'json',
        //     //     data: datos,
        //     //     success: function (response) { // What to do if we succeed
        //     //         alert(response);
        //     //     },
        //     //     error : function(jqXHR, status, error) {

        //     //         swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
        //     //     }
        //     // });

        // });



    var mostrarValor = function(x){
        var p=document.getElementById('valcnt').value=x;
    };

    var uant = document.referrer;
        var origin   = window.location.origin;
        var urlA   = uant.replace(origin,"");

            // if(urlA=='/PlantillaxCliente'){
            if (urlA.indexOf("/PlantillaxCliente") > -1) {
                $("#ct").attr('disabled', true);

            }else{
                $("#ct").attr('disabled', false);
            }

	$(document).ready(function(){
        $("#pl").attr('disabled', true);
        // var uant = document.referrer;
        // var origin   = window.location.origin;
        // var urlA   = uant.replace(origin,"");
        //     console.log(urlA);
        //     if(urlA=='/PlantillaxCliente'){
        //         $("#ct").attr('disabled', true);
        //     }else{
        //         $("#ct").attr('disabled', false);
        //     }

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
        // $(function(){
        //     $("#FGP").submit(function(event){
        //         var datos = $("#FGP").serialize();

		// 		$.ajax({
		// 			url: '{{ url('GuardarPlantilla') }}',
		// 			type:'GET',
		// 			data: {datos:datos},
		// 			success: function(response){
        //                 alert(response);
        //                 // $("#CodigoEstado").html(response[0]);
        //                 // $("#subgrupo").html(response[0]);
        //                 // $("#campo").html(response[1]);

		// 			}
        //         });
        //     });
        // });



        // $(function(){
        //     $("#FGuardarEP").submit(function(event){
        //         var datos = $("#FGuardarEP").serialize();

		// 		$.ajax({
		// 			url: '{{ url('GuardarEntradaPlantilla') }}',
		// 			type:'GET',
		// 			data: {datos:datos},
		// 			success: function(response){
        //                 alert(response);
        //                 // $("#CodigoEstado").html(response[0]);
        //                 // $("#subgrupo").html(response[0]);
        //                 // $("#campo").html(response[1]);

		// 			}
        //         });
        //     });
        // });

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
                                    { "bVisible": false, "aTargets": [14] },
                                    { "bVisible": false, "aTargets": [15] },
                                    { "bVisible": false, "aTargets": [16] },
                                    { "bVisible": false, "aTargets": [17] },
                                ],
                                "order": [[ 13, "asc" ],[ 14, "asc" ],[ 12, "asc" ],[ 11, "asc" ],[ 15, "asc" ]],
                                //  "order": [[ 12, "asc" ],[ 13, "asc" ],[ 14, "asc" ]],
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

        }
</script>

<script>
    function hacer_click_GuardarPE(){
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
                       row.cells[10].childNodes[0].checked
                    //    row.cells[10].innerHTML,
                    //    row.cells[11].innerHTML,
                    //    row.cells[12].innerHTML,
                    //    row.cells[13].innerHTML,
                    //    row.cells[14].innerHTML,

                    ];
            return arr;
          }).get();
        //   console.log("arr: "+arr);
          var e=$("#ct").val();
          var clientes=$("#IdClientes").val();
          var plantillasclientes=$("#IdPlantillasClientes").val();
        //   console.log("clientes: "+clientes+" plantillasclientes: "+plantillasclientes);
          var Nurl='/PlantillaClienteC/'+e;
        //   console.log("Nurl: "+Nurl);
        //   console.log("urlA: "+urlA);
        // var Idserv = $("#serv").val();
        $.ajax({

            url:'{{ url('UpdatePlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {arr:arr,plantillasclientes:plantillasclientes},
            success: function(response){
                // console.log("plantillasclientes: "+response);
                    setTimeout(function(){
                        // if(urlA==Nurl){
                        if (urlA.indexOf("/PlantillaClienteC") > -1) {
                            location.href = '{{ url("PlantillaClienteCI") }}/'+e;
                        }else{
                            location.href = '{{ route("sig-erp-ese::PlantillaCliente.index") }}';
                        }

                    },500);

            },
            error : function(jqXHR, status, error) {

                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });



    }

    function hacer_click_EliminarPE(){
        var datos;
            datos = $("#IdPlantilla").val();
            // alert(datos);
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
                    //    row.cells[10].innerHTML,
                    //    row.cells[11].innerHTML,
                    //    row.cells[12].innerHTML,
                    //    row.cells[13].innerHTML,
                    //    row.cells[14].innerHTML,
                    ];

            return arr;
          }).get();



        $.ajax({
            url:'{{ url('DeletePlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {arr:arr,datos:datos},
            success: function(response){
                // alert(response);
                setTimeout(function(){
                        location.href = "{{ url('PlantillaClienteR') }}/"+response+"";
                    },500);

            },
            error : function(jqXHR, status, error) {

                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });



    }

    function hacer_click_ReasignarPE(){
        var datos;
            datos = $("#IdPlantilla").val();
    // var arr=[];
    // var arr = $("#data-table input[id=IdPE]:checked").map(function() {
    //             var row = $(this).closest("tr")[0];
    //             arr = [row.cells[0].innerHTML,
    //                    row.cells[1].innerHTML,
    //                    row.cells[2].innerHTML,
    //                    row.cells[3].innerHTML,
    //                    row.cells[4].innerHTML,
    //                    row.cells[5].childNodes[0].checked,
    //                    row.cells[6].childNodes[0].checked,
    //                    row.cells[7].childNodes[0].checked,
    //                    row.cells[8].childNodes[0].checked,
    //                    row.cells[9].childNodes[0].checked,

    //                 ];

    //         return arr;
    //       }).get();

        $.ajax({
            url:'{{ url('ReasignarPlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {datos:datos},
            success: function(response){
            // alert(response);
            // console.log(response);
                setTimeout(function(){
                        location.href = "{{ url('PlantillaClienteR') }}/"+response+"";
                    },500);

            },
            error : function(jqXHR, status, error) {

                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });



    }

    </script>

@endsection
