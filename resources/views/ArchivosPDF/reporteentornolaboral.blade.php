<html>
<head>
    <style>

        @page {
            margin: 2cm 2cm 1cm 2cm;
            font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
        }

        img{
            width: 60px;
            height:40px;
            margin-right: 5px;
        }

        p{
            font-size: 13px;
        }
        .encabezado p{
            display: inline;
            color: rgb(30, 104, 133);
            font-weight: bold;
            font-size: 13px;
        }

        .resultado{
            background-color: rgb(235, 235, 235);
            padding: 4px;
        }
  
    </style>
    <title>Document</title>
</head>
<body>
    @php
        $contador = 0;
    @endphp
    @foreach ($centros as $rowCentro)
        @if($idcentro != -10 )
            @if($rowCentro->IdCentro === $idcentro )
                <header>
                    <div class="encabezado">
                        {{-- <img src="{{asset('assets/acceso/img/nube.png')}}" width="90"> --}}
                        {{-- <img src="{{URL::asset('assets/acceso/img/nube.png')}}" width="90"> --}}
                        {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/acceso/img/nube.png'))) }}" width="90"> --}}
                        <img src="data:image/jpg;base64,{{$img}}" alt="">
                        <p style="margin-right:50px">Resultados Centro de Trabajo</p>
                        <p style="margin-right:50px">Resultados Individuales</p>
                        <p>Resultados Segmentados</p>
                    </div>
                </header>

                <div class="datosempresa">
                    <div style="">
                        <p style="float:left; padding:4px 4px 4px 0; width: 10%; margin-right:15px; background-color:white; margin-bottom:0">Empresa:</p>
                        <p class="resultado" style="width:100%; text-align:center; margin-bottom:0">{{$cliente}}</p>
                    </div>
                    <div>
                        <p style="float:left; padding:0 4px 0 0; width: 10%; margin-right:15px; background-color:white; clear: right; margin-bottom:0">Centro de Trabajo:</p>
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
                                <td style="color: rgb(0, 0, 0); height:14.5%">
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
                                </td>
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
                                    <td style="color: rgb(0, 0, 0); padding:5px">
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
                                    <td style="text-align:center; color: rgb(0, 0, 0); padding:5px; width:5%">
                                        @php
                                            $contadorCategoria = 0;
                                        @endphp
                                        @foreach ($totalCategoria as $row)
                                            @if ($row->IdCentro == $rowCentro->IdCentro)
                                                @if ($row->IdCategoria == 13)
                                                    @if ($riesgocategoria[$contadorCategoria] < 5)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 9)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 9 && $riesgocategoria[$contadorCategoria] < 11)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 11 && $riesgocategoria[$contadorCategoria] < 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                @endif

                                                @if ($row->IdCategoria == 14)
                                                    @if ($riesgocategoria[$contadorCategoria] < 15)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 15 && $riesgocategoria[$contadorCategoria] < 30)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 30 && $riesgocategoria[$contadorCategoria] < 45)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 45 && $riesgocategoria[$contadorCategoria] < 60)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 60)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                @endif

                                                @if ($row->IdCategoria == 15)
                                                    @if ($riesgocategoria[$contadorCategoria] < 5)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 7)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 7 && $riesgocategoria[$contadorCategoria] < 10)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 13)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 13)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                @endif

                                                @if ($row->IdCategoria == 16)
                                                    @if ($riesgocategoria[$contadorCategoria] < 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 29)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 29 && $riesgocategoria[$contadorCategoria] < 42)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 42 && $riesgocategoria[$contadorCategoria] < 58)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 58)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                @endif

                                                @if ($row->IdCategoria == 17)
                                                    @if ($riesgocategoria[$contadorCategoria] < 10)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 18)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 18 && $riesgocategoria[$contadorCategoria] < 23)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                    @endif
                                                    @if ($riesgocategoria[$contadorCategoria] >= 23)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
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

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <table style="width:100%; border-collapse: collapse;">
                            <thead>
                                <tr style="border-top:2px solid black; border-bottom:2px solid black;">
                                    <th class="bg-black" style="width:50%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Dimensión</p></th>
                                    <th class="bg-black" style="width:20%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Calificación</p></th>
                                    <th class="bg-black" style="width:30%; color: rgb(0, 0, 0);" colspan="2"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Resultado</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color: rgb(0, 0, 0);">
                                        @foreach ($dimension as $row)
                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">{{$row->Descripcion}}</p>
                                        @endforeach
                                    </td>
                                    <td style="text-align:center; color: rgb(0, 0, 0); padding:5px;">
                                        @php
                                            $ccount = 1;
                                        @endphp
                                        @foreach ($totalDimension as $row)
                                            @if ($row->IdCentro == $rowCentro->IdCentro)
                                            @if($row->IdDimension == 24)
                                                @if($totalDimension[$ccount]->IdDimension == 25)
                                                    
                                                @else
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">0</p>
                                                @endif
                                            @endif
                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">{{number_format($row->promedio,2)}}</p>
                                            @endif
                                            @php
                                                $ccount++;
                                            @endphp
                                        @endforeach
                                    </td>

                                    <td style="text-align:center; color: rgb(0, 0, 0); padding:5px; width:5%">
                                    
                                        @foreach ($dimenCentros[$contador] as $row)
                                        @if ($row->IdCentro == $rowCentro->IdCentro)
                                            @if ($row->IdDimension == 6)
                                                @if ($row->promedio < 1)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 7)
                                                @if ($row->promedio < 1)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 8)
                                                @if ($row->promedio < 0.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 0.5 && $row->promedio < 1.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1.5 && $row->promedio < 2.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2.5 && $row->promedio < 3.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 9)
                                                @if ($row->promedio < 1)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 10)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 11)
                                                @if ($row->promedio < 1.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1.5 && $row->promedio < 4.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 4.5 && $row->promedio < 7.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7.5 && $row->promedio < 10.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 10.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 12)
                                                @if($row->iValor == -2)
                                                        <p style="padding:2px;">NA</p>
                                                @else
                                                    @if ($row->promedio < 2)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                    @endif
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 13)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 14)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 15)
                                                @if ($row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 16)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 17)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 18)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 19)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 20)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 21)
                                                @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 22)
                                                @if ($row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 23)
                                                @if ($row->promedio < 2.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 17.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 24)
                                                @if ($row->promedio < 2.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 17.5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 25)
                                                @if ($row->iValor == -2)
                                                    <p style="padding:2px;">NA</p>
                                                @else
                                                    @if ($row->promedio < 2)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                        <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                    @endif
                                                @endif
                                            @endif
                                            
                                            @if ($row->IdDimension == 26)
                                                @if ($row->promedio < 4)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 4 && $row->promedio < 12)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 12 && $row->promedio < 20)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 20 && $row->promedio < 28)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 28)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 27)
                                                @if ($row->promedio < 1)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 4)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 4 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 28)
                                                @if ($row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 29)
                                                @if ($row->promedio < 1)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 30)
                                                @if ($row->promedio < 1)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 4)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 4 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif

                                        @endif
                                        @endforeach


                                    </td>
                                    <td style="color: rgb(0, 0, 0); padding:5px; text-align:center">
                                            @foreach ($dimenCentros[$contador] as $row)
                                            @if ($row->IdCentro == $rowCentro->IdCentro)
                                                @if ($row->IdDimension == 6)
                                                    @if ($row->promedio < 1)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 7)
                                                    @if ($row->promedio < 1)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 8)
                                                    @if ($row->promedio < 0.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 0.5 && $row->promedio < 1.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1.5 && $row->promedio < 2.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 2.5 && $row->promedio < 3.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 3.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 9)
                                                    @if ($row->promedio < 1)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 10)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 11)
                                                    @if ($row->promedio < 1.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1.5 && $row->promedio < 4.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 4.5 && $row->promedio < 7.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 7.5 && $row->promedio < 10.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 10.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 12)
                                                    @if ($row->iValor == -2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">NA</p>
                                                    @else
                                                        @if ($row->promedio < 2)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                        @endif
                                                        @if ($row->promedio >= 2 && $row->promedio < 6)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                        @endif
                                                        @if ($row->promedio >= 6 && $row->promedio < 10)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                        @endif
                                                        @if ($row->promedio >= 10 && $row->promedio < 14)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                        @endif
                                                        @if ($row->promedio >= 14)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                        @endif
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 13)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 14)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 15)
                                                    @if ($row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 16)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 17)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 18)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 19)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 20)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 21)
                                                    @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 22)
                                                    @if ($row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 23)
                                                    @if ($row->promedio < 2.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 17.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 24)
                                                    @if ($row->promedio < 2.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 17.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 25)
                                                    @if ($row->iValor == -2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">NA</p>
                                                    @else
                                                        @if ($row->promedio < 2)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                        @endif
                                                        @if ($row->promedio >= 2 && $row->promedio < 6)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                        @endif
                                                        @if ($row->promedio >= 6 && $row->promedio < 10)
                                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                        @endif
                                                        @if ($row->promedio >= 10 && $row->promedio < 14)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                        @endif
                                                        @if ($row->promedio >= 14)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                        @endif 
                                                    @endif
                                                
                                                @endif
                                                
                                                @if ($row->IdDimension == 26)
                                                    @if ($row->promedio < 4)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 4 && $row->promedio < 12)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 12 && $row->promedio < 20)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 20 && $row->promedio < 28)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 28)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 27)
                                                    @if ($row->promedio < 1)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 4)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 4 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 28)
                                                    @if ($row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 29)
                                                    @if ($row->promedio < 1)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 3)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 3 && $row->promedio < 5)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 5 && $row->promedio < 7)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                                @if ($row->IdDimension == 30)
                                                    @if ($row->promedio < 1)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 1 && $row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 4)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 4 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif

                                            @endif
                                        @endforeach

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr style="clear: left; margin:0; background-color:#ffffff; color:#ffffff; border: 0 solid white">
                    </div>
                    
                </main>
            @endif
        @else
            <header>
                <div class="encabezado">
                    {{-- <img src="{{asset('assets/acceso/img/nube.png')}}" width="90"> --}}
                    {{-- <img src="{{URL::asset('assets/acceso/img/nube.png')}}" width="90"> --}}
                    {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/acceso/img/nube.png'))) }}" width="90"> --}}
                    <img src="data:image/jpg;base64,{{$img}}" alt="">
                    <p style="margin-right:50px">Resultados Centro de Trabajo</p>
                    <p style="margin-right:50px">Resultados Individuales</p>
                    <p>Resultados Segmentados</p>
                </div>
            </header>

            <div class="datosempresa">
                <div style="">
                    <p style="float:left; padding:4px 4px 4px 0; width: 10%; margin-right:15px; background-color:white; margin-bottom:0">Empresa:</p>
                    <p class="resultado" style="width:100%; text-align:center; margin-bottom:0">{{$cliente}}</p>
                </div>
                <div>
                    <p style="float:left; padding:0 4px 0 0; width: 10%; margin-right:15px; background-color:white; clear: right; margin-bottom:0">Centro de Trabajo:</p>
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
                            <td style="color: rgb(0, 0, 0); height:14.5%">
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
                            </td>
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
                                <td style="color: rgb(0, 0, 0); padding:5px">
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
                                <td style="text-align:center; color: rgb(0, 0, 0); padding:5px; width:5%">
                                    @php
                                        $contadorCategoria = 0;
                                    @endphp
                                    @foreach ($totalCategoria as $row)
                                        @if ($row->IdCentro == $rowCentro->IdCentro)
                                            @if ($row->IdCategoria == 13)
                                                @if ($riesgocategoria[$contadorCategoria] < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 9)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 9 && $riesgocategoria[$contadorCategoria] < 11)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 11 && $riesgocategoria[$contadorCategoria] < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdCategoria == 14)
                                                @if ($riesgocategoria[$contadorCategoria] < 15)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 15 && $riesgocategoria[$contadorCategoria] < 30)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 30 && $riesgocategoria[$contadorCategoria] < 45)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 45 && $riesgocategoria[$contadorCategoria] < 60)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 60)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdCategoria == 15)
                                                @if ($riesgocategoria[$contadorCategoria] < 5)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 5 && $riesgocategoria[$contadorCategoria] < 7)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 7 && $riesgocategoria[$contadorCategoria] < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 13)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 13)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdCategoria == 16)
                                                @if ($riesgocategoria[$contadorCategoria] < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 29)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 29 && $riesgocategoria[$contadorCategoria] < 42)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 42 && $riesgocategoria[$contadorCategoria] < 58)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 58)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                            @endif

                                            @if ($row->IdCategoria == 17)
                                                @if ($riesgocategoria[$contadorCategoria] < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 10 && $riesgocategoria[$contadorCategoria] < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 14 && $riesgocategoria[$contadorCategoria] < 18)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 18 && $riesgocategoria[$contadorCategoria] < 23)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;margin-left:6px"></p>
                                                @endif
                                                @if ($riesgocategoria[$contadorCategoria] >= 23)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;margin-left:6px"></p>
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

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <table style="width:100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-top:2px solid black; border-bottom:2px solid black;">
                                <th class="bg-black" style="width:50%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Dimensión</p></th>
                                <th class="bg-black" style="width:20%; color: rgb(0, 0, 0);"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Calificación</p></th>
                                <th class="bg-black" style="width:30%; color: rgb(0, 0, 0);" colspan="2"><p style="color:rgb(30, 104, 133); font-weight:bold; margin:0">Resultado</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color: rgb(0, 0, 0);">
                                    @foreach ($dimension as $row)
                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">{{$row->Descripcion}}</p>
                                    @endforeach
                                </td>
                                <td style="text-align:center; color: rgb(0, 0, 0); padding:5px;">
                                    @php
                                        $ccount = 1;
                                    @endphp
                                    @foreach ($totalDimension as $row)
                                        @if ($row->IdCentro == $rowCentro->IdCentro)
                                        @if($row->IdDimension == 24)
                                            @if($totalDimension[$ccount]->IdDimension == 25)
                                                
                                            @else
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">0</p>
                                            @endif
                                        @endif
                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">{{number_format($row->promedio,2)}}</p>
                                        @endif
                                        @php
                                            $ccount++;
                                        @endphp
                                    @endforeach
                                </td>

                                <td style="text-align:center; color: rgb(0, 0, 0); padding:5px; width:5%">
                                
                                    @foreach ($dimenCentros[$contador] as $row)
                                    @if ($row->IdCentro == $rowCentro->IdCentro)
                                        @if ($row->IdDimension == 6)
                                            @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 7)
                                            @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 8)
                                            @if ($row->promedio < 0.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 0.5 && $row->promedio < 1.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1.5 && $row->promedio < 2.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2.5 && $row->promedio < 3.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 9)
                                            @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 10)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 11)
                                            @if ($row->promedio < 1.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1.5 && $row->promedio < 4.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 4.5 && $row->promedio < 7.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7.5 && $row->promedio < 10.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 10.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 12)
                                            @if($row->iValor == -2)
                                                    <p style="padding:2px;">NA</p>
                                            @else
                                                @if ($row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 13)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 14)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 15)
                                            @if ($row->promedio < 2)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2 && $row->promedio < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 6 && $row->promedio < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 10 && $row->promedio < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 16)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 17)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 18)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 19)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 20)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 21)
                                            @if ($row->promedio < 1)
                                            <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 22)
                                            @if ($row->promedio < 2)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2 && $row->promedio < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 6 && $row->promedio < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 10 && $row->promedio < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 23)
                                            @if ($row->promedio < 2.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 17.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 24)
                                            @if ($row->promedio < 2.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 17.5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 25)
                                            @if ($row->iValor == -2)
                                                <p style="padding:2px;">NA</p>
                                            @else
                                                @if ($row->promedio < 2)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                    <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                                @endif
                                            @endif
                                        @endif
                                        
                                        @if ($row->IdDimension == 26)
                                            @if ($row->promedio < 4)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 4 && $row->promedio < 12)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 12 && $row->promedio < 20)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 20 && $row->promedio < 28)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 28)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 27)
                                            @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 2)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2 && $row->promedio < 4)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 4 && $row->promedio < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 28)
                                            @if ($row->promedio < 2)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2 && $row->promedio < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 6 && $row->promedio < 10)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 10 && $row->promedio < 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 14)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 29)
                                            @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 3)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 3 && $row->promedio < 5)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 5 && $row->promedio < 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 7)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                        @if ($row->IdDimension == 30)
                                            @if ($row->promedio < 1)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#58AADF; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 1 && $row->promedio < 2)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#9ABE13; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 2 && $row->promedio < 4)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#FAEB29; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 4 && $row->promedio < 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F19602; margin-bottom:8px;"></p>
                                            @endif
                                            @if ($row->promedio >= 6)
                                                <p style="width:20px; height:20px; border-radius:50%; background-color:#F60000; margin-bottom:8px;"></p>
                                            @endif
                                        @endif

                                    @endif
                                    @endforeach


                                </td>
                                <td style="color: rgb(0, 0, 0); padding:5px; text-align:center">
                                        @foreach ($dimenCentros[$contador] as $row)
                                        @if ($row->IdCentro == $rowCentro->IdCentro)
                                            @if ($row->IdDimension == 6)
                                                @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 7)
                                                @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 8)
                                                @if ($row->promedio < 0.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 0.5 && $row->promedio < 1.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 1.5 && $row->promedio < 2.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 2.5 && $row->promedio < 3.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 3.5)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 9)
                                                @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 10)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 11)
                                                @if ($row->promedio < 1.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1.5 && $row->promedio < 4.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 4.5 && $row->promedio < 7.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 7.5 && $row->promedio < 10.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 10.5)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 12)
                                                @if ($row->iValor == -2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">NA</p>
                                                @else
                                                    @if ($row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 13)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 14)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 15)
                                                @if ($row->promedio < 2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 16)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 17)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 18)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 19)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 20)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 21)
                                                @if ($row->promedio < 1)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 22)
                                                @if ($row->promedio < 2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 23)
                                                @if ($row->promedio < 2.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 17.5)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 24)
                                                @if ($row->promedio < 2.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 2.5 && $row->promedio < 7.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 7.5 && $row->promedio < 12.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 12.5 && $row->promedio < 17.5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 17.5)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 25)
                                                @if ($row->iValor == -2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">NA</p>
                                                @else
                                                    @if ($row->promedio < 2)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                    @endif
                                                    @if ($row->promedio >= 2 && $row->promedio < 6)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                    @endif
                                                    @if ($row->promedio >= 6 && $row->promedio < 10)
                                                            <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                    @endif
                                                    @if ($row->promedio >= 10 && $row->promedio < 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                    @endif
                                                    @if ($row->promedio >= 14)
                                                        <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                    @endif 
                                                @endif
                                            
                                            @endif
                                            
                                            @if ($row->IdDimension == 26)
                                                @if ($row->promedio < 4)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 4 && $row->promedio < 12)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 12 && $row->promedio < 20)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 20 && $row->promedio < 28)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 28)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 27)
                                                @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 4)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 4 && $row->promedio < 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 28)
                                                @if ($row->promedio < 2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 6 && $row->promedio < 10)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 10 && $row->promedio < 14)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 14)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 29)
                                                @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 3)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 3 && $row->promedio < 5)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 5 && $row->promedio < 7)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 7)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                            @if ($row->IdDimension == 30)
                                                @if ($row->promedio < 1)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Nulo</p>
                                                @endif
                                                @if ($row->promedio >= 1 && $row->promedio < 2)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Bajo</p>
                                                @endif
                                                @if ($row->promedio >= 2 && $row->promedio < 4)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Medio</p>
                                                @endif
                                                @if ($row->promedio >= 4 && $row->promedio < 6)
                                                    <p style="background-color:rgb(229, 227, 227);padding:2px;">Alto</p>
                                                @endif
                                                @if ($row->promedio >= 6)
                                                <p style="background-color:rgb(229, 227, 227);padding:2px;">Muy Alto</p>
                                                @endif
                                            @endif

                                        @endif
                                    @endforeach

                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr style="clear: left; margin:0; background-color:#ffffff; color:#ffffff; border: 0 solid white">
                </div>
                
            </main>

            <br>
            <br>
            <br>
            <br>
            <br>
        @endif

    @php
        $contador++;
        if($contad < 9){
            $contad++;
        }
    @endphp

    @endforeach
   
</body>
</html>
