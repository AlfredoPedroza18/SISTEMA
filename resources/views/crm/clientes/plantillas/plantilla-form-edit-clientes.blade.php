<div id="plantilla-edit-contacto">

<div class="contenedor-contacto">

        <div class="text-right list-contacto">

            <a class="btn btn-danger btn-icon btn-circle btn-lg remover-contacto" onclick="removeContacto(this)"><i class="fa fa-minus"></i></a>

        </div>

        <hr>

            <div class="row">

                <div class="col-md-3 col-md-offset-9">

                    <div class="form-group">

                        <label>

                            {{ Form::label('contacto', 'Contácto principal') }}&nbsp;

                            {{ Form::radio('contacto_first[]', null,true,['class' => 'seleccion_contacto','onclick'=>'setContactoPrincipal(this)']) }}

                            <input type="hidden" name="contacto_principal[]" value="{principal}" class="set-contacto-principal">

                        </label>



                    </div>

                </div>

            </div>

            <!-- begin row 1-->

            <div class="row">

                <!-- begin col-4 -->

                <div class="col-md-3">

                    <div class="form-group">

                        <label>{{ Form::label('Nombre', '* Nombre') }}</label>

                        <input type="hidden" class="contact-id" value="{id}" name="id[]">



                        {{ Form::text('nombre_con[]','{nombre_con}',['class' => 'form-control contact-name','placeholder'=>'Edgar','id'=>'nombre_con','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">

                        <label>{{ Form::label('Cargo', '* Cargo') }}</label>

                        {{ Form::text('cargo[]','{cargo}',['class' => 'form-control','placeholder'=>'Lider','id'=>'cargo','data-parsley-group'=>'wizard-step-4','maxlength'=>''])}}

                    </div>

                </div>

                                                   

                <div class="col-md-3">

                    <div class="form-group">

                        <label>{{ Form::label('Departamento', 'Departamento') }}</label>

                        {{ Form::text('departamento[]','{departamento}',['class' => 'form-control','placeholder'=>'Sistemas','id'=>'departamento','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                    </div>

                </div>

                <div class="col-md-3">
                
                    <div class="form-group">
                           
                        <label>{{ Form::label('Genero', 'Genéro') }}</label>

                        
                        {{ Form::select('genero_con[]',[''=>'Selecciona una opci&oacute;n','1'=>'Masculino','2'=>'Femenino'],$contacto->genero_con,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'genero_con']) }}

                    </div>

                </div>

                                                    <!-- end col-6 -->

            </div>

            

            <!-- end row1 -->

             <!-- begin row 2-->

            <div class="row">

            <!-- begin col-1 -->

               <div class="col-md-3">

                    <div class="form-group">

                         <label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>

                        {{ Form::date('fecha_nacimiento_con[]','{fecha_nacimiento_con}',['class' => 'form-control','placeholder'=>'Sistemas','id'=>'fecha_nacimiento_con','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                    </div>

                </div>

            <!-- endcol-1 -->

            <!-- begin col-2 -->

                 <div class="col-md-2">

                    <div class="form-group">

                         <label>{{ Form::label('telefono1', '* Teléfono 1') }}</label>

                        {{ Form::text('telefono1[]','{telefono1}',['class' => 'form-control telefono1 telefonos-size','placeholder'=>'58702093','id'=>'telefono1','data-parsley-group'=>'wizard-step-3','maxlength'=>'15','onblur'=>'sizeTelefonos(this)'])}}

                    </div>

                </div>

            <!-- end col-2 -->

            <!-- begin col-3 -->

                 <div class="col-md-1">

                    <div class="form-group">

                         <label>{{ Form::label('Extensión', 'Extensión') }}</label>

                        {{ Form::text('ext1[]','{ext1}',['class' => 'form-control ext1','placeholder'=>'140','id'=>'ext1','data-parsley-group'=>'wizard-step-3','maxlength'=>'5'])}}

                    </div>

                </div>

            <!-- end col-3 -->

             <!-- begin col-4 -->

                 <div class="col-md-2">

                    <div class="form-group">

                         <label>{{ Form::label('telefono2', 'Teléfono 2') }}</label>

                        {{ Form::text('telefono2[]','{telefono2}',['class' => 'form-control telefono2 telefonos-size','placeholder'=>'58702093','id'=>'telefono2','data-parsley-group'=>'wizard-step-3','maxlength'=>'15','onblur'=>'sizeTelefonos(this)'])}}

                    </div>

                </div>

            <!-- end col-4 -->

            <!-- begin col-5 -->

                 <div class="col-md-1">

                    <div class="form-group">

                         <label>{{ Form::label('Extemsión', 'Extensión') }}</label>

                        {{ Form::text('ext2[]','{ext2}',['class' => 'form-control ext2','placeholder'=>'140','id'=>'ext2','data-parsley-group'=>'wizard-step-3','maxlength'=>'5'])}}

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

                        {{ Form::text('celular1[]','{celular1}',['class' => 'form-control celular1','placeholder'=>'5589631475','id'=>'celular1','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

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

                        {{ Form::text('celular2[]','{celular2}',['class' => 'form-control celular2','placeholder'=>'5589631475','id'=>'celular2','data-parsley-group'=>'wizard-step-3','maxlength'=>'10'])}}

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

                        {{ Form::text('correo1[]','{correo1}',['class' => 'form-control class-email','placeholder'=>'emmail@domain.com','id'=>'correo1','data-parsley-group'=>'wizard-step-3','onblur'=>'validarEmail(this)'])}}

                    </div>

                </div>

            <!-- endcol-5 -->

               <!-- begin col-5 -->

            <div class="col-md-3">

                    <div class="form-group">

                         <label>{{ Form::label('Correo 2', 'Correo 2') }}</label>

                        {{ Form::text('correo2[]','{correo2}',['class' => 'form-control','placeholder'=>'emmail@domain.com','id'=>'correo2','data-parsley-group'=>'wizard-step-3','onblur'=>'validarEmail(this)'])}}



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

                        {{ Form::text('pagina_web[]','{pagina_web}',['class' => 'form-control','placeholder'=>'http://www.test.domain.com','id'=>'pagina_web','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}



                    </div>

                </div>

                <!-- end col-1 -->





             </div><!-- begin row 4 -->

    </div>

</div>

