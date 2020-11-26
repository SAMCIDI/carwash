<?php

namespace App\Repositories;

use App\Models\tipo_identificacion;
use App\Repositories\BaseRepository;

/**
 * Class tipo_identificacionRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:06 pm UTC
*/

class tipo_identificacionRepository extends BaseRepository
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
        return tipo_identificacion::class;
    }
}
