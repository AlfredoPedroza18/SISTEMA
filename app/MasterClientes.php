<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterClientes extends Model
{
    public $timestamps = false;
    protected $table = 'master_clientes';
    protected $primaryKey = 'IdCliente';
    protected $fillable = [
        'IdCliente',
        'Codigo',
        'Empresa',
        'RFC',
        'RazonSocial',
        'Nombre',
        'Calle',
        'No_ext',
        'No_int',
        'Colonia',
        'IdCiudad',
        'IdCodigoPostal',
        'CodigoPostal',
        'IdEmpresa',
        'IdEstado',
        'Correo',
        'Telefono_fijo',
        'Pagina_web',
        'Imagen',
        'Activo',
        'comentario',
        'id_ejecutivo',
        'id_contacto_principal',
        'tipo',
        'contrato_a',
        'medio_contacto',
        'tipo_cliente',
        'db_forma_pago',
        'db_banco',
        'db_dias_credito',
        'db_limite_credito',
        'db_cta_clientes',
        'db_clabe',
        'db_iva'
        
    ];
}
