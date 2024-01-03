<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class MasterEseEmpleado extends Model

{

    public $timestamps = false;

    protected $table = 'master_ese_empleado';

    protected $primaryKey = 'IdEmpleado';

    protected $fillable = [

        'IdEmpleado',

        'Rfc',

        'Curp',

        'Nombre',

        'SegundoNombre',

        'ApellidoPaterno',

        'ApellidoMaterno',

        'Genero',

        'IdBanco',

        'propietario_c',

        'NumCuenta',

        'NumTarjeta',

        'ClabeInt',

        'Email',

        'TelefonoMovil',

        'TelefonoLocal',

        'Extension',

        'Calle',

        'Colonia',

        'NoInt',

        'NoExt',

        'IdPais',

        'IdEstado',

        'Municipio',

        'Localidad',

        'IdCodigoPostal',

        'CodigoPostal',

        'Referencias',

        'CoordenadasGmaps',

        'url_ubicacion',

        'FechaAlta',

        'FechaModificacion',

        'IdPuesto',

        'Foto',

        'IdUsuario', 
        'EstatusInvestigadorId',
        'ComentarioEmpleado',
        'EstatusEmpleadosId'

    ];

}

