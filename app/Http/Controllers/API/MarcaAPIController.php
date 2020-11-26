<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMarcaAPIRequest;
use App\Http\Requests\API\UpdateMarcaAPIRequest;
use App\Models\Marca;
use App\Repositories\MarcaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MarcaController
 * @package App\Http\Controllers\API
 */

class MarcaAPIController extends AppBaseController
{
    /** @var  MarcaRepository */
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepo)
    {
        $this->marcaRepository = $marcaRepo;
    }

    /**
     * Display a listing of the Marca.
     * GET|HEAD /marcas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $marcas = $this->marcaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($marcas->toArray(), 'Marcas retrieved successfully');
    }

    /**
     * Store a newly created Marca in storage.
     * POST /marcas
     *
     * @param CreateMarcaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMarcaAPIRequest $request)
    {
        $input = $request->all();

        $marca = $this->marcaRepository->create($input);

        return $this->sendResponse($marca->toArray(), 'Marca saved successfully');
    }

    /**
     * Display the specified Marca.
     * GET|HEAD /marcas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Marca $marca */
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            return $this->sendError('Marca not found');
        }

        return $this->sendResponse($marca->toArray(), 'Marca retrieved successfully');
    }

    /**
     * Update the specified Marca in storage.
     * PUT/PATCH /marcas/{id}
     *
     * @param int $id
     * @param UpdateMarcaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarcaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Marca $marca */
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            return $this->sendError('Marca not found');
        }

        $marca = $this->marcaRepository->update($input, $id);

        return $this->sendResponse($marca->toArray(), 'Marca updated successfully');
    }

    /**
     * Remove the specified Marca from storage.
     * DELETE /marcas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Marca $marca */
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            return $this->sendError('Marca not found');
        }

        $marca->delete();

        return $this->sendSuccess('Marca deleted successfully');
    }
}
