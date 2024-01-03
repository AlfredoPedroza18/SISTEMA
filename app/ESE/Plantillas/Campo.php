<?php

namespace App\ESE\Plantillas;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    protected $table 	  = 'ese_componentes_campos';
    protected $fillable	  = ['id_componente','label','key','descripcion','autocomplete',
                             'disabled','maxlength','placeholder','readonly','size','value',
                             'required','fecha_alta', 'parent_id', 'main', 'multiple', 'rows'];
    public 	  $timestamps = false;

    public function setLabelAttribute( $label )
    {
    	$this->attributes['label'] = strtolower( $label );
    }

    public function getLabelAttribute( $label )
    {
    	return ucwords( $label );
    }

    public function componente()
    {
    	return $this->belongsTo('App\ESE\Plantillas\Componente','id_componente');
    }

    public function formatos()
    {
    	return $this->belongsToMany('App\ESE\Plantillas\Formato','ese_campos_formatos','id_campo','id_formato');
    }

    public function campos()
    {
        return $this->hasMany('App\ESE\Plantillas\Campo','parent_id','id');
    }

    public function campoRaiz()
    {
        return $this->belongsTo('App\ESE\Plantillas\Campo','parent_id');
    }

    public function hasChilds()
    {
        $size_childs = $this->campos()->count();

        return ( $size_childs > 0 ? true : false );
    }


}
