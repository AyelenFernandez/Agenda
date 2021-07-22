<?php

namespace App\Repositories;

use App\Models\ReservaHora;
use InfyOm\Generator\Common\BaseRepository;

class fechaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'Entrada',
        'Salida',
        'evento_id',
        'espaciofisico_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ReservaHora::class;
    }
}
