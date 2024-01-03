@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('catalogo_politicas_clientes')}}">Catálogo de Políticas Clientes</a></li>
        <li class="active">
            Edición-Catálogo_de_Políticas_Clientes 
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Catálogo de Políticas Clientes <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Catálogo de Políticas Clientes <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="formedit" action="{{ route('politicas_clientes_update',['id'=>$IdPolitica])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Política Cliente</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="cliente" name="cliente" value="{{$IdCliente}}">
                            <label>Cliente: {{$Cliente}}</label>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label>{{ Form::label ('descripcion', '* Política Cliente')}}</label>

                            {{ Form::text('descripcion',$Descripcion,['class' => 'form-control','id'=>'descripcion','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('activo', '* Activo')}}</label>
                            <select class="form-control" name="activo" id="activo" onchange="" required>
                                <option value="{{$Activo}}">{{$Activo}}</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
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
                                    <button type="button" class="form-control btn btn-warning" id="verpdf" name="verpdf" onclick="showPDF({{$IdPolitica}});" >Ver PDF</button>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" href="{{route('delete_pdfedit',['id'=>$IdPolitica])}}" class="form-control btn btn-danger">Eliminar</a>
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

let token = '{{csrf_token()}}';

$.ajax({
    url:'{{route('mostrar_pdf_politica_cliente')}}',
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

document.getElementById('').addEventListener("click",function(event){
event.preventDefault();
showPDF();
});
</script>

@endsection
