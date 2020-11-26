<?php

namespace App\Repositories;

use App\Models\tipo_persona;
use App\Repositories\BaseRepository;

/**
 * Class tipo_personaRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:14 pm UTC
*/

class tipo_personaRepository extends BaseRepository
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
        return tipo_persona::class;
    }
}
