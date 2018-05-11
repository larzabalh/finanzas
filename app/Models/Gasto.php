<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gasto
 * @package App\Models
 * @version May 10, 2018, 12:07 pm UTC
 */
class Gasto extends Model
{
    use SoftDeletes;

    public $table = 'gastos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'gasto',
        'condicion',
        'tipo_de_gasto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'gasto' => 'string',
        'condicion' => 'integer',
        'tipo_de_gasto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'gasto' => 'required',
        'condicion' => 'required',
        'tipo_de_gasto_id' => 'required'
    ];

    public function tipoDeGasto(){

        return $this->hasOne('App\Models\TipoDeGasto', 'id');
        return $this->belongsTo('App\Models\TipoDeGasto', 'tipo_de_gasto_id', 'id');
    }

    
}
