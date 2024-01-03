<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionesxInv extends Model
{
    protected $table = 'master_region_inv';
    protected $primaryKey = 'IdRegInv';
    protected $fillable = [
        'IdRegInv',
        'IdInvestigador',
        'IdRegion'
    ];
}
