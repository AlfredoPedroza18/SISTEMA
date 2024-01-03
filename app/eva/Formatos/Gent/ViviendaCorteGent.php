<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaCorteGent extends Model
{
    protected $table = 'ese_gent_info_vivienda_corte';
    protected $fillable = ['completo','incompleto','escueto',];
    public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }

}
