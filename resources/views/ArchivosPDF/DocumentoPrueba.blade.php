<html>
    <head>
        <style>
            /** Define the margins of your page **/

            @page {
                margin: 1.3cm 2cm 1cm 2cm;
                font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
            }

            .header-title {
                margin-top:60px;
                float:right;
                font-size: 12px;
                color: black;
            }

            .header-img {
                height: 1.8cm;
            }

            footer {
                position: fixed; 
                bottom: -2cm; 
                left: -2cm; 
                right: -2cm;
                height: 2cm; 
                width 100%;
                padding:12px;
                text-align:center;

                /** Extra personal styles **/
                background-color: #001c4a;
                color: white;
            }
            footer div{
                float:left;
                width:33.3%;
                
            }

            h1 {
                font-size: 16px;
                color: #1F4E79;
            }

            h2{
                font-size: 16px;
                color: #1F4E79;
            }

            h3 {
                font-size: 15px;
                color: #1F4E79;
                font-weight: lighter;
            }

            .respuesta {
                font-size:14px;
            }

            table{
                text-align: left;
                font-weight: lighter;
                font-size:10px;
            }
            th {
                text-align: left;
                font-weight: lighter;
                font-size:10px;
            }
            p {
                font-size: 10px;
                font-weight: lighter;
                width: 100%;
            }



        </style>
    </head>
    <body>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            @foreach($cuestionarios as $cuestionario)
                <img class="header-img" src="data:image/png;base64,{{$cliente[0]->bLogo}}" alt="" width="100" height="1">
                <h1 class="header-title">Perfil de: <strong>{{$cuestionario[0]->Nombre}}</strong></h1>
                <div style="text-align:right; clear:left">
                    <p style="">{{ date('d-m-Y h:m:s', strtotime($cuestionario[0]->fecha))}}</p>
                </div>
                <h1 style="margin-left: 50px; margin-right: 50px; text-align: center;">CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMATICOS SEVEROS</h1>
                
                <table>
                    

                    
                    @foreach($cuestionario as $pregunta)
                        @if($pregunta->iOrden == 0)
                            <tr><th colspan="2" style="font-weight: bold;">{{$pregunta->Agrupador}}</th></tr>
                            <tr><th colspan="2">{{$pregunta->Pregunta}}</th></tr>
                        @else
                            @if($pregunta->GrupoRespuesta == "Encabezado")
                                <tr><th colspan="2">{{$pregunta->Agrupador}}</th></tr>
                            @else
                                @if($pregunta->iOrden == 4 || $pregunta->iOrden == 6 || $pregunta->iOrden == 13)
                                    <tr><th colspan="2" style="font-weight: bold; padding-top:16px;">{{$pregunta->Agrupador}}</th></tr>
                                @endif
                                <tr style="background-color: {{($pregunta->iOrden == 1 || $pregunta->iOrden == 3 || $pregunta->iOrden == 4 || $pregunta->iOrden == 6 || $pregunta->iOrden == 8 || $pregunta->iOrden == 10 || $pregunta->iOrden == 12 || $pregunta->iOrden == 13 || $pregunta->iOrden == 15 || $pregunta->iOrden == 17 )?"#f1f1f1":"white"}}">
                                    <th style="width:636px">
                                        {{($pregunta->iOrden == 1)?"1. ":""}}
                                        {{($pregunta->iOrden == 2)?"2. ":""}}
                                        {{($pregunta->iOrden == 3)?"3. ":""}}
                                        {{($pregunta->iOrden == 4)?"1. ":""}}
                                        {{($pregunta->iOrden == 5)?"2. ":""}}
                                        {{($pregunta->iOrden == 6)?"1. ":""}}
                                        {{($pregunta->iOrden == 7)?"2. ":""}}
                                        {{($pregunta->iOrden == 8)?"3. ":""}}
                                        {{($pregunta->iOrden == 9)?"4. ":""}}
                                        {{($pregunta->iOrden == 10)?"5. ":""}}
                                        {{($pregunta->iOrden == 11)?"6. ":""}}
                                        {{($pregunta->iOrden == 12)?"7. ":""}}
                                        {{($pregunta->iOrden == 13)?"1. ":""}}
                                        {{($pregunta->iOrden == 14)?"2. ":""}}
                                        {{($pregunta->iOrden == 15)?"3. ":""}}
                                        {{($pregunta->iOrden == 16)?"4. ":""}}
                                        {{($pregunta->iOrden == 17)?"5. ":""}}
                                        {{$pregunta->Pregunta}}
                                    </th>
                                    <th>
                                        @if($pregunta->Valor == 0)
                                            <div style="height: 14px; width: 14px; border-radius:10px; background-color: #00eb37; border: 1px solid black;"></div>
                                        @else
                                            @if($pregunta->Valor == 1)
                                                <div style="height: 14px; width: 14px; border-radius:10px; background-color: orange; border: 1px solid black;"></div>
                                            @else
                                                <div style="height: 14px; width: 14px; border-radius:10px; background-color: rgb(255, 255, 255); border: 1px solid black;"></div>
                                            @endif
                                        @endif
                                    </th>
                                <tr>
                            @endif
                        @endif
                    @endforeach
                </table>
                <p>a) Si todas las respuestas a la Sección I Acontecimiento traumático severo, son "NO", no es necesario responder las demás secciones, y el trabajador no requiere una valoración clínica.<br>
                b) En caso contrario, si alguna respuesta a la Sección I es "SÍ", se requiere contestar las secciones: II , III y IV.</p>
                <p>El trabajador requerirá atención clínica en cualquiera de los casos siguientes:</p>
                <p>1)   Cuando responda "Sí", en alguna de la Sección II Recuerdos persistentes sobre acontecimieno<br>
                2)   Cuando responda "Sí", en 3 o más de la Sección III Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento.<br>
                3)   Cuando responda "Sí", en dos o más de las preguntas de la Sección IV Afectación.</p>
                <p>Los Resultados de esta evaluacion para: {{$cuestionario[0]->Nombre}} indican que {{$cuestionario[0]->val}}, y/o Atención Clinica ya que, Muestra indicios de haber sufrido algun acontecimiento traumatico severo.</p>
                <br><br><br><br><br><br><br><br><br><br>
            @endforeach

            @php
                var_dump($val);
            @endphp
        </main>
    </body>
</html>