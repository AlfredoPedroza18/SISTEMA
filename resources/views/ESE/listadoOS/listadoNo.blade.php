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

        <li><a href="{{url('ListadoOS')}}">Estudios Socioeconómicos</a></li>



	        <li>Estudios Socioeconómicos</li>



	</ol>





		<h1 class="page-header text-center">Estudios Socioeconómicos</h1>
                <!-- <div class="row">

					<div class="col-md-12 text-right">

						<a href="{{ route('sig-erp-ese::ListadoOS.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Estudio Socioeconómico">

							<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>

						</a>

						<label>Nuevo Estudio Socioeconómico</label>

					</div>

				</div> -->

				<br>



	<div class="row">

    <p></p>





	</div>



				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

						<div class="panel-heading">

							<div class="panel-heading-btn">

							

							</div>



								<h4 class="panel-title">Listado de Estudios Socioeconómicos</h4>



						</div>

                    <div class="panel-body">



                        <input type="hidden" id="IdPlantilla" name="IdPlantilla" value="{{ $IdPlantillaCliente or '' }}">

                        <input type="hidden" id="IsClient" name="IsClient" value="{{ (Auth::user()->tipo == "c") ? Auth::user()->IdCliente : "-1" }}">

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-sm-12">

                                      

                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm-2 form-inline">

                                        <div class="form-group mb-2">

                                            
                                        </div>

                                         <div class="form-group mx-sm-3 mb-2">

                                           
                                        </div>

                                    </div>

                                    @if (Auth::user()->tipo == "s")

                                    <div class="col-sm-6 form-inline">

                                        <div class="form-group mb-2">

                                            

                                        </div>

                                         <div class="form-group mx-sm-3 mb-2">

                                            

                                        </div>

                                    </div>                                        

                                    @endif

                                </div>



                            </div>

                        </div>



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

                        </form>

                        <table id="data-table" class="table table-striped table-bordered table-responsive" style="width: 100%">

                            <!-- <table id="data-table" class="display table table-striped table-bordered table-responsive"> -->

                                    <thead>

                                    <tr>

                                        <th>Id</th>

                                        <th>#ESE</th>

                                        <th>Servicio</th>

                                        <th>Cliente</th>

                                        <th>Depto</th>

                                        <th>Candidato</th>

                                        <th>Analista</th>

                                        <th>Investigador</th>

                                        <th>Modalidad</th>

                                        <th>Prioridad</th>

                                        <th>Estatus</th>

                                        <th>Formato</th>

                                        <th>Acción</th>

                                    </tr>

                                    </thead>

                                    <tbody id="tbodyOS">



                                    @foreach($listadoOS as $LOS)

                                        <tr>

                                            <td>{{ $LOS->IdServicioEse }}</td>

                                            <td>ESE#{{ $LOS->IdServicioEse }}</td>

                                            <td>{{ $LOS->servicio }}</td>

                                            <td>{{ $LOS->Cliente }}</td>

                                            <td>{{ $LOS->centro_negocio}}</td>

                                            <td>{{ $LOS->Candidato }}</td>

                                            <td>{{ $LOS->Analista }}</td>

                                            <td>{{ $LOS->Investigador }}</td>

                                            <td>{{ $LOS->Modalidad }}</td>

                                            <td>{{ $LOS->Prioridad }}</td>

                                            <td class="text-center"><span class="badge {{($LOS->Estatus=="Asignada")?"badge-success":"badge-primary"}}">{{ $LOS->Estatus}}</span></td>

                                            <td>{{ $LOS->Formato }}</td>

                                            <td class="text-center" style="width:10%;">

                                          

                                             <a onclick="enla()" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp
                           
                                            

                                                <!-- <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp -->

                                                    <input type="hidden"  value="" data-id="">

                                                    @if (Auth::user()->tipo != "f")

                                                    @permission('ese.lista.estudios.eliminar')

                                                        <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro">

                                                            <i class="fa fa-trash-o"></i>

                                                        </button>   

                                                    @endpermission                                                     

                                                    @endif

                                                    @if (Auth::user()->tipo == "c")

                                                        @permission('ese.lista.estudios.cancelar')

                                                        <button class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cancelar Registro" onclick="cancelService({{ $LOS->os }},{{$LOS->IdPlantillaCliente}},{{$LOS->IdCliente}},'{{Auth::user()->name}}')"><i class="fa fa-ban" aria-hidden="true"></i></button>

                                                        @endpermission  

                                                    @endif 

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



                    </div>

		        </div>



</div>



@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')

{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}

{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>







<script type="text/javascript">

if(document.getElementById("menu-ese")){

    document.getElementById("menu-ese").style.display="block";

}



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







        function enla () {
            setTimeout(function(){

            
            location.href ="{{url('ConfiguracionOSEdit')}}"+"/"+{{$LOS->IdServicioEse}}+"/"+{{$LOS->IdCliente}};                     },500);
        }

    var mostrarValor = function(x){

        var p=document.getElementById('valcnt').value=x;

    };







	$(document).ready(function(){

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

                                {  "orderData": [ 0, 8 ]  ,"aTargets": [8] }],

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



                                "paging": true,

                                "ordering": true,

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

    // funcion para cancelar un servicio y enviar un correo como notificacion a cliente,candidato y lider

    const cancelService = (IdServicioEse,IdPlantillaCliente,IdCliente,usuarioCancel) => {

        swal({

            title: "Cancelar",

            text: `¿Seguro que desea cancelar la OS#${IdServicioEse}?`,

            icon: "warning",

            buttons: ['No Cancelar','Si Cancelar'],

            dangerMode: true,

            })

            .then((willDelete) => {

                if (willDelete) {

                    $.ajax({

                        url: `{{ url('cancelService') }}/${IdServicioEse}/${IdPlantillaCliente}/${IdCliente}/${usuarioCancel}`,

                        type: "GET",

                        success: function(response){

                            if(response[0].success && response[0].sendNotification.isSendEmail){

                                 location.reload();

                            }else{

                                showNotify("Error",response[0].sendNotification.message,"danger");

                            }

                        },

                        error: function(){

                            showNotify("Error","Ocurrio un error en la petición","danger")

                        }

                    });

                }

            });

    }

    $("#filterOS").on("change",function(){

        var status = $("#filterOS").val();

        var centroNeocios = $("#filterCentroNegocio").val();

        console.log (status +  "/ " + centroNeocios);
        filterOS(status, centroNeocios);

    });

    $("#filterCentroNegocio").on("change",function(){

        var status = $("#filterOS").val();

        var centroNeocios = $("#filterCentroNegocio").val();

        console.log (status +  "/ " + centroNeocios);
        filterOS(status, centroNeocios);

    });

    const filterOS = (paramFilter1, paramFilter2) => {

        $.ajax({

            url: `{{ url('filterOsAnalistaSec') }}/${paramFilter1}/${paramFilter2}`,

            type: "GET",

            success: function(response){

                document.getElementById("tbodyOS").innerHTML = "";

                var table = $('#data-table').DataTable();

                table.destroy();

                document.getElementById("tbodyOS").innerHTML = response;

                iniciarTabla();

            },

            error: function(jqXHR, status, error){

                console.error(jqXHR, status, error);

            }

        });

    }



    </script>



@endsection



