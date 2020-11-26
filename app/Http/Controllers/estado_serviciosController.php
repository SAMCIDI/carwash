<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createestado_serviciosRequest;
use App\Http\Requests\Updateestado_serviciosRequest;
use App\Repositories\estado_serviciosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class estado_serviciosController extends AppBaseController
{
    /** @var  estado_serviciosRepository */
    private $estadoServiciosRepository;

    public function __construct(estado_serviciosRepository $estadoServiciosRepo)
    {
        $this->estadoServiciosRepository = $estadoServiciosRepo;
    }

    /**
     * Display a listing of the estado_servicios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoServicios = $this->estadoServiciosRepository->paginate(10);

        return view('estado_servicios.index')
            ->with('estadoServicios', $estadoServicios);
    }

    /**
     * Show the form for creating a new estado_servicios.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_servicios.create');
    }

    /**
     * Store a newly created estado_servicios in storage.
     *
     * @param Createestado_serviciosRequest $request
     *
     * @return Response
     */
    public function store(Createestado_serviciosRequest $request)
    {
        $input = $request->all();

        $estadoServicios = $this->estadoServiciosRepository->create($input);

        Flash::success('Estado Servicios saved successfully.');

        return redirect(route('estadoServicios.index'));
    }

    /**
     * Display the specified estado_servicios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            Flash::error('Estado Servicios not found');

            return redirect(route('estadoServicios.index'));
        }

        return view('estado_servicios.show')->with('estadoServicios', $estadoServicios);
    }

    /**
     * Show the form for editing the specified estado_servicios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            Flash::error('Estado Servicios not found');

            return redirect(route('estadoServicios.index'));
        }

        return view('estado_servicios.edit')->with('estadoServicios', $estadoServicios);
    }

    /**
     * Update the specified estado_servicios in storage.
     *
     * @param int $id
     * @param Updateestado_serviciosRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_serviciosRequest $request)
    {
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            Flash::error('Estado Servicios not found');

            return redirect(route('estadoServicios.index'));
        }

        $estadoServicios = $this->estadoServiciosRepository->update($request->all(), $id);

        Flash::success('Estado Servicios updated successfully.');

        return redirect(route('estadoServicios.index'));
    }

    /**
     * Remove the specified estado_servicios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoServicios = $this->estadoServiciosRepository->find($id);

        if (empty($estadoServicios)) {
            Flash::error('Estado Servicios not found');

            return redirect(route('estadoServicios.index'));
        }

        $this->estadoServiciosRepository->delete($id);

        Flash::success('Estado Servicios deleted successfully.');

        return redirect(route('estadoServicios.index'));
    }
}
