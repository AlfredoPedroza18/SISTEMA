@extends('layouts.masterMenuView')
@section('section')

<div class="content">

<ol class="breadcrumb">
    <li><a href="{{route('catalogo_personal_evaluacion')}}">Catálogo de Personal</a></li>
        <li class="active">
            Edición de Personal
        </li>
    </li>
</ol>

<h1 class="page-header text-center">Catálogo de Personal <small>Edición</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Catálogo de Personal <small>Edición</small></h4>
    </div>
        
    <div class="panel-body">
            <form id="form-alta-tiposservicio" action="{{ route('update_evaluacionPersonal',['id'=>$IdPersonal])}}" method="POST">
                {{ csrf_field() }}
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <i class="fa fa-cubes fa-2x pull-left"></i>
                                <h4>Personal</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="cntC" name="cntC" value="{{$IdCliente}}">
                            <label>Cliente: {{$Cliente}}</label>
                            <br>
                            <br>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('CentroTrabajo', '* Centro de trabajo')}}</label>
                            <select class="form-control" name="cnCentroTrabajo" id="cnCentroTrabajo" onchange="" required>
                                    <option value="{{$IdCentroTrabajo}}">{{$DescripcionCentroTrabajoOriginal}}</option>
                                    @foreach($queryCentroNegocios as $lista)
                                        @if($lista->DescripcionCentroTrabajo <> $DescripcionCentroTrabajoOriginal)
                                        <option value="{{$lista->IdCentro}}">{{$lista->DescripcionCentroTrabajo}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('Departamento', '* Departamento')}}</label>
                            <select class="form-control" name="cnDepartamento" id="cnDepartamento" onchange="" required>
                                    <option value="{{$IdDeptoCliente}}">{{$DescripcionDepartamentoOriginal}}</option>
                                    @foreach($queryDepartamentos as $lista)
                                        @if($lista->DescripcionDepartamento <> $DescripcionDepartamentoOriginal)
                                        <option value="{{$lista->IdDeptoCliente}}">{{$lista->DescripcionDepartamento}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('nombre', '* Nombre')}}</label>
                            {{ Form::text('Nombre',$Nombre,['class' => 'form-control','id'=>'Nombre','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('Genero', '* Genero')}}</label>
                            <select class="form-control" name="Genero" id="Genero" onchange="" required>
                                    <option value="{{$IdGenero}}">{{$DescripcionGeneroOriginal}}</option>
                                    @foreach($queryGenero as $lista)
                                        @if($lista->DescripcionGenero <> $DescripcionGeneroOriginal)
                                        <option value="{{$lista->IdGenere}}">{{$lista->DescripcionGenero}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('fecha', '* Fecha Nacimiento')}}</label>
                            <input class="form-control" type="date" name="fecha" id="fecha" value="{{$FechaNacimiento}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('EstadoCivil', '* Estado Civil')}}</label>
                            <select class="form-control" name="cnEstadoCivil" id="cnEstadoCivil" onchange="" required>
                                    <option value="{{$IdEstadoCivil}}">{{$DescripcionEstadoCivilDos}}</option>
                                    @foreach($queryEstadoCivil as $lista)
                                        @if($lista->DescripcionEstadoCivil <> $DescripcionEstadoCivilDos)
                                        <option value="{{$lista->IdEstadoCivil}}">{{$lista->DescripcionEstadoCivil}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('Puesto', '* Puesto')}}</label>
                            <select class="form-control" name="cnPuesto" id="cnPuesto" onchange="" required>
                                    <option value="{{$IdPuestoCliente}}">{{$DescripcionPuestoOriginal}}</option>
                                    @foreach($queryPuestos as $lista)
                                        @if($lista->DescripcionPuesto <> $DescripcionPuestoOriginal)
                                        <option value="{{$lista->IdPuestoCliente}}">{{$lista->DescripcionPuesto}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('TipoContrato', '* Tipo Contrato')}}</label>
                            <select class="form-control" name="cnTipoContrato" id="cnTipoContrato" onchange="" required>
                                    <option value="{{$IdTipoContrato}}">{{$DescripcionTipoContratOriginal}}</option>
                                    @foreach($queryTipoContrato as $lista)
                                        @if($lista->DescripcionTipoContrato <> $DescripcionTipoContratOriginal)
                                        <option value="{{$lista->IdTipoContrato}}">{{$lista->DescripcionTipoContrato}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('TipoPersonal', '* Tipo Personal')}}</label>
                            <select class="form-control" name="cnTipoPersonal" id="cnTipoPersonal" onchange="" required>
                                    <option value="{{$IdTipoPersonal}}">{{$DescripcionTipoPersonalOriginal}}</option>
                                    @foreach($queryTipoPersonal as $lista)
                                        @if($lista->DescripcionTipoPersonal <> $DescripcionTipoPersonalOriginal)
                                        <option value="{{$lista->IdTipoPersonal}}">{{$lista->DescripcionTipoPersonal}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('TipoJornada', '* Tipo de Jornada')}}</label>
                            <select class="form-control" name="cnTipoJornada" id="cnTipoJornada" onchange="" required>
                                    <option value="{{$IdTipoJornada}}">{{$DescripcionTipoJornadaOriginal}}</option>
                                    @foreach($queryTipoJornada as $lista)
                                        @if($lista->DescripcionTipoJornada <> $DescripcionTipoJornadaOriginal)
                                        <option value="{{$lista->IdTipoJornada}}">{{$lista->DescripcionTipoJornada}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('Antiguedad', '* Antigüedad')}}</label>
                            <select class="form-control" name="cnAntiguedad" id="cnAntiguedad" onchange="" required>
                                    <option value="{{$IdAntiguedad}}">{{$DescripcionAntiguedadOriginal}}</option>
                                    @foreach($queryAntiguedad as $lista)
                                        @if($lista->DescripcionAntiguedad <> $DescripcionAntiguedadOriginal)
                                        <option value="{{$lista->IdAntiguedad}}">{{$lista->DescripcionAntiguedad}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('Experiencia', '* Experiencia')}}</label>
                            <select class="form-control" name="cnExperiencia" id="cnExperiencia" onchange="" required>
                                    <option value="{{$IdExperiencia}}">{{$DescripcionExperienciaOriginal}}</option>
                                    @foreach($queryExperiencia as $lista)
                                        @if($lista->DescripcionExperiencia <> $DescripcionExperienciaOriginal)
                                        <option value="{{$lista->IdExperiencia}}">{{$lista->DescripcionExperiencia}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('Puesto', '* Nivel de Estudios')}}</label>
                            <select class="form-control" name="cnNivelEstudio" id="cnNivelEstudio" onchange="" required>
                                    <option value="{{$IdNivelEstudio}}">{{$DescripcionNivelEstudiosOriginal}}</option>
                                    @foreach($queryNivelEstudio as $lista)
                                        @if($lista->DescripcionNivelEstudios <> $DescripcionNivelEstudiosOriginal)
                                        <option value="{{$lista->IdNivelEstudio}}">{{$lista->DescripcionNivelEstudios}}</option>
                                        @else
                                        @endif
                                    @endforeach 
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ Form::label ('rolaTurno', '* Rola Turno')}}</label>
                            <select class="form-control" name="cnRolaTurno" id="cnRolaTurno" onchange="" required>
                                <option value="{{$RolaTurno}}">{{$RolaTurno}}</option>
                                @if($RolaTurno == 'Si')
                                <option value="No">No</option>
                                @else
                                <option value="Si">Si</option>
                                @endif
                            </select>
                        </div>

                        
                        <input type="hidden" name="txtbanderaDescripcionAnonina" id="txtbanderaDescripcionAnonina" value="{{$banderaDescripcionAnonina}}">


                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8 text-left">
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
