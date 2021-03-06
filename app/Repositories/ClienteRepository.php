<?php

namespace App\Repositories;

use App\Models\Cliente;
use InfyOm\Generator\Common\BaseRepository;

class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'cliente',
        'honorario',
        'email',
        'facturador_id',
        'liquidador_id',
        'cobrador_id',
        'disponibilidad_id',
        'contacto',
        'comentario',
        'condicion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cliente::class;
    }
}
