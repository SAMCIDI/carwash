<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createestado_personaRequest;
use App\Http\Requests\Updateestado_personaRequest;
use App\Repositories\estado_personaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class estado_personaController extends AppBaseController
{
    /** @var  estado_personaRepository */
    private $estadoPersonaRepository;

    public function __construct(estado_personaRepository $estadoPersonaRepo)
    {
        $this->estadoPersonaRepository = $estadoPersonaRepo;
    }

    /**
     * Display a listing of the estado_persona.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoPersonas = $this->estadoPersonaRepository->paginate(10);

        return view('estado_personas.index')
            ->with('estadoPersonas', $estadoPersonas);
    }

    /**
     * Show the form for creating a new estado_persona.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_personas.create');
    }

    /**
     * Store a newly created estado_persona in storage.
     *
     * @param Createestado_personaRequest $request
     *
     * @return Response
     */
    public function store(Createestado_personaRequest $request)
    {
        $input = $request->all();

        $estadoPersona = $this->estadoPersonaRepository->create($input);

        Flash::success('Estado Persona saved successfully.');

        return redirect(route('estadoPersonas.index'));
    }

    /**
     * Display the specified estado_persona.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            Flash::error('Estado Persona not found');

            return redirect(route('estadoPersonas.index'));
        }

        return view('estado_personas.show')->with('estadoPersona', $estadoPersona);
    }

    /**
     * Show the form for editing the specified estado_persona.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            Flash::error('Estado Persona not found');

            return redirect(route('estadoPersonas.index'));
        }

        return view('estado_personas.edit')->with('estadoPersona', $estadoPersona);
    }

    /**
     * Update the specified estado_persona in storage.
     *
     * @param int $id
     * @param Updateestado_personaRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_personaRequest $request)
    {
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            Flash::error('Estado Persona not found');

            return redirect(route('estadoPersonas.index'));
        }

        $estadoPersona = $this->estadoPersonaRepository->update($request->all(), $id);

        Flash::success('Estado Persona updated successfully.');

        return redirect(route('estadoPersonas.index'));
    }

    /**
     * Remove the specified estado_persona from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoPersona = $this->estadoPersonaRepository->find($id);

        if (empty($estadoPersona)) {
            Flash::error('Estado Persona not found');

            return redirect(route('estadoPersonas.index'));
        }

        $this->estadoPersonaRepository->delete($id);

        Flash::success('Estado Persona deleted successfully.');

        return redirect(route('estadoPersonas.index'));
    }
}
