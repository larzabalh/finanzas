<?php

namespace App\Http\Controllers;

use App\DataTables\IngresoMensualDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIngresoMensualRequest;
use App\Http\Requests\UpdateIngresoMensualRequest;
use App\Repositories\IngresoMensualRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Cliente;

class IngresoMensualController extends AppBaseController
{
    /** @var  IngresoMensualRepository */
    private $ingresoMensualRepository;

    public function __construct(IngresoMensualRepository $ingresoMensualRepo)
    {
        $this->ingresoMensualRepository = $ingresoMensualRepo;
    }

    /**
     * Display a listing of the IngresoMensual.
     *
     * @param IngresoMensualDataTable $ingresoMensualDataTable
     * @return Response
     */
    public function index(IngresoMensualDataTable $ingresoMensualDataTable)
    {
        return $ingresoMensualDataTable->render('ingreso_mensuals.index');
    }

    /**
     * Show the form for creating a new IngresoMensual.
     *
     * @return Response
     */
    public function create()
    {
        $Clientes = Cliente::where('user_id', auth()->user()->id)->pluck('cliente','id');
        return view('ingreso_mensuals.create',compact('Clientes'));
    }

    /**
     * Store a newly created IngresoMensual in storage.
     *
     * @param CreateIngresoMensualRequest $request
     *
     * @return Response
     */
    public function store(CreateIngresoMensualRequest $request)
    {
        $input = $request->all();

        $ingresoMensual = $this->ingresoMensualRepository->create($input);

        Flash::success('Ingreso Mensual saved successfully.');

        return redirect(route('ingresoMensuals.index'));
    }

    /**
     * Display the specified IngresoMensual.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ingresoMensual = $this->ingresoMensualRepository->findWithoutFail($id);

        if (empty($ingresoMensual)) {
            Flash::error('Ingreso Mensual not found');

            return redirect(route('ingresoMensuals.index'));
        }

        return view('ingreso_mensuals.show')->with('ingresoMensual', $ingresoMensual);
    }

    /**
     * Show the form for editing the specified IngresoMensual.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ingresoMensual = $this->ingresoMensualRepository->findWithoutFail($id);
        $Clientes = Cliente::where('user_id', auth()->user()->id)->pluck('cliente','id');
        

        if (empty($ingresoMensual)) {
            Flash::error('Ingreso Mensual not found');

            return redirect(route('ingresoMensuals.index'));
        }
        return view('ingreso_mensuals.edit',compact('ingresoMensual','Clientes'));
    }

    /**
     * Update the specified IngresoMensual in storage.
     *
     * @param  int              $id
     * @param UpdateIngresoMensualRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIngresoMensualRequest $request)
    {
        $ingresoMensual = $this->ingresoMensualRepository->findWithoutFail($id);

        if (empty($ingresoMensual)) {
            Flash::error('Ingreso Mensual not found');

            return redirect(route('ingresoMensuals.index'));
        }

        $ingresoMensual = $this->ingresoMensualRepository->update($request->all(), $id);

        Flash::success('Ingreso Mensual updated successfully.');

        return redirect(route('ingresoMensuals.index'));
    }

    /**
     * Remove the specified IngresoMensual from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ingresoMensual = $this->ingresoMensualRepository->findWithoutFail($id);

        if (empty($ingresoMensual)) {
            Flash::error('Ingreso Mensual not found');

            return redirect(route('ingresoMensuals.index'));
        }

        $this->ingresoMensualRepository->delete($id);

        Flash::success('Ingreso Mensual deleted successfully.');

        return redirect(route('ingresoMensuals.index'));
    }
}
