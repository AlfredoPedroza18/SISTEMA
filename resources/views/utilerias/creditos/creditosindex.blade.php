@extends('layouts.masterMenuView')

@section('section')


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

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

<body>

    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Utilerias</a></li>
            <li><a>creditos</a></li>
        </ol>

        <div class="row">

            <h1 class="page-header text-center">CREDITOS</h1>
            
            <div style="width: 100%;" align = "right" >
                <button onclick=" window.location.href = '{{ url('utilerias/creditos')}}' " class="btn btn-inverse btn-icon btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar Creditos">
                <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                </button>
                <label style="margin-right: 10px;">Agregar Creditos</label>
            </div>
            

            <br>

            <div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">

                

                <div class="panel-heading">
                    <div class="panel-heading-btn"></div>
                    <h4 class="panel-title">Listado de creditos</h4>
                </div>

                
                
                <div class="panel-body">
                    
                    <table id="data-table" class="table table-striped table-bordered table-responsive" style="width: 100%">

                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Modulo</th>
                                <th>Cliente</th>
                                <th>Solicitante</th>
                                <th>N° Creditos</th>
                                <th>Estatus</th>
                                <th>accion</th>
                            </tr>
                        </thead>

                        <tbody id="tbodyOS">
                        
                            @foreach ($listadoCreditos as $creditos)
                                <tr>
                                    <td>{{$creditos->fecha}}</td>
                                    <td>{{$creditos->modulo}}</td>
                                    <td>{{$creditos->nombreC}}</td>
                                    <td>{{$creditos->Solicitante}}</td>
                                    <td>{{$creditos->Creditos}}</td>
                                    <td>{{$creditos->estatus}}</td>
                                    <th align="center"><button onclick="CancelarCreditos({{$creditos->id}})" class="btn btn-primary btn-icon btn-circle btn-sm btn-danger " data-toggle="tooltip" data-placement="top" title="Cancelar creditos"><i class="fa fa-pencil"></i></button>&nbsp&nbsp</th>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        
        </div>
    </div>

</body>

</html>


@endsection





@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}
{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- ================== END PAGE LEVEL JS ================== -->
{!! Html::script('assets/js/sweetalert.min.js') !!}


<script>

$(document).ready(function(){
    	iniciarTabla();
});

var iniciarTabla = function(){
        var data_table =$("#data-table").DataTable({
                                
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

    function CancelarCreditos(idKardex){
        swal({
        title: "¿Estás seguro?",
        text: "Estás por cancelar los creditos.",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirmar",
        closeOnConfirm: false
        },
        function (isConfirm) {
            confirmarCancelar(idKardex)
        });
    }

    function confirmarCancelar (idK){
        
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            headers:{'X-CSRF-TOKEN': token},
            url: "{{url('utilerias/eliminarCreditos')}}/" + idK,
            type: "POST",
            success: function (response){
                console.log(response)
                if(response.status == "cancel"){
                    swal({
                        title: "<h3>¡Lo sentimos este servicio ya fue cancelado!</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK",
                        showCancelButton: true,
                    });
                }else if (response.status == "error"){
                    swal({
                        title: "<h3>¡Lo sentimos no puedes cancelar este servicio porque esta en uso!</h3> ",
                        html: true,
                        type: "error",
                        confirmButtonText: "OK",
                        showCancelButton: true,
                    });
                }else if (response.status == "success"){
                    swal({
                        title: "<h3>¡Creditos cancelados exitosamente!</h3> ",
                        html: true,
                        type: "success",
                        confirmButtonText: "OK",
                        showCancelButton: true,
                    });

                    location.reload();
                }
            },
            error: function(){

            }
        });
    }
</script>