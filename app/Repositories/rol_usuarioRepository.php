<?php

namespace App\Repositories;

use App\Models\rol_usuario;
use App\Repositories\BaseRepository;

/**
 * Class rol_usuarioRepository
 * @package App\Repositories
 * @version October 30, 2020, 11:04 pm UTC
*/

class rol_usuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo de rol'
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
        return rol_usuario::class;
    }
}
