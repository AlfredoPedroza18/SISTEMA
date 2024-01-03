@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_preguntas')}}">Configuración Preguntas</a></li>
        <li class="active">
            Edición de Preguntas
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Preguntas <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Pregunta <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="form-alta-tiposservicio" action="{{ route('pregunta_configuracion_update',['id'=>$IdPregunta])}}" method="POST">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Pregunta</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="descripcionEncuesta" name="descripcionEncuesta" value="{{$IdAgrupador}}">
                            <label>Agrupador Encuesta: {{$descripcionEncuesta}}</label>
                            <br>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('Puesto', '* Agrupador Respuesta')}}</label>
                            <select class="form-control" name="cnTipoPuesto" id="cnTipoPuesto" onchange="" required>
                                    <option value="{{$IdGrupoRespuesta}}">{{$descripcionGrupo}}</option>
                                    @foreach($tipoDeRespuesta as $listaTipoPuesto)
                                        @if($listaTipoPuesto->DescripcionRespuestaGrupo <> $descripcionGrupo)
                                        <option value="{{$listaTipoPuesto->Id}}">{{$listaTipoPuesto->DescripcionRespuestaGrupo}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('numero', '* Número')}}</label>
                            {{ Form::text('numero',$Numero,['class' => 'form-control','id'=>'numero','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('descripcion', '* Pregunta')}}</label>
                            {{ Form::text('descripcion',$Pregunta,['class' => 'form-control','id'=>'descripcion','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
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
                            <label>{{ Form::label ('orden', '* Orden')}}</label>
                            {{ Form::number('orden',$iOrden,['class' => 'form-control','id'=>'orden','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>
                    </div>
                    
                    <br>
                    <br>
        
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8 text-left">
                            <input type="submit" name="Guardar" value="Guardar Pregunta" class="btn btn-success btn-block">
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

    </script>

@endsection
