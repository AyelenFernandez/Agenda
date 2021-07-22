<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EspacioFisico
 * @package App\Models
 */
class EspacioFisico extends Model
{
    use SoftDeletes;

    public $table = 'espacio_fisicos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'esp_fisico',
        'ubicacion',
        'capacidad',
        'recursos',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'esp_fisico' => 'string',
        'ubicacion' => 'string',
        'capacidad' => 'integer',
        'recursos' => 'string',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'esp_fisico' => 'required',
        'ubicacion' => 'required',
        'capacidad' => 'required'
    ];

    
}
