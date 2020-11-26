<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createestado_facturaAPIRequest;
use App\Http\Requests\API\Updateestado_facturaAPIRequest;
use App\Models\estado_factura;
use App\Repositories\estado_facturaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class estado_facturaController
 * @package App\Http\Controllers\API
 */

class estado_facturaAPIController extends AppBaseController
{
    /** @var  estado_facturaRepository */
    private $estadoFacturaRepository;

    public function __construct(estado_facturaRepository $estadoFacturaRepo)
    {
        $this->estadoFacturaRepository = $estadoFacturaRepo;
    }

    /**
     * Display a listing of the estado_factura.
     * GET|HEAD /estadoFacturas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $estadoFacturas = $this->estadoFacturaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estadoFacturas->toArray(), 'Estado Facturas retrieved successfully');
    }

    /**
     * Store a newly created estado_factura in storage.
     * POST /estadoFacturas
     *
     * @param Createestado_facturaAPIRequest $request
     *
     * @return Response
     */
    public function store(Createestado_facturaAPIRequest $request)
    {
        $input = $request->all();

        $estadoFactura = $this->estadoFacturaRepository->create($input);

        return $this->sendResponse($estadoFactura->toArray(), 'Estado Factura saved successfully');
    }

    /**
     * Display the specified estado_factura.
     * GET|HEAD /estadoFacturas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var estado_factura $estadoFactura */
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            return $this->sendError('Estado Factura not found');
        }

        return $this->sendResponse($estadoFactura->toArray(), 'Estado Factura retrieved successfully');
    }

    /**
     * Update the specified estado_factura in storage.
     * PUT/PATCH /estadoFacturas/{id}
     *
     * @param int $id
     * @param Updateestado_facturaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateestado_facturaAPIRequest $request)
    {
        $input = $request->all();

        /** @var estado_factura $estadoFactura */
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            return $this->sendError('Estado Factura not found');
        }

        $estadoFactura = $this->estadoFacturaRepository->update($input, $id);

        return $this->sendResponse($estadoFactura->toArray(), 'estado_factura updated successfully');
    }

    /**
     * Remove the specified estado_factura from storage.
     * DELETE /estadoFacturas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var estado_factura $estadoFactura */
        $estadoFactura = $this->estadoFacturaRepository->find($id);

        if (empty($estadoFactura)) {
            return $this->sendError('Estado Factura not found');
        }

        $estadoFactura->delete();

        return $this->sendSuccess('Estado Factura deleted successfully');
    }
}
