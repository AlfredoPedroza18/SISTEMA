
<span id="plantilla-estudios">


        <span id="contenedor-estudiosEstudioP">
            <span class="text-right list-contacto PruebaBotonOculto" id="botonesMM" style="width:100%; display:none;">
                <span id="btnAdd"></span>

                <button class="btn btn-link" data-toggle="collapse" style="padding-right: 10px;
                padding-top: 0px;
                padding-bottom: 0px;
                border-bottom-width: 0px;
                border-top-width: 0px;
                height: 28px;" href="#collapseExampleEstudioP"  role="button" aria-expanded="true" aria-controls="collapseExample">
                        <table class="table" style="width:100%;">
                          <tr>
                              <td> <strong>Candidato:</strong> <span class="changCandidatoEstudioP" id="Nombre-EstudioP">N/A</span></td>
                              <td> <strong>Servicio:</strong> <span class="changservEstudioP" id="Servicio-EstudioP" >N/A</span></td>
                              <td><strong>Modalidad:</strong> <span class="changMdEstudioP" id="mod-EstudioP">N/A&nbsp;</span> </td>
                              <td> <strong>Prioridad:</strong> <span class="changPrEstudioP" id="Prioridad-EstudioP">N/A</span></td>
                          </tr>
                        </table>
                </button>
  
                <a style="display:none;" class="btn btn-warning btn-icon btn-circle btn-lg PruebaBotonOculto" onclick="AddEstudio()" ><i class="fa fa-plus"></i></a>
                <a style="display:none;" class="btn btn-danger btn-icon btn-circle btn-lg cambiar-clase PruebaBotonOculto" onclick="removeEstudio(this,'EstudioP')"><i class="fa fa-minus"></i></a>
            </span>
			
            <hr  style="height:1px;border-width:0;margin-bottom: 0px;margin-top: 0px;">
            <span class="collapse" id="collapseExampleEstudioP">
                <ul style="display:none;" class="nav nav-tabs" >
                    <li><a style="display:none;" href="#EstudioP" id="idCopEstudioP" aria-controls="Estudio"  role="tab"  data-toggle="tab"></a></li>
                </ul>
                <span id="aux-EstudioP">
                </span>
                <!-- <div  class="tab-content" id="nav-tabContent"> -->
                    <span  id="EstudioP" role="tabpanel" aria-labelledby="Estudio-tab">
                        <span class="row">
                            <span id="Modalidad" class="col-md-3">
                                <span class="form-group block1">
                                    <label>{{ Form::label('Modalidad', '* Modalidad') }}</label>
                                        <select class="form-control" name="IdModalidadEstudioP" id="IdModalidadEstudioP" onchange="GModalidadC('EstudioP');" required>
                                            <!-- <option value=''>Seleccione Modalidad</option> -->
                                            @foreach($modalidades as $md)
                                                <option id="{{$md->IdModalidad }}-EstudioP"  value="{{ $md->IdModalidad }}" >{{ $md->Descripcion }}</option>
                                            @endforeach
                                        </select>
                                </span>
                            </span>
                            <span id="Prioridad" class="col-md-3">
                                <span class="form-group block1">
                                    <label>{{ Form::label('Prioridad', '* Prioridad') }}</label>
                                    <select class="form-control" name="IdPrioridadEstudioP" id="IdPrioridadEstudioP" onchange="GPrioridadC('EstudioP');" required>
                                        <!-- <option value=''>Seleccione Prioridad</option> -->
                                        @foreach($prioridades as $pr)
                                            <option id="{{$pr->IdPrioridad }}-EstudioP" value="{{ $pr->IdPrioridad }}" >{{ $pr->Descripcion }}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </span>
                        </span>
                        <span id="mensMPC"></span>
                        <span id="EstudioP-form" action="javascript:EntradasEstudio('EstudioP');" >
                            <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="3" />
                            <span class="row">
                                <span id="EstudioP-formC" class="tab-v1">
                                    <ul class="nav nav-tabs" id="grpos">
                                    </ul>
                                    <span  id="grps">
                                    </span>
                                </span>
                            </span>

                        </span>

                    </span>
                <!-- </div> -->
            </span>
        </span>
        <span class="row">
        </span>
        <br>

</span>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".PruebaBotonOculto").fadeIn(100);
    },200);
});
</script>