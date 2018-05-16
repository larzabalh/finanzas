<?php

namespace App\Http\Controllers;

use App\DataTables\FacturadorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFacturadorRequest;
use App\Http\Requests\UpdateFacturadorRequest;
use App\Repositories\FacturadorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FacturadorController extends AppBaseController
{
    /** @var  FacturadorRepository */
    private $facturadorRepository;

    public function __construct(FacturadorRepository $facturadorRepo)
    {
        $this->facturadorRepository = $facturadorRepo;
    }

    /**
     * Display a listing of the Facturador.
     *
     * @param FacturadorDataTable $facturadorDataTable
     * @return Response
     */
    public function index(FacturadorDataTable $facturadorDataTable)
    {
        return $facturadorDataTable->render('facturadors.index');
    }

    /**
     * Show the form for creating a new Facturador.
     *
     * @return Response
     */
    public function create()
    {
        return view('facturadors.create');
    }

    /**
     * Store a newly created Facturador in storage.
     *
     * @param CreateFacturadorRequest $request
     *
     * @return Response
     */
    public function store(CreateFacturadorRequest $request)
    {
        $input = $request->all();

        $facturador = $this->facturadorRepository->create($input);

        Flash::success('Facturador saved successfully.');

        return redirect(route('facturadors.index'));
    }

    /**
     * Display the specified Facturador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facturador = $this->facturadorRepository->findWithoutFail($id);

        if (empty($facturador)) {
            Flash::error('Facturador not found');

            return redirect(route('facturadors.index'));
        }

        return view('facturadors.show')->with('facturador', $facturador);
    }

    /**
     * Show the form for editing the specified Facturador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facturador = $this->facturadorRepository->findWithoutFail($id);

        if (empty($facturador)) {
            Flash::error('Facturador not found');

            return redirect(route('facturadors.index'));
        }

        return view('facturadors.edit')->with('facturador', $facturador);
    }

    /**
     * Update the specified Facturador in storage.
     *
     * @param  int              $id
     * @param UpdateFacturadorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacturadorRequest $request)
    {
        $facturador = $this->facturadorRepository->findWithoutFail($id);

        if (empty($facturador)) {
            Flash::error('Facturador not found');

            return redirect(route('facturadors.index'));
        }

        $facturador = $this->facturadorRepository->update($request->all(), $id);

        Flash::success('Facturador updated successfully.');

        return redirect(route('facturadors.index'));
    }

    /**
     * Remove the specified Facturador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facturador = $this->facturadorRepository->findWithoutFail($id);

        if (empty($facturador)) {
            Flash::error('Facturador not found');

            return redirect(route('facturadors.index'));
        }

        $this->facturadorRepository->delete($id);

        Flash::success('Facturador deleted successfully.');

        return redirect(route('facturadors.index'));
    }
}
