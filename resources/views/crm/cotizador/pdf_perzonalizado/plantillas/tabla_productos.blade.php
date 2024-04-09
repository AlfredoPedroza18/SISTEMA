<style>
      #items{
        color: #385b9a;
        align-items: center;
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        width: 800px
        
      }

      th{
        border-top: 1px solid #5b83cb;
        border-bottom: 1px solid #5b83cb;
        font-size: 15px;
      }

      #totalCot td {
        border-top: 1px double #5b83cb;
        border-bottom: 1px solid #5b83cb;
      }

      td{
        font-size: 13px;
      }
</style>

<div align="center">
  <table id="items" style="width: 100%;">
      
        <tr id="encabezado-detail">
            
            <th style="width: 350px;">Descripción</th>
            <th>P.U</th>
            <th>CANT.</th>
            <th>TOTAL</th>
        </tr>
        @if( isset( $cotizacion ) )
        @foreach ( $cotizacion->generales as $item )
          <tr class="item-row">
          
            <td class="description" style="width: 350px;">
              {{ $item->servicio['descripcion'] }}
            </td>
            <td style="text-align: right;">${{ number_format($item->costo_unitario,2) }}</td>
            <td style="text-align: center;">{{ $item->cantidad }}</td>
            <td >${{ number_format($item->subtotal,2) }}</td>
          </tr>
          <tr class="item-row">
          
            <td >
            &nbsp;
            </td>
            <td style="text-align: right;">&nbsp;</td>
            <td style="text-align: center;">&nbsp;</td>
            <td >&nbsp;</td>
          </tr>
        @endforeach

        <tr>
          <td colspan="5"> &nbsp; </td>
        </tr>
        @endif

        <tr>
            <td class="blank"> &nbsp;  </td>
            <td class="total-line" style="text-align: right;">Subtotal</td>
            <td>&nbsp;</td>
            <td class="total-value" >
              <div id="subtotal">${{ isset( $cotizacion ) ? number_format($cotizacion->subtotal,2) : '10.00' }}</div>
            </td>
        </tr>
        @if( isset( $cotizacion ) )
        @if( $cotizacion->descuento !== 0.00 )
        <tr>

            <td  class="blank"> &nbsp;  </td>
            <td class="total-line" style="text-align: right;">Descuento</td>
            <td class="total-line" style="text-align: right;">&nbsp;</td>
            <td class="total-value" >
              <div id="total">${{ isset( $cotizacion ) ? number_format($cotizacion->monto_descuento,2) : '10.00' }}</div>
            </td>
        </tr>
        @endif
        @endif
        <tr>
            <td  class="blank">  &nbsp; </td>
            <td class="total-line" style="text-align: right;">IVA</td>
            <td class="total-line" style="text-align: right;">&nbsp;</td>
            <td class="total-value" >
              {{ isset( $cotizacion ) ? number_format($cotizacion->iva_monto ,2) : '10.00' }}
            </td>
        </tr>

        <tr id="totalCot">    
            <td colspan="3" class="total-line balance" style="text-align: center;"><span id="total-description">TOTAL COTIZACIÓN</span></td>
            <td class="total-value balance" >
              <div id="total-amount"  class="due">${{ isset( $cotizacion ) ? number_format($cotizacion->total,2) : '10.00' }}</div>
            </td>
        </tr>
      
        
  </table>
</div>