<?php

namespace App\Repositories;

use App\Models\Medio;
use InfyOm\Generator\Common\BaseRepository;

class MedioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nombre',
        'condicion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Medio::class;
    }
}
