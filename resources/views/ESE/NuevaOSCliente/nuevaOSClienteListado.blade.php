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
        <li><a href="{{ route('sig-erp-ese::NuevaOSCliente.index') }}">Servicio</a></li>

	        <li>Servicio</li>

	</ol>




		<h1 class="page-header text-center">Servicio: {{ $nservicio }}</h1>
				<br>
        <div class="row">
          <div class="col-sm-11">

          </div>
          <div class="col-sm-1">
            <bottom onclick="nuevaOS();" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nuevo Servicio">
              <i class="fa fa-plus" aria-hidden="true"></i>
            <br>
          </div>
          <div class="col-sm-12">

          </div>
        </div>
				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>

								<h4 class="panel-title">Cliente: {{ $cliente }}</h4>

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
                                        <th>Servicio</th>
                                        <th>Candidato</th>
                                        <th>Puesto</th>
                                        <th>Fecha</th>
                                        <th>Modalidad</th>
                                        <th>Prioridad</th>
                                        <th>Formato</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($listadoOS as $LOS)
                                        <tr>

                                            <td>{{ $LOS->Descripcion }}</td>
                                            <td>{{ $LOS->Candidato }}</td>
                                            <td>{{ $LOS->Puesto }}</td>
                                            <td>{{ $LOS->FechaCreacion }}</td>
                                            <td>{{ $LOS->Modalidad }}</td>
                                            <td>{{ $LOS->Prioridad }}</td>
                                            <td>{{ $LOS->Formato }}</td>
                                            <td class="text-center" style="width:10%;">
                                              <a href="{{ url('ConfiguracionOSCEdit') }}/{{$LOS->IdServicioEse}}/{{$LOS->IdCliente}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp
                                              
                                                    <input type="hidden"  value="" data-id="">

                                                    <a href="{{ url('DeletePlantillaI') }}/{{$LOS->IdServicioEse}}" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro"><i class="fa fa-trash"></i></a>




                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <br />

                                    {{-- <div class="row">
                                            <div class="col-md-3 col-md-offset-9 text-right">

                                                <input type="button" id="Notificar" name="Notificar" value="Notificar" class="btn btn-success" onclick="hacer_click_Notificar()">

                                            </div>

                                    </div> --}}


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



	$(document).ready(function(){

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
                                "ordering": false,
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
