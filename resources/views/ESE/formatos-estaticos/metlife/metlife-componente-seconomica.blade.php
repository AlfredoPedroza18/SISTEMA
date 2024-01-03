
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
                    <input type="hidden" name="seconomica[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                  
                 </div>
                
            </div>
             <div class="form-group">
                <div class="row">
                      <div class="col-md-3 text-center">CONCEPTO</div>
                      <div class="col-md-3 text-center">INGRESOS $</div>
                      <div class="col-md-3 text-center">CONCEPTO</div>
                      <div class="col-md-3 text-center">EGRESOS $</div>
                </div>
                
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinUno : ''}}" 
                            name="seconomica[conceptoinUno]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosUno : ''}}" 
                            name="seconomica[ingresosUno]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">ALIMENTACIÓN </label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosUno : ''}}" 
                            name="seconomica[egresosUno]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinDos : ''}}" 
                            name="seconomica[conceptoinDos]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosDos : ''}}" 
                            name="seconomica[ingresosDos]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">RENTA </label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosDos : ''}}" 
                            name="seconomica[egresosDos]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinTres : ''}}" 
                            name="seconomica[conceptoinTres]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosTres : ''}}" 
                            name="seconomica[ingresosTres]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">TELÉFONO</label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosTres : ''}}" 
                            name="seconomica[egresosTres]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinCuatro : ''}}" 
                            name="seconomica[conceptoinCuatro]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosCuatro : ''}}" 
                            name="seconomica[ingresosCuatro]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">SERVICIOS (GAS , AGUA , LUZ )         </label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosCuatro : ''}}" 
                            name="seconomica[egresosCuatro]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinCinco : ''}}" 
                            name="seconomica[conceptoinCinco]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosCinco : ''}}" 
                            name="seconomica[ingresosCinco]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">PREDIAL</label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosCinco : ''}}" 
                            name="seconomica[egresosCinco]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
               <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinSeis : ''}}" 
                            name="seconomica[conceptoinSeis]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosSeis : ''}}" 
                            name="seconomica[ingresosSeis]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">EDUCACIÓN</label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosSeis : ''}}" 
                            name="seconomica[egresosSeis]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
               <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinSiete : ''}}" 
                            name="seconomica[conceptoinSiete]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosSiete : ''}}" 
                            name="seconomica[ingresosSiete]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">TRANSPORTACIÓN</label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosSiete : ''}}" 
                            name="seconomica[egresosSiete]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
             <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinOcho : ''}}" 
                            name="seconomica[conceptoinOcho]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosOcho : ''}}" 
                            name="seconomica[ingresosOcho]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">DIVERSIONES</label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosOcho : ''}}" 
                            name="seconomica[egresosOcho]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>
                 <div class="form-group">
                <div class="row">
                    <div class="col-md-3 text-center">
                          <input  type="text" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinNueve : ''}}" 
                            name="seconomica[conceptoinNueve]" maxlength="255">

                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->ingresosNueve : ''}}" 
                            name="seconomica[ingresosNueve]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div>
                      <div class="col-md-3 text-center">
                          <label class="control-label">OTROS.</label>
                      </div>
                      <div class="col-md-3 text-center">
                            <input  type="number" 
                            class="form-control"
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->egresosNueve : ''}}" 
                            name="seconomica[egresosNueve]"
                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                             maxlength="25" min="1" max="99999999999999999999">
                      </div> 
                </div> 
             </div>


           
           
           
  </div><!--edn formulario horizontal -->
  </div>
</div>
