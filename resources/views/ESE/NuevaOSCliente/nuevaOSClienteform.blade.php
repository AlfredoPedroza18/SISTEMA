<!-- <div class="jumbotron"> -->
                            <div class="row">
                            <input name="IdCliente" id="IdCliente" type="hidden" value="{{$IdCliente}}"/>
                            <input name="IdServicioEse" id="IdServicioEse" type="hidden" value="{{$IdServicioEse}}"/>
                            <input name="IdServicio" id="IdServicio" type="hidden" value="{{$servi}}"/>
                            <input name="NServicio" id="NServicio" type="hidden" value="{{$nservicio}}"/>
                            <input name="ContadorS" id="ContadorS" type="hidden" value="{{$cont}}"/>
                                <div id="mensC"></div>
                                @if($servi==3)
                                <div id="TipoServ" class="col-md-3">
                                    <div class="form-group block1">
                                    
                                        <label>{{ Form::label('TipoServicio', '* Tipo de Servicio') }}</label>

                                        <select class="form-control" name="serv" id="serv" onchange="FPlantillas();" required>
                                                        <option value=''>Seleccione un Tipo de Servicio</option>
                                                        @foreach($tservicios as $s)
                                                        <option value="{{ $s->IdTipos }}" >{{ $s->Tipos }}</option>
                                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group block1">
                                        <!--
                                        <label>{{ Form::label('FormatoPlantilla', 'Formato / Plantilla') }}</label>
                                        <select class="form-control" name="pl" id="pl" required>
                                            
                                        </select>
										-->
                                        <label>{{ Form::label('FormatoPlantilla', 'Formato / Plantilla') }}</label>
                                        <select class="form-control" name="plG" id="plG" required>
                                            <option value=''>Seleccione una Plantilla</option>
                                            @foreach($plantillasPorClientes as $pl)
                                                <option value="{{ $pl->IdPlantilla }}-{{ $pl->IdPlantillaCliente }}" >{{ $pl->NombrePlantilla }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group block1">
                                    <label for="">Servicios Solicitados</label>
                                    <input style="margin-top: 5px;" type="text" readonly name="contadorEse" id="contadorEse" class="form-control" value="{{$cont}}">
                                  </div>

                                </div>
                                <div id="bServ" class="col-sm-3 col-sm-offset-0">
                                    <div class="form-group block1">
                                    
                                        <label>{{ Form::label('*', '*', array('style' => 'color:#FFFFFF;')) }}</label>

                                        <a  class='btn btn-success btn-block col-md-15 seleccionar'  id="AplicarEstudios" onclick="serv();">Seleccionar Formato</a>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-3">
                                    <div class="form-group block1">
                                    
                                        <label>{{ Form::label('FormatoPlantilla', 'Formato / Plantilla') }}</label>
                                        <select class="form-control" name="plG" id="plG" required>
                                            <option value=''>Seleccione una Plantilla</option>
                                            @foreach($plantillasPorClientes as $pl)
                                                @if ($pl->IdPlantilla != null)
                                                    <option value="{{ $pl->IdPlantilla }}-{{ $pl->IdPlantillaCliente }}" >{{ $pl->NombrePlantilla }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                            
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group block1">
                                    <label for="">Servicios Solicitados</label>
                                    <input style="margin-top: 5px;" type="text" readonly name="contadorEse" id="contadorEse" class="form-control" value="{{$cont}}">
                                  </div>

                                </div>
                                <div id="bServ" class="col-md-3 col-sm-offset-3">
                                    <div class="form-group block1">
                                        
                                    <label>{{ Form::label('*', '*', array('style' => 'color:#FFFFFF;')) }}</label>

                                        <a  class='btn btn-success btn-block col-md-15 seleccionar'  id="AplicarEstudios" onclick="serv();">Seleccionar Formato</a>
                                    </div>
                                </div>
                                @endif
                        
                            </div>
                            <span id="container-estudios">
                            </span>
                        <div class="row">
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-8 text-right">
                                    <a  class='btn btn-success btn-block col-md-15 seleccionar'  id="SolicitarChE" onclick="SolicitarChE();">Solicitar</a>
                               </div>
                            </div>
                            <!-- contenedor estudios -->
                                        
                <!-- </div> -->