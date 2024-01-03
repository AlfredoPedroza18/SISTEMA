@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('catalogo_personal_evaluacion')}}">Catálogo de Evalución de Personal</a></li>
        <li class="active">
            Alta Catalogo Evalución de Personal
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Catálogo de Evalución de Personal <small>Alta</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Catálogo de Evalución de Personal <small>Alta</small></h4>
    </div>
        
    <div class="panel-body"> 
    <form id="form-alta-tiposservicio" action="{{ route('update_evaluacionPersonal_dos',['id'=>$IdPersonal])}}" method="POST">
        {{ csrf_field() }}
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                    <div class="note note-success">
                        <i class="fa fa-cubes fa-2x pull-left"></i>
                        <h4>{{$IdCliente}}</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                        <label>{{ Form::label ('Puesto', '* Puestos')}}</label>
                       <select class="form-control" name="cnPuesto" id="cnPuesto" onchange="" required>
                            @foreach($verPuesto as $verPuesto)
                                <option value="{{$verPuesto->IdPuestoCliente}}">{{$verPuesto->Descripcion}}</option>
                            @endforeach 
                        </select>
                    </div>

                    <div class="col-md-6">
                            <label>{{ Form::label ('TipoPuesto', '* Tipo de Puesto')}}</label>
                            <select class="form-control" name="cnTipoPuesto" id="cnTipoPuesto" onchange="" required>
                                    @foreach($verTipoPuesto as $verTipoPuesto)
                                        <option value="{{$verTipoPuesto->IdTipoPuesto}}">{{$verTipoPuesto->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div>

                     <div class="col-md-6">
                            <label>{{ Form::label ('Puesto', '* Departamento')}}</label>
                            <select class="form-control" name="cnDepartamento" id="cnDepartamento" onchange="" required>
                                    @foreach($verDepartamentos as $verDepartamentos)
                                        <option value="{{$verDepartamentos->IdDeptoCliente}}">{{$verDepartamentos->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 

                     <div class="col-md-6">
                            <label>{{ Form::label ('Puesto', '* Centro de Trabajo')}}</label>
                            <select class="form-control" name="cnCentroTrabajo" id="cnCentroTrabajo" onchange="" required>
                                    @foreach($verCentroTrabajo as $verCentroTrabajo)
                                        <option value="{{$verCentroTrabajo->IdCentro}}">{{$verCentroTrabajo->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 

                     <div class="col-md-6">
                            <label>{{ Form::label ('TipoContrato', '* Tipo Contrato')}}</label>
                            <select class="form-control" name="cnTipoContrato" id="cnTipoContrato" onchange="" required>
                                    @foreach($verTipoContrato as $verTipoContrato)
                                        <option value="{{$verTipoContrato->IdTipoContrato}}">{{$verTipoContrato->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 

                     <!-- DATOS GENERALES -->
                     <div class="col-md-6">
                            <label>{{ Form::label ('TipoDePersonal', '* Tipo de Personal')}}</label>
                            <select class="form-control" name="cnTipoPersonal" id="cnTipoPersonal" onchange="" required>
                                    @foreach($verTipoPersonal as $verTipoPersonal)
                                        <option value="{{$verTipoPersonal->IdTipoPersonal}}">{{$verTipoPersonal->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 

                     <div class="col-md-6">
                            <label>{{ Form::label ('TipoJornada', '* Tipo de Jornada')}}</label>
                            <select class="form-control" name="cnTipoJornada" id="cnTipoJornada" onchange="" required>
                                    @foreach($verTipoJornada as $verTipoJornada)
                                        <option value="{{$verTipoJornada->IdTipoJornada}}">{{$verTipoJornada->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 

                     <div class="col-md-6">
                            <label>{{ Form::label ('Antiguedad', '* Antiguedad')}}</label>
                            <select class="form-control" name="cnAntiguedad" id="cnAntiguedad" onchange="" required>
                                    @foreach($verAntiguedad as $verAntiguedad)
                                        <option value="{{$verAntiguedad->IdAntiguedad}}">{{$verAntiguedad->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 

                     <div class="col-md-6">
                            <label>{{ Form::label ('Experiencia', '* Experiencia')}}</label>
                            <select class="form-control" name="cnExperiencia" id="cnExperiencia" onchange="" required>
                                    @foreach($verExperiencia as $verExperiencia)
                                        <option value="{{$verExperiencia->IdExperiencia}}">{{$verExperiencia->Descripcion}}</option>
                                    @endforeach 
                            </select>
                     </div> 
                
                
                <div class="row"> 
                    <div class="col-md-3 col-md-offset-8 text-left">
                    <br><br>
                        <input type="submit" name="Guardar" value="Guardar Evalución Personal" class="btn btn-success btn-block">
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

@endsection
