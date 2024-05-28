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
            <li><a href="javascript:;">ESE</a></li>
            <li><a>Incidencias Legales</a></li>
        </ol>

        <div class="row">

            <h1 class="page-header text-center">Incidencias Legales</h1>
            
            <div style="width: 100%;" align = "right" >
                <button onclick=" window.location.href = ' {{ route('sig-erp-ese::NuevaOSCliente.index') }} ' " class="btn btn-inverse btn-icon btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar Creditos">
                <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                </button>
                <label style="margin-right: 10px;">Solicitar Incidencia Legal </label>
            </div>
            

            <br>

            <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            
                

                <div class="panel-heading">
                    <div class="panel-heading-btn"></div>
                    <h4 class="panel-title">Listado de Incidencias Legales</h4>
                </div>

                
                
                <div class="panel-body">
                    
                    <table id="data-table" class="table table-striped table-bordered table-responsive" style="width: 100%">

                        <thead>
                            <tr>
                                <th>#EIL</th>
                                <th>Cliente</th>
                                <th>Departamento</th>
                                <th>Candidato</th>
                                <th>Analista</th>
                                <th>Estatus</th>
                                <th>Solicitante</th>
                                <th>Accion</th>
                                
                                
                            </tr>
                        </thead>

                        <tbody id="tbodyOS">
                        
                            @foreach($lista as $row)

                            <tr>
                                <td>{{$row->EIL}}</td>
                                <td>{{$row->cliente}}</td>
                                <td>{{$row->centro}}</td>
                                <td>{{$row->Candidato}}</td>
                                <td>{{$row->analista}}</td>
                                <td>{{$row->estatus}}</td>
                                <td>{{$row->solicitante}}</td>
                                
                                <td align="center">
                              
                                @if($row->estatus != "Cancelado")
                                    <button onclick=" downloadFileBase64('{{$row->incidencia}}') " class="btn btn-primary btn-icon btn-circle btn-sm btn-success " data-toggle="tooltip" data-placement="top" title="Descargar Incidencia"><i class="fa fa-download"></i></button>&nbsp&nbsp</th>
                                    
                                    <button onclick=" location.href = '{{url('editarServicio')}}/{{$row->id_c}}/{{$row->EIL}}' " class="btn btn-primary btn-icon btn-circle btn-sm btn-info " data-toggle="tooltip" data-placement="top" title="Editar Servicio"><i class="fa fa-pencil"></i></button>&nbsp&nbsp</th>
                                @endif
                          
                                
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>
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

    
    const downloadFileBase64 = (base64) => {
        
        if(base64 != ""){
            var win = window.open(); 
            win.document.write("<iframe  width='100%'  height='100%'  src='" + base64 + "'><\/iframe>"); 

        }else
            swal("Aun no se ha cargado la incidencia legal!");
    }

    
</script>