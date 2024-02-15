<div class="jumbotron">
    <!-- begin row 1 -->
    <div class="row">
        <div class="col-md-12">
            <div class="note note-success">
                <i class="fa fa-cubes fa-2x pull-left"></i>
                <h4>Departamentos</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- begin col-4 -->
        <div class="col-md-4">
            <div class="form-group block1">
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <label>{{ Form::label('Departamento', '* Código') }}</label>
                {{ Form::text('nomenclatura',null,['class' => 'form-control','placeholder'=>'Departamento','id'=>'nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group block1">
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <label>{{ Form::label('Nombre', '* Nombre Departamento') }}</label>
                {{ Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Departamento + Nombre','id'=>'nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group block1">
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <label>{{ Form::label('Telefono', 'Telefono') }}</label>
                {{ Form::text('telefono',null,['class' => 'form-control phone_with_ddd','placeholder'=>'045-525-5555','id'=>'telefono','data-parsley-group'=>'wizard-step-1','required'=>'required','onblur'=>'sizeTelefonos(this)','maxlength'=>'10'])}}
            </div>
        </div>
    </div>
    <div class="row">
        <!-- begin col-1 -->
        <div class="col-md-3">
            <!-- ====================* FORMULARIO *===================> -->
            <form>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>{{ Form::label('Código Postal', 'Código Postal') }}</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="cp" value="{{ $cp or '' }}" id="searchcp" placeholder="Buscar CP" required data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />
                        <div class="input-group-btn">
                            <input value="&#xe003" class=" btn btn-primary btn-block glyphicon glyphicon-search" type="button" name="Buscar" onclick="searchCP()">
                        </div>
                    </div>
                </div>
            </form>
            <!-- ====================* FORMULARIO *===================> -->
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>{{ Form::label('Estado', 'Estado') }}</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{ $State or '' }}" placeholder="Estado" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />
                <input type="hidden" name="IdEstado" id="IdEstado" value="{{ $IdState or '' }}">
                <input type="hidden" name="IdPais" id="IdPais" value="{{ $IdPais or '' }}">
                <input type="hidden" name="Localidad" id="Localidad" value="{{ $Localidad or '' }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>{{ Form::label('Municipio', ' Municipio') }}</label>
                <input type="text" class="form-control" name="municipio" id="municipio" value="{{ $Municipio or '' }}" placeholder="Municipio" data-live-search="true" data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10" />
            </div>
        </div>
        <!-- <div class="col-md-3">
    <div class="form-group">
        <label>{{ Form::label('Colonia', 'Colonia') }}</label>
        <input type="text" class="form-control" name="colonia" value="{{ $Colonia or '' }}"   placeholder="Colonia"data-live-search="true"
               data-parsley-group="wizard-step-1" data-style="btn-white" data-size="10"/>
    </div>
</div> -->
        <div class="col-md-3">
            <div class="form-group">
                <label>{{ Form::label('Colonia', 'Colonia') }}</label>
                <!-- {!! Form::select('Activo', ['1'=>'Si','2'=>'No'], null, ['class'=>'form-control', 'id'=>'Activo', 'required'=>'required']) !!}<br/> -->
                <!-- {{ Form::select('Colonia',[$Colonia],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'Colonia']) }} -->
                <select class="form-control" name="colonia" id="colonia">
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
        <div class="col-md-4">
            <div class="form-group">
                <label>{{ Form::label('Calle', 'Calle') }}</label>
                {{ Form::text('calle',null,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'calle','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
            </div>
        </div>
        <!-- end col-2 -->
        <!-- begin col-3 -->
        <div class="col-md-2">
            <div class="form-group">
                <label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>
                {{ Form::text('no_exterior',null,['class' => 'form-control','placeholder'=>'E12','id'=>'no_exterior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-4 -->
        <div class="col-md-2">
            <div class="form-group">
                <label>{{ Form::label('N° Interior', 'N° Interior') }}</label>
                {{ Form::text('no_interior',null,['class' => 'form-control','placeholder'=>'99','id'=>'no_interior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-8 text-right">
            <!-- <button type="submit" class="btn btn-success btn-block" name="Guardar" onclick="hacer_click_depto({{ isset($depCn)?$depCn->id:'0' }})">Guardar Departamento</button>-->
            <input type="submit" name="Guardar" value="Guardar Departamento" class="btn btn-success btn-block" onclick="hacer_click_depto({{ isset($depCn)?$depCn->id:'0' }})">
        </div>
    </div>
</div>
<input type="hidden" id="num_id" value="{{ isset($depCn)?$depCn->id:'' }}">
<!-- end row -->
</div>
<script>
    function hacer_click() {
        var datos = $("#alta").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        console.log(datos);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '{{ url('
            EmpresasFacturadoras ') }}',
            type: 'POST',
            dataType: 'json',
            data: datos,
            success: function(response) {
                swal('' + response.status_alta);
                if (response.status_alta == 'success') {
                    swal({
                        title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                        html: true,
                        data: datos,
                        type: "success"
                    });
                    setTimeout(function() {
                        location.href = '{{ route("sig-erp-crm::EmpresasFacturadoras.index") }}';
                    });

                } else if (response.status_alta == 'wrong') {
                    swal({
                        title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",
                        html: true,
                        type: "warning",
                        confirmButtonText: "OK"
                    });
                }
                //setTimeout(function(){     location.reload();   }, 1000);
            },
            error: function(jqXHR, status, error) {
                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });
    }



</script>
