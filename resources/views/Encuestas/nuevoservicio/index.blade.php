@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('homevista')}}">Módulos</a></li>
        <li class="active">
            Encuestas-NuevoServicio
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Nuevo Servicio</h1>

<br>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Solicitar Servicio</h4>
    </div>
    
    <div class="panel-body">
        <div class="col-md-15">
            <form id="changePC" action="" method="post">
                <label for="ctnA" class="col-form-label">Cliente:</label>
                @if(Auth::user()->tipo == 'c')
                    <select class="form-control" name="cliente" id="cliente" onchange="" disabled=false>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->Cliente}}">{{$cliente->Nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <select class="form-control" name="cliente" id="cliente" onchange="" >
                        <option value="">Seleccione un Cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->Cliente}}">{{$cliente->Nombre}}</option>
                        @endforeach
                    </select>
                @endif
                
                <input type="hidden" id="valctn" name="valctn" value="">
            </form>
        </div>
        <hr>
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
        <div id="mensC"></div>
        <table class="display table table-striped table-bordered table-responsive">
            <th>
                @foreach($servicios as $servicio)
                <div class="col-md-4 col-sm-6 animacion-modulos">
                    <div class="widget widget-stats square" style="background:{{$servicio->Color}};">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>
                            <div class="stats-title" id="servicio" name="servicio">{{$servicio->Descripcion}}
                                <div id="EditOSC"></div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="stats-link col-md-12">
                                        <a href="javascript:;" class="stats-link col-md-6 icoRss text-center popovers" data-trigger="focus" data-html="true" data-container="body" data-placement="bottom" data-content="{{$servicio->DescripcionServicioInfo}}" data-original-title="<strong>{{$servicio->Descripcion}}</strong>">Información Serv <i class="fa fa-info-circle fa-sm"></i></a>
                                    <a id="seleccionar" class="stats-link col-md-15 seleccionar"  onclick="verificar({{$servicio->IdTipoServicio}});">Seleccionar <i class="fa fa-arrow-circle-o-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </th>
            
            <div  class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="panel-inverse" data-sortable-id="ui-widget-14">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Nuevo Servicio Alta</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="{{route('store_nuevoservicio')}}" method="post">
                                        {{ csrf_field() }}
                                    <div class="row">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <!-- <label> Cliente</label> -->
                                
                                                <input type="hidden" name="idcliente" id="idcliente">

                                                <!-- <input class="form-control" type="text" name="cli" id="cli" disabled> -->

                                            </div>
                                
                                            <div class="col-md-4">
                                                <!-- <label> Servicio </label> -->
                                
                                                <input type="hidden" name="idtiposervicio" id="idtiposervicio">

                                                <!-- <input class="form-control" type="text" name="tserv" id="tserv" disabled> -->

                                            </div>
                                
                                            <div class="col-md-12">
                                                <label>{{ Form::label ('fechadeservicio', '* Fecha de Servicio')}}</label>
                                
                                                {{ Form::date('fechadeservicio',$fechaactual,['class' => 'form-control','id'=>'fechadeservicio','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                            </div>
                                
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            
                                        </div>  
                            
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-9 text-left">
                                                <input type="submit" name="Guardar" value="Continuar" class="btn btn-success btn-block">
                                            </div>
                                        </div>
                                    
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </table>
        <br>
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

var verificar= function(IdTipoServicio){
        IdCliente=$('#cliente').val();
            if(IdCliente!=''){
                /*$(".seleccionar").attr('href', '{{ url("nuevoservicio/create") }}/'+IdTipoServicio+'/'+IdCliente);*/
                //document.getElementById('confirmar').style = "display: block";
                mostrarmodal(IdTipoServicio);
                $('#confirmar').modal('show');
            }else{
                $('#mensC').html("<div class='alert alert-danger fade in m-b-15'></strong>  Favor de seleccionar un <strong>Cliente</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");
            }
        }

var mostrarmodal= function(IdTipoServicio){
    IdCliente=$('#cliente').val();
    document.getElementById('idcliente').value = IdCliente;
    document.getElementById('idtiposervicio').value = IdTipoServicio;

}

</script>

@endsection