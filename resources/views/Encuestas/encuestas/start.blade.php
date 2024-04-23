<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIG-ERP-Gen-t</title>
    
    {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    
    {!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    {!! Html::style('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') !!}
    {!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') !!}
    {!! Html::style('assets/plugins/bootstrap-datepicker/css/datepicker3.css') !!}
    {!! Html::style('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
    {!! Html::style('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') !!}
    {!! Html::style('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}
    {!! Html::style('assets/plugins/gritter/css/jquery.gritter.css') !!}
    {!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.js') !!}
    {!! Html::style('assets/plugins/select2/dist/css/select2.min.css') !!}

    {!! Html::style('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') !!}

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    {!! Html::style('assets/plugins/bootstrap-wizard/css/bwizard.min.css') !!}
    {!! Html::style('assets/plugins/parsley/src/parsley.css') !!}
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    
    
    {!! Html::style('assets/plugins/jquery-tag-it/css/jquery.tagit.css') !!}
    {!! Html::style('assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css') !!}


    <style>
      .navbar-logo{float:left;margin-right:10px;border:10px solid transparent;border-color:#FE9A2E #FAAC58 #FF8000;opacity:.9;filter:alpha(opacity=90)}
      .tamFont{
        font-size: 16px !important;
        color: rgb(68, 67, 67);
      }

      /* Center the loader */
      #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 100px;
        height: 100px;
        margin: -76px 0 0 -76px;
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
      }

      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

    /* Add animation to "page content" */
      .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
      }

      @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 } 
        to { bottom:0px; opacity:1 }
      }

      @keyframes animatebottom { 
        from{ bottom:-100px; opacity:0 } 
        to{ bottom:0; opacity:1 }
      }

      #myDiv {
        display: none;
        text-align: center;
      }

      :root {
            --background_image_url:<?php $background_image_url; ?>;
      }  

      button{
          background-color:inherit;
      }

      .panel{
          height: 85vh;
      }

      .plantilla{
          height:100%; 
          /* background-image: url(/assets/img/fondo_pregunta.webp); */
          background-image: url("data:image/jpg;base64,{{$imagen}}");
          background-size: cover;
          background-repeat: no-repeat;
          background-position: center center;
      }

      .contenido_pregunta{
          height: 80%;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
      }

      .pregunta label{
          font-size: 3rem;
          color: rgb(255, 255, 255);
          font-family: Arial, Helvetica, sans-serif;  
      }

      .pregunta{
          width: 80%;
          margin: 0 auto;
          text-align: center;
      }

      .respuestas{
          width: 50%;
          text-align: center;
      }
      .abiertas{
          width: 100%;
          height: 50px;
          background-color: inherit;
          outline: none;
          font-size: 3rem;
          color: blue;
          border: 2px solid blue;
          border-top: none;
          border-left: none;
          border-right: none;
      }

      .btnRadio{
        margin: 0!important;
      }


      .respuestas{
          display: flex;
          flex-direction: column;
          gap: 5px;
      }

      .abiertas::placeholder{
          color: rgb(0, 0, 255, .3);
      }


      .label_pregunta{
          font-size: 4rem;
          color: rgb(96, 96, 96);
          font-family: Arial, Helvetica, sans-serif;
          background-color: inherit;
          font-weight: 500;
          padding: 0;
      }


      .container ul {
          margin-top: 0;
          padding-left: 0em;
      }
      .container ul li {
          list-style-type: none;
      }
      .container ul + ul {
          margin-bottom: 0;
      }
      .container ul + ul > li + li label {
          margin-bottom: 0;
      }

      #categoria{
          color: rgb(255, 255, 255);
          font-weight: 600;
          font-family: Arial, Helvetica, sans-serif;
      }

      label {
          font-weight: 600;
          font-size: 1.7rem;
          color: #777777;
          margin-bottom: 11px;
          width: 100%;
          float: left;
          cursor: pointer;
          padding: 0 0.6em;
          box-sizing: border-box;
          background: #e6e6e6;
          transition: all 0.5s ease 0s;
      }

    .contenedor_respuesta{
        width: 60%;
    }

    @media(max-width: 1250px){

        .pregunta label{
            font-size: 2.5rem;
            color: rgb(255, 255, 255);
            font-family: Arial, Helvetica, sans-serif;  
        }

        label {
            font-weight: 600;
            font-size: 1.6rem;
            color: #777777;
            margin-bottom: 11px;
            width: 100%;
            float: left;
            cursor: pointer;
            padding: 0 0.6em;
            box-sizing: border-box;
            background: #e6e6e6;
            transition: all 0.5s ease 0s;
        }

        .contenedor_respuesta{
            width: 80%;
        }

        .respuestas{
            width: 100%;
        }
    }

    @media(max-width: 1050px){

        .pregunta label{
          font-size: 2.5rem;
          color: rgb(255, 255, 255);
          font-family: Arial, Helvetica, sans-serif;  
        }

        label {
            font-weight: 600;
            font-size: 1.6rem;
            color: #777777;
            margin-bottom: 11px;
            width: 100%;
            float: left;
            cursor: pointer;
            padding: 0 0.6em;
            box-sizing: border-box;
            background: #e6e6e6;
            transition: all 0.5s ease 0s;
        }

        .contenedor_respuesta{
            width: 100%;
        }

        .respuestas{
            width: 100%;
        }
    }

    @media(max-width: 750px){

        .pregunta label{
            font-size: 2.5rem;
            color: rgb(255, 255, 255);
            font-family: Arial, Helvetica, sans-serif;  
        }

        label {
            font-weight: 600;
            font-size: 1.6rem;
            color: #777777;
            margin-bottom: 11px;
            width: 100%;
            float: left;
            cursor: pointer;
            padding: 0 0.6em;
            box-sizing: border-box;
            background: #e6e6e6;
            transition: all 0.5s ease 0s;
        }

        .contenedor_respuesta{
            width: 100%;
        }

        .respuestas{
            width: 93%!important;
        }
    }
      

    @media(max-width: 580px){
        .pregunta label{
          font-size: 2rem;
          color: rgb(255, 255, 255);
          font-family: Arial, Helvetica, sans-serif;  
        }

        label {
            font-weight: 600;
            font-size: 1.2rem;
            color: #777777;
            margin-bottom: 11px;
            width: 100%;
            float: left;
            cursor: pointer;
            padding: 0 0.6em;
            box-sizing: border-box;
            background: #e6e6e6;
            transition: all 0.5s ease 0s;
        }

        .contenedor_respuesta{
            width: 100%;
        }

        .respuestas{
            width: 100%!important;
        }

        .categoriaa{
            font-size: 1.5rem !important;
        }
    }

    @media(max-width: 460px){
        .pregunta label{
          font-size: 2rem;
          color: rgb(255, 255, 255);
          font-family: Arial, Helvetica, sans-serif;  
        }

        #loader {
            position: absolute;
            left: 60%;
            top: 58%;
            z-index: 1;
            width: 70px;
            height: 70px;
            margin: -76px 0 0 -76px;
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        label {
            font-weight: 600;
            font-size: 1.2rem;
            color: #777777;
            margin-bottom: 11px;
            width: 100%;
            float: left;
            cursor: pointer;
            padding: 0 0.6em;
            box-sizing: border-box;
            background: #e6e6e6;
            transition: all 0.5s ease 0s;
        }

        .contenedor_respuesta{
            width: 100%;
        }

        .respuestas{
            width: 100%!important;
        }

        .container {
            padding: 0!important;
        }
    }

    @media(max-width: 400px){
        .content{
            padding: 6px!important;
        }
    }

    input[type="radio"],
    input[type="checkbox"] {
          display: none;
      }

    input[type="radio"] + label,
    input[type="checkbox"] + label {
        line-height: 3em;
    }

    input[type="radio"] + label {
        border-radius: 50px;
    }

    input[type="radio"]:disabled + label,
    input[type="checkbox"]:disabled + label {
        color: #ccc !important;
        cursor: not-allowed;
    }

    input[type="radio"]:checked:disabled + label:after,
    input[type="checkbox"]:checked:disabled + label:after {
        border-color: #ccc;
    }

      input[type="radio"] + label:before,
      input[type="checkbox"] + label:before {
          content: "";
          width: 26px;
          height: 26px;
          float: left;
          margin-right: 0.5em;
          border: 2px solid #ccc;
          background: #fff;
          margin-top: 0.7em;
      }
      input[type="radio"] + label:before {
          border-radius: 100%;
      }

      input[type="radio"]:checked + label,
      input[type="checkbox"]:checked + label {
          background: #c1eec2;
      }

      input[type="radio"]:checked + label:after {
          content: "";
          width: 0;
          height: 0;
          border: 9px solid #0fbf12;
          float: left;
          margin-left: -1.85em;
          margin-top: .92em;
          border-radius: 100%;
      }

      input[type="radio"]:checked + label:after {
        content: "";
        width: 0;
        height: 0;
        border: 10px solid #0fbf12;
        float: left;
        margin-left: -1.85em;
        margin-top: .92em;
        border-radius: 100%;
      }

      @media(max-width: 1050px){

        input[type="radio"] + label:before,
        input[type="checkbox"] + label:before {
            content: "";
            width: 26px;
            height: 26px;
            float: left;
            margin-right: 0.2em;
            border: 2px solid #ccc;
            background: #fff;
            margin-top: 0.7em;
        }

        input[type="radio"]:checked + label:after {
        content: "";
        width: 0;
        height: 0;
        border: 9px solid #0fbf12;
        float: left;
        margin-left: -1.50em;
        margin-top: .92em;
        border-radius: 100%;
        }
     }

     @media(max-width: 1050px){

        input[type="radio"] + label:before,
        input[type="checkbox"] + label:before {
            content: "";
            width: 26px;
            height: 26px;
            float: left;
            margin-right: 0.2em;
            border: 2px solid #ccc;
            background: #fff;
            margin-top: 0.7em;
        }

        input[type="radio"]:checked + label:after {
        content: "";
        width: 0;
        height: 0;
        border: 9px solid #0fbf12;
        float: left;
        margin-left: -1.60em;
        margin-top: .95em;
        border-radius: 100%;
        }
    }
     

     @media(max-width: 560px){

        input[type="radio"] + label:before,
        input[type="checkbox"] + label:before {
            content: "";
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 0.2em;
            border: 2px solid #ccc;
            background: #fff;
            margin-top: 0.7em;
        }

        input[type="radio"]:checked + label:after {
        content: "";
        width: 0;
        height: 0;
        border: 7px solid #0fbf12;
        float: left;
        margin-left: -1.60em;
        margin-top: .92em;
        border-radius: 100%;
        }
    }

      @media(max-width: 412px){

        input[type="radio"] + label:before,
        input[type="checkbox"] + label:before {
            content: "";
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 0.2em;
            border: 2px solid #ccc;
            background: #fff;
            margin-top: 0.7em;
        }

        input[type="radio"]:checked + label:after {
          content: "";
          width: 0;
          height: 0;
          border: 7.3px solid #0fbf12;
          float: left;
          margin-left: -1.60em;
          margin-top: .92em;
          border-radius: 100%;
        }
      }

      @media(max-width: 412px){

            input[type="radio"] + label:before,
            input[type="checkbox"] + label:before {
                content: "";
                width: 20px;
                height: 20px;
                float: left;
                margin-right: 0.2em;
                border: 2px solid #ccc;
                background: #fff;
                margin-top: 0.7em;
            }

            input[type="radio"]:checked + label:after {
            content: "";
            width: 0;
            height: 0;
            border: 7.3px solid #0fbf12;
            float: left;
            margin-left: -1.65em;
            margin-top: .92em;
            border-radius: 100%;
            }
        }

        @media(max-width: 360px){

            input[type="radio"] + label:before,
            input[type="checkbox"] + label:before {
                content: "";
                width: 20px;
                height: 20px;
                float: left;
                margin-right: 0.2em;
                border: 2px solid #ccc;
                background: #fff;
                margin-top: 0.7em;
            }

            input[type="radio"]:checked + label:after {
            content: "";
            width: 0;
            height: 0;
            border: 7.3px solid #0fbf12;
            float: left;
            margin-left: -1.65em;
            margin-top: .96em;
            border-radius: 100%;
            }
        }


      input[type="checkbox"]:checked + label:after {
          content: "";
          width: 12px;
          height: 6px;
          border: 4px solid #0fbf12;
          float: left;
          margin-left: -1.95em;
          border-right: 0;
          border-top: 0;
          margin-top: 1em;
          transform: rotate(-55deg);
      }

      input[type="radio"]:checked + label:before,
      input[type="checkbox"]:checked + label:before {
          border-color: #0fbf12;
      }

      input[type="radio"]:checked:disabled + label,
      input[type="checkbox"]:checked:disabled + label {
          background: #ccc;
          color: #fff !important;
      }

      input[type="radio"]:checked:disabled + label:before,
      input[type="checkbox"]:checked:disabled + label:before {
          border-color: #bdbdbd;
      }

      @media (max-width: 650px) {
          .content {
              width: 100%;

          }
      }

      .content{
          padding: 0 25px;
      }

      .alertt{
        width: 60%;
        margin: 0 auto;
        text-align: center;
        font-size: 1.7rem;
      }

    </style>
    
</head>

  <body style="background-color:rgb(216, 220, 233)">
          <div id="header" class="header navbar navbar-default navbar-fixed-top hidden-print">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a class="navbar-brand">
                    <span class="navbar-logo"></span> SIG-ERP</a>
                </div>
               
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown navbar-user">

                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="">{{$datosCliente[0]->nombre_comercial}}</span>
                    </a>
                   </li>
                </ul>
                
            </div>
          </div>
@php
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $periodo=strtotime($datosPeriodo[0]->Fecha);

    $mes=date("m", $periodo);
    $anio=date("Y", $periodo);

    $Fecha=$meses[$mes-1]." DE ".$anio;
@endphp
<br><br><br>
    <div class="container mt-2">
      <div class="row">
        <div class="col text-center">
          <p class="tamFont" style="text-transform:uppercase"><strong>{{$datosEncuesta[0]->Descripcion}}</strong> (PERIODO: {{$Fecha}})</p>
        </div>
      </div>
    </div>

    <!--ENCUESTA-->
    <div id="content" class="content">
    <input id="IdEncuesta" type="hidden" value="{{$IdEncuesta}}">
    <input type="hidden" value="{{$datosPeriodo[0]->IdPeriodo}}" id="periodo_id">
    <div class="panel">
      <div class="plantilla" id="plantillaPregunta">
          <div style="padding: 15px 0 0 15px" id="categoria">
          </div>
          <div class="contenido_pregunta"> 
            <div id="alertt" class="alertt">
            </div>
              <div id="loader"></div>
              <div id="contenido_pregunta" class="pregunta" style=""> 
              </div>
              <div class="respuestas" id="respuestaa">
                  <div class="content" style="margin: 0">
                          <div class="container" style="width: 100%;" >
                              <ul class="row contenedor_respuesta" id="contenido_respuesta" style="margin: 0 auto"> 
                              </ul>
                          </div>
                  </div>
              </div>
          </div>

          <div id="iniciar" style="text-align: center;">
          </div>

          <div style="text-align: end; margin-right:10px; display:none" id="botones">
              <button id="btnAnterior" type="button" style="display: none" class="btn btn-primary btn-lg"><i class="fa fa-solid fa-angle-left"></i></button>
              <button id="btnSiguiente" disabled type="button" class="btn btn-primary btn-lg"><i class="fa fa-solid fa-angle-right"></i></button>
          </div>
      </div>
      
      <input type="hidden" value="{{$IdPersonal}}" id="id_personal">
      <input type="hidden" value="{{$IdCliente}}" id="cliente_id">
      <input type="hidden" value="{{$Estatus}}" id="estatus">
      <input type="hidden" value="{{$tamano}}" id="tamano">
      <input type="hidden" value="{{$cuenta}}" id="cuenta">
      <input type="hidden" value="{{$imgbienvenida}}" id="imgbienvenida">
      <input type="hidden" value="{{$IdCentro}}" id="centro">

  </div>
</div>

    <!--FIN ENCUESTA-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        let etatus = document.getElementById('estatus').value;
        let tamano = document.getElementById('tamano').value;
        let cuenta = document.getElementById('cuenta').value;
    
            $(document).ready(function(){
                if(etatus == "Finalizado"){
                    mensaje();
                }else{
                    if(cuenta > 0 && tamano == 79){
                        tamano = 83;
                    }
                    getPreguntas(tamano);
                }
                document.getElementById("loader").style.display = "none";

                function getPreguntas(){
                    let IdPersonal = document.getElementById('id_personal').value;
                    let IdEncuesta = document.getElementById('IdEncuesta').value;
                    let token = '{{csrf_token()}}';
                    $.ajax({
                        url: '{{ route('getPreguntas') }}',
                        type: "POST",
                        data: {
                            IdEncuesta:IdEncuesta,
                            IdPersonal:IdPersonal,
                            _token: token
                        },
                        success: function(response){
                                if(tamano != 0){
                                    mostrarPreguntas(response.data,response.data2,response.data3);
                                }else{
                                    mostrarBienvenida(response.data,response.data2,response.data3);
                                }
                        },
                        error: function( e ) {
                            console.log(e);
                        }
                    });
                }
        
                function mensaje(){
                    let contenedor = document.getElementById("contenido_pregunta");
                    contenedor.innerHTML = `<label class="label_pregunta" for="">Usted ya respondío esta encuesta</label>`;
                }
        
                function mostrarBienvenida(response,response2,response3){
                    document.getElementById('botones').style = "display:none";
                    let imgBienvenida = document.getElementById('imgbienvenida').value;
                    let contenedor = document.getElementById("contenido_pregunta");
                    let bienvenida = `<img style="width:80%" src="data:image/jpg;base64,${imgBienvenida}">`;
                    contenedor.innerHTML = bienvenida;
        
                    let contenidoBoton = document.getElementById('iniciar');
                    let boton = `<button id="btnIniciar" type="button" class="btn btn-primary btn-lg">Iniciar Encuesta</button>`;
        
                    contenidoBoton.innerHTML = boton;
        
                    document.getElementById('btnIniciar').onclick = function(){
                        mostrarPreguntas(response,response2,tamano,response3);
                    }
                }
        
                function mostrarPreguntas(response,response2,response3){
                    document.getElementById('iniciar').style = "display:none";
                    document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
                    let d = 0;
                    if(tamano != 0){
                        d = tamano;
                    }else{
                        d = 0; 
                    }
              
                    let contenedor = document.getElementById("contenido_pregunta");
                    let contenedorRespuesta = document.getElementById("contenido_respuesta");
                    let categoria = document.getElementById("categoria");
                    let i = d;
                    let contador = 0;
                    let j = 0;
                    let bandera = 0;
                    let condicionRiesgo = 0;
                    let terminado = 0;
                    let condicionada = false;
            
                    let arrayPregunta = [];
                    let arrayRespuesta = [];
                    let arrayCampo = [];
            
                    categoria.innerHTML = "";
                    contenedor.innerHTML = "";
                    document.getElementById("btnSiguiente").disabled = true;
                    if (i == (response.length-1)){
                        i = i;
                        document.getElementById('botones').style = "display:none";
                        document.getElementById("loader").style.display = "block";
                    }else{
                        document.getElementById("loader").style.display = "none";
                    }
                    j = 0;
                    contenedorRespuesta.innerHTML = "";
                    if(response[i].GrupoRespuesta === "Opción múltiple (valor de 0 a 4)" || response[i].GrupoRespuesta === "Opción múltiple (valor de 4 a 0)"){
                        document.getElementById('respuestaa').style = "width:50%";
                        let IdGrupoRespuesta = response[i].IdGrupoRespuesta;
                        let token = '{{csrf_token()}}';
                        $.ajax({
                            url: '{{ route('getResponses') }}',
                            type: "POST",
                            data: {
                                IdGrupoRespuesta:IdGrupoRespuesta,
                                response:response,
                                _token: token
                            },
                            success: function(response){
                                response.data.forEach(element => {
                                    let respuestaHTML = `<li>
                                                            <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdRespuestaDet}">
                                                            <label for="radio${j}">${element.Descripcion}</label>
                                                        </li>`;
                                    contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                    if (j == (response.data.length -1)){
                                        document.getElementById("loader").style.display = "none";
                                    }

                                    if(j === (response.data.length - 1)){
                                        let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                        categoria.innerHTML = categoriaHTML;
                                        let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}.- ${response.data2[i].Pregunta}</label>`;
                                        contenedor.innerHTML = preguntaHTML;
                                    }
                                    
                                    let alerta4 = ``;
                                    if(i == (response.data2.length - 1)){
                                            i = i;
                                            document.getElementById('iniciar').style = "text-align: center; display:block";
                                            document.getElementById('botones').style = "display:none";
                                            let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                            let contenidoBoton = document.getElementById('iniciar');
                                            contenidoBoton.innerHTML = boton;
                                            document.getElementById('enviar2').disabled = true;

                                            document.getElementById('enviar2').onclick = function(){
                                                enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                            }
                                    }
                                    j++;
                                });

                                
                                let radios = document.querySelectorAll('input[type=radio]');

                                for (let h=0; h<radios.length; h++){
                                    radios[h].addEventListener("change", function(){
                                        var radioSelected = radios[h].checked;
                                        if(radioSelected){
                                            var idRadio = radios[h].getAttribute("id"); 
                                            arrayPregunta[i] = response.data2[i].IdPregunta;
                                            arrayRespuesta[i] = radios[h].value;
                                            arrayCampo[i]="";
                                            document.getElementById("btnSiguiente").disabled = false;
                                            if(i == (response.data2.length - 1)){
                                                document.getElementById('enviar2').disabled = false;
                                                                                            
                                                alerta4 = ` <div class="alert alert-success" role="alert">
                                                                <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                            </div>`;   
                                                                        
                                                document.getElementById('alertt').innerHTML = alerta4;
                                            }
                                        }else{
                                            document.getElementById("btnSiguiente").disabled = true; 
                                        }
                                    })
                                }
                            },
                            error: function( e ) {
                                console.log(e);
                            }
                        }); 
                    }else{
                        if(response[i].GrupoRespuesta === "Sin Agrupador"){
    
                            let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Numero}.- ${response[i].Pregunta}</label>`;
                            contenedor.innerHTML = preguntaHTML;
                            let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response[i].Agrupador}</p>`;
                            categoria.innerHTML = categoriaHTML;
    
                            let respuestaHTML = `<input class="abiertas" type="text" placeholder="Escribe tu respuesta aquí">`;
                            contenedorRespuesta.innerHTML = respuestaHTML;
    
                        }else{
                            if(response[i].GrupoRespuesta === "Falso - Verdadero"){
                                let IdEncuesta = document.getElementById('IdEncuesta').value;
                                document.getElementById('respuestaa').style = "width:50%";
                                let IdGrupoRespuesta = response[i].IdGrupoRespuesta;
                                let token = '{{csrf_token()}}';
                                $.ajax({
                                    url: '{{ route('getResponses') }}',
                                    type: "POST",
                                    data: {
                                        IdGrupoRespuesta:IdGrupoRespuesta,
                                        response:response,
                                        _token: token
                                    },
                                    success: function(response){

                                        if(IdEncuesta == 11){
                                            if(i == 1 || i == 2 || i == 3){
                                                if(i == 2){
                                                    if(response3[i-1].IdRespuestaDet == 17){
                                                        condicionRiesgo++;
                                                    }
                                                }else{
                                                    if(i == 3){
                                                        if(response3[i-2].IdRespuestaDet == 17){
                                                            condicionRiesgo++;
                                                        }
                                                        if(response3[i-1].IdRespuestaDet == 17){
                                                            condicionRiesgo++;
                                                        }
                                                    }
                                                }
                                            }
                                            
                                        }
                                        response.data.forEach(element => {
                                            if(response.data2[i].Pregunta == "¿Rola Turnos?"){
                                                arrayCampo[i] = "RolaTurno";
                                                let respuestaHTML = `<li>
                                                                    <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.Descripcion}">
                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                </li>`;
                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                                if (j == (response.data.length -1)){
                                                    document.getElementById("loader").style.display = "none";
                                                }

                                                if(j === (response.data.length - 1)){
                                                    let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}.- ${response.data2[i].Pregunta}</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                }
                                                
                                            }else{
                                                arrayCampo[i] = "";
                                                let respuestaHTML = ``;

                                                if( condicionRiesgo == 2 && i == 3){

                                                    respuestaHTML = `<li>
                                                                        <input type="radio" id="radio${j}" name="radio01" onClick="" value="${element.IdRespuestaDet}">
                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                    </li>`;
                                                }else{

                                                    if(response.data2[i].Pregunta == "Soy jefe de otros trabajadores:"){
                                                        respuestaHTML = `<li>
                                                                        <input type="radio" id="radio${j}" name="radio01" onClick="" value="${element.IdRespuestaDet}">
                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                    </li>`;
                                                    }else{
                                                        respuestaHTML = `<li>
                                                                        <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdRespuestaDet}">
                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                    </li>`;
                                                    }
                                                }
                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                                if (j == (response.data.length -1)){
                                                    document.getElementById("loader").style.display = "none";
                                                }

                                                if(j === (response.data.length - 1)){
                                                    let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}.- ${response.data2[i].Pregunta}</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                }

                                                let alerta2 = ``;

                                                if(i == (response.data2.length - 1)){
                                                    i = i;
                                                    document.getElementById('iniciar').style = "text-align: center; display:block";
                                                    document.getElementById('botones').style = "display:none";
                                                    let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                    let contenidoBoton = document.getElementById('iniciar');
                                                    contenidoBoton.innerHTML = boton;
                                                    document.getElementById('enviar2').disabled = true;

                                                    document.getElementById('enviar2').onclick = function(){
                                                        enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                    }
                                                }
                                            }
                                            j++;
                                            
                                        });

                                        
                                        let radios = document.querySelectorAll('input[type=radio]');
                                        let alerta = ``;
                                        let alerta3 = ``;

                                        for (let h=0; h<radios.length; h++){
                                            radios[h].addEventListener("change", function(){
                                                var radioSelected = radios[h].checked;
                                                
                                                if(radioSelected){

                                                    var idRadio = radios[h].getAttribute("id"); 
                                                    arrayPregunta[i] = response.data2[i].IdPregunta;
                                                    arrayRespuesta[i] = radios[h].value;
                                                    if(IdEncuesta == 11){
                                                        if(i == 1 || i == 2 || i == 3){
                                                            if(arrayRespuesta[i] == 17){

                                                                bandera++;  
                                                                if(condicionRiesgo == 2){
                                                                    document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                    document.getElementById('botones').style = "display:none";
                                                                    let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                    let contenidoBoton = document.getElementById('iniciar');
                                                                    contenidoBoton.innerHTML = boton;

                                                                    alerta = ` <div class="alert alert-success" role="alert">
                                                                        <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                    </div>`;   
                                                                    
                                                                    document.getElementById('alertt').innerHTML = alerta;

                                                                    document.getElementById('enviar2').onclick = function(){
                                                                        enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                        // document.getElementById('aEnviar').href = `{{ route('nom035') }}`;
                                                                        condicionRiesgo++;
                                                                    }
                                                                }else{
                                                                    document.getElementById('iniciar').style = "text-align: center; display:none";
                                                                }
                                                            }else{

                                                                if(bandera > 0){
                                                                    bandera--;
                                                                }

                                                                if(condicionRiesgo == 2){
                                                                    alerta = ` <div class="alert alert-success" role="alert">
                                                                                    <p>Dale click al botón siguiente para continuar</strong></p>
                                                                                </div>`;  
                                                                    document.getElementById('alertt').innerHTML = alerta;
                                                                }

                                                                document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
                                                                document.getElementById('iniciar').style = "text-align: center; display:none";
                                                            }
                                                        }
                                                    }

                                                    if(IdEncuesta == 12){
                                                        if(response.data2[i].Pregunta == "En mi trabajo debo brindar servicio a clientes o usuarios:"){
                                                            if(arrayRespuesta[i] == 17){
                                                                condicionada = true;
                                                            }else{
                                                                condicionada = false;
                                                            }
                                                        }
                                                        
                                                        if(response.data2[i].Pregunta == "Soy jefe de otros trabajadores:"){
                                                            if(arrayRespuesta[i] == 17){
                                                                document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                    document.getElementById('botones').style = "display:none";
                                                                    let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                    let contenidoBoton = document.getElementById('iniciar');
                                                                    contenidoBoton.innerHTML = boton;
                                                                    document.getElementById('enviar2').disabled = false;

                                                                    alerta3 = ` <div class="alert alert-success" role="alert">
                                                                        <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                    </div>`;   
                                                                    
                                                                    document.getElementById('alertt').innerHTML = alerta3;

                                                                    document.getElementById('enviar2').onclick = function(){
                                                                        condicionada = true;
                                                                        let fecha;
                                                                        terminado = 3;
                                                                        enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                        // if(condicionada == true){
                                                                        //     for(let o = 0; o < 4; o++){
                                                                        //         let fecha;
                                                                        //         i++;
                                                                        //         arrayRespuesta[i] = null;
                                                                        //         arrayPregunta[i] = response.data2[i].IdPregunta;
                                                                        //         terminado = terminado;
                                                                        //         fecha = fecha;
                                                                        //         if (o < 3){
                                                                        //             // setRespuestaNomales(arrayRespuesta[i],arrayPregunta[i],terminado,fecha,response.data2[i].IdAgrupador);
                                                                        //         }else{
                                                                        //             // enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                        //         }
                                                                            
                                                                        //     }
                                                                        // }
                                                                    }
                                                            }else{
                                                                condicionada = false;

                                                                
                                                                alerta3 = ` <div class="alert alert-success" role="alert">
                                                                        <p>Para continuar dale click al botón siguiente</p>
                                                                    </div>`;   
                                                                    
                                                                document.getElementById('alertt').innerHTML = alerta3;

                                                                document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
                                                                document.getElementById('iniciar').style = "text-align: center; display:none";
                                                            }
                                                        }
                                                    }
                                                    document.getElementById("btnSiguiente").disabled = false;
                                                    if(i == (response.data2.length - 1)){
                                                        alerta2 = ` <div class="alert alert-success" role="alert">
                                                                        <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                    </div>`;   
                                                                    
                                                        document.getElementById('alertt').innerHTML = alerta2;
                                                        document.getElementById('enviar2').disabled = false;
                                                    }
                                                }else{
                                                    document.getElementById("btnSiguiente").disabled = true; 
                                                }
                                            })
                                        }
                                    },
                                    error: function( e ) {
                                        console.log(e);
                                    }
                                }); 
                            
                            }else{
                                if(response[i].GrupoRespuesta === "Encabezado"){
    
                                    let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}</label>`;
                                    contenedor.innerHTML = preguntaHTML;
                                    let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response[i].Agrupador}</p>`;
                                    categoria.innerHTML = categoriaHTML;
                                    arrayPregunta[i] = response[i].IdPregunta;
                                    response2.forEach(element => {
                                        if(element.GrupoRespuesta === response[i].GrupoRespuesta){
                                            arrayRespuesta[i] = element.IdRespuestaDet;
                                        }
                                    });
                                    document.getElementById("btnSiguiente").disabled = false;
    
                                }else{
                                    let Consulta = response[i].GrupoRespuesta;
                                    let token = '{{csrf_token()}}';
                                    let IdCliente = document.getElementById('cliente_id').value;
                                    $.ajax({
                                        url: '{{ route('getRespuestas') }}',
                                        type: "POST",
                                        data: {
                                            Consulta:Consulta,
                                            response:response,
                                            IdCliente:IdCliente,
                                            i:i,
                                            _token: token
                                        },
                                        success: function(response){
                                            if(response.data2[i].Pregunta === "Ocupación / Puesto" || response.data2[i].Pregunta === "Departamento" || response.data2[i].Pregunta === "Centro de Trabajo"){
                                            document.getElementById('respuestaa').style = "width:80%";
                                            let select = document.createElement("select");
                                                response.data.forEach( function(element,index) {
                                                    let opcion = document.createElement("option");
                                                    opcion.value = `${element.IdGeneral}`;
                                                    opcion.innerHTML = `${element.Descripcion}`;
                                                    select.setAttribute("class", "form-control");
                                                    select.setAttribute("id", "selecc");
                                                    select.appendChild(opcion);
                                                    select.style = "font-size:1.7rem; background-color:#e6e6e6; border-radius: 5px; height: 45px";
    
                                                    if (index <= (response.data.length -1)){
                                                        document.getElementById("loader").style.display = "none";
                                                    }
    
                                                    if(index === (response.data.length - 1)){
                                                        let i = response.i;
                                                        let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}- ${response.data2[i].Pregunta}</label>`;
                                                        contenedor.innerHTML = preguntaHTML;
                                                        let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                        categoria.innerHTML = categoriaHTML;
                                                    }
                                                });
                                                contenedorRespuesta.appendChild(select);
                                                let valor = document.getElementById('selecc').value;
                                                arrayPregunta[i] = response.data2[i].IdPregunta;
                                                arrayRespuesta[i] = valor;
                                                switch (response.data2[i].Pregunta) {
                                                    case 'Ocupación / Puesto':
                                                        arrayCampo[i] = "IdPuestoCliente";
                                                    break;
                                                    case 'Departamento':
                                                        arrayCampo[i] = "IdDeptoCliente";
                                                    break;
                                                    case 'Centro de Trabajo':
                                                        arrayCampo[i] = "IdCentroTrabajo";
                                                    break;
                                                    default:
                                                        arrayCampo[i]= "";     
                                                }
                                                document.getElementById("selecc").addEventListener("change", function(event){
                                                    event.preventDefault();
                                                    valor = document.getElementById('selecc').value;
                                                    arrayPregunta[i] = response.data2[i].IdPregunta;
                                                    arrayRespuesta[i] = valor;
                                                    switch (response.data2[i].Pregunta) {
                                                        case 'Ocupación / Puesto':
                                                            arrayCampo[i] = "IdPuestoCliente";
                                                        break;
                                                        case 'Departamento':
                                                            arrayCampo[i] = "IdDeptoCliente";
                                                        break;
                                                        case 'Centro de Trabajo':
                                                            arrayCampo[i] = "IdCentroTrabajo";
                                                        break;
                                                        default:
                                                            arrayCampo[i]= "";     
                                                    }
                                                });
                                                document.getElementById("btnSiguiente").disabled = false;
                                            }else{
                                                response.data.forEach( function(element,index) {
                                                    j++;
                                                    if(response.data.length > 5){
                                                        document.getElementById('respuestaa').style = "width:80%";
                                                        if(element.Descripcion !== "Encabezado"){
                                                        let respuestaHTML = `<li class="col-md-6">
                                                                                <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdGeneral}">
                                                                                <label for="radio${j}">${element.Descripcion}</label>
                                                                            </li>`;
                                                        contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                        }
    
                                                        if (j < (response.data.length -1)){
                                                            document.getElementById("loader").style.display = "none";
                                                        }
    
                                                        if(j === (response.data.length - 1)){
                                                            let i = response.i;
                                                            let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}- ${response.data2[i].Pregunta}</label>`;
                                                            contenedor.innerHTML = preguntaHTML;
                                                            let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                            categoria.innerHTML = categoriaHTML;
                                                        }
                                                    }else{
                                                        if(element.Descripcion.length > 27){
                                                            document.getElementById('respuestaa').style = "width:70%";
                                                        }else{
                                                            document.getElementById('respuestaa').style = "width:50%"; 
                                                        }
                                                        if(element.Descripcion !== "Encabezado"){
                                                        let respuestaHTML = `<li>
                                                                                <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdGeneral}">
                                                                                <label for="radio${j}">${element.Descripcion}</label>
                                                                            </li>`;
                                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                        }
    
                                                        if (index < (response.data.length -1)){
                                                            document.getElementById("loader").style.display = "none";
                                                        }
    
                                                        if(j === (response.data.length - 1)){
                                                            let i = response.i;
                                                            let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}- ${response.data2[i].Pregunta}</label>`;
                                                            contenedor.innerHTML = preguntaHTML;
                                                            let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                            categoria.innerHTML = categoriaHTML;
                                                        }
                                                    }
                                                });
    
                                                let radios = document.querySelectorAll('input[type=radio]');
    
                                                for (let h=0; h<radios.length; h++){
                                                    radios[h].addEventListener("change", function(){
                                                        var radioSelected = radios[h].checked;
                                                        if(radioSelected){
                                                            var idRadio = radios[h].getAttribute("id"); 
                                                            arrayPregunta[i] = response.data2[i].IdPregunta;
                                                            arrayRespuesta[i] = radios[h].value;
                                                                switch (response.data2[i].Pregunta) {
                                                                case 'Seleccione Género':
                                                                arrayCampo[i] = "IdGenero";
                                                                break;
                                                                case 'Rango de Edad':
                                                                arrayCampo[i] = "IdRango";
                                                                break;
                                                                case 'Estado Civil':
                                                                arrayCampo[i] = "IdEstadoCivil";
                                                                break;
                                                                case 'Nivel de Estudios':
                                                                arrayCampo[i] = "IdNivelEstudio";
                                                                break;
                                                                case 'Tipo de Puesto':
                                                                arrayCampo[i] = "IdTipoPuesto";
                                                                break;
                                                                case 'Tipo de Contrato':
                                                                arrayCampo[i] = "IdTipoContrato";
                                                                break;
                                                                case 'Tipo de Personal':
                                                                arrayCampo[i] = "IdTipoPersonal";
                                                                break;
                                                                case 'Tipo de Jornada':
                                                                arrayCampo[i] = "IdTipoJornada";
                                                                break;
                                                                case 'Antigüedad en el Puesto':
                                                                arrayCampo[i] = "IdAntiguedad";
                                                                break;
                                                                case 'Experiencia Laboral':
                                                                arrayCampo[i] = "IdExperiencia";
                                                                break;
                                                                case 'Rola Turnos':
                                                                arrayCampo[i] = "RolaTurno";
                                                                break;
                                                                
                                                            }
                                                            document.getElementById("btnSiguiente").disabled = false;
                                                        }else{
                                                            document.getElementById("btnSiguiente").disabled = true; 
                                                        }
                                                    })
                                                }
                                            }
                                        },
                                        error: function( e ) {
                                            console.log(e);
                                        }
                                    }); 
                                }
                            }
                        } 
                    }  
                    
                        // Evento para el boton siguiente
                        document.getElementById('btnSiguiente').onclick = function(){
                            document.getElementById('alertt').innerHTML = ``;
                            terminado = 2;
                            condicionRiesgo = condicionRiesgo+bandera;
                            bandera = 0;
                            if(arrayCampo[i] !== "" && arrayCampo[i] !== undefined){
                                setRespuesta( arrayRespuesta[i],arrayPregunta[i], arrayCampo[i],terminado);
                            }else{
                                let fecha;
                                if(condicionada == true){
                                    setRespuestaNomales(arrayRespuesta[i],arrayPregunta[i],terminado,fecha,response[i].IdAgrupador);
                                    for(let o = 0; o < 4; o++){
                                        i++;
                                        arrayRespuesta[i] = null;
                                        arrayPregunta[i] = response[i].IdPregunta;
                                        terminado = terminado;
                                        fecha = fecha;
                                        setRespuestaNomales(arrayRespuesta[i],arrayPregunta[i],terminado,fecha,response[i].IdAgrupador);
                                    }
                                    condicionada = false;
                                }else{
                                    setRespuestaNomales(arrayRespuesta[i],arrayPregunta[i],terminado,fecha,response[i].IdAgrupador);
                                }
                                
                            }
                            if(i == 3){
                                condicionRiesgo++;
                            }
                            i++;
                            categoria.innerHTML = "";
                            contenedor.innerHTML = "";
                            contenedorRespuesta.innerHTML = "";
                            j = 0;
                            document.getElementById("btnSiguiente").disabled = true;
                            document.getElementById("loader").style.display = "block";
                        
                            if(response[i].GrupoRespuesta === "Opción múltiple (valor de 0 a 4)" || response[i].GrupoRespuesta === "Opción múltiple (valor de 4 a 0)"){
                                document.getElementById('respuestaa').style = "width:50%";
                                let IdGrupoRespuesta = response[i].IdGrupoRespuesta;
                                let token = '{{csrf_token()}}';
                                            $.ajax({
                                                url: '{{ route('getResponses') }}',
                                                type: "POST",
                                                data: {
                                                    IdGrupoRespuesta:IdGrupoRespuesta,
                                                    response:response,
                                                    _token: token
                                                },
                                                success: function(response){
                                                    response.data.forEach(element => {
                                                        if (j == (response.data.length -1)){
                                                            document.getElementById("loader").style.display = "none";
                                                        }
            
                                                        let respuestaHTML = `<li>
                                                                                <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdRespuestaDet}">
                                                                                <label for="radio${j}">${element.Descripcion}</label>
                                                                            </li>`;
                                                        contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
            
                                                        if(j == (response.data.length - 1)){
                                                            let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                            categoria.innerHTML = categoriaHTML;
                                                            let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}.- ${response.data2[i].Pregunta}</label>`;
                                                            contenedor.innerHTML = preguntaHTML;
                                                        }
            
                                                        
                                                        if(i == (response.data2.length - 1)){
                                                                i = i;
                                                                document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                document.getElementById('botones').style = "display:none";
                                                                let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                let contenidoBoton = document.getElementById('iniciar');
                                                                contenidoBoton.innerHTML = boton;
                                                                document.getElementById('enviar2').disabled = true;
            
                                                                document.getElementById('enviar2').onclick = function(){
                                                                    enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                }
                                                        }
                                                        j++;
                                                    });
            
                                                    
                                                    let radios = document.querySelectorAll('input[type=radio]');
                                                    let alerta5 = ``;
            
                                                    for (let h=0; h<radios.length; h++){
                                                        radios[h].addEventListener("change", function(){
                                                            var radioSelected = radios[h].checked;
                                                            if(radioSelected){
                                                                var idRadio = radios[h].getAttribute("id"); 
                                                                arrayPregunta[i] = response.data2[i].IdPregunta;
                                                                arrayRespuesta[i] = radios[h].value;
                                                                arrayCampo[i]="";
                                                                document.getElementById("btnSiguiente").disabled = false;
                                                                if(i == (response.data2.length - 1)){
                                                                    document.getElementById('enviar2').disabled = false;
                                                                    alerta5 = ` <div class="alert alert-success" role="alert">
                                                                                    <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                                </div>`;   
                                                                                            
                                                                    document.getElementById('alertt').innerHTML = alerta5;
                                                                }
                                                            }else{
                                                                document.getElementById("btnSiguiente").disabled = true; 
                                                            }
                                                        })
                                                    }
                                                },
                                                error: function( e ) {
                                                    console.log(e);
                                                }
                                            }); 
            
            
                            }else{
                                if(response[i].GrupoRespuesta === "Sin Agrupador"){
            
                                    let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Numero}.- ${response[i].Pregunta}</label>`;
                                    contenedor.innerHTML = preguntaHTML;
                                    let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response[i].Agrupador}</p>`;
                                    categoria.innerHTML = categoriaHTML;
            
                                    let respuestaHTML = `<input class="abiertas" type="text" placeholder="Escribe tu respuesta aquí">`;
                                    contenedorRespuesta.innerHTML = respuestaHTML;
            
                                }else{
                                    if(response[i].GrupoRespuesta === "Falso - Verdadero"){

                                            let IdEncuesta = document.getElementById('IdEncuesta').value;
                                            document.getElementById('respuestaa').style = "width:50%";
                                            let IdGrupoRespuesta = response[i].IdGrupoRespuesta;
                                            let token = '{{csrf_token()}}';
                                            $.ajax({
                                                url: '{{ route('getResponses') }}',
                                                type: "POST",
                                                data: {
                                                    IdGrupoRespuesta:IdGrupoRespuesta,
                                                    response:response,
                                                    _token: token
                                                },
                                                success: function(response){
                                                    response.data.forEach(element => {
                                                        if(response.data2[i].Pregunta == "¿Rola Turnos?"){
                                                            arrayCampo[i] = "RolaTurno";
                                                            if (j == (response.data.length -1)){
                                                                document.getElementById("loader").style.display = "none";
                                                            }
            
                                                            let respuestaHTML = `<li>
                                                                                    <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.Descripcion}">
                                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                                </li>`;
                                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
            
                                                            if(j === (response.data.length - 1)){
                                                                let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                                categoria.innerHTML = categoriaHTML;
                                                                let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}.- ${response.data2[i].Pregunta}</label>`;
                                                                contenedor.innerHTML = preguntaHTML;
                                                            }
                                                        }else{

                                                            arrayCampo[i] = "";
                                                            if (j == (response.data.length -1)){
                                                                document.getElementById("loader").style.display = "none";
                                                            }

                                                            let respuestaHTML = ``; 

                                                            if( condicionRiesgo == 2 && i == 3){

                                                                respuestaHTML = `<li>
                                                                                    <input type="radio" id="radio${j}" name="radio01" onClick="" value="${element.IdRespuestaDet}">
                                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                                </li>`;
                                                            }else{
                                                                if(response.data2[i].Pregunta == "Soy jefe de otros trabajadores:"){
                                                                    respuestaHTML = `<li>
                                                                                    <input type="radio" id="radio${j}" name="radio01" onClick="" value="${element.IdRespuestaDet}">
                                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                                </li>`; 
                                                                }else{

                                                                    respuestaHTML = `<li>
                                                                                    <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdRespuestaDet}">
                                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                                </li>`;
                                                                }
                                                            }
            
                                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
            
                                                            if(j == (response.data.length - 1)){
                                                                let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                                categoria.innerHTML = categoriaHTML;
                                                                let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}.- ${response.data2[i].Pregunta}</label>`;
                                                                contenedor.innerHTML = preguntaHTML;
                                                            }
            
                                                            if(i == (response.data2.length - 1)){
                                                                i = i;
                                                                document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                document.getElementById('botones').style = "display:none";
                                                                let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                let contenidoBoton = document.getElementById('iniciar');
                                                                contenidoBoton.innerHTML = boton;
                                                                document.getElementById('enviar2').disabled = true;
            
                                                                document.getElementById('enviar2').onclick = function(){
                                                                    enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                }
                                                            }
                                                        }
                                                        j++;
                                                    });
            
                                                    
                                                    let radios = document.querySelectorAll('input[type=radio]');
                                                    let alerta = ``;
                                                    let alerta6 = ``;
            
                                                    for (let h=0; h<radios.length; h++){
                                                        radios[h].addEventListener("change", function(){
                                                            var radioSelected = radios[h].checked;
                                                            if(radioSelected){
                                                                var idRadio = radios[h].getAttribute("id"); 
                                                                arrayPregunta[i] = response.data2[i].IdPregunta;
                                                                arrayRespuesta[i] = radios[h].value;
                                                                if(IdEncuesta == 11){
                                                                    if(i == 1 || i == 2 || i == 3){
                                                                        if(arrayRespuesta[i] == 17){
                                                                            bandera++;  
                                                                            if( condicionRiesgo == 2){
                                                                                document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                                document.getElementById('botones').style = "display:none";
                                                                                let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                                let contenidoBoton = document.getElementById('iniciar');
                                                                                contenidoBoton.innerHTML = boton;

                                                                                            
                                                                                alerta = ` <div class="alert alert-success" role="alert">
                                                                                    <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                                </div>`;   
                                                                                
                                                                                document.getElementById('alertt').innerHTML = alerta;

            
                                                                                document.getElementById('enviar2').onclick = function(){
                                                                                    enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                                    condicionRiesgo++;
                                                                                }
                                                                            }else{
                                                                                document.getElementById('iniciar').style = "text-align: center; display:none";
                                                                            }
                                                                        }else{
                                                                            if(bandera > 0){
                                                                                bandera--;
                                                                            }

                                                                            if( condicionRiesgo == 2){   
                                                                                alerta = ` <div class="alert alert-success" role="alert">
                                                                                        <p>Dale click al botón siguiente para continuar</strong></p>
                                                                                    </div>`;  
                                                                                document.getElementById('alertt').innerHTML = alerta; 
                                                                            }

                                                                            document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
                                                                            document.getElementById('iniciar').style = "text-align: center; display:none";
                                                                        }
                                                                    }
                                                                }
            
                                                                if(IdEncuesta == 12){
                                                                    if(response.data2[i].Pregunta == "En mi trabajo debo brindar servicio a clientes o usuarios:"){
                                                                        if(arrayRespuesta[i] == 17){
                                                                            condicionada = true;
                                                                        }else{
                                                                            condicionada = false;
                                                                        }
                                                                    }
                                                                    if(response.data2[i].Pregunta == "Soy jefe de otros trabajadores:"){
                                                                        
                                                                        if(arrayRespuesta[i] == 17){
                                                                            
                                                                                document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                                document.getElementById('botones').style = "display:none";
                                                                                let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                                let contenidoBoton = document.getElementById('iniciar');
                                                                                contenidoBoton.innerHTML = boton;
                                                                                document.getElementById('enviar2').disabled = false;

                                                                                alerta6 = ` <div class="alert alert-success" role="alert">
                                                                                                <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                                            </div>`;   
                                                                                                        
                                                                                document.getElementById('alertt').innerHTML = alerta6;
            
                                                                                document.getElementById('enviar2').onclick = function(){
                                                                                    condicionada = true;
                                                                                    let fecha;
                                                                                    terminado = 3;
                                                                                    
                                                                                    enviarDatos(arrayPregunta[i],arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                                    // if(condicionada == true){
                                                                                    //     for(let o = 0; o < 4; o++){
                                                                                    //         let fecha;
                                                                                    //         i++;
                                                                                    //         arrayRespuesta[i] = null;
                                                                                    //         arrayPregunta[i] = response.data2[i].IdPregunta;
                                                                                    //         terminado = terminado;
                                                                                    //         fecha = fecha;
                                                                                    //         if (o < 3){
                                                                                    //             // setRespuestaNomales(arrayRespuesta[i],arrayPregunta[i],terminado,fecha,response.data2[i].IdAgrupador);
                                                                                    //         }else{
                                                                                    //             // enviarDatos(arrayPregunta[i],arrayRespuesta[i],arrayCampo[i],response.data2[i].IdAgrupador);
                                                                                    //         }
                                                                                        
                                                                                    //     }
                                                                                    // }
                                                                                }
            
                                                                        }else{
                                                                            condicionada = false;
                                                                            document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
                                                                            document.getElementById('iniciar').style = "text-align: center; display:none";

                                                                                
                                                                            alerta6 = ` <div class="alert alert-success" role="alert">
                                                                                    <p>Para continuar dale click al botón siguiente</p>
                                                                                </div>`;   
                                                                                
                                                                            document.getElementById('alertt').innerHTML = alerta6;
                                                                        }
                                                                    }
                                                                }
                                                                document.getElementById("btnSiguiente").disabled = false;
                                                                if(i == (response.data2.length - 1)){
                                                                    document.getElementById('enviar2').disabled = false;
                                                                    alerta2 = ` <div class="alert alert-success" role="alert">
                                                                        <p>Para finalizar la encuesta dale click al botón <strong>Enviar</strong></p>
                                                                    </div>`;   
                                                                    
                                                                    document.getElementById('alertt').innerHTML = alerta2;
                                                                }
                                                            }else{
                                                                document.getElementById("btnSiguiente").disabled = true; 
                                                            }
                                                        })
                                                    }
                                                },
                                                error: function( e ) {
                                                    console.log(e);
                                                }
                                            }); 
                                    
                                    }else{
                                        if(response[i].GrupoRespuesta === "Encabezado"){
            
                                            let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}</label>`;
                                            contenedor.innerHTML = preguntaHTML;
                                            let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response[i].Agrupador}</p>`;
                                            categoria.innerHTML = categoriaHTML;
                                            arrayPregunta[i] = response[i].IdPregunta;
                                            arrayRespuesta[i] = "";
                                            document.getElementById("btnSiguiente").disabled = false;
            
                                        }else{
                                            let IdPersonal = document.getElementById('id_personal').value;
                                            let Consulta = response[i].GrupoRespuesta;
                                            let token = '{{csrf_token()}}';
                                            let IdCliente = document.getElementById('cliente_id').value;
                                            $.ajax({
                                                url: '{{ route('getRespuestas') }}',
                                                type: "POST",
                                                data: {
                                                    Consulta:Consulta,
                                                    response:response,
                                                    IdCliente:IdCliente,
                                                    IdPersonal:IdPersonal,
                                                    i:i,
                                                    _token: token
                                                },
                                                success: function(response){
                                                    if(response.data2[i].Pregunta === "Ocupación / Puesto" || response.data2[i].Pregunta === "Departamento" || response.data2[i].Pregunta === "Centro de Trabajo"){
                                                    document.getElementById('respuestaa').style = "width:80%";
                                                    let select = document.createElement("select");
                                                        response.data.forEach( function(element,index) {
                                                            
                                                            let opcion = document.createElement("option");
                                                            opcion.value = `${element.IdGeneral}`;
                                                            opcion.innerHTML = `${element.Descripcion}`;

                                                            if(response.data2[i].Pregunta=="Centro de Trabajo"){

                                                                console.log(response.idCen);
                                                                console.log(element.IdGeneral);
                                                                if(response.idCen == `${element.IdGeneral}`){
                                                                    opcion.selected = `${element.IdGeneral}`;
                                                                }
                                                                select.disabled = true;
                                                            }

                                                            select.setAttribute("class", "form-control");
                                                            select.setAttribute("id", "selecc");
                                                            select.appendChild(opcion);
                                                            select.style = "font-size:1.7rem; background-color:#e6e6e6; border-radius: 5px; height: 45px";
            
                                                            if (index <= (response.data.length -1)){
                                                                document.getElementById("loader").style.display = "none";
                                                            }
            
                                                            if(index === (response.data.length - 1)){
                                                                let i = response.i;
                                                                let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}- ${response.data2[i].Pregunta}</label>`;
                                                                contenedor.innerHTML = preguntaHTML;
                                                                let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                                categoria.innerHTML = categoriaHTML;
                                                            }
                                                        });
                                                        contenedorRespuesta.appendChild(select);
                                                        let valor = document.getElementById('selecc').value;
                                                        arrayPregunta[i] = response.data2[i].IdPregunta;
                                                        arrayRespuesta[i] = valor;
                                                        switch (response.data2[i].Pregunta) {
                                                            case 'Ocupación / Puesto':
                                                                arrayCampo[i] = "IdPuestoCliente";
                                                            break;
                                                            case 'Departamento':
                                                                arrayCampo[i] = "IdDeptoCliente";
                                                            break;
                                                            case 'Centro de Trabajo':
                                                                arrayCampo[i] = "IdCentroTrabajo";
                                                            break;
                                                            default:
                                                                arrayCampo[i]= "";     
                                                        }
                                                        document.getElementById("selecc").addEventListener("change", function(event){
                                                            event.preventDefault();
                                                            valor = document.getElementById('selecc').value;
                                                            arrayPregunta[i] = response.data2[i].IdPregunta;
                                                            arrayRespuesta[i] = valor;
                                                            switch (response.data2[i].Pregunta) {
                                                                case 'Ocupación / Puesto':
                                                                    arrayCampo[i] = "IdPuestoCliente";
                                                                break;
                                                                case 'Departamento':
                                                                    arrayCampo[i] = "IdDeptoCliente";
                                                                break;
                                                                case 'Centro de Trabajo':
                                                                    arrayCampo[i] = "IdCentroTrabajo";
                                                                break;
                                                                default:
                                                                    arrayCampo[i]= "";     
                                                            }
                                                        });
                                                        document.getElementById("btnSiguiente").disabled = false;
                                                    }else{
                                                        response.data.forEach( function(element,index) {
                                                            j++;
                                                            if(response.data.length > 5){
                                                                document.getElementById('respuestaa').style = "width:80%";
                                                                if(element.Descripcion !== "Encabezado"){
                                                                let respuestaHTML = `<li class="col-md-6">
                                                                                        <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdGeneral}">
                                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                                    </li>`;
                                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                                }
            
                                                                if (j < (response.data.length -1)){
                                                                    document.getElementById("loader").style.display = "none";
                                                                }
            
                                                                if(j === (response.data.length - 1)){
                                                                    let i = response.i;
                                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}- ${response.data2[i].Pregunta}</label>`;
                                                                    contenedor.innerHTML = preguntaHTML;
                                                                    let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                                    categoria.innerHTML = categoriaHTML;
                                                                }
                                                            }else{
                                                                if(element.Descripcion.length > 27){
                                                                    document.getElementById('respuestaa').style = "width:70%";
                                                                }else{
                                                                    document.getElementById('respuestaa').style = "width:70%"; 
                                                                }
                                                                if(element.Descripcion !== "Encabezado"){
                                                                let respuestaHTML = `<li>
                                                                                        <input type="radio" id="radio${j}" name="radio01" onClick="Hola(${i},${response.data2.length - 1})" value="${element.IdGeneral}">
                                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                                    </li>`;
                                                                    contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                                }
            
                                                                if (index < (response.data.length -1)){
                                                                    document.getElementById("loader").style.display = "none";
                                                                }
            
                                                                if(j === (response.data.length - 1)){
                                                                    let i = response.i;
                                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Numero}- ${response.data2[i].Pregunta}</label>`;
                                                                    contenedor.innerHTML = preguntaHTML;
                                                                    let categoriaHTML = `<p class="categoriaa" style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                                    categoria.innerHTML = categoriaHTML;
                                                                }
                                                            }
                                                        });
            
                                                        let radios = document.querySelectorAll('input[type=radio]');
            
                                                        for (let h=0; h<radios.length; h++){
                                                            radios[h].addEventListener("change", function(){
                                                                var radioSelected = radios[h].checked;
                                                                if(radioSelected){
                                                                    var idRadio = radios[h].getAttribute("id"); 
                                                                    arrayPregunta[i] = response.data2[i].IdPregunta;
                                                                    arrayRespuesta[i] = radios[h].value;
                                                                        switch (response.data2[i].Pregunta) {
                                                                        case 'Seleccione Género':
                                                                        arrayCampo[i] = "IdGenero";
                                                                        break;
                                                                        case 'Rango de Edad':
                                                                        arrayCampo[i] = "IdRango";
                                                                        break;
                                                                        case 'Estado Civil':
                                                                        arrayCampo[i] = "IdEstadoCivil";
                                                                        break;
                                                                        case 'Nivel de Estudios':
                                                                        arrayCampo[i] = "IdNivelEstudio";
                                                                        break;
                                                                        case 'Tipo de Puesto':
                                                                        arrayCampo[i] = "IdTipoPuesto";
                                                                        break;
                                                                        case 'Tipo de Contrato':
                                                                        arrayCampo[i] = "IdTipoContrato";
                                                                        break;
                                                                        case 'Tipo de Personal':
                                                                        arrayCampo[i] = "IdTipoPersonal";
                                                                        break;
                                                                        case 'Tipo de Jornada':
                                                                        arrayCampo[i] = "IdTipoJornada";
                                                                        break;
                                                                        case 'Antigüedad en el Puesto':
                                                                        arrayCampo[i] = "IdAntiguedad";
                                                                        break;
                                                                        case 'Experiencia Laboral':
                                                                        arrayCampo[i] = "IdExperiencia";
                                                                        break;
                                                                        case 'Rola Turnos':
                                                                        arrayCampo[i] = "RolaTurno";
                                                                        break;
                                                                        
                                                                    }
                                                                    document.getElementById("btnSiguiente").disabled = false;
                                                                }else{
                                                                    document.getElementById("btnSiguiente").disabled = true; 
                                                                }
                                                            })
                                                        }
                                                    }
                                                },
                                                error: function( e ) {
                                                    console.log(e);
                                                }
                                            }); 
                                        }
                                    }
                                } 
                            }
                        }
                         //Fin del evento del boton siguiente
                }
            
            });

            function Hola(i, tamEncuesta){

                if(i != tamEncuesta){
                    document.getElementById('btnSiguiente').click();
                    setTimeout(() => {
                        document.getElementById('btnSiguiente').click();
                    }, 100);

                }
            }
            
    
        function setRespuesta(respuesta,pregunta,campo,terminado){
            let IdEncuesta = document.getElementById('IdEncuesta').value;
            let IdCliente = document.getElementById('cliente_id').value;
            let IdPersonal = document.getElementById('id_personal').value;
            let token = '{{csrf_token()}}';
            $.ajax({
                url: '{{ route('setRespuestas') }}',
                type: "POST",
                data: {
                    respuesta:respuesta,
                    pregunta:pregunta,
                    IdPersonal:IdPersonal,
                    IdCliente:IdCliente,
                    terminado:terminado,
                    IdEncuesta:IdEncuesta,
                    campo:campo,
                    _token: token
                },
                success: function(response){

                },
                error: function( e ) {
                    console.log(e);
                }
            });
        }
    
        function setRespuestaNomales(respuesta,pregunta,terminadoo,fecha,agrupador){

            let IdCentro = document.getElementById('centro').value;
            let IdEncuesta = document.getElementById('IdEncuesta').value;
            let IdCliente = document.getElementById('cliente_id').value;
            let IdPeriodo = document.getElementById('periodo_id').value;
            let IdPersonal = document.getElementById('id_personal').value;
            let terminado = parseInt(terminadoo);

            let token = '{{csrf_token()}}';
            $.ajax({
                url: '{{ route('setRespuestasNormales') }}',
                type: "POST",
                data: {
                    respuesta:respuesta,
                    pregunta:pregunta,
                    IdCliente:IdCliente,
                    IdPersonal:IdPersonal,
                    IdCentro:IdCentro,
                    IdAgrupador:agrupador,
                    terminado:terminado,
                    IdEncuesta:IdEncuesta,
                    IdPeriodo:IdPeriodo,
                    fecha:fecha,
                    _token: token  
                },
                success: function(response){

                },
                error: function( e ) {
                    console.log(e);
                }
            });
        }
    
    
        function enviarDatos(preguntas,respuestas,campo,agrupador){
            let contenedor = document.getElementById("contenido_pregunta");
            let contenedorRespuesta = document.getElementById("contenido_respuesta");
            let categoria = document.getElementById("categoria");
    
            swal("Aviso!", "La encuesta será enviada", "info");
    
            let terminadoFinal = 3;
            if(campo != "" && campo != undefined){
                setRespuesta( respuestas, preguntas,campo,terminadoFinal);
            }else{
                var today = new Date();
                let fechaEnviar = today.getFullYear()+"-"+(today.getMonth() + 1)+"-"+today.getDate()+" "+today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();
                var fecha2 = today.toLocaleString();

                setRespuestaNomales(respuestas,preguntas,terminadoFinal,fechaEnviar,agrupador);
                
                document.getElementById('iniciar').style = "display:none";
                let categoriaHTML = "";
                categoria.innerHTML = categoriaHTML;
                let respuestaHTML = "";
                contenedorRespuesta.innerHTML  = respuestaHTML;
                let preguntaHTML = "";
                preguntaHTML = `<label class="label_pregunta" for="">Muchas gracias por responder la encuesta.</label>`;
                contenedor.innerHTML = preguntaHTML;
                                                                        
                document.getElementById('alertt').innerHTML = ``;
            }
        }
    
        </script>
      </body>
    </html>