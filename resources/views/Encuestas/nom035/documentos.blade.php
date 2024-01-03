@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T :) -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{ route('nom035') }}">Módulos</a></li>
        <li class="active">
            Documentos
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Documentos</h1>
<br>

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-3" style="display:flex; align-items:center; height:34px">
                <label for="" style="margin:0; font-size:14px">Cliente</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
                    <option selected value="{{$IdCliente}}" disabled>{{$cliente}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-3" style="display:flex; align-items:center; height:34px">
                <label for="" style="margin:0; font-size:14px">Periodo</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
                    <option selected value="{{$IdPeriodo}}" disabled>{{ date('d-m-Y', strtotime($periodo))}}</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-3" style="display:flex; align-items:center; height:34px">
                <label for="" style="margin:0; font-size:14px">Centro de Trabajo</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
                    <option selected value="{{$IdCentro}}" disabled>{{$nombreCentro}}</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{ route('create_documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Documento"> <i class="fa fa-user-plus fa-1x"aria-hidden="true"></i></a>
        <label>Nuevo Documento</label>
    </div>
</div>
<br>
<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <div class="panel-heading-btn">
        </div>
        <h4 class="panel-title">Documentos</h4>
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
                    <th>Cliente</th>
                    <th>Centro Trabajo</th>
                    <th>Documento</th>
                    <th>Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mostrarDocumentos as $row)
                    <tr>
                        <td>{{$row->Cliente}}</td>
                        <td>{{$row->Centro}}</td>
                        <td>{{$row->Documento}}</td>
                        @if($row->Archivo == null)
                        <td>No hay Archivo</td>
                        @else
                        <td class="text-center"><input type="hidden" name="idarchivo" id="idarchivo" value="{{$row->IdDocumentoDet}}"><button id="logopdf" onclick="showPDF({{$row->IdDocumentoDet}});"><i class="fa fa-2x fa-file-pdf-o bg-danger" aria-hidden="true"></i></button></td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('documentos_centro_edit',['id'=>$row->IdDocumentoDet,'id2'=>$IdPeriodo]) }}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp

                            {{ Form::open([ 'route' => ['documentos_centro_destroy',
                            $row->IdDocumentoDet,$IdPeriodo],
                            'method' => 'DELETE',
                            'class'  => 'pull-right'
                            ]) }}
        
                            <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro"> <i class="fa fa-trash"></i></button>
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

        var showPDF = function(id){

        /*let id = document.getElementById('idarchivo').value;*/

        let token = '{{csrf_token()}}';

        $.ajax({
            url:'{{route('mostrar_pdf_documento_centro')}}',
            type: "POST",
            data: {
                id:id,
                _token:token
            },
            success:function (response){
            var pdf = response.pdf;
            let pdfWindow = window.open("")
            pdfWindow.document.write(
            "<iframe width='100%' height='100%' src='data:application/pdf;base64, " +
            encodeURI(pdf) + "'></iframe>"
            )
            }
        });
    }
</script>

@endsection