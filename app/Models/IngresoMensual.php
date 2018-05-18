<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IngresoMensual
 * @package App\Models
 * @version May 17, 2018, 9:46 pm -03
 */
class IngresoMensual extends Model
{
    use SoftDeletes;

    public $table = 'ingresos_mensuales';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'fecha',
        'cliente_id',
        'honorario',
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
        'cliente_id' => 'integer',
        'honorario' => 'float',
        'condicion' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => "required",
        'cliente_id' => 'required',
        'honorario' => 'required'
    ];

    //Relacion
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente','cliente_id','id');
    }
}
