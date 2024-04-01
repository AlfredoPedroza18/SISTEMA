<html lang="es">

 <style>
    a{
    width: 100%;
  }

  .normal {
    background: #cdcdcd;
  }

  .amarrillo {
    background: #f0ad4e;
  }

  .colorCheck{
    color: verde;
  }

  .verde {
    background: #00c73e;
  }

  .div{
    position: absolute;
    top:15px;
    color: #003375;
    font-weight: bold;
  }

  #div{
    position: absolute;
    top:20px;
    color: #003375;
    font-weight: bold;
  }

  #t-kardex tr th, #t-kardex tr td{
    border: solid 1px #656565;
    text-align: center;
  }

  .requerido:after {
      content:" *";
      color: red;
    }



    #requerido:after {
      content:" *";
      color: red;
  }

  #div-des{
     height:100px;
     width:100%;
     word-wrap: break-word;
  }

  #ProgramacionEjecucion input{
      border: 1px solid #ccd0d4;
  }

  #Estudio input[value=""]:required{
      border: 1px solid red;
  }

  #Estudio textarea:empty:required {
    border: 1px solid red;

  }

  #Estudio select:not(:valid) {
    border:solid 1px red;
  } 

  .tabamarillo {
      background: #FFA500;
      color:yellow;
  }

  .tabverde {
      background: #FFA500;
      color:green;
    text-shadow: white;
  }

  .Estatus_cortar{
    width:60px;
    height:20px;
    text-overflow:ellipsis;
    white-space:nowrap;
    overflow:hidden;
  }

  .cortar{
    width:60px;
    height:20px;
    text-overflow:ellipsis;
    white-space:nowrap;
    overflow:hidden;
  }

    .buttonFile {
          display:none;
      }

      .checkmark {
          display:none;
          width: 22px;
          height:22px;
          -ms-transform: rotate(45deg); /* IE 9 */
          -webkit-transform: rotate(45deg); /* Chrome, Safari, Opera */
          transform: rotate(45deg);
      }

      .checkmark_circle {
          position: absolute;
          width:22px;
          height:22px;
          background-color: green;
          border-radius:11px;
          left:0;
          top:0;
      }

      .checkmark_stem {
          position: absolute;
          width:3px;
          height:9px;
          background-color:#fff;
          left:11px;
          top:6px;
      }

      .checkmark_kick {
          position: absolute;
          width:3px;
          height:3px;
          background-color:#fff;
          left:8px;
          top:12px;
      }

  :focus {
    border:1px solid #3a90c2;
    outline: none;
  }

  .required:focus {
    border:1px solid #3a90c2;
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
      height:25px;
      color: white;
      position: absolute;
      right:0;
      top: 0;
      font-size: 12px;
      line-height:25px;
      text-align: center;
      -webkit-transition: 500ms all;
      -moz-transition: 500ms all;
      transition: 500ms all;
  }

  input[type='file'] {
      height:25px;
      opacity:0;
      background: none;
      background-image:none;
      outline: none;
      position: absolute;
      top: 0;
      left: 0;
      font-size:12px;
      line-height: 25px;
      text-indent: 10px;
      pointer-events: none;
  }

  .filePJ {
      height: 25px;
      background-color: white;
      box-shadow: 1px 2px 3px #ededed;
      position:relative;
      border: 1px solid #d8d8d8;
  }

  .filePJ.required{
      height: 25px;
      background-color: white;
      box-shadow: 1px 2px 3px #ededed;
      position:relative;
      border: 1px solid red;
  }

  @keyframes spinner {
    to {transform: rotate(360deg);}
  }

  #Trayectoria, #Escolar, #Resumen{
    height: 130px;
  }
  .spinner-border{
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

  .form-control-lg{
      border: solid 1px red;
    }

  .form-control-lg:focus{
      outline: none;
    }

  .disabledTab{
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
      <head>

<meta name="csrf_token" content="{{ csrf_token() }}" />
</head>
{{-- <body onload="setTimeout('autoClick();',3000);">
</body> --}}
<input type="hidden" id="cpCandidate" value="{{$cpCandidate}}">
<fieldset id="general" disabled>
<div  class="jumbotron body">
   @php($nombre = "No")

    <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="row">
        <div class="form-row">
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
              @if ($enlace)
                <label > <strong> OS: </strong> <a style="color:black;" href="{{route('sig-erp-ese::ListadoOS.edit', $enlace )}}"> <strong> # </strong> <strong style= "font-weight:100 !important;">{{$idOS}}</strong> <strong> ESE: # </strong> <strong style= "font-weight:100 !important;">{{$idESE}}</strong> </a></label>
                @else
                  <label> <strong> OS: # <strong style= "font-weight:100 !important;">{{$idOS}}</strong> <strong> ESE: # </strong> <strong style= "font-weight:100 !important;">{{$idESE}}</strong>  </strong> </label>
              @endif
            </div>
            <!--Muestreo de estatus de cerrado o pendiente --> 
               
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
                <label id="label_status"><strong>Estatus:</strong> 
                          @foreach($Estatus_encabezado as $Es)

                          {{$Es -> Estatus}}

                          @endforeach
              </label>
            </div>
       </div>
    </div>
  
    <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="row">
        <div class="form-row">
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
                <label id="label_cliente"><strong>Cliente:</strong> {{$clientes}}</label>
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
                <label id="label_analista"><strong>Analista:</strong> {{$asignacion[4]}}</label>
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
            </div>

            </div>
    </div>

    <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="row">
        <div class="form-row">
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
                <label><strong>Candidato:</strong> {{$candidato}} </label>
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 24%;" class="form-group col-md-3">
                <label id="label_Investigador"><strong>Investigador:</strong> {{$asignacion[5]}}</label>
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
                
              @if(Auth::user()->tipo == "f" )

              <a style="margin-right: 10px; display:none;" class="btn btn-success col-md-5" href="{{url('pdf-gent/'.$IdServicioEse.'/'.$IdCliente)}}" target="_blank">Estudio</a>       
                &nbsp;  
              <a style="display:none;" class="btn btn-success col-md-5" href="{{url('pdf-documentos/'.$IdServicioEse)}}" target="_blank">Documentos</a> 
               
              
              @else

              <a style="margin-right: 10px;" class="btn btn-success col-md-5" href="{{url('pdf-gent/'.$IdServicioEse.'/'.$IdCliente)}}" target="_blank">Estudio</a>       
                &nbsp;  
              <a class="btn btn-success col-md-5" href="{{url('pdf-documentos/'.$IdServicioEse)}}" target="_blank">Documentos</a> 
               

              @endif
            <button class="btn btn-success" type="button" name="button" id="btnPreviewPDF" data-toggle="modal" data-target="#Previsualizar_ESE" style="display: none;" >Estudio</button>    
           </div>
           
 
        </div>
    </div>

    <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="row">
        <div class="form-row">
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
            <!--Visualización del servicio por prioridad y modalidad-->
                    <label id="numC"><strong>Celular:</strong> {{$Ccandidato}} </label> 
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 24%;" class="form-group col-md-3">
             <!--Visualización de Fecha y Hora-->
            <label id=""> </label>
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
            </div>
        </div>
    </div>
     
    <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="row">
        <div class="form-row">
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
            <!--Visualización del servicio por prioridad y modalidad-->
                    <label id="Servicio"><strong>Servicio:</strong> {{$servicio}} - {{$PrioridadDescrip}} - {{$ModalidadDescrip}}</label> 
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 24%;" class="form-group col-md-3">
             <!--Visualización de Fecha y Hora-->
            <label id="FechayHora"><strong>Agenda:</strong><span id="idFechaUpdate">{{$ProgramacionEjecucionFecha}}</span>  <strong>Hora:</strong><span id="idHoraUpdate">{{$ProgramacionEjecucionHora}}</span></label>
            </div>
            <div style="background-color: white; margin-left: 0px; margin-right: 0px;" class="form-group col-md-3">
            </div>
        </div>
    </div>
      <input type="hidden" name="IdCliente" id="IdCliente"  value="{{$IdCliente}}">
      <input type="hidden" name="IdPlantilla" id="IdPlantilla" value="0">
        <!-- Modal Previsualizar ESE PDF-->
        <div class="modal fade" id="Previsualizar_ESE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
              </div>
              <div class="modal-body" id="" style="height:450px;">
              </div>
              <div class="modal-footer">
                <button type='button' id="btnDownloadStudio" class='btn btn-info' style="display: none;" onclick="downloadFile()">Descargar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal Previsualizar ESE PDF-->
    <br>

    <label style="font-size:20px;">Estatus Captura</label>
      <div class="row">
          @foreach ($status as $s)
            <div class="col-sm-3" style="padding-bottom: 15px;">
              <div>
                <div id="{{ $s->IdContenedor }}" class="{{ $s->colorEstat }} or normal" data-toggle="tooltip" data-placement="top" title="{{ $s->Grupo }}">
                  <label >{{ $s->Grupo }}</label> </div>
              </div>
            </div>
          @endforeach
      </div>
    <br>

  <div id="tabs-estat" style="font-size:15px; " >
    <ul class="nav nav-tabs tabsFirt nav-justified" >
    @if(Auth::user()->tipo=='c')
       <li><a href="#Analista" aria-controls="Analista" role="tab" data-toggle="tab" width='100%'>Servicio</a></li>
       <li style="display: none;" class="{{ ($EstatusEval == 'Cerrado')?'disabled disabledTab':'' }}"><a href="#Asignacion" aria-controls="Asignacion" role="tab" data-toggle="tab">Asignación</a></li>
       <li style="display: none;" class="{{ ($Notificada == '' && $showDialogProgamacionEjecucion)?'':($EstatusEval == 'Cerrado')?'disabled disabledTab':'' }}"><a href="#ProgramacionEjecucion" aria-controls="ProgramacionEjecucion" role="tab" data-toggle="tab">Agenda</a></li>
       <li style="display: none;" class="{{ ($EstatusEval == 'Cerrado')?'disabled disabledTab':'' }}"><a href="#Estudio" aria-controls="Estudio" role="tab" data-toggle="tab">Estudio</a></li>
       <li style="display: none;"><a href="#Investigador" aria-controls="Investigador" role="tab" data-toggle="tab">Resumen</a></li>
    @elseif(Auth::user()->tipo=='f')
                    
        @if($EstatusEval != 'Cerrado'  ||  $EstatusEval != 'Cancelado')
         <li class="{{ ($EstatusEval == 'Cerrado')  || ($EstatusEval == 'Cancelado')?'disabled disabledTab':''}}" ><a href="#Estudio" aria-controls="Estudio" role="tab" data-toggle="tab">Estudio</a></li>
         <li  class="{{ ($EstatusEval == 'Cerrado') || ($EstatusEval == 'Cancelado')  ?'disabled disabledTab':''}}"><a href="#Investigador" aria-controls="Investigador" role="tab" data-toggle="tab">Resumen</a></li>
         @else
          <li class="{{ ($EstatusEval == 'Cerrado')  || ($EstatusEval == 'Cancelado')?'disabled disabledTab':''}}"><a href="#Estudio" aria-controls="Estudio" role="tab" data-toggle="tab">Estudio</a></li>
          <li class="{{ ($EstatusEval == 'Cerrado')  || ($EstatusEval == 'Cancelado') ?'disabled disabledTab':''}}"><a href="#Investigador" aria-controls="Investigador" role="tab" data-toggle="tab">Resumen</a></li>  
    @endif    
       <li style="display: none;"><a href="#Analista" aria-controls="Analista" role="tab" data-toggle="tab" width='100%'>Servicio</a></li>
       <li style="display: none;" class="{{ ($EstatusEval == 'Cerrado')?'disabled disabledTab':'' }}"><a href="#Asignacion" aria-controls="Asignacion" role="tab" data-toggle="tab">Asignación</a></li>
       <li style="display: none;" class="{{ ($Notificada == '' && $showDialogProgamacionEjecucion)?'':($EstatusEval == 'Cerrado')?'disabled disabledTab':'' }}"><a href="#ProgramacionEjecucion" aria-controls="ProgramacionEjecucion" role="tab" data-toggle="tab">Agenda</a></li>
       
      @else 
       <li  class="{{ ($EstatusEval == 'Cerrado' || $EstatusEval == 'Cancelado')?'disabled disabledTab':'' }}"><a href="#Asignacion" aria-controls="Asignacion" role="tab" data-toggle="tab">Asignación</a></li>
       <li  class="{{ ($EstatusEval == 'Cerrado' || $EstatusEval == 'Cancelado')?'disabled disabledTab':'' }}"><a href="#ProgramacionEjecucion" aria-controls="ProgramacionEjecucion" role="tab" data-toggle="tab">Agenda</a></li>
       <li  class="{{ ($EstatusEval == 'Cerrado' || $EstatusEval == 'Cancelado')?'disabled disabledTab':'' }}"><a href="#Estudio" aria-controls="Estudio" role="tab" data-toggle="tab">Estudio</a></li>
       <li  class="{{ ($EstatusEval == 'Cerrado' || $EstatusEval == 'Cancelado')?'disabled disabledTab':'' }}"><a href="#Investigador" aria-controls="Investigador" role="tab" data-toggle="tab">Resumen</a></li>
       <li><a href="#Analista" aria-controls="Analista" role="tab" data-toggle="tab" width='100%'>Servicio</a></li>
      @endif
    </ul>
      

	<div id="nav-tabContent" style="font-size:13px;">
      <div  class="tab-pane active" id="Asignacion">
              <form id="FAsignacion">
              <input type="hidden" id="IdServicioEse" name="IdServicioEse" value="{{ $IdServicioEse or '' }}">
                  <div class="row">
                      <div class="form-group col-md-3">
                          <label>Analista</label>
                          <div class="row">
                              <div class="input-group">
                                <select class="form-control" id="IdAnalista" name="IdAnalista" onchange="selectAnalista();">
                                  <option value="N/A"> Seleccione un Analista</option>
                                  @foreach ($analistas as $e)
                                  <option id="A{{$e->id}}" value="{{$e->id}}" {{($asignacion[1] == $e->id)?'selected':''}} >{{$e->NombreCompleto}}</option>
                                    {{--<option id="A{{$e->IdEmpleado}}" value="{{$e->IdEmpleado}}" {{($asignacion[1] == $e->IdEmpleado)?'selected':''}} >{{$e->NombreCompleto}}</option>--}} 
                                  @endforeach
                                </select>
                                  {{-- {!! Form::select('IdAnalista', $analistas, null, ['class'=>'form-control', 'id'=>'IdAnalista','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!} --}}
                                  <a class="input-group-addon danger glyphicon glyphicon-plus-sign"
                                      href="#" data-toggle="modal" data-target="#create" data-placement="top" title="Analistas" data-original-title="Analistas" @permission('ese.lista.estudios.editar') onclick="showmodal('Analista');"@endpermission>
                                  </a>
                              </div>
                          </div>
                      </div>

                      <div class="form-group col-md-3">
                          <label>Analista Secundario</label>
                          <div class="row">
                              <div class="input-group">
                                <select class="form-control" id="IdAnalistaSec" name="IdAnalistaSec">
                                  <option value="N/A"> Seleccione un Analista</option>
								                  <option value="2" @if ($asignacion[3] == 2) selected  @endif> No aplica Analista </option>
                                  @foreach ($analistasSec as $e)
                                  <option id="AS{{$e->id}}" value="{{$e->id}}" @if ($asignacion[3] == $e->id) selected  @endif >{{$e->NombreCompleto}}</option>
                                    {{--<option id="AS{{$e->IdEmpleado}}" value="{{$e->IdEmpleado}}" @if ($asignacion[3] == $e->IdEmpleado) selected  @endif >{{$e->NombreCompleto}}</option>--}}     
								                  @endforeach
                                </select>
                                  {{-- {!! Form::select('IdAnalista', $analistasSec, null, ['class'=>'form-control', 'id'=>'IdAnalista','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!} --}}
                                  <a class="input-group-addon danger glyphicon glyphicon-plus-sign"
                                      href="#"  data-backdrop="static" data-toggle="modal" data-target="#create" data-placement="top" title="Analistas" data-original-title="Analistas" @permission('ese.lista.estudios.editar')onclick="showmodal('AnalistaSecundario');"@endpermission>
                                  </a>
                              </div>
                          </div>
                      </div>

                      <div class="form-group col-md-3">
                          <label>Investigador</label>
                          <div class="row">
                              <div class="input-group">
                                <select class="form-control" id="IdInvestigador" name="IdInvestigador" onchange="selectInvestigador();">
                                  <option value="N/A"> Seleccione un Investigador</option>
								                  <option value="1" @if ($asignacion[2] == 1) selected @endif> No aplica Investigador </option>
                                    @foreach ($investigadores as $e)
                                      <option id="I{{$e->IdEmpleado}}" value="{{$e->IdEmpleado}}" @if ($asignacion[2] == $e->IdEmpleado) selected @endif >{{$e->NombreCompleto}}</option>
                                    @endforeach
                                </select>
                                  {{-- {!! Form::select('IdInvestigador', $investigadores, null, ['class'=>'form-control', 'id'=>'IdInvestigador','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!} --}}
                                  <a class="input-group-addon danger glyphicon glyphicon-plus-sign"
                                      href="#" data-toggle="modal" data-placement="top" title="Investigadores" data-original-title="Investigadores" id="btnShowModalInvestigator" @permission('ese.lista.estudios.editar')onclick="showmodal('Investigador');"@endpermission>
                                  </a>
                              </div>
                          </div>
                      </div>

                      <div class="form-group col-md-3">
                          <label>Lider</label>
                          <div class="row">
                              <div class="input-group">
                                <select class="form-control" id="IdLider" name="IdLider" onchange="selectLider();">
                                  @foreach ($coordinadores as $e)
                                  <option id="L{{$e->id}}" value="{{$e->id}}"  @if ($asignacion[0] == $e->id) selected @endif >{{$e->NombreCompleto}}</option>
                                    {{--<option id="L{{$e->IdEmpleado}}" value="{{$e->IdEmpleado}}"  @if ($asignacion[0] == $e->IdEmpleado) selected @endif >{{$e->NombreCompleto}}</option>--}}
                                  @endforeach
                                </select>
                                  <a class="input-group-addon danger glyphicon glyphicon-plus-sign"
                                      href="#" data-toggle="modal" data-target="#create" data-placement="top" title="Lideres" data-original-title="Lideres" @permission('ese.lista.estudios.editar')onclick="showmodal('Lideres');"@endpermission>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="form-group col-md-6">
                          <label>Modo de Ejecución</label>
                          {!! Form::select('IdModalidad', $modalidades, null, ['class'=>'form-control', 'id'=>'IdModalidad','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'', "disabled"=>"true"]) !!}
                      </div>

                      <div class="form-group col-md-6">
                          <label>Prioridad</label>
                          {!! Form::select('IdPrioridad', $prioridades, null, ['class'=>'form-control', 'id'=>'IdPrioridad','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'', "disabled"=>"true"]) !!}
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="form-group col-md-6">
                          <label>Comentarios</label>
                          {{ Form::textarea('Comentarios', null, ['class' => 'form-control','id' => 'Comentarios','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','size' => '30x5']) }}
                      </div>
                  </div>
                  <br>
                <div class="row">
                    @if (Auth::user()->tipo=='c')
                        <div class=" col-md-12 text-right">
                            <a style="display: none;" class="btn btn-success" type="button" id="btnAsignacion"  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando..." disabled="true">Guardar</a>
                        </div>
                    @else
                      <div class=" col-md-8 text-right"></div>
                      <div class=" col-md-2 text-right">
                        @if (Auth::user()->tipo=="s")
                          <a class="btn btn-success btn-block" id="btnAsignacion"  onclick="Asignacion(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar</a>
                        @endif
                        @if (Auth::user()->IdRol==4)
                          <a class="btn btn-success btn-block" id="btnConfirmacionInvestigador" name="btnConfirmacionInvestigador" onclick="ConfirmacionInvestigador(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Enviando confirmación...">Confirmación Investigador</a>
                        @endif
                      </div>
                      <div class="col-md-2">
                          <a class="btn btn-success btn-block " type="button" id="btnConfirmacionAnalista" name="btnConfirmacionAnalista" onclick="ConfirmacionAnalista(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Enviando confirmación...">Confirmación</a>
                      </div>
                    @endif
                </div>
                  <br><br><br>
              </form>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-title"></h5>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="IdServicioEse" name="IdServicioEse" value="{{ $IdServicioEse or '' }}">
                  <div class="row" id="table-all">
                    <div class="col-sm-12" style="overflow-y:scroll; height:250px;">
                      <table class="table">
                        <tr>
                          <td>Nombre</td>
                          <td>Colonia</td>
                          <td>Activo</td>
                          <td>Srv. Asignados</td>
                          <td></td>
                        </tr>
                        <tbody id="table-body-all">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row" id="content-table">
                    <div class="col-sm-12" >
                      <div class="row">
                        <div class="col-sm-5">
                            <label for="estado" >Estado</label>
                            <!--{{-- <input type="text" class="form-control" id="estado" value=""> --}}-->
                            <select name="estado" id="estado" class="form-control" >
                                <option value ="0">Seleccione un estado</option>
                                @foreach ($Estados as $itemE)
                                    <option {{($itemE->IdEstado == $IdEstado)?'selected':''}} value="{{$itemE->IdEstado}}">{{$itemE->nombre_estado}}</option>
                                @endforeach
                            </select>
                        <label >Municipio</label>
                          <select name="municipios" id="municipios" class="form-control" >
                              <option value ="0">Seleccione una region</option>
                            @foreach ($stateFromCandidate as $itemMun)
                                <option value="{{$itemMun->IdMunicipio}}">{{$itemMun->Descripcion}}</option>
                            @endforeach
                          </select>
                          <br>
                          <button class="btn btn-primary" type="button" name="button" onclick="search_investigador_municipio();">Buscar por Municipio</button>
                            <button class="btn btn-primary" type="button" name="button" onclick="search_investigador();">Buscar por estado</button>
                          <br>
                           <label for=""><strong>Datos del candidato</strong><br><strong>Estado: </strong>{{$EstadoCandidato}},<strong> Ciudad / Municipio / Alcaldía: </strong>{{$MunicipioCandidato}},<strong> Colonia: </strong>{{$ColoniaCandidato}}</label> 
                        </div>
                        <div class="col-sm-7">
                          <div id="map" style="height: 230px;"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12" style="overflow-y:scroll; height:250px;">
                      <table class="table">
                        <tr>
                          <td>Nombre</td>
                          <td>Celular</td>
                          <td>Estatus</td>
                          <td>Foto</td>
                          <td>Srv. Asignados</td>
                          <td></td>
                        </tr>
                        <tbody id="table-body">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal FOTO -->
          <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div style="clear:both">
                    <iframe id="viewer" frameborder="0" scrolling="no" width="565" height="500"></iframe>
                  </div>
                  <div id="message-photo" class="text-center"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="tab-pane " id="ProgramacionEjecucion" role="tabpanel" aria-labelledby="ProgramacionEjecucion-tab" >
        <form id="FProgramacionEjecucion">
            <input type="hidden" id="IdServicioEse" name="IdServicioEse" value="{{ $IdServicioEse or '' }}">
            <div class="row"><!-- begin row -->
              <div class="col-md-6">
                <label for="recipient-name" class="form-control-label">Fecha:</label>
                <div class="input-group date date " id="datepicker-disabled-past" data-date-format="dd-mm-yyyy" data-date-start-date="Date.default" enableOnReadonly="true">
                  <input type="text" class="form-control date form-control-lg" placeholder="Fecha" id="fechaPE" name="fechaPE" value="{{$ProgramacionEjecucionFecha}}"/>
                  <span class="input-group-addon add-on "><i class="fa fa-calendar"></i></span>
                </div>
              </div>
              <!-- begin col-1 -->
                <div class="col-md-3">
                  <label for="recipient-name" class="form-control-label">Hora:</label>
                  <div class="input-group bootstrap-timepicker timepicker ti1">
                    <input id="horaPE" name="horaPE" type="time" class="form-control input-small time ti1 form-control-lg" value="{{$ProgramacionEjecucionHora}}" />
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-time"></i>
                    </span>
                  </div>
                </div>                                        
            </div>
			      <br>
				  <div class="row justify-content-end">
            <div class="col-md-8"></div>
            <div class="col-md-2 text-right">
              @if ($Notificada != 'Notificada')
                    @if (Auth::user()->tipo=='c')
                        <a style="display: none;" class="btn btn-success btn-block" id="Notificacion" name="Notificacion" disabled="true" >Notificar</a>
                    @endif
              @else
                  @if (Auth::user()->tipo=='c')
                      <a style="display: none;" class="btn btn-success btn-block" id="Notificacion" name="Notificacion" disabled="true">Notificar</a>
                    @endif
              @endif    
            </div>
              @if (Auth::user()->tipo=='c')
                  <div class="col-md-2">
                      <a style="display: none;" class="btn btn-success btn-block" type="button" id="btnProgramacionEjecucion" disabled="true" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar</a>
                  </div>
              @else
                  <div class="col-md-2">
                      <a class="btn btn-success btn-block " type="button" id="btnProgramacionEjecucion" onclick="ProgramacionEjecucion(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar</a>
                  </div>
              @endif
          </div>
          <br><br><br>
        </form>
      </div>
      <div class="tab-pane " id="Estudio" role="tabpanel" aria-labelledby="Estudio-tab">
        <form id="Estudio-form" action="#" >
            <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="3" />
            <div id="tabs-dinamic" class="row">
              <div class="tab-v1">
                <ul class="nav nav-tabs tabsSecundary" id="grpos">
                </ul>
                <div class="tab-content" id="grps">
                </div>
              </div>
              <div id="content-loading-Studio">
                <div class="row text-center" id="loading-Studio" style="display: none;">
                  <div class="col-sm-12">
                    <div class="spinner"></div>
                    <br><br><br>
                    <h4>Cargando datos del estudio...</h4>
                  </div>
                </div>
                <div id="content-message-loading" style="display: none;">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <div id="message-loading"><h4>ocurrió un error al obtener los datos del estudio</h4></div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="content-try-again" style="display: none;">
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <button type="button" class="btn btn-success btn-sm" id="btn-try-again" onclick="btnTryAgain()">Intentar de nuevo</button>
                  </div>
                </div>
              </div>
            </div>
            <br><br><br>
            <div id="tabs-dinamic-buttons" >
						</div>
            <br><br><br>
            <div class="row">
              <div class="col-sm-2 col-sm-2">
                <a class="btn btn-success btn-block btnback">Anterior</a>
              </div>
              <div class="col-sm-2 col-sm-offset-8">
                <a class="btn btn-success btn-block btncontinue" >Siguiente</a>
              </div>
            </div>
            <br><br><br>
        </form>
      </div>

      <div class="tab-pane " id="Analista" role="tabpanel" aria-labelledby="Analista-tab">
        <form id="Analista-form" action="#" >
          <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="3" />
          <div class="row">
            <div class="form-group col-md-6">
                <label>Comentarios</label>
                {!! Form::text('Comentarios', isset($ComentarioAnalista)?$ComentarioAnalista:null, ['class'=>'form-control', 'id'=>'ComentariosEval','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'']) !!}
            </div>

            <div class="form-group col-md-6">
              <label>Estatus</label>
              <select class="form-control" name="EstatusEval" id="EstatusEval">
                <option  @if ($EstatusEval=='Pendiente') selected @endif value="Pendiente">Pendiente</option>
                
                  <option  @if ($EstatusEval=='Cerrado') selected @endif value="Cerrado">Cerrado</option>
                
                  <option  @if ($EstatusEval=='Cancelado') selected @endif value="Cancelado">Cancelado</option>
               
           
              </select>
            </div>
              @php
              @endphp
              <br>
              <br>
              <table style="width:100%;" id="t-kardex">
                <tr>
                 <th>Fecha</th>
                 <th>Movimiento</th>
                 <th>Usuario</th>
                 </tr>
                  @foreach ($kardex as $s)
                  <tr>
                  <td>{{ $s->Fecha }}</td>
                  <td>{{ $s->Movimiento }}</td>
                  <td>{{ $s->Nombre }}</td>
                   </tr>
                   @endforeach
                 </table>
          </div>

          <br>
          <br>
          
          <div class="row">
            <div class="col-xl-12 col-sm-2">
            @if (Auth::user()->tipo=='c')
              <a style="display: none;" class="btn btn-success btn-block back">Anterior</a>
            @else
              <a class="btn btn-success btn-block back">Anterior</a>
            @endif
            </div>
            <div class="col-xl-12 col-sm-8"></div>
            <div class="col-xl-12 col-sm-2 text-right">
                @if (Auth::user()->tipo=='c')
                    <a style="display: none;" class="btn btn-success btn-block float-left" id="btnAnalista" type="button" disabled="true" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar</a>
                @else
                    <a class="btn btn-success btn-block float-left" id="btnAnalista" type="button" onclick="saveAnalista(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar y Notificar</a>
                @endif
            </div>
            <div class=" col-xl-12 col-sm-2">
            @if (Auth::user()->tipo=='c')
              <a style="display: none;" class="btn btn-success btn-block float-left" id="btnNotificationAnalista" type="button" onclick="sendEmailFromAnalist(this.id,{{ $IdServicioEse }})" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Notificando...">Notificar</a>  
            @else
                <!--<a class="btn btn-success btn-block float-left" id="btnNotificationAnalista" type="button" onclick="sendEmailFromAnalist(this.id,{{ $IdServicioEse }})" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Notificando...">Notificar</a>  
                -->     
           @endif
            </div>
          </div>
          <br><br><br>
        </form>
      </div>

      <div class="tab-pane " id="Investigador" role="tabpanel" aria-labelledby="Investigador-tab">
        <form id="Investigador-form" action="#" >
          {{ csrf_field() }}
          <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="3" />
          <div class="row">
            <div class="form-group col-md-12" >
                <label>Dictamen</label>
                <select class="form-control" name="DictamenVal" id="DictamenVal" onblur="saveDictamenA(this.name, this.value);" @if (Auth::user()->tipo == "f" ) disabled @endif>>
                  <option value="" @if (Auth::user()->tipo == "f" ) selected @endif>Seleccione una Opción</option>
                  <option @if ($DictamenVal=='Apto') selected @endif value="Apto">Apto</option>
                  <option @if ($DictamenVal=='No Apto') selected @endif value="No Apto">No Apto</option>
                  <option @if ($DictamenVal=='Apto a Reserva') selected @endif value="Apto a Reserva">Apto a Reserva</option>
                </select>
            </div>
            <div class="col-xl-12 col-sm-2 text-right">
                <button class="btn btn-success btn-block" type="button" id="btnSummary" onclick="generateSummary(this.id,{{ $IdServicioEse }})"  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Obteniendo datos...">Resumen</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group col-md-12">
                <label>Resumen Situación Económica</label>
                {!! Form::textarea('Resumen', $ResumenEconomica, ['class'=>'form-control', 'id'=>'Resumen','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','style' => 'resize:none']) !!}
            </div>
            <div class="form-group col-md-12">
                <label>Resumen Escolaridad</label>
                {!! Form::textarea('Escolar', $ResumenEscolar, ['class'=>'form-control', 'id'=>'Escolar','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','style' => 'resize:none']) !!}
            </div>

            <div class="form-group col-md-12">
                <label>Resumen Trayectoria Laboral</label>
                {!! Form::textarea('Trayectoria', $ResumenTrayectoriaLaboral, ['class'=>'form-control', 'id'=>'Trayectoria','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','style' => 'resize:none']) !!}
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
                <label>Disponibilidad</label>
                <select class="form-control" id="Disponibilidad" name="Disponibilidad">
                  <option @if ($Disponibilidad == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Disponibilidad == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Disponibilidad == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Puntualidad</label>
                <select class="form-control" id="Puntualidad" name="Puntualidad">
                  <option @if ($Puntualidad == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Puntualidad == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Puntualidad == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Seriedad</label>
                <select class="form-control" id="Seriedad" name="Seriedad">
                  <option @if ($Seriedad == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Seriedad == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Seriedad == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
                <label>Actitud</label>
                <select class="form-control" id="Actitud" name="Actitud">
                  <option @if ($Actitud == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Actitud == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Actitud == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Confiabilidad</label>
                <select class="form-control" id="Confiabilidad" name="Confiabilidad">
                  <option @if ($Confiabilidad == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Confiabilidad == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Confiabilidad == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Seguridad</label>
                <select class="form-control" id="Seguridad" name="Seguridad">
                  <option @if ($Seguridad == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Seguridad == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Seguridad == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>
          </div>
          <div class="row"> 
            <div class="form-group col-md-4">
                <label>Presentacion</label>
                <select class="form-control" id="Presentacion" name="Presentacion">
                  <option @if ($Presentacion == "Bueno") selected @endif value="Bueno">Bueno</option>
                  <option @if ($Presentacion == "Malo") selected @endif value="Malo">Malo</option>
                  <option @if ($Presentacion == "Regular") selected @endif value="Regular">Regular</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Comentarios</label>
                @if ($Comentarios <> null)
                {!! Form::textarea('ComentariosDI', $Comentarios, ['class'=>'form-control', 'id'=>'ComentariosDI','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','style' => 'resize:none']) !!}
                @else
                {!! Form::textarea('ComentariosDI', 'El candidato se portó amable y con disponibilidad para responder a las preguntas realizadas, asimismo entregó los documentos solicitados para cotejar información.', ['class'=>'form-control', 'id'=>'ComentariosDI','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','style' => 'resize:none']) !!}
                @endif
            </div>
            @if ($Incidencias==0)
              @else
                <div class="form-group col-md-4">
                    <label>Estatus</label>
                    <select class="form-control" id="EstatusIncidencias" name="EstatusIncidencias">
                      <option value="Bajo">Bajo</option>
                      <option value="Mínimo">Mínimo</option>
                      <option value="Preventivo">Preventivo</option>
                      <option value="Alerta ">Alerta </option>
                      <option value="Alto">Alto</option>
                    </select>
                </div>
            @endif
          
          </div>
          <br>

          <div class="row">
            <div class="col-xl-12 col-sm-2">

            @if (Auth::user()->tipo=='f')
              @if($EstatusEval != 'Cerrado')
                <a class="btn btn-success btn-block back">Anterior</a>
              @else

              @endif

            @else
            <a class="btn btn-success btn-block back">Anterior</a>
            @endif
            </div>
            <div class="col-xl-12 col-sm-8"></div>
            <div class="col-xl-12 col-sm-2 ">
    
                @if (Auth::user()->tipo=='c')
                  <a  style="display: none;" class="btn btn-success btn-block continue" type="button" id="btnTabInvestigador" disabled="true" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Siguiente</a>
                @elseif (Auth::user()->tipo=='f')
                        <a class="btn btn-success btn-block" type="button" id="btnTabInvestigador" onclick="DictamenInvestigador(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar</a>
                @else
                    <a class="btn btn-success btn-block continue" type="button" id="btnTabInvestigador" onclick="DictamenInvestigador(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Siguiente</a>
                @endif
            </div>
          </div>
          <br><br><br>
        </form>
      </div>
    </div>
  </div>
</div>

<div id='modalShowFile' class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog' role="document">
    <div class='modal-content'>
      <div class='modal-body' id="modal-body-showFile">
        <div id="content-loading-file">
          <div class="row text-center" id="loading-file" style="display: none;">
            <div class="col-sm-12">
              <div class="spinner"></div>
              <br><br><br><br>
              <h4>Obteniendo Archivo...</h4>
            </div>
          </div>

          <div id="content-message-loading-file" style="display: none;">
            <div class="row">
              <div class="col-sm-12 text-center">
                <div id="message-loading"> :( <br><h4>ocurrió un error al obtener el archivo</h4></div>
              </div>
            </div>
          </div>
        </div>

        <div id="container-file"></div>
        {{-- <iframe id='filpdf' src='data:application/pdf;base64,' frameborder='0' scrolling='no' width='565' height='500'></iframe> --}}
      </div>

      <div class='modal-footer'>
        <button type='button' id="btnDownloadFileStudio" class='btn btn-info' style="display: none;" onclick="downloadFile()">Descargar</button>
        <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>
</fieldset>
    @section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    @include('ESE.NuevaOS.widgets.linksAyuda') 
    {!! Html::script('assets/js/sweetalert.min.js') !!}
    {!! Html::script('assets/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('assets/plugins/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('assets/plugins/fullcalendar/es.js') !!}
    {!! Html::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') !!}
    {!! Html::script('assets/js/OpenLayers.js') !!}
    {!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}
    {!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}
    {!! Html::script('assets/js/Compressor/compressor.js') !!}
    {!! Html::script('assets/js/mobile-detect/mobile-detect.js') !!}
    {!! Html::script('assets/js/mobile-detect/isMobile.js') !!}
    {!! Html::script('assets/js/error_message_ajax/error_message.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.js"></script>
    <script type="text/javascript">
      @if(Auth::user()->tipo == "c")

          $("#general").prop('disabled', false);
      @else
          
            $("#general").prop('disabled', true);
          
            $("#general").prop('disabled', false);
       
      @endif
    
      var isShowDialogProgamacionEjecucion = true;
      var isContentStudio = false;
      let dataDownloadFile={base64:'',titleFile:'',tab:'',typeFile:''};
      

      const saveInfoLocalStoreOfSummary = (plantilla) => {
        let trayectoriaLaboral = (plantilla == "Estudio JLL") ? ":RefLaboralEmpresa (:FechaIngresoJefeInmediato a :FechaSalidaJefeInmediato) se corrobora la información con :NombreJefeInmediato quien es :PuestoJefeInmediato, indica que el candidato ocupó el puesto de :PuestoCandidato. " 
                                : "El candidato :EmpleoActual :EmpleoAnterior :RRefPerResumenValor Por lo anterior, se considera a :NombreCandidatoValor :ApellidoPaternoCandidatoValor :ApellidoMaternoCandidatoValor un candidato :EstatusDictamenValor para ocupar la vacante. ";
        var tipovivienda = (':SitEcoLaViviendaEsValor' == 'Otro') ? ":SitEcoLaViviendaEsValor" : ":SitEcoObservacionesValor"; 
        var tiempovivir;var empleoactual;var calgeneral;var limpiezaValor;var ordenValor; var DatosEscolaridad; var IdiomasValor;
        const summarys = {"economica": 'El :Dia de :Mes del año en curso :textCandidato :NombreCandidatoValor :ApellidoPaternoCandidatoValor :ApellidoMaternoCandidatoValor, quien tiene :EdadCandidato años de edad. Su estado civil es :EdoCivilValor :CantHijosValor, actualmente vive :ViveConNValor en una :ViviendaTipoTipoCasaValor, '+tipovivienda+', desde hace :TiempoVivirDomicilioValor que se ubica en una zona :ViviendaTipoNivelSocioeconomicValor. Cuenta con todos los servicios públicos:textLOrden Los gastos del hogar son solventados por :PersonajesIngresosValor siendo :TotalIngresoValor para cubrir sus egresos.',
                    "escolar": ':DatosEscolaridad :IdiomasValor',
                    "trayectoriaLaboral": trayectoriaLaboral};
        localStorage.setItem("summarys",JSON.stringify(summarys));
      }
      function disables_by_option()
      {
        
      }
      function cerrar(tipo){
          if (tipo=='c'){
              $('.input-group :input').prop('disabled',true);
              $('select').prop('disabled',true);
              $('input').prop('disabled',true);
              $('textarea').prop('disabled',true);
              $('#panel-body :input').prop('disabled', true);
          }
      }

      $('.continue').click(function(){
        $('.tabsFirt > .active').next('li').find('a').trigger('click');
        $("body, html").animate({
          scrollTop: $(".tabsFirt").offset().top
        },2000);
      });
      $('.back').click(function(){
        $('.tabsFirt > .active').prev('li').find('a').trigger('click');
        $("body, html").animate({
          scrollTop: $(".tabsFirt").offset().top
        },2000);
      });

      function ShowTabs(stepN) {
        var t =stepN.split('"').join("");
        $("a[href='#"+t+"']").trigger('click');
        $('html, body').animate({scrollTop:$('#'+t+'').position().top}, 'slow');
      }

      var bclick = function(value){
        var v=JSON.stringify(value);
        ShowTabs(v);
      }

      $("#tabs-estat").tabs();
      if(document.getElementById("menu-ese")){
        document.getElementById("menu-ese").style.display="block";
      }

      const key = "AIzaSyBr4c9PGyx6cY1EyfiMHup1XlcbZyGhAA0";
      var type_empleado;

      

      function search_investigador_municipio(){
          $("#map").html('');
          let estado = $('select[name="estado"] option:selected').text();
          let ciudad = $('select[name="ciudad"] option:selected').text();
          let colonia = $('select[name="colonia"] option:selected').text();
          let municipio = $('select[name="municipios"] option:selected').text();
          let idser = $("#IdServicioEse").val();
          var token = $('meta[name="csrf-token"]').attr('content');
          var cpCandidate = $("#cpCandidate").val();
          var c = $('#IdCliente').val();

          $.ajax({
              headers: {'X-CSRF-TOKEN':token},
              url: "{{ url('DataInvestigador') }}",
              type: "POST",
              data: {type:'iventigadorMunicipio',
                  estado:estado,
                  ciudad:ciudad,
                  colonia:colonia,
                  municipio:municipio,
                  idser:idser,
                  cpCandidate: cpCandidate,
                  c:c
              },

              beforeSend:function(){
                  $("#table-body").html('<h3>Cargando Datos...</h3>');
              },

              success: function( response )
              {
                  $("#table-body").html(response[0]);
                  var latd = response[1].split("|");
                  var lngd = response[2].split("|");
                  var titulo = response[3].split("|");
                  var coord = {lat:23.3133105 ,lng: -111.6578348};
                  for (var i = 0; i < latd.length-1; i++) {
                      var ls = parseFloat(lngd[i]);
                      coord = {lat:parseFloat(latd[i]) ,lng: ls};

                      if(i==0){
                          map = new OpenLayers.Map("map");
                          map.addLayer(new OpenLayers.Layer.OSM());
                      }

                      var lonLat = new OpenLayers.LonLat( ls ,parseFloat(latd[i]) )
                          .transform(
                              new OpenLayers.Projection("EPSG:4326"),
                              map.getProjectionObject()
                          );
                      var zoom=16;
                      var markers = new OpenLayers.Layer.Markers( "Markers" );
                      map.addLayer(markers);
                      markers.addMarker(new OpenLayers.Marker(lonLat));
                      map.setCenter (lonLat, zoom);
                  }
              },error: function(error){
                    console.log(error);
              }
          });
          
      }

      function search_investigador(){
          $("#map").html('');
          let estado = $('select[name="estado"] option:selected').text();
          let ciudad = $('select[name="ciudad"] option:selected').text();
          let colonia = $('select[name="colonia"] option:selected').text();
          let municipio = $('select[name="municipios"] option:selected').text();
          let idser = $("#IdServicioEse").val();
          var token = $('meta[name="csrf-token"]').attr('content');
          var c = $('#IdCliente').val();
          $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url: "{{ url('DataInvestigador') }}",
          type: "POST",
          data: {type:'iventigador',
                estado:estado,
                ciudad:ciudad,
                colonia:colonia,
                municipio:municipio,
                idser:idser,
                c:c
          },

          beforeSend:function(){
            $("#table-body").html('<h3>Cargando Datos...</h3>');
          },
          success: function( response )
          {
            $("#table-body").html(response[0]);
            var latd = response[1].split("|");
            var lngd = response[2].split("|");
            var titulo = response[3].split("|");
            var coord = {lat:23.3133105 ,lng: -111.6578348};
            for (var i = 0; i < latd.length-1; i++) {
              var ls = parseFloat(lngd[i]);
              coord = {lat:parseFloat(latd[i]) ,lng: ls};
              if(i==0){
                map = new OpenLayers.Map("map");
                map.addLayer(new OpenLayers.Layer.OSM());
              }

              var lonLat = new OpenLayers.LonLat( ls ,parseFloat(latd[i]) )
                    .transform(
                      new OpenLayers.Projection("EPSG:4326"),
                      map.getProjectionObject()
                    );
              var zoom=16;
              var markers = new OpenLayers.Layer.Markers( "Markers" );
              map.addLayer(markers);
              markers.addMarker(new OpenLayers.Marker(lonLat));
              map.setCenter (lonLat, zoom);
            }
          }
        });
      }

      function showmodal(type){
        $('#modal-title').html(type);
        $('#exampleModalLong').modal('show');
        var c = $('#IdCliente').val();
        type_empleado = type;

        if(type == 'Investigador'){
          var div = document.getElementById("table-all");
          div.style.display = "none";
          var divd = document.getElementById("content-table");
          divd.style.display = "block";
          search_investigador();

        }else{
          type=type.split(' ');
          var div = document.getElementById("table-all");
          div.style.display = "block";
          var divd = document.getElementById("content-table");
          divd.style.display = "none";
          var token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url: "{{ url('DataInvestigador') }}",
          type: "POST",
          data: {type:type[0],c:c},

      beforeSend:function(){
       $("#table-body-all").html('<h3>Cargando Datos...</h3>');
       },
          success: function( response )
          {
            $("#table-body-all").html(response);
          }
        });
        }
      }

      function select(id){
        if(type_empleado == 'Investigador' ){
            $("#I"+id).attr('selected', true);
        }else if(type_empleado == 'Ejecutivos'){
          $("#E"+id).attr('selected', true);
        }else if(type_empleado == 'Analista'){
          $("#A"+id).attr('selected', true);
        }else if(type_empleado == 'Lideres'){
          $("#L"+id).attr('selected', true);
        }else if(type_empleado == 'Analista Secudanrio'){
          $("#AS"+id).attr('selected', true);
        }
      }

      function PreviewImage(id) {
        var path= "../../uploads/";
        var img = $("#"+id).val();
        if(img != ''){
          $('#viewer').attr('src',path+img);
          $('#foto').modal('show');
        }else{
          document.getElementById("message-photo").innerHTML='Agrege foto al investigador...';
          $('#foto').modal('show');
        }
      }

      $(document).ready(function(){
        var rutaPDF;
        var rutaJPEG;
        var keysEntr;
        var valuesEntr;
        var k=0;
        disableBtnPreview();
        desableInvestigator();
        $("a[href='#Estudio']").on('click', function(e) {
          document.getElementById('AyudaESEId').classList.remove("ocultaAyuda"); //se agrego linea para el widget de Ayuda de ESE  
            if(!isContentStudio){
              var Pln = $("#IdServicioEse").val();
              $.ajax({
                  url: "{{ url('DatosPlantilla') }}" +"/"+ Pln,
                  type: "GET",
                  dataType: "json",
                  beforeSend: function(){
                    $("#loading-Studio").show();
                    $("#content-message-loading").hide();
                    $("#content-try-again").hide();
                  },

                  success: function( response )
                  {
                    isContentStudio = true;
                      var str = [];
                      if(response[10]!=''){
                        var valCO = [];
                        valCO =  $.unique(response[10].join(",").split(","));
                        var COval = Object.values(valCO);
                        var cantCOVal=COval.length;
                      }

                      if(response[8]!=''){
                        var valAccHref = [];
                        valAccHref =  $.unique(response[8].join(",").split(","));
                        var accValHref = Object.values(valAccHref);
                        var cantAccHref=valAccHref.length;
                        var TotNAcc = COval.concat(accValHref);
                        TotNAcc.sort();
                        var valAccInd = [];
                        valAccInd =  $.unique(TotNAcc.join(",").replace(/ó/g,"o").split(","));
                        var accValInd =  Object.values(valAccInd);
                        var cantAccInd=accValInd.length;
                        valnew=getNumbers(accValInd);
                        var valHref = [];
                        valHref =  $.unique(response[3].join(",").split(","));
                        var arrVal = Object.values(valHref);
                        arrVal.sort();
                        var canttp=arrVal.length;
                      }

                      $("#grpos").empty();
                      $.each(response[0],function(index,value){
                          $("#grpos").append("<li>"+value+"</li>");
                              $("#grps").empty();
                              $.each(response[1],function(index,value){
                                  $("#grps").append(value);
                              });
                      });

                      var cantL=response[3].length;
                      var cantE=response[5].length;
                      var nameLinkTab = [];
                      for (let index = 0; index < response[3].length; index++) {
                        nameLinkTab.push(response[3][index][0]);
                      }
                      const dataArr = new Set(nameLinkTab);
                      let newArrNameLinkTab = [...dataArr];
                          $.each(newArrNameLinkTab,function(index,value){
                              var aHREF=value;
                              $("a[href='#"+value+"']").on('click', function(e) {
                                  for (var i = 0; i < cantL; i++) {
                                      if( aHREF == response[3][i][0]){                                                                  
                                          $("#"+aHREF+"").append("<div class='col-sm-12'>"+response[2][i]+"</div><br><br>");                                                                    
                                              for (var j=0; j < cantE; j++) {
                                                  var name_value="";
                                                  var AgrpGrup=response[6][i];
                                                  var AgrpE=response[5][j];  

                                                  if(""+AgrpGrup+"" == ""+AgrpE+"" ){
                                                      str.push(JSON.stringify(response[4][j]));
                                                      $("#"+aHREF+"").append("<div class='col-sm-10'>"+response[4][j]+"</div>");                                                                            
                                                      $("input:checkbox").each(function(){
                                                        name_value=name_value + this.name+", ";
                                                      });
                                                            value=name_value;
                                                  }
                                              }
                                              var ciContact = value.split(",");
                                              cantv=ciContact.length;
                                                for (var j = 0; j < cantv; j++) {
                                                  if(ciContact[j]){
                                                    if(ciContact[j].charAt(1) === " "){
                                                      malerta(ciContact[j]);
                                                    }
                                                  }
                                                }
                                      }
                                  }

                                  if(response[8]!=''){
                                    var groups = {};
                                    for (var tpiA = 0; tpiA < cantAccInd; tpiA++) {
                                        accordeon=accValInd[tpiA].replace(/ó/g,"o");
                                        var TitAccr = accordeon.replace(/[_^0-9]/g,"").replace(/ó/g,"o");
                                        var IndAcc = accordeon.replace(/[^0-9]/g,"").replace(/ó/g,"o");
                                        var IndTitAcc=parseInt(IndAcc)+1;
                                          $('.'+accordeon+'').each(function () {
                                            var className = this.className.match(accordeon),
                                                $group = groups[className];

                                            if (!$group) { 
                                              if($('#collapseExample'+accordeon+'').length== 0){                                                                           
                                                $group = $('<button class="btn btn-link" data-toggle="collapse" href="#collapseExample'+accordeon+'"  role="button" aria-expanded="true" aria-controls="collapseExample">'+TitAccr+' ('+IndTitAcc+')</button>').insertBefore(this);
                                                groups[className] = $group;
                                               
                                                  $group = $('<div class="collapse show" id="collapseExample'+accordeon+'">').insertAfter(this);
                                               
                                                  $group = $('<div class="collapse" id="collapseExample'+accordeon+'">').insertAfter(this);
                                              
                                                groups[className] = $group;
                                              }
                                            }
    
                                            if($group==undefined){
                                                ;
                                            }else{
                                                $group.append(this);
                                            }  
                                        });
                                    }
                                  }
                                  if(aHREF=="TRAYECTORIALABORAL"){
                                    disableAskCualSinPer();
                                  }
                                  aHREF="";
                                  disableOrEnableInput("EstadoRepublica",true);
                                  disableOrEnableInput("MunicipioEstado",true);   
                              });
                          });
                          btnNextAndBack();
                  },
                  complete: function (data) {
                      cerrar('{{Auth::user()->tipo}}');
                      $("#loading-Studio").hide();
                  },
                  error : function(xhr, status)
                  {
                    $("#loading-Studio").hide();
                    $("#content-message-loading").show();
                    $("#content-try-again").show();
                    isContentStudio = false;
                    show_error_message(xhr.status);
                    console.error('Upss, algo salio mal!!');
                  }
              });
            }
        });
        $('.time').timepicker(
              {  showMeridian: false,
                  showSeconds:false
              }
        );
        var ProgramacionEjecucionFecha = "{{$ProgramacionEjecucionFecha}}";
        $('#datepicker-disabled-past').datepicker({
              format: "yyyy-mm-dd",
              language: "es",
              autoclose: true,
              todayBtn: true
        }).datepicker("setDate",(ProgramacionEjecucionFecha == "")?new Date():ProgramacionEjecucionFecha );
            /* initialize the calendar-----------------------------------------------------------------*/
        var factual=null;
        var fecha_inicio=null;
        var ocurrencia_evento=null;
        $('#calendar').fullCalendar({
              header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,agendaWeek,agendaDay'
              },
              allDaySlot:false,
              lang:'es',
              editable: true,
              navLinks: true, // can click day/week names to navigate views
              selectable: true,
              selectHelper: true,
              //---------------------------obtiene el dia al que le estas dando clic al calendario  ----------------------------//
              dayClick: function(date, jsEvent, view) {
                  fecha_inicio=date.format();
                  $("#dia").html("<samall>"+date.format()+"</small>");
                  $("#ocurrencia_evento").val(view.name);
                  var fecha_actual=new Date();
                  var año= fecha_actual.getFullYear();
                  var mes= fecha_actual.getMonth()+1;
                  var dia= fecha_actual.getDate();
                  factual=año+"-"+mes+"-"+dia;

                  if(view.name=='month'){
                      ocurrencia_evento=view.name;
                      $("#hora_inicio").removeAttr("readonly","readonly");
                      fecha_inicio=date.format();
                      $("#fecha_inicio").val(date.format());
                      $("#ocurrencia_evento").val(view.name);
                  }

                  if(view.name=='agendaWeek'){
                      ocurrencia_evento=view.name;
                      $("#hora_inicio").attr("readonly","readonly");
                      fecha_inicio=date.format();
                      var fe_ini=fecha_inicio.split("T");
                      $("#fecha_inicio").val(fe_ini[0]);
                      $("#hora_inicio").val(fe_ini[1]);
                  }

                  if(view.name=='agendaDay'){
                      ocurrencia_evento=view.name;
                      $("#hora_inicio").attr("readonly","readonly");
                      fecha_inicio=date.format();
                      var fe_ini=fecha_inicio.split("T");
                      $("#fecha_inicio").val(fe_ini[0]);
                      $("#hora_inicio").val(fe_ini[1]);
                  }
              },
              //---------------------------end obtiene el dia al que le estas dando clic al calendario  ----------------------------//
              //---------------------------genera el evento a mostrar en el calendario  -------------------------------------------//
              select: function(start, end) {
              if(ocurrencia_evento=='month')
                  $('#modal-message').modal({
                      keyboard: false,
                      backdrop:'static',
                      show:true
                  });
                  var title = '';
                  var eventData;
                  if (title) {
                      eventData = {
                          title: title,
                          start: start,
                          end: end
                      };
                      $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                  }
                  $('#calendar').fullCalendar('unselect');
              },
              //---------------------------end genera el evento dado de alta y lo muestra en el calendario  ------------------------------//
              //---------------------------Visualiza los eventos obtenidos de la bd's cpn un jason ------------------------------//
              eventLimit: true, // allow "more" link when too many events
              events: getListaEventos(),
              //---------------------------end Visualiza los eventos obtenidos de la bd's cpn un jason ------------------------------//
              droppable: true, // this allows things to be dropped onto the calendar
              drop: function() {
                  // is the "remove after drop" checkbox checked?
                  if ($('#drop-remove').is(':checked')) {
                      // if so, remove the element from the "Draggable Events" list
                      $(this).remove();
                  }
              }
        });
        $("#guardar-evento").click(function(e){
          e.preventDefault();
          var bandera=1;
          if($("#evento").val()==''){
              bandera=0;
              $('.error').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de ingresar un <strong>Evento</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error').fadeIn("slow");
              $('.error').fadeOut(9000);
              $('#evento').attr('style','border-color: #ff5b57');
          }

          if($("#hora_inicio").val()==''){
              bandera=0;
              $('.error1').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de indicar la <strong>Hora inicio</strong> del evento.<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error1').fadeIn("slow");
              $('.error1').fadeOut(9000);
              $('#hora_inicio').attr('style','border-color: #ff5b57');
          }

          if($("#hora_fin").val()==''){
              bandera=0;
              $('.error2').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de indicar la <strong>Hora fin </strong> del evento.<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error2').fadeIn("slow");
              $('.error2').fadeOut(9000);
              $('#hora_fin').attr('style','border-color: #ff5b57');
          }

          if($("#fecha_fin").val()==''){
              bandera=0;
              $('.error3').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de indicar la <strong>Fecha fin </strong> del evento.<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error3').fadeIn("slow");
              $('.error3').fadeOut(9000);
              $('#fecha_fin').attr('style','border-color: #ff5b57');
          }

              ms = Date.parse(factual);
              fechaact = new Date(ms);
              fecha_ini1=fecha_inicio.replace("-","/");
              ms1=Date.parse(fecha_ini1);
              fecha_ini=new Date(ms1);
              var fechafin=$("#fecha_fin").val().replace("-","/");
              var parfecha_fin=Date.parse(fechafin);
              var fecha_final=new Date(parfecha_fin);

          if(fecha_final<fecha_ini){
              bandera=0;
              $('.error4').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  <strong>No puede agendar un evento donde la fecha fin sea anterior a la fecha inicial.</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error4').fadeIn("slow");
              $('.error4').fadeOut(9000);
          }

          if(fecha_ini<fechaact){
              bandera=0;
              $('.error4').empty();
              $('.error4').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  <strong>No puede agendar un evento con  fecha anterior a la actual.</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error4').fadeIn("slow");
              $('.error4').fadeOut(9000);
          }

          if($("#hora_fin").val()<$("#hora_inicio").val()){
              bandera=0;
              $('.error5').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  <strong>No puede ingresar una Hora fin menor a la Hora de inicio</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
              $('.error5').fadeIn("slow");
              $('.error5').fadeOut(9000);
          }

          if(bandera){
                  guardarCliente();
                  setTimeout(function(){
                      location.reload('{{ url('agenda') }}');
                  },1000);
          }

          $("input[style*='border-color: #ff5b57']").keypress(function(){
          var name=this.name;
          $("#"+name).removeAttr('style','border-color: #ff5b57');
          });

          $("#fecha_fin").click(function(){
                  $("#fecha_fin").removeAttr('style','border-color: #ff5b57');
          });
        });

        $("#close").click(function(){
            limpiarInput();
        });

        $("#eventos-cancel").click(function(){
        $('#modal-event').modal({
              keyboard: false,
              backdrop:'static',
              show:true
          });
        });
      });//end document ready

      var guardarCliente = function(){
          var datos = $("#form-alta-agenda").serialize();
          var token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
              headers: {'X-CSRF-TOKEN':token},
              url:'{{ url('agenda') }}',
              type:'POST',
              dataType: 'json',
              data: datos,
              success: function(response){
                  swal(''+response.status_alta);
                      if(response.status_alta == 'success'){
                          swal({
                                  title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                  html: true,
                                  data: datos,
                                  type: "success"
                              });
                          limpiarInput()
                          $('#modal-message').modal('hide');
                      }else if(response.status_alta == 'wrong'){
                          swal({
                                  title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",
                                  html: true,
                                  type: "warning",
                                  confirmButtonText: "OK"
                              });
                      }
                  },
              error : function(jqXHR, status, error) {
                  swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
              }
          });
      }

      var limpiarInput=function(){
          $("#evento").val('');
          $("#fecha_inicio").val('');
          $("#fecha_fin").val('');
          $("#ocurrencia_evento").val('');
      }
      var getListaEventos=function(){
      }
      var cancelarEvento=function(id){
        var token= $('meta[name="csrf-token"]').attr('content');
        $.ajax({
              headers: {'X-CSRF-TOKEN':token},
              url:'{{ url('agenda') }}'+"/"+id,
              type:'PUT',
              dataType: 'json',
              success: function(response){
                      if(response.status_alta == 'success'){
                          swal({
                                  title: "<h3>¡ El evento se cancelo con éxito !</h3> ",
                                  html: true,
                                  type: "success",
                                  confirmButtonText: "OK"
                              });

                      }else if(response.status_alta == 'wrong'){
                          swal({
                                  title: "<h3>¡ Favor de seleccionar un evento para cancelar !</h3> ",
                                  html: true,
                                  type: "warning",
                                  confirmButtonText: "OK"
                              });
                      }
                      setTimeout(function(){     location.reload();   }, 1000);
                  },
              error : function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo3'+error);
              }
          });
      }

      console.LogOutput = function(method, dom, html, title, content) {
        console.group(method);
        console.groupEnd();
      }

      function EtiquetaD(){ 
        idInp=$('label[name="Descripción"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Ha tenido alguna demanda laboral, civil, mercantil o penal?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='No'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp=='No aplica'){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
      }

      function EtiquetaDP(){
        idInp=$('label[name="Laboral Familiar Puesto"]').attr("idInp");
        idInpQ=$('label[name="Laboral Familiar ¿Quién?"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        valInpQ=$('input[name="'+idInpQ+'"]').attr("value");
        idHD=$('label[name="¿Tiene familiares o conocidos dentro de la empresa?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='No'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
          $('input[name="'+idInpQ+'"]').prop('disabled', true);
          $('input[name="'+idInpQ+'"]').attr('value', 'No aplica');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          valorEQ=$('input[name="'+idInpQ+'"]').attr('value');
          GuardadoInput(idInp,valorE);
          GuardadoInput(idInpQ,valorEQ);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          $('input[name="'+idInpQ+'"]').prop('disabled', false);

          if(valInp=='No aplica'){
            $('input[name="'+idInp+'"]').attr('value', '');
          }

          if(valInpQ=='No aplica'){
            $('input[name="'+idInpQ+'"]').attr('value', '');
          }

          valorNE=$('input[name="'+idInp+'"]').attr('value');
          valorNEQ=$('input[name="'+idInpQ+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
          GuardadoInput(idInpQ,valorNEQ);
        }
      }

      function EtiquetaDV(){
        idInp=$('label[name="Laboral Disponibilidad Viajar Motivo"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Tiene disponibilidad para viajar?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='Si'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', '-');
          valorEE=$('input[name="'+idInp+'"]').attr("value");
          GuardadoInput(idInp,valorEE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp==''){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
      }

      function EtiquetaDR(){
        idInp=$('label[name="Laboral Disponibilidad Residencia Motivo"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Tiene disponibilidad para cambiar de residencia?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='Si'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', '-');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp==''){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
      }

      function EtiquetaEA(v){
        nameLI=$('label[for="'+v+'"]').attr("name");
        vInd=getNumbers(nameLI);
        idInp=$('label[name="Empresa Empleo actual_'+vInd+'"]').attr("idInp");
        valInp=$('select[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="Empresa Fecha de Egreso_'+vInd+'"]').attr("idInp");

        if(valInp=='Si'){
          $('input[name="'+idHD+'"]').attr('value', '');
          GuardadoInput(idHD,'-');
          $('input[name="'+idHD+'"]').prop('disabled', true);
          $('input[name="'+idHD+'"]').removeClass("required");
          $('input[name="'+idHD+'"]').removeAttr("required");
          valorE=$('select[name="'+idInp+'"]').attr('value');

        }else{
          $('input[name="'+idHD+'"]').prop('disabled', false);
          if(valInp==''){
            $('input[name="'+idHD+'"]').attr('value', $('input[name="'+idHD+'"]').val());
            $('input[name="'+idHD+'"]').addClass("required");
            $('input[name="'+idHD+'"]').attr('required', 'required');
          }
          $('input[name="'+idHD+'"]').addClass("required");
          $('input[name="'+idHD+'"]').attr('required', 'required');
          valorNE=$('select[name="'+idInp+'"]').attr('value');
        }
      }

      function EtiquetaFI(v){
        nameLI=$('label[for="'+v+'"]').attr("name");
        vInd=getNumbers(nameLI);
        idLI=$('label[name="Empresa Fecha de Egreso_'+vInd+'"]').attr("idInp");
        valInpFI=$('input[name="'+v+'"]').attr("value");
        // DISABLED FECHAS EGRESO//
        var input = $('input[name="'+idLI+'"]');
        var today = new Date();
        var day = today.getDate();
        var mon = new String(today.getMonth()+1); 
        var yr = today.getFullYear();
        day = day + "";
        if(day.length == 1){
          day = "0" + day;    
        }
        if (mon.length < 2) {
          mon = "0" + mon;
        }

        var date = new String(yr + '-' + mon + '-' + day);
        input.disabled = false;
        input.attr('min', valInpFI);
        input.attr('max', date);
        // FIN DISABLED FECHAS//
      }

      function EtiquetaValidacionMatrimonio(v){
		    nameLI=$('label[for="'+v+'"]').attr("name");
        vInd=getNumbers(nameLI);
        idInp=$('label[name="Acta de matrimonio Validación_'+vInd+'"]').attr("idInp");
        valInp=$('select[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="Acta de matrimonio Foja"]').attr("idInp");
        idHDos=$('label[name="Acta de matrimonio Acta"]').attr("idInp");
        idHTres=$('label[name="Acta de matrimonio Año"]').attr("idInp");
        idHCuatro=$('label[name="Acta de matrimonio Libro"]').attr("idInp");
        idHCinco=$('label[name="Acta de matrimonio Archivo"]').attr("idInp");

        if(valInp==' No aplica'){
		      $('input[name="'+idHCuatro+'"]').prop('disabled', true);
          $('input[name="'+idHCuatro+'"]').attr('value', 'NA');
          $('input[name="'+idHCuatro+'"]').removeClass("required");
          $('input[name="'+idHCuatro+'"]').removeAttr("required");
		      $('input[name="'+idHTres+'"]').prop('disabled', true);
          $('input[name="'+idHTres+'"]').attr('value', '0000');
          $('input[name="'+idHTres+'"]').removeClass("required");
          $('input[name="'+idHTres+'"]').removeAttr("required");
          $('input[name="'+idHD+'"]').prop('disabled', true);
          $('input[name="'+idHD+'"]').attr('value', 'NA');
          $('input[name="'+idHD+'"]').removeClass("required");
          $('input[name="'+idHD+'"]').removeAttr("required");
		      $('input[name="'+idHDos+'"]').prop('disabled', true);
          $('input[name="'+idHDos+'"]').attr('value', 'NA');
          $('input[name="'+idHDos+'"]').removeClass("required");
          $('input[name="'+idHDos+'"]').removeAttr("required");
		      //Verificar funcionamiento
		      $('input[name="'+idHCinco+'"]').prop('disabled', true);
          $('input[name="'+idHCinco+'"]').attr('value', '');
          $('input[name="'+idHCinco+'"]').removeClass("required");
          $('input[name="'+idHCinco+'"]').removeAttr("required");
		      //Fin de lo que se va a verificar
        }else if(valInp=='Presenta Original'){
		      $('input[name="'+idHCuatro+'"]').prop('disabled', false);
		      $('input[name="'+idHCuatro+'"]').addClass("required");
          $('input[name="'+idHCuatro+'"]').attr('required', 'required');
		      $('input[name="'+idHTres+'"]').prop('disabled', false);
		      $('input[name="'+idHTres+'"]').addClass("required");
          $('input[name="'+idHTres+'"]').attr('required', 'required');
          $('input[name="'+idHD+'"]').prop('disabled', false);
		      $('input[name="'+idHD+'"]').addClass("required");
          $('input[name="'+idHD+'"]').attr('required', 'required');
		      $('input[name="'+idHDos+'"]').prop('disabled', false);
		      $('input[name="'+idHDos+'"]').addClass("required");
          $('input[name="'+idHDos+'"]').attr('required', 'required');

        }else if(valInp==' No Presenta'){
          $('input[name="'+idHCuatro+'"]').prop('disabled', true);
          $('input[name="'+idHCuatro+'"]').attr('value', 'NP');
          $('input[name="'+idHCuatro+'"]').removeClass("required");
          $('input[name="'+idHCuatro+'"]').removeAttr("required");
          $('input[name="'+idHTres+'"]').prop('disabled', true);
          $('input[name="'+idHTres+'"]').attr('value', '0000');
          $('input[name="'+idHTres+'"]').removeClass("required");
          $('input[name="'+idHTres+'"]').removeAttr("required");
          $('input[name="'+idHD+'"]').prop('disabled', true);
          $('input[name="'+idHD+'"]').attr('value', 'NP');
          $('input[name="'+idHD+'"]').removeClass("required");
          $('input[name="'+idHD+'"]').removeAttr("required");
          $('input[name="'+idHDos+'"]').prop('disabled', true);
          $('input[name="'+idHDos+'"]').attr('value', 'NP');
          $('input[name="'+idHDos+'"]').removeClass("required");
          $('input[name="'+idHDos+'"]').removeAttr("required");

        }else{
              console.log("NO ENTRO A LA VALIDACION CON "+valInp);
        }

          valorE=$('select[name="'+idInp+'"]').attr('value');
          valorFoja=$('input[name="'+idHD+'"]').attr('value');
          valorActa=$('input[name="'+idHDos+'"]').attr('value');
          valorAnio=$('input[name="'+idHTres+'"]').attr('value');
          valorLibro=$('input[name="'+idHCuatro+'"]').attr('value');
          valorLibro=$('input[name="'+idHCinco+'"]').attr('value');
          GuardadoInput(idHD,valorFoja);
          GuardadoInput(idHDos,valorActa);
          GuardadoInput(idHTres,valorAnio);
          GuardadoInput(idHCuatro,valorLibro);
	    }

	  function EtiquetaValidacionConyuge(v){
		    nameLI=$('label[for="'+v+'"]').attr("name");
        vInd=getNumbers(nameLI);
        idInp=$('label[name="Acta de nacimiento cónyuge Validación_'+vInd+'"]').attr("idInp");
        valInp=$('select[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="Acta de nacimiento cónyuge Foja"]').attr("idInp");
        idHDos=$('label[name="Acta de nacimiento cónyuge Acta"]').attr("idInp");
		    idHTres=$('label[name="Acta de nacimiento cónyuge Año"]').attr("idInp");
		    idHCuatro=$('label[name="Acta de nacimiento cónyuge Libro"]').attr("idInp");

        if(valInp=='No aplica'){
		      $('input[name="'+idHCuatro+'"]').prop('disabled', true);
          $('input[name="'+idHCuatro+'"]').attr('value', 'NA');
          $('input[name="'+idHCuatro+'"]').removeClass("required");
          $('input[name="'+idHCuatro+'"]').removeAttr("required");
          $('input[name="'+idHTres+'"]').prop('disabled', true);
          $('input[name="'+idHTres+'"]').attr('value', '0000');
          $('input[name="'+idHTres+'"]').removeClass("required");
          $('input[name="'+idHTres+'"]').removeAttr("required");
          $('input[name="'+idHD+'"]').prop('disabled', true);
          $('input[name="'+idHD+'"]').attr('value', 'NA');
          $('input[name="'+idHD+'"]').removeClass("required");
          $('input[name="'+idHD+'"]').removeAttr("required");
		      $('input[name="'+idHDos+'"]').prop('disabled', true);
          $('input[name="'+idHDos+'"]').attr('value', 'NA');
          $('input[name="'+idHDos+'"]').removeClass("required");
          $('input[name="'+idHDos+'"]').removeAttr("required");

        }else if(valInp==' Presenta Original'){
          $('input[name="'+idHCuatro+'"]').prop('disabled', false);
          $('input[name="'+idHCuatro+'"]').removeClass("required");
          $('input[name="'+idHCuatro+'"]').removeAttr("required");
          $('input[name="'+idHTres+'"]').prop('disabled', false);
          $('input[name="'+idHTres+'"]').removeClass("required");
          $('input[name="'+idHTres+'"]').removeAttr("required");
          $('input[name="'+idHD+'"]').prop('disabled', false);
          $('input[name="'+idHD+'"]').removeClass("required");
          $('input[name="'+idHD+'"]').removeAttr("required");
          $('input[name="'+idHDos+'"]').prop('disabled', false);
          $('input[name="'+idHDos+'"]').removeClass("required");
          $('input[name="'+idHDos+'"]').removeAttr("required");

        }else{
              console.log("NO ENTRO A LA VALIDACION CON "+valInp);
        }		  
          valorFoja=$('input[name="'+idHD+'"]').attr('value');
		      valorActa=$('input[name="'+idHDos+'"]').attr('value');
		      valorAnio=$('input[name="'+idHTres+'"]').attr('value');
		      valorLibro=$('input[name="'+idHCuatro+'"]').attr('value');
          GuardadoInput(idHD,valorFoja);
		      GuardadoInput(idHDos,valorActa);
		      GuardadoInput(idHTres,valorAnio);
		      GuardadoInput(idHCuatro,valorLibro);
	  }

    function EtiquetaFIV(v){
      // DISABLED FECHAS INGRESO//
      var input = $('input[name="'+v+'"]');
      var today = new Date();
      var day = today.getDate();
      var mon = new String(today.getMonth()+1); 
      var yr = today.getFullYear();
      day = day + "";
      if(day.length == 1){
        day = "0" + day;    
      }
      if (mon.length < 2) {
        mon = "0" + mon;
      }
      var date = new String(yr + '-' + mon + '-' + day);
      input.disabled = false;
      input.attr('max', date);
      // FIN DISABLED FECHAS INGRESO//
    }

    function EtiquetaCP(value,Numindx){
      var token = $('meta[name="csrf-token"]').attr('content');
      let cp = value;
      var datos;
      var colonias;
      var items;
      $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url:'{{ url('Empleados_search_cp') }}',
          type:'GET',
          dataType: 'json',
          data: {cp:cp},
          success: function(response){
            datos = response.result.split("|");
            if(document.getElementById("MunicipioEstado")){
              var MunicipioEstado = document.querySelector(`[id="MunicipioEstado"]`).getAttribute('name');
              $('input[name="'+MunicipioEstado+'"]').attr('value', datos[5]);
              GuardadoInput(MunicipioEstado,datos[5]);
            }

            if(document.getElementById("Colonia")){
              var Colonia = document.querySelector(`[id="Colonia"]`).getAttribute('name');
              $('select[name="'+Colonia+'"] option').remove();
              colonias = datos[8].split(";");
              for (var i = 0; i < colonias.length; i++) {
                items+='<option value="'+colonias[i]+'">'+colonias[i]+'</option>'
              }
              $('select[name="'+Colonia+'"]').prepend(items);
              GuardadoInput(Colonia,colonias[0]);
            }

            if(document.getElementById("EstadoRepublica")){
              var EstadoRepublica = document.querySelector(`[id="EstadoRepublica"]`).getAttribute('name');
              $(`input[name="${EstadoRepublica}"]`).attr('value',datos[3]);
              GuardadoInput(EstadoRepublica,datos[3]); 
            }
          },
          error : function(jqXHR, status, error) {
          }
      });
    }

    function EtiquetaDM1(){ 
        idInp=$('label[name="¿Cuál Enfermedad Crónica?"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Padece o ha padecido alguna enfermedad como crónica o degenerativa?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");
        if(valHD=='No'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp=='No aplica'){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
    }
//se agrego para inabilitar el boton de a cual sindicato pertenece
    function EtiquetaDM112(id,value,salvarValores){ 
      var clasePadre= document.getElementsByName(id)[0].parentNode.classList[0]; 
      var camposCualSin= document.getElementsByName("¿A cuál sindicato perteneció?");
      for (let i=0; i<camposCualSin.length; i++) {
        if(camposCualSin[i].parentNode.classList.contains(clasePadre)) idInp=camposCualSin[i].attributes.idInp.value;
      }
        valInp=$('input[name="'+idInp+'"]').attr("value");
        if(value=='No'|| value=='No aplica'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
         
        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          $('input[name="'+idInp+'"]').attr('value', '');
         
        }
         if(salvarValores){
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
         }
    }


    function EtiquetaDM2(){ 
        idInp=$('label[name="¿Cuál Tratamiento?"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Se encuentra bajo algún tratamiento médico?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='No'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp=='No aplica'){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
    }

    function EtiquetaDM3(){ 
        idInp=$('label[name="¿A qué es alérgico?"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Es alérgico?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='No'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp=='No aplica'){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
    }

    function EtiquetaDM4(){ 
        idInp=$('label[name="¿Cuál es el medicamento controlado?"]').attr("idInp");
        valInp=$('input[name="'+idInp+'"]').attr("value");
        idHD=$('label[name="¿Toma medicamento controlado?"]').attr("idInp");
        valHD=$('select[name="'+idHD+'"]').attr("value");

        if(valHD=='No'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
          $('input[name="'+idInp+'"]').attr('value', 'No aplica');
          valorE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorE);

        }else{
          $('input[name="'+idInp+'"]').prop('disabled', false);
          if(valInp=='No aplica'){
            $('input[name="'+idInp+'"]').attr('value', '');
          }
          valorNE=$('input[name="'+idInp+'"]').attr('value');
          GuardadoInput(idInp,valorNE);
        }
    }

    function getNumbers(inputString){
        var regex=/\d+\.\d+|\.\d+|\d+/g, 
            results = [],
            n;
        while(n = regex.exec(inputString)) {
            results.push(parseFloat(n[0]));
        }
        return results;
    }

    function malerta(name_value) {
      var name=name_value;
      var re = /\[.+?]/g;
        name = name_value.replace(re,'');
        $.ajax({
        url: '{{ url('valuescampos') }}',
        type:'GET',
        data: {name:name},
        success: function(response){
            if(response[1] != null){
                  if(response[2]=='Selección Multiple'){
                  var ciContact = response[1].split(",");
                  for (var j = 0; j < ciContact.length; j++) {
                      $('input[name='+response[0]+'][value=' + ciContact[j] + ']').attr('checked','checked');
                  }
                }
          }
        }
      });
    }

    function validate(id) {
      $("#buttonLoading"+id).show();
      $(`#image${id}`).remove();
      var input = document.getElementById(id);
      var idInput = id;
      // var maxfilesize = 307200,
      if(input.files[0] != undefined){
        var maxfilesize = 3145728 ,
            filesize    = input.files[0].size,
            filename    = input.files[0].name,
            tipo        = input.files[0].type,
            warningel   = document.getElementById( 'lbError' );
        if ( filesize > maxfilesize )
        {
          document.getElementById("my_form"+id).reset();
          swal("Archivo Demasiado Grande. Tamaño Máximo: 3MB ");
            warningel.innerHTML = "";
            return false;
        }  else{
            var fileInput = filename;
            var filePath = fileInput.value;
            var file_ext = filename.substring(filename.lastIndexOf('.')+1);
            if(tipo == 'application/pdf'){
                var allowedExtensionsPDF = /(\.PDF|\.pdf)$/i;
                if(!allowedExtensionsPDF.exec("."+file_ext)){
                    warningel.innerHTML = "Seleccione un archivo. pdf";
                    fileInput.value = '';
                    return false;
                } else{
                  warningel.innerHTML = "";
                    var fd = new FormData(document.getElementById("my_form"+id));
                      var token = $('meta[name="csrf-token"]').attr('content');
                      $.ajax({
                        headers: {'X-CSRF-TOKEN':token},
                        url: "{{ url('GuardarFile') }}/"+id,
                        method: "post",
                        processData: false,
                        contentType: false,
                        data: fd,
                        beforeSend:function(){

                        },
                        success: function (data) {
                          $("#"+data[1]).removeClass("normal");
                          $("#"+data[1]).addClass(data[2]);
                          $("label[for*='"+id+"']").html("Cambiar archivo");
                          $("#filePJ"+id).removeClass("required");
                          $("#buttonFile"+id).css("display","inline-block");
                          $("#buttonLoading"+id).hide();
                          $(`input[name="${id}"]`).after(`<input type="image" src="https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png" height="20" class="image_buscar" id="image${id}">`);
                        },
                        complete: function(){
                          document.getElementById("my_form"+id).reset();
                        },
                        error: function (e) {
                          $("#buttonLoading"+id).hide();
                          show_error_message(e.status,'Ocurrió un error al guardar el archivo, por favor inténtelo de nuevo');
                        }
                      });
                }
            }

            if(tipo == 'image/jpeg'){
                var allowedExtensionsJPEG = /(\.JPG|\.jpg\.JEPG|\.jpeg)$/i;
                if(!allowedExtensionsJPEG.exec("."+file_ext)){
                    warningel.innerHTML = "Seleccione un archivo .jpg";
                    fileInput.value = '';
                    return false;
                }else{

                  if( $(`#modalRecortar`+id).hasClass('in') ) {
                    $(`#modalRecortar`+id).modal('hide');
                    $('#editor'+id).html("<div id='editor"+id+"'></div>");
                  }

                  new Compressor(input.files[0], {
                    success(result) {
                      warningel.innerHTML = "";
                      const mCanvas = document.getElementById('preview'+id);
                      var FRecord = dataURLtoBlob( mCanvas.toDataURL() );
                      var fd = new FormData();
                      fd.append(`${id}`,FRecord,result.name);
                      var token = $('meta[name="csrf-token"]').attr('content');
                      $.ajax({
                        headers: {'X-CSRF-TOKEN':token},
                        url: "{{ url('GuardarFile') }}/"+id,
                        method: "post",
                        processData: false,
                        contentType: false,
                        data: fd,
                        beforeSend:function(){
                          $(`#image${id}`).remove();
                          $("#buttonLoading"+id).show();
                        },
                        success: function (data) {
                            $("#"+data[1]).removeClass("normal");
                            $("#"+data[1]).addClass(data[2]);
                            $("label[for*='"+id+"']").html("Cambiar archivo");
                            $('#editor'+id).html("<div id='editor"+id+"'></div>");
                            $("#filePJ"+id).removeClass("required");
                            $("#buttonFile"+id).css("display","inline-block");
                            $("#buttonLoading"+id).hide();
                            $(`input[name="${id}"]`).after(`<input type="image" src="https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png" height="20" class="image_buscar" id="image${id}">`);
                        },
                        complete: function(){
                          document.getElementById("my_form"+id).reset();
                        },
                        error: function (e) {console.log
                          $("#buttonLoading"+id).hide();
                          show_error_message(e.status,'Ocurrió un error al guardar el archivo, por favor inténtelo de nuevo');
                        }
                      });
                    },
                    error(err) {
                      console.log(err.message);
                    },
                  });
                }
            }
        }
      }
      else
        return false;
    }

    function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
      var byteString;
      if (dataURI.split(',')[0].indexOf('base64') >= 0)
          byteString = atob(dataURI.split(',')[1]);
      else
          byteString = unescape(dataURI.split(',')[1]);
      // separate out the mime component
      var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
      // write the bytes of the string to a typed array
      var ia = new Uint8Array(byteString.length);
      for (var i = 0; i < byteString.length; i++) {
          ia[i] = byteString.charCodeAt(i);
      }
      return new Blob([ia], {type:mimeString});
    }

    function Recortar(idFile,idStudio,title) {
      const inputImage = document.getElementById(`${idFile}`);
      const editor = document.querySelector(`#editor${idFile}`);
      var mCanvas = document.querySelector(`#preview${idFile}`);
      const contexto = mCanvas.getContext('2d');
      let urlImage = undefined;
      var cropper='';
      inputImage.addEventListener('change', abrirEditor, false);

      function abrirEditor(e) {
          urlImage = URL.createObjectURL(e.target.files[0]);
          editor.innerHTML = '';
          let cropprImg = document.createElement('img');
          cropprImg.setAttribute('id', `croppr${idFile}`);
          editor.appendChild(cropprImg);
          mCanvas.width  = 1000;
          mCanvas.height = 1000;
          contexto.clearRect(0, 0, mCanvas.width, mCanvas.height);
          document.querySelector(`#croppr${idFile}`).setAttribute('src', urlImage);
        $(`#modalRecortar${idFile}`).on('shown.bs.modal', function () {
            cropper = new Cropper(cropprImg, {
            aspectRatio:  this.aspectRatio,
            startSize: [70, 70],
            viewMode: 1,
            minContainerWidth: 250,
            minContainerHeight: 250,
            crop: function(event) {
              recortarImagen(event);
            },
            });
        });
        $(`#modalRecortar${idFile}`).modal('show');
      }

      function recortarImagen(data) {
        const zoom = 1;
        let imagenEn64 = '';
        mCanvas = cropper.getCroppedCanvas({
          width: 1000,
          height: 1000,
        });

        mCanvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          var reader = new FileReader();
          reader.readAsDataURL(blob); 
            reader.onloadend = function() {
              var base64data = reader.result; 
            }
        });
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = mCanvas.width;
        var height = mCanvas.height;
        let NImagenTemp = new Image();
        NImagenTemp.onload = function() {
          canvas.width = width;
          canvas.height = height;
          contexto.drawImage(mCanvas, 0, 0, width * zoom, height * zoom, 0, 0, 1000, 1000);
           // contexto.drawImage(NImagenTemp, inicioX, inicioY, nAncho * zoom, nAltura * zoom, 0, 0, nAncho, nAltura);
            imagenEn64 = mCanvas.toDataURL("image/jpeg");
            inputImage.src = imagenEn64;
        }
          NImagenTemp.src = urlImage;
      }   
    }

    function dataURLtoBlob(dataURL) {
      var BASE64_MARKER = ";base64,";
      if (dataURL.indexOf(BASE64_MARKER) == -1)
      {
          var parts = dataURL.split(",");
          var contentType = parts[0].split(":")[1];
          var raw = decodeURIComponent(parts[1]);
          return new Blob([raw], {type: contentType});
      }

      var parts = dataURL.split(BASE64_MARKER);
      var contentType = parts[0].split(":")[1];
      var raw = window.atob(parts[1]);
      var rawLength = raw.length;
      var uInt8Array = new Uint8Array(rawLength);
      for (var i = 0; i < rawLength; ++i) {
          uInt8Array[i] = raw.charCodeAt(i);
      }
      return new Blob([uInt8Array], {type: 'image/jpeg'});

    };
    var GuardadoInput = function(id,value){
      var etiqueta= $('label[for="'+id+'"]').html();
      if(etiqueta=='¿Ha tenido alguna demanda laboral, civil, mercantil o penal?'){
          EtiquetaD();
      }
      if(etiqueta=='¿Tiene familiares o conocidos dentro de la empresa?'){
          EtiquetaDP();
      }
      if(etiqueta=='¿Tiene disponibilidad para viajar?'){
          EtiquetaDV();
      }
      if(etiqueta=='¿Tiene disponibilidad para cambiar de residencia?'){
          EtiquetaDR();
      }
      if(etiqueta=='Empleo actual'){
          EtiquetaEA(id);
      }
      //Inicio de validacion para ingreso
      if(etiqueta=='Fecha de Ingreso'){
        EtiquetaFI(id);
        var today = new Date();
        var day = today.getDate();
        var mon = new String(today.getMonth()+1); 
        var yr = today.getFullYear();
        day = day + "";
        if(day.length == 1){
          day = "0" + day;    
        }
        if (mon.length < 2) {
          mon = "0" + mon;
        }
        today  = new String(yr + '-' + mon + '-' + day);
        var date = value;
        if(Date.parse(date)){
          if(date > today){
            toastr.warning('La Fecha no puede ser mayor a la actual.');
            $('input[name="'+id+'"]').attr('value', 'dd/mm/aaaa')			  
            //value='';
          }
        }
      } // Fin de la validacion de ingreso

      //Inicio de la validacion de egreso
      if(etiqueta=='Fecha de Egreso'){
        var today = new Date();
        var day = today.getDate();
        var mon = new String(today.getMonth()+1); 
        var yr = today.getFullYear();
        day = day + "";
        if(day.length == 1){
          day = "0" + day;    
        }
        if (mon.length < 2) {
          mon = "0" + mon;
        }
        today  = new String(yr + '-' + mon + '-' + day);
        nameLI=$('label[for="'+id+'"]').attr("name");
        vInd=getNumbers(nameLI);
        idLI=$('label[name="Empresa Fecha de Ingreso_'+vInd+'"]').attr("idInp");
        var dateIng = $('input[name="'+idLI+'"]').val();
        var date = value;
        if(Date.parse(date)){
          if(date > today){
            toastr.warning('La Fecha no puede ser mayor a la actual.');
            $('input[name="'+id+'"]').attr('value', 'dd/mm/aaaa')
          }else if(date < dateIng){
            toastr.warning('La Fecha no puede ser menor a la de Ingreso.');
            $('input[name="'+idLI+'"]').attr('value', 'dd/mm/aaaa')
          }
        }
      }//Fin de la validacion de egreso

      //Inicio de validacion para ingreso (Matriz fecha)
      if(etiqueta=='Periodo'){
        valHD=$('select[name="'+id+'"]').attr("value");
        if(valHD=='Año Inicial'){
          EtiquetaFI(id);
            var today = new Date();
            var day = today.getDate();
            var mon = new String(today.getMonth()+1); 
            var yr = today.getFullYear();
            day = day + "";
            if(day.length == 1){
            day = "0" + day;    
            }
            if (mon.length < 2) {
            mon = "0" + mon;
            }
            today  = new String(yr + '-' + mon + '-' + day);
            var date = value;
            if(Date.parse(date)){
            if(date > today){
              toastr.warning('La Fecha no puede ser mayor a la actual.');
              value='';
            }
            }
          GuardadoInput(idInp,valorE);
        }
      } // Fin de la validacion de ingreso
      if(etiqueta=='Código Postal'){
        var etiquetaCPName= $('label[for="'+id+'"]').attr("name");
        var NumIndx=getNumbers(etiquetaCPName);
        EtiquetaCP(value,NumIndx);
      }
      if(etiqueta=='Clave'){
        var nameLCNSS=$('label[for="'+id+'"]').attr("name");
          if(nameLCNSS=='CURP o carta de naturalización Clave_0'){
            var valCNSS = $('input[name="'+id+'"]').val();
            if(valCNSS != "NA" && valCNSS != ""){
              if (valCNSS.length < 18) {
                toastr.warning('El campo Clave debe ser de 18 caracteres.');
                value='';
              }
            }
          }
      }
      if(etiqueta=='Número Afiliación IMSS'){
        var nameLCNSS=$('label[for="'+id+'"]').attr("name");
          if(nameLCNSS=='Comprobante Afiliación IMSS Número Afiliación IMSS_0'){
            var valCNSS = $('input[name="'+id+'"]').val();
            if(valCNSS != "NA" && valCNSS != ""){
              if (valCNSS.length < 11) {
                toastr.warning('El campo Clave debe ser de 11 caracteres.');
                value='';
              }
            }
          }
      }
      if(etiqueta=='¿Padece o ha padecido alguna enfermedad como crónica o degenerativa?'){
          EtiquetaDM1();
      }
      if(etiqueta=='¿Perteneció a algún Sindicato?'){
        EtiquetaDM112(id,value,true);
      }
      if(etiqueta=='¿Se encuentra bajo algún tratamiento médico?'){
          EtiquetaDM2();
      }
      if(etiqueta=='¿Es alérgico?'){
          EtiquetaDM3();
      }
      if(etiqueta=='¿Toma medicamento controlado?'){
          EtiquetaDM4();
      }
      

      if(etiqueta=='Si ya revisaste la información selecciona y guarda'){
        if ($('input:checkbox[name="'+id+'"]').is(':checked')) {
          value = "Si";
        }else{
          value = "";
        }
      }
      var tipo="";
      var re = /\[.+?]/g;
      id = id.replace(re,'');
      var array = [];
      $("input:checkbox[name="+id +"]:checked").each(function(){
          array.push($(this).val());
      });
      array = array.join(",");
      if(array!=''){
          value = array;
      }
      var mtarray = [];
      $("[name^="+id +"].matriztexto").each(function(){
          mtarray.push($(this).val());
      });
      if(mtarray.length > 0){
        var jsonmatriztexto = convertArrayToStringJson(mtarray);
        if(jsonmatriztexto!=''){
            value = jsonmatriztexto;
            tipo="matriztexto";
        }
      }
      var ntarray = [];
      $("[name^="+id +"].matriznumero").each(function(){
          ntarray.push($(this).val());
      });
      if(ntarray.length > 0){
        var jsonmatriznumero = convertArrayToStringJson(ntarray);
        if(jsonmatriznumero!=''){
            value = jsonmatriznumero;
            tipo="matriznumero";
        }
      }
      var dtarray = [];
      $("[name^="+id +"].matrizfecha").each(function(){
          dtarray.push($(this).val());
      });
      if(dtarray.length > 0){
        var jsonmatrizfecha = convertArrayToStringJson(dtarray);
        if(jsonmatrizfecha!=''){
            value = jsonmatrizfecha;
            tipo="matrizfecha";
        }
      }
      if(tipo==''){
        tipo="field";
      }
      if(value.length == 0)
      value = "";
      var ids = $("#IdServicioEse").val();
      var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url: "{{ url('GuardarEstudioInput') }}",
            type: "POST",
            cache: false,
            contentType: 'application/x-www-form-urlencoded; charset=utf-8',
            beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data:{
              id: id,
              value: value,
              ids: ids,
              type: tipo
            },
            dataType: "json",
            success: function( response )
            {
              if(response.status == "success"){
                $("#"+response[0]).removeClass(); //se elimino todas las clases 
                $("#"+response[0]).addClass(response[1]); //se agrega la validación segun los datos
                $("#checkmark"+id).css("display","inline-block");
                var $data = $("[name='"+id+"']");
                  $data.css("border", "1px solid #ccd0d4");
                  if(tipo=='matriztexto'){
                    var $data = $("[name^="+id +"].matriztexto");
                    $data.css("border", "1px solid #ccd0d4");
                  }else if(tipo=='matrizfecha'){
                    var $data = $("[name^="+id +"].matrizfecha");
                    $data.css("border", "1px solid #ccd0d4");
                  }else if(tipo=='matriznumero'){
                    var $data = $("[name^="+id +"].matriznumero");
                    $data.css("border", "1px solid #ccd0d4");
                  }
              }else{
                let titleinput =  "";
                if(tipo == 'matrizfecha' || tipo == 'matriztexto' || tipo == 'matriznumero'){
                  titleinput = $(`[name^="${id}"].${tipo}`).dataset.titleinput;
                }else{
                  titleinput =  document.getElementsByName(`${id}`)[0].dataset.titleinput;
                }
                show_error_message(`Ocurrió un error al guardar el dato del campo ${titleinput}, intentelo de nuevo.`);
              }
            },
            error : function(xhr, status)
            {
              show_error_message(xhr.status);
              //console.error('Upss, algo salio mal!! '+xhr.status);
            }
        });
      return false;
    }


    var GuardadoInput2 = function(id,value){

     
      var ids = $("#IdServicioEse").val();
      var token = $('meta[name="csrf-token"]').attr('content');
      var con = 0;
      var json = "{";
      
      for(var i=0; i<value.length;i++){

      if(!isNaN(value[i]))
        json += '"'+id[i]+'":'+value[i]  ;  
      else
        if(value[i]== "$$$"){
          json += '"'+id[i]+'": ""' ;  
        }else 
          json += '"'+id[i]+'": "'+value[i] +'"' ;  
        json += ",";
        con +=1;
      }
      json+= '"ids":'+ids+',"con":'+con +"}";

      console.log (json);
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url: "{{ url('GuardarEstudioInput2') }}",
            type: "POST",
            cache: false,
            contentType: 'application/x-www-form-urlencoded; charset=utf-8',
            beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {json:json} ,
            dataType: "json",
            success: function( response )
            {
              if(response.status == "success"){
                $("#"+response[0]).removeClass(); //se elimino todas las clases 
                $("#"+response[0]).addClass(response[1]); //se agrega la validación segun los datos
                
                for(var i=0; i<id.length;i++){
                  $("#checkmark"+id[i]).css("display","inline-block");
                  $data = $("[name='"+id[i]+"']");
                  $data.css("border", "1px solid #ccd0d4");
                }
              }else{
                
                show_error_message(500);
              }
            },
            error : function(xhr, status)
            {
              show_error_message(xhr.status);
              console.error('Upss, algo salio mal!! '+xhr.status);
            }
        });
      return false;
    }

    function Asignacion(id){
        loaderButton(id,true);
        var IdCliente   = $("#IdCliente").val();
        var IdPlantilla = $("#IdPlantilla").val();
        var IdModalidad = $("#IdModalidad").val();
        var IdPrioridad = $("#IdPrioridad").val();
        console.log("prioridad: "+IdPrioridad+" modalidad: "+IdModalidad)
        var Comentarios = $("#Comentarios").val();
        var IdLider = $("#IdLider").val();
        var IdAnalista = $("#IdAnalista").val();
        var IdAnalistaSec = $("#IdAnalistaSec").val();
        var IdInvestigador = $("#IdInvestigador").val();
        var IdServicioEse = $("#IdServicioEse").val();
        var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url:'{{ url('GuardarAsignacion') }}',
                type:'POST',
                dataType: 'json',
                data:{
                  IdCliente:IdCliente,
                  IdPlantilla:IdPlantilla,
                  IdModalidad:IdModalidad,
                  IdPrioridad:IdPrioridad,
                  Comentarios:Comentarios,
                  IdLider:IdLider,
                  IdAnalista:IdAnalista,
                  IdAnalistaSec:IdAnalistaSec,
                  IdInvestigador:IdInvestigador,
                  IdServicioEse:IdServicioEse
                },
                success: function(response){
                  loaderButton(id,false);
                  if(IdLider=="N/A" || IdAnalista=="N/A" || IdInvestigador=="N/A" ){
                      swal({
                          title: "<h3>¡ Faltan por seleccionar datos !</h3> ",
                          html: true,
                          type: "error",
                          confirmButtonText: "OK"
                      });
                  }else  if(response.status_alta == 'success'){
                      swal({
                          title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                          html: true,
                          type: "success",
                          confirmButtonText: "OK"
                      });
                      $("#Asignada").removeClass('normal');
                      $("#Asignada").addClass('verde');
                      $('#IdServicioEse').val(response.IdServicioEse);
                      console.log(response);
                  }
                  else if(response.status_alta == 'error'){
                      swal({
                          title: "<h3>¡ El registro se guardo con éxito, No se puede eviar el mensaje, No se tiene el correo !</h3> ",
                          html: true,
                          type: "warning",
                          confirmButtonText: "OK"
                      });
                      $("#Asignada").removeClass('normal');
                      $("#Asignada").addClass('verde');
                      $('#IdServicioEse').val(response.IdServicioEse);
                      console.log(response);
                 
                  }
                  else{
                    swal({
                        title: "<h3>¡ Asignar antes de programar ejecución !</h3> ",
                        html: true,
                        type: "error",
                        confirmButtonText: "OK"
                    });
                  }
                },
                error: function(xhr, status){
                  loaderButton(id,false);
                  console.error(xhr, status);
                } 
            });
    }

    function ProgramacionEjecucion(id){
        var horaPE   = $("#horaPE").val();
        var fechaPE = $("#fechaPE").val();
        var IdServicioEse = $("#IdServicioEse").val();
        var token = $('meta[name="csrf-token"]').attr('content');
            if((fechaPE=='' ) || (horaPE=='')){
                swal({
                        title: "<h3>¡ Campo(s) requerido(s) vacío(s) !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                    });
            }else{
                if(IdServicioEse!=''){
                  loaderButton(id,true);
                  $.ajax({
                          headers: {'X-CSRF-TOKEN':token},
                          url:'{{ url('GuardarProgramacionE') }}',
                          type:'POST',
                          dataType: 'json',
                          data:{horaPE:horaPE,fechaPE:fechaPE,IdServicioEse:IdServicioEse},
                          success: function(response){
                              $("#fechaPE").removeClass('form-control-lg');
                              $("#horaPE").removeClass('form-control-lg');
                              document.getElementById("idFechaUpdate").innerText = fechaPE;
                              document.getElementById("idHoraUpdate").innerText = horaPE;
                              if(response.status_alta == 'success'){
                                  swal({
                                      title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                      html: true,
                                      type: "success",
                                      confirmButtonText: "OK"
                                  });
                                  $("#Programada").removeClass('normal');
                                  $("#Programada").addClass('verde');
                                  $('#IdServicioEse').val(response.IdServicioEse);
                                //Inicia modal de la notificación
                                  setInterval(() => {
                                    showDialogProgamacionEjecucion()
                                  },300000);
                                //Finaliza el modal de la notifiación
                              }else if(response.status_alta == 'warning'){
                                  swal({
                                      title: "<h3>¡ Primero debe asignar Analista, Investigador y Líder !</h3> ",
                                      html: true,
                                      type: "warning",
                                      confirmButtonText: "OK"
                                  });
                              }else if(response.status_alta == 'error'){
                                  swal({
                                      title: "<h3>¡ El registro se guardo con éxito , No se puede eviar el mensaje, No se tiene el correo  !</h3> ",
                                      html: true,
                                      type: "warning",
                                      confirmButtonText: "OK"
                                  });
                                  $("#Programada").removeClass('normal');
                                  $("#Programada").addClass('verde');
                                  $('#IdServicioEse').val(response.IdServicioEse);
                                //Inicia modal de la notificación
                                  setInterval(() => {
                                    showDialogProgamacionEjecucion()
                                  },300000);
                                //Finaliza el modal de la notifiación
                              }
                          },
                          complete: function(){
                            loaderButton(id,false);
                          },
                          error: function(xhr, status){
                            loaderButton(id,false);
                            console.error(xhr, status);
                          }
                    });
                }else{
                    swal({
                        title: "<h3>¡ Aun no se ha creado OS !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                    });
                }
            }
    }

    function NotificarAlCorreo(idBtn){
      loaderButton(idBtn,true);
        var token = $('meta[name="csrf-token"]').attr('content');
        var IdServicioEse = $("#IdServicioEse").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('NotificarAlCorreo') }}',
            type:'POST',
            dataType: 'json',
            data:{IdServicioEse:IdServicioEse},
            success: function(response){
                if(response.status_alta == 'success') {
                    swal({
                        title: "<h3>¡ Se ha Notificado Correctamente !</h3> ",
                        html: true,
                        type: "success",
                        confirmButtonText: "OK"
                    });
                    isShowDialogProgamacionEjecucion = false;
                }else if(response.status_alta == 'error'){
                swal({
                        title: `<h3>Ocurrio un error ${response.error}</h3> `,
                        html: true,
                        type: "error",
                        confirmButtonText: "OK"
                    });
                }
            },
            complete: function(){
            loaderButton(idBtn,false);
            },
            error: function(){
              swal({
                title: "<h3>¡ Ocurrió un error al enviar la notificación !</h3> ",
                html: true,
                type: "error",
                confirmButtonText: "OK"
              });                        
            }
        });
    }

    function Notificacion(){
        var IdServicioEse = $("#IdServicioEse").val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $('#btn-notificar').attr('disabled',true);
        $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url:'{{ url('NotificarStatus') }}',
          type:'POST',
          dataType: 'json',
          data:{IdServicioEse:IdServicioEse},
          success: function(response){
              if(response.status_alta == 'success'){
                  swal({
                      title: "<h3>¡ Se ha Notificado Correctamente !</h3> ",
                      html: true,
                      type: "success",
                      confirmButtonText: "OK"
                  });
                  $('#IdServicioEse').val(response.IdServicioEse);
                  $('#estatusOS').html(response.estatus);
                  setTimeout(function(){
                    $("#tabs-estat").tabs("option","active",2);
                    $("a[href='#Estudio']").trigger('click');
                  }, 3000);
                  $('#Notificacion').attr('disabled',true);
                  $('#Notificacion').prop("onclick", null).off("click");
                location.reload();
              }else if(response.status_alta == 'warning'){
                  swal({
                      title: "<h3>¡ Verificar los estatus anteriores !</h3> ",
                      html: true,
                      type: "warning",
                      confirmButtonText: "OK"
                  });
                  setTimeout(function(){
                    $("#tabs-estat").tabs("option","active",5);
                  }, 3000);
          }else if(response.status_alta == 'valida'){
              swal({
                  title: "<h3>¡ LLenar los campos obligatorios de las pestañas 'Datos Generales' y 'Fotos Domicilio' !</h3> ",
                  html: true,
                  type: "warning",
                  confirmButtonText: "OK"
              });
            }
            $('#btn-notificar').attr('disabled',false);
          }
         });
    }

    function ConfirmacionAnalista(idBtn){
      loaderButton(idBtn,true);
        var token = $('meta[name="csrf-token"]').attr('content');
        var IdServicioEse = $("#IdServicioEse").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('ConfirmacionAnalista') }}',
            type:'POST',
            dataType: 'json',
            data:{IdServicioEse:IdServicioEse},
            success: function(response){
                if(response.status_alta == 'success') {
                  $("#btnConfirmacionAnalista").attr("onclick","");
                  swal({
                      title: "<h3>¡ Se ha Notificado Correctamente !</h3> ",
                      html: true,
                      type: "success",
                      confirmButtonText: "OK"
                  });
                  setTimeout(function(){
                          $("#tabs-estat").tabs("option","active",1);
                      }, 3000);
                }else if(response.status_alta == 'error'){
                swal({
                        title: `<h3>Ocurrió un error al enviar la notificación</h3> `,
                        html: true,
                        type: "error",
                        confirmButtonText: "OK"
                    });
                }
            },
            complete: function(){
            loaderButton(idBtn,false);
            },
            error: function(){
            }
        });
    }

    function ConfirmacionInvestigador(idBtn){
      loaderButton(idBtn,true);
        var token = $('meta[name="csrf-token"]').attr('content');
        var IdServicioEse = $("#IdServicioEse").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('ConfirmacionInvestigador') }}',
            type:'POST',
            dataType: 'json',
            data:{IdServicioEse:IdServicioEse},
            success: function(response){
                if(response.status_alta == 'success') {
                  $("#btnConfirmacionInvestigador").attr("onclick","");
                  swal({
                      title: "<h3>¡ Se ha Notificado Correctamente !</h3> ",
                      html: true,
                      type: "success",
                      confirmButtonText: "OK"
                  });
                }else if(response.status_alta == 'error'){
                swal({
                        title: `<h3>Ocurrió un error al enviar la notificación</h3> `,
                        html: true,
                        type: "error",
                        confirmButtonText: "OK"
                    });
                }
            },
            complete: function(){
            loaderButton(idBtn,false);
            },
            error: function(){                     
            }
        });
    }

    function saveFormulario(){
        var IdServicioEse = $("#IdServicioEse").val();
        var Estatus = $("#EstatusEval").val();
        var token = $('meta[name="csrf-token"]').attr('content');

        console.log(IdServicioEse+" "+Estatus);
        $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url: `{{ url('SaveFormulario') }}/${IdServicioEse}/${Estatus}`,
                type: "GET",
                dataType: 'json',
                success: function(response){
                  if(response.status_alta == 'error'){
                    swal({
                        title: "<h3>¡ "+response.message +"  !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                        
                    });console.log(response.message);
                  }else{
                    if(response.resultadoConteoColor <= 0){
                      swal({
                          title: "<h3>¡ Guardado correctamente !</h3> ",
                          html: true,
                          type: "success",
                          confirmButtonText: "OK"
                      });
                    }else{ 
                        swal({
                            title: "<h3>¡ Llenar los campos requeridos en estudios !</h3> ",
                            html: true,
                            type: "warning",
                            confirmButtonText: "OK"
                        });
                    }
                  }
                },
                error: function(xhr, status){
                  
                }
         });
    }

    function saveAnalista(id){
        loaderButton(id,true);
        var IdServicioEse = $("#IdServicioEse").val();
        var Comentarios = $("#ComentariosEval").val();
        var Estatus = $("#EstatusEval").val();
		    var Dictamen = $("#DictamenVal").val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url:'{{ url('SaveAnalista') }}',
                type:'POST',
                dataType: 'json',
				        data:{
                  IdServicioEse:IdServicioEse,
                  Comentarios:Comentarios,
                  Dictamen:Dictamen,
                  Estatus:Estatus
                },
                success: function(response){
                  loaderButton(id,false);
                  if(response.status_alta == 'error'){
                    swal({
                        title: "<h3>¡ El registro se guardo con éxito, No se puede eviar el mensaje, No se tiene el correo  !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                    });
                    console.log(response);
                }else{
                    if(Estatus=="Cerrado"){
                      console.log("cerrado"+response.resultadoConteoColor);
                          if(response.resultadoConteoColor <= 0){
                            swal({
                                title: "<h3>¡ El estatus se guardo con exito !</h3> ",
                                html: true,
                                type: "success",
                                confirmButtonText: "OK"
                            });
							            location.reload();
                        }else{ 
                          console.log('response: '+ JSON.stringify(response)+' estatus: '+Estatus);
							              document.getElementById("EstatusEval").selectedIndex = 0;
                            swal({
                                title: "<h3>¡ Dictamen Guardado, Llenar los campos requeridos en estudios !</h3> ",
                                html: true,
                                type: "warning",
                                confirmButtonText: "OK"
                            });
							            location.reload();
                        }
                    }else if(Estatus=="Pendiente"){
                        swal({
                            title: "<h3>¡ El estatus se guardo con exito!</h3> ",
                            html: true,
                            type: "success",
                            confirmButtonText: "OK"
                        });
						          location.reload();
                    }else if(Estatus=="Cancelado"){
                        swal({
                            title: "<h3>¡ El estatus se guardo con exito!</h3> ",
                            html: true,
                            type: "success",
                            confirmButtonText: "OK"
                        });
						          location.reload();
                    }
                  }
                },
                error: function(xhr, status){
                  loaderButton(id,false);
                  console.error(xhr, status);
                }
         });
    }

    function saveDictamenA(id){
        var IdServicioEse = $("#IdServicioEse").val();
		    var Dictamen = $("#DictamenVal").val();
        var token = $('meta[name="csrf-token"]').attr('content');
        console.log('Dictamen: '+Dictamen);
        $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url:'{{ url('SaveDictamenA') }}',
                type:'POST',
                dataType: 'json',
				        data:{
                  IdServicioEse:IdServicioEse,
                  Dictamen:Dictamen
                },
                success: function(response){
                  $('#Estatus').val(response.respDictamen);
                }
         });
    }

    function DictamenInvestigador(id){
        loaderButton(id,true);
        var IdServicioEse = $("#IdServicioEse").val();
        var Resumen = $("#Resumen").val();
        var Escolar = $("#Escolar").val();
        var Trayectoria = $("#Trayectoria").val();
        var Disponibilidad = $("#Disponibilidad").val();
        var Puntualidad = $("#Puntualidad").val();
        var Seriedad = $("#Seriedad").val();
        var Actitud = $("#Actitud").val();
        var Confiabilidad = $("#Confiabilidad").val();
        var Seguridad = $("#Seguridad").val();
        var Presentacion = $("#Presentacion").val();
        var ComentariosDI = $("#ComentariosDI").val();
        var Estatus = $("#DictamenVal").val();
        var EstatusIncidencias = $("#EstatusIncidencias").val();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url:'{{ url('DictamenInvestigador') }}',
          type:'POST',
          dataType: 'json',
          data:{IdServicioEse:IdServicioEse,
            Resumen:Resumen,
            Escolar:Escolar,
            Trayectoria:Trayectoria,
            Disponibilidad:Disponibilidad,
            Puntualidad:Puntualidad,
            Seriedad:Seriedad,
            Actitud:Actitud,
            Confiabilidad:Confiabilidad,
            Seguridad:Seguridad,
            Presentacion:Presentacion,
            ComentariosDI:ComentariosDI,
            Estatus:Estatus,
            Incidencias:EstatusIncidencias
          },
          success: function(response){
            loaderButton(id,false);
                      swal({

                        @if(Auth::user()->tipo == 's')
                          title: "<h3>¡ Dictamen Guardado !</h3>",
                        @else
                          title: "<h3>¡ Estudio Capturado !</h3>",
                        @endif
                        html: true,
                        data: "",
                        type: "success"
                      });
            location.reload();
          },
          error: function(xhr, status){
            loaderButton(id,false);
            console.error(xhr, status);
          }
         });
    }

    function Estudio(){
      var IdServicioEse = $("#IdServicioEse").val();
      var token = $('meta[name="csrf-token"]').attr('content');
      if(IdServicioEse!=''){
          var empty=0;
          $('.entradas-g-a.required').each(function(){
            if($(this).val()!=""){
            }else{
                empty=empty+1;
            }
          });
          if(empty > 0) {
              swal({
                  title: "<h3>¡ Campo(s) Requerido(s) Vacío(s). !</h3> ",
                  html: true,
                  type: "warning",
                  confirmButtonText: "OK"
              });
          }else{
              $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url:'{{ url('GuardarEstudio') }}',
                type:'POST',
                dataType: 'json',
                data:{valuesEntr:valuesEntr,keysEntr:keysEntr,IdServicioEse:IdServicioEse},
                success: function(response){
                    swal(''+response.status_alta);
                        if(response.status_alta == 'success'){
                            swal({
                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                html: true,
                                type: "success",
                                confirmButtonText: "OK"
                            });
                            $('#IdServicioEse').val(response.IdServicioEse);
                    }
                }
              });
          }
      }else{
          swal({
              title: "<h3>¡ Aun no se ha creado OS !</h3> ",
              html: true,
              type: "warning",
              confirmButtonText: "OK"
          });
      }
    }

    function selectInvestigador(){
      let investigador = $('select[name="IdInvestigador"] option:selected').text();
      $('#label_Investigador').html('Investigador: '+investigador);
    }

    function selectAnalista(){
      let analista = $('select[name="IdAnalista"] option:selected').text();
      $('#label_analista').html('Analista: '+analista);
    }
    document.getElementById("btnPreviewPDF").addEventListener("click", function( event ) {
      $("#btnDownloadStudio").hide();

      var isMobile = mobileDetect(); 

      var IdServicioEse= $("#IdServicioEse").val();

      document.getElementById("PDFContent").innerHTML='';
      document.getElementById("PDFContent").innerHTML='<div class="container-fluid" style="height:300px;">'+

              '<div class="spinner"></div><br><br><div class="row">'+

              '<div class="col-sm-12">'+

                  '<div class="card h-100 text-center" style="height: 300px; margin-top:200px">'+

                  '<center><h3 class="">Cargando PDF</h3></center>'+

                  '</div>'+

              '</div>'+

          '</div>'+

      '</div>';

      $.ajax({
          url: "{{ url('GetFilePreview') }}" +"/"+ IdServicioEse,
          type:'GET',
          dataType: 'json',
          success: function(response){
            console.log('status pdf: '+JSON.stringify(response));
            if(response.status == "200")
            {
              dataDownloadFile.base64 = response.b64pdf;
              dataDownloadFile.titleFile = removeAccents(`${response.NamePlantilla} ${'{{$NombreCompletoCandidatoSinAcentos}}'}`);
              dataDownloadFile.tab = document.getElementById("PDFContent");
              dataDownloadFile.typeFile = "PDF";
              if(isMobile){
                downloadFileBase64(response.b64pdf,removeAccents(`${response.NamePlantilla} ${'{{$NombreCompletoCandidatoSinAcentos}}'}`),document.getElementById("PDFContent"),"PDF");
                document.getElementById("PDFContent").innerHTML = `<center><h3>El archivo ${response.NamePlantilla} se descargo</h3></center>`;
              }
              else
                document.getElementById("PDFContent").innerHTML = '<embed src="data:application/pdf;base64,'+response.b64pdf+'#toolbar=0&zoom=100" style="height:420px; width:100%;">';
              $("#btnDownloadStudio").show();
            }
            if(response.status == "404")
            {
              document.getElementById("PDFContent").innerHTML ='<div class="container-fluid" style="height:300px;">'+

                      '<div class="row">'+

                      '<div class="col-sm-12">'+

                          '<div class="card h-100 text-center" style="height: 300px; margin-top:200px">'+

                          '<center><h3 class="">:( No existe el reporte de la Plantilla: '+response.NamePlantilla +'</h3></center>'+

                          '</div>'+

                      '</div>'+

                  '</div>'+

              '</div>';
            }

            if(response.status == "500"){
              document.getElementById("PDFContent").innerHTML ='<div class="container-fluid" style="height:300px;">'+

                      '<div class="row">'+

                      '<div class="col-sm-12">'+

                          '<div class="card h-100 text-center" style="height: 300px; margin-top:200px">'+

                          '<center><h3 class="">:( ocurrió un error al cargar PDF</h3></center>'+

                          '</div>'+

                      '</div>'+

                  '</div>'+

              '</div>';
            }
          },

          error: function(){
            document.getElementById("PDFContent").innerHTML ='<div class="container-fluid" style="height:300px;">'+

                    '<div class="row">'+

                    '<div class="col-sm-12">'+

                        '<div class="card h-100 text-center" style="height: 300px; margin-top:200px">'+

                        '<center><h3 class="">:( ocurrió un error al cargar PDF</h3></center>'+

                        '</div>'+

                    '</div>'+

                '</div>'+

            '</div>';
          }
        });
    }, false);

    function disableBtnPreview(){
      var plantilla = "{{$NamePlantilla}}";
      if(plantilla == "Formato Incidencias Legales"){
        $("#btnPreviewPDF").attr("disabled", "disabled");
      }
    }



    $("#estado").on("change",function(){

      var idEstado=$("#estado").val();

      $("#colonia").html("");

      $("#ciudad").html("");
      $.ajax({
        url:"{{ url('searchRegion') }}"+"/"+idEstado,
        type:"GET",
        success: function(response){
          $("#municipios").html("");
            $("#municipios").append(`<option value='1'>Seleccionar una municipio</option>`);
          response.forEach(element => { 
            $("#municipios").append(`<option value='${element.IdEstado}'>${element.Descripcion}</option>`);
          });
        },
        error:function(){
            console.log(idEstado);
        }
      });
    });
    $("#ciudad").on("change",function(){
      var ciudad=$("#ciudad").val();
      $.ajax({
        url:"{{ url('searchColiniaCologne') }}"+"/"+ciudad,
        type:"GET",
        success: function(response){
          $("#colonia").html("");
          response.forEach(element => { 
            var splitcolonia=element.Colonia.split(';');
            if (splitcolonia.length >= 1){
              for(var i=0; i<splitcolonia.length;i++){
                $("#colonia").append(`<option value='${splitcolonia[i]}'>${splitcolonia[i]}`);
              }
            }else{
              $("#colonia").append(`<option value='${element.Colonia}'>${element.Colonia}`);
            }
          });
        },
        error:function(){
        }
      });
    });

    // inhabilitar investigador y boton

    function desableInvestigator(){
      var typeModal = $('select[name="IdModalidad"] option:selected').text();
    }

    // - - - funcion para validar fechas periodo - - -

    const validateDatePeriod = (nameInputsDate) => {
      var arraynameInputsDate = [];
      nameInputsDate.forEach((element)=>{
        if(document.getElementsByName(element)[0].dataset.titleinput != "Fecha de Ingreso" && document.getElementsByName(element)[0].dataset.titleinput != "Fecha de Salida"){
          // validamos que los ultimos 3 caracteres sea [0] o [1]
          if(element.substring(element.length-3,element.length) == "[0]" || element.substring(element.length-3,element.length) == "[1]"){
            var newnamedate = element.substring(0,element.length-3);//quitamos los caracteres [0] o [1]
            arraynameInputsDate.push(newnamedate);
          }
        }
      });

      if(arraynameInputsDate.length > 0){

        //eliminamos elementos repetidos

        const dataArr = new Set(arraynameInputsDate);
        let newdataArr = [...dataArr];

        // recorremos el nuevo array y validamos

        newdataArr.forEach((element) =>{ 
          var valueDate1 = document.querySelector(`[name="${element}[0]"]`).value;
          var valueDate2 = document.querySelector(`[name="${element}[1]"]`).value;
          var date1 = new Date(valueDate1);
          var date2 = new Date(valueDate2);
          if(date1.getTime() > date2.getTime()){
            showNotify("Periodo: ","Fecha incial no debe ser mayor a la fecha final","danger");
            document.querySelector(`[name="${element}[1]"]`).value = "";
          }
        });
      }
    };

   // funcion para que en el boton aparezca un loading.

    const loaderButton = (id,loading) => {
      if(loading){
        $(`#${id}`).button('loading');
      }else{
        $(`#${id}`).button('reset');
      }
    };

    //limita la entrada de datos de acuerdo al attr maxLength

    const maxLengthCheck = (object) => {
        if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }

    // verificar si la entrada de dato es numerico

    const isNumeric = (evt) => {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    const sendEmailFromAnalist = (IdBtn,IdServicioEse) => {
      loaderButton(IdBtn,true);
      $.ajax({
        url: `{{ url('analistaSendEmail') }}/${IdServicioEse}`,
        type: "GET",
        success: function(response){
          if(response.isSendEmail){
            swal({
                title: `<h3>${response.message}</h3>`,
                html: true,
                type: "success",
                confirmButtonText: "OK"
            });
          }else{
            swal({
                title: `<h3>${response.message}</h3>`,
                html: true,
                type: "error",
                confirmButtonText: "OK"
            });            
          }
        },
        complete: function(){
          loaderButton(IdBtn,false);
        },
        error: function(){
          swal({
                title: `<h3>Ocurrió un error</h3>`,
                html: true,
                type: "error",
                confirmButtonText: "OK"
            }); 
        }
      });
    }

    // funcion para mostrar el dialogo con el msg 'Aún no se ha realizado la notificación'

    const showDialogProgamacionEjecucion = () => {
      setInterval(() => {
        if(isShowDialogProgamacionEjecucion){
          if(!$('.overlay_popup').hasClass('popup-open')){
           
          }
        }
      },300000);
    }

    // activar o descartivar un input

    const disableOrEnableInput = (Id,disableOrEnable) => {
      if(document.getElementById(Id)){
        document.getElementById(Id).disabled = disableOrEnable;
      }
    }
    //para sindicato
    const disableAskCualSinPer= () =>{
      var camposCualSin= document.getElementsByName("¿A cuál sindicato perteneció?");
      for (let i=0; i<camposCualSin.length; i++) {
        idInp=camposCualSin[i].attributes.idInp.value;
        value=document.getElementsByName(idInp)[0].value
        if(value=='No aplica'){
          $('input[name="'+idInp+'"]').prop('disabled', true);
      }
      }
    }

    const btnNextAndBack = () => {
      $('.btncontinue').click(function(){
        if($('.tabsSecundary > .active').next('li').find('a').text() != ""){
          $('.tabsSecundary > .active').next('li').find('a').trigger('click');
          $("body, html").animate({
            scrollTop: $(".tabsFirt").offset().top
          },2000);
        }else
          $('.tabsFirt > .active').next('li').find('a').trigger('click');
      });
      $('.btnback').click(function(){
        if($('.tabsSecundary > .active').prev('li').find('a').text() != ""){
          $('.tabsSecundary > .active').prev('li').find('a').trigger('click');
          $("body, html").animate({
            scrollTop: $(".tabsFirt").offset().top
          },2000);
        }else
          $('.tabsFirt > .active').prev('li').find('a').trigger('click');
      }); 
    }

    const generateSummary = (IdBtn,IdServicioEse) => {
      var summarys = JSON.parse(localStorage.getItem("summarys"));
      const paramSummaryEconomia = extractParameters(summarys.economica);
      const paramSummaryEscolaridad = extractParameters(summarys.escolar);
      const paramSummaryTrayectoria = extractParameters(summarys.trayectoriaLaboral);
      extractParameters(summarys.escolar);
      loaderButton(IdBtn,true);
      $.ajax({
        url: `{{ url('getJsonSummary') }}/${IdServicioEse}`,
        type: "GET",
        success: function(response){  
          if(response.data != null){
            response.data = response.data.replace(/\n/g, "\\n"); 

            var data = JSON.parse(response.data);

            tiempovivir=JSON.stringify(data.DATOS_GENERALES["TiempoVivirDomicilioValor"]);
            calgeneral=JSON.stringify(data.SITUACIÓN_SOCIAL_Y_ECONÓMICA["ViviendaTipoCalidadGeneralValor"]);
            limpiezaValor=JSON.stringify(data.SITUACIÓN_SOCIAL_Y_ECONÓMICA["ViviendaTipoCalidadLimpiezaValor"]);
            ordenValor=JSON.stringify(data.SITUACIÓN_SOCIAL_Y_ECONÓMICA["ViviendaTipoCalidadOrdenValor"]);

            var arrayGrado=[]; var arrayInstitucion=[]; var arrayComprobante=[];

            arrayGrado=data["UltimoGEstudio"].split(",");
            arrayInstitucion=data["InstitucionValor"].split(",");
            arrayComprobante=data["ComprobanteValor"].split(",");
            DatosEscolaridad = '';
            for (let index = 0; index < arrayGrado.length; index++) {
              DatosEscolaridad=DatosEscolaridad+'El candidato concluyó '+arrayGrado[index]+', cursada en la '+arrayInstitucion[index]+'. Muestra '+arrayComprobante[index]+' como documento probatorio. ';
            }
            IdiomasValor=JSON.stringify(data["IdiomasValor"]);
            summarys.escolar= summarys.escolar.replace(":DatosEscolaridad", DatosEscolaridad);
            summarys.escolar= summarys.escolar.replace(":IdiomasValor", IdiomasValor.replace(/"/g, ''));
            if(response.IdMod == 1){
              summarys.economica= summarys.economica.replace(":textCandidato", 'se entrevistó al candidato');
              summarys.economica= summarys.economica.replace(":textLOrden", '. ');
            }
            else{
              summarys.economica= summarys.economica.replace(":textCandidato", 'se visitó al candidato');
              summarys.economica= summarys.economica.replace(":textLOrden", ', el mobiliario se encuentra en :ViviendaTipoCalidadGeneralValor estado de conservación. Al momento de la entrevista se observó todo :ViviendaTipoCalidadOrdenValor y :ViviendaTipoCalidadLimpiezaValor. ');
              summarys.economica=summarys.economica.replace(":ViviendaTipoCalidadGeneralValor", calgeneral.replace(/"/g, ''));
              summarys.economica=summarys.economica.replace(":ViviendaTipoCalidadLimpiezaValor", limpiezaValor.replace(/"/g, ''));
              summarys.economica=summarys.economica.replace(":ViviendaTipoCalidadOrdenValor", ordenValor.replace(/"/g, ''));
            }
            summarys.economica= summarys.economica.replace(":TiempoVivirDomicilioValor", tiempovivir.replace(/"/g, ''));
            summarys.economica= summarys.economica.replace(":TotalIngresoValor", response.TotalIngresos);
            summarys.trayectoriaLaboral= summarys.trayectoriaLaboral.replace(":EmpleoActual", response.EmpleoActual);
            summarys.trayectoriaLaboral= summarys.trayectoriaLaboral.replace(":EmpleoAnterior", response.EmpleoAnterior);
            summarys.trayectoriaLaboral= summarys.trayectoriaLaboral.replace(":EstatusDictamenValor", response.Dictamen);

            var summaryEconomica = replaceParameters(paramSummaryEconomia,summarys.economica,data);
            var summaryEscolaridad = replaceParameters(paramSummaryEscolaridad,summarys.escolar,data);
            var summaryTrayectoria = "";

            let NombrePlantilla = '{{$NamePlantilla}}';
            if(NombrePlantilla == "Estudio JLL"){
              summaryTrayectoria = generateSummaryStudioJLL(data['REFERENCIAS_LABORALES'],paramSummaryTrayectoria,summarys.trayectoriaLaboral);
            }
            else{
              summaryTrayectoria = replaceParameters(paramSummaryTrayectoria,summarys.trayectoriaLaboral,data);
            }
            $('#Resumen').val(summaryEconomica);
            $('#Escolar').val(summaryEscolaridad);
            $('#Trayectoria').val(summaryTrayectoria);
          }
        },
        complete: function(){
          loaderButton(IdBtn,false);
        },
        error: function(){
          loaderButton(IdBtn,false);
        }
      });
    }

    /*Funcion para Extraer parametros de un texto*/

    const extractParameters = (text) => {
      var textReplace = text;
      var textSplit = [];
      var parameters = [];
      var finallyParameters = [];

      //eliminamos los caracteres siguientes

      textReplace = textReplace.replace(/[&\/\\#,+()$~%.'"*?<>{}]/g," ");
      textSplit = textReplace.split(':');
      textSplit.forEach(element => {
        if(element.search(" ") != -1){
          var elementSplit = element.split(" ");
          parameters.push(elementSplit[0]);
        }else{
          parameters.push(element);
        }
      });

      //eliminamos elementos repetidos

      const dataArr = new Set(parameters);
      let newArrParameters = [...dataArr];  

      //buscamos los parametros en el texto y almacenamos en un nuevo array

      newArrParameters.forEach(element => {
        if(text.search(`:${element}`) != -1){
          finallyParameters.push(element);
        }
      });    
      return finallyParameters;
    }

    /* Funcion para reemplazar parametros en un texto*/

    const replaceParameters = (parameters,text,data) => {
      var replaceText = text;
      parameters.forEach(parameter => {
        var value = eachJson(parameter,data);
        var position = replaceText.indexOf(`:${parameter}`);
        while (position >= 0)
        {
          replaceText= replaceText.replace(`:${parameter}`,value);
          position = replaceText.indexOf(`:${parameter}`);
        } 
      });
     return replaceText;
    }

    /* funcion para buscar en un objeto(json) por su key y devolver su valor */

    const eachJson = (find,obj,out) => {
      Object.keys(obj).forEach(prop => {
          var value = obj[prop];
          if(typeof(value) === 'object'){
            out = eachJson(find,value,out);
          }else{
            if(prop === find){
              out = value;
            } 
          }
        });
      return out;
    }

     const autocompleteInput = (name) => {
        const patternNumeric = /\d+/g;
        const patternOther = /_/g;
        const idparentNode = document.getElementsByName(`${name}`)[0].parentNode.className;
        const nameClassOnlyLetters = idparentNode.replace(patternNumeric, "").replace(patternOther,"");
        const titleinput =  document.getElementsByName(`${name}`)[0].dataset.titleinput;
        const value =  document.getElementsByName(`${name}`)[0].dataset.selectvalue;
        var inputs = document.querySelectorAll(`.${idparentNode} input`);
        var selects = document.querySelectorAll(`.${idparentNode} select`);
        var textareas = document.querySelectorAll(`.${idparentNode} textarea`);
        var inputsT = document.querySelectorAll(`.${idparentNode} input`);
        var allInputs = [];
        var allInputsT = [];
        var labelValidate = "";

        inputs.forEach(element => {
          allInputs.push({name: element.name,type: element.type});
        });
        selects.forEach(element => {
          allInputs.push({name: element.name,type: "select"});
        });
        textareas.forEach(element => {
          allInputs.push({name: element.name,type: "textarea"});
        });

        ///////////////////BLOQUE TRAYECTORIA////////////////////

        for (var index = 0; index < allInputs.length; index++) {
          console.log(allInputs[index]);
        }

        ///////////////////FIN BLOQUE TRAYECTORIA////////////////

        inputsT.forEach(function(element) {
          if (element.id === 'Telefono') {
            allInputsT = [];
            allInputsT.push({id: element.id,name: element.name,type: element.type});
          }
        });
        inputsT.forEach(function(element) {
          if (element.id === 'Celular') {
            allInputsCel = [];
            allInputsCel.push({id: element.id,name: element.name,type: element.type});
          }
        });
        inputsT.forEach(function(element) {
          if (element.id === 'SitEcoEmerNombreTelefonoFijo') {
            allInputsTF = [];
            allInputsTF.push({id: element.id,name: element.name,type: element.type});
          }
        });
        inputsT.forEach(function(element) {
          if (element.id === 'SitEcoEmerCelular') {
            allInputsEC = [];
            allInputsEC.push({id: element.id,name: element.name,type: element.type});
          }
        });
        inputsT.forEach(function(element) {
          if (element.id === 'TrayecLaboralTelOficina') {
            allInputsTO = [];
            allInputsTO.push({id: element.id,name: element.name,type: element.type});
          }
        });
        inputsT.forEach(function(element) {
          if (element.id === 'TrayecLaboralCelularJefe') {
            allInputsCJ = [];
            allInputsCJ.push({id: element.id,name: element.name,type: element.type});
          }
        });
        if(titleinput == "Aplica"){
           labelValidate = titleinput;
        }else if(titleinput == "Aplica Teléfono"){
          labelValidate = titleinput;
        }else if(titleinput == "Aplica Celular"){
          labelValidate = titleinput;
        }
        if(labelValidate){
          document.getElementsByName(`${name}`)[0].dataset.selectvalue = document.getElementsByName(`${name}`)[0].value;
          if(document.getElementsByName(`${name}`)[0].value == "No"){
            complete(allInputs,"No aplica");
            complete(allInputs,"No Aplica");
            saveAutoCompleteInputs(allInputs,document.getElementsByName(`${name}`)[0].id);
          }
          else if(document.getElementsByName(`${name}`)[0].value == "No aplica"){
            complete(allInputs,"No aplica");
            saveAutoCompleteInputs(allInputs,document.getElementsByName(`${name}`)[0].id);
          }
          else if(document.getElementsByName(`${name}`)[0].value == "No Aplica"){
              var strId = document.getElementsByName(`${name}`)[0].id;
              var nTel = strId.search("Tel");
              if(nTel != -1){
                inputsT.forEach(function(element) {
                  if (element.id === 'Telefono') {
                    completeT(allInputsT,"NA");
                    saveAutoCompleteInputs(allInputsT,document.getElementsByName(`${name}`)[0].id);
                  }else if (element.id === 'SitEcoEmerNombreTelefonoFijo') {
                    completeT(allInputsTF,"NA");
                    saveAutoCompleteInputs(allInputsTF,document.getElementsByName(`${name}`)[0].id);
                  }
                  else if (element.id === 'TrayecLaboralTelOficina') {
                    completeT(allInputsTO,"NA");
                    saveAutoCompleteInputs(allInputsTO,document.getElementsByName(`${name}`)[0].id);
                  }
                });
              }else{
                var nCel = strId.search("Celular");
                if(nCel != -1){
                  inputsT.forEach(function(element) {
                    if (element.id === 'Celular') {
                      completeT(allInputsCel,"NA");
                      saveAutoCompleteInputs(allInputsCel,document.getElementsByName(`${name}`)[0].id);
                    }else if (element.id === 'SitEcoEmerCelular') {
                      completeT(allInputsEC,"NA");
                      saveAutoCompleteInputs(allInputsEC,document.getElementsByName(`${name}`)[0].id);
                    }
                    else if (element.id === 'TrayecLaboralCelularJefe') {
                      completeT(allInputsCJ,"NA");
                      saveAutoCompleteInputs(allInputsCJ,document.getElementsByName(`${name}`)[0].id);
                    }
                  });
                }
              }
          }
          else if(document.getElementsByName(`${name}`)[0].value == "No Proporcionó"){
              var strId = document.getElementsByName(`${name}`)[0].id;
              var nTel = strId.search("Tel");
              if(nTel != -1){
                inputsT.forEach(function(element) {
                  if (element.id === 'Telefono') {
                    completeT(allInputsT,"No Proporcionó");
                    saveAutoCompleteInputs(allInputsT,document.getElementsByName(`${name}`)[0].id);
                  }else if (element.id === 'SitEcoEmerNombreTelefonoFijo') {
                    completeT(allInputsTF,"No Proporcionó");
                    saveAutoCompleteInputs(allInputsTF,document.getElementsByName(`${name}`)[0].id);
                  }else if (element.id === 'TrayecLaboralTelOficina') {
                    completeT(allInputsTO,"No Proporcionó");
                    saveAutoCompleteInputs(allInputsTO,document.getElementsByName(`${name}`)[0].id);
                  }
                });
              }else{
                var nCel = strId.search("Celular");
                if(nCel != -1){
                  inputsT.forEach(function(element) {
                    if (element.id === 'Celular') {
                      completeT(allInputsCel,"No Proporcionó");
                      saveAutoCompleteInputs(allInputsCel,document.getElementsByName(`${name}`)[0].id);
                    }else if (element.id === 'SitEcoEmerCelular') {
                      completeT(allInputsEC,"No Proporcionó");
                      saveAutoCompleteInputs(allInputsEC,document.getElementsByName(`${name}`)[0].id);
                    }else if (element.id === 'TrayecLaboralCelularJefe') {
                      completeT(allInputsCJ,"No Proporcionó");
                      saveAutoCompleteInputs(allInputsCJ,document.getElementsByName(`${name}`)[0].id);
                    }
                  });
                }
              }
          }
          else if(document.getElementsByName(`${name}`)[0].value == "Si"){
              var strId = document.getElementsByName(`${name}`)[0].id;
              var nTel = strId.search("Tel");
              if(nTel != -1){
                inputsT.forEach(function(element) {
                  if (element.id === 'Telefono') {
                    resetAutoComplete(allInputsT,"",document.getElementsByName(`${name}`)[0].id);
                    saveResetValueInputs(allInputsT,name,$("#IdServicioEse").val());
                  }else if (element.id === 'SitEcoEmerNombreTelefonoFijo') {
                    resetAutoComplete(allInputsTF,"",document.getElementsByName(`${name}`)[0].id);
                    saveResetValueInputs(allInputsTF,name,$("#IdServicioEse").val());
                  }
                  else if (element.id === 'TrayecLaboralTelOficina') {
                    resetAutoComplete(allInputsTO,"",document.getElementsByName(`${name}`)[0].id);
                    saveResetValueInputs(allInputsTO,name,$("#IdServicioEse").val());
                  }
                });
              }else{
                var nCel = strId.search("Celular");
                if(nCel != -1){
                  inputsT.forEach(function(element) {
                  if (element.id === 'Celular') {
                  }else if (element.id === 'SitEcoEmerCelular') {
                    resetAutoComplete(allInputsEC,"",document.getElementsByName(`${name}`)[0].id);
                    saveResetValueInputs(allInputsEC,name,$("#IdServicioEse").val());
                  }
                  else if (element.id === 'TrayecLaboralCelularJefe') {
                    resetAutoComplete(allInputsCJ,"",document.getElementsByName(`${name}`)[0].id);
                    saveResetValueInputs(allInputsCJ,name,$("#IdServicioEse").val());
                  }
                });
                }
              }
          }
          else{
            if(value != ''){
              resetAutoComplete(allInputs,"",document.getElementsByName(`${name}`)[0].id);
              saveResetValueInputs(allInputs,name,$("#IdServicioEse").val());
            }
          }
        }
     }

     /*
        Funcion para completar los campos
        parametros:
          allInputs: array de objeto con el id y tipo de input que se encuentran en el agrupador
          selectOption:string de la opcion que se desea seleccionar de los selects
     */

     const complete = (allInputs,selectOption) => {
        allInputs.forEach(input => {
            if(input.type == "text"){
              document.getElementsByName(`${input.name}`)[0].value = "NA";
            }else if(input.type == "number"){
              document.getElementsByName(`${input.name}`)[0].value = "0";
            }else if(input.type == "select"){
              var select = document.getElementsByName(`${input.name}`)[0];
              for (let index = 0; index < select.length; index++) {
                if(select.options[index].text == selectOption){
                  select.selectedIndex = index;
                }
              }
            }else if(input.type == "textarea"){
              document.getElementsByName(`${input.name}`)[0].textContent = "NA";
            }else if(input.type == "date"){
              const dateNow = new Date();
              var year = dateNow.getFullYear();
              var month = dateNow.getMonth()+1;
              if(month < 10){
                month = `0${month}`;
              }
              var day = dateNow.getDate();
              if(day < 10){
                day = `0${day}`;
              }
              document.getElementsByName(`${input.name}`)[0].value = `${year.toString()}-${month.toString()}-${day.toString()}`;
            }
        });
     }

     const completeT = (allInputs,selectOption) => {
        allInputs.forEach(input => {
            if(input.type == "text"){
              var strId = input.id;
              var nTel = strId.search("Telefono");
              var nTel2 = strId.search("Tel");
              var nCel = strId.search("Celular");
              if(nTel != -1){
                document.getElementsByName(`${input.name}`)[0].value = selectOption;
              }else if(nTel2 != -1){
                document.getElementsByName(`${input.name}`)[0].value = selectOption;
              }else if(nCel != -1){
                document.getElementsByName(`${input.name}`)[0].value = selectOption;
              }
            }
        });
     }

     /*
        Funcion para borrar el contenido de los campos
        parametros:
          allInputs: array de objeto con el id y tipo de input que se encuentran en el agrupador
          selectOption:string de la opcion que se desea seleccionar de los selects
          InputIgnore:string del id del campo a ignorar
     */

     const resetAutoComplete = (allInputs,selectOption,InputIgnore) => {
        allInputs.forEach(input => {
          if(input.name != ''){
            if(document.getElementsByName(`${input.name}`)[0].id != InputIgnore){
              if(input.type == "text"){
                var strId = input.id;
                var nTel = strId.search("Telefono");
                var nTel2 = strId.search("Tel");
                var nCel = strId.search("Celular");
                if(nTel != -1){
                  if(document.getElementsByName(`${input.name}`)[0].value=='No Aplica'){
                    document.getElementsByName(`${input.name}`)[0].value = "";
                  }else if(document.getElementsByName(`${input.name}`)[0].value=='No Proporcionó'){
                    document.getElementsByName(`${input.name}`)[0].value = "";
                  }
                }else if(nTel2 != -1){
                  if(document.getElementsByName(`${input.name}`)[0].value=='No Aplica'){
                    document.getElementsByName(`${input.name}`)[0].value = "";
                  }else if(document.getElementsByName(`${input.name}`)[0].value=='No Proporcionó'){
                    document.getElementsByName(`${input.name}`)[0].value = "";
                  }
                }else if(nCel != -1){
                  if(document.getElementsByName(`${input.name}`)[0].value=='No Aplica'){
                    document.getElementsByName(`${input.name}`)[0].value = "";
                  }else if(document.getElementsByName(`${input.name}`)[0].value=='No Proporcionó'){
                    document.getElementsByName(`${input.name}`)[0].value = "";
                  }
                }else{
                  document.getElementsByName(`${input.name}`)[0].value = "";
                }
              }else if(input.type == "number"){
                document.getElementsByName(`${input.name}`)[0].value = "";
              }else if(input.type == "select"){
                var select = document.getElementsByName(`${input.name}`)[0];
                select.selectedIndex = 0;
              }else if(input.type == "date"){
                document.getElementsByName(`${input.name}`)[0].value = "";
              }
            }
          }
        });
     }

     /*
        Funcion para guardar los datos de los campos
        parametros:
          allInputs: array de objeto con el id y tipo de input que se encuentran en el agrupador
          InputIgnore:string del id del campo a ignorar
     */

     const saveAutoCompleteInputs = (allInputs,InputIgnore) => {
      var idsss = [];
      var values = [];
      allInputs.forEach(input => {
        if(input.name != ''){
          
              //GuardadoInput(input.name,document.getElementsByName(`${input.name}`)[0].value);
            idsss.push(input.name);
            if(input.type == "file"){
              values.push("$$$");
              console.log(input.name);
            }else
              values.push(document.getElementsByName(`${input.name}`)[0].value);
          
        }
        
      });
      
      GuardadoInput2(idsss,values);
     }

     /*
        Funcion para borrar los datos de los campos en la BD 
        parametros:
          allInputs: array de objeto con el id y tipo de input que se encuentran en el agrupador
                    ejem: {name='',type=''}
          InputIgnore:string del name del tab a ignorar
          IdServicioEse: string del id de BD del servicio
     */

     const saveResetValueInputs = (allInputs,InputIgnore,IdServicioEse) => {
        $.ajax({
          headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('saveResetValueInput') }}",
          type: "POST",
          data:{
            allInputs: allInputs,
            IdServicioEse: IdServicioEse,
            InputIgnore: InputIgnore
          },
          success: function (response) {
            if(response.status == "error"){
              console.log(response);
            }
          },
          error : function(xhr, status) {
            show_error_message(xhr.status);
          }
        });
     }

     const btnTryAgain = () => {
      isContentStudio = false;
      $("#grpos").empty();
      $("a[href='#Estudio']").trigger('click');
     }

     /*
        Funcion para mostrar en el modal el PDF O la imagen
     */
     const showFile = (idFile,idStudio,typeFile,titleFile) =>{
      $("#btnDownloadFileStudio").hide(); 
      var isMobile = mobileDetect();
      if(document.getElementById('filpdf')){
        var iframe = document.getElementById('filpdf');
        iframe.parentNode.removeChild(iframe);
      }
      $("#content-message-loading-file").hide();
      document.getElementById("container-file").innerHTML = "";
      $('#modalShowFile').modal('show');
      if($(".modal-dialog").hasClass("modal-lg"))
        $(".modal-dialog").removeClass("modal-lg");
      $.ajax({
        url: `{{ url('getFiles') }}/${idFile}/${idStudio}`,
        type: "GET",
        beforeSend: function(){
          $("#loading-file").show();
        },
        success: function(response){
          if(response.status == "success"){
            dataDownloadFile.base64 = response.data;
            dataDownloadFile.titleFile = titleFile;
            dataDownloadFile.tab = document.getElementById("container-file");
            dataDownloadFile.typeFile = typeFile;
            if(typeFile == "PDF"){
              $(".modal-dialog").addClass("modal-lg");
              if(isMobile){
                downloadFileBase64(response.data,titleFile,document.getElementById("container-file"),typeFile);
                document.getElementById("container-file").innerHTML = `<center><h3>El archivo ${titleFile} se descargo</h3></center>`;
              } else
                document.getElementById("container-file").innerHTML = `<iframe id='filpdf' src='data:application/pdf;base64,${response.data}#toolbar=0&zoom=100' frameborder='0' scrolling='no' width='100%' height='500'></iframe>`;
            }
            else 
            if(typeFile == "JPEG")
              document.getElementById("container-file").innerHTML = `<img id='imgn' src='data:image/jpg;base64,${response.data}' class='img-responsive'>`;
            $("#btnDownloadFileStudio").show();   
          } else
            $("#content-message-loading-file").show(); 
        },
        complete: function(){
          $("#loading-file").hide();
        },
        error: function(){
          $("#content-message-loading-file").show();
        }
      });
     }
    /*** Funcion para eliminar el archivo de la basde de datos*/
     const removeFile = (idFile,idStudio,title) => {
      swal({
        title: "Eliminar archivo",
        text: `¿Está seguro en eliminar el archivo ${title}?`,
        type: "info",
        confirmButtonClass: "btn-success",
        cancelButtonClass: "btn-danger",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No eliminar",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function () {
          $.ajax({
            url:`{{ url('deleteFiles') }}/${idFile}/${idStudio}`,
            type: "GET",
            success: function(response){
              if(response.status == "success"){
                $(`#image${idFile}`).remove();
                $("#buttonFile"+idFile).css("display","none");
                $("label[for*='"+idFile+"']").html("Seleccionar");
                swal("El archivo se eliminó con éxito!");
              }else if(response.status == "error")
                swal("Ocurrió un error al intentar eliminar el archivo, por favor inténtelo de nuevo");
            },
            error: function(){
              swal("Ocurrió un error al intentar eliminar el archivo, por favor inténtelo de nuevo");
            }
          });
      });
     }
    /*** Funcion para descargar archivos que estan en base64*/
    const downloadFileBase64 = (base64,name,container,extension) => {
      let linkSource = '';
      if(extension == "PDF")
        linkSource = `data:application/pdf;base64,${base64}`;
      else if(extension == "JPEG")
        linkSource = `data:image/jpeg;base64,${base64}`;
      const downloadLink = document.createElement("a");
      container.appendChild(downloadLink);
      extension = extension.toLowerCase();
      let fileName = `${name}.${extension}`;
      fileName = fileName.replace(/[&\/\\#,+()$~%'"*?<>{}]/g,"");
      var position = fileName.indexOf(' ');
      while (position >= 0)
      {
        fileName = fileName.replace(' ','_');
        position = fileName.indexOf(' ');
      }
      downloadLink.href = linkSource;
      downloadLink.download = fileName;
      downloadLink.click();
      downloadLink.remove();
    }
    /*** Funcion para eliminar caracteres especiales en un texto */
    const replaceCharactersSpecial = (text) => {
      text = text.replace(/[&\/\\#,+()$~%'"*?<>{}]/g,"");
      text = text.replace(/^\s+|\s+$/g, "");
      return text;
    }
    /*** Funcion para eliminar acentos en un texto*/
    const removeAccents = (str) => {
      return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    } 
    /*** Funcion para convertir un array en un string json*/
    const convertArrayToStringJson = (array) => {
      let json = "";
      if(array.length > 0){
        json += "{";
        let arrayForJson = [];
        array.forEach(function(element, index) {
          arrayForJson.push(`"${index}":${JSON.stringify(element)}`);
        });
        json += arrayForJson.join(',');
        json += "}";
      }
      return json;
    }
    /*** Funcion para descargar un archivo */
    const downloadFile = () => {
      downloadFileBase64(dataDownloadFile.base64,dataDownloadFile.titleFile,dataDownloadFile.tab,dataDownloadFile.typeFile);
    }
    /**
     * Funcion para generar el resumen trayectoria laboral del estudio JLL
     */
    const generateSummaryStudioJLL = (data,parameters,text) => {
      let summary = "";
      let values,typeValue,textReplace;
      for (let index = 0; index < 6; index++) {
        textReplace = text;
        let aplica = (index == 0) ? `RefLaboralAplicaValor`:`RefLaboralAplica${index}Valor`;
        let parameterFind = {
          'NombreJefeInmediato' : (index == 0) ? `RefLaboralUltimoJefeValor`:`RefLaboralUltimoJefe${index}Valor`,
          'RefLaboralEmpresa' : (index == 0) ? `RefLaboralEmpresaValor`:`RefLaboralEmpresa${index}Valor`,
          'FechaIngresoJefeInmediato' : (index == 0) ? `RefLaboralFechaIngrenoValor`:`RefLaboralFechaIngreno${index}Valor`,
          'FechaSalidaJefeInmediato' : (index == 0) ? `RefLaboralFechaSalidaValor`:`RefLaboralFechaSalida${index}Valor`,
          'PuestoJefeInmediato' : (index == 0) ? `RefLaboralPuestoJefeValor`:`RefLaboralPuestoJefe${index}Valor`,
          'PuestoCandidato' : (index == 0) ? `RefLaboralPuestoDesempenadoValor`:`RefLaboralPuestoDesempenado${index}Valor`
        }

        if(eachJson(aplica,data,'') == "Si"){
          parameters.forEach((parameter) => {
            if(parameter != ''){
              values = data[parameterFind[parameter]];
              if(values != undefined){
                typeValue = typeof data[parameterFind[parameter]];
                var position = text.indexOf(`:${parameter}`);
                while (position >= 0)
                {
                  values = (typeValue == "object") ? values[2] :values;
                  if(parameter == "FechaIngresoJefeInmediato" || parameter == "FechaSalidaJefeInmediato")
                    values = getFormatDate(values,2);
                  textReplace= textReplace.replace(`:${parameter}`,values);
                  position = textReplace.indexOf(`:${parameter}`);
                } 
              }
            }
          });
         summary = summary + textReplace;   
        }       
      }
      return summary;
    }
    /**
     * Funcion para dar formato a una fecha con formato yyyy-mm-dd
     * parametros:
     *  date: string
     *  typeFormat: int, la opcion uno es igual a (dd de month de anio), la opcion dos es igual a (month de anio) 
     * return string
     */
    const getFormatDate = (date,typeFormat) => {
      let anio = date.substring(0, 4);
      let month = date.substring(5, 7);
      let day = date.substring(8, 10);
      switch (typeFormat) {
        case 1: date = `${day} de ${getMonth(month)} de ${anio}`;              
          break;
        case 2: date = `${getMonth(month)} de ${anio}`;          
          break;
      }
      return date;
    }

    /*** Funcion para obtener el mes en letra * parametro:*  numberMonth: string* return string*/
    const getMonth = (numberMonth) => {
      let letterMonth = "";
      switch (numberMonth) {
        case '01': letterMonth = "Enero"         
          break;
        case '02': letterMonth = "Febrero"
          break;
        case '03': letterMonth = "Marzo"          
          break;
        case '04': letterMonth = "Abril"
          break;
        case '05': letterMonth = "Mayo"          
          break;
        case '06': letterMonth = "Junio"
          break;
        case '07': letterMonth = "Julio"          
          break;
        case '08': letterMonth = "Agosto"
          break;
        case '09': letterMonth = "Septiembre"          
          break;
        case '10': letterMonth = "Octubre"
          break;
        case '11': letterMonth = "Noviembre"          
          break;
        case '12': letterMonth = "Diciembre"
          break;
      }
      return letterMonth;
    }
    $(document).ready(function() {
        var EstatusEval = '{{$EstatusEval}}';
        var typeUser = "{{ Auth::user()->tipo }}";
        if(typeUser  !='f'){
          if(EstatusEval == "Cerrado" || EstatusEval == "Cancelado")
            $("a[href='#Analista']").click();   
        } else if(typeUser =='f'){
          $("a[href='#Estudio']").click();   
        }          
        $('.panel-body').click();
        if(typeUser != "c"){
          @if($Notificada == '' && $showDialogProgamacionEjecucion)
              showDialogProgamacionEjecucion();
          @endif
        }
        const NombrePlantilla = '{{$NamePlantilla}}';
        saveInfoLocalStoreOfSummary(NombrePlantilla);
      });
      

    
</script>
@endsection