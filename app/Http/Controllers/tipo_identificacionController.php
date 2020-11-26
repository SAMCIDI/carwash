<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtipo_identificacionRequest;
use App\Http\Requests\Updatetipo_identificacionRequest;
use App\Repositories\tipo_identificacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipo_identificacionController extends AppBaseController
{
    /** @var  tipo_identificacionRepository */
    private $tipoIdentificacionRepository;

    public function __construct(tipo_identificacionRepository $tipoIdentificacionRepo)
    {
        $this->tipoIdentificacionRepository = $tipoIdentificacionRepo;
    }

    /**
     * Display a listing of the tipo_identificacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoIdentificacions = $this->tipoIdentificacionRepository->paginate(10);

        return view('tipo_identificacions.index')
            ->with('tipoIdentificacions', $tipoIdentificacions);
    }

    /**
     * Show the form for creating a new tipo_identificacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_identificacions.create');
    }

    /**
     * Store a newly created tipo_identificacion in storage.
     *
     * @param Createtipo_identificacionRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_identificacionRequest $request)
    {
        $input = $request->all();

        $tipoIdentificacion = $this->tipoIdentificacionRepository->create($input);

        Flash::success('Tipo Identificacion saved successfully.');

        return redirect(route('tipoIdentificacions.index'));
    }

    /**
     * Display the specified tipo_identificacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        return view('tipo_identificacions.show')->with('tipoIdentificacion', $tipoIdentificacion);
    }

    /**
     * Show the form for editing the specified tipo_identificacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        return view('tipo_identificacions.edit')->with('tipoIdentificacion', $tipoIdentificacion);
    }

    /**
     * Update the specified tipo_identificacion in storage.
     *
     * @param int $id
     * @param Updatetipo_identificacionRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_identificacionRequest $request)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        $tipoIdentificacion = $this->tipoIdentificacionRepository->update($request->all(), $id);

        Flash::success('Tipo Identificacion updated successfully.');

        return redirect(route('tipoIdentificacions.index'));
    }

    /**
     * Remove the specified tipo_identificacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->find($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        $this->tipoIdentificacionRepository->delete($id);

        Flash::success('Tipo Identificacion deleted successfully.');

        return redirect(route('tipoIdentificacions.index'));
    }
}
