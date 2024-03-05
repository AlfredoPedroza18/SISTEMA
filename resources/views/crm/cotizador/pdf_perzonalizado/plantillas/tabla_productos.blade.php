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
              <textarea>{{ $item->servicio['nombre'] }}</textarea>
              {{ $item->servicio['nombre'] }}
            </div>
          </td>

          <td class="description">
            {{ $item->servicio['descripcion'] }}
            <textarea>{{ $item->servicio['descripcion'] }}</textarea>
          </td>
          <td style="text-align: right;">${{ number_format($item->costo_unitario,2) }}</td>
          <td style="text-align: center;">{{ $item->cantidad }}</td>
          <td style="text-align: right;">${{ number_format($item->subtotal,2) }}</td>

          
          <td><textarea class="cost" style="text-align: right;">${{ number_format($item->costo_unitario,2) }}</textarea></td>
          <td><textarea class="qty" style="text-align: center;">{{ $item->cantidad }}</textarea></td>
          <td><span class="price" style="text-align: right;">${{ number_format($item->subtotal,2) }}</span></td>
          
          

        </tr>
      @endforeach
      @endif
</table>