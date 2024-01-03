@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="">Módulos</a></li>
        <li class="active">
            Encuestas-Catálogos
        </li>
    </li>
</ol>

<br>
    <hr>
<br>

<div class="row">

<!-- EMPIEZA CATALOGO 1 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Servicios </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_servicios')}}">Ir al Catálogo de Servicios <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 

<!-- TERMINA CATALOGO 1 -->

<!-- EMPIEZA CATALOGO 2 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Centros de Trabajo </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_centros_de_trabajo')}}">Ir al Catálogo de Centros de Trabajo <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 2 -->

<!-- EMPIEZA CATALOGO 3 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Departamentos </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_departamentos')}}">Ir al Catálogo de Departamentos <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 3 -->

<!-- EMPIEZA CATALOGO 4 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Puestos </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_puestos')}}">Ir al Catálogo de Puestos <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 4 -->

<!-- EMPIEZA CATALOGO 5 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Personal </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_personal_evaluacion')}}">Ir al Catálogo de Personal <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 5 -->

<!-- EMPIEZA CATALOGO 6 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Estados Civiles </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_estados_civiles')}}">Ir al Catálogo de Estados Civiles <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 6 -->

<!-- EMPIEZA CATALOGO 7 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Nivel de Estudios </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_nivel_estudios')}}">Ir al Catálogo de Nivel de Estudios <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 7 -->

<!-- EMPIEZA CATALOGO 8 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Tipo de Puesto </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_tipo_puesto')}}">Ir al Catálogo de Tipo de Puesto <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 8 -->

<!-- EMPIEZA CATALOGO 9 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Antigüedad de Puesto </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_antiguedad_puesto')}}">Ir al Catálogo de Antigüedad de Puesto <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 9 -->

<!-- EMPIEZA CATALOGO 10 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Experiencia Laboral </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_experiencia_laboral')}}">Ir al Catálogo de Experiencia Laboral <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 10 -->

<!-- EMPIEZA CATALOGO 11 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Rango de Edades </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_rango_edades')}}">Ir al Catálogo de Rango de Edades <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 11 -->

<!-- EMPIEZA CATALOGO 12 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Tipo de Contrato </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_tipo_contrato')}}">Ir al Catálogo de Tipo de Contrato <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 12 -->

<!-- EMPIEZA CATALOGO 13 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Tipo de Personal </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_tipo_personal')}}">Ir al Catálogo de Tipo de Personal <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 13 -->

<!-- EMPIEZA CATALOGO 14 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Tipo de Jornada </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_tipo_jornada')}}">Ir al Catálogo de Tipo de Jornada <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 14 -->

<!-- EMPIEZA CATALOGO 15 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Políticas Clientes </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_politicas_clientes')}}">Ir al Catálogo de Políticas Clientes <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 15 -->

<!-- EMPIEZA CATALOGO 16 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Catálogo de Documentos </div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('catalogo_documentos')}}">Ir al Catálogo de Documentos <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 16 -->


<!-- EMPIEZA CATALOGO 17 -->
<div class="col-md-4 col-sm-6 animacion-modulos">
    <div class="widget widget-stats bg-aqua">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
        <div class="stats-title">Catálogo de Tipo de Quejas </div>
        <br><br>
        <div class="stats-link">
            <a href="{{ route('catalogo_quejas') }}">Ir al Catálogo de Tipo de Quejas <i class="fa fa-arrow-circle-o-right"></i></a>

        </div>
    </div>
</div> 
<!-- TERMINA CATALOGO 17 -->

<!-- EMPIEZA CATALOGO 18 -->
<div class="col-md-4 col-sm-6 animacion-modulos">
    <div class="widget widget-stats bg-aqua">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
        <div class="stats-title">Imagen de Fondo Encuesta</div>
        <br><br>
        <div class="stats-link">
            <a href="{{ route('catalogo_fondo') }}">Ir a Imagen de Fondo Encuesta <i class="fa fa-arrow-circle-o-right"></i></a>

        </div>
    </div>
</div> 
<!-- TERMINA CATALOGO 18 -->

</div>



</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">





</script>

@endsection