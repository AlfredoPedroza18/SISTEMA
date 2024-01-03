<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEseEmpleadosDoc extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_empleadosdocumentos';
    protected $primaryKey = 'IdDocumentoEmpleado';
    protected $fillable = [
        'IdDocumentoEmpleado',
        'IdEmpleado',
        'ArchivoFoto',
        'ArchivoReferencias',
        'ArchivoConvenio',
        'ArchivoActaNacimiento',
        'ArchivoIdentificacion',
        'ArchivoPasaporte',
        'ArchivoCurp',
        'ArchivoRfc',
        'ArchivoCv',
        'ArchivoComprobante',
        'ArchivoNss',
        'ArchivoCuentaBancaria',
        'ArchivoDocumentosExtras',
        'FechaAlta',
        'FechaModificacion'
    ];
}
