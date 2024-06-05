<style>

.caja{
    width: 420px;
    height: 200px;
    padding: 10px;
    background-color: {{isset($data->fondoF)?$data->fondoF:'black'}} ;
    border-radius: 3%;
}

.caja_hija1 {
    justify-content: center;
    align-items: center;
}

.caja_hija1 h4{
    color: {{isset($data->empresaF)?$data->empresaF:'orange'}} ;
    font-size: 30px;
    text-align: center;
}

.caja_hija2 {
    justify-content: left;
    align-items: left;

    color:{{isset($data->infoF)?$data->infoF:'orange'}} ;
}

</style>

<div class="col-md-6">


    <div class="row">

        <div class="col-md-3">
            <label for="nombre" style="margin-top: 5px;">Nombre de Plantilla</label>
        </div>

        <div class="col-md-7">
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($data->nombreP)?$data->nombreP:''}}">
        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-md-3">
            <label for="fondo" style="margin-top: 5px;">Color Fondo Firma</label>
        </div>

        <div class="col-md-3">
            <input type="color" name="fondo" id="fondo" class="form-control" onchange="cambio('fondo')" value="{{isset($data->fondoF)?$data->fondoF:''}}">
        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-md-3">
            <label for="empresa" style="margin-top: 5px;">Color nombre Empresa</label>
        </div>

        <div class="col-md-3">
            <input type="color" name="empresa" id="empresa" class="form-control"  onchange="cambio('empresa')" value="{{isset($data->empresaF)?$data->empresaF:'#FFA500'}}">
        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-md-3">
            <label for="info" style="margin-top: 5px;">Color información Usuario</label>
        </div>

        <div class="col-md-3">
            <input type="color" name="info" id="info" class="form-control"  onchange="cambio('info')" value="{{isset($data->infoF)?$data->infoF:'#FFA500'}}">
        </div>

    </div>

    <br>
    <div class="row">

        <div class="col-md-3">
            <label for="aviso">Aviso de privacidad</label>
        </div>

        <br>

        <div class="col-md-10">
            <textarea name="aviso" id="aviso" style="width: 100%; height: 250px;" value="{{isset($data->infoF)?$data->infoF:'#FFA500'}}">{{isset($data->aviso)?$data->aviso:''}}</textarea>
        </div>
    </div>

</div>

<div class="col-md-6" align=center>

    <div class="caja" id="fondoT">
        <div class="caja_hija1" >
            <h4 id="empresaT">Gen-T</h4>
        </div>
        <div class="caja_hija2" align =center id="infoT">
           
            <p>Nombre de usuario</p>
            <p>CorreUsuario@gmail.com</p>
            <p>Cel. 0000-000-000</p>
            <p>Direccion</p>
            <p>www.paginaWeb.com</p>
        </div>
    </div>

</div>


