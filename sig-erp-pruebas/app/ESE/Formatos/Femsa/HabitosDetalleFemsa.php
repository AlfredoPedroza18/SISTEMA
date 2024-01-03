<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class HabitosDetalleFemsa extends Model
{
    protected $table = 'ese_femsa_habitos_detalle';
    protected $fillable = ['tipo','respuesta','cantidad','diario','semanal','quincenal','ocasional'];
    public $timestamps = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }


}
