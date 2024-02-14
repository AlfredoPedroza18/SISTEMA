@extends('layouts.masterMenuView')
@section('section')

<div id="content" class="content">
    <div class="panel panel-inverse " data-sortable-id="ui-widget-14" data-init="true">
      <div class="panel-heading hidden-print">
          <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          </div>
          <h4 class="panel-title text-center table-responsive ">Cotizador<strong> 
          </strong></h4>
      </div>
      <div class="panel-body">
          <form  id="frm-cotizador-general" data-validate="parsley" action="{{ url('cotizador_general') }}" method="POST">  
            {{ csrf_field() }}
            <div class="row hidden-print">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="form-group" id="cotizador-id-cliente">
                        <label>Cliente</label><br>
                        <div class="input-group">
                            <select class="form-control" name="id-cliente" id="id-cliente">
                                <option value='-1'>Selecciona un cliente...</option>
                                @foreach ( $clientes as $cliente )
                                  <option   value='{{$cliente->id}}'>
                                              {{ $cliente->nombre_comercial}}
                                  </option>
                                @endforeach
                            </select>
                            <span class="input-group-addon"><i class="fa fa-1x fa-building"></i></span>
                        </div>
                    </div>
                    <div class="form-group" id="cotizador-id-servicosTipo">
                        <label>Tipos de servicio</label><br>
                        <div class="input-group">
                            <select class="form-control" name="id-servicosTipo" id="id-servicosTipo">
                                <option value='-1'>Selecciona un tipo de servicio...</option>
                                @foreach ( $servicosTipo as $servicosTip )
                                  <option   value='{{$servicosTip->id}}'>
                                              {{ $servicosTip->servicio}}
                                  </option>
                                @endforeach
                            </select>
                            <span class="input-group-addon"><i class="fa fa-1x fa-building"></i></span>
                        </div>
                    </div>
                </div>                  
                <div class="col-md-1 ">
                    <br>
                    <button id="btn-add-service" type="button" class="btn btn-primary btn-circle">
                      <i class="fa fa-plus"></i>
                    </button>
                    {{--  
                    <span class="hidden-print">
                        <a href="javascript:;" onclick="window.print()" class="btn  btn-success m-b-10" data-toggle="tooltip" title="Print"><i class="fa fa-print m-r-5" ></i> Print</a>
                    </span>
                    --}}
                </div>
              </div>
              <!--end row -->              
              <div class="jumbotron" id="plantillas">
                  <div class="container" id="container-cotizacion">
                    <div class="row">
                        <div class="col-md-1">
                            <div>
                                <h5 class="text-right">
                                    Descuento:
                                </h5>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                              <input type="text" class="form-control" name="descuento-general-cotizado" id="descuento-general-cotizado">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>
                              <input type="checkbox" name="porcentaje-general-cotizado" id="porcentaje-general-cotizado">
                              <input type="hidden" name="tiene_porcentaje" id="tiene-porcentaje" value="0">
                              <small>Porcentaje</small>
                            </label>
                        </div>
                        <div class="col-md-1">
                            <div>
                                <h5 class="text-right">
                                    Impuesto:
                                </h5>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                              <select name="iva-total-general-cotizado" class="form-control" id="iva-total-general-cotizado">
                                @foreach ($impuestos as $impuesto)
                                  <option value="{{ $impuesto->tasa }}">{{ $impuesto->nombre }} - ( {{ $impuesto->tasa }} %)</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background: black; font-weight: bold; padding: 20px;" id="detalle-cotizacion">
                      <div class="col-md-3">
                            <div>
                                <h5 style="color: white;">
                                    Subtotal: $ <span id="subtotal-cotizado">0.00</span>
                                </h5>
                                <input type="hidden" name="subtotal-general-cotizado" id="subtotal-general-cotizado" value="0.00">
                                <hr>
                            </div>
                      </div>
                      <div class="col-md-3">
                        <h5 style="color: white;">
                          Descuento: $ <span id="descuento-total-cotizado">0.00</span>
                        </h5>
                        <input type="hidden" name="monto-descuento-total-cotizado" id="monto-descuento-total-cotizado" value="0.00">
                      </div>
                      <div class="col-md-3">
                        <h5 style="color: white;">
                          Impuesto: $ <span id="impuesto-total-cotizado">0.00</span>
                        </h5>
                        <input type="hidden" name="monto-impuesto-cotizado" id="monto-impuesto-cotizado" value="0.00">
                      </div>
                      <div class="col-md-3">
                          <div>
                              <h5 style="color: white;">
                                  Total: $ <span id="total-cotizado">0.00</span>
                                  <input type="hidden" name="total-general-cotizado" id="total-general-cotizado">
                              </h5>
                              <hr>
                          </div>
                      </div>
                    </div>
                    <hr>
                    <div  class="row">
                      <div class="col-md-12">      
                        <table class="table table-stripped" id="cotizacion-table">
                          <thead>
                            <tr>
                              <th>Producto</th>
                              <th>Costo unitario</th>
                              <th>Cantidad</th>
                              <th>Subtotal</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success btn-circle btn-lg pull-right" id="btn-save-cotizacion">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                  </div>
                  </div>
              </div>
              <!--end row-->
              </form>
          </div><!-- end panel body-->
      </div><!-- end panel-->
    </div><!-- end content-->


<div id="modal-cotizacion" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-money fa-2x"></i> Cotizador</h4>
      </div>
      <div class="modal-body" id="op">
          <table class="table table-stripped" id="cotizacion-table-modal">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Costo unitario</th>
                <th>Cantidad</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
           
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('js-base')

@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/select2/dist/js/select2.min.js')!!}
{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}
{!! Html::script('assets/js/sweetalert.min.js') !!}


 {!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
  {!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
  {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}


{!! Html::script('assets/plugins/parsley/dist/parsley.js') !!}

<script type="text/javascript">

var showModalCotizacion = function()
{
    $('#modal-cotizacion').modal({
        backdrop:'static',
        keyboard: false
    });
}

var totalCotizado = function()
{
    let subtotal      = 0.0;
    let total         = 0.0;
    let itemsSubtotal = $('.add-service-subtotal');
    let is_porcentaje = $('#porcentaje-general-cotizado').is(":checked");
    let descuento     = $('#descuento-general-cotizado').val();
    let iva           = $('#iva-total-general-cotizado').val();
    let iva_total     = 0.0;
    let monto_desc    = 0.0;

    descuento = isNaN( descuento ) ? 0 : descuento;

    $.each( itemsSubtotal, function( key , item ){
        subtotal += parseFloat(item.value);
    });

    monto_desc = getValorDescuento( is_porcentaje, subtotal, descuento );
    total      = subtotal - monto_desc;
    iva_total  = total * ( iva/100 ); 
    total      =  total * ( 1 + iva/100 );

    $('#subtotal-cotizado').html( number_format(subtotal,2) );
    $('#subtotal-general-cotizado').val( subtotal ); //luis
    $('#total-general-cotizado').val( total );
    $('#total-cotizado').html( number_format(total,2) );
    $('#impuesto-total-cotizado').html( number_format(iva_total,2) );
    $('#monto-impuesto-cotizado').val( iva_total );
    $('#descuento-total-cotizado').html( number_format(monto_desc,2) );
    $('#monto-descuento-total-cotizado').val( monto_desc );
}

var getValorDescuento = function( porcentaje, subtotal, descuento )
{
  let total = 0.0;

  if( porcentaje )
  {
    total = ( ( descuento/100 ) * subtotal );    
    $('#tiene-porcentaje').val(1);
  }else{
    total = descuento ;
    $('#tiene-porcentaje').val(0);
  }

  return total 

}

var deleteRow = function( element )
{
    $(element).parent().parent().remove();
    totalCotizado();
    desactivarBtnCotizar();
}

var desactivarBtnCotizar = function()
{
    let sizeServices = $('.row-service').length;
    if( sizeServices <= 0 )
    {
        $('#btn-save-cotizacion').attr("disabled",true);
        $('#detalle-cotizacion').fadeOut();
    }else{
        $('#btn-save-cotizacion').attr("disabled",false);
        $('#detalle-cotizacion').fadeIn();
    }
}

var addServiceCotizacion = function( id,service,price,quantity,iva )
{



    let rows = $('.add-service-id').length; 
    let ivaReal = iva == 0 ? 1 : ( 1 + iva/100 );

    
    if( quantity > 0 )
    {
      console.log("si llegamos por el cuatiti");
        $('#cotizacion-table > tbody').append(`
                <tr class="row-service">
                    <td>
                        <input name="cotizacion-detail[${ rows }][id_service]" type="hidden"  value="${ id }">
                        <input name="cotizacion-detail[${ rows }][quantity]" type="hidden"  value="${ quantity }">
                        <input name="cotizacion-detail[${ rows }][price]" type="hidden"  value="${ price }">
                        <input name="cotizacion-detail[${ rows }][subtotal]" type="hidden"  value="${ (price * quantity) }">
                        <input name="cotizacion-detail[${ rows }][iva]" type="hidden"  value="${ iva }">
                        <input name="cotizacion-detail[${ rows }][total]" type="hidden"  value="${ (price * quantity) * ivaReal  }">
                        <input type="hidden" class="add-service-id">
                        ${ service }
                    </td>
                    <td> $ ${ number_format(price,2) }</td>
                    <td>${ quantity }</td>
                    <td>
                        $ ${ number_format( (price * quantity),2 ) }
                        <input type="hidden" class="add-service-subtotal" value="${price * quantity}" />
                    </td>
                    <td>
                        <button type="button" onclick="deleteRow( this )" class="btn btn-danger btn-circle btn-sm">
                          <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);

            swal({

              title: "<h3>¡Producto Agregado!</h3> ",

              html: true,

              type: "success",

              confirmButtonText: "OK"

            });

        totalCotizado();
        desactivarBtnCotizar();
    }
    
}

var number_format = function (amount, decimals) {
    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
    decimals = decimals || 0; // por si la variable no fue fue pasada
    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);
    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);
    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;
    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
};

var confirmSaveCotizacion = function()
{
    swal({
          title: "<h2>¿Deseas generar la cotización?</h2> ",
          type: "info",
          html:true,
          showCancelButton: true,
          cancelButtonColor: '#ef9d1e',
          cancelButtonText: 'Cancelar',
          confirmButtonColor: "#ef9d1e",
          confirmButtonText: "Guardar",
          
          closeOnConfirm: false
    },
    function(isConfirm){
      if (isConfirm) {
        $('#frm-cotizador-general').submit();
        swal({

          title: "<h3>¡Cotización Generada!</h3> ",

          html: true,

          type: "success",

          confirmButtonText: "OK"

        });
      }     
    }); 
    
}
      
    function datosTabl(i){

        
            let indice   = i;
            let id       =$('#id-service-cotizacion'+i+"").val();
            let service  =$('#service-name-cotizacion'+i+"").val();
            let price    =$('#service-price-cotizacion'+i+"").val();
            let iva      =$('#iva-service-cotizacion'+i+"").val();
            let quantity =$('#qty-service-cotizacion'+i).val();

            console.log(quantity);
            addServiceCotizacion( id,service,price,quantity,iva );
    }

$(document).ready(function(){

      $('#cotizacion-table-modal').DataTable();
      $('#btn-save-cotizacion').attr('disabled',true)
      $('#btn-save-cotizacion').click(function(){
        confirmSaveCotizacion();
      });
      $('#detalle-cotizacion').hide();

      

      $('#btn-add-service').hide();
      $('#container-cotizacion').hide();


      $('#id-servicosTipo').change(function(){
          var tipo_cliente         = $('#id-cliente').val();
          

          if( tipo_cliente != -1 && $('#id-servicosTipo').val() != -1){
            $('#btn-add-service').fadeIn();
            $('#container-cotizacion').fadeIn(2000);
            
            llenarTrabla()

          }else{
            $('#btn-add-service').fadeOut();
            $('#container-cotizacion').fadeOut(2000);
         


          }

          
      });

      $('#id-cliente').change(function(){
          var tipo_cliente         = $('#id-cliente').val();
          

          if( tipo_cliente != -1 && $('#id-servicosTipo').val() != -1){
            $('#btn-add-service').fadeIn();
            $('#container-cotizacion').fadeIn(2000);
          }else{
            $('#btn-add-service').fadeOut();
            $('#container-cotizacion').fadeOut(2000);
           

          }

          
      });

    $('#btn-add-service').click(function(){
        showModalCotizacion();
    });

    $('#descuento-general-cotizado').blur(function(){      
        totalCotizado();
    });

    $('#porcentaje-general-cotizado').change(function(){
      totalCotizado();
    });

    $('#iva-total-general-cotizado').change(function(){
      totalCotizado();
    });


    
    
  
    });
    
    function llenarTrabla (){

      var servicio_tipos = $("#id-servicosTipo").val()

      $.ajax({
          url:"{{ url('productos') }}"+"/"+servicio_tipos,
          type:"GET",
          success: function(response){
           

            $("#op").html("");


            var tablaLleno = "<table class='table table-stripped' id='cotizacion-table-modal'>"+
            "<thead>"+
             " <tr>"+
                "<th>Producto</th>"+
                "<th>Descripción</th>"+
                "<th>Costo unitario</th>"+
                "<th>Cantidad</th>"+
                "<th>Acción</th>"+
              "</tr>"+
            "</thead> <tbody>;"

            for(let i=0; i<response.length;i++){
            
              tablaLleno += "<tr><td>"+
                    response[i].nombre +
                    "<input type='hidden' id='id-service-cotizacion"+i+"' value='"+response[i].id+"'>"+
                    "<input type='hidden' id='service-name-cotizacion"+i+"' value='"+ response[i].nombre +"'>"+
                  "</td><td>"+response[i].descripcion+ "</td><td>"+
                    response[i].costo_unitario.toLocaleString("en")+
                    "<input type='hidden' id='service-price-cotizacion"+i+"' value='"+ response[i].costo_unitario+"'>"+

                  "</td>"+
                  
                  "<td>"+
                     " <input type='text' class='form-control' id='qty-service-cotizacion"+i+"' value='0'>"+
                  "</td>"+
                  "<td>"+
                    "<button class='btn btn-primary btn-circle btn-sm add-service-cotizacion' onclick = datosTabl("+i+")>"+
                     " <i class='fa fa-check'></i>"+
                   " </button>"+
                 " </td>"+
                "</tr>";

              
            
            }

            tablaLleno += "</tbody> <table>"

            $("#op").html(tablaLleno);

            $('#cotizacion-table-modal').DataTable();
          },
          error:function(){
            
          }
        });
    }


</script>
@endsection
