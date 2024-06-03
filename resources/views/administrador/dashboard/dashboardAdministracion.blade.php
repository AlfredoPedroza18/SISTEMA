@extends('layouts.masterMenuView')



@section('section')



<!-- begin #content agenda -->





<div id="content" class="content">



    <!-- begin breadcrumb -->

    <ol class="breadcrumb ">


        <li>{{ link_to('home', $title = 'Módulos', $parameters = array(), $attributes = array()) }}</li>

        <li class="active">Administrador-Dashboard</li>


    </ol>

    <!-- end breadcrumb -->

    <!-- begin page-header -->

    <h1 class="page-header text-center">DASHBOARD<small></small></h1>

    <div class="row">

        <div class="col-md-2 col-sm-6"></div>
        <!--Columna numero 1-->
        <div class="col-md-3 col-sm-6">

            <div class="widget widget-stats bg-black">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

                <div class="stats-title">Usuarios Staff</div>

                <div class="stats-number">{{$users[0]->contador}}</div>

                <div class="stats-progress progress">

                    <div class="progress-bar" style="width: 76.9%;"></div>

                </div>

                <div class="stats-desc"> <label class="mes_actual stats-desc"></div>

            </div>

        </div>
        <!--temrino de la Columna numero 1-->

        <!--Columna numero 2-->
        <div class="col-md-3 col-sm-6">

            <div class="widget widget-stats bg-purple">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-building"></i></div>

                <div class="stats-title">Empresas</div>

                <div class="stats-number">{{$empresa[0]->contador}}</div>

                <div class="stats-progress progress">

                    <div class="progress-bar" style="width: 76.9%;"></div>

                </div>

                <div class="stats-desc"> <label class="mes_actual stats-desc"></div>

            </div>

        </div>
        <!--temrino de la columna numero 2-->


        <!--Columna numero 2-->
        <div class="col-md-3 col-sm-6">

            <div class="widget widget-stats" style="background-color: #A76AA4;">

                <div class="stats-icon stats-icon-lg"><i class="fa fa-building"></i></div>

                <div class="stats-title">Departamentos</div>

                <div class="stats-number">{{$centro_negocios[0]->contador}}</div>

                <div class="stats-progress progress">

                    <div class="progress-bar" style="width: 76.9%;"></div>

                </div>

                <div class="stats-desc"> <label class="mes_actual stats-desc"></div>

            </div>

        </div>
        <!--temrino de la columna numero 2-->

    </div>

    <div class="row">

    <div class="col-md-3 col-sm-6"></div>

    <div class="col-md-3 col-sm-6">

        <div class="widget widget-stats " style="background-color: #6A88A7;">

            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

            <div class="stats-title">Usuarios Cliente</div>

            <div class="stats-number">{{$users3[0]->contador}}</div>

            <div class="stats-progress progress">

                <div class="progress-bar" style="width: 76.9%;"></div>

            </div>

            <div class="stats-desc"> <label class="mes_actual stats-desc"></div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6">

        <div class="widget widget-stats " style="background-color: #548272;">

            <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-users"></i></div>

            <div class="stats-title">Usuarios Investigadores</div>

            <div class="stats-number">{{$users2[0]->contador}}</div>

            <div class="stats-progress progress">

                <div class="progress-bar" style="width: 76.9%;"></div>

            </div>

            <div class="stats-desc"> <label class="mes_actual stats-desc"></div>

        </div>

    </div>



</div>


</div>


<!-- end #content -->









@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')



{!! Html::script('assets/js/highcharts.js') !!}

{!! Html::script('assets/js/exporting.js') !!}