    <style>
        @charset "utf-8";

        .panel_ayuda {
            position:fixed;
            top: 100px;
            right: 5%;
            display: flex;
            justify-content: right;
            align-items: end;
            height: 80%;
            width: 60%;
            transition: transform 300ms;
            z-index: 1000;
        }

        .panel_ayuda div {
            margin-left: 10px;
            justify-content: left;
            align-items: center;
            background: #ffb76f;
            width: 35%;
            height: 25%;
            z-index: 1000;
            border-radius: 25px;
            border: 4px solid #1068c9;
        }

        .Titulo {
            width: 90% !important;
            height: 10% !important;
            text-align: center !important;
            margin: 10px;
            border: 0px !important;
        }

        .panel_ayuda[data-on='on'] {
            transform: scale(1);
        }

        .panel_ayuda[data-on='off'] {
            transform: scale(0);
        }

        .Imagen  {
            position:fixed;
            top: 87%;
            right: 1.2%;
            display: flex;
            justify-content: right;
            align-items: end;
            transition: transform 300ms;
            z-index: 1000;
        }

        .DetallesdeURL {
            width: 90% !important;
            height: 10% !important;
            margin-left: 25px !important;
            border: 0px !important;
            font-size: 14px;
        }
        .ocultaAyuda{
            display:none !important;
        }
    </style>

    <img  id="AyudaESEId" src="/gen-t/public/assets/img/Ayuda.png" class="Imagen ocultaAyuda" onclick="document.getElementById('aviso').setAttribute('data-on','on')">
    <div class="panel_ayuda" id="aviso" data-on="off" onclick="this.setAttribute('data-on','off')">
        <div>
            <div class="Titulo">
                <h4>Enlaces de Ayuda:</h4>
            </div>
            <div class="DetallesdeURL">
                <label><strong>INE:</strong></label>
                <a href="https://listanominal.ine.mx/scpln/" target="_blank">Lista nominal</a>
            </div>
            <div class="DetallesdeURL">
                <label><strong>CURP:</strong></label>
                <a href="https://www.gob.mx/curp/" target="_blank">Consulta tu CURP</a>
            </div>
            <div class="DetallesdeURL">
                <label><strong>SAT:</strong></label>
                <a href="https://agsc.siat.sat.gob.mx/PTSC/ValidaRFC/index.jsf" target="_blank">Validación de la clave
                    del RFC</a>
            </div>
            <div class="DetallesdeURL">
                <label><strong>IMSS:</strong></label>
                <a href="https://serviciosdigitales.imss.gob.mx/semanascotizadas-web/usuarios/IngresoAsegurado" target="_blank">Reporte de Semanas
                    Cotizadas</a>
            </div>
            <div class="DetallesdeURL">
                <label><strong>RNP:</strong></label>
                <a href="https://cedulaprofesional.sep.gob.mx/cedula/indexAvanzada.action" target="_blank">Consulta de cédulas profesionales</a>
            </div>
            <div class="Titulo">
                 <p>Pulsa en cualquier parte para cerrar</p>
            </div>
        </div>
    </div>