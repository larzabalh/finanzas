<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FormaDePago
 * @package App\Models
 * @version May 16, 2018, 8:46 am -03
 */
class FormaDePago extends Model
{
    use SoftDeletes;

    public $table = 'forma_de_pagos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'nombre',
        'condicion',
        'disponibilidad_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'nombre' => 'string',
        'condicion' => 'string',
        'disponibilidad_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => "required|max:255|unique:forma_de_pagos",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function disponibilidad()
    {
        return $this->belongsTo('\App\Models\Disponibilidad','disponibilidad_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo('\App\User','user_id','id');
    }
}
