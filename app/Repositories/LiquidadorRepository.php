<?php

namespace App\Repositories;

use App\Models\Liquidador;
use InfyOm\Generator\Common\BaseRepository;

class LiquidadorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'liquidador',
        'comentario',
        'condicion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Liquidador::class;
    }
}
