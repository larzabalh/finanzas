<?php

namespace App\Repositories;

use App\Models\Facturador;
use InfyOm\Generator\Common\BaseRepository;

class FacturadorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'facturador',
        'comentario',
        'condicion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Facturador::class;
    }
}
