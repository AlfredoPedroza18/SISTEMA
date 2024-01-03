@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('homevista')}}">Módulos</a></li>
        <li class="active">
            Órdenes de Servicio
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Órdenes de Servicios</h1>
<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <div class="panel-heading-btn">
        </div>
        <h4 class="panel-title">Órdenes de servicios</h4>
    </div>

    <div class="panel-body">
        <hr>
        @if (session('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ session('type') }} fade in m-b-15">
                    {{session('success')}}
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            </div>
        </div>
        @endif

        <table id="data-table" class="display table table-striped table-bordered table-responsive">
            <thead>
                <tr>
                    <th>#OS</th>
                    <th>Módulo</th>
                    <th>Cliente</th>
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
                @foreach($listOrdenesServicio as $lista)
                <tr>
                    <td>{{$lista->idOS}}</td>
                    <td>{{$lista->modulo}}</td>
                    <td>{{$lista->cliente}}</td>
                    <td>{{$lista->estado}}</td>
                    <td>{{$lista->FechaSolicitud}}</td>
                    <td>{{$lista->FechaCierre}}</td>
                    <td>{{$lista->costo}}</td>
                    <td></td>
                    <td>{{$lista->NumFactura}}</td>
                    <td></td>
                    <td class="text-center">
                        <a href="{{ route('editar_ordenservicioencuesta',['id'=>$lista->id])}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>



</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">

$(document).ready(function(){
        iniciarTabla();

        $('[data-toggle="popover"]').popover({
            delay: { "show": 500, "hide": 100 },
            trigger:'focus'

        });

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Servicios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Servicios',
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
                title: 'Listado de Servicios',
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
                                order: [[4, 'desc']],
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },

                            } );

        }

</script>

@endsection