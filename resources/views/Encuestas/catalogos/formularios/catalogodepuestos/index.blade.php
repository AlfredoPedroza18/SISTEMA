@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('catalogos_encuestas')}}">Catálogos</a></li>
        <li class="active">
            Catálogo de Puestos
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Puestos</h1>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{ route('nuevo_puesto_encuesta_create')}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Puesto"> <i class="fa fa-user-plus fa-1x"aria-hidden="true"></i></a>
        <label>Nuevo Puesto</label>
    </div>
</div>

<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            </div>
                <h4 class="panel-title">Catálogo Puestos</h4>
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
            <th>Empresa</th>
            <th>Tipo Puesto</th>
            <th>Puesto</th>
            <th>Activo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ListaPuesto as $puestos)
        <tr>
            <td>{{$puestos->Empresa}}</td>
            <td>{{$puestos->tipoPuesto }}</td>
            <td>{{$puestos->puesto }}</td>
            <td>{{$puestos->puestoActivo}}</td>
            <td>
                <a href="{{ route('editar_puesto_encuesta', $puestos->IdPuestoCliente)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp 
                <input type="hidden" value="{{ $puestos->IdPuestoCliente }}" data-id="{{ $puestos->IdPuestoCliente }}">
            
                {{ Form::open([ 'route' => ['eliminar_puesto_encuesta',
                    $puestos->IdPuestoCliente],
                    'method' => 'DELETE',
                    'class'  => 'pull-right'
                    ]) }}
                
                <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro"><i class="fa fa-trash"></i></button>
                {{ Form::close()}}
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