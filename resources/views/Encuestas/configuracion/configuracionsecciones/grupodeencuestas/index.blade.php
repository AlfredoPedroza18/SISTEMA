@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_encuestas')}}">Configuración Encuestas</a></li>
        <li class="active">
            Grupo de Preguntas
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Grupo de Preguntas</h1>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('configuracion_nueva_grupo_encuesta_create')}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Grupo de Encuesta"> <i class="fa fa-user-plus fa-1x"aria-hidden="true"></i></a>
        <label>Nuevo Grupo de Preguntas</label>
    </div>
</div>

<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            </div>
                <h4 class="panel-title">Grupo de Preguntas</h4>
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
            <th>Encuesta</th>
            <th>Descripcion</th>
            <th>Activo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listaGrupoEncuesta as $encuesta)
        <tr>
            <td>{{$encuesta->Encuesta}}</td>
            <td>{{$encuesta->Descripcion}}</td>
            <td>{{$encuesta->Activo}}</td>

            <td class="text-center">
                <a href="{{ route('editar_configuracion__grupo_encuesta', $encuesta->IdAgrupador)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp 
               
                {{ Form::open([ 'route' => ['eliminar_configuracion_grupo_encuesta',
                    $encuesta->IdAgrupador],
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
                                order: [[0, 'desc']],
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