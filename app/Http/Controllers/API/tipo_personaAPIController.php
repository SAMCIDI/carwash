<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtipo_personaAPIRequest;
use App\Http\Requests\API\Updatetipo_personaAPIRequest;
use App\Models\tipo_persona;
use App\Repositories\tipo_personaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tipo_personaController
 * @package App\Http\Controllers\API
 */

class tipo_personaAPIController extends AppBaseController
{
    /** @var  tipo_personaRepository */
    private $tipoPersonaRepository;

    public function __construct(tipo_personaRepository $tipoPersonaRepo)
    {
        $this->tipoPersonaRepository = $tipoPersonaRepo;
    }

    /**
     * Display a listing of the tipo_persona.
     * GET|HEAD /tipoPersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoPersonas = $this->tipoPersonaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoPersonas->toArray(), 'Tipo Personas retrieved successfully');
    }

    /**
     * Store a newly created tipo_persona in storage.
     * POST /tipoPersonas
     *
     * @param Createtipo_personaAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_personaAPIRequest $request)
    {
        $input = $request->all();

        $tipoPersona = $this->tipoPersonaRepository->create($input);

        return $this->sendResponse($tipoPersona->toArray(), 'Tipo Persona saved successfully');
    }

    /**
     * Display the specified tipo_persona.
     * GET|HEAD /tipoPersonas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipo_persona $tipoPersona */
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            return $this->sendError('Tipo Persona not found');
        }

        return $this->sendResponse($tipoPersona->toArray(), 'Tipo Persona retrieved successfully');
    }

    /**
     * Update the specified tipo_persona in storage.
     * PUT/PATCH /tipoPersonas/{id}
     *
     * @param int $id
     * @param Updatetipo_personaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_personaAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipo_persona $tipoPersona */
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            return $this->sendError('Tipo Persona not found');
        }

        $tipoPersona = $this->tipoPersonaRepository->update($input, $id);

        return $this->sendResponse($tipoPersona->toArray(), 'tipo_persona updated successfully');
    }

    /**
     * Remove the specified tipo_persona from storage.
     * DELETE /tipoPersonas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipo_persona $tipoPersona */
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            return $this->sendError('Tipo Persona not found');
        }

        $tipoPersona->delete();

        return $this->sendSuccess('Tipo Persona deleted successfully');
    }
}
