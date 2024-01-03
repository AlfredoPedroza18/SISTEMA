@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('documentosNom035',['id'=>$IdCentro,'id2'=>$IdPeriodo,'id3'=>$IdCliente])}}">Documentos</a></li>
        <li class="active">
            Edición-Documentos
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Documentos <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Documentos <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="formedit" action="{{ route('documentos_centro_update',['id'=>$IdDocumentoDet]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Documentos</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="cliente" name="cliente" value="{{$IdCliente}}">
                            <input type="hidden" id="centro" name="centro" value="{{$IdCentro}}">
                            <input type="hidden" id="periodo" name="periodo" value="{{$IdPeriodo}}">
                            <label>Cliente: {{$Cliente}}</label>
                            <br>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('archivo', '* Archivo')}}</label>
                            <input class="form-control" type="file" name="archivo" id="archivo">
                            <input type="hidden" name="archivopdf" id="archivopdf" value="{{$Archivo}}">
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('archivoactual', 'Archivo Actual: ')}}</label>
                            @if($Archivo != null)
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-warning" id="verpdf" name="verpdf" onclick="showPDF({{$IdDocumentoDet}});" >Ver PDF</button>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" href="{{route('delete_documentoedit',['id'=>$IdDocumentoDet,'id2'=>$IdPeriodo])}}" class="form-control btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col text-center">
                                    <p style="font-size: small">No hay archivo para este registro</p>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                    
                    <br>
                    <br>
        
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8 text-left">
                            <input type="submit" name="Guardar" id="Guardar" value="Guardar" class="btn btn-success btn-block">
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

<script type="text/javascript">

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
