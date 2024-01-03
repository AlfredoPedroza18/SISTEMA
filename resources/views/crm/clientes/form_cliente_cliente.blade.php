
<label for="Nombre">Nombre</label>
<input type="text" id="Nombre" name="Nombre" />
<label for="Tipo">Tipo de cliente</label>
<select id="Tipo" >
    <option>Prospecto</option>
    <option>Cliente</option>
</select>

<label for="Tipo">Razon social</label>
<select id="Razon_social" >
    <option>1</option>
    <option>2</option>
</select>

<label for="RFC">RFC</label>
<input type="text" id="RFC" name="RFC" />

<label for="CURP">CURP</label>
<input type="text" id="CURP" name="CURP" />

<label for="Status">Status</label>
<select id="Status" >
    <option>Activo</option>
    <option>Inactivo</option>
</select>

<label for="dfcp">Codigo Postal</label>
<input type="number" id="dfcp" name="dfcp" />


<label for="dfestado">Estado</label>
<input type="text" id="dfestado" name="dfestado" />

<label for="dfmunicipio">Municipio</label>
<input type="text" id="dfmunicipio" name="dfmunicipio" />

<label for="dfcolonia">Colonia</label>
<input type="text" id="dfcolonia" name="dfcolonia" />

<label for="dfcalle">Calle</label>
<input type="text" id="dfcalle" name="dfcalle" />

<label for="dfinterior"># Interior</label>
<input type="text" id="dfinterior" name="dfinterior" />

<label for="dfexterior"># Exterior</label>
<input type="text" id="dfexterior" name="dfexterior" />

<hr><br>
<h3>Datos del DC</h3><br>

<!-- inicia dc  -->

<label for="dccp">Codigo Postal</label>
<input type="number" id="dccp" name="dccp" />

<label for="dcestado">Estado</label>
<input type="text" id="dcestado" name="dcestado" />

<label for="dcmunicipio">Municipio</label>
<input type="text" id="dcmunicipio" name="dcmunicipio" />

<label for="dccolonia">Colonia</label>
<input type="text" id="dccolonia" name="dccolonia" />

<label for="dccalle">Calle</label>
<input type="text" id="dccalle" name="dccalle" />

<label for="dcinterior"># Interior</label>
<input type="text" id="dcinterior" name="dcinterior" />

<label for="dcexterior"># Exterior</label>
<input type="text" id="dcexterior" name="dcexterior" />

<button onclick="crearCliente()">Guardar</button>

<!-- fin dc datos -->
<hr><br>

<label for="comentario">Comentario</label>
<input type="text" id="comentario" name="comentario" />

<label for="Forma_pago">Forma de pago</label>
<select id="Forma_pago" >
    <option>1</option>
    <option>2</option>
</select>

<label for="Banco">Banco</label>
<select id="Banco">
    <option>1</option>
    <option>2</option>
</select>




<script type="text/javascript">
    function crearCliente(){

        var nombre=document.getElementsByName("Nombre")[0].value;
        var token = $('meta[name="csrf-token"]').attr('content');
        console.log(nombre);
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url: "{{ url('clientes/crear') }}",
            type: "POST",
            data: {Nombre:nombre,


            },
            success: function( response )
            {
        console.log(response);
                swal({
                    title: "<h3>¡ Cliente creado !</h3> ",
                    html: true,
                    type: "success"

                });

            }
        });




    }


</script>

