<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class fecha
 * @package App\Models
 */
class ReservaHora extends Model
{
    

    public $table = 'fechas';
    
    public $fillable = [
        'Entrada',
        'Salida',
        'evento_id',
        'espaciofisico_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'evento_id' => 'integer',
        'espaciofisico_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Entrada' => 'required',
        'Salida' => 'required',
        'evento_id' => 'required',
        'espaciofisico_id' => 'required'
    ];

    public function aulaAsignada(){
        return $this->belongsTo('\App\Models\EspacioFisico', 'espaciofisico_id');        
    }
    public function scopeAulas($query, $id){
        return $query->where('evento_id', '=', $id);
    }
}