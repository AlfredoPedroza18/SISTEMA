@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_informacion_de_ayuda')}}">Configuración Información de Ayuda</a></li>
        <li class="active">
            Edición de Información de Ayuda
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Información de Ayuda <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Información de Ayuda <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="formedit" action="{{ route('informacion_de_ayuda_update',['id'=>$IdInformacion])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Información de Ayuda</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="cliente" name="cliente" value="{{$IdFecha}}">
                            <label>Fecha: {{$Fecha}}</label>
                            <br>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('archivo', '* Información')}}</label>
                            <input class="form-control" type="file" name="archivo" id="archivo">
                            <input type="hidden" name="archivopdfInformacion" id="archivopdfInformacion" value="{{$Informacion}}">
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('archivoactual', 'Archivo Actual: ')}}</label>
                            @if($Informacion != null)
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-warning" id="verpdf" name="verpdf" onclick="showPDF({{$IdInformacion}});" >Ver PDF</button>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" href="{{route('delete_pdfedit',['id'=>$IdInformacion])}}" class="form-control btn btn-danger">Eliminar</a>
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


                        <!-- INICIA DOCUMENTO -->
                        <div class="col-md-6">
                            <label>{{ Form::label ('documento', '* Documento')}}</label>
                            <input class="form-control" type="file" name="documento" id="documento">
                            <input type="hidden" name="archivopdfDocumento" id="archivopdfDocumento" value="{{$Documento}}">
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('archivoactual', 'Archivo Actual: ')}}</label>
                            @if($Informacion != null)
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-warning" id="verpdf" name="verpdf" onclick="showPDFDocumento({{$IdInformacion}});" >Ver PDF</button>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" href="{{route('delete_pdfedit',['id'=>$IdInformacion])}}" class="form-control btn btn-danger">Eliminar</a>
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
                        <!-- FINALIZA DOCUMENTO -->


                        <!-- INICIA GLOSARIO -->
                            <div class="col-md-6">
                            <label>{{ Form::label ('glosario', '* Glosario')}}</label>
                            <input class="form-control" type="file" name="glosario" id="glosario">
                            <input type="hidden" name="archivopdfGlosario" id="archivopdfGlosario" value="{{$Glosario}}">
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('archivoactual', 'Archivo Actual: ')}}</label>
                            @if($Informacion != null)
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-warning" id="verpdf" name="verpdf" onclick="showPDFGlosario({{$IdInformacion}});" >Ver PDF</button>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" href="{{route('delete_pdfedit',['id'=>$IdInformacion])}}" class="form-control btn btn-danger">Eliminar</a>
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
                        <!-- FINALIZA GLOSARIO -->

                        <div class="col-md-6">
                            <label>{{ Form::label ('periodo', '* Aplica período actual')}}</label>
                            <select class="form-control" name="periodo" id="periodo" required>
                                <option value="Si">Sí</option>

                                <option value="No">No</option>
                            </select>  
                        </div>

                    </div>
                    
                    <br>
                    <br>
        
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8 text-left">
                            <input type="submit" name="Guardar" id="Guardar" value="Guarda Información de Ayuda" class="btn btn-success btn-block">
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
var showPDFGlosario = function(id){

let token = '{{csrf_token()}}';

$.ajax({
    url:'{{route('mostrar_pdf_glosario')}}',
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

var showPDF = function(id){

let token = '{{csrf_token()}}';

$.ajax({
    url:'{{route('mostrar_pdf')}}',
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


var showPDFDocumento = function(id){

let token = '{{csrf_token()}}';

$.ajax({
    url:'{{route('mostrar_pdf_documento')}}',
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

// document.getElementById('').addEventListener("click",function(event){
// event.preventDefault();
// showPDF();
// });


</script>

@endsection
