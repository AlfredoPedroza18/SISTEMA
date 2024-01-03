
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Referencias Económicas</h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-12 text-center control-label"><strong>Bienes</strong></label>                
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Activos</th>
                                <th class="text-center">Respuesta</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Pagado</th>
                                <th class="text-center">Adeudo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">Totales:</td>
                                <td>
                                    <input type="hidden" name="bienes_total[id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->id : '0' }}">
                                    <input  type="number" class="form-control" name="bienes_total[valor]"  readonly="readonly" id="monto_bienes_total"                                        
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->valor : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control" name="bienes_total[pagado]" readonly="readonly" id="monto_pagado_total" 
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->pagado : '' }}">
                                </td>
                                <td class="text-right">
                                    <input  type="number" class="form-control" name="bienes_total[adeudo]" readonly="readonly" id="monto_adeudo_total" 
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->adeudo : '' }}">
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[0][id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[0]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[0][activo]" readonly="readonly"                                             
                                            value="PROPIEDADES DEL CANDIDATO">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[0][tiene]">
                                            <option value="1"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[0]->tiene == '1' )
                                                    selected="selected"    
                                                @endif
                                            @endif
                                            >Si</option>
                                            <option value="2"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[0]->tiene == '2' )
                                                    selected="selected"
                                                @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[0][tipo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[0]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[0][valor]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[0]->valor : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[0][pagado]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[0]->pagado : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[0][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[0]->adeudo : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[1][id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[1]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[1][activo]" readonly="readonly"                                             
                                            value="CREDITO O HIPOTECA">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[1][tiene]">
                                            <option value="1"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[1]->tiene == '1' )
                                                    selected="selected"    
                                                @endif
                                            @endif
                                            >Si</option>
                                            <option value="2"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[1]->tiene == '2' )
                                                    selected="selected"
                                                @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[1][tipo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[1]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[1][valor]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[1]->valor : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[1][pagado]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[1]->pagado : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[1][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[1]->adeudo : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[2][id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[2]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[2][activo]" readonly="readonly"                                             
                                            value="INVERSIONES/ AHORROS">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[2][tiene]">
                                            <option value="1"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[2]->tiene == '1' )
                                                    selected="selected"    
                                                @endif
                                            @endif
                                            >Si</option>
                                            <option value="2"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[2]->tiene == '2' )
                                                    selected="selected"
                                                @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[2][tipo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[2]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[2][valor]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[2]->valor : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[2][pagado]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[2]->pagado : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[2][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[2]->adeudo : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[3][id]" value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[3]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[3][activo]" readonly="readonly"                                             
                                            value="AUTOMOVILES">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[3][tiene]">
                                            <option value="1"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[3]->tiene == '1' )
                                                    selected="selected"    
                                                @endif
                                            @endif
                                            >Si</option>
                                            <option value="2"
                                            @if( $estudio->formatoGent )
                                                @if( $estudio->formatoGent->bienes[3]->tiene == '2' )
                                                    selected="selected"
                                                @endif
                                            @endif
                                            >No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[3][tipo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[3]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[3][valor]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[3]->valor : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[3][pagado]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[3]->pagado : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[3][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes[3]->adeudo : '' }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Ubicación de las propiedades: </label>
                <div class="col-md-10">
                    <input  type="text" 
                            class="form-control"                              
                            value="{{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->ubicacion : '' }}"
                            name="bienes_total[ubicacion]">
                </div>
            </div>
            

        </div>
    </div>
</div>