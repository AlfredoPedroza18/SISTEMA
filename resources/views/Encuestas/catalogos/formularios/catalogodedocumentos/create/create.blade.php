@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('catalogo_documentos')}}">Catálogo de Documentos</a></li>
        <li class="active">
            Alta Catalogo Documentos
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Catálogo de Documentos <small>Alta</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Catálogo de Documentos <small>Alta</small></h4>
    </div>
        
    <div class="panel-body"> 
    <form id="form-alta-tiposservicio" action="{{route('store_nuevodocumento_encuestaaaaaaaaa')}}" method="POST">
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
                    <label>{{ Form::label ('descripcion', '* Documento')}}</label>
                    {{ Form::text('descripcion','',['class' => 'form-control','id'=>'descripcion','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                 </div>

                 <div class="col-md-6">
                    <label>{{ Form::label ('cliente', '* Cliente')}}</label>
                    <select class="form-control" name="cntC" id="cntC" required>
                        <option value="">Seleccione un Cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{$cliente->Id}}">{{$cliente->Nombre}}</option>
                            @endforeach
                    </select>
                    <br>
                </div>

                <div class="col-md-6">
                    <label>{{ Form::label ('Tipo', '* Tipo')}}</label>
                    <select class="form-control" name="Tipo" id="Tipo" onchange="" required>
                        <option value="Basico">Básico</option>
                        <option value="Extra">Extra</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>{{ Form::label ('Activo', '* Activo')}}</label>
                    <select class="form-control" name="Activo" id="Activo" onchange="" required>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <br><br>
                </div>

               
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
