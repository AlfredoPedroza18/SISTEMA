<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesGent extends Model
{
    protected $table = 'ese_gent_datos_generales';
    protected $fillable = [ 'id_formato',
                            'nombre',
                            'sexo',
                            'edad',
                            'fecha_nacimiento',
                            'lugar_nacimiento',
                            'nacionalidad',
                            'edo_civil',
                            'fecha_matrimonio',
                            'calle',
                            'no_exterior',
                            'no_interior',
                            'delegacion',
                            'colonia',
                            'email',
                            'telefono',
                            'cp',
                            'tiempo_domicilio',
                            'celular',
                            'puesto',
                            'telefono_recados',
                            'entre_calles'];

    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}
