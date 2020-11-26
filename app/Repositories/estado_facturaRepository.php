<?php

namespace App\Repositories;

use App\Models\estado_factura;
use App\Repositories\BaseRepository;

/**
 * Class estado_facturaRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:13 pm UTC
*/

class estado_facturaRepository extends BaseRepository
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
        return estado_factura::class;
    }
}
