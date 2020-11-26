<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createestado_personaAPIRequest;
use App\Http\Requests\API\Updateestado_personaAPIRequest;
use App\Models\estado_persona;
use App\Repositories\estado_personaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class estado_personaController
 * @package App\Http\Controllers\API
 */

class estado_personaAPIController extends AppBaseController
{
    /** @var  estado_personaRepository */
    private $estadoPersonaRepository;

    public function __construct(estado_personaRepository $estadoPersonaRepo)
    {
        $this->estadoPersonaRepository = $estadoPersonaRepo;
    }

    /**
     * Display a listing of the estado_persona.
     * GET|HEAD /estadoPersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoPersonas = $this->estadoPersonaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estadoPersonas->toArray(), 'Estado Personas retrieved successfully');
    }

    /**
     * Store a newly created estado_persona in storage.
     * POST /estadoPersonas
     *
     * @param Createestado_personaAPIRequest $request
     *
     * @return Response
     */
    public function store(Createestado_personaAPIRequest $request)
    {
        $input = $request->all();

        $estadoPersona = $this->estadoPersonaRepository->create($input);

        return $this->sendResponse($estadoPersona->toArray(), 'Estado Persona saved successfully');
    }

    /**
     * Display the specified estado_persona.
     * GET|HEAD /estadoPersonas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var estado_persona $estadoPersona */
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            return $this->sendError('Estado Persona not found');
        }

        return $this->sendResponse($estadoPersona->toArray(), 'Estado Persona retrieved successfully');
    }

    /**
     * Update the specified estado_persona in storage.
     * PUT/PATCH /estadoPersonas/{id}
     *
     * @param int $id
     * @param Updateestado_personaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_personaAPIRequest $request)
    {
        $input = $request->all();

        /** @var estado_persona $estadoPersona */
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            return $this->sendError('Estado Persona not found');
        }

        $estadoPersona = $this->estadoPersonaRepository->update($input, $id);

        return $this->sendResponse($estadoPersona->toArray(), 'estado_persona updated successfully');
    }

    /**
     * Remove the specified estado_persona from storage.
     * DELETE /estadoPersonas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var estado_persona $estadoPersona */
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            return $this->sendError('Estado Persona not found');
        }

        $estadoPersona->delete();

        return $this->sendSuccess('Estado Persona deleted successfully');
    }
}
