<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class tipo_persona
 * @package App\Models
 * @version October 30, 2020, 11:14 pm UTC
 *
 * @property string $descripcion
 */
class tipo_persona extends Model
{

    public $table = 'tipo_persona';
    



    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
