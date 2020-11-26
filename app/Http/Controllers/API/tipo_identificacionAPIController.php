<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtipo_identificacionAPIRequest;
use App\Http\Requests\API\Updatetipo_identificacionAPIRequest;
use App\Models\tipo_identificacion;
use App\Repositories\tipo_identificacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tipo_identificacionController
 * @package App\Http\Controllers\API
 */

class tipo_identificacionAPIController extends AppBaseController
{
    /** @var  tipo_identificacionRepository */
    private $tipoIdentificacionRepository;

    public function __construct(tipo_identificacionRepository $tipoIdentificacionRepo)
    {
        $this->tipoIdentificacionRepository = $tipoIdentificacionRepo;
    }

    /**
     * Display a listing of the tipo_identificacion.
     * GET|HEAD /tipoIdentificacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoIdentificacions = $this->tipoIdentificacionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoIdentificacions->toArray(), 'Tipo Identificacions retrieved successfully');
    }

    /**
     * Store a newly created tipo_identificacion in storage.
     * POST /tipoIdentificacions
     *
     * @param Createtipo_identificacionAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_identificacionAPIRequest $request)
    {
        $input = $request->all();

        $tipoIdentificacion = $this->tipoIdentificacionRepository->create($input);

        return $this->sendResponse($tipoIdentificacion->toArray(), 'Tipo Identificacion saved successfully');
    }

    /**
     * Display the specified tipo_identificacion.
     * GET|HEAD /tipoIdentificacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipo_identificacion $tipoIdentificacion */
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            return $this->sendError('Tipo Identificacion not found');
        }

        return $this->sendResponse($tipoIdentificacion->toArray(), 'Tipo Identificacion retrieved successfully');
    }

    /**
     * Update the specified tipo_identificacion in storage.
     * PUT/PATCH /tipoIdentificacions/{id}
     *
     * @param int $id
     * @param Updatetipo_identificacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_identificacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipo_identificacion $tipoIdentificacion */
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            return $this->sendError('Tipo Identificacion not found');
        }

        $tipoIdentificacion = $this->tipoIdentificacionRepository->update($input, $id);

        return $this->sendResponse($tipoIdentificacion->toArray(), 'tipo_identificacion updated successfully');
    }

    /**
     * Remove the specified tipo_identificacion from storage.
     * DELETE /tipoIdentificacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipo_identificacion $tipoIdentificacion */
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            return $this->sendError('Tipo Identificacion not found');
        }

        $tipoIdentificacion->delete();

        return $this->sendSuccess('Tipo Identificacion deleted successfully');
    }
}
