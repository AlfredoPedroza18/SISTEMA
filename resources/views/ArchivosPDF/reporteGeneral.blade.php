<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @page {
            margin: 2cm 2cm 1cm 2cm;
            font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;   
        }

        p{
            font-size: 13.6px;
        }

        .encabezado img{
            width: 60px;
            height:40px;
            margin-right: 5px;
        }

        .hoja-de-presentacion{
            margin-left:-2cm;
            margin-top:-2cm;
            margin-right:-2cm;
            margin-bottom: -2cm;
            height: 100% + 4cm;
            width: 100% + 4cm;
        }
        .hoja-lado-izquierdo {
            background-color: #3A3838;
            padding-top:5.65cm;
            padding-bottom:0.45cm;
            height: 22.6cm;
            width: 50%;
            font-size:32px;
            color: white;
        }
        .hoja-lado-derecho {
            margin-top: -28.7cm;
            margin-left: 50%;
            width: 50%;
            height: 22.6cm;
            padding-top:3.65cm;
            padding-bottom:0.45cm;
        }

        .p-estilos{
            margin-left: 5px;
            margin-right: 5px;
            text-align: justify;
            font-size: 16.5px;
        }

        .head_p{
            font-size: 20px;
            font-weight: bold;
            color: rgb(1, 80, 1);
            margin: 0;
        }

        .head_p_r{
            font-size: 20px;
            font-weight: bold;
            color:red; 
            margin:0;
        }

        .td_entorno{
            font-size: 15px;
            /* padding: 10px; */
        }

        
        .resultado{
            background-color: rgb(235, 235, 235);
            padding: 4px;
        }
        
    </style>

    <title>Reporte Final PDF</title>
</head>
<body>
    <div class="hoja-de-presentacion">
        <div class="hoja-lado-izquierdo">
            <p style="margin-left:2cm; margin-right:2cm;font-size: 30px;">Implementación de la <strong>NOM035</strong></p>
            <p style="margin-left:5cm; margin-right:1cm; margin-top:12cm; font-size: 25px;">{{$mes}} {{$anio}}</p>
        </div>
        <div class="hoja-lado-derecho">
            <img class="header-img" src="data:image/png;base64,{{$img}}" alt="logo"
                style="width:70%; margin-left:15%;">
            <p style="margin-left:.5cm; margin-right:.5cm; margin-top:12.2cm; font-size:15.5px">El presente reporte fue elaborado por la
                empresa Gen-T para la Empresa <strong>{{$cliente}}</strong></p>
        </div>
    </div>
    <br><br><br><br><br>

    <div>
        <p
        class="p-estilos" style="font-style: italic;">
        <strong>"Cuestionario para identificar a los trabajadores que fueron sujetos a acontecimientos traumáticos
        severos"</strong></p>
        <p class="p-estilos">El presente reporte muestra los resultados de la implementación de la NOM035, Como primer dato se 
            muestran los resultados de la encuesta <strong>guia1 “Cuestionario para identificar a los trabajadores que fueron 
            sujetos a acontecimientos traumáticos severos”</strong> realizada a todo el personal de la Empresa {{$cliente}} @if($numCentros > 1) en los <strong>{{$numCentros}} 
            Centros de Trabajo</strong>. @else en el centro de Trabajo. @endif
        </p>
        <p class="p-estilos">Se presentaron los siguientes resultados: </p>
        <p class="p-estilos">
            De un total de <strong>{{$requiere + $norequiere}}</strong> personas que contestaron la encuesta, solo el <strong>{{ round(((100/($requiere + $norequiere))*$requiere),2) }}%</strong> indican que requieren valoración, y/o atención clinica ya
            que, muestra indicios de haber sufrido algún acontecimiento traumático severo. Estas son <strong>{{$requiere}}</strong> personas que deberan ser canalizadas 
            con un especialista.
        </p>
    </div>
    <br><br>
    
    <img style=" margin-left: 20px;" src="data:image/jpeg;base64,{{$variable}}" />
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <p class="p-estilos">Repartidos por centros de trabajo de la siguiente manera</p>

    <img style=" margin-left: 20px;" src="data:image/jpeg;base64,{{$variable2}}" />

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <p class="p-estilos">En un reporte anexo se comparten los nombres y reportes individuales de las {{$requiere + $norequiere}} Personas</p>

    <br><br>

    <p class="p-estilos">Identificación y análisis de los factores de riesgo psicosocial, y evaluación del entorno organizacional</p>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <table style="width: 100%;">
        <td style="text-align: center;">
            <div style="width:100%">
                <div style="width:80px; height:50px; background-color:#fff; display: inline-block;border-radius:15%; border:1px solid black"><span style="color:#000;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:15px"><p style="margin-top: 15px; font-size:15px; font-weight:bold">{{$cantPersonal}}</p></span></div>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/acceso/img/encuestas.png'))) }}" width="140">
                <strong><p class="p-estilos" style="margin: 0; margin-left:100px">Encuestas</p></strong>
            </div>
        </td>
        <td style="text-align: center;">
            <div style="width:100%">
                <div style="width:80px; height:50px; background-color:#fff; display: inline-block;border-radius:15%; border:1px solid black"><span style="color:#000;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:15px"><p style="margin-top: 15px; font-size:15px; font-weight:bold">{{$numCentros}}</p></span></div>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/acceso/img/centros2.png'))) }}" width="90">
                <strong><p class="p-estilos" style="margin: 3px 0 0 100px">Centros de Trabajo</p></strong>
            </div>
        </td>
    </table>

    <br>
    <br>
    <br>
    <br>

    <p class="p-estilos">Calificación general de Toda la organización incluyendo los {{$numCentros}} Centros de Trabajo</p>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>


     <table style="width: 100%;">
        <td style="text-align: center;">
            <div style="width:80%;">
                <div style="width:80px; height:80px; background-color:#fff; display: inline-block;border-radius:50%; border:1px solid black;"><span style="color:#000;width:100%;height:100%;font-size:15px"><p style="margin-top: 30px; font-size:20px; font-weight:bold">{{number_format($calificacionFinal, 2)}}</p></span></div>
                <strong><p class="p-estilos" style="margin: 0; margin-left:80px;">Calificación</p></strong>
            </div>
        </td>
        <td style="text-align: start; width:50%">
            <div style="color: black; background-color:rgb(255, 255, 255); padding:1rem 3rem 1rem 3rem; border-radius:5px; width:40%; margin-top:15px">
                @if ($calificacionFinal < 50)
                    <p style="font-size: 17px; font-weight:bold; display:inline-block; margin:0; height:23px;">Nulo</p>
                @endif
                @if ($calificacionFinal >= 50 && $calificacionFinal < 75)
                    <p style="font-size: 17px; font-weight:bold; display:inline-block; margin:0; height:23px;">Bajo</p>
                @endif
                @if ($calificacionFinal >= 75 && $calificacionFinal < 99)
                    <p style="font-size: 17px; font-weight:bold; display:inline-block; margin:0; height:23px;">Medio</p>
                @endif
                @if ($calificacionFinal >= 99 && $calificacionFinal < 140)
                    <p style="font-size: 17px; font-weight:bold; display:inline-block; margin:0; height:23px;">Alto</p>
                @endif
                @if ($calificacionFinal >= 140)
                    <p style="font-size: 17px; font-weight:bold; display:inline-block; margin:0; height:23px;">Muy alto</p>
                @endif

                @if ($calificacionFinal < 50)
                    <div style="width: 30px; height:30px; border-radius:50%; background-color:#58AADF; display:inline-block; margin-top:20px"></div>
                @endif
                @if ($calificacionFinal >= 50 && $calificacionFinal < 75)
                    <div style="width: 30px; height:30px; border-radius:50%; background-color:#9ABE13; display:inline-block; margin-top:20px"></div>
                @endif
                @if ($calificacionFinal >= 75 && $calificacionFinal < 99)
                    <div style="width: 30px; height:30px; border-radius:50%; background-color:#FAEB29; display:inline-block; margin-top:20px"></div>
                @endif
                @if ($calificacionFinal >= 99 && $calificacionFinal < 140)
                    <div style="width: 30px; height:30px; border-radius:50%; background-color:#F19602; display:inline-block; margin-top:20px"></div>
                @endif
                @if ($calificacionFinal >= 140)
                    <div style="width: 30px; height:30px; border-radius:50%; background-color:#F60000; display:inline-block; margin-top:20px"></div>
                @endif
                {{-- <div style="width: 30px; height:30px; border-radius:50%; background-color: rgb(87, 168, 209); display:inline-block; margin-top:20px"></div> --}}
            </div>
        </td>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <p class="p-estilos">A continuación presentamos los resultados por cada uno de los diferentes centros de trabajo</p>

    <br>
    <br>
    <br>
    @php
        $contador = 0;
    @endphp
    @foreach ($centros as $rowCentro)
        <div class="encabezado">
            {{-- <img src="{{asset('assets/acceso/img/nube.png')}}" width="90"> --}}
            {{-- <img src="{{URL::asset('assets/acceso/img/nube.png')}}" width="90"> --}}
            {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/acceso/img/nube.png'))) }}" width="90"> --}}
            <img src="data:image/jpg;base64,{{$img}}" alt="">
        </div>

        <div class="datosempresa">
            <div style="">
                <p style="float:left; padding:4px 4px 4px 0; width: 10%; margin-right:15px; background-color:white; margin-bottom:0">Empresa:</p>
                <p class="resultado" style="width:100%; text-align:center; margin-bottom:0">{{$cliente}}</p>
            </div>
            <div>
                <p style="float:left; padding:0 4px 0 0; width: 10%; margin-right:15px; background-color:white; clear: left; margin-bottom:0">Centro de Trabajo:</p>
                <p class="resultado" style="width:100%; text-align:center; margin-bottom:0; margin-top:14px">{{$rowCentro->Descripcion}}</p>
            </div>
        </div>

        <main>
            <p style="color: rgb(30, 104, 133);">Calificación obtenida por todas las encuestas terminadas</p>

            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-top:2px solid black; border-bottom:2px solid black;">
                        <th class="bg-black" style="width:8%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Participantes</p></th>
                        <th class="bg-black" style="width:14%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0;">Calificación</p></th>
                        <th class="bg-black" style="width:23%; color: rgb(0, 0, 0);" colspan="2"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Resultado</p></th>
                        <th class="bg-black" style="width:60%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0;">Necesidad de Acción</p></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color: rgb(0, 0, 0); padding:5px; text-align:center;">
                            <p style="">{{$rowCentro->CantidadCentro}}</p>
                        </td>
                        <td style="color: rgb(0, 0, 0); padding:5px; text-align:center;">
                            <p style="">{{number_format($calificacion[$contador], 2)}}</p>
                        </td>
                        <td style="color: rgb(0, 0, 0); padding:5px;">
                            @if ($calificacion[$contador] < 50)
                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                            @endif
                            @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                            @endif
                            @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                            @endif
                            @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                            @endif
                            @if ($calificacion[$contador] >= 140)
                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                            @endif
                        </td>
                        <td style="color: rgb(0, 0, 0); padding:5px;">
                            @if ($calificacion[$contador] < 50)
                                <p style="margin: 0">Nulo</p>
                            @endif
                            @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                                <p style="margin: 0">Bajo</p>
                            @endif
                            @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                                <p style="margin: 0">Medio</p>
                            @endif
                            @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                                <p style="margin: 0">Alto</p>
                            @endif
                            @if ($calificacion[$contador] >= 140)
                                <p style="margin: 0">Muy alto</p>
                            @endif
                        </td>
                        <td style="color: rgb(0, 0, 0); height:13.8%">
                            @if ($calificacion[$contador] < 50)
                                <p style="text-align: justify">El riesgo resulta despreciable por lo que no se requiere medidas adicionales.</p>
                            @endif
                            @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                                <p style="text-align: justify">Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.</p>
                            @endif
                            @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                                <p style="text-align: justify">Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.
                                </p>
                            @endif
                            @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                                <p style="text-align: justify;margin:0;padding:3px 0;">Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                </p>
                            @endif
                            @if ($calificacion[$contador] >= 140)
                                <p style="text-align: justify;margin:0;padding:3px 0;">Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                </p>
                            @endif
                    </tr>
                </tbody>
            </table>

            <div class="contenido-central">

                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-top:2px solid black; border-bottom:2px solid black;">
                            <th class="bg-black" style="width:50%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Categoria</p></th>
                            <th class="bg-black" style="width:15%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Calificación</p></th>
                            <th class="bg-black" style="width:35%; color: rgb(0, 0, 0);" colspan="2"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Resultado</p></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="color: rgb(0, 0, 0);padding:5px">
                                @foreach ($categoria as $row)
                                    <p style="background-color:rgb(229, 227, 227); padding:2px;">{{$row->Descripcion}}</p>
                                @endforeach
                            </td>
                            <td style="text-align:center; color: rgb(0, 0, 0);">
                                @php
                                    $contadorCategoria = 0;
                                @endphp
                                @foreach ($totalCategoria as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                        <p style="background-color:rgb(229, 227, 227); padding:2px;">{{number_format($riesgocategoria[$contadorCategoria],2)}}</p>
                                    @endif
                                    @php
                                        $contadorCategoria++;
                                    @endphp
                                @endforeach
                            </td>
                            <td style="text-align:center; color: rgb(0, 0, 0); padding-left:5px; width:5%;">
                                @php
                                    $contadorCategoria = 0;
                                @endphp
                                @foreach ($totalCategoria as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                        @if ($row->IdCategoria == 13)
                                            @if ($riesgocategoria[$contadorCategoria] < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 9)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 9 && $riesgocategoria[$contadorCategoria] < 11)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 11 && $riesgocategoria[$contadorCategoria] < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 14)
                                            @if ($riesgocategoria[$contadorCategoria] < 15)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 15 && $riesgocategoria[$contadorCategoria] < 30)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 30 && $riesgocategoria[$contadorCategoria] < 45)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 45 && $riesgocategoria[$contadorCategoria] < 60)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 60)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 15)
                                            @if ($riesgocategoria[$contadorCategoria] < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 7 && $riesgocategoria[$contadorCategoria] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 13)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 13)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 16)
                                            @if ($riesgocategoria[$contadorCategoria] < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 29)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 29 && $riesgocategoria[$contadorCategoria] < 42)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 42 && $riesgocategoria[$contadorCategoria] < 58)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 58)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 17)
                                            @if ($riesgocategoria[$contadorCategoria] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 18)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 18 && $riesgocategoria[$contadorCategoria] < 23)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 23)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:4.5px"></p>
                                            @endif
                                        @endif

                                    @endif
                                    @php
                                        $contadorCategoria++;
                                    @endphp
                                @endforeach
                            </td>
                            <td style="color: rgb(0, 0, 0); padding:5px; text-align:center">
                                @php
                                    $contadorCategoria = 0;
                                @endphp
                                @foreach ($totalCategoria as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                        @if ($row->IdCategoria == 13)
                                            @if ($riesgocategoria[$contadorCategoria] < 5)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 9)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 9 && $riesgocategoria[$contadorCategoria] < 11)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 11 && $riesgocategoria[$contadorCategoria] < 14)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 14)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 14)
                                            @if ($riesgocategoria[$contadorCategoria] < 15)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 15 && $riesgocategoria[$contadorCategoria] < 30)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 30 && $riesgocategoria[$contadorCategoria] < 45)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 45 && $riesgocategoria[$contadorCategoria] < 60)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 60)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Muy Alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 15)
                                            @if ($riesgocategoria[$contadorCategoria] < 5)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 7)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 7 && $riesgocategoria[$contadorCategoria] < 10)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 13)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 13)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Muy Alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 16)
                                            @if ($riesgocategoria[$contadorCategoria] < 14)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 29)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 29 && $riesgocategoria[$contadorCategoria] < 42)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 42 && $riesgocategoria[$contadorCategoria] < 58)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 58)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdCategoria == 17)
                                            @if ($riesgocategoria[$contadorCategoria] < 10)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 14)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 18)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 18 && $riesgocategoria[$contadorCategoria] < 23)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgocategoria[$contadorCategoria] >= 23)
                                                <p style="background-color:rgb(229, 227, 227); padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                    @endif
                                    @php
                                        $contadorCategoria++;
                                    @endphp
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

                
                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-top:2px solid black; border-bottom:2px solid black;">
                            <th class="bg-black" style="width:50%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Dominio</p></th>
                            <th class="bg-black" style="width:15%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Calificación</p></th>
                            <th class="bg-black" style="width:35%; color: rgb(0, 0, 0);" colspan="2"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Resultado</p></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="color: rgb(0, 0, 0); padding:5px;">
                                @foreach ($dominio as $row)
                                <p style="background-color:rgb(229, 227, 227);padding:2px;">{{$row->Descripcion}}</p>
                                @endforeach
                            </td>
                            <td style="text-align:center; color: rgb(0, 0, 0);">
                                @php
                                    $contadorDominio = 0;
                                @endphp
                                @foreach ($totalDominio as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">{{number_format($riesgodominio[$contadorDominio],2)}}</p>
                                    @endif
                                    @php
                                        $contadorDominio++;
                                    @endphp
                                @endforeach
                            </td>
                            <td style="text-align:center; color: rgb(0, 0, 0); padding:5px; width:5%;">
                                @php
                                    $contadorDominio = 0;
                                @endphp
                                @foreach ($totalDominio as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                        @if ($row->IdDominio == 39)
                                            @if ($riesgodominio[$contadorDominio] < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 5 && $riesgodominio[$contadorDominio] < 9)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 9 && $riesgodominio[$contadorDominio] < 11)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 11 && $riesgodominio[$contadorDominio] < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 40)
                                            @if ($riesgodominio[$contadorDominio] < 15)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 15 && $riesgodominio[$contadorDominio] < 21)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 21 && $riesgodominio[$contadorDominio] < 27)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 27 && $riesgodominio[$contadorDominio] < 37)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 37)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 41)
                                            @if ($riesgodominio[$contadorDominio] < 11)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 11 && $riesgodominio[$contadorDominio] < 16)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 16 && $riesgodominio[$contadorDominio] < 21)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 21 && $riesgodominio[$contadorDominio] < 25)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 25)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 42)
                                            @if ($riesgodominio[$contadorDominio] < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 1 && $riesgodominio[$contadorDominio] < 2)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 2 && $riesgodominio[$contadorDominio] < 4)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 4 && $riesgodominio[$contadorDominio] < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 43)
                                            @if ($riesgodominio[$contadorDominio] < 4)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 4 && $riesgodominio[$contadorDominio] < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6 && $riesgodominio[$contadorDominio] < 8)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 8 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 44)
                                            @if ($riesgodominio[$contadorDominio] < 9)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 9 && $riesgodominio[$contadorDominio] < 12)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 12 && $riesgodominio[$contadorDominio] < 16)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 16 && $riesgodominio[$contadorDominio] < 20)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 20)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 45)
                                            @if ($riesgodominio[$contadorDominio] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10 && $riesgodominio[$contadorDominio] < 13)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 13 && $riesgodominio[$contadorDominio] < 17)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 17 && $riesgodominio[$contadorDominio] < 21)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 21)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 46)
                                            @if ($riesgodominio[$contadorDominio] < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 7 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10 && $riesgodominio[$contadorDominio] < 13)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 13 && $riesgodominio[$contadorDominio] < 16)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 16)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 47)
                                            @if ($riesgodominio[$contadorDominio] < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10 && $riesgodominio[$contadorDominio] < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 14 && $riesgodominio[$contadorDominio] < 18)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 18)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 48)
                                            @if ($riesgodominio[$contadorDominio] < 4)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 4 && $riesgodominio[$contadorDominio] < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6 && $riesgodominio[$contadorDominio] < 8)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 8 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                            @endif
                                        @endif

                                    @endif
                                    @php
                                        $contadorDominio++;
                                    @endphp
                                @endforeach
                            </td>
                            <td style="color: rgb(0, 0, 0); padding:5px; text-align:center">
                                @php
                                    $contadorDominio = 0;
                                @endphp
                                @foreach ($totalDominio as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                        @if ($row->IdDominio == 39)
                                            @if ($riesgodominio[$contadorDominio] < 5)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 5 && $riesgodominio[$contadorDominio] < 9)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 9 && $riesgodominio[$contadorDominio] < 11)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 11 && $riesgodominio[$contadorDominio] < 14)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 14)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 40)
                                            @if ($riesgodominio[$contadorDominio] < 15)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 15 && $riesgodominio[$contadorDominio] < 21)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 21 && $riesgodominio[$contadorDominio] < 27)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 27 && $riesgodominio[$contadorDominio] < 37)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 37)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 41)
                                            @if ($riesgodominio[$contadorDominio] < 11)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 11 && $riesgodominio[$contadorDominio] < 16)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 16 && $riesgodominio[$contadorDominio] < 21)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 21 && $riesgodominio[$contadorDominio] < 25)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 25)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 42)
                                            @if ($riesgodominio[$contadorDominio] < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 1 && $riesgodominio[$contadorDominio] < 2)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 2 && $riesgodominio[$contadorDominio] < 4)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 4 && $riesgodominio[$contadorDominio] < 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 43)
                                            @if ($riesgodominio[$contadorDominio] < 4)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 4 && $riesgodominio[$contadorDominio] < 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6 && $riesgodominio[$contadorDominio] < 8)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 8 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 44)
                                            @if ($riesgodominio[$contadorDominio] < 9)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 9 && $riesgodominio[$contadorDominio] < 12)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 12 && $riesgodominio[$contadorDominio] < 16)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 16 && $riesgodominio[$contadorDominio] < 20)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 20)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 45)
                                            @if ($riesgodominio[$contadorDominio] < 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10 && $riesgodominio[$contadorDominio] < 13)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 13 && $riesgodominio[$contadorDominio] < 17)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 17 && $riesgodominio[$contadorDominio] < 21)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 21)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 46)
                                            @if ($riesgodominio[$contadorDominio] < 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 7 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10 && $riesgodominio[$contadorDominio] < 13)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 13 && $riesgodominio[$contadorDominio] < 16)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 16)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 47)
                                            @if ($riesgodominio[$contadorDominio] < 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10 && $riesgodominio[$contadorDominio] < 14)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 14 && $riesgodominio[$contadorDominio] < 18)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 18)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                        @if ($row->IdDominio == 48)
                                            @if ($riesgodominio[$contadorDominio] < 4)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 4 && $riesgodominio[$contadorDominio] < 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 6 && $riesgodominio[$contadorDominio] < 8)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 8 && $riesgodominio[$contadorDominio] < 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                            @endif
                                            @if ($riesgodominio[$contadorDominio] >= 10)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy alto</p>
                                            @endif
                                        @endif

                                    @endif
                                    @php
                                        $contadorDominio++;
                                    @endphp
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </main>

        @php
            $contador++;
        @endphp
    @endforeach

    

    <br>
    <br>
    <br>
    <br>


</body>
</html>
