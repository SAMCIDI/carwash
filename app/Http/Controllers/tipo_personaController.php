<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtipo_personaRequest;
use App\Http\Requests\Updatetipo_personaRequest;
use App\Repositories\tipo_personaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipo_personaController extends AppBaseController
{
    /** @var  tipo_personaRepository */
    private $tipoPersonaRepository;

    public function __construct(tipo_personaRepository $tipoPersonaRepo)
    {
        $this->tipoPersonaRepository = $tipoPersonaRepo;
    }

    /**
     * Display a listing of the tipo_persona.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoPersonas = $this->tipoPersonaRepository->paginate(10);

        return view('tipo_personas.index')
            ->with('tipoPersonas', $tipoPersonas);
    }

    /**
     * Show the form for creating a new tipo_persona.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_personas.create');
    }

    /**
     * Store a newly created tipo_persona in storage.
     *
     * @param Createtipo_personaRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_personaRequest $request)
    {
        $input = $request->all();

        $tipoPersona = $this->tipoPersonaRepository->create($input);

        Flash::success('Tipo Persona saved successfully.');

        return redirect(route('tipoPersonas.index'));
    }

    /**
     * Display the specified tipo_persona.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        return view('tipo_personas.show')->with('tipoPersona', $tipoPersona);
    }

    /**
     * Show the form for editing the specified tipo_persona.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        return view('tipo_personas.edit')->with('tipoPersona', $tipoPersona);
    }

    /**
     * Update the specified tipo_persona in storage.
     *
     * @param int $id
     * @param Updatetipo_personaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_personaRequest $request)
    {
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        $tipoPersona = $this->tipoPersonaRepository->update($request->all(), $id);

        Flash::success('Tipo Persona updated successfully.');

        return redirect(route('tipoPersonas.index'));
    }

    /**
     * Remove the specified tipo_persona from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoPersona = $this->tipoPersonaRepository->find($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        $this->tipoPersonaRepository->delete($id);

        Flash::success('Tipo Persona deleted successfully.');

        return redirect(route('tipoPersonas.index'));
    }
}
