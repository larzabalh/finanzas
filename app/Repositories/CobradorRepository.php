<?php

namespace App\Repositories;

use App\Models\Cobrador;
use InfyOm\Generator\Common\BaseRepository;

class CobradorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'cobrador',
        'comentario',
        'condicion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cobrador::class;
    }
}
