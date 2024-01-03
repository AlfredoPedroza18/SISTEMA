<div class="col-md-4">
    <div class="form-group">
        <label class="col-md-3">Permiso</label>
        <div class="col-md-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Administrador', 'required' => 'required']) }}
            {{ Form::hidden('permisos', null, ['id' => 'lista_permisos']) }}
            @if ($errors->has('name'))
                <ul class="parsley-errors-list filled" id="parsley-id-1513">
                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                </ul>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Alias</label>
        <div class="col-md-9">
            {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Alias', 'required' => 'required', 'id' => 'alias_puesto']) }}
            @if ($errors->has('slug'))
                <ul class="parsley-errors-list filled" id="parsley-id-1513">
                    <li class="parsley-required">{{ $errors->first('slug') }}</li>
                </ul>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Descripción</label>
        <div class="col-md-9">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) }}
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="form-group">
        <div class="col-md-12">
            <div id="tree">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success m-r-5', 'id' => 'create-puesto']) }}
    </div>
</div>
