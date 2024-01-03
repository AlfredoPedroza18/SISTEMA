@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])}}">Módulos-Documentos</a></li>
        <li class="active">
            Alta Documentos
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Alta Documentos</h1>
<br>

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-4" style="display:flex; align-items:center; height:34px">
                <label for="" style="margin:0; font-size:14px">Cliente</label>
            </div>
            <div class="col-md-8">
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
            <div class="col-md-4" style="display:flex; align-items:center; height:34px">
                <label for="" style="margin:0; font-size:14px">Periodo</label>
            </div>
            <div class="col-md-8">
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
            <div class="col-md-4" style="display:flex; align-items:center; height:34px">
                <label for="" style="margin:0; font-size:14px">Centro de Trabajo</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
                    <option selected value="{{$IdCentro}}" disabled>{{$nombreCentro}}</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Documentos <small>Alta</small></h4>
    </div>
        
    <div class="panel-body">
        <form id="form-alta-tiposservicio" action="{{route('store_documentosNom035')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <div class="note note-success">
                            <i class="fa fa-cubes fa-2x pull-left"></i>
                            <h4>Documento</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-6">
                        <label>{{ Form::label ('documento', '* Documento')}}</label>
                        <select class="form-control" name="documento" id="documento" required>
                            @foreach ($documentos as $row)
                            <option value="{{$row->IdDocumento}}">{{$row->Descripcion}}</option> 
                            @endforeach
                        </select>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <label>{{ Form::label ('archivo', '* Archivo')}}</label>
                        <input class="form-control" type="file" name="archivo" id="archivo">
                    </div>
                </div>
                <input type="hidden" name="cliente" id="cliente" value="{{$IdCliente}}">
                <input type="hidden" name="centro" id="centro" value="{{$IdCentro}}">
                <input type="hidden" name="periodo" id="periodo" value="{{$IdPeriodo}}">

                <div class="row">
                    <div class="col-md-6">
                        <label>{{ Form::label ('activo', '* Activo')}}</label>
                        <select class="form-control" name="activo" id="activo" onchange="" required>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                
                <br>
                <br>
    
                <div class="row">
                    <div class="col-md-3 col-md-offset-8 text-left">
                        <input type="submit" name="Guardar" value="Guardar Documento" class="btn btn-success btn-block">
                    </div>
                </div>
            </div>
            <input type="hidden" id="num_id" value="">
        </form>
    </div>
</div>


</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">

console.log(document.getElementById("documento").value);
console.log(document.getElementById("cliente").value);
console.log(document.getElementById("centro").value);
</script>

@endsection