<?php

namespace App\Http\Controllers;

use App\DataTables\FormaDePagoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFormaDePagoRequest;
use App\Http\Requests\UpdateFormaDePagoRequest;
use App\Repositories\FormaDePagoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Disponibilidad;
class FormaDePagoController extends AppBaseController
{
    /** @var  FormaDePagoRepository */
    private $formaDePagoRepository;

    public function __construct(FormaDePagoRepository $formaDePagoRepo)
    {
        $this->formaDePagoRepository = $formaDePagoRepo;
    }

    /**
     * Display a listing of the FormaDePago.
     *
     * @param FormaDePagoDataTable $formaDePagoDataTable
     * @return Response
     */
    public function index(FormaDePagoDataTable $formaDePagoDataTable)
    {
        return $formaDePagoDataTable->render('forma_de_pagos.index');
    }

    /**
     * Show the form for creating a new FormaDePago.
     *
     * @return Response
     */
    public function create()
    {
        $Disponibilidades = Disponibilidad::pluck('nombre','id');
        return view('forma_de_pagos.create',compact('Disponibilidades'));
    }

    /**
     * Store a newly created FormaDePago in storage.
     *
     * @param CreateFormaDePagoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaDePagoRequest $request)
    {
        $input = $request->all();

        $formaDePago = $this->formaDePagoRepository->create($input);

        Flash::success('Forma De Pago saved successfully.');

        return redirect(route('formaDePagos.index'));
    }

    /**
     * Display the specified FormaDePago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formaDePago = $this->formaDePagoRepository->findWithoutFail($id);

        if (empty($formaDePago)) {
            Flash::error('Forma De Pago not found');

            return redirect(route('formaDePagos.index'));
        }

        return view('forma_de_pagos.show')->with('formaDePago', $formaDePago);
    }

    /**
     * Show the form for editing the specified FormaDePago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formaDePago = $this->formaDePagoRepository->findWithoutFail($id);
        $Disponibilidades = Disponibilidad::pluck('nombre','id');
        if (empty($formaDePago)) {
            Flash::error('Forma De Pago not found');

            return redirect(route('formaDePagos.index'));
        }

        $Disponibilidades = Disponibilidad::pluck('nombre','id');
        return view('forma_de_pagos.edit',compact('formaDePago','Disponibilidades'));
    }

    /**
     * Update the specified FormaDePago in storage.
     *
     * @param  int              $id
     * @param UpdateFormaDePagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaDePagoRequest $request)
    {
        $formaDePago = $this->formaDePagoRepository->findWithoutFail($id);

        if (empty($formaDePago)) {
            Flash::error('Forma De Pago not found');

            return redirect(route('formaDePagos.index'));
        }

        $formaDePago = $this->formaDePagoRepository->update($request->all(), $id);

        Flash::success('Forma De Pago updated successfully.');

        return redirect(route('formaDePagos.index'));
    }

    /**
     * Remove the specified FormaDePago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formaDePago = $this->formaDePagoRepository->findWithoutFail($id);

        if (empty($formaDePago)) {
            Flash::error('Forma De Pago not found');

            return redirect(route('formaDePagos.index'));
        }

        $this->formaDePagoRepository->delete($id);

        Flash::success('Forma De Pago deleted successfully.');

        return redirect(route('formaDePagos.index'));
    }
}
