<?php

namespace App\Http\Controllers;

use App\DataTables\MedioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMedioRequest;
use App\Http\Requests\UpdateMedioRequest;
use App\Repositories\MedioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MedioController extends AppBaseController
{
    /** @var  MedioRepository */
    private $medioRepository;

    public function __construct(MedioRepository $medioRepo)
    {
        $this->medioRepository = $medioRepo;
    }

    /**
     * Display a listing of the Medio.
     *
     * @param MedioDataTable $medioDataTable
     * @return Response
     */
    public function index(MedioDataTable $medioDataTable)
    {
        return $medioDataTable->render('medios.index');
    }

    /**
     * Show the form for creating a new Medio.
     *
     * @return Response
     */
    public function create()
    {
        return view('medios.create');
    }

    /**
     * Store a newly created Medio in storage.
     *
     * @param CreateMedioRequest $request
     *
     * @return Response
     */
    public function store(CreateMedioRequest $request)
    {
        $input = $request->all();

        $medio = $this->medioRepository->create($input);

        Flash::success('Medio saved successfully.');

        return redirect(route('medios.index'));
    }

    /**
     * Display the specified Medio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medio = $this->medioRepository->findWithoutFail($id);

        if (empty($medio)) {
            Flash::error('Medio not found');

            return redirect(route('medios.index'));
        }

        return view('medios.show')->with('medio', $medio);
    }

    /**
     * Show the form for editing the specified Medio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medio = $this->medioRepository->findWithoutFail($id);

        if (empty($medio)) {
            Flash::error('Medio not found');

            return redirect(route('medios.index'));
        }

        return view('medios.edit')->with('medio', $medio);
    }

    /**
     * Update the specified Medio in storage.
     *
     * @param  int              $id
     * @param UpdateMedioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedioRequest $request)
    {
        $medio = $this->medioRepository->findWithoutFail($id);

        if (empty($medio)) {
            Flash::error('Medio not found');

            return redirect(route('medios.index'));
        }

        $medio = $this->medioRepository->update($request->all(), $id);

        Flash::success('Medio updated successfully.');

        return redirect(route('medios.index'));
    }

    /**
     * Remove the specified Medio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medio = $this->medioRepository->findWithoutFail($id);

        if (empty($medio)) {
            Flash::error('Medio not found');

            return redirect(route('medios.index'));
        }

        $this->medioRepository->delete($id);

        Flash::success('Medio deleted successfully.');

        return redirect(route('medios.index'));
    }
}
