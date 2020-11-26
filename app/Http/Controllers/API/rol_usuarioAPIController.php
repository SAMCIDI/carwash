<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createrol_usuarioAPIRequest;
use App\Http\Requests\API\Updaterol_usuarioAPIRequest;
use App\Models\rol_usuario;
use App\Repositories\rol_usuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class rol_usuarioController
 * @package App\Http\Controllers\API
 */

class rol_usuarioAPIController extends AppBaseController
{
    /** @var  rol_usuarioRepository */
    private $rolUsuarioRepository;

    public function __construct(rol_usuarioRepository $rolUsuarioRepo)
    {
        $this->rolUsuarioRepository = $rolUsuarioRepo;
    }

    /**
     * Display a listing of the rol_usuario.
     * GET|HEAD /rolUsuarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rolUsuarios = $this->rolUsuarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($rolUsuarios->toArray(), 'Rol Usuarios retrieved successfully');
    }

    /**
     * Store a newly created rol_usuario in storage.
     * POST /rolUsuarios
     *
     * @param Createrol_usuarioAPIRequest $request
     *
     * @return Response
     */
    public function store(Createrol_usuarioAPIRequest $request)
    {
        $input = $request->all();

        $rolUsuario = $this->rolUsuarioRepository->create($input);

        return $this->sendResponse($rolUsuario->toArray(), 'Rol Usuario saved successfully');
    }

    /**
     * Display the specified rol_usuario.
     * GET|HEAD /rolUsuarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var rol_usuario $rolUsuario */
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            return $this->sendError('Rol Usuario not found');
        }

        return $this->sendResponse($rolUsuario->toArray(), 'Rol Usuario retrieved successfully');
    }

    /**
     * Update the specified rol_usuario in storage.
     * PUT/PATCH /rolUsuarios/{id}
     *
     * @param int $id
     * @param Updaterol_usuarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updaterol_usuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var rol_usuario $rolUsuario */
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            return $this->sendError('Rol Usuario not found');
        }

        $rolUsuario = $this->rolUsuarioRepository->update($input, $id);

        return $this->sendResponse($rolUsuario->toArray(), 'rol_usuario updated successfully');
    }

    /**
     * Remove the specified rol_usuario from storage.
     * DELETE /rolUsuarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var rol_usuario $rolUsuario */
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            return $this->sendError('Rol Usuario not found');
        }

        $rolUsuario->delete();

        return $this->sendSuccess('Rol Usuario deleted successfully');
    }
}
