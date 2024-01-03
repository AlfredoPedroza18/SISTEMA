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
            font-size: 15.5px;
            margin: 0;
            padding: 0;
            color: #203764;
        }

        h1{
            font-weight: 400;
            font-size: 18px;
            text-align: center;
            color: #002060;
        }

        h2{
            font-size: 18px;
            color: #203764;
            font-style: italic;
        }

        .th-titulos{
            font-weight:400;
            padding: 5px;
            font-size: 16px;
            color: #203764;
        }

        .th-cuerpo{
            font-size: 15px;
            color: #203764;
        }

        .td-respuesta{
            font-size: 14.8px;
        }
        
        .t-acciones {
           text-align: center;
        }

  
    </style>
    <title>ReporteAcciones</title>
</head>
<body>     

    @foreach ($centros as $rowCentros)

        @if ($contador != (count($centros)-1))
            <div style="page-break-after:always;">
                <img src="data:image/jpg;base64,{{$img}}" alt="">          
                <h1>PROGRAMA DE INTERVENCIÓN</h1>

                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><p>Centro de Trabajo</p></td>
                            <td class="td-respuesta" style="border-bottom:1px solid black;width:45%;text-align:center"><span>{{ $rowCentros->Descripcion }}</span></td>
                            <td style="width:15%; text-align:center"><p>Fecha</p></td>
                            <td class="td-respuesta" style="border-bottom:1px solid black;text-align:center"><span>{{date('d-m-Y', strtotime($rowCentros->Fecha))}}</span></td>
                        </tr>
                    </tbody>
                </table>
                <br>


                @if ($calificacion[$contador] < 50)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#58AADF;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#9ABE13;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#FAEB29;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#F19602;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 140)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#F60000;
                            color: white;
                        }
                    </style>
                @endif

            
                <table style="border-collapse: collapse">
                    <thead style="background-color: #e5e3e3">
                        <tr>
                            <th class="th-titulos" style="width: 30%; border:1px solid black;">Nivel de Riesgo General</th>
                            <th class="th-titulos" style="width: 70%; border:1px solid black;">Necesidad de Acción General</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="th-cuerpo th-color{{$contador}}" style="border:1px solid black;padding:5px; text-align:center; height:13%">
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
                            <td class="th-cuerpo" style="border:1px solid black;padding:5px; text-align:justify">
                                @if ($calificacion[$contador] < 50)
                                    <p>El riesgo resulta despreciable por lo que no se requiere medidas adicionales.</p>
                                @endif
                                @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                                    <p>Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.</p>
                                @endif
                                @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                                    <p>Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.
                                    </p>
                                @endif
                                @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                                    <p>Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                    </p>
                                @endif
                                @if ($calificacion[$contador] >= 140)
                                    <p>Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                    </p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            
                <h2 class="t-acciones">Acciones por Dimensión</h2>
            
                @foreach ($acciones as $row)
                    @if($rowCentros->IdCentro == $row->IdCentro)
                        <br>
                        <table class="acciones-dimension table-acciones" style="width:100%">
                            <p style="color: #002060;"><strong>Categoría</strong> / {{$row->Categoria}}</p>
                            <p style="color: #002060;"><strong>Dominio</strong> / {{$row->Dominio}}</p>
                            <br>
                            <p style="color: #002060; font-size:18px"><strong>Dimensión</strong> / <span style="font-size: 18px;">{{$row->Dimension}}</span></p>
                            <table style="border-collapse: collapse; width:100%">
                                <thead style="background-color: #e5e3e3">
                                    <tr>
                                        <th class="th-titulos" style="width: 50%; border:1px solid black;">Acciones</th>
                                        <th class="th-titulos" style="width: 50%; border:1px solid black;">Comentarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accionesDimension as $dimen)
                                        @if ($dimen->IdCentro == $rowCentros->IdCentro)
                                            @if ($dimen->IdDimension == $row->IdDimension)
                                                <tr>
                                                    <td class="th-cuerpo" style="padding: 5px; border:1px solid black; width:50%">{{$dimen->Accion}}</td>
                                                    <td class="th-cuerpo" style="padding: 5px; border:1px solid black; width:50%">{{$dimen->Comentario}}</td>
                                                </tr>  
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </table>
                    @endif
                    <br>
                @endforeach
            
            </div>

        @else
            <div style="">
                <img src="data:image/jpg;base64,{{$img}}" alt="">          
                <h1>PROGRAMA DE INTERVENCIÓN</h1>

                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><p>Centro de Trabajo</p></td>
                            <td class="td-respuesta" style="border-bottom:1px solid black;width:45%;text-align:center"><span>{{ $rowCentros->Descripcion }}</span></td>
                            <td style="width:15%; text-align:center"><p>Fecha</p></td>
                            <td class="td-respuesta" style="border-bottom:1px solid black;text-align:center"><span>{{date('d-m-Y', strtotime($rowCentros->Fecha))}}</span></td>
                        </tr>
                    </tbody>
                </table>
                <br>


                @if ($calificacion[$contador] < 50)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#58AADF;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#9ABE13;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#FAEB29;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#F19602;
                        }
                    </style>
                @endif
                @if ($calificacion[$contador] >= 140)
                    <style>
                        .th-color{{$contador}}{
                            background-color:#F60000;
                            color: white;
                        }
                    </style>
                @endif

            
                <table style="border-collapse: collapse">
                    <thead style="background-color: #e5e3e3">
                        <tr>
                            <th class="th-titulos" style="width: 30%; border:1px solid black;">Nivel de Riesgo General</th>
                            <th class="th-titulos" style="width: 70%; border:1px solid black;">Necesidad de Acción General</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="th-cuerpo th-color{{$contador}}" style="border:1px solid black;padding:5px; text-align:center; height:13%">
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
                            <td class="th-cuerpo" style="border:1px solid black;padding:5px; text-align:justify">
                                @if ($calificacion[$contador] < 50)
                                    <p>El riesgo resulta despreciable por lo que no se requiere medidas adicionales.</p>
                                @endif
                                @if ($calificacion[$contador] >= 50 && $calificacion[$contador] < 75)
                                    <p>Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.</p>
                                @endif
                                @if ($calificacion[$contador] >= 75 && $calificacion[$contador] < 99)
                                    <p>Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.
                                    </p>
                                @endif
                                @if ($calificacion[$contador] >= 99 && $calificacion[$contador] < 140)
                                    <p>Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                    </p>
                                @endif
                                @if ($calificacion[$contador] >= 140)
                                    <p>Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                    </p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            
                <h2 class="t-acciones">Acciones por Dimensión</h2>
            
                @foreach ($acciones as $row)
                    @if($rowCentros->IdCentro == $row->IdCentro)
                        <table class="acciones-dimension table-acciones" style="width:100%">
                            <p style="color: #002060;"><strong>Categoría</strong> / {{$row->Categoria}}</p>
                            <p style="color: #002060;"><strong>Dominio</strong> / {{$row->Dominio}}</p>
                            <br>
                            <p style="color: #002060; font-size:18px"><strong>Dimensión</strong> / <span style="font-size: 18px; ">{{$row->Dimension}}</span></p>
                            <table style="border-collapse: collapse; width:100%">
                                <thead style="background-color: #e5e3e3">
                                    <tr>
                                        <th class="th-titulos" style="width: 50%; border:1px solid black;">Acciones</th>
                                        <th class="th-titulos" style="width: 50%; border:1px solid black;">Comentarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accionesDimension as $dimen)
                                        @if ($dimen->IdCentro == $rowCentros->IdCentro)
                                            @if ($dimen->IdDimension == $row->IdDimension)
                                                <tr>
                                                    <td class="th-cuerpo" style="padding: 5px; border:1px solid black; width:50%">{{$dimen->Accion}}</td>
                                                    <td class="th-cuerpo" style="padding: 5px; border:1px solid black; width:50%">{{$dimen->Comentario}}</td>
                                                </tr>  
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </table>
                        <br>
                    @endif
                @endforeach
            
            </div>
        @endif

        @php
            $contador++;
        @endphp
    @endforeach
    
</body>
</html>
