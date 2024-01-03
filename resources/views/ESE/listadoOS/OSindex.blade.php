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
        .inactive{
            cursor: default !important; /* mantiene el cursor tipo flecha.*/ 
            pointer-events: none; /* evita que el enlace redireccione. */
        }


    </style>
</head>
<div class="content">
	<ol class="breadcrumb ">
		    <li><a href="javascript:;">Listado de OS </a></li>
	        <li>Listado de OS</li>
	</ol>


		<h1 class="page-header text-center">Listado de OS</h1>
                <!-- <div class="row">
					<div class="col-md-12 text-right">
						<a href="{{ route('sig-erp-ese::ListadoOS.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de OS">
							<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
						</a>
						<label>Nueva OS</label>
					</div>
				</div> -->
				<br>



				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
							</div>

								<h4 class="panel-title">Listado de OS</h4>

						</div>
                    <div class="panel-body">

                        <input type="hidden" id="IdPlantilla" name="IdPlantilla" value="{{ $IdPlantillaCliente or '' }}">


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
                                        <th>Id</th>
                                        <th>#OS</th>
                                        <th>Módulo</th>
                                        <th>Cliente</th>
                                        <th>Departamento</th>
                                        <th>Estatus</th>
                                        <th>Fecha Solicitud</th>
                                        <th>Fecha Cierre</th>
                                        <th>Costo Servicio</th>
                                        <th>Precio Facturable</th>
                                        <th>Número Factura</th>
                                        <th>Documento</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($listadoOS as $LOS)

                                          <tr @if ($ListadoOSFilter != 0) @if ($ListadoOSFilter != $LOS->IdServicioSRV) style="display:none;" @endif   @endif >
                                              <td>{{ $LOS->IdServicioOS }}</td>
                                              <td>OS#{{ $LOS->IdServicioOS }}</td>
                                              <td>{{ $LOS->modulo }} @if ($LOS->modulo == 'ESE')
                                                - <br> <a  class="{{ ($LOS->Estatus == 'Cancelado')?'inactive':'' }}" @permission('ese.lista.estudios.detalle') href="{{url('ConfiguracionOSEdit')}}/{{$LOS->IdServicioSRV}}/{{$LOS->IdCliente}}"@endpermission style="text-decoration: none;color:#000;" > ESE#{{$LOS->IdServicioSRV}} </a> </td>
                                              @endif
                                              <td>{{ $LOS->Cliente }}</td>
                                              <td>{{ $LOS->departamento }}</td>
                                              <td>{{ $LOS->Estatus }}</td>
                                              <td>{{ $LOS->FechaSolicitud }}</td>
                                              <td> @if ($LOS->FechaCierre != '0000-00-00 00:00:00')
                                                    {{ $LOS->FechaCierre }}
                                                  @endif
                                              </td>
                                              <td> @if ($LOS->costo_moneda)$@endif{{ $LOS->costo_moneda }}</td>
                                              <td>@if ($LOS->factura_moneda)$@endif{{ $LOS->factura_moneda }}</td>
                                              <td>{{ $LOS->NumFactura }}</td>
                                              <td>
                                                @if ( $LOS->DocumentoFactura )
                                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong" type="button" value="Preview" onclick="ver('{{ $LOS->DocumentoFactura }}');">Ver</button></th>
                                                @endif

                                              </td>



                                              <td class="text-center">
                                                @if ($ListadoOSFilter == $LOS->IdServicioSRV)
                                                  <button onclick="location.reload()" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Quitar Filtro"><i class="fa fa-filter" aria-hidden="true"></i></i></button>
                                                  @else
                                                    <a href="{{route('sig-erp-ese::ListadoOS.edit',$LOS->IdServicioOS)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp
                                                @endif


                                              </td>

                                          </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                                <br />

                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                	  <div style="clear:both">
                                           <iframe id="viewer" frameborder="0" scrolling="no" width="565" height="500"></iframe>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>


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
  var path= "../uploads/";

  $('#Guardar').click(function(){
      if( $("#VaIn").val()==1){
              $("#create").modal('hide');
              // $("#VaIn").val(0);
          }
  });

  function ver($val){
    pdffile= $val;
    $('#viewer').attr('src',path+pdffile);
  }

  function showmodal(type){
                //   $('#modal-title').html(type);
                //   $('#create').modal('show');

                  if(type == 'CancelarOS'){
                    $('#cancelar').modal('show');


                  }else{
                    $('#cerrar').modal('show');


                //     var token = $('meta[name="csrf-token"]').attr('content');
                //     $.ajax({
                //     headers: {'X-CSRF-TOKEN':token},
                //     url: "{{ url('DataInvestigador') }}",
                //     type: "POST",
                //     data: {type:type},
                //     beforeSend:function(){

                //       $("#table-body-all").html('<h3>Cargando Datos...</h3>');
                //     },
                //     success: function( response )
                //     {
                //       $("#table-body-all").html(response);

                //     }
                //   });

                  }

                }

  // function visualizar_PDF(id,campo) {
  //   $('#viewer').attr('src','');
  //  pdffile=document.getElementById(id).files[0];
  //  if(pdffile == undefined){
  //
  //  }else{
  //    pdffile_url=URL.createObjectURL(pdffile);
  //    $('#viewer').attr('src',pdffile_url);
  //  }
  // }


    var mostrarValor = function(x){
        var p=document.getElementById('valcnt').value=x;
    };


	$(document).ready(function(){


        // function setTwoNumberDecimal (event) {this.value = parseFloat (this.value) .toFixed (2); }
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
                                "aoColumnDefs": [{ "bSortable": false,"bVisible": false, "orderData": [ 0, 0 ],"aTargets": [0] },
                                {  "orderData": [ 0, 1 ]  ,"aTargets": [1] },
                                {  "orderData": [ 0, 2 ]  ,"aTargets": [2] },
                                {  "orderData": [ 0, 3 ]  ,"aTargets": [3] },
                                {  "orderData": [ 0, 4 ]  ,"aTargets": [4] },
                                {  "orderData": [ 0, 5 ]  ,"aTargets": [5] },
                                {  "orderData": [ 0, 6 ]  ,"aTargets": [6] },
                                {  "orderData": [ 0, 7 ]  ,"aTargets": [7] },
                                {  "orderData": [ 0, 8 ]  ,"aTargets": [8] ,"render": $.fn.dataTable.render.number( ',', '.', 2, '$' )},
                                {  "orderData": [ 0, 9 ]  ,"aTargets": [9] ,"render": $.fn.dataTable.render.number( ',', '.', 2, '$' )},
                                {  "orderData": [ 0, 10 ]  ,"aTargets": [10] },
                                {  "orderData": [ 0, 11 ]  ,"aTargets": [11] }],
                                "order": [[ 0, "desc" ]],
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
                                "ordering": true,

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

                    ];
            return arr;
          }).get();

        $.ajax({

            url:'{{ url('UpdatePlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {arr:arr},
            success: function(response){

                    setTimeout(function(){
                        location.href = '{{ route('sig-erp-ese::ListadoOS.index') }}';
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
            url:'{{ url('DeletePlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {arr:arr,datos:datos},
            success: function(response){

                setTimeout(function(){
                        location.href = "{{ url('PlantillaClienteR') }}/"+response+"";
                    });

            },
            error : function(jqXHR, status, error) {

                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });



    }


    </script>

@endsection
