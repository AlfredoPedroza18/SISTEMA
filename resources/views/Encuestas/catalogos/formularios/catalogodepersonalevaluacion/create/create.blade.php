@extends('layouts.masterMenuView')

@section('section')



<div class="content">



<ol class="breadcrumb">

    <li><a href="{{route('catalogo_personal_evaluacion')}}">Catálogo de Personal</a></li>

        <li class="active">

            Alta Catalogo de Personal

        </li>

    </li>

</ol>



<h1 class="page-header text-center">Catálogo de Personal <small>Alta</small></h1>



<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

    <div class="panel-heading">

        <h4 class="panel-title">Catálogo de Personal <small>Alta</small></h4>

    </div>



    <div class="panel-body">

    <form id="form-alta-tiposservicio" action="{{route('store_evalucionPersoanl')}}" method="POST">

        {{ csrf_field() }}

        <div class="jumbotron">

            <div class="row">

                <div class="col-md-12">

                    <div class="note note-success">

                        <i class="fa fa-cubes fa-2x pull-left"></i>

                        <h4>Catálogo de Personal</h4>

                    </div>

                </div>

            </div>



            <div class="row">

                <div class="form-group col-md-4" id="CodCliente">

                    <label>{{ Form::label('Cliente', '* Cliente') }}</label>

                    {!! Form::select('id', $id, null, ['class'=>'form-control', 'id'=>'id','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

                    <input type="hidden"  id="IdCliente" name="IdCliente" value="{{ $IdCliente or '' }}">

                </div>



                <div class="form-group col-md-4" id="CodTipoEncuesta">

                    <label>{{ Form::label('TipoEncuesta', '* TipoEncuesta') }}</label>

                    {!! Form::select('IdEncuesta', $IdEncuesta, null, ['class'=>'form-control', 'id'=>'IdEncuesta','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}

                    <input type="hidden"  id="CodigoTipoEncuesta" name="CodigoTipoEncuesta" value="{{ $CodigoEstado or '' }}">

                </div>

                



                <div class="form-group col-md-4">

                    <label>{{ Form::label('CentroDeTrabajo', '* Centro de Trabajo') }}</label>

                    <select id="IdCentro" name="CentroDeTrabajo" class="form-control" type="text">

                    </select>

                </div>



                <div class="form-group col-md-4">

                    <label>{{ Form::label('Departamento', '* Departamento') }}</label>

                    <select id="IdDeptoCliente" name="CodigoDepartamento" class="form-control" type="text">

                    </select>

                </div>



                <div class="form-group col-md-4"  name="grupoNombre" id="grupoNombre">

                    <label>{{ Form::label ('nombre', '* Nombre')}}</label>

                    {{ Form::text('nombre','',['class' => 'form-control','id'=>'nombre','placeholder'=>'','data-parsley-group'=>'wizard-step-1'])}}

                 </div>



                <div class="form-group col-md-4" name="grupoGenero" id="grupoGenero">

                    <label>{{ Form::label ('genero', '* Genero')}}</label>

                    <select class="form-control" name="genero" id="genero">

                        <option value="">Seleccione un Genero</option>

                            @foreach($queryGenero as $genero)

                                <option value="{{$genero->IdGenere}}">{{$genero->DescripcionGenero}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoFechaNacimiento" id="grupoFechaNacimiento">

                    <label>{{ Form::label ('fecha', '* Fecha de Nacimiento')}}</label>

                    <input class="form-control" type="date" name="fecha" id="fecha">

                </div>



                <div class="form-group col-md-4" name="grupoEstadoCivil" id="grupoEstadoCivil">

                    <label>{{ Form::label ('estadoCivil', '* Estado Civil')}}</label>

                    <select class="form-control" name="estadoCivil" id="estadoCivil">

                        <option value="">Seleccione un Estado Civil</option>

                            @foreach($queryEstadoCivil as $estadoCivil)

                                <option value="{{$estadoCivil->IdEstadoCivil}}">{{$estadoCivil->DescripcionEstadoCivil}}</option>

                            @endforeach

                    </select>

                </div>

                

                <div class="form-group col-md-4">

                    <label>{{ Form::label('Puestos', '* Puestos') }}</label>

                    <select id="IdPuestoCliente" name="Puestos" class="form-control" type="text">

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoTipoPuesto" id="grupoTipoPuesto">

                    <label>{{ Form::label ('tipoPuesto', '* Tipo Puesto')}}</label>

                    <select class="form-control" name="tipoPuesto" id="tipoPuesto">

                        <option value="">Seleccione un Tipo de Puesto</option>

                            @foreach($queryTipoPuesto as $tipoPuesto)

                                <option value="{{$tipoPuesto->IdTipoPuesto}}">{{$tipoPuesto->DescripcionTipoPuesto}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoTipoContrato" id="grupoTipoContrato">

                    <label>{{ Form::label ('tipoContrato', '* Tipo Contrato')}}</label>

                    <select class="form-control" name="tipoContrato" id="tipoContrato">

                        <option value="">Seleccione un Tipo de Puesto</option>

                            @foreach($queryTipoContrato as $tipoContrato)

                                <option value="{{$tipoContrato->IdTipoContrato}}">{{$tipoContrato->DescripcionTipoContrato}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoTipoPersonal" id="grupoTipoPersonal">

                    <label>{{ Form::label ('tipoPersonal', '* Tipo de Personal')}}</label>

                    <select class="form-control" name="tipoPersonal" id="tipoPersonal">

                        <option value="">Seleccione un Tipo de Personal</option>

                            @foreach($queryTipoPersonal as $tipoPersonal)

                                <option value="{{$tipoPersonal->IdTipoPersonal}}">{{$tipoPersonal->DescripcionTipoPersonal}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoTipoJornada" id="grupoTipoJornada">

                    <label>{{ Form::label ('tipoJornada', '* Tipo de Jornada')}}</label>

                    <select class="form-control" name="tipoJornada" id="tipoJornada">

                        <option value="">Seleccione un Tipo de Personal</option>

                            @foreach($queryTipoJornada as $tipoJornada)

                                <option value="{{$tipoJornada->IdTipoJornada}}">{{$tipoJornada->DescripcionTipoJornada}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoAntiguedad" id="grupoAntiguedad">

                    <label>{{ Form::label ('antiguedad', '* Antigüedad')}}</label>

                    <select class="form-control" name="antiguedad" id="antiguedad">

                        <option value="">Seleccione un Tipo de Personal</option>

                            @foreach($queryAntiguedad as $antiguedad)

                                <option value="{{$antiguedad->IdAntiguedad}}">{{$antiguedad->DescripcionAntiguedad}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoExperiencia" id="grupoExperiencia">

                    <label>{{ Form::label ('experiencia', '* Experiencia')}}</label>

                    <select class="form-control" name="experiencia" id="experiencia">

                        <option value="">Seleccione Experiencia</option>

                            @foreach($queryExperiencia as $experiencia)

                                <option value="{{$experiencia->IdExperiencia}}">{{$experiencia->DescripcionExperiencia}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoNivelEstudios" id="grupoNivelEstudios">

                    <label>{{ Form::label ('nivelEstudios', '* Nivel de Estudios')}}</label>

                    <select class="form-control" name="nivelEstudios" id="nivelEstudios">

                        <option value="">Seleccione un Nivel de Estudios</option>

                            @foreach($queryNivelEstudio as $nivelEstudios)

                                <option value="{{$nivelEstudios->IdNivelEstudio}}">{{$nivelEstudios->DescripcionNivelEstudios}}</option>

                            @endforeach

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoRolaTurno" id="grupoRolaTurno">

                    <label>{{ Form::label ('rolaTurno', '* Rola Turno')}}</label>

                    <select class="form-control" name="rolaTurno" id="rolaTurno" onchange="">

                        <option value="Si">Si</option>

                        <option value="No">No</option>

                    </select>

                </div>



                <div class="form-group col-md-4" name="grupoCorreo" id="grupoCorreo">

                    <label>{{ Form::label ('correo', '* Correo')}}</label>

                    {{ Form::text('correo','',['class' => 'form-control','id'=>'correo','placeholder'=>'','data-parsley-group'=>'wizard-step-1'])}}

                 </div>

                

                <div class="form-group col-md-4" name="grupoTelefono" id="grupoTelefono">

                    <label>{{ Form::label ('telefono', '* Telefono')}}</label>

                    {{ Form::text('telefono','',['class' => 'form-control phone_with_ddd','id'=>'telefono','placeholder'=>'','data-parsley-group'=>'wizard-step-1'])}}

                </div>

            </div>



            <input type="hidden" name="nombre3" id="nombre3" value="">



            <input type="hidden" name="txtAnonimo" id="txtAnonimo" value="">



            <div class="form-group col-md-4">

                    <select style="visibility:hidden" id="anonimo" name="anonimo" class="form-control" type="text">

                    </select>

                </div>



            <div class="row">

                    <div class="col-md-3 col-md-offset-8 text-left">

                    <br><br>

                        <input type="submit" name="Guardar" value="Guardar Personal" class="btn btn-success btn-block">

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



    });



    $('#CodCliente').change(function() {

        var datos = $("#id").val();

        $.ajax({

            url: '{{ url('ValidacionesDepartamentos') }}',

            type:'GET',

            data: {datos:datos},

            success: function(response){

                $("#IdDeptoCliente").html(response[0]);

                console.log(datos);

                $("#nombre3").val(datos);

            }

        });

    });



    $('#CodCliente').change(function() {

        var datos = $("#id").val();

        $.ajax({

            url: '{{ url('ValidacionesCentroTrabajo') }}',

            type:'GET',

            data: {datos:datos},

            success: function(response){

                $("#IdCentro").html(response[0]);

            }

        });

    });



    $('#CodCliente').change(function() {

        var datos = $("#id").val();

        $.ajax({

            url: '{{ url('ValidacionesPuestos') }}',

            type:'GET',

            data: {datos:datos},

            success: function(response){

                $("#IdPuestoCliente").html(response[0]);

            }

        });

    });



    $('#CodTipoEncuesta').change(function() {

        var encuestas = $("#IdEncuesta").val();

        console.log($("#IdEncuesta").val());

        $.ajax({

            url: '{{ url('ValidacionAnonima') }}',

            type:'GET',

            data: {encuestas:encuestas},

            success: function(response){

                $("#anonimo").html(response[0]);

                console.log($("#anonimo option:selected").text());

                

                $("#txtAnonimo").val($("#anonimo option:selected").text());

                

                if ($("#anonimo option:selected").text()=="Si") {

                    console.log("Entro a la condición");



                    //Ocultando Elementos

                    $("#grupoNombre").hide();

                    $("#grupoFechaNacimiento").hide();

                    $("#grupoGenero").hide();

                    $("#grupoEstadoCivil").hide();

                    $("#grupoTipoPuesto").hide();

                    $("#grupoTipoContrato").hide();

                    $("#grupoTipoPersonal").hide();

                    $("#grupoTipoJornada").hide();

                    $("#grupoAntiguedad").hide();

                    $("#grupoExperiencia").hide();

                    $("#grupoNivelEstudios").hide();

                    

                    $("#grupoRolaTurno").hide();

                    $("#grupoCorreo").show();

                    $("#grupoTelefono").show();

                    

                    



                }else{



                    //Mostrando Elementos

                    $("#grupoFechaNacimiento").show();

                    $("#grupoEstadoCivil").show();

                    $("#grupoTipoPuesto").show();

                    $("#grupoTipoContrato").show();

                    $("#grupoTipoPersonal").show();

                    $("#grupoTipoJornada").show();

                    $("#grupoAntiguedad").show();

                    $("#grupoExperiencia").show();

                    $("#grupoNivelEstudios").show();

                    $("#grupoRolaTurno").show();

                    $("#grupoGenero").show();

                    $("#grupoNombre").show();

                    //OCULTAMOS

                    $("#grupoCorreo").hide();

                    $("#grupoTelefono").hide();

                }



            }

        });

    });





</script>

@endsection

