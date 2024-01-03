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
          background-image: url("data:image/jpg;base64,''");
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
          margin-left: -1.95em;
          margin-top: .92em;
          border-radius: 100%;
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
    </style>
    
</head>

  <body style="background-color:#f3f3f3">
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

<br><br><br>


@if (session('success'))
{{-- INICIO DEL DIV ROW--}}
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-{{ session('type') }} fade in" style="font-weight:bold">
            {{session('success')}}
            
        </div>
    </div>
</div>
{{-- FIN DEL DIV ROW--}}
@else
    <div class="container-fluid" style="background-color:rgb(255, 123, 0);">
      <div class="row">
        <div class="col text-center">
          <p class="tamFont" style="text-transform:uppercase; color:#fff; padding-top:10px"><strong>BUZÓN DE QUEJAS Y SUGERENCIAS</strong></p>
        </div>
      </div>
    </div>
    <div class="row" style="background-color:#f3f3f3">
    
    </div>
    <!--ENCUESTA-->
    <div id="content" class="container-fluid" style="background-color:#f3f3f3">
      <br><br>
      <form action="{{route('quejaSugStore')}}" method="POST">
      {{ csrf_field() }}
        <div class="row" style="margin-bottom: 20px">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <p style="font-size: 15px; font-weight:400;"><b>¿A qué centro de trabajo pertenece?</b></p>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <select id="centroqueja" name="centroqueja" class="form-control">
              @foreach ($centros as $row)
                <option value="{{$row->IdCentro}}" selected>{{$row->Descripcion}}</option>  
              @endforeach
            </select>
          </div>
          <br><br><br>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <p style="font-size: 15px; font-weight:400;"><b>Tipo de queja o sugerencia:</b></p>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <select id="tipoqueja" name="tipoqueja" class="form-control">
              @foreach ($quejas as $row)
                  <option value="{{$row->IdTipoQueja}}" selected>{{$row->Descripcion}}</option>    
              @endforeach
            </select>
          </div>
          <br><br><br>
          <input type="hidden" name="idCliente" id="idCliente" value="{{$idCliente}}">
          <input type="hidden" name="idPeriodo" id="idPeriodo" value="{{$idPeriodo}}">
          
          <div class="col-lg-12 col-md-12 col-sm-12">
            <p style="font-size: 15px; font-weight:400;"><b>Comentario:</b></p>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <textarea style="font-size: 15px" class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
          </div>
          
          <div class="col-lg-12 col-md-12 col-sm-12"><br>
            <p style="font-size: 15px;"><b>Anónimo:</b></p>
          </div>
          <div class="col-lg-11 col-md-12 col-sm-12" style="display: flex;">
            <div class="">
              <input class="" type="radio" name="anonimo" id="anonimoSi" value="Si" checked>
              <label for="anonimoSi" style="color: black; font-size: 15px;font-weight: normal;">
                Sí
              </label>
            </div>
            <div class="" style="margin-left: 10px">
              <input class="" type="radio" name="anonimo" id="anonimoNo" value="No">
              <label for="anonimoNo" style="color: black; font-size: 15px;font-weight: normal;">
                No
              </label>
            </div>
          </div>
                                {{--<div class="row" id="noAnonimo" style="text-align:start; margin-bottom: 5px;">
                                    <div class="col-md-6 col-sm-12" style="text-align: start; display:none" id="contenidoAnonimo">
                                        <div class="mb-3 col-md-12 col-sm-12">
                                            <label for="exampleFormControlInput1" style="font-size: 15px; font-weight:400" class="form-label">Nombre</label>
                                            <input id="nombrequeja" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                                        </div>
                                        <div class="mb-3 col-md-12 col-sm-12">
                                            <label for="exampleFormControlInput2" style="font-size: 15px; font-weight:400" class="form-label">Correo electrónico</label>
                                            <input id="correoqueja" type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" required>
                                        </div>
                                    </div>
                                </div>
    
                                --}}
        </div>
        <div class="row" id="divAnonimo" style="display: none">
          <div class="col-lg-1">
            <p style="font-size: 15px; font-weight:400;"><b>Nombre:</b></p>
          </div>
          <div class="col-lg-5">
            <input id="nombrequeja" type="text" class="form-control" name="nombrequeja" placeholder="">
          </div>
          <div class="col-lg-1" style="text-align: right">
            <p style="font-size: 15px; font-weight:400;"><b>Correo:</b></p>
          </div>
          <div class="col-lg-5">
            <input id="correoqueja" type="email" class="form-control" name="correoqueja" placeholder="">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: end;">
              <input id="comentarios" type="submit" style="background-color: rgb(255, 123, 0); width:150px" class="btn btn-primary form-control col-4" value="Enviar"/>
          </div>
      </div>
      </form>
      <br><br>
    </div>
@endif

    <!--FIN ENCUESTA-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
          document.getElementById("loader").style.display = "none";
        });

  document.getElementById("anonimoSi").addEventListener("change", function(event){
  event.preventDefault();
  if(document.getElementById("anonimoSi").checked){
    document.getElementById("divAnonimo").style = "display:none;";
  }else{
    document.getElementById("divAnonimo").style = "display:block;";
  }  
  });

  document.getElementById("anonimoNo").addEventListener("change", function(event){
  event.preventDefault();
  if(document.getElementById("anonimoNo").checked){
    document.getElementById("divAnonimo").style = "display:block;";
  }else{
    document.getElementById("divAnonimo").style = "display:none;";
  }  
  });

    </script>
  </body>
</html>