<div class="jumbotron">
    <!-- begin row 1 -->
   <div class="row">
       <div class="col-md-12" >
        <div class="note note-success">
          <i class="fa fa-building-o fa-2x pull-left"></i><h4>Datos Fiscales</h4> 
      </div>	           					
   </div>
    </div> 
    <!-- ====================* DATOS FISCALES *===================> -->
              <div class="row">
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group block1">
                          <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                          <label>{{ Form::label('Nombre Comercial', '* Nombre Comercial') }}</label>

                              {{ Form::text('FK_Titulo',null,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'FK_Titulo','data-parsley-group'=>'wizard-step-1'])}}
                          


                          
                      </div>
                  </div>
                  <!-- end col-4 -->
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group">
                          

                          <label>{{ Form::label('Forma Juridica', ' Forma Juridica') }}</label>
                          <select id="FormaJuridica" name="FormaJuridica" class="form-control" type="text">
                            <option id="select" value="Selected">Selecciona una opci&oacute;n</option>
                            <option id="1" value="1">Persona Fisica</option>
                            <option id="2" value="2">Persona Moral</option>
                          </select>
<!-- {{ Form::select('FormaJuridica',[''=>'Selecciona una opci&oacute;n','1'=>'Persona Fisica','2'=>'Persona Moral'],null,['class'=>'form-control','data-parsley-group'=>'wizard-step-1','data-size'=>'10','id'=>'FormaJuridica']) }} -->



                      </div>
                  </div>
                  <!-- end col-4 -->
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group pm" style="display:none" >
                          <label>{{ Form::label('Razon Social', ' Razon Social') }}</label>
                          {{ Form::text('RazonSocial',null,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'RazonSocial','data-parsley-group'=>'wizard-step-1'])}}
                      </div>
                      <div class="form-group pf" style="display:none" id="pf_nombre" >
                          <label>{{ Form::label('Nombre',' Nombre') }}</label>
                          {{ Form::text('pf_nombre',null,['class' => 'form-control','placeholder'=>'Arturo','id'=>'pf_nombre','data-parsley-group'=>'wizard-step-1'])}}

                          
                      </div>
                  </div>
                  <!-- end col-4 -->
              </div>
              <!-- end row 1-->
               <!-- begin row 2-->
              <div class="row pf" style="display:none" >
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group block1" id="pf_apellido_paterno">
                          <label>{{ Form::label('Apellido Paterno', ' Apellido Paterno') }}</label>
                              {{ Form::text('pf_apellido_paterno',null,['class' => 'form-control','placeholder'=>'Gonzalez','id'=>'pf_apellido_paterno','data-parsley-group'=>'wizard-step-1'])}}

                                                                
                      </div>
                  </div>
                  <!-- end col-4 -->
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group" id="curp-nombre">
                       
                          <label>{{ Form::label('Apellido Materno', 'Apellido Materno') }}</label>
                          {{ Form::text('pf_apellido_materno',null,['class' => 'form-control','placeholder'=>'Tapia','id'=>'pf_apellido_materno','data-parsley-group'=>'wizard-step-1'])}}

                               
                      </div>
                  </div>
                  <!-- end col-4 -->
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group" id="pf_genero" >
                          <label>{{ Form::label('Genero', 'Genero') }}</label><br>
                          {{ Form::select('pf_genero',[''=>'Selecciona una opci&oacute;n','H'=>'Masculino','M'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'pf_genero']) }}
                  </div>
                  <!-- end col-4 -->
              </div>
          </div>
          <div class="row pm" style="display:none" >
               <div class="col-md-4">
                  <div class="form-group">
                   <label>Fecha de Constitución</label><br>
                      
                      
                         {{ Form::date('fecha_constitucion',null,['class' => 'form-control','id'=>'fecha_constitucion','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                   <label>Inicio de Operaciones</label><br>
                      
                      
                         {{ Form::date('fecha_inicio_operaciones',null,['class' => 'form-control','id'=>'fecha_inicio_operaciones','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}
                  </div>
                </div>
                  <div class="col-md-4">
                  <div class="form-group">
                   <label>Registro Mercantil</label><br>
                      
                      
                         {{ Form::date('fecha_registro_mercantil',null,['class' => 'form-control','id'=>'fecha_registro_mercantil','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}
                  </div>
                </div>
                
                
          </div>

              <!-- end row 2-->
              <div class="row pf" style="display:none" >
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group block1" id="pf_fecha_nacimiento">
                          <label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>
                             {{ Form::date('pf_fecha_nacimiento',null,['class' => 'form-control','id'=>'pf_fecha_nacimiento','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                              
                      </div>
                  </div>
                  <!-- end col-4 -->
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group" id="pf_lugar_nacimiento">
                       
                          <label>{{ Form::label('Lugar de Nacimiento', 'Lugar de Nacimiento') }}</label>
                         {{ Form::select('pf_lugar_nacimiento',$lugar_nacimiento,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'pf_lugar_nacimiento']) }}

                               
                      </div>
                  </div>
                  <!-- end col-4 -->
                  <!-- begin col-4 -->
                  <div class="col-md-4">
                      <div class="form-group" >
                          <label>{{ Form::label('CURP', 'CURP') }}</label>
                          {{ Form::text('pf_CURP',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'pf_CURP','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}
                      </div>
                  </div>
                  <!-- end col-4 -->
              </div>
              <!-- end row 2-->
              <!-- Begin row 3-->
                <div class="row">
                  <!-- begin col-1 -->
                   <div class="col-md-4">
                      <div class="form-group pm" style="display:none" >
                       
                          <label>{{ Form::label('CLASE DE PM', 'Clase de PM') }}</label>
{{ Form::select('clase_pm',[''=>'Selecciona una opci&oacute;n','1'=>'SA','2'=>'S.A de C.V','3'=>' S. de RL de CV','4'=>'SC','5'=>'AC'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'clase_pm']) }}
                       </div>
                        
                      <div class="form-group" >
                          <label>{{ Form::label('RFC ', ' RFC') }}</label>
                          {{ Form::text('Rfc',null,['class' => 'form-control','placeholder'=>'CUPU800825569','id'=>'Rfc','data-parsley-group'=>'wizard-step-1','maxlength'=>'13'])}}
                      </div>
                       

                  </div>
                  <!-- end col-1 -->
                  <!-- begin col-2-->
                  <div class="col-md-4">
                 
                      <div class="form-group" >
                          <label>{{ Form::label('Actividad Economica', 'Actividad Ecónomica') }}</label>

                          {{ Form::select('IdActividadEconomica',$actividad_economica,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'actividad_economica']) }}

                          
                      </div>
                      
                  </div>

                    <div class="col-md-4">

                        <div class="form-group" >
                            <label>{{ Form::label('Régimen Fiscal', 'Régimen Fiscal') }}</label>

                            {{ Form::select('RegimenFiscal',$regimenfiscal,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'RegimenFiscal']) }}


                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group" >
                            <label>{{ Form::label('Departamento', 'Departamento') }}</label>

                            <!-- {{ Form::select('IdDepartamento',$departamento,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'IdDepartamento']) }} -->
                            {{ Form::text('DeptW',null,['class' => 'form-control','placeholder'=>'Departamento','id'=>'DeptW','data-parsley-group'=>'wizard-step-1'])}}

                        </div>

                    </div>
                  <!-- end col-2 -->
                  

                </div><!-- end row 3-->
            <div class="row">
                   <div class="col-md-12" >
                    <div class="note note-success">
                      <i class="fa fa-shield fa-2x pull-left"></i><h4>Representante Legal</h4>
                  </div>	           					
               </div>
                </div>
                <!-- ====================* REPRESENTANTE LEGAL *===================> -->
                <div class="row">
                  <!-- begin col-1 -->
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('Nombre', 'Nombre') }}</label><br>
                          
                          {{ Form::text('RepresentanteLegal',null,['class' => 'form-control','placeholder'=>'Nombre','id'=>'RepresentanteLegal','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

                      </div>
                  </div>

                    <div class="col-md-3">

                        <div class="form-group" >
                            <label>{{ Form::label('RFC ', ' RFC') }}</label>
                            {{ Form::text('RFCRepresentante',null,['class' => 'form-control','placeholder'=>'CUPU800825569','id'=>'RFCRepresentante','data-parsley-group'=>'wizard-step-1','maxlength'=>'13'])}}
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group" >
                            <label>{{ Form::label('CURP', 'CURP') }}</label>
                            {{ Form::text('CURPRepresentante',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'CURPRepresentante','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}
                        </div>

                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                    <label>{{ Form::label('Telefono', 'Telefono') }}</label><br>
                    
{{ Form::text('telefono_representante',null,['class' => 'form-control','placeholder'=>'56987533','id'=>'telefono_representante','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>'10','onblur'=>'sizeTelefonos(this)'])}}
                     </div>
                     </div>

                </div>
                <div class="row">
                          
                           
                           <div class="col-md-3">
                            <div class="form-group">
                          <label>{{ Form::label('Correo', 'Correo') }}</label><br>
                          
                {{ Form::text('correo_representante',null,['class' => 'form-control','placeholder'=>'correo@dominio.com','id'=>'correo_representante','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>'','onblur'=>'validarEmail(this)'])}}
                           </div>
                           </div>

                </div>
               <div class="row">
                   <div class="col-md-12" >
                    <div class="note note-success">
                      <i class="fa fa-share-square-o fa-2x pull-left"></i><h4>Dirección Fiscal</h4>
                  </div>	           					
               </div>
                </div>
                <!-- ====================* DIRECCION FISCAL *===================> -->
                <!-- begin row 1-->
                <div class="row">
                    <!-- begin col-1 -->
                    <div class="col-md-3">
                        <!-- ====================* FORMULARIO *===================> -->
                        <form>
                                {{ csrf_field() }}
                            <div class="form-group" >
                                <label>{{ Form::label('Código Postal', 'Código Postal') }}</label>
        
                                
                                <div class="input-group">
                                    <input type="text" class="form-control" name="CP" value="{{ $cp or '' }}" id="searchcp"
                                    required
                                    data-live-search="true"
                                    data-parsley-group="wizard-step-1"
                                    data-style="btn-white"
                                    data-size="10"
                                    title="Es campo requerido"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="button" onclick="searchCP();">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </div>
                                <div id="alerta-cp">

                                </div>
    
                            </div>
                        </form>
                     <!-- ====================* FORMULARIO *===================> -->
                    </div>
    
              
                    <div class="col-md-3">
    
                        <div class="form-group" >
                            <label>{{ Form::label('Estado', 'Estado') }}</label>
    
                            
                            <input type="text" class="form-control" id="State" name="State" value="{{ $State or '' }}"  placeholder="Estado"data-live-search="true"
                            data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>
                            <input type="hidden"  id="IdEstado" name="IdEstado" value="{{ $IdState or '' }}">
                            <input type="hidden"  id="IdPais" name="IdPais" value="{{ $IdPais or '' }}">
                            <input type="hidden"  id="Localidad" name="Localidad" value="{{ $Localidad or '' }}">
                        </div>
    
                    </div>
                   
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{ Form::label('Municipio', ' Municipio') }}</label>
                           
    
    <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $Municipio or '' }}"  placeholder="Municipio"data-live-search="true"
                            data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>
    
                                                              
                        </div>
                    </div>
                   
                    <div class="col-md-3">
                 
                 <div class="form-group" >
                 
               
                     <label>{{ Form::label('Colonia', 'Colonia') }}</label>
                    <!-- {!! Form::select('Activo', ['1'=>'Si','2'=>'No'], null, ['class'=>'form-control', 'id'=>'Activo', 'required'=>'required']) !!}<br/> -->
                     <!-- {{ Form::select('Colonia',[$Colonia],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'Colonia']) }} -->
                     <select class="form-control" name="Colonia" id="Colonia">
                     
                     @foreach(explode(';',$Colonia) as $row)
                     <option value="{{ $row }}">{{ $row }}</option> 
                    @endforeach
                    </select>                        
                 </div>
                 
             </div>
                 
                 
                </div>
              <!-- end row 1-->
              <!-- begin row 2 -->
              <div class="row">
               
                <!-- end col-1 -->     
                <!-- begin col-2 -->
                <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('Calle', 'Calle') }}</label>
                          {{ Form::text('Calle',null,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'Calle','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
                      </div>
                  </div>
                <!-- end col-2 -->    
                <!-- begin col-3 -->
                <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>
                          {{ Form::text('NoExt',null,['class' => 'form-control','placeholder'=>'E12','id'=>'NoExt','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
                      </div>
                  </div>
                <!-- end col-3 -->  
                 <!-- begin col-4 -->
                <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('N° Interior', 'N° Interior') }}</label>
                          {{ Form::text('NoInt',null,['class' => 'form-control','placeholder'=>'99','id'=>'NoInt','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('Teléfono', 'Teléfono') }}</label><br>

                          {{ Form::text('Telefono',null,['class' => 'form-control','placeholder'=>'56987533','id'=>'telefono','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>'10','onblur'=>'sizeTelefonos(this)'])}}
                      </div>
                  </div>



                <!-- end col-4 -->                                            

              </div>

              <div class="row">

                 

                  <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('Correo', 'Correo') }}</label><br>

                          {{ Form::text('CorreoElectronico',null,['class' => 'form-control','placeholder'=>'correo@dominio.com','id'=>'correo','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>'','onblur'=>'validarEmail(this)'])}}
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="form-group">
                          <label>{{ Form::label('Página web', 'Página Web') }}</label><br>

                          {{ Form::text('Web',null,['class' => 'form-control','placeholder'=>'http://www.google.com','id'=>'paginaWeb','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>''])}}
                      </div>
                  </div>

              </div>
              <!-- end row 2 -->
              <br>
              <div class="row">
                  <div class="col-md-3 col-md-offset-8 text-right">
                
                    
                    <button type="button" class="btn btn-success btn-block" id="btnSaveEmpresa" onclick="hacer_click(this.id)" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Guardando...">Guardar Empresa {{($url_referer == "EmpresasFacturadoras")?'Facturadoras':'Maquiladoras'}}</button>

                  </div>
              </div>

              <input type="hidden" id="num_id" value="{{ isset($facturadora)?$facturadora->id:'' }}">
</div>

</div>
</div>

