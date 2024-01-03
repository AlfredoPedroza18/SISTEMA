<div id="rys" style="display:none"><!------------------------  ESTUDIO  rys --------------------------------- ---->
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>RYS</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-2">
      <div class="form-group" id="vacantes_rys_message">
        <label>	Núm. de vacantes que requiere</label><br>
        <div class="input-group">
          <input type="text" class="form-control integer" id="num_vacates_rys" name="num_vacantes_rys">
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group" id="puesto_rys_message">
        <label>	Puestos que se <br>requieren</label><br>
        <div class="input-group">
          <input type="text" class="form-control " id="puesto_requerido_rys" name="puesto_requerido_rys" maxlength="255">
          <span class="input-group-addon"><i class="fa fa-1x fa-cog"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group" id="sueldo_rys_message">
        <label>	Sueldo mensual o promedio mensual</label><br>
        <div class="input-group">
          <input type="text" class="form-control float" id="sueldo_mensual_rys" name="sueldo_mensual_rys">
          <span class="input-group-addon"><i class="fa fa-1x fa-money"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group" id="porcentaje_rys_message">
        <label>	Porcentaje</label><br><br>
        <div class="input-group">
          <input type="text" class="form-control float" id="porcentaje_rys" name="porcentaje_rys" disabled="disabled">
          <span class="input-group-addon"><strong>%</strong></span>
        </div>
      </div>
    </div>
     <div class="col-md-2">
       <label> Garantia</label><br><br>
        <div class="input-group">
          <input type="text" class="form-control small integer" id="garantia_rys" name="garantia_rys" maxlength="2">
          <span class="input-group-addon"><strong>Meses</strong></span>
        </div>
     
    </div>

  </div><!-- end row ----- -->
  <div class="row">

    <div class="col-md-3 col-md-offset-1 col-xs-12 col-sm-12">
      <div class="invoice-price">
        <div class="invoice-price-left">
          <div class="invoice-price-row">
            <div class="sub-price">
              <small>PROPUESTA ECONOMICA</small>
              <center id="propuesta_economica_precio_rys"> $00.00</center>
              <input type="hidden" class="form-control" id="propuesta_econonimca_rys" name="propuesta_econonimca_rys">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-1 col-xs-12 col-sm-12"> 
       <div class="invoice-price">
        <div class="invoice-price-left">
          <div class="invoice-price-row">            
              <div class="sub-price">
                <i class="fa fa-plus"></i>
              </div>            
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12 col-sm-12" >
      <div class="invoice-price">
        <div class="invoice-price-left">
          <div class="invoice-price-row">
            <!--div class="sub-price">
              <center><small>SUB-TOTAL</small>
                $4,500.00</center>
                <input type="text" class="form-control" id="subtotal_rys" name="subtotal_rys">
              </div >
              <div class="sub-price">
                <i class="fa fa-plus"></i>
              </div -->
              <div class="sub-price">
                <center><small>IVA (16%)</small></center>
                  <center id="iva_precio_rys">$00.00</center>
                  <input type="hidden" class="form-control" id="iva_rys" name="iva_rys">
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="col-md-3 col-xs-12 col-sm-12">
          <div class="invoice-price">
            <div class="invoice-price-right">
              <small>TOTAL</small> 
              <center id="servicio_total_rys">$00.00 </center>
              <input type="hidden" class="form-control" id="total_rys" name="total_rys">

              <input type="hidden" class="form-control" id="lista_rys_num_vacantes">
              <input type="hidden" class="form-control" id="lista_rys_puesto">
              <input type="hidden" class="form-control" id="lista_rys_sueldo_mensual">
              <input type="hidden" class="form-control" id="lista_rys_porcentaje">
              <input type="hidden" class="form-control" id="lista_rys_total_partida">

              

            </div>
          </div><!-- end invoice price-->
        </div>
      </div><!-- END ROW---- -->
      <div class="row">
        <div class="col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
          <button class="btn btn-primary" id="btn-partida-rys">Agregar</button>                 
          <button id="btn_cotizar_rys" class="btn btn-success">Cotizar</button>
          <button type="button" class="btn btn-info" id="btn-guardar-os-rys">Generar Orden de Servicio</button>
        </div>
      </div>

      <hr>
    
    <div class="row">
    <div class="col-md-2 col-md-offset-1 col-xs-12 col-sm-12">
      <div class="form-group">
        <h4><strong># Vacantes</strong></h4>        
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <h4><strong>Puesto</strong></h4>        
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <h4><strong>Sueldo mensual</strong></h4>        
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <h4><strong>Porcentaje</strong></h4>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <h4><strong>Subtotal</strong></h4>
      </div>
    </div>

  </div>

  <div id="partidas_rys">
      
  </div>
  <div id="id_plantilla_rys">
    <div class="row {add-class-partida-rys}"> 
      <div class="row">
        <div class="col-md-1 col-xs-12 col-sm-12 form-group text-center">        
        <a href="javascript:;" class="btn btn-danger btn-icon btn-circle eliminar-partida-rys" onclick="eliminarPartidaRys(this)"><i class="fa fa-trash-o"></i></a>
      </div>
        <div class="col-md-2">
          <div class="form-group" >            
            <div class="input-group">
              <input type="text" class="form-control integer num_vacantes_rys_partida" value="{vacantes_rys_partida}" disabled="disabled" >
              <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-2 ">
          <div class="form-group">            
            <div class="input-group">
              <input type="text" class="form-control puesto_requerido_rys_partida" maxlength="255" value="{puesto_rys_partida}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-cog"></i></span> 
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group">
              <input type="text" class="form-control float sueldo_mensual_rys_partida" value="{sueldo_rys_partida}" disabled="disabled"> 
              <span class="input-group-addon"><i class="fa fa-1x fa-money"></i></span> 
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group">
              <input type="text" class="form-control float porcentaje_rys_partida" value="{porcentaje_rys_partida}" disabled="disabled">
              <span class="input-group-addon"><strong>%</strong></span>
            </div>
          </div> 
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group">
              <input type="text" class="form-control float subtotal_rys_partida" value="{subtotal_rys_partida}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-money"></i></span>
            </div>
          </div>
        </div>


        
      </div>
    </div>
  </div>

</div>