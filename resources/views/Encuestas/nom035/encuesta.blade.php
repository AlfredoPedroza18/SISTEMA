@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->
<style>
    /* Center the loader */
#loader {
  position: absolute;
  left: 56%;
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
        margin-left: -1.80em;
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

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="{{route('nom035')}}">Módulos</a></li>
            <li class="active">
                Encuestas-Nom 035-Distribución-Encuestas
            </li>
        </li>
    </ol>
    <input id="IdEncuesta" type="hidden" value="{{$IdEncuesta}}">
    <div class="panel">
        <div class="plantilla" id="plantillaPregunta">
            {{-- <img src="data:image/jpg;base64,{{$imagen}}" alt=""> --}}  
            <div style="padding: 15px" id="categoria">
                
            </div>

            {{-- <div class="contenido_pregunta"> 
                <div class="pregunta" style="width: 800px">
                    <label class="label_pregunta" for="">1.- Ingrese su nombre</label>
                </div>
                <div class="respuestas">
                    <input class="abiertas" type="text" placeholder="Escribe tu respuesta aquí">
                </div>
            </div> --}}

             {{-- <div class="contenido_pregunta"> 
                <div class="pregunta" style="width: 800px">
                    <label class="label_pregunta" for="">1.- Seleccione sus lugares favoritos</label>
                </div>
                <div class="respuestas">
                    <div class="content" style="margin: 0">
                            <div class="container" style="width: 100%">
                                <ul>
                                    <li>
                                        <input type="radio" id="radio1" name="radio01">
                                        <label for="radio1">Empty</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio2" name="radio01" checked="checked">
                                        <label for="radio2">Checked</label>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div> --}}
            <div class="contenido_pregunta"> 
                <div id="loader"></div>
                <div id="contenido_pregunta" class="pregunta" style="">
                    
                </div>
                <div class="respuestas" id="respuestaa">
                    <div class="content" style="margin: 0">
                            <div class="container" style="width: 100%;" >
                                <ul class="row" id="contenido_respuesta" style="width: 60%; margin: 0 auto">
                                    
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
        <input type="hidden" value="{{$IdCliente}}" id="cliente_id">
    </div>
</div>

<!-- Modal --> 
{{-- <div class="modal text-center" id="terminosCondiciones" data-backdrop="static"data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="infoAyudaTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 1200px; height: 600px">
        <div class="modal-content">
            <div style="padding:5px">
                <h3 style="background-color:rgb(255, 123, 0); width: 95%; margin: 20px auto 0 auto; padding: 10px; color:white; border-radius: 5px">Política de privacidad</h3>
            </div>
            <div class="modal-body">
                @if (empty($politica))
                <iframe id="viewer" src="" frameborder="0" scrolling="no" width="1100" height="600"></iframe>  
                @else
                <iframe id="viewer" src="data:application/pdf;base64,{{$politica[0]->Archivo}}" frameborder="0" scrolling="no" width="1100" height="600"></iframe> 
                @endif
            </div>
            <div class="modal-footer">
                <div style="display: flex; justify-content:space-between; align-items:center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkTerminos">
                        <label class="form-check-label" for="defaultCheck1" style="font-size: 15px">
                          Acepto los términos y condiciones
                        </label>
                    </div>
                    <div>
                        <a type="button" id="btnCancelar" class="btn btn-primary">Cancelar</a>
                        <button type="button" id="btnTerminos" data-backdrop="static" data-keyboard="false" class="btn btn-primary" data-dismiss="modal" disabled>Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- <script type="text/javascript">

    $(document).ready(function(){
        // App.init();
        $('#terminosCondiciones').modal('toggle');
        
        if(localStorage.length > 2){
            let idCliente = localStorage.getItem('idCliente');
            let periodo = localStorage.getItem('periodo');

            localStorage.setItem('icliente',idCliente);
            localStorage.setItem('iperiodo',periodo);

            let icliente = localStorage.getItem('icliente');
            let iperiodo = localStorage.getItem('iperiodo');

            var ruta = "{{ route('distribucion', ['id' => 'temp', 'id2' => 'periodo']) }}";
            ruta = ruta.replace('temp',icliente);
            ruta = ruta.replace('periodo',iperiodo);
            document.getElementById("btnCancelar").href = ruta;
        }else{
            let icliente = localStorage.getItem('icliente');
            let iperiodo = localStorage.getItem('iperiodo');

            var ruta = "{{ route('distribucion', ['id' => 'temp', 'id2' => 'periodo']) }}";
            ruta = ruta.replace('temp',icliente);
            ruta = ruta.replace('periodo',iperiodo);
            document.getElementById("btnCancelar").href = ruta;
        }

    });


   $('#checkTerminos').change(function(){
        if(document.getElementById('checkTerminos').checked){
            $('#btnTerminos').removeAttr("disabled");
        }else{
            document.getElementById('btnTerminos').setAttribute("disabled", "");
        }
   })

</script> --}}

<script>

    $(document).ready(function(){
        getPreguntas();
        document.getElementById("loader").style.display = "none";
    });

    function getPreguntas(){
        let IdEncuesta = document.getElementById('IdEncuesta').value;
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('getPreguntas') }}',
            type: "POST",
            data: {
                IdEncuesta:IdEncuesta,
                _token: token
            },
            success: function(response){
               console.log(response.data.length);
               mostrarBienvenida(response.data, response.data2);
            //    mostrarPreguntas(response.data, response.data2);
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }


    function mostrarBienvenida(response,response2){
        document.getElementById('botones').style = "display:none";
        let contenedor = document.getElementById("contenido_pregunta");
        let bienvenida = `<label class="label_pregunta" for="">Bienvenido a la encuesta de ${response[0].Descripcion}</label>`;
        contenedor.innerHTML = bienvenida;

        let contenidoBoton = document.getElementById('iniciar');
        let boton = `<button id="btnIniciar" type="button" class="btn btn-primary btn-lg">Iniciar Encuesta</button>`;

        contenidoBoton.innerHTML = boton;

        document.getElementById('btnIniciar').onclick = function(){
            mostrarPreguntas(response,response2);
        }


    }

    function mostrarPreguntas(response,response2){
        document.getElementById('iniciar').style = "display:none";
        document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
        let contenedor = document.getElementById("contenido_pregunta");
        let contenedorRespuesta = document.getElementById("contenido_respuesta");
        let categoria = document.getElementById("categoria");
        let i = 0;
        let contador = 0;
        let j = 0;
        let bandera = 0;

        let arrayPregunta = [];
        let arrayRespuesta = [];
        let arrayCampo = [];
        let arrayRespuestaDetalle = [];

        if (i < response.length){
            if ( i === 0){
                if(response[i].GrupoRespuesta === "Opción múltiple"){

                    let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                    let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                    categoria.innerHTML = categoriaHTML;
                    contenedor.innerHTML = preguntaHTML;

                    let IdGrupoRespuesta = response[i].IdGrupoRespuesta;
                    let token = '{{csrf_token()}}';
                                $.ajax({
                                    url: '{{ route('getResponses') }}',
                                    type: "POST",
                                    data: {
                                        IdGrupoRespuesta:IdGrupoRespuesta,
                                        _token: token
                                    },
                                    success: function(response){
                                        response.data.forEach(element => {
                                            j++;
                                            let respuestaHTML = `<li>
                                                                    <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                </li>`;
                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                        });
                                    },
                                    error: function( e ) {
                                        console.log(e);
                                    }
                                }); 

                    // response2.forEach(element => {
                    //     j++;
                    //     let respuestaHTML = `<li>
                    //                             <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                    //                             <label for="radio${j}">${element.Descripcion}</label>
                    //                         </li>`;
                    //     contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                    // });

                    let radios = document.querySelectorAll('input[type=radio]');

                    for (let h=0; h<radios.length; h++){
                        radios[h].addEventListener("change", function(){
                            var radioSelected = radios[h].checked;
                            if(radioSelected){
                                var idRadio = radios[h].getAttribute("id"); 
                                arrayPregunta[i] = response[i].IdPregunta;
                                arrayRespuesta[i] = radios[h].value;
                                document.getElementById("btnSiguiente").disabled = false;
                            }else{
                                document.getElementById("btnSiguiente").disabled = true; 
                            }
                        })
                    }
                    // let radioSeleccionado = document.querySelector('input[name="radio01"]:checked');
                }else{
                    if(response[i].GrupoRespuesta === "Sin Agrupador"){

                        let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                        let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                        categoria.innerHTML = categoriaHTML;
                        contenedor.innerHTML = preguntaHTML;


                        let respuestaHTML = `<input class="abiertas" type="text" placeholder="Escribe tu respuesta aquí">`;
                        contenedorRespuesta.innerHTML = respuestaHTML;

                    }else{
                        if(response[i].GrupoRespuesta === "Falso - Verdadero"){
                            let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                            let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                            categoria.innerHTML = categoriaHTML;
                            contenedor.innerHTML = preguntaHTML;

                            response2.forEach(element => {
                                j++;
                                if(element.Descripcion !== "Encabezado"){

                                    let respuestaHTML = `<li>
                                                            <input type="radio" id="radio${j}" name="radio01" value="${element.IdRespuestaDet}">
                                                            <label for="radio${j}">${element.Descripcion}</label>
                                                        </li>`;
                                    contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                }
                            });

                            let radios = document.querySelectorAll('input[type=radio]');

                            for (let h=0; h<radios.length; h++){
                                radios[h].addEventListener("change", function(){
                                    var radioSelected = radios[h].checked;
                                    if(radioSelected){
                                        var idRadio = radios[h].getAttribute("id"); 
                                        arrayPregunta[i] = response[i].IdPregunta;
                                        arrayRespuesta[i] = radios[h].value;
                                        console.log(arrayRespuesta[i].value);
                                        document.getElementById("btnSiguiente").disabled = false;
                                    }else{
                                        document.getElementById("btnSiguiente").disabled = true; 
                                    }
                                })
                            }
                        }else{
                            if(response[i].GrupoRespuesta === "Encabezado"){

                                let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                                contenedor.innerHTML = preguntaHTML;
                                let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                                categoria.innerHTML = categoriaHTML;
                                arrayPregunta[i] = response[i].IdPregunta;
                                response2.forEach(element => {
                                    if(element.GrupoRespuesta === response[i].GrupoRespuesta){
                                        arrayRespuesta[i] = element.IdRespuestaDet;
                                    }
                                });
                                console.log("Encabezado "+arrayRespuesta);
                                document.getElementById("btnSiguiente").disabled = false;

                            }else{

                                let Consulta = response[i].GrupoRespuesta;
                                let token = '{{csrf_token()}}';
                                $.ajax({
                                    url: '{{ route('getRespuestas') }}',
                                    type: "POST",
                                    data: {
                                        Consulta:Consulta,
                                        response:response,
                                        i:i,
                                        _token: token
                                    },
                                    success: function(response){
                                      
                                        response.data.forEach( function(element,index) {
                                            j++;

                                            if(response.data.length > 5){
                                                if(element.Descripcion !== "Encabezado"){
                                                let respuestaHTML = `<li class="col-md-6">
                                                                        <input type="radio" id="radio${j}" name="radio01" value="${element.IdGeneral}">
                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                    </li>`;
                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                }
                                                if(j === (response.data.length - 1)){
                                                    let i = response.i;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                    let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                }
                                            }else{
                                                if(element.Descripcion !== "Encabezado"){
                                                let respuestaHTML = `<li>
                                                                        <input type="radio" id="radio${j}" name="radio01" value="${element.IdGeneral}">
                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                    </li>`;
                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                }
                                                if(j === (response.data.length - 1)){
                                                    let i = response.i;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                    let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
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
                                                    arrayCampo[i] = "IdGenero";
                                                    document.getElementById("btnSiguiente").disabled = false;
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
                            }
                        }
                    }
                }
            }
            // Evento para el boton siguiente
            document.getElementById('btnSiguiente').onclick = function(){
                console.log(arrayRespuesta[i]);
                console.log(arrayPregunta[i]);
                console.log(arrayCampo[i]);
                
                if(arrayCampo[i] !== "" && arrayCampo[i] !== undefined){
                    console.log("valor: "+arrayCampo[i]);
                    console.log("Entre al if de la consulta");
                    setRespuesta( arrayRespuesta[i], arrayPregunta[i], arrayCampo[i]);
                }else{
                    console.log("Entre al sino de la consulta");
                    setRespuestaNomales(arrayRespuesta[i], arrayPregunta[i]);
                }
                i++;
                categoria.innerHTML = "";
                contenedor.innerHTML = "";
                document.getElementById("btnSiguiente").disabled = true;
                console.log(response.length);
                console.log("i:: "+i);
                if (i === (response.length - 1)){
                    i = i;
                    document.getElementById("loader").style.display = "block";
                    myFunction();
                }else{
                    document.getElementById("loader").style.display = "block";
                    myFunction();
                }
                j = 0;
                contenedorRespuesta.innerHTML = "";
                if(response[i].GrupoRespuesta === "Opción múltiple"){
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
                                            j++;
                                            let respuestaHTML = `<li>
                                                                    <input type="radio" id="radio${j}" name="radio01" value="${element.IdRespuestaDet}">
                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                </li>`;
                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                            if (j < (response.data.length -1)){
                                                document.getElementById("loader").style.display = "none";
                                            }

                                            if(j === (response.data.length - 1)){
                                                let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                categoria.innerHTML = categoriaHTML;
                                                let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                contenedor.innerHTML = preguntaHTML;
                                            }

                                            
                                            if(i === (response.data2.length - 1)){
                                                    i = i;
                                                    document.getElementById('iniciar').style = "text-align: center; display:block";
                                                    console.log("el tamaño es: "+i);
                                                    document.getElementById('botones').style = "display:none";
                                                    let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                    let contenidoBoton = document.getElementById('iniciar');
                                                    contenidoBoton.innerHTML = boton;
                                                    document.getElementById('enviar2').disabled = true;

                                                    document.getElementById('enviar2').onclick = function(){
                                                        enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i]);
                                                        // document.getElementById('aEnviar').href = `{{ route('nom035') }}`;
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
                                                    arrayCampo[i]="";
                                                    console.log("RespuestaDetalle: "+arrayRespuesta[i]);
                                                    document.getElementById("btnSiguiente").disabled = false;
                                                    if(i === (response.data2.length - 1)){
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
                    if(response[i].GrupoRespuesta === "Sin Agrupador"){

                        let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                        contenedor.innerHTML = preguntaHTML;
                        let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
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
                                            if(response.data2[i].Pregunta === "Rola Turnos"){
                                                arrayCampo[i] = "RolaTurno";

                                                j++;
                                                let respuestaHTML = `<li>
                                                                    <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                </li>`;
                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                                if (j <= (response.data.length -1)){
                                                    document.getElementById("loader").style.display = "none";
                                                }

                                                if(j === (response.data.length - 1)){
                                                    let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                }
                                            }else{
                                                arrayCampo[i] = "";
                                                j++;
                                                let respuestaHTML = `<li>
                                                                        <input type="radio" id="radio${j}" name="radio01" value="${element.IdRespuestaDet}">
                                                                        <label for="radio${j}">${element.Descripcion}</label>
                                                                    </li>`;
                                                contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                                if (j <= (response.data.length -1)){
                                                    document.getElementById("loader").style.display = "none";
                                                }

                                                if(j === (response.data.length - 1)){
                                                    let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                }

                                                if(i === (response.data2.length - 1)){
                                                    i = i;
                                                    document.getElementById('iniciar').style = "text-align: center; display:block";
                                                    console.log("el tamaño es: "+i);
                                                    document.getElementById('botones').style = "display:none";
                                                    let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                    let contenidoBoton = document.getElementById('iniciar');
                                                    contenidoBoton.innerHTML = boton;
                                                    document.getElementById('enviar2').disabled = true;

                                                    document.getElementById('enviar2').onclick = function(){
                                                        enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i]);
                                                        // document.getElementById('aEnviar').href = `{{ route('nom035') }}`;
                                                    }
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

                                                    if(IdEncuesta == 11){
                                                        if(i == 1 || i == 2 || i == 3){
                                                            if(arrayRespuesta[i] == 17){
                                                                bandera++;  
                                                                if(bandera === 3){
                                                                    document.getElementById('iniciar').style = "text-align: center; display:block";
                                                                    document.getElementById('botones').style = "display:none";
                                                                    let boton = `<a id="aEnviar"><button id="enviar2" type="button" class="btn btn-primary btn-lg">Enviar</button></a>`;
                                                                    let contenidoBoton = document.getElementById('iniciar');
                                                                    contenidoBoton.innerHTML = boton;

                                                                    document.getElementById('enviar2').onclick = function(){
                                                                        enviarDatos(arrayPregunta[i], arrayRespuesta[i],arrayCampo[i]);
                                                                        // document.getElementById('aEnviar').href = `{{ route('nom035') }}`;
                                                                    }
                                                                }else{
                                                                    document.getElementById('iniciar').style = "text-align: center; display:none";
                                                                }
                                                            }else{
                                                                bandera--;
                                                                console.log("banderii " +bandera);
                                                                if(bandera === 3){
                                                 
                                                                }else{
                                                                    document.getElementById('botones').style = "text-align: end; margin-right:10px; display:block";
                                                                    document.getElementById('iniciar').style = "text-align: center; display:none";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    console.log('Respuesta Detalle: '+arrayRespuesta[i]);
                                                    console.log('Pregunta: '+arrayPregunta[i]);
                                                    document.getElementById("btnSiguiente").disabled = false;
                                                    if(i === (response.data2.length - 1)){
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

                                let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                                contenedor.innerHTML = preguntaHTML;
                                let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                                categoria.innerHTML = categoriaHTML;
                                arrayPregunta[i] = response[i].IdPregunta;
                                arrayRespuesta[i] = "";
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
                                                    console.log("Entre al if departamento con index: "+index+" y el tamaño es :"+response.data.length -1);
                                                    document.getElementById("loader").style.display = "none";
                                                }

                                                if(index === (response.data.length - 1)){
                                                    let i = response.i;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                    let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                }
                                            });
                                            contenedorRespuesta.appendChild(select);
                                            let valor = document.getElementById('selecc').value;
                                            console.log(valor);
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
                                            console.log(valor);
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
                                                console.log("Pregunta"+arrayPregunta[i]+" Respuesta id: "+ arrayRespuesta[i]+" Campo: "+arrayCampo[i]);
                                            });
                                            document.getElementById("btnSiguiente").disabled = false;
                                        }else{
                                            response.data.forEach( function(element,index) {
                                                j++;
                                                if(response.data.length > 5){
                                                    document.getElementById('respuestaa').style = "width:80%";
                                                    if(element.Descripcion !== "Encabezado"){
                                                    let respuestaHTML = `<li class="col-md-6">
                                                                            <input type="radio" id="radio${j}" name="radio01" value="${element.IdGeneral}">
                                                                            <label for="radio${j}">${element.Descripcion}</label>
                                                                        </li>`;
                                                    contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                    }

                                                    if (j < (response.data.length -1)){
                                                        document.getElementById("loader").style.display = "none";
                                                    }

                                                    if(j === (response.data.length - 1)){
                                                        let i = response.i;
                                                        let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                        contenedor.innerHTML = preguntaHTML;
                                                        let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
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
                                                                            <input type="radio" id="radio${j}" name="radio01" value="${element.IdGeneral}">
                                                                            <label for="radio${j}">${element.Descripcion}</label>
                                                                        </li>`;
                                                        contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                    }

                                                    if (index < (response.data.length -1)){
                                                        document.getElementById("loader").style.display = "none";
                                                    }

                                                    if(j === (response.data.length - 1)){
                                                        let i = response.i;
                                                        let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                        contenedor.innerHTML = preguntaHTML;
                                                        let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
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
                                                        console.log(arrayRespuesta[i]);
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

            // Evento para el boton Anterior
            document.getElementById('btnAnterior').onclick = function(){
                categoria.innerHTML = "";
                contenedor.innerHTML = "";
                j= 0;
                if(i === 0){
                    i = 0;
                }else{
                    i--;
                }

                contenedorRespuesta.innerHTML = "";
                if(response[i].GrupoRespuesta === "Opción múltiple"){
                    document.getElementById('respuestaa').style = "width:50%"; 
                    document.getElementById("btnSiguiente").disabled = true;

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
                                            j++;
                                            let respuestaHTML = `<li>
                                                                    <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                </li>`;
                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                            if(j === (response.data.length - 1)){
                                                let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                categoria.innerHTML = categoriaHTML;
                                                let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                contenedor.innerHTML = preguntaHTML;
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
                                                    document.getElementById("btnSiguiente").disabled = false;
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
                        document.getElementById("btnSiguiente").disabled = true; 
                        console.log('Entre sin agrupador');
                        let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                        contenedor.innerHTML = preguntaHTML;
                        let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                        categoria.innerHTML = categoriaHTML;

                        let respuestaHTML = `<input class="abiertas" type="text" placeholder="Escribe tu respuesta aquí">`;
                        contenedorRespuesta.innerHTML = respuestaHTML;

                    }else{
                        if(response[i].GrupoRespuesta === "Falso - Verdadero"){
                            document.getElementById('respuestaa').style = "width:50%"; 
                            document.getElementById("btnSiguiente").disabled = true;
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
                                            j++;
                                            let respuestaHTML = `<li>
                                                                    <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                                                                    <label for="radio${j}">${element.Descripcion}</label>
                                                                </li>`;
                                            contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);

                                            if(j === (response.data.length - 1)){
                                                let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                categoria.innerHTML = categoriaHTML;
                                                let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                contenedor.innerHTML = preguntaHTML;
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
                                                    document.getElementById("btnSiguiente").disabled = false;
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
                                console.log('Entre encabezado');
                                let preguntaHTML = `<label class="label_pregunta" for="">${response[i].Pregunta}?</label>`;
                                contenedor.innerHTML = preguntaHTML;
                                let categoriaHTML = `<p style="font-size: 20px">${response[i].Agrupador}</p>`;
                                categoria.innerHTML = categoriaHTML;
                                arrayPregunta[i] = response[i].IdPregunta;
                                arrayRespuesta[i] = "";
                                document.getElementById("btnSiguiente").disabled = false;
                            }else{
                                document.getElementById("btnSiguiente").disabled = true;

                                let Consulta = response[i].GrupoRespuesta;
                                let token = '{{csrf_token()}}';
                                let IdCliente = document.getElementById('cliente_id').value;
                                $.ajax({
                                    url: '{{ route('getRespuestas') }}',
                                    type: "POST",
                                    data: {
                                        Consulta:Consulta,
                                        IdCliente:IdCliente,
                                        response:response,
                                        i:i,
                                        _token: token
                                    },
                                    success: function(response){

                                        if(response.data2[i].Pregunta === "Ocupación / Puesto" || response.data2[i].Pregunta === "Departamento" || response.data2[i].Pregunta === "Centro de Trabajo"){
                                            document.getElementById('respuestaa').style = "width:80%";
                                            let select = document.createElement("select");
                                            response.data.forEach( function(element,index) {
                                                let opcion = document.createElement("option");
                                                opcion.value = `${element.Descripcion}`;
                                                opcion.innerHTML = `${element.Descripcion}`;
                                                select.setAttribute("class", "form-control");
                                                select.appendChild(opcion);

                                                if(index === (response.data.length - 1)){
                                                    let i = response.i;
                                                    let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                    contenedor.innerHTML = preguntaHTML;
                                                    let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
                                                    categoria.innerHTML = categoriaHTML;
                                                }
                                            });
                                            contenedorRespuesta.appendChild(select);
                                            document.getElementById("btnSiguiente").disabled = false;
                                        }else{
                                            response.data.forEach( function(element,index) {
                                                j++;
                                                if(response.data.length > 5){
                                                    document.getElementById('respuestaa').style = "width:80%";
                                                    if(element.Descripcion !== "Encabezado"){
                                                    let respuestaHTML = `<li class="col-md-6">
                                                                            <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                                                                            <label for="radio${j}">${element.Descripcion}</label>
                                                                        </li>`;
                                                    contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                    }


                                                    if(j === (response.data.length - 1)){
                                                        let i = response.i;
                                                        let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                        contenedor.innerHTML = preguntaHTML;
                                                        let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
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
                                                                            <input type="radio" id="radio${j}" name="radio01" value="${element.Descripcion}">
                                                                            <label for="radio${j}">${element.Descripcion}</label>
                                                                        </li>`;
                                                    contenedorRespuesta.insertAdjacentHTML("beforeend", respuestaHTML);
                                                    }
                                                    if(j === (response.data.length - 1)){
                                                        let i = response.i;
                                                        let preguntaHTML = `<label class="label_pregunta" for="">${response.data2[i].Pregunta}?</label>`;
                                                        contenedor.innerHTML = preguntaHTML;
                                                        let categoriaHTML = `<p style="font-size: 20px">${response.data2[i].Agrupador}</p>`;
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
            //Fin del evento del boton anterior
        }
    }

    function setRespuesta(respuesta,pregunta, campo){
        let IdEncuesta = document.getElementById('IdEncuesta').value;
        let IdCliente = document.getElementById('cliente_id').value;
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('setRespuestas') }}',
            type: "POST",
            data: {
                respuesta:respuesta,
                pregunta:pregunta,
                IdCliente:IdCliente,
                IdEncuesta:IdEncuesta,
                campo:campo,
                _token: token
            },
            success: function(response){
                if(response.data === "Si"){
                    console.log("Todo funciono adecuadamente");
                }else{
                    console.log("Algo salio mal");
                }
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }

    function setRespuestaNomales(respuesta,pregunta){
        let IdEncuesta = document.getElementById('IdEncuesta').value;
        let IdCliente = document.getElementById('cliente_id').value;
        let IdPeriodo = 0;
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('setRespuestasNormales') }}',
            type: "POST",
            data: {
                respuesta:respuesta,
                pregunta:pregunta,
                IdCliente:IdCliente,
                IdEncuesta:IdEncuesta,
                IdPeriodo:IdPeriodo,
                _token: token
            },
            success: function(response){
                if(response.data === "Si"){
                    console.log("Todo funciono adecuadamente");
                }else{
                    console.log("Algo salio mal");
                }
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }


    function enviarDatos(preguntas, respuestas,campo){
        let contenedor = document.getElementById("contenido_pregunta");
        let contenedorRespuesta = document.getElementById("contenido_respuesta");
        let categoria = document.getElementById("categoria");

        swal("Aviso!", "La encuesta será enviada", "info");

        if(campo !== "" && campo !== undefined){
            console.log("valor: "+arrayCampo[i]);
            console.log("Entre al if de la consulta");
            setRespuesta( respuestas, preguntas, campo);
        }else{
            console.log("Entre al sino de la consulta");
            setRespuestaNomales(respuestas,preguntas);

            document.getElementById('iniciar').style = "display:none";
            let categoriaHTML = "";
            categoria.innerHTML = categoriaHTML;
            let respuestaHTML = "";
            contenedorRespuesta.innerHTML  = respuestaHTML;
            let preguntaHTML = "";
            preguntaHTML = `<label class="label_pregunta" for="">Muchas gracias por responder la encuesta.</label>`;
            contenedor.innerHTML = preguntaHTML;
        }



    }


    var myVar;

    function myFunction() {
    myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
    
    }

    
</script>

@endsection