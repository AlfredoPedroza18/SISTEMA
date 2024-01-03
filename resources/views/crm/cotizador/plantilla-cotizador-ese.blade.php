<div id="ese" style="display:none"><!------------------------  ESTUDIO  ESE --------------------------------- ---->

  <div class="row">
    <div class="col-md-12 text-center">
      <h2>ESE</h2>
    </div>
  </div>
  <div class="row">

    <div class="col-md-3 col-md-offset-1">
        <div class="form-group" id='num_estudio'>
          <label>Prioridad</label><br>
          <div class="input-group">

            <div id="select-prioridad-ese"> 
                  
            </div>
            {{-- <select class="form-control input-lg','data-live-search " data-style="btn-white" name="prioridad_estudio_ese" id="prioridad_estudio_eseee" style="width:100%">
              <option value='-1'>Selecciona la prioridad...</option>
              <option value="1"> Normal (de 3 a 5 dias) </option>
              <option value="2">Urgentes (menos de 3 dias) </option>


            </select>--}}
            <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
          </div>
        </div>
    </div>
    <div class="col-md-3">
      <div class="form-group" id='num_estudio'>
        <label>Estado</label><br>
        <div class="input-group">
          <select class="form-control input-lg','data-live-search " data-style="btn-white" name="estado_estudio_ese" id="estado_estudio_eseee" style="width:100%">
            
            

          </select>
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-xs-12 col-sm-12">
      <div class="form-group" id="tip_estudio">
        <label>	Tipo de estudio</label><br>
        <div class="input-group">
          <div id="select-tipo-estudio"> 
                  
            </div>

          {{--<select class="form-control input-lg','data-live-search " data-style="btn-white" name="tipo_estudio_ese" id="tipo_estudio_eseee" style="width:100%">
            <option value='-1'>Selecciona un servicio...</option>
            <option value='1'> Estudio Socioeconomico con Visita  </option>
            <option value='2'> Estudio Socioeconomico Telefonico  </option>
            <option value='3'> Referencias laborales  </option>
            <option value='4'> Estudo para Becas 1  </option>
            <option value='5'> Estudio Medico  </option>
            <option value='6'> Estudio Crediticio  </option>
            <option value='7'> A-1  </option>
            <option value='8'> A2  </option>
            <option value='9'> Especial  </option>


          </select>--}}
          <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
        </div>
      </div>
    </div>    
  </div>
  <div class="row">
    <!--div class="col-md-3 col-md-offset-2">
      <div class="form-group" id='num_estudio'>
        <label>Prioridad</label><br>
        <div class="input-group">
          <select class="form-control input-lg','data-live-search " data-style="btn-white" name="tipo_estudio_ese" id="tipo_estudio_ese" style="width:100%">
            <option value='-1'>Selecciona la prioridad...</option-->
<!--option value='1'>Ciudad de México</option>
<option value='2'>Estado de México</option>
<option value='3'>Télefonico</option>
<option value='4'>Referencias Télefonicas</option>
<option value='5'>Urgentes menos de 3 dias</option>
<option value='6'>Estudios para Becas 1</option>
<option value='7'>Estudios para Becas 2</option>
<option value='8'>Referencias Laborales</option>
<option value='9'>Otros</option-->
            <!--option value="1"> Normal (de 3 a 5 dias) </option>
            <option value="2">Urgentes (menos de 3 dias) </option>


          </select>
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div-->
      <div class="col-md-2 col-md-offset-4">
        <div class="form-group" id='num_estudio'>
          <label>	Número  de Estudios</label><br>
          <div class="input-group">
            <input type="text" class="form-control integer" id="num_estudios_ese" name="num_estudios_ese">
            <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>	Costo  
          </label><br>
          <div class="input-group">
            <input type="text" class="form-control float" id="costo_ese" name="costo_ese" readonly="readonly">
            <span class="input-group-addon"><i class="fa fa-1x fa-money"></i></span>
          </div>
        </div>
      </div><!-- end row -->
      </div>

      <div class="row">
        <div class="col-md-5 col-md-offset-2 col-xs-12 col-sm-12" >
          <div class="invoice-price">
            <div class="invoice-price-left">
              <div class="invoice-price-row">
                <div class="sub-price">
                  <small >SUB-TOTAL</small>
                  <div id="sub">$ 00.00</div> <input type="hidden" class="form-control float" id="subtotal_ese" name="subtotal_ese">
                </div>
                <div class="sub-price">
                  <i class="fa fa-plus"></i>
                </div>
                <div class="sub-price">
                  <small >IVA (16%)</small>
                  <div id="iv">$ 00.00</div>
                  <input type="hidden" class="form-control float" id="iva_ese" name="iva_ese">
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="col-md-3 col-xs-12 col-sm-12">
          <div class="invoice-price">
            <div class="invoice-price-right">
              <small >TOTAL</small> 
              <div id="tot">$ 00.00</div>
              <input type="hidden" class="form-control" id="total_ese" name="total_ese">

              <input type="hidden" class="form-control" id="lista_prioridad_ese">
              <input type="hidden" class="form-control" id="lista_estado_ese">
              <input type="hidden" class="form-control" id="lista_tipo_estudio_ese">
              <input type="hidden" class="form-control" id="lista_cantidad_ese">
              <input type="hidden" class="form-control" id="lista_costo_unitario_ese">
              <input type="hidden" class="form-control" id="lista_sub_total_ese">
              <input type="hidden" class="form-control" id="lista_iva_ese">
              <input type="hidden" class="form-control" id="lista_total_ese">

            </div>
          </div><!-- end invoice price-->
        </div>
        <input type="hidden" class="form-control" id="id_user" name="iduser" value="{{ Auth::user()->id}}">
      </div><!-- END ROW---- -->
      <div class="row">
        <div class="col-md-1 col-xs-12 col-sm-12 text-lelft" >
        </div>
        <div class="col-md-11 col-xs-12 col-sm-12 text-lelft" >
          <button type="button" class="btn btn-primary" id="btn-cotizador-ese" value="validated" >Agregar</button>
          <button type="button" class="btn btn-success" id="btn-guardar-ese">Generar Cotización</button>
          <button type="button" class="btn btn-info" id="btn-guardar-os-ese">Generar Orden de Servicio</button>
        </div>
      </div>
      <div class="row">
      <div class="col-md-2 col-md-offset-1 col-xs-12 col-sm-12">
        <div class="form-group">
          <h4><strong>Prioridad</strong></h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <h4><strong>Estado</strong></h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <h4><strong>Tipo estudio</strong></h4>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <h4><strong>Cantidad</strong></h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <h4><strong>Costo</strong></h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <h4><strong>Sub Total</strong></h4>
        </div>
      </div>
    </div>
    <div id="partidas_ese">
      
    </div>
    <div id="id_plantilla_ese">
      <div class="row {add-class-ese}">      
        <div class="col-md-1 col-xs-12 col-sm-12 form-group text-center">        
          <a href="javascript:;" class="btn btn-danger btn-icon btn-circle eliminar-partida-ese" onclick="eliminarPartidaEse(this)"><i class="fa fa-trash-o"></i></a>
        </div>        
        <div class="col-md-2 col-xs-12 col-sm-12">
          <div class="form-group">        
            <div class="input-group">
              <input type="text" class="form-control" value="{prioridad_ese_nombre}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
              <input type="hidden" class="form-control class-prioridad-ese" value="{prioridad_ese}" >
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group"> 
              <input type="hidden" class="form-control integer class-estado-ese" value="{estado_ese}" disabled="disabled">
              <input type="text" class="form-control integer class-estado-ese-mascara" value="{estado_ese_mascara}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-cube"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group"> 
              <input type="hidden" class="form-control class-tipo-estudio-ese" value="{tipo_estudio_ese}" disabled="disabled">
              <input type="text" class="form-control class-tipo-estudio-ese-mascara" value="{mascara_tipo_estudio_ese}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-bookmark"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">        
            <div class="input-group"> 
              <input type="text" class="form-control class-num-estudios-ese" name="costo_unitario_maquila" value="{num_estudios_ese}" disabled="disabled">
              
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group"> 
              <input type="text" class="form-control class-costo-ese float" value="{costo_ese}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-money"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">        
            <div class="input-group"> 
              <input type="text" class="form-control class-subtotal-ese float" name="costo_unitario_maquila" value="{subtotal_ese}" disabled="disabled">
              <span class="input-group-addon"><i class="fa fa-1x fa-money"></i></span>
            </div>
          </div>
        </div>

      </div>
    </div>
</div><!-- end div  estudio ESE------------------------------------------------------------- -->
