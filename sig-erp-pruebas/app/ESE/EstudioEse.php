<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;
use App\ESE\Formatos\HSBC\FormatoHsbc;
use App\ESE\Formatos\METLIFE\FormatoMetlife;
use App\ESE\Formatos\Jll\FormatoJll;
use App\ESE\Formatos\Hddisc\formatoHddisc;
use App\ESE\Formatos\Femsa\formatoFemsa;
use App\ESE\Formatos\Evenplan\FormatoEvenplan;
use App\ESE\Formatos\ROA\FormatoRoa;
use App\ESE\Formatos\SegurosMty\FormatoSegurosMonterrey;
use App\ESE\Formatos\GNP\FormatoGnp;
use App\ESE\Formatos\BCM\FormatoBcm;
use App\ESE\Formatos\Gent\FormatoGent;
use App\ESE\ResultadoCandidato;
use Carbon\Carbon;


class EstudioEse extends Model
{
    const SIN_INICIAR = 1;
    const PROCESO     = 2;
    const CANCELADA   = 3;
    const CERRADA     = 4;
    const ASIGNADO    = 5;

    protected $table 		= 'estudio_ese_detalle';
    protected $fillable		= [	'id','id_tipo_estudio','id_os','costo','prioridad',
                                'estado','subtotal','iva','total','fecha_ingreso','fecha_actualizacion','fecha_visita','solicitado','codigo_depto_cliente','fecha_cierre','comentarios','comentarios_cierre','viaticos'];
	protected $hidden 		= [ 'id','fecha_ingreso','fecha_actualizacion' ];
    public 	  $timestamps	= false;

    public function getSolicitadoAttribute()
    {
        return ucwords( $this->attributes['solicitado'] );
    }

    public function setSolicitadoAttribute( $value )
    {
        return $this->attributes['solicitado'] = strtolower( $value );
    }

    public function getDateDemoAttribute()
    {   
        return date('Y-m-d',time());
    }

    public function getFechaIngresoAttribute()
    {   

        $fecha_ingreso_format = Carbon::parse($this->attributes['fecha_ingreso'])->format('Y-m-d');
        return $fecha_ingreso_format;
    }

    public function getFechaVisitaAttribute()
    {   
        if($this->attributes['fecha_visita'] != '0000-00-00 00:00:00')
        {
            $fecha_ingreso_format = Carbon::parse($this->attributes['fecha_visita'])->format('Y-m-d');
            return $fecha_ingreso_format;
        }

        return '0000-00-00 00:00:00';
        
    }

    public function getFechaVisitaFormatoAttribute()
    {   
        if($this->attributes['fecha_visita'] != '0000-00-00 00:00:00')
        {
            $fecha_ingreso_format = Carbon::parse($this->attributes['fecha_visita'])->format('Y-m-d');
            return $fecha_ingreso_format;
        }

        return 'Sin asignar';
        
    }

    public function iniciado()
    {
        return ($this->id_status == self::SIN_INICIAR); 
    }

    public function isAsignado()
    {
        return ( $this->id_status == self::ASIGNADO );
    }


    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','id_cliente');
    }

    public function ordenServicioEse()
    {
    	return $this->belongsTo('App\OS\OrdenServicioEse','id_os_ese');	
    }

    public function candidato()
    {
    	return $this->hasOne('App\ESE\Candidato','id_ese');	
    }
     public function cancelacionese()
    {
        return $this->hasOne('App\ESE\CancelacionEse','id_detalle'); 
    }

    public function prioridad_estudio()
    {
    	return $this->belongsTo('App\Prioridad','prioridad');	
    }

    public function tipoEstudio()
    {
    	return $this->belongsTo('App\TipoServicio','id_tipo_estudio');
    }

    public function status()
    {
        return $this->belongsTo('App\ESE\StatusEse','id_status');
    }

    public function ejecutivos()
    {
        return $this->belongsToMany('App\User','ese_usuarios','id_estudio','id_usuario')
                    ->withPivot('id_estudio','id_usuario','principal','status');
    }

    public function ejecutivoPrincipal()
    {
        return $this->belongsToMany('App\User','ese_usuarios','id_estudio','id_usuario')
                    ->wherePivot('principal', 2);
    }

    public function anexos()
    {
        return $this->hasMany('App\ESE\Anexo','id_ese');
    }

    public function imagenes()
    {
        return $this->hasMany('App\ESE\Imagen','id_ese');
    } 

    public function plantilla()
    {
        return $this->belongsTo('App\ESE\plantillas\Formato','id_plantilla');
    } 


    public function fields()
    {
        return $this->hasMany('App\ESE\plantillas\Field','id_estudio');
    } 

    public function getDifTime()
    {

        if( $this->fecha_visita != '0000-00-00 00:00:00')
        {

            $fecha_alta          = $this->fecha_ingreso;
            #$fecha_actualizacion = $this->fecha_cierre;
           # $fecha_actualizacion = $this->fecha_actualizacion;
            $fecha_visita        = $this->fecha_visita;


            $fecha_ingreso_format       = Carbon::parse($fecha_alta)->format('Y-m-d');
            $fecha_visita = Carbon::parse($fecha_visita)->format('Y-m-d');

            //$date_inicio =  Carbon::createFromFormat('Y-m-d',$fecha_ingreso_format);        
            $date_inicio =  Carbon::now();
            $date_fin    =  Carbon::createFromFormat('Y-m-d',$fecha_visita);        
            $date_dif    = $date_fin->diffInDays( $date_inicio );

            return $date_dif;
        }

        return 0;

    }

    public function getDiasAtraso()
    {

        if( $this->fecha_visita != '0000-00-00 00:00:00')
        {

            $simple_date_finaliza = $this->dateFinalize();
            $finaliza = Carbon::createFromFormat('Y-m-d',$simple_date_finaliza);
            $now      = Carbon::now(); 
            $date_dif = $finaliza->diffInDays( $now );
            return $date_dif;
        }

        return 0;

    }

    public function getStatusLabel()
    {
        $label = '';
        if($this->id_status== self::SIN_INICIAR)
        {
            $label="primary";            
        }      
        elseif($this->id_status== self::PROCESO){
            $label="warning";//estatus =2 en proceso
        }
        elseif($this->id_status== self::CANCELADA){
            $label='default'; //estatus =3 cancelado
        }
        elseif($this->id_status== self::CERRADA){
            $label='danger'; //estatus =4 cerrado
        }
        elseif($this->id_status== self::ASIGNADO){
            $label = 'info';
        }
    
        return $label;
    }  


    public function dateFinalize()
    {
        if( $this->fecha_visita != '0000-00-00 00:00:00' )
        {
            $fecha_fin = new Carbon( $this->fecha_visita );
            $dias_tipo = $this->prioridad_estudio->numero_maximo_dias; 
            

            return $fecha_fin->addDays( $dias_tipo )->format('Y-m-d');
        }

        return 0;

    }

    public function isBetweenMonth()
    {
        $flag             = false; 
        $date_start_month = Carbon::now()->startOfMonth()->format('Y-m-d');
        $date_end_month   = Carbon::now()->endOfMonth()->format('Y-m-d');
        $own_date         = new Carbon( $this->fecha_actualizacion );
        $start_month      = new Carbon( $date_start_month ); 
        $end_month        = new Carbon( $date_end_month ); 

        if( $own_date->gte($start_month) && $own_date->lt($end_month) ){
            $flag = true;
        }
        return $flag;
    }

    public function isRequestMonth()
    {
        $flag             = false; 
        $date_start_month = Carbon::now()->startOfMonth()->format('Y-m-d');
        $date_end_month   = Carbon::now()->endOfMonth()->format('Y-m-d');
        $own_date         = new Carbon( $this->fecha_ingreso );
        $start_month      = new Carbon( $date_start_month ); 
        $end_month        = new Carbon( $date_end_month ); 

        if( $own_date->gte($start_month) && $own_date->lt($end_month) ){
            $flag = true;
        }
        return $flag;
    }

    public function isClosed()
    {
        return ($this->attributes['id_status'] == self::CERRADA );
    }

    public function isOutTime()
    {
        $outTime = false;
        if( $this->fecha_visita != '0000-00-00 00:00:00' )
        {

            $now = Carbon::now();
            $date = $this->dateFinalize(); 
            $dateEstudio = new Carbon( $date );
            
            $outTime = $now->gte( $dateEstudio );

        }

        return $outTime;
    }

    public function formatoHsbc()
    {
        return $this->hasOne( FormatoHsbc::class, 'id_ese' );
    }

    public function resultado_final_ese()
    {
        return $this->belongsTo(ResultadoCandidato::class, 'resultado_ese' );
    }
       public function formatoMetlife()
    {
        return $this->hasOne( formatoMetlife::class, 'id_ese' );
    }

    public function formatoEvenplan()
    {
        return $this->hasOne( FormatoEvenplan::class, 'id_ese' );
    }

    public function formatoJll()
    {
        return $this->hasOne( FormatoJll::class, 'id_ese' );
    }
    public function formatoRoa(){

       return $this->hasOne( FormatoRoa::class,'id_ese');
    }

    public function formatoSM()
    {
        return $this->hasOne( FormatoSegurosMonterrey::class, 'id_ese' );
    }
      public function formatoGnp()
    {
        return $this->hasOne( FormatoGnp::class, 'id_ese' );
    }

    public function formatoHddisc()
    {
        return $this->hasOne( formatoHddisc::class, 'id_ese' );
    }

    public function formatoFemsa()
    {
        return $this->hasOne( formatoFemsa::class, 'id_ese' );
    }
    public function formatoBcm()
    {
        return $this->hasOne( formatoBcm::class, 'id_ese' );
    }
     public function formatoGent()
    {
        return $this->hasOne( formatoGent::class, 'id_ese' );
    }


    public function getDiaVisitaAttribute()
    {
        $dia_visita = $this->fecha_visita;
        if( $dia_visita != '0000-00-00 00:00:00' )
        {

            $fecha = explode('-', $dia_visita);
            return $fecha[2];
        }        

        return ' -- ';
    }

    public function getMesVisitaAttribute()
    {
        $dia_visita = $this->fecha_visita;
        if( $dia_visita != '0000-00-00 00:00:00' )
        {

            $fecha = explode('-', $dia_visita);
            return $fecha[1];
        }
        

        return ' -- ';
    }

    public function getAnioVisitaAttribute()
    {
        $dia_visita = $this->fecha_visita;
        if( $dia_visita != '0000-00-00 00:00:00' )
        {

            $fecha = explode('-', $dia_visita);
            return $fecha[0];
        }        

        return ' -- ';
    }

    

}
