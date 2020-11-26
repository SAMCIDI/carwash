<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createestado_serviciosAPIRequest;
use App\Http\Requests\API\Updateestado_serviciosAPIRequest;
use App\Models\estado_servicios;
use App\Repositories\estado_serviciosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class estado_serviciosController
 * @package App\Http\Controllers\API
 */

class estado_serviciosAPIController extends AppBaseController
{
    /** @var  estado_serviciosRepository */
    private $estadoServiciosRepository;

    public function __construct(estado_serviciosRepository $estadoServiciosRepo)
    {
        $this->estadoServiciosRepository = $estadoServiciosRepo;
    }

    /**
     * Display a listing of the estado_servicios.
     * GET|HEAD /estadoServicios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoServicios = $this->estadoServiciosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estadoServicios->toArray(), 'Estado Servicios retrieved successfully');
    }

    /**
     * Store a newly created estado_servicios in storage.
     * POST /estadoServicios
     *
     * @param Createestado_serviciosAPIRequest $request
     *
     * @return Response
     */
    public function store(Createestado_serviciosAPIRequest $request)
    {
        $input = $request->all();

        $estadoServicios = $this->estadoServiciosRepository->create($input);

        return $this->sendResponse($estadoServicios->toArray(), 'Estado Servicios saved successfully');
    }

    /**
     * Display the specified estado_servicios.
     * GET|HEAD /estadoServicios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var estado_servicios $estadoServicios */
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            return $this->sendError('Estado Servicios not found');
        }

        return $this->sendResponse($estadoServicios->toArray(), 'Estado Servicios retrieved successfully');
    }

    /**
     * Update the specified estado_servicios in storage.
     * PUT/PATCH /estadoServicios/{id}
     *
     * @param int $id
     * @param Updateestado_serviciosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_serviciosAPIRequest $request)
    {
        $input = $request->all();

        /** @var estado_servicios $estadoServicios */
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            return $this->sendError('Estado Servicios not found');
        }

        $estadoServicios = $this->estadoServiciosRepository->update($input, $id);

        return $this->sendResponse($estadoServicios->toArray(), 'estado_servicios updated successfully');
    }

    /**
     * Remove the specified estado_servicios from storage.
     * DELETE /estadoServicios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var estado_servicios $estadoServicios */
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            return $this->sendError('Estado Servicios not found');
        }

        $estadoServicios->delete();

        return $this->sendSuccess('Estado Servicios deleted successfully');
    }
}
