<?php

namespace App\Repositories;

use App\Models\estado_servicios;
use App\Repositories\BaseRepository;

/**
 * Class estado_serviciosRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:08 pm UTC
*/

class estado_serviciosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado'
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
        return estado_servicios::class;
    }
}
