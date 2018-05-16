<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version May 16, 2018, 9:06 am -03
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'cliente' => 'string',
        'honorario' => 'float',
        'email' => 'string',
        'facturador_id' => 'integer',
        'liquidador_id' => 'integer',
        'cobrador_id' => 'integer',
        'disponibilidad_id' => 'integer',
        'contacto' => 'string',
        'comentario' => 'string',
        'condicion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente' => "required|max:255|unique:clientes",
    ];

    //Relacion
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function facturador()
    {
        return $this->belongsTo('\App\Models\Facturador','facturador_id','id');
    }

    public function liquidador()
    {
        return $this->belongsTo('\App\Models\Liquidador','liquidador_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
   public function cobrador()
    {
        return $this->belongsTo('\App\Models\Cobrador','cobrador_id','id');
    }

    public function disponibilidad()
    {
        return $this->belongsTo('\App\Models\Disponibilidad','disponibilidad_id','id');
    }
}
