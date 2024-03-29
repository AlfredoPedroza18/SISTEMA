@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('configuracion_valores_de_respuestas')}}">Configuración-Valores_de_Respuestas</a></li>
        <li class="active">
            Alta-Valores_de_Respuestas
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Valores de Respuestas<small>Alta</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Valores de Respuestas<small>Alta</small></h4>
    </div>
        
    <div class="panel-body">
            <div id="alertaa">

            </div>
            <form id="form-alta-tiposservicio" action="{{route('store_valores_de_respuestas')}}" method="POST">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Valores de Respuestas</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label>{{ Form::label ('gr', '* Grupo de Respuesta')}}</label>
                            <select class="form-control" name="gr" id="gr" required>
                                <option value="">Seleccione un Grupo de Respuesta</option>
                                @foreach($selectGR as $GR)
                                <option value="{{$GR->IdGR}}">{{$GR->DescripcionGR}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label>{{ Form::label ('r', '* Respuesta')}}</label>
                            <select class="form-control" name="r" id="r" required>
                                <option value="">Seleccione una Respuesta</option>
                                @foreach($selectVR as $VR)
                                <option value="{{$VR->IdVR}}">{{$VR->DescripcionVR}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>


                        <div class="col-md-6">
                            <label>{{ Form::label ('ivalor', '* Valor de Respuesta')}}</label>

                            {{ Form::number('ivalor','',['class' => 'form-control','id'=>'ivalor','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>

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
                            <input type="submit" name="Guardar" value="Guardar Valor de Respuesta" class="btn btn-success btn-block">
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

    $(document).ready(function(){
        document.getElementById('ivalor').addEventListener("change", function(){

        let dato = document.getElementById('ivalor').value;
        if(dato == -1){
            document.getElementById('alertaa').innerHTML = `<div class="alert alert-danger" role="alert">
                                                        Se agregará un valor de respuesta de tipo consulta!. Haga click en guardar cambios para continuar.
                                                        </div>`;
        }else{
            document.getElementById('alertaa').innerHTML = ""; 
        }
        })

    });

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
