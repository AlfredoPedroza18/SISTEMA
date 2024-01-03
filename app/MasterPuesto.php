<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPuesto extends Model
{
    public $timestamps = false;
    protected $table = 'master_puesto';
    protected $primaryKey = 'IdPuesto';
    protected $fillable = [
        'IdPuesto',
        'Codigo',
        'Nombre',
        'IdEmpresa',
        'Activo',
        'DescripcionFunciones',
        'Numero',
        'Texto',
        'Ingles',
        'SubCuenta',
        'CodClasificacion',
        'IdTurno',
        'IdRegistroPatronal',
        'IdTipoContrato',
        'IdEnLabor',
        'IdGerencia',
        'IdPlaza',
        'IdCliente',
        'IdDepartamento',
        'IdCentroCostos',
        'IdZonaTrabajo',
        'IdPrestaciones',
        'IdOcupacionN',
        'IdZonaGeografica',
        'IdAreaOcupaciones',
        'IdRiesgoPuesto',
        'IdTablaISN',
        'Status',
        'SalarioPuesto',
        'Costo1',
        'Costo2',
        'Costo3',
        'CodTurno',
        'CosRegistro',
        'CodTipoContrato',
        'CodEnLabor',
        'CodGerencia',
        'CodPlaza',
        'CodCliente',
        'CodDepart',
        'CodOcupacionN',
        'CodCentroC',
        'CodPrest',
        'CodAreaOcup',
        'CodRiesgoP',
        'Confidencial',
        'ConfiabilidadUsuarios'
    ];
}
