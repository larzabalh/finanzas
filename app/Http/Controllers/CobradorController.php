<?php

namespace App\Http\Controllers;

use App\DataTables\CobradorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCobradorRequest;
use App\Http\Requests\UpdateCobradorRequest;
use App\Repositories\CobradorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CobradorController extends AppBaseController
{
    /** @var  CobradorRepository */
    private $cobradorRepository;

    public function __construct(CobradorRepository $cobradorRepo)
    {
        $this->cobradorRepository = $cobradorRepo;
    }

    /**
     * Display a listing of the Cobrador.
     *
     * @param CobradorDataTable $cobradorDataTable
     * @return Response
     */
    public function index(CobradorDataTable $cobradorDataTable)
    {
        return $cobradorDataTable->render('cobradors.index');
    }

    /**
     * Show the form for creating a new Cobrador.
     *
     * @return Response
     */
    public function create()
    {
        return view('cobradors.create');
    }

    /**
     * Store a newly created Cobrador in storage.
     *
     * @param CreateCobradorRequest $request
     *
     * @return Response
     */
    public function store(CreateCobradorRequest $request)
    {
        $input = $request->all();

        $cobrador = $this->cobradorRepository->create($input);

        Flash::success('Cobrador saved successfully.');

        return redirect(route('cobradors.index'));
    }

    /**
     * Display the specified Cobrador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cobrador = $this->cobradorRepository->findWithoutFail($id);

        if (empty($cobrador)) {
            Flash::error('Cobrador not found');

            return redirect(route('cobradors.index'));
        }

        return view('cobradors.show')->with('cobrador', $cobrador);
    }

    /**
     * Show the form for editing the specified Cobrador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cobrador = $this->cobradorRepository->findWithoutFail($id);

        if (empty($cobrador)) {
            Flash::error('Cobrador not found');

            return redirect(route('cobradors.index'));
        }

        return view('cobradors.edit')->with('cobrador', $cobrador);
    }

    /**
     * Update the specified Cobrador in storage.
     *
     * @param  int              $id
     * @param UpdateCobradorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCobradorRequest $request)
    {
        $cobrador = $this->cobradorRepository->findWithoutFail($id);

        if (empty($cobrador)) {
            Flash::error('Cobrador not found');

            return redirect(route('cobradors.index'));
        }

        $cobrador = $this->cobradorRepository->update($request->all(), $id);

        Flash::success('Cobrador updated successfully.');

        return redirect(route('cobradors.index'));
    }

    /**
     * Remove the specified Cobrador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cobrador = $this->cobradorRepository->findWithoutFail($id);

        if (empty($cobrador)) {
            Flash::error('Cobrador not found');

            return redirect(route('cobradors.index'));
        }

        $this->cobradorRepository->delete($id);

        Flash::success('Cobrador deleted successfully.');

        return redirect(route('cobradors.index'));
    }
}
