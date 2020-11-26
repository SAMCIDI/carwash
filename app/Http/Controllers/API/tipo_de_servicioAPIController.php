<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtipo_de_servicioAPIRequest;
use App\Http\Requests\API\Updatetipo_de_servicioAPIRequest;
use App\Models\tipo_de_servicio;
use App\Repositories\tipo_de_servicioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tipo_de_servicioController
 * @package App\Http\Controllers\API
 */

class tipo_de_servicioAPIController extends AppBaseController
{
    /** @var  tipo_de_servicioRepository */
    private $tipoDeServicioRepository;

    public function __construct(tipo_de_servicioRepository $tipoDeServicioRepo)
    {
        $this->tipoDeServicioRepository = $tipoDeServicioRepo;
    }

    /**
     * Display a listing of the tipo_de_servicio.
     * GET|HEAD /tipoDeServicios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoDeServicios = $this->tipoDeServicioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoDeServicios->toArray(), 'Tipo De Servicios retrieved successfully');
    }

    /**
     * Store a newly created tipo_de_servicio in storage.
     * POST /tipoDeServicios
     *
     * @param Createtipo_de_servicioAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_de_servicioAPIRequest $request)
    {
        $input = $request->all();

        $tipoDeServicio = $this->tipoDeServicioRepository->create($input);

        return $this->sendResponse($tipoDeServicio->toArray(), 'Tipo De Servicio saved successfully');
    }

    /**
     * Display the specified tipo_de_servicio.
     * GET|HEAD /tipoDeServicios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipo_de_servicio $tipoDeServicio */
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            return $this->sendError('Tipo De Servicio not found');
        }

        return $this->sendResponse($tipoDeServicio->toArray(), 'Tipo De Servicio retrieved successfully');
    }

    /**
     * Update the specified tipo_de_servicio in storage.
     * PUT/PATCH /tipoDeServicios/{id}
     *
     * @param int $id
     * @param Updatetipo_de_servicioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_de_servicioAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipo_de_servicio $tipoDeServicio */
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            return $this->sendError('Tipo De Servicio not found');
        }

        $tipoDeServicio = $this->tipoDeServicioRepository->update($input, $id);

        return $this->sendResponse($tipoDeServicio->toArray(), 'tipo_de_servicio updated successfully');
    }

    /**
     * Remove the specified tipo_de_servicio from storage.
     * DELETE /tipoDeServicios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipo_de_servicio $tipoDeServicio */
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            return $this->sendError('Tipo De Servicio not found');
        }

        $tipoDeServicio->delete();

        return $this->sendSuccess('Tipo De Servicio deleted successfully');
    }
}
