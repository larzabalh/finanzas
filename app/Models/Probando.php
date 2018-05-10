<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Probando
 * @package App\Models
 * @version May 10, 2018, 2:46 am UTC
 */
class Probando extends Model
{
    use SoftDeletes;

    public $table = 'probandos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'edad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'edad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
