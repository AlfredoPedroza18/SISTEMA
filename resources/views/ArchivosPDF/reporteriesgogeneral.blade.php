<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            /** Define the margins of your page **/

            @page {
                padding:2cm;
                font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
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
                padding-top:5.65cm;
                padding-bottom:0.45cm;
            }
            .p-estilos{
                margin-left: 5px;
                margin-right: 5px;
                text-align: justify;
                font-size: 15px;
            }
        </style>
        <title>Reporte General</title>
    </head>
    <body>
        <div class="hoja-de-presentacion">
            <div class="hoja-lado-izquierdo">
                <p style="margin-left:2cm; margin-right:2cm;">Implementación de la <strong>NOM035</strong></p>
                <p style="margin-left:5cm; margin-right:1cm; margin-top:12cm; font-size: 25px;">{{$mes}} {{$anio}}</p>
            </div>
            <div class="hoja-lado-derecho">
                <img class="header-img" src="data:image/png;base64,{{$cliente[0]->bLogo}}" alt="logo"
                    style="width:70%; margin-left:15%;">
                <p style="margin-left:.5cm; margin-right:1cm; margin-top:15.9cm;">El presente reporte fue elaborado por la
                    empresa Gen-T para la Empresa {{$cliente[0]->nombre_comercial}}</p>
            </div>
        </div>
        <br><br><br><br><br>
        <table style="border-collapse:collapse" >
            <td>
                <p>
                    <strong>"Cuestionario para identificar a los trabajadores que fueron sujetos a acontecimientos traumáticos
                    severos"</strong>
                <br>En el
                    reporte se muestra los resultados de la aplicación de la guia 1 señalada en la NOM035,
                    <strong>"Cuestionario para identificar a los trabajadores que fueron sujetos a acontecimientos traumáticos
                    severos"</strong> realizada a todo el personal de la Empresa {{$cliente[0]->nombre_comercial}} en (el/los) siguientes
                    centros de trabajo:
                    <ul>
                    @foreach($centros as $centro)
                        <li><strong>{{$centro->Descripcion}}</strong></li>
                    @endforeach
                    </ul>
                    De un total de <strong>{{$requiere + $noRequiere}}</strong> personas que Contestaron la encuesta, <strong>{{$requiere}}</strong> indican que requieren valoración, y/o
                    atención clínica ya que , muestran indicios de haber sufrido algún acontecimiento traumático severo.
                </p>
            </td>
        </table>
        <br><br>
        <img style=" margin-left: 200px;" src="data:image/jpeg;base64,{{base64_encode($image)}}" />
        <br><br>
        <footer>
            <p>En el reporte anexo se encuentra el listado de las personas señalando
                quienes requieren o no seguimiento al riesgo psicosocial.</p>
        </footer>
    </body>
</html>