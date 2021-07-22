<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatefechaRequest;
use App\Http\Requests\UpdatefechaRequest;
use App\Repositories\fechaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class fechaController extends InfyOmBaseController
{
    /** @var  fechaRepository */
    private $fechaRepository;

    public function __construct(fechaRepository $fechaRepo)
    {
        $this->fechaRepository = $fechaRepo;
    }

    /**
     * Display a listing of the fecha.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fechaRepository->pushCriteria(new RequestCriteria($request));
        $fechas = $this->fechaRepository->all();

        return view('fechas.index')
            ->with('fechas', $fechas);
    }

    /**
     * Show the form for creating a new fecha.
     *
     * @return Response
     */
    public function create()
    {
        return view('fechas.create');
    }

    /**
     * Store a newly created fecha in storage.
     *
     * @param CreatefechaRequest $request
     *
     * @return Response
     */
    public function store(CreatefechaRequest $request)
    {
        $input = $request->all();

        $fecha = $this->fechaRepository->create($input);

        Flash::success('fecha saved successfully.');

        return redirect(route('fechas.index'));
    }

    /**
     * Display the specified fecha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fecha = $this->fechaRepository->findWithoutFail($id);

        if (empty($fecha)) {
            Flash::error('fecha not found');

            return redirect(route('fechas.index'));
        }

        return view('fechas.show')->with('fecha', $fecha);
    }

    /**
     * Show the form for editing the specified fecha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fecha = $this->fechaRepository->findWithoutFail($id);

        if (empty($fecha)) {
            Flash::error('fecha not found');

            return redirect(route('fechas.index'));
        }

        return view('fechas.edit')->with('fecha', $fecha);
    }

    /**
     * Update the specified fecha in storage.
     *
     * @param  int              $id
     * @param UpdatefechaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefechaRequest $request)
    {
        $fecha = $this->fechaRepository->findWithoutFail($id);

        if (empty($fecha)) {
            Flash::error('fecha not found');

            return redirect(route('fechas.index'));
        }

        $fecha = $this->fechaRepository->update($request->all(), $id);

        Flash::success('fecha updated successfully.');

        return redirect(route('fechas.index'));
    }

    /**
     * Remove the specified fecha from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fecha = $this->fechaRepository->findWithoutFail($id);

        if (empty($fecha)) {
            Flash::error('fecha not found');

            return redirect(route('fechas.index'));
        }

        $this->fechaRepository->delete($id);

        Flash::success('fecha deleted successfully.');

        return redirect(route('fechas.index'));
    }

    
}
