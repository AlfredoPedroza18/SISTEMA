@extends('layouts.masterMenuView')

@section('section')

<style media="screen">
  .ocultar {
    display: none;
  }
  .ver {
    display: block;
  }
</style>
<div class="content">
  <ol class="breadcrumb ">
    <li><a href="{{route('sig-erp-ese::ListadoOS.create')}}">Editar Orden de Servicio</a></li>
    <li>Editar Orden de Servicio</li>
  </ol>
  <h1 class="page-header text-center">Editar Orden de Servicio</h1>

  <div class="modal fade " id="cerrar" tabindex="-1" role="dialog" aria-labelledby="cerrar" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
          <h5 class="modal-title" id="modal-title"> Cerrar OS</h5>
        </div>
        <form method="GET" action="{{ url('updateC')}}">
          <div class="modal-body">
            <input type="hidden" id="IdServicioOS" name="IdServicioOS" value="{{$datos[0]}}">
            <input type="hidden" id="FechaSolicitud" name="FechaSolicitud" value="{{$datos[4]}}">
            <input type="hidden" id="PrecioFacturable" name="PrecioFacturable" value="{{$datos[7]}}">
            <input type="hidden" id="CostoM" name="CostoM" value="{{$datos[11]}}">
            <label for="fechaL" class="col-form-label">Fecha:</label>
            <div class="col-md-13">
              <input class="form-control" type="datetime-local" name="fechacierre" value="<?php echo date('Y-m-d') . 'T' . date('H:i'); ?>" required>
            </div>
            <label for="MontoL" class="col-form-label">Monto del Servicio:</label>
            <div class="col-md-13">
              <div class="input-group">
                <span class='input-group-addon'>$</span>
                <input class="currency input-group form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' name="precioM" value="{{$datos[7]}}" required>
              </div>
            </div>
            <label for="ComentarioL" class="col-form-label">Comentario:</label>
            <div class="col-md-13">
              <textarea maxlength="100" class="form-control" name="comentario" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button id="Guardar" type="submit" class="btn btn-warning">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <div class="modal fade " id="cancelar" tabindex="-1" role="dialog" aria-labelledby="cancelar" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
          <h5 class="modal-title" id="modal-title"> Cancelar OS</h5>
        </div>
        <!-- <form > -->
        <form method="GET" action="{{ url('updateC')}}">
          <div class="modal-body">
            <input type="hidden" id="IdServicioOS" name="IdServicioOS" value="{{$datos[0]}}">
            <input type="hidden" id="FechaSolicitud" name="FechaSolicitud" value="{{$datos[4]}}">
            <input type="hidden" id="PrecioFacturable" name="PrecioFacturable" value="{{$datos[7]}}">
            <input type="hidden" id="CostoM" name="CostoM" value="{{$datos[11]}}">
            <label for="fechaL" class="col-form-label">Fecha:</label>
            <div class="col-md-13">
              <input class="form-control" type="datetime-local" name="fechacancelacion" value="<?php echo date('Y-m-d') . 'T' . date('H:i'); ?>" required>
            </div>
            <label for="CostoL" class="col-form-label">Costo del Servicio:</label>
            <div class="col-md-13">
              <div class="input-group">
                <span class='input-group-addon'>$</span>
                <input class="currency input-group form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' id="costoC" name="costoC" value="{{$datos[11]}}" required>
              </div>
            </div>
            <label for="MotivoL" class="col-form-label">Motivo de Cancelación:</label>
            <div class="col-md-13">
              <textarea maxlength="100" class="form-control" name="comentarioCancelacion" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button id="Guardar" type="submit" class="btn btn-warning">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>

  <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
      <h4 class="panel-title">Editar Orden de Servicio</h4>
    </div>
    <div class="panel-body">
      <div class="col-sm-3">
        <h5>Acceder a: <a href="{{route('sig-erp-ese::ListadoOS.show', $datos[16] )}}" style="text-decoration: none;color:#000;"> {{$datos[15]}} </a> </h5>
      </div>
      <div class="input-group-btn col-md-3 col-md-offset-6 text-right">
        @if (($datos[3] != 'Cancelado') && ($datos[3] != 'Cerrado'))
       
        <a class="btn btn-small btn-warning" href="#" data-toggle="modal" data-target="#cancelar" data-placement="top" title="Cancelar OS" data-original-title="Cancelar OS" onclick="showmodal('CancelarOS');">
          Cancelar OS
        </a>
        
        @else
        <a class="btn btn-small btn-warning" href="#" data-toggle="modal" data-target="" data-placement="top" title="Cancelar OS" data-original-title="Cancelar OS" disabled="disabled">
          Cancelar OS
        </a>
        @endif
        @if (($datos[3] != 'Cancelado') && ($datos[3] != 'Cerrado'))
        
        <a class="btn btn-small btn-warning" href="#" data-toggle="modal" data-target="#cerrar" data-placement="top" title="Cerrar OS" data-original-title="Cerrar OS" onclick="showmodal('CerrarOS');">
          Cerrar OS
        </a>
        
        @else
        <a class="btn btn-small btn-warning" href="#" data-toggle="modal" data-target="" data-placement="top" title="Cerrar OS" data-original-title="Cerrar OS" disabled="disabled">
          Cerrar OS
        </a>
        @endif
        <!-- <button type="button" class="btn btn-small btn-warning">Cancelar</button>
                  <button type="button" class="btn btn-small btn-warning">Cerrar</button> -->
      </div>

      <br><br><br>



      {!! Form::model($datos[0],
      ['route'=>['sig-erp-ese::ListadoOS.update',$datos[0]],
      'id'=>'form-edit-tiposservicio','method'=>'PUT','files'=>'true'])
      !!}
      <div class="row">
        <div class="form-group col-md-3">
          <label>Modulo</label>
          <input class="form-control" type="text" name="modulo" value="{{$datos[2]}}" readonly>
        </div>
        <div class="form-group col-md-3">
          <label>Cliente</label>
          <input class="form-control" type="text" name="cloente" value="{{$datos[1]}}" readonly>
        </div>

        <div class="form-group col-md-3">
          <label>Estatus</label>
          <input class="form-control" type="text" name="estatus" value="{{$datos[3]}}" readonly>
        </div>

        <div class="form-group col-md-3">
          <label>Fecha Solicitud</label>
          <input class="form-control" type="datetime" name="fecha" value="{{$datos[4]}}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label>Fecha Cierre</label>
          <input class="form-control" type="datetime" name="cierre" value="{{$datos[5]}}" readonly>
        </div>
        <div class="form-group col-md-3">
          @permission('ese.ordenes.servicio')
          <label>Costo del Servicio</label>
          <div class="input-group">
            <span class='input-group-addon'>$</span>
            @if (($datos[3] != 'Cancelado') && ($datos[3] != 'Cerrado'))
            <input class="currency input-group  form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' id="costo" name="costo" value="{{$datos[11]}}">
            @else
            <input class="currency input-group  form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' name="costo" value="{{$datos[11]}}" readonly>
            @endif
          </div>
          @endpermission
        </div>
        <div class="form-group col-md-4">
          @permission('ese.ordenes.servicio')
          <label>Precio Facturable</label>
          <div class="input-group">
            <span class='input-group-addon'>$</span>
            @if (($datos[3] != 'Cancelado') && ($datos[3] != 'Cerrado')) <!--Se agrego una validacion para desactivar los campos de cobro y factura -->
            <input class="currency form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' name="precio" value="{{$datos[7]}}">
            @else
            <input class="currency form-control" type="number" min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' name="precio" value="{{$datos[7]}}" readonly>
            @endif
          </div>
          @endpermission
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          @permission('ese.ordenes.servicio')
          <label>Numero Factura</label>
          <input class="form-control" type="numero" name="numeroFactura" value="{{$datos[8]}}">
          @endpermission
        </div>

        <div class="form-group col-md-6">
          @permission('ese.ordenes.servicio')
          <label>Documento</label>
          <input class="form-control" type="file" name="documento" id="documento" accept="application/pdf">
          @endpermission
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          @permission('ese.ordenes.servicio')
          <label>Estatus Cobro</label>
          @if ($datos[12] != 'Pendiente')
          <select class="form-control" name="cobro" id="cobro">
            <option id="Pendiente" @if ($datos[12]=='Pendiente' ) selected @endif disabled value="Pendiente">Pendiente</option>
            <option id="Facturado" @if ($datos[12]=='Facturado' ) selected @endif value="Facturado">Facturado</option>
            <option id="Cobrado" @if ($datos[12]=='Cobrado' ) selected @endif value="Cobrado">Cobrado</option>
          </select>
          @else
          <select class="form-control" name="cobro" id="cobro">
            <option id="Pendiente" @if ($datos[12]=='Pendiente' ) selected @endif value="Pendiente">Pendiente</option>
            <option id="Facturado" @if ($datos[12]=='Facturado' ) selected @endif value="Facturado">Facturado</option>
            <option id="Cobrado" @if ($datos[12]=='Cobrado' ) selected @endif value="Cobrado">Cobrado</option>
          </select>
          @endif
          <input type="hidden" id="estatus" value="{{$datos[12]}}">
          @endpermission
        </div>
        <div class="form-group col-md-4">
          <label>Fecha Factura</label><input class="form-control" type="date" value="{{$datos[13]}}" id="facturaF" name="facturaF">
        </div>
        <div class="form-group col-md-4">
          <label>Fecha Cobro</label><input class="form-control" type="date" value="{{$datos[14]}}" id="CobroF" name="CobroF">
        </div>
      </div>
      @permission('ese.ordenes.servicio')
      <div class="input-group-btn col-md-3 col-md-offset-11 text-right">
        <input type="submit" class="btn btn-success" value="Guardar" onclick="guardar();" />
      </div>
      @endpermission
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
{!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}
@endsection

<script type="text/javascript">
  let valorAnt = '';
  function fechas(val) {
    // console.log("val: "+val);
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if (dia < 10)
      dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
      mes = '0' + mes //agrega cero si el menor de 10
    if ($("#estatus").val() != "Cobrado") {
      if (val == "Facturado") {
        $("#CobroF").attr('readonly', true);
        $("#facturaF").removeAttr('readonly');
        if ($("#facturaF").val() == "") {
          $("#facturaF").val(ano + "-" + mes + "-" + dia);
        }
      } else if (val == "Cobrado") {
        $("#facturaF").attr('readonly', true);
        $("#CobroF").removeAttr('readonly');
        if ($("#CobroF").val() == "") {
          $("#CobroF").val(ano + "-" + mes + "-" + dia);
        }
      } else if (val == "Pendiente") {
        if ($("#estatus").val() == "Facturado" && valorAnt == '') {
          $("#Facturado").attr('selected', true);
        } else {
          $("#" + valorAnt).attr('selected', true);
        }
      }
    } else {
      $("#Cobrado").attr('selected', true);
    }



    if (val != "Pendiente") {

      valorAnt = val;

    }







  }
</script>