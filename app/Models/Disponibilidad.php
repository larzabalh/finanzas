<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Disponibilidad
 * @package App\Models
 * @version May 16, 2018, 1:38 am UTC
 */
class Disponibilidad extends Model
{
    use SoftDeletes;

    public $table = 'disponibilidades';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'nombre',
        'comentario',
        'condicion',
        'medio_id'
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
        'comentario' => 'string',
        'condicion' => 'string',
        'medio_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
   public static $rules = [
        'nombre' => "required|max:255|unique:disponibilidades",
        'medio_id' => 'required',
    ];

    //Relacion
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function medio()
    {
        return $this->belongsTo('\App\Models\Medio','medio_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formaDePagos()
    {
        return $this->hasMany(\App\Models\FormaDePago::class);
    }
}
