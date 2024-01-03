<!-- <div class="jumbotron"> -->


                            <div class="row">
                            <div id="mensC"></div>
                            <input name="IdCliente" id="IdCliente" type="hidden" value="{{$IdCliente}}"/>
                            <input name="IdServicioEse" id="IdServicioEse" type="hidden" value="{{$ids}}"/> {{-- $IdServicioEse --}}
                            <input name="NServicio" id="NServicio" type="hidden" value="{{$nservicio}}"/>
                            <input name="IdServicio" id="IdServicio" type="hidden" value="{{$servi}}"/>
                                                    <!-- begin col-4 -->
                                @if($servi==3)
                                <div id="TipoServ" class="col-md-3">
                                    <div class="form-group block1">

                                        <label>{{ Form::label('TipoServicio', '* Tipo de Servicio') }}</label>

                                        <select class="form-control" name="serv" id="serv" onchange="FPlantillas();" value="{{$servi}}" disabled required>
                                                        <!-- <option value=''>Seleccione un Tipo de Servicio</option> -->
                                                        @foreach($tservicios as $s)
                                                        <option value="{{ $s->IdTipos }}" >{{ $s->Tipos }}</option>
                                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group block1">

                                        <label>{{ Form::label('FormatoPlantilla', 'Formato / Plantilla') }}</label>
                                        <select class="form-control" name="pl" id="pl" value="{{$IdPlantilla}}-{{$IdPlantillaCliente}}" disabled required>
                                            @foreach($plantillasPorClientes as $s)
                                                @if ($s->IdPlantilla != null)
                                                    <option value="{{ $s->IdPlantilla }}-{{ $s->IdPlantillaCliente }}" {{("$s->IdPlantilla-$s->IdPlantillaCliente" == "$IdPlantilla-$IdPlantillaCliente")?"selected":""}}>{{ $s->NombrePlantilla }}</option>
                                                @endif
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                @else
                                <div class="col-md-3">
                                    <div class="form-group block1">

                                        <label>{{ Form::label('FormatoPlantilla', 'Formato / Plantilla') }}</label>
                                        <select class="form-control" name="plG" id="plG" value="{{$IdPlantilla}}-{{$IdPlantillaCliente}}"  disabled required>
                                            <!-- <option value=''>Seleccione una Plantilla</option> -->
                                            @foreach($plantillasPorClientes as $pl)
                                                @if ($pl->IdPlantilla != null)
                                                    <option value="{{ $pl->IdPlantilla }}-{{ $pl->IdPlantillaCliente }}" {{("$pl->IdPlantilla-$pl->IdPlantillaCliente" == "$IdPlantilla-$IdPlantillaCliente")?"selected":""}} >{{ $pl->NombrePlantilla }}</option>
                                                @endif
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                @endif

                                <div class="col-sm-3">
                                  <div class="form-group block1">
                                    <label for="">Servicios Solicitados</label>
                                    <input style="margin-top: 5px;" type="text" readonly name="contadorEse" id="contadorEse" class="form-control" value="{{$cont}}">
                                  </div>

                                </div>

                            </div>
                            <span id="container-estudios">
                            </span><!-- contenedor estudios -->
                            <div class="row">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-8 text-right">
                                    <a  class='btn btn-success btn-block col-md-15 seleccionar'  id="SolicitarChEU" onclick="SolicitarChEU();">Solicitar</a>
                               </div>
                            </div>
                <!-- </div> -->
