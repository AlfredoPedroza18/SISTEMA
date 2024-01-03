<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class HabitosDetalleSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_habitos_detalle';
    protected $fillable = ['tipo','respuesta','cantidad','diario','semanal','quincenal','ocasional'];
    public $timestamps = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }


}
