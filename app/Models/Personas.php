<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class personas
 * @package App\Models
 * @version October 30, 2020, 10:52 pm UTC
 *
 * @property string $nombres
 * @property string $apellidos
 * @property integer $telefono
 * @property integer $identificacion
 */
class personas extends Model
{

    public $table = 'personas';
    



    public $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'identificacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'telefono' => 'integer',
        'identificacion' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
