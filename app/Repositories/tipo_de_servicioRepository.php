<?php

namespace App\Repositories;

use App\Models\tipo_de_servicio;
use App\Repositories\BaseRepository;

/**
 * Class tipo_de_servicioRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:12 pm UTC
*/

class tipo_de_servicioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tipo_de_servicio::class;
    }
}
