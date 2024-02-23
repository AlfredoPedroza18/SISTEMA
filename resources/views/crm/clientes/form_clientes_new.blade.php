{{ csrf_field() }}

                          <div id="wizard">

									<ol>

										<li>

										    Datos prospectos  <center><i class="fa fa-3x fa-group"></i>										   </center>

										</li>

										<li>

										    Dirección Fiscal<center><i class="fa fa-3x fa-book"></i>

										   </center>

										</li>

										<li>

										    Dirección Comercial<center><i class="fa fa-3x fa-home"></i>

										    </center>

										</li>

										<li>

										    Contácto ...<center><i class="fa fa-3x fa-male"></i>

										    </center>

										</li>

										<li>

										    Seguimiento de venta <center><i class="fa fa-3x fa-phone"></i>

										   </center>

										</li>

										

										<li>

										    Datos Bancarios<center><i class="fa fa-3x fa-money"></i></center>

										</li>



										<li>

										    Envío ...<center><i class="fa fa-3x fa-thumbs-up"></i></center>

										</li>

									</ol>

<!---------------------------------------- BEGIN DATOS DE PROSPECTO ----------------------------------------------  -->



									<!-- begin wizard step-1 -->

									<div class="wizard-step-1">

                                        <fieldset>

                                            <font size="1">Nota: (Los campos marcados con * son obligatorios )</font><p>



                                        
                                           <hr>



                                            <legend class="pull-left width-full">Datos Prospectos </legend> 





                                            <!-- begin row 1 -->

                                            <div class="row">

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

													<div class="form-group block1">



														<label>{{ Form::label('Nombre Comercial', '* Nombre Comercial') }}</label>



															{{ Form::text('nombre_comercial',null,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'nombre_comercial','data-parsley-group'=>'wizard-step-1','required'])}}







														

													</div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

													<div class="form-group">

								                        



														<label>{{ Form::label('Forma Juridica', 'Forma Juridica') }}</label>



{{ Form::select('forma_juridica',[''=>'Selecciona una opci&oacute;n','1'=>'Persona Fisica','2'=>'Persona Moral'],null,['class'=>'form-control','data-parsley-group'=>'wizard-step-1','data-size'=>'10','id'=>'forma_juridica']) }}





														     

													</div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

													<div class="form-group pm" style="display:none" >

														<label>{{ Form::label('Razon Social', 'Razon Social') }}</label>

														{{ Form::text('razon_social',null,['class' => 'form-control','placeholder'=>'S.A de C.V','id'=>'razon_social','data-parsley-group'=>'wizard-step-1'])}}

													</div>

													<div class="form-group pf" style="display:none" id="curp-nombre" >

														<label>{{ Form::label('Nombre','Nombre') }}</label>

														{{ Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Arturo','id'=>'nombre','data-parsley-group'=>'wizard-step-1'])}}



                                                        

													</div>

                                                </div>

                                                <!-- end col-4 -->

                                            </div>

                                            <!-- end row 1-->

                                             <!-- begin row 2-->

                                            <div class="row pf" style="display:none" >

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

													<div class="form-group block1" id="curp-apellido_paterno">

														<label>{{ Form::label('Apellido Paterno', 'Apellido Paterno') }}</label>

															{{ Form::text('apellido_paterno',null,['class' => 'form-control','placeholder'=>'Gonzalez','id'=>'apellido_paterno','data-parsley-group'=>'wizard-step-1'])}}



                                                      										

													</div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

													<div class="form-group" id="curp-nombre">

													 

														<label>{{ Form::label('Apellido Materno', 'Apellido Materno') }}</label>

														{{ Form::text('apellido_materno',null,['class' => 'form-control','placeholder'=>'Tapia','id'=>'apellido_materno','data-parsley-group'=>'wizard-step-1'])}}



														     

													</div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

													<div class="form-group" id="curp-genero" >

														<label>{{ Form::label('Genero', 'Genero') }}</label><br>

														{{ Form::select('genero',[''=>'Selecciona una opci&oacute;n','H'=>'Masculino','M'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'genero']) }}

                                                </div>

                                                <!-- end col-4 -->

                                            </div>

                                        </div>

                                            <!-- end row 2-->

                                            <div class="row pf" style="display:none" >

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

                                                    <div class="form-group block1" id="curp-fec_nacimiento">

                                                        <label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>

                                                           {{ Form::date('fecha_nacimiento_pros',null,['class' => 'form-control','id'=>'fecha_nacimiento_pros','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}



                                                                                            

                                                    </div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

                                                    <div class="form-group" id="curp-lugar_nacimiento">

                                                     

                                                        <label>{{ Form::label('Lugar de Nacimiento', 'Lugar de Nacimiento') }}</label>

                                                       {{ Form::select('lugar_nacimiento',$lugar_nacimiento,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'lugar_nacimiento']) }}



                                                             

                                                    </div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

                                                    <div class="form-group" >

                                                        <label>{{ Form::label('CURP', 'CURP') }}</label>

                                                        {{ Form::text('curp',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'curp','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}

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

                                                        <label>{{ Form::label('RFC ', 'RFC') }}</label>

                                                        {{ Form::text('rfc',null,['class' => 'form-control','placeholder'=>'CUPU800825569','id'=>'rfc','data-parsley-group'=>'wizard-step-1','maxlength'=>'15'])}}

                                                    </div>

                                                     



                                                </div>

                                                <!-- end col-1 -->

                                                <!-- begin col-2-->

                                                <div class="col-md-4">

                                               

                                                    <div class="form-group" >

                                                        <label>{{ Form::label('Actividad Economica', 'Actividad Ecónomica') }}</label>



                                                        {{ Form::select('actividad_economica',$actividad_economica,null,['class'=>'js-example-basic-multiple-limit default-select2 form-control input-lg form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'actividad_economica']) }}



                                                        

                                                    </div>

                                                    

                                                </div>

                                                <!-- end col-2 -->

                                                 <!-- begin col-3 -->

                                                <div class="col-md-4">

                                                    <div class="form-group block1">

                                                        <label>{{ Form::label('Status', 'Status') }}</label>

                                                            {{ Form::select('status',['1'=>'Activo','2'=>'Inactivo','3'=>'Suspención'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'status']) }}



                                                                                            

                                                    </div>

                                                    

                                                </div>

                                                <!-- end col-3 -->



                                              </div><!-- end row 3-->

                                             <!-- Begin row 3-->

                                              <div class="row">

                                              <div class="col-md-4">

                                                    <div class="form-group block1">



                                                        <label>{{ Form::label('Registro Patronal', 'Registro Patronal') }}</label>

{{ Form::select('registro_patronal',[''=>'Selecciona una opci&oacute;n','1'=>'Clase RT','2'=>'Clase I','3'=>'Clase II','4'=>'Clase III','5'=>'Clase IV','6'=>'Clase V'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'registro_patronal']) }}

                                                    </div>

                                             </div>

                                                  <div class="col-md-6">

                                                      <div class="form-group" >

                                                          <label>{{ Form::label('TipoDeCliente', '*Tipo de Cliente') }}</label>



                                                          {{ Form::select('TipoDeCliente',$tipoCliente,null,['class'=>'js-example-basic-multiple-limit default-select2 form-control input-lg form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'TipoDeCliente']) }}





                                                      </div>



                                                  </div>

                                              </div>

                                              
                                              <!-- end row -->

                                              <div class="form-group block1 row col-md-12" id="usuarios_clientes_pros" >

                                                <legend class="pull-left width-full">Datos de usuario </legend>

                                                <div class="col-md-3">
                                                    <div class="form-group block1">

                                                        <label>{{ Form::label('nombre_de_usuario','* Nombre de usuario') }}</label>

                                                        {{ Form::text('nombre_de_usuario','',['class' => 'form-control','placeholder'=>'Ejemplo: usuarioDelCliente3','onblur' => 'users();','id'=>'nombre_de_usuario','data-parsley-group'=>'wizard-step-1'])}}

                                                        <label id="alerta" nombre="alerta"></label>

                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group block1">

                                                    <label>{{ Form::label('contrasena','* Contraseña') }}</label>

                                                    <input type="text" name="contrasena" id="contrasena" class="form-control">
                                                    <label id="alerta" nombre="alerta"></label>

                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group block1">

                                                        <label>{{ Form::label('telefono_de_usuario','* Telefono') }}</label>

                                                        {{ Form::text('telefono_de_usuario','',['class' => 'form-control phone_with_ddd','placeholder'=>'Ejemplo: 921-302-0022','id'=>'telefono_de_usuario','data-parsley-group'=>'wizard-step-1'])}}


                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group block1">

                                                        <label>{{ Form::label('correo_de_usuario','* Correo') }}</label>

                                                        {{ Form::text('correo_de_usuario','',['class' => 'form-control','placeholder'=>'Ejemplo: default@gmail.com','id'=>'correo_de_usuario','data-parsley-group'=>'wizard-step-1'])}}

                                                    </div>
                                                </div>




                                                <br>

                                            </div>
                                            

										</fieldset>

									</div>

									<!-- end wizard step-1 -->

<!---------------------------------------- END DATOS DE PROSPECTO ----------------------------------------------  -->

<!---------------------------------------- BEGIN DATOS DIRECCIÓN FISCAL ----------------------------------------------  -->

									<!-- begin wizard step-2 -->

									<div class="wizard-step-2">

										<fieldset>

											<legend class="pull-left width-full">Dirección Fiscal</legend>

                                            <!-- begin row 1-->

                                            <div class="row">

                                                <!-- begin col-1 -->

                                                <!-- <div class="col-md-4">

													<div class="form-group">

														<label>{{ Form::label('CP', 'CP') }}</label><br>

                                                        {{ Form::select('df_cp',$cp,null,['class'=>'.js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','id'=>'df_cp','style'=>'width: 100%','onkeypress'=>'EnterCp(event)']) }}

                                                      



                                                        

													</div>

                                                </div> -->



                                                <div class="col-md-4">

													<div class="form-group">

                                                        <label>{{ Form::label('CP', 'CP') }}</label><br>

                                                        <input class="form-control" placeholder="México" id="df_cp" data-parsley-group="wizard-step-2" maxlength="" name="df_cp" type="text">

                                                    </div>

                                                </div>

                                                <!-- end col-1 -->

                                                

                                                <!-- begin col-3 -->

                                                <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Estado ', 'Estado ') }}</label>

                                                        {{ Form::text('df_estado',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'df_estado','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                                <!-- end col-3 -->

                                                <!-- begin col-3 -->

                                                <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Municipio', ' Municipio') }}</label>

                                                        {{ Form::text('df_municipio',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'df_municipio','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}  

                                                    </div>

                                                </div>

                                                <!-- end col-3 -->

                                                <!-- begin col-2 -->

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Colonia', 'Colonia') }}</label>

                                                       

                                                         <select name="df_colonia" class="form-control input-lg" data-live-search='true' data-parsley-group='wizard-step-1' data-style='btn-white' data-size='10' id='df_colonia'  style='width: 100%' >

                                                       

                                                        

                                                       </select>

                                                    </div>

                                                </div>

                                                <!-- end col-2 -->

                                            </div>

                                            <!-- end row 1-->

                                            <!-- begin row 2 -->

                                            <div class="row">

                                             <!-- begin col-1 -->

                                              <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Ciudad', 'Ciudad') }}</label>

                                                        {{ Form::text('df_ciudad',null,['class' => 'form-control','placeholder'=>'México','id'=>'df_ciudad','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 

                                                    </div>

                                                </div>

                                              <!-- end col-1 -->     

                                              <!-- begin col-2 -->

                                              <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Calle', 'Calle') }}</label>

                                                        {{ Form::text('df_calle',null,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'df_calle','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}              

                                                    </div>

                                                </div>

                                              <!-- end col-2 -->    

                                              <!-- begin col-3 -->

                                              <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>

                                                        {{ Form::text('df_num_exterior',null,['class' => 'form-control','placeholder'=>'E12','id'=>'df_num_exterior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 

                                                    </div>

                                                </div>

                                              <!-- end col-3 -->  

                                               <!-- begin col-4 -->

                                              <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('N° Interior', 'N° Interior') }}</label>

                                                        {{ Form::text('df_num_interior',null,['class' => 'form-control','placeholder'=>'99','id'=>'df_num_interior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 

                                                    </div>

                                                </div>

                                              <!-- end col-4 -->                                            



                                            </div>

                                            <!-- end row 2 -->



										</fieldset>

									</div>

									<!-- end wizard step-2 -->



<!---------------------------------------- END DATOS DE PROSPECTO DIRECCION FISCAL ----------------------------------------------  -->

<!---------------------------------------- BEGIN  DATOS DE PROSPECTO DIRECCION COMERCIAL ----------------------------------------------  -->

									<!-- begin wizard step-3 -->

									<div class="wizard-step-3">

										<fieldset>

											<legend class="pull-left width-full">Dirección Comercial</legend>



                                              <!-- begin row 1-->

                                            <div class="row">

                                                <!-- begin col-1 -->

                                                <!-- <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('CP', 'CP') }}</label>

                                                    



                                                         {{ Form::select('dc_cp',$cp,null,['class'=>'default-select2 form-control input-lg','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','id'=>'dc_cp','style'=>'width: 100%','onkeypress'=>'EnterCpDC(event)']) }}

                                                         

                                                    </div>

                                                </div> -->

                                                <div class="col-md-4">

													<div class="form-group">

                                                        <label>{{ Form::label('CP', 'CP') }}</label><br>

                                                        <input class="form-control" placeholder="México" id="dc_cp" data-parsley-group="wizard-step-2" maxlength="" name="dc_cp" type="text">

                                                    </div>

                                                </div>

                                                <!-- end col-1 -->

                                                <!-- begin col-2 -->

                                                <!-- begin col-3 -->

                                                <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Estado ', 'Estado ') }}</label>

                                                        {{ Form::text('dc_estado',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'dc_estado','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                                <!-- end col-3 -->

                                                <!-- begin col-3 -->

                                                <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Municipio', ' Municipio') }}</label>

                                                        {{ Form::text('dc_municipio',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'dc_municipio','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                                <!-- end col-3 -->

                                                <!-- begin col-2 -->

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Colonia', 'Colonia') }}</label>

                                                       

                                                         <select name="dc_colonia" class="default-select2 form-control input-lg" data-live-search='true'data-parsley-group='wizard-step-1' data-style='btn-white' data-size='10' id='dc_colonia'  style='width: 100%' title="sELECCIONA">

                                                       

                                                    

                                                       </select>

                                                    </div>

                                                </div>

                                                <!-- end col-2 -->

                                            </div>

                                            <!-- end row 1-->

                                            <!-- begin row 2 -->

                                            <div class="row">

                                             <!-- begin col-1 -->

                                              <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Ciudad', 'Ciudad') }}</label>

                                                        {{ Form::text('dc_ciudad',null,['class' => 'form-control','placeholder'=>'México','id'=>'dc_ciudad','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                              <!-- end col-1 -->     

                                              <!-- begin col-2 -->

                                              <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Calle', 'Calle') }}</label>

                                                        {{ Form::text('dc_calle',null,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'dc_calle','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                              <!-- end col-2 -->    

                                              <!-- begin col-3 -->

                                              <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>

                                                        {{ Form::text('dc_num_exterior',null,['class' => 'form-control','placeholder'=>'E12','id'=>'dc_num_exterior','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                              <!-- end col-3 -->  

                                               <!-- begin col-4 -->

                                              <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('N° Interior', 'N° Interior') }}</label>

                                                        {{ Form::text('dc_num_interior',null,['class' => 'form-control','placeholder'=>'99','id'=>'dc_num_interior','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                    </div>

                                                </div>

                                              <!-- end col-4 -->                                            



                                            </div>

                                            <!-- end row -->

                                           

                                        </fieldset>

									</div>

									<!-- end wizard step-3 -->

<!---------------------------------------- BEGIN  DATOS DE PROSPECTO DIRECCION COMERCIAL ----------------------------------------------  -->

<!---------------------------------------- BEGIN  DATOS DE Contácto ----------------------------------------------  -->



                                    

									<!-- begin wizard step-4 -->

									<div class="wizard-step-3">

										<fieldset>

											<legend class="pull-left col-md-2 col-lg-2 ">Contácto</legend>

                                            <div class="text-left  ">

                                                <a class="btn btn-warning btn-icon btn-circle btn-lg" id="add-contact"><i class="fa fa-plus"></i></a>

                                            </div>

                                        <hr>

                                          <div id="container-contacto">

                                              <div id="principal-contacto">  

                                                  <div class="col-md-3 col-md-offset-9">

                                                        <div class="form-group">

                                                            <label>

                                                                <label for="contacto">Contácto principal</label>

                                                                <input class="seleccion_contacto" name="contacto_first[]" type="radio" value="contacto_first[]">

                                                                <input type="hidden" name="contacto_principal[]" value="1" class="set-contacto-principal">

                                                            </label>

                                                            

                                                        </div>

                                                    </div>

                                                <div class="row">

                                                    <!-- begin col-4 -->

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <label>{{ Form::label('Nombre', '* Nombre') }}</label>

                                                            {{ Form::text('nombre_con[]',null,['class' => 'form-control','placeholder'=>'Edgar','id'=>'nombre_con','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                        </div>

                                                    </div>

                                                    <!-- end col-4 -->

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <label>{{ Form::label('Apellido Paterno', 'Apellido Paterno') }}</label>

                                                            {{ Form::text('ap_p[]',null,['class' => 'form-control','placeholder'=>'Perez','id'=>'ap_p','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <label>{{ Form::label('Apellido Materno', 'Apellido Materno') }}</label>

                                                            {{ Form::text('ap_m[]',null,['class' => 'form-control','placeholder'=>'Lopez','id'=>'ap_m','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                        </div>

                                                    </div>
                                                    <!-- begin col-4 -->

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <label>{{ Form::label('Cargo', 'Cargo') }}</label>

                                                            {{ Form::text('cargo[]',null,['class' => 'form-control','placeholder'=>'Lider','id'=>'cargo','data-parsley-group'=>'wizard-step-4','maxlength'=>''])}}

                                                            </div>

                                                    </div>

                                                   

                                                    <!-- end col-4 -->

                                                   

                                                </div>

                                                <!-- end row1 -->

                                                 <!-- begin row 2-->

                                                <div class="row">

                                                 <!-- begin col-4 -->
                                                  <!-- begin col-4 -->

                                                  <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Departamento', 'Departamento') }}</label>

                                                        {{ Form::text('departamento[]',null,['class' => 'form-control','placeholder'=>'Sistemas','id'=>'departamento','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                    </div>

                                                    </div>

                                                    <!-- end col-6 -->

                                                    <!-- begin col-4 -->

                                                    

<!-- end col-6 -->

                                                 

                                                    <!-- end col-6 -->

                                                    <!-- begin col-4 -->

                                                    

                                                    <!-- end col-6 -->
                                                <!-- begin col-1 -->

                                                   <div class="col-md-3">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>

                                                            {{ Form::date('fecha_nacimiento_con[]',null,['class' => 'form-control','placeholder'=>'Sistemas','id'=>'fecha_nacimiento_con','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                        </div>

                                                    </div>

                                                <!-- endcol-1 -->

                                                <!-- begin col-2 -->

                                                </div>


                                                <div class="row">
                                                    
                                                <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('telefono1', '* Teléfono 1') }}</label>

                                                        {{ Form::text('telefono1[]',null,['class' => 'form-control telefono1','placeholder'=>'58702093','id'=>'telefono1','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

                                                    </div>

                                                    </div>

                                                    <!-- end col-2 -->

                                                    <!-- begin col-3 -->

                                                    <div class="col-md-1">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Extensión', 'Extensión') }}</label>

                                                        {{ Form::text('ext1[]',null,['class' => 'form-control ext1','placeholder'=>'140','id'=>'ext1','data-parsley-group'=>'wizard-step-3'])}}

                                                    </div>

                                                    </div>

                                                    <!-- end col-3 -->

                                                    <!-- begin col-4 -->

                                                    <div class="col-md-2">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('telefono2', 'Teléfono 2') }}</label>

                                                        {{ Form::text('telefono2[]',null,['class' => 'form-control telefono2','placeholder'=>'58702093','id'=>'telefono2','data-parsley-group'=>'wizard-step-3','maxlength'=>'5','maxlength'=>'10'])}}

                                                    </div>

                                                    </div>

                                                    <!-- end col-4 -->

                                                    <!-- begin col-5 -->

                                                    <div class="col-md-1">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Extemsión', 'Extensión') }}</label>

                                                        {{ Form::text('ext2[]',null,['class' => 'form-control ext2','placeholder'=>'140','id'=>'ext2','data-parsley-group'=>'wizard-step-3','maxlength'=>'5'])}}

                                                    </div>

                                                    </div>

<!-- end col-5 -->
                                                </div>

                                                <!--  end row 2 -->

                                                <!-- begin row 3-->

                                                <div class="row">

                                                     <!-- begin col-1 -->

                                                   <div class="col-md-2">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Celular 1', '* Celular 1') }}</label>

                                                            {{ Form::text('celular1[]',null,['class' => 'form-control celular1','placeholder'=>'5589631475','id'=>'celular1','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

                                                        </div>

                                                    </div>

                                                <!-- endcol-2 -->

                                                    <!-- begin col-1 -->

                                                   <div class="col-md-1">

                                                        <div class="form-group">

                                                             

                                                        </div>

                                                    </div>

                                                <!-- endcol-2 -->

                                                <!-- begin col-3 -->

                                                <div class="col-md-2">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Celular 2', 'Celular 2') }}</label>

                                                            {{ Form::text('celular2[]',null,['class' => 'form-control celular2','placeholder'=>'5589631475','id'=>'celular2','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

                                                        </div>

                                                    </div>

                                                <!-- endcol-3 -->

                                                 <!-- begin col-4 -->

                                                   <div class="col-md-1">

                                                        <div class="form-group">

                                                             

                                                        </div>

                                                    </div>

                                                <!-- endcol-4 -->

                                                 <!-- begin col-5 -->

                                                <div class="col-md-3">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Correo 1', '* Correo 1') }}</label>

                                                            {{ Form::text('correo1[]',null,['class' => 'form-control','placeholder'=>'emmail@domain.com','id'=>'correo1','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}



                                                        </div>

                                                    </div>

                                                <!-- endcol-5 -->

                                                   <!-- begin col-5 -->

                                                <div class="col-md-3">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Correo 2', 'Correo 2') }}</label>

                                                            {{ Form::text('correo2[]',null,['class' => 'form-control','placeholder'=>'emmail@domain.com','id'=>'correo2','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}



                                                        </div>

                                                    </div>

                                                <!-- endcol-5 -->



                                                </div>

                                                <!-- end row 3 -->

                                                <!-- begin row 4 -->

                                                  <div class="row">

                                                     <!-- begin col-1 -->

                                                       <div class="col-md-3">

                                                        <div class="form-group">

                                                             <label>{{ Form::label('Página web', 'Página Web') }}</label>

                                                            {{ Form::text('pagina_web[]',null,['class' => 'form-control','placeholder'=>'http://www.test.domain.com','id'=>'pagina_web','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}



                                                        </div>

                                                    </div>

                                                    <!-- end col-1 -->

                                                   



                                                 </div><!-- begin row 4 -->

                                            </div>  

                                          </div><!-- contenedor contacto -->

                                        </fieldset>

									</div>

									<!-- end wizard step-4 -->

<!---------------------------------------- END DATOS DE Contácto ----------------------------------------------  -->

<!---------------------------------------- bGEGIN DATOS DE SEGUIMIENTO DE VENTA ----------------------------------------------  -->

									<!-- begin wizard step-5 -->

									<div class="wizard-step-3">

										<fieldset>

											<legend class="pull-left width-full">Seguimiento de venta</legend>

                                            <!-- begin row -->

                                            <div class="row">

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                      

                                                    <label>{{ Form::label('Medio de Contácto', '* Medio de Contácto') }}</label>

{{ Form::select('medio_contacto',[''=>'Selecciona una opci&oacute;n','Directorio'=>'Directorio','Evento'=>'Evento','3'=>'Página web','Mail'=>'Mail','Recomendación'=>'Recomendación','Sección Amarilla'=>'Sección amarilla','Teléfono'=>'Teléfono','Otro'=>'Otro'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'medio_contacto']) }}

                                                    <input type="text" name="medio_contacto" class='form-control' id="medio_contacto_tabla" >

                                                    </div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                         <label>{{ Form::label('Clientes Asignado a', '* Cliente asignado a') }}</label>

{{ Form::select('id_cn',$cn,null,['class'=>'default-select2 form-control input-lg','data-parsley-group'=>'wizard-step-1','id'=>'id_cn','style'=>'width: 100%']) }}

                                                    </div>

                                                </div>

                                                <!-- end col-4 -->

                                                <!-- begin col-4 -->

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                         <label>{{ Form::label('Nombre del ejecutivo', '* Nombre del ejecutivo') }}

                                                         </label>

                                                         

                                                         <select name="id_ejecutivo" class="default-select2 form-control input-lg" data-live-search='true'  data-parsley-group='wizard-step-1' data-style='btn-white' data-size='10' id='id_ejecutivo'  style='width: 100%'>

                                                            @foreach($eje as $ejecutivo => $valor)

                                                                <option value="{{$ejecutivo}}">{{$valor}}</option>

                                                             @endforeach

                                                       </select>



                                                    </div>

                                                </div>

                                                <!-- end col-6 -->

                                             </div>

                                            <!-- end row -->

                                            <!-- GEBIN ROW 2 -->

                                             <div class="row">

                                            <!-- begin col-1 -->

                                                <div class="col-md-4">

                                                  <div class="form-group">

                                                        <label>{{ Form::label('Contrato a', 'Contrato a') }}</label>

{{ Form::select('contrato_a',[""=>$contratoAAAA],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'contrato_a']) }}

                                                    </div>

                                                </div>

                                            <!-- end col-2 -->

                                            <div class="col-md-4">

                                                  <div class="form-group">

                                                        <label>{{ Form::label('Tipo de cliente', 'Tipo de cliente') }}</label>

{{ Form::select('tipo_cliente',$tipo_cliente_lista,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'tipo_cliente']) }}

                                                    </div>

                                                </div>

                                            <!-- end col-2-->

                                             <!-- end col-2 -->

                                            <div class="col-md-4">

                                                  <div class="form-group">

                                                        <label>{{ Form::label('Comentario', 'Comentario') }}</label>

                                                         <textarea class="form-control" rows="5" id="comentario" name="comentario"></textarea>



                                                    </div>

                                                </div>

                                            <!-- end col-2-->

                                            </div>

                                            <!--END ROW 2 -->

                                        </fieldset>

									</div>

									<!-- end wizard step-5 -->

<!---------------------------------------- END DATOS DE SEGUIMIENTO DE VENTA ----------------------------------------------  -->

<!---------------------------------------- begin  DATOS BANCARIOS ----------------------------------------------  -->

									<!-- begin wizard step-6 -->

									<div class="wizard-step-3">

										<fieldset>

											<legend class="pull-left width-full">Datos Bancarios</legend>

                                            <!-- begin row -->

                                            <div class="row">

                                                <!-- begin col-1 -->

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                         <label>{{ Form::label('db_Forma de pago', 'Forma de pago') }}</label>

{{ Form::select('db_forma_pago',[''=>'Selecciona una opci&oacute;n','1'=>'Cheque','2'=>'Transferencia','3'=>'Efectivo','4'=>'Otro'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'db_forma_pago']) }}

                                                    </div>

                                                </div>

                                                <!-- end col-1-->

                                                <!-- begin col-2 -->

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label>{{ Form::label('Banco', 'Banco') }}</label>



                                                        {{ Form::select('db_banco',$bancos,null,['class'=>'.js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','id'=>'db_banco','style'=>'width: 100%','onkeypress'=>'EnterCp(event)']) }}

            



                                                    </div>

                                                </div>

                                                <!-- end col-2 -->

                                                <!-- begin col-3 -->

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('Cuenta', 'Cuenta') }}</label>

                                                        {{ Form::number('db_cuenta','',['class' => 'form-control input-sm','placeholder'=>'5596317446','id'=>'db_cuenta','data-parsley-group'=>'wizard-step-2','maxlength'=>'10',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

                                                    </div>

                                                </div>

                                                <!-- end col-3-->

                                                <!-- begin col-4-->

                                                 <div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('Clabe', 'Clabe') }}</label>

                                                        {{ Form::number('db_clabe','',['class' => 'form-control input-sm','placeholder'=>'369852145632897103','id'=>'db_clabe','data-parsley-group'=>'wizard-step-2','maxlength'=>'18',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

                                                    </div>

                                                </div>

                                                <!-- end col4 -->

                                            </div>

                                            <!-- end row 1-->

                                             <!-- begin row 2 -->

                                            <div class="row">

                                                 <!-- begin col-1-->

                                                 <div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('Dias Credito', 'Dias Crédito') }}</label>

                                                        {{ Form::select('db_dias_credito',[''=>'Selecciona una opci&oacute;n','1'=>'15','2'=>'30','3'=>'45','4'=>'90'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'db_dias_credito']) }} 

                                                    </div>

                                                </div>

                                                <!-- end col1 -->

                                                   <!-- begin col-2-->

                                                 <div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('Limite de  Credito', 'Limite de Crédito') }}</label>

                                                       {{ Form::number('db_limite_credito','',['class' => 'form-control input-sm','placeholder'=>'99974','id'=>'db_limite_credito','step'=>'any','data-parsley-group'=>'wizard-step-2','maxlength'=>'12',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

                                                    </div>

                                                </div>

                                                <!-- end col-2 -->

                                                <!-- begin col-3-->

                                                 <div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('Cuenta Clientes', 'Cuenta Clientes') }}</label>

                                                       {{ Form::text('db_cta_clientes',null,['class' => 'form-control input-sm','placeholder'=>'99974','id'=>'db_cta_clientes','step'=>'any','data-parsley-group'=>'wizard-step-2','maxlength'=>'10',' oninput'=>'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])}}

                                                    </div>

                                                </div>

                                                <!-- end col-3 -->

                                                 <!-- begin col-4-->

                                                 <div class="col-md-3">

                                                    <div class="form-group">

                                                       <label>{{ Form::label('IVA', 'IVA') }}</label>

                                                       {{ Form::select('db_iva',[''=>'Selecciona una opci&oacute;n','0'=>'0%','11'=>'11%','16'=>'16%','1'=>'Excento'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'db_iva']) }} 

                                                    </div>

                                                </div>

                                                <!-- end col-4 -->



                                            </div>

                                            <!-- end row 2 -->

                                        </fieldset>

									</div>

									<!-- end wizard step-6 -->

<!---------------------------------------- END  DATOS BANCARIOS ----------------------------------------------  -->

									<!-- begin wizard step-7-->

									<div class="wizard-step-3 final">

									    <div class="jumbotron m-b-0 text-center">

                                            <h4>Formulario llenado correctamente</h4>

                                             <!-- Nombre comercial-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left nombre_comercial"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!-- end nombre comercial -->

                                         <!-- Forma Juridica-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left forma_juridica"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!-- end nombre comercial -->

                                         <!-- Nombre-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left nombre"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!-- endnombre -->

                                         <!-- Apellido p.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left apellido_paterno"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Apellido p.-->

                                         <!-- Apellido m.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left apellido_materno"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Apellido m.-->

                                         <!-- Apellido m.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left genero"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Apellido m.-->

                                          <!--Fecha nacimiento prospecto-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left fecha_nacimiento_pros"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Fecha nacimiento prospecto.-->

                                         <!--Lugar de Nac.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left lugar_nacimiento"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Lugar Nac.-->

                                         <!--Razon Social.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left razon_social"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Razon Social.-->

                                         <!--Razon Social.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left rfc"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  Razon Social.-->

                                         <!--Nombre Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left nombre_con"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End Nombre cont.-->

                                         <!--Cargo Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left cargo"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End Cargo cont.-->

                                          <!--telefono Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left telefono1"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End telefono cont.-->

                                         <!--celular Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left celular1"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End Celular1 cont.-->

                                         <!--correo 1 Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left celular1"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End Correo cont.-->

                                         <!--pagina_web1 Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left pagina_web"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End pagina_web cont.-->

                                         <!--Medio de  Contacto.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left medio_contacto"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End medio de cont.-->

                                          <!--ID_CN.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left id_cn"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End ID_CN.-->

                                          <!--ID_EJECUTIVO.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left id_ejecutivo"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End ID_EJECUTIVO.-->

                                         <!--ID_EJECUTIVO.-->

                                            <div class="row">

                                             <div class="col-md-6 col-md-offset-3">

                                                <div  class="text-left contrato_a"> 

                                                </div>

                                            </div>

                                            </div>

                                         <!--  End ID_EJECUTIVO.-->

                                            

                                             {{ Form::button('Guardar cliente', ['class' => 'btn btn-success btn-lg','id' => 'btn-alta-cliente']) }}</p>

                                        </div>

									</div>

									<!-- end wizard step-7 -->

								</div>











