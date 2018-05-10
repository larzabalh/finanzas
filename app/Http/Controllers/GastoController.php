<?php

namespace App\Http\Controllers;

use App\DataTables\GastoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGastoRequest;
use App\Http\Requests\UpdateGastoRequest;
use App\Repositories\GastoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\User;
use App\Models\TipoDeGasto;

class GastoController extends AppBaseController
{
    /** @var  GastoRepository */
    private $gastoRepository;

    public function __construct(GastoRepository $gastoRepo)
    {
        $this->gastoRepository = $gastoRepo;
    }

    /**
     * Display a listing of the Gasto.
     *
     * @param GastoDataTable $gastoDataTable
     * @return Response
     */
    public function index(GastoDataTable $gastoDataTable)
    {
        return $gastoDataTable->render('gastos.index');
    }

    /**
     * Show the form for creating a new Gasto.
     *
     * @return Response
     */
    public function create()
    {
        
        $TipoDeGastos = TipoDeGasto::pluck('tipo','id');

        return view('gastos.create',compact('TipoDeGastos'));
    }

    /**
     * Store a newly created Gasto in storage.
     *
     * @param CreateGastoRequest $request
     *
     * @return Response
     */
    public function store(CreateGastoRequest $request)
    {
        $input = $request->all();

        $gasto = $this->gastoRepository->create($input);

        Flash::success('Gasto saved successfully.');

        return redirect(route('gastos.index'));
    }

    /**
     * Display the specified Gasto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gasto = $this->gastoRepository->findWithoutFail($id);

        if (empty($gasto)) {
            Flash::error('Gasto not found');

            return redirect(route('gastos.index'));
        }

        return view('gastos.show')->with('gasto', $gasto);
    }

    /**
     * Show the form for editing the specified Gasto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gasto = $this->gastoRepository->findWithoutFail($id);
        $TipoDeGastos = TipoDeGasto::pluck('tipo','id');

        if (empty($gasto)) {
            Flash::error('Gasto not found');

            return redirect(route('gastos.index'));
        }

        return view('gastos.edit',compact('gasto','TipoDeGastos'));
    }

    /**
     * Update the specified Gasto in storage.
     *
     * @param  int              $id
     * @param UpdateGastoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGastoRequest $request)
    {
        $gasto = $this->gastoRepository->findWithoutFail($id);

        if (empty($gasto)) {
            Flash::error('Gasto not found');

            return redirect(route('gastos.index'));
        }

        $gasto = $this->gastoRepository->update($request->all(), $id);

        Flash::success('Gasto updated successfully.');

        return redirect(route('gastos.index'));
    }

    /**
     * Remove the specified Gasto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gasto = $this->gastoRepository->findWithoutFail($id);

        if (empty($gasto)) {
            Flash::error('Gasto not found');

            return redirect(route('gastos.index'));
        }

        $this->gastoRepository->delete($id);

        Flash::success('Gasto deleted successfully.');

        return redirect(route('gastos.index'));
    }
}
