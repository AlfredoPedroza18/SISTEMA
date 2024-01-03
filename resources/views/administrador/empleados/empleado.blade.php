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
            background-color: #33bdbd;
        }
        .social-network a.icoRss:hover i,a.icoRssDiana:hover i, a.icoGoogle:hover i{
            color:#fff;
        }
        .social-network a.icoGoogle:hover {
            background-color: #BD3518;
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
<div id="content" class="content">

    <ol class="breadcrumb ">
        <li><a href="javascript:;">Perfil</a></li>
        <li><a href="{{ url('empleado') }}">Información Personal</a></li>

    </ol>
    <br>
    <div class="row">
        <div class="col-md-12 ui-sortable">
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Mis Datos</h4>
            </div>


            <div class="panel-body"> 
            <input type="hidden" name="nombreEmpresa" id="nombreEmpresa" value="{{ $empresa }}">

                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image ">
                            <?php echo '<img class="avatar border-white" src="' . $uri . '" style="width:200px; height:200px; float:left;  margin-right:25px;"  />'; ?>
                            <i class="fa fa-user hide"></i>
                        </div>
                        <!-- end profile-image -->
                        <div class="m-b-10">
                            <div class="alert alert-info text-center fade in m-b-15">
                                <strong>{{$nombre}}</strong>
                            </div>
                            <!--<a href="#" class="btn btn-warning btn-block btn-sm">Change Picture</a>-->
                        </div>

                        <!-- end profile-highlight -->
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <!-- <h4>{{$nombre}} <small>{{$apellidos}}</small></h4> -->
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="field">Empresa</td>
                                        <td><i class="fa fa-building fa-lg m-r-5"></i> {{$empresa}}</td>
                                    </tr>
                                    <tr>
                                        <td class="field">No. Empleado</td>
                                        <td><i class="fa fa-list-ol fa-lg m-r-5"></i> {{$codigopersonal}}</td>
                                    </tr>
                                    <tr class="divider">
                                        <td colspan="2"></td>
                                    </tr>

                                    <tr>
                                        <td class="field">Nombre</td>
                                        <td><i class="fa fa-user fa-lg m-r-5"></i> {{$nombre}} {{$apellidos}}</td>
                                    </tr>
                                    <tr class="divider">
                                        <td colspan="2"></td>
                                    </tr>
                                
                                    <tr>
                                        <td class="field">Teléfono Móvil</td>
                                       <!-- <td><i class="fa fa-mobile fa-lg m-r-5"></i> +1-(847)- 367-8924 <a href="#" class="m-l-5">Edit</a></td>  -->
                                        <td><i class="fa fa-mobile fa-lg m-r-5"></i> {{$movil}}</td>
                                    </tr>
                                    <tr>
                                        <td class="field">E-Mail</td>
                                        <td><i class="fa fa-envelope-o fa-lg m-r-5"></i>
                                            {{$email}}
                                        </td>
                                    </tr>
                                    <tr>
                                      <td class="field">Dirección</td>
                                      <td><i class="fa fa-home fa-lg m-r-5"></i>{{$direccion}}</td>
                                    </tr>
                                    <tr>
                                        <td class="field">CURP</td>
                                        <td><i class="fa fa-info-circle fa-lg m-r-5"></i>
                                            {{$curp}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">RFC</td>
                                        <td><i class="fa fa-info-circle fa-lg m-r-5"></i>{{$rfc}}</td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="field">Oficina</td>
                                        <td><i class="fa fa-phone fa-lg m-r-5"></i> {{$telefono}}</td>
                                    </tr>
                                    <tr class="divider">
                                        <td colspan="2"></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="field">Sexo</td>
                                        <td>
                                            {{$sexo}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Fecha de Nacimiento</td>
                                        <td>{{$fechanacimiento}}</td>
                                    </tr>
                                    <tr>
                                        <td class="field">Edad</td>
                                        <td>{{$edad}}</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="field">NSS</td>
                                        <td>
                                            {{$nss}}
                                        </td>
                                    </tr> -->
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!-- end profile-right -->
                </div>






            </div>
        </div>
    </div>
@endsection

@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
    <script type="text/javascript">
        var empN=$("#nombreEmpresa").val();
        $("#empnombre").html(empN); 
        $(document).ready(function(){
            var data_table =$("#data-table").DataTable({
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Reporte de Empresas Facturadoras',
                        exportOptions: {
                            columns: [ 0, 1, 2,3 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Reporte de Empresas Facturadoras',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [ 0, 1, 2,3 ]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                    },
                    {
                        extend: 'print',
                        title: 'Reporte de Empresas Facturadoras',
                        exportOptions: {
                            columns: [ 0, 1, 2,3 ]
                        }
                    }
                ],
                responsive: true,
                autoFill: true,
                "paging": true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom:'Blfrtip'
            } );

        });
    </script>
@endsection