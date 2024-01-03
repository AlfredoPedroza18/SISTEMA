<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ResumenSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_resumen';
    protected $fillable = [ 'id_ese', 'id_formato', 'fecha', 'empresa', 'nombre', 'puesto', 'estatus', 'situacion_socioeconomica',
    						'escolaridad', 'trayectoria_laboral', 'disponibilidad', 'puntualidad', 'seriedad', 'actitud', 
    						'confiabilidad', 'seguridad_en_si_mismo', 'presentacion','comentarios'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}
