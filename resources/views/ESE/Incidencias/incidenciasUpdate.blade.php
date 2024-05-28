@extends('layouts.masterMenuView')

@section('section')


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">
        a {
            width: 100%;
        }

        .normal {
            background: #cdcdcd;
        }

        .amarrillo {
            background: #f0ad4e;
        }

        .colorCheck {
            color: verde;
        }

        .verde {
            background: #00c73e;
        }

        .div {
            position: absolute;
            top: 15px;
            color: #003375;
            font-weight: bold;
        }

        #div {
            position: absolute;
            top: 20px;
            color: #003375;
            font-weight: bold;
        }

        #t-kardex tr th,
        #t-kardex tr td {
            border: solid 1px #656565;
            text-align: center;
        }

        .requerido:after {
            content: " *";
            color: red;
        }



        #requerido:after {
            content: " *";
            color: red;
        }

        #div-des {
            height: 100px;
            width: 100%;
            word-wrap: break-word;
        }

        #ProgramacionEjecucion input {
            border: 1px solid #ccd0d4;
        }

        #Estudio input[value=""]:required {
            border: 1px solid red;
        }

        #Estudio textarea:empty:required {
            border: 1px solid red;

        }

        #Estudio select:not(:valid) {
            border: solid 1px red;
        }

        .tabamarillo {
            background: #FFA500;
            color: yellow;
        }

        .tabverde {
            background: #FFA500;
            color: green;
            text-shadow: white;
        }

        .Estatus_cortar {
            width: 60px;
            height: 20px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .cortar {
            width: 60px;
            height: 20px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .buttonFile {
            display: none;
        }

        .checkmark {
            display: none;
            width: 22px;
            height: 22px;
            -ms-transform: rotate(45deg);
            /* IE 9 */
            -webkit-transform: rotate(45deg);
            /* Chrome, Safari, Opera */
            transform: rotate(45deg);
        }

        .checkmark_circle {
            position: absolute;
            width: 22px;
            height: 22px;
            background-color: green;
            border-radius: 11px;
            left: 0;
            top: 0;
        }

        .checkmark_stem {
            position: absolute;
            width: 3px;
            height: 9px;
            background-color: #fff;
            left: 11px;
            top: 6px;
        }

        .checkmark_kick {
            position: absolute;
            width: 3px;
            height: 3px;
            background-color: #fff;
            left: 8px;
            top: 12px;
        }

        :focus {
            border: 1px solid #3a90c2;
            outline: none;
        }

        .required:focus {
            border: 1px solid #3a90c2;
            outline: none;
        }

        .not-active {
            pointer-events: none;
            cursor: default;
        }

        #buttonUP {
            cursor: pointer;
            display: block;
            width: 90px;
            background-color: #c5c4c4f7;
            height: 25px;
            color: white;
            position: absolute;
            right: 0;
            top: 0;
            font-size: 12px;
            line-height: 25px;
            text-align: center;
            -webkit-transition: 500ms all;
            -moz-transition: 500ms all;
            transition: 500ms all;
        }

        input[type='file'] {
            height: 25px;
            opacity: 0;
            background: none;
            background-image: none;
            outline: none;
            position: absolute;
            top: 0;
            left: 0;
            font-size: 12px;
            line-height: 25px;
            text-indent: 10px;
            pointer-events: none;
        }

        .filePJ {
            height: 25px;
            background-color: white;
            box-shadow: 1px 2px 3px #ededed;
            position: relative;
            border: 1px solid #d8d8d8;
        }

        .filePJ.required {
            height: 25px;
            background-color: white;
            box-shadow: 1px 2px 3px #ededed;
            position: relative;
            border: 1px solid red;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        #Trayectoria,
        #Escolar,
        #Resumen {
            height: 130px;
        }

        .spinner-border {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: text-bottom;
            border: .25em solid;
            border-right: .25em solid transparent;
            border-radius: 50%;
            animation: spinner .6s linear infinite;
            display: none;
        }

        .form-control-lg {
            border: solid 1px red;
        }

        .form-control-lg:focus {
            outline: none;
        }

        .disabledTab {
            pointer-events: none;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .container-demo {
            display: flex;
            flex-wrap: wrap;
        }

        .container-demo__title {
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            margin: 2rem 0;
        }

        .col {
            width: 50%;
            min-height: 10rem;
            text-align: center;
        }

        img {
            display: block;
            max-width: 100%;
        }

        code {
            display: block;
            height: 100px;
            overflow-y: auto;
            margin-bottom: 1rem;
        }
    </style>

</head>

<body onload="iniciar()">

    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">ESE</a></li>
            <li><a href="{{ route('sig-erp-ese::ListadoIncidencias.index') }}">Incidencias Legales</a></li>
            <li><a>Editar Servicio</a></li>
        </ol>

        <h1 class="page-header text-center">Editar Servicio</h1>
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">


            <div class="panel-heading">
                <div class="panel-heading-btn"></div>
                <h4 class="panel-title">Edición de Incidencias Legales</h4>
            </div>
            <div class="panel-body">

                <div class="row">
                    <dvi class="col-md-9"></dvi>
                    <div class="col-md-3">
                        <label for="solicitante">Solicitante</label>
                        <select name="solicitante" id="solicitante" class=" form-control filePJ required">
                            <option value="0">Selecciona un solicitante</option>

                            @foreach($contactos as $con)

                            
                            <option @if($datos->Solicitante == $con->name) selected @endif value="{{$con->name}}">{{$con->name}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-3 ">
                        <label for="nombre" id='requerido'>Nombre del Candidatos</label>
                        <input type="text" class=" form-control filePJ required" name="nombre" id="nombre" required value="{{$datos->Candidato}}">
                    </div>
                    <div class="col-md-3">
                        <label for="nombre" id='requerido'>Fecha de nacimiento</label>
                        <input type="date" class=" form-control filePJ required" name="fecha" id="fecha" required value="{{$datos->FechaNacimiento}}">
                    </div>

                    <div class="col-md-6">
                        <label for="nombre" id='requerido'>Lugar nacimiento</label>
                        <input type="text" class=" form-control filePJ required" name="lugar" id="lugar" required value="{{$datos->LugarNacimiento}}">
                    </div>
                </div>

                <br>

                <br>

                <div class="row">
                    <div class="col-md-3">

                        <label for="">Numero:</label>
                        <input type="tel" class="form-control filePJ" id="telefono" maxlength="10" value="{{$datos->telefono}}">    

                    </div>

                    <div class="col-md-9">

                        <label for="">Domicilio:</label>
                        <input type="text" class="form-control filePJ" id="domicilio" value="{{$datos->domicilio}}">    

                    </div>
                </div>

                <br>
                
                <br>

                <div class="row">

                    <div class="col-md-4">

                        <form name='my_form1' id='my_form1' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">INE (parte delantera)</label>
                            <div id='filePJ1' class='filePJ '>
                                <label id='buttonUP' for="1" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image1'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='1' id='1' onchange='validate(1);' required >
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading1' class='spinner-border text-warning' role='status'></div>
                            </div>
                            <input type="text" id="11" hidden value="{{$datos->ineDelantero}}">
                            <br>
                            <div id='lbError1' class='warning'></div>

                            <div hidden id='buttonFile1'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal1' onclick="verArchivo(1)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(1)'>Eliminar</button>

                            </div>
                        </form>

                    </div>

                    <div class="col-md-4">

                        <form name='my_form2' id='my_form2' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">INE (parte trasera)</label>
                            <div id='filePJ2' class='filePJ '>
                                <label id='buttonUP' for="2" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image2'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='2' id='2' onchange='validate(2);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading2' class='spinner-border text-warning' role='status'></div>
                            </div>

                            <br>
                            <div id='lbError2' class='warning'></div>
                            <input type="text" id="12" hidden value="{{$datos->ineTraseros}}">
                            <div hidden id='buttonFile2'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal2' onclick="verArchivo(2)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(2)'>Eliminar</button>

                            </div>
                        </form>

                    </div>

                    <div class="col-md-4">

                        <form name='my_form3' id='my_form3' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">CURP</label>
                            <div id='filePJ3' class='filePJ '>
                                <label id='buttonUP' for="3" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image3'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='3' id='3' onchange='validate(3);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading3' class='spinner-border text-warning' role='status'></div>
                            </div>

                            <br>
                            <div id='lbError3' class='warning'></div>

                            <div hidden id='buttonFile3'>

                                <button type='button' class='btn btn-warning' data-toggle='moda3' data-target='#myModal3' onclick="verArchivo(3)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(3)'>Eliminar</button>

                            </div>

                            <input type="text" id="13" hidden value="{{$datos->curp}}">
                        </form>

                    </div>



                </div>

                <br>

                <div class="row">

                    <div class="col-md-4">

                        <form name='my_form4' id='my_form4' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">Acata de nacimiento</label>
                            <div id='filePJ4' class='filePJ '>
                                <label id='buttonUP' for="4" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image4'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='4' id='4' onchange='validate(4);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading4' class='spinner-border text-warning' role='status'></div>
                            </div>

                            <br>
                            <div id='lbError4' class='warning'></div>

                            <input type="text" id="14" hidden value="{{$datos->actaNacimiento}}">
                            <div hidden id='buttonFile4'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal1' onclick="verArchivo(4)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(4)'>Eliminar</button>

                            </div>
                        </form>

                    </div>

                    <div class="col-md-4">

                        <form name='my_form5' id='my_form5' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">Comprobante de domicilio</label>
                            <div id='filePJ5' class='filePJ '>
                                <label id='buttonUP' for="5" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image5'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='5' id='5' onchange='validate(5);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading5' class='spinner-border text-warning' role='status'></div>
                            </div>
                            <input type="text" id="15" hidden value="{{$datos->compDomicilio}}">
                            <br>
                            <div id='lbError5' class='warning'></div>

                            <div hidden id='buttonFile5'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal5' onclick="verArchivo(5)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(5)'>Eliminar</button>

                            </div>
                        </form>

                    </div>

                    <div class="col-md-4">

                        <form name='my_form6' id='my_form6' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">RFC</label>
                            <div id='filePJ6' class='filePJ '>
                                <label id='buttonUP' for="6" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image6'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='6' id='6' onchange='validate(6);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading6' class='spinner-border text-warning' role='status'></div>
                            </div>
                            <input type="text" id="16" hidden value="{{$datos->rfc}}">
                            <br>
                            <div id='lbError6' class='warning'></div>

                            <div hidden id='buttonFile6'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal6' onclick="verArchivo(6)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(6)'>Eliminar</button>

                            </div>
                        </form>

                    </div>


                </div>


                <br>

                <div class="row">

                    <div class="col-md-4">

                        <form name='my_form7' id='my_form7' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">Número de seguro social</label>
                            <div id='filePJ1' class='filePJ '>
                                <label id='buttonUP' for="7" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image7'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='7' id='7' onchange='validate(7);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading7' class='spinner-border text-warning' role='status'></div>
                            </div>

                            <input type="text" id="17" hidden value="{{$datos->nss}}">
                            <br>
                            <div id='lbError7' class='warning'></div>

                            <div hidden id='buttonFile7'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal7' onclick="verArchivo(7)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(7)'>Eliminar</button>

                            </div>
                        </form>

                    </div>



                    
                    <div class="col-md-4" @if(Auth::user()->tipo != "s") hidden @endif >

                        <form name='my_form8' id='my_form8' enctype='multipart/form-data' onsubmit='return false'>

                            <label for="">Incidencia Legal</label>
                            <div id='filePJ8' class='filePJ '>
                                <label id='buttonUP' for="8" style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                <input hidden type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image8'>
                                <input type='file' placeholder='Seleccionar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='8' id='8' onchange='validate(8);' required>
                                <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                <div id='buttonLoading8' class='spinner-border text-warning' role='status'></div>
                            </div>

                            <br>
                            <div id='lbError8' class='warning'></div>
                            <input type="text" id="18" hidden value="{{$datos->incidenciaLegal}}">
                            <div hidden id='buttonFile8'>

                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal8' onclick="verArchivo(8)">Ver</button>
                                <button type='button' class='btn btn-danger' onclick='remover(8)'>Eliminar</button>

                            </div>
                        </form>


                    </div>

               

                </div>

                <div class="row">

                    <div class="col-md-6"></div>
                    <div class="col-md-2">
                        <button class="form-control btn btn-info" onclick="cancelarServicio()">Cancelar Servicio</button>
                    </div>

                    <div class="col-md-2">
                        <button onclick="guardarInputs()" class="form-control btn btn-success">Guardar Servicio</button>
                    </div>

                    @if(Auth::user()->tipo == "s")
                    <div class="col-md-2">
                        <button onclick="finalizarServicio()" class="form-control btn btn-success">Finalizar Servicio</button>
                    </div>
                    @endif 
                </div>



            </div>
        </div>
    </div>

</body>

</html>


@endsection





@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')


{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}

{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}

<!-- ================== END PAGE LEVEL JS ================== -->
{!! Html::script('assets/js/sweetalert.min.js') !!}


<script>

    $(document).ready(function() {

        
    
    });

    function iniciar(){
        for(let id=1; id<=8; id++)
            {
                file = $("#1"+id).val()

                if(file != "" && file !="null" && file != null){
                    warningel = document.getElementById('lbError' + id);
                    warningel.innerHTML = "Archivo Seleccionado";
                    $("label[for*='" + id + "']").html("Cambiar archivo");
                    $("#buttonFile" + id).css("display", "inline-block");
                    $("#buttonLoading" + id).hide();
                    $("#image"+id).show();
                    $("#buttonFile" + id).show();
                }else{

                    $("#1"+id).val("");

                }

            }
    }


    function guardar(i){
        
        var file
        
        file = document.querySelector('input[id="'+i+'"]').files[0]
        
        getBase64(file,i)
      
        

    }
    function getBase64(file,id) {

        var base64;

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            $("#1"+id).val(reader.result);
            console.log(id)
        };
        reader.onerror = function (error) {
            $("#1"+id).val("");
        };
    }
    function getBase64(file,id) {

        var base64;

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            $("#1"+id).val(reader.result);
        };
        reader.onerror = function (error) {
            $("#1"+id).val("");
        };
    }

    function validate(id) {
        
        $("#image" + id).hide();
       

        var input = document.getElementById(id);
        var idInput = id;
        // var maxfilesize = 307200,
        if (input.files[0] != undefined) {
            var maxfilesize = 3145728,
                filesize = input.files[0].size,
                filename = input.files[0].name,
                tipo = input.files[0].type,
                warningel = document.getElementById('lbError' + id);
            if (filesize > maxfilesize) {
                document.getElementById("my_form" + id).reset();
                swal("Archivo Demasiado Grande. Tamaño Máximo: 3MB ");
                warningel.innerHTML = "";
                $("#buttonLoading" + id).hide();
                return false;
            } else {
                var fileInput = filename;
                var filePath = fileInput.value;
                console.log(filePath);
                var file_ext = filename.substring(filename.lastIndexOf('.') + 1);
                if (tipo == 'application/pdf') {
                    var allowedExtensionsPDF = /(\.PDF|\.pdf)$/i;
                    if (!allowedExtensionsPDF.exec("." + file_ext)) {
                        warningel.innerHTML = "Seleccione un archivo. pdf";

                        fileInput.value = '';
                        return false;
                    } else {
                        warningel.innerHTML = "";
                        

                        warningel.innerHTML = "Archivo Seleccionado";
                        $("label[for*='" + id + "']").html("Cambiar archivo");
                        $("#buttonFile" + id).css("display", "inline-block");
                        $("#buttonLoading" + id).hide();
                        $("#image"+id).show();
                        $("#buttonFile" + id).show();
                        guardar(id);
                    }
                } else {
                    $("#buttonLoading" + id).hide();
                    swal("Formato incorrecto favor de seleccionar un archivo PDF ");
                    return false;
                }


            }
        } else
            return false;
    }

    

    function remover(id) {
     
        $("#" + id).val("");
        $("#image"+id).hide();
        $("#buttonFile" + id).hide();
        $("label[for*='" + id + "']").html("Seleccionar");
        $("#lbError" + id).html("");
        $("#1"+id).val("");
        swal("El archivo se eliminó con éxito!");
    }


    function verArchivo(id){

        var win = window.open(); 
        win.document.write("<iframe  width='100%'  height='100%'  src='" + $("#1"+id).val() + "'><\/iframe>"); 

    }


    function guardarInputs() {
        

        
        var solicitante = $("#solicitante").val();
        var candidato = $("#nombre").val();
        var fecha = $("#fecha").val();
        var lugar = $("#lugar").val();
        var ineD = $("#11").val();
        var ineT = $("#12").val();
        var curp = $("#13").val();
        var nss = $("#17").val();
        var comD = $("#15").val();
        var act = $("#14").val();
        var rfc = $("#16").val();
        var inci = $("#18").val();

        var domiclio = $("#domicilio").val();
        var tel = $("#telefono").val();

        var token = $('meta[name="csrf-token"]').attr('content');

        if (candidato == "" || fecha == "" || lugar == "" || solicitante == "0") {
            swal({
                title: "<h3>¡ Llenar los campos obligatorios !</h3> ",
                html: true,
                type: "warning"
            });
        } else {

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: "{{ url('guardarInputsUpdate') }}/" + "{{$IdCliente}}"+"/"+"{{$IdServicio}}",
                    method: "post",
                    dataType: "JSON",
                    data: {
                        solicitante:solicitante, candidato:candidato, fecha:fecha, lugar:lugar,
                        ineD:ineD,ineT:ineT, curp:curp, act:act, comD:comD, rfc:rfc, nss:nss, inci:inci,domiclio:domiclio, tel:tel
                    },

                    success: function(data) {
                        swal({
                                    title: "<h3>¡ Servicio guardado con exito !</h3> ",
                                    html: true,
                                    type: "success"
                                });
                                location.href = "{{ route('sig-erp-ese::ListadoIncidencias.index') }}";
                    },
                    complete: function() {

                    },
                    error: function(e) {
                        $("#buttonLoading" + id).hide();
                        show_error_message(e.status, 'Ocurrió un error al crear el servicio');
            
                    }
            });
        }

    }

    function finalizarServicio(){
        var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: "{{ url('finalizarServicio') }}/" + "{{$IdCliente}}"+"/"+"{{$IdServicio}}",
                    method: "post",
                    dataType: "JSON",
                    data: {
                       A:"A"
                    },

                    success: function(data) {
                     swal({
                                    title: "<h3>¡ Servicio Finalizado con exito !</h3> ",
                                    html: true,
                                    type: "success"
                                });
                                location.href = "{{ route('sig-erp-ese::ListadoIncidencias.index') }}";
                    },
                    complete: function() {

                    },
                    error: function(e) {
                        $("#buttonLoading" + id).hide();
                        show_error_message(e.status, 'Ocurrió un error al crear el servicio');
            
                    }
            });
    } 

    function cancelarServicio(){

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: "{{ url('cancelarServicio') }}/" + "{{$IdCliente}}"+"/"+"{{$IdServicio}}",
                    method: "post",
                    dataType: "JSON",
                    data: {
                       A:"A"
                    },

                    success: function(data) {
                     swal({
                                    title: "<h3>¡ Servicio cancelado con exito !</h3> ",
                                    html: true,
                                    type: "success"
                                });
                                location.href = "{{ route('sig-erp-ese::ListadoIncidencias.index') }}";
                    },
                    complete: function() {

                    },
                    error: function(e) {
                        $("#buttonLoading" + id).hide();
                        show_error_message(e.status, 'Ocurrió un error al crear el servicio');
            
                    }
            });
        

    }


</script>