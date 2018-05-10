<?php

namespace App\Http\Controllers;

use App\DataTables\ProbandoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProbandoRequest;
use App\Http\Requests\UpdateProbandoRequest;
use App\Repositories\ProbandoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProbandoController extends AppBaseController
{
    /** @var  ProbandoRepository */
    private $probandoRepository;

    public function __construct(ProbandoRepository $probandoRepo)
    {
        $this->probandoRepository = $probandoRepo;
    }

    /**
     * Display a listing of the Probando.
     *
     * @param ProbandoDataTable $probandoDataTable
     * @return Response
     */
    public function index(ProbandoDataTable $probandoDataTable)
    {
        return $probandoDataTable->render('probandos.index');
    }

    /**
     * Show the form for creating a new Probando.
     *
     * @return Response
     */
    public function create()
    {
        return view('probandos.create');
    }

    /**
     * Store a newly created Probando in storage.
     *
     * @param CreateProbandoRequest $request
     *
     * @return Response
     */
    public function store(CreateProbandoRequest $request)
    {
        $input = $request->all();

        $probando = $this->probandoRepository->create($input);

        Flash::success('Probando saved successfully.');

        return redirect(route('probandos.index'));
    }

    /**
     * Display the specified Probando.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $probando = $this->probandoRepository->findWithoutFail($id);

        if (empty($probando)) {
            Flash::error('Probando not found');

            return redirect(route('probandos.index'));
        }

        return view('probandos.show')->with('probando', $probando);
    }

    /**
     * Show the form for editing the specified Probando.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $probando = $this->probandoRepository->findWithoutFail($id);

        if (empty($probando)) {
            Flash::error('Probando not found');

            return redirect(route('probandos.index'));
        }

        return view('probandos.edit')->with('probando', $probando);
    }

    /**
     * Update the specified Probando in storage.
     *
     * @param  int              $id
     * @param UpdateProbandoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProbandoRequest $request)
    {
        $probando = $this->probandoRepository->findWithoutFail($id);

        if (empty($probando)) {
            Flash::error('Probando not found');

            return redirect(route('probandos.index'));
        }

        $probando = $this->probandoRepository->update($request->all(), $id);

        Flash::success('Probando updated successfully.');

        return redirect(route('probandos.index'));
    }

    /**
     * Remove the specified Probando from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $probando = $this->probandoRepository->findWithoutFail($id);

        if (empty($probando)) {
            Flash::error('Probando not found');

            return redirect(route('probandos.index'));
        }

        $this->probandoRepository->delete($id);

        Flash::success('Probando deleted successfully.');

        return redirect(route('probandos.index'));
    }
}
