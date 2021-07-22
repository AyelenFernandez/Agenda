<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEspacioFisicoRequest;
use App\Http\Requests\UpdateEspacioFisicoRequest;
use App\Repositories\EspacioFisicoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EspacioFisicoController extends InfyOmBaseController
{
    /** @var  EspacioFisicoRepository */
    private $espacioFisicoRepository;

    public function __construct(EspacioFisicoRepository $espacioFisicoRepo)
    {
        $this->espacioFisicoRepository = $espacioFisicoRepo;
    }


    public function userEspacioFisico(Request $request)
    {
        $this->espacioFisicoRepository->pushCriteria(new RequestCriteria($request));
        $espacioFisicos = $this->espacioFisicoRepository->all();

        return view('user.user-espacio-fisico')->with('espacioFisicos', $espacioFisicos);
    }

    public function userEspacioFisicoShow($id)
    {
        $espacioFisico = $this->espacioFisicoRepository->findWithoutFail($id);

        if (empty($espacioFisico)) {
            Flash::error('Aula no encontrada');

            return redirect(route('user/espacio-fisico'));
        }

        return view('user.user-espacio-fisico-show')->with('espacioFisico', $espacioFisico);
    }
    

    /**
     * Display a listing of the EspacioFisico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->espacioFisicoRepository->pushCriteria(new RequestCriteria($request));
        $espacioFisicos = $this->espacioFisicoRepository->all();

        return view('espacioFisicos.index')
            ->with('espacioFisicos', $espacioFisicos);
    }

    /**
     * Show the form for creating a new EspacioFisico.
     *
     * @return Response
     */
    public function create()
    {
        return view('espacioFisicos.create');
    }

    /**
     * Store a newly created EspacioFisico in storage.
     *
     * @param CreateEspacioFisicoRequest $request
     *
     * @return Response
     */
    public function store(CreateEspacioFisicoRequest $request)
    {
        $input = $request->all();

        $espacioFisico = $this->espacioFisicoRepository->create($input);

        Flash::success('Aula Guardada correctamente');

        return redirect(route('admin.espaciofisico.index'));
    }

    /**
     * Display the specified EspacioFisico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $espacioFisico = $this->espacioFisicoRepository->findWithoutFail($id);

        if (empty($espacioFisico)) {
            Flash::error('Aula no encontrada');

            return redirect(route('admin.espaciofisico.index'));
        }

        return view('espacioFisicos.show')->with('espacioFisico', $espacioFisico);
    }

    /**
     * Show the form for editing the specified EspacioFisico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $espacioFisico = $this->espacioFisicoRepository->findWithoutFail($id);

        if (empty($espacioFisico)) {
            Flash::error('Aula no encontrada');

            return redirect(route('admin.espaciofisico.index'));
        }

        return view('espacioFisicos.edit')->with('espacioFisico', $espacioFisico);
    }

    /**
     * Update the specified EspacioFisico in storage.
     *
     * @param  int              $id
     * @param UpdateEspacioFisicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspacioFisicoRequest $request)
    {
        $espacioFisico = $this->espacioFisicoRepository->findWithoutFail($id);

        if (empty($espacioFisico)) {
            Flash::error('Aula no encontrada');

            return redirect(route('admin.espaciofisico.index'));
        }

        $espacioFisico = $this->espacioFisicoRepository->update($request->all(), $id);

        Flash::success('Aula actualizada correctamente.');

        return redirect(route('admin.espaciofisico.index'));
    }

    /**
     * Remove the specified EspacioFisico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function destroy($id)
    public function destroy(Request $request)
    {
        $id = $request->idEv;

        $espacioFisico = $this->espacioFisicoRepository->findWithoutFail($id);

        if (empty($espacioFisico)) {
            Flash::error('Aula no encontrada');

            return redirect(route('admin.espaciofisico.index'));
        }

        $this->espacioFisicoRepository->delete($id);

        Flash::success('Aula borrada correctamente');

        return redirect(route('admin.espaciofisico.index'));
    }
}
