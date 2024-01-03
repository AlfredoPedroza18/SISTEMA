@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->
<style>
    .contenedor-documentos{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 5px;
        -webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);  
    }

    .panel{
        min-height: 78vh;
    }
</style>

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="{{route('nom035')}}">Módulos</a></li>
            <li class="active">
                Encuestas-Nom 035-Información de Ayuda
            </li>
        </li>
    </ol>

    <h1 class="page-header text-center">Información de Ayuda</h1>
    <br>

    @if (session('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ session('type') }} fade in m-b-15">
                    {{session('success')}}
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            </div>
        </div>
    @endif

    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Información de Ayuda</h4>
        </div>
        <div class="panel-body">
            <hr>
            @if (session('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('type') }} fade in m-b-15">
                        {{session('success')}}
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                </div>
            </div>
            @endif
            <div class="row" style="margin-bottom: 25px">
                <div class="col-lg-4 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <select class="form-control" style="font-size: 13px" id="encuesta">
                        <option selected value="" disabled>---Seleccione una encuesta---</option>
                        @foreach ($encuesta as $row)
                            <option value="{{$row->IdEncuesta}}">{{date('d-m-y', strtotime($row->Fecha))}} {{$row->Descripcion}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <a id="btn1" type="button" class="btn btn-lg btn-block" style="background-color:rgb(255, 123, 0); color:white; padding: 20px 0" data-toggle="modal">Información</a>
                    <a id="btn2" type="button" class="btn btn-lg btn-block" style="background-color:rgb(255, 123, 0); color:white; padding: 20px 0" data-toggle="modal">La NOM-035 Documento oficial</a>
                    <a id="btn3" type="button" class="btn btn-lg btn-block" style="background-color:rgb(255, 123, 0); color:white; padding: 20px 0" data-toggle="modal">Glosario</a>
                </div>
                <div class="col-lg-4 col-sm-12"></div>
            </div>

        </div>
    </div>
</div>

<!-- Modal --> 
<div class="modal text-center" id="infoAyuda" tabindex="-1" role="dialog" aria-labelledby="infoAyudaTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 1200px; height: 500px">
        <div class="modal-content">
            <div class="modal-body">
                <iframe id="viewer" src="" frameborder="0" scrolling="no" width="1100" height="500"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        // App.init();
        validarBtn();
        document.getElementById("encuesta").addEventListener("change", function(event){
            event.preventDefault();
            $IdEncuesta = document.getElementById("encuesta").value;
            console.log('Entre en el select de cliente con el idEncuesta: '+ $IdEncuesta);
            limpiar();
            getDocumentos($IdEncuesta);
        });
    })

    function validarBtn(){
        $IdEncuesta = document.getElementById("encuesta").value;
        console.log( $IdEncuesta);
        if($IdEncuesta === ""){
            document.getElementById("btn1").onclick= function(){
                swal("Aviso!", "No ha seleccionado ninguna guía", "info");
            }
            document.getElementById("btn2").onclick= function(){
                swal("Aviso!", "No ha seleccionado ninguna guía", "info");
            }
            document.getElementById("btn3").onclick= function(){
                swal("Aviso!", "No ha seleccionado ninguna guía", "info");
            }   
        }
    }


    function getDocumentos(IdEncuesta){
            let token = '{{csrf_token()}}';
            $.ajax({
                url: '{{ route('getAyuda') }}',
                type: "POST",
                data: {
                    IdEncuesta:IdEncuesta,
                    _token: token
                },
                success: function(response){
                    console.log(response.data);
                    if(response.data.length === 0){
                        // console.log("El tamaño es cero");
                        mostrarDocumentos(response.data);
                    }else{
                        mostrarDocumentos(response.data);
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });
    }

    const mostrarDocumentos = (response) => {
        if(response.length === 0){
            document.getElementById("btn1").onclick= function(){
                swal("Aviso!", "No hay ninguna información para esta guía", "info");
            }
            document.getElementById("btn2").onclick= function(){
                swal("Aviso!", "No hay ninguna información para esta guía", "info");
            }
            document.getElementById("btn3").onclick= function(){
                swal("Aviso!", "No hay ninguna información para esta guía", "info");
            }
            
        }
        response.forEach(element => {
            document.getElementById("btn1").onclick= function(){
                document.getElementById("viewer").src = `data:application/pdf;base64,${element.Informacion}`;
                document.getElementById("btn1").href = "#infoAyuda";
            }
            document.getElementById("btn2").onclick= function(){
                document.getElementById("viewer").src = `data:application/pdf;base64,${element.Documento}`;
                document.getElementById("btn2").href = "#infoAyuda";
            }
            document.getElementById("btn3").onclick= function(){
                document.getElementById("viewer").src = `data:application/pdf;base64,${element.Glosario}`;
                document.getElementById("btn3").href = "#infoAyuda";
            }   
            
        });
    }

    const limpiar = () => {
        document.getElementById("btn1").onclick="";
        document.getElementById("btn2").onclick="";
        document.getElementById("btn3").onclick="";
        document.getElementById("btn1").href = "";
        document.getElementById("btn2").href = "";
        document.getElementById("btn3").href = "";
        document.getElementById("viewer").src = "";
        // document.getElementById("viewer2").src =""; 
        // document.getElementById("boton").style = "display:none";
    }

</script>

@endsection