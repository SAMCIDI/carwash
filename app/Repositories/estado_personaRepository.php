<?php

namespace App\Repositories;

use App\Models\estado_persona;
use App\Repositories\BaseRepository;

/**
 * Class estado_personaRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:09 pm UTC
*/

class estado_personaRepository extends BaseRepository
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
        return estado_persona::class;
    }
}
