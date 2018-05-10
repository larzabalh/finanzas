<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gasto
 * @package App\Models
 * @version May 10, 2018, 2:20 am UTC
 */
class Gasto extends Model
{
    use SoftDeletes;

    public $table = 'gastos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
        'id' => 'integer',
        'user_id' => 'integer',
        'gasto' => 'string',
        'condicion' => 'string',
        'tipo_de_gasto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function tipoDeGasto(){

        return $this->hasOne('App\Models\TipoDeGasto', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function user(){

        return $this->hasOne('App\User', 'id');
    }
}
