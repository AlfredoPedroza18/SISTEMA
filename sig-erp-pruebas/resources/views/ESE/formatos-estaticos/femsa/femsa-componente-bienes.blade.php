
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
                                    <input type="hidden" name="bienes_total[id]" value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes_totales->id : '0' }}">
                                    <input  type="number" class="form-control" name="bienes_total[valor]"  readonly="readonly" id="monto_bienes_total"                                        
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes_totales->valor : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control" name="bienes_total[pagado]" readonly="readonly" id="monto_pagado_total" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes_totales->pagado : '0.00' }}">
                                </td>
                                <td class="text-right">
                                    <input  type="number" class="form-control" name="bienes_total[adeudo]" readonly="readonly" id="monto_adeudo_total" 
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes_totales->adeudo : '0.00' }}">
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[0][id]" value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[0]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[0][activo]" readonly="readonly"                                             
                                            value="PROPIEDADES DEL CANDIDATO">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[0][tiene]">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[0][tipo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[0]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[0][valor]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[0]->valor : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[0][pagado]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[0]->pagado : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[0][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[0]->adeudo : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[1][id]" value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[1]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[1][activo]" readonly="readonly"                                             
                                            value="CREDITO O HIPOTECA">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[1][tiene]">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[1][tipo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[1]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[1][valor]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[1]->valor : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[1][pagado]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[1]->pagado : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[1][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[1]->adeudo : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[2][id]" value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[2]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[2][activo]" readonly="readonly"                                             
                                            value="INVERSIONES/ AHORROS">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[2][tiene]">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[2][tipo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[2]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[2][valor]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[2]->valor : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[2][pagado]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[2]->pagado : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[2][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[2]->adeudo : '0.00' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="bienes_detalle[3][id]" value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[3]->id : '0' }}">
                                    <input  type="text" class="form-control" name="bienes_detalle[3][activo]" readonly="readonly"                                             
                                            value="AUTOMOVILES">
                                </td>
                                <td>
                                    <div class="col-md-12">                    
                                        <select class="form-control" name="bienes_detalle[3][tiene]">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>   
                                </td>
                                <td>
                                    <input  type="text" class="form-control" name="bienes_detalle[3][tipo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[3]->tipo : '' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_bienes" name="bienes_detalle[3][valor]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[3]->valor : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_pagado" name="bienes_detalle[3][pagado]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[3]->pagado : '0.00' }}">
                                </td>
                                <td>
                                    <input  type="number" class="form-control monto_adeudo" name="bienes_detalle[3][adeudo]"                                             
                                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes[3]->adeudo : '0.00' }}">
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
                            value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes_totales->ubicacion : '' }}"
                            name="bienes_total[ubicacion]">
                </div>
            </div>
            

        </div>
    </div>
</div>