<style>
      #items{
        color: #385b9a;
        align-items: center;
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        width: 100%;
      }

      th{
        border-top: 1px solid #5b83cb;
        border-bottom: 1px solid #5b83cb;
      }

      #totalCot td {
        border-top: 1px double #5b83cb;
        border-bottom: 1px solid #5b83cb;
      }
</style>

<table id="items" >
    
      <tr id="encabezado-detail">
          <th>Item</th>
          <th style="width: 300px;">Descripción</th>
          <th>P.U</th>
          <th>CANT.</th>
          <th>TOTAL</th>
      </tr>
      @if( isset( $cotizacion ) )
      @foreach ( $cotizacion->generales as $item )
        <tr class="item-row">
          <td class="item-name">
              {{ $item->servicio['nombre'] }}
          </td>
          <td class="description">
            {{ $item->servicio['descripcion'] }}
          </td>
          <td style="text-align: right;">${{ number_format($item->costo_unitario,2) }}</td>
          <td style="text-align: center;">{{ $item->cantidad }}</td>
          <td >${{ number_format($item->subtotal,2) }}</td>
        </tr>
      @endforeach

      <tr>
        <td colspan="5"> &nbsp; </td>
      </tr>
      @endif

      <tr>
          <td colspan="2" class="blank"> &nbsp;  </td>
          <td class="total-line" style="text-align: right;">Subtotal</td>
          <td>&nbsp;</td>
          <td class="total-value" >
            <div id="subtotal">${{ isset( $cotizacion ) ? number_format($cotizacion->subtotal,2) : '10.00' }}</div>
          </td>
      </tr>
      @if( isset( $cotizacion ) )
      @if( $cotizacion->descuento !== 0.00 )
      <tr>

          <td colspan="2" class="blank"> &nbsp;  </td>
          <td class="total-line" style="text-align: right;">Descuento</td>
          <td class="total-line" style="text-align: right;">&nbsp;</td>
          <td class="total-value" >
            <div id="total">${{ isset( $cotizacion ) ? number_format($cotizacion->monto_descuento,2) : '10.00' }}</div>
          </td>
      </tr>
      @endif
      @endif
      <tr>
          <td colspan="2" class="blank">  &nbsp; </td>
          <td class="total-line" style="text-align: right;">IVA</td>
          <td class="total-line" style="text-align: right;">&nbsp;</td>
          <td class="total-value" >
            {{ isset( $cotizacion ) ? number_format($cotizacion->iva_monto ,2) : '10.00' }}
          </td>
      </tr>

      <tr id="totalCot">    
          <td colspan="4" class="total-line balance" style="text-align: center;"><span id="total-description">TOTAL COTIZACIÓN</span></td>
          <td class="total-value balance" >
            <div id="total-amount"  class="due">${{ isset( $cotizacion ) ? number_format($cotizacion->total,2) : '10.00' }}</div>
          </td>
      </tr>
     
      
</table>