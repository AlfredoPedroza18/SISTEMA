
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
                    <input type="hidden" name="seconomica[id]" value="{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->id : 0 }}">
                  
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinUno : ''}}" 
                            name="seconomica[conceptoinUno]" maxlength="255">

                      </div>
                       <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinUno : ''}}" 
                            name="seconomica[tipoinUno]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosUno : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosUno : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinDos : ''}}" 
                            name="seconomica[conceptoinDos]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinDos : ''}}" 
                            name="seconomica[tipoinDos]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosDos : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosDos : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinTres : ''}}" 
                            name="seconomica[conceptoinTres]" maxlength="255">

                      </div>
                       <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinTres : ''}}" 
                            name="seconomica[tipoinTres]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosTres : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosTres : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinCuatro : ''}}" 
                            name="seconomica[conceptoinCuatro]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinCuatro : ''}}" 
                            name="seconomica[tipoinCuatro]" maxlength="255">

                      </div>

                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosCuatro : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosCuatro : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinCinco : ''}}" 
                            name="seconomica[conceptoinCinco]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinCinco : ''}}" 
                            name="seconomica[tipoinCinco]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosCinco : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosCinco : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinSeis : ''}}" 
                            name="seconomica[conceptoinSeis]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinSeis : ''}}" 
                            name="seconomica[tipoinSeis]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosSeis : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosSeis : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinSiete : ''}}" 
                            name="seconomica[conceptoinSiete]" maxlength="255">

                      </div>
                       <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinSiete : ''}}" 
                            name="seconomica[tipoinSiete]" maxlength="255">

                      </div>

                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosSiete : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosSiete : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinOcho : ''}}" 
                            name="seconomica[conceptoinOcho]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinOcho : ''}}" 
                            name="seconomica[tipoinOcho]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosOcho : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosOcho : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinNueve : ''}}" 
                            name="seconomica[conceptoinNueve]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinNueve : ''}}" 
                            name="seconomica[tipoinNueve]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosNueve : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosNueve : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinDiez : ''}}" 
                            name="seconomica[conceptoinDiez]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinDiez : ''}}" 
                            name="seconomica[tipoinDiez]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosDiez : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosDiez : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinOnce : ''}}" 
                            name="seconomica[conceptoinOnce]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinOnce : ''}}" 
                            name="seconomica[tipoinOnce]" maxlength="255">

                      </div>
                      <div class="col-md-2 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->ingresosOnce : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->egresosOnce : '0.00'}}" 
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
                            value="{{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->deficit_seconomica : ''}}" 
                            name="seconomica[deficit_seconomica]"
                            >
                        </div>
                    </div>
               </div>
             



           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
