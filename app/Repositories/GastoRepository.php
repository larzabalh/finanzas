<?php

namespace App\Repositories;

use App\Models\Gasto;
use InfyOm\Generator\Common\BaseRepository;

class GastoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'gasto',
        'user_id',
        'condicion',
        'tipo_de_gasto_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gasto::class;
    }
}
