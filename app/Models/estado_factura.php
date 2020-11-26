<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class estado_factura
 * @package App\Models
 * @version October 30, 2020, 11:13 pm UTC
 *
 * @property string $estado
 */
class estado_factura extends Model
{

    public $table = 'estado_factura';
    



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
