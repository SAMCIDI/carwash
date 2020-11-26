<?php

namespace App\Repositories;

use App\Models\Marca;
use App\Repositories\BaseRepository;

/**
 * Class MarcaRepository
 * @package App\Repositories
 * @version October 30, 2020, 10:59 pm UTC
*/

class MarcaRepository extends BaseRepository
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
        return Marca::class;
    }
}
