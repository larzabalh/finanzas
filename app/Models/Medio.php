<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medio
 * @package App\Models
 * @version May 16, 2018, 1:35 am UTC
 */
class Medio extends Model
{
    use SoftDeletes;

    public $table = 'medios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'nombre',
        'condicion'
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
        'condicion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'gasto' => "required|max:255|unique:medios",
        'user_id' => 'required',
        'tipo_de_gasto_id' => 'required'
    ];

    //Relacion
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function disponibilidades()
    {
        return $this->hasMany(\App\Models\Disponibilidade::class);
    }
}
