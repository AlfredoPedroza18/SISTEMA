<div id="psicometrico" style="display:none"><!------------------------  ESTUDIO  rys --------------------------------- ---->
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>PRUEBAS PSICOMETRICAS</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1 col-xs-12 col-sm-12">

    <ul class="cotizador-social-network cotizador-social-circle">
                      <li><a href="{{ url('listaPsicometricos') }}" class="icoRss text-center" title="Configuración"><i class="fa fa-wrench"></i></a></li>
    </div>
    <div class="col-md-5 col-xs-12 col-sm-12">
      <div class="form-group" id="form-tipo_prueba">
        <label>Tipo de prueba</label><br>
        <div class="input-group">
          <select class="form-control input-lg','data-live-search " data-style="btn-white" name="prueba_psicometrico" id="prueba_psicometrico" style="width:100%" >
           @foreach($pruebas as $key =>$value)
            
           <option value="{{$key}}">{{ $key=='-1'?'Selecciona una Prueba ':$key." - ".$value}}</option>
            
            @endforeach

          </select>
          <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-2 col-xs-12 col-sm-12">
      <div class="form-group" id="form-cost">
        <label> Cantidad</label><br>
        <div class="input-group">
          <input type="text" class="form-control float cantidad_num" id="cantidad_psicometrico">
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div>
    <div class="col-md-2 col-xs-12 col-sm-12">
      <div class="form-group" id="form-cost">
        <label>	Costo</label><br>
        <div class="input-group">
          <input type="text" class="form-control float" id="costo_psicometrico" name="costo_psicometrico" readonly="readonly">
          <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
        </div>
      </div>
    </div>
  </div><!-- end row -->
  <div class="row">
    <div class="col-md-4 col-xs-12 col-sm-12">
    </div>
    <div class="col-md-4 col-xs-12 col-sm-12" >
      <div class="invoice-price">
        <div class="invoice-price-left">
          <div class="invoice-price-row">

            <div class="sub-price">
              <small >IVA (16%)</small>
              <div id="iva_psico">$0.00</div>
              <input type="hidden" class="form-control" id="subtotal_psicometrico" name="subtotal_psicometrico">
              <input type="hidden" class="form-control" id="iva_psicometrico" name="iva_psicometrico">
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="col-md-3 col-xs-12 col-sm-12">
      <div class="invoice-price">
        <div class="invoice-price-right">
          <small >TOTAL</small> 
          <div id="tot_psico">$0.00</div>
          <input type="hidden" class="form-control" id="total_psicometrico" name="total_psicometrico">


          <input type="hidden" class="form-control" id="lista_psico_subtotal">
          <input type="hidden" class="form-control" id="lista_psico_iva">
          <input type="hidden" class="form-control" id="lista_psico_total_partida">
          <input type="hidden" class="form-control" id="lista_psico_pruebas">
          <input type="hidden" class="form-control" id="lista_psico_pruebas_seleccionadas">  
          <input type="hidden" class="form-control" id="lista_psico_cantidad">  



        </div>
      </div><!-- end invoice price-->
    </div>
    <input type="hidden" class="form-control" id="iduser"  value="{{Auth::user()->id}}">
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1 col-xs-12 col-sm-12 text-lelft" >
      <button type="button" class="btn btn-primary" id="btn-partida-psico">Agregar</button>    
      <button type="button" class="btn btn-success" id="btn-guardar-psico">Guardar</button>
      <button type="button" class="btn btn-info"    id="btn-guardar-os-psicometricos">Generar Orden de Servicio</button>
    </div>
  </div>

  <div class="row">

    <div class="col-md-12 col-xs-12 col-sm-12">
      <div class="note note-success"><center><h4><strong>Catálogo de pruebas Psicometricas</strong></h4></center></div>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12" >
      <div id="prueba1" class="table-responsive" >

      </div>
    </div>
  </div>





  <div class="row">
    <div class="col-md-1 col-xs-12 col-sm-12">
    </div>
    <div class="col-md-2 col-xs-12 col-sm-12">
      <div class="form-group" id="form-tipo_prueba">
        <h4><strong>Cantidad</strong></h4>
        
      </div>
    </div>
    <div class="col-md-3 col-xs-12 col-sm-12">
      <div class="form-group" id="form-tipo_prueba">
        <h4><strong>Tipo de prueba</strong></h4>
        
      </div>
    </div>
    <div class="col-md-2 col-xs-12 col-sm-12">
      <div class="form-group" id="form-cost">
        <h4><strong>Costo</strong></h4>
      </div>
    </div>
    <div class="col-md-2 col-xs-12 col-sm-12">
      <div class="form-group" id="form-cost">
        <h4><strong>Total</strong></h4>
      </div>
    </div>
  </div>


  <div id="partidas_psicometricos">
      
  </div>
  <div id="id_plantilla_psicometricos">
    <div class="row {add-class-partida-psicometricos}"> 
        <div class="row">
          <div class="col-md-1 col-xs-12 col-sm-12 form-group text-center">        
            <a href="javascript:;" class="btn btn-danger btn-icon btn-circle eliminar-partida-psicometrico" onclick="eliminarPartidaPsicometricos(this)"><i class="fa fa-trash-o"></i></a>
          </div>
          <div class="col-md-2 col-xs-12 col-sm-12">
            <div class="form-group" id="form-tipo_prueba">        
              <div class="input-group">              
                <input type="text" value="{cantidad_psicometrico_partida}" class="cantidad_psicometrico_partida form-control float " readonly="readonly">
                <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-12">
            <div class="form-group" id="form-tipo_prueba">        
              <div class="input-group">
                <input type="hidden" class="form-control class_id_psicometrico" id="id_psicometrico" name="id_psicometrico" value="{tipo_prueba_psicometricos}">
                <input type="hidden" class="lista-pruebas-psico-seleccionadas" value="{id_pruebas_psicometricas}">
                <input type="text" value="{costo_psicometrico_nombre}" class="form-control float " readonly="readonly">
                <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-12 col-sm-12">
            <div class="form-group" id="form-cost">
              <div class="input-group">
                <input type="text" class="form-control float class_costo_psicometrico" id="costo_psicometrico" name="costo_psicometrico"  value="{costo_psicometrico}" readonly="readonly">
                
                <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-12 col-sm-12">
            <div class="form-group" id="form-cost">
              <div class="input-group">
                <input type="text" class="form-control float class_total_psicometrico" id="costo_psicometrico" name="costo_psicometrico"  value="{total_psicometrico_partida}" readonly="readonly">
                
                <span class="input-group-addon"><i class="fa fa-1x fa-sort-numeric-asc"></i></span>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>




</div>
