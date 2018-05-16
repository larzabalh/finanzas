<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cobrador
 * @package App\Models
 * @version May 16, 2018, 9:00 am -03
 */
class Cobrador extends Model
{
    use SoftDeletes;

    public $table = 'cobradores';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'cobrador',
        'comentario',
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
        'cobrador' => 'string',
        'comentario' => 'string',
        'condicion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cobrador' => "required|max:255|unique:cobradores",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class);
    }
}
