<?php

namespace App\Repositories;

use App\Models\EspacioFisico;
use InfyOm\Generator\Common\BaseRepository;

class EspacioFisicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'esp_fisico',
        'esp_fisico_nombre',
        'ubicacion',
        'capacidad',
        'recursos',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EspacioFisico::class;
    }
}
