<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoDeGasto
 * @package App\Models
 * @version May 10, 2018, 2:01 am UTC
 */
class TipoDeGasto extends Model
{
    use SoftDeletes;

    public $table = 'tipo_de_gastos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipo',
        'condicion',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo' => 'string',
        'condicion' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required'
    ];

    public function user(){

        return $this->hasOne('App\User', 'id');
    }

     public function gasto()
    {
        return $this->hasMany('App\Models\Gasto');
    }
    
}
