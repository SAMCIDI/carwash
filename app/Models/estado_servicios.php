<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class estado_servicios
 * @package App\Models
 * @version October 30, 2020, 11:08 pm UTC
 *
 * @property string $estado
 */
class estado_servicios extends Model
{

    public $table = 'estado_servicios';
    



    public $fillable = [
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
