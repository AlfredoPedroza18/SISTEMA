<div id="maquila" style="display:none"><!------------------------  ESTUDIO  rys --------------------------------- ---->
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>MAQUILA</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1 col-xs-12 col-sm-12">
    <ul class="cotizador-social-network cotizador-social-circle">
                      <li><a href="{{ url('servicio_maquila') }}" class="icoRss text-center" title="Configuración"><i class="fa fa-wrench"></i></a></li>
                  </ul>
    </div>
    <div class="col-md-3 col-xs-12 col-sm-12">
      <div class="form-group">
        <label>Paquete</label><br>
        <div class="input-group">

         
        <select class="form-control input-lg','data-live-search " data-st btn-white" name="paquete_maquila" id="paquete_maquila" style="width:100%">
          @foreach($paquetes as $key =>$value)
            
           <option value="{{$key}}">{{ $key=='-1'?'Selecciona un Paquete':$key." - ".$value}}</option>
            
            @endforeach
            						
          </select>
          <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>	Núm. de empleados</label><br>
        <div class="input-group">
          <input type="text" class="form-control integer" id="num_empleados_maquila" name="num_empleados_maquila">
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>	Costo Unitario</label><br>
        <div class="input-group">
          <input type="text" class="form-control float" id="costo_unitario_maquila" name="costo_unitario_maquila" disabled="disabled">
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-md-3 col-xs-12 col-sm-12">
    </div>
    <div class="col-md-5 col-xs-12 col-sm-12" >
      <div class="invoice-price">
        <div class="invoice-price-left">
          <div class="invoice-price-row">
            <div class="sub-price">
              <small>SUB-TOTAL</small>
              <center id="html-subtotal-maquila">$ 00.00</center> 
              <input type="hidden" class="form-control" id="subtotal_maquila" name="subtotal_maquila">
            </div>
            <div class="sub-price">
              <i class="fa fa-plus"></i>
            </div>
            <div class="sub-price">
              <small>IVA (16%)</small>
              <center id="html-iva-maquila">$ 00.00</center> 
              <input type="hidden" class="form-control" id="iva_maquila" name="iva_maquila">
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="col-md-3 col-xs-12 col-sm-12">
      <div class="invoice-price">
        <div class="invoice-price-right">
          <small>TOTAL</small> <center id="html-total-maquila">$ 00.00</center> 
          <input type="hidden" class="form-control" id="total_maquila" name="total_maquila">

          <input type="hidden" class="form-control" id="lista_sub_total_maquila">
          <input type="hidden" class="form-control" id="lista_empleados_maquila">
          <input type="hidden" class="form-control" id="lista_paquetes_maquila">
          <input type="hidden" class="form-control" id="lista_costounitario_maquila">
          

        </div>
      </div><!-- end invoice price-->
    </div>
  </div><!-- END ROW---- -->
  <div class="row">
    <div class="col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
      <button class="btn btn-primary bt-lg" id="btn-partida-maquila">Agregar</button>
    
      <button class="btn btn-success bt-lg " id="btn-cotizacion-maquila">Guardar</button>
       <button class="btn btn-info bt-lg " id="btn-orden-servicio-maquila">Generar Orden de Servicio</button>
    </div>
  </div> 
  <hr>   
  <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
      <div class="panel-group" id="accordion">
        <div class="panel panel-inverse overflow-hidden" id="maq" style="display:none">
          <div class="panel-heading">
            <h3 class="panel-title">
              <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                <i class="fa fa-plus-circle pull-right"></i> 
               <div id="titulo"></div>
              </a>
            </h3>
          </div>
          <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
              <div class="note note-info">
                <p>
                <div id="contenido"></div>
                  
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-inverse overflow-hidden" id="maq1plus" style="display:none">
          <div class="panel-heading">
            <h3 class="panel-title">
              <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                <i class="fa fa-plus-circle pull-right"></i> 
                MaQ 1 Plus
              </a>
            </h3>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">
              <div class="note note-info">
                <p>
                  <ol>
                    <li> MaQ 1   +   Transmisión del pago a tarjeta de nómina y/o mediante cheque.</li>
                  </ol>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-inverse overflow-hidden" id="maq2" style="display:none">
          <div class="panel-heading">
            <h3 class="panel-title">
              <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                <i class="fa fa-plus-circle pull-right"></i> 
                MaQ 2
              </a>
            </h3>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">
              <div class="note note-info">                
                <p>
                  <h5>Incluye: MaQ 1 + </h5>
                  <ol>
                    <li>Generación de archivo para pago</li>
                    <li>Determinación de SDI por variables bimestral.</li>
                    <li>Elaboración y presentación de avisos ante IMSS (Reingresos, Altas, Bajas o Modificaciones, Autorizaciones Permanentes locales y foráneas, etc.)</li>
                    <li>Reportes correspondientes al IMSS.</li>
                    <li>Elaboración de Cartas Constancias de Percepciones y Retenciones de impuestos.</li>
                    <li>Elaboración de Autorizaciones Permanentes y Carnet de Viajero.</li>
                    <li>Cálculo del grado de Riesgo de Trabajo.</li>
                    <li> Declaracion informativa de sueldos y salarios</li>
                  </ol>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-inverse overflow-hidden" id="maq2plus" style="display:none">
          <div class="panel-heading">
            <h3 class="panel-title">
              <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false">
                <i class="fa fa-plus-circle pull-right"></i> 
                MaQ 2 Plus
              </a>
            </h3>
          </div>
          <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">
              <div class="note note-info">                
                <p>
                  <h5>Incluye: MaQ 2 + </h5>
                  <ol>
                    <li>Transmisión del pago a tarjeta de nómina y/o mediante cheque</li>
                  </ol>
                </p>
              </div>
            </div>
          </div>
        </div>       
      </div>


    </div>

  </div>
  <div class="row">
    <div class="col-md-3 col-md-offset-1 col-xs-12 col-sm-12">
      <div class="form-group">
        <h4><strong>Paquete</strong></h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <h4><strong> Núm. de empleados</strong></h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <h4><strong>Costo Unitario</strong></h4>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <h4><strong>Costo Total</strong></h4>
      </div>
    </div>

  </div>
  <div id="partidas_maquila">
      
  </div>
  <div id="id_plantilla_maquila">
    <div class="row {add-class-partida}">      
      <div class="col-md-1 col-xs-12 col-sm-12 form-group text-center">        
        <a href="javascript:;" class="btn btn-danger btn-icon btn-circle eliminar-partida-maquila" onclick="eliminarPartidaMaquila(this)"><i class="fa fa-trash-o"></i></a>
      </div>
      <!--div class="col-md-2 col-xs-12 col-sm-12 form-group text-center">
        <h4><strong>{numero_de_partida}</strong></h4>
      </div-->
      <div class="col-md-2 col-xs-12 col-sm-12">
        <div class="form-group">        
          <div class="input-group">
            <input type="text" class="form-control " value="{tipo_paquete_nombre}" disabled="disabled">
            <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
            <input type="hidden" class="form-control tipo_paquete_maquila" value="{tipo_paquete}">
          </div>
        </div>
      </div>
      <div class="col-md-2 col-md-offset-1">
        <div class="form-group">        
          <div class="input-group">
            <input type="text" class="form-control integer cantidad_empleados_maquila" value="{cantidad_empleados}" disabled="disabled">
            <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-md-offset-1">
        <div class="form-group">        
          <div class="input-group">
            <input type="text" class="form-control costo_unitario_maquila float" value="{costo_unitario}" disabled="disabled">
            <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-md-offset-1">
        <div class="form-group">        
          <div class="input-group">
            <input type="text" class="form-control costo_total_maquila float" value="{costo_total}" disabled="disabled">
            <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>