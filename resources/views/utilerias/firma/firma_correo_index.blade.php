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
            margin-left: 0 !important;
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
                {
                    {
                    --background-color: #33bdbd;
                    --
                }
            }

            background-color: #348fe2;
        }

        .social-network a.icoRss:hover i,
        a.icoRssDiana:hover i,
        a.icoGoogle:hover i {
            color: #fff;
        }

        .social-network a.icoGoogle:hover {
                {
                    {
                    -- background-color: #BD3518;
                    --
                }
            }

            background-color: #348fe2;
        }

        a.socialIcon:hover,
        .socialHoverClass {
            color: #44BCDD;
        }

        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto 0 auto;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            text-align: center;
            width: 6.5em;
            height: 6.5em;
            font-size: 10px;
            background-color: #D8D8D8;
        }

        .social-circle li i {
            margin: 0;
            line-height: 3em;
            text-align: center;
        }

        .social-circle li a:hover i,
        .triggeredHover {
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

        .jumbotron {
            padding-top: 12px;
            padding-bottom: 0px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #em {
            padding-left: 30px;
        }

        .col-md-2 {
            width: auto;
            padding-left: 30px;
        }
    </style>

</head>

<body>

    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Utilerias</a></li>
            <li><a>Correos</a></li>
        </ol>

        <div class="row">

            <h1 class="page-header text-center">Plantillas Firma Correos</h1>

            <div style="width: 100%;" align="right">
                <button onclick=" window.location.href = '{{ url('utilerias/firmaAdd')}}' " class="btn btn-inverse btn-icon btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar plantilla">
                    <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                </button>
                <label style="margin-right: 10px;">Agregar plantilla</label>


                <button class="btn btn-inverse btn-icon btn-circle btn-secundary" data-toggle="modal" data-target="#modal-alta" data-placement="top" title="" data-original-title="Asignar plantilla">
                    <i class="fa fa-hand-pointer-o fa-1x" aria-hidden="true"></i>
                </button>
                <label style="margin-right: 10px;">Asignar plantilla</label>



            </div>


            <br>

            <div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">



                <div class="panel-heading">
                    <div class="panel-heading-btn"></div>
                    <h4 class="panel-title">Listado de Firma Correo</h4>
                </div>



                <div class="panel-body">

                    <table id="data-table" class="table table-striped table-bordered table-responsive" style="width: 100%">

                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nombre plantilla</th>
                                <th>Color de fondo</th>
                                <th>Color nombre empresa</th>
                                <th>Color información usuario</th>
                                <th>Acción</th>

                            </tr>
                        </thead>

                        <tbody id="tbodyOS">

                            @foreach($lista as $lis)


                            <tr>

                                <td>{{$lis->Id}}</td>
                                <td>{{$lis->nombreP}}</td>
                                <td align="center">
                                    <div style="width: 35px; height: 20px; background-color: {{$lis->fondoF}};"></div>
                                </td>

                                <td align="center">
                                    <div style="width: 35px; height: 20px; background-color: {{$lis->empresaF}};"></div>
                                </td>

                                <td align="center">
                                    <div style="width: 35px; height: 20px; background-color: {{$lis->infoF}};"></div>
                                </td>

                                <td align="center">
                                    <button onclick=" editar('{{$lis->Id}}')" class="btn btn-primary btn-icon btn-circle btn-sm btn-info " data-toggle="tooltip" data-placement="top" title="editar"><i class="fa fa-pencil"></i></button>
                                </td>

                            </tr>


                            @endforeach

                        </tbody>

                    </table>


                    <div class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modal-alta">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">
                        <center><i class='fa fa-clipboard fa-2x'></i> Asignar Plantilla </center>
                    </h4>
                </div>
                <div class="modal-body">

                    <select name="plantilla" id="plantilla" class="form-control">
                        <option value="0">Seleccione una plantilla</option>

                        @foreach($lista as $lis)

                        <option value="{{$lis->Id}}">{{$lis->nombreP}}</option>

                        @endforeach

                    </select>

                    <br>

                    <select name="cn" id="cn" class="form-control">
                        <option value="0">Seleccione un departamento</option>

                        @foreach($lista_cn as $cn)
                        <option value="{{$cn->id}}">{{$cn->nombre}} ({{$cn->nomenclatura}})</option>
                        @endforeach
                    </select>

                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                    <a href="javascript:;" class="btn btn-success" onclick="guardar_agig()">Guardar</a>
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
    $(document).ready(function() {
        iniciarTabla();
    });

    function guardar_agig() {
        cn = $("#cn").val();
        plantilla = $("#plantilla").val();

        if (cn == 0 || plantilla == 0) {

            swal("Asegure de seleccionar una platilla y un centro de negocios");

        } else {

            swal({
                    title: "¿Estás seguro?",
                    text: "Estás por asignar una plantilla.",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Confirmar",
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    asignar(cn, plantilla)
                });

        }
    }


    function asignar(idcn, idp) {

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{url('utilerias/asignar')}}/" + idp + "/" + idcn,
            type: "POST",
            success: function(response) {
               
                if (response.status == "success") {

                    swal({
                            title: "<h3>¡" + response.message + "!</h3> ",
                            html: true,
                            type: "success",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                        },
                        function(isConfirm) {
                            location.reload();
                        });

                } else {
                    swal({
                            title: "<h3>¡" + response.message + "!</h3> ",
                            text: "¿Desea remplazar la plantilla?",
                            html: true,
                            type: "warning",
                            confirmButtonText: "Confirmar",
                            showCancelButton: true,
                        },
                        function(isConfirm) {
                            cambiar(idcn, idp)
                        });
                }
            },
            error: function() {

            }
        });
    }

    function cambiar(idcn, idp) {

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{url('utilerias/cambiar')}}/" + idp + "/" + idcn,
            type: "POST",
            success: function(response) {
                console.log(response)

                    swal({
                            title: "<h3>¡" + response.message + "!</h3> ",
                            html: true,
                            type: "success",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                        },
                        function(isConfirm) {
                            location.reload();
                        });
            },
            error: function() {
            }
        });
    }

    var iniciarTabla = function() {
        var data_table = $("#data-table").DataTable({

            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Listado de Plantilla Genérica',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Listado de Plantilla Genérica',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'copyHtml5',
                },
                {
                    extend: 'print',
                    title: 'Listado de Plantilla Genérica',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],
            responsive: true,
            autoFill: true,
            "paging": true,
            "ordering": false,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: 'Blfrtip',
            "drawCallback": function(settings) {
                $('[data-toggle="popover"]').popover({
                    delay: {
                        "show": 500,
                        "hide": 100
                    },
                    trigger: 'focus'
                });
            },
        });
    }

    function CancelarCreditos(idKardex) {
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
            function(isConfirm) {
                confirmarCancelar(idKardex)
            });
    }

    function confirmarCancelar(idK) {

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': token
            },
            url: "{{url('utilerias/eliminarCreditos')}}/" + idK,
            type: "POST",
            success: function(response) {
                console.log(response)
                if (response.status == "cancel") {
                    swal({
                        title: "<h3>¡Lo sentimos este servicio ya fue cancelado!</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK",
                        showCancelButton: true,
                    });
                } else if (response.status == "error") {
                    swal({
                        title: "<h3>¡Lo sentimos no puedes cancelar este servicio porque esta en uso!</h3> ",
                        html: true,
                        type: "error",
                        confirmButtonText: "OK",
                        showCancelButton: true,
                    });
                } else if (response.status == "success") {
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
            error: function() {

            }
        });
    }

    function editar(id) {
        location.href = "{{url('utilerias/firmaAlt')}}/" + id;
    }
</script>