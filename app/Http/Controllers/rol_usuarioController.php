<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createrol_usuarioRequest;
use App\Http\Requests\Updaterol_usuarioRequest;
use App\Repositories\rol_usuarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class rol_usuarioController extends AppBaseController
{
    /** @var  rol_usuarioRepository */
    private $rolUsuarioRepository;

    public function __construct(rol_usuarioRepository $rolUsuarioRepo)
    {
        $this->rolUsuarioRepository = $rolUsuarioRepo;
    }

    /**
     * Display a listing of the rol_usuario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rolUsuarios = $this->rolUsuarioRepository->paginate(10);

        return view('rol_usuarios.index')
            ->with('rolUsuarios', $rolUsuarios);
    }

    /**
     * Show the form for creating a new rol_usuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('rol_usuarios.create');
    }

    /**
     * Store a newly created rol_usuario in storage.
     *
     * @param Createrol_usuarioRequest $request
     *
     * @return Response
     */
    public function store(Createrol_usuarioRequest $request)
    {
        $input = $request->all();

        $rolUsuario = $this->rolUsuarioRepository->create($input);

        Flash::success('Rol Usuario saved successfully.');

        return redirect(route('rolUsuarios.index'));
    }

    /**
     * Display the specified rol_usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            Flash::error('Rol Usuario not found');

            return redirect(route('rolUsuarios.index'));
        }

        return view('rol_usuarios.show')->with('rolUsuario', $rolUsuario);
    }

    /**
     * Show the form for editing the specified rol_usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            Flash::error('Rol Usuario not found');

            return redirect(route('rolUsuarios.index'));
        }

        return view('rol_usuarios.edit')->with('rolUsuario', $rolUsuario);
    }

    /**
     * Update the specified rol_usuario in storage.
     *
     * @param int $id
     * @param Updaterol_usuarioRequest $request
     *
     * @return Response
     */
    public function update($id, Updaterol_usuarioRequest $request)
    {
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            Flash::error('Rol Usuario not found');

            return redirect(route('rolUsuarios.index'));
        }

        $rolUsuario = $this->rolUsuarioRepository->update($request->all(), $id);

        Flash::success('Rol Usuario updated successfully.');

        return redirect(route('rolUsuarios.index'));
    }

    /**
     * Remove the specified rol_usuario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rolUsuario = $this->rolUsuarioRepository->find($id);

        if (empty($rolUsuario)) {
            Flash::error('Rol Usuario not found');

            return redirect(route('rolUsuarios.index'));
        }

        $this->rolUsuarioRepository->delete($id);

        Flash::success('Rol Usuario deleted successfully.');

        return redirect(route('rolUsuarios.index'));
    }
}
