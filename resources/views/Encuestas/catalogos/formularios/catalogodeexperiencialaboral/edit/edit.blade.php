@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('catalogo_experiencia_laboral')}}">Catálogo de Experiencia Laboral</a></li>
        <li class="active">
            Edición-Experiencia_Laboral
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Catálogo de Experiencia Laboral <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Catálogo de Experiencia Laboral <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="form-alta-tiposservicio" action="{{ route('experiencia_laboral_update',['id'=>$IdExperiencia])}}" method="POST">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Experiencia Laboral</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ Form::label ('descripcion', '* Experiencia Laboral')}}</label>

                            {{ Form::text('descripcion',$Descripcion,['class' => 'form-control','id'=>'descripcion','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>
                        
                        <div class="col-md-6">
                            <label>{{ Form::label ('activo', '* Activo')}}</label>
                            <select class="form-control" name="activo" id="activo" onchange="" required>
                                <option value="{{$Activo}}">{{$Activo}}</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    
                    <br>
                    <br>
        
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8 text-left">
                            <input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-block">
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
