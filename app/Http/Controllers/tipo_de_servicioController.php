<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtipo_de_servicioRequest;
use App\Http\Requests\Updatetipo_de_servicioRequest;
use App\Repositories\tipo_de_servicioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipo_de_servicioController extends AppBaseController
{
    /** @var  tipo_de_servicioRepository */
    private $tipoDeServicioRepository;

    public function __construct(tipo_de_servicioRepository $tipoDeServicioRepo)
    {
        $this->tipoDeServicioRepository = $tipoDeServicioRepo;
    }

    /**
     * Display a listing of the tipo_de_servicio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoDeServicios = $this->tipoDeServicioRepository->paginate(10);

        return view('tipo_de_servicios.index')
            ->with('tipoDeServicios', $tipoDeServicios);
    }

    /**
     * Show the form for creating a new tipo_de_servicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_de_servicios.create');
    }

    /**
     * Store a newly created tipo_de_servicio in storage.
     *
     * @param Createtipo_de_servicioRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_de_servicioRequest $request)
    {
        $input = $request->all();

        $tipoDeServicio = $this->tipoDeServicioRepository->create($input);

        Flash::success('Tipo De Servicio saved successfully.');

        return redirect(route('tipoDeServicios.index'));
    }

    /**
     * Display the specified tipo_de_servicio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            Flash::error('Tipo De Servicio not found');

            return redirect(route('tipoDeServicios.index'));
        }

        return view('tipo_de_servicios.show')->with('tipoDeServicio', $tipoDeServicio);
    }

    /**
     * Show the form for editing the specified tipo_de_servicio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            Flash::error('Tipo De Servicio not found');

            return redirect(route('tipoDeServicios.index'));
        }

        return view('tipo_de_servicios.edit')->with('tipoDeServicio', $tipoDeServicio);
    }

    /**
     * Update the specified tipo_de_servicio in storage.
     *
     * @param int $id
     * @param Updatetipo_de_servicioRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_de_servicioRequest $request)
    {
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            Flash::error('Tipo De Servicio not found');

            return redirect(route('tipoDeServicios.index'));
        }

        $tipoDeServicio = $this->tipoDeServicioRepository->update($request->all(), $id);

        Flash::success('Tipo De Servicio updated successfully.');

        return redirect(route('tipoDeServicios.index'));
    }

    /**
     * Remove the specified tipo_de_servicio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDeServicio = $this->tipoDeServicioRepository->find($id);

        if (empty($tipoDeServicio)) {
            Flash::error('Tipo De Servicio not found');

            return redirect(route('tipoDeServicios.index'));
        }

        $this->tipoDeServicioRepository->delete($id);

        Flash::success('Tipo De Servicio deleted successfully.');

        return redirect(route('tipoDeServicios.index'));
    }
}
