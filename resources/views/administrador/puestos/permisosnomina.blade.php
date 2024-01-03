

<div class="col-md-12">

    <div class="form-group">
           
            <input type="hidden"  name="perfiles" id="perfiles" value="{{ $perfil or '' }}">
            @if($modo=='edicion')

                <div class="row">
                    <div class="form-group row col-md-6">
                        <label for="Perfil" class="col-sm-2 col-form-label col-form-label-sm">Perfil Nómina</label>
                        <div class="col-sm-6">
                            {{ Form::text('Perfil', $perfilN,['class' => 'form-control form-control-sm','placeholder' => 'Administrador','id'=>'Perfil','name'=>'Perfil','required']) }}
                        </div>
                    </div>
                    <div class="form-group row col-md-2">
                        <label for="Activo" class="col-sm-4 col-form-label">Activo</label>
                        <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input" id="Activo" name="Activo"  {{  ($Activo == 'Si' ? ' checked' : '') }} >
                        </div>
                       
                    </div>
                    <div class="form-group row col-md-2">
                        <label for="EditaMontos" class="col-sm-4 col-form-label">¿Podrá editar montos?  </label>
                        <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input" id="EditaMontos" name="EditaMontos"  {{  ($EditaMontos == 'Si' ? ' checked' : '') }} >
                        </div>
                    </div>
                    <div class="form-group row col-md-2">
                        <label for="GuardaReportes" class="col-sm-4 col-form-label">¿Podrá guardar reportes?</label>
                        <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input" id="GuardarReportes" name="GuardarReportes"  {{  ($GuardarReportes == 'Si' ? ' checked' : '') }} >
                        </div>
                    </div>
                </div>

            @else
               
                <div class="row">
                    <div class="form-group row col-md-6">
                        <label for="NombrePerfil" class="col-sm-2 col-form-label col-form-label-sm">Perfil Nómina</label>
                        <div class="col-sm-6">
                            {{ Form::text('Perfil', null,['class' => 'form-control form-control-sm','placeholder' => 'Administrador','id'=>'Perfil','name'=>'Perfil','required']) }}
                        </div>
                    </div>
                    <div class="form-group row col-md-2">
                        <label for="Activo" class="col-sm-4 col-form-label">Activo</label>
                        <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input" id="Activo" name="Activo"  {{  ($Activo == 'Si' ? ' checked' : '') }} >
                        </div>
                       
                    </div>
                    <div class="form-group row col-md-2">
                        <label for="EditaMontos" class="col-sm-4 col-form-label">¿Podrá editar montos?  </label>
                        <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input" id="EditaMontos" name="EditaMontos"  {{  ($EditaMontos == 'Si' ? ' checked' : '') }} >
                        </div>
                    </div>
                    <div class="form-group row col-md-2">
                        <label for="GuardaReportes" class="col-sm-4 col-form-label">¿Podrá guardar reportes?</label>
                        <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input" id="GuardarReportes" name="GuardarReportes"  {{  ($GuardarReportes == 'Si' ? ' checked' : '') }} >
                        </div>
                    </div>
                </div>
            @endif

    </div>
</div>

    <table id='TablaEntradas' class="table table-bordered table-responsive" style="width:100%">
         <thead>
            <tr>
               <th class="text-center"></th>
               <th class="text-center"></th>
               <th class="text-center"></th>
               <th class="text-center">Check</th>
               <th class="text-center">Aplicación</th>
               <th class="text-center">Acceder</th>
               <th class="text-center">Insertar</th>
               <th class="text-center">Editar</th>
               <th class="text-center">Eliminar</th>
               <th class="text-center">Exportar</th>
               <th class="text-center">Generar Plantilla</th>
               <th class="text-center">Importar Plantilla</th>
               <th class="text-center">Imprimir</th>
            </tr>
         </thead>
         <tbody>
         </tbody>
    </table>

    <div class="form-group">
        <div class="col-md-8 col-md-5">

            {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success col-md-8','id' => 'GuardarPerfilM']) }}

        </div>
    </div>
<!-- <div class="form-group">
    <div class="col-md-8 col-md-5">
    <button type="button" class="btn btn-sm btn-success col-md-8" id="GuardarPerfilM" name="GuardarPerfilM" onclick="GuardarPerfilM()">Guardar</button> -->
        <!-- <input type="button" id="GuardarPerfilM" name="GuardarPerfilM" value="Guardar" class="btn btn-sm btn-success col-md-3" onclick="GuardarPerfilM()"> -->
    <!-- </div>
</div> -->
