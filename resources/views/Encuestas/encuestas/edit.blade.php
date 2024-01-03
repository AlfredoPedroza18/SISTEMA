@extends('layouts.masterMenuView')

@section('section')
<div id="content" class="content">
    <style>
        .accordion {
            background-color: #FF8F00;
            color: #FFFFFF;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active-accordion, .accordion:hover {
            background-color: #ccc;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel-accordion {
            padding: 0 18px;
            background-color: white;
            display: none;
            overflow: hidden;
            transition: 0.2s ease-out;
        }
    </style>
<ol class="breadcrumb"> <li><a href="{{route('distribucion', ['id' => $idcliente, 'id2' => $id])}}">Encuestas-Nom 035-Distribución</a></li> <li class="active"> Edición de solicitud</li></ol>

<div class="row" style="margin-bottom: 15px; margin-top:15px;">
    <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
        <label for="" style="font-size: 14px">Cliente</label>
        <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
            
            <option selected value="{{$idcliente}}" disabled>{{$cliente[0]->nombre_comercial}}</option>
            
        </select>
    </div>
    <div class="col-md-6">
        <h1 class="page-header text-center" style="">Edición de solicitud</h1>
    </div>
    <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
        <label for="" style="font-size: 14px">Periodo</label>
        <select class="form-control" style="font-size: 13px" id="periodo" disabled>
            
                <option selected value="{{$id}}" disabled>{{date('d-m-Y', strtotime($periodo[0]->Fecha))}}</option>
            
        </select>
    </div>
</div>
@if (count($centroTrabajo)>0)
    {{-- INICIO DEL DIV panel panel-inverse --}}
    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <h4 class="panel-title">Edición de solicitud</h4>
        </div>

        {{-- INICIO DEL DIV DE PANEL BODY--}}
        <div class="panel-body">
            <hr>
            @if (session('success'))
            {{-- INICIO DEL DIV ROW--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('type') }} fade in m-b-15">
                        {{session('success')}}
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                </div>
            </div>
            {{-- FIN DEL DIV ROW--}}
            @endif

            {{-- CONTENIDO DEL PANEL--}}

            {{--INICIO DE CENTROS DE TRABAJO--}}
            <button class="accordion" style="border-bottom: 1px solid white; border-radius:7px;">Centros de Trabajo</button>
            <div class="panel-accordion" >
                <br>
            <form id="form-centro-trabajo" action="{{route('addmoreCentroTrabajo')}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input type="hidden" name="idservicio" id="idservicio" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdServicio}}"/>
                <input type="hidden" name="idcliente" id="idcliente" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>

                <div class="panel panel-inverse "  id="" style="">
                    <div class="panel-heading" style="background-color: #4472C4"> <h4 class="panel-title">Centros de Trabajo</h4> </div>

                    {{--INICIA DIV PANEL BODY DE CT--}}
                    <div class="panel-body" style="" >
                        <div class="row">
                            <table class="table table-bordered" id="dynamicTable" >
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Acción</th>
                                </tr>

                                @foreach($centroTrabajo as $ct)
                                    <tr>
                                        {{ Form::open() }}
                                        {{ Form::close()}}

                                        {!! Form::open([ 'route' => ['update_solicitud_CT', $ct->IdCentro, $ct->CentroTrabajo], 'method' => 'POST', 'class'  => 'pull-right']) !!}
                                        <input type="hidden" name="idcliente" id="idcliente" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>
                                        <input type="hidden" name="idCT" id="idCT" placeholder="" class="form-control" value="{{$ct->IdCentro}}"/>

                                        <td><input  type="text" id="ctDescripcion" name="ctDescripcion" class="form-control" value="{{$ct->CentroTrabajo}}"  /></td>
                                        <td><input  type="number" name="ctCantidad" placeholder="" class="form-control positivo" min="1" id="0" pattern="^[0-9]+" value="{{$ct->CantidadCentro}}" required /></td>

                                        <td style="display: flex; align-items: center; justify-content: center;">

                                            <button type="submit" name="actualizarCT" id="actualizarCT" class="btn btn-warning">Actualizar</button>&nbsp&nbsp

                                            {!! Form::close() !!}

                                            {{ Form::open([ 'route' => ['distribucion_ct_destroy',
                                            $ct->IdCentro],
                                            'method' => 'DELETE',
                                            'class'  => 'pull-right'
                                            ]) }}
                                            <button type="submit" name="eliminarCT" id="eliminarCT" class="btn btn-danger">Eliminar</button>
                                            {{ Form::close()}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr id="ocultarLineaAgregarCt" class="trBase">
                                    {{--<input type="hidden" name="addmore[0][IdCliente]" placeholder="" class="form-control" value="{{$IdCliente}}"/>--}}
                                    <td><input type="text" name="addmore[0][Descripcion]" placeholder="" class="form-control" required autofocus/></td>
                                    <td><input type="number" name="addmore[0][Cantidad]" placeholder="" class="form-control positivo" min="1" id="0" pattern="^[0-9]+" required /></td>
                                    <td class="text-center">
                                            <button type="button" name="ocultarCTInicial" id="ocultarCTInicial" class="btn btn-danger">Eliminar</button>
                                            <h6 id="alertCT" class="text-center" style="color: rgb(221, 0, 0)">Antes debe eliminar los registros de abajo &darr;</h6>
                                    </td>
                                </tr>

                            </table>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                <input type="submit" form="form-centro-trabajo" id="botonGuardarNuevosRegistros" value="Guardar Nuevos Registros" class="btn btn-success btn-block">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                
                                    <button type="button" name="add" id="add" class="btn btn-success">Agregar más</button>
                                    <button type="button" name="mostrarCamposAgregarCT" id="mostrarCamposAgregarCT" class="btn btn-success">Agregar más</button>
                                
                            </div>

                        </div>
                    </div>
                    {{--INICIA DIV PANEL BODY DE CT--}}
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        
                    </div>
                </div>

            </form>
            </div>
            {{--FIN DE CENTROS DE TRABAJO--}}


            {{--INICIO DE DEPARTAMENTOSaddmoreDepartamentosEditar--}}
            <button class="accordion" style="border-bottom: 1px solid white; border-radius:7px;">Departamentos</button>
            <div class="panel-accordion">
            <form id="form-departamentos" action="{{route('addmoreDepartamentosEditar')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="idservicio" id="idservicio" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdServicio}}"/>
                <input type="hidden" name="idcliente" id="idcliente" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>

                <br>
                <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                    <div class="panel-heading" style="background-color: #4472C4"><h4 class="panel-title">Departamentos</h4></div>

                    <div class="panel-body" style="">
                        <div class="row">
                            <table class="table table-bordered" id="dynamicTableDepartamentos">
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Acción</th>
                                </tr>

                                @foreach($departamentos as $depto)
                                    <tr>
                                        {{ Form::open() }}
                                        {{ Form::close()}}

                                        {!! Form::open([ 'route' => ['update_solicitud_Departamento', $depto->IdDeptoCliente, $depto->Descripcion], 'method' => 'POST', 'class'  => 'pull-right']) !!}
                                        <input type="hidden" name="idcliente" id="idcliente" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>
                                        <input type="hidden" name="idDepto" id="idDepto" placeholder="" class="form-control" value="{{$depto->IdDeptoCliente}}"/>

                                        <td><input type="text" id="deptoDescripcion" name="deptoDescripcion" class="form-control" value="{{$depto->Descripcion}}"  /></td>
                                        <td style="display: flex; align-items: center; justify-content: center;">

                                            <button type="submit" name="actualizarDepartamento" id="actualizarDepartamento" class="btn btn-warning">Actualizar</button>&nbsp&nbsp

                                            {!! Form::close() !!}

                                            {{ Form::open([ 'route' => ['distribucion_de_depto_destroy',
                                            $depto->IdDeptoCliente],
                                            'method' => 'DELETE',
                                            'class'  => 'pull-right'
                                            ]) }}
                                            <button type="submit" name="eliminarDepartamento" id="eliminarDepartamento" class="btn btn-danger">Eliminar</button>
                                            {{ Form::close()}}
                                        </td>
                                @endforeach
                                <tr id="ocultarLineaAgregarDeptos" class="trBase">
                                    <input type="hidden" name="addmoreDepartamentos[0][IdCliente]" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>
                                    <td><input type="text" name="addmoreDepartamentos[0][Descripcion]" placeholder="" class="form-control" id="Dep0" required /></td>
                                    <td class="text-center">
                                        
                                        <button type="button" name="ocultarDeptoInicial" id="ocultarDeptoInicial" class="btn btn-danger">Eliminar</button>
                                        <h6 id="alertDP" class="text-center" style="color: rgb(221, 0, 0)">Antes debe eliminar los registros de abajo &darr;</h6>
                                        
                                    </td>
                                </tr>
                            </table>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                <input type="submit" form="form-departamentos" id="GuardarNuevosDepartamentos" value="Guardar Nuevos Departamentos" class="btn btn-success btn-block">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                    <button type="button" name="addDepartamentos" id="addDepartamentos" class="btn btn-success">Agregar más</button>
                                    <button type="button" name="mostrarCamposAgregarDepto" id="mostrarCamposAgregarDepto" class="btn btn-success">Agregar más</button>
                                
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        
                    </div>
                </div>
            </form>
            </div>
            {{--FIN DE DEPARTAMENTOS--}}

            {{--INICIO DE PUESTOSaddmorePuestosEditar--}}
            <button class="accordion" style="border-bottom: 1px solid white; border-radius:7px;">Puestos</button>
            <div class="panel-accordion">
            <form id="form-puestos" action="{{route('addmorePuestosEditar')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="idservicio" id="idservicio" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdServicio}}"/>
                <input type="hidden" name="idcliente" id="idcliente" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>

                <br>
                <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                    <div class="panel-heading" style="background-color: #4472C4"><h4 class="panel-title">Puestos</h4></div>

                    <div class="panel-body" style="">
                        <div class="row">
                            <table class="table table-bordered" id="dynamicTablePuestos">
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Acción</th>
                                </tr>

                                @foreach($ev_puestos as $puestos)
                                    <tr>
                                        {{ Form::open() }}
                                        {{ Form::close()}}

                                        {!! Form::open([ 'route' => ['update_solicitud_Puesto', $puestos->IdPuestoCliente, $puestos->Descripcion], 'method' => 'POST', 'class'  => 'pull-right']) !!}
                                        <input type="hidden" name="idcliente" id="idcliente" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>
                                        <input type="hidden" name="idPuesto" id="idPuesto" placeholder="" class="form-control" value="{{$puestos->IdPuestoCliente}}"/>

                                        <td><input type="text" id="puestoDescripcion" name="puestoDescripcion" class="form-control" value="{{$puestos->Descripcion}}"  /></td>
                                        <td style="display: flex; align-items: center; justify-content: center;">

                                            <button type="submit" name="actualizarPuesto" id="actualizarPuesto" class="btn btn-warning">Actualizar</button>&nbsp&nbsp

                                            {!! Form::close() !!}

                                            {{ Form::open([ 'route' => ['distribucion_de_puestos_destroy',
                                            $puestos->IdPuestoCliente],
                                            'method' => 'DELETE',
                                            'class'  => 'pull-right'
                                            ]) }}
                                            <button type="submit" name="eliminarDepartamento" id="eliminarDepartamento" class="btn btn-danger">Eliminar</button>
                                            {{ Form::close()}}
                                        </td>
                                @endforeach

                                <tr id="ocultarLineaAgregarPuestos" class="trBase">
                                    <input type="hidden" name="addmorePuestos[0][IdCliente]" placeholder="" class="form-control" value="{{$centroTrabajo[0]->IdCliente}}"/>
                                    <td><input type="text" name="addmorePuestos[0][Descripcion]" placeholder="" class="form-control" id="Dep0" required /></td>
                                    <td class="text-center">
                                        <button type="button" name="ocultarPuestoInicial" id="ocultarPuestoInicial" class="btn btn-danger">Eliminar</button>
                                        <h6 id="alertPT" class="text-center" style="color: rgb(221, 0, 0)">Antes debe eliminar los registros de abajo &darr;</h6>
                                    </td>
                                </tr>
                            </table>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                <input type="submit" form="form-puestos" id="GuardarNuevosPuestos" value="Guardar Nuevos Puestos" class="btn btn-success btn-block">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                <button type="button" name="addPuestos" id="addPuestos" class="btn btn-success">Agregar más</button>
                                <button type="button" name="mostrarCamposAgregarPuestos" id="mostrarCamposAgregarPuestos" class="btn btn-success">Agregar más</button>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        
                    </div>
                </div>
            </form>
            {{--FIN DE PUESTOS--}} 
            </div>
        </div>
        {{-- FIN DEL DIV DE PANEL BODY--}}
    </div>
    {{-- FIN DEL DIV panel panel-inverse --}}
    
@endif


<div class="row">
    <div class="col-md-12 text-center">
        <a href="{{asset('archivos/Plantilla Personal Encuestas.xlsx')}}"><button type="button" class="btn btn-info">Descargar Plantilla</button></a>
    </div>
</div>

<div style="margin-top: 12px">
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="idcliente" id="idcliente" value="{{$idcliente}}">
    <input class="form-control" type="hidden" name="idTipoServicio" id="idTipoServicio" value="{{$id}}">
    <input class="form-control" type="hidden" name="fecha" id="fecha" value="{{$periodo[0]->Fecha}}">
    <input class="form-control" type="hidden" name="periodo" id="periodo" value="{{$periodo[0]->IdPeriodo}}">
    
    {{ csrf_field() }}
    Seleccione un archivo excel : <input type="file" name="file" accept=".xlsx"  class="form-control">
    <input type="submit" class="btn btn-primary btn-lg" value="Importar">
</form>
</div>
@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">

    //Ocultamiento de botones de CT
    $('#ocultarLineaAgregarCt').hide(); //oculto mediante id
    $('#botonGuardarNuevosRegistros').hide();
    $('#add').hide(); //oculto mediante id
    $('#alertCT').hide();

    $("#mostrarCamposAgregarCT").click(function() {
        $('#ocultarLineaAgregarCt').show(); //muestro mediante id
        $('#mostrarCamposAgregarCT').hide();
        $('#add').show(); //oculto mediante id
        $('#botonGuardarNuevosRegistros').show();
        $('#dynamicTable tr:last').find('input:visible:first').focus();
    });

    $("#ocultarCTInicial").click(function() {
        var ver = $('#dynamicTable tr:last').hasClass("trBase");
        if(ver==true){
            $('#ocultarLineaAgregarCt').hide(); //oculto mediante id
            $('#mostrarCamposAgregarCT').show();
            $('#add').hide(); //oculto mediante id
            $('#alertCT').hide();
            $('#botonGuardarNuevosRegistros').hide();
        }else{
            $('#alertCT').show();
        }
    });
    //Fin de ocultamiento de botones CT

    //Inicio de ocultamiento de DEPTO
    $('#ocultarLineaAgregarDeptos').hide(); //oculto mediante id
    $('#GuardarNuevosDepartamentos').hide(); //oculto mediante id
    $('#addDepartamentos').hide();
    $('#alertDP').hide();

    $("#mostrarCamposAgregarDepto").click(function() {
        $('#ocultarLineaAgregarDeptos').show(); //muestro mediante id
        $('#mostrarCamposAgregarDepto').hide(); //oculto mediante id
        $('#GuardarNuevosDepartamentos').show(); //oculto mediante id
        $('#addDepartamentos').show();
        $('#dynamicTableDepartamentos tr:last').find('input:visible:first').focus();
    });


    $("#ocultarDeptoInicial").click(function() {
        var veri = $('#dynamicTableDepartamentos tr:last').hasClass("trBase");
        if(veri==true){
            $('#ocultarLineaAgregarDeptos').hide(); //oculto mediante id
            $('#mostrarCamposAgregarDepto').show(); //oculto mediante id
            $('#GuardarNuevosDepartamentos').hide(); //oculto mediante id
            $('#addDepartamentos').hide();
            $('#alertDP').hide();
        }else{
            $('#alertDP').show();
        }
    });
    //Fin de Ocultamiento de DEPTO

    //Inicio de ocultamiento de PUESTOS
    $('#ocultarLineaAgregarPuestos').hide(); //oculto mediante id
    $('#GuardarNuevosPuestos').hide(); //oculto mediante id
    $('#addPuestos').hide();
    $('#alertPT').hide();

    $("#mostrarCamposAgregarPuestos").click(function() {
        $('#ocultarLineaAgregarPuestos').show(); //muestro mediante id
        $('#mostrarCamposAgregarPuestos').hide(); //oculto mediante id
        $('#GuardarNuevosPuestos').show(); //oculto mediante id
        $('#addPuestos').show();
        $('#dynamicTablePuestos tr:last').find('input:visible:first').focus();
    });


    $("#ocultarPuestoInicial").click(function() {
        var veri = $('#dynamicTablePuestos tr:last').hasClass("trBase");
        if(veri==true){
            $('#ocultarLineaAgregarPuestos').hide(); //oculto mediante id
            $('#mostrarCamposAgregarPuestos').show(); //oculto mediante id
            $('#GuardarNuevosPuestos').hide(); //oculto mediante id
            $('#addPuestos').hide();
            $('#alertPT').hide();
        }else{
            $('#alertPT').show();
        }
    });
    //Fin de Ocultamiento de PUESTOS


    var contenido = document.getElementById("idcliente").value;
    var i = 0;

    function el(el) {
        return document.getElementById(el);
    }

    el('0').addEventListener('input',function() {
        var val = this.value;
        this.value = val.replace(/\D|\-/,'');
    });

    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<tr><input type="hidden" name="addmore[' + i + '][IdCliente]" placeholder="" class="form-control" value="' + contenido + '"/><td><input type="text" name="addmore[' + i + '][Descripcion]" placeholder="" class="form-control" required/></td><td><input type="number" name="addmore[' + i + '][Cantidad]" placeholder="" class="form-control" id="' + i + '" required /></td><td style="display: flex; align-items: center; justify-content: center;"><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');

        $('#dynamicTable tr:last').find('input:visible:first').focus();
        

        function el(el) {
            return document.getElementById(el);
        }

        el(i).addEventListener('input',function() {
            var val = this.value;
            this.value = val.replace(/\D|\-/,'');
        });
    });

    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
    });

    /*****************************************************
             INICIA CONFIGURACION DE DEPARTAMENTOS
    *****************************************************/

        //Input dinamicos para departamentos
    var n = 0;
    $("#addDepartamentos").click(function(){
        ++n;
        $("#dynamicTableDepartamentos").append('<tr><input type="hidden" name="addmoreDepartamentos['+n+'][IdCliente]" placeholder="" class="form-control" value="'+contenido+'" required/><td><input type="text" name="addmoreDepartamentos['+n+'][Descripcion]" placeholder="" class="form-control" required/></td><td style="display: flex; align-items: center; justify-content: center;"><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');

        $('#dynamicTableDepartamentos tr:last').find('input:visible:first').focus();
    });

    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
    });
    //Finaliza inputs dinamicos de departamentos
    /*****************************************************
             FINALIZA CONFIGURACION DE DEPARTAMENTOS
    *****************************************************/


    /*****************************************************
        INICIA CONFIGURACION DE PUESTOS
    *****************************************************/
    var f = 0;
    $("#addPuestos").click(function(){
        ++f;
        $("#dynamicTablePuestos").append('<tr><input type="hidden" name="addmorePuestos['+f+'][IdCliente]" placeholder="" class="form-control" value="'+contenido+'" required/><td><input type="text" name="addmorePuestos['+f+'][Descripcion]" placeholder="" class="form-control" required/></td><td style="display: flex; align-items: center; justify-content: center;"><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');

        $('#dynamicTablePuestos tr:last').find('input:visible:first').focus();
    });

    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
    });
    /*****************************************************
        FINALIZA CONFIGURACION DE PUESTOS
    *****************************************************/

    $(".positivo").keyup(function () {
        var valor = $(this).prop("value");
        if (valor < 0)
            $(this).prop("value", (valor*-1));
    })

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
@endsection
