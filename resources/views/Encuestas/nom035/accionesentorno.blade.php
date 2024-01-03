@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->
<style>
    button{
        border: none;
        padding: 1rem;
        background-color: rgb(6, 140, 202);
        border-radius: 3px;
    }

    p{
        margin: 0;
    }

    option{
        font-size:14px!important;
    }

    @media(max-width:1450px){
       
    }

    /* .select2-dropdown.select2-dropdown--below{
        font-size: 14px!important;
        color: #000;
    } */

    .d-flex{
        display: flex;
        justify-content: space-between;
        padding: 5px;
    }

</style>

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="{{route('nom035')}}">Módulos</a></li>
            <li class="active">
                Encuestas-Nom 035-Acciones-Entorno
            </li>
        </li>
    </ol>

    <!-- <a href="{{ URL::previous() }}">
        <i class="fa fa-arrow-left fa-1x" aria-hidden="true"></i>
    </a> -->

    <h1 class="page-header text-center">Entorno Laboral</h1>
    <br>

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

    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12"></div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <button style="font-size: 16px" type="button" id="reporte-acciones" class="btn-primary btn-block" data-toggle="button" aria-pressed="false">
                            <p>Acciones de seguimiento PDF</p>
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <button style="font-size: 16px" type="button" id="reporte" class="btn-primary btn-block" data-toggle="button" aria-pressed="false">
                            <p>Reporte de centros de trabajo PDF</p>
                        </button>  
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            {{--BARRA LATERAL CON LOS FILTROS DE GENERO-ESTADO CIVIL ETC--}}
            <div class="widget widget-stats bg-black">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Cliente y Periodo</div>
                    </div>
                </div>
                <div class="panel-body table-responsive" style="height: 6.3rem; padding: 5px;">
                    <table style="height: 50px; width: 100%;">
                        <tbody id="TiposEncuesta">
                            <tr>
                                <th style="font-size: 16px" class="text-center">{{$datos[0]->nombre_comercial}}</th>
                                <input id="cliente" type="hidden" value="{{$IdCliente}}">
                            </tr>
                            <tr>
                                <th style="font-size: 16px" class="text-center">{{ date('d-m-Y', strtotime($datos[0]->Fecha))}}</th>
                                <input id="periodo" type="hidden" value="{{$IdPeriodo}}">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="widget widget-stats bg-black">
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Centro de Trabajo</div>
                    </div>
                </div> --}}
                <div class="panel-body table-responsive" style="height: 11rem; padding: 5px;">
                    {{-- <select class="form-control select2" name="centrotrabajo" id="centrotrabajo" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($centrostrabajo as $row)
                            <option value="{{$row->IdCentro}}">{{$row->Descripcion}}</option>  
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading15" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                  Centro de Trabajo
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse15" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading15">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($centrostrabajo as $row)
                                        <div class="form-group form-check" style="margin:0">
                                            <input type="checkbox" value="C {{$row->IdCentro}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>

                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Departamento</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="departamento" id="departamento" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($departamento as $row)
                            <option value="{{$row->IdDeptoCliente}}">{{$row->Descripcion}}</option>  
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading16" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                    Departamento
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse16" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading16">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($departamento as $row)
                                        <div class="form-group form-check" style="margin:0">
                                            <input type="checkbox" value="D {{$row->IdDeptoCliente}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
           
                </div>
                <div class="row">
                    <div class="panel-heading">
                        <button class="btn btn-primary" id="clearfilterPeriodo">Limpiar Filtros</button>
                    </div>
                </div>
            </div>
            <div class="widget widget-stats bg-black">
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Genero</div>
                    </div>
                </div> --}}
                <div class="panel-body table-responsive" style="height: 65rem; padding: 5px;">
                    {{-- <select class="form-control select2" name="genero" id="genero" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($genero as $row)
                            <option value="{{$row->IdGenere}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Genero
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                @foreach ($genero as $row)
                                <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                    <input type="checkbox" class="checkFiltro" value="G {{$row->IdGenere}}" class="form-check-input" id="exampleCheck1">
                                    <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                </div>
                            @endforeach
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="row">
                        @foreach ($genero as $row)
                            <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                <input type="checkbox" class="checkFiltro" value="G {{$row->IdGenere}}" class="form-check-input" id="exampleCheck1">
                                <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                            </div>
                        @endforeach
                    </div> --}}
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Edad</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="edad" id="edad" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($edad as $row)
                                <option value="{{$row->IdRango}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading4" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                  Edad
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading4">
                              <div class="panel-body">
                                    <div class="row">
                                        @foreach ($edad as $row)
                                            <div class="form-group form-check col-md-6" style=" padding-left:10px; margin:0">
                                                <input type="checkbox" value="E {{$row->IdRango}}" class="form-check-input" id="exampleCheck1">
                                                <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Estado Civil</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="estadocivil" id="estadocivil" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($estadocivil as $row)
                            <option value="{{$row->IdEstadoCivil}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading5" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                  Estado Civil
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading5">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($estadocivil as $row)
                                        <div class="form-group form-check col-md-6" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="EC {{$row->IdEstadoCivil}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Nivel de Estudios</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="estudios" id="estudios" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($nivelestudios as $row)
                                <option value="{{$row->IdNivelEstudio}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading6" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                  Nivel de Estudios
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading6">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($nivelestudios as $row)
                                        <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="NE {{$row->IdNivelEstudio}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Tipo de Puesto</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="puesto" id="puesto" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($tipopuesto as $row)
                                <option value="{{$row->IdTipoPuesto}}">{{$row->Descripcion}}</option> 
                        @endforeach
                    </select>  --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading7" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                  Tipo de Puesto
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading7">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($tipopuesto as $row)
                                        <div class="form-group form-check col-md-6" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="TP {{$row->IdTipoPuesto}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Puesto del Cliente</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="puestocliente" id="puestocliente" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($puestocliente as $row)
                                <option value="{{$row->IdPuestoCliente}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading8" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                  Puesto del Cliente
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading8">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($puestocliente as $row)
                                        <div class="form-group form-check col-md-6" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="PC {{$row->IdPuestoCliente}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Antiguedad en el Puesto</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="antiguedad" id="antiguedad" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($antiguedad as $row)
                                <option value="{{$row->IdAntiguedad}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select>  --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading9" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                  Antiguedad en el Puesto
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading9">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($antiguedad as $row)
                                        <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="A {{$row->IdAntiguedad}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Tipo de Personal</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="tipopersonal" id="tipopersonal" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($tipopersonal as $row)
                            <option value="{{$row->IdTipoPersonal}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading10" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                  Tipo de Personal
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading10">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($tipopersonal as $row)
                                        <div class="form-group form-check col-md-6" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="P {{$row->IdTipoPersonal}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Tipo de Contrato</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="contrato" id="contrato" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($tipocontrato as $row)
                            <option value="{{$row->IdTipoContrato}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading11" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                  Tipo de Contrato
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading11">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($tipocontrato as $row)
                                        <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="TC {{$row->IdTipoContrato}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Tipo de Jornada</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="jornada" id="jornada" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($tipojornada as $row)
                            <option value="{{$row->IdTipoJornada}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading12" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                  Tipo de Jornada
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading12">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($tipojornada as $row)
                                        <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="TJ {{$row->IdTipoJornada}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Experiencia Laboral</div>
                    </div> --}}
                    {{-- <select class="form-control select2" name="experiencialaboral" id="experiencialaboral" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        @foreach ($experiencialaboral as $row)
                            <option value="{{$row->IdExperiencia}}">{{$row->Descripcion}}</option>
                        @endforeach
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading13" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                  Experiencia Laboral
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading13">
                              <div class="panel-body">
                                <div class="row">
                                    @foreach ($experiencialaboral as $row)
                                        <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                            <input type="checkbox" value="EL {{$row->IdExperiencia}}" class="form-check-input" id="exampleCheck1">
                                            <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">{{$row->Descripcion}}</label>
                                        </div>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="widget widget-stats bg-black">
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="stats-title text-center" style="font-size:15px">Rola Turnos</div>
                    </div>
                </div> --}}
                <div class="panel-body table-responsive" style="height: 10rem; padding: 5px;">
                    {{-- <select class="form-control select2" name="rolaturnos" id="rolaturnos" style="margin-bottom:18px; font-size:15px; margin-bottom:2px; width:100%">
                        <option value="0" selected>Todos</option>
                        <option value="Si">Sí</option>
                        <option value="No">No</option>
                    </select> --}}
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading14" style="padding: 8px;">
                              <h4 class="panel-title">
                                <a class="collapsed" style="display: flex; align-items: center; justify-content: space-between; font-size:15px;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                  Rola Turnos
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse bg-black" role="tabpanel" aria-labelledby="heading14">
                              <div class="panel-body">
                                <div class="row">
                                    <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                        <input type="checkbox" value="R Si" class="form-check-input" id="exampleCheck1">
                                        <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">Si</label>
                                    </div>
                                    <div class="form-group form-check" style=" padding-left:10px; margin:0">
                                        <input type="checkbox" value="R No" class="form-check-input" id="exampleCheck1">
                                        <label style="color: white; font-size:16px" class="form-check-label" for="exampleCheck1">No</label>
                                    </div>
                            </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- CONTENIDO CENTRAL --}}
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row">
                <div class="widget widget-stats bg-black">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="stats-title text-center" style="font-size:15px"></div>
                        </div>
                    </div>
                    {{-- BARRA SUPERIOR CON LOS ICONOS --}}
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12"  style="text-align: center">
                            <div>
                                <div style="width:80px; height:40px; background-color:#fff; display: inline-block;border-radius:15%"><span id="cant_encuesta" style="color:#000;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:15px"></span></div>
                                <div style="width:40px; height:40px; display: inline-block;"><i style="color:rgb(255, 123, 0);" class="fa fa-clipboard fa-4x" aria-hidden="true"></i></div>
                            </div>
                            <p style="font-size: 16px">Encuestas</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12"  style="text-align: center">
                            <div>
                                <div style="width:80px; height:40px; background-color:#fff; display: inline-block;border-radius:15%"><span id="cant_centro" style="color:#000;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:15px"></span></div>
                                <div style="width:40px; height:40px; display: inline-block;"><i style="color:rgb(255, 123, 0);" class="fa fa-home fa-4x" aria-hidden="true"></i></div>
                            </div>
                            <p style="font-size: 16px">Centros de Trabajo</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12"  style="text-align: center">
                            <div>
                                <div style="width:80px; height:40px; background-color:#fff; display: inline-block;border-radius:15%"><span style="color:#000;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:15px" id="calificacion_riesgo_principal">0</span></div>
                                <div style="width:40px; height:40px; display: inline-block;"><i style="color:rgb(255, 123, 0);" class="fa fa-desktop fa-4x" aria-hidden="true"></i></div>
                            </div>
                            <p style="font-size: 16px">Calificación</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- GRAFICAS --}}
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Departamento</div>
                                </div>
                            </div>
                            <div id="graficaDepartamento" class="panel-body table-responsive" style="height: 26rem;padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="departamentoChart" ></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0; padding-right:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Centro de Trabajo</div>
                                </div>
                            </div>
                            <div id="graficaCentro" class="panel-body table-responsive" style="height: 26rem;padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="centrotrabajoChart" ></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black" style="height: 315px; border-radius: 5px; display:flex; flex-direction:column; justify-content:center; align-items:center;; border:2px solid gray">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Genero</div>
                                </div>
                            </div>
                            <div id="graficaGenero" class="panel-body" style="height: 26rem; padding: 5px; display:flex; align-items:center; justify-contents:center">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="clientesChart" width="400px" height="250px"></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0; padding-right:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Edad</div>
                                </div>
                            </div>
                            <div id="graficaEdad" class="panel-body table-responsive" style="height:26rem;padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="totalServiciosChart" ></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black" style="height: 315px; border-radius: 5px; display:flex; flex-direction:column; justify-content:center; align-items:center;; border:2px solid gray">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Estado Civil</div>
                                </div>
                            </div>
                            <div id="graficaEstadoCivil" class="panel-body" style="height: 26rem; padding: 5px; display:flex; align-items:center; justify-contents:center; padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="estadocivilChart" width="400px" height="250px"></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0; padding-right:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Nivel de Estudio</div>
                                </div>
                            </div>
                            <div id="graficaNivelEstudio" class="panel-body table-responsive" style="height: 26rem; padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="nivelestudioChart" ></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Ocupación/Puesto</div>
                                </div>
                            </div>
                            <div id="graficaPuesto" class="panel-body table-responsive" style="height: 26rem; padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="ocupacionChart" ></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:0; padding-right:0">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Tipo de Puesto</div>
                                </div>
                            </div>
                            <div id="graficaTipoPuesto" class="panel-body table-responsive" style="height: 26rem; padding:0">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="tipopuestoChart" ></canvas></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
      
    {{-- <div id="newTable">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th class="bg-black" style="color: #fff; padding:5px;" colspan="2">Categoría</th>
                    <th class="bg-black" style="color: #fff; padding:5px;" colspan="2">Dominio</th>
                    <th class="bg-black" style="color: #fff; padding:5px;" colspan="2">Dimension</th>
                    <th class="bg-black" style="color: #fff; padding:5px;">Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaBody">

            </tbody>
        </table>
    </div> --}}
    

    <br>
    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Acciones</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="widget widget-stats">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="stats-title text-center" style="font-size:15px"></div>
                        </div>
                    </div>
                    {{-- BARRA SUPERIOR CON LOS ICONOS --}}
                    <div class="row" style="width:100%">
                        <div style="display:flex; justify-content:space-evenly; align-items:center">
                            <div>
                                <div class="bg-black" style="width:80px; height:40px; display: inline-block;border-radius:15%"><span style="color:#fff;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:15px" id="calificacion_riesgo"></span></div>
                                <div style="width:40px; height:40px; display: inline-block;"><i style="color:rgb(255, 123, 0);" class="fa fa-desktop fa-4x" aria-hidden="true"></i></div>
                                <p style="font-size: 16px; color:#000">Calificación</p>
                            </div>
                            <div style="color: black; display:flex; justify-content:space-between; gap:1rem; align-items:center; padding:1rem 3rem 1rem 3rem; border-radius:5px;">
                                <p style="font-size: 15px; font-weight:bold;" id="text_calificacion">Nulo</p>
                                <div style="width: 30px; height:30px; border-radius:50%; background-color: rgb(87, 168, 209)" id="color_calificacion"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="newTable">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th class="bg-black" style="color: rgb(255, 255, 255); padding:5px; font-size:14px; text-align:center" colspan="2" width="25%;">Categoría</th>
                            <th class="bg-black" style="color: rgb(255, 255, 255); padding:5px; font-size:14px; text-align:center" colspan="2" width="25%">Dominio</th>
                            <th class="bg-black" style="color: rgb(255, 255, 255); padding:5px; font-size:14px; text-align:center" colspan="2" width="43%">Dimension</th>
                            <th class="bg-black" style="color: rgb(255, 255, 255); padding:5px; font-size:14px; text-align:center" width="7%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaBody">
                        {{-- DINAMICAMENTE --}}
                    </tbody>
                </table>
            </div>

               <!-- Modal --> 
            <div class="modal text-center" id="modalPoliticas1" tabindex="-1" role="dialog" aria-labelledby="modalPoliticasTitle" aria-hidden="true">
                <div class="modal-fullscreen d-flex justify-content-center" role="document" style="height: 100%; width: 100%; display:flex; justify-content:center; align-items:center">
                    <div class="modal-content" style="height: 62%; width:75%; background-color:rgb(255, 255, 255)">
                        <div class="modal-body" style="height: 100%">
                            <p style="margin: 0; font-size:2rem; font-weight:bold; color:#000">Identificación de Riesgo</p>
                            <input type="hidden" id="contenedorDimension">
                            <div id="contenido-riesgo" style="height: 100%; display:flex; align-items:center;">
                                <table id="tabla_riesgo" class="" style="border:1px solid black; width:100%">
                                    <thead class="bg-black" id="tbHead" style="color:black; border-top:1px solid black; border-bottom:1px solid black; padding:8px;">
          
                                    </thead>
                                    <tbody id="tbBody">
                                      
                                    </tbody>
                                </table>
                            </div>
                            {{-- <iframe id="viewer" src="" frameborder="0" scrolling="no" width="100%" height="100%"></iframe> --}}
                        </div>
                        <div class="modal-footer" style="background-color: rgb(255, 255, 255)">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal --> 
            <div class="modal text-center" id="modalPoliticas" tabindex="-1" role="dialog" aria-labelledby="modalPoliticasTitle" aria-hidden="true">
                <div class="modal-fullscreen d-flex justify-content-center" role="document" style="height: 100%; width: 100%; display:flex; justify-content:center; align-items:center">
                    <div class="modal-content" style="height: 62%; width:75%; background-color:rgb(255, 255, 255)">
                        <div class="modal-body" style="height: 100%">

                            <div class="widget widget-stats" style="background-color:rgb(255, 255, 255)">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="stats-title text-center" style="font-size:15px; font-size:2rem; color:black">Acciones</div>
                                    </div>
                                </div>
                                <div class="panel-body table-responsive" style="max-height: 23rem; padding: 5px;">
                                    <table id="tabla_acciones" class="" style="width:100%">
                                        <thead class="bg-black" style="color:rgb(255, 255, 255);">
                                            <tr style="border:1px solid black;">
                                                <th style="border:1px solid black; padding:7px; font-size:15px; width:10%; text-align:center">Identificador</th>
                                                <th style="border:1px solid black; padding:7px; font-size:15px; width:45%; text-align:center">Acción</th>
                                                <th style="border:1px solid black; padding:7px; font-size:15px; width:45%; text-align:center">Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_acciones" style="background-color:rgb(224, 223, 223); color:black;">
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="widget widget-stats" style="background-color:rgb(255, 255, 255)">
                                <div class="panel-body" style="height: 15rem; padding: 5px;">
                                    <div class="row">
                                        <div class="col-md-10" style="display: flex; align-items:center; justify-content:space-between; padding:0">
                                            <div class="col-md-2" style="color:black; text-align:start">
                                                <p style="color: black; margin:0; font-size:16px">Acciones</p>
                                            </div>
                                            <div class="col-md-10" style="padding: 0">
                                                <select class="form-control" style="padding: 0; width:100%; font-size:15px" id="select_acciones">
                                                    {{-- @foreach ($acciones as $row)
                                                        <option value="{{$row->IdAccion}}">{{$row->Descripcion}}</option>
                                                    @endforeach      --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-primary" id="btnAcordion" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                        </div>  
                                    </div> 
                                    
                                    <div class="row" style="margin-top:2rem;">
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <form class="row">
                                                    <div class="col-md-10">
                                                        <div class="col-md-2" style="text-align: start">
                                                            <p style="color: #000; margin:0; font-size:16px">Nueva acción</p>
                                                        </div>
                                                      <div class="col-md-10" style="padding: 0">
                                                        <input type="text" class="form-control" name="descripcion" style="font-size: 15px" id="descripcion" required>
                                                        <input type="hidden" id="IdCliente" name="IdCliente">
                                                        <input type="hidden" id="IdDimension" name="IdDimension">
                                                        <input type="hidden" id="IdPeriodo" name="IdPeriodo">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button id="btnEnviarAccion" type="submit"class="btn btn-primary">
                                                            Agregar
                                                        </button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:2rem;">
                                        <div class="col-md-10" style="display: flex; align-items:center; justify-content:space-between; padding:0">
                                            <div class="col-md-2" style="text-align: start">
                                                <p style="color: black; margin:0; font-size:16px">Comentario</p>
                                            </div>
                                            <div class="col-md-10" style="padding: 0; padding-left:2px">
                                                <textarea id="comentario" name="" style="width: 100%; height:10rem; color:#000; font-size:15px"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="padding:0">
                                            {{-- <button id="btnAgregarAccion" class="btn btn-primary">
                                                Agregar
                                            </button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            {{-- <iframe id="viewer" src="" frameborder="0" scrolling="no" width="100%" height="100%"></iframe> --}}
                        </div>
                        <div class="modal-footer" style="background-color: rgb(255, 255, 255)">
                            <button id="btnAgregarAccion" class="btn btn-primary">
                                Agregar
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
<script type="text/javascript">
    let contarFiltro = true;
     $(document).ready(function(){
        document.getElementById('clearfilterPeriodo').disabled ="disabled";

        iniciarTabla();
        $('[data-toggle="popover"]').popover({
            delay: { "show": 500, "hide": 100 },
            trigger:'focus'

        });

        //DESELECCIONAR TODOS LOS CHECKBOXS
        $("#clearfilterPeriodo").on("click",function(event){

            $('body').waitMe({
                effect : 'roundBounce',
                waitTime: 100000,
                text : 'Espere un momento por favor...',
                onClose: function() {}
            });

            $("input[type=checkbox]").removeAttr("checked");

            document.getElementById("heading5").style ="background-color:inherit;";
            document.getElementById("heading15").style ="background-color:inherit;";
            document.getElementById("heading16").style ="background-color:inherit;";
            document.getElementById("heading14").style ="background-color:inherit;";
            document.getElementById("headingTwo").style ="background-color:inherit;";
            document.getElementById("heading4").style ="background-color:inherit;";
            document.getElementById("heading6").style ="background-color:inherit;";
            document.getElementById("heading7").style ="background-color:inherit;";
            document.getElementById("heading8").style ="background-color:inherit;";
            document.getElementById("heading9").style ="background-color:inherit;";
            document.getElementById("heading10").style ="background-color:inherit;";
            document.getElementById("heading11").style ="background-color:inherit;";
            document.getElementById("heading12").style ="background-color:inherit;";
            document.getElementById("heading13").style ="background-color:inherit;";

            $('#collapseTwo').collapse('hide');
            $('#collapse3').collapse('hide');
            $('#collapse5').collapse('hide');
            $('#collapse6').collapse('hide');
            $('#collapse7').collapse('hide');
            $('#collapse8').collapse('hide');
            $('#collapse9').collapse('hide');
            $('#collapse10').collapse('hide');
            $('#collapse11').collapse('hide');
            $('#collapse12').collapse('hide');
            $('#collapse13').collapse('hide');
            $('#collapse14').collapse('hide');
            $('#collapse15').collapse('hide');
            $('#collapse16').collapse('hide');

            let IdCliente = document.getElementById('cliente').value;
            let IdPeriodo = document.getElementById('periodo').value;
            let jquery = "";
            let token = '{{csrf_token()}}';

            $.ajax({
                url: '{{ route('filtrarAccionesEntorno') }}',
                type: "POST",
                data: {
                    IdCliente:IdCliente,
                    IdPeriodo:IdPeriodo,
                    jquery:jquery,
                    _token: token
                },
                success: function(response){
                    if(response.data.length == 0){
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 100,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });
                        swal("Aviso!", "No hay filtro para este elemento");
                    }else{
                        if(contadorTamano == 0){
                            tamanoAnterior = response.data24;
                            contadorTamano++;
                        }else{
                            if(response.data24.length == tamanoAnterior.length){
                                swal("Aviso!", "No hay filtro para este elemento");
                                tamanoAnterior =response.data24;
                            }else{
                                tamanoAnterior =response.data24;
                            }
                            tamanoAnterior = response.data24;
                        }
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 100,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });
                        document.getElementById("tablaBody").innerHTML = "";
                        llenarTabla(response.data17,response.data21,response.data18,response.data22,response.data23,response.calificaciondimension,response.riesgodominio,response.riesgocategoria,response.data2);
                        graficarCentroTrabajo(response.data,response.data2);
                        graficarDepartamentos(response.data3,response.data4);
                        graficarEstadoCivil(response.data5,response.data6);
                        graficarGenero(response.data7,response.data8);
                        graficarEdad(response.data9,response.data10);
                        graficarNivelEstudio(response.data11,response.data12);
                        graficarPuesto(response.data13,response.data14);
                        graficarTipoPuesto(response.data15,response.data16);
                        document.getElementById('clearfilterPeriodo').disabled ="disabled";
                        contarFiltro = false;
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });

            // initCentroTrabajo();
        });

        document.getElementById('reporte').addEventListener("click", function(){

            let idCliente = document.getElementById('cliente').value;
            let idPeriodo = document.getElementById('periodo').value;
            let idCentro = -10;

            let ruta = "{{ route('pdfRiesgoEntorno',['id'=>'temp','id2'=>'periodo','id3'=>'centro'])}}"
            ruta = ruta.replace("temp",idCliente);
            ruta = ruta.replace("periodo",idPeriodo);
            ruta = ruta.replace("centro",idCentro);
            window.location = ruta;
        });

        document.getElementById('reporte-acciones').addEventListener("click", function(){
            let idCliente = document.getElementById('cliente').value;
            let idPeriodo = document.getElementById('periodo').value;

            let ruta2 = "{{ route('pdfRiesgoAcciones',['id'=>'temp','id2'=>'periodo'])}}"
            ruta2 = ruta2.replace("temp",idCliente);
            ruta2 = ruta2.replace("periodo",idPeriodo);
            window.location = ruta2;
        });
        // $(".checkFiltro").on("click",function(){
        //     console.log("clickkkkkkkkkkkkkkkkkkk");

        // });
        let tamanoAnterior = [];
        let contadorTamano = 0;
        $('input[type=checkbox]').on('change', function() {
            $('body').waitMe({
                effect : 'roundBounce',
                waitTime: 100000,
                text : 'Espere un momento por favor...',
                onClose: function() {}
            });
            let contador = 0;
            let contador2 = 0;
            let contador3 = 0;
            let contador4 = 0;
            let contador5 = 0;
            let contador6 = 0;
            let contador7 = 0;
            let contador8 = 0;
            let contador9 = 0;
            let contador10 = 0;
            let contador11 = 0;
            let contador12 = 0;
            let contador13 = 0;
            let contador14 = 0;
            let jquery = "";
            let arrayEstadoCivil = [];
            let arrayCentro = [];
            let arrayDepartamento = [];
            let arrayRolaTurnos = [];
            let arrayGenero = [];
            let arrayEdad = [];
            let arrayNivelEstudio = [];
            let arrayTipoPuesto = [];
            let arrayPuestoCliente = [];
            let arrayAntiguedad = [];
            let arrayTipoPersonal = [];
            let arrayTipoContrato = [];
            let arrayTipoJornada = [];
            let arrayTipoExperiencia = [];
            if($(this).is(':checked') ) {
                // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
                $('input[type=checkbox]:checked').each(function() {
                    // console.log("valor"+$(this).val());
                    let resultado = $(this).val();
                    let palabras = resultado.split(' ');
                    let condicionante = palabras[0];
                    if(condicionante == "R"){
                        arrayRolaTurnos[contador] = palabras[1];
                        contador++;
                    }
                    if(condicionante == "C"){
                        arrayCentro[contador2] = palabras[1];
                        contador2++;
                    }
                    if(condicionante == "D"){
                        arrayDepartamento[contador3] = palabras[1];
                        contador3++;
                    }
                    if(condicionante == "G"){
                        arrayGenero[contador4] = palabras[1];
                        contador4++;
                    }
                    if(condicionante == "E"){
                        arrayEdad[contador5] = palabras[1];
                        contador5++;
                    }
                    if(condicionante == "EC"){
                        arrayEstadoCivil[contador6] = palabras[1];
                        contador6++;
                    }
                    if(condicionante == "NE"){
                        arrayNivelEstudio[contador7] = palabras[1];
                        contador7++;
                    }
                    if(condicionante == "TP"){
                        arrayTipoPuesto[contador8] = palabras[1];
                        contador8++;
                    }
                    if(condicionante == "PC"){
                        arrayPuestoCliente[contador9] = palabras[1];
                        contador9++;
                    }
                    if(condicionante == "A"){
                        arrayAntiguedad[contador10] = palabras[1];
                        contador10++;
                    }
                    if(condicionante == "P"){
                        arrayTipoPersonal[contador11] = palabras[1];
                        contador11++;
                    }
                    if(condicionante == "TC"){
                        arrayTipoContrato[contador12] = palabras[1];
                        contador12++;
                    }
                    if(condicionante == "TJ"){
                        arrayTipoJornada[contador13] = palabras[1];

                        contador13++;
                    }
                    if(condicionante == "EL"){
                        arrayTipoExperiencia[contador14] = palabras[1];
                        contador14++;
                    }
                });

                if(contador == 0 && contador3 == 0 && contador4 == 0 && contador5 == 0 && contador6 == 0 && contador7 == 0 
                    && contador8 == 0 && contador9 == 0 && contador10 == 0 && contador11 == 0 && contador12 == 0 && contador13 == 0 && contador14 == 0){
                    if(contador2 == 1){
                        contarFiltro = true;
                        document.getElementById('clearfilterPeriodo').disabled="";
                    }else{
                        contarFiltro = false;
                        document.getElementById('clearfilterPeriodo').disabled="";
                    }
                }else{
                    contarFiltro = false;
                    document.getElementById('clearfilterPeriodo').disabled="";
                }

                if(contador == 0 && contador2 == 0 && contador3 == 0 && contador4 == 0 && contador5 == 0 && contador6 == 0 && contador7 == 0 
                    && contador8 == 0 && contador9 == 0 && contador10 == 0 && contador11 == 0 && contador12 == 0 && contador13 == 0 && contador14 == 0){
                        document.getElementById('clearfilterPeriodo').disabled="disabled";
                }else{
                    document.getElementById('clearfilterPeriodo').disabled="";
                }

                //ESTADO CIVIL
                if (arrayEstadoCivil.length > 1){
                    for(let i = 0; i < arrayEstadoCivil.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdEstadoCivil = "+arrayEstadoCivil[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayEstadoCivil.length-1)){
                                let estruc = " OR ep.IdEstadoCivil = "+arrayEstadoCivil[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdEstadoCivil = "+arrayEstadoCivil[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading5").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayEstadoCivil.length == 1){
                        let estruc = " and ep.IdEstadoCivil = "+arrayEstadoCivil[0];
                        jquery = jquery + estruc;
                        document.getElementById("heading5").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading5").style ="background-color:inherit;";
                    }
                }
                //CENTROS
                if (arrayCentro.length > 1){
                    for(let i = 0; i < arrayCentro.length; i++){
                        if(i == 0){
                            let estruc = " and (esc.IdCentro = "+arrayCentro[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayCentro.length-1)){
                                let estruc = " OR esc.IdCentro = "+arrayCentro[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR esc.IdCentro = "+arrayCentro[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  
                    document.getElementById("heading15").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayCentro.length == 1){
                        let estruc = " and esc.IdCentro = "+arrayCentro[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading15").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading15").style ="background-color:inherit;";
                    }
                }
                //DEPARTAMENTOS
                if (arrayDepartamento.length > 1){
                    for(let i = 0; i < arrayDepartamento.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdDeptoCliente = "+arrayDepartamento[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayDepartamento.length-1)){
                                let estruc = " OR ep.IdDeptoCliente = "+arrayDepartamento[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdDeptoCliente = "+arrayDepartamento[i];
                                jquery = jquery + estruc;
                            }
                        }
                    } 
                    
                    document.getElementById("heading16").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayDepartamento.length == 1){
                        let estruc = " and ep.IdDeptoCliente = "+arrayDepartamento[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading16").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading16").style ="background-color:inherit;";
                    }
                }
                //ROLA TURNOS
                if (arrayRolaTurnos.length > 1){
                    for(let i = 0; i < arrayRolaTurnos.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.RolaTurno = "+"'"+arrayRolaTurnos[i]+"'";
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayRolaTurnos.length-1)){
                                let estruc = " OR ep.RolaTurno = "+"'"+arrayRolaTurnos[i]+"'"+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.RolaTurno = "+"'"+arrayRolaTurnos[i]+"'";
                                jquery = jquery + estruc;
                            }
                        }

                        document.getElementById("heading14").style ="background-color:rgba(255, 123, 0, .8);";
                    }  
                }else{
                    if(arrayRolaTurnos.length == 1){
                        let estruc = " and ep.RolaTurno = "+"'"+arrayRolaTurnos[0]+"'";
                        jquery = jquery + estruc;

                        document.getElementById("heading14").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading14").style ="background-color:inherit;";
                    }
                }
                //GENERO
                if (arrayGenero.length > 1){
                    for(let i = 0; i < arrayGenero.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdGenero = "+arrayGenero[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayGenero.length-1)){
                                let estruc = " OR ep.IdGenero = "+arrayGenero[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdGenero = "+arrayGenero[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("headingTwo").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayGenero.length == 1){
                        let estruc = " and ep.IdGenero = "+arrayGenero[0];
                        jquery = jquery + estruc;

                        document.getElementById("headingTwo").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("headingTwo").style ="background-color:inherit;";
                    }
                }
                //EDAD
                if (arrayEdad.length > 1){
                    for(let i = 0; i < arrayEdad.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdRango = "+arrayEdad[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayEdad.length-1)){
                                let estruc = " OR ep.IdRango = "+arrayEdad[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdRango = "+arrayEdad[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading4").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayEdad.length == 1){
                        let estruc = " and ep.IdRango = "+arrayEdad[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading4").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading4").style ="background-color:inherit;";
                    }
                }
                //NIVEL ESTUDIO
                if (arrayNivelEstudio.length > 1){
                    for(let i = 0; i < arrayNivelEstudio.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdNivelEstudio = "+arrayNivelEstudio[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayNivelEstudio.length-1)){
                                let estruc = " OR ep.IdNivelEstudio = "+arrayNivelEstudio[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdNivelEstudio = "+arrayNivelEstudio[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading6").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayNivelEstudio.length == 1){
                        let estruc = " and ep.IdNivelEstudio = "+arrayNivelEstudio[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading6").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading6").style ="background-color:inherit;";
                    }
                }

                //TIPO PUESTO
                if (arrayTipoPuesto.length > 1){
                    for(let i = 0; i < arrayTipoPuesto.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoPuesto = "+arrayTipoPuesto[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoPuesto.length-1)){
                                let estruc = " OR ep.IdTipoPuesto = "+arrayTipoPuesto[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoPuesto = "+arrayTipoPuesto[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading7").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoPuesto.length == 1){
                        let estruc = " and ep.IdTipoPuesto = "+arrayTipoPuesto[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading7").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading7").style ="background-color:inherit;";
                    }
                }
                //PUESTO CLIENTE
                if (arrayPuestoCliente.length > 1){
                    for(let i = 0; i < arrayPuestoCliente.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdPuestoCliente = "+arrayPuestoCliente[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayPuestoCliente.length-1)){
                                let estruc = " OR ep.IdPuestoCliente = "+arrayPuestoCliente[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdPuestoCliente = "+arrayPuestoCliente[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading8").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayPuestoCliente.length == 1){
                        let estruc = " and ep.IdPuestoCliente = "+arrayPuestoCliente[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading8").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading8").style ="background-color:inherit;";
                    }
                }
                //ANTIGUEDAD
                if (arrayAntiguedad.length > 1){
                    for(let i = 0; i < arrayAntiguedad.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdAntiguedad = "+arrayAntiguedad[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayAntiguedad.length-1)){
                                let estruc = " OR ep.IdAntiguedad = "+arrayAntiguedad[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdAntiguedad = "+arrayAntiguedad[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading9").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayAntiguedad.length == 1){
                        let estruc = " and ep.IdAntiguedad = "+arrayAntiguedad[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading9").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading9").style ="background-color:inherit;";
                    }
                }
                //TIPO PERSONAL
                if (arrayTipoPersonal.length > 1){
                    for(let i = 0; i < arrayTipoPersonal.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoPersonal = "+arrayTipoPersonal[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoPersonal.length-1)){
                                let estruc = " OR ep.IdTipoPersonal = "+arrayTipoPersonal[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoPersonal = "+arrayTipoPersonal[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  


                    document.getElementById("heading10").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoPersonal.length == 1){
                        let estruc = " and ep.IdTipoPersonal = "+arrayTipoPersonal[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading10").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading10").style ="background-color:inherit;";
                    }
                }
                //TIPO CONTRATO
                if (arrayTipoContrato.length > 1){
                    for(let i = 0; i < arrayTipoContrato.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoContrato = "+arrayTipoContrato[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoContrato.length-1)){
                                let estruc = " OR ep.IdTipoContrato = "+arrayTipoContrato[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoContrato = "+arrayTipoContrato[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading11").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoContrato.length == 1){
                        let estruc = " and ep.IdTipoContrato = "+arrayTipoContrato[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading11").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading11").style ="background-color:inherit;";
                    }
                }
                  //TIPO JORNADA
                  if (arrayTipoJornada.length > 1){
                    for(let i = 0; i < arrayTipoJornada.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoJornada = "+arrayTipoJornada[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoJornada.length-1)){
                                let estruc = " OR ep.IdTipoJornada = "+arrayTipoJornada[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoJornada = "+arrayTipoJornada[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading12").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoJornada.length == 1){
                        let estruc = " and ep.IdTipoJornada = "+arrayTipoJornada[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading12").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading12").style ="background-color:inherit;";
                    }
                }
                  //EXPERIENCIA
                  if (arrayTipoExperiencia.length > 1){
                    for(let i = 0; i < arrayTipoExperiencia.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdExperiencia = "+arrayTipoExperiencia[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoExperiencia.length-1)){
                                let estruc = " OR ep.IdExperiencia = "+arrayTipoExperiencia[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdExperiencia = "+arrayTipoExperiencia[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading13").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoExperiencia.length == 1){
                        let estruc = " and ep.IdExperiencia = "+arrayTipoExperiencia[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading13").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading13").style ="background-color:inherit;";
                    }
                }

                let IdCliente = document.getElementById('cliente').value;
                let IdPeriodo = document.getElementById('periodo').value;
                let token = '{{csrf_token()}}';
                $.ajax({
                    url: '{{ route('filtrarAccionesEntorno') }}',
                    type: "POST",
                    data: {
                        IdCliente:IdCliente,
                        IdPeriodo:IdPeriodo,
                        jquery:jquery,
                        _token: token
                    },
                    success: function(response){
                        if(response.data.length == 0){
                            $('body').waitMe({
                                effect : 'roundBounce',
                                waitTime: 100,
                                text : 'Espere un momento por favor...',
                                onClose: function() {}
                            });
                            swal("Aviso!", "No hay filtro para este elemento");
                        }else{
                            if(contadorTamano == 0){
                                tamanoAnterior = response.data24;
                                contadorTamano++;
                            }else{
                                if(response.data24.length == tamanoAnterior.length){
                                    swal("Aviso!", "No hay filtro para este elemento");
                                    tamanoAnterior =response.data24;
                                }else{
                                    tamanoAnterior =response.data24;
                                }
                                tamanoAnterior = response.data24;
                            }
                            $('body').waitMe({
                                effect : 'roundBounce',
                                waitTime: 100,
                                text : 'Espere un momento por favor...',
                                onClose: function() {}
                            });
                            document.getElementById("tablaBody").innerHTML = "";
                            llenarTabla(response.data17,response.data21,response.data18,response.data22,response.data23,response.calificaciondimension,response.riesgodominio,response.riesgocategoria,response.data2);
                            graficarCentroTrabajo(response.data,response.data2);
                            graficarDepartamentos(response.data3,response.data4);
                            graficarEstadoCivil(response.data5,response.data6);
                            graficarGenero(response.data7,response.data8);
                            graficarEdad(response.data9,response.data10);
                            graficarNivelEstudio(response.data11,response.data12);
                            graficarPuesto(response.data13,response.data14);
                            graficarTipoPuesto(response.data15,response.data16);
                        }
                    },
                    error: function( e ) {
                        console.log(e);
                    }
                });
            }else{
                $('input[type=checkbox]:checked').each(function() {
                    // console.log("valor"+$(this).val());
                    let resultado = $(this).val();
                    let palabras = resultado.split(' ');
                    let condicionante = palabras[0];
                    if(condicionante == "R"){
                        arrayRolaTurnos[contador] = palabras[1];
                        contador++;
                    }
                    if(condicionante == "C"){
                        arrayCentro[contador2] = palabras[1];
                        contador2++;
                    }
                    if(condicionante == "D"){
                        arrayDepartamento[contador3] = palabras[1];
                        contador3++;
                    }
                    if(condicionante == "G"){
                        arrayGenero[contador4] = palabras[1];
                        contador4++;
                    }
                    if(condicionante == "E"){
                        arrayEdad[contador5] = palabras[1];
                        contador5++;
                    }
                    if(condicionante == "EC"){
                        arrayEstadoCivil[contador6] = palabras[1];
                        contador6++;
                    }
                    if(condicionante == "NE"){
                        arrayNivelEstudio[contador7] = palabras[1];
                        contador7++;
                    }
                    if(condicionante == "TP"){
                        arrayTipoPuesto[contador8] = palabras[1];
                        contador8++;
                    }
                    if(condicionante == "PC"){
                        arrayPuestoCliente[contador9] = palabras[1];
                        contador9++;
                    }
                    if(condicionante == "A"){
                        arrayAntiguedad[contador10] = palabras[1];
                        contador10++;
                    }
                    if(condicionante == "P"){
                        arrayTipoPersonal[contador11] = palabras[1];
                        contador11++;
                    }
                    if(condicionante == "TC"){
                        arrayTipoContrato[contador12] = palabras[1];
                        contador12++;
                    }
                    if(condicionante == "TJ"){
                        arrayTipoJornada[contador13] = palabras[1];
                        contador13++;
                    }
                    if(condicionante == "EL"){
                        arrayTipoExperiencia[contador14] = palabras[1];
                        contador14++;
                    }
                    // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") Seleccionado");
                });

                if(contador == 0 && contador3 == 0 && contador4 == 0 && contador5 == 0 && contador6 == 0 && contador7 == 0 
                    && contador8 == 0 && contador9 == 0 && contador10 == 0 && contador11 == 0 && contador12 == 0 && contador13 == 0 && contador14 == 0){
                    if(contador2 == 1){
                        contarFiltro = true;
                        document.getElementById('clearfilterPeriodo').disabled="";
                    }else{
                        contarFiltro = false;
                        document.getElementById('clearfilterPeriodo').disabled="";
                    }
                }else{
                    contarFiltro = false;
                    document.getElementById('clearfilterPeriodo').disabled="";
                }

                if(contador == 0 && contador2 == 0 && contador3 == 0 && contador4 == 0 && contador5 == 0 && contador6 == 0 && contador7 == 0 
                    && contador8 == 0 && contador9 == 0 && contador10 == 0 && contador11 == 0 && contador12 == 0 && contador13 == 0 && contador14 == 0){
                        document.getElementById('clearfilterPeriodo').disabled="disabled";
                }else{
                    document.getElementById('clearfilterPeriodo').disabled="";
                }

                //ESTADO CIVIL
                if (arrayEstadoCivil.length > 1){
                    for(let i = 0; i < arrayEstadoCivil.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdEstadoCivil = "+arrayEstadoCivil[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayEstadoCivil.length-1)){
                                let estruc = " OR ep.IdEstadoCivil = "+arrayEstadoCivil[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdEstadoCivil = "+arrayEstadoCivil[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading5").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayEstadoCivil.length == 1){
                        let estruc = " and ep.IdEstadoCivil = "+arrayEstadoCivil[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading5").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading5").style ="background-color:inherit;";
                    }
                }
                //CENTROS
                if (arrayCentro.length > 1){
                    for(let i = 0; i < arrayCentro.length; i++){
                        if(i == 0){
                            let estruc = " and (esc.IdCentro = "+arrayCentro[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayCentro.length-1)){
                                let estruc = " OR esc.IdCentro = "+arrayCentro[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR esc.IdCentro = "+arrayCentro[i];
                                jquery = jquery + estruc;
                            }
                        }
                    } 
                    
                    document.getElementById("heading15").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayCentro.length == 1){
                        let estruc = " and esc.IdCentro = "+arrayCentro[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading15").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading15").style ="background-color:inherit;";
                    }
                }
                //DEPARTAMENTOS
                if (arrayDepartamento.length > 1){
                    for(let i = 0; i < arrayDepartamento.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdDeptoCliente = "+arrayDepartamento[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayDepartamento.length-1)){
                                let estruc = " OR ep.IdDeptoCliente = "+arrayDepartamento[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdDeptoCliente = "+arrayDepartamento[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading16").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayDepartamento.length == 1){
                        let estruc = " and ep.IdDeptoCliente = "+arrayDepartamento[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading16").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading16").style ="background-color:inherit;";
                    }
                }
                //ROLA TURNOS
                if (arrayRolaTurnos.length > 1){
                    for(let i = 0; i < arrayRolaTurnos.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.RolaTurno = "+"'"+arrayRolaTurnos[i]+"'";
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayRolaTurnos.length-1)){
                                let estruc = " OR ep.RolaTurno = "+"'"+arrayRolaTurnos[i]+"'"+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.RolaTurno = "+"'"+arrayRolaTurnos[i]+"'";
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading14").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayRolaTurnos.length == 1){
                        let estruc = " and ep.RolaTurno = "+"'"+arrayRolaTurnos[0]+"'";
                        jquery = jquery + estruc;

                        document.getElementById("heading14").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading14").style ="background-color:inherit;";
                    }
                }
                //GENERO
                if (arrayGenero.length > 1){
                    for(let i = 0; i < arrayGenero.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdGenero = "+arrayGenero[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayGenero.length-1)){
                                let estruc = " OR ep.IdGenero = "+arrayGenero[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdGenero = "+arrayGenero[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("headingTwo").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayGenero.length == 1){
                        let estruc = " and ep.IdGenero = "+arrayGenero[0];
                        jquery = jquery + estruc;

                        document.getElementById("headingTwo").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("headingTwo").style ="background-color:inherit;";
                    }
                }
                //EDAD
                if (arrayEdad.length > 1){
                    for(let i = 0; i < arrayEdad.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdRango = "+arrayEdad[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayEdad.length-1)){
                                let estruc = " OR ep.IdRango = "+arrayEdad[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdRango = "+arrayEdad[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading4").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayEdad.length == 1){
                        let estruc = " and ep.IdRango = "+arrayEdad[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading4").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading4").style ="background-color:inherit;";
                    }
                }
                //NIVEL ESTUDIO
                if (arrayNivelEstudio.length > 1){
                    for(let i = 0; i < arrayNivelEstudio.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdNivelEstudio = "+arrayNivelEstudio[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayNivelEstudio.length-1)){
                                let estruc = " OR ep.IdNivelEstudio = "+arrayNivelEstudio[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdNivelEstudio = "+arrayNivelEstudio[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading6").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayNivelEstudio.length == 1){
                        let estruc = " and ep.IdNivelEstudio = "+arrayNivelEstudio[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading6").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading6").style ="background-color:inherit;";
                    }
                }

                //TIPO PUESTO
                if (arrayTipoPuesto.length > 1){
                    for(let i = 0; i < arrayTipoPuesto.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoPuesto = "+arrayTipoPuesto[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoPuesto.length-1)){
                                let estruc = " OR ep.IdTipoPuesto = "+arrayTipoPuesto[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoPuesto = "+arrayTipoPuesto[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading7").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoPuesto.length == 1){
                        let estruc = " and ep.IdTipoPuesto = "+arrayTipoPuesto[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading7").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading7").style ="background-color:inherit;";
                    }
                }
                //PUESTO CLIENTE
                if (arrayPuestoCliente.length > 1){
                    for(let i = 0; i < arrayPuestoCliente.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdPuestoCliente = "+arrayPuestoCliente[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayPuestoCliente.length-1)){
                                let estruc = " OR ep.IdPuestoCliente = "+arrayPuestoCliente[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdPuestoCliente = "+arrayPuestoCliente[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading8").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayPuestoCliente.length == 1){
                        let estruc = " and ep.IdPuestoCliente = "+arrayPuestoCliente[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading8").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading8").style ="background-color:inherit;";
                    }
                }
                //ANTIGUEDAD
                if (arrayAntiguedad.length > 1){
                    for(let i = 0; i < arrayAntiguedad.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdAntiguedad = "+arrayAntiguedad[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayAntiguedad.length-1)){
                                let estruc = " OR ep.IdAntiguedad = "+arrayAntiguedad[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdAntiguedad = "+arrayAntiguedad[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading9").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayAntiguedad.length == 1){
                        let estruc = " and ep.IdAntiguedad = "+arrayAntiguedad[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading9").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading9").style ="background-color:inherit;";
                    }
                }
                //TIPO PERSONAL
                if (arrayTipoPersonal.length > 1){
                    for(let i = 0; i < arrayTipoPersonal.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoPersonal = "+arrayTipoPersonal[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoPersonal.length-1)){
                                let estruc = " OR ep.IdTipoPersonal = "+arrayTipoPersonal[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoPersonal = "+arrayTipoPersonal[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading10").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoPersonal.length == 1){
                        let estruc = " and ep.IdTipoPersonal = "+arrayTipoPersonal[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading10").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading10").style ="background-color:inherit;";
                    }
                }
                //TIPO CONTRATO
                if (arrayTipoContrato.length > 1){
                    for(let i = 0; i < arrayTipoContrato.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoContrato = "+arrayTipoContrato[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoContrato.length-1)){
                                let estruc = " OR ep.IdTipoContrato = "+arrayTipoContrato[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoContrato = "+arrayTipoContrato[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading11").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoContrato.length == 1){
                        let estruc = " and ep.IdTipoContrato = "+arrayTipoContrato[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading11").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading11").style ="background-color:inherit;";
                    }
                }
                  //TIPO JORNADA
                  if (arrayTipoJornada.length > 1){
                    for(let i = 0; i < arrayTipoJornada.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdTipoJornada = "+arrayTipoJornada[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoJornada.length-1)){
                                let estruc = " OR ep.IdTipoJornada = "+arrayTipoJornada[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdTipoJornada = "+arrayTipoJornada[i];
                                jquery = jquery + estruc;
                            }
                        }
                    }  

                    document.getElementById("heading12").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoJornada.length == 1){
                        let estruc = " and ep.IdTipoJornada = "+arrayTipoJornada[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading12").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading12").style ="background-color:inherit;";
                    }
                }
                  //EXPERIENCIA
                  if (arrayTipoExperiencia.length > 1){
                    for(let i = 0; i < arrayTipoExperiencia.length; i++){
                        if(i == 0){
                            let estruc = " and (ep.IdExperiencia = "+arrayTipoExperiencia[i];
                            jquery = jquery + estruc;
                        }else{
                            if(i == (arrayTipoExperiencia.length-1)){
                                let estruc = " OR ep.IdExperiencia = "+arrayTipoExperiencia[i]+")";
                                jquery = jquery + estruc;
                            }else{
                                let estruc = " OR ep.IdExperiencia = "+arrayTipoExperiencia[i];
                                jquery = jquery + estruc;
                            }
                        }
                    } 
                    
                    document.getElementById("heading13").style ="background-color:rgba(255, 123, 0, .8);";
                }else{
                    if(arrayTipoExperiencia.length == 1){
                        let estruc = " and ep.IdExperiencia = "+arrayTipoExperiencia[0];
                        jquery = jquery + estruc;

                        document.getElementById("heading13").style ="background-color:rgba(255, 123, 0, .8);";
                    }else{
                        document.getElementById("heading13").style ="background-color:inherit;";
                    }
                }

                let IdCliente = document.getElementById('cliente').value;
                let IdPeriodo = document.getElementById('periodo').value;
                let token = '{{csrf_token()}}';
                $.ajax({
                    url: '{{ route('filtrarAccionesEntorno') }}',
                    type: "POST",
                    data: {
                        IdCliente:IdCliente,
                        IdPeriodo:IdPeriodo,
                        jquery:jquery,
                        _token: token
                    },
                    success: function(response){
                        if(response.data.length == 0){
                            $('body').waitMe({
                                effect : 'roundBounce',
                                waitTime: 100,
                                text : 'Espere un momento por favor...',
                                onClose: function() {}
                            });
                            swal("Aviso!", "No hay filtro para este elemento");
                        }else{
                            if(contadorTamano == 0){;
                                tamanoAnterior = response.data24;
                                contadorTamano++;
                            }else{
                                if(response.data24.length == tamanoAnterior.length){
                                    // console.log("Entre al else");
                                    // swal("Aviso!", "No hay filtro para este elemento");
                                    // tamanoAnterior =response.data24;
                                }else{
                                    tamanoAnterior =response.data24;
                                }
                                tamanoAnterior = response.data24;
                            }
                            $('body').waitMe({
                                effect : 'roundBounce',
                                waitTime: 100,
                                text : 'Espere un momento por favor...',
                                onClose: function() {}
                            });
                            document.getElementById("tablaBody").innerHTML = "";
                            llenarTabla(response.data17,response.data21,response.data18,response.data22,response.data23,response.calificaciondimension,response.riesgodominio,response.riesgocategoria,response.data2);
                            graficarCentroTrabajo(response.data,response.data2);
                            graficarDepartamentos(response.data3,response.data4);
                            graficarEstadoCivil(response.data5,response.data6);
                            graficarGenero(response.data7,response.data8);
                            graficarEdad(response.data9,response.data10);
                            graficarNivelEstudio(response.data11,response.data12);
                            graficarPuesto(response.data13,response.data14);
                            graficarTipoPuesto(response.data15,response.data16);
                        }
                    },
                    error: function( e ) {
                        console.log(e);
                    }
                });
            }
        });

        contarFiltro = false;

        // $("select").select2({
        //     width: '100%'
        // });
        // $("select").select2({
        //     minimumResultsForSearch: -1
        // });

        // $('.select2').on('select2:select', function (e) {
        //     e.preventDefault();
        //     $('body').waitMe({
        //         effect : 'roundBounce',
        //         waitTime: 100000,
        //         text : 'Espere un momento por favor...',
        //         onClose: function() {}
        //     });
        //     let IdCliente = document.getElementById('cliente').value;
        //     let IdPeriodo = document.getElementById('periodo').value;
        //     let IdCentro = document.getElementById('centrotrabajo').value;
        //     let IdEstadoCivil = document.getElementById('estadocivil').value;
        //     let IdDepartamento = document.getElementById('departamento').value;
        //     let IdEdad = document.getElementById('edad').value;
        //     let IdGenero = document.getElementById('genero').value;
        //     let IdNivelEstudio = document.getElementById('estudios').value;
        //     let IdPuesto = document.getElementById('puestocliente').value;
        //     let IdTipoPuesto = document.getElementById('puesto').value;
        //     let IdAntiguedad = document.getElementById('antiguedad').value;
        //     let IdPersonal = document.getElementById('tipopersonal').value;
        //     let IdContrato = document.getElementById('contrato').value;
        //     let IdJornada = document.getElementById('jornada').value;
        //     let IdExperiencia = document.getElementById('experiencialaboral').value;
        //     let RolaTurnos = document.getElementById('rolaturnos').value;
            
        //     console.log("SeleccionadoTipoPuesto"+RolaTurnos);
        //     console.log("SeleccionadoEstado"+IdEstadoCivil);
        //     let token = '{{csrf_token()}}';
        //     $.ajax({
        //         url: '{{ route('graficarAccionesEntorno') }}',
        //         type: "POST",
        //         data: {
        //             IdCliente:IdCliente,
        //             IdPeriodo:IdPeriodo,
        //             IdCentro:IdCentro,
        //             IdEstadoCivil:IdEstadoCivil,
        //             IdDepartamento:IdDepartamento,
        //             IdEdad:IdEdad,
        //             IdGenero:IdGenero,
        //             IdNivelEstudio:IdNivelEstudio,
        //             IdPuesto:IdPuesto,
        //             IdTipoPuesto:IdTipoPuesto,
        //             IdAntiguedad:IdAntiguedad,
        //             IdPersonal:IdPersonal,
        //             IdContrato:IdContrato,
        //             IdJornada:IdJornada,
        //             IdExperiencia:IdExperiencia,
        //             RolaTurnos:RolaTurnos,
        //             _token: token
        //         },
        //         success: function(response){
        //             if(response.data.length == 0){
        //                 console.log(response.data17);
        //                 $('body').waitMe({
        //                     effect : 'roundBounce',
        //                     waitTime: 100,
        //                     text : 'Espere un momento por favor...',
        //                     onClose: function() {}
        //                 });
        //                 swal("Aviso!", "No hay filtro para este elemento");
        //             }else{
        //                 let filtro = document.getElementById('clearfilterPeriodo');
        //                 filtro.style="background-color:red";
        //                 console.log("r"+response.data17);
        //                 console.log("recibi una respuesta");
        //                 $('body').waitMe({
        //                     effect : 'roundBounce',
        //                     waitTime: 100,
        //                     text : 'Espere un momento por favor...',
        //                     onClose: function() {}
        //                 });
        //                 graficarCentroTrabajo(response.data,response.data2);
        //                 graficarDepartamentos(response.data3,response.data4);
        //                 graficarEstadoCivil(response.data5,response.data6);
        //                 graficarGenero(response.data7,response.data8);
        //                 graficarEdad(response.data9,response.data10);
        //                 graficarNivelEstudio(response.data11,response.data12);
        //                 graficarPuesto(response.data13,response.data14);
        //                 graficarTipoPuesto(response.data15,response.data16);
        //             }
        //         },
        //         error: function( e ) {
        //             console.log(e);
        //         }
        //     });
        // });

        // function initCentroTrabajo(){
        //     $("#check_todos").click(function(event){
        //         if($(this).is(":checked")) {
        //             $("input[type=checkbox]").attr("checked", "checked");
        //         }else{
        //             $("input[type=checkbox]").removeAttr("checked");
        //         }
	    //     });
        // }

        // document.getElementById('centrotrabajo').addEventListener("change", function(event){
        //     event.preventDefault();
        //     alert('Entre al cambio');
        //     let IdCliente = document.getElementById('cliente').value;
        //     let IdPeriodo = document.getElementById('periodo').value;
        //     let IdCentro = document.getElementById('centrotrabajo').value;
        //     let token = '{{csrf_token()}}';
        //     $.ajax({
        //         url: '{{ route('graficarAccionesEntorno') }}',
        //         type: "POST",
        //         data: {
        //             IdCliente:IdCliente,
        //             IdPeriodo:IdPeriodo,
        //             IdCentro:IdCentro,
        //             _token: token
        //         },
        //         success: function(response){
        //             if(response.data.length == 0){
        //             }else{
        //                 console.log("recibi una respuesta");
        //                 console.log("r"+response.data17);
        //                 $('body').waitMe({
        //                     effect : 'roundBounce',
        //                     waitTime: 400,
        //                     text : 'Espere un momento por favor...',
        //                     onClose: function() {}
        //                 });
        //                 graficarCentroTrabajo(response.data,response.data2);
        //                 graficarDepartamentos(response.data3,response.data4);
        //                 graficarEstadoCivil(response.data5,response.data6);
        //                 graficarGenero(response.data7,response.data8);
        //                 graficarEdad(response.data9,response.data10);
        //                 graficarNivelEstudio(response.data11,response.data12);
        //                 graficarPuesto(response.data13,response.data14);
        //                 graficarTipoPuesto(response.data15,response.data16);
        //             }
        //         },
        //         error: function( e ) {
        //             console.log(e);
        //         }
        //     });
        // });

        graficarInicio();
    });

    
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Servicios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Servicios',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }

            },
                {
                extend: 'copyHtml5',
            },
            {
                extend: 'print',
                title: 'Listado de Servicios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            }
            ],
            responsive: true,
            autoFill: true,

            "paging": true,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom:'Blfrtip' ,
            order: [[0, 'desc']],
            "drawCallback": function( settings ) {
                $('[data-toggle="popover"]').popover({
                    delay: { "show": 500, "hide": 100 },
                    trigger:'focus'

                });
            },

        } );

    }

    function graficarInicio(){
        $('body').waitMe({
            effect : 'roundBounce',
            waitTime: 100000,
            text : 'Espere un momento por favor...',
            onClose: function() {}
        });
        let IdCliente = document.getElementById('cliente').value;
        let IdPeriodo = document.getElementById('periodo').value;
        let jquery = "";
        let token = '{{csrf_token()}}';

        $.ajax({
            url: '{{ route('filtrarAccionesEntorno') }}',
            type: "POST",
            data: {
                IdCliente:IdCliente,
                IdPeriodo:IdPeriodo,
                jquery:jquery,
                _token: token
            },
            success: function(response){
                if(response.data.length == 0){

                }else{
                    $('body').waitMe({
                        effect : 'roundBounce',
                        waitTime: 100,
                        text : 'Espere un momento por favor...',
                        onClose: function() {}
                    });
                    graficarCentroTrabajo(response.data,response.data2);
                    graficarDepartamentos(response.data3,response.data4);
                    graficarEstadoCivil(response.data5,response.data6);
                    graficarGenero(response.data7,response.data8);
                    graficarEdad(response.data9,response.data10);
                    graficarNivelEstudio(response.data11,response.data12);
                    graficarPuesto(response.data13,response.data14);
                    graficarTipoPuesto(response.data15,response.data16);
                    llenarTabla(response.data17,response.data21,response.data18,response.data22,response.data23,response.calificaciondimension,response.riesgodominio,response.riesgocategoria,response.data2);
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
                swal("Aviso!", "No hay información para esta vista, favor de llenar una encuesta primero.", "info");
                window.location.href="/gen-t/public/nom035";
            }
        });
    }

    // function graficarInicio(){
    //     let IdCliente = document.getElementById('cliente').value;
    //     let IdPeriodo = document.getElementById('periodo').value;
    //     console.log("Clienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee"+IdCliente);
    //     console.log("Periododddddddddddddddddddddddddddddddddddddd"+IdPeriodo);
    //     let IdCentro = 0;
    //     let IdEstadoCivil = 0;
    //     let IdDepartamento = 0;
    //     let IdEdad = 0;
    //     let IdGenero = 0;
    //     let IdNivelEstudio = 0;
    //     let IdPuesto = 0;
    //     let IdTipoPuesto = 0;
    //     let IdAntiguedad = 0;
    //     let IdPersonal = 0;
    //     let IdContrato = 0;
    //     let IdJornada = 0;
    //     let IdExperiencia = 0;
    //     let RolaTurnos = 0;
    //     let token = '{{csrf_token()}}';

    //     $.ajax({
    //         url: '{{ route('graficarAccionesEntorno') }}',
    //         type: "POST",
    //         data: {
    //             IdCliente:IdCliente,
    //             IdPeriodo:IdPeriodo,
    //             IdCentro:IdCentro,
    //             IdEstadoCivil:IdEstadoCivil,
    //             IdDepartamento:IdDepartamento,
    //             IdEdad:IdEdad,
    //             IdGenero:IdGenero,
    //             IdNivelEstudio:IdNivelEstudio,
    //             IdPuesto:IdPuesto,
    //             IdTipoPuesto:IdTipoPuesto,
    //             IdAntiguedad:IdAntiguedad,
    //             IdPersonal:IdPersonal,
    //             IdContrato:IdContrato,
    //             IdJornada:IdJornada,
    //             IdExperiencia:IdExperiencia,
    //             RolaTurnos:RolaTurnos,
    //             _token: token
    //         },
    //         success: function(response){
    //             if(response.data.length == 0){
                 
    //             }else{
    //                 console.log(response.data17);
    //                 console.log(response.data19);
    //                 console.log(response.data21);
    //                 console.log(response.data22);
    //                 console.log(response.data18);
    //                 $('body').waitMe({
    //                     effect : 'roundBounce',
    //                     waitTime: 400,
    //                     text : 'Espere un momento por favor...',
    //                     onClose: function() {}
    //                 });
    //                 graficarCentroTrabajo(response.data,response.data2);
    //                 graficarDepartamentos(response.data3,response.data4);
    //                 graficarEstadoCivil(response.data5,response.data6);
    //                 graficarGenero(response.data7,response.data8);
    //                 graficarEdad(response.data9,response.data10);
    //                 graficarNivelEstudio(response.data11,response.data12);
    //                 graficarPuesto(response.data13,response.data14);
    //                 graficarTipoPuesto(response.data15,response.data16);
    //                 llenarTabla(response.data17,response.data19,response.data18,response.data22,response.data23);
    //                 console.log(response.data17);
    //                 console.log(response.data21);
    //                 console.log(response.data18);
    //                 console.log(response.data22);
    //                 console.log(response.data23);
    //             }
    //         },
    //         error: function( e ) {
    //             console.log(e);
    //         }
    //     });
    // }

    /*CONFIGURACION DE LAS GRAFICAS*/
    const paddinglayout={
        left: 0,
        right: 0,
        top: 0,
        bottom: 10
    };
    /*COLORES DE LA GRAFICA*/
    let colors = ['#36a2eb','#ea3281','#00c4d4','#0369a8','#9819b1','Purple','Turquiose ','Brown','FFA500','Fuchsia'];
    /*CONFIGURACION PORCENTAJE GRAFICAS*/
    const optionpluginpercentage = {
        backgroundColor: function(context) {
            return context.dataset.backgroundColor;
        },
        borderColor: '',
        borderRadius: 25,
        borderWidth: 2,
        color: 'white',
        font: {
            weight: 'bold',
            size:15
        },
        formatter: function(value, context) {
                        return value+ '';
                    }								
    };	

    // function llenarTabla(response,response2,response3,response4,response5){
    //     console.log("r55555555555555555555555555555555555 "+response4);
    //     console.log("REs"+response3);
    //     let numeroMayor = Math.max(...response3);
    //     console.log(parseInt(numeroMayor));
    //     let cuerpo = document.getElementById("tablaBody");
    //     let conteo = 0;
    //     let conteo2 = 0;
    //     response.forEach( function(response,index){
            
    //         let contador = 0;
    //         var row1 = document.createElement("TR");

    //         var col1=document.createElement("TD");
    //         var col2=document.createElement("TD");

    //         col1.innerHTML = `${response}`;
    //         col2.innerHTML = `Bajo`;

    //         if(index % 2 == 0){
    //             col1.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //             col2.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //         }else{
    //             col1.style = "font-size:12px; padding:5px;color:black";
    //             col2.style = "font-size:12px; padding:5px;color:black";
    //         }


    //         row1.appendChild(col1);
    //         row1.appendChild(col2);

    //         console.log("1"+response2[conteo].Categoria);
    //         console.log("2"+response);

    //         try {
    //             while(response2[conteo].Categoria == response){
    //                 console.log("Entre al while");
    //                 console.log("cant"+response3[index]);
    //                 if(response3[index] == 1){
    //                     console.log("Entre al if");

    //                     var col3=document.createElement("TD");
    //                     var col4=document.createElement("TD");

    //                     col3.innerHTML = `${response2[contador].Dominio}`;
    //                     col4.innerHTML = `Bajo`;

    //                     if(index % 2 == 0){
    //                         col3.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //                         col4.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //                     }else{
    //                         col3.style = "font-size:12px; padding:5px;color:black";
    //                         col4.style = "font-size:12px; padding:5px;color:black";
    //                     }

    //                     row1.appendChild(col3);
    //                     row1.appendChild(col4);

    //                     cuerpo.appendChild(row1);
    //                     conteo++;
                        
    //                 }else{
    //                     console.log("Entre al sino");
    //                     console.log("tam"+response3[index]);
    //                     col1.setAttribute("rowspan",response3[index]);
    //                     col2.setAttribute("rowspan",response3[index]);
    //                     console.log("index"+index);
    //                     console.log("conteo"+conteo);
    //                     console.log(response3[conteo]);
    //                     for(let j = 0; j < response3[index]; j++){
    //                         if(j==0){
    //                             var col3=document.createElement("TD");
    //                             var col4=document.createElement("TD");

    //                             col3.innerHTML = `${response2[conteo].Dominio}`;
    //                             col4.innerHTML = `Bajo`;

    //                             if(conteo % 2 == 0){
    //                                 col3.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //                                 col4.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //                             }else{
    //                                 col3.style = "font-size:12px; padding:5px;color:black";
    //                                 col4.style = "font-size:12px; padding:5px;color:black";
    //                             }


    //                             row1.appendChild(col3);
    //                             row1.appendChild(col4);
    //                             cuerpo.appendChild(row1);
    //                             // fila.appendChild(row1);
    //                             conteo++;
    //                         }else{
    //                             var row2 = document.createElement("TR");
    //                             var col5=document.createElement("TD");
    //                             var col6=document.createElement("TD");
    //                             col5.innerHTML = `${response2[conteo].Dominio}`;
    //                             col6.innerHTML = `Bajo`;

    //                             if(conteo % 2 == 0){
    //                                 col5.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //                                 col6.style = "font-size:12px; padding:5px; background-color:#dadada; color:black";
    //                             }else{
    //                                 col5.style = "font-size:12px; padding:5px;color:black";
    //                                 col6.style = "font-size:12px; padding:5px;color:black";
    //                             }

    //                             row2.appendChild(col5);
    //                             row2.appendChild(col6); 
    //                             if(j==(response3[index]-1)){
    //                                 // cuerpo.appendChild(row1);
    //                             }
    //                             cuerpo.appendChild(row2);
    //                             conteo++;
    //                         }
    //                     }
                    
    //                 }
    //                 if(conteo < response2.length){

    //                 }else{
    //                     return;
    //                 }
    //                 contador++;
    //             } 
    //         } catch (error) {
    //             console.log(error);
    //         }
    //             console.log("sali del while");   
    //     });

    // }

    function llenarTabla(response,response2,response3,response4,response5,response6,response7,response8,cantCentros){
        for(let i = 0; i < response6.length; i++){
            if(i == 6){
                if(response6[i].IdDimension != 12){
                    let json = {IdCliente: '9', IdEncuesta: '12', IdPeriodo: '36', IdPregunta: '24', iValor: '0', IdDimension: "-1", promedio: "0"};
                    response6.splice(6,0,json);
                }
            }
            if(i == 19){
                if(response6[i].IdDimension != 25){
                    let json = {IdCliente: '9', IdEncuesta: '12', IdPeriodo: '36', IdPregunta: '24', iValor: '0', IdDimension: "-1", promedio: "0"};
                    response6.splice(19,0,json);
                }
            }
        }


        let numeroMayor = Math.max(...response3);
        let cuerpo = document.getElementById("tablaBody");
        let conteo = 0;
        let conteo2 = 0;
        let contador = 0;
        let contador1 = 0;
        let contador2 = 0;
        let contador3 = 0;
        let contador4 = 0;
        let sumariesgoentorno = [];
        let sumariesgoentornodimension = [];
        let sumariesgoentornodimensiones = [];
        let countriesgoentorno = 0;
        let textriesgo = [];
        let textriesgoDimension = [];
        let textriesgoDimensiones = [];
        let colorriesgo = [];
        let colorriesgoDimension = [];
        let colorriesgoDimensiones = [];
        let sumaPersonal = 0;
        let calificacion = 0.0;


        cantCentros.forEach(function(response){
            sumaPersonal = sumaPersonal + response;
        });


        for(let i=0; i < response8.length; i++){
            //Switch para categorias
            switch (i){
                case 0:
                    if(response8[i] < 5){
                        colorriesgo.push("background-color:#58AADF;color:black");
                        textriesgo.push("Nulo");
                    }
                    if(response8[i] >= 5 && response8[i] < 9){
                        colorriesgo.push("background-color:#9ABE13;color:black");
                        textriesgo.push("Bajo");
                    }
                    if(response8[i] >= 9 && response8[i] < 11){
                        colorriesgo.push("background-color:#FAEB29;color:black");
                        textriesgo.push("Medio");
                    }
                    if(response8[i] >= 11 && response8[i] < 14){
                        colorriesgo.push("background-color:#F19602;color:black");
                        textriesgo.push("Alto");
                    }
                    if(response8[i] >= 14){
                        colorriesgo.push("background-color:#F60000;color:white");
                        textriesgo.push("Muy alto");
                    } 
                break;
                case 1:
                    if(response8[i] < 15){
                        colorriesgo.push("background-color:#58AADF;color:black");
                        textriesgo.push("Nulo");
                    }
                    if(response8[i] >= 15 && response8[i] < 30){
                        colorriesgo.push("background-color:#9ABE13;color:black");
                        textriesgo.push("Bajo");
                    }
                    if(response8[i] >= 30 && response8[i] < 45){
                        colorriesgo.push("background-color:#FAEB29;color:black");
                        textriesgo.push("Medio");
                    }
                    if(response8[i] >= 45 && response8[i] < 60){
                        colorriesgo.push("background-color:#F19602;color:black");
                        textriesgo.push("Alto");
                    }
                    if(response8[i] >= 60){
                        colorriesgo.push("background-color:#F60000;color:white");
                        textriesgo.push("Muy alto");
                    } 
                break;
                case 2:
                    if(response8[i] < 5){
                        colorriesgo.push("background-color:#58AADF;color:black");
                        textriesgo.push("Nulo");
                    }
                    if(response8[i] >= 5 && response8[i] < 7){
                        colorriesgo.push("background-color:#9ABE13;color:black");
                        textriesgo.push("Bajo");
                    }
                    if(response8[i] >= 7 && response8[i] < 10){
                        colorriesgo.push("background-color:#FAEB29;color:black");
                        textriesgo.push("Medio");
                    }
                    if(response8[i] >= 10 && response8[i] < 13){
                        colorriesgo.push("background-color:#F19602;color:black");
                        textriesgo.push("Alto");
                    }
                    if(response8[i] >= 13){
                        colorriesgo.push("background-color:#F60000;color:white");
                        textriesgo.push("Muy alto");
                    } 
                break;
                case 3:
                    if(response8[i] < 14){
                        colorriesgo.push("background-color:#58AADF;color:black");
                        textriesgo.push("Nulo");
                    }
                    if(response8[i] >= 14 && response8[i] < 29){
                        colorriesgo.push("background-color:#9ABE13;color:black");
                        textriesgo.push("Bajo");
                    }
                    if(response8[i] >= 29 && response8[i] < 42){
                        colorriesgo.push("background-color:#FAEB29;color:black");
                        textriesgo.push("Medio");
                    }
                    if(response8[i] >= 42 && response8[i] < 58){
                        colorriesgo.push("background-color:#F19602;color:black");
                        textriesgo.push("Alto");
                    }
                    if(response8[i] >= 58){
                        colorriesgo.push("background-color:#F60000;color:white");
                        textriesgo.push("Muy alto");
                    } 
                break;
                case 4:
                    if(response8[i] < 10){
                        colorriesgo.push("background-color:#58AADF;color:black");
                        textriesgo.push("Nulo");
                    }
                    if(response8[i] >= 10 && response8[i] < 14){
                        colorriesgo.push("background-color:#9ABE13;color:black");
                        textriesgo.push("Bajo");
                    }
                    if(response8[i] >= 14 && response8[i] < 18){
                        colorriesgo.push("background-color:#FAEB29;color:black");
                        textriesgo.push("Medio");
                    }
                    if(response8[i] >= 18 && response8[i] < 23){
                        colorriesgo.push("background-color:#F19602;color:black");
                        textriesgo.push("Alto");
                    }
                    if(response8[i] >= 23){
                        colorriesgo.push("background-color:#F60000;color:white");
                        textriesgo.push("Muy alto");
                    } 
                break;
                default:
                    console.log("error");
            }
            calificacion = calificacion + response8[i];
        }


        document.getElementById('calificacion_riesgo').innerHTML = calificacion.toFixed(2);
        document.getElementById('calificacion_riesgo_principal').innerHTML = calificacion.toFixed(2);
        if(calificacion < 50){
            document.getElementById("text_calificacion").innerHTML = "Nulo";
            document.getElementById("color_calificacion").style = "width: 30px; height:30px; border-radius:50%; background-color: #58AADF";
        }
        if(calificacion >= 50 && calificacion < 75){
            document.getElementById("text_calificacion").innerHTML = "Bajo";
            document.getElementById("color_calificacion").style = "width: 30px; height:30px; border-radius:50%; background-color: #9ABE13";
        }
        if(calificacion >= 75 && calificacion < 99){
            document.getElementById("text_calificacion").innerHTML = "Medio";
            document.getElementById("color_calificacion").style = "width: 30px; height:30px; border-radius:50%; background-color: #FAEB29";
        }
        if(calificacion >= 99 && calificacion < 140){
            document.getElementById("text_calificacion").innerHTML = "Alto";
            document.getElementById("color_calificacion").style = "width: 30px; height:30px; border-radius:50%; background-color: #F19602";
        }
        if(calificacion >= 140){
            document.getElementById("text_calificacion").innerHTML = "Muy Alto";
            document.getElementById("color_calificacion").style = "width: 30px; height:30px; border-radius:50%; background-color: #F60000";
        }

        for(let i=0; i < response7.length; i++){
            //Switch para dimensiones
            switch (i){
                case 0:
                    if(response7[i]< 5){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 5 && response7[i] < 9){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 9 && response7[i] < 11){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 11 && response7[i] < 14){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 14){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 1:
                    if(response7[i] < 15){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 15 && response7[i] < 21){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 21 && response7[i] < 27){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 27 && response7[i] < 37){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 37){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 2:
                    if(response7[i] < 11){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 11 && response7[i] < 16){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 16 && response7[i] < 21){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 21 && response7[i] < 25){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 25){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 3:
                    if(response7[i] < 1){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 1 && response7[i] < 2){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 2 && response7[i] < 4){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 4 && response7[i] < 6){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 6){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 4:
                    if(response7[i] < 4){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 4 && response7[i] < 6){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 6 && response7[i] < 8){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 8 && response7[i] < 10){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 10){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 5:
                    if(response7[i] < 9){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 9 && response7[i] < 12){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i]>= 12 && response7[i] < 16){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 16 && response7[i] < 20){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 20){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 6:
                    if(response7[i] < 10){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 10 && response7[i] < 13){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 13 && response7[i] < 17){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 17 && response7[i] < 21){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 21){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 7:
                    if(response7[i] < 7){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 7 && response7[i] < 10){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 10 && response7[i] < 13){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 13 && response7[i] < 16){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 16){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 8:
                    if(response7[i] < 6){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 6 && response7[i] < 10){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 10 && response7[i] < 14){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 14 && response7[i] < 18){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 18){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                case 9:
                    if(response7[i] < 4){
                        colorriesgoDimension.push("background-color:#58AADF;color:black");
                        textriesgoDimension.push("Nulo");
                    }
                    if(response7[i] >= 4 && response7[i] < 6){
                        colorriesgoDimension.push("background-color:#9ABE13;color:black");
                        textriesgoDimension.push("Bajo");
                    }
                    if(response7[i] >= 6 && response7[i] < 8){
                        colorriesgoDimension.push("background-color:#FAEB29;color:black");
                        textriesgoDimension.push("Medio");
                    }
                    if(response7[i] >= 8 && response7[i] < 10){
                        colorriesgoDimension.push("background-color:#F19602;color:black");
                        textriesgoDimension.push("Alto");
                    }
                    if(response7[i] >= 10){
                        colorriesgoDimension.push("background-color:#F60000;color:white");
                        textriesgoDimension.push("Muy alto");
                    } 
                break;
                default:
                    console.log("error");
            }
            sumariesgoentornodimension.push(response8[i]/sumaPersonal);
        }

        for(let i=0; i < response6.length; i++){
            //Switch para dimensiones
            switch (i){
                case 0:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 1:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 2:
                    if(response6[i].promedio < 0.5){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 0.5 && response6[i].promedio < 1.5){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 1.5 && response6[i].promedio < 2.5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 2.5 && response6[i].promedio < 3.5){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 3.5){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 3:
                if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 4:
                if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 5:
                    if(response6[i].promedio < 1.5){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1.5 && response6[i].promedio < 4.5){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio>= 4.5 && response6[i].promedio < 7.5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 7.5 && response6[i].promedio < 10.5){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 10.5){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 6:
                    if(response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 6 && response6[i].promedio < 10){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 10 && response6[i].promedio < 14){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 14){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 7:
                if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 8:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 9:
                    if(response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 6 && response6[i].promedio < 10){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 10 && response6[i].promedio < 14){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 14){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 10:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 11:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 12:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 13:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 14:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 15:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 16:
                    if(response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 6 && response6[i].promedio < 10){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 10 && response6[i].promedio < 14){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 14){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 17:
                    if(response6[i].promedio < 2.5){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2.5 && response6[i].promedio < 7.5){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 7.5 && response6[i].promedio < 12.5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 12.5 && response6[i].promedio < 17.5){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 17.5){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 18:
                    if(response6[i].promedio < 2.5){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2.5 && response6[i].promedio < 7.5){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 7.5 && response6[i].promedio < 12.5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 12.5 && response6[i].promedio < 17.5){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 17.5){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 19:
                    if(response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 6 && response6[i].promedio < 10){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 10 && response6[i].promedio < 14){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 14){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    }  
                break;
                case 20:
                    if(response6[i].promedio < 4){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 4 && response6[i].promedio < 12){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 12 && response6[i].promedio < 20){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 20 && response6[i].promedio < 28){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 28){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    } 
                break;
                case 21:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 4){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 4 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 6){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    }  
                break;
                case 22:
                    if(response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 6 && response6[i].promedio < 10){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 10 && response6[i].promedio < 14){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 14){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    }  
                break;
                case 23:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 3){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 3 && response6[i].promedio < 5){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 5 && response6[i].promedio < 7){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 7){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    }   
                break;
                case 24:
                    if(response6[i].promedio < 1){
                        colorriesgoDimensiones.push("background-color:#58AADF;color:black");
                        textriesgoDimensiones.push("Nulo");
                    }
                    if(response6[i].promedio >= 1 && response6[i].promedio < 2){
                        colorriesgoDimensiones.push("background-color:#9ABE13;color:black");
                        textriesgoDimensiones.push("Bajo");
                    }
                    if(response6[i].promedio >= 2 && response6[i].promedio < 4){
                        colorriesgoDimensiones.push("background-color:#FAEB29;color:black");
                        textriesgoDimensiones.push("Medio");
                    }
                    if(response6[i].promedio >= 4 && response6[i].promedio < 6){
                        colorriesgoDimensiones.push("background-color:#F19602;color:black");
                        textriesgoDimensiones.push("Alto");
                    }
                    if(response6[i].promedio >= 6){
                        colorriesgoDimensiones.push("background-color:#F60000;color:white");
                        textriesgoDimensiones.push("Muy alto");
                    }    
                break;
                default:
                    console.log("error");
            }
            sumariesgoentornodimensiones.push(response8[i]/sumaPersonal);
        }

        response.forEach( function(response,index){//5 veces recorre
            
            var row1 = document.createElement("TR");

            var col1=document.createElement("TD");
            var col2=document.createElement("TD");

            col1.innerHTML = `<div id="" class="d-flex">${response} <b>${parseFloat(response8[index]).toFixed(2)}</b></div>`;
            col2.innerHTML = `${textriesgo[index]}`;

            col1.style = "font-size:15px; padding:5px; color:black";
            col2.style = `font-size:15px; padding:5px;${colorriesgo[index]};text-align:center`;

            row1.appendChild(col1);
            row1.appendChild(col2);

            for(let i = 0; i < response3[index]; i++){
               if(response3[index] == 1){
                    var col3=document.createElement("TD");
                    var col4=document.createElement("TD");

                    col3.innerHTML = `<div class="d-flex">${response2[contador]}<b>${parseFloat(response7[contador]).toFixed(2)}</b></div>`;
                    col4.innerHTML = `${textriesgoDimension[contador]}`;

                            
                    col3.style = "font-size:15px; padding:5px; color:black";
                    col4.style = `font-size:15px; padding:5px;${colorriesgoDimension[contador]}; text-align:center`;


                    row1.appendChild(col3);
                    row1.appendChild(col4);

                    if(response4[contador2] == 1){

                    }else{
                        col1.setAttribute("rowspan",response4[contador2]);
                        col2.setAttribute("rowspan",response4[contador2]);
                        col3.setAttribute("rowspan",response4[contador2]);
                        col4.setAttribute("rowspan",response4[contador2]);

                        for(let j = 0; j < response4[contador2]; j++){
                            if(j == 0){
                                var col5=document.createElement("TD");
                                var col6=document.createElement("TD");
                                var col20=document.createElement("TD");

                                if(response5[contador3].IdDimension != response6[contador3].IdDimension){

                                    col5.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>NA</b></div>`;
                                    col6.innerHTML = `NA`;
                                    col20.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>`
                        
                                    col5.style = "font-size:15px; padding:5px; color:black";
                                    col6.style = `font-size:15px; padding:5px;color:black;text-align:center`;
                                    col20.style = "font-size:15px; padding:5px; color:black; text-align:center";

                                }else{
                                    col5.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>${parseFloat((response6[contador3].promedio)).toFixed(2)}</b></div>`;
                                    col6.innerHTML = `${textriesgoDimensiones[contador3]}`;
                                    col20.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>
                                    <buttom onclick="openAcciones(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Acciones"><i class="fa fa-pencil"></i></buttom>`;

                                    col5.style = "font-size:15px; padding:5px; color:black";
                                    col6.style = `font-size:15px; padding:5px;${colorriesgoDimensiones[contador3]};text-align:center`;
                                    col20.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }

                                row1.appendChild(col5);
                                row1.appendChild(col6);
                                row1.appendChild(col20);

                                cuerpo.appendChild(row1);
                                document.getElementsByClassName('d-flex')[index].style="display:flex; justify-content:space-between; padding:5px";
                                contador3++;
                            }else{
                                var row2 = document.createElement("TR");

                                var col7=document.createElement("TD");
                                var col8=document.createElement("TD");
                                var col21=document.createElement("TD");

                                if(response5[contador3].IdDimension != response6[contador3].IdDimension){
                                    col7.style = "font-size:15px; padding:5px; color:black";
                                    col8.style = `font-size:15px; padding:5px;color:black; text-align:center`;
                                    col21.style = "font-size:15px; padding:5px; color:black; text-align:center";

                                    col7.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>NA</b></div>`;
                                    col8.innerHTML = `NA`;
                                    col21.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>`;
                                }else{
                                    col7.style = "font-size:15px; padding:5px; color:black";
                                    col8.style = `font-size:15px; padding:5px;${colorriesgoDimensiones[contador3]}; text-align:center`;
                                    col21.style = "font-size:15px; padding:5px; color:black; text-align:center";

                                    col7.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>${parseFloat((response6[contador3].promedio)).toFixed(2)}</b></div>`;
                                    col8.innerHTML = `${textriesgoDimensiones[contador3]}`;
                                    col21.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>
                                    <buttom onclick="openAcciones(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Acciones"><i class="fa fa-pencil"></i></buttom>`;
                                }

                                row2.appendChild(col7);
                                row2.appendChild(col8);
                                row2.appendChild(col21);
                                cuerpo.appendChild(row2);
                                contador3++;

                            }

                        }
                    }
                    contador++;
                    contador2++;
                }else{
                    let suma = 0;
                  
                    if(i == 0){
                        for(let h = 0; h < response3[index]; h++){
                            suma = suma + response4[contador2+h];
                        }
                        col1.setAttribute("rowspan",suma);
                        col2.setAttribute("rowspan",suma);

                        var col3=document.createElement("TD");
                        var col4=document.createElement("TD");

                        col3.innerHTML = `<div class="d-flex">${response2[contador]}<b>${parseFloat(response7[contador]).toFixed(2)}</b></div>`;
                        col4.innerHTML = `${textriesgoDimension[contador]}`;

                        col3.style = "font-size:15px; padding:5px; color:black";
                        col4.style = `font-size:15px; padding:5px;${colorriesgoDimension[contador]}; text-align:center`;

                        row1.appendChild(col3);
                        row1.appendChild(col4);
                        
                        // col3.setAttribute("rowspan",response4[contador2]);
                        // col4.setAttribute("rowspan",response4[contador2]);

                        let dato = response4[contador2];

                        col3.setAttribute("rowspan",dato);
                        col4.setAttribute("rowspan",dato);

                        row1.appendChild(col3);
                        row1.appendChild(col4);

                        for(let t = 0; t < response4[contador2]; t++){
                            if(t == 0){
                                var col5=document.createElement("TD");
                                var col6=document.createElement("TD");
                                var col20=document.createElement("TD");

                                if(response5[contador3].IdDimension != response6[contador3].IdDimension){
                                    col5.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>NA</b></div>`;
                                    col6.innerHTML = `NA`;
                                    col20.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>`;

                                    col5.style = "font-size:15px; padding:5px; color:black";
                                    col6.style = `font-size:15px; padding:5px;color:black;text-align:center`;
                                    col20.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }else{
                                    col5.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>${parseFloat((response6[contador3].promedio)).toFixed(2)}</b></div>`;
                                    col6.innerHTML = `${textriesgoDimensiones[contador3]}`;
                                    col20.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>
                                    <buttom onclick="openAcciones(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Acciones"><i class="fa fa-pencil"></i></buttom>`;

                                    col5.style = "font-size:15px; padding:5px; color:black";
                                    col6.style = `font-size:15px; padding:5px;${colorriesgoDimensiones[contador3]};text-align:center`;
                                    col20.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }

                                row1.appendChild(col5);
                                row1.appendChild(col6);
                                row1.appendChild(col20);

                                cuerpo.appendChild(row1);
                                document.getElementsByClassName('d-flex')[index].style="display:flex; justify-content:space-between; padding:5px;";
                                contador3++;
                            }else{
                                var row2 = document.createElement("TR");

                                var col7=document.createElement("TD");
                                var col8=document.createElement("TD");
                                var col21=document.createElement("TD");

                                if(response5[contador3].IdDimension != response6[contador3].IdDimension){
                                    col7.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>NA</b></div>`;
                                    col8.innerHTML = `NA`;
                                    col21.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>`;

                                    col7.style = "font-size:15px; padding:5px; color:black";
                                    col8.style = `font-size:15px; padding:5px;color:black;text-align:center`;
                                    col21.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }else{
                                    col7.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>${parseFloat((response6[contador3].promedio)).toFixed(2)}</b></div>`;
                                    col8.innerHTML = `${textriesgoDimensiones[contador3]}`;
                                    col21.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>
                                    <buttom onclick="openAcciones(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Acciones"><i class="fa fa-pencil"></i></buttom>`;

                                    col7.style = "font-size:15px; padding:5px; color:black";
                                    col8.style = `font-size:15px; padding:5px;${colorriesgoDimensiones[contador3]};text-align:center`;
                                    col21.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }


                                row2.appendChild(col7);
                                row2.appendChild(col8);
                                row2.appendChild(col21);

                                cuerpo.appendChild(row2);
                                contador3++;
                            }
                        }
                        contador++;
                        contador2++;

                    }else{
                        var row3 = document.createElement("TR");

                        var col9=document.createElement("TD");
                        var col10=document.createElement("TD");

                        col9.setAttribute("rowspan",response4[contador2]);
                        col10.setAttribute("rowspan",response4[contador2]);

                        col9.innerHTML = `<div class="d-flex">${response2[contador]}<b>${parseFloat(response7[contador]).toFixed(2)}</b></div>`;
                        col10.innerHTML = `${textriesgoDimension[contador]}`;

                        col9.style = "font-size:15px; padding:5px; color:black";
                        col10.style = `font-size:15px; padding:5px;${colorriesgoDimension[contador]};text-align:center`;

                        for(let p = 0; p < response4[contador2]; p++){
                            if(p == 0){
                                var col11=document.createElement("TD");
                                var col12=document.createElement("TD");
                                var col22=document.createElement("TD");

                                if(response5[contador3].IdDimension != response6[contador3].IdDimension){
                                    col11.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>NA</b></div>`;
                                    col12.innerHTML = `NA`;
                                    col22.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>`;

                                    col11.style = "font-size:15px; padding:5px; color:black";
                                    col12.style = `font-size:15px; padding:5px;color:black;text-align:center`;
                                    col22.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }else{
                                    col11.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>${parseFloat((response6[contador3].promedio)).toFixed(2)}</b></div>`;
                                    col12.innerHTML = `${textriesgoDimensiones[contador3]}`;
                                    col22.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>
                                    <buttom onclick="openAcciones(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Acciones"><i class="fa fa-pencil"></i></buttom>`;

                                    col11.style = "font-size:15px; padding:5px; color:black";
                                    col12.style = `font-size:15px; padding:5px;${colorriesgoDimensiones[contador3]};text-align:center`;
                                    col22.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }

                                row3.appendChild(col9);
                                row3.appendChild(col10);
                                row3.appendChild(col11);
                                row3.appendChild(col12);
                                row3.appendChild(col22);

                                cuerpo.appendChild(row3);
                                contador3++;
                            }else{
                                var row4 = document.createElement("TR");

                                var col11=document.createElement("TD");
                                var col12=document.createElement("TD");
                                var col23=document.createElement("TD");

                                if(response5[contador3].IdDimension != response6[contador3].IdDimension){
                                    col11.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>NA</b></div>`;
                                    col12.innerHTML = `NA`;
                                    col23.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>`;

                                    col11.style = "font-size:15px; padding:5px; color:black";
                                    col12.style = `font-size:15px; padding:5px;color:black; text-align:center`;
                                    col23.style = "font-size:15px; padding:5px; color:black; text-align:center";
                                }else{
                                    col11.innerHTML = `<div class="d-flex">${response5[contador3].Dimension}<b>${parseFloat((response6[contador3].promedio)).toFixed(2)}</b></div>`;
                                    col12.innerHTML = `${textriesgoDimensiones[contador3]}`;
                                    col23.innerHTML = `<input id="dimension_id" type="hidden" value="${response5[contador3].IdDimension}"><buttom onclick="detalleRiesgo(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-placement="top" title="Detalle del riesgo"><i class="fa fa-eye"></i></buttom>
                                    <buttom onclick="openAcciones(${response5[contador3].IdDimension})" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Acciones"><i class="fa fa-pencil"></i></buttom>`;

                                    col11.style = "font-size:15px; padding:5px; color:black";
                                    col12.style = `font-size:15px; padding:5px;${colorriesgoDimensiones[contador3]}; text-align:center`;
                                    col23.style = "font-size:15px; padding:5px; color:black; text-align:center";  
                                }

                                row4.appendChild(col11);
                                row4.appendChild(col12);
                                row4.appendChild(col23);

                                cuerpo.appendChild(row4);
                                contador3++;  
                            }
                        }
                        contador++;
                        contador2++;
                    }

                }
            }
        });

    }

    function detalleRiesgo(id_dimension){
        var thead=document.getElementById("tbHead");
        var tbody=document.getElementById("tbBody");
        thead.innerHTML = "";
        tbody.innerHTML = "";
        let IdCentro = 0;
        let contaF = 0;
        let arr = [];
        let query = "";

        $("input[type=checkbox]:checked").each(function(){
                //cada elemento seleccionado
                let palabra = $(this).val();
                let arreg = palabra.split(' ');
                if(arreg[0] != 'C'){
                    contaF++;
                }else{                
                    arr.push(arreg[1]);
                }
               
        });

        
        for(let i = 0; i < arr.length; i++){
            if(arr.length == 1){
                query = " and epe.IdCentro = "+Number(arr[i]);
            }else{
                if(i == 0){
                    query = "and ( epe.IdCentro = "+arr[0];
                }else{
                    if(i == (arr.length-1)){
                        query = query + " OR epe.IdCentro = "+arr[i]+")";
                    }else{
                        query = query + " OR epe.IdCentro = "+arr[i];
                    }
                }
            }
        }

        if(contaF == 0){
            $('body').waitMe({
                effect : 'roundBounce',
                waitTime: 50000,
                text : 'Espere un momento por favor...',
                onClose: function() {}
            });

            let IdDimension = id_dimension;
            document.getElementById('contenedorDimension').value = IdDimension;
            let contenido = document.getElementById('contenido-riesgo');
            let IdCliente = document.getElementById('cliente').value;
            let IdPeriodo = document.getElementById('periodo').value;
            document.getElementById('IdPeriodo').value = IdPeriodo;
            let token = '{{csrf_token()}}';

            $.ajax({
                url: '{{ route('getDimensiones') }}',
                type: "POST",
                data: {
                    IdDimension:IdDimension,
                    IdCliente:IdCliente,
                    IdPeriodo:IdPeriodo,
                    Sentencia:query,
                    IdCentro:IdCentro,
                    _token: token
                },
                success: function(responses){
                    if(responses.data.length == 0){
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 100000,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });
                    }else{
                        responses.data.forEach(function(response,index){
                            var table=document.getElementById("tabla_riesgo");
                            var tbody=document.getElementById("tbBody");
                            var thead=document.getElementById("tbHead");
                            let total = 0;
                            if(index == 0){
                                var row1 = document.createElement("TR");
                                var col1=document.createElement("TD");
                                var col2=document.createElement("TD");
                                var col3=document.createElement("TD");
                                var col4=document.createElement("TD");
                                var col5=document.createElement("TD");
                                var col6=document.createElement("TD");
                                var col7=document.createElement("TD");

                    
                                col1.innerHTML = `${response.Descripcion}`;
                                col2.innerHTML = `Siempre`;
                                col3.innerHTML = `Casi Siempre`;
                                col4.innerHTML = `Algunas Veces`;
                                col5.innerHTML = `Casi Nunca`;
                                col6.innerHTML = `Nunca`;
                                col7.innerHTML = `Total`;

                                col1.style = "font-size:16px; width: 50%; text-align:start; padding:5px; color:white";
                                col2.style = "font-size:16px; width: 10%; padding:5px; color:white";
                                col3.style = "font-size:16px; width: 10%; padding:5px; color:white";
                                col4.style = "font-size:16px; width: 10%; padding:5px; color:white";
                                col5.style = "font-size:16px; width: 10%; padding:5px; color:white";
                                col6.style = "font-size:16px; width: 10%; padding:5px; color:white";
                                col7.style = "font-size:16px; width: 10%; padding:5px; color:white; text-align:center";

                                row1.appendChild(col1);
                                row1.appendChild(col2);
                                row1.appendChild(col3);
                                row1.appendChild(col4);
                                row1.appendChild(col5);
                                row1.appendChild(col6);
                                row1.appendChild(col7);
                                thead.appendChild(row1);
                                table.appendChild(thead);

                                var row2 = document.createElement("TR");
                                var col7=document.createElement("TD");
                                var col8=document.createElement("TD");
                                var col9=document.createElement("TD");
                                var col10=document.createElement("TD");
                                var col11=document.createElement("TD");
                                var col12=document.createElement("TD");
                                var col13=document.createElement("TD");

                                col7.innerHTML = `${response.Pregunta}`;
                                col8.innerHTML = `0`;
                                col9.innerHTML = `0`;
                                col10.innerHTML = `0`;
                                col11.innerHTML = `0`;
                                col12.innerHTML = `0`;
                                col13.innerHTML = `0`;

                                responses.data4.forEach(function(respon,index){
                                    if(respon.IdPregunta == response.IdPregunta){
                                        if(respon.Descripcion == "Siempre"){
                                        total = total + parseInt(respon.cantRespuesta);
                                        col8.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Casi Siempre"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col9.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Algunas Veces"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col10.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Casi Nunca"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col11.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Nunca"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col12.innerHTML = `${respon.cantRespuesta}`;
                                        }
                                    }

                                });
                                col13.innerHTML = `${total}`;

                                col7.style = "font-size:16px; width: 50%; text-align:start; border-bottom:1px solid black; color:black; padding:5px;";
                                col8.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                col9.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                col10.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                col11.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                col12.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                col13.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px; text-align:center";

                                row2.appendChild(col7);
                                row2.appendChild(col8);
                                row2.appendChild(col9);
                                row2.appendChild(col10);
                                row2.appendChild(col11);
                                row2.appendChild(col12);
                                row2.appendChild(col13);
                                tbody.appendChild(row2);
                                table.appendChild(tbody);
                            }else{
                                total = 0;
                                var row3 = document.createElement("TR");
                                var col1=document.createElement("TD");
                                var col2=document.createElement("TD");
                                var col3=document.createElement("TD");
                                var col4=document.createElement("TD");
                                var col5=document.createElement("TD");
                                var col6=document.createElement("TD");
                                var col7=document.createElement("TD");

                                col1.innerHTML = `${response.Pregunta}`;
                                col2.innerHTML = `0`;
                                col3.innerHTML = `0`;
                                col4.innerHTML = `0`;
                                col5.innerHTML = `0`;
                                col6.innerHTML = `0`;
                                col7.innerHTML = `0`;
                                responses.data4.forEach(function(respon,index){

                                    if(respon.IdPregunta == response.IdPregunta){
                                        if(respon.Descripcion == "Siempre"){
                                        total = total + parseInt(respon.cantRespuesta);
                                        col2.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Casi Siempre"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col3.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Algunas Veces"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col4.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Casi Nunca"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col5.innerHTML = `${respon.cantRespuesta}`;
                                        }

                                        if(respon.Descripcion == "Nunca"){
                                            total = total + parseInt(respon.cantRespuesta);
                                            col6.innerHTML = `${respon.cantRespuesta}`;
                                        }
                                    }

                                });
                                col7.innerHTML = `${total}`;

                                if(index % 2 == 0){
                                    col1.style = "font-size:16px; width: 50%; text-align:start; border-bottom:1px solid black; color:black; padding:5px;";
                                    col2.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                    col3.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                    col4.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                    col5.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                    col6.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px;";
                                    col7.style = "font-size:16px; width: 10%; border-bottom:1px solid black; color:black; padding:5px; text-align:center";
                                }else{
                                    col1.style = "font-size:16px; width: 50%; text-align:start; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px;";
                                    col2.style = "font-size:16px; width: 10%; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px;";
                                    col3.style = "font-size:16px; width: 10%; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px;";
                                    col4.style = "font-size:16px; width: 10%; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px;";
                                    col5.style = "font-size:16px; width: 10%; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px;";
                                    col6.style = "font-size:16px; width: 10%; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px;";
                                    col7.style = "font-size:16px; width: 10%; border-bottom:1px solid black; background-color:#eaeaea; color:black; padding:5px; text-align:center";
                                }


                                row3.appendChild(col1);
                                row3.appendChild(col2);
                                row3.appendChild(col3);
                                row3.appendChild(col4);
                                row3.appendChild(col5);
                                row3.appendChild(col6);
                                row3.appendChild(col7);
                                tbody.appendChild(row3);
                                table.appendChild(tbody);
                            }
                            
                        });

                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 50,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });

                        $('#modalPoliticas1').modal('show');

                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });


        }else{
            swal("Aviso!", "Debe tener unicamente seleccionado el centro de trabajo", "info");
        }

    }

    function removeAllRowTable(nameId) {
        $(`#${nameId}`).detach();
    }

    function openAcciones(id_dimension){
        limpiar();
        let tbody = document.getElementById('tbody_acciones');
        tbody.innerHTML = "";

        let IdDimension = id_dimension;

        let IdCliente = document.getElementById('cliente').value;

        document.getElementById('IdCliente').value = IdCliente;
        document.getElementById('IdDimension').value = IdDimension;
        let IdPeriodo = document.getElementById('periodo').value;
        document.getElementById('IdPeriodo').value = IdPeriodo;
        let token = '{{csrf_token()}}';
        let IdCentro = 0;
        let array = [];
       
        $("input[type=checkbox]:checked").each(function(){
            //cada elemento seleccionado
            let palabra = $(this).val();
            let arr = palabra.split(' ');
            IdCentro = parseInt(arr[1]);

        });

        

        if(contarFiltro == true){
            $('body').waitMe({
                effect : 'roundBounce',
                waitTime: 50000,
                text : 'Espere un momento por favor...',
                onClose: function() {}
            });
            $.ajax({
                url: '{{ route('getDimensiones') }}',
                type: "POST",
                data: {
                    IdDimension:IdDimension,
                    IdCliente:IdCliente,
                    IdPeriodo:IdPeriodo,
                    IdCentro:IdCentro,
                    _token: token
                },
                success: function(response){
                    if(response.data2.length == 0){
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 50,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });

                        $('#modalPoliticas').modal('show');
                    }else{
                        response.data2.forEach(function(element,index){

                            let selectAcciones = document.getElementById('select_acciones');
                            var option = document.createElement("option");
                            option.innerHTML = `${element.Descripcion}`;
                            option.value = `${element.IdAccion}`;
                            option.style = "font-size:15px;"

                            selectAcciones.appendChild(option);
                        });


                        llenarTablaAcciones(response.data3);
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 50,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });
                        $('#modalPoliticas').modal('show');
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });
        }else{
            swal("Aviso!", "Debe tener unicamente seleccionado el centro de trabajo", "info");
        }
    }

    const limpiar = () => {
        var selectt = document.getElementById("select_acciones");
        for(let i = selectt.options.length; i >= 0; i--) {
            selectt.remove(i);
        }
    }

    function llenarTablaAcciones(response){

        let tbody = document.getElementById('tbody_acciones');
        tbody.innerHTML = "";
        response.forEach( function(element,index){

            var row1 = document.createElement("TR");
            var col1 = document.createElement("TD");
            var col2 = document.createElement("TD");
            var col3 = document.createElement("TD");

            col1.innerHTML = `${index+1}`;
            col2.innerHTML = `${element.Accion}`;
            col3.innerHTML = `${element.Descripcion}`;

            if(index % 2 == 0){
                col1.style = "padding:7px; border:1px solid #000; text-align:start; font-size:15px; background-color:#fff; text-align:center";
                col2.style = "padding:7px; border:1px solid #000; text-align:start; font-size:15px; background-color:#fff";
                col3.style = "padding:7px; border:1px solid #000; text-align:start; font-size:15px; background-color:#fff";  
            }else{
                col1.style = "padding:7px; border:1px solid #000; text-align:start; font-size:15px; background-color:rgb(229, 227, 227);; text-align:center";
                col2.style = "padding:7px; border:1px solid #000; text-align:start; font-size:15px; background-color:rgb(229, 227, 227);";
                col3.style = "padding:7px; border:1px solid #000; text-align:start; font-size:15px; background-color:rgb(229, 227, 227);";
            }


            row1.appendChild(col1);
            row1.appendChild(col2);
            row1.appendChild(col3);

            tbody.appendChild(row1);
        });
    }

    //EVENTO AL ABRIR Y CERRAR EL COLLAPSE
    $("#collapseExample").on("hide.bs.collapse", function(){
        // $(".btn").html('<span class="glyphicon glyphicon-collapse-down"></span> Open');
        document.getElementById('btnAgregarAccion').disabled = "";
        document.getElementById('comentario').disabled = "";
        document.getElementById('select_acciones').disabled = "";
    });
    $("#collapseExample").on("show.bs.collapse", function(){
        // $(".btn").html('<span class="glyphicon glyphicon-collapse-up"></span> Close');
        document.getElementById('btnAgregarAccion').disabled = "disabled";
        document.getElementById('comentario').disabled = "disabled";
        document.getElementById('select_acciones').disabled = "disabled";
    });


    document.getElementById('btnAgregarAccion').addEventListener("click", function(){

        let comentario = document.getElementById('comentario').value;
        let IdAccion = document.getElementById('select_acciones').value;
        let IdCliente = document.getElementById('cliente').value;
        let IdPeriodo = document.getElementById('periodo').value;
        let IdDimension = document.getElementById('IdDimension').value;
        let IdCentro = 0;
        let array = [];
       
        $("input[type=checkbox]:checked").each(function(){
            //cada elemento seleccionado
            let palabra = $(this).val();
            let arr = palabra.split(' ');
            IdCentro = parseInt(arr[1]);
        });
        

        let token = '{{csrf_token()}}';
        // if(comentario != ""){
            $.ajax({
                url: '{{ route('addAccion') }}',
                type: "POST",
                data: {
                    IdDimension:IdDimension,
                    IdCliente:IdCliente,
                    IdPeriodo:IdPeriodo,
                    comentario:comentario,
                    IdAccion:IdAccion,
                    IdCentro:IdCentro,
                    _token: token
                },
                success: function(response){
                    if(response.data == true){

                        swal("Aviso!", "Se agrego la acción", "info");
                        llenarTablaAcciones(response.data2);

                    }else{
                        swal("Aviso!", "Ya existe esa acción", "info");
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });
        // }else{
        //     swal("Aviso!", "Debe agregar un comentario", "info"); 
        // }
    });

    document.getElementById('btnEnviarAccion').addEventListener("click", function(e){
        e.preventDefault();
        let descripcion = document.getElementById('descripcion').value;
        let IdCliente = document.getElementById('IdCliente').value;
        let IdDimension = document.getElementById('IdDimension').value;
        let token = '{{csrf_token()}}';

        if(descripcion != ""){
            $.ajax({
                url: '{{ route('setAccion') }}',
                type: "POST",
                data: {
                    IdDimension:IdDimension,
                    IdCliente:IdCliente,
                    descripcion:descripcion,
                    _token: token
                },
                success: function(response){
                    if(response.data == true){
                        limpiar();
                        response.data2.forEach(function(element,index){

                            let selectAcciones = document.getElementById('select_acciones');
                            var option = document.createElement("option");
                            option.innerHTML = `${element.Descripcion}`;
                            option.value = `${element.IdAccion}`;
                            option.style = "font-size:15px;"

                            selectAcciones.appendChild(option);
                        });
                        document.getElementById('descripcion').value="";
                        swal("Aviso!", "Se agrego la Acción", "info"); 
                        $('#collapseExample').collapse('hide');
                        // document.getElementById('btnAgregarAccion').disabled = "";
                        // document.getElementById('comentario').disabled = "";
                        // document.getElementById('select_acciones').disabled = "";
                    }else{
                        swal("Aviso!", "No se pudo Agregar la Acción", "info"); 
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });
        }else{
            swal("Aviso!", "Debe llenar el campo de acción", "info"); 
        }
    });
    

    // document.getElementById('btnAcciones').addEventListener("click", function(e){
    //         e.preventDefault();
    //         $('#modalPoliticas').modal('show');
    // })

    /*GRAFICA DE PASTEL GENERO*/
    function graficarGenero(Chartlabels,ChartData){
        let total = ChartData.reduce((acumulador, valorActual) => acumulador + valorActual, 0);
        document.getElementById('cant_encuesta').innerHTML = total;

        let lugarGrafica = document.getElementById('graficaGenero');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="clientesChart" width="400px" height="250px"></canvas></div>`;
        lugarGrafica.innerHTML = grafica;
        var ctxClientes = document.getElementById('clientesChart').getContext('2d');
        var clientesChart = new Chart(ctxClientes, {
            type: 'pie',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: '',
                    data:ChartData,
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1,
                    datalabels: {
                        anchor: 'center'
                    }
                }]
            },
            options: {
                plugins: {
                    datalabels: optionpluginpercentage,
                },
                layout: {
                    padding: paddinglayout
                },
                legend: {
                    labels: {
                        fontColor: '#fff'
                    }
                }									
            }
        });
    }

    /*GRAFICA DE PASTEL ESTADO CIVIL*/
    function graficarEstadoCivil(Chartlabels,ChartData){
        let lugarGrafica = document.getElementById('graficaEstadoCivil');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="estadocivilChart" width="400px" height="250px"></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        document.getElementById('estadocivilChart').style="width:100%; height:100%";
        var ctxClientes = document.getElementById('estadocivilChart').getContext('2d');
        var clientesChart = new Chart(ctxClientes, {
            type: 'pie',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: '',
                    data:ChartData,
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1,
                    datalabels: {
                        anchor: 'center'
                    }
                }]
            },
            options: {
                plugins: {
                    datalabels: optionpluginpercentage,
                },
                layout: {
                    padding: paddinglayout
                },
                legend: {
                    labels: {
                        fontColor: '#fff'
                    }
                }									
            }
        });
    }

    const optionplugnormal = {		
        color: 'white',
        font: {
            weight: 'bold',
            size:15
        }								
    };


    /*GRAFICA DE BARRA DE EDAD*/
    function graficarEdad(Chartlabels,ChartData){

        let lugarGrafica = document.getElementById('graficaEdad');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="totalServiciosChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        if(Chartlabels.length == 1){
            document.getElementById('totalServiciosChart').style="width:90%; height:100%";
        }
        if(Chartlabels.length > 15){
            document.getElementById('totalServiciosChart').style="width:15%; height:100%";
        }else{
            document.getElementById('totalServiciosChart').style="width:60%; height:100%";
        }

        var ctxtotServMes = document.getElementById('totalServiciosChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'bar',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: 'Total Personas',
                    data:ChartData,
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "white",
                            beginAtZero: true,
                            color: '#fff',
                        },
                        display: false
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
                            beginAtZero: true,
                        }
                    }]
                },
                legend: {
                    color: "white",
                    display: false
                },
                plugins: {
                    datalabels: optionplugnormal,
                }
            }
        });

    }
    
    /*GRAFICA DE BARRA ORIZONTAL DE NIVEL DE ESTUDIO*/
    function graficarNivelEstudio(Chartlabels,ChartData){

        let lugarGrafica = document.getElementById('graficaNivelEstudio');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="nivelestudioChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        if(Chartlabels.length == 1){
            document.getElementById('nivelestudioChart').style="width:90%; height:100%";
        }
        if(Chartlabels.length > 15){
            document.getElementById('nivelestudioChart').style="width:15%; height:100%";
        }else{
            document.getElementById('nivelestudioChart').style="width:60%; height:100%";
        }

        var ctxtotServMes = document.getElementById('nivelestudioChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'horizontalBar',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: 'Total Personal',
                    data:ChartData,
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "white",
                            beginAtZero: true,
                            color: '#fff',
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
                            beginAtZero: true
                        },
                        display: false
                    }]
                },
                legend: {
                    color: "white",
                    display: false
                },
                plugins: {
                    datalabels: optionplugnormal,
                }
            }
        });
    }

    /*GRAFICA DE BARRA ORIZONTAL DE OCUPACION/PUESTO*/
    function graficarPuesto(Chartlabels,ChartData){

        let lugarGrafica = document.getElementById('graficaPuesto');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="ocupacionChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        if(Chartlabels.length == 1){
            document.getElementById('ocupacionChart').style="width:90%; height:100%";
        }
        if(Chartlabels.length > 14){
            document.getElementById('ocupacionChart').style="width:35%; height:100%";
        }else{
            document.getElementById('ocupacionChart').style="width:60%; height:100%";
        }

        var ctxtotServMes = document.getElementById('ocupacionChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'horizontalBar',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: 'Total Personal',
                    data:ChartData,
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "white",
                            beginAtZero: true,
                            color: '#fff',
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
                            beginAtZero: true
                        },
                        display: false
                    }]
                },
                legend: {
                    color: "white",
                    display: false
                },
                plugins: {
                    datalabels: optionplugnormal,
                }
            }
        });
    }

    /*GRAFICA DE BARRA ORIZONTAL DE TIPO PUESTO*/
    function graficarTipoPuesto(Chartlabels,ChartData){

        let lugarGrafica = document.getElementById('graficaTipoPuesto');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="tipopuestoChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        if(Chartlabels.length == 1){
            document.getElementById('tipopuestoChart').style="width:90%; height:100%";
        }
        if(Chartlabels.length > 15){
            document.getElementById('tipopuestoChart').style="width:15%; height:100%";
        }else{
            document.getElementById('tipopuestoChart').style="width:60%; height:100%";
        }

        var ctxtotServMes = document.getElementById('tipopuestoChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'bar',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: 'Total Personal',
                    data:ChartData,
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "white",
                            beginAtZero: true,
                            color: '#fff',
                        },
                        display: false
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    color: "white",
                    display: false
                },
                plugins: {
                    datalabels: optionplugnormal,
                }
            }
        });
    }
    
    /*GRAFICA DE BARRA ORIZONTAL DE DEPARTAMENTO*/
    function graficarDepartamentos(Chartlabels,ChartData){

        let lugarGrafica = document.getElementById('graficaDepartamento');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="departamentoChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        if(Chartlabels.length == 1){
            document.getElementById('departamentoChart').style="width:90%; height:100%";
        }
        if(Chartlabels.length > 15){
            document.getElementById('departamentoChart').style="width:15%; height:100%";
        }else{
            document.getElementById('departamentoChart').style="width:60%; height:100%";
        }

        var ctxtotServMes = document.getElementById('departamentoChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'horizontalBar',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label:'Total Departamentos',
                    data:ChartData,
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "white",
                            beginAtZero: true,
                            color: '#fff',
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
                            beginAtZero: true
                        },
                        display: false
                    }]
                },
                legend: {
                    color: "white",
                    display: false
                },
                plugins: {
                    datalabels: optionplugnormal,
                }
            }
        });
    }

    /*GRAFICA DE BARRA ORIZONTAL DE CENTRO TRABAJO*/
    function graficarCentroTrabajo(Chartlabels,ChartData){
        document.getElementById('cant_centro').innerHTML = ChartData.length;

        let lugarGrafica = document.getElementById('graficaCentro');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="centrotrabajoChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        if(Chartlabels.length == 1){
            document.getElementById('centrotrabajoChart').style="width:90%; height:100%";
        }
        if(Chartlabels.length > 15){
            document.getElementById('centrotrabajoChart').style="width:15%; height:100%";
        }else{
            document.getElementById('centrotrabajoChart').style="width:60%; height:100%";
        }

        var ctxtotServMes = document.getElementById('centrotrabajoChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'horizontalBar',
            data: {
                labels:Chartlabels,
                datasets: [{
                    label: 'Total Personal',
                    data:ChartData,
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "white",
                            beginAtZero: true,
                            color: '#fff',
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
                            beginAtZero: true
                        },
                        display: false
                    }]
                },
                legend: {
                    color: "white",
                    display: false
                },
                plugins: {
                    datalabels: optionplugnormal,
                }
            }
        });
    }

    function graficarPastel(requiere,norequiere){
                let lugarGrafica = document.getElementById('graficar2');
                let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="clientesChart" width="400px" height="250px"></canvas></div>`;
                lugarGrafica.innerHTML = grafica;
                var canvas = document.getElementById('clientesChart');
				// canvas.style.cssText = 'width: 400px; height: 400px;';
                document.getElementById('clientesChart').style="width:100%; height:100%";
				var ctxClientes = document.getElementById('clientesChart').getContext('2d');
				var clientesChart = new Chart(ctxClientes, {
					type: 'pie',
					data: {
						labels: ['Requiere','No requiere'],
						datasets: [{
							label: '',
							data: [requiere,norequiere],
							backgroundColor: colors,
							borderColor: colors,
							borderWidth: 1,
							datalabels: {
								anchor: 'center'
							}
						}]
					},
					options: {
						plugins: {
							datalabels: optionpluginpercentage,
						},
						layout: {
							padding: paddinglayout
						},
                        legend: {
                            labels: {
                                fontColor: '#fff'
                            }
                        }									
					}
				});
    }

</script>

@endsection