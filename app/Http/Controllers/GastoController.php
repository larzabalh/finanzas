<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGastoRequest;
use App\Http\Requests\UpdateGastoRequest;
use App\Repositories\GastoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gastoRepository->pushCriteria(new RequestCriteria($request));
        $gastos = $this->gastoRepository->all();

        return view('gastos.index')
            ->with('gastos', $gastos);
    }

    /**
     * Show the form for creating a new Gasto.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        $TipoDeGasto = TipoDeGasto::pluck('tipo','id');

        return view('gastos.create')
                ->with('users', $users)
                ->with('TipoDeGasto', $TipoDeGasto)
                ;;
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

        if (empty($gasto)) {
            Flash::error('Gasto not found');

            return redirect(route('gastos.index'));
        }

        return view('gastos.edit')->with('gasto', $gasto);
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
