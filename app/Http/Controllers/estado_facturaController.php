<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createestado_facturaRequest;
use App\Http\Requests\Updateestado_facturaRequest;
use App\Repositories\estado_facturaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class estado_facturaController extends AppBaseController
{
    /** @var  estado_facturaRepository */
    private $estadoFacturaRepository;

    public function __construct(estado_facturaRepository $estadoFacturaRepo)
    {
        $this->estadoFacturaRepository = $estadoFacturaRepo;
    }

    /**
     * Display a listing of the estado_factura.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoFacturas = $this->estadoFacturaRepository->paginate(10);

        return view('estado_facturas.index')
            ->with('estadoFacturas', $estadoFacturas);
    }

    /**
     * Show the form for creating a new estado_factura.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_facturas.create');
    }

    /**
     * Store a newly created estado_factura in storage.
     *
     * @param Createestado_facturaRequest $request
     *
     * @return Response
     */
    public function store(Createestado_facturaRequest $request)
    {
        $input = $request->all();

        $estadoFactura = $this->estadoFacturaRepository->create($input);

        Flash::success('Estado Factura saved successfully.');

        return redirect(route('estadoFacturas.index'));
    }

    /**
     * Display the specified estado_factura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            Flash::error('Estado Factura not found');

            return redirect(route('estadoFacturas.index'));
        }

        return view('estado_facturas.show')->with('estadoFactura', $estadoFactura);
    }

    /**
     * Show the form for editing the specified estado_factura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            Flash::error('Estado Factura not found');

            return redirect(route('estadoFacturas.index'));
        }

        return view('estado_facturas.edit')->with('estadoFactura', $estadoFactura);
    }

    /**
     * Update the specified estado_factura in storage.
     *
     * @param int $id
     * @param Updateestado_facturaRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_facturaRequest $request)
    {
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            Flash::error('Estado Factura not found');

            return redirect(route('estadoFacturas.index'));
        }

        $estadoFactura = $this->estadoFacturaRepository->update($request->all(), $id);

        Flash::success('Estado Factura updated successfully.');

        return redirect(route('estadoFacturas.index'));
    }

    /**
     * Remove the specified estado_factura from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            Flash::error('Estado Factura not found');

            return redirect(route('estadoFacturas.index'));
        }

        $this->estadoFacturaRepository->delete($id);

        Flash::success('Estado Factura deleted successfully.');

        return redirect(route('estadoFacturas.index'));
    }
}
