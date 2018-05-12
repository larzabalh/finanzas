<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gasto
 * @package App\Models
 * @version May 12, 2018, 4:15 am UTC
 */
class Gasto extends Model
{
    use SoftDeletes;

    public $table = 'gastos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'gasto',
        'user_id',
        'condicion',
        'tipo_de_gasto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'gasto' => 'string',
        'user_id' => 'integer',
        'condicion' => 'integer',
        'tipo_de_gasto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'gasto' => 'required',
        'user_id' => 'required',
        'tipo_de_gasto_id' => 'required'
    ];

    //Relacion
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
  //Relacion
  public function tipo_de_gasto() {
        return $this->belongsTo('App\Models\TipoDeGasto', 'tipo_de_gasto_id','id'); // Le indicamos que se va relacionar con el atributo id
    }
    
}
