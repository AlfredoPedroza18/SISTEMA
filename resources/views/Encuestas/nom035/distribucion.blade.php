@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->
<style>
    @media (max-width: 600px){
        .numeracion{
            display: block;
        }
        .labelnum{
            width: 100%!important;
        }

        .label2{
            width: 60px!important; 
        }
    }

    .buzon{
        width: 90%;
        height: 80%;
        margin: 10px auto 0 auto;
        padding: 20px;
        border-radius: 10px;
    }

    .buzon label{
        color: black;
        font-size: 1.4rem;
        font-weight: bold;
    }

    .buzon textarea{
        height: 200px;
    }
</style>
<style>
    .accordion {
        color: #000000;
        cursor: pointer;
        
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active-accordion, .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .panel-accordion {
        padding: 0 18px;
        background-color: rgba(255, 255, 255, 0);
        display: none;
        overflow: hidden;
        transition: 0.2s ease-out;
    }

    .actS:after {
            content: '\002B';
            color: rgb(78, 78, 78);
            font-weight: bold;
            float: right;
            margin-right: 5px;
        }

        .active:after {
            content: "\2212";
        }

    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: rgb(222, 222, 222);
    opacity: .8;
    visibility: hidden;
    }

    #carga{
        border:2px solid rgb(255, 255, 255);
        border-bottom-color: #16b3a5;
        
        height: 40px;
        width: 40px;
        border-radius: 100%;

        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        -webkit-animation: girar 0.7s linear infinite;
        -o-animation: girar 0.7s linear infinite;
        animation: girar 0.7s linear infinite;
    }
    @keyframes girar{
        from {transform: rotate(0deg);}
        to {transform: rotate(360deg);}
    }
</style>
<div class="loader">
    <div id="carga"></div>
</div>
<div id="content" class="content">
    
    <ol class="breadcrumb">
        <li><a href="{{route('nom035')}}">Módulos</a></li>
            <li class="active">
                Encuestas-Nom 035-Distribución
            </li>
        </li>
    </ol>

    {{-- <a href="https://api.whatsapp.com/send?phone=529212342683&text=hola,%20¿qué%20tal%20estás?">Mensaje</a>
    <a href="https://api.whatsapp.com/sendphone=529212342683&text=Aprendiendo a compartir desde https://parzibyte.me/blog">Compartir en WhatsApp</a> --}}
    
    <div class="row" style="margin-bottom: 15px">
        <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
            <label for="" style="font-size: 14px">Cliente</label>
            <select class="form-control" name="cliente" style="font-size: 13px" disabled id="cliente">
                @foreach ($clientes as $row)
                <option selected value="{{$idCliente}}" disabled>{{$row->nombre_comercial}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <h1 class="page-header text-center bg-white p-3" style="font-size: 20px; margin:0">Distribución</h1>
        </div>
        <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
            <label for="" style="font-size: 14px">Periodo</label>
            <select class="form-control" style="font-size: 13px" id="periodo" disabled>
                @foreach ($periodo as $row)
                    <option selected value="{{$row->IdPeriodo}}" disabled>{{ date('d-m-Y', strtotime($row->Fecha))}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-3" style="display: none">
            <div style="display: none">
                <div style="height: 25rem; border-radius: 10px; background-color:rgb(50, 103, 190); display:flex; flex-direction:column; justify-content:center; align-items:center">
                    <div style="display:flex; justify-content:center; flex-direction:column;">
                        <div>
                            <p class="p-4" style="color: white; text-align:center; font-size: 20px; margin:0">Solicitud</p>
                        </div>
                        <div>
                            <canvas id="myChart" style="width:50%; height: 100%"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="row" style="display: flex; align-items:center;">
                <div class="col-md-3" style="display: flex; align-items:center; gap:7px">
                    
                    <label for="" style="font-size: 14px; width:100%;height:35px; border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center; padding-left:7px;padding-right:7px" id="totalP">Total de solicitudes: {{$totalP}}</label>
                    <label for="" style="font-size: 14px; width:100%;height:35px; border: 2px solid green; border-radius: 5px; display:none; justify-content:center; align-items:center; padding-left:7px;padding-right:7px" id="totalFiltro"></label>
                
                </div>
                <div class="col-md-7 col-sm-12">
                    
                </div>
                <div class="col-md-2 col-sm-12">
                    <a href="{{ route('editar_encuestasController', $servicio[0]->IdServicio)}}" id="btn1" type="button" class="btn btn-lg btn-block" style="background-color:rgb(6, 140, 202); color:white; padding: 20px 0" data-toggle="modal">Editar Solicitud</a>
                    {{--<a id="btn3" type="button" class="btn btn-lg btn-block" style="background-color:rgb(255, 123, 0); color:white; padding: 20px 0" data-toggle="modal">Descargar Pantilla</a>--}}
                </div>
                {{--<div class="col-md-3 col-sm-12">
                    <a id="btn2" type="button" href="#getUrl" class="btn btn-lg btn-block" style="background-color:rgb(6, 140, 202); color:white; padding: 20px 0" data-toggle="modal">Ver URL de encuestas</a>
                    <a id="btn3" type="button" class="btn btn-lg btn-block" style="background-color:rgb(6, 140, 202); color:white; padding: 20px 0" data-toggle="modal">Cargar Plantilla</a>
                </div>--}}
            </div>
        </div>
    </div>

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
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3" style="display: flex; align-items:center; gap:7px; text-align:right;">
                <label for="" style="font-size: 14px">Filtrar:</label>
                <select class="form-control" style="font-size: 13px" id="filtroSelect" onchange="filtrar();">
                    <option selected value="Todos">Todos</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Proceso">Proceso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
        </div>
        
    <form action="{{route('distUpdatePers')}}" method="POST" id="formTodos">
        {!! csrf_field() !!}
        <div class="row" style="margin-top: 15px;">
            @php
                $indice=0;
            @endphp
            @foreach ($centros as $row)
            <div class="centroTrabajo" style="">
                <div class="accordion col-md-12" style="background-color:rgba(255, 255, 255, 0); border-radius:7px;margin-bottom:7px;">
                    <div class="form-group row">
                        <div class="col-md-1 col-sm-12 text-left numeracion" style="display: flex; justify-content: end;">
                            <div style="height:35px; width:50px;border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center;background-color:white;">
                                <p style="margin-bottom: 0; font-size: 18px; font-weight:bold">{{$i++}}</p>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <li style="background-color:white; width: 100%; height:33px; padding:5px; margin-top:1px; font-size:15px; color:black; list-style:none;border: 1px solid rgb(155, 155, 155); border-radius:7px;" class="actS">{{$row->Descripcion}}</li>
                        </div>
                        
                        <div class="col-md-1 col-sm-12">
                            <div class="row" style="display: flex; gap:5px;">
                                @foreach ($datos as $dat )
                                    @if ($dat->IdCentroTrabajo == $row->IdCentro)
                                        @if ($dat->notificacion == "Si")
                                            @php
                                                $contta++;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if($contta > 0)
                                    <a href="javascript:sendMailGlobal('{{$row->IdCentro}}','{{$row->Descripcion}}')" class="btn btn-icon" style="display:flex; justify-content:center; align-items:center;"><i  id="C{{$row->IdCentro}}" class="fa fa-envelope fa-1x" style="color: rgb(158, 196, 117); font-size:30px;"></i></a>
                                @else
                                    <a href="javascript:sendMailGlobal('{{$row->IdCentro}}','{{$row->Descripcion}}')" class="btn btn-icon" style="display:flex; justify-content:center; align-items:center;"><i  id="C{{$row->IdCentro}}" class="fa fa-envelope fa-1x" style="color: rgb(255, 123, 0); font-size:30px;"></i></a>
                                @endif
                                @php
                                    $contta = 0;
                                @endphp
                                <span style="height:35px; width:40px; border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center;">
                                    @if (count($espacios) > 0)
                                        @foreach ($espacios as $rr)
                                            @if ($rr->IdCentroTrabajo == $row->IdCentro)
                                                <p style="margin-bottom: 0; font-size: 14px"><b>{{$rr->cantidadPersonal}}/{{$arreglo[$i-2]}}</b></p>
                                            @endif
                                        @endforeach
                                    @else
                                    <p style="margin-bottom: 0; font-size: 14px"><b>0/{{$arreglo[$i-2]}}</b></p>
                                    @endif
                                </span>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-accordion col-md-12" >
                    @php
                        $contReg=0;
                    @endphp
                    @foreach ($datos as $row2)
                    
                        @if ($row->IdCentro == $row2->IdCentroTrabajo)
                        @php
                            $contReg++;
                            $descLink='<br>'.$row2->detalle.' <br><a href="'.$row2->link.'">'.$row2->link.'</a> <br><br>'.$row2->detalle2.'<br><a href="'.$row2->link2.'">'.$row2->link2.'</a>';

                            $descWhats='';
                            
                            $linkEn = '';

                            
                            $descLink=$correo.'<br>'.$descLink.'<br><br><b>Si llegas a tener un problema o sugerencia en cualquier momento puedes dirigirte al siguiente enlace Buzón de quejas y Sugerencias: </b><br><a href="'.$servicio[0]->LinkSugerencias.'">'.$servicio[0]->LinkSugerencias.'</a>';

                            $descWhats=$correo.$descWhats.'\n\n*Buzón de quejas y Sugerencias*: '.$servicio[0]->LinkSugerencias;
                        @endphp
                        
                    <input type="hidden" name="idcli" id="idcli" value="{{$idCliente}}">
                    <input type="hidden" name="idper" id="idper" value="{{$idPeriodo}}">
                    <input type="hidden" name="idCentroT" id="idCentroT" value="{{$row2->IdCentroTrabajo}}">
                            
                    <div class="row datosPersonal">
                        <div class="col-md-12 col-sm-12" style="margin-bottom: 10px">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-1" style="display: flex; justify-content: end;">
                                            <div style="height:35px; width:40px;border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center;">
                                                <p style="margin-bottom: 0; font-size: 14px; color:black"><b>#{{$j++}}</b></p>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="row" style="">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1" style="background-color: white;">Nombre:</span>
                                                        
                                                        <input type="text" value="{{$row2->Nombre}}" class="form-control input-group-text" id="nombrein{{$row2->IdPersonal}}" name="updPersonal[{{$indice}}][Nombre]" style="height: 40px" onblur="auto({{$row2->IdPersonal}},1)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1" style="background-color: white">eMail:</span>
                                                <input type="text" value="{{$row2->Correo}}" class="form-control" id="correoin{{$row2->IdPersonal}}" name="updPersonal[{{$indice}}][Correo]" style="height: 40px" onblur="auto({{$row2->IdPersonal}},2)">
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1" style="background-color: white">Tel:</span>
                                                <input type="text" value="{{$row2->Telefono}}" class="form-control" id="telefonoin{{$row2->IdPersonal}}" name="updPersonal[{{$indice}}][Telefono]" style="height: 40px" onblur="auto({{$row2->IdPersonal}},3)">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-7">
                                                    <label for="colFormLabelSm" class="label2 col-sm-2 col-form-label col-form-label-sm" style="width: 100%; height:35px; border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center; color:white"><p style="margin-bottom: 0; font-size: 14px; color:black">ID {{$row2->IdPersonal}}</p></label>
                                                    <input type="hidden" value="{{$row2->IdPersonal}}" id="id{{$row2->IdPersonal}}" name="updPersonal[{{$indice}}][IdPersonal]">
                                                </div>
                                                <div class="col-md-5">
                                                    @if ($row2->notificacion == "Si")
                                                        <a href="javascript:sendMail('{{$row2->Correo}}','{{$row2->Nombre}}','{{$descLink}}','{{$row2->IdPersonal}}','{{$row->IdCentro}}');" class="btn btn-icon"><i id="P{{$row2->IdPersonal}}" class="fa fa-envelope fa-1x" style="color: rgb(158, 196, 117); font-size:25px;margin-right:5px;"></i></a>
                                                    @else
                                                        <a href="javascript:sendMail('{{$row2->Correo}}','{{$row2->Nombre}}','{{$descLink}}','{{$row2->IdPersonal}}','{{$row->IdCentro}}');" class="btn btn-icon"><i id="P{{$row2->IdPersonal}}" class="fa fa-envelope fa-1x" style="color: rgb(255, 123, 0); font-size:25px;margin-right:5px;"></i></a>
                                                    @endif
                                                    <a href="javascript:modalMail('{{$descLink}}')" class="btn btn-primary btn-icon btn-circle btn-sm" style=""><i class="fa fa-pencil"></i></a>
                                                    {{-- <a href="https://api.whatsapp.com/send?phone=529212342683&text=Podrias+ayudarnos+con+el+llenado+de+las+siguientes+encuestas.+El+objetivo+es+identificar+a+los+trabajadores+que+se+han+visto+afectados+por+este+tipo+de+situaciones%2C+con+el+objetivo+de+apoyarlos+de+la+mejor+manera+posible.+Favor+de+Ingresar+por+medio+del+siguiente+enlace%0D%0A%0D%0AIdentificaci%C3%B3n+de+riesgo+psicosocial%3A+El+objetivo+es+identificar+a+los+trabajadores+que+se+han+visto+afectados+por+este+tipo+de+situaciones%2C+con+el+objetivo+de+apoyarlos+de+la+mejor+manera+posible.Favor+de+Ingresar+por+medio+del+siguiente+enlace%0D%0Ahttps%3A%2F%2Fwww.sistemagent.com%3A8000%2Ferp-demo%2Fpublic%2FstartEncuesta%2F11%2F307%2FCOD-P1398%0D%0A">Mensaje</a> --}}
                                                   
                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=52{{$row2->Telefono}}&text=Hola+{{$row2->Nombre}}.%0D%0A%0D%0APodrias+ayudarnos+con+el+llenado+de+las+siguientes+encuestas.+El+objetivo+es+identificar+a+los+trabajadores+que+se+han+visto+afectados+por+este+tipo+de+situaciones%2C+con+el+objetivo+de+apoyarlos+de+la+mejor+manera+posible.+Favor+de+Ingresar+por+medio+del+siguiente+enlace%0D%0A%0D%0AIdentificaci%C3%B3n+de+riesgo+psicosocial%3A+El+objetivo+es+identificar+a+los+trabajadores+que+se+han+visto+afectados+por+este+tipo+de+situaciones%2C+con+el+objetivo+de+apoyarlos+de+la+mejor+manera+posible.Favor+de+Ingresar+por+medio+del+siguiente+enlace%0D%0A{{$row2->link}}%0D%0A%0D%0AEntorno+laboral%3A+Es+de+car%C3%A1cter+an%C3%B3nimo+y+establece+los+elementos+para+identificar%2C+analizar+y+prevenir+los+factores+de+riesgo+psicosocial%2C+as%C3%AD+como+para+promover+un+entorno+organizacional+favorable+en+los+centros+de+trabajo.+Favor+de+Ingresar+por+medio+del+siguiente+enlace%3A%0D%0A{{$row2->link2}}%0D%0A%0D%0ASi+llegas+a+tener+un+problema+o+sugerencia+en+cualquier+momento+puedes+dirigirte+al+siguiente+enlace+Buz%C3%B3n+de+quejas+y+Sugerencias%3A%0D%0Ahttps%3A%2F%2Fwww.sistemagent.com%3A8000%2Ferp-demo%2Fpublic%2FquejaSugerencia%2F205%2F187%0D%0A" class="btn btn-success btn-icon btn-circle" style="background-color:rgb(82, 197, 82);font-size:20px;"><i class="fa fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            @php
                                $indice++;
                            @endphp
                        
                        <!--</form>-->
                            

                        @else
                            @php
                                $j = 1;
                            @endphp
                        @endif
                        
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="row" style="text-align: end; margin: 10px 5px">
                 </div>
    </form>

    <div style="margin-top:15px;">
        <form action="{{route('distUpdatePers')}}" method="POST" id="formNew">
            {!! csrf_field() !!}
            <div id="newDatos" style="display: none;">
        
            </div>
            
            <div class="row" style="text-align: end; margin: 10px 5px; display:none;" id='btnGuardarN'>
                <button class="btn btn-lg" style="background-color: rgb(70, 168, 70); color:white; margin-top:10px;" type="submit">Guardar</button>
            </div>
        </form>
    </div>
    
</div>

<!-- Modal --> 
<div class="modal text-center" id="getUrl" tabindex="-1" role="dialog" aria-labelledby="infoAyudaTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 63%; max-height: 520px">
        <div class="modal-content">
            <div class="modal-body">
                <div style="width: 100%; height:500px">
                    <div style="padding:5px">
                        <h3 style="background-color:rgb(255, 123, 0); width: 100%; margin: 20px auto 0 auto; padding: 10px; color:white; border-radius: 5px">URL Encuestas</h3>
                    </div>
                    <ul class="list-group" style="width:100%; display:flex; flex-direction:column; align-items:center">
                        @foreach ($encuestas as $row)
                            <li class="list-group-item list-group-item-success" style="border:2px solid rgb(44, 191, 44); text-align:start; margin-bottom: 5px; font-size: 16px; font-weight:bold; width:95%">{{$row->Descripcion}}: <a id="urll" href="{{ route('encuestasURL',['id'=> $idCliente, 'id2'=>$row->IdEncuesta]) }}">{{$row->Link}}</a></li>
                        @endforeach
                        {{-- <input id="campo" type="text"> --}}
                        {{-- <button onclick="copyToClipBoard()">Copiar</button> --}}
                        {{-- <li class="list-group-item list-group-item-success" style="border:2px solid rgb(44, 191, 44); text-align:start; font-size: 16px; font-weight:bold;">Encuesta 2: <a href="{{ route('encuestasURL') }}">https://gen-t.typeform.com/to/oKMZRd5o</a> </li> --}}
                    </ul>
                    <div style="margin-top: 75px">
                        <a id="btnBuzon" type="button" href="#getBuzon" class="btn" style="background-color:rgb(255, 123, 0); color:white;" data-toggle="modal">Buzón de quejas y sugerencias</a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- INICIO DEL MODAL DEL CORREO -->
<div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Envío de notificación</h4>
      </div>
      <div class="modal-body"><p id="divMessage" class="textM">
                </p>
            <textarea class="jquery_ckeditor" name="editor1" id="editor1" rows="10" cols="80">
                
                <!--<p>Estimado Colaborador:</p>
                <p>Te invitamos a responder los siguientes cuestionarios</p>-->
                {{--@foreach ($correo as $item)
                    {{$item->Descripcion}}: 
                    <br>
                @endforeach
                
                    
                @foreach ($encuestas as $row)
                    <strong>{{$row->Descripcion}}: </strong>  {{$row->Detalle}}
                    <br>
                        <a href="{{ route('encuestasURL',['id'=> $idCliente, 'id2'=>$row->IdEncuesta]) }}">{{$row->Link}}</a><br>
                    <br>
                @endforeach 
                <br>
                <strong>Buzón de quejas y sugerencias: </strong>
                <br>
                <a href="#">{{$servicio[0]->LinkSugerencias}}</a>--}}
            </textarea>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {{--<button type="button" class="btn btn-primary">Enviar notificación</button>--}}
      </div>
    </div>
  </div>
</div>
<!-- FIN DEL MODAL DEL CORREO -->

<!-- Modal --> 
<div class="modal text-center" id="getBuzon" tabindex="-1" role="dialog" aria-labelledby="infoAyudaTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 63%; min-height: 600px">
        <div class="modal-content">
            <div class="modal-body">
                <div style="width: 100%; min-height:600px">
                    <div style="padding:5px">
                        <h3 style="background-color:rgb(255, 123, 0); width: 91%; margin: 20px auto 0 auto; padding: 10px; color:white; border-radius: 5px">Buzón de quejas y sugerencias</h3>
                    </div>
                    <div class="buzon">
                        <form>
                            {{ csrf_field() }}
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-12 col-sm-12" style="display: flex; align-items:center; gap:5px; margin-bottom:5px">
                                    <label for="" style="font-size: 15px; font-weight:400; width:40%; text-align:start">A que centro de trabajo pertenece</label>
                                    <select id="centroqueja" class="form-control">
                                        @foreach ($centros as $row)
                                            <option value="{{$row->IdCentro}}" selected>{{$row->Descripcion}}</option>  
                                        @endforeach 
                                    </select>

                                </div>
                                <div class="col-md-12 col-sm-12" style="display: flex; align-items:center; gap:5px">
                                    <label for="" style="font-size: 15px; font-weight:400; width:40%; text-align:start">Tipo de queja o sugerencia</label>
                                    <select id="queja" class="form-control">
                                        @foreach ($quejas as $row)
                                            <option value="{{$row->IdTipoQueja}}" selected>{{$row->Descripcion}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <input type="hidden" name="idCliente" id="idCliente" value="{{$idCliente}}">
                            <input type="hidden" name="idPeriodo" id="idPeriodo" value="{{$idPeriodo}}">

                            <div class="row">
                                <div class="mb-3 col-md-12 col-sm-12" style="text-align:start; margin-bottom:10px">
                                    <label for="exampleFormControlTextarea1" class="form-label">Comentario</label>
                                    <textarea style="font-size: 15px" class="form-control" id="mensaje" name="mensaje" id="mensaje" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="row" style="text-align:start;">
                                <div class="col-md-12 col-sm-12">
                                    <label for="" style="font-size: 15px; font-weight:400">Anónimo</label>
                                </div>
                                <div class="col-md-12 col-sm-12" style="display: flex; gap: 5px">
                                    <div class="form-check">
                                        <input id="radiosi" value="Si" class="form-check-input" type="radio" name="anonima">
                                        <label class="form-check-label" style="font-size: 15px; font-weight:400" for="anonima">
                                          Sí
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="radiono" value="No" class="form-check-input" type="radio" name="anonima">
                                        <label class="form-check-label" style="font-size: 15px; font-weight:400" for="anonima">
                                          No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="noAnonimo" style="text-align:start; margin-bottom: 5px;">
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

                            <div class="row">
                                <div class="col-md-12 col-sm-12" style="text-align: end;">
                                    <input id="comentarios" type="submit" style="background-color: rgb(255, 123, 0);" class="btn btn-primary" value="Enviar"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button id="Enviar" type="submit" value="Enviar" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}
{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script src="{{ asset('vendors/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    //function para copiar en el portapapeles
    // function copyToClipBoard(){
    //     var texto = document.getElementById('urll').innerHTML;
    //     var content = document.getElementById('campo');
    //     content.setAttribute("value", texto);
    //     content.select();
    //     document.execCommand('copy');
    //     alert('Copiado');

    // }

    
    var editor = CKEDITOR.replace( 'editor1' );
    

    $(document).ready(function(){
        // comentarioHecho();

        actAcordion();

        obtenerComentario();
        
        var inputs = document.querySelectorAll('input[type=radio]');

        for(let i = 0; i<inputs.length; i++){
            inputs[i].addEventListener("change", function(){
                var radioSelected = inputs[i].checked;
                if(radioSelected){
                    var idRadio = inputs[i].getAttribute("id"); 
                    if(idRadio === "radiono"){
                        document.getElementById('contenidoAnonimo').style = "display:block";
                    }else{
                        document.getElementById('contenidoAnonimo').style = "display:none";
                    }
                }
            });
        }
    });

    function alertaGlobal(){
        swal.fire("Aviso!", "Se enviará una notificación Global", "info");
    }
    function alerta(){
        swal.fire("Aviso!", "Se enviará una notificación individual", "info");
    }

    function comentarioHecho(){
        let IdCliente = document.getElementById('cliente').value;
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('setvalidar') }}',
            type: "POST",
            data: {
                IdCliente:IdCliente,
                _token: token
            },
            success: function(response){
                if(response.data.length === 0){
                    document.getElementById('btnBuzon').style = "background-color:rgb(255, 123, 0); color:white;";
                    obtenerComentario(); 
                }else{
                    document.getElementById('btnBuzon').style = "display:none";
                }
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }


    function obtenerComentario(){
        document.getElementById('comentarios').addEventListener("click", function(e){
            e.preventDefault();
            let IdCliente = document.getElementById('cliente').value;
            let IdPeriodo = document.getElementById('periodo').value;
            let mensaje = document.getElementById('mensaje').value;
            let radioSeleccionado = document.querySelector('input[name="anonima"]:checked');
         
            if(mensaje === "" || radioSeleccionado === null){
                if(mensaje === "" && radioSeleccionado === null){
                    swal.fire("Aviso!", "Asegurese de llenar todos los campos", "info"); 
                }else{
                    if(mensaje === ""){

                        swal.fire("Aviso!", "Debe agregar un comentario", "info");
                    }
                    if(radioSeleccionado === null){

                        swal.fire("Aviso!", "Debe seleccionar si es Anónima o no", "info");
                    }
                }
            }else{
                if(radioSeleccionado.getAttribute("id") === "radiono"){
                    let nombre = document.getElementById('nombrequeja').value;
                    let correo = document.getElementById('correoqueja').value;
                    let IdCentro = document.getElementById('centroqueja').value;
                    let IdTipoQueja = document.getElementById('queja').value;
                    let anonimo = radioSeleccionado.value;
                    if(nombre === "" && correo === ""){
                        swal.fire("Aviso!", "Asegurese de agregar correctamente el nombre y correo", "info");  
                    }else{
                        if(correo.includes('@')){
                            enviarComentario(IdCliente,IdPeriodo,mensaje,IdCentro,IdTipoQueja,anonimo,correo,nombre);
                        }else{
                            swal.fire("Aviso!", "Asegurese de agregar un correo correcto", "info");  
                        }
                        
                    }
                }else{
                    let IdCentro = document.getElementById('centroqueja').value;
                    let IdTipoQueja = document.getElementById('queja').value;
                    let anonimo = radioSeleccionado.value;

                    enviarComentario(IdCliente,IdPeriodo,mensaje,IdCentro,IdTipoQueja,anonimo,"","");
                }
            }
        });
    }

    function enviarComentario(IdCliente,IdPeriodo,mensaje,IdCentro,IdTipoQueja,anonimo,correo,nombre){
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('setComentario') }}',
            type: "POST",
            data: {
                IdCliente:IdCliente,
                IdPeriodo:IdPeriodo,
                mensaje:mensaje,
                IdCentro:IdCentro,
                IdTipoQueja:IdTipoQueja,
                anonimo:anonimo,
                correo:correo,
                nombre:nombre,
                _token: token
            },
            success: function(response){
                // if(response.data.length === 0){
                    
                // }else{
                    swal.fire("Aviso!", "El comentario se ha guardado con éxito", "info");
                    document.getElementById('mensaje').value = "";
                    // document.getElementById('btnBuzon').style = "display:none";
                    $('#getBuzon').modal('hide');
                    let mensaje = document.getElementById('mensaje').value = "";
                    let nombre = document.getElementById('nombrequeja').value = "";
                    let correo = document.getElementById('correoqueja').value = "";
                // }
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }
    
</script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Solicitados',
                'Sin información'
            ],
            datasets: [{
                label: 'valor1',
                data: [0, 100],
                backgroundColor: [
                    'rgba(59, 191, 47, 1)',
                    'rgba(255, 205, 86, 1)',

                ],
                borderColor: [
                    'rgba(59, 191, 47, 1)',
                    'rgba(255, 205, 86, 1)',

                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'rgb(255, 255, 255)'
                    }
                }
            }
        }
    });

    var sendMail = function(correo,nombre,mensaje,idPersonal,IdCentro){
    filtroV=document.getElementById('filtroSelect').value;
    if(filtroV!="Finalizado"){
        if(correo!=""){
        const preload = document.querySelector('.loader');
        preload.style.visibility = 'visible';
        let correoin=correo;
        let nombrein=nombre;
        let mensajein=mensaje;
        let token = '{{csrf_token()}}';

        $.ajax({
        url: '{{route('distSendMail')}}',
        type:"POST",
        data:{
            correoin:correoin,
            nombrein:nombrein,
            mensajein:mensajein,
            idPersonal:idPersonal,
            _token: token
        },
        success:function(response){
            preload.style.visibility = 'hidden';
            if(response) {
                swal.fire("Enviado", "El correo se ha enviado con éxito", "success");
            }
        },

        error:function(){
            preload.style.visibility = 'hidden';
            swal.fire("Error", "Ocurrió un error al enviar el correo", "error");
        }
        });
    
    }else{
        swal.fire("Error", "Favor de registrar un correo válido.", "error");
    }
    }else{
        swal.fire("Error", "No se puede enviar el correo, ya finalizó las encuestas", "error");
    }


    document.getElementById(`P${idPersonal}`).style = "color: rgb(158, 196, 117); font-size:25px;margin-right:5px;";
    document.getElementById(`C${IdCentro}`).style = "color: rgb(158, 196, 117); font-size:30px;"
    
    }

    var sendMailGlobal = function(idCentro, DescripcionCT){
    filtroV=document.getElementById('filtroSelect').value;
    idClienteV=document.getElementById('idcli').value;
    idPeriodoV=document.getElementById('idper').value;
    let IdCentro = idCentro;

    if(filtroV!="Finalizado"){
        Swal.fire({
        title: 'Envío de correos',
        icon: 'question',
        text: '¿Está seguro de enviar correos de forma global para el centro de trabajo '+DescripcionCT+'?',
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Cancelar',
        customClass: {
        actions: 'my-actions',
        cancelButton: 'order-1 right-gap',
        confirmButton: 'order-2',
        }
        }).then((result) => {
            if (result.isConfirmed) {
                const preload = document.querySelector('.loader');
                preload.style.visibility = 'visible';
                let idCliente=idClienteV;
                let idPeriodo=idPeriodoV;
                let IdCentroTrabajo=IdCentro;
                let token = '{{csrf_token()}}';


                $.ajax({
                url: '{{route('distSendMailGlobal')}}',
                type:"POST",
                data:{
                    idCliente:idCliente,
                    idPeriodo:idPeriodo,
                    IdCentroTrabajo:IdCentroTrabajo,
                    _token: token
                },
                success:function(response){
                    preload.style.visibility = 'hidden';
                    if(response) {
                        swal.fire("Enviado", "Los correos se han enviado con éxito", "success");
                    }
                },
                error:function(){
                    preload.style.visibility = 'hidden';
                    swal.fire("Error", "Ocurrió un error al enviar el correo", "error");
                }
                });
            }
        })
        
    }else{
        swal.fire("Error", "No se puede enviar el correo, ya finalizó las encuestas", "error");
    }
    }

    var sendWhats = function(telefono, mensaje){
    filtroV=document.getElementById('filtroSelect').value;
    if(filtroV!="Finalizado"){
        if(telefono!=""){
        const preload = document.querySelector('.loader');
        preload.style.visibility = 'visible';
        let telefonoV=telefono;
        let mensajeV=mensaje;
        let token = '{{csrf_token()}}';

        $.ajax({
        url: '{{route('distSendWhats')}}',
        type:"POST",
        data:{
            telefonoV:telefonoV,
            mensajeV:mensajeV,
            _token: token
        },
        success:function(response){
            preload.style.visibility = 'hidden';
            if(response) {
                swal.fire("Enviado", "Se ha enviado el mensaje con éxito", "success");
            }
        },

        error:function(){
            preload.style.visibility = 'hidden';
            swal.fire("Error", "Ocurrió un error al enviar el mensaje", "error");
        }
        });
    
    }else{
        swal.fire("Error", "Favor de registrar un teléfono válido.", "error");
    }
    }else{
        swal.fire("Error", "No se puede enviar el mensaje, ya finalizó las encuestas", "error");
    }
    
    }

    var modalMail = function(message){
        var contentHtml = CKEDITOR.dom.element.createFromHtml('<p>MENSAJE</p>');
        //$('#divMessage').html(`${message}`);
        //CKEDITOR.instances["editor1"].insertHtml('<p>MENSAJE</p>');
        //CKEDITOR.instances.editor1.insertHtml('<p>MENSAJE</p>');

        // Get the editor instance that you want to interact with.
        var editor1 = CKEDITOR.instances.editor1;
        

        // Set editor content (replace current content).
        // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
        editor1.setData(message);
        
        
        $('#yourModal').modal('show');

        
        
    }
var actAcordion = function(){
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

var act = document.getElementsByClassName("actS");
var i;

for (i = 0; i < act.length; i++) {
    act[i].addEventListener("click", function() {
        this.classList.toggle("active");
    });
}

}

var filtrar = function(){
    filtroV=document.getElementById('filtroSelect').value;
    idclienteV=document.getElementById('idcli').value;
    idperiodoV=document.getElementById('idper').value;
    if(filtroV=='Todos'){
        
        document.getElementById('newDatos').style="display:none;";
        document.getElementById('btnGuardarN').style.display="none";
        document.getElementById('formTodos').style="block";
        actAcordion();
        document.getElementById('totalP').style.display="flex";
        document.getElementById('totalFiltro').style.display="none";
        
        
    }else{
        const preload = document.querySelector('.loader');
        preload.style.visibility = 'visible';
        document.getElementById('formTodos').style="display:none;"
        document.getElementById('newDatos').style="display:block;"
        document.getElementById('btnGuardarN').style.display="block"

        let filtro=filtroV;
        let token = '{{csrf_token()}}';
        let idcliente=idclienteV;
        let idperiodo=idperiodoV;

        $.ajax({
        url: '{{route('filtrarDist')}}',
        type:"POST",
        data:{
            filtro:filtro,
            idcliente:idcliente,
            idperiodo:idperiodo,
            _token: token
        },
        success:function(response){
            if(response) {
                
                var item = response.datos;
                var row = response.centros;
                var servCliente = response.servCliente;
                var servDetalle = response.servDetalle;
                var encuestas = response.encuestas;
                var correo = response.correo;
                var servicio = response.servicio;
                //$('#registros').remove();
                $('#newDatos').empty();
                var numC=1;

                for (var j=0; j<row.length; j++){
                    $('#newDatos').append(`
                <div class="accordion col-md-12" style="background-color:rgba(255, 255, 255, 0); border-radius:7px;margin-bottom:7px;">
                    <div class="form-group row">
                        
                        <div class="col-md-1 col-sm-12 text-left numeracion" style="display: flex; justify-content: end;">
                                <div style="height:35px; width:50px;border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center;background-color:white;">
                                <p style="margin-bottom: 0; font-size: 18px; font-weight:bold">`+numC+`</p>
                                </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <li style="background-color:white; width: 100%; height:33px; padding:5px; margin-top:1px; font-size:15px; color:black; list-style:none;border: 1px solid rgb(155, 155, 155); border-radius:7px;" class="actS">`+row[j].Descripcion+`</li>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <div class="row" style="display: flex; gap:5px;">
                                <a href="javascript:sendMailGlobal('`+row[j].IdCentro+`')" class="btn btn-icon" style="display:flex; justify-content:center; align-items:center;"><i class="fa fa-envelope fa-1x" style="color: rgb(255, 123, 0); font-size:30px;"></i></a>
                                <span style="height:35px; width:40px; border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center;">
                                    <p style="margin-bottom: 0; font-size: 14px"><b>0/`+row[j].CantidadCentro+`</b></p>
                                </span>  
                                
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel-accordion col-md-12" id="acordion`+j+`"></div>`);
var numP=1;
                for (var i =  0; i < item.length; i++) {
                    
                    if(row[j].IdCentro==item[i].IdCentroTrabajo){

                    descLink='';
                    descWhats='';

for (var a=0; a < servCliente.length; a++){
    for (var b=0; b < servDetalle.length; b++){
        if (servDetalle[b].IdServicio_cliente==servCliente[a].IdServicio_cliente){
            if (servDetalle[b].IdPersonal==item[i].IdPersonal){
                for (var c=0; c < encuestas.length; c++){
                    if (servDetalle[b].IdEncuesta==encuestas[c].IdEncuesta){
                        descLink=descLink+'<br><b>'+encuestas[c].Descripcion+': </b>'+encuestas[c].Detalle+'<br><a href=`'+servDetalle[b].Link+'`>'+servDetalle[b].Link+'</a><br>';

                        descWhats=descWhats+`\\n\\n*`+encuestas[c].Descripcion+`:* `+encuestas[c].Detalle+'\\n'+servDetalle[b].Link;
                    }
                }
            }
        }
    }
}
descLink=correo[0].Descripcion+'<br>'+descLink+'<br><br><b>Buzón de quejas y Sugerencias: </b><br><a href=`'+servicio[0].LinkSugerencias+'`>'+servicio[0].LinkSugerencias+'</a>';

descWhats=correo[0].Descripcion+descWhats+`\\n\\n*Buzón de quejas y Sugerencias:* `+servicio[0].LinkSugerencias;

                    $('#acordion'+j).append(`
                    <div class="row datosPersonal">
                        <div class="col-md-12 col-sm-12" style="margin-bottom: 10px">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-1" style="display: flex; justify-content: end;">
                                            <div style="height:35px; width:40px;border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center;">
                                                <p style="margin-bottom: 0; font-size: 14px; color:black"><b>#`+numP+`</b></p>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="row" style="">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1" style="background-color: white;">Nombre:</span>
                                                        <input type="text" value="`+item[i].Nombre+`" class="form-control input-group-text" id="" name="updPersonal[`+i+`][Nombre]" style="height: 40px" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1" style="background-color: white">eMail:</span>
                                                <input type="text" value="`+item[i].Correo+`" class="form-control" id="" name="updPersonal[`+i+`][Correo]" style="height: 40px" >
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1" style="background-color: white">Tel:</span>
                                                <input type="text" value="`+item[i].Telefono+`" class="form-control" id="" name="updPersonal[`+i+`][Telefono]" style="height: 40px" >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-7">
                                                    <label for="colFormLabelSm" class="label2 col-sm-2 col-form-label col-form-label-sm" style="width: 100%; height:35px; border: 2px solid green; border-radius: 5px; display:flex; justify-content:center; align-items:center; color:white"><p style="margin-bottom: 0; font-size: 14px; color:black">ID `+item[i].IdPersonal+`</p></label>
                                                    <input type="hidden" value="`+item[i].IdPersonal+`" id="id`+item[i].IdPersonal+`" name="updPersonal[`+i+`][IdPersonal]">
                                                </div>
                                                <div class="col-md-5">
                                                    <a id="P`+item[i].IdPersonal+`" href="javascript:sendMail('`+item[i].Correo+`','`+item[i].Nombre+`','`+descLink+`','`+item[i].IdPersonal+`');" class="btn btn-icon"><i class="fa fa-envelope fa-1x" style="color: rgb(255, 123, 0); font-size:25px;margin-right:5px;"></i></a>
                                                    <a href="javascript:modalMail('`+descLink+`')" class="btn btn-primary btn-icon btn-circle btn-sm" style=""><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:sendWhats('`+item[i].Telefono+`','`+descWhats+`')" class="btn btn-success btn-icon btn-circle" style="background-color:rgb(82, 197, 82);font-size:20px;"><i class="fa fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `);

                    /*$('#acordion'+j).append(`
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1" style="background-color: white;">Nombre:</span>
                            <input type="text" value="`+item[i].Nombre+`" class="form-control input-group-text" id="" name="updPersonal[`+i+`][Nombre]" style="height: 40px" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1" style="background-color: white">eMail:</span>
                            <input type="text" value="`+item[i].Correo+`" class="form-control" id="" name="updPersonal[`+i+`][Correo]" style="height: 40px" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1" style="background-color: white">Tel:</span>
                            <input type="text" value="`+item[i].Telefono+`" class="form-control" id="" name="updPersonal[`+i+`][Telefono]" style="height: 40px" >
                        </div>
                    </div>`);*/
                    $('#canti'+j).html(i);numP++;
                    }
                }
            numC++;
            }

            actAcordion();

                document.getElementById('totalP').style.display="none"
                $('#totalFiltro').empty();
                document.getElementById('totalFiltro').style.display="flex"
                $('#totalFiltro').append('Total de solicitudes: '+response.total);
            }
            preload.style.visibility = 'hidden';
        },

        error:function(){
            preload.style.visibility = 'hidden';
            swal.fire("Error", "Ocurrió un error", "error");
        }
        });
    }
}

    function auto (personal, indice){
        
        var dato = "";
       

        switch (indice){
            case 1: dato =  $("#nombrein"+personal).val();
            break;
            case 2: dato =  $("#correoin"+personal).val();
            break;
            case 3: dato =  $("#telefonoin"+personal).val();
            break;

        }
        
        var token = $('meta[name="csrf-token"]').attr('content');

      
       // console.log(datos);

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},
            url: '{{route('updatePersonalCTauto')}}',
            type:"POST",
            data:{
                personal:personal,
                dato:dato,
                indice:indice
            },
            success:function(response){
                
                
            },

            error:function(){
                showNotify("Error","No se pudo guardar el dato","danger");
            }
        });


    }

   


</script>

@endsection