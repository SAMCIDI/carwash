<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class services
 * @package App\Models
 * @version November 25, 2020, 11:55 pm UTC
 *
 * @property string $description
 * @property integer $type_services_id
 */
class services extends Model
{

    public $table = 'services';
    



    public $fillable = [
        'description',
        'type_services_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'type_services_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function tiposervice()
    {
        return $this->belongsTo('App\Models\tipo_de_servicio','type_services_id');
    }
    
}
