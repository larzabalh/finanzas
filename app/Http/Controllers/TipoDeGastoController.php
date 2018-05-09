<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoDeGastoRequest;
use App\Http\Requests\UpdateTipoDeGastoRequest;
use App\Repositories\TipoDeGastoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoDeGastoController extends AppBaseController
{
    /** @var  TipoDeGastoRepository */
    private $tipoDeGastoRepository;

    public function __construct(TipoDeGastoRepository $tipoDeGastoRepo)
    {
        $this->tipoDeGastoRepository = $tipoDeGastoRepo;
    }

    /**
     * Display a listing of the TipoDeGasto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoDeGastoRepository->pushCriteria(new RequestCriteria($request));
        $tipoDeGastos = $this->tipoDeGastoRepository->all();

        return view('tipo_de_gastos.index')
            ->with('tipoDeGastos', $tipoDeGastos);
    }

    /**
     * Show the form for creating a new TipoDeGasto.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_de_gastos.create');
    }

    /**
     * Store a newly created TipoDeGasto in storage.
     *
     * @param CreateTipoDeGastoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDeGastoRequest $request)
    {
        $input = $request->all();

        $tipoDeGasto = $this->tipoDeGastoRepository->create($input);

        Flash::success('Tipo De Gasto saved successfully.');

        return redirect(route('tipoDeGastos.index'));
    }

    /**
     * Display the specified TipoDeGasto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDeGasto = $this->tipoDeGastoRepository->findWithoutFail($id);

        if (empty($tipoDeGasto)) {
            Flash::error('Tipo De Gasto not found');

            return redirect(route('tipoDeGastos.index'));
        }

        return view('tipo_de_gastos.show')->with('tipoDeGasto', $tipoDeGasto);
    }

    /**
     * Show the form for editing the specified TipoDeGasto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDeGasto = $this->tipoDeGastoRepository->findWithoutFail($id);

        if (empty($tipoDeGasto)) {
            Flash::error('Tipo De Gasto not found');

            return redirect(route('tipoDeGastos.index'));
        }

        return view('tipo_de_gastos.edit')->with('tipoDeGasto', $tipoDeGasto);
    }

    /**
     * Update the specified TipoDeGasto in storage.
     *
     * @param  int              $id
     * @param UpdateTipoDeGastoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDeGastoRequest $request)
    {
        $tipoDeGasto = $this->tipoDeGastoRepository->findWithoutFail($id);

        if (empty($tipoDeGasto)) {
            Flash::error('Tipo De Gasto not found');

            return redirect(route('tipoDeGastos.index'));
        }

        $tipoDeGasto = $this->tipoDeGastoRepository->update($request->all(), $id);

        Flash::success('Tipo De Gasto updated successfully.');

        return redirect(route('tipoDeGastos.index'));
    }

    /**
     * Remove the specified TipoDeGasto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDeGasto = $this->tipoDeGastoRepository->findWithoutFail($id);

        if (empty($tipoDeGasto)) {
            Flash::error('Tipo De Gasto not found');

            return redirect(route('tipoDeGastos.index'));
        }

        $this->tipoDeGastoRepository->delete($id);

        Flash::success('Tipo De Gasto deleted successfully.');

        return redirect(route('tipoDeGastos.index'));
    }
}
