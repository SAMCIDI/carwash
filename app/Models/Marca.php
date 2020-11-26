<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Marca
 * @package App\Models
 * @version October 30, 2020, 10:59 pm UTC
 *
 * @property string $descripcion
 */
class Marca extends Model
{

    public $table = 'Marca';
    



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
