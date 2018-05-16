<?php

namespace App\Repositories;

use App\Models\FormaDePago;
use InfyOm\Generator\Common\BaseRepository;

class FormaDePagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nombre',
        'condicion',
        'disponibilidad_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormaDePago::class;
    }
}
