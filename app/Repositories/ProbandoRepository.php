<?php

namespace App\Repositories;

use App\Models\Probando;
use InfyOm\Generator\Common\BaseRepository;

class ProbandoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'edad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Probando::class;
    }
}
