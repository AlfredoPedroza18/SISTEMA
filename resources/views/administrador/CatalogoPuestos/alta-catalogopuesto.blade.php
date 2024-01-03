<div class="jumbotron">
  
      <div class="row">
        <div class="col-md-12" >
          <div class="note note-success">
            <i class="fa fa-cubes fa-2x pull-left"></i><h4>Puestos</h4> 
          </div>	           					
        </div>
      </div>
      
      <div class="row">
                                                
        <div class="col-md-4">
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <label>{{ Form::label('Puesto', 'Código') }}</label>

            {{ Form::text('Codigo',null,['class' => 'form-control','placeholder'=>'Código','id'=>'Codigo','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
        </div>
        <div class="col-md-4">
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <label>{{ Form::label('Nombre', 'Nombre Puesto') }}</label>

            {{ Form::text('Nombre',null,['class' => 'form-control','placeholder'=>'Puesto + Nombre','id'=>'Nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
          </div>
      </div>                                
 
  <div class="row">
    <div class="col-md-4">
        <label>{{ Form::label('Empresa', 'Empresa') }}</label>
        {{ Form::select('IdEmpresa',$empresas,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'empresa']) }}                                                        
      </div>
                            
    <div class="col-md-4">
        <label>{{ Form::label('Activo', 'Activo') }}</label>
        <br>
        <input class="toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"<?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">
      </div>  

  </div>
  <div class="row">
    <div class="col-md-3 col-md-offset-8 text-right">
      {{ Form::submit('Guardar Puesto',['class' => 'btn btn-sm btn-success m-r-5','id' => 'create-cpuesto']) }}
    
    </div>
    <input type="hidden" id="num_id" value="{{ isset($Puestos)?$Puestos->IdPuesto:'' }}">
  </div>

</div>


