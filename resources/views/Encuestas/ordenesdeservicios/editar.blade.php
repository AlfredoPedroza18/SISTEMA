@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="">Módulos</a></li>
            <li class="active">
               Encuestas-Ordenes de Servicio-Editar
            </li>
        </li>
    </ol>

    <h1 class="page-header text-center">Editar Orden de Servicio</h1>
    <br>

    
    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Editar Orden de Servicio</h4>
        </div>

        <div class="panel-body">
        <form id="form-alta-tiposservicio" action="{{ route('update_ordenservicioencuesta',['id'=>$listOrdenesServicio[0]->id])}}" method="POST">
        {{ csrf_field() }}
        
        @if (session('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('type') }} fade in m-b-15">
                        {{session('success')}}
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="col-sm-3">
                <h4 >Acceder a: <a href="" style="text-decoration: none;color:#000;" >  </a> </h4>
            </div>
            <div class="input-group-btn col-md-3 col-md-offset-6 text-right">

                  <a class="btn btn-small btn-warning"
                      style="margin-right: 10px"
                      href="#" data-toggle="modal" data-target="#cancelar" data-placement="top" title="Cancelar OS" data-original-title="Cancelar OS" onclick="showmodal('CancelarOS');">
                      Cancelar OS
                  </a>
                  {{-- <a class="btn btn-small btn-warning"
                      href="#" data-toggle="modal" data-target="#cerrar" data-placement="top" title="Cerrar OS" data-original-title="Cerrar OS"  onclick="showmodal('CerrarOS');" >
                      Cerrar OS
                  </a> --}}
                  <button class="btn btn-small btn-warning" id="btnCerrarServicio">
                    Cerrar OS
                  </button>

              <!-- <button type="button" class="btn btn-small btn-warning">Cancelar</button>
              <button type="button" class="btn btn-small btn-warning">Cerrar</button> -->
            </div>
            <br><br><br>


                <div class="row">

                    <div class="form-group col-md-3">
                        <label>Modulo</label>
                        <input class="form-control" type="text" name="modulo" value="{{$listOrdenesServicio[0]->modulo}}"" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Cliente</label>
                        <input class="form-control" id="clienteorden" type="text" name="cloente" value="{{$listOrdenesServicio[0]->cliente}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Estatus</label>
                        <input class="form-control" type="text" name="estatus" value="{{$listOrdenesServicio[0]->estado}}" readonly>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Fecha Solicitud</label>
                        <input class="form-control" id="periodosolicitud" type="datetime" name="fecha" value="{{$listOrdenesServicio[0]->FechaSolicitud}}" readonly>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Fecha Cierre</label>
                        <input class="form-control" type="datetime" name="cierre" value="{{$listOrdenesServicio[0]->FechaCierre}}" readonly>
                        <input class="form-control" type="hidden" name="idOS" value="{{$listOrdenesServicio[0]->id_os}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                    @permission('ese.ordenes.servicio')  
                        <label>Costo del Servicio</label>
                        <div class="input-group">
                        <span class='input-group-addon'>$</span>
                        {{-- @if (($datos[3] != 'Cancelado') && ($datos[3] != 'Cerrado')) --}}
                        <input class="currency input-group  form-control"  type="number"  min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' id="costo" name="costo" value="{{$listOrdenesServicio[0]->costo}}">
                        {{-- @else
                        <input class="currency input-group  form-control"  type="number"  min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' name="costo" value="{{$datos[11]}}" readonly>
                        @endif --}}
                        </div>
                    @endpermission
                    </div>

                    <div class="form-group col-md-4">
                        <label>Precio Facturable</label>
                        <div class="input-group">
                        <span class='input-group-addon'>$</span>
                        <input class="currency form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' name="precio" value="{{$listOrdenesServicio[0]->PrecioFacturable}}"" readonly>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                    @permission('ese.ordenes.servicio') 
                        <label>Numero Factura</label>
                        <input class="form-control" type="numero" name="numeroFactura" value="">
                    @endpermission
                    </div>
                    <div class="form-group col-md-6">
                    @permission('ese.ordenes.servicio') 
                        <label>Documento</label>
                        <input class="form-control" type="file" name="documento" id="documento" accept="application/pdf" >
                    @endpermission
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                    @permission('ese.ordenes.servicio') 
                        <label>Estatus Cobro</label>

                        <select class="form-control" name="estadoCobro" id="estadoCobro" onchange="">
                            <option value="{{$listOrdenesServicio[0]->estado}}">{{$listOrdenesServicio[0]->estado}}</option>
                                <option  id ="Cobrado" name="Cobrado" value="Cobrado">Cobrado</option>
                                <option  id ="Pendiente" name="Pendiente" value="Pendiente">Pendiente</option>
                                <option  id ="Facturado" name="Facturado" value="Facturado">Facturado</option>
                        </select>

                        <input type="hidden" id="estatus" value="">
                    @endpermission
                    </div>
                    <div class="form-group col-md-4" >

                    <label>Fecha Factura</label><input class="form-control" type="date" value="" id="facturaF" name="facturaF" readonly>

                    </div>

                    <div class="form-group col-md-4" >

                    <label>Fecha Cobro</label><input class="form-control" type="date" value="" id="CobroF" name="CobroF" readonly>

                    </div>

                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        @permission('ese.ordenes.servicio') 
                            <label>Asignar Analista</label>
                            <select class="form-control" name="asignarAnalista" id="asignarAnalista" onchange="">
                                <option value="" selected disabled> --seleccione un analista-- </option>
                                @foreach ($ejecutivo as $eje)
                                    <option value="{{ $eje->id }}">{{ $eje->nombre }} {{ $eje->ap_paterno }} {{ $eje->ap_materno }}</option>
                                @endforeach
                            </select>
    
                            <input type="hidden" id="estatus" value="">
                        @endpermission
                    </div>

                    <div class="form-group col-md-4">
                        <label style="color: white">.</label>
                        <div>
                            <button id="btnNotificar" class="btn btn-warning">Notificar Analista</button>
                        </div>
                    </div>
                </div>



                @permission('ese.ordenes.servicio') 
                <div class="input-group-btn col-md-3 col-md-offset-11 text-right">
                <input type="submit" class="btn btn-success" value="Guardar" onclick="guardar();" />
                </div>
                @endpermission
    
        </div>
    </div>

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">
    $("#estadoCobro").change( function() {
        console.log("ebrre");
        if ($(this).val() === "Cobrado") {
            $("#CobroF").prop("disabled", false);
        } else {
            $("#id_input").prop("disabled", false);
        }
    });

    document.getElementById('btnNotificar').addEventListener("click", function(e){
        e.preventDefault();
        notificarAnalista();
    });

    document.getElementById('btnCerrarServicio').addEventListener("click", function(e){
        e.preventDefault();
        notificarCierreServicio();
    });

    function notificarAnalista(){
        let token = '{{csrf_token()}}';
        let IdAnalista = document.getElementById('asignarAnalista').value;
        let cliente = document.getElementById('clienteorden').value;
        console.log(IdAnalista);
        $.ajax({
            url: '{{ route('notificar_analista') }}',
            type: "POST",
            data: {
                IdAnalista:IdAnalista,
                cliente:cliente,
                _token: token
            },
            success: function(response){
                if(response.data == true){
                    swal("Aviso!", "Se envío la notificación", "info");
                    document.getElementById('btnNotificar').disabled = "disabled";
                }else{
                    
                }
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }

    function notificarCierreServicio(){
        $('body').waitMe({
            effect : 'roundBounce',
            waitTime: 100000,
            text : 'Espere un momento por favor...',
            onClose: function() {}
        });
        let token = '{{csrf_token()}}';
        let cliente = document.getElementById('clienteorden').value;
        console.log(cliente);
        $.ajax({
            url: '{{ route('cerrar_servicio_notificar') }}',
            type: "POST",
            data: {
                cliente:cliente,
                _token: token
            },
            success: function(response){
                if(response.data == true){
                    $('body').waitMe({
                        effect : 'roundBounce',
                        waitTime: 100,
                        text : 'Espere un momento por favor...',
                        onClose: function() {}
                    });
                    swal("Aviso!", "Se envío la notificación", "info");
                    document.getElementById('btnNotificar').disabled = "disabled";
                }else{
                    $('body').waitMe({
                        effect : 'roundBounce',
                        waitTime: 100,
                        text : 'Espere un momento por favor...',
                        onClose: function() {}
                    });
                }
            },
            error: function( e ) {
                console.log(e);
                $('body').waitMe({
                    effect : 'roundBounce',
                    waitTime: 100,
                    text : 'Espere un momento por favor...',
                    onClose: function() {}
                });
                swal("Aviso!", "No se pudo enviar la notificación", "info");
            }
        });
    }
</script>

@endsection