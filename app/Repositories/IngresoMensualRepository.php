<?php

namespace App\Repositories;

use App\Models\IngresoMensual;
use InfyOm\Generator\Common\BaseRepository;

class IngresoMensualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'fecha',
        'cliente_id',
        'honorario',
        'condicion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return IngresoMensual::class;
    }
}
