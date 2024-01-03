@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_encuestass')}}">Configuración Encuesta</a></li>
        <li class="active">
            Edición de  Configuración Encuesta
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Configuración Encuesta<small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Configuración Encuesta <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="form-alta-tiposservicio" action="{{ route('encuesta_configuracion_update',['id'=>$IdEncuesta])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Configuración Encuesta</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ Form::label ('descripcion', '* Estudio')}}</label>

                            {{ Form::text('descripcion',$Descripcion,['class' => 'form-control','id'=>'descripcion','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('Anonimo', '* Anonima')}}</label>
                            <select class="form-control" name="anonima" id="anonima" onchange="" required>
                                <option value="{{$Anonima}}">{{$Anonima}}</option>
                                @if($Activo == 'Si')
                                <option value="No">No</option>
                                @else
                                <option value="Si">Si</option>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('Activo', '* Activo')}}</label>
                            <select class="form-control" name="activo" id="activo" onchange="" required>
                                <option value="{{$Activo}}">{{$Activo}}</option>
                                @if($Activo == 'Si')
                                <option value="No">No</option>
                                @else
                                <option value="Si">Si</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('archivo', '* Archivo')}}</label>
                            <input type="hidden" name="archivopdf" id="archivopdf" value="{{$Archivo}}">
                            <input class="form-control" type="file" name="archivo" id="archivo" required>
                            <div class="alert alert-warning" role="alert" style="margin-top: 2px">
                                Imagenes Tipo: JPG.
                                Tamaño: No mayor a 76.0 KB.
                                Dimensiones: 905 x 1280.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('archivoactual', 'Archivo Actual: ')}}</label>
                            @if($Archivo != null)
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-warning" id="verpdf" name="verpdf" onclick="showPDF({{$IdEncuesta}});" >Ver Imagen</button>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" href="{{route('delete_encuestaimgedit',['id'=>$IdEncuesta])}}" class="form-control btn btn-danger">Eliminar</a>
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
                            <input type="submit" name="Guardar" value="Guardar Encuesta" class="btn btn-success btn-block">
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

    $(document).ready(function(){});

</script>


<script>
    function hacer_click_TiposServicio(valor){

    var datos = $("#form-alta-tiposservicio").serialize();
    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(datos);


    if(valor==0){
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('CatalogoTiposServicio') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){
                //alert(response);
                swal(''+response.status_alta);
                if(response.status_alta == 'success'){
                    swal({
                        title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                        html: true,
                        data: datos,
                        type: "success"

                    });
                    setTimeout(function(){
                        location.href = '{{ route("sig-erp-ese::CatalogoTiposServicio.index") }}';
                    });
                }else if(response.status_alta == 'wrong'){
                    swal({
                        title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                    });
                }
            },
            error : function(jqXHR, status, error) {

                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });

    }else{

        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('CatalogoTiposServicio') }}',
            type:'PUT',
            dataType: 'json',
            data: datos,
            success: function(response){

                swal(''+response.status_alta);
                if(response.status_alta == 'success'){
                    swal({
                        title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                        html: true,
                        data: datos,
                        type: "success"

                    });
                    setTimeout(function(){
                        location.href = '{{ route("sig-erp-ese::CatalogoTiposServicio.index") }}';
                    });
                }else if(response.status_alta == 'wrong'){
                    swal({
                        title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                    });
                }
            },
            error : function(jqXHR, status, error) {

                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });
    }
    
    }

    var showPDF = function(id){

    let token = '{{csrf_token()}}';

    $.ajax({
        url:'{{route('mostrar_presentacion_encuesta')}}',
        type: "POST",
        data: {
            id:id,
            _token:token
        },
        success:function (response){
            console.log(response);
            var img = response.img;
            let imgWindow = window.open("")
            imgWindow.document.write(
                `<iframe id="vista2" width='100%' height='100%' src="data:image/jpg;base64,${img}"></iframe>`
            );
        }
    });
    }
    </script>

@endsection
