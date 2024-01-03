<?php

namespace App\ESE\Plantillas;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table 	  = 'ese_campos_estudios_formatos';
    protected $fillable	  = ['id_estudio', 'id_componente','id_formato','key','value','label', 'main', 'multiple', 'rows','id_ese_asignado'];
    public 	  $timestamps = false;    

    public function setValueAttribute( $value )
    {
    	$this->attributes['value'] =  $value;
    }

    public function getValueAttribute( $value )
    {
    	return  $value;
    }

    public function estudio()
    {
    	return $this->belongsTo('App\ESE\EstudioEse','id_estudio');
    }

    public function campos()
    {
        return $this->hasMany('App\ESE\Plantillas\Field','parent_id','id');
    }

    public function campoRaiz()
    {
        return $this->belongsTo('App\ESE\Plantillas\Field','parent_id');
    }

    public function hasChilds()
    {
        $size_childs = $this->campos()->count();

        return ( $size_childs > 0 ? true : false );
    }

    public function fieldsRowsColums()
    {
        $fields = $this->campos;
        $counter = 0;
        $rows_fields = [];
        for( $i = 0; $i < $this->rows; $i++ ) 
        {
            $index          = $counter;
            $new_fields     = $fields->slice($index, $this->head_num_col );
            $rows_fields[]  = $new_fields;      

            $counter += $this->head_num_col;
        }

        return $rows_fields;
    }

    public function tableHead()// obtiene el encabezado de las tablas multiples
    {
        $fields = $this->campos;

        $head_label = $fields->slice(0, $this->head_num_col); 

        return $head_label->pluck('label');
    }
}
