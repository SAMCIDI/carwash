<?php

namespace App\Repositories;

use App\Models\personas;
use App\Repositories\BaseRepository;

/**
 * Class personasRepository
 * @package App\Repositories
 * @version October 30, 2020, 10:52 pm UTC
*/

class personasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'telefono',
        'identificacion'
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
        return personas::class;
    }
}
