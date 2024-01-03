@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    <li><a href="{{route('nuevoservicio')}}">Nuevo_Servicio</a></li>
        <li class="active">
            Encuestas-Nuevo_Servicio_Alta
        </li>
    </li>
</ol>

<style type="text/css">
  h2{
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  padding:2rem;
}
*{
margin:0;
}
</style>

<h1 class="page-header text-center">Nueva Solicitud<small>Alta</small></h1>

<br>

<form id="form-alta-tiposservicio" action="{{route('addmorePost')}}" method="POST">
{{ csrf_field() }}
<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading">
        <h4 class="panel-title">Servicio</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <label>{{ Form::label ('cliente', 'Cliente')}}</label>
            
                <input class="form-control" type="text" name="cliente" id="cliente" value="{{$cliente}}"required disabled>
                <input class="form-control" type="hidden" name="idcliente" id="idcliente" value="{{$IdCliente}}">

                <input class="form-control" type="hidden"  name="fecha" id="fecha" value="{{$fechadeservicio}}">
                
            </div>

            <div class="col-md-4">
                <label>{{ Form::label ('tiposervicio', 'Servicio')}}</label>
                <input class="form-control" type="text" name="servicio" id="servicio" value="{{$tiposervicio}}"required disabled>
                <input class="form-control" type="hidden" name="idTipoServicio" id="idTipoServicio" value="{{$IdTipoServicio}}">
            </div>

            <div class="col-md-4">
                <label>{{ Form::label ('fechadeservicio', '* Fecha de Servicio')}}</label>

                {{ Form::date('fechadeservicio',$fechadeservicio,['class' => 'form-control','id'=>'fechadeservicio','placeholder'=>'','data-parsley-group'=>'wizard-step-1','required'=>'required','disabled'=>'disabled'])}} <br>
            </div>

            <div class="col-md-8"></div>
            <div class="col-md-4">
                <label>{{ Form::label ('sumatoriapersonal', 'Total de Personas')}}</label>

                <input class="form-control" type="text" name="sumatoriapersonal" id="sumatoriapersonal" required disabled>
            </div>

            <br>
            <br>
            <br>
            <br>
        </div>  

    </div>
</div>

<!-- #2 -->

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading" style="background-color: #4472C4">
        <h4 class="panel-title">Centros de Trabajo</h4>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
            <tr>  
                <input type="hidden" name="addmore[0][IdCliente]" placeholder="" class="form-control" value="{{$IdCliente}}"/>
                <td><input type="text" name="addmore[0][Descripcion]" placeholder="" class="form-control" required /></td>  
                <td><input type="number" name="addmore[0][Cantidad]" placeholder="" class="form-control" min="1" id="0" value="0"  pattern="^[0-9]+" required /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Agregar más</button></td>  
            </tr>  
        </table> 
        </div>  

    </div>
</div>

<!-- #3 -->

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading" style="background-color: #4472C4">
        <h4 class="panel-title">Departamentos</h4>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table table-bordered" id="dynamicTableDepartamentos">  
            <tr>
                <th>Descripcion</th>
                <th>Acción</th>
            </tr>
            <tr> 
                <input type="hidden" name="addmoreDepartamentos[0][IdCliente]" placeholder="" class="form-control" value="{{$IdCliente}}"/>
                <td><input type="text" name="addmoreDepartamentos[0][Descripcion]" placeholder="" class="form-control" id="Dep0" required /></td>  
                <td><button type="button" name="addDepartamentos" id="addDepartamentos" class="btn btn-success">Agregar más</button></td>  
            </tr>  
        </table> 
        </div>  
    </div>
</div>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
    <div class="panel-heading" style="background-color: #4472C4">
        <h4 class="panel-title">Puestos</h4>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table table-bordered" id="dynamicTablePuestos">  
            <tr>
                <th>Descripcion</th>
                <th>Acción</th>
            </tr>
            <tr> 
                <input type="hidden" name="addmorePuestos[0][IdCliente]" placeholder="" class="form-control" value="{{$IdCliente}}"/>
                <td><input type="text" name="addmorePuestos[0][Descripcion]" placeholder="" class="form-control" id="Dep0" required /></td>  
                <td><button type="button" name="addPuestos" id="addPuestos" class="btn btn-success">Agregar más</button></td>  
            </tr>  
        </table> 
        </div>  
    </div>
</div>


<div class="row">
<div class="col-md-2 col-md-offset-1 text-left">
        <a href="../archivos/Plantilla Personal Encuestas.xlsx"><button type="button" class="btn btn-info btn-block">Descargar Plantilla</button></a>
    </div>

    <div class="col-md-2 col-md-offset-5 text-left">
        <input type="submit" name="Guardar" value="Solicitar" class="btn btn-success btn-block">
    </div>
</div>
</form>

<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="idcliente" id="idcliente" value="{{$IdCliente}}">
    <input class="form-control" type="hidden" name="idTipoServicio" id="idTipoServicio" value="{{$IdTipoServicio}}">
    <input class="form-control" type="hidden" name="fecha" id="fecha" value="{{$fechadeservicio}}">
    
    {{ csrf_field() }}
    Seleccione un archivo excel : <input type="file" name="file" accept=".xlsx"  class="form-control" required>
    <input type="submit" class="btn btn-primary btn-lg" value="Importar">
</form>

</div>

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script type="text/javascript">
  var contenido = document.getElementById("idcliente").value;
  var i = 0;
  var indicadorColumna=-1;
  var acumulador=0;
  var num1;
  var otro = 0;


function el(el) {
  return document.getElementById(el);
}

el('0').addEventListener('input',function() {
  var val = this.value;
  this.value = val.replace(/\D|\-/,'');
});  
  
$("#add").click(function(){
    ++i;
    ++indicadorColumna;
        $("#dynamicTable").append('<tr><input type="hidden" name="addmore['+i+'][IdCliente]" placeholder="" class="form-control" value="'+contenido+'"/><td><input type="text" name="addmore['+i+'][Descripcion]" placeholder="" class="form-control" required/></td><td><input type="number" name="addmore['+i+'][Cantidad]" placeholder="" class="form-control" id="'+i+'" required /></td><td><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');


        function el(el) {
        return document.getElementById(el);
        }

        el(i).addEventListener('input',function() {
        var val = this.value;
        this.value = val.replace(/\D|\-/,'');
        }); 

    });
      
var borrado = 0;
$(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
    ++borrado;
    setInterval(mandarMensaje, 1000);
});  

//Input dinamicos para departamentos
var n = 0;
$("#addDepartamentos").click(function(){
    ++n;
        $("#dynamicTableDepartamentos").append('<tr><input type="hidden" name="addmoreDepartamentos['+n+'][IdCliente]" placeholder="" class="form-control" value="'+contenido+'" required/><td><input type="text" name="addmoreDepartamentos['+n+'][Descripcion]" placeholder="" class="form-control" required/></td><td><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');       
    });
      
$(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
});  
//Finaliza inputs dinamicos de departamentos

//Input dinamicos para departamentos
var f = 0;
$("#addPuestos").click(function(){
    ++f;
        $("#dynamicTablePuestos").append('<tr><input type="hidden" name="addmorePuestos['+f+'][IdCliente]" placeholder="" class="form-control" value="'+contenido+'" required/><td><input type="text" name="addmorePuestos['+f+'][Descripcion]" placeholder="" class="form-control" required/></td><td><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');       
});
      
$(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
});  
//Finaliza inputs dinamicos de departamentos



//Refresh por cada segundo transcurrido
setInterval(mandarMensaje, 1000);

//Acción a realizar después del refresh
function mandarMensaje() {
  var totalIterar = i - borrado;
  
  acumulador = 0;
  

  for (let index = 0; index <=totalIterar; index++){ 
    var inputVal = document.getElementById(index).value;
    acumulador+= parseInt(inputVal);
    console.log("inputVal "+inputVal);
    document.getElementById("sumatoriapersonal").value = acumulador;
    borrado = 0;
  }

}

</script>

@endsection