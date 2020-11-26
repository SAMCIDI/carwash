<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class tipo_identificacion
 * @package App\Models
 * @version October 30, 2020, 11:06 pm UTC
 *
 * @property string $descripcion
 */
class tipo_identificacion extends Model
{

    public $table = 'tipo_identificacion';
    



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
