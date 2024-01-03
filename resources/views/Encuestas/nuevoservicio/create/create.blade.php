@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('nuevoservicio')}}">Nuevo_Servicio</a></li>
        <li class="active">
            Encuestas-Nuevo_Servicio_Alta
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Nuevo Servicio<small>Alta</small></h1>

<br>

@if (session('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('type') }} fade in m-b-15">
                        {{ session('success') }}
                            <span class="close" data-dismiss="alert">×</span>
                    </div>
                </div>
            </div>
        @endif
<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Nuevo Servicio Alta</h4>
    </div>
    <div class="panel-body">
        <form action="{{route('store_nuevoservicio')}}" method="post">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <label>{{ Form::label ('cliente', 'Cliente')}}</label>

                <input type="hidden" name="idcliente" id="idcliente" value="{{$IdCliente}}">
                <input type="hidden" name="cli" id="cli" value="{{$cliente}}">

                {{ Form::text('cliente',$cliente,['class' => 'form-control','id'=>'cliente','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required', 'disabled'=>'disabled'])}}
            </div>

            <div class="col-md-4">
                <label>{{ Form::label ('tiposervicio', 'Servicio')}}</label>

                <input type="hidden" name="idtiposervicio" id="idtiposervicio" value="{{$IdTipoServicio}}">
                <input type="hidden" name="tserv" id="tserv" value="{{$tserv}}">

                {{ Form::text('tiposervicio',$tserv,['class' => 'form-control','id'=>'tiposervicio','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required', 'disabled'=>'disabled'])}}
            </div>

            <div class="col-md-4">
                <label>{{ Form::label ('fechadeservicio', '* Fecha de Servicio')}}</label>

                {{ Form::date('fechadeservicio',$fechaactual,['class' => 'form-control','id'=>'fechadeservicio','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
            </div>

            <br>
            <br>
            <br>
            <br>
        </div>  



        <div class="row">
            <div class="col-md-2 col-md-offset-9 text-left">
                <input type="submit" name="Guardar" value="Continuar" class="btn btn-success btn-block">
            </div>
        </div>
    </form>
    </div>
</div>

</div>

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">

var serv= function(IdTipoServicio){
        cliente=$('#cliente').val();
            if(cliente!=''){

                $(".seleccionar").attr('href', '{{ url("PlantillaClienteOS") }}/'+IdTipoServicio+'/'+cliente);

            }else{
                $('#mensC').html("<div class='alert alert-danger fade in m-b-15'></strong>  Favor de seleccionar un <strong>Cliente</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");
            }
        }

</script>

@endsection