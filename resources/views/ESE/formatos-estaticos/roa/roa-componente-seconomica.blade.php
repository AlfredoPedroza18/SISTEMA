
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">SITUACIÓN ECONÓMICA</h4>
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
  
      
            <div class="form-group">
                <div class="col-md-9">
                    <input type="hidden" name="seconomica[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
                  
                 </div>
                
            </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-2 text-center">CONCEPTO</div>
                      <div class="col-md-2 text-center">TIPO</div>
                      <div class="col-md-2 text-center">INGRESOS $</div>
                      <div class="col-md-2 text-center">CONCEPTO</div>
                      <div class="col-md-2 text-center">EGRESOS $</div>
                </div>
                
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinUno : ''}}" 
                            name="seconomica[conceptoinUno]" maxlength="255">

                      </div>
                       <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinUno : ''}}" 
                            name="seconomica[tipoinUno]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosUno : ''}}" 
                            name="seconomica[ingresosUno]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">ALIMENTACIÓN EN CASA</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosUno : ''}}" 
                            name="seconomica[egresosUno]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinDos : ''}}" 
                            name="seconomica[conceptoinDos]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinDos : ''}}" 
                            name="seconomica[tipoinDos]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosDos : ''}}" 
                            name="seconomica[ingresosDos]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">ALIMENTACIÓN FUERA DE CASA</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosDos : ''}}" 
                            name="seconomica[egresosDos]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinTres : ''}}" 
                            name="seconomica[conceptoinTres]" maxlength="255">

                      </div>
                       <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinTres : ''}}" 
                            name="seconomica[tipoinTres]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosTres : ''}}" 
                            name="seconomica[ingresosTres]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">RENTA/HIPOTECA</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosTres : ''}}" 
                            name="seconomica[egresosTres]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinCuatro : ''}}" 
                            name="seconomica[conceptoinCuatro]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinCuatro : ''}}" 
                            name="seconomica[tipoinCuatro]" maxlength="255">

                      </div>

                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosCuatro : ''}}" 
                            name="seconomica[ingresosCuatro]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">TELÉFONO</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosCuatro : ''}}" 
                            name="seconomica[egresosCuatro]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinCinco : ''}}" 
                            name="seconomica[conceptoinCinco]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinCinco : ''}}" 
                            name="seconomica[tipoinCinco]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosCinco : ''}}" 
                            name="seconomica[ingresosCinco]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">SERVICIOS ($ GAS, $ AGUA, $ LUZ)      </label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosCinco : ''}}" 
                            name="seconomica[egresosCinco]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
               <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinSeis : ''}}" 
                            name="seconomica[conceptoinSeis]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinSeis : ''}}" 
                            name="seconomica[tipoinSeis]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosSeis : ''}}" 
                            name="seconomica[ingresosSeis]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">PREDIAL</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosSeis : ''}}" 
                            name="seconomica[egresosSeis]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
               <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinSiete : ''}}" 
                            name="seconomica[conceptoinSiete]" maxlength="255">

                      </div>
                       <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinSiete : ''}}" 
                            name="seconomica[tipoinSiete]" maxlength="255">

                      </div>

                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosSiete : ''}}" 
                            name="seconomica[ingresosSiete]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">GASTOS ESCOLARES</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosSiete : ''}}" 
                            name="seconomica[egresosSiete]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinOcho : ''}}" 
                            name="seconomica[conceptoinOcho]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinOcho : ''}}" 
                            name="seconomica[tipoinOcho]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosOcho : ''}}" 
                            name="seconomica[ingresosOcho]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">GASOLINA Ó TRANSPORTE</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosOcho : ''}}" 
                            name="seconomica[egresosOcho]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
                 <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinNueve : ''}}" 
                            name="seconomica[conceptoinNueve]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinNueve : ''}}" 
                            name="seconomica[tipoinNueve]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosNueve : ''}}" 
                            name="seconomica[ingresosNueve]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">ROPA CALZADO</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosNueve : ''}}" 
                            name="seconomica[egresosNueve]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinDiez : ''}}" 
                            name="seconomica[conceptoinDiez]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinDiez : ''}}" 
                            name="seconomica[tipoinDiez]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosDiez : ''}}" 
                            name="seconomica[ingresosDiez]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">ROPA CALZADO</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosDiez : ''}}" 
                            name="seconomica[egresosDiez]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinOnce : ''}}" 
                            name="seconomica[conceptoinOnce]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinOnce : ''}}" 
                            name="seconomica[tipoinOnce]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->ingresosOnce : ''}}" 
                            name="seconomica[ingresosOnce]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-2 text-center">
                          <label class="control-label">ROPA CALZADO</label>
                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->egresosOnce : ''}}" 
                            name="seconomica[egresosOnce]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
               <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                          Si hay déficit, ¿Cómo lo solventa?
                        </div>
                        <div class="col-md-12">
                           <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->deficit_seconomica : ''}}" 
                            name="seconomica[deficit_seconomica]"
                            >
                        </div>
                    </div>
               </div>
               <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                         OBSERVACIONES
                        </div>
                        <div class="col-md-12">
                           <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->observaciones_seconomica : ''}}" 
                            name="seconomica[observaciones_seconomica]"
                            >
                        </div>
                    </div>
               </div>



           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
