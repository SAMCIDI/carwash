<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class tipo_de_servicio
 * @package App\Models
 * @version October 30, 2020, 11:12 pm UTC
 *
 * @property string $descripcion
 */
class tipo_de_servicio extends Model
{

    public $table = 'tipo_de_servicio';
    



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

    public function services()
    {
        return $this->hasMany('App\Models\services');
    }
    
}
