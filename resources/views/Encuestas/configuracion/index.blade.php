@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="">Módulos</a></li>
        <li class="active">
            Encuestas Configuración
        </li>
    </li>
</ol>

<br>
    <hr>
<br>

<div class="row">

<div class="col-md-4 col-sm-6 ">
			        <div class="widget widget-stats bg-blue">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>
			            <div class="stats-title">Catálogo de Clientes</div>
                        <br><br>
                        @permission('catalogos.clientes')
                        <div class="stats-link">
							<a href="{{url('configuracionEncuestaClientes')}}">Ir al Catálogo de Clientes<i class="fa fa-arrow-circle-o-right"></i></a>

						</div>
                        @endpermission
			        </div>
			    </div>


<!-- EMPIEZA CATALOGO 1 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Encuestas</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_encuestass')}}">Ir a Encuestas <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 

<!-- TERMINA CATALOGO 1 -->

<!-- EMPIEZA CATALOGO 2 -->
<div class="col-md-4 col-sm-6 animacion-modulos">
    <div class="widget widget-stats bg-blue">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
        <div class="stats-title">Grupo de Preguntas</div>
        <br><br>
        <div class="stats-link">
            <a href="{{route('configuracion_grupo_de_encuestas')}}">Ir a Grupo de Preguntas <i class="fa fa-arrow-circle-o-right"></i></a>

    </div>
</div>
</div> 
<!-- TERMINA CATALOGO 2 -->

<!-- EMPIEZA CATALOGO 3 -->
<div class="col-md-4 col-sm-6 animacion-modulos">
    <div class="widget widget-stats bg-aqua">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
        <div class="stats-title">Fecha Encuesta</div>
        <br><br>
        <div class="stats-link">
            <a href="{{route('configuracion_fecha_encuesta')}}">Ir a Fecha Encuesta <i class="fa fa-arrow-circle-o-right"></i></a>

        </div>
    </div>
</div>
<!-- TERMINA CATALOGO 3 -->


<!-- EMPIEZA CATALOGO 4 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Grupo de Respuestas</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_grupo_de_respuestas')}}">Ir a Grupo de Respuestas <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 4 -->

<!-- EMPIEZA CATALOGO 5 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Respuestas</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_respuestas')}}">Ir a Respuestas <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 5 -->

<!-- EMPIEZA CATALOGO 6 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Valores de Respuestas</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_valores_de_respuestas')}}">Ir a Valores de Respuestas <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 6 -->

<!-- EMPIEZA CATALOGO 7 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Preguntas</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_preguntas')}}">Ir a Preguntas <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 7 -->

<!-- EMPIEZA CATALOGO 8 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Categorías</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_categoria_encuesta')}}">Ir a Categorías <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 8 -->

<!-- EMPIEZA CATALOGO 9 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Dominios</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_dominios')}}">Ir a Dominios <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 9 -->

<!-- EMPIEZA CATALOGO 10 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Dimensión</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_dimension')}}">Ir a Dimensión <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 10 -->

<!-- EMPIEZA CATALOGO 11 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Dimensión Pregunta</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_dimension_pregunta')}}">Ir a Dimensión Pregunta <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 11 -->

<!-- EMPIEZA CATALOGO 12 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Acciones</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_acciones')}}">Ir a Acciones <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 12 -->

<!-- EMPIEZA CATALOGO 13 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Correos</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_correos')}}">Ir a Correos <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div> 
<!-- TERMINA CATALOGO 13 -->

<!-- EMPIEZA CATALOGO 14 -->
    <div class="col-md-4 col-sm-6 animacion-modulos">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"> </i></div>
            <div class="stats-title">Información de ayuda</div>
            <br><br>
            <div class="stats-link">
                <a href="{{route('configuracion_informacion_de_ayuda')}}">Ir a Información de ayuda <i class="fa fa-arrow-circle-o-right"></i></a>

            </div>
        </div>
    </div>
<!-- TERMINA CATALOGO 14 --> 

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