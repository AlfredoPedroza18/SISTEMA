<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  
  <title>Plantilla | {{ isset( $plantilla ) ? $plantilla->nombre : '1000'  }}</title>
  {!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
  <style>

* { margin: 0; padding: 0; }
body { font: 14px/1.4 Arial, serif; }
#page-wrap { width: 800px; margin: 0 auto; }

textarea { border: 0; font: 14px Arial, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding: 5px; }

#encabezado { 
    height: 15px; 
    width: 100%; 
    margin: 20px 0; 
    background: {{ isset( $plantilla ) ? $plantilla->encabezado_fondo : '#eaeaea' }}; 
    text-align: center; 
    color: {{ isset( $plantilla ) ? $plantilla->encabezado_letra : '#aaa' }}; 
    font: bold 15px Helvetica, Sans-Serif; 
    text-decoration: uppercase; 
    letter-spacing: 20px; 
    padding: {{ $encabezadoPadding }} {{-- 8px 0px; --}} }

#address { width: 250px; height: 150px; float: right; color: {{ isset( $plantilla ) ? $plantilla->letra_general : '#balck' }};  }
#customer { overflow: hidden; }

#logo { text-align: right; float: left; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
/* #logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; } */
#logoctr { display: none; }
#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
#logohelp input { margin-bottom: 5px; }
.edit #logohelp { display: block; }
.edit #save-logo, .edit #cancel-logo { display: inline; }
.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
#customer-title { 
    font-size: 15px; 
    font-weight: normal; 
    float: left; 
    width: 450px; 
    height: 90px;
    color: {{ isset( $plantilla ) ? $plantilla->letra_general : '#eaeaea' }};
  }

#meta { margin-top: 1px; width: 300px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { 
  text-align: left; 
  background: {{ isset( $plantilla ) ? $plantilla->fecha_total_fondo : '#eaeaea' }}; 
}

#total-amount{ color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }};  }
#total-description{ color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }};  }
#meta td textarea { width: 100%; height: 20px; text-align: right; }
#identity {
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : '#eaeaea' }};
}

#paid{ color: {{ isset( $plantilla ) ? $plantilla->letra_general : '#eaeaea' }}; }
#detail-id-description{ color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }}; }
#detail-date-invoice{ color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }}; }
#date{ color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }}; }
#detail-id-font{ color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }}; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: {{ isset( $plantilla ) ? $plantilla->encabezado_detalle_fondo : '#eaeaea' }}; }
#items th { color: {{ isset( $plantilla ) ? $plantilla->encabezado_detalle_letra : '#eaeaea' }}; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { 
    border: 0; 
    vertical-align: top; 
    color: {{ isset( $plantilla ) ? $plantilla->letra_general : '#eaeaea' }};
  }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; height: 100px; text-align: justify; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { 
  background: {{ isset( $plantilla ) ? $plantilla->fecha_total_fondo : '#eaeaea' }}; 
  color: {{ isset( $plantilla ) ? $plantilla->fecha_total_letra : '#eaeaea' }}; 
}
#items td.blank { border: 0; }

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center; height: 80px; text-align: justify;}

textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
.img-logo-empresa{ max-width: 65%; max-height: auto; float: left;}
.item-row{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#identity{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#customer-title{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#customer{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#encabezado-detail{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#items td.total-value{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#items td.total-line{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
#items tr.item-row td{
  color: {{ isset( $plantilla ) ? $plantilla->letra_general : 'red' }}
}
  </style>
  {!! Html::style('assets/cotizaciones/css/print.css') !!}

</head>

<body>

  <div id="page-wrap">

    <textarea name="encabezado" id="encabezado">{{ isset($plantilla) ? $plantilla->encabezado : 'TITULO DE LA COTIZACIÓN' }}</textarea>
    
    <div id="identity">

            <div id="logo">

              {{--
              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              --}}
              @if( isset( $plantilla ) )
                @if( $plantilla->logo != '' )
                {!! Html::image($plantilla->logo,'',["class"=>"img-logo-empresa"]) !!}      
                @else
                {!! Html::image('company-logos/company-logo-default.png','',["class"=>"img-logo-empresa"]) !!}
                @endif
              @else
                {!! Html::image('company-logos/company-logo-default.png','',["class"=>"img-logo-empresa"]) !!}
              @endif
            </div>

            <div style="text-align: right;">
              @if( isset( $cotizacion ) )
                {{ $cotizacion->cliente->nombre_comercial }}<br> 
                {{ $cotizacion->cliente->direccion_completa }}<br>
                {{ $cotizacion->cliente->complemento_direccion }}<br>
                @if( $cotizacion->cliente->contacto_principal() != null )
                {{ $cotizacion->cliente->contacto_principal()->nombre_contacto() }}
                @endif
              @else
              <textarea id="address">Luis Damián Tapia Guerrero 123 Nuew York Appleville, WI 53719 Teléfono: (555) 555-5555</textarea>
             @endif
            </div>
            
    
    </div>
    
    <div style="clear:both"></div>
    
    <div id="customer">
            @if( isset( $cotizacion ) )
              {{ $cotizacion->cn->direccion_completa }}<br>
              {{ $cotizacion->cn->complemento_direccion }}<br>
              Teléfono {{ $cotizacion->cn->telefono }}<br>
              {{ $cotizacion->ejecutivo->nombre_ejecutivo }}<br> 
            @else
              <textarea id="customer-title">Gen-T especialista en soluciones empresariales</textarea>
            @endif
            

            <table id="meta">
                <tr>
                    <td class="meta-head"><span id="detail-id-description">Consecutivo #</span></td>
                    <td><textarea id="detail-id-font">{{ isset( $cotizacion ) ? $cotizacion->id : '1000' }}</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head"><span id="detail-date-invoice">Fecha</span></td>
                    <td><textarea id="date">{{ isset($cotizacion) ? $cotizacion->fecha_cotizacion->format('d-m-Y') : \Carbon\Carbon::now()->format('d/m/Y') }}</textarea></td>
                </tr>

            </table>
    
    </div>
    
    <table id="items">
    
      <tr id="encabezado-detail">
          <th>Item</th>
          <th>Descripción</th>
          <th>Costo Unitario</th>
          <th>Cantidad</th>
          <th>Precio</th>
      </tr>
      @if( isset( $cotizacion ) )
      @foreach ( $cotizacion->generales as $item )
        <tr class="item-row">
          <td class="item-name">
            <div class="delete-wpr">
              {{-- <textarea>{{ $item->servicio->nombre }}</textarea>--}}
              {{ $item->servicio->nombre }}
            </div>
          </td>

          <td class="description">
            {{ $item->servicio->descripcion }}
            {{--<textarea>{{ $item->servicio->descripcion }}</textarea>--}}
          </td>
          <td style="text-align: right;">${{ number_format($item->costo_unitario,2) }}</td>
          <td style="text-align: center;">{{ $item->cantidad }}</td>
          <td style="text-align: right;">${{ number_format($item->subtotal,2) }}</td>

          {{--
          <td><textarea class="cost" style="text-align: right;">${{ number_format($item->costo_unitario,2) }}</textarea></td>
          <td><textarea class="qty" style="text-align: center;">{{ $item->cantidad }}</textarea></td>
          <td><span class="price" style="text-align: right;">${{ number_format($item->subtotal,2) }}</span></td>
          --}}

        </tr>
      @endforeach

      @else
      @for ($i = 0; $i < 2; $i++)
        <tr class="item-row">
          <td class="item-name">
            <div class="delete-wpr">
              <textarea>Consultoría</textarea>
            </div>
          </td>

          <td class="description">
            <textarea>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur.</textarea>
          </td>
          <td><textarea class="cost">$20,000.00</textarea></td>
          <td><textarea class="qty">1</textarea></td>
          <td><span class="price">$20,000.00</span></td>
        </tr>
      @endfor
      @endif
      
      
      <tr id="hiderow">
        <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
      </tr>
      
      <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Subtotal</td>
          <td class="total-value" style="text-align: right;">
            <div id="subtotal">${{ isset( $cotizacion ) ? number_format($cotizacion->subtotal,2) : '10.00' }}</div>
          </td>
      </tr>
      @if( isset( $cotizacion ) )
      @if( $cotizacion->descuento !== 0.00 )
      <tr>

          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Descuento</td>
          <td class="total-value" style="text-align: right;">
            <div id="total">${{ isset( $cotizacion ) ? number_format($cotizacion->monto_descuento,2) : '10.00' }}</div>
          </td>
      </tr>
      @endif
      @endif
      <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Impuesto ( {{ isset( $cotizacion ) ? $cotizacion->iva : '16'}} % )</td>
          <td class="total-value" style="text-align: right;">
            <textarea id="paid" style="text-align: right;">${{ isset( $cotizacion ) ? number_format($cotizacion->iva_monto ,2) : '10.00' }}</textarea>
          </td>
      </tr>
      <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line balance"><span id="total-description">Total</span></td>
          <td class="total-value balance" style="text-align: right;">
            <div id="total-amount"  class="due">${{ isset( $cotizacion ) ? number_format($cotizacion->total,2) : '10.00' }}</div>
          </td>
      </tr>
    
    </table>
    
    <div id="terms">
      <h5></h5>
      <textarea name="terminos">{{ isset( $plantilla ) ? $plantilla->terminos : 'Aqui se escriben los términos, condiciones u observaciones.' }}</textarea>
    </div>
  
  </div>
  
</body>
<script>
  
  @if( isset( $cotizacion ) )
    window.print();
  @endif
  
</script>
</html>