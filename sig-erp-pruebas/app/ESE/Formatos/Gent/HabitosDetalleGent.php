<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class HabitosDetalleGent extends Model
{
    protected $table = 'ese_gent_habitos_detalle';
    protected $fillable = ['tipo','respuesta','cantidad','diario','semanal','quincenal','ocasional'];
    public $timestamps = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }


}
