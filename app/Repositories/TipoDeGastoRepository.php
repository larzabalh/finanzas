<?php

namespace App\Repositories;

use App\Models\TipoDeGasto;
use InfyOm\Generator\Common\BaseRepository;

class TipoDeGastoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'condicion',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoDeGasto::class;
    }
}
