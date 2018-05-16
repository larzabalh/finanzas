<?php

namespace App\Repositories;

use App\Models\Disponibilidad;
use InfyOm\Generator\Common\BaseRepository;

class DisponibilidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nombre',
        'comentario',
        'condicion',
        'medio_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Disponibilidad::class;
    }
}
