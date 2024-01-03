@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_encuestas')}}">Configuración Encuestas</a></li>
        <li class="active">
            Encuestas
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Encuestas</h1>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('configuracion_nueva_encuesta_create')}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Encuesta"> <i class="fa fa-user-plus fa-1x"aria-hidden="true"></i></a>
        <label>Nueva Encuesta</label>
    </div>
</div>

<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            </div>
                <h4 class="panel-title">Encuestas</h4>
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
            <th>Activo</th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listaEncuesta as $encuesta)
        <tr>
            <td>{{$encuesta->Descripcion}}</td>
            <td>{{$encuesta->Activo}}</td>
            @if($encuesta->ImgBienvenida == null)
                <td>No hay Archivo</td>
            @else
                <td class="text-center"><input type="hidden" name="idarchivo" id="idarchivo" value="{{$encuesta->IdEncuesta}}"><button id="logopdf" onclick="showIMG({{$encuesta->IdEncuesta}});"><i class="fa fa-2x fa-picture-o bg-danger" aria-hidden="true"></i></button></td>
            @endif
            <td class="text-center">
                 <a href="{{ route('editar_configuracion_encuesta', $encuesta->IdEncuesta)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp 
      
                {{ Form::open([ 'route' => ['eliminar_configuracion_encuesta',
                    $encuesta->IdEncuesta],
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


        function showIMG(id){
            /*let id = document.getElementById('idarchivo').value;*/
            let token = '{{csrf_token()}}';
            $.ajax({
                url:'{{ route('mostrar_presentacion_encuesta') }}',
                type: "POST",
                data: {
                    id:id,
                    _token:token
                },
                success:function (response){
                    console.log(response);
                    var img = response.img;
                    let imgWindow = window.open("");
                    imgWindow.document.write(
                    `<iframe id="vista" width='100%' height='100%' src="data:image/JPG;base64,${img}"></iframe>`);
                },
                error: function( e ) {
                    console.log(e);
                }
            });

        }

</script>

@endsection