@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="{{ route('encuestas')}}">Módulos</a></li>
            <li class="active">
                Encuestas/ Sugerencias
            </li>
        </li>
    </ol>

    <h1 class="page-header text-center">Quejas y Sugerencias</h1>
    <br>

    <div class="row" style="margin-bottom: 15px">
        <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
            <label for="" style="font-size: 14px">Cliente</label>
            <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
                <option selected value="{{$listaEncuestas[0]->IdCliente}}" disabled>{{$listaEncuestas[0]->Cliente}}</option>
            </select>
        </div>
        <div class="col-md-6">
            
        </div>
        <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
            <label for="" style="font-size: 14px">Periodo</label>
            <select id="periodo" class="form-control" name="cliente" style="font-size: 13px" disabled>
                <option selected value="{{$listaEncuestas[0]->IdPeriodo}}" disabled>{{ date('d-m-Y', strtotime($listaEncuestas[0]->Periodo))}}</option>
            </select>
        </div>
    </div>

    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Quejas y Sugerencias</h4>
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
                        <th>Centro de trabajo</th>
                        <th>Tipo de Queja</th>
                        <th>Queja</th>
                        <th>Estatus</th>
                        <th>Anónimo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sugerencias as $row)
                    <tr>
                        <td>{{$row->centro}}</td>
                        <td>{{$row->TipoQueja}}</td>
                        <td>{{$row->Comentario}}</td>
                        <td>{{$row->Estatus}}</td>
                        <td>{{$row->Anonimo}}</td>
                        <td>
                            <a href="{{ route('sugerencia_estatus_edit',['id'=>$row->IdSugerencia,'id2'=>$IdServicio]) }}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp 
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

        // mandarDatos();
    });

    //Envia el idCliente y el idPeriodo al controlador
    function mandarDatos(){
        let IdPeriodo = document.getElementById('periodo').value;
        let IdCliente = document.getElementById('cliente').value;
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('getDatosCentro') }}',
            type: "POST",
            data: {
                IdCliente:IdCliente,
                IdPeriodo:IdPeriodo,
                _token: token
            },
            success: function(response){
                
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }

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